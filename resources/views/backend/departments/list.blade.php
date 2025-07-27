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
            <a href="{{ url('admin/departments/add') }}" class="btn btn-primary">Add Departments</a>
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
              <form method="get" action="">
                <div class="card-body">
                  <div class="row">
                    <div class="form-gorup col-md-3">
                      <label>ID</label>
                      <input type="text" name="id" value="{{ Request()->id }}" class="form-control" placeholder="Id">
                    </div>
                    <div class="form-gorup col-md-3">
                      <label>Department Name</label>
                      <input type="text" name="department_name" value="{{ Request()->department_name }}" class="form-control" placeholder="Department Name">
                    </div>
                    <div class="form-gorup col-md-3">
                      <label>Location Name</label>
                      <input type="text" name="location_id" value="{{ Request()->location_id }}" class="form-control" placeholder="Job Tittle">
                    </div>
                    <div class="form-gorup col-md-3">
                      <button type="submit" class="btn btn-primary" style="margin-top: 30px;">Search</button>
                      <a href="{{ url('admin/departments') }}" class="btn btn-success" style="margin-top: 30px;">Reset</a>
                    </div>

                  </div>
                </div>
              </form>
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
                      <th>Department Name</th>
                      <th>Manager Name</th>
                      <th>Location Name</th>
                      <th>Created At</th>
                      <th>Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                    @forelse($getRecord as $value)
                      <tr>
                        <td>{{ $value->id }}</td>
                        <td>{{ $value->department_name }}</td>
                        <td>
                          @if($value->manager_id == 1)
                            Rifat
                          @else
                            Fakir
                          @endif
                        </td>
                        <td>{{ $value->street_address }}</td>
                        <td>{{ date('d-m-Y H:i A', strtotime($value->created_at)) }}</td>
                        <td>
                          <a href="{{ url('admin/departments/edit', $value->id) }}" class="btn btn-success">Edit</a>
                          <a href="{{ url('admin/departments/delete', $value->id) }}" onclick="return confirm('Are your sure you want to delete')" class="btn btn-danger">Delete</a>
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
                    {!! $getRecord->appends(Illuminate\Support\Facades\Request::except('page'))->links() !!}
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
