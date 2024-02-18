<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
class AuthController extends Controller
{
    //
    public function show(){
        return view('dashboard');
    }
    public function Login(){
        validator(request()->all(),[
            'email'=> ['required', 'email'],
            'password'=>['required']
        ])->validate();
        
        $credentials = [
            'email' => $_REQUEST['email'],
            'password' => $_REQUEST['password'],
        ];
        
        if(Auth()->attempt(request()->only(['email','password']))) {
            return redirect('dashboard');       
        }
       

        return redirect()->back()->withErrors(['email'=>'Invalid Credentials!']);
    }
}
