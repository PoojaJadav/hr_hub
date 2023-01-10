<?php

namespace Database\Seeders;

use App\Models\AttendanceStatus;
use Illuminate\Database\Seeder;

class AttendanceStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        AttendanceStatus::factory()->create([
            'status' => 'Present',
        ]);

        AttendanceStatus::factory()->create([
            'status' => 'Leave',
        ]);

        AttendanceStatus::factory()->create([
            'status' => 'Half-Day',
        ]);

        AttendanceStatus::factory()->create([
            'status' => 'Work-From-Home',
        ]);
    }
}
