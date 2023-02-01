<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function Register(Request $request)
    {
            $email = $request->email;
            $username = $request->username;
            $password = $request->password;
            $exist = DB::select("CALL sp_getUserDetails('$email','$password');");
            $rsp_arr_length = count($exist);

            if ($rsp_arr_length>0) {
              return view('login')->with("message","'Email already exist'");
            }
            else{
            $response = DB::insert("INSERT INTO userinfo_table (email,password,username) VALUES ('$email','$password','$username')");

               $_SESSION['username'] = $username;
              return view('dashboard');}
    }

    }
