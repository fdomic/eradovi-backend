<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRadovisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('radovi', function (Blueprint $table) {
            $table->bigIncrements('id');

            
            $table->unsignedBigInteger('student_id');
            $table->foreign('student_id')->references('id')->on('studenti');

            $table->unsignedBigInteger('djelatnik_id');
            $table->foreign('djelatnik_id')->references('id')->on('djelatnici');

            $table->unsignedBigInteger('statusi_rada_id');
            $table->foreign('statusi_rada_id')->references('id')->on('statusi_rada');

            $table->string('url')->nullable();

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
        Schema::dropIfExists('radovi');
    }
}
