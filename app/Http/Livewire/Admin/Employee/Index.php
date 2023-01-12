<?php

namespace App\Http\Livewire\Admin\Employee;

use App\Models\User;
use Livewire\Component;
use App\Traits\Livewire\HasModal;

class Index extends Component
{
    use HasModal;

    public $deletedEmployee;

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
        $this->redirectToIndex();
    }

    public function render()
    {
        $employees = User::role(ROLE_EMPLOYEE)->select('id','first_name','last_name','email','is_active')
        ->latest()
        ->paginate(10);

        return view('livewire.admin.employee.index',[
            'employees'=>$employees,
        ]);
    }
}
