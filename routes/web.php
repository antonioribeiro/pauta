<?php

Route::get('/', 'Admin@index')->name('home');

Route::get('/admin', 'Admin@index')->name('admin.index');
