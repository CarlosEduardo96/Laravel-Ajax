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

Route::get('/', 'PersonasController@inicio');
Route::post('/guardar','PersonasController@Request')->name('guardar');
Route::put('/{id}','PersonasController@edit')->name('editar');
Route::delete('/eliminar/{id}','PersonasController@delete')->name('eliminar');

Route::get('/listado', 'PersonasController@list');