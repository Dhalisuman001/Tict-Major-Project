<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;

class DeviceStateController extends Controller
{
    public function getDeviceState(Request $request){

         $id = $request->$device_id;
         $response = Http::get('http://127.0.0.1:8000/api/device-state', [
         'id' => $id,
       ]);

    // return view('dashboard');


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

    // return view('dashboard');



}

}
