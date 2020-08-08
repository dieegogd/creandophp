<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Permission::create(['name' => 'clinicas_index']);
        Permission::create(['name' => 'clinicas_index_createdby']);
        Permission::create(['name' => 'clinicas_show']);
        Permission::create(['name' => 'clinicas_create']);
        Permission::create(['name' => 'clinicas_update']);
        Permission::create(['name' => 'clinicas_destroy']);
        Permission::create(['name' => 'clinicas_recycle']);
        Permission::create(['name' => 'clinicas_restore']);
        Permission::create(['name' => 'clinicas_forcedelete']);
    }
}
