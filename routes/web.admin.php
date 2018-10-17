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

    });

    Route::group([
        'as' => '.work',
        'prefix' => 'work',
    ], function () {

        Route::get('/', 'WorkController@index')->name('.index');

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

});
