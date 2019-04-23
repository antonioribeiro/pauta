<?php

Route::group(
    [
        'prefix' => '/api/v1',
        'namespace' => 'Api',
        'middleware' => ['auth', 'app.users'],
    ],
    function () {
        require __DIR__ . '/api/admin.php';
        require __DIR__ . '/api/users.php';
    }
);
