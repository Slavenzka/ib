<?php

use Illuminate\Support\Facades\Route;

Route::group([
    'as' => 'admin',
    'prefix' => 'admin',
    'namespace' => 'Admin',
    'middleware' => ['auth', 'admin'],
], function () {

    Route::get('/', 'DashboardController@index')->name('.index');

    Route::group([
        'as' => '.brief',
        'prefix' => 'brief',
    ], function () {
        Route::get('/', 'BriefController@index')->name('.index');
        Route::get('{brief}/edit', 'BriefController@edit')->name('.edit');
        Route::get('{brief}', 'BriefController@show')->name('.show');
        Route::patch('{brief}', 'BriefController@update')->name('.update');
    });

    Route::group([
        'as' => '.work',
        'prefix' => 'work',
    ], function () {
        Route::get('/', 'WorkController@index')->name('.index');
        Route::get('create', 'WorkController@create')->name('.create');
        Route::post('create', 'WorkController@store')->name('.store');
        Route::get('{work}/edit', 'WorkController@edit')->name('.edit');
        Route::patch('{work}', 'WorkController@update')->name('.update');
        Route::delete('{work}', 'WorkController@destroy')->name('.delete');
    });

    Route::group([
        'as' => '.settings',
        'prefix' => 'settings',
    ], function () {
        Route::get('/', 'SettingsController@index')->name('.index');
    });

    Route::group([
        'as' => '.user',
        'prefix' => 'user',
    ], function () {
        Route::get('/', 'UserController@index')->name('.index');
    });

    Route::group([
        'as' => '.contacts',
        'prefix' => 'contacts'
    ], function() {
        Route::get('/', 'ContactsController@index')->name('.index');
        Route::get('{contact}', 'ContactsController@show')->name('.show');
    });

});
