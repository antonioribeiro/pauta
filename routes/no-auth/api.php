<?php

Route::group(['prefix' => '/api/v1', 'namespace' => 'Api'], function () {
    require __DIR__ . '/api/admin.php';
    require __DIR__ . '/api/environment.php';
});
