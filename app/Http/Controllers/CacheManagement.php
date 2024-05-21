<?php 
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;
class CacheManagement{
    public function __construct(){
        if(Cache::has('courses_cache'))
        return;
         $LMS_URL = env('LMS_URL');
         $key = env('localops_API_key');
         $url = $LMS_URL.'/webservice/rest/server.php?wstoken='.$key.'&wsfunction=local_ops_get_courses_with_parent_cat&catname&moodlewsrestformat=json';
         //$url = $LMS_URL.'/webservice/rest/server.php?wstoken=505320c31891faef39a5c0c900220763&wsfunction=local_ops_enroll_student&username=testsss&courses[0]=13&moodlewsrestformat=json';
      //  $url = 'http://localhost:8080/ccit/resources/Courses.json';
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
     curl_setopt($ch, CURLOPT_TIMEOUT, 120);
 
      $response = curl_exec($ch);
        $data = json_decode($response,true);
        Cache::put('courses_cache',$data['courses']);
        Log::info('courses re-cached');
       // Cache::rememberForever('courses_cache',$data['courses']);
       // return $data['courses'];
}
public function getcache(){
    return Cache::get('courses_cache');
}
}

?>