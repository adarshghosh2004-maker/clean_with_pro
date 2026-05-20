<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\pages;
use App\Models\Common;
use App\Models\Service;
use Illuminate\Http\Request;
use Exception;
use Illuminate\Support\Facades\Validator;

class PagesController extends Controller
{
    private $folder = "pages";
    public $common;
    public function __construct()
    {
        $this->common = new Common;
    }

    public function index(Request $request)
    {
        try {

            $params['data'] = pages::latest()->get();
            $params['services'] = Service::get();
            if ($request->ajax()) {

                $query = pages::query();
                $input_search = $request['input_search'];
                if (!empty($input_search)) {
                    $query->where('name', 'LIKE', "%{$input_search}%");
                }
                $data = $query->latest()->get();

                $data = $this->common->imageNameToUrl($data, 'img', $this->folder);

                return DataTables()::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function ($row) {

                        $pages_delete = __('label.delete_hero_image');

                        $delete = '<form onsubmit="return confirm(\'' . $pages_delete . '\');" method="POST" action="' . route('admin.pages.destroy', [$row->id]) . '">
                            <input type="hidden" name="_token" value="' . csrf_token() . '">
                            <input type="hidden" name="_method" value="DELETE">
                            <button type="submit" class="edit-delete-btn" title="' . __('label.delete') . '"><i class="fa-solid fa-trash-can fa-xl"></i></button></form>';

                        $btn = '<div class="d-flex justify-content-center"><a class="edit-delete-btn edit_pages mr-4" data-toggle="modal" href="#EditModel" data-id="' . $row->id . '" data-name="' . $row->name . '" data-image="' . $row->img . '" title="' . __('label.edit') . '">';
                        $btn .= '<i class="fa-solid fa-pen-to-square fa-xl"></i>';
                        $btn .= '</a>';
                        $btn .= $delete;
                        $btn .= '</a></div>';
                        return $btn;
                    })
                    ->rawColumns(['action', 'status'])
                    ->make(true);
            }
            return view('admin.pages.index', $params);
        } catch (Exception $e) {
            return response()->json(['status' => 400, 'errors' => $e->getMessage()]);
        }
    }
    public function store(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'name' => 'required',
                'img' => 'required|image|mimes:jpeg,png,jpg,webp|max:10240',
            ]);
            if ($validator->fails()) {
                $errs = $validator->errors()->all();
                return response()->json(['status' => 400, 'errors' => $errs]);
            }

            $requestData = $request->all();
            $requestData['img'] = $this->common->saveImage($requestData['img'], $this->folder, 'pages_');

            $data = pages::updateOrCreate(['id' => $requestData['id']], $requestData);
            if (isset($data->id)) {
                return response()->json(['status' => 200, 'success' => __('label.success_add_hero_image')]);
            } else {
                return response()->json(['status' => 400, 'errors' => __('label.error_add_hero_image')]);
            }
        } catch (Exception $e) {
            return response()->json(['status' => 400, 'errors' => $e->getMessage()]);
        }
    }
    public function update($id, Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'name' => 'required',
                'img' => 'image|mimes:jpeg,png,jpg,webp|max:10240',
            ]);
            if ($validator->fails()) {
                $errs = $validator->errors()->all();
                return response()->json(['status' => 400, 'errors' => $errs]);
            }

            $requestData = $request->all();
            if (isset($requestData['img'])) {
                $this->common->deleteImageToFolder($this->folder, $requestData['old_img']);
                $requestData['img'] = $this->common->saveImage($requestData['img'], $this->folder, 'pages_');
            }
            unset($requestData['old_img']);

            $data = pages::updateOrCreate(['id' => $requestData['id']], $requestData);
            if (isset($data->id)) {
                return response()->json(['status' => 200, 'success' => __('label.success_edit_hero_image')]);
            } else {
                return response()->json(['status' => 400, 'errors' => __('label.error_edit_hero_image')]);
            }
        } catch (Exception $e) {
            return response()->json(['status' => 400, 'errors' => $e->getMessage()]);
        }
    }
    public function destroy($id)
    {
        try {

            $data = pages::where('id', $id)->first();
            if (isset($data)) {
                $this->common->deleteImageToFolder($this->folder, $data['img_1']);
                $this->common->deleteImageToFolder($this->folder, $data['img_2']);
                $this->common->deleteImageToFolder($this->folder, $data['img_3']);
                $data->delete();
            }
            return redirect()->route('admin.pages.index')->with('success', __('label.hero_image_delete'));
        } catch (Exception $e) {
            return response()->json(['status' => 400, 'errors' => $e->getMessage()]);
        }
    }
}
