<?php

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

    Route::view('/brief', 'app.brief.index')->name('brief.index');
    Route::group([
        'as' => 'contacts.',
        'prefix' => 'contacts'
    ], function () {
        Route::get('/', 'ContactsController@index')->name('index');
        Route::post('/', 'ContactsController@send')->name('send');
        Route::post('brief', 'ContactsController@brief')->name('brief');
        Route::get('thank-you', 'ContactsController@thanks')->name('thanks');
    });

    Route::get('{lang?}', 'LocalesController@switch')
        ->where('lang', implode('|', config('app.locales')))
        ->name('lang');
});
