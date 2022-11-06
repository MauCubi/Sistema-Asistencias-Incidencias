## Descripcion
Sistema para el marcado de asistencias y de control de incidencias laborales

### Funcionalidades Principales
* Gestion de areas, puestos, departamentos.
* Gestion de usuarios, empleados y sus horarios.
* Gestion de incidencias (Eventos, licencias, vacaciones).
* Gestion de asistencias, faltas, tardanzas y retiros tempranos.
* Permite el marcado de asistencias (Entrada/Salida) y deteccion automatica si el empleado llego tarde o se retiro temprano.

### Tecnologias Usadas

* Laravel Framework
* HTML5
* JavaScript
* CSS
* PHP

### Requerimientos

* PHP 7 (Se ha usado 7.4 para el desarrollo del sistema)
* Un entorno de desarrollo/ejecucion (Laragon, XAMPP)

### Instalación

1. Descargue la ultima version del proyecto (https://github.com/MauCubi/Sistema-Asistencias-Incidencias/releases)
2. Descomprima el .zip dentro de la carpeta de proyectos de su entorno de desarrollo (laragon/www, xampp/htdocs, etc)
3. Cree una base de datos en el entorno con el nombre 'asistencias'
4. Modificar el nombre del archivo env.example a env
5. Reemplazar los valores de las variables de Base de Datos a la configuracion local de tu BD (DB_CONNECTION,DB_HOST,DB_PORT,DB_USERNAME,DB_PASSWORD)
6. Abrir una terminal e ir a la carpeta del proyecto y ejecutar el comando 'php artisan migrate:refresh --seed' para crear las tablas y hacer un seed inicial
7. Al abrir el sistema web se debera logear con los siguientes datos: email = mauro@mail.com  ,  password = 12345678

