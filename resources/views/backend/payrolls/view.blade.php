@extends('backend.layouts.app')

@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">View Pay Roll</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">View</a></li>
              <li class="breadcrumb-item active"> Pay Roll</li>
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
          <h3 class="card-title">View Pay Roll</h3>
        </div>
          <form class="form-horaizontal" method="post" enctype="multipart/form-data">
            <div class="card-body">
              <div class="form-gorup row mt-2">
                <label class="col-sm-2 col-form-table">ID<span style="color: red;"></span>                    
                </label>
                <div class="col-sm-10">
                  {{ $getRecord->id }}
                </div>
              </div>
              <div class="form-gorup row mt-2">
                <label class="col-sm-2 col-form-table">Employee ID<span style="color: red;"></span>                    
                </label>
                <div class="col-sm-10">
                  {{ (!empty($getRecord->user->name) ? $getRecord->user->name : '') }}
                </div>
              </div>
              <div class="form-gorup row mt-2">
                <label class="col-sm-2 col-form-table">Number of Day Work<span style="color: red;"></span>                    
                </label>
                <div class="col-sm-10">
                  {{ $getRecord->number_of_day_work }}
                </div>
              </div>
              <div class="form-gorup row mt-2">
                <label class="col-sm-2 col-form-table">Bonus<span style="color: red;"></span>                    
                </label>
                <div class="col-sm-10">
                  {{ $getRecord->bonus }}
                </div>
              </div>
              <div class="form-gorup row mt-2">
                <label class="col-sm-2 col-form-table">Over Time<span style="color: red;"></span>                    
                </label>
                <div class="col-sm-10">
                  {{ $getRecord->over_time }}
                </div>
              </div>
              <div class="form-gorup row mt-2">
                <label class="col-sm-2 col-form-table">Gross Salary<span style="color: red;"></span>                    
                </label>
                <div class="col-sm-10">
                  {{ $getRecord->gross_salary }}
                </div>
              </div>
              <div class="form-gorup row mt-2">
                <label class="col-sm-2 col-form-table">Cash Advance<span style="color: red;"></span>                    
                </label>
                <div class="col-sm-10">
                  {{ $getRecord->cash_advance }}
                </div>
              </div>
              <div class="form-gorup row mt-2">
                <label class="col-sm-2 col-form-table">Late Hours<span style="color: red;"></span>                    
                </label>
                <div class="col-sm-10">
                  {{ $getRecord->late_hours }}
                </div>
              </div>
              <div class="form-gorup row mt-2">
                <label class="col-sm-2 col-form-table">Absent Days<span style="color: red;"></span>                    
                </label>
                <div class="col-sm-10">
                  {{ $getRecord->absent_days }}
                </div>
              </div>
              <div class="form-gorup row mt-2">
                <label class="col-sm-2 col-form-table">SSS Contribution<span style="color: red;"></span>                    
                </label>
                <div class="col-sm-10">
                  {{ $getRecord->sss_contribution }}
                </div>
              </div>
              <div class="form-gorup row mt-2">
                <label class="col-sm-2 col-form-table">Phil Health<span style="color: red;"></span>                    
                </label>
                <div class="col-sm-10">
                  {{ $getRecord->philhealth }}
                </div>
              </div>
              <div class="form-gorup row mt-2">
                <label class="col-sm-2 col-form-table">Total Deductions<span style="color: red;"></span>                    
                </label>
                <div class="col-sm-10">
                  {{ $getRecord->total_deductions }}
                </div>
              </div>
              <div class="form-gorup row mt-2">
                <label class="col-sm-2 col-form-table"> Net Pay<span style="color: red;"></span>                    
                </label>
                <div class="col-sm-10">
                  {{ $getRecord->netpay }}
                </div>
              </div>
              <div class="form-gorup row mt-2">
                <label class="col-sm-2 col-form-table"> Payroll Monthly<span style="color: red;"></span>                    
                </label>
                <div class="col-sm-10">
                  {{ $getRecord->payroll_monthly }}
                </div>
              </div>
              <div class="form-gorup row mt-2">
                <label class="col-sm-2 col-form-table"> Created Date<span style="color: red;"></span>                    
                </label>
                <div class="col-sm-10">
                  {{ date('d-m-Y H:i A', strtotime($getRecord->created_at)) }}
                </div>
              </div>
              <div class="form-gorup row mt-2">
                <label class="col-sm-2 col-form-table"> Updated Date<span style="color: red;"></span>                    
                </label>
                <div class="col-sm-10">
                  {{ date('d-m-Y H:i A', strtotime($getRecord->updated_at)) }}
                </div>
              </div>
              <div class="card-footer">
                <a href="{{ url('admin/payroll') }}" class="btn btn-default">Back</a>
              </div>
            </div>
        </form>
      </div>
    </section>

          <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection