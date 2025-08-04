<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Auth;
class InterviewController extends Controller
{
    //
    public function Index() {
        $data['getRecord'] = User::findOrFail(Auth::user()->id);
        return view("employee.interview.list", $data);
    }
}
