<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHodimShopsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hodim_shops', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->string('fullname');
            $table->string('savdo');
            $table->bigInteger('foyda');
            $table->integer('hodim_id');
            $table->string('skidka')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('hodim_shops');
    }
}
