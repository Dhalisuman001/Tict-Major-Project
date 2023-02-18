<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
use App\Http\Controllers\DeviceStatsCtrl;

class SensorRegisterCtrl extends Controller
{
    public function Index(){
        if (session('username')=='') {
           return view('Login');
        }

        $data=['fullname'=>session('fullname'),'username'=>session('username')];
        return view('SensorEntry',$data);
    }
    public function SensorRegister(Request $request){
        $sensor_name = $request->sensor_name;
        $sensor_type = $request->sensor_type;
        $res = Http::post('http://127.0.0.1:8000/api/sensor', [
           'sensor_name'=>$sensor_name,
           'sensor_type'=>$sensor_type
     ]);

      return  redirect()->action([DeviceStatsCtrl::class,'Index']);
    }
}
