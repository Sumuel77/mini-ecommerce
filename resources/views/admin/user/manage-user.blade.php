@extends('admin.master')
@section('body')
    <!-- CONTAINER -->
    <div class="main-container container-fluid">


        <!-- PAGE-HEADER -->
        <div class="page-header">
            <div>
                <h1 class="page-title">Form Layouts</h1>
            </div>
            <div class="ms-auto pageheader-btn">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0);">Forms</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Form Layouts</li>
                </ol>
            </div>
        </div>
        <!-- PAGE-HEADER END -->
        <div class="card-body">
            <div class="row">
                <div class="col-md-12 col-lg-12 col-xl-12 mx-auto d-block">
                    <h4 class="text-center text-success">{{ session('message') }}</h4>
                    <table class="table table-bordered table-hover table-striped">
                        <thead>
                        <tr>
                            <th>Sl</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($users as $user)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>
                                    <a href="{{ route('user.edit',['id' => $user->id]) }}" class="btn btn-primary btn-sm">Edit</a>

                                    {{--                                        <a href="{{ route('category.delete', ['id' => $category->id]) }}" class="btn btn-danger btn-sm">Delete</a>--}}

                                    <form action="{{ route('user.delete') }}" method="post">
                                        @csrf
                                        <input type="hidden" name="id" value="{{ $user->id }}">
                                        <button class="btn btn-danger btn-sm" onclick="return confirm('Are you sure delete this!')" >Delete</button>
                                    </form>
                                </td>
                            </tr>
                        </tbody>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
