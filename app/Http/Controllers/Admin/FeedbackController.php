<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Common;
use App\Models\Feature;
use App\Models\Feedback;
use Cache;
use Illuminate\Http\Request;
use Exception;
use Illuminate\Support\Facades\Validator;

class FeedbackController extends Controller
{
    public $common;
    public function __construct()
    {
        $this->common = new Common;
    }

    public function index(Request $request)
    {
        try {

            $params['data'] = Feedback::latest()->get();
            $params['features'] = Feature::latest()->get();
            if ($request->ajax()) {

                $query = Feedback::query();
                $input_search = $request['input_search'];
                if ($input_search != null) {
                    $query = Feedback::where('name', 'LIKE', "%{$input_search}%");
                }
                $data = $query->latest()->get();

                return DataTables()::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function ($row) {
                        $feedback_delete = __('label.delete_feedback');

                        $delete = '<form onsubmit="return confirm(\'' . $feedback_delete . '\');" method="POST" action="' . route('admin.feedback.destroy', [$row->id]) . '">
                            <input type="hidden" name="_token" value="' . csrf_token() . '">
                            <input type="hidden" name="_method" value="DELETE">
                            <button type="submit" class="edit-delete-btn" title="' . __('label.delete') . '"><i class="fa-solid fa-trash-can fa-xl"></i></button></form>';
                        $btn = $delete;
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
            return view('admin.feedback.index', $params);
        } catch (Exception $e) {
            return response()->json(['status' => 400, 'errors' => $e->getMessage()]);
        }
    }
    public function store(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'name' => 'required|min:2',
                'email' => 'required|email',
                'mobile_no' => 'required',
                'area_name' => 'required',
                'feedback' => 'required',
                'rating' => 'required|integer|min:1|max:5',
            ]);
            if ($validator->fails()) {
                $errs = $validator->errors()->all();
                return response()->json(['status' => 400, 'errors' => $errs]);
            }

            $requestData = $request->all();
            $requestData['status'] = 1;

            $data = Feedback::updateOrCreate(['id' => $requestData['id']], $requestData);
            if (isset($data->id)) {
                Cache::forget('feedbacks_desc');
                Cache::forget('feedbacks_asc');
                Cache::forget('about_feedbacks');
                Cache::forget('gallery_feedbacks');
                
                return response()->json(['status' => 200, 'success' => __('label.success_add_feedback')]);
            } else {
                return response()->json(['status' => 400, 'errors' => __('label.error_add_feedback')]);
            }
        } catch (Exception $e) {
            return response()->json(['status' => 400, 'errors' => $e->getMessage()]);
        }
    }
    public function destroy($id)
    {
        try {

            $data = Feedback::where('id', $id)->first();
            if (isset($data)) {
                $data->delete();
                Cache::forget('feedbacks_desc');
                Cache::forget('feedbacks_asc');
                Cache::forget('about_feedbacks');
                Cache::forget('gallery_feedbacks');
            }
            return redirect()->route('admin.feedback.index')->with('success', __('label.feedback_delete'));
        } catch (Exception $e) {
            return response()->json(['status' => 400, 'errors' => $e->getMessage()]);
        }
    }
    public function show($id)
    {
        try {

            $data = Feedback::where('id', $id)->first();
            if (isset($data)) {

                $data->status = $data->status === 1 ? 0 : 1;
                $data->save();

                Cache::forget('feedbacks_desc');
                Cache::forget('feedbacks_asc');
                Cache::forget('about_feedbacks');
                Cache::forget('gallery_feedbacks');

                return response()->json(['status' => 200, 'success' => __('label.status_changed'), 'status_code' => $data->status]);
            } else {
                return response()->json(['status' => 400, 'errors' => __('label.data_not_found')]);
            }
        } catch (Exception $e) {
            return response()->json(['status' => 400, 'errors' => $e->getMessage()]);
        }
    }
}
