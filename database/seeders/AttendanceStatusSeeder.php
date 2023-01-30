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

        $statusList = [
            'present' => 'Present',
            'absent' => 'Absent',
            'wfh' => 'WFH',
            'half_day' => 'Half Day',
            'late' => 'Late',
        ];

        foreach ($statusList as $identifier => $status) {
            AttendanceStatus::create([
                'identifier' => $identifier,
                'label'      => $status,
            ]);
        }
    }
}
