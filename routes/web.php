<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
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

Route::get('/docs', function () {
    return view('welcome');
});
Route::get('/dashboard', function () {
    return view('dashboard');
});
Route::get('/', function (Request $request) {
     return view('login')->with("message","");
});
Route::get('/login', function (Request $request) {
    return view('login')->with("message","");
});
Route::post('/login',[LoginController::class,'loginCtrl']);
// Route::get('login/{username}/{password}',[LoginController::class,'Login'])->name('login');
Route::post('/register',[RegisterController::class,'Register']);
// Route::get('route_name/{parameters}',[Controller_class_name::class,'method_name']);
Route::get('/register', function () {
    return view('register');
});