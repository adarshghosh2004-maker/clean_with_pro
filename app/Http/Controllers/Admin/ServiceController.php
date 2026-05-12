<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Common;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Exception;
use Illuminate\Support\Facades\Validator;


class ServiceController extends Controller
{
    private $folder = "service";
    public $common;

    public function __construct()
    {
        $this->common = new Common;
    }

    public function index(Request $request)
    {
        try {
            $params['data'] = [];

            if ($request->ajax()) {

                $input_search = $request['input_search'];

                $query = Service::query();

                if (!empty($input_search)) {
                    $query->where('name', 'LIKE', "%{$input_search}%");
                }

                $data = $query->orderBy('id', 'desc')->get();

                $this->common->imageNameToUrl($data, 'banner_img', $this->folder);

                return DataTables()::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function ($row) {
                        $delete = ' <form onsubmit="return confirm(\'' . __('label.delete_service_msg') . '\');" method="POST"  action="' . route('admin.service.destroy', [$row->id]) . '">
                    <input type="hidden" name="_token" value="' . csrf_token() . '">
                    <input type="hidden" name="_method" value="DELETE">
                    <button type="submit" class="edit-delete-btn" style="outline: none;" title="Delete"><i class="fa-solid fa-trash-can fa-xl"></i></button></form>';

                        $btn = '<div class="d-flex justify-content-center" title="Edit">';
                        $btn .= '<a class="edit-delete-btn mr-4" title="Edit" href="' . route('admin.service.edit', [$row->id]) . '">';
                        $btn .= '<i class="fa-solid fa-pen-to-square fa-xl"></i>';
                        $btn .= '</a>';
                        $btn .= $delete;
                        $btn .= '</a></div>';
                        return $btn;
                    })
                    ->addColumn('status', function ($row) {
                        $status = $row->status == 1 ? "checked" : "";
                        return '<div class="switch">
                                    <input class="status-checkbox" id="checkbox' . $row->id . '" data-id="' . $row->id . '" type="checkbox" ' . $status . '>
                                    <label for="checkbox' . $row->id . '"></label>
                                      <span class="toggle-text"
                                        data-on="' . __('label.enable') . '"
                                        data-off="' . __('label.disable') . '"></span>
                                    </div>';
                    })
                    ->rawColumns(['action', 'status'])
                    ->make(true);
            }
            $params['setting'] = Setting_Data();

            return view('admin.service.index', $params);
        } catch (Exception $e) {
            return response()->json(array('status' => 400, 'errors' => $e->getMessage()));
        }
    }
    public function create()
    {
        try {
            $params['data'] = [];

            return view('admin.service.add', $params);
        } catch (Exception $e) {
            return response()->json(array('status' => 400, 'errors' => $e->getMessage()));
        }
    }
    public function store(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'title' => 'required|min:2',
                'short_title' => 'required',
                'description' => 'required',
                'banner_img' => 'required|image|mimes:jpeg,jpg,png,webp|max:10240',
                'detail_img1' => 'required|image|mimes:jpeg,jpg,png,webp|max:10240',
                'detail_img2' => 'required|image|mimes:jpeg,jpg,png,webp|max:10240',
            ]);
            if ($validator->fails()) {
                $errs = $validator->errors()->all();
                return response()->json(array('status' => 400, 'errors' => $errs));
            }

            $requestData = $request->all();

            if (isset($requestData['banner_img'])) {

                $files = $requestData['banner_img'];
                $requestData['banner_img'] = $this->common->saveImage($files, $this->folder, "service_");
            }

            if (isset($requestData['detail_img1'])) {

                $files = $requestData['detail_img1'];
                $requestData['detail_img1'] = $this->common->saveImage($files, $this->folder, "service_");
            }
            if (isset($requestData['detail_img2'])) {

                $files = $requestData['detail_img2'];
                $requestData['detail_img2'] = $this->common->saveImage($files, $this->folder, "service_");
            }

            $service_data = Service::updateOrCreate(['id' => $requestData['id']], $requestData);

            if (isset($service_data->id)) {
                return response()->json(array('status' => 200, 'success' => __('label.service_save')));
            } else {
                return response()->json(array('status' => 400, 'errors' => __('label.service_not_save')));
            }
        } catch (Exception $e) {
            return response()->json(array('status' => 400, 'errors' => $e->getMessage()));
        }
    }
    public function edit($id)
    {
        try {
            $params['data'] = Service::where('id', $id)->first();

            $this->common->imageNameToUrl(array($params['data']), 'banner_img', $this->folder);
            $this->common->imageNameToUrl(array($params['data']), 'detail_img1', $this->folder);
            $this->common->imageNameToUrl(array($params['data']), 'detail_img2', $this->folder);

            if ($params['data'] != null) {
                return view('admin.service.edit', $params);
            } else {
                return redirect()->back()->with('error', __('label.page_not_found'));
            }
        } catch (Exception $e) {
            return response()->json(array('status' => 400, 'errors' => $e->getMessage()));
        }
    }
    public function update(Request $request, $id)
    {
        try {
            $validator = Validator::make($request->all(), [
                'title' => 'required|min:2',
                'short_title' => 'required',
                'description' => 'required',
                'banner_img' => 'image|mimes:jpeg,jpg,png,webp|max:10240',
                'detail_img1' => 'image|mimes:jpeg,jpg,png,webp|max:10240',
                'detail_img2' => 'image|mimes:jpeg,jpg,png,webp|max:10240',
            ]);
            if ($validator->fails()) {
                $errs = $validator->errors()->all();
                return response()->json(array('status' => 400, 'errors' => $errs));
            }

            $requestData = $request->all();

            if (isset($requestData['banner_img'])) {
                $files = $requestData['banner_img'];
                $requestData['banner_img'] = $this->common->saveImage($files, $this->folder, "service_");

                $this->common->deleteImageToFolder($this->folder, basename($requestData['old_banner_img']));
            }

            if (isset($requestData['detail_img1'])) {
                $files = $requestData['detail_img1'];
                $requestData['detail_img1'] = $this->common->saveImage($files, $this->folder, "service_");

                $this->common->deleteImageToFolder($this->folder, basename($requestData['old_detail_img1']));
            }
            if (isset($requestData['detail_img2'])) {
                $files = $requestData['detail_img2'];
                $requestData['detail_img2'] = $this->common->saveImage($files, $this->folder, "service_");

                $this->common->deleteImageToFolder($this->folder, basename($requestData['old_detail_img2']));
            }

            unset($requestData['old_banner_img'], $requestData['old_detail_img1'], $requestData['old_detail_img2']);

            $service_data = Service::updateOrCreate(['id' => $requestData['id']], $requestData);
            if (isset($service_data->id)) {
                return response()->json(array('status' => 200, 'success' => __('label.service_update')));
            } else {
                return response()->json(array('status' => 400, 'errors' => __('label.service_not_update')));
            }
        } catch (Exception $e) {
            return response()->json(array('status' => 400, 'errors' => $e->getMessage()));
        }
    }
    public function destroy($id)
    {
        try {
            $data = Service::where('id', $id)->first();
            if ($data) {
                $this->common->deleteImageToFolder($this->folder, $data['image']);
                $data->delete();
            }
            return redirect()->back()->with('success', __('label.service_delete'));
        } catch (Exception $e) {
            return response()->json(array('status' => 400, 'errors' => $e->getMessage()));
        }
    }
    public function change_status(Request $request)
    {
        try {
            $data = Service::where('id', $request->id)->first();

            if (!$data) {
                return response()->json(['status' => 400, 'errors' => __('label.service_not_found')]);
            }

            $data->status = $data->status ? 0 : 1;
            $data->save();

            return response()->json(['status' => 200, 'success' => __('label.status_changed'), 'status_code' => $data->status]);
        } catch (Exception $e) {
            return response()->json(array('status' => 400, 'errors' => $e->getMessage()));
        }
    }

}
