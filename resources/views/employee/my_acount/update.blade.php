@extends('backend.layouts.app')

@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">My Acount</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Setting</a></li>
              <li class="breadcrumb-item active">My Acount</li>
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
            @include('message')
            <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">My Acount</h3>
              </div>
              <form class="form-horaizontal" action="{{ url('admin/my_acount/update') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                  <div class="form-gorup row mt-2">
                    <label class="col-sm-2 col-form-table">Name<span style="color: red;">*</span>                    
                    </label>
                    <div class="col-sm-10">
                      <input class="form-control" type="text" name="name" value="{{ $getRecord->name }}" placeholder="Enter Name">
                      @error('manager_name')
                        <span style="color:red;">{{ $message }}</span>
                      @enderror
                    </div>
                  </div>
                  <div class="form-gorup row mt-2">
                    <label class="col-sm-2 col-form-table"> Email<span style="color: red;">*</span>                    
                    </label>
                    <div class="col-sm-10">
                      <input class="form-control" type="text" name="email" value="{{ $getRecord->email }}" placeholder="Enter Email">
                      @error('manager_email')
                        <span style="color:red;">{{ $message }}</span>
                      @enderror
                    </div>
                  </div>
                  <div class="form-gorup row mt-2">
                    <label class="col-sm-2 col-form-table">Profiel Image<span style="color: red;"></span>                    
                    </label>
                    <div class="col-sm-10">
                      <input class="form-control" type="file" name="profile_img" value="{{ old('profile_img') }}">
                      @if(!empty($getRecord->profile_img))
                          @if(file_exists('upload/'.$getRecord->profile_img))
                            <img style="width: 80px; height: 80px" src="{{ url('upload/'.$getRecord->profile_img)}}">
                          @endif
                      @endif
                      <span style="color: red;">{{ $errors->first('profile_img') }}</span>
                    </div>
                  </div>
                  <div class="form-gorup row mt-2">
                    <label class="col-sm-2 col-form-table">Password<span style="color: red;">*</span>                    
                    </label>
                    <div class="col-sm-10">
                      <input class="form-control" type="text" name="password" value="{{ old('password') }}" placeholder="Enter Password">
                      (Leave blank if you are not changing the password)
                      @error('manager_mobile')
                        <span style="color:red;">{{ $message }}</span>
                      @enderror
                    </div>
                  </div>
                  <div class="card-footer">
                    <a href="{{ url('admin/my_acount') }}" class="btn btn-default">Back</a>
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