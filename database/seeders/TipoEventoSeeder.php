<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TipoEventoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tipo_eventos')->insert([
            'nombre' => 'Licencia',
            'general' => false,
            'created_at'   => date("Y-m-d H:i:s"),
            'updated_at'   => date("Y-m-d H:i:s"),
 
        ]);

        DB::table('tipo_eventos')->insert([
            'nombre' => 'Asistencia',
            'general' => false,
            'created_at'   => date("Y-m-d H:i:s"),
            'updated_at'   => date("Y-m-d H:i:s"),
 
        ]);

        DB::table('tipo_eventos')->insert([
            'nombre' => 'Feriado',
            'general' => true,
            'created_at'   => date("Y-m-d H:i:s"),
            'updated_at'   => date("Y-m-d H:i:s"),
 
        ]);

        DB::table('tipo_eventos')->insert([
            'nombre' => 'Fecha de Entrega',
            'general' => true,
            'created_at'   => date("Y-m-d H:i:s"),
            'updated_at'   => date("Y-m-d H:i:s"),
 
        ]);

        DB::table('tipo_eventos')->insert([
            'nombre' => 'Otro',
            'general' => true,
            'created_at'   => date("Y-m-d H:i:s"),
            'updated_at'   => date("Y-m-d H:i:s"),
 
        ]);
    }
}
