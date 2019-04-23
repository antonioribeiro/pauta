<?php

use Illuminate\Support\Str;
use App\Data\Repositories\Users;

Artisan::command('pauta:users:role:assign {role} {email}', function (
    $role,
    $email
) {
    if (!($user = app(Users::class)->findByEmail($email))) {
        return $this->info('E-mail não encontrado.');
    }

    $user->assign($role);

    $this->info("{$user->name} is now '{$role}'");
})->describe('Add role to user');

Artisan::command('pauta:users:role:retract {role} {email}', function (
    $role,
    $email
) {
    if (!($user = app(Users::class)->findByEmail($email))) {
        return $this->info('E-mail não encontrado.');
    }

    $user->retract($role);

    $this->info("{$user->name} is not '{$role}' anymore");
})->describe('Remove role from user');

Artisan::command('pauta:users:create {email} {name}', function ($email, $name) {
    $user = app(Users::class)->firstOrCreate(
        ['email' => $email],
        [
            'name' => $name,
            'email' => $email,
            'username' => $email,
            'password' => Hash::make(Str::random()),
        ]
    );

    $this->info("User {$user->email} created");
})->describe('Create user');
