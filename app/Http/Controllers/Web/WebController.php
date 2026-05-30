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
use Illuminate\Support\Facades\Cache;

class WebController extends Controller
{
    private $folder = "service";
    public $common;

    public function __construct()
    {
        $this->common = new Common;
    }

    // ✅ Home Page with Cache
    public function index(Request $request)
    {
        try {

            // Cache videos
            $params['videos'] = Cache::remember('home_videos', 60, function () {
                return Video::with('service:id,title')->orderBy('id', 'desc')->take(3)->get();
            });
            $this->common->imageNameToUrl($params['videos'], 'image', 'video');
            $this->common->fileNameToUrl($params['videos'], 'video', 'video');

            // Cache feedbacks
            $params['feedbacks'] = Cache::remember('feedbacks_desc', 60, function () {
                return Feedback::orderBy('id', 'desc')->get();
            });
            $params['feedbacks_reverse'] = Cache::remember('feedbacks_asc', 60, function () {
                return Feedback::orderBy('id', 'asc')->get();
            });

            return view('web.welcome', $params);
        } catch (Exception $e) {
            return response()->json(['status' => 400, 'errors' => $e->getMessage()]);
        }
    }

    // ✅ Services Page with Cache
    public function services(Request $request)
    {
        try {
            return view('web.services');
        } catch (Exception $e) {
            return response()->json(['status' => 400, 'errors' => $e->getMessage()]);
        }
    }

    // ✅ Store Quote Request (no cache needed here)
    public function store(Request $request)
    {
        try {
            $validation = Validator::make($request->all(), [
                'name' => 'required|string',
                'email' => 'required|email',
                'phone' => 'required|numeric',
                'suburb' => 'required|string',
                'date' => 'required|date|after_or_equal:today',
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

            $quote->load('service');
            $this->common->Send_Mail(9, $quote->email, $quote);
            $this->common->Send_Mail(10, Setting_Data()['email'], $quote);

            return response()->json(['status' => 200, 'success' => 'Quote request sent successfully.']);
        } catch (Exception $e) {
            return response()->json(['status' => 400, 'errors' => $e->getMessage()]);
        }
    }

    // ✅ Gallery Page with Cache
    public function gallery(Request $request)
    {
        $params['gallery'] = Cache::rememberForever('gallery_list', function () {
            return Gallery::get();
        });
        $this->common->imageNameToUrl($params['gallery'], 'before_img', 'gallery');
        $this->common->imageNameToUrl($params['gallery'], 'after_img', 'gallery');

        $params['videos'] = Cache::rememberForever('gallery_videos', function () {
            return Video::get();
        });
        $this->common->imageNameToUrl($params['videos'], 'image', 'video');
        $this->common->fileNameToUrl($params['videos'], 'video', 'video');

        $params['feedbacks'] = Cache::rememberForever('gallery_feedbacks', function () {
            return Feedback::latest()->offset(3)->take(3)->get();
        });

        return view('web.gallery', $params);
    }

    // ✅ Service Detail Page with Cache
    public function serviceDetail($slug, Request $request)
    {
        $service = Cache::rememberForever("service_detail_$slug", function () use ($slug) {
            return Service::where('slug', $slug)->where('status', 1)->first();
        });

        if (!$service) {
            $service = Service::find($slug);
        }

        if (!$service) {
            $service = Service::where('status', 1)->first();
        }

        $this->common->imageNameToUrl([$service], 'banner_img', 'service');
        $this->common->imageNameToUrl([$service], 'detail_img1', 'service');
        $this->common->imageNameToUrl([$service], 'detail_img2', 'service');

        $gallery = Cache::rememberForever("service_gallery_$slug", function () use ($service) {
            return Gallery::where('service_id', $service->id)->get();
        });
        $this->common->imageNameToUrl($gallery, 'before_img', 'gallery');
        $this->common->imageNameToUrl($gallery, 'after_img', 'gallery');

        $videos = Cache::rememberForever("service_videos_$slug", function () use ($service) {
            return Video::where('service_id', $service->id)->get();
        });
        $this->common->imageNameToUrl($videos, 'image', 'video');
        $this->common->fileNameToUrl($videos, 'video', 'video');

        $question = Cache::rememberForever("service_question_$slug", function () use ($service) {
            return Question::where('service_id', $service->id)->first();
        });
        $this->common->imageNameToUrl([$question], 'img_1', 'question');
        $this->common->imageNameToUrl([$question], 'img_2', 'question');
        $this->common->imageNameToUrl([$question], 'img_3', 'question');

        $params['question'] = $question;
        $params['videos'] = $videos;
        $params['gallery'] = $gallery;
        $params['service'] = $service;

        return view('web.service-detail', $params);
    }

    // ✅ About Page with Cache
    public function about(Request $request)
    {
        $params['feedbacks'] = Cache::rememberForever('about_feedbacks', function () {
            return Feedback::latest()->take(3)->get();
        });
        return view('web.aboutus', $params);
    }

    // ✅ Google Ads Landing Page with Cache
    public function landingPage(Request $request)
    {
        try {
            $params['feedbacks'] = Cache::rememberForever('landing_feedbacks', function () {
                return Feedback::latest()->take(6)->get();
            });
            return view('web.landing', $params);
        } catch (Exception $e) {
            return response()->json(['status' => 400, 'errors' => $e->getMessage()]);
        }
    }
}
