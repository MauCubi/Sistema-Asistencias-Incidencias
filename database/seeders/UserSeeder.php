<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Mauro Rodriguez',
            'email' => 'mauro@mail.com',
            'password' => bcrypt('12345678'),
            'empleado_id' => 1
        ])->assignRole('Admin');

        User::create([
            'name' => 'Nicolas Rolon',
            'email' => 'nicolas@mail.com',
            'password' => bcrypt('12345678'),
            'empleado_id' => 2
        ])->assignRole('Admin');

        User::create([
            'name' => 'Jimena Fleitas',
            'email' => 'jfleitas@mail.com',
            'password' => bcrypt('12345678'),
            'empleado_id' => 4
        ])->assignRole('Empleado');


    }
}
