<?php

use Illuminate\Http\Request;
use App\User;
use App\Http\Resources\UserResource;
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

Route::group(['middleware' => 'auth:api'], function() {
    Route::get('users','UserController@index');
    Route::get('users/{id}', 'UserController@show');
    Route::post('users', 'UserController@store');
    Route::post('users/{id}', 'UserController@update');
    Route::delete('users/{id}', 'UserController@delete');

    Route::get('clientes','ClienteController@index');
    Route::get('clientes/{id}', 'ClienteController@show');
    Route::post('clientes', 'ClienteController@store');
    Route::post('clientes/{id}', 'ClienteController@update');
    Route::delete('clientes/{id}', 'ClienteController@delete');

    Route::get('clinicas','ClinicaController@index');
    Route::get('clinicas/{id}', 'ClinicaController@show');
    Route::post('clinicas', 'ClinicaController@store');
    Route::post('clinicas/{id}', 'ClinicaController@update');
    Route::delete('clinicas/{id}', 'ClinicaController@delete');

    Route::get('tipocitas','TipoCitaController@index');
    Route::get('tipocitas/{id}', 'TipoCitaController@show');
    Route::post('tipocitas', 'TipoCitaController@store');
    Route::post('tipocitas/{id}', 'TipoCitaController@update');
    Route::delete('tipocitas/{id}', 'TipoCitaController@delete');

    Route::get('citas','CitaController@index');
    Route::get('citas/{id}', 'CitaController@show');
    Route::post('citas', 'CitaController@store');
    Route::post('citas/{id}', 'CitaController@update');
    Route::delete('citas/{id}', 'CitaController@delete');

    Route::post('register', 'Auth\RegisterController@register');
    Route::post('logout', 'Auth\LoginController@logout');
});

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('login', 'Auth\LoginController@login');
