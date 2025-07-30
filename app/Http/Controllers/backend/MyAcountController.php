<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MyAcountController extends Controller
{
    //
    public function MyAcount() {
        return view("backend.my_acount.update");
    }
}
