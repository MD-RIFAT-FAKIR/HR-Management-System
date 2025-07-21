@extends('backend.layouts.app')

@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Employee</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Edit</a></li>
              <li class="breadcrumb-item active"> Employee</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <section class="col-md-12">
            <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">Edit Employee</h3>
              </div>
              <form class="form-horaizontal" action="" method="post" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                  <div class="form-gorup row mt-2">
                    <label class="col-sm-2 col-form-table">First Name<span style="color: red;">*</span>                    
                    </label>
                    <div class="col-sm-10">
                      <input class="form-control" type="text" name="name" value="{{ $employee->name }}" placeholder="Enter First Name" required>
                    </div>
                  </div>
                  <div class="form-gorup row mt-2">
                    <label class="col-sm-2 col-form-table">Last Name<span style="color: red;"></span>                    
                    </label>
                    <div class="col-sm-10">
                      <input class="form-control" type="text" name="last_name" value="{{ $employee->last_name }}" placeholder="Enter Last Name">
                    </div>
                  </div>
                  <div class="form-gorup row mt-2">
                    <label class="col-sm-2 col-form-table">Email<span style="color: red;">*</span>                    
                    </label>
                    <div class="col-sm-10">
                      <input class="form-control" type="email" name="email" value="{{ $employee->email }}" placeholder="Enter Email" required>
                      <span style="color: red;">{{ $errors->first('email') }}</span>
                    </div>
                  </div>
                  <div class="form-gorup row mt-2">
                    <label class="col-sm-2 col-form-table">Phone Number<span style="color: red;"></span>                    
                    </label>
                    <div class="col-sm-10">
                      <input class="form-control" type="number" name="phone_number" value="{{ $employee->phone_number }}" placeholder="Enter Phone Number">
                      <span style="color: red;">{{ $errors->first('phone_number') }}</span>
                    </div>
                  </div>
                  <div class="form-gorup row mt-2">
                    <label class="col-sm-2 col-form-table">Hire Date<span style="color: red;">*</span>                    
                    </label>
                    <div class="col-sm-10">
                      <input class="form-control" type="date" name="hire_date" value="{{ $employee->hire_date }}" required>
                    </div>
                  </div>
                  <div class="form-gorup row mt-2">
                    <label class="col-sm-2 col-form-table">Job Title<span style="color: red;">*</span>                    
                    </label>
                    <div class="col-sm-10">
                      <select class="form-control" name="job_id" required>
                        <option value="">---  Select Job Title  ---</option>
                        <option {{ ($employee->job_id == 1) ? 'selected' : '' }} value="1">Frontend Developer</option>
                        <option {{ ($employee->job_id == 2) ? 'selected' : '' }} value="2">Backend Developer</option>
                        <option {{ ($employee->job_id == 3) ? 'selected' : '' }} value="3">Full Stack Developer</option>
                      </select>
                    </div>
                  </div>
                  <div class="form-gorup row mt-2">
                    <label class="col-sm-2 col-form-table">Salary<span style="color: red;">*</span>                    
                    </label>
                    <div class="col-sm-10">
                      <input class="form-control" type="number" name="salary" placeholder="Enter Salary" value="{{ $employee->salary }}"  required>
                      <span style="color: red;">{{ $errors->first('salary') }}</span>
                    </div>
                  </div>
                  <div class="form-gorup row mt-2">
                    <label class="col-sm-2 col-form-table">Commision PCT<span style="color: red;">*</span>                    
                    </label>
                    <div class="col-sm-10">
                      <input class="form-control" type="number" name="commision_pct" value="{{ $employee->commision_pct }}" placeholder="Enter Commision PCT" required>
                      <span style="color: red;">{{ $errors->first('commision_pct') }}</span>
                    </div>
                  </div>
                  <div class="form-gorup row mt-2">
                    <label class="col-sm-2 col-form-table">Manager Name<span style="color: red;">*</span>                    
                    </label>
                    <div class="col-sm-10">
                      <select class="form-control" name="manager_id" required>
                        <option value="">---  Select Manager Name  ---</option>
                        <option {{ ($employee->manager_id == 1) ? 'selected' : '' }} value="1">ABC</option>
                        <option {{ ($employee->manager_id == 2) ? 'selected' : '' }} value="2">XYZ</option>
                      </select>
                    </div>
                  </div> 
                  <div class="form-gorup row mt-2">
                    <label class="col-sm-2 col-form-table">Department Name<span style="color: red;">*</span>                    
                    </label>
                    <div class="col-sm-10">
                      <select class="form-control" name="department_id" required>
                        <option value="">---  Select Department Name  ---</option>
                        <option {{ ($employee->department_id == 1) ? 'selected' : '' }} value="1">ABC</option>
                        <option {{ ($employee->department_id == 2) ? 'selected' : '' }} value="2">XYZ</option>
                      </select>
                    </div>
                  </div> 
                  <div class="card-footer">
                    <a href="{{ url('admin/employees') }}" class="btn btn-default">Back</a>
                    <button type="submit" class="btn btn-primary float-right">Update</button>
                  </div>
                </div>
              </form>
            </div>
          </section>

      <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection