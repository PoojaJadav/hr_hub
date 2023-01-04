<?php

namespace Database\Seeders;

use App\Models\AttendenceStatus;
use Illuminate\Database\Seeder;

class AttendenceStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        AttendenceStatus::insert([
            'status'=>'Present',
        ]);

        AttendenceStatus::insert([
            'status'=>'Leave',
        ]);

        AttendenceStatus::insert([
            'status'=>'Half-Day',
        ]);
        AttendenceStatus::insert([
            'status'=>'Work-From-Home',
        ]);
    }
}
