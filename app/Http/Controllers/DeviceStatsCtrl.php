<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;

class DeviceStatsCtrl extends Controller
{

  public function Index(){
    if (session('email')=='') {
           return view('Login');
        }
    $data=['fullname'=>session('fullname'),'username'=>session('username')];
    return view('Dashboard',$data);
  }

    public function getDeviceState(Request $request){

         $id = $request->$device_id;
         $response = Http::get('http://127.0.0.1:8000/api/device-state', [
         'id' => $id,
       ]);

    


}
    public function updateDeviceState(Request $request){
        $id = $request->id;
        $temp=$request->temp;
        $humidity=$request->humidity;

        $response = Http::post('http://127.0.0.1:8000/api/device-state', [
           'id'=>$id,
           'temp'=>$temp,
           'humidity'=>$humidity
     ]);

    return view('dashboard');



}

}
