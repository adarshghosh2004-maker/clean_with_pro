<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Common;
use App\Models\Feature;
use App\Models\Package;
use Illuminate\Http\Request;
use Exception;
use Illuminate\Support\Facades\Validator;

class PackageController extends Controller
{
    public $common;
    public function __construct()
    {
        $this->common = new Common;
    }

    public function index(Request $request)
    {
        try {

            $params['data'] = Package::latest()->get();
            $params['features'] = Feature::latest()->get();
            if ($request->ajax()) {

                $query = Package::query();
                $input_search = $request['input_search'];
                if ($input_search != null) {
                    $query = Package::where('name', 'LIKE', "%{$input_search}%");
                }
                $data = $query->latest()->get();

                return DataTables()::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function ($row) {
                        $package_delete = __('label.delete_package');

                        $delete = '<form onsubmit="return confirm(\'' . $package_delete . '\');" method="POST" action="' . route('admin.package.destroy', [$row->id]) . '">
                            <input type="hidden" name="_token" value="' . csrf_token() . '">
                            <input type="hidden" name="_method" value="DELETE">
                            <button type="submit" class="edit-delete-btn" title="' . __('label.delete') . '"><i class="fa-solid fa-trash-can fa-xl"></i></button></form>';

                        $btn = '<div class="d-flex justify-content-center">';
                        $btn .= '<a class="edit-delete-btn edit_package mr-4" data-toggle="modal" href="#EditModel" data-id="' . $row->id . '" data-name="' . $row->name . '" data-feature_id="' . $row->feature_id . '" title="' . __('label.edit') . '">';
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
                    ->addColumn('feature',function($row){
                        return $this->common->get_feature_name($row->feature_id) ?? '';
                    })
                    ->rawColumns(['action', 'status'])
                    ->make(true);
            }
            return view('admin.package.index', $params);
        } catch (Exception $e) {
            return response()->json(['status' => 400, 'errors' => $e->getMessage()]);
        }
    }
    public function store(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'name' => 'required|min:2',
                'feature_id' => 'required',
            ]);
            if ($validator->fails()) {
                $errs = $validator->errors()->all();
                return response()->json(['status' => 400, 'errors' => $errs]);
            }

            $requestData = $request->all();
            $requestData['feature_id'] = implode(',', $requestData['feature_id']);
            $requestData['status'] = 1;

            $data = Package::updateOrCreate(['id' => $requestData['id']], $requestData);
            if (isset($data->id)) {
                return response()->json(['status' => 200, 'success' => __('label.success_add_package')]);
            } else {
                return response()->json(['status' => 400, 'errors' => __('label.error_add_package')]);
            }
        } catch (Exception $e) {
            return response()->json(['status' => 400, 'errors' => $e->getMessage()]);
        }
    }
    public function update($id, Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'name' => 'required|min:2',
                'feature_id' => 'required',
            ]);
            if ($validator->fails()) {
                $errs = $validator->errors()->all();
                return response()->json(['status' => 400, 'errors' => $errs]);
            }

            $requestData = $request->all();
            $requestData['feature_id'] = implode(',', $requestData['feature_id']);

            $data = Package::updateOrCreate(['id' => $requestData['id']], $requestData);
            if (isset($data->id)) {
                return response()->json(['status' => 200, 'success' => __('label.success_edit_package')]);
            } else {
                return response()->json(['status' => 400, 'errors' => __('label.error_edit_package')]);
            }
        } catch (Exception $e) {
            return response()->json(['status' => 400, 'errors' => $e->getMessage()]);
        }
    }
    public function destroy($id)
    {
        try {

            $data = Package::where('id', $id)->first();
            if (isset($data)) {
                $data->delete();
            }
            return redirect()->route('admin.package.index')->with('success', __('label.package_delete'));
        } catch (Exception $e) {
            return response()->json(['status' => 400, 'errors' => $e->getMessage()]);
        }
    }
    public function show($id)
    {
        try {

            $data = Package::where('id', $id)->first();
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
