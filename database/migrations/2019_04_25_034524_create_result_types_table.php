<?php

use App\Data\Models\ResultType;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateResultTypesTable extends Migration
{
    private function populate()
    {
        ResultType::insert([
            [
                'name' => 'Sanção',
            ],
            [
                'name' => 'Veto Total',
            ],
            [
                'name' => 'Veto Parcial',
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
        Schema::create('result_types', function (Blueprint $table) {
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
        Schema::dropIfExists('result_types');
    }
}
