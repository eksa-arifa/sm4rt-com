<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('pages.landing');
});

Route::get('/dashboard', function(){
    return view('pages.dashboard');
});

Route::controller(AuthController::class)->group(function(){
    Route::middleware('guest')->group(function(){
        Route::get('/login', 'login')->name('login.get');
        Route::post('/login', 'actionLogin')->name('login.post');
    });
});

