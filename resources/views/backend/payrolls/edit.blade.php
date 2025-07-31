@extends('backend.layouts.app')

@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Pay Roll</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Edit</a></li>
              <li class="breadcrumb-item active">Pay Roll</li>
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
                <h3 class="card-title">Edit Pay Roll</h3>
              </div>
              <form class="form-horaizontal" action="{{ url('admin/payroll/store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                  <div class="form-gorup row mt-2">
                    <label class="col-sm-2 col-form-table">Employee Name<span style="color: red;">*</span>                    
                    </label>
                    <div class="col-sm-10">
                      <select class="form-control" name="employee_id">
                        <option value="">--- Select Employees Name ---</option>
                          @foreach($user as $value)
                            <option {{ ($payRoll->employee_id == $value->id) ? 'selected' : '' }} value="{{ $value->id }}">{{ $value->name }}</option>
                          @endforeach
                      </select>
                    </div>
                  </div>
                  <div class="form-gorup row mt-2">
                    <label class="col-sm-2 col-form-table">Number of Word Days<span style="color: red;">*</span>                    
                    </label>
                    <div class="col-sm-10">
                      <input class="form-control" type="number" name="number_of_day_work" value="{{ $payRoll->number_of_day_work }}" placeholder="Enter Number of Word Days">
                    </div>
                  </div>            
                  <div class="form-gorup row mt-2">
                    <label class="col-sm-2 col-form-table">Bonus<span style="color: red;">*</span>                    
                    </label>
                    <div class="col-sm-10">
                      <input class="form-control" type="number" name="bonus" value="{{ $payRoll->bonus }}" placeholder="Enter Bonus">
                    </div>
                  </div>            
                  <div class="form-gorup row mt-2">
                    <label class="col-sm-2 col-form-table">Over Time<span style="color: red;">*</span>                    
                    </label>
                    <div class="col-sm-10">
                      <input class="form-control" type="number" name="over_time" value="{{ $payRoll->over_time }}" placeholder="Enter Over Time">
                    </div>
                  </div>            
                  <div class="form-gorup row mt-2">
                    <label class="col-sm-2 col-form-table">Gross Salary<span style="color: red;">*</span>                    
                    </label>
                    <div class="col-sm-10">
                      <input class="form-control" type="number" name="gross_salary" value="{{ $payRoll->gross_salary }}" placeholder="Enter Gross Salary">
                    </div>
                  </div>            
                  <div class="form-gorup row mt-2">
                    <label class="col-sm-2 col-form-table">Cash Advance<span style="color: red;">*</span>                    
                    </label>
                    <div class="col-sm-10">
                      <input class="form-control" type="number" name="cash_advance" value="{{ $payRoll->cash_advance }}" placeholder="Enter Cash Advance">
                    </div>
                  </div>            
                  <div class="form-gorup row mt-2">
                    <label class="col-sm-2 col-form-table">Late Hours<span style="color: red;">*</span>                    
                    </label>
                    <div class="col-sm-10">
                      <input class="form-control" type="number" name="late_hours" value="{{ $payRoll->late_hours }}" placeholder="Enter Late Hours">
                    </div>
                  </div>            
                  <div class="form-gorup row mt-2">
                    <label class="col-sm-2 col-form-table">Absent Days<span style="color: red;">*</span>                    
                    </label>
                    <div class="col-sm-10">
                      <input class="form-control" type="number" name="absent_days" value="{{ $payRoll->absent_days }}" placeholder="Enter Absent Days">
                    </div>
                  </div>            
                  <div class="form-gorup row mt-2">
                    <label class="col-sm-2 col-form-table">SSS Contribution<span style="color: red;">*</span>                    
                    </label>
                    <div class="col-sm-10">
                      <input class="form-control" type="text" name="sss_contribution" value="{{ $payRoll->sss_contribution }}" placeholder="Enter contribution">
                    </div>
                  </div>            
                  <div class="form-gorup row mt-2">
                    <label class="col-sm-2 col-form-table">Philhealth<span style="color: red;">*</span>                    
                    </label>
                    <div class="col-sm-10">
                      <input class="form-control" type="text" name="philhealth" value="{{ $payRoll->philhealth }}" placeholder="Enter Philhealth">
                    </div>
                  </div>            
                  <div class="form-gorup row mt-2">
                    <label class="col-sm-2 col-form-table">Total Deductions<span style="color: red;">*</span>                    
                    </label>
                    <div class="col-sm-10">
                      <input class="form-control" type="text" name="total_deductions" value="{{ $payRoll->total_deductions }}" placeholder="Enter Total Deductions">
                    </div>
                  </div>            
                  <div class="form-gorup row mt-2">
                    <label class="col-sm-2 col-form-table">Net pay<span style="color: red;">*</span>                    
                    </label>
                    <div class="col-sm-10">
                      <input class="form-control" type="number" name="netpay" value="{{ $payRoll->netpay }}" placeholder="Enter Net pay">
                    </div>
                  </div>            
                  <div class="form-gorup row mt-2">
                    <label class="col-sm-2 col-form-table">Payroll Monthly<span style="color: red;">*</span>                    
                    </label>
                    <div class="col-sm-10">
                      <input class="form-control" type="number" name="payroll_monthly" value="{{ $payRoll->payroll_monthly  }}" placeholder="Enter Payroll Monthly">
                    </div>
                  </div>            
                  <div class="card-footer">
                    <a href="{{ url('admin/payroll') }}" class="btn btn-default">Back</a>
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