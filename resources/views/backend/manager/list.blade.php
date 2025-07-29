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
              <form method="get" action="">
                <div class="card-body">
                  <div class="row">
                    <div class="form-gorup col-md-3">
                      <label>ID</label>
                      <input type="text" name="id" value="{{ Request()->id }}" class="form-control" placeholder="Enter ID">
                    </div>
                    <div class="form-gorup col-md-3">
                      <label>Manager Name</label>
                      <input type="text" name="manager_name" value="{{ Request()->manager_name }}" class="form-control" placeholder="Enter Manager Name">
                    </div>                   
                    <div class="form-gorup col-md-3">
                      <label>Manager Email</label>
                      <input type="text" name="manager_email" value="{{ Request()->manager_email }}" class="form-control" placeholder="Enter Manager Email">
                    </div>                   
                    <div class="form-gorup col-md-3">
                      <label>Manager Mobile</label>
                      <input type="text" name="manager_mobile" value="{{ Request()->manager_mobile }}" class="form-control" placeholder="Enter Manager Mobile">
                    </div>                   
                    <div class="form-gorup col-md-2">
                      <button type="submit" class="btn btn-primary" style="margin-top: 30px;">Search</button>
                      <a href="{{ url('admin/manager') }}" class="btn btn-success" style="margin-top: 30px;">Reset</a>
                    </div>
                  </div>
                </div>
              </form>
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
                   @forelse($getRecord as $value)
                    <tr>
                      <td>{{$value->id }}</td>                     
                      <td>{{$value->manager_name }}</td>                     
                      <td>{{$value->manager_email }}</td>                     
                      <td>{{$value->manager_mobile }}</td>                                   
                      <td>
                        <a href="{{ url('admin/manager/edit', $value->id) }}" class="btn btn-success">Edit</a>
                        <a href="{{ url('admin/manager/delete', $value->id) }}" onclick="return confirm('Are your sure you want to delete')" class="btn btn-danger">Delete</a>
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
