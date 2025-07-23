<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\JobGrade;

class JobGradeController extends Controller
{
    //
    public function Index(Request $request) {
        $data['getRecord'] = JobGrade::getRecord($request);
        return view('backend.job_grade.list',$data);
    }

    public function Add() {
        return view('backend.job_grade.add');
    }

    //store job grades
    public function Store(Request $request) {
        $user = $request->validate([
            'grade_level' => 'required',
            'lowest_sal' => 'required',
            'highest_sal' => 'required',
        ]);

        $user             = new JobGrade;
        $user->grade_level = trim($request->grade_level);
        $user->lowest_sal  = trim($request->lowest_sal);
        $user->highest_sal = trim($request->highest_sal);
        $user->save();

        return redirect('admin/job_grades')->with('success', 'Job Grade Added Successfully');   
    }//end

    //job grade edit
    public function Edit(Request $request, $id) {
        $data = JobGrade::find($id);
        return view('backend.job_grade.edit', compact('data'));
    }
}
