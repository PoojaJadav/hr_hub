<?php

namespace App\Http\Livewire\Admin\Employee;

use App\Models\User;
use Livewire\Component;
use Laravel\Jetstream\InteractsWithBanner;

class Manage extends Component
{
    use InteractsWithBanner;

    public User $user;

    public string $formMode = 'create';

    protected array $rules = [
        'user.first_name' => 'required|max:50',
        'user.last_name' => 'required|max:50',
        'user.email' => 'required|email|max:50|unique:users,email',
    ];

    public function mount(User $user)
    {
        if ($user->exists) {
            if (request()->routeIs('admin.employees.edit')) {
                $this->formMode = 'edit';
            } elseif (request()->routeIs('admin.employees.create')) {
                $this->formMode = 'create';
            }
        }
        $user = $this->user;
    }

    public function render()
    {
        return view('livewire.admin.employee.manage');
    }

    public function submit()
    {
        $this->{$this->formMode}();
    }

    public function create()
    {
        $this->validate();

        $this->user->assignRole(ROLE_EMPLOYEE)->save();

        session()->flash('banner','Employee created successfully!');

        redirect()->route('admin.employees.index');
    }

    private function redirectToIndex(): void
    {
        redirect()->route('admin.employees.index');
    }

    public function edit()
    {
        $this->validate(array_merge($this->rules, [
            'user.email' => ['required','email', 'max:100', "unique:users,email,{$this->user->id}"]
        ]));

        $this->user->save();

        session()->flash('banner','Employee updated successfully!');

        $this->redirectToIndex();
    }
}
