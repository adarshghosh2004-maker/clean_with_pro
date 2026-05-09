<?php

namespace App\Http\Middleware;

use App\Models\Common;
use App\Models\General_Setting;
use App\Models\Pages;
use App\Models\Service;
use Closure;

class Services
{
    public function handle($request, Closure $next)
    {
        $common = new Common();
        $services = Service::where('status', 1)->orderBY('id', 'desc')->get();
        $pages = Pages::get();
        
        $common->imageNameToUrl($pages, 'img', 'pages');
        $common->imageNameToUrl($services, 'banner_img', 'service');


        view()->share('services', $services);
        view()->share('pages', $pages);

        return $next($request);
    }

}
