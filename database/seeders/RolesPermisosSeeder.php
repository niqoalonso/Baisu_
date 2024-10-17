<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
class RolesPermisosSeeder extends Seeder
{

    public function run(): void
    {
        Permission::create(['name' => 'Crear Usuarios']);
        Permission::create(['name' => 'Editar Usuarios']);
        Permission::create(['name' => 'Eliminar Usuarios']);

        Permission::create(['name' => 'Crear Roles']);
        Permission::create(['name' => 'Editar Roles']);
        Permission::create(['name' => 'Eliminar Roles']);
    }
}
