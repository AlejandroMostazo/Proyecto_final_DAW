<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class LocalizationMiddleware
{
public function handle(Request $request, Closure $next): Response{

        if(Session::get("locale") !=null){
            App::setLocale(Session::get("locale"));
        }
        else{
            Session::put("locale","es");
            App::setLocale(Session::get("locale"));
        }

        return $next($request);
    }
}