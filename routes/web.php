<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->middleware('auth:web');

\Illuminate\Support\Facades\Auth::routes();

Route::prefix('merchant')->as('merchant.')->group( function () {
    Route::middleware('redirectIfNotMerchant')->group( function () {
        Route::get('/login', [\App\Http\Controllers\MerchantAuth\LoginController::class, 'showLoginForm'])->name('login.get');
        Route::post('/login', [\App\Http\Controllers\MerchantAuth\LoginController::class, 'login'])->name('login.post');
    });

    Route::middleware('merchant')->group(function () {
        Route::post('/logout', [\App\Http\Controllers\MerchantAuth\LoginController::class, 'logout'])->name('logout');
        Route::get('/dashboard', [\App\Http\Controllers\MerchantController::class, 'index'])->name('dashboard');
    });
});
