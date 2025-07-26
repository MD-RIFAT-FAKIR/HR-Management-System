<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Location;
use App\Models\Country;

class LocationController extends Controller
{
    //
    public function Index() {
        return view("backend.locations.list");
    }

    public function Add() {
        $data["getCountry"] = Country::all();
        return view("backend.locations.add", $data);
    }
}
