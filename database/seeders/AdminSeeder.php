<?php

namespace Database\Seeders;

use App\Models\Team;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $user = User::factory()->create([
            'first_name' => 'Raviraj',
            'last_name' => 'Chauhan',
            'email' => 'raviraj@pinetco.com',
        ])->assignRole([ROLE_ADMIN]);
    }
}
