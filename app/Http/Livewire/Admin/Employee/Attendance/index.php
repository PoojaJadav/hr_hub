<?php

namespace App\Http\Livewire\Admin\Employee\Attendance;

use App\Models\AttendanceStatus;
use App\Models\User;
use Livewire\Component;
use App\Traits\Livewire\HasModal;
use Carbon\CarbonPeriod;
use Illuminate\Support\Carbon;

class Index extends Component
{
    use HasModal;

    public $employee;
    public $status;
    public $statuses;

    public $startDate;
    public $endDate;

    public function mount()
    {
        $this->startDate = now()->startOfWeek()->toDateString();
        $this->endDate = now()->endOfWeek()->toDateString();
        $this->statuses = AttendanceStatus::all('id','status');
    }

    public function render()
    {
        $employees = User::role(ROLE_EMPLOYEE)->active()->with('attendances',function($query){
            $query->whereBetween('date',[$this->startDate,$this->endDate]);
        })
        ->latest()
        ->paginate(10);

        $dates = CarbonPeriod::create($this->startDate,$this->endDate)->toArray();

        return view('livewire.admin.employee.attendance.index',[
            'employees' => $employees,
            'dates' => $dates,
        ]);
    }

    public function getStartDate()
    {
        $startDate = $this->startDate;
    }

    public function getEndDate()
    {
        $endDate = $this->endDate;
    }

    //For custom Pagination
    // public function paginationView()
    // {
    //     return 'livewire.custom-pagination-links-view';
    // }
}
