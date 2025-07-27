<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Department;
use App\Models\Location;

class DepartmentController extends Controller
{
    //
    public function Index() {
        return view("backend.departments.list");
    }

    public function Add(Request $request) {
        $data['getLocation'] = Location::all();
        return view("backend.departments.add", $data);
    }
}
