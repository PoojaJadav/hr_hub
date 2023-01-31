<?php

namespace App\Http\Livewire;

use App\Models\AttendanceStatus;
use App\Models\User;
use Illuminate\Support\Carbon;
use Livewire\Component;
use Livewire\WithPagination;

class Dashboard extends Component
{
    use WithPagination;

    public $sortBy = '';

    public $workingDaysCount;

    public $sortField;
    public $sortDirection;

    public function sortBy($field)
    {
        if($this->sortDirection == 'asc'){
            $this->sortDirection = 'desc';
        }else{
            $this->sortDirection = 'asc';
        }

        return $this->sortField = $field;
    }

    public function mount()
    {
        $this->sortBy = 'week';
    }

    public function getWorkingDaysCount()
    {
        if($this->sortBy == 'week'){
            return $this->workingDaysCount = Carbon::now()->startOfWeek()->diffInDays(Carbon::now()->endOfWeek()->subDay(1));
        }elseif($this->sortBy == 'month'){
            return $this->workingDaysCount = $this->getWorkingDays(Carbon::now()->startOfMonth(),Carbon::now()->endOfMonth());
        }else{
            return $this->workingDaysCount = $this->getWorkingDays(Carbon::now()->startOfYear(),Carbon::now()->endOfYear());
        }
    }

    function getWorkingDays($startDate, $endDate)
    {
        $begin = strtotime($startDate);
        $end   = strtotime($endDate);
        if ($begin > $end) {
            return 0;
        } else {
            $no_days  = 0;
            while ($begin <= $end) {
                $what_day = date("N", $begin);
                if (!in_array($what_day, [6,7]) )
                    $no_days++;
                $begin += 86400;
            };
            return  $no_days;
        }
    }

    public function render()
    {
        $this->workingDaysCount = $this->getWorkingDaysCount();

        $employees = User::query()
        ->role(ROLE_EMPLOYEE)
        ->active()
        ->withCount(['attendances as present_count' => function($query){
                    $query->when($this->sortBy == 'month',function($query){
                        $query->whereMonth('date', Carbon::now()->month)
                            ->whereYear('date', Carbon::now()->year)
                            ->where('status_id',AttendanceStatus::getStatusId(AttendanceStatus::PRESENT));
                    });

                    $query->when($this->sortBy == 'week',function($query){
                        $query->where('date', '>=', Carbon::now()->startOfWeek()->toDateString())
                                ->where('date', '<=', Carbon::now()->endOfWeek()->toDateString())
                                ->where('status_id',AttendanceStatus::getStatusId(AttendanceStatus::PRESENT));
                    });

                    $query->when($this->sortBy == 'year',function($query){
                        $query->whereYear('date', Carbon::now()->year)
                            ->where('status_id',AttendanceStatus::getStatusId(AttendanceStatus::PRESENT));
                    });
                },
                'attendances as absent_count' => function($query){
                    $query->when($this->sortBy == 'month',function($query){
                        $query->whereMonth('date', Carbon::now()->month)
                            ->whereYear('date', Carbon::now()->year)
                            ->where('status_id',AttendanceStatus::getStatusId(AttendanceStatus::ABSENT));
                    });

                    $query->when($this->sortBy == 'week',function($query){
                        $query->where('date', '>=', Carbon::now()->startOfWeek()->toDateString())
                            ->where('date', '<=', Carbon::now()->endOfWeek()->toDateString())
                            ->where('status_id',AttendanceStatus::getStatusId(AttendanceStatus::ABSENT));
                    });

                    $query->when($this->sortBy == 'year',function($query){
                        $query->whereYear('date', Carbon::now()->year)
                            ->where('status_id',AttendanceStatus::getStatusId(AttendanceStatus::ABSENT));
                    });
                },
                'attendances as wfh_count' => function($query){
                    $query->when($this->sortBy == 'month',function($query){
                        $query->whereMonth('date', Carbon::now()->month)
                            ->whereYear('date', Carbon::now()->year)
                            ->where('status_id',AttendanceStatus::getStatusId(AttendanceStatus::WFH));
                    });

                    $query->when($this->sortBy == 'week',function($query){
                        $query->where('date', '>=', Carbon::now()->startOfWeek()->toDateString())
                            ->where('date', '<=', Carbon::now()->endOfWeek()->toDateString())
                            ->where('status_id',AttendanceStatus::getStatusId(AttendanceStatus::WFH));
                    });

                    $query->when($this->sortBy == 'year',function($query){
                        $query->whereYear('date', Carbon::now()->year)
                            ->where('status_id',AttendanceStatus::getStatusId(AttendanceStatus::WFH));
                    });
                },
                'attendances as half_day_count' => function($query){
                    $query->when($this->sortBy == 'month',function($query){
                        $query->whereMonth('date', Carbon::now()->month)
                            ->whereYear('date', Carbon::now()->year)
                            ->where('status_id',AttendanceStatus::getStatusId(AttendanceStatus::HALF_DAY));
                    });

                    $query->when($this->sortBy == 'week',function($query){
                        $query->where('date', '>=', Carbon::now()->startOfWeek()->toDateString())
                            ->where('date', '<=', Carbon::now()->endOfWeek()->toDateString())
                            ->where('status_id',AttendanceStatus::getStatusId(AttendanceStatus::HALF_DAY));
                    });

                    $query->when($this->sortBy == 'year',function($query){
                        $query->whereYear('date', Carbon::now()->year)
                            ->where('status_id',AttendanceStatus::getStatusId(AttendanceStatus::HALF_DAY));
                    });
                },
                'attendances as late_count' => function($query){
                    $query->when($this->sortBy == 'month',function($query){
                            $query->whereMonth('date', Carbon::now()->month)
                            ->whereYear('date', Carbon::now()->year)
                            ->where('status_id',AttendanceStatus::getStatusId(AttendanceStatus::LATE));
                    });

                    $query->when($this->sortBy == 'week',function($query){
                        $query->where('date', '>=', Carbon::now()->startOfWeek()->toDateString())
                            ->where('date', '<=', Carbon::now()->endOfWeek()->toDateString())
                            ->where('status_id',AttendanceStatus::getStatusId(AttendanceStatus::LATE));
                    });

                    $query->when($this->sortBy == 'year',function($query){
                        $query->whereYear('date', Carbon::now()->year)
                            ->where('status_id',AttendanceStatus::getStatusId(AttendanceStatus::LATE));
                    });
                }
            ]) ->when($this->sortField,function($query){
                $query->orderBy($this->sortField,$this->sortDirection);
            })
            ->paginate(10);

        return view('livewire.dashboard',[
            'employees' => $employees,
        ]);
    }
}
