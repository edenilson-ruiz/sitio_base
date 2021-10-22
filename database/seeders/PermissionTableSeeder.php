<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
           'role-list',
           'role-create',
           'role-edit',
           'role-delete',
           'user-list',
           'user-create',
           'user-edit',
           'user-delete',
           'centro-list',
           'centro-create',
           'centro-edit',
           'centro-delete',
           'area-list',
           'area-create',
           'area-edit',
           'area-delete',
           'empleado-list',
           'empleado-create',
           'empleado-edit',
           'empleado-delete',
           'genero-list',
           'genero-create',
           'genero-edit',
           'genero-delete',
        ];

        foreach ($permissions as $permission) {
             Permission::create(['name' => $permission]);
        }
    }
}
