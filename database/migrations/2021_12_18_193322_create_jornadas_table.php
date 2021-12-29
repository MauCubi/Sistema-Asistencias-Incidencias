<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJornadasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jornadas', function (Blueprint $table) {
            $table->id();
            $table->time('entrada');
            $table->time('salida');
            $table->boolean('periodo');

            //dias
            $table->boolean('isLunes')->default(false);
            $table->boolean('isMartes')->default(false);
            $table->boolean('isMiercoles')->default(false);
            $table->boolean('isJueves')->default(false);
            $table->boolean('isViernes')->default(false);
            $table->boolean('isSabado')->default(false);
            $table->boolean('isDomingo')->default(false);


            
                        
            

            $table->bigInteger('horario_id');
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
        Schema::dropIfExists('jornadas');
    }
}
