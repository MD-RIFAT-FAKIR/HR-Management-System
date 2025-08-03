<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Auth;
use Str;
use File;
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


        $user                = User::find(Auth::user()->id);
        $user->name           = trim($request->name);
        $user->email          = trim($request->email);
        if(!empty($request->file('profile_img'))) {
            if(!empty($user->profile_img) && file_exists('upload/'.$user->profile_img)) {
                unlink('upload/'.$user->profile_img);
            }
            $file             = $request->file('profile_img');
            $strRandom       = Str::random(30);
            $fileName         = $strRandom.'.'.$file->getClientOriginalExtension();
            $file->move('upload/', $fileName);
            $user->profile_img = $fileName;
        }
        if(!empty($request->password)) {
            $user->password = bcrypt($request->password);
        }
        $user->save();

        return redirect("admin/my_acount")->with("success","My Acount Updated Successfully");

    }

    //start employee acount 
    public function EmployeAcount(Request $request) {
        $data['getRecord'] = User::find(Auth::user()->id);
        return view('employee.my_acount.update', $data);
    }
    //end employee acount
}
