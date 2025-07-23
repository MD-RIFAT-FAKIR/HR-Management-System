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
              
            </div>
            @include('message')
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Job History</h3>
              </div>
              <div class="card-body p-0">
                <div class="card-body p-0">
                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th>Id</th>
                      <th>Grade Level</th>
                      <th>Lowest Sal</th>
                      <th>Higest Sal</th>
                      <th>Created Date</th>
                      <th>Updated Date</th>
                    </tr>
                  </thead>
                  <tbody>
                  @forelse($getRecord as $value)
                  <tr>
                    <td>{{ $value->id  }}</td>
                    <td>{{ $value->grade_level  }}</td>
                    <td>{{ $value->lowest_sal  }}</td>
                    <td>{{ $value->highest_sal  }}</td>
                    <td>{{ date('d-m-Y H:i A', strtotime($value->created_at)) }}</td>
                    <td>{{ date('d-m-Y H:i A', strtotime($value->updated_at)) }}</td>
                  </tr>
                    @empty
                    <tr>
                      <td colspan="100%" style="color: red;">No Record Found.</td>
                    </tr>
                  @endforelse
                  </tbody>
                </table>
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
