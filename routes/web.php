<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return redirect()->route("article.index");
});


Route::resource('article', \App\Http\Controllers\ArticleController::class);
Route::get('search', '\App\Http\Controllers\ArticleController@search')->name("article.search");
