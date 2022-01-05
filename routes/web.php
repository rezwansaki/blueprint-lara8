<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/phpinfo', function () {
    phpinfo();
});


Route::get('/getdata', [BlogController::class, 'index']); //test



Route::resource('post', App\Http\Controllers\PostController::class);
