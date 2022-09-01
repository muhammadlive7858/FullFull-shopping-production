<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVaqtincha3sTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vaqtincha3s', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->integer('product_id');
            $table->string('product_name');
            $table->integer('product_count');
            $table->float('price');
            $table->float('inputVal');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vaqtincha3s');
    }
}
