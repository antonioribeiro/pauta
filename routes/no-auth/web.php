<?php

Route::group(['prefix' => '/', 'namespace' => 'Web\Pub'], function () {
    require __DIR__ . '/web/home.php';
    require __DIR__ . '/web/link-generator.php';
});
