<?php

use Carbon\Carbon;
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

            $table->string('datoteka_ime');
            $table->string('datoteka');
            
            $table->integer('verzija_predanog_rada')->default(0);
            $table->date('datum_predaje')->default(Carbon::now());
            $table->date('datum_pregleda')->nullable();
            $table->string('opis_dorade_studenta')->nullable();
            $table->string('opis_dorade_mentora')->nullable();

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
