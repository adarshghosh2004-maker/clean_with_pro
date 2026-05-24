<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use App\Http\Controllers\Admin\AppSettingController;
use App\Http\Controllers\Admin\FeatureController;
use App\Http\Controllers\Admin\FeedbackController;
use App\Http\Controllers\Admin\GalleryController;
use App\Http\Controllers\Admin\PackageController;
use App\Http\Controllers\Admin\PageController;
use App\Http\Controllers\Admin\PagesController;
use App\Http\Controllers\Admin\QuestionController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\NotificationConfigurationsController;
use App\Http\Controllers\Admin\NotificationController;
use App\Http\Controllers\Admin\PanelSettingController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\SystemSettingController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\VideoController;
use Illuminate\Support\Facades\Route;



// Login-Logout
Route::get('login', [LoginController::class, 'login'])->name('admin.login');
Route::post('login', [LoginController::class, 'save_login'])->name('admin.save.login');
Route::get('logout', [LoginController::class, 'logout'])->name('admin.logout');


Route::group(['middleware' => 'authadmin', 'as' => 'admin.'], function () {

    Route::any('video/savechunk', [VideoController::class, 'savechunk']);


    // Dashboard
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
    // Profile
    Route::resource('profile', ProfileController::class)->only(['index', 'store']);
    Route::post('profile/changepassword', [ProfileController::class, 'ChangePassword'])->name('profile.changepassword');
    // Question
    Route::resource('question', QuestionController::class)->only(['index', 'store', 'edit', 'update', 'show']);
    // Service
    Route::resource('service', ServiceController::class)->only(['index', 'create', 'store', 'edit', 'update', 'show']);
    Route::post('service/change_status', [ServiceController::class, 'change_status'])->name('service.change.status');

    // Video
    Route::resource('video', VideoController::class)->only(['index', 'create', 'store', 'edit', 'update', 'show']);
    Route::post('video/change_status', [VideoController::class, 'change_status'])->name('video.change.status');
    // Gallery
    Route::resource('gallery', GalleryController::class)->only(['index', 'create', 'store', 'edit', 'update', 'show']);
    Route::post('gallery/change_status', [GalleryController::class, 'change_status'])->name('gallery.change.status');
    // User
    Route::resource('user', UserController::class)->only(['index', 'create', 'store', 'edit', 'update', 'show']);
    Route::get('user/details/{id}', [UserController::class, 'details'])->name('user.details');
    Route::resource('feedback', FeedbackController::class)->only(['index', 'store', 'update', 'show']);
    // App Setting
    Route::get('appsetting', [AppSettingController::class, 'index'])->name('appsetting.index');
    Route::post('appsetting/app', [AppSettingController::class, 'app'])->name('appsetting.app');
    Route::post('appsetting/smtp', [AppSettingController::class, 'smtp'])->name('appsetting.smtp');
    Route::post('appsetting/testsmtp', [AppSettingController::class, 'testsmtp'])->name('appsetting.testsmtp');
    // panel setting
    Route::get('panelsetting', [PanelSettingController::class, 'index'])->name('panelsetting.index');
    Route::post('panelsetting/save', [PanelSettingController::class, 'save'])->name('panelsetting.save');
    // System Setting
    Route::get('systemsetting', [SystemSettingController::class, 'index'])->name('system.setting.index');
    Route::post('systemsetting/cleardata', [SystemSettingController::class, 'ClearData'])->name('system.setting.cleardata');
    Route::post('systemsetting/cleandatabase', [SystemSettingController::class, 'CleanDatabase'])->name('system.setting.cleandatabase');
    Route::resource('pages', PagesController::class)->only('index', 'store', 'edit', 'update');
    // Pages
    Route::resource('page', PageController::class)->only(['index', 'create', 'store', 'edit', 'update', 'show']);
    Route::post('page/layout', [PageController::class, 'layout'])->name('page.layout');


    Route::group(['middleware' => 'checkadmin'], function () {

        // Question
        Route::resource('question', QuestionController::class)->only(['destroy']);
        // Service
        Route::resource('service', ServiceController::class)->only(['destroy']);
        // Gallery
        Route::resource('gallery', GalleryController::class)->only(['destroy']);
        // User
        Route::resource('user', UserController::class)->only(['destroy']);
        // feedback
        Route::resource('feedback', FeedbackController::class)->only(['destroy']);
        // System Setting
        Route::get('systemsetting/downloaddb', [SystemSettingController::class, 'DownloadDB'])->name('system.setting.downloaddb');
        Route::resource('pages', PagesController::class)->only(['destroy']);   // Pages
        Route::resource('page', PageController::class)->only(['destroy']);
        Route::resource('video', VideoController::class)->only(['destroy']);


        // Route 1 — returns JSON for the modal
        Route::get(
            'user/{id}/invoice-data',
            [UserController::class, 'getInvoiceData']
        )->name('user.invoice.data');

        // Route 2 — streams the PDF download
        Route::get(
            'user/{id}/invoice-download',
            [UserController::class, 'downloadInvoice']
        )->name('user.invoice.download');

        // Route 3 — saves invoice to database
        Route::post(
            'user/invoice-save',
            [UserController::class, 'saveInvoice']
        )->name('user.invoice.save');

    });
});
