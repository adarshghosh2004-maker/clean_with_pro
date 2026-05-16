<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Common;
use App\Models\Service;
use App\Models\Video;
use Cache;
use Illuminate\Http\Request;
use Exception;
use Illuminate\Support\Facades\Validator;


class VideoController extends Controller
{
    private $folder = "video";
    public $common;

    public function __construct()
    {
        $this->common = new Common;
    }

    public function index(Request $request)
    {
        try {
            $params['data'] = [];
            $params['services'] = Service::where('status', 1)->orderBy('id', 'desc')->get();

            if ($request->ajax()) {

                $input_search = $request['input_search'];

                $query = Video::with('service');

                if (!empty($input_search)) {
                    $query->whereHas('service', function ($q) use ($input_search) {
                        $q->where('title', 'LIKE', "%{$input_search}%");
                    });
                }

                $data = $query->latest()->get();

                $this->common->imageNameToUrl($data, 'image', $this->folder);
                $this->common->fileNameToUrl($data, 'video', $this->folder);

                return DataTables()::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function ($row) {
                        $delete = ' <form onsubmit="return confirm(\'' . __('label.delete_video_msg') . '\');" method="POST"  action="' . route('admin.video.destroy', [$row->id]) . '">
                    <input type="hidden" name="_token" value="' . csrf_token() . '">
                    <input type="hidden" name="_method" value="DELETE">
                    <button type="submit" class="edit-delete-btn" style="outline: none;" title="Delete"><i class="fa-solid fa-trash-can fa-xl"></i></button></form>';

                        $btn = '<div class="d-flex justify-content-center" title="Edit">';
                        $btn .= '<a class="edit-delete-btn mr-4" title="Edit" href="' . route('admin.video.edit', [$row->id]) . '">';
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
                    ->addColumn('video', function ($row) {
                        return '<a class="edit-delete-btn mr-4 video" title="video" data-target="#videoModal" data-toggle="modal" data-video="' . $row->video . '" data-image="' . $row->image . '" >
                        <i class="fa-solid fa-video fa-xl"></i></a>';
                    })
                    ->rawColumns(['action', 'status', 'video'])
                    ->make(true);
            }
            $params['setting'] = Setting_Data();

            return view('admin.video.index', $params);
        } catch (Exception $e) {
            return response()->json(array('status' => 400, 'errors' => $e->getMessage()));
        }
    }
    public function create()
    {
        try {
            $params['data'] = [];

            return view('admin.video.add', $params);
        } catch (Exception $e) {
            return response()->json(array('status' => 400, 'errors' => $e->getMessage()));
        }
    }
    public function store(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'service_id' => 'required',
                'video' => 'required',
                'image' => 'required|image|mimes:jpeg,jpg,png,webp',
            ]);
            if ($validator->fails()) {
                $errs = $validator->errors()->all();
                return response()->json(array('status' => 400, 'errors' => $errs));
            }

            $requestData = $request->all();

            if (isset($requestData['image'])) {

                $files = $requestData['image'];
                $requestData['image'] = $this->common->saveImage($files, $this->folder, "video_");
            }

            $video_data = Video::updateOrCreate(['id' => $requestData['id']], $requestData);

