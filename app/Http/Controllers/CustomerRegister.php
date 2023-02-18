<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
use App\Http\Controllers\DeviceStatsCtrl;

class CustomerRegister extends Controller
{
     public function Index()
    {
        if (session('username')=='') {
           return view('Login');
        }
        $data=['fullname'=>session('fullname'),'username'=>session('username')];
        return view('CustomerEntry',$data);
    }
     public function CustomerEntry(Request $request){
        $customer_code = $request->customer_code;
        $customer_name = $request->customer_name;
        $customer_address = $request->customer_address;
        $customer_phone = $request->customer_phone;
        $res = Http::post('http://127.0.0.1:8000/api/customer', [
           'customer_code'=>$customer_code,
           'customer_name'=>$customer_name,
           'customer_address'=>$customer_address,
           'customer_phone'=>$customer_phone
     ]);

      return  redirect()->action([DeviceStatsCtrl::class,'Index']);
    }
}
