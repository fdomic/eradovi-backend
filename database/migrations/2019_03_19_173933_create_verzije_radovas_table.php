<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVerzijeRadovasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('verzije_radova', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->unsignedBigInteger('rad_id');
            $table->foreign('rad_id')->references('id')->on('radovi');

            $table->string('verzija_predanog_rada');
            $table->date('datum_predaje');
            $table->date('datum_pregleda');
            $table->string('opis_dorade_studenta');
            $table->string('opis_dorade_mentora');
            
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
        Schema::dropIfExists('verzije_radova');
    }
}
