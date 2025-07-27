@extends('backend.layouts.app')

@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Departments</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Edit</a></li>
              <li class="breadcrumb-item active">Departments</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <section class="col-md-12">
            <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">Edit Departments</h3>
              </div>
              <form class="form-horaizontal" action="{{ url('admin/departments/update', $getRecord->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                  <div class="form-gorup row mt-2">
                    <label class="col-sm-2 col-form-table">Department Name<span style="color: red;">*</span>                    
                    </label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="department_name" value="{{ $getRecord->department_name }}" placeholder="Enter Department Name">
                      @error('department_name')
                        <span style="color:red;">{{ $message }}</span>
                      @enderror
                    </div>
                  </div>   
                  <div class="form-gorup row mt-2">
                    <label class="col-sm-2 col-form-table">Manager Name<span style="color: red;">*</span>                    
                    </label>
                    <div class="col-sm-10">
                      <select class="form-control" name="manager_id">
                        <option value="">--- Select Manager Name ---</option>
                        <option {{ ($getRecord->manager_id == 1 ? 'selected' : '') }} value="1">Rifat</option>
                        <option {{ ($getRecord->manager_id == 2 ? 'selected' : '') }} value="2">Fakir</option>
                      </select>
                      @error('manager_id')
                        <span style="color:red;">{{ $message }}</span>
                      @enderror
                    </div>
                  </div>
                  <div class="form-gorup row mt-2">
                    <label class="col-sm-2 col-form-table">Locations<span style="color: red;">*</span>                    
                    </label>
                    <div class="col-sm-10">
                      <select class="form-control" name="location_id">
                        <option value="">--- Select Location ---</option>
                        @foreach($getLocation as $value)
                          <option {{ ($getRecord->location_id == $value->id) ? 'selected' : '' }} value="{{ $value->id }}">{{ $value->street_address }}</option>
                        @endforeach
                      </select>
                      @error('location_id')
                        <span style="color:red;">{{ $message }}</span>
                      @enderror
                    </div>
                  </div>           
                  <div class="card-footer">
                    <a href="{{ url('admin/departments') }}" class="btn btn-default">Back</a>
                    <button type="submit" class="btn btn-primary float-right">Submit</button>
                  </div>
                </div>
              </form>
            </div>
          </section>

      <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection