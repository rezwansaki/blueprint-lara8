<?php

//use App\Models\Blog;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/phpinfo', function () {
    phpinfo();
});


Route::get('/getdata', function () {
    //$blogs = Blog::all();
    $blogs = DB::table('users')->get();
    return $blogs;
    //this is final 
});



Route::resource('post', App\Http\Controllers\PostController::class);
