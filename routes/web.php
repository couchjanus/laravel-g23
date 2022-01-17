<?php

use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
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

Route::get('/test', function(){
    return new \App\Mail\Reminder('Bla bla bla');
});
Route::get('/inv', function(){
    return new \App\Mail\Invitation();
});
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

Route::get('/email/verify', function(){
    return view('auth.verify-email');
})->middleware(['auth'])->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', function(EmailVerificationRequest $request){
    $request->fulfill();

    return redirect('/home');
})->middleware(['auth', 'signed'])->name('verification.verify');

Route::post('/email/verification-notification', function(Request $request){

    $request->user()->sendEmailVerificationNotification();
    return back()->with('message', 'Verification link sent!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
