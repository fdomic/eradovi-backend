<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStatusVerzijasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Statusi_Verzija', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('verzija_rada_id');
            $table->foreign('verzija_rada_id')->references('id')->on('verzije_radova');
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
        Schema::dropIfExists('status_verzijas');
    }
}
