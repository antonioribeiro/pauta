<?php

use App\Data\Models\ObjectType;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateObjectTypesTable extends Migration
{
    private function populate()
    {
        ObjectType::insert([
            [
                'name' => 'Emendas',
            ],
            [
                'name' => 'Destaques',
            ],
            [
                'name' => 'Proposição',
            ],
        ]);
    }

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('object_types', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->string('name');

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
        Schema::dropIfExists('object_types');
    }
}
