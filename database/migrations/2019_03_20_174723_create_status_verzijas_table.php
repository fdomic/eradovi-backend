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
            $table->string('naziv');
            $table->timestamps();
        });

        
        DB::table('Statusi_Verzija')->insert([ 'naziv' => 'Dorada' ]);
        DB::table('Statusi_Verzija')->insert([ 'naziv' => 'Rad nepotpun' ]);
        

       

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
