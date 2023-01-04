<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function index()
    {
        return view('admin.employee.index');
    }

    public function create(User $employee)
    {
        return view('admin.employee.manage',compact('employee'));
    }

    public function edit(User $employee)
    {
        return view('admin.employee.manage', compact('employee'));
    }
}
