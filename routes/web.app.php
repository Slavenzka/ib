<?php

use Illuminate\Support\Facades\Route;

Route::group([
    'as' => 'app',
    'namespace' => 'Front',
    'middleware' => 'locale',
], function () {

    /**
     * Works
     */
    Route::group([
        'as' => '.work',
        'prefix' => 'works',
    ], function () {

        Route::get('/', 'WorkController@index')->name('.index');
        Route::get('{work}', 'WorkController@show')->name('.show');

    });

    /**
     * Brief
     */
    Route::group([
        'as' => '.brief',
        'prefix' => 'brief'
    ], function () {

        Route::view('/', 'app.brief.index')->name('.index');
        Route::post('send', 'BriefController@store')->name('.store');

    });
    /**
     * Contacts
     */
    Route::group([
        'as' => '.contact',
        'prefix' => 'contacts'
    ], function () {

        Route::get('/', 'ContactController@index')->name('.index');
        Route::post('send', 'ContactController@send')->name('.send');
        Route::get('thank-you', 'ContactController@thanks')->name('.thanks');

    });

    /**
     * Common
     */
    Route::get('/', 'HomeController@index')->name('.home');
    Route::get('locale/{lang?}', 'HomeController@locale')->name('.lang');
    Route::get('about', 'HomeController@about')->name('.about');

});
