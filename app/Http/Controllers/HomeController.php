<?php

namespace App\Http\Controllers;

use App\Models\CoursesView;
use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Http;
class HomeController extends Controller
{
    //
    public function index(){
        return view('home');
    }
    public function courses($cat = null){
        $LMS_URL = env('LMS_URL');
       //  $url = $LMS_URL.'/webservice/rest/server.php?wstoken=505320c31891faef39a5c0c900220763&wsfunction=local_ops_get_courses_with_parent_cat&catname='.$cat.'&moodlewsrestformat=json';
    
           $url = 'http://localhost:8080/ccit/resources/Courses.json';
        // $response = HTTP::withOptions([
            
        // ])->get($url);
        $ch = curl_init();
     $headers = array(
        'Accept: application/json',
        'Content-Type: application/json',
        );
        
     curl_setopt($ch, CURLOPT_URL,$url);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
     curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch,CURLOPT_SSL_VERIFYHOST,0);
        curl_setopt($ch,CURLOPT_SSL_VERIFYPEER,0);
     // Timeout in seconds
     curl_setopt($ch, CURLOPT_TIMEOUT, 30);
 
      $response = curl_exec($ch);
        $courses = json_decode($response,true);
       // return var_dump($courses);
       // var_dump($courses['courses']);
        $courseslst[] = array();
        
        foreach($courses as $course){
           $CourseV = new CoursesView();
            $CourseV->Name = $course['fullname'];
            // $CourseV->Name = $course['customfields'][0]['value'] ?? '';
            $CourseV->imgSrc = $course['courseimage'];
            $CourseV->sDesc = strip_tags($course['summary']);
            $CourseV->catName = $course['categoryname'];
            $courseslst[] = $CourseV;
        }
       // var_dump($courseslst);
      return view('courses')->with('courseslst',$courseslst);
    return view('courses');
      
}

    public function switchlang(string $lang)
    {
        if($lang ==='AR'){
        //session(['lang' => 'AR']);
        //Cookie::queue(Cookie::make('lang', 'AR'));
        app()->setLocale('ar');
        return redirect()->back()->withCookie(cookie()->forever('lang','AR'));
        }
        else{
            //session(['lang' => 'EN']);
            //Cookie::queue(Cookie::make('lang', 'EN'));
            app()->setLocale('en');
            return redirect()->back()->withCookie(cookie()->forever('lang','EN'));
        }
    }
    public function course(){
        return view('course');
    }
}
