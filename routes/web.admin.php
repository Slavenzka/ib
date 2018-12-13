<?php

use Illuminate\Support\Facades\Route;

Route::group([
    'as' => 'admin.',
    'prefix' => 'admin',
    'namespace' => 'Admin',
    'middleware' => ['auth', 'admin'],
], function () {

    Route::get('/', 'DashboardController@index')->name('index');

    Route::resource('briefs', 'BriefController');
    Route::resource('works', 'WorkController');

    Route::group([
        'as' => 'settings',
        'prefix' => 'settings',
    ], function () {
        Route::get('/', 'SettingsController@index')->name('.index');
    });

    Route::group([
        'as' => 'users.',
        'prefix' => 'users',
    ], function () {
        Route::get('/', 'UsersController@index')->name('index');
    });

    Route::group([
        'as' => 'contacts',
        'prefix' => 'contacts'
    ], function() {
        Route::get('/', 'ContactsController@index')->name('.index');
        Route::get('{contact}', 'ContactsController@edit')->name('.edit');
        Route::patch('{contact}', 'ContactsController@update')->name('.update');
    });

});
