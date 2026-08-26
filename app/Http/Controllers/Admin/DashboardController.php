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
use Illuminate\Http\Request;
use Carbon\Carbon;
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

            // User requests chart - Current Year and Current Month initial data
            $currentYear = (int)date('Y');
            $currentMonth = (int)date('m');

            // Year Data
            $yearCounts = User::whereNotNull('service_id')
                ->whereYear('created_at', $currentYear)
                ->selectRaw('MONTH(created_at) as month_num, COUNT(*) as aggregate')
                ->groupBy('month_num')
                ->pluck('aggregate', 'month_num')
                ->toArray();

            $user_year = [];
            for ($i = 1; $i <= 12; $i++) {
                $user_year[] = (int)($yearCounts[$i] ?? 0);
            }

            // Month Data
            $daysInMonth = Carbon::createFromDate($currentYear, $currentMonth, 1)->daysInMonth;
            $monthCounts = User::whereNotNull('service_id')
                ->whereYear('created_at', $currentYear)
                ->whereMonth('created_at', $currentMonth)
                ->selectRaw('DAY(created_at) as day_num, COUNT(*) as aggregate')
                ->groupBy('day_num')
                ->pluck('aggregate', 'day_num')
                ->toArray();

            $user_month = [];
            for ($i = 1; $i <= $daysInMonth; $i++) {
                $user_month[] = (int)($monthCounts[$i] ?? 0);
            }

            $data['user_year'] = $user_year;
            $data['user_year_total'] = array_sum($user_year);
            $data['user_month'] = $user_month;
            $data['current_year'] = $currentYear;
            $data['current_month'] = $currentMonth;

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

    public function getChartData(Request $request)
    {
        try {
            $view = $request->input('view', 'year');
            $year = (int)$request->input('year', date('Y'));
            $month = (int)$request->input('month', date('m'));

            $currentYear = (int)date('Y');
            $currentMonth = (int)date('m');

            if ($year > $currentYear) {
                $year = $currentYear;
            }

            if ($view === 'month') {
                if ($year === $currentYear && $month > $currentMonth) {
                    $month = $currentMonth;
                }
                if ($month < 1) $month = 1;
                if ($month > 12) $month = 12;

                $daysInMonth = Carbon::createFromDate($year, $month, 1)->daysInMonth;

                $counts = User::whereNotNull('service_id')
                    ->whereYear('created_at', $year)
                    ->whereMonth('created_at', $month)
                    ->selectRaw('DAY(created_at) as day_num, COUNT(*) as aggregate')
                    ->groupBy('day_num')
                    ->pluck('aggregate', 'day_num')
                    ->toArray();

                $data = [];
                $categories = [];
                $totalQuotes = 0;

                for ($day = 1; $day <= $daysInMonth; $day++) {
                    $count = (int)($counts[$day] ?? 0);
                    $data[] = $count;
                    $categories[] = (string)$day;
                    $totalQuotes += $count;
                }

                $monthName = Carbon::createFromDate($year, $month, 1)->format('F Y');

                return response()->json([
                    'status' => 200,
                    'view' => 'month',
                    'year' => $year,
                    'month' => $month,
                    'month_name' => $monthName,
                    'days_in_month' => $daysInMonth,
                    'categories' => $categories,
                    'series_data' => $data,
                    'total_quotes' => $totalQuotes,
                    'is_current_month' => ($year === $currentYear && $month === $currentMonth)
                ]);
            } else {
                // Year view
                $counts = User::whereNotNull('service_id')
                    ->whereYear('created_at', $year)
                    ->selectRaw('MONTH(created_at) as month_num, COUNT(*) as aggregate')
                    ->groupBy('month_num')
                    ->pluck('aggregate', 'month_num')
                    ->toArray();

                $data = [];
                $totalQuotes = 0;
                for ($m = 1; $m <= 12; $m++) {
                    $count = (int)($counts[$m] ?? 0);
                    $data[] = $count;
                    $totalQuotes += $count;
                }

                return response()->json([
                    'status' => 200,
                    'view' => 'year',
                    'year' => $year,
                    'categories' => ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
                    'series_data' => $data,
                    'total_quotes' => $totalQuotes
                ]);
            }
        } catch (Exception $e) {
            return response()->json(['status' => 400, 'errors' => $e->getMessage()]);
        }
    }
}
