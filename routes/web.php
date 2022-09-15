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

Route::get('/', function () {
    return view('welcome');
});

Route::get('allpost1', '\App\Http\Controllers\PostsController@allpost1');
Route::get('draft', '\App\Http\Controllers\PostsController@draft');
Route::get('thrash', '\App\Http\Controllers\PostsController@thrash');
Route::get('preview', '\App\Http\Controllers\PostsController@preview');


Route::resource('posts', '\App\Http\Controllers\PostsController');
