<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIncidenciaHorariasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('incidencia_horarias', function (Blueprint $table) {
            $table->id();

            $table->date('fecha');
            $table->string('tipo');
            $table->string('justificacion');
            $table->string('descripcion');

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
        Schema::dropIfExists('incidencia_horarias');
    }
}
