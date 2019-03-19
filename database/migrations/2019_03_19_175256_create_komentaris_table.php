<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKomentarisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('komentari', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->unsignedBigInteger('radovi_id');
            $table->foreign('radovi_id')->references('id')->on('radovi');
            
            $table->unsignedBigInteger('student_id');
            $table->unsignedBigInteger('djelatnik_id');
            $table->string('komentar');
            $table->date('datum');

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
        Schema::dropIfExists('komentari');
    }
}
