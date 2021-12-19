<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAsistenciasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('asistencias', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->string('title');
            $table->boolean('verify');

            $table->integer('hora');
            $table->integer('minuto');
            

            $table->dateTime('start');
            $table->dateTime('end');


            $table->bigInteger('empleado_id');
            $table->bigInteger('tipoasistencia_id');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('asistencias');
    }
}
