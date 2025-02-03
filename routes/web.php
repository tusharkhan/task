<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MerchantAuth\LoginController;
use App\Http\Controllers\MerchantController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ShopController;
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

        Route::get("/store-list", [ShopController::class, 'index'])->name('store.list');
        Route::get("/create-store", [ShopController::class, 'create'])->name('store.create');
        Route::post("/create-store", [ShopController::class, 'store'])->name('store.store');

        Route::get("/category-list", [CategoryController::class, 'index'])->name('category.list');
        Route::get("/create-category", [CategoryController::class, 'create'])->name('category.create');
        Route::post("/create-category", [CategoryController::class, 'store'])->name('category.store');

        Route::get("/product-list", [ProductController::class, 'index'])->name('product.list');
        Route::get("/create-product", [ProductController::class, 'create'])->name('product.create');
        Route::post("/create-product", [ProductController::class, 'store'])->name('product.store');
    });
});
