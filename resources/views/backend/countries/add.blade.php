@extends('backend.layouts.app')

@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Countries</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Add</a></li>
              <li class="breadcrumb-item active"> Country</li>
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
                <h3 class="card-title">Add Country</h3>
              </div>
              <form class="form-horaizontal" action="{{ url('admin/countries/store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                  <div class="form-gorup row mt-2">
                    <label class="col-sm-2 col-form-table">Country Name<span style="color: red;">*</span>                    
                    </label>
                    <div class="col-sm-10">
                      <input class="form-control" type="text" name="country_name" value="{{ old('country_name') }}" placeholder="Enter Country Name">
                      <span style="color: red;">
                        @error('country_name')
                          {{ $message }}
                        @enderror
                      </span>
                    </div>
                  </div> 
                  <div class="form-gorup row mt-2">
                    <label class="col-sm-2 col-form-table">Region Name<span style="color: red;">*</span>                    
                    </label>
                    <div class="col-sm-10">
                      <select class="form-control" name="region_id" >
                        <option value="">---  Select Region Name  ---</option>
                        @foreach($regions as $region)
                        <option value="{{ $region->id }}">{{ $region->region_name }}</option>
                        @endforeach
                      </select>
                      <span style="color: red;">
                        @error('region_id')
                          {{ $message }}
                        @enderror
                      </span>
                    </div>
                  </div> 
                  <div class="card-footer">
                    <a href="{{ url('admin/countries') }}" class="btn btn-default">Back</a>
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