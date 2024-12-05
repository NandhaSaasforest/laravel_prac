<?php

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\PrManagementController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/', [Controller::class, 'index'])->name('index');

Route::get('/info', [Controller::class, 'info'])->name('info');


Route::post('/calculate', [Controller::class, 'calculate'])->name('calculate');

Route::post('/login', [Controller::class, 'login'])->name('login');

Route::post('/logout', [Controller::class, 'logout'])->name('logout');

Route::post('/handleUpload', [Controller::class, 'handleUpload'])->name('handleUpload');

Route::get('/post/{id}', [PostController::class, 'show'])->name('id');

Route::get('/about', [PostController::class, 'about'])->name('about');

Route::resource('products', PrManagementController::class);

Route::post('/prlogin', [PrManagementController::class, 'login'])->name('prlogin');
