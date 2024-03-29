<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use stdClass;

class SignupController extends Controller
{
    //
    public function index(){
        return view('home');
    }
    public function store(Request $request){
         // $user = new signup();
        // $user->username=$request->username;
        // $user->email=$request->email;
        // $user->password=$request->password;
        // $user->save();
        // return response('successfully');
        $data = "&username=".$request->username."&password=".$request->Password."&firstname=".$request->name
        ."&lastname=".$request->last_name."&email=".$request->Email."&arabfullname=".$request->arabicname
        ."&mobnum=".$request->mob_num."&birthdate=".$request->birthdate;
        $LMS_URL = env('LMS_URL');
        $url = $LMS_URL.'/webservice/rest/server.php?wstoken=505320c31891faef39a5c0c900220763&wsfunction=local_ops_register_student'
        .$data.'&moodlewsrestformat=json';
        
        $ch = curl_init();
        $headers = array(
            'Accept: application/json',
            'Content-Type: application/json',
        );
        
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch,CURLOPT_POST,1);
        //curl_setopt($ch,CURLOPT_POSTFIELDS,"username=testtooo266");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        // Timeout in seconds
        curl_setopt($ch, CURLOPT_TIMEOUT, 30);
        $response = curl_exec($ch);
        $result = json_decode($response, true);
        $res = array();
        switch($result['status']){
            case 'error':
                $res['status'] = 'error';
                $res['messages'] = (array) $result['messages'];
                Log::error('Signup error occured: '. json_encode($result['messages']));
                break;
            case 'success':
                $res['status'] = 'success';
                break;
            case 'warnings':
                $res['status'] = 'warnings';
                $res['messages'] = array();
                
                foreach($result['messages'] as $msg){
                    switch($msg[0]){
                        case 'password':
                            $res['messages'][] = ['password' => __('messages.invalid_password')];
                            break;
                        case 'email':
                            $res['messages'][] = ['email'=>__('messages.Invalid_email'),];
                            break;
                        case 'username':
                            $res['messages'][] = ['username'=>__('messages.used_username'),];
                            break;
                        case 'profile_field_m_num':
                            $res['messages'][] = ['mobilenum'=>__('messages.used_mobilenumber'),];
                            break;
                    }
                }
                break;
        }
        return $res;
    }
}
