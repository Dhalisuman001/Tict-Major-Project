<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;



class LoginController extends Controller


{

    public function loginCtrl(Request $request)
    {
        session_start();
        $email = $request->email;
        $password = $request->password;
        $response = DB::select("CALL sp_getUserDetails('$email','$password');");
        $rsp_arr_length = count($response);
        if($rsp_arr_length > 0)
        {
             $_SESSION['username'] = $response[0]->{'username'};
            return view('dashboard');

        }
        else
        {
             return view('login')->with("message","'Invalid Username or Passsword'");

        }

    }

}
