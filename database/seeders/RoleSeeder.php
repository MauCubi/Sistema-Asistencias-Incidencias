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

        //Empleados
        Permission::create(['name' => 'empleado.index',
                            'description' => 'Ver listado de empleados'])->assignRole($role1);
        Permission::create(['name' => 'empleado.show',                            'description' => 'Ver informacion de empleados'])->assignRole($role1);
        Permission::create(['name' => 'empleado.create',
                            'description' => 'Dar de alta un empleado'])->assignRole($role1);
        Permission::create(['name' => 'empleado.edit',
                                    'description' => 'Editar informacion de empleados'])->assignRole($role1);
        Permission::create(['name' => 'empleado.destroy',
                                    'description' => 'Dar de baja un empleado'])->assignRole($role1);

        //Empresa
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

        //Area
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

        //Puesto                    
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

        //Departamento
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

        //Horarios
        Permission::create(['name' => 'horario.index',
                            'description' => 'Ver listado de horarios'])->assignRole($role1);
        Permission::create(['name' => 'horario.show',
                            'description' => 'Ver informacion de horarios'])->assignRole($role1);
        Permission::create(['name' => 'horario.create',
                            'description' => 'Dar de alta un horario'])->assignRole($role1);
        Permission::create(['name' => 'horario.edit',
                            'description' => 'Editar informacion de horarios'])->assignRole($role1);
        Permission::create(['name' => 'horario.destroy',
                            'description' => 'Dar de baja un horario'])->assignRole($role1);

        //Jornadas        
        Permission::create(['name' => 'jornada.create',
                            'description' => 'Dar de alta una jornada'])->assignRole($role1);
        Permission::create(['name' => 'jornada.edit',
                            'description' => 'Editar informacion de jornadas'])->assignRole($role1);
        Permission::create(['name' => 'jornada.destroy',
                            'description' => 'Dar de baja una jornada'])->assignRole($role1);

        //Horas Extras
        Permission::create(['name' => 'horaextra.index',
                            'description' => 'Ver listado de horas extras'])->assignRole($role1);
        Permission::create(['name' => 'horaextra.show',
                            'description' => 'Ver informacion de horas extras'])->assignRole($role1);
        Permission::create(['name' => 'horaextra.create',
                            'description' => 'Dar de alta un horas extras'])->assignRole($role1);
        Permission::create(['name' => 'horaextra.edit',
                            'description' => 'Editar informacion de horas extras'])->assignRole($role1);
        Permission::create(['name' => 'horaextra.destroy',
                            'description' => 'Dar de baja un horas extras'])->assignRole($role1);
        Permission::create(['name' => 'horaextra.indexPersonal',
                            'description' => 'Ver listado de horas extras personales'])->assignRole($role1,$role2);

        //Roles
        Permission::create(['name' => 'role.index',
                            'description' => 'Ver listado de roles'])->assignRole($role1);
        Permission::create(['name' => 'role.show',
                            'description' => 'Ver informacion de roles'])->assignRole($role1);
        Permission::create(['name' => 'role.create',
                            'description' => 'Dar de alta un roles'])->assignRole($role1);
        Permission::create(['name' => 'role.edit',
                            'description' => 'Editar informacion de roles'])->assignRole($role1);
        Permission::create(['name' => 'role.destroy',
                            'description' => 'Dar de baja un roles'])->assignRole($role1);

        //User
        Permission::create(['name' => 'user.index',
                            'description' => 'Ver listado de usuarios'])->assignRole($role1);
        Permission::create(['name' => 'user.edit',
                            'description' => 'Editar roles de un usuario'])->assignRole($role1);

        //Tipo Incidencias
        Permission::create(['name' => 'tipoevento.index',
                            'description' => 'Ver listado de tipos de incidencia'])->assignRole($role1);
        Permission::create(['name' => 'tipoevento.show',
                            'description' => 'Ver informacion de un tipo de incidencia'])->assignRole($role1);
        Permission::create(['name' => 'tipoevento.create',
                            'description' => 'Dar de alta un tipo de incidencia'])->assignRole($role1);
        Permission::create(['name' => 'tipoevento.edit',
                            'description' => 'Editar informacion de un tipo de incidencia'])->assignRole($role1);
        Permission::create(['name' => 'tipoevento.destroy',
                            'description' => 'Dar de baja un tipo de incidencia'])->assignRole($role1);

        //Incidencias
        Permission::create(['name' => 'event.index',
                            'description' => 'Ver listado de incidencias'])->assignRole($role1);
        Permission::create(['name' => 'event.show',
                            'description' => 'Ver informacion de una incidencia'])->assignRole($role1);
        Permission::create(['name' => 'event.create',
                            'description' => 'Dar de alta una incidencia'])->assignRole($role1);
        Permission::create(['name' => 'event.edit',
                            'description' => 'Editar informacion de una incidencia'])->assignRole($role1);
        Permission::create(['name' => 'event.destroy',
                            'description' => 'Dar de baja una incidencia'])->assignRole($role1);
        Permission::create(['name' => 'event.indexPersonal',
                            'description' => 'Ver listado de incidencias personales'])->assignRole($role1, $role2);
        Permission::create(['name' => 'event.showPersonal',
                            'description' => 'Ver informacion de una incidencia personal'])->assignRole($role1, $role2);
        Permission::create(['name' => 'event.calendario',
                            'description' => 'Ver calendario'])->assignRole($role1, $role2);


                            //Incidencias Horarias
        Permission::create(['name' => 'incidenciahoraria.index',
                            'description' => 'Ver listado de incidencias horarias'])->assignRole($role1);
        Permission::create(['name' => 'incidenciahoraria.show',
                            'description' => 'Ver informacion de una incidencia horaria'])->assignRole($role1);
        Permission::create(['name' => 'incidenciahoraria.create',
                            'description' => 'Dar de alta una incidencia horaria'])->assignRole($role1);
        Permission::create(['name' => 'incidenciahoraria.edit',
                            'description' => 'Editar informacion de una incidencia horaria'])->assignRole($role1);
        Permission::create(['name' => 'incidenciahoraria.destroy',
                            'description' => 'Dar de baja una incidencia horaria'])->assignRole($role1);        
        Permission::create(['name' => 'incidenciahoraria.personal',
                            'description' => 'Ver informacion de incidencias horarias personales'])->assignRole($role1, $role2);
        // Permission::create(['name' => 'incidenciahoraria.marcarAsistencia',
        //                     'description' => 'Marcar Incidencia'])->assignRole($role1, $role2);

        
        //Asistencias
        Permission::create(['name' => 'asistencia.index',
                            'description' => 'Ver listado de asistencias'])->assignRole($role1);
        Permission::create(['name' => 'asistencia.show',
                            'description' => 'Ver informacion de una asistencias'])->assignRole($role1);
        Permission::create(['name' => 'asistencia.create',
                            'description' => 'Dar de alta una asistencias'])->assignRole($role1);
        Permission::create(['name' => 'asistencia.edit',
                            'description' => 'Editar informacion de una asistencias'])->assignRole($role1);
        Permission::create(['name' => 'asistencia.destroy',
                            'description' => 'Dar de baja una asistencias'])->assignRole($role1);        
        Permission::create(['name' => 'asistencia.personal',
                            'description' => 'Ver informacion de asistencias personales'])->assignRole($role1, $role2);
        Permission::create(['name' => 'asistencia.marcarAsistencia',
                            'description' => 'Marcar asistencia'])->assignRole($role1, $role2);

        //PDF
        Permission::create(['name' => 'reporte.generar',
                            'description' => 'Generar reporte de empleado'])->assignRole($role1);

        




    }
}
