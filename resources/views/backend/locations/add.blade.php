@extends('backend.layouts.app')

@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Locations</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Add</a></li>
              <li class="breadcrumb-item active">Location</li>
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
                <h3 class="card-title">Add Location</h3>
              </div>
              <form class="form-horaizontal" action="{{ url('admin/job_history/store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                  <div class="form-gorup row mt-2">
                    <label class="col-sm-2 col-form-table">Street Address<span style="color: red;">*</span>                    
                    </label>
                    <div class="col-sm-10">
                      <input class="form-control" type="text" name="street_address" value="{{ old('street_address') }}" placeholder="Enter Street Address">
                    </div>
                  </div>
                  <div class="form-gorup row mt-2">
                    <label class="col-sm-2 col-form-table">Postal Code<span style="color: red;">*</span>                    
                    </label>
                    <div class="col-sm-10">
                      <input class="form-control" type="text" name="postal_code" value="{{ old('postal_code') }}" placeholder="Enter Postal Code">
                    </div>
                  </div>
                  <div class="form-gorup row mt-2">
                    <label class="col-sm-2 col-form-table">City<span style="color: red;">*</span>                    
                    </label>
                    <div class="col-sm-10">
                      <input class="form-control" type="text" name="city" value="{{ old('city') }}" placeholder="Enter City">
                    </div>
                  </div>
                  <div class="form-gorup row mt-2">
                    <label class="col-sm-2 col-form-table">State Provice<span style="color: red;">*</span>                    
                    </label>
                    <div class="col-sm-10">
                      <input class="form-control" type="text" name="state_provice" value="{{ old('state_provice') }}" placeholder="Enter State Provice">
                    </div>
                  </div>
                  <div class="form-gorup row mt-2">
                    <label class="col-sm-2 col-form-table">Country Name<span style="color: red;">*</span>                    
                    </label>
                    <div class="col-sm-10">
                      <select class="form-control" name="country_id">
                        <option value="">--- Select Country Name ---</option>
                        @foreach($getCountry as $country)
                          <option value="{{ $country->id }}">{{ $country->country_name }}</option>
                        @endforeach
                      </select>
                    </div>
                  </div>             
                  <div class="card-footer">
                    <a href="{{ url('admin/locations') }}" class="btn btn-default">Back</a>
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