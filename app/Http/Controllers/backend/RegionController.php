<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Region;

class RegionController extends Controller
{
    //
    public function Index(Request $request) {
        $data['getRecord'] = Region::getRecord($request);
        return view('backend.regions.list', $data);
    }

    public function Add() {
        return view('backend.regions.add');
    }

    public function Store(Request $request) {
        $request->validate([
            'region_name'=> 'required|string',
        ]);

        $region = new Region();
        $region->region_name = trim($request->region_name);
        $region->save();

        return redirect('admin/regions')->with('success','Region Added Successfully');
    }
}
