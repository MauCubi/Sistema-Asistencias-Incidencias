<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        $this->call([
            EmpresaSeeder::class,
            AreaSeeder::class,
            DepartamentoSeeder::class,
            PuestoSeeder::class,
            CategoriaHorarioSeeder::class,
            HorarioSeeder::class,
            JornadaSeeder::class,
            EmpleadoSeeder::class,
            TipoEventoSeeder::class,
            TipoAsistenciaSeeder::class,
            RoleSeeder::class,
            UserSeeder::class,



        ]);
    }
}
