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

//Rutas temporales
Route::get('/hom/ruta', function(){
	return 'ruta';
})->name('perfiluser.show');

Route::get('/hom/rutas', function(){
	return 'ruta';
})->name('clientes.index');