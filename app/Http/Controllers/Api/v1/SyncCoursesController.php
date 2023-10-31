<?php
namespace App\Http\Controllers\Api\v1;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cache;

class SyncCoursesController extends Controller
{
    public function index(){
        if(Cache::has('courses_cache')){
        $courses = json_encode(Cache::get('courses_cache'));
        return($courses);
        }else
        return "false";
    }
    public function store(Request $req){
      // $courses = json_decode($req['data']['courses'],true);
        
        Cache::flush();
 //Cache::add('courses_cache',$courses,10000);
 //Cache::remember('courses_cache',10000,$courses);
     Cache::put('courses_cache',$req['data']['courses'],15);
     return $req['data']['courses'];
  //  return response()->json($courses);
    }

}