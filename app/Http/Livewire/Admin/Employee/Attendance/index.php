<?php

namespace App\Http\Livewire\Admin\Employee\Attendance;

use App\Models\AttendanceStatus;
use App\Models\User;
use Livewire\Component;
use App\Traits\Livewire\HasModal;

class Index extends Component
{
    use HasModal;

    public $employee;
    public $status;
    public $attendanceDate;
    public $statuses;

    protected $rules = [
        'attendanceDate' => ['before_or_equal:today'],
    ];

    public function mount()
    {
        $this->statuses = AttendanceStatus::all();
    }

    public function render()
    {
        $this->attendanceDate = now()->toDateString();

        $employees = User::role(ROLE_EMPLOYEE)->active()->with('attendance',function($query){
            $query->whereDate('date',now());
        })
        ->latest()
        ->paginate(10);

        return view('livewire.admin.employee.attendance.index',[
            'employees' => $employees,
        ]);
    }

    public function updateDate()
    {
        $this->validate();

    }

    //For custom Pagination
    // public function paginationView()
    // {
    //     return 'livewire.custom-pagination-links-view';
    // }
}
