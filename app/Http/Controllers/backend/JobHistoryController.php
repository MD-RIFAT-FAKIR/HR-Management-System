<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Job;
use App\Models\JobHistory;

class JobHistoryController extends Controller
{
    //
    public function Index(Request $request) {
        $data['getRecord'] = JobHistory::getRecord($request);
        return view('backend.job_history.list', $data);
    }

    public function Add() {
        $users = User::where('is_role', '=', 0)->get();
        $jobs = Job::get();
        return view('backend.job_history.add', compact('jobs', 'users'));
    }

    //store job history 
    public function Store(Request $request) {
        $user = $request->validate([
            'employee_id'   => 'required',
            'job_id'        => 'required',
            'start_date'     => 'required',
            'end_date'      => 'required',
            'department_id' => 'required',
        ]);

        $user               = new JobHistory;
        $user->employee_id   = trim($request->employee_id);
        $user->job_id        = trim($request->job_id);
        $user->start_date     = trim($request->start_date);
        $user->end_date      = trim($request->end_date);
        $user->department_id = trim($request->department_id);
        $user->save();

        return redirect('admin/job_history')->with('success', 'Record Added Successfully');
    }//

    //edit job history
    public function Edit($id) {
        $users = User::where('is_role', '=', 0)->get();
        $jobs = Job::get();
        $jobHistory = JobHistory::find($id);

        return view('backend.job_history.edit', compact('jobs', 'users', 'jobHistory'));
    }

    //job History update
    public function Update(Request $request, $id) {

        $user               = JobHistory::find($id);
        $user->employee_id   = trim($request->employee_id);
        $user->job_id        = trim($request->job_id);
        $user->start_date     = trim($request->start_date);
        $user->end_date      = trim($request->end_date);
        $user->department_id = trim($request->department_id);
        $user->save();

        return redirect('admin/job_history')->with('success', 'Record Edited Successfully');

    }//end

    //job history delete
    public function Delete($id) {
        $user = JobHistory::find($id)->delete();

        return redirect()->back()->with('error', 'Record Deleted Successfully');
    }
}
