<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

Route::get('/', function () {
    return view('auth/login');
});

route::controller(AuthController::class)->group(function(){
    route::get('register','register')->name('register');
    route::post('register','registersave')->name('register.save');

    route::get('login','login')->name('login');
    route::post('login','loginAction')->name('login.action');

    Route::get('logout', 'logout')->middleware('auth')->name('logout');
});

Route::middleware('auth')->group(function () {
    Route::get('homepage', function () {
        return view('homepage');
    })->name('homepage');

    Route::get('/profile', [App\Http\Controllers\AuthController::class, 'profile'])->name('profile');
     
});