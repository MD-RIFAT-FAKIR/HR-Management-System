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
                <h3 class="card-title">Managers List</h3>
              </div>
              <div class="card-body p-0">
                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Name</th>
                      <th>Salary</th>
                      <th>Interview</th>
                      <th>Created At</th>
                      <th>Updated At</th>
                    </tr>
                  </thead>
                  <tbody>
                  <tr>
                    <td>{{ $getRecord->id }}</td>
                    <td>{{ $getRecord->name }}</td>
                    <td>{{ $getRecord->salary }}</td>
                    <td>
                      @if($getRecord->interview == 0)
                          <span class="badge bg-danger">Cancel</span>
                          @elseif($getRecord->interview == 1)
                          <span class="badge bg-secondary">Pending</span>
                          @else
                          <span class="badge bg-success">Completed</span>
                      @endif
                    </td>
                    <td>{{ date('d-m-Y H:i A', strtotime($getRecord->created_at)) }}</td>
                    <td>{{ date('d-m-Y H:i A', strtotime($getRecord->updated_at)) }}</td>
                  </tr>
                  </tbody>
                </table>
                <div style="padding: 10px; float: right;">
                    
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
