<?php

namespace App\Http\Livewire\Employee;

use App\Models\User;
use Livewire\Component;

class StatusDropdown extends Component
{
    public $employee;
    public $statuses;

    public $selectedStatus;

    public $attendanceDate;

    public function mount(User $employee,$statuses,$attendanceDate)
    {
        $this->employee->attendances->each(function($status){
            if($status->date == $this->attendanceDate){
                $this->selectedStatus = $status->status_id;
            }
        });
        $this->statuses = $statuses;
        $this->attendanceDate = $attendanceDate;
    }

    public function render()
    {
        return view('livewire.employee.status-dropdown');
    }

    public function changeStatus()
    {
        if(!$this->selectedStatus){
            $this->toastNotify(__('Please select proper status!'), '', TOAST_ERROR);
            return;
        }

        $this->employee->attendances()->updateOrCreate([
            'employee_id' => $this->employee->id,
            'date'=> $this->attendanceDate->toDateString()
        ],
        [
            'status_id' => $this->selectedStatus,
        ]);

        $this->toastNotify(__('Attendance take successfully!'), '', TOAST_SUCCESS);
    }
}
