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
            'nombre' => 'Licencia por maternidad',
            'general' => false,
            'descuento' => false,
            'noLaboral' => true,
            'diasLimite' => 90,
            'created_at'   => date("Y-m-d H:i:s"),
            'updated_at'   => date("Y-m-d H:i:s"),
 
        ]);

        DB::table('tipo_eventos')->insert([
            'nombre' => 'Licencia por enfermedad',
            'general' => false,
            'descuento' => false,
            'noLaboral' => true,
            'created_at'   => date("Y-m-d H:i:s"),
            'updated_at'   => date("Y-m-d H:i:s"),
 
        ]);

        DB::table('tipo_eventos')->insert([
            'nombre' => 'Licencia por matrimonio',
            'general' => false,
            'descuento' => false,
            'noLaboral' => true,
            'diasLimite' => 10,
            'created_at'   => date("Y-m-d H:i:s"),
            'updated_at'   => date("Y-m-d H:i:s"),
 
        ]);

        DB::table('tipo_eventos')->insert([
            'nombre' => 'Licencia por fallecimiento',
            'general' => false,
            'descuento' => false,
            'noLaboral' => true,
            'diasLimite' => 3,
            'created_at'   => date("Y-m-d H:i:s"),
            'updated_at'   => date("Y-m-d H:i:s"),
 
        ]);

        DB::table('tipo_eventos')->insert([
            'nombre' => 'Licencia por exámen',
            'general' => false,
            'descuento' => true,
            'noLaboral' => true,
            'diasLimite' => 2,
            'created_at'   => date("Y-m-d H:i:s"),
            'updated_at'   => date("Y-m-d H:i:s"),
 
        ]);

        DB::table('tipo_eventos')->insert([
            'nombre' => 'Vacaciones',
            'general' => false,
            'descuento' => false,
            'noLaboral' => true,
            'created_at'   => date("Y-m-d H:i:s"),
            'updated_at'   => date("Y-m-d H:i:s"),
 
        ]);

        // DB::table('tipo_eventos')->insert([
        //     'nombre' => 'Asistencia',
        //     'general' => false,
        //     'descuento' => false,
        //     'created_at'   => date("Y-m-d H:i:s"),
        //     'updated_at'   => date("Y-m-d H:i:s"),
 
        // ]);

        DB::table('tipo_eventos')->insert([
            'nombre' => 'Feriado',
            'general' => true,
            'descuento' => false,
            'noLaboral' => true,
            'created_at'   => date("Y-m-d H:i:s"),
            'updated_at'   => date("Y-m-d H:i:s"),
 
        ]);

        DB::table('tipo_eventos')->insert([
            'nombre' => 'Fecha de Entrega',
            'general' => true,
            'descuento' => false,
            'noLaboral' => false,
            'created_at'   => date("Y-m-d H:i:s"),
            'updated_at'   => date("Y-m-d H:i:s"),
 
        ]);        


    }
}
