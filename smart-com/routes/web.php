<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ReportController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('pages.landing');
});

Route::get('/dashboard', function(){
    return view('pages.dashboard');
})->middleware('auth')->name("dashboard");

Route::controller(AuthController::class)->group(function(){
    Route::middleware('guest')->group(function(){
        Route::get('/login', 'login')->name('login');
        Route::post('/login', 'actionLogin')->name('login.post');
    });

    Route::middleware('auth')->group(function(){
        Route::get("/logout", 'actionLogout')->name("logout");
    });
});

Route::controller(ReportController::class)->group(function(){
    Route::middleware("role:user")->group(function(){
        Route::get("/report/create", "createView")->name("report.create");
        Route::post("/report/create", "createReport")->name("report.createPost");
    });

    Route::middleware("role:admin")->group(function(){
        Route::get("/reports", "index")->name("reports");
        Route::get("/report/{id}", "getById")->name("report.get");
        Route::delete("/reports/{id}", "delete")->name("reports.delete");
    });

});
