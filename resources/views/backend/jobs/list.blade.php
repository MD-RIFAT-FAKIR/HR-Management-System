@extends('backend.layouts.app')

@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Jobs</h1>
          </div><!-- /.col -->
          <div class="col-sm-6" style="text-align: right;">
            <a href="{{ url('admin/jobs/add') }}" class="btn btn-primary">Add Jobs</a>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row mt-3">
          <section class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Search Jobs</h3>
              </div>
              <form method="get" action="">
                <div class="card-body">
                  <div class="row">

                    <div class="form-gorup col-md-1">
                      <label>ID</label>
                      <input type="text" name="id" value="{{ Request()->id }}" class="form-control" placeholder="Id">
                    </div>
                    <div class="form-gorup col-md-3">
                      <label>Job Title</label>
                      <input type="text" name="job_title" value="{{ Request()->job_title }}" class="form-control" placeholder="Job Title">
                    </div>
                    <div class="form-gorup col-md-3">
                      <label>Min Salary</label>
                      <input type="text" name="min_salary" value="{{ Request()->min_salary }}" class="form-control" placeholder="Min Salary">
                    </div>
                    <div class="form-gorup col-md-3">
                      <label>Max Salary</label>
                      <input type="text" name="max_salary" value="{{ Request()->max_salary }}" class="form-control" placeholder="Min Salary">
                    </div>

                    <div class="form-gorup col-md-2">
                      <button type="submit" class="btn btn-primary" style="margin-top: 30px;">Search</button>
                      <a href="{{ url('admin/jobs') }}" class="btn btn-success" style="margin-top: 30px;">Reset</a>
                    </div>

                  </div>
                </div>
              </form>
            </div>
            @include('message')

            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Jobs List</h3>
              </div>
              <div class="card-body p-0">
                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Job Title</th>
                      <th>Min Salary</th>
                      <th>Max Salary</th>
                      <th>Created Date</th>
                      <th>Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                    @forelse($getRecord as $value)
                    <tr>
                      <td>{{$value->id }}</td>                     
                      <td>{{$value->job_title }}</td>                     
                      <td>{{$value->min_salary }}</td>                     
                      <td>{{$value->max_salary }}</td>                  
                      <td>{{ date('d-m-Y H:i A', strtotime($value->updated_at)) }}</td>                  
                      <td>
                        <a href="" class="btn btn-info">View</a>
                        <a href="" class="btn btn-success">Edit</a>
                        <a href="" onclick="return confirm('Are your sure you want to delete')" class="btn btn-danger">Delete</a>
                      </td>
                    </tr>
                    @empty
                    <tr>
                      <td colspan="100%" style="color: red;">No Record Found.</td>
                    </tr>
                    @endforelse
                  </tbody>
                </table>
                <div style="padding: 10px; float: right;">

                </div>
              </div>
            </div>
          </section>
        </div>
      </div>
    </section>

    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection
