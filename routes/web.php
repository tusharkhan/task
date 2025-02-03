<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->middleware('auth:web');

\Illuminate\Support\Facades\Auth::routes();

Route::group(['prefix' => 'merchant', 'as' => 'merchant.'], function () {
    Route::get('/login', [\App\Http\Controllers\MerchantAuth\LoginController::class, 'showLoginForm'])->name('login.get');
    Route::post('/login', [\App\Http\Controllers\MerchantAuth\LoginController::class, 'login'])->name('login.post');

    Route::group(['middleware' => 'auth:merchant'], function () {
        Route::post('/logout', [\App\Http\Controllers\MerchantAuth\LoginController::class, 'logout'])->name('logout');
        Route::get('/dashboard', [\App\Http\Controllers\MerchantController::class, 'index'])->name('dashboard');
    });
});
