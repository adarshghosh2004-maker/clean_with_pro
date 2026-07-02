<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AudioBook;
use App\Models\Author_Request;
use App\Models\Common;
use App\Models\Category;
use App\Models\Content_Transaction;
use App\Models\Feature;
use App\Models\Feedback;
use App\Models\Gallery;
use App\Models\Magazine;
use App\Models\Package;
use App\Models\Question;
use App\Models\Service;
use App\Models\User;
use App\Models\Video;
use App\Models\Language;
use App\Models\Novel;
use Exception;

class DashboardController extends Controller
{
    public $common;
    private $folder_category = "category";
    private $folder_author = "user";
    private $folder_langauge = "language";
    private $folder_novels = "novels";
    private $folder_magazines = "magazines";
    private $folder_audio_books = "audio_books";
    public function __construct()
    {
        $this->common = new Common;
    }

    public function index()
    {
        try {
            $data['total_users'] = User::count();
            $data['total_services'] = Service::count();
            $data['total_videos'] = Video::count();
            $data['total_images'] = Gallery::count();
            $data['total_feedbacks'] = Feedback::count();
            $data['total_questions'] = Question::count();
            $data['pending_requests'] = User::where('status', 0)->whereNotNull('service_id')->count();
            $data['confirmed_requests'] = User::where('status', 1)->whereNotNull('service_id')->count();
            $data['completed_requests'] = User::where('status', 2)->whereNotNull('service_id')->count();
            $data['cancelled_requests'] = User::where('status', 3)->whereNotNull('service_id')->count();
            $data['active_services'] = Service::where('status', 1)->count();

            // User requests chart
            $user_year = [];
            $user_month = [];

            // Year Data
            for ($i = 1; $i <= 12; $i++) {

                $sum = User::whereMonth('created_at', $i)
                    ->whereNotNull('service_id')
                    ->count();

                $user_year[] = $sum; // use [] instead of [$i]
            }

            // Month Data
            $d = date('t');

            for ($i = 1; $i <= $d; $i++) {

                $sum = User::whereYear('created_at', date('Y'))
                    ->whereMonth('created_at', date('m'))
                    ->whereDay('created_at', $i)
                    ->whereNotNull('service_id')
                    ->count();

                $user_month[] = $sum; // use []
            }

            $data['user_year'] = $user_year;
            $data['user_month'] = $user_month;

            // Top services with most requests
            $topServices = Service::withCount([
                'user_requests' => function ($query) {
                    $query->whereNotNull('service_id');
                }
            ])->orderBy('user_requests_count', 'desc')->limit(5)->get();

            $this->common->imageNameToUrl($topServices, 'banner_img', 'service');
            $data['top_services'] = $topServices;

            $data['recent_users'] = User::orderBy('created_at', 'desc')->limit(6)->get();

            return view('admin.dashboard.dashboard', $data);
        } catch (Exception $e) {
            return response()->json(['status' => 400, 'errors' => $e->getMessage()]);
        }
    }
}
