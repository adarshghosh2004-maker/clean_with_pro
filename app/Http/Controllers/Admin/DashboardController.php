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
            $data['total_packages'] = Package::count();
            $data['total_feedbacks'] = Feedback::count();
            $data['total_questions'] = Question::count();
            $data['total_requests'] = User::whereNotNull('service_id')->count();
            $data['active_services'] = Service::where('status', 1)->count();

            // User requests chart - assuming requests are users with service_id
            $userRequests = User::selectRaw('DATE(created_at) as date, COUNT(*) as count')
                ->whereNotNull('service_id')
                ->groupBy('date')
                ->orderBy('date')
                ->get();

            $data['user_request_dates'] = $userRequests->pluck('date')->toArray();
            $data['user_request_counts'] = $userRequests->pluck('count')->toArray();

            // Top services with most requests
            $topServices = User::selectRaw('service_id, COUNT(*) as request_count')
                ->whereNotNull('service_id')
                ->groupBy('service_id')
                ->orderBy('request_count', 'desc')
                ->limit(10)
                ->with('service')
                ->get();

            $data['top_services'] = $topServices;
            $data['top_services_labels'] = $topServices->map(function ($item) {
                return $item->service ? $item->service->title : 'Service ' . $item->service_id;
            })->toArray();
            $data['top_services_counts'] = $topServices->pluck('request_count')->toArray();

            return view('admin.dashboard.dashboard', $data);
        } catch (Exception $e) {
            return response()->json(['status' => 400, 'errors' => $e->getMessage()]);
        }
    }
}
