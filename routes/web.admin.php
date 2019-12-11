<?php

Route::group([
    'as' => 'admin.',
    'prefix' => 'admin',
    'namespace' => 'Admin',
    'middleware' => ['auth', 'admin'],
], function () {
    Route::get('/', function () {
        return redirect()->route('admin.briefs.index');
    })->name('index');

    Route::resource('briefs', 'BriefController')->except('show');
    Route::resource('works', 'WorkController')->except('show');
    Route::resource('users', 'UsersController')->except('show');
    Route::resource('contacts', 'ContactsController')->except('show');
});
