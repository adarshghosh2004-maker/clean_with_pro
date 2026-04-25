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
use Illuminate\Support\Facades\Route;



    // Login-Logout
    Route::get('login', [LoginController::class, 'login'])->name('admin.login');
    Route::post('login', [LoginController::class, 'save_login'])->name('admin.save.login');
    Route::get('logout', [LoginController::class, 'logout'])->name('admin.logout');

    Route::group(['middleware' => 'authadmin', 'as' => 'admin.'], function () {

        // Dashboard
        Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
        // Profile
        Route::resource('profile', ProfileController::class)->only(['index', 'store']);
        Route::post('profile/changepassword', [ProfileController::class, 'ChangePassword'])->name('profile.changepassword');
        // Feature
        Route::resource('feature', FeatureController::class)->only(['index', 'store', 'update', 'show']);
        // Question
        Route::resource('question', QuestionController::class)->only(['index', 'store','edit', 'update', 'show']);
        // Package
        Route::resource('package', PackageController::class)->only(['index', 'store', 'update', 'show']);
        // Service
        Route::resource('service', ServiceController::class)->only(['index', 'create', 'store', 'edit', 'update', 'show']);
        Route::post('service/change_status', [ServiceController::class, 'change_status'])->name('service.change.status');
        // Gallery
        Route::resource('gallery', GalleryController::class)->only(['index', 'create', 'store', 'edit', 'update', 'show']);
        Route::post('gallery/change_status', [GalleryController::class, 'change_status'])->name('gallery.change.status');
        // User
        Route::resource('user', UserController::class)->only(['index', 'create', 'store', 'edit', 'update', 'show']);
        Route::resource('feedback', FeedbackController::class)->only(['index', 'store','update','show']);
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

        Route::group(['middleware' => 'checkadmin'], function () {

            // Feature
            Route::resource('feature', FeatureController::class)->only(['destroy']);
            // Question
            Route::resource('question', QuestionController::class)->only(['destroy']);
            // Plan
            Route::resource('package', PackageController::class)->only(['destroy']);
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
        });
    });
