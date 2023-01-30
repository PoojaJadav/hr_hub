<?php

namespace App\Http\Livewire;

use App\Models\AttendanceStatus;
use App\Models\EmployeeAttendance;
use App\Models\User;
use Illuminate\Support\Carbon;
use Livewire\Component;
use Livewire\WithPagination;
use PDO;

class Dashboard extends Component
{
    use WithPagination;

    public $sortBy;

    public function mount()
    {
        $this->sortBy = 'week';
    }

    public function render()
    {
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
            ])
            ->paginate(10);

        return view('livewire.dashboard',[
            'employees' => $employees,
        ]);
    }
      // $query->when($this->sortBy == 'week',function($query){
            //     $query->where('status_id',AttendanceStatus::getStatusId(AttendanceStatus::PRESENT))
            //     ->where('date', '>=', Carbon::now()->startOfWeek()->toDateString())
            //     ->where('date', '<=', Carbon::now()->endOfWeek()->toDateString());
            // });

            // $query->when($this->sortBy == 'year',function($query){
            //     $query->whereYear('date', Carbon::now()->year);
            // });

        //     'attendances as absent_count' => function($query){
        //         $query->where('status_id',AttendanceStatus::getStatusId(AttendanceStatus::LATE))
        //             ->when($this->sortBy == 'week',function($query){
        //                     $query->where('date', '>=', Carbon::now()->startOfWeek()->toDateString())
        //                     ->where('date', '<=', Carbon::now()->endOfWeek()->toDateString());
        //     }),
        //     'attendances as absent_count' => function($query){
        //         $query->where('status_id',AttendanceStatus::getStatusId(AttendanceStatus::LATE))
        //             ->when($this->sortBy == 'week',function($query){
        //                     $query->where('date', '>=', Carbon::now()->startOfWeek()->toDateString())
        //                     ->where('date', '<=', Carbon::now()->endOfWeek()->toDateString());

        // }]
}
