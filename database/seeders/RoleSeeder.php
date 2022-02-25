<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role1 = Role::create(['name' => 'Admin']);
        $role2 = Role::create(['name' => 'Empleado']);

        Permission::create(['name' => 'admin.home'])->assignRole($role1);
        Permission::create(['name' => 'public.home'])->assignRole($role1,$role2);

        Permission::create(['name' => 'empleado.show'])->assignRole($role1);
        Permission::create(['name' => 'empleado.create'])->assignRole($role1);
        Permission::create(['name' => 'empleado.edit'])->assignRole($role1);
        Permission::create(['name' => 'empleado.destroy'])->assignRole($role1);

        Permission::create(['name' => 'empresa.admin'])->assignRole($role1);

        Permission::create(['name' => 'area.admin'])->assignRole($role1);

        Permission::create(['name' => 'puesto.admin'])->assignRole($role1);

        Permission::create(['name' => 'departamento.admin'])->assignRole($role1);


    }
}
