<?php

namespace App\Http\Livewire\Admin\Employee;

use App\Models\User;
use Livewire\Component;
use App\Traits\Livewire\HasModal;

class Index extends Component
{
    use HasModal;

    public $deletedEmployee;

    public function openConfirmModal(User $applicant)
    {
        $this->open();
        $this->deletedEmployee = $applicant;
    }

    public function delete()
    {
        $this->deletedEmployee->delete();
        $this->reset('show', 'deletedEmployee');
        $this->render();
    }

    public function setStatus(User $applicant)
    {
        $applicant->is_active = ! $applicant->is_active;
        $applicant->save();
        $applicant->refresh();
    }

    public function render()
    {
        return view('livewire.admin.employee.index',[
            'employees'=>User::role(ROLE_EMPLOYEE)->latest()->paginate(10),
        ]);
    }
}
