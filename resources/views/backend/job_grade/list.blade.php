@extends('backend.layouts.app')

@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Job Grade</h1>
          </div><!-- /.col -->
          <div class="col-sm-6" style="text-align: right;">
            <a href="{{ url('admin/job_grades/add') }}" class="btn btn-primary">Add Job Grade</a>
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
                <h3 class="card-title">Search Job Grade</h3>
              </div>
              <form method="get" action="">
                <div class="card-body">
                  <div class="row">
                    <div class="form-gorup col-md-3">
                      <label>ID</label>
                      <input type="text" name="id" value="{{ Request()->id }}" class="form-control" placeholder="Id">
                    </div>
                    <div class="form-gorup col-md-3">
                      <label>Grade Level</label>
                      <input type="text" name="grade_level" value="{{ Request()->grade_level }}" class="form-control" placeholder="Grade Level">
                    </div>
                    <div class="form-gorup col-md-3">
                      <label>Lowest Sal</label>
                      <input type="number" name="lowest_sal" value="{{ Request()->lowest_sal }}" class="form-control" placeholder="Lowest Salary">
                    </div>
                    <div class="form-gorup col-md-3">
                      <label>Highest Sal</label>
                      <input type="number" name="highest_sal" value="{{ Request()->highest_sal }}" class="form-control" placeholder="Highest Salary">
                    </div>
                    <div class="form-gorup col-md-3">
                      <label>Created Date</label>
                      <input type="date" name="created_at" value="{{ Request()->created_at }}" class="form-control">
                    </div>
                    <div class="form-gorup col-md-3">
                      <label>Updated Date</label>
                      <input type="date" name="updated_at" value="{{ Request()->updated_at }}" class="form-control">
                    </div>
                    <div class="form-gorup col-md-3">
                      <button type="submit" class="btn btn-primary" style="margin-top: 30px;">Search</button>
                      <a href="{{ url('admin/job_grades') }}" class="btn btn-success" style="margin-top: 30px;">Reset</a>
                    </div>

                  </div>
                </div>
              </form>
            </div>
            @include('message')
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Job Grade</h3>
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
                      <th>Actions</th>
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
                    <td>
                      <a href="{{ url('admin/job_grades/edit', $value->id) }}" class="btn btn-success mt-1">Edit</a>
                      <a href="{{ url('admin/job_grades/delete', $value->id) }}" onclick="return confirm('Are your sure you want to delete')" class="btn btn-danger mt-1">Delete</a>
                    </td>
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
