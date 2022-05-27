<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('login');
});

Route::get('/login', function () {
    return view('login');
});

Route::get('/logout', function () {
    Session::forget('user');
    return view('login');
});

Route::get('/editmyuser', function () {
    return view('edituser');
});

Route::get('/userget',[UserController::class,'getuser']);
Route::get('/editmyuser',[UserController::class,'getuser']);
Route::post('/useredit',[UserController::class,'edituser']);
Route::post('/login',[UserController::class,'login']);

Route::get('/register', function () {
    return view('register');
});
Route::post('/register',[UserController::class,'register']);

Route::get('/userlist', function () {
    return view('listuser');
});
Route::get('/userlist',[UserController::class,'listuser']);

Route::get('/userlist',[UserController::class,'search']);
Route::post('/userlist',[UserController::class,'search']);

Route::get('/userdelete',[UserController::class,'deleteuser']);
