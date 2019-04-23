<?php

use App\Data\Models\User;
use App\Data\Repositories\Users;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    const USERS = [
        'afaria@alerj.rj.gov.br' => 'Antonio Carlos Ribeiro',
        'ovalenca@alerj.rj.gov.br' => 'Orlando Vinícios Valença',
        'bmasquio@alerj.rj.gov.br' => 'Bruno Masquio',
        'afdsilva@alerj.rj.gov.br' => 'Alexandre Ferreira',
        'blainier@alerj.rj.gov.br' => 'Breno Laignier',
        'system@pauta.alerj.rj.gov.br' => 'SISTEMA PAUTA',
    ];

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->string('name');
            $table->string('email')->unique();
            $table->string('username');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password')->nullable();
            $table->integer('per_page')->default(5);
            $table->rememberToken();

            $table
                ->bigInteger('created_by_id')
                ->unsigned()
                ->nullable();

            $table
                ->bigInteger('updated_by_id')
                ->unsigned()
                ->nullable();

            $table->timestamps();
        });

        $this->populate();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }

    private function populate()
    {
        collect(static::USERS)->each(function ($name, $email) {
            User::disableEvents();

            app(Users::class)
                ->firstOrCreate([
                    'email' => $email,
                    'name' => $name,
                    'username' => $email,
                    'password' => 'empty-password',
                ])
                ->assign('administrator');
        });
    }
}
