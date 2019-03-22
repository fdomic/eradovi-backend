<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStatusiRadasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('statusi_rada', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('naziv');
            $table->timestamps();
        });

        DB::table('statusi_rada')->insert([ 'naziv' => 'Rezervacija' ]);
        DB::table('statusi_rada')->insert([ 'naziv' => 'Rad prijavljen' ]);
        DB::table('statusi_rada')->insert([ 'naziv' => 'Rad u izradi' ]);
        DB::table('statusi_rada')->insert([ 'naziv' => 'Čeka se obrana' ]);
        DB::table('statusi_rada')->insert([ 'naziv' => 'Rad završen' ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('statusi_rada');
    }
}
