<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Carbon\Carbon;

class CreateStanjeVerzijeRadasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stanje_verzije_rada', function (Blueprint $table) {
            $table->bigIncrements('id');
            
            $table->unsignedBigInteger('student_id')->nullable();
            $table->unsignedBigInteger('djelatnik_id')->nullable();
            
            $table->unsignedBigInteger('verzija_rada_id');
            $table->foreign('verzija_rada_id')->references('id')->on('verzije_radova');

            $table->unsignedBigInteger('status_verzije_id');
            $table->foreign('status_verzije_id')->references('id')->on('Statusi_Verzija');

            $table->date('datum')->default(Carbon::now());


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
        Schema::dropIfExists('stanje_verzije_radas');
    }
}
