<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;
use Hash;
use Str;


class AuthController extends Controller {
  //login page
  public function index(Request $request) {
    return view('login');
  }//end

  //forgot password page
  public function ForgotPassword() {
    return view('forgotPassword');
  }//end

  //register
  public function Register() {
    return view('register');
  }

  //store register
  public function StoreRegister(Request $request)
{
    $validated = $request->validate([
        'name' => 'required',
        'email' => 'required|unique:users',
        'password' => 'required|min:6',
        'confirm_password' => 'required_with:password|same:password|min:6',
    ]);

    $user = new User;
    $user->name = trim($request->name);
    $user->email = trim($request->email);
    $user->password = Hash::make($request->password);
    $user->remember_token = Str::random(50);
    $user->save();

    return redirect('/')->with('success', 'Register Successfully');
}//end

//check email 
public function CheckEmail(Request $request) {
  $email = $request->input('email');
  $isExist = User::where('email', $email)->first();

  if($isExist) {
    return response()->json(array('exist' => true));
  }else{
    return response()->json(array('exist' => false));
  }

}//end


}



?>
