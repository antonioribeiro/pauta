<?php

Route::get('/', 'Home@index')->name('home');

Route::get('/admin', 'Admin@index')->name('admin.index');
