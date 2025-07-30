<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Auth;
class MyAcountController extends Controller
{
    //
    public function MyAcount() {
        $data['getRecord'] = User::find(Auth::user()->id);
        return view("backend.my_acount.update", $data);
    }

    public function UpdateAcount(Request $request) {
        $request->validate([
            "email"=> "required|unique:users,email,".Auth::user()->id,
        ]);


        $user              = User::find(Auth::user()->id);
        $user->name         = trim($request->name);
        $user->email        = trim($request->email);
        if(!empty($request->password)) {
            $user->password = bcrypt($request->password);
        }
        $user->save();

        return redirect("admin/my_acount")->with("success","My Acount Updated Successfully");

    }
}
