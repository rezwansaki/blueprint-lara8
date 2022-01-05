<?php

use App\Models\Blog;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/getdata', function () {
    $blogs = Blog::all();
    return $blogs;
});



Route::resource('post', App\Http\Controllers\PostController::class);
