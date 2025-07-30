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
              <li class="breadcrumb-item"><a href="#">Add</a></li>
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
                <h3 class="card-title">Add Employee</h3>
              </div>
              <form class="form-horaizontal" action="{{ url('admin/employees/store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                  <div class="form-gorup row mt-2">
                    <label class="col-sm-2 col-form-table">First Name<span style="color: red;">*</span>                    
                    </label>
                    <div class="col-sm-10">
                      <input class="form-control" type="text" name="name" value="{{ old('name') }}" placeholder="Enter First Name" required>
                    </div>
                  </div>
                  <div class="form-gorup row mt-2">
                    <label class="col-sm-2 col-form-table">Last Name<span style="color: red;"></span>                    
                    </label>
                    <div class="col-sm-10">
                      <input class="form-control" type="text" name="last_name" value="{{ old('last_name') }}" placeholder="Enter Last Name">
                    </div>
                  </div>
                  <div class="form-gorup row mt-2">
                    <label class="col-sm-2 col-form-table">Email<span style="color: red;">*</span>                    
                    </label>
                    <div class="col-sm-10">
                      <input class="form-control" type="email" name="email" placeholder="Enter Email" required>
                      <span style="color: red;">{{ $errors->first('email') }}</span>
                    </div>
                  </div>
                  <div class="form-gorup row mt-2">
                    <label class="col-sm-2 col-form-table">Phone Number<span style="color: red;"></span>                    
                    </label>
                    <div class="col-sm-10">
                      <input class="form-control" type="number" name="phone_number" value="{{ old('phone_number') }}" placeholder="Enter Phone Number">
                      <span style="color: red;">{{ $errors->first('phone_number') }}</span>
                    </div>
                  </div>
                  <div class="form-gorup row mt-2">
                    <label class="col-sm-2 col-form-table">Hire Date<span style="color: red;">*</span>                    
                    </label>
                    <div class="col-sm-10">
                      <input class="form-control" type="date" name="hire_date" value="{{ old('hire_date') }}" required>
                    </div>
                  </div>
                  <div class="form-gorup row mt-2">
                    <label class="col-sm-2 col-form-table">Job Title<span style="color: red;">*</span>                    
                    </label>
                    <div class="col-sm-10">
                      <select class="form-control" name="job_id" required>
                        <option value="">---  Select Job Title  ---</option>
                        @foreach($job_title as $value)
                        <option value="{{ $value->id }}">{{ $value->job_title }}</option>
                        @endforeach
                      </select>
                    </div>
                  </div>
                  <div class="form-gorup row mt-2">
                    <label class="col-sm-2 col-form-table">Salary<span style="color: red;">*</span>                    
                    </label>
                    <div class="col-sm-10">
                      <input class="form-control" type="number" name="salary" placeholder="Enter Salary" value="{{ old('salary') }}"  required>
                      <span style="color: red;">{{ $errors->first('salary') }}</span>
                    </div>
                  </div>
                  <div class="form-gorup row mt-2">
                    <label class="col-sm-2 col-form-table">Commision PCT<span style="color: red;">*</span>                    
                    </label>
                    <div class="col-sm-10">
                      <input class="form-control" type="number" name="commision_pct" value="{{ old('commision_pct') }}" placeholder="Enter Commision PCT" required>
                      <span style="color: red;">{{ $errors->first('commision_pct') }}</span>
                    </div>
                  </div>
                  <div class="form-gorup row mt-2">
                    <label class="col-sm-2 col-form-table">Manager Name<span style="color: red;">*</span>                    
                    </label>
                    <div class="col-sm-10">
                      <select class="form-control" name="manager_id" required>
                        <option value="">---  Select Manager Name  ---</option>
                        <option value="1">ABC</option>
                        <option value="2">XYZ</option>
                      </select>
                    </div>
                  </div> 
                  <div class="form-gorup row mt-2">
                    <label class="col-sm-2 col-form-table">Department Name<span style="color: red;">*</span>                    
                    </label>
                    <div class="col-sm-10">
                      <select class="form-control" name="department_id" required>
                        <option value="">---  Select Department Name  ---</option>
                        @foreach($department as $value)
                        <option value="{{ $value }}">{{ $value->department_name }}</option>
                        @endforeach
                      </select>
                    </div>
                  </div> 
                  <div class="card-footer">
                    <a href="{{ url('admin/employees') }}" class="btn btn-default">Back</a>
                    <button type="submit" class="btn btn-primary float-right">Submit</button>
                  </div>
                </div>
              </form>
            </div>
          </section>

      <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection