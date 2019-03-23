<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Carbon\Carbon;

class CreateStanjeRadasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stanje_rada', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->unsignedBigInteger('rad_id');
            $table->foreign('rad_id')->references('id')->on('radovi');

            $table->unsignedBigInteger('statusi_rada_id');
            $table->foreign('statusi_rada_id')->references('id')->on('statusi_rada');

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
        Schema::dropIfExists('stanje_radas');
    }
}
