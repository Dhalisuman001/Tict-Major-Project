<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
use App\Http\Controllers\DeviceStatsCtrl;

class DeviceIssueCtrl extends Controller
{
    public function Index(){
        return view('DeviceIssue');
    }
    public function DeviceIssue(Request $request){
        $device_id = $request->device_id;
        $customer_id = $request->customer_id;
        $location = $request->location;
        $res = Http::post('http://127.0.0.1:8000/api/device-issue', [
           'device_id'=>$device_id,
           'customer_id'=>$customer_id,
           'location'=>$location
     ]);

      return  redirect()->action([DeviceStatsCtrl::class,'Index']);
    }
}
