<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\AuthController;
use App\Http\Controllers\backend\AdminController;
use App\Http\Controllers\backend\EmployeesController;
use App\Http\Controllers\backend\JobsController;

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
  //employees
  Route::get('admin/employees', [EmployeesController::class, 'Index']);
  Route::get('employees/add', [EmployeesController::class, 'Add']);
  Route::post('employees/store' , [EmployeesController::class, 'Store']);
  //employee view 
  Route::get('admin/employees/view/{id}', [EmployeesController::class, 'ViewEmployee']);
  //employee edit
  Route::get('admin/employees/edit/{id}', [EmployeesController::class, 'EditEmployee']);
  Route::post('admin/employees/update/{id}', [EmployeesController::class, 'updateEmployee']);
  Route::get('admin/employees/delete/{id}', [EmployeesController::class, 'deleteEmployee']);

  //start jobs all route
  Route::get('admin/jobs', [JobsController::class, 'Index']);
  //job add
  Route::get('admin/jobs/add', [JobsController::class, 'AddJob']);
  //job store
  Route::post('admin/job/store', [JobsController::class, 'StoreJob']);
  //job view
  Route::get('admin/jobs/view/{id}', [JobsController::class, 'ViewJob']);
  //job edit
   Route::get('admin/jobs/edit/{id}', [JobsController::class, 'EditJob']);
   //job update
   Route::Post('admin/job/update/{id}', [JobsController::class, 'UpdateJob']);
   //job delete
   Route::get('admin/job/delete/{id}', [JobsController::class, 'DeleteJob']);
   //job export
   Route::get('admin/jobs/excel', [JobsController::class, 'ExportJob']);

  
  //end jobs all route
  

});

//admin logout
Route::get('logout', [AuthController::class, 'logout']);









?>