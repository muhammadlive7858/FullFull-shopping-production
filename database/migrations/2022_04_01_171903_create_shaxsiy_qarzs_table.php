<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShaxsiyQarzsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shaxsiy_qarzs', function (Blueprint $table) {
            $table->id();
             $table->timestamps();

            $table->integer('taminotchi_id');
            $table->string('desc')->nullable();
            $table->string('summa');
            $table->string('tolav');
            $table->boolean('dollor');
            $table->string('dollors')->nullable();
            $table->string('som')->nullable();
            $table->integer('product_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('shaxsiy_qarzs');
    }
}
