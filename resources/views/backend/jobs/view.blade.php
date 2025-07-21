@extends('backend.layouts.app')

@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">View Jobs</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">View</a></li>
              <li class="breadcrumb-item active">Job</li>
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
          <h3 class="card-title">View Job</h3>
        </div>
          <form class="form-horaizontal" method="post" enctype="multipart/form-data">
            <div class="card-body">
              <div class="form-gorup row mt-2">
                <label class="col-sm-2 col-form-table">ID<span style="color: red;"></span>                    
                </label>
                <div class="col-sm-10">
                  {{ $job->id }}
                </div>
              </div>
              <div class="form-gorup row mt-2">
                <label class="col-sm-2 col-form-table">Job Title<span style="color: red;"></span>                    
                </label>
                <div class="col-sm-10">
                  {{ $job->job_title }}
                </div>
              </div>
              <div class="form-gorup row mt-2">
                <label class="col-sm-2 col-form-table">Min Salary<span style="color: red;"></span>                    
                </label>
                <div class="col-sm-10">
                  {{ $job->min_salary }}
                </div>
              </div>
              <div class="form-gorup row mt-2">
                <label class="col-sm-2 col-form-table">Max Salary<span style="color: red;"></span>                    
                </label>
                <div class="col-sm-10">
                  {{ $job->max_salary }}
                </div>
              </div>
              <div class="form-gorup row mt-2">
                <label class="col-sm-2 col-form-table">Crited Date<span style="color: red;"></span>                    
                </label>
                <div class="col-sm-10">
                  {{ date('d-m-Y H:i A', strtotime($job->created_at)) }}
                </div>
              </div>
              <div class="form-gorup row mt-2">
                <label class="col-sm-2 col-form-table">Updated Date<span style="color: red;"></span>                    
                </label>
                <div class="col-sm-10">
                  {{ date('d-m-Y H:i A', strtotime($job->updated_at)) }}
                </div>
              </div>
              <div class="card-footer">
                <a href="{{ url('admin/jobs') }}" class="btn btn-default">Back</a>
              </div>
            </div>
        </form>
      </div>
    </section>

          <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection