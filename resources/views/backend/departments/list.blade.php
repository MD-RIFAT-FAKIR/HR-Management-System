@extends('backend.layouts.app')

@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Departments</h1>
          </div><!-- /.col -->
          <div class="col-sm-6" style="text-align: right;">  
  

            <br>       
            <a href="{{ url('admin/locations/add') }}" class="btn btn-primary">Add Departments</a>
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
                <h3 class="card-title">Search Departments</h3>
              </div>



            </div>
            @include('message')
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Departments List</h3>
              </div>
              <div class="card-body p-0">
                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th>ID</th>                                        
                      
                    </tr>
                  </thead>

                  </thead>

                  <tbody>
                   
                      <tr>
                        <td colspan="100%" style="color: red;">No Record Found.</td>
                      </tr>                
                </div>
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
