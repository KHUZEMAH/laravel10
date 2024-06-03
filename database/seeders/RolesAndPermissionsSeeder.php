<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         // Reset cached roles and permissions
         app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

         // create permissions
         Permission::create(['name' => 'edit articles']);
         Permission::create(['name' => 'delete articles']);
         Permission::create(['name' => 'publish articles']);
         Permission::create(['name' => 'unpublish articles']);
 
         // create roles and assign existing permissions
         $role = Role::create(['name' => 'writer']);
         $role->givePermissionTo('edit articles');
 
         $role = Role::create(['name' => 'admin']);
         $role->givePermissionTo(Permission::all());
    }
}
