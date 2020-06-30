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
Auth::routes();

Route::middleware(['auth'])->group(function () {

    Route::get('/home', 'HomeController@index')->name('home');

    Route::get('/', function () {
        return view('welcome');
    });

    Route::resource('clinicas', 'ClinicaController');
    Route::get(
        'clinicas/{clinica}/destroyform',
        [
            'as' => 'clinicas.destroyform',
            'uses' => 'ClinicaController@destroyform',
        ]
    );

});
