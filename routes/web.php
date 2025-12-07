<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::post('/registration', [UserController::class,'UserRegistration']);
Route::get('/login', [UserController::class,'UserLogin']);



