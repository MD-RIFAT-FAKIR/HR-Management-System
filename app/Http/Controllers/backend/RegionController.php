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
}
