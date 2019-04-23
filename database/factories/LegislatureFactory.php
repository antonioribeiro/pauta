<?php

use App\Data\Repositories\Users as UsersRepository;
use App\Data\Models\Legislature as LegislatureModel;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(LegislatureModel::class, function () {
    $yearStart = rand(2015, 2030);
    $duration = rand(1, 4);
    $user_id = app(UsersRepository::class)->randomElement()->id;

    return [
        'number' => rand(1, 10),
        'year_start' => $yearStart,
        'year_end' => $yearStart + $duration,
        'created_by_id' => $user_id,
    ];
});
