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
            'horario_id' => 1,
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
            'email' => 'jgarcia@gmail.com',
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
            'email' => 'jfleitas@gmail.com',
            'puesto_id' => 4,
            'horario_id' => 2,
            'alta' => true,
            'altafip' => Carbon::parse('2021-11-17'),
            'created_at' => Carbon::parse('2021-11-17'),
 
        ]);

        DB::table('empleados')->insert([
            'nombre' => 'Nelson',
            'apellido' => 'Ojeda',
            'dni' => '39000004',
            'direccion' => '9 de julio',
            'telefono' => '3764232344',
            'email' => 'nojeda@gmail.com',
            'puesto_id' => 12,
            'horario_id' => 1,
            'alta' => true,
            'altafip' => Carbon::parse('2021-11-17'),
            'created_at' => Carbon::parse('2021-11-17'),
 
        ]);

        DB::table('empleados')->insert([
            'nombre' => 'Jonathan',
            'apellido' => 'Brittan',
            'dni' => '39000005',
            'direccion' => '9 de julio',
            'telefono' => '3764232345',
            'email' => 'jbrittan@gmail.com',
            'puesto_id' => 8,
            'horario_id' => 1,
            'alta' => true,
            'altafip' => Carbon::parse('2021-11-17'),
            'created_at' => Carbon::parse('2021-11-17'),
 
        ]);

        DB::table('empleados')->insert([
            'nombre' => 'Cristal',
            'apellido' => 'Miño',
            'dni' => '39000006',
            'direccion' => '9 de julio',
            'telefono' => '3764232346',
            'email' => 'cmiño@gmail.com',
            'puesto_id' => 9,
            'horario_id' => 3,
            'alta' => true,
            'altafip' => Carbon::parse('2021-11-17'),
            'created_at' => Carbon::parse('2021-11-17'),
 
        ]);

        DB::table('empleados')->insert([
            'nombre' => 'Fanny',
            'apellido' => 'Cuello',
            'dni' => '39000007',
            'direccion' => '9 de julio',
            'telefono' => '3764232347',
            'email' => 'fcuello@gmail.com',
            'puesto_id' => 15,
            'horario_id' => 3,
            'alta' => true,
            'altafip' => Carbon::parse('2021-11-17'),
            'created_at' => Carbon::parse('2021-11-17'),
 
        ]);

        DB::table('empleados')->insert([
            'nombre' => 'Guillermo',
            'apellido' => 'Rotchen',
            'dni' => '39000008',
            'direccion' => '9 de julio',
            'telefono' => '3764232348',
            'email' => 'grotchen@gmail.com',
            'puesto_id' => 11,
            'horario_id' => 2,
            'alta' => true,
            'altafip' => Carbon::parse('2021-11-17'),
            'created_at' => Carbon::parse('2021-11-17'),
 
        ]);

        DB::table('empleados')->insert([
            'nombre' => 'Ruben',
            'apellido' => 'Krauchuk',
            'dni' => '39000009',
            'direccion' => '9 de julio',
            'telefono' => '3764232349',
            'email' => 'rkrauchuk@gmail.com',
            'puesto_id' => 10,
            'horario_id' => 2,
            'alta' => true,
            'altafip' => Carbon::parse('2021-11-17'),
            'created_at' => Carbon::parse('2021-11-17'),
 
        ]);
    }
}
