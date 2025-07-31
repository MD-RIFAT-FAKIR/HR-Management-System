<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PayRollController extends Controller
{
    //
    public function Index() {
        return view("backend.payrolls.list");
    }
}
