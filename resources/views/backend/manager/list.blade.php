@extends('backend.layouts.app')

@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Manager</h1>
          </div><!-- /.col -->
          <div class="col-sm-6" style="text-align: right;">
            

            <br>
            <a href="{{ url('admin/manager/add') }}" class="btn btn-primary">Add Manager</a>
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
                <h3 class="card-title">Search Manager</h3>
              </div>


            </div>
            @include('message')

            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Managers List</h3>
              </div>
              <div class="card-body p-0">
                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Manger Name</th>
                      <th>Manger Email</th>
                      <th>Manger Mobile</th>
                      <th>Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                     
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
