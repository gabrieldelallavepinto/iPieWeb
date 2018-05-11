<?php
use Illuminate\Http\Request;
use App\User;
use App\Http\Resources\UserResource;


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
    return view('logout');
});

Route::get ('/admin/formUser/{id}', 'UserController@formUserId');
Route::get ('/admin/formUser', 'UserController@formUser');
Route::post('/admin/saveUser', 'UserController@saveUser');
Route::get('/admin/showUser/{id}', 'UserController@showUser');
Route::get ('/admin/users', 'UserController@users');

Route::get('/login','Auth\LoginController@showLogin');
Route::post('/log','Auth\LoginController@log');
