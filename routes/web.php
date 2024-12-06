<?php

use App\Http\Controllers\Controller;
use App\Http\Controllers\CorePhpController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProductManagementController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/', [CorePhpController::class, 'index'])->name('index');

Route::get('/info', [CorePhpController::class, 'info'])->name('info');


Route::post('/calculate', [CorePhpController::class, 'calculate'])->name('calculate');

Route::post('/login', [CorePhpController::class, 'login'])->name('login');

Route::post('/logout', [CorePhpController::class, 'logout'])->name('logout');

Route::post('/handleUpload', [CorePhpController::class, 'handleUpload'])->name('handleUpload');

Route::get('/post/{id}', [PostController::class, 'show'])->name('id');

Route::get('/about', [PostController::class, 'about'])->name('about');

Route::resource('products', ProductManagementController::class);

Route::post('/prlogin', [ProductManagementController::class, 'login'])->name('prlogin');
