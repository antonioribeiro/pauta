<?php

Route::group(['prefix' => '/sessions'], function () {
    Route::get('/', 'Sessions@all')->name('sessions.all');

    Route::group(['prefix' => '/{id}'], function () {
        Route::post('/', 'Sessions@update')->name('sessions.update');

        Route::post('/publish', 'Sessions@publish')->name('sessions.publish');

        Route::post('/unpublish', 'Sessions@unpublish')->name(
            'sessions.unpublish'
        );
    });
});
