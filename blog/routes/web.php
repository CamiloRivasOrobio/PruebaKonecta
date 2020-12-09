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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::post('/clientes', 'ClienteController@create')->name('clientes');
Route::get('/clientes/{id}', 'ClienteController@delete')->name('clientesDelete');
Route::post('/clientes/{id}', 'ClienteController@editar')->name('clientesEditar');
Route::get('/register', 'Auth\RegisterController@index')->name('register');
Route::get('/register/{id}', 'Auth\RegisterController@delete')->name('delete');
Route::post('/editar/{id}', 'Auth\RegisterController@editar')->name('editar');
