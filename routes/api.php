<?php

Route::namespace('Api')->group(function ($router) {
    Route::get('/v1/convert-link', 'LinkGenerator@convert');
});
