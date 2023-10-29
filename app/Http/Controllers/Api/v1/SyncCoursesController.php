<?php
namespace App\Http\Controllers\Api\v1;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cache;

class SyncCoursesController extends Controller
{
public function index(){
    return Cache::store('apc')->get('courses_cache');
}
public function store(Request $req){
Cache::store('apc')->put('courses_cache',$req,2);
return response()->json('done');
}

}