<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;

class LoginCtrl extends Controller
{

    public function Login(Request $request)
    {
     echo "dauj";
        $email = $request->email;
        $password = $request->password;
        $response = Http::get('http://127.0.0.1:8000/api/login', [
           'email'=>$email,
           'password'=>$password
     ]);

        if(count(json_decode($response))>0){
            return view('dashboard');
        }
        else{
             return view('Login');
        }

    }

}
