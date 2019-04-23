<?php

Route::group(
    [
        'prefix' => '/admin',
        'namespace' => 'Web\Admin',
        'middleware' => ['auth'], //, 'app.users'],
    ],
    function () {
        require __DIR__ . '/web/admin.php';
    }
);
