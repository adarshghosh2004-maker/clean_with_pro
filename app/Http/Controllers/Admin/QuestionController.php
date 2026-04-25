<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Question;
use App\Models\Common;
use App\Models\Service;
use Illuminate\Http\Request;
use Exception;
use Illuminate\Support\Facades\Validator;

class QuestionController extends Controller
{
    private $folder = "question";
    public $common;
    public function __construct()
    {
        $this->common = new Common;
    }

    public function index(Request $request)
    {
        try {

            $params['data'] = Question::latest()->get();
            $params['services'] = Service::get();
            if ($request->ajax()) {

                $query = Question::query();
                $input_search = $request['input_search'];
                if ($input_search != null) {
                    $query = Question::where('name', 'LIKE', "%{$input_search}%");
                }
                $data = $query->latest()->get();

                $data = $this->common->imageNameToUrl($data, 'img_1', $this->folder);
                $data = $this->common->imageNameToUrl($data, 'img_2', $this->folder);
                $data = $this->common->imageNameToUrl($data, 'img_3', $this->folder);

                return DataTables()::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function ($row) {

                        $language_delete = __('label.delete_language');

                        $delete = '<form onsubmit="return confirm(\'' . $language_delete . '\');" method="POST" action="' . route('admin.question.destroy', [$row->id]) . '">
                            <input type="hidden" name="_token" value="' . csrf_token() . '">
                            <input type="hidden" name="_method" value="DELETE">
                            <button type="submit" class="edit-delete-btn" title="' . __('label.delete') . '"><i class="fa-solid fa-trash-can fa-xl"></i></button></form>';

                        $btn = '<div class="d-flex justify-content-center">';
                        $btn .= '<a class="edit-delete-btn mr-4" href="' . route('admin.question.edit', [$row->id]) . '" title="' . __('label.edit') . '">';
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
                                        data-on="' . __('label.show') . '"
                                        data-off="' . __('label.hide') . '"></span>
                                    </div>';
                    })
                    ->rawColumns(['action', 'status'])
                    ->make(true);
            }
            return view('admin.question.index', $params);
        } catch (Exception $e) {
            return response()->json(['status' => 400, 'errors' => $e->getMessage()]);
        }
    }
    public function store(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'service_id' => 'required',
                'description' => 'required|min:2',
                'img_1' => 'required|image|mimes:jpeg,png,jpg,webp',
                'img_2' => 'required|image|mimes:jpeg,png,jpg,webp',
                'img_3' => 'required|image|mimes:jpeg,png,jpg,webp',
            ]);
            if ($validator->fails()) {
                $errs = $validator->errors()->all();
                return response()->json(['status' => 400, 'errors' => $errs]);
            }

            $requestData = $request->all();
            $requestData['img_1'] = $this->common->saveImage($requestData['img_1'], $this->folder, 'que_');
            $requestData['img_2'] = $this->common->saveImage($requestData['img_2'], $this->folder, 'que_');
            $requestData['img_3'] = $this->common->saveImage($requestData['img_3'], $this->folder, 'que_');
            $requestData['status'] = 1;

            $data = Question::updateOrCreate(['id' => $requestData['id']], $requestData);
            if (isset($data->id)) {
                return response()->json(['status' => 200, 'success' => __('label.success_add_language')]);
            } else {
                return response()->json(['status' => 400, 'errors' => __('label.error_add_language')]);
            }
        } catch (Exception $e) {
            return response()->json(['status' => 400, 'errors' => $e->getMessage()]);
        }
    }
    public function edit($id)
    {
        try {
            $params['data'] = Question::where('id', $id)->first();
            $params['services'] = Service::get();

            $temp = array($params['data']);
            $temp = $this->common->imageNameToUrl($temp, 'img_1', $this->folder);
            $temp = $this->common->imageNameToUrl($temp, 'img_2', $this->folder);
            $temp = $this->common->imageNameToUrl($temp, 'img_3', $this->folder);
            $params['data'] = $temp[0];

            if ($params['data'] != null) {
                return view('admin.question.edit', $params);
            } else {
                return redirect()->back()->with('error', __('label.page_not_found'));
            }
        } catch (Exception $e) {
            return response()->json(array('status' => 400, 'errors' => $e->getMessage()));
        }
    }
    public function update($id, Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'service_id' => 'required',
                'description' => 'required|min:2',
                'img_1' => 'image|mimes:jpeg,png,jpg,webp',
                'img_2' => 'image|mimes:jpeg,png,jpg,webp',
                'img_3' => 'image|mimes:jpeg,png,jpg,webp',
            ]);
            if ($validator->fails()) {
                $errs = $validator->errors()->all();
                return response()->json(['status' => 400, 'errors' => $errs]);
            }

            $requestData = $request->all();
            if (isset($requestData['img_1'])) {
                $this->common->deleteImageToFolder($this->folder, $requestData['old_img_1']);
                $requestData['img_1'] = $this->common->saveImage($requestData['img_1'], $this->folder, 'que_');
            }
            if (isset($requestData['img_2'])) {
                $this->common->deleteImageToFolder($this->folder, $requestData['old_img_2']);
                $requestData['img_2'] = $this->common->saveImage($requestData['img_2'], $this->folder, 'que_');
            }
            if (isset($requestData['img_3'])) {
                $this->common->deleteImageToFolder($this->folder, $requestData['old_img_3']);
                $requestData['img_3'] = $this->common->saveImage($requestData['img_3'], $this->folder, 'que_');
            }
            unset($requestData['old_img_1'], $requestData['old_img_2'], $requestData['old_img_3']);

            $data = Question::updateOrCreate(['id' => $requestData['id']], $requestData);
            if (isset($data->id)) {
                return response()->json(['status' => 200, 'success' => __('label.success_edit_language')]);
            } else {
                return response()->json(['status' => 400, 'errors' => __('label.error_edit_language')]);
            }
        } catch (Exception $e) {
            return response()->json(['status' => 400, 'errors' => $e->getMessage()]);
        }
    }
    public function destroy($id)
    {
        try {

            $data = Question::where('id', $id)->first();
            if (isset($data)) {
                $this->common->deleteImageToFolder($this->folder, $data['img_1']);
                $this->common->deleteImageToFolder($this->folder, $data['img_2']);
                $this->common->deleteImageToFolder($this->folder, $data['img_3']);
                $data->delete();
            }
            return redirect()->route('admin.question.index')->with('success', __('label.language_delete'));
        } catch (Exception $e) {
            return response()->json(['status' => 400, 'errors' => $e->getMessage()]);
        }
    }
    public function show($id)
    {
        try {

            $data = Question::where('id', $id)->first();
            if (isset($data)) {

                $data->status = $data->status === 1 ? 0 : 1;
                $data->save();
                return response()->json(['status' => 200, 'success' => __('label.status_changed'), 'status_code' => $data->status]);
            } else {
                return response()->json(['status' => 400, 'errors' => __('label.data_not_found')]);
            }
        } catch (Exception $e) {
            return response()->json(['status' => 400, 'errors' => $e->getMessage()]);
        }
    }
}
