<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleAndPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissions = require database_path('initial_data/permissions.php');
        foreach ($permissions as $key => $permission) {
            Permission::create([
                'name' => $key,
                'guard_name' => 'admin',
            ]);
        }

        $superAdminRole = Role::create([
            'name' => 'super_admin',
            'guard_name' => 'admin',
        ]);

        $superAdminRole->givePermissionTo(Permission::all());

        $admin = Admin::first();
        $admin->assignRole($superAdminRole);
    }
}
