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
    return view('login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
});

Route::get('/datasiswa', function () {
    return view('datasiswa');
});

Route::get('/pembayaran', function () {
    return view('pembayaran');
});

Route::get('/datakelas', function () {
    return view('datakelas');
});