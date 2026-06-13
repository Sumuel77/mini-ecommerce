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
                            <th>Product Name</th>
                            <th>Category Name</th>
                            <th>Product Description</th>
                            <th>Product Price</th>
                            <th>Image</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($products as $product)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $product->name }}</td>
                                <td>{{ $product->categories->name }}</td>
                                <td>{{ $product->description }}</td>
                                <td>{{ $product->price }}</td>
                                <td>
                                    <img src="{{ asset($product->image) }}" style="height: 50px; width: 50px" alt="">
                                </td>
                                <td>{{ $product->status == 1 ? 'active' : 'Inactive' }}</td>
                                <td>
                                    <a href="{{ route('product.edit',['id' => $product->id]) }}" class="btn btn-primary btn-sm">Edit</a>

                                    @if($product->status == 1)
                                        <a href="{{ route('product.status', ['id' => $product->id]) }}" class="btn btn-success btn-sm">Inactive</a>
                                    @else
                                        <a href="{{ route('product.status', ['id' => $product->id]) }}" class="btn btn-warning btn-sm">Active</a>
                                    @endif

                                    {{--                                        <a href="{{ route('category.delete', ['id' => $category->id]) }}" class="btn btn-danger btn-sm">Delete</a>--}}

                                    <form action="{{ route('product.delete') }}" method="post">
                                        @csrf
                                        <input type="hidden" name="id" value="{{ $product->id }}">
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
