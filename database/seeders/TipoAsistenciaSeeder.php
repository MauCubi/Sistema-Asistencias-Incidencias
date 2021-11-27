<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TipoAsistenciaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tipo_asistencias')->insert([
            'nombre' => 'Asistencia',
            'created_at'   => date("Y-m-d H:i:s"),
            'updated_at'   => date("Y-m-d H:i:s"),
 
        ]);

        DB::table('tipo_asistencias')->insert([
            'nombre' => 'Inasistencia',
            'created_at'   => date("Y-m-d H:i:s"),
            'updated_at'   => date("Y-m-d H:i:s"),
 
        ]);

        DB::table('tipo_asistencias')->insert([
            'nombre' => 'Hora Extra',
            'created_at'   => date("Y-m-d H:i:s"),
            'updated_at'   => date("Y-m-d H:i:s"),
 
        ]);

        DB::table('tipo_asistencias')->insert([
            'nombre' => 'Tardanza',
            'created_at'   => date("Y-m-d H:i:s"),
            'updated_at'   => date("Y-m-d H:i:s"),
 
        ]);

        DB::table('tipo_asistencias')->insert([
            'nombre' => 'Retiro Temprano',
            'created_at'   => date("Y-m-d H:i:s"),
            'updated_at'   => date("Y-m-d H:i:s"),
 
        ]);
    }
}
