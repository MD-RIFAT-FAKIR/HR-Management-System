<?php

namespace App\Http\Controllers\backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Job;
use App\Models\JobHistory;
use App\Models\Region;
use App\Models\Country;
use App\Models\Location;
use App\Models\Department;
use App\Models\Manager;
use App\Models\PayRoll;
use App\Models\Position;
use Auth;

class AdminController extends Controller
{
    public function AdminDashboard() {

        if(Auth::user()->is_role == 1) {

        $data['employeeCount'] = User::count();
        $data['hrCount'] = User::where('is_role', '=', 1)->count();
        $data['empCount'] = User::where('is_role', '=', 0)->count();
        $data['jobCount'] = Job::count();
        $data['jobHistoryCount'] = JobHistory::count();
        $data['regionCount'] = Region::count();
        $data['countryCount'] = Country::count();
        $data['locationCount'] = Location::count();
        $data['departmentCount'] = Department::count();
        $data['managerCount'] = Manager::count();
        $data['payRollCount'] = PayRoll::count();
        $data['positionCount'] = Position::count();

        return view('backend.dashboard.list', $data);
        } else if(Auth::user()->is_role == 0) {
            return view('employee.dashboard.list');
        }

    }
}
