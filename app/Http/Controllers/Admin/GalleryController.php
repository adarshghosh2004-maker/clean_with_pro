<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Common;
use App\Models\Gallery;
use App\Models\Service;
use Illuminate\Http\Request;
use Exception;
use Illuminate\Support\Facades\Validator;


class GalleryController extends Controller
{
    private $folder = "gallery";
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

                $query = Gallery::where('status', 1);

                if (!empty($input_search)) {
                    $query->where('name', 'LIKE', "%{$input_search}%");
                }

                $data = $query->latest()->get();

                 $this->common->imageNameToUrl($data, 'before_img', $this->folder);
                 $this->common->imageNameToUrl($data, 'after_img', $this->folder);

                return DataTables()::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function ($row) {
                        $delete = ' <form onsubmit="return confirm(\'' . __('label.delete_gallery_msg') . '\');" method="POST"  action="' . route('admin.gallery.destroy', [$row->id]) . '">
                    <input type="hidden" name="_token" value="' . csrf_token() . '">
                    <input type="hidden" name="_method" value="DELETE">
                    <button type="submit" class="edit-delete-btn" style="outline: none;" title="Delete"><i class="fa-solid fa-trash-can fa-xl"></i></button></form>';

                        $btn = '<div class="d-flex justify-content-center" title="Edit">';
                        $btn .= '<a class="edit-delete-btn mr-4" title="Edit" href="' . route('admin.gallery.edit', [$row->id]) . '">';
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

            return view('admin.gallery.index', $params);
        } catch (Exception $e) {
            return response()->json(array('status' => 400, 'errors' => $e->getMessage()));
        }
    }
    public function create()
    {
        try {
            $params['data'] = [];
            $params['services'] = Service::where('status', 1)->get();

            return view('admin.gallery.add', $params);
        } catch (Exception $e) {
            return response()->json(array('status' => 400, 'errors' => $e->getMessage()));
        }
    }
    public function store(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'service_id' => 'required',
                'before_img' => 'required|image|mimes:jpeg,jpg,png,webp',
                'after_img' => 'required|image|mimes:jpeg,jpg,png,webp',
            ]);
            if ($validator->fails()) {
                $errs = $validator->errors()->all();
                return response()->json(array('status' => 400, 'errors' => $errs));
            }

            $requestData = $request->all();

            if (isset($requestData['before_img'])) {

                $files = $requestData['before_img'];
                $requestData['before_img'] = $this->common->saveImage($files, $this->folder, "gallery_");
            }

            if (isset($requestData['after_img'])) {
                $files = $requestData['after_img'];
                $requestData['after_img'] = $this->common->saveImage($files, $this->folder, "gallery_");
            }

            $gallery_data = Gallery::updateOrCreate(['id' => $requestData['id']], $requestData);

            if (isset($gallery_data->id)) {
                return response()->json(array('status' => 200, 'success' => __('label.gallery_save')));
            } else {
                return response()->json(array('status' => 400, 'errors' => __('label.gallery_not_save')));
            }
        } catch (Exception $e) {
            return response()->json(array('status' => 400, 'errors' => $e->getMessage()));
        }
    }
    public function edit($id)
    {
        try {
            $params['data'] = Gallery::where('id', $id)->first();
            $params['services'] = Service::where('status', 1)->get();

            $temp = array($params['data']);
            $temp = $this->common->imageNameToUrl($temp, 'before_img', $this->folder);
            $temp = $this->common->imageNameToUrl($temp, 'after_img', $this->folder);
            $params['data'] = $temp[0];

            if ($params['data'] != null) {
                return view('admin.gallery.edit', $params);
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
                'service_id' => 'required',
                'before_img' => 'image|mimes:jpeg,jpg,png,webp',
                'after_img' => 'image|mimes:jpeg,jpg,png,webp',
            ]);
            if ($validator->fails()) {
                $errs = $validator->errors()->all();
                return response()->json(array('status' => 400, 'errors' => $errs));
            }

            $requestData = $request->all();

            if (isset($requestData['before_img'])) {
                $files = $requestData['before_img'];
                $requestData['before_img'] = $this->common->saveImage($files, $this->folder, "gallery_");

                $this->common->deleteImageToFolder($this->folder, basename($requestData['old_before_img']));
            }
            if (isset($requestData['after_img'])) {
                $files = $requestData['after_img'];
                $requestData['after_img'] = $this->common->saveImage($files, $this->folder, "gallery_");

                $this->common->deleteImageToFolder($this->folder, basename($requestData['old_after_img']));
            }

            unset($requestData['old_before_img'], $requestData['old_after_img']);

            $gallery_data = Gallery::updateOrCreate(['id' => $requestData['id']], $requestData);
            if (isset($gallery_data->id)) {
                return response()->json(array('status' => 200, 'success' => __('label.gallery_update')));
            } else {
                return response()->json(array('status' => 400, 'errors' => __('label.gallery_not_update')));
            }
        } catch (Exception $e) {
            return response()->json(array('status' => 400, 'errors' => $e->getMessage()));
        }
    }
    public function destroy($id)
    {
        try {
            $data = Gallery::where('id', $id)->first();
            if ($data) {
                $this->common->deleteImageToFolder($this->folder, $data['image']);
                $data->delete();
            }
            return redirect()->back()->with('success', __('label.gallery_delete'));
        } catch (Exception $e) {
            return response()->json(array('status' => 400, 'errors' => $e->getMessage()));
        }
    }
    public function change_status(Request $request)
    {
        try {
            $data = Gallery::where('id', $request->id)->first();

            if (!$data) {
                return response()->json(['status' => 400, 'errors' => __('label.gallery_not_found')]);
            }

            $data->status = $data->status ? 0 : 1;
            $data->save();

            return response()->json(['status' => 200, 'success' => __('label.status_changed'), 'status_code' => $data->status]);
        } catch (Exception $e) {
            return response()->json(array('status' => 400, 'errors' => $e->getMessage()));
        }
    }
}
