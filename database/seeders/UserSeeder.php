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
            'name' => 'admin',
            'email' => 'admin@mail.com',
            'password' => Hash::make('000'),
        ]);

        $operator = User::updateOrCreate([
            'name' => 'operator',
            'email' => 'operator@mail.com',
            'password' => Hash::make('123'),
        ]);

        $staff = User::updateOrCreate([
            'name' => 'staff',
            'email' => 'staff@mail.com',
            'password' => Hash::make('456'),
        ]);

        $this->call(RolePermissionSeeder::class);

        $admin->assignRole('admin');
        $operator->assignRole('operator');
        $staff->assignRole('staff');
    }
}
