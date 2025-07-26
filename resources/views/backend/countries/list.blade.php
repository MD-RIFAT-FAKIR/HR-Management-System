@extends('backend.layouts.app')

@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Countries</h1>
          </div><!-- /.col -->
          <div class="col-sm-6" style="text-align: right;">
            <form action="{{ url('admin/countries/excel') }}" method="get">
               <input type="hidden" name="start_date" value="{{ Request()->start_date }}">
               <input type="hidden" name="end_date" value="{{ Request()->end_date }}">
               <a class="btn btn-success" href="{{ url('admin/countries/excel?start_date='.Request::get('start_date').'&end_date='.Request::get('end_date')) }}">Excel Export</a>
            </form>
            <br>
            <a href="{{ url('admin/countries/add') }}" class="btn btn-primary">Add Country</a>
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
                <h3 class="card-title">Search Country</h3>
              </div>
              <form method="get" action="">
                <div class="card-body">
                  <div class="row">
                    <div class="form-gorup col-md-3">
                      <label>ID</label>
                      <input type="text" name="id" value="{{ Request()->id }}" class="form-control" placeholder="Id">
                    </div>
                    <div class="form-gorup col-md-4">
                      <label>Country Name</label>
                      <input type="text" name="country_name" value="{{ Request()->country_name }}" class="form-control" placeholder="Country Name">
                    </div>                    
                    <div class="form-gorup col-md-4">
                      <label>Region Name</label>
                      <input type="text" name="region_name" value="{{ Request()->region_name }}" class="form-control" placeholder="Region Name">
                    </div>                    
                    <div class="form-gorup col-md-3">
                      <label>Created At</label>
                      <input type="date" name="start_date" value="{{ Request()->start_date }}" class="form-control">
                    </div>                    
                    <div class="form-gorup col-md-3">
                      <label>Updated At</label>
                      <input type="date" name="end_date" value="{{ Request()->end_date }}" class="form-control">
                    </div>                    
                    <div class="form-gorup col-md-3">
                      <button type="submit" class="btn btn-primary" style="margin-top: 30px;">Search</button>
                      <a href="{{ url('admin/countries') }}" class="btn btn-success" style="margin-top: 30px;">Reset</a>
                    </div>
                  </div>
                </div>
              </form>
            </div>
            @include('message')

            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Countries List</h3>
              </div>
              <div class="card-body p-0">
                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th>Id</th>
                      <th>Country Name</th>
                      <th>Region Name</th>
                      <th>Created At</th>
                      <th>Updated At</th>
                      <th>Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                    @forelse($getRecord as $value)
                    <tr>
                      <td>{{ $value->id }}</td>
                      <td>{{ $value->country_name }}</td>
                      <td>{{ !empty($value->region->region_name) ? $value->region->region_name : '' }}</td>
                      <td>{{ date('d-m-Y H:i A', strtotime($value->created_at)) }}</td>
                      <td>{{ date('d-m-Y H:i A', strtotime($value->updated_at)) }}</td>
                      <td>
                        <a href="{{ url('admin/countries/edit', $value->id) }}" class="btn btn-success">Edit</a>
                        <a href="{{ url('admin/countries/delete', $value->id) }}" onclick="return confirm('Are your sure you want to delete')" class="btn btn-danger">Delete</a>
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
