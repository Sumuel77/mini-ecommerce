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
                <div class="col-md-10 col-lg-10 col-xl-10 mx-auto d-block">
                    <h4 class="text-center text-success">{{ session('message') }}</h4>
                    <form action="{{ route('product.store') }}" method="post" enctype="multipart/form-data">>
                        @csrf
                        <div class="card card-body pd-20 pd-md-40 border shadow-none">
                            <div class="form-group">
                                <label class="form-label" for="productName">Product Name</label>
                                <input class="form-control" id="productName" name="name" type="text" placeholder="Enter Product Name" required>
                            </div>
                            <div class="form-group">
                                <label class="form-label" for="categoryName">Category Name</label>
                                <select name="category_id" id="" class="form-control">
                                    <option>Select A Category</option>
                                    @foreach($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="form-label" for="productPrice">Product Price</label>
                                <input class="form-control" id="productPrice" name="price" type="text" placeholder="Enter Price" required>
                            </div>
                            <div class="form-group">
                                <label class="form-label">Product Description</label>
                                <textarea class="form-control" name="description" placeholder="Enter Your Description" required></textarea>
                            </div>
                            <div class="form-group">
                                <label class="form-label">Product Image</label>
                                <input class="form-control" name="image" type="file" >
                            </div>
                            <button class="btn btn-primary btn-block">Save Info</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
