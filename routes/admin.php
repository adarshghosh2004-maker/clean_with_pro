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
    // Notification
    Route::resource('notification', NotificationController::class)->only(['index', 'create', 'store']);
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
    // Notification Configurations
    Route::resource('notificationconfigurations', NotificationConfigurationsController::class)->only(['index', 'store']);
    Route::resource('pages', PageController::class)->only('index', 'store', 'edit', 'update');


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
        // Notification
        Route::resource('notification', NotificationController::class)->only(['destroy']);
        Route::get('notification/setting', [NotificationController::class, 'setting'])->name('notification.setting');
        Route::post('notification/setting', [NotificationController::class, 'settingsave'])->name('notification.setting.save');
        // System Setting
        Route::get('systemsetting/downloaddb', [SystemSettingController::class, 'DownloadDB'])->name('system.setting.downloaddb');
        Route::resource('pages', PageController::class)->only(['destroy']);
        Route::resource('video', VideoController::class)->only(['destroy']);

    });
});
