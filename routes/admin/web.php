<?php

Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(), 'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
    ],
    function () {
        Route::group(['prefix' => 'admin'], function () {
            Route::get('/index', 'AdminController@index')->name('admin.index');
        });
    }
);
