<?php

use Illuminate\Support\Facades\Route;

Route::group([
    'as' => 'admin.',
    'prefix' => 'admin',
    'namespace' => 'Admin',
    'middleware' => ['auth', 'admin'],
], function () {
    Route::get('/', function () {
        return redirect()->route('admin.briefs.index');
    })->name('index');

    Route::resource('briefs', 'BriefController');
    Route::resource('users', 'UsersController');
    Route::resource('works', 'WorkController');

    Route::group([
        'as' => 'settings',
        'prefix' => 'settings',
    ], function () {
        Route::get('/', 'SettingsController@index')->name('.index');
    });

    Route::group([
        'as' => 'contacts',
        'prefix' => 'contacts',
    ], function () {
        Route::get('/', 'ContactsController@index')->name('.index');
        Route::get('{contact}', 'ContactsController@edit')->name('.edit');
        Route::patch('{contact}', 'ContactsController@update')->name('.update');
    });

});
