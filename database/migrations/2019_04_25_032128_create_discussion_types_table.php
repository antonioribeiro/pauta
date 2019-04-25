<?php

use App\Data\Models\DiscussionType;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDiscussionTypesTable extends Migration
{
    private function populate()
    {
        DiscussionType::insert([
            [
                'name' => '1a Discussão',
            ],
            [
                'name' => '2a Discussão',
            ],
            [
                'name' => 'Discussão Única',
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
        Schema::create('discussion_types', function (Blueprint $table) {
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
        Schema::dropIfExists('discussion_types');
    }
}
