<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = Role::create(['name' => 'Administrador']);
        $role->givePermissionTo(Permission::all());

        $role = Role::create(['name' => 'Usuario']);
        $role->givePermissionTo('clinicas_index');
        $role->givePermissionTo('clinicas_show');
        $role->givePermissionTo('clinicas_create');
        $role->givePermissionTo('clinicas_update');
        $role->givePermissionTo('clinicas_destroy');
    }
}
