<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Country;
use App\Models\Region;

class CountryController extends Controller
{
    //
    public function index() {
        return view("backend.countries.list");
    }

    public function add() {
        $regions = Region::get();
        return view("backend.countries.add", compact("regions"));
    }
}
