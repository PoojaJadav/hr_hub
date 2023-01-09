<?php

namespace App\Http\Livewire\Employee;

use App\Models\AttendanceStatus;
use App\Models\User;
use Livewire\Component;

class StatusDropdown extends Component
{
    public $employee;
    public $statuses;

    public $selectedStatus;

    public $attendanceDate;

    public function mount(User $employee,$statuses)
    {
        $this->statuses = $statuses;
        $this->selectedStatus = $this->employee->attendance?->status_id;
    }

    public function render()
    {
        return view('livewire.employee.status-dropdown');
    }

    public function changeStatus()
    {
        $this->employee->attendance()->updateOrCreate(['employee_id' => $this->employee->id],[
            'status_id' => $this->selectedStatus,
            'date' => now(),
        ]);
    }
}
