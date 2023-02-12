<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class DeviceStateApi extends Controller
{
    public function getDeviceState(Request $request){
        $device_id = $request->id;
        $res = DB::select("SELECT * FROM device_state_table WHERE device_id='$device_id'");
        DB::disconnect('major_schema');
        if(count($res) > 0)
        {

            return response()->json($res);

        }
        else
        {
            echo "Device not found";
        }
    }
    public function updateDeviceState(Request $request){
        $device_id = $request->id;
        $device_temp = $request->temp;
        $device_humidity = $request->humidity;
        $res = DB::insert("INSERT INTO  device_state_table (device_id,device_temp,device_humidity) VALUES ('$device_id','$device_temp','$device_humidity')");

       if($res>0){
        echo "Device Status added";
       }else{
        echo "Internal error";
       }

}

}