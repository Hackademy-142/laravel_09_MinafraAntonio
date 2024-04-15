<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\PublicController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PublicController::class, 'viewHome'])->name('home');

Route::post('/products/create', [ProductController::class, 'store'])->name('product.store');

Route::get('/product/card', [ProductController::class, 'index'])->name('index');