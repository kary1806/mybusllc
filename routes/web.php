<?php

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


// las vistas del proyecto
Route::get('/', function () {
    return view('dashboard.dashboard');
});

Route::get('/login', function () {
    return view('login.login');
});

Route::get('/usuarios', function () {
    return view('dashboard.usuario');
});

Route::get('/bus', function () {
    return view('dashboard.bus');
});

Route::get('/tickets', function () {
    return view('dashboard.tickets');
});

Route::get('/rutas', function () {
    return view('dashboard.rutas');
});



// Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
