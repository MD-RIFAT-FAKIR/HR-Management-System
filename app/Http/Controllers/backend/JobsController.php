<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Jobs;

class JobsController extends Controller
{
    //
    public function Index() {
        return view('backend.jobs.list');
    }
    //add job
    public function AddJob() {
        return view('backend.jobs.add');
    }
}
