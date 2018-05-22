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

Route::get('/calendario', function () {
    return view('calendar.index');
});

//citas
Route::get('/citas/create', 'CitaController@create');
Route::get('/citas/edit', 'CitaController@edit');


Route::get ('/admin/formUser/{id}', 'UserController@formUserId');
Route::get ('/admin/formUser', 'UserController@formUser');
Route::post('/admin/saveUser', 'UserController@saveUser');
Route::get('/admin/showUser/{id}', 'UserController@showUser');
Route::get ('/admin/users', 'UserController@users');
Route::get('/admin/deleteUser/{id}', 'UserController@deleteUser');

Route::get ('/admin/formClinica/{id}', 'ClinicaController@formClinicaId');
Route::get ('/admin/formClinica', 'ClinicaController@formClinica');
Route::post('/admin/saveClinica', 'ClinicaController@saveClinica');
Route::get('/admin/showClinica/{id}', 'ClinicaController@showClinica');
Route::get ('/admin/clinicas', 'ClinicaController@clinicas');
Route::get('/admin/deleteClinica/{id}', 'ClinicaController@deleteClinica');

Route::get ('/formNota/{id}', 'NotaController@formNotaId');
Route::get ('/formNota', 'NotaController@formNota');
Route::post('/saveNota', 'NotaController@saveNota');
Route::get('/showNota/{id}', 'NotaController@showNota');
Route::get ('/notas/{date}', 'NotaController@notas');
Route::get('/deleteNota/{id}', 'NotaController@deleteNota');

Route::get ('/formCita/{id}', 'CitaController@formCitaId');
Route::get ('/formCita', 'CitaController@formCita');
Route::post('/saveCita', 'CitaController@saveCita');
Route::get('/showCita/{id}', 'CitaController@showCita');
Route::get ('/citas/{date}', 'CitaController@citas');
Route::get('/deleteCita/{id}', 'CitaController@deleteCita');

Route::get ('/admin/formTipoCita/{id}', 'TipoCitaController@formTipoCitaId');
Route::get ('/admin/formTipoCita', 'TipoCitaController@formTipoCita');
Route::post('/admin/saveTipoCita', 'TipoCitaController@saveTipoCita');
Route::get('/admin/showTipoCita/{id}', 'TipoCitaController@showTipoCita');
Route::get ('/admin/tipocitas', 'TipoCitaController@tipocitas');
Route::get('/admin/deleteTipoCita/{id}', 'TipoCitaController@deleteTipoCita');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
