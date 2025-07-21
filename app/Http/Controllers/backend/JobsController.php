<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class JobsController extends Controller
{
    //
    public function Index() {
        return view('backend.jobs.list');
    }
}
