<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EmpresaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('empresas')->insert([
            'cuit'          => '30123456789',
            'nombre'        => 'EmpresaTest',
            'contacto'      => 'contact.empresatest@gmail.com',
            'telefono'      => '49994242',
            'created_at'  	=> date("Y-m-d H:i:s"),
        	'updated_at'    => date("Y-m-d H:i:s"),
        ]);
    }
}
