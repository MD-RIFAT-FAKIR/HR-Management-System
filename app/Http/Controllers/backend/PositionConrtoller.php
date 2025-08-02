<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PositionConrtoller extends Controller
{
    //
    public function Index() {
        return view("backend.position.list");
    }

    public function Add() {
        return view("backend.position.add");
    }
}
