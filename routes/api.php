<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

//routes of user CRUD
Route::post('/autenticar', 'UsuarioController@autenticar');
Route::post('/logout', 'UsuarioController@logout');
Route::post('/usuarios/create', 'UsuarioController@create');
Route::get('/usuarios/show', 'UsuarioController@show');
Route::post('/usuarios/edit', 'UsuarioController@edit');
Route::post('/usuarios/destroy', 'UsuarioController@destroy');


//routes of buses CRUD
Route::get('/buses/show', 'BusesController@show');
Route::post('/buses/create', 'BusesController@create');
Route::post('/buses/edit', 'BusesController@edit');
Route::post('/buses/destroy', 'BusesController@destroy');


//routes of rutas CRUD
Route::get('/rutas/show', 'RutasController@show');
Route::post('/rutas/create', 'RutasController@create');
Route::post('/rutas/destroy', 'RutasController@destroy');
Route::post('/rutas/edit', 'RutasController@edit');


//routes of cotizacion
Route::post('/rutas/cotizar', 'RutasController@cotizar');



