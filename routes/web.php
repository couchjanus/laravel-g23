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


Route::get('/dev', 'App\Http\Controllers\DevController@index');
Route::get('/dev1', 'App\Http\Controllers\DevController@show');


Route::middleware(['auth:sanctum'])
    ->name('admin.')
    ->prefix('admin')
    ->namespace('App\Http\Controllers\Admin')
    ->group(function(){
        Route::resource('products', 'ProductController');
        Route::resource('brands', 'BrandController');
        Route::resource('categories', 'CategoryController');
        Route::get('/', 'DashboardController');
    });

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
