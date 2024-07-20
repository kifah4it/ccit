<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Log;
use Auth;
use Exception;

class AuthController extends Controller
{
    //
    public function show()
    {
        return view('dashboard');
    }
    public function Login(Request $req)
    {

        if(!isset($_SESSION))
                session_start();
        // Courses to enroll
        if(isset($_GET['action'])){
            if($_GET['action'] == 'enroll'){
                require_once('CacheManagement.php');
                $cache = new CacheManagement();
                $cachedcourses = $cache->getcache();
                $courses = array();
                
                foreach($req->courses as $cr){
                    foreach($cachedcourses as $c){
                        if($c['id'] == $cr){
                            $courses[] = $c;
                        }
                    }
                }
                return view('login')->with('courses',$courses);
            }
                //return var_dump($courses);
              
            }

            $uerid = $_REQUEST['email'];
            $password = $_REQUEST['password'];
            $token        = env('userkey_API_key');
            $domainname   = env('LMS_URL');
            $functionname = 'local_ops_login_by_userkey';
        
            $serverurl = $domainname . '/webservice/rest/server.php' . '?wstoken=' . $token . '&wsfunction=' 
            . $functionname . '&userid='.$uerid.'&password='.$password.'&moodlewsrestformat=json';
            
            // if(isset($_SESSION['redirect'])){
            // Log::info('(Auth) $_SESSION[redirect]='.$_SESSION['redirect']);
            // $path = '&wantsurl='.urlencode($_SESSION['redirect']);
            // }
            // else
            $path = '&wantsurl='.urlencode(env('APP_URL'));
          
            $client = new \GuzzleHttp\Client(['verify' => false]);
            $r = $client->request('GET', $serverurl);
            $resp = json_decode($r->getBody());
            if($resp->status){
                $_SESSION['mdl_userinfo'] = $resp;
                return json_encode(
                    array(
                    'status' => true,
                    'loginurl' => $resp->loginurl . $path
                ));
            }
            else{
                return json_encode(
                    array(
                    'status' => false,
                    'errMsg' => $resp->loginurl
                ));
            }
            
         
}
public function Logout(Request $req)
{
    
    if(!isset($_SESSION)){
        session_start();
    }
    // if($req->ajax()){
    //     if(isset($_SESSION['mdl_userinfo'])){
    //     unset($_SESSION['mdl_userinfo']);
    //     return 'success';
    //     }
    //     else{
    //         return 'error ajax';
    //     }
    // }
    //     else{
            // if(isset($_SESSION['mdl_userinfo'])){
                unset($_SESSION['mdl_userinfo']);
                unset($_SESSION['mdl_sesskey']);
                // return Redirect::to(env('APP_URL'));
                // }
                return Redirect::to(env('APP_URL'));
                // else{
                //     return 'error http';
                // }
        }
}