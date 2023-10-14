<?php

namespace App\Http\Controllers;

use GuzzleHttp\Psr7\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

class HomeController extends Controller
{
    //
    public function index(){
        return view('home');
    }
    public function switchlang(string $lang)
    {
        if($lang ==='AR'){
        session(['lang' => 'AR']);
        Cookie::queue(Cookie::make('lang', 'AR'));
        app()->setLocale('ar');
        //return redirect()->back()->withCookie(cookie()->forever('lang','AR'));
        return redirect()->back();
    }
        else{
            session(['lang' => 'EN']);
            Cookie::queue(Cookie::make('lang', 'EN'));
            app()->setLocale('en');
            return redirect()->back(); 
            // return redirect()->back()->withCookie(cookie()->forever('lang','EN'));fjaskfj hithub dasd 
        }
    }
}
