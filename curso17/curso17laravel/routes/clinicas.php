<?php

Route::prefix('clinicas')->name('clinicas.')->middleware(['permission:clinicas_index'])->group(function () {
    Route::get(
        '',
        [
            'as' => 'index',
            'uses' => 'ClinicaController@index',
        ]
    );
    Route::middleware('permission:clinicas_store')->group(function () {
        Route::get(
            'create',
            [
                'as' => 'create',
                'uses' => 'ClinicaController@create',
            ]
        );
        Route::post(
            '',
            [
                'as' => 'store',
                'uses' => 'ClinicaController@store',
            ]
        );
    });
    Route::middleware('permission:clinicas_update')->group(function () {
        Route::get(
            '{clinica}/edit',
            [
                'as' => 'edit',
                'uses' => 'ClinicaController@edit',
            ]
        );
        Route::patch(
            '{clinica}',
            [
                'as' => 'update',
                'uses' => 'ClinicaController@update',
            ]
        );
    });
    Route::middleware('permission:clinicas_show')->get(
        '{clinica}',
        [
            'as' => 'show',
            'uses' => 'ClinicaController@show',
        ]
    );
    Route::middleware('permission:clinicas_destroy')->group(function () {
        Route::get(
            '{clinica}/destroyform',
            [
                'as' => 'destroyform',
                'uses' => 'ClinicaController@destroyform',
            ]
        );
        Route::delete(
            '{clinica}',
            [
                'as' => 'destroy',
                'uses' => 'ClinicaController@destroy',
            ]
        );
    });
    Route::middleware('permission:clinicas_recycle')->group(function () {
        Route::middleware('permission:clinicas_restore')->get(
            '{clinica}/restore',
            [
                'as' => 'restore',
                'uses' => 'ClinicaController@restore',
            ]
        );
        Route::middleware('permission:clinicas_forcedelete')->get(
            '{clinica}/forcedelete',
            [
                'as' => 'forcedelete',
                'uses' => 'ClinicaController@forcedelete',
            ]
        );
    });
});
