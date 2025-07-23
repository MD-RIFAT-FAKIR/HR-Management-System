@extends('backend.layouts.app')

@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Job Grades</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Add</a></li>
              <li class="breadcrumb-item active">Job Grades</li>
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
                <h3 class="card-title">Add Grades</h3>
              </div>
              <form class="form-horaizontal" action="{{ url('admin/job_grades/store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                  <div class="form-gorup row mt-2">
                    <label class="col-sm-2 col-form-table">Grade Level<span style="color: red;">*</span>                    
                    </label>
                    <div class="col-sm-10">
                      <input class="form-control" type="text" name="grade_level" value="{{ old('grade_level') }}" placeholder="Grade Level" required>
                    </div>
                  </div>            
                  <div class="form-gorup row mt-2">
                    <label class="col-sm-2 col-form-table">Lowest Sal<span style="color: red;">*</span>                    
                    </label>
                    <div class="col-sm-10">
                      <input class="form-control" type="number" name="lowest_sal" value="{{ old('lowest_sal') }}" placeholder="Lowest Sal" required>
                    </div>
                  </div>            
                  <div class="form-gorup row mt-2">
                    <label class="col-sm-2 col-form-table">Highest Sal<span style="color: red;">*</span>                    
                    </label>
                    <div class="col-sm-10">
                      <input class="form-control" type="number" name="highest_sal" value="{{ old('highest_sal') }}" placeholder="Highest Sal" required>
                    </div>
                  </div>            
                  <div class="card-footer">
                    <a href="{{ url('admin/job_grades') }}" class="btn btn-default">Back</a>
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