<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\View;
use Illuminate\Http\Request;
use App\Http\Controllers\LoginCtrl;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DeviceStateController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


// Route::get('/dashboard', function () {
//     return view('dashboard');
// });
Route::get('/', function (Request $request) {
    return view('Login');
});
Route::get('/login', function (Request $request) {
       return view('Login');
});
Route::get('/register', function (Request $request) {
    return view('Signup');
});

Route::get('/add-device', function () {
    return view('dashboard');
});
Route::get('/device-issue', function (Request $request) {
    return view('deviceIssue')->with("message","");
});
Route::get('/sensor', function (Request $request) {
    return view('sensorForm')->with("message","");
});
Route::get('/get-data', function (Request $request) {
    return view('userList');
});
Route::get('/deviceinfo', function (Request $request) {
    return view('deviceStateForm');
});



Route::post('/login',[LoginCtrl::class,'Login']);
// Route::get('login/{username}/{password}',[LoginController::class,'Login'])->name('login');
Route::post('/register',[RegisterController::class,'Register']);
Route::post('/device-state',[DeviceStateController::class,'updateDeviceState']);
// Route::get('route_name/{parameters}',[Controller_class_name::class,'method_name']);
