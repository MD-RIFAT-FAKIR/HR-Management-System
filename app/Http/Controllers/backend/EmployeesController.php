<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class EmployeesController extends Controller
{
    //employees list
    public function Index() {
        $data['getRecord'] = User::getRecord();
        return view('backend.employees.list', $data);
    }

    //employees add
    public function Add() {
        return view('backend.employees.add');
    }
    //employee store
    public function Store(Request $request) {
        $user = $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users',
            'hire_date' => 'required',
            'job_id' => 'required',
            'salary' => 'required',
            'commision_pct' => 'required',
            'manager_id' => 'required',
            'department_id' => 'required',
        ]);


        $user               = new User;
        $user->name          = trim($request->name);
        $user->last_name     = trim($request->last_name);
        $user->phone_number  = trim($request->phone_number);
        $user->email         = trim($request->email);
        $user->hire_date     = trim($request->hire_date);
        $user->salary        = trim($request->salary);
        $user->job_id        = trim($request->job_id);
        $user->commision_pct = trim($request->commision_pct);
        $user->manager_id    = trim($request->manager_id);
        $user->department_id = trim($request->department_id);
        $user->is_role       = 0;
        $user->save();

        return redirect('admin/employees')->with('success', 'Employee Registered Successfully');

    }
}
