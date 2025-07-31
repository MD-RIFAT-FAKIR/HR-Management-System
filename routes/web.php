<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\AuthController;
use App\Http\Controllers\backend\AdminController;
use App\Http\Controllers\backend\EmployeesController;
use App\Http\Controllers\backend\JobsController;
use App\Http\Controllers\backend\JobHistoryController;
use App\Http\Controllers\backend\JobGradeController;
use App\Http\Controllers\backend\RegionController;
use App\Http\Controllers\backend\CountryController;
use App\Http\Controllers\backend\LocationController;
use App\Http\Controllers\backend\DepartmentController;
use App\Http\Controllers\backend\ManagerController;
use App\Http\Controllers\backend\MyAcountController;
use App\Http\Controllers\backend\PayRollController;

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
  Route::get('admin/employees/add', [EmployeesController::class, 'Add']);
  Route::post('admin/employees/store' , [EmployeesController::class, 'Store']);
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

  //countries all route
  Route::get('admin/countries', [CountryController::class, 'index']);
  Route::get('admin/countries/add', [CountryController::class,'add']);
  Route::post('admin/countries/store', [CountryController::class,'store']);
  Route::get('admin/countries/edit/{id}', [CountryController::class,'edit']);
  Route::post('admin/countries/update/{id}', [CountryController::class,'update']);
  Route::get('admin/countries/delete/{id}', [CountryController::class,'delete']);
  //exel file export
  Route::get('admin/countries/excel', [CountryController::class,'ExportCountry']);
  //end countries all route

  //location all route
  Route::get('admin/locations', [LocationController::class,'Index']);
  Route::get('admin/locations/add', [LocationController::class,'Add']);
  Route::post('admin/locations/store', [LocationController::class,'Store']);
  Route::get('admin/locations/edit/{id}', [LocationController::class,'Edit']);
  Route::post('admin/locations/update/{id}', [LocationController::class,'Update']);
  Route::get('admin/locations/delete/{id}', [LocationController::class,'Delete']);
  //location export
  Route::get('admin/locations/export', [LocationController::class,'Export']);
  //end location export
  //end location all route

  //department all route
  Route::get('admin/departments', [DepartmentController::class,'Index']);
  Route::get('admin/departments/add', [DepartmentController::class,'Add']);
  Route::post('admin/departments/store', [DepartmentController::class,'Store']);
  Route::get('admin/departments/edit/{id}', [DepartmentController::class,'Edit']);
  Route::post('admin/departments/update/{id}', [DepartmentController::class,'Update']);
  Route::get('admin/departments/delete/{id}', [DepartmentController::class,'Delete']);
  //excel export
  //end excel export
  Route::get('admin/departments/excel', [DepartmentController::class,'Export']);
  //end department all route

  //managet all route
  Route::get('admin/manager', [ManagerController::class,'Index']);
  Route::get('admin/manager/add', [ManagerController::class,'Add']);
  Route::post('admin/manager/store', [ManagerController::class,'Store']);
  Route::get('admin/manager/edit/{id}', [ManagerController::class,'Edit']);
  Route::post('admin/manager/update/{id}', [ManagerController::class,'Update']);
  Route::get('admin/manager/delete/{id}', [ManagerController::class,'Delete']);
  //export xl file
  Route::get('admin/manager/excel', [ManagerController::class,'Export']);
  //end xl file
  //end managet all route

  //my acount all route
  Route::get('admin/my_acount', [MyAcountController::class,'MyAcount']);
  Route::post('admin/my_acount/update', [MyAcountController::class,'UpdateAcount']);
  //end my acount all route

  //payrole all route
  Route::get('admin/payroll', [PayRollController::class, 'Index']);
  //end payrole all route

});

//admin logout
Route::get('logout', [AuthController::class, 'logout']);









?>