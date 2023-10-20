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
    public function courses(){
        //$url = 'https://localhost/webservice/rest/server.php?wstoken=505320c31891faef39a5c0c900220763&wsfunction=core_course_get_courses_by_field&moodlewsrestformat=json';
        $url = 'http://localhost:8080/ccit/resources/CoursesDS.json';
        $response = HTTP::withOptions([
            
        ])->get($url);
        $courses = json_decode($response,true);
        //var_dump($courses->courses[0]->fullname);
        $courseslst[] = array();
        
        foreach($courses['courses'] as $course){
           $CourseV = new CoursesView();
            $CourseV->Name = $course['fullname'];
            $CourseV->imgSrc = $course['courseimage'];
            $CourseV->sDesc = strip_tags($course['summary']);
        }
      //  var_dump($courseslst[1]->Name);
      return view('courses')->with('courseslst',$courseslst);
      
}

    public function switchlang(string $lang)
    {
        if($lang ==='AR'){
        //session(['lang' => 'AR']);
        Cookie::queue(Cookie::make('lang', 'AR'));
        app()->setLocale('ar');
        return redirect()->back();
        }
        else{
            //session(['lang' => 'EN']);
            Cookie::queue(Cookie::make('lang', 'EN'));
            app()->setLocale('en');
            return redirect()->back(); 
        }
    }
}
