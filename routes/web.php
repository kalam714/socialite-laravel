<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
/*
//socialiteFacebook

Route::get('/login/facebook', [LoginController::class, 'redirectToProvider'])->name('facebookLogin');
Route::get('/login/facebook/callback', [LoginController::class, 'handleProviderCallback']);

//socialiteGoogle
Route::get('/login/google', [LoginController::class, 'redirectToProvider'])->name('googleLogin');
Route::get('/login/google/callback', [LoginController::class, 'handleProviderCallback']);
*/

Route::get('/login/{name}', [LoginController::class, 'redirectToProvider']);
Route::get('/login/{name}/callback', [LoginController::class, 'handleProviderCallback']);
