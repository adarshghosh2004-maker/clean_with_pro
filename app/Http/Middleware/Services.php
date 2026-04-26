<?php

namespace App\Http\Middleware;

use App\Models\Common;
use App\Models\Pages;
use App\Models\Service;
use Closure;

class Services
{
    public function handle($request, Closure $next)
    {
        $common=new Common();
        $services = Service::get();
        $pages = Pages::get();

        $common->imageNameToUrl($pages,'img','pages');
        

        view()->share('services', $services);
        view()->share('pages', $pages);

        return $next($request); 
    }

}
