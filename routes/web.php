<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/welcome', function () {
    return view('welcome');
});

Route::get('/about', function() {
    return "This is about page.";
});

Route::get('/contact', function() {
    return "This is contact page.";
});

Route::get('/post/{id}/{name}', function($id, $name) {
    return "Post from " . $name . " with post id of " . $id;
});