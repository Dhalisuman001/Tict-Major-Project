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
            $Email = $request->email;
            $Usename = $request->username;
            $Password = $request->password;
            $exist = DB::select("SELECT * FROM userinfo_table WHERE	email = '$Email' ");
            $rsp_arr_length = count($exist);
            // $response = DB::select("CALL sp_setUserDetails('".$UsenFullame."','".$Usename."','".$Password."');");



            if ($rsp_arr_length>0) {
              return view('login')->with("message","'Email already exist'");
            }
            else{
            $response = DB::select("INSERT INTO userinfo_table (email,password,username) VALUES ('$Email','$Password','$Usename')");

               $_SESSION['username'] = $Usename;
              return view('dashboard');}
    }

    }
