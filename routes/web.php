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


// Route::get('/admin/categories', 'App\Http\Controllers\Admin\CategoryController@index')->name('admin.categories.index');
// Route::get('/admin/categories/create', 'App\Http\Controllers\Admin\CategoryController@create')->name('admin.categories.create');

// Route::post('/admin/category', 'App\Http\Controllers\Admin\CategoryController@store');

// Route::get('/category/{id}/edit', 'App\Http\Controllers\Admin\CategoryController@edit');
// Route::put('/category/{id}', 'App\Http\Controllers\Admin\CategoryController@update')->name('category.update');


Route::name('admin.')->prefix('admin')->namespace('App\Http\Controllers\Admin')->group(function(){
    Route::resource('products', 'ProductController');
    Route::resource('brands', 'BrandController');
    Route::resource('categories', 'CategoryController');
    Route::get('/', 'DashboardController');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
