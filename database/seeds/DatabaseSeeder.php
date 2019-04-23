<?php

use App\Data\Models\User;
use App\Data\Models\Session;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        config(['broadcasting.default' => 'null']);

        User::disableEvents();

        factory(User::class, 50)->create();

        factory(Session::class, 5)->create();
    }
}
