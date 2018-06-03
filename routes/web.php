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

//inicio
Route::get('/', function(){
    return view('Auth.login');
});


// Route::group(['middleware' => ['noLogin']], function () {

Route::group(['middleware' => 'auth:web'], function () {

    //calendario
    Route::get('/calendario', 'CalendarioController@index')->name('calendario');


    //citas
    Route::get('/cita/create', 'CitaController@create')->name('cita.create');
    Route::get('/cita/edit', 'CitaController@edit')->name('cita.edit');
    Route::post('/cita', 'CitaController@store');


    //noticias
    Route::get('/anuncios', 'AnuncioController@index')->name('anuncios');
    Route::get('/anuncios/edit', 'AnuncioController@edit');
    Route::get('/anuncios/create', 'AnuncioController@create');
    Route::post('/anuncios', 'AnuncioController@store');


    Route::get ('/admin/formUser/{id}', 'UserController@formUserId');
    Route::get ('/admin/formUser', 'UserController@formUser');
    Route::post('/admin/saveUser', 'UserController@save');
    Route::get('/admin/showUser/{id}', 'UserController@showUser');
    Route::get ('/admin/users', 'UserController@users');
    Route::get('/admin/deleteUser/{id}', 'UserController@deleteUser');

    Route::get ('/admin/formClinica/{id}', 'ClinicaController@formClinicaId');
    Route::get ('/admin/formClinica', 'ClinicaController@formClinica');
    Route::post('/admin/saveClinica', 'ClinicaController@saveClinica');
    Route::get('/admin/showClinica/{id}', 'ClinicaController@showClinica');
    Route::get ('/admin/clinicas', 'ClinicaController@clinicas');
    Route::get('/admin/deleteClinica/{id}', 'ClinicaController@deleteClinica');

    Route::get ('/admin/formTipoCita/{id}', 'TipoCitaController@formTipoCitaId');
    Route::get ('/admin/formTipoCita', 'TipoCitaController@formTipoCita');
    Route::post('/admin/saveTipoCita', 'TipoCitaController@saveTipoCita');
    Route::get ('/admin/tipocitas', 'TipoCitaController@tipocitas');
    Route::get('/admin/deleteTipoCita/{id}', 'TipoCitaController@deleteTipoCita');

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

    Route::get('/home', 'HomeController@index')->name('home');

    $this->get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
    $this->post('register', 'Auth\RegisterController@register');

});

$this->get('login', 'Auth\LoginController@showLoginForm')->name('login');
$this->post('login', 'Auth\LoginController@login');
$this->post('logout', 'Auth\LoginController@logout')->name('logout');
