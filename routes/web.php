<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostsController;

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

Route::get('/contact', function() {
    $name = 'Mic';
    $postId = '1';
    $postContent = "Post content test";

    return view('contact',compact('name', 'postId', 'postContent'));
});

// Route::resource('posts', PostsController::class);
Route::group(['prefix' => 'posts'], function() {
    Route::get('/', [PostsController::class, 'index']);
    Route::get('/create/{userId}', [PostsController::class, 'create']);
    Route::get('/show/{id}', [PostsController::class, 'show']);
    Route::get('/edit/{id}', [PostsController::class, 'edit']);
    Route::get('/delete/{id}', [PostsController::class, 'destroy']);
    Route::get('/trash', [PostsController::class, 'getTrashRecords']);
    Route::get('/restore', [PostsController::class, 'restore']);
    Route::get('/forceDelete/{id}', [PostsController::class, 'forceDelete']);
});