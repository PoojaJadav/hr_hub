<?php

namespace App\Http\Livewire\Admin\Employee;

use App\Models\User;
use Livewire\Component;
use App\Traits\Livewire\HasModal;
use Livewire\WithPagination;

class Index extends Component
{
    use HasModal;
    use WithPagination;

    public $deletedEmployee;

    public $sortField;
    public $sortAsc;
    // public $perPage = 10;

    public function sortBy($field)
    {
        if($this->sortField == $field){
            $this->sortAsc = !$this->sortAsc;
        }else{
            $this->sortAsc = true;
        }
        $this->sortField = $field;
    }

    private function redirectToIndex(): void
    {
        redirect()->route('admin.employees.index');
    }

    public function openConfirmModal(User $applicant)
    {
        $this->open();
        $this->deletedEmployee = $applicant;
    }

    public function delete()
    {
        $this->deletedEmployee->delete();
        $this->deletedEmployee->is_active = false;
        $this->deletedEmployee->save();
        $this->reset('show', 'deletedEmployee');
        $this->render();
        $this->toastNotify(__('Employee has been deleted successfully!'), '', TOAST_ERROR);
        $this->redirectToIndex();
    }

    public function setStatus(User $applicant)
    {
        $applicant->is_active = ! $applicant->is_active;
        $applicant->save();
        $applicant->refresh();
        $this->toastNotify(__('Employee status has been successfully!'), '', TOAST_INFO);
    }

    public function render()
    {
        $employees = User::role(ROLE_EMPLOYEE)
        ->when($this->sortField,function($query){
            $query->orderBy($this->sortField,$this->sortAsc ? 'asc' : 'desc');
        })->paginate(10);

        // $employees = User::role(ROLE_EMPLOYEE)->select(['id','first_name', 'last_name','birth_date','email','is_active','joined_at',
        // DB::raw("DATE_FORMAT(joined_at,'%m') as month"),DB::raw("DATE_FORMAT(joined_at,'%d') as day")])
        // ->orderBy('month', 'ASC')
        // ->orderBy('day', 'ASC')
        // ->get();

        return view('livewire.admin.employee.index',[
            'employees'=>$employees,
        ]);
    }
}
