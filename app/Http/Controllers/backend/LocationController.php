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

    public function Store(Request $request) {
        $request->validate([
            "street_address"=> "required",
            "postal_code"=> "required",
            "city"=> "required",
            "state_provice"=> "required",
            "country_id"=> "required",
        ]);

        $location = new Location;
        $location->street_address = trim($request->street_address);
        $location->postal_code = trim($request->postal_code);
        $location->city = trim($request->city);
        $location->state_provice = trim($request->state_provice);
        $location->country_id = trim($request->country_id);
        $location->save();

        return redirect("admin/locations")->with("success","Location Added Successfully");

    }
}
