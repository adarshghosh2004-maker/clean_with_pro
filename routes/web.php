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

use App\Http\Controllers\Admin\PageController;
use App\Http\Controllers\Web\AboutController;
use App\Http\Controllers\Web\HomeController;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Web\WebController;

// Artisan
Route::get('clearcache', function () {

    Artisan::call('config:clear');
    Artisan::call('config:cache');
    Artisan::call('cache:clear');
    Artisan::call('view:clear');
    Artisan::call('route:clear');
    return "<h1>All Config Cache Clear Successfully.</h1>";
});
// Version
Route::get('version', function () {
    return "<h1>
        <li>PHP : " . phpversion() . "</li>
        <li>Laravel : " . app()->version() . "</li>
    </h1>";
});

Route::get('/lang/{locale}', function ($locale) {
    if (in_array($locale, ['en', 'hi', 'fr'])) {
        session(['locale' => $locale]);
        App::setLocale($locale);
    }
    return redirect()->back();
})->name('change.language');


Route::get('/', function () {
    return view('web.welcome');
})->name('home');

Route::get('/', [WebController::class, 'index'])->name('home');

Route::get('/about', function () {
    return view('web.aboutus');
})->name('about');

Route::get('/gallery', function () {
    return view('web.gallery');
})->name('gallery');

Route::get('/specials', function () {
    return view('web.specials');
})->name('specials');

Route::get('/care', function () {
    return view('web.cleancare');
})->name('care');

Route::get('/contact', function () {
    return view('web.contactus');
})->name('contact');

Route::get('/services', function () {
    return view('web.services');
})->name('services');

Route::get('/pricing', function () {
    return view('web.pricing');
})->name('pricing');

Route::get('/feedback1', function () {
    return view('web.feedback1');
})->name('feedback1');

Route::get('/feedback2', function () {
    return view('web.feedback2');
})->name('feedback2');
