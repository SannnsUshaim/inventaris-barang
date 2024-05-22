<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;



class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        
        $role_admin = Role::create(['name'=> 'admin']);
        $role_operator = Role::create(['name'=> 'operator']);
        $role_staff = Role::create(['name'=> 'staff']);
    }
}
