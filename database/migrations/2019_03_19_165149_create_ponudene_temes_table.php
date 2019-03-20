<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePonudeneTemesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ponudene_teme', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->unsignedBigInteger('rad_id');
            $table->foreign('rad_id')->references('id')->on('radovi');

            $table->unsignedBigInteger('djelatnik_id');
            $table->foreign('djelatnik_id')->references('id')->on('djelatnici');

            $table->string('naziv_hr');
            $table->string('opis_hr');
            $table->string('naziv_eng');
            $table->string('opis_eng');
            $table->string('naziv_tal');
            $table->string('opis_tal');
            
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
        Schema::dropIfExists('ponudene_teme');
    }
}
