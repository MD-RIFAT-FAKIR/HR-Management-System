<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class InterviewController extends Controller
{
    //
    public function Index() {
        return view("employee.interview.list");
    }
}
