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
    public function Index() {
        return view('backend.job_history.list');
    }

    public function Add() {
        $users = User::where('is_role', '=', 0)->get();
        $jobs = Job::get();
        return view('backend.job_history.add', compact('jobs', 'users'));
    }
}
