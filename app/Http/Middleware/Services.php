<?php

namespace App\Http\Middleware;

use App\Models\Common;
use App\Models\General_Setting;
use App\Models\Pages;
use App\Models\Service;
use App\Models\Social_Link;
use Cache;
use Closure;

class Services
{
    public function handle($request, Closure $next)
    {
        $common = new Common();
        $services = Cache::rememberForever('services_list', function () {
            return Service::where('status', 1)->get();
        });
        $common->imageNameToUrl($services, 'banner_img', 'service');

        $pages = Cache::rememberForever('pages_list', function () {
            return Pages::get();
        });
        $common->imageNameToUrl($pages, 'img', 'pages');

        $social_links = Cache::rememberForever('social_links', function () {
            return Social_Link::get();
        });
        $common->imageNameToUrl($social_links, 'image', 'setting');

        view()->share('social_links', $social_links);
        view()->share('services', $services);
        view()->share('pages', $pages);

        return $next($request);
    }

}
