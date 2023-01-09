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
        AttendanceStatus::insert([
            'status'=>'Present',
        ]);

        AttendanceStatus::insert([
            'status'=>'Leave',
        ]);

        AttendanceStatus::insert([
            'status'=>'Half-Day',
        ]);
        AttendanceStatus::insert([
            'status'=>'Work-From-Home',
        ]);
    }
}
