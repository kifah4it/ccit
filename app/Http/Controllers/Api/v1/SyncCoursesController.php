<?php
namespace App\Http\Controllers\Api\v1;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;
class SyncCoursesController extends Controller
{
    public function index(){
        if(Cache::has('courses_cache')){
        $courses = Cache::get('courses_cache');
        return($courses);
        }else
        return "false";
    }
    public function store(Request $req){
        Cache::flush();
 //Cache::add('courses_cache',$courses,10000);
 //Cache::remember('courses_cache',10000,$courses);
    // Cache::put('courses_cache',json_decode($req,true));
    Log::info('courses modified or created by LMS');
    return "success";
  //  return response()->json($courses);
    }

}