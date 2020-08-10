<?php

Route::prefix('roles')->name('roles.')->middleware(['permission:roles_index'])->group(function () {
    Route::middleware('permission:roles_index')->get(
        '',
        [
            'as' => 'index',
            'uses' => 'RolController@index',
        ]
    );
    Route::middleware('permission:roles_store')->group(function () {
        Route::get(
            'create',
            [
                'as' => 'create',
                'uses' => 'RolController@create',
            ]
        );
        Route::post(
            '',
            [
                'as' => 'store',
                'uses' => 'RolController@store',
            ]
        );
    });
    Route::middleware('permission:roles_update')->group(function () {
        Route::get(
            '{rol}/edit',
            [
                'as' => 'edit',
                'uses' => 'RolController@edit',
            ]
        );
        Route::patch(
            '{rol}',
            [
                'as' => 'update',
                'uses' => 'RolController@update',
            ]
        );
    });
    Route::middleware('permission:roles_show')->get(
        '{rol}',
        [
            'as' => 'show',
            'uses' => 'RolController@show',
        ]
    );
    Route::middleware('permission:roles_destroy')->group(function () {
        Route::get(
            '{rol}/destroyform',
            [
                'as' => 'destroyform',
                'uses' => 'RolController@destroyform',
            ]
        );
        Route::delete(
            '{rol}',
            [
                'as' => 'destroy',
                'uses' => 'RolController@destroy',
            ]
        );
    });
    Route::middleware('permission:roles_recycle')->group(function () {
        Route::middleware('permission:roles_restore')->get(
            '{rol}/restore',
            [
                'as' => 'restore',
                'uses' => 'RolController@restore',
            ]
        );
        Route::middleware('permission:roles_forcedelete')->get(
            '{rol}/forcedelete',
            [
                'as' => 'forcedelete',
                'uses' => 'RolController@forcedelete',
            ]
        );
    });
});
