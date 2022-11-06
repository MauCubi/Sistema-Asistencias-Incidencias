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
            'apellido' => 'Rodriguez',
            'dni' => '35339339',
            'direccion' => '25 de mayo',
            'telefono' => '3764252525',
            'email' => 'mauro@mail.com',
            'puesto_id' => 1,
            'horario_id' => 1,
            'alta' => true,
            'altafip' => Carbon::parse('2021-11-16'),
            'created_at' => Carbon::parse('2021-11-16'),
 
        ]);

        DB::table('empleados')->insert([
            'nombre' => 'Nicolas',
            'apellido' => 'Rolon',
            'dni' => '39822822',
            'direccion' => '9 de julio',
            'telefono' => '376452525',
            'email' => 'nicolas@mail.com',
            'puesto_id' => 3,
            'horario_id' => 1,
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
            'email' => 'jgarcia@mail.com',
            'puesto_id' => 6,
            'horario_id' => 2,
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
            'email' => 'jfleitas@mail.com',
            'puesto_id' => 4,
            'horario_id' => 2,
            'alta' => true,
            'altafip' => Carbon::parse('2021-11-17'),
            'created_at' => Carbon::parse('2021-11-17'),
 
        ]);

        DB::table('empleados')->insert([
            'nombre' => 'Nelson',
            'apellido' => 'Mendez',
            'dni' => '39000004',
            'direccion' => '9 de julio',
            'telefono' => '3764232344',
            'email' => 'nojeda@mail.com',
            'puesto_id' => 12,
            'horario_id' => 1,
            'alta' => true,
            'altafip' => Carbon::parse('2021-11-17'),
            'created_at' => Carbon::parse('2021-11-17'),
 
        ]);

        DB::table('empleados')->insert([
            'nombre' => 'Jonathan',
            'apellido' => 'Sevilla',
            'dni' => '39000005',
            'direccion' => '9 de julio',
            'telefono' => '3764232345',
            'email' => 'jbrittan@mail.com',
            'puesto_id' => 8,
            'horario_id' => 1,
            'alta' => true,
            'altafip' => Carbon::parse('2021-11-17'),
            'created_at' => Carbon::parse('2021-11-17'),
 
        ]);

        DB::table('empleados')->insert([
            'nombre' => 'Cristal',
            'apellido' => 'Montero',
            'dni' => '39324516',
            'direccion' => '9 de julio',
            'telefono' => '3764666666',
            'email' => 'cmontero@mail.com',
            'puesto_id' => 9,
            'horario_id' => 3,
            'alta' => true,
            'altafip' => Carbon::parse('2021-11-17'),
            'created_at' => Carbon::parse('2021-11-17'),
 
        ]);

        DB::table('empleados')->insert([
            'nombre' => 'Fanny',
            'apellido' => 'Monson',
            'dni' => '39000007',
            'direccion' => '9 de julio',
            'telefono' => '3764232347',
            'email' => 'fcuello@mail.com',
            'puesto_id' => 15,
            'horario_id' => 3,
            'alta' => true,
            'altafip' => Carbon::parse('2021-11-17'),
            'created_at' => Carbon::parse('2021-11-17'),
 
        ]);

        DB::table('empleados')->insert([
            'nombre' => 'Guillermo',
            'apellido' => 'Montero',
            'dni' => '39000008',
            'direccion' => '9 de julio',
            'telefono' => '3764232348',
            'email' => 'gmontero@mail.com',
            'puesto_id' => 11,
            'horario_id' => 2,
            'alta' => true,
            'altafip' => Carbon::parse('2021-11-17'),
            'created_at' => Carbon::parse('2021-11-17'),
 
        ]);

        DB::table('empleados')->insert([
            'nombre' => 'Ruben',
            'apellido' => 'Musk',
            'dni' => '39000009',
            'direccion' => '9 de julio',
            'telefono' => '3764232349',
            'email' => 'rmusk@mail.com',
            'puesto_id' => 10,
            'horario_id' => 2,
            'alta' => true,
            'altafip' => Carbon::parse('2021-11-17'),
            'created_at' => Carbon::parse('2021-11-17'),
 
        ]);
    }
}
