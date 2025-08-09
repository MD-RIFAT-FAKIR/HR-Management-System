<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;
use App\Mail\ForgotPasswordMail;
use Hash;
use Str;
use Auth;
use Mail;


class AuthController extends Controller {
  //login page
  public function index(Request $request) {
    return view('login');
  }//end

  //forgot password page
  public function ForgotPassword() {
    return view('forgotPassword');
  }//end

  public function ForgotPasswordPost(Request $request) {
    $user = User::where('email', '=', $request->email)->count();

    if ($user > 0) {
      $user = User::where('email','=', $request->email)->first();

      $random_pass = rand(111111,999999);
      $user->password = Hash::make($random_pass);
      $user->save();

      $user->random_pass = $random_pass;
      Mail::to($user->email)->send(new ForgotPasswordMail($user));

      return redirect()->back()->with('success','Password has been send to your email');

    }else {
      return redirect()->back()->with('error','No User Found !!. Please Enter Correct Email.');
    }
  }
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

//hr login 
public function LoginPost(Request $request) {
  if(Auth::attempt(['email' => $request->email, 'password' => $request->password ], true)){
    if(Auth::User()->is_role == '1') {
      return redirect()->intended('admin/dashboard');
    }elseif(Auth::User()->is_role == '0') {
      return redirect()->intended('employee/dashboard');
    }else{
      return redirect('/')->with('error', 'No HR available.. Please check..!');
    }
  }else{
    return redirect()->back()->with('error', 'Please enter correct credentials.');
  }
}//end

//admin logout
public function logout() {
  Auth::logout();
  return redirect('/');
}


}



?>
