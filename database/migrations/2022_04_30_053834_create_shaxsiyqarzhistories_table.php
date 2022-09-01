<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShaxsiyqarzhistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shaxsiyqarzhistories', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->bigInteger('tolav');
            $table->integer('qarz_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('shaxsiyqarzhistories');
    }
}
