<?php

Route::get('/', function () {
    return redirect()->route('admin.index');
});

Route::get('/admin', 'Admin@index')->name('admin.index');
