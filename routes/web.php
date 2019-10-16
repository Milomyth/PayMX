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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/dashboard', 'HomeController@index')->name('dashboard');

Route::resource('perfil', 'ProfilesController');
Route::put('/perfil/avatar/{perfil}', 'ProfilesController@updateAvatar')->name('perfil.updateAvatar');

Route::resource('cliente', 'ClienteController');

//Route::get('/dashboard/clientes', 'ClienteController@index')->name('clientes.index');

//Rutas temporales
Route::get('/home/rutas', function(){
	return 'ruta';
})->name('clientes.index');