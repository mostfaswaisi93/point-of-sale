<?php

Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/check', function () {
        return "this is POS";
    });
    
    // Route::get('/dashboard', 'DashboardController@index')->name('dashboard.index');
});
