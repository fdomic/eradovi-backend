<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDjelatnikTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('djelatnici', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('korisnik_id');
            $table->foreign('korisnik_id')->references('id')->on('users');

            $table->string('ime');
            $table->string('prezime');
            $table->binary('oib');
            $table->binary('jmbag');
           
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
        Schema::dropIfExists('dijelatnik');
    }
}
