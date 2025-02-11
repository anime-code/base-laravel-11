<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Console\AuthController as ConsoleAuthController;
use App\Http\Controllers\Client\AuthController as ClientAuthController;
use App\Http\Controllers\Console\DashboardController as ConsoleDashBoardController;

Route::get('/', function () {
    return view('welcome');
});
Route::middleware('guest:console')->group(function () {
    Route::group(['prefix' => 'console', 'as' => 'console.'], function () {
        Route::get('/login', [ConsoleAuthController::class, 'index'])->name('login.form');
        Route::post('/login', [ConsoleAuthController::class, 'loginPost'])->name('login.post');
    });

});
Route::group(['middleware' => 'auth:console'], function () {
    Route::group(['prefix' => 'console', 'as' => 'console.'], function () {
        Route::get('/dashboard', [ConsoleDashBoardController::class, 'index'])->name('dashboard');
    });
});

Route::middleware('guest:web')->group(function () {
    Route::get('/login', [ClientAuthController::class, 'index'])->name('login');
    Route::post('/login', [ClientAuthController::class, 'loginPost'])->name('login.post');
});

Route::group(['middleware' => 'auth:web'], function () {
    Route::get('/', function () {
        dd('client');
    })->name('index');
});
