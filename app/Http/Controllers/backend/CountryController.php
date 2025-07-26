<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Country;
use App\Models\Region;

class CountryController extends Controller
{
    //
    public function index(Request $request) {
        $data['getRecord'] = Country::getRecord($request);
        return view("backend.countries.list", $data);
    }

    public function add() {
        $regions = Region::get();
        return view("backend.countries.add", compact("regions"));
    }

    public function store(Request $request) {
       $request->validate([
        "country_name"=> "required",
        "region_id"=> "required",
       ]);

       $country = new Country();
       $country->country_name = $request->country_name;
       $country->region_id = $request->region_id;
       $country->save();

       return redirect('admin/countries')->with("success","Country Added Sucessfully");
    
    }

    public function edit($id) {
        $country = Country::findOrFail($id);
        $regions = Region::get();
        return view("backend.countries.edit", compact("country", "regions"));
    }

    public function update(Request $request, $id) {
        $country = Country::findOrFail($id);
        $country->country_name = $request->country_name;
        $country->region_id = $request->region_id;
        $country->save();
        return redirect("admin/countries")->with("success","Country Updated Successfully");
    }

    public function delete($id) {
        $country = Country::findOrFail($id);
        $country->delete();
        
        return redirect()->back()->with("error","Country Deleted Successfully");
    }
}
