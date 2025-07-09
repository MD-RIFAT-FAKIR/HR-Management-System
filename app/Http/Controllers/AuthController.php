<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;

class AuthController extends Controller {
  //login page
  public function index(Request $request) {
    return view('login');
  }//end

  //forgot password page
  public function ForgotPassword() {
    return view('forgotPassword');
  }//end
}



?>
