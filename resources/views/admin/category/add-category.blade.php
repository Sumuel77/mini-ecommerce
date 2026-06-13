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
                <div class="col-md-10 col-lg-8 col-xl-6 mx-auto d-block">
                    <h4 class="text-center text-success">{{ session('message') }}</h4>
                    <form action="{{ route('category.store') }}" method="post" enctype="multipart/form-data">>
                        @csrf
                        <div class="card card-body pd-20 pd-md-40 border shadow-none">
                            <div class="form-group">
                                <label class="form-label" for="categoryName">Category Name</label>
                                <input class="form-control" id="categoryName" name="name" type="text" placeholder="Enter Category Name" required>
                            </div>
                            <div class="form-group">
                                <label class="form-label" for="categoryImage">Category Image</label>
                                <input class="form-control" id="categoryImage" name="image" type="file" required>
                            </div>
                            <button class="btn btn-primary btn-block">Save Info</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
