<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AudioBook;
use App\Models\Author_Request;
use App\Models\Common;
use App\Models\Category;
use App\Models\Content_Transaction;
use App\Models\Feature;
use App\Models\Magazine;
use App\Models\Question;
use App\Models\User;
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

            return view('admin.dashboard.dashboard');
        } catch (Exception $e) {
            return response()->json(['status' => 400, 'errors' => $e->getMessage()]);
        }
    }
}
