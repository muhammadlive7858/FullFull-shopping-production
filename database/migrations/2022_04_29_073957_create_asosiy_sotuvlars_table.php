<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAsosiySotuvlarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('asosiy_sotuvlars', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->string('fullname');
            $table->string('savdo');
            $table->float('foyda');
            $table->integer('client_id')->nullable();
            $table->string('skidka')->nullable();
            $table->float('naxt')->nullable();
            $table->float('plastik')->nullable();
            $table->string('month');
            $table->string('year');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('asosiy_sotuvlars');
    }
}
