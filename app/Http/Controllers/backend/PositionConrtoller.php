<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Position;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\PositionExport;

class PositionConrtoller extends Controller
{
    //
    public function Index(Request $request) {
        $data['getRecord'] = Position::getRecord($request);
        return view("backend.position.list", $data);
    }

    //excel export
    public function Export() {
        return Excel::download(new PositionExport, 'position.xlsx');
    }

    public function Add() {
        return view("backend.position.add");
    }

    public function Store(Request $request) {
        $request->validate([
            "position_name"          => "required",
            "daily_rate"             => "required",
            "monthly_rate"           => "required",
            "working_days_per_month" => "required",
        ]);

        $user                        = new Position;
        $user->position_name          = trim($request->position_name);
        $user->daily_rate             = trim($request->daily_rate);
        $user->monthly_rate           = trim($request->monthly_rate);
        $user->working_days_per_month = trim($request->working_days_per_month);
        $user->save();

        return redirect('admin/position')->with("success","Position Added Successfully");
    }

    public function Edit($id) {
        $data["getPosition"] = Position::findOrFail($id);
        return view("backend.position.edit", $data);
    }

    public function Update(Request $request, $id) {
        $user                        = Position::findOrFail($id);

        $user->position_name          = trim($request->position_name);
        $user->daily_rate             = trim($request->daily_rate);
        $user->monthly_rate           = trim($request->monthly_rate);
        $user->working_days_per_month = trim($request->working_days_per_month);
        $user->save();

        return redirect('admin/position')->with("success","Position Updated Successfully");
    }

    public function Delete($id) {
        $user = Position::findOrFail($id);
        $user->delete();

        return redirect()->back()->with("error","Position Deleted Successfully");
    }

}
