<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/product/{id}', [ProductController::class, 'find']);

Route::get('/product', [ProductController::class, 'list']);
