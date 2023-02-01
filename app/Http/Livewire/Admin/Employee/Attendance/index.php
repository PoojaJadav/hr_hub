<?php

namespace App\Http\Livewire\Admin\Employee\Attendance;

use App\Models\AttendanceStatus;
use App\Models\User;
use Livewire\Component;
use App\Traits\Livewire\HasModal;
use Carbon\CarbonPeriod;
use Illuminate\Support\Carbon;
use Livewire\WithPagination;

class Index extends Component
{
    use HasModal;
    use WithPagination;

    public $employee;
    public $status;
    public $statuses;

    public $startDate;
    public $endDate;

    public function mount()
    {
        $this->startDate = now()->subWeek()->toDateString();
        $this->endDate = now()->today()->toDateString();
        $this->statuses = AttendanceStatus::all('id','label');
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

    public function updatedStartDate()
    {
        if(Carbon::parse($this->startDate)->greaterThan($this->endDate)){
            $this->startDate = now()->subWeek()->toDateString();
            return $this->toastNotify(__('Please select proper date!'), '', TOAST_INFO);
         }
    }

    public function updatedEndDate()
    {
        if(Carbon::parse($this->endDate)->lessThan($this->startDate)){
            $this->endDate = now()->today()->toDateString();
            return $this->toastNotify(__('Please select proper date!'), '', TOAST_INFO);
        }

    }
}
