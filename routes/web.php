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

Route::get('/', function () {
    return view('home.index');
});

Route::get('/hello', function () {
    return view('hello');
});

Route::get('/dev', 'App\Http\Controllers\DevController@index');

Route::get('/admin', 'App\Http\Controllers\Admin\DashboardController@index');

Route::get('/categories', 'App\Http\Controllers\Admin\CategoryController@index');
Route::get('/categories/create', 'App\Http\Controllers\Admin\CategoryController@create');

Route::post('/category', 'App\Http\Controllers\Admin\CategoryController@store');

Route::get('/category/{id}/edit', 'App\Http\Controllers\Admin\CategoryController@edit');
Route::put('/category/{id}', 'App\Http\Controllers\Admin\CategoryController@update')->name('category.update'); 