<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
use App\Http\Controllers\DeviceStatsCtrl;

class DeviceRegisterCtrl extends Controller
{
    public function Index(){
        return view('DeviceEntry');
    }
    public function DeviceEntry(Request $request){
        $device_name = $request->device_name;
        $device_code = $request->device_code;
        $batch_no = $request->batch_no;
        $res = Http::post('http://127.0.0.1:8000/api/device', [
           'device_name'=>$device_name,
           'device_code'=>$device_code,
           'batch_number'=>$batch_no
     ]);

      return  redirect()->action([DeviceStatsCtrl::class,'Index']);


    }
}
