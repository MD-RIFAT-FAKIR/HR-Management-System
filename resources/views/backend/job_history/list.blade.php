@extends('backend.layouts.app')

@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Job History</h1>
          </div><!-- /.col -->
          <div class="col-sm-6" style="text-align: right;">
            <form action="{{ url('admin/job_history/excel') }}" method="get">
               <input type="hidden" name="start_date" value="{{ Request()->start_date }}">
               <input type="hidden" name="end_date" value="{{ Request()->end_date }}">
               <a class="btn btn-success" href="{{ url('admin/job_history/excel?start_date='.Request::get('start_date').'&end_date='.Request::get('end_date')) }}">Excel Export</a>
            </form>
            <br>
            <a href="{{ url('admin/job_history/add') }}" class="btn btn-primary">Add Job History</a>
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
                <h3 class="card-title">Search Job History</h3>
              </div>
              <form method="get" action="">
                <div class="card-body">
                  <div class="row">
                    <div class="form-gorup col-md-3">
                      <label>ID</label>
                      <input type="text" name="id" value="{{ Request()->id }}" class="form-control" placeholder="Id">
                    </div>
                    <div class="form-gorup col-md-3">
                      <label>Employee Name</label>
                      <input type="text" name="name" value="{{ Request()->name }}" class="form-control" placeholder="Employee Name">
                    </div>
                    <div class="form-gorup col-md-3">
                      <label>Start Date</label>
                      <input type="date" name="start_date" value="{{ Request()->start_date }}" class="form-control">
                    </div>
                    <div class="form-gorup col-md-3">
                      <label>End Date</label>
                      <input type="date" name="end_date" value="{{ Request()->end_date }}" class="form-control">
                    </div>
                    <div class="form-gorup col-md-3">
                      <label>Job Tittle</label>
                      <input type="text" name="job_title" value="{{ Request()->job_title }}" class="form-control" placeholder="Job Tittle">
                    </div>
                    <div class="form-gorup col-md-3">
                      <button type="submit" class="btn btn-primary" style="margin-top: 30px;">Search</button>
                      <a href="{{ url('admin/job_history') }}" class="btn btn-success" style="margin-top: 30px;">Reset</a>
                    </div>

                  </div>
                </div>
              </form>
            </div>
            @include('message')
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Job History</h3>
              </div>
              <div class="card-body p-0">
                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th>Id</th>
                      <th>Employee Name</th>
                      <th>Start Date</th>
                      <th>End Date</th>
                      <th>Job Title</th>
                      <th>Department Name</th>
                      <th>Created Date</th>
                      <th>Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                    @if(!empty($getRecord))
                    @forelse($getRecord as $value)
                      <tr>
                        <td>{{ $value->id }}</td>
                        <td>{{ !empty($value->user->name) ? $value->user->name : ''}}{{ !empty($value->user->last_name) ? $value->user->last_name : ''}}</td>
                        <td>{{ date('d-m-Y', strtotime($value->start_date)) }}</td>
                        <td>{{ date('d-m-Y', strtotime($value->end_date)) }}</td>
                        <td>{{ !empty($value->job->job_title) ? $value->job->job_title : '' }}</td>
                        <td>{{ (!empty($value->department->department_name) ? $value->department->department_name : '') }}</td>
                        <td>
                          {{ date('d-m-Y H:i A', strtotime($value->created_at)) }}
                        </td>
                        <td>
                        <a href="{{ url('admin/job_history/edit', $value->id) }}" class="btn btn-success mt-1">Edit</a>
                        <a href="{{ url('admin/job_history/delete', $value->id) }}" onclick="return confirm('Are your sure you want to delete')" class="btn btn-danger mt-1">Delete</a>
                      </td>
                      </tr>
                      @empty
                      <tr>
                        <td colspan="100%" style="color: red;">No Record Found.</td>
                      </tr>
                    @endforelse
                    @endif
                  </tbody>
                </table>
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
