<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Common;
use App\Models\Feedback;
use App\Models\Gallery;
use App\Models\Invoice;
use App\Models\Notification;
use App\Models\Page;
use App\Models\Pages;
use App\Models\Question;
use App\Models\Service;
use App\Models\User;
use App\Models\Video;
use Illuminate\Support\Facades\DB;
use Exception;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class SystemSettingController extends Controller
{
    public $common;
    public function __construct()
    {
        $this->common = new Common;
    }

    public function index()
    {
        try {

            $params['data'] = [];
            return view('admin.system_setting.index', $params);
        } catch (Exception $e) {
            return response()->json(['status' => 400, 'errors' => $e->getMessage()]);
        }
    }
    public function ClearData()
    {
        try {

            $folders = ['service', 'gallery', 'video', 'question', 'pages', 'setting', 'user', 'database'];

            $files = [];
            foreach ($folders as $folder) {
                $path = 'public/' . $folder;
                $storageFiles = Storage::allFiles($path);
                $files[$folder] = array_map(fn($f) => pathinfo($f)['basename'], $storageFiles);
            }

            foreach ($files['service'] as $value) {
                $check = Service::select('id')->where('banner_img', $value)->orWhere('detail_img1', $value)->orWhere('detail_img2', $value)->first();
                if ($check == null) {
                    $this->common->deleteImageToFolder('service', $value);
                }
            }
            foreach ($files['gallery'] as $value) {
                $check = Gallery::select('id')->where('before_img', $value)->orWhere('after_img', $value)->first();
                if ($check == null) {
                    $this->common->deleteImageToFolder('gallery', $value);
                }
            }
            foreach ($files['video'] as $value) {
                $check = Video::select('id')->where('image', $value)->orWhere('video', $value)->first();
                if ($check == null) {
                    $this->common->deleteImageToFolder('video', $value);
                }
            }
            foreach ($files['question'] as $value) {
                $check = Question::select('id')->where('img_1', $value)->orWhere('img_2', $value)->orWhere('img_3', $value)->first();
                if ($check == null) {
                    $this->common->deleteImageToFolder('question', $value);
                }
            }
            foreach ($files['pages'] as $value) {
                $check = Pages::select('id')->where('img', $value)->first();
                if ($check == null) {
                    $this->common->deleteImageToFolder('pages', $value);
                }
            }
            foreach ($files['setting'] as $value) {
                $check = Page::select('id')->where('icon', $value)->first();
                $settingData = Setting_Data();
                $inUse = 'yes';
                if (
                    $settingData['app_logo'] != $value &&
                    $settingData['company_logo'] != $value &&
                    $settingData['panel_login_page_bg_image'] != $value
                ) {
                    $inUse = 'no';
                }
                if ($check == null && $inUse == 'no') {
                    $this->common->deleteImageToFolder('setting', $value);
                }
            }
            foreach ($files['user'] as $value) {
                $check = User::select('id')->where('image', $value)->first();
                if ($check == null) {
                    $this->common->deleteImageToFolder('user', $value);
                }
            }
            foreach ($files['database'] as $value) {
                $this->common->deleteImageToFolder('database', $value);
            }

            return response()->json(['status' => 200, 'success' => 'Data Clear Successfully.']);
        } catch (Exception $e) {
            return response()->json(['status' => 400, 'errors' => $e->getMessage()]);
        }
    }
    public function DownloadDB()
    {
        try {

            Artisan::call('config:clear');

            $storageAt = storage_path() . "/app/public/database";
            if (!file_exists($storageAt)) {
                File::makeDirectory($storageAt, 0755, true, true);
            }

            $mysqlHostName = env('DB_HOST');
            $mysqlUserName = env('DB_USERNAME');
            $mysqlPassword = env('DB_PASSWORD');
            $DbName = env('DB_DATABASE');

            // get all table name
            $result = DB::select("SHOW TABLES");
            $prep = "Tables_in_$DbName";

            foreach ($result as $res) {
                $tables[] =  $res->$prep;
            }

            $connect = new \PDO("mysql:host=$mysqlHostName;dbname=$DbName;charset=utf8", "$mysqlUserName", "$mysqlPassword", [\PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"]);
            $statement = $connect->prepare("SHOW TABLES");
            $statement->execute();
            $result = $statement->fetchAll();

            $output = '';
            foreach ($tables as $table) {

                $show_table_query = "SHOW CREATE TABLE " . $table . "";
                $statement = $connect->prepare($show_table_query);
                $statement->execute();
                $show_table_result = $statement->fetchAll();

                foreach ($show_table_result as $show_table_row) {
                    $output .= "\n\n" . $show_table_row["Create Table"] . ";\n\n";
                }
                $select_query = "SELECT * FROM " . $table . "";
                $statement = $connect->prepare($select_query);
                $statement->execute();
                $total_row = $statement->rowCount();

                for ($count = 0; $count < $total_row; $count++) {
                    $single_result = $statement->fetch(\PDO::FETCH_ASSOC);
                    $table_column_array = array_keys($single_result);
                    $table_value_array = array_values($single_result);
                    $output .= "\nINSERT INTO $table (";
                    $output .= "`" . implode("`, `", $table_column_array) . "`) VALUES (";
                    $output .= "'" . implode("', '", $table_value_array) . "');\n";
                }
            }

            $file_name = App_Name() . '_db_' . date('d_m_Y') . '.sql';
            $file_handle = fopen(storage_path() . '/app/public/database/' . $file_name, 'w+');
            fwrite($file_handle, $output);
            fclose($file_handle);
            header('Content-Description: File Transfer');
            header('Content-Type: application/octet-stream');
            header('Content-Disposition: attachment; filename=' . basename($file_name));
            header('Content-Transfer-Encoding: binary');
            header('Expires: 0');
            header('Cache-Control: must-revalidate');
            header('Pragma: public');
            header('Content-Length: ' . filesize(storage_path() . '/app/public/database/' . $file_name));
            ob_clean();
            flush();
            readfile(storage_path() . '/app/public/database/' . $file_name);
        } catch (Exception $e) {
            return response()->json(['status' => 400, 'errors' => $e->getMessage()]);
        }
    }
    public function CleanDatabase()
    {
        try {

            Service::query()->truncate();
            Gallery::query()->truncate();
            Video::query()->truncate();
            Question::query()->truncate();
            Feedback::query()->truncate();
            Page::query()->truncate();
            Pages::query()->truncate();
            Invoice::query()->truncate();
            User::query()->truncate();

            return response()->json(['status' => 200, 'success' => 'Data Clean Successfully.']);
        } catch (Exception $e) {
            return response()->json(['status' => 400, 'errors' => $e->getMessage()]);
        }
    }
}
