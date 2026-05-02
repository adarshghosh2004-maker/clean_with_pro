<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Common;
use App\Models\Gallery;
use App\Models\Service;
use App\Models\User;
use Illuminate\Http\Request;
use Exception;
use Illuminate\Support\Facades\Validator;

class WebController extends Controller
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
            return view('web.welcome', $params);
        } catch (Exception $e) {
            return response()->json(['status' => 400, 'errors' => $e->getMessage()]);
        }
    }
    public function store(Request $request)
    {
        try {

            $validation = Validator::make($request->all(), [
                'name' => 'required|string',
                'email' => 'required|email',
                'phone' => 'required|numeric',
                'suburb' => 'required|string',
                'date' => 'required|date',
                'service_id' => 'required',
            ]);

            if ($validation->fails()) {
                return response()->json(['status' => 400, 'errors' => $validation->errors()]);
            }

            $quote = new User();
            $quote->name = $request->name;
            $quote->email = $request->email;
            $quote->phone = $request->phone;
            $quote->service_id = $request->service_id;
            $quote->suburb = $request->suburb;
            $quote->date = date('Y-m-d', strtotime($request->date));
            $quote->time = $request->time ?? '';
            $quote->msg = $request->msg ?? '';
            $quote->save();

            return response()->json(['status' => 200, 'success' => 'Quote request sent successfully.']);
        } catch (Exception $e) {
            return response()->json(['status' => 400, 'errors' => $e->getMessage()]);
        }
    }
    public function gallery(Request $request)
    {
        $params['gallery'] = Gallery::get();
        $this->common->imageNameToUrl($params['gallery'], 'before_img', 'gallery');
        $this->common->imageNameToUrl($params['gallery'], 'after_img', 'gallery');
        return view('web.gallery', $params);
    }
}
