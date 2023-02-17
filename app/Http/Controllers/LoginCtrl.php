<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;

class LoginCtrl extends Controller
{

    public function Login(Request $request)
    {

        $email = $request->email;
        $password = $request->password;
        $response = Http::get('http://127.0.0.1:8000/api/login', [
           'email'=>$email,
           'password'=>$password
     ]);
        $res=json_decode($response);

        if(count(json_decode($response))>0){

            session(['fullname'=>$res[0]->fullname]);
            session(['username'=>$res[0]->username]);
            session(['email'=>$res[0]->email]);
            return view('dashboard');
        }
        else{
             return view('Login');
        }

    }

}
