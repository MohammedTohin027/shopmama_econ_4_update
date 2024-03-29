@extends('layouts.admin-master')
@section('title') Starlight Admin | Edit Category @endsection
@section('category') active show-sub @endsection
@section('category-index') active @endsection
@section('dashboard-content')
    <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="{{ route('admin.dashboard') }}">Starlight</a>
        <span class="breadcrumb-item active">Category Edit</span>
    </nav>

    <div class="sl-pagebody">
        <div class="card pd-20 pd-sm-40">
            <h6 class="card-body-title">Update Category</h6>
            <p></p>
            <form action="{{ route('update.category') }}" method="POST">
                @csrf
                <input type="hidden" name="id" value="{{ $category->id }}">
                <div class="row row-sm">

                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="form-control-label">Category Name English: <span
                                    class="tx-danger">*</span></label>
                            <input class="form-control" type="text" name="category_name_en"
                                value="{{ $category->category_name_en }}" placeholder="Enter Category Name English">
                            @error('category_name_en')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="form-control-label">Category Name Bangla: <span
                                    class="tx-danger">*</span></label>
                            <input class="form-control" type="text" name="category_name_bn"
                                value="{{ $category->category_name_bn }}" placeholder="Enter Category Name Bangla">
                            @error('category_name_bn')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="form-control-label">Category Icon: <span class="tx-danger">*</span></label>
                            <input class="form-control" type="text" name="category_icon"
                                value="{{ $category->category_icon }}" placeholder="Enter Category icon">
                            @error('category_icon')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-layout-footer mt-3">
                        <button class="btn btn-info mg-r-5" type="submit" style="cursor: pointer;">Update category</button>
                    </div><!-- form-layout-footer -->
                </div><!-- row -->
            </form>
        </div>
    </div>


@endsection
