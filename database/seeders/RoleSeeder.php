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

        Permission::create(['name' => 'admin.home',
        'description' => 'Ver Menu de Administrador'])->assignRole($role1);
        Permission::create(['name' => 'public.home',
        'description' => 'Ver Menu de Empleado'])->assignRole($role1,$role2);

        Permission::create(['name' => 'empleado.index',
                            'description' => 'Ver listado de empleados'])->assignRole($role1);
        Permission::create(['name' => 'empleado.show',                            'description' => 'Ver informacion de empleados'])->assignRole($role1);
        Permission::create(['name' => 'empleado.create',
                            'description' => 'Dar de alta un empleado'])->assignRole($role1);
        Permission::create(['name' => 'empleado.edit',
                                    'description' => 'Editar informacion de empleados'])->assignRole($role1);
        Permission::create(['name' => 'empleado.destroy',
                                    'description' => 'Dar de baja un empleado'])->assignRole($role1);

        Permission::create(['name' => 'empresa.index',
                                    'description' => 'Ver listado de empresas'])->assignRole($role1);
        Permission::create(['name' => 'empresa.show',
                                   'description' => 'Ver informacion de empresas'])->assignRole($role1);
        Permission::create(['name' => 'empresa.create',
                            'description' => 'Dar de alta una empresas'])->assignRole($role1);
        Permission::create(['name' => 'empresa.edit',
                                   'description' => 'Editar informacion de empresa'])->assignRole($role1);
        Permission::create(['name' => 'empresa.destroy',
                            'description' => 'Dar de baja una empresa'])->assignRole($role1);

        Permission::create(['name' => 'area.index',
                            'description' => 'Ver listado de areas'])->assignRole($role1);
        Permission::create(['name' => 'area.show',
                            'description' => 'Ver informacion de areas'])->assignRole($role1);
        Permission::create(['name' => 'area.create',
                            'description' => 'Dar de alta un area'])->assignRole($role1);
        Permission::create(['name' => 'area.edit',
                            'description' => 'Editar informacion de areas'])->assignRole($role1);
        Permission::create(['name' => 'area.destroy',
                            'description' => 'Dar de baja un area'])->assignRole($role1);

        Permission::create(['name' => 'puesto.index',
                            'description' => 'Ver listado de puestos'])->assignRole($role1);
        Permission::create(['name' => 'puesto.show',
                            'description' => 'Ver informacion de puestos'])->assignRole($role1);
        Permission::create(['name' => 'puesto.create',
                            'description' => 'Dar de alta un puesto'])->assignRole($role1);
        Permission::create(['name' => 'puesto.edit',
                            'description' => 'Editar informacion de puestos'])->assignRole($role1);
        Permission::create(['name' => 'puesto.destroy',
                            'description' => 'Dar de baja un puesto'])->assignRole($role1);
        
        Permission::create(['name' => 'departamento.index',
                            'description' => 'Ver listado de departamentos'])->assignRole($role1);
        Permission::create(['name' => 'departamento.show',
                            'description' => 'Ver informacion de departamentos'])->assignRole($role1);
        Permission::create(['name' => 'departamento.create',
                            'description' => 'Dar de alta un departamento'])->assignRole($role1);
        Permission::create(['name' => 'departamento.edit',
                            'description' => 'Editar informacion de departamentos'])->assignRole($role1);
        Permission::create(['name' => 'departamento.destroy',
                            'description' => 'Dar de baja un departamento'])->assignRole($role1);




    }
}
