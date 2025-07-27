<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Location;
use App\Models\Country;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\LocationExport;

class LocationController extends Controller
{
    //
    public function Index(Request $request) {
        $data['getRecord'] = Location::getRecord($request);
        return view("backend.locations.list", $data);
    }

    public function Add() {
        $data["getCountry"] = Country::all();
        return view("backend.locations.add", $data);
    }

    public function Store(Request $request) {
        $request->validate([
            "street_address"=> "required",
            "postal_code"=> "required|numeric",
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

    public function Edit($id) {
        $data["getRecord"] = Location::findOrFail($id);
        $data["getCountry"] = Country::all();
        return view("backend.locations.edit", $data);
    }

    public function Update(Request $request, $id) {

        $location = Location::findOrFail($id);

        $location->street_address = trim($request->street_address);
        $location->postal_code = trim($request->postal_code);
        $location->city = trim($request->city);
        $location->state_provice = trim($request->state_provice);
        $location->country_id = trim($request->country_id);
        $location->save();

        return redirect("admin/locations")->with("success","Location Updated Successfully");
    }

    public function Delete($id) {
        $location = Location::findOrFail($id);
        $location->delete();
        return redirect()->back()->with("error","Location Deleted Successfully");
    }

    //excel export
    public function Export() {
        return Excel::download(new LocationExport, 'location.xlsx');
    }
    //end
}
