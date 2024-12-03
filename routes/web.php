<?php

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/', [Controller::class,'index']);

Route::get('/info', [Controller::class,'info']);


Route::post('/calculate', [Controller::class,'calculate']);

Route::post('/login', [Controller::class,'login']);

Route::post('/logout', [Controller::class,'logout']);

Route::post('/handleUpload', [Controller::class, 'handleUpload']);

// Route::get('/routing', [PostController::class, 'routing']);
Route::get('/post/{id}', [PostController::class, 'show']);

Route::get('/about', [PostController::class, 'about']);




