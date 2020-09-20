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
    Route::resource('usuarios', 'UsuarioController');
    Route::get(
        'usuarios/{usuario}/destroyform',
        [
            'as' => 'usuarios.destroyform',
            'uses' => 'UsuarioController@destroyform'
        ]
    );

    Route::resource('categorias', 'CategoriaController');
    Route::get(
        'categorias/{categoria}/destroyform',
        [
            'as' => 'categorias.destroyform',
            'uses' => 'CategoriaController@destroyform'
        ]
    );

    Route::resource('localidads', 'LocalidadController');
    Route::get(
        'localidads/{localidad}/destroyform',
        [
            'as' => 'localidads.destroyform',
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

    Route::resource('sucursals', 'SucursalController');
    Route::get(
        'sucursals/{sucursal}/destroyform',
        [
            'as' => 'sucursals.destroyform',
            'uses' => 'SucursalController@destroyform'
        ]
    );

    Route::resource('articulos', 'ArticuloController');
    Route::get(
        'articulos/{articulo}/destroyform',
        [
            'as' => 'articulos.destroyform',
            'uses' => 'ArticuloController@destroyform'
        ]
    );

    Route::resource('listaprecios', 'ListaprecioController');
    Route::get(
        'listaprecios/{listaprecio}/destroyform',
        [
            'as' => 'listaprecios.destroyform',
            'uses' => 'ListaprecioController@destroyform'
        ]
    );

    Route::resource('clientes', 'ClienteController');
    Route::get(
        'clientes/{cliente}/destroyform',
        [
            'as' => 'clientes.destroyform',
            'uses' => 'ClienteController@destroyform'
        ]
    );

    Route::resource('articuloxsucursales', 'ArticuloxsucursaleController');
    Route::get(
        'articuloxsucursales/{articuloxsucursale}/destroyform',
        [
            'as' => 'articuloxsucursales.destroyform',
            'uses' => 'ArticuloxsucursaleController@destroyform'
        ]
    );

    Route::resource('ventas', 'VentaController');
    Route::get(
        'ventas/{venta}/destroyform',
        [
            'as' => 'ventas.destroyform',
            'uses' => 'VentaController@destroyform'
        ]
    );

    Route::resource('ventadetalles', 'VentadetalleController');
    Route::get(
        'ventadetalles/{ventadetalle}/destroyform',
        [
            'as' => 'ventadetalles.destroyform',
            'uses' => 'VentadetalleController@destroyform'
        ]
    );
});
