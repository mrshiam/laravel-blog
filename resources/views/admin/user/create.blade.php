@extends('layouts.admin.master')
@section('content')
    <div class="row">
        <!-- left column -->
        <div class="offset-3 col-md-6">
            <!-- general form elements -->
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Add new User</h3>

                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form action="{{route('user.store')}}" method="post">
                    @csrf
                    <div class="card-body">
                        @include('admin.user._form')
                        <div class="form-group">
                            <label for="exampleInputPassword1">Password</label>
                            <input type="password" name="password" class="form-control"  id="exampleInputPassword1" placeholder="Password">
                            @error('password')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="confirm_password">Confirm Password</label>
                            <input type="password" name="password_confirmation" class="form-control" id="confirm_password" placeholder="Confirm Password">
                        </div>

                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
            <!-- /.card -->

        </div>
        <!--/.col (left) -->

    </div>
@endsection
