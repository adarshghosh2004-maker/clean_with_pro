<?php

namespace App\Http\Middleware;

use App\Models\Common;
use App\Models\General_Setting;
use App\Models\Pages;
use App\Models\Service;
use Cache;
use Closure;

class Services
{
    public function handle($request, Closure $next)
    {
        $common = new Common();
        $services = Cache::rememberForever('services_list', function () {
            return Service::get();
        });
        $common->imageNameToUrl($services, 'banner_img', 'service');
        $pages = Cache::rememberForever('pages_list', function () {
            return Pages::get();
        });
        $common->imageNameToUrl($pages, 'img', 'pages');

        view()->share('services', $services);
        view()->share('pages', $pages);

        return $next($request);
    }

}
