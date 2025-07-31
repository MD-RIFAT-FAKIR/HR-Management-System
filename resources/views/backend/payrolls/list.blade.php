@extends('backend.layouts.app')

@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Pay Roll</h1>
          </div><!-- /.col -->
          <div class="col-sm-6" style="text-align: right;">
            <a class="btn btn-success" href="{{ url('admin/payroll/excel_export') }}">Excel Export</a>
            <br></br>
            <a href="{{ url('admin/payroll/add') }}" class="btn btn-primary">Add Pay Roll</a>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row mt-3">
          <section class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Search Pay Roll</h3>
              </div>
              <form method="get" action="">
                <div class="card-body">
                  <div class="row">
                    <div class="form-gorup col-md-3">
                      <label>ID</label>
                      <input type="text" name="id" value="{{ Request()->id }}" class="form-control" placeholder="ID">
                    </div>
                    <div class="form-gorup col-md-3">
                      <label>Employee Name</label>
                      <input type="text" name="employee_id" value="{{ Request()->employee_id }}" class="form-control" placeholder="Enter Employee Name">
                    </div>
                    <div class="form-gorup col-md-3">
                      <label>Number of Work Days</label>
                      <input type="number" name="number_of_day_work" value="{{ Request()->number_of_day_work }}" class="form-control" placeholder="Number of Work Days">
                    </div>
                    <div class="form-gorup col-md-3">
                      <label>
                        Bonus</label>
                      <input type="number" name="bonus" value="{{ Request()->bonus }}" class="form-control" placeholder="Bonus">
                    </div>
                    <div class="form-gorup col-md-3">
                      <label>
                        Over Time</label>
                      <input type="number" name="over_time" value="{{ Request()->over_time }}" class="form-control" placeholder="Over Time">
                    </div>
                    <div class="form-gorup col-md-3">
                      <button type="submit" class="btn btn-primary" style="margin-top: 30px;">Search</button>
                      <a href="{{ url('admin/payroll') }}" class="btn btn-success" style="margin-top: 30px;">Reset</a>
                    </div>

                  </div>
                </div>
              </form>
            </div>
            @include('message')

            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Pay Roll List</h3>
              </div>
              <div class="card-body p-0">
                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Employee Name</th>
                      <th>Number of Work Days</th>
                      <th>Bonus</th>
                      <th>Over Time</th>
                      <th>Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                    @php
                      $numberOfWorkDay = 0;
                      $bonos = 0;
                      $overTime = 0;
                    @endphp
                     @forelse($getRecord as $value)
                     @php 
                        $numberOfWorkDay += $value->number_of_day_work;
                        $bonos += $value->bonus;
                        $overTime += $value->over_time;
                     @endphp
                      <tr>
                        <td>{{ $value->id }}</td>
                        <td>{{ $value->name }}</td>
                        <td>{{ $value->number_of_day_work }}</td>
                        <td>{{ $value->bonus }}</td>
                        <td>{{ $value->over_time }}</td>
                        <td>
                          <a href="{{ url('admin/payroll/view', $value->id) }}" class="btn btn-info mt-1">view</a>
                          <a href="{{ url('admin/payroll/edit', $value->id) }}" class="btn btn-primary mt-1">Edit</a>
                          <a href="{{ url('admin/payroll/delete', $value->id) }}" onclick="return confirm('Are your sure you want to delete')" class="btn btn-danger mt-1">Delete</a>
                      </td>
                      </tr>
                      @empty
                      <tr>
                        <td colspan="100%" style="color: red;">No Record Found.</td>
                      </tr>
                    @endforelse
                    <tfoot>
                      <tr>
                        <th colspan="2">Sub Total</th>
                        <td>
                          {{ $numberOfWorkDay }}
                        </td>
                        <td>
                          {{ $bonos }}
                        </td>
                        <td>
                          {{ $overTime }}
                        </td>
                        <th colspan="1">Sub Total</th>
                      </tr>
                    </tfoot>
                  </tbody>
                </table>
                <div style="padding: 10px; float: right;">
                  {!! $getRecord->links() !!}
                </div>
              </div>
            </div>
          </section>
        </div>
      </div>
    </section>

    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection
