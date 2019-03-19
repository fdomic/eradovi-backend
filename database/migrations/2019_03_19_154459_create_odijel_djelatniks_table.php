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
        Schema::create('odijeli_djelatnika', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->unsignedBigInteger('odjel_id');
            $table->foreign('odjel_id')->references('id')->on('odjeli');

            $table->unsignedBigInteger('djelatnik_id');
            $table->foreign('djelatnik_id')->references('id')->on('djelatnici');

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
        Schema::dropIfExists('odijeli_djelatnika');
    }
}
