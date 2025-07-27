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
              <li class="breadcrumb-item"><a href="#">Edit</a></li>
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
                <h3 class="card-title">Edit Location</h3>
              </div>
              <form class="form-horaizontal" action="{{ url('admin/locations/store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                  <div class="form-gorup row mt-2">
                    <label class="col-sm-2 col-form-table">Street Address<span style="color: red;">*</span>                    
                    </label>
                    <div class="col-sm-10">
                      <input class="form-control" type="text" name="street_address" value="{{ $getRecord->street_address }}" placeholder="Enter Street Address">                     
                        @error('street_address')
                          <span style="color: red;">{{$message}}</span>
                        @enderror                     
                    </div>
                  </div>
                  <div class="form-gorup row mt-2">
                    <label class="col-sm-2 col-form-table">Postal Code<span style="color: red;">*</span>                    
                    </label>
                    <div class="col-sm-10">
                      <input class="form-control" type="text" name="postal_code" value="{{ $getRecord->postal_code }}" placeholder="Enter Postal Code">
                      @error('postal_code')
                        <span style="color: red;">{{$message}}</span>
                      @enderror
                    </div>
                  </div>
                  <div class="form-gorup row mt-2">
                    <label class="col-sm-2 col-form-table">City<span style="color: red;">*</span>                    
                    </label>
                    <div class="col-sm-10">
                      <input class="form-control" type="text" name="city" value="{{ $getRecord->city }}" placeholder="Enter City">
                      @error('city')
                        <span style="color: red;">{{$message}}</span>
                      @enderror
                    </div>
                  </div>
                  <div class="form-gorup row mt-2">
                    <label class="col-sm-2 col-form-table">State Provice<span style="color: red;">*</span>                    
                    </label>
                    <div class="col-sm-10">
                      <input class="form-control" type="text" name="state_provice" value="{{ $getRecord->state_provice }}" placeholder="Enter State Provice">
                      @error('state_provice')
                        <span style="color: red;">{{$message}}</span>
                      @enderror
                    </div>
                  </div>
                  <div class="form-gorup row mt-2">
                    <label class="col-sm-2 col-form-table">Country Name<span style="color: red;">*</span>                    
                    </label>
                    <div class="col-sm-10">
                      <select class="form-control" name="country_id">
                        @foreach($getCountry as $country)
                          <option {{ ($country->id == $getRecord->country_id) ? 'selected' : ''}} value="{{ $country->id }}">{{ $country->country_name }}</option>
                        @endforeach
                      </select>
                      @error('country_id')
                        <span style="color: red;">{{$message}}</span>
                      @enderror
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