<?php
Route::post('/login',[LoginController::class,'loginCtrl']);
// Route::get('login/{username}/{password}',[LoginController::class,'Login'])->name('login');
Route::post('/register',[RegisterController::class,'Register']);
// Route::get('route_name/{parameters}',[Controller_class_name::class,'method_name']);
Route::get('/register', function () {
    return view('register');
});