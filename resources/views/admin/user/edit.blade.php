@extends('layouts.admin.master')
@section('content')
    <div class="row">
        <!-- left column -->
        <div class="offset-3 col-md-6">
            <!-- general form elements -->
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Edit User</h3>

                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form action="{{route('user.update',$user->id)}}" method="post">
                    @csrf
                    @method('put')
                    <div class="card-body">
                        @include('admin.user._form')
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
