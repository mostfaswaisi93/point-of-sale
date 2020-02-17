<?php

Route::get('/', function () {
    return redirect()->route('admin.welcome');
});

Auth::routes(['register' => false]);
