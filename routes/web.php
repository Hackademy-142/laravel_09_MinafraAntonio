<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\PublicController;
use Illuminate\Support\Facades\Route;


//PublicController
Route::get('/', [PublicController::class, 'viewHome'])->name('home');

//ProductController
Route::get('/product/create', [ProductController::class, 'create'])->name('product.create')->middleware('auth');

Route::post('/products/store', [ProductController::class, 'store'])->name('product.store')->middleware('auth');

Route::get('/product/index', [ProductController::class, 'index'])->name('index');
