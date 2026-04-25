<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Common;
use App\Models\Service;
use Illuminate\Http\Request;
use Exception;

class HomeController extends Controller
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
            $params['services'] = Service::get();
            $this->common->imageNameToUrl($params['services'], 'banner_img', $this->folder);
            return view('web.home.index', $params);
        } catch (Exception $e) {
            return response()->json(['status' => 400, 'errors' => $e->getMessage()]);
        }
    }
}
