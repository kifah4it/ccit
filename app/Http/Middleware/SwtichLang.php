<?php

namespace App\Http\Middleware;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\SignupController;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Log;

class SwtichLang {
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
      if(!isset($_SESSION))
      session_start();
       // return $next($request);
        if(!isset($_SESSION['lang'])){

           // session(['lang' => 'AR']);
          
          //  Cookie::queue(Cookie::make('lang', 'AR',));

            //return $next($request)->withCookie(cookie()->forever('lang','AR'));
          //  app()->setLocale('ar');            
          config(['app.locale' => 'ar']);
            return $next($request)->withCookie(cookie()->forever('lang','AR'));
           //return $next($request);
        }
        else{
          
         // session(['lang' => $request->cookie('lang')]);
       //   app()->setLocale($request->cookie('lang'));
         config(['app.locale' => $_SESSION['lang']]);
        //  Log::info("Locale is: ". $request->cookie('lang'));
        //  return $next($request)->withCookie(cookie()->forever('lang',$request->cookie('lang')));
          return $next($request);

        }
        
    }
}