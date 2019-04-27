<?php

use App\Data\Models\OpinionType;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOpinionTypesTable extends Migration
{
    private function populate()
    {
        OpinionType::insert([
            ['name' => 'Favorável'],
            ['name' => 'Favorável com emendas'],
            ['name' => 'Favorável com substitutivo'],
            ['name' => 'Pela constitucionalidade'],
            ['name' => 'Pela constitucionalidade com emendas'],
            ['name' => 'Contrário'],
            ['name' => 'Contrário ao substitutivo'],
            ['name' => 'Pela inconstitucionalidade'],
        ]);
    }

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('opinion_types', function (Blueprint $table) {
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
        Schema::dropIfExists('opinion_types');
    }
}
