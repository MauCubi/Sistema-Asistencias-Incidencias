<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PuestoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('puestos')->insert([
            'nombre' => 'Director Administrativo',
            'departamento_id' => '1',
            'created_at'   => date("Y-m-d H:i:s"),
            'updated_at'   => date("Y-m-d H:i:s"),
 
        ]);

        DB::table('puestos')->insert([
            'nombre' => 'Gerente',
            'departamento_id' => '1',
            'created_at'   => date("Y-m-d H:i:s"),
            'updated_at'   => date("Y-m-d H:i:s"),
 
        ]);

        DB::table('puestos')->insert([
            'nombre' => 'Director de Recursos Humanos',
            'departamento_id' => '2',
            'created_at'   => date("Y-m-d H:i:s"),
            'updated_at'   => date("Y-m-d H:i:s"),
 
        ]);

        DB::table('puestos')->insert([
            'nombre' => 'Técnico de Selección de Personal',
            'departamento_id' => '2',
            'created_at'   => date("Y-m-d H:i:s"),
            'updated_at'   => date("Y-m-d H:i:s"),
 
        ]);

        DB::table('puestos')->insert([
            'nombre' => 'Técnico de Comunicación Interna',
            'departamento_id' => '2',
            'created_at'   => date("Y-m-d H:i:s"),
            'updated_at'   => date("Y-m-d H:i:s"),
 
        ]);

        DB::table('puestos')->insert([
            'nombre' => 'Director de Producción',
            'departamento_id' => '3',
            'created_at'   => date("Y-m-d H:i:s"),
            'updated_at'   => date("Y-m-d H:i:s"),
 
        ]);

        DB::table('puestos')->insert([
            'nombre' => 'Operario',
            'departamento_id' => '3',
            'created_at'   => date("Y-m-d H:i:s"),
            'updated_at'   => date("Y-m-d H:i:s"),
 
        ]);

        DB::table('puestos')->insert([
            'nombre' => 'Director de Compras',
            'departamento_id' => '4',
            'created_at'   => date("Y-m-d H:i:s"),
            'updated_at'   => date("Y-m-d H:i:s"),
 
        ]);

        DB::table('puestos')->insert([
            'nombre' => 'Gerente de Abastecimiento',
            'departamento_id' => '4',
            'created_at'   => date("Y-m-d H:i:s"),
            'updated_at'   => date("Y-m-d H:i:s"),
 
        ]);

        DB::table('puestos')->insert([
            'nombre' => 'Gerente de Abastecimiento',
            'departamento_id' => '4',
            'created_at'   => date("Y-m-d H:i:s"),
            'updated_at'   => date("Y-m-d H:i:s"),
 
        ]);

        DB::table('puestos')->insert([
            'nombre' => 'Asesor Financiero',
            'departamento_id' => '5',
            'created_at'   => date("Y-m-d H:i:s"),
            'updated_at'   => date("Y-m-d H:i:s"),
 
        ]);

        DB::table('puestos')->insert([
            'nombre' => 'Director de Tesorería',
            'departamento_id' => '7',
            'created_at'   => date("Y-m-d H:i:s"),
            'updated_at'   => date("Y-m-d H:i:s"),
 
        ]);

        DB::table('puestos')->insert([
            'nombre' => 'Auxiliar de Tesorería',
            'departamento_id' => '7',
            'created_at'   => date("Y-m-d H:i:s"),
            'updated_at'   => date("Y-m-d H:i:s"),
 
        ]);

        DB::table('puestos')->insert([
            'nombre' => 'Director de Contabilidad',
            'departamento_id' => '6',
            'created_at'   => date("Y-m-d H:i:s"),
            'updated_at'   => date("Y-m-d H:i:s"),
 
        ]);

        DB::table('puestos')->insert([
            'nombre' => 'Analista de Contabilidad',
            'departamento_id' => '6',
            'created_at'   => date("Y-m-d H:i:s"),
            'updated_at'   => date("Y-m-d H:i:s"),
 
        ]);

        DB::table('puestos')->insert([
            'nombre' => 'Auxiliar de Contabilidad',
            'departamento_id' => '6',
            'created_at'   => date("Y-m-d H:i:s"),
            'updated_at'   => date("Y-m-d H:i:s"),
 
        ]);
    }
}
