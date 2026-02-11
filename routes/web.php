<?php

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SaleController;
use Illuminate\Support\Facades\Route;



Route::middleware('auth')->group(function () {
    Route::get('/', function () {
        return view('theme.index');
    })->name('theme.index');
    Route::resource('/products', ProductController::class);
    Route::resource('/customers', CustomerController::class);
    Route::resource('/sales', SaleController::class);
});

require __DIR__ . '/auth.php';
