<?php

use App\Data\Models\RegimeType;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRegimeTypesTable extends Migration
{
    private function populate()
    {
        RegimeType::insert([
            [
                'name' => 'Ordinária',
            ],
            [
                'name' => 'Urgência',
            ],
            [
                'name' => 'Especial',
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
        Schema::create('regime_types', function (Blueprint $table) {
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
        Schema::dropIfExists('regime_types');
    }
}
