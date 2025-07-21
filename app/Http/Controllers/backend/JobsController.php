<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Job;

class JobsController extends Controller
{
    //
    public function Index() {
        $data['getRecord'] = Job::getRecord();
        return view('backend.jobs.list', $data);
    }
    //add job
    public function AddJob() {
        return view('backend.jobs.add');
    }

    //store job
    public function StoreJob(Request $request) {
        $job = $request->validate([
            'job_title'  => 'required',
            'min_salary' => 'required',
            'max_salary' => 'required',
        ]);

        $job             = new Job;
        $job->job_title   = trim($request->job_title);
        $job->min_salary  = trim($request->min_salary);
        $job->max_salary  = trim($request->max_salary);
        $job->save();

        return redirect('admin/jobs')->with('success', 'Job Added Successfully');
    }//end

    //view job
    public function ViewJob($id) {
        $job = Job::find($id);
        return view('backend.jobs.view', compact('job'));
    }

    //edit job
    public function EditJob($id) {
        $job = Job::find($id);
        return view('backend.jobs.edit', compact('job'));
    }

    //update job
     public function UpdateJob(Request $request, $id) {
        $job = $request->validate([
            'job_title'  => 'required',
            'min_salary' => 'required',
            'max_salary' => 'required',
        ]);

        $job             = Job::find($id);
        $job->job_title   = trim($request->job_title);
        $job->min_salary  = trim($request->min_salary);
        $job->max_salary  = trim($request->max_salary);
        $job->save();

        return redirect('admin/jobs')->with('success', 'Job Updated Successfully');
    }


}
