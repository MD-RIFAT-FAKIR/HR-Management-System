<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\AuthController;
use App\Http\Controllers\backend\AdminController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [AuthController::class, 'index']);

//forgot password
Route::get('forgot-password', [AuthController::class, 'ForgotPassword']);
//register
Route::get('register', [AuthController::class, 'Register']);
//store register
Route::post('register_post', [AuthController::class, 'StoreRegister']);
//check email if already in db
Route::post('check-email', [AuthController::class, 'CheckEmail']);
//hr login post
Route::post('login/hr', [AuthController::class, 'LoginPost']);

//Auth HR route
Route::group(['middleware' => 'admin'], function() {
  Route::get('admin/dashboard' , [AdminController::class, 'AdminDashboard']);
});









?>