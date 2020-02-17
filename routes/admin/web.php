<?php

Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/index', 'AdminController@index')->name('index');
});
