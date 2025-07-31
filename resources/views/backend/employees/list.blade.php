@extends('backend.layouts.app')

@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Employees</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <div class="float-sm-right">
              <a href="{{ url('admin/employees/add') }}" class="btn btn-primary">
                <i class="fas fa-plus"></i> Add Employee
              </a>
            </div>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <section class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Search Employee</h3>
                <div class="card-tools">
                </div>
              </div>
              <form method="get" action="">
                <div class="card-body">
                  <div class="row">

                    <div class="form-group col-md-1">
                      <label>ID</label>
                      <input type="text" name="id" value="{{ Request()->id }}" class="form-control" placeholder="ID">
                    </div>
                    <div class="form-group col-md-3">
                      <label>First Name</label>
                      <input type="text" name="name" value="{{ Request()->name }}" class="form-control" placeholder="First Name">
                    </div>

                    <div class="form-group col-md-3">
                      <label>Last Name</label>
                      <input type="text" name="last_name" value="{{ Request()->last_name }}" class="form-control" placeholder="Last Name">
                    </div>

                    <div class="form-group col-md-3">
                      <label>Email</label>
                      <input type="email" name="email" value="{{ Request()->email }}" class="form-control" placeholder="Email">
                    </div>

                    <div class="form-group col-md-2 d-flex align-items-end">
                      <button type="submit" class="btn btn-primary mr-2">
                         Search
                      </button>
                      <a href="{{ url('admin/employees') }}" class="btn btn-success">
                         Reset
                      </a>
                    </div>

                  </div>
                </div>
              </form>
            </div>
            @include('message')

            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Employee List</h3>
              </div>
              <div class="card-body p-0">
                <div class="table-responsive">
                  <table class="table table-striped table-hover">
                    <thead>
                      <tr>
                        <th class="text-center">ID</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Email</th>
                        <th class="text-center">Profile</th>
                        <th class="text-center">Role</th>
                        <th class="text-center" style="width: 200px;">Actions</th>
                      </tr>
                    </thead>
                    <tbody>
                      @forelse($getRecord as $value)
                      <tr>
                        <td class="text-center">{{ $value->id }}</td>
                        <td>{{ $value->name }}</td>
                        <td>{{ $value->last_name }}</td>
                        <td>{{ $value->email }}</td>
                        <td class="text-center">
                          @if(!empty($value->profile_img) && file_exists('upload/'.$value->profile_img))
                            <img class="img-thumbnail" style="width:60px; height: 60px; object-fit: cover;" src="{{ url('upload/'.$value->profile_img) }}">
                          @else
                            <span class="badge bg-secondary">No Image</span>
                          @endif
                        </td>
                        <td class="text-center">
                          <span class="badge {{ $value->is_role ? 'bg-primary' : 'bg-secondary' }}">
                            {{ $value->is_role ? 'HR' : 'Employee' }}
                          </span>
                        </td>
                        <td class="text-center">
                          <div class="btn-group" role="group">
                            <a href="{{ url('admin/employees/view', $value->id) }}" class="btn btn-info" title="View">
                              View
                            </a>
                            <a href="{{ url('admin/employees/edit', $value->id) }}" class="btn btn-success" title="Edit">
                              Edit
                            </a>
                            <a href="{{ url('admin/employees/delete', $value->id) }}" 
                              onclick="return confirm('Are you sure you want to delete this employee?')" 
                              class="btn btn-danger" title="Delete">
                              Delete
                            </a>
                          </div>
                        </td>
                      </tr>
                      @empty
                      <tr>
                        <td colspan="7" class="text-center text-danger py-4">No Records Found</td>
                      </tr>
                      @endforelse
                    </tbody>
                  </table>
                </div>
                <div class="card-footer clearfix">
                  {!! $getRecord->appends(Illuminate\Support\Facades\Request::except('page'))->links() !!}
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