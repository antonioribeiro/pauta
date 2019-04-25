<?php

use App\Data\Models\ProjectState;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectStatesTable extends Migration
{
    private function populate()
    {
        ProjectState::insert([
            [
                'name' => 'Será Discutida',
            ],
            [
                'name' => 'Disponível para receber Emendas',
            ],
            [
                'name' => 'Será votada',
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
        Schema::create('project_states', function (Blueprint $table) {
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
        Schema::dropIfExists('project_states');
    }
}
