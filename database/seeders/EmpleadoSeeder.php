<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EmpleadoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('empleados')->insert([
            'nombre' => 'Mauro',
            'apellido' => 'Cubilla',
            'dni' => '35129339',
            'direccion' => '25 de mayo',
            'telefono' => '3764283612',
            'email' => 'dantuchiii@gmail.com',
            'puesto_id' => 1,
            'alta' => true,
            'altafip' => Carbon::parse('2021-11-16'),
            'created_at' => Carbon::parse('2021-11-16'),
 
        ]);

        DB::table('empleados')->insert([
            'nombre' => 'Nicolas',
            'apellido' => 'Pluhator',
            'dni' => '39822322',
            'direccion' => '9 de julio',
            'telefono' => '3764232344',
            'email' => 'nicolaspluhator@gmail.com',
            'puesto_id' => 3,
            'alta' => true,
            'altafip' => Carbon::parse('2021-11-17'),
            'created_at' => Carbon::parse('2021-11-17'),
 
        ]);

        DB::table('empleados')->insert([
            'nombre' => 'Julio',
            'apellido' => 'García',
            'dni' => '39000002',
            'direccion' => '9 de julio',
            'telefono' => '3764232344',
            'email' => 'julgar@gmail.com',
            'puesto_id' => 6,
            'alta' => true,
            'altafip' => Carbon::parse('2021-11-17'),
            'created_at' => Carbon::parse('2021-11-17'),
 
        ]);

        DB::table('empleados')->insert([
            'nombre' => 'Jimena',
            'apellido' => 'Fleitas',
            'dni' => '39000003',
            'direccion' => '9 de julio',
            'telefono' => '3764232344',
            'email' => 'jimefle@gmail.com',
            'puesto_id' => 4,
            'alta' => true,
            'altafip' => Carbon::parse('2021-11-17'),
            'created_at' => Carbon::parse('2021-11-17'),
 
        ]);

        DB::table('empleados')->insert([
            'nombre' => 'Rubén',
            'apellido' => 'Ojeda',
            'dni' => '39000004',
            'direccion' => '9 de julio',
            'telefono' => '3764232344',
            'email' => 'rubenojeda@gmail.com',
            'puesto_id' => 6,
            'alta' => false,
            'altafip' => Carbon::parse('2021-11-17'),
            'created_at' => Carbon::parse('2021-11-17'),
 
        ]);
    }
}
