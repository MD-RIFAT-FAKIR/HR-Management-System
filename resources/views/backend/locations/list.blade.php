@extends('backend.layouts.app')

@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Location</h1>
          </div><!-- /.col -->
          <div class="col-sm-6" style="text-align: right;">           
            <a href="{{ url('admin/locations/add') }}" class="btn btn-primary">Add Locations</a>
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
                <h3 class="card-title">Search Location</h3>
              </div>
            </div>
            @include('message')
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Location List</h3>
              </div>
              <div class="card-body p-0">
                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th>ID</th>                                        
                      <th>Street Address</th>
                      <th>Postal Code</th>
                      <th>Sity</th>
                      <th>State Provice</th>
                      <th>Country Name</th>
                      <th>Created At</th>
                      <th>Actions</th>
                    </tr>
                  </thead>
                  </thead>
                  <tbody>
                    @forelse($getRecord as $value)
                      <tr>
                        <td>{{ $value->id }}</td>
                        <td>{{ $value->street_address }}</td>
                        <td>{{ $value->postal_code }}</td>
                        <td>{{ $value->city }}</td>
                        <td>{{ $value->state_provice }}</td>
                        <td>{{ $value->country_name }}</td>
                        <td>{{ date('d-m-Y H:i A', strtotime($value->created_at)) }}</td>
                        <td>{{ date('d-m-Y H:i A', strtotime($value->updated_at)) }}</td>                     
                        <td>
                        <a href="{{ url('admin/locations/edit', $value->id) }}" class="btn btn-success mt-1">Edit</a>
                        <a href="{{ url('admin/locations/delete', $value->id) }}" onclick="return confirm('Are your sure you want to delete')" class="btn btn-danger mt-1">Delete</a>
                      </td>
                      </tr>
                      @empty
                      <tr>
                        <td colspan="100%" style="color: red;">No Record Found.</td>
                      </tr>
                    @endforelse                  
                </div>
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
