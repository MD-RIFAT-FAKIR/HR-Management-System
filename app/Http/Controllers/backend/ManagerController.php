<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Manager;

class ManagerController extends Controller
{
    //
    public function Index(Request $request) {
        $data['getRecord'] = Manager::getRecord($request);
        return view("backend.manager.list", $data);
    }

    public function Add() {
        return view("backend.manager.add");
    }

    public function Store(Request $request) {
        $request->validate([
            "manager_name"=> "required|unique:manager",
            "manager_email"=> "required|email",
            "manager_mobile"=> ['required','regex:/^01[3-9]\d{8}$/']
        ]);

        $manager                = new Manager();
        $manager->manager_name   = trim($request->manager_name);
        $manager->manager_email  = trim($request->manager_email);
        $manager->manager_mobile = trim($request->manager_mobile);
        $manager->save();

        return redirect('admin/manager')->with('success','Manager Added Successfully');
    
    }

    public function Edit(Request $request, $id) {
        $data['getRecord'] = Manager::findOrFail($id);
        return view('backend.manager.edit', $data);
    }

    public function Update(Request $request, $id) {
        $manager = Manager::findOrFail($id);

        $manager->manager_name = trim($request->manager_name);
        $manager->manager_email = trim($request->manager_email);
        $manager->manager_mobile = trim($request->manager_mobile);
        $manager->save();

        return redirect('admin/manager')->with('success','Manager Updated Successfully');
    }

    public function Delete($id) {
        $manager = Manager::findOrFail($id);
        $manager->delete();

        return redirect()->back()->with('error','Manager Deleted Successfully');
    }
}
