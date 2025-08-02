@extends('backend.layouts.app')

@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Position</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Edit</a></li>
              <li class="breadcrumb-item active">Position</li>
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
                <h3 class="card-title">Edit Position</h3>
              </div>
              <form class="form-horizontal" action="{{ url('admin/position/update', $getPosition->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                
                  <div class="form-gorup row mt-2">
                    <label class="col-sm-2 col-form-table">Position Name<span style="color: red;">*</span>                    
                    </label>
                    <div class="col-sm-10">
                      <input class="form-control" type="text" name="position_name" value="{{ $getPosition->position_name }}" placeholder="Enter Position Name">
                    </div>
                  </div>            
                  <div class="form-gorup row mt-2">
                    <label class="col-sm-2 col-form-table">Daily Rate<span style="color: red;">*</span>                    
                    </label>
                    <div class="col-sm-10">
                      <input class="form-control" type="number" name="daily_rate" value="{{ $getPosition->daily_rate }}" placeholder="Enter Daily Rate">
                    </div>
                  </div>            
                  <div class="form-gorup row mt-2">
                    <label class="col-sm-2 col-form-table">Monthly Rate<span style="color: red;">*</span>                    
                    </label>
                    <div class="col-sm-10">
                      <input class="form-control" type="number" name="monthly_rate" value="{{ $getPosition->monthly_rate }}" placeholder="Enter Monthly Rate">
                    </div>
                  </div>            
                  <div class="form-gorup row mt-2">
                    <label class="col-sm-2 col-form-table">Working Days Per Month<span style="color: red;">*</span>                    
                    </label>
                    <div class="col-sm-10">
                      <input class="form-control" type="number" name="working_days_per_month" value="{{ $getPosition->working_days_per_month }}" placeholder="Enter Working Days Per Month">
                    </div>
                  </div>            
           
            
                  <div class="card-footer">
                    <a href="{{ url('admin/position') }}" class="btn btn-default">Back</a>
                    <button type="submit" class="btn btn-primary float-right">Update</button>
                  </div>
                </div>
              </form>
            </div>
          </section>

      <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection