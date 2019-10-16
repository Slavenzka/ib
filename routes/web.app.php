<?php

use Illuminate\Support\Facades\Route;

Route::group([
    'as' => 'app.',
    'namespace' => 'Front'
], function () {
    Route::get('/', 'HomeController@index')->name('home');
    Route::get('about', 'HomeController@about')->name('about');

    Route::group([
        'as' => 'work.',
        'prefix' => 'works',
    ], function () {
        Route::get('/', 'WorkController@index')->name('index');
        Route::get('{work}', 'WorkController@show')->name('show');
    });

    Route::group([
        'as' => 'brief.',
        'prefix' => 'brief'
    ], function () {
        Route::view('/', 'app.brief.index')->name('index');
        Route::post('store', 'BriefController@store')->name('store');
    });

    Route::group([
        'as' => 'contact.',
        'prefix' => 'contacts'
    ], function () {
        Route::get('/', 'ContactController@index')->name('index');
        Route::post('send', 'ContactController@send')->name('send');
        Route::get('thank-you', 'ContactController@thanks')->name('thanks');
    });

    Route::get('{lang?}', 'LocalesController@switch')->name('lang')
        ->where('lang', implode('|', config('app.locales')));
});
