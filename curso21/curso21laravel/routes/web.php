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
    return redirect()->route('home');
});

Auth::routes(['register' => false]);

Route::get('/home', 'HomeController@index')->name('home');

Route::middleware(['auth'])->group(function(){
    Route::resource('categorias', 'CategoriaController');
    Route::get(
        'categorias/{categoria}/destroyform',
        [
            'as' => 'categorias.destroyform',
            'uses' => 'CategoriaController@destroyform'
        ]
    );


    Route::resource('localidades', 'LocalidadController');
    Route::get(
        'localidades/{localidad}/destroyform',
        [
            'as' => 'localidades.destroyform',
            'uses' => 'LocalidadController@destroyform'
        ]
    );


    Route::resource('unidadmedidas', 'UnidadmedidaController');
    Route::get(
        'unidadmedidas/{unidadmedida}/destroyform',
        [
            'as' => 'unidadmedidas.destroyform',
            'uses' => 'UnidadmedidaController@destroyform'
        ]
    );

    Route::resource('sucursales', 'SucursalController');
    Route::get(
        'sucursales/{sucursal}/destroyform',
        [
            'as' => 'sucursales.destroyform',
            'uses' => 'SucursalController@destroyform'
        ]
    );
});
