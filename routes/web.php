<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MerchantAuth\LoginController;
use App\Http\Controllers\MerchantController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index']);

Auth::routes();

Route::prefix('admin')->as('admin.')->middleware('auth:web')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'index'])->name('home');
});

Route::prefix('merchant')->as('merchant.')->group( function () {
    Route::middleware('redirectIfNotMerchant')->group( function () {
        Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login.get');
        Route::post('/login', [LoginController::class, 'login'])->name('login.post');
    });

    Route::middleware('merchant')->group(function () {
        Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
        Route::get('/dashboard', [MerchantController::class, 'index'])->name('dashboard');
    });
});
