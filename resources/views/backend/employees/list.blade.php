@extends('backend.layouts.app')

@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Employees</h1>
          </div><!-- /.col -->
          <div class="col-sm-6" style="text-align: right;">
            <a href="{{ url('employees/add') }}" class="btn btn-primary">Add Employee</a>
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
                <h3 class="card-title">Search Employee</h3>
              </div>
              <form method="get" action="">
                <div class="card-body">
                  <div class="row">

                    <div class="form-gorup col-md-3">
                      <label>First Name</label>
                      <input type="text" name="" class="form-control" placeholder="First Name">
                    </div>

                    <div class="form-gorup col-md-3">
                      <label>Last Name</label>
                      <input type="text" name="" class="form-control" placeholder="Last Name">
                    </div>

                    <div class="form-gorup col-md-3">
                      <button type="submit" class="btn btn-primary" style="margin-top: 30px;">Search</button>
                      <a href="{{ url('admin/employees') }}" class="btn btn-success" style="margin-top: 30px;">Reset</a>
                    </div>

                  </div>
                </div>
              </form>
            </div>
            @include('message')

            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Employee List</h3>
              </div>
              <div class="card-body p-0">
                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>First Name</th>
                      <th>Last Name</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>1</td>
                      <td>Test</td>
                      <td>Demo</td>
                    </tr>
                    <tr>
                      <td>1</td>
                      <td>Test</td>
                      <td>Demo</td>
                    </tr>
                  </tbody>
                </table>
                <div style="padding: 10px; float: right;">
                    pagination
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
