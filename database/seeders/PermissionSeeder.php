<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Permission;

class PermissionSeeder extends Seeder
{
    public function run(): void
    {
        $permissions = [
            ['name' => 'crear_usuario', 'description' => 'Crear Usuario'],
            ['name' => 'crear_rol', 'description' => 'Crear Rol'],
            ['name' => 'editar_usuario', 'description' => 'Editar Usuario'],
            ['name' => 'eliminar_usuario', 'description' => 'Eliminar Usuario'],
            ['name' => 'editar_rol', 'description' => 'Editar Rol'],
            ['name' => 'asignar_permisos_rol', 'description' => 'Asignación de permisos a un rol'],
            ['name' => 'parametrizar_permiso', 'description' => 'Parametrizar un permiso'],
        ];
        foreach ($permissions as $perm) {
            Permission::firstOrCreate(['name' => $perm['name']], $perm);
        }
    }
}
