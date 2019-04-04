<?php

Route::get('/', function () {
    return redirect()->route('admin.index');
});

Auth::routes();

Route::get('/home', 'Home@index')->name('home');

Route::get('/admin', 'Admin@index')->name('admin.index');
