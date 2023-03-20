<?php

use App\Http\Controllers\HomeController;
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
    return view('welcome');
});


Route::controller(\App\Http\Controllers\AuthController::class)->group(function () {
    Route::post('login', 'login')->name('login');
    Route::post('register', 'register')->name('register');
    Route::get('/login', function () {
        return view('auth');
    });
    Route::get('/register', function () {
        return view('register');
    });
});


Route::controller(HomeController::class)->group(function () {
    Route::get('home', 'get')->name('home');
    Route::post('home/create', 'create')->name('home.create');
    Route::post('home/delete', 'delete')->name('home.delete');
})->middleware('auth');
