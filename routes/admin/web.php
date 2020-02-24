<?php

Route::group(
    ['prefix' => LaravelLocalization::setLocale(), 'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']],
    function () {
        Route::prefix('admin')->name('admin.')->middleware(['auth'])->group(function () {
            Route::get('/', 'WelcomeController@index')->name('welcome');

            Route::resource('categories', 'CategoryController')->except(['show']);
            Route::resource('products', 'ProductController')->except(['show']);

            Route::resource('clients', 'ClientController')->except(['show']);
            Route::resource('clients.orders', 'Client\OrderController')->except(['show']);

            Route::resource('orders', 'OrderController')->except(['show']);
            Route::get('/orders/{order}/products', 'OrderController@products')->name('orders.products');

            Route::resource('users', 'UserController')->except(['show']);

            Route::resource('cat', 'CatController');
            Route::post('cat/update', 'CatController@update')->name('cat.update');
            Route::get('cat/destroy/{id}', 'CatController@destroy');
        });
    }
);
