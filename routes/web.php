<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\AuthController;
use App\Http\Controllers\backend\AdminController;
use App\Http\Controllers\backend\EmployeesController;
use App\Http\Controllers\backend\JobsController;
use App\Http\Controllers\backend\JobHistoryController;
use App\Http\Controllers\backend\JobGradeController;
use App\Http\Controllers\backend\RegionController;

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

  //start job history all route
  Route::get('admin/job_history', [JobHistoryController::class, 'Index']);
  //add job history
  Route::get('admin/job_history/add', [JobHistoryController::class, 'Add']);
  //store job history
  Route::post('admin/job_history/store', [JobHistoryController::class, 'Store']);
  //edit job history
  Route::get('admin/job_history/edit/{id}', [JobHistoryController::class, 'Edit']);
  //update job history
  Route::post('admin/job_history/update/{id}', [JobHistoryController::class, 'Update']);
  //delete job history
  Route::get('admin/job_history/delete/{id}', [JobHistoryController::class, 'Delete']);
  //job history export Excel
  Route::get('admin/job_history/excel', [JobHistoryController::class, 'ExportJobHistory']);
  //end job history all route

  //start job grade all route
  Route::get('admin/job_grades' , [JobGradeController:: class, 'Index']);
  //job grade add 
  Route::get('admin/job_grades/add' , [JobGradeController:: class, 'Add']);
  //job grade store 
  Route::post('admin/job_grades/store', [JobGradeController:: class, 'Store']);
  //job grade edit
  Route::get('admin/job_grades/edit/{id}', [JobGradeController::class, 'Edit']);
  //job grade update
  Route::post('admin/job_grades/update/{id}', [JobGradeController::class, 'Update']);
  //job grade delete
  Route::get('admin/job_grades/delete/{id}', [JobGradeController::class, 'Delete']);
  //end job grade all route

  //admin region all route
  Route::get('admin/regions', [RegionController::class, 'Index']);
  Route::get('admin/regions/add', [RegionController::class, 'Add']);
  Route::post('admin/regions/store', [RegionController::class,'Store']);
  Route::get('admin/regions/edit/{id}', [RegionController::class, 'Edit']);
  Route::post('admin/regions/update/{id}', [RegionController::class,'Update']);
  Route::get('admin/regions/delete/{id}', [RegionController::class, 'Delete']);

  //end admin region all route


});

//admin logout
Route::get('logout', [AuthController::class, 'logout']);









?>