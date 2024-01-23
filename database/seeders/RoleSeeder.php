<?php

namespace Database\Seeders;
use Spatie\Permission\Models\Role;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $role1 = Role::create(['name' => 'admin']);
        $role2 = Role::create(['name' => 'poseedor']);

        Permission::create(['name' => 'home'])->syncRoles([$role1,$role2]);

        Permission::create(['name' => 'actives.index'])->syncRoles([$role1,$role2]);
        Permission::create(['name' => 'actives.create'])->assignRole($role1);
        Permission::create(['name' => 'actives.edit'])->assignRole($role1);
        Permission::create(['name' => 'actives.delete'])->assignRole($role1);

        Permission::create(['name' => 'users.index'])->assignRole($role1);
        Permission::create(['name' => 'users.create'])->assignRole($role1);
        Permission::create(['name' => 'users.edit'])->assignRole($role1);
        Permission::create(['name' => 'users.delete'])->assignRole($role1);
    }
}
