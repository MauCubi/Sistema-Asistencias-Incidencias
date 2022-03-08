<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHoraExtrasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hora_extras', function (Blueprint $table) {
            $table->id();
            
            $table->integer('hora');
            $table->integer('minuto');        
            // $table-String('descripcion');    

            $table->dateTime('start');
            $table->dateTime('end');     

            $table->bigInteger('empleado_id');   
            
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
        Schema::dropIfExists('hora_extras');
    }
}
