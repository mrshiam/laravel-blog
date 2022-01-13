@extends('layouts.admin.master')
@section('breadcrumb')
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
            <li class="breadcrumb-item active">{{$title}}</li>
        </ol>
    </div><!-- /.col -->
@endsection
@section('content')
    <div class="row">
        <!-- /.col -->
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Categories List</h3>


                </div>
                <!-- /.card-header -->
                <div class="card-body p-0">
                    <table class="table">
                        <thead>
                        <tr>
                            <th style="width: 10px">#</th>
                            <th>Name</th>
                            <th>Status</th>
                            <th style="width: 40px">Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($categories as $category)
                            <tr>
                                <td>{{ $serial++ }}</td>
                                <td>{{$category->name}}</td>
                                <td>{{$category->status}}</td>
                                <td>
                                    <a href="{{route('category.edit',$category->id)}}" class="btn btn-primary btn-sm">Edit</a>
                                    <form action="{{route('category.destroy',$category->id)}}" method="post">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are sure to delete?')">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>

                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
            {{-- Pagination --}}
            <div class="d-flex justify-content-center">
                {!! $categories->links() !!}
            </div>
        </div>
        <!-- /.col -->

    </div>
@endsection
