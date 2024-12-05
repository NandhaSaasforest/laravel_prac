<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/product/{id}', [ProductController::class, 'find'])->name('id');

Route::get('/product', [ProductController::class, 'list'])->name('product');
