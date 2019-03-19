<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOdjelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('odjel', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('fakultet_id');
            $table->foreign('fakultet_id')->references('id')->on('fakultet');

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
        Schema::dropIfExists('odjel');
    }
}
