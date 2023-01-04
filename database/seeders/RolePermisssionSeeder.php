<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RolePermisssionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create(['name' => ROLE_ADMIN, 'guard_name' => 'web']);
        Role::create(['name' => ROLE_EMPLOYEE, 'guard_name' => 'web']);
    }
}
