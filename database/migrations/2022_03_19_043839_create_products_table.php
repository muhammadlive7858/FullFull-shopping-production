<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->string('name');
            $table->integer('category_id');
            $table->string('desc')->nullable();
            $table->string('image')->nullable();
            $table->integer('taminotchi')->nullable();
            $table->string('price');
            $table->string('shop_price');
            $table->boolean('dollor');
            $table->string('som')->nullable();
            $table->string('dollors')->nullable();
            $table->integer('producttime');
            $table->float('count');
            $table->float('taminotcount');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
