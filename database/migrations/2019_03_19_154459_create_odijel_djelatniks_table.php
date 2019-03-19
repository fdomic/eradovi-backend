<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOdijelDjelatniksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('odijel_djelatnik', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->unsignedBigInteger('odjel_id');
            $table->foreign('odjel_id')->references('id')->on('odjel');

            $table->unsignedBigInteger('djelatnik_id');
            $table->foreign('djelatnik_id')->references('id')->on('djelatnik');

            $table->string('naziv');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('odijel_djelatnik');
    }
}
