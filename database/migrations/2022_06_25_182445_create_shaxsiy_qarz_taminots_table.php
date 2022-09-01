<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShaxsiyQarzTaminotsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shaxsiy_qarz_taminots', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->integer('taminotchi_id');
            $table->string('dollor')->nullable();
            $table->string('som')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('shaxsiy_qarz_taminots');
    }
}
