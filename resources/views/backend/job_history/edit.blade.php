@extends('backend.layouts.app')

@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Job History</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Edit</a></li>
              <li class="breadcrumb-item active">Job History</li>
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
                <h3 class="card-title">Edit History</h3>
              </div>
              <form class="form-horaizontal" action="{{ url('admin/job_history/update', $jobHistory->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                  <div class="form-gorup row mt-2">
                    <label class="col-sm-2 col-form-table">Employee Name<span style="color: red;">*</span>                    
                    </label>
                    <div class="col-sm-10">
                      <select class="form-control" name="employee_id">
                        <option value="">--- Select Employees Name ---</option>
                        @foreach($users as $user)
                          <option {{ ($user->id == $jobHistory->employee_id) ? 'selected' : '' }} value="{{ $user->id }}">{{ $user->name }} {{ $user->last_name }}</option>
                        @endforeach
                      </select>
                    </div>
                  </div>
                  <div class="form-gorup row mt-2">
                    <label class="col-sm-2 col-form-table">Start Date<span style="color: red;">*</span>                    
                    </label>
                    <div class="col-sm-10">
                      <input class="form-control" type="date" name="start_date" value="{{ $jobHistory->start_date }}" required>
                    </div>
                  </div>
                  <div class="form-gorup row mt-2">
                    <label class="col-sm-2 col-form-table">End Date<span style="color: red;">*</span>                    
                    </label>
                    <div class="col-sm-10">
                      <input class="form-control" type="date" name="end_date" value="{{ $jobHistory->end_date }}" required>
                    </div>
                  </div>
                  <div class="form-gorup row mt-2">
                    <label class="col-sm-2 col-form-table">Job Title<span style="color: red;">*</span>                    
                    </label>
                    <div class="col-sm-10">
                      <select class="form-control" name="job_id">
                        <option value="">--- Select Job Title ---</option>
                        @foreach($jobs as $job)
                          <option {{ ($job->id == $jobHistory->job_id) ? 'selected' : ''}} value="{{ $job->id }}">{{ $job->job_title }}</option>
                        @endforeach
                      </select>
                    </div>
                  </div>
                  <div class="form-gorup row mt-2">
                    <label class="col-sm-2 col-form-table">Department Name<span style="color: red;">*</span>                    
                    </label>
                    <div class="col-sm-10">
                      <select class="form-control" name="department_id">
                        <option value="">--- Select Department Name ---</option>
                        <option {{ ($jobHistory->department_id == 1 ? 'selected' : '' ) }} value="1">ABC</option>
                        <option {{ ($jobHistory->department_id == 2 ? 'selected' : '' ) }} value="2">XYZ</option>
                      </select>
                    </div>
                  </div>              
                  <div class="card-footer">
                    <a href="{{ url('admin/job_history') }}" class="btn btn-default">Back</a>
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