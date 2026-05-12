<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Common;
use App\Models\Feedback;
use App\Models\Gallery;
use App\Models\Question;
use App\Models\Service;
use App\Models\User;
use App\Models\Video;
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
            $params['videos'] = Video::with('service:id,title')->orderBy('id', 'desc')->take(3)->get();
            $this->common->imageNameToUrl($params['videos'], 'image', 'video');
            $this->common->fileNameToUrl($params['videos'], 'video', 'video');

            $params['feedbacks'] = Feedback::orderBy('id', 'desc')->get();
            $params['feedbacks_reverse'] = Feedback::orderBy('id', 'asc')->get();

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
            $quote->reply = $request->reply ?? '';
            $quote->amount = $request->amount ?? 0;
            $quote->status = 0;
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
        $params['videos'] = Video::get();
        $this->common->imageNameToUrl($params['videos'], 'image', 'video');
        $this->common->fileNameToUrl($params['videos'], 'video', 'video');

        $params['feedbacks'] = Feedback::latest()->offset(3)->take(3)->get();

        return view('web.gallery', $params);
    }

    public function detail($id, Request $request)
    {

        $service = Service::find($id);
        if (!$service) {
            $service = Service::first();
        }

        $this->common->imageNameToUrl(array($service), 'banner_img', 'service');
        $this->common->imageNameToUrl(array($service), 'detail_img1', 'service');
        $this->common->imageNameToUrl(array($service), 'detail_img2', 'service');

        $gallery = Gallery::where('service_id', $service->id)->get();
        $this->common->imageNameToUrl($gallery, 'before_img', 'gallery');
        $this->common->imageNameToUrl($gallery, 'after_img', 'gallery');

        $videos = Video::where('service_id', $service->id)->get();
        $this->common->imageNameToUrl($videos, 'image', 'video');
        $this->common->fileNameToUrl($videos, 'video', 'video');

        $question = Question::where('service_id', $service->id)->first();
        $this->common->imageNameToUrl(array($question), 'img_1', 'question');
        $this->common->imageNameToUrl(array($question), 'img_2', 'question');
        $this->common->imageNameToUrl(array($question), 'img_3', 'question');

        $params['question'] = $question;
        $params['videos'] = $videos;
        $params['gallery'] = $gallery;
        $params['service'] = $service;
        return view('web.service-detail', $params);

    }

    public function about(Request $request)
    {
        $params['feedbacks'] = Feedback::latest()->take(3)->get();
        return view('web.aboutus', $params);
    }
}

