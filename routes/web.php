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
use App\Models\Gallery;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Web\WebController;
use Spatie\Sitemap\SitemapGenerator;

// Artisan
Route::get('clearcache', function () {

    Artisan::call('config:clear');
    Artisan::call('config:cache');
    Artisan::call('cache:clear');
    Artisan::call('view:clear');
    Artisan::call('route:clear');
    return "<h1>All Config Cache Clear Successfully.</h1>";
});

    Route::get('pages/{slug}', [PageController::class, 'page_view'])->name('page.view');

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

Route::get('/', [WebController::class, 'index'])->name('home');

Route::get('/about-us', [WebController::class, 'about'])->name('about');

Route::get('/specials', function () {
    return view('web.specials');
})->name('specials');

Route::get('/contact-us', function () {
    return view('web.contactus');
})->name('contact');

Route::get('/services', function () {
    return view('web.services');
})->name('services');

Route::get('/pricing', function () {
    return view('web.pricing');
})->name('pricing');

Route::get('/feedback', function () {
    return view('web.feedback');
})->name('feedback');

Route::resource('quote', WebController::class)->only('store');
Route::get('gallery', [WebController::class, 'gallery'])->name('gallery');

Route::get('/services/{slug}', [WebController::class, 'serviceDetail'])->name('services_detail');

Route::get('/generate-sitemap', function () {

    SitemapGenerator::create(config('app.url'))
        ->writeToFile(public_path('sitemap.xml'));

    return "Sitemap generated successfully";
});