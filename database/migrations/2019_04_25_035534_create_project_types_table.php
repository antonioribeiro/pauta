<?php

use App\Data\Models\ProjectType;
use App\Data\Models\RegimeType;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectTypesTable extends Migration
{
    private function populate()
    {
        ProjectType::insert([
            ['name' => 'Resolução'],
            ['name' => 'Lei Complementar'],
            ['name' => 'Lei Ordinária'],
            ['name' => 'Decreto Legislativo'],
            ['name' => 'Emenda Constitucional'],
            ['name' => 'Indicação Legislativa'],
        ]);
    }

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('project_types', function (Blueprint $table) {
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
        Schema::dropIfExists('project_types');
    }
}
