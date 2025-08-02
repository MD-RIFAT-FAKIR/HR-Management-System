@extends('backend.layouts.app')

@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Position</h1>
          </div><!-- /.col -->
          <div class="col-sm-6" style="text-align: right;">
            

            <br></br>
            <a href="{{ url('admin/position/add') }}" class="btn btn-primary">Add Position</a>
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
                <h3 class="card-title">Search Position</h3>
              </div>

            </div>
            @include('message')

            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Position List</h3>
              </div>
              <div class="card-body p-0">
                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Position Name</th>
                      <th>Daily Rate</th>
                      <th>Monthly Rate</th>
                      <th>Working Days Per Month</th>
                      <th>Created Date</th>
                      <th>Updated Date</th>
                      <th>Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                    @forelse($getRecord as $value)
                      <tr>
                        <td>{{ $value->id }}</td>
                        <td>{{ $value->position_name }}</td>
                        <td>{{ $value->daily_rate }}</td>
                        <td>{{ $value->monthly_rate }}</td>
                        <td>{{ $value->working_days_per_month }}</td>
                        <td>{{ date('d-m-Y H:i A', strtotime($value->created_at)) }}</td>
                        <td>{{ date('d-m-Y H:i A', strtotime($value->updated_at)) }}</td>
                        <td>
                            <a href="{{ url('admin/payroll/edit', $value->id) }}" class="btn btn-primary mt-1">Edit</a>
                            <a href="{{ url('admin/payroll/delete', $value->id) }}" onclick="return confirm('Are your sure you want to delete')" class="btn btn-danger mt-1">Delete</a>
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
                  {!! $getRecord->links() !!}
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
