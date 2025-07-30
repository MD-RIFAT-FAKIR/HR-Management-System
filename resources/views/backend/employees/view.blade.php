@extends('backend.layouts.app')

@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">View Employee</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">View</a></li>
              <li class="breadcrumb-item active"> Employee</li>
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
          <h3 class="card-title">View Employee</h3>
        </div>
          <form class="form-horaizontal" method="post" enctype="multipart/form-data">
            <div class="card-body">
              <div class="form-gorup row mt-2">
                <label class="col-sm-2 col-form-table">ID<span style="color: red;"></span>                    
                </label>
                <div class="col-sm-10">
                  {{ $employee->id }}
                </div>
              </div>
              <div class="form-gorup row mt-2">
                <label class="col-sm-2 col-form-table">First Name<span style="color: red;"></span>                    
                </label>
                <div class="col-sm-10">
                  {{ $employee->name }}
                </div>
              </div>
              <div class="form-gorup row mt-2">
                <label class="col-sm-2 col-form-table">Last Name<span style="color: red;"></span>                    
                </label>
                <div class="col-sm-10">
                  {{ $employee->last_name }}
                </div>
              </div>
              <div class="form-gorup row mt-2">
                <label class="col-sm-2 col-form-table">Role<span style="color: red;"></span>                    
                </label>
                <div class="col-sm-10">
                  {{ !empty($employee->is_role) ? 'HR' : 'Employee' }}
                </div>
              </div>
              <div class="form-gorup row mt-2">
                <label class="col-sm-2 col-form-table">Email<span style="color: red;"></span>                    
                </label>
                <div class="col-sm-10">
                  {{ $employee->email }}
                </div>
              </div>
              <div class="form-gorup row mt-2">
                <label class="col-sm-2 col-form-table">Phone<span style="color: red;"></span>                    
                </label>
                <div class="col-sm-10">
                  {{ $employee->phone_number }}
                </div>
              </div>
              <div class="form-gorup row mt-2">
                <label class="col-sm-2 col-form-table">Hire Date<span style="color: red;"></span>                    
                </label>
                <div class="col-sm-10">
                  {{ date('d-m-Y', strtotime($employee->hire_date)) }}
                </div>
              </div>
              <div class="form-gorup row mt-2">
                <label class="col-sm-2 col-form-table">Job Tittle<span style="color: red;"></span>                    
                </label>
                <div class="col-sm-10">
                  {{ $employee->get_job->job_title }}
                </div>
              </div>
              <div class="form-gorup row mt-2">
                <label class="col-sm-2 col-form-table">Salary<span style="color: red;"></span>                    
                </label>
                <div class="col-sm-10">
                  {{ $employee->salary }}
                </div>
              </div>
              <div class="form-gorup row mt-2">
                <label class="col-sm-2 col-form-table">Commision PCT<span style="color: red;"></span>                    
                </label>
                <div class="col-sm-10">
                  {{ $employee->commision_pct }}
                </div>
              </div>
              <div class="form-gorup row mt-2">
                <label class="col-sm-2 col-form-table">Manager Name<span style="color: red;"></span>                    
                </label>
                <div class="col-sm-10">
                  {{ $employee->manager->manager_name }}
                </div>
              </div>
              <div class="form-gorup row mt-2">
                <label class="col-sm-2 col-form-table">Department Name<span style="color: red;"></span>                    
                </label>
                <div class="col-sm-10">
                  {{ $employee->department->department_name }}
                </div>
              </div>
              <div class="form-gorup row mt-2">
                <label class="col-sm-2 col-form-table">Crited Date<span style="color: red;"></span>                    
                </label>
                <div class="col-sm-10">
                  {{ date('d-m-Y H:i A', strtotime($employee->created_at)) }}
                </div>
              </div>
              <div class="form-gorup row mt-2">
                <label class="col-sm-2 col-form-table">Updated Date<span style="color: red;"></span>                    
                </label>
                <div class="col-sm-10">
                  {{ date('d-m-Y H:i A', strtotime($employee->updated_at)) }}
                </div>
              </div>
              
              <div class="card-footer">
                <a href="{{ url('admin/employees') }}" class="btn btn-default">Back</a>
              </div>
            </div>
        </form>
      </div>
    </section>

          <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection