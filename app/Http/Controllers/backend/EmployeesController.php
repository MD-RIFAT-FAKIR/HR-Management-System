<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EmployeesController extends Controller
{
    //employees list
    public function Index() {
        return view('backend.employees.list');
    }
}
