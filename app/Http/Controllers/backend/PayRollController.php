<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class PayRollController extends Controller
{
    //
    public function Index() {
        return view("backend.payrolls.list");
    }

    public function Add() {
        $data['getEmployee'] = User::where('is_role', '=', 0)->get();
        return view("backend.payrolls.add", $data);
    }
}
