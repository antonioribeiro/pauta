<?php

use App\Data\Models\Session;
use App\Data\Repositories\Users;
use App\Data\Repositories\SessionTypes;

$factory->define(Session::class, function () {
    preg_match('/(.*?)@(.*)/', faker()->unique()->safeEmail, $output_array);

    return [
        'date' => \Carbon\Carbon::now()
            ->startOfMonth()
            ->addDay(rand(1, 28)),
        'time' => \Carbon\Carbon::now()
            ->startOfMonth()
            ->subHour(rand(1, 23)),
        'session_type_id' => app(SessionTypes::class)->randomElement()->id,
        'published_at' => ($published_at = rand(0, 1) ? faker()->date : null),
        'published_by_id' => $published_at
            ? app(Users::class)->randomElement()->id
            : null,
    ];
});
