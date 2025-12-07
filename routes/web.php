<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::post('/signup', [UserController::class,'UserRegistration']);
Route::get('/signin', [UserController::class,'UserLogin']);