            if (isset($video_data->id)) {
                $service = Service::find($requestData['service_id']);

                Cache::forget('home_videos');
                Cache::forget('gallery_videos');
                Cache::forget("service_videos_" . $service->slug);

                return response()->json(array('status' => 200, 'success' => __('label.video_save')));
            } else {
                return response()->json(array('status' => 400, 'errors' => __('label.video_not_save')));
            }
        } catch (Exception $e) {
            return response()->json(array('status' => 400, 'errors' => $e->getMessage()));
        }
    }
    public function edit($id)
    {
        try {
            $params['data'] = Video::where('id', $id)->first();

            $this->common->imageNameToUrl(array($params['data']), 'image', $this->folder);
            $this->common->fileNameToUrl(array($params['data']), 'video', $this->folder);

            if ($params['data'] != null) {
                return view('admin.video.edit', $params);
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
                'image' => 'image|mimes:jpeg,jpg,png,webp',
            ]);
            if ($validator->fails()) {
                $errs = $validator->errors()->all();
                return response()->json(array('status' => 400, 'errors' => $errs));
            }

            $requestData = $request->all();

            if (isset($requestData['image'])) {
                $files = $requestData['image'];
                $requestData['image'] = $this->common->saveImage($files, $this->folder, "video_");

                $this->common->deleteImageToFolder($this->folder, basename($requestData['old_image']));
            }

            if (isset($requestData['video']) && $requestData['video'] != "") {
                $this->common->deleteImageToFolder($this->folder, basename($requestData['old_video']));
            } else {
                unset($requestData['video']);
            }

            unset($requestData['old_image'], $requestData['old_video']);

            $video_data = Video::updateOrCreate(['id' => $requestData['id']], $requestData);
            if (isset($video_data->id)) {
                $service = Service::find($requestData['service_id']);

                Cache::forget('home_videos');
                Cache::forget('gallery_videos');
                Cache::forget("service_videos_" . $service->slug);

                return response()->json(array('status' => 200, 'success' => __('label.video_update')));
            } else {
                return response()->json(array('status' => 400, 'errors' => __('label.video_not_update')));
            }
        } catch (Exception $e) {
            return response()->json(array('status' => 400, 'errors' => $e->getMessage()));
        }
    }
    public function destroy($id)
    {
        try {
            $data = Video::where('id', $id)->first();
            if ($data) {
                $service = Service::find($data['service_id']);

                Cache::forget('home_videos');
                Cache::forget('gallery_videos');
                Cache::forget("service_videos_" . $service->slug);
                
                $this->common->deleteImageToFolder($this->folder, $data['image']);
                $data->delete();
            }
            return redirect()->back()->with('success', __('label.video_delete'));
        } catch (Exception $e) {
            return response()->json(array('status' => 400, 'errors' => $e->getMessage()));
        }
    }
    public function change_status(Request $request)
    {
        try {
            $data = Video::where('id', $request->id)->first();

            if (!$data) {
                return response()->json(['status' => 400, 'errors' => __('label.video_not_found')]);
            }

            $data->status = $data->status ? 0 : 1;
            $data->save();

            return response()->json(['status' => 200, 'success' => __('label.status_changed'), 'status_code' => $data->status]);
        } catch (Exception $e) {
            return response()->json(array('status' => 400, 'errors' => $e->getMessage()));
        }
    }
    public function saveChunk()
    {

        @set_time_limit(5 * 60);

        $targetDir = storage_path('/app/public/video');
        $cleanupTargetDir = true; // Remove old files
        $maxFileAge = 5 * 3600; // Temp file age in seconds

        // Create target dir
        if (!file_exists($targetDir)) {
            @mkdir($targetDir);
        }

        // Get a file name
        if (isset($_REQUEST["name"])) {
            $fileName = $_REQUEST["name"];
        } elseif (!empty($_FILES)) {
            $fileName = $_FILES["file"]["name"];
        } else {
            $fileName = uniqid("file_");
        }
        $filePath = $targetDir . DIRECTORY_SEPARATOR . $fileName;

        // Chunk information
        $chunk = isset($_REQUEST["chunk"]) ? intval($_REQUEST["chunk"]) : 0;
        $chunks = isset($_REQUEST["chunks"]) ? intval($_REQUEST["chunks"]) : 0;

        // Remove old temp files
        if ($cleanupTargetDir && is_dir($targetDir) && $dir = opendir($targetDir)) {
            while (($file = readdir($dir)) !== false) {
                $tmpfilePath = $targetDir . DIRECTORY_SEPARATOR . $file;

                // Remove temp file if it is older than the max age and not the current file
                if (preg_match('/\.part$/', $file) && (filemtime($tmpfilePath) < time() - $maxFileAge)) {
                    @unlink($tmpfilePath);
                }
            }
            closedir($dir);
        } else {
            die('{"jsonrpc" : "2.0", "error" : {"code": 100, "message": "Failed to open temp directory."}, "id" : "id"}');
        }

        // Open temp file
        if (!$out = @fopen("{$filePath}.part", $chunks ? "ab" : "wb")) {
            die('{"jsonrpc" : "2.0", "error" : {"code": 102, "message": "Failed to open output stream."}, "id" : "id"}');
        }

        if (!empty($_FILES)) {
            if ($_FILES["file"]["error"] || !is_uploaded_file($_FILES["file"]["tmp_name"])) {
                die('{"jsonrpc" : "2.0", "error" : {"code": 103, "message": "Failed to move uploaded file."}, "id" : "id"}');
            }

            // Read binary input stream and append it to temp file
            if (!$in = @fopen($_FILES["file"]["tmp_name"], "rb")) {
                die('{"jsonrpc" : "2.0", "error" : {"code": 101, "message": "Failed to open input stream."}, "id" : "id"}');
            }
        } else {
            if (!$in = @fopen("php://input", "rb")) {
                die('{"jsonrpc" : "2.0", "error" : {"code": 101, "message": "Failed to open input stream."}, "id" : "id"}');
            }
        }

        while ($buff = fread($in, 4096)) {
            fwrite($out, $buff);
        }

        @fclose($out);
        @fclose($in);

        // Check if file has been uploaded
        if (!$chunks || $chunk == $chunks - 1) {
            // Strip the temp .part suffix off
            rename("{$filePath}.part", $filePath);

            // Generate a new filename based on the current date and time
            $extension = pathinfo($fileName, PATHINFO_EXTENSION); // Get the file extension from the original filename
            $newFileName = 'video' . date('_d_m_Y_H_i_s') . time() . '.' . $extension; // Use the extracted extension
            $newFilePath = $targetDir . DIRECTORY_SEPARATOR . $newFileName;

            // Rename the uploaded file to the new filename
            rename($filePath, $newFilePath);

            // Send the new file name back to the client
            die(json_encode(array('jsonrpc' => '2.0', 'result' => $newFileName, 'id' => 'id')));
        }

        // Return Success JSON-RPC response
        die('{"jsonrpc" : "2.0", "result" : null, "id" : "id"}');
    }
}
