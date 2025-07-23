<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\JobGrade;

class JobGradeController extends Controller
{
    //
    public function Index() {
        return view('backend.job_grade.list');
    }

    public function Add() {
        return view('backend.job_grade.add');
    }
}
