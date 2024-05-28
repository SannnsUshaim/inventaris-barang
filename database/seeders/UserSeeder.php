<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $admin = User::updateOrCreate([
            'id_user' => '123',
            'name' => 'admin',
            'email' => 'admin@mail.com',
            'password' => bcrypt('000'),
        ]);

        $operator = User::updateOrCreate([
            'id_user' => '456',
            'name' => 'operator',
            'email' => 'operator@mail.com',
            'password' => bcrypt('123'),
        ]);

        $staff = User::updateOrCreate([
            'id_user' => '789',
            'name' => 'staff',
            'email' => 'staff@mail.com',
            'password' => bcrypt('456'),
        ]);

        $this->call(RolePermissionSeeder::class);

        $admin->assignRole('admin');
        $operator->assignRole('operator');
        $staff->assignRole('staff');
    }
}
