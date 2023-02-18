<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\View;
use Illuminate\Http\Request;
use App\Http\Controllers\LoginCtrl;
use App\Http\Controllers\DeviceRegisterCtrl;
use App\Http\Controllers\DeviceStatsCtrl;
use App\Http\Controllers\DeviceIssueCtrl;
use App\Http\Controllers\SensorRegisterCtrl;
use App\Http\Controllers\CustomerRegister;
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




Route::post('/login',[LoginCtrl::class,'Login']);

Route::post('/register',[RegisterController::class,'Register']);

Route::get('dashboard',[DeviceStatsCtrl::class,'Index']);

Route::get('/device-entry',[DeviceRegisterCtrl::class,'Index']);

Route::post('/device-entry',[DeviceRegisterCtrl::class,'DeviceEntry']);

Route::get('/device-issue',[DeviceIssueCtrl::class,'Index']);

Route::post('/device-issue',[DeviceIssueCtrl::class,'DeviceIssue']);

Route::get('/sensor',[SensorRegisterCtrl::class,'Index']);

Route::post('/sensor',[SensorRegisterCtrl::class,'SensorRegister']);

Route::get('/customer',[CustomerRegister::class,'Index']);

Route::post('/customer',[CustomerRegister::class,'CustomerEntry']);

Route::get('/logout',[LoginCtrl::class,'Logout']);


// Route::get('login/{username}/{password}',[LoginController::class,'Login'])->name('login');
Route::post('/device-state',[DeviceStatsCtrl::class,'updateDeviceState']);
// Route::get('route_name/{parameters}',[Controller_class_name::class,'method_name']);
