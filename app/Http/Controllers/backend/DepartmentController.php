<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Department;
use App\Models\Location;

class DepartmentController extends Controller
{
    //
    public function Index(Request $request) {
        $data['getRecord'] = Department::getRecord($request);
        return view("backend.departments.list", $data);
    }

    public function Add(Request $request) {
        $data['getLocation'] = Location::all();
        return view("backend.departments.add", $data);
    }

    public function Store(Request $request) {

        $request->validate([
            "department_name"=> "required",
            "manager_id"=> "required",
            "location_id"=> "required",
        ]);


        $department                 = new Department;
        $department->department_name = $request->department_name;
        $department->manager_id      = $request->manager_id;
        $department->location_id     = $request->location_id;
        $department->save();

        return redirect('admin/departments')->with("success","Department Added Successfully");
    
    }

    public function Edit($id) {
        $data['getRecord'] = Department::findOrFail($id);
        $data['getLocation'] = Location::all();
        return view("backend.departments.edit", $data);
    }

    public function Update(Request $request, $id) {
        $department = Department::findOrFail($id);

        $department->department_name = $request->department_name;
        $department->manager_id      = $request->manager_id;
        $department->location_id     = $request->location_id;
        $department->save();

        return redirect('admin/departments')->with("success","Department Updated Successfully");
    }

    public function Delete($id) {
        $department = Department::findOrFail($id)->delete();

        return redirect()->back()->with("error","Department Deleted Successfully");
    }
}
