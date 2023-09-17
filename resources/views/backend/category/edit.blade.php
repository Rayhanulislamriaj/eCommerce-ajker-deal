@extends('layouts.backend_master')
@section('content')
    <div class="page-body">

        <!-- New Product Add Start -->
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="row">
                        <div class="col-sm-8 m-auto">
                            <div class="card">
                                <div class="card-body">
                                    <div class="card-header-2">
                                        <h5>Category Information</h5>
                                    </div>
                                    @if (session('success'))
                                        <div class="alert alert-primary">{{ session('success') }}</div>
                                    @endif


                                    <form class="theme-form theme-form-2 mega-form" enctype="multipart/form-data"
                                        method="POST" action="{{ route('category.update', $category->id) }}">
                                        @csrf
                                        @method('PUT')
                                        <div class="mb-4 row align-items-center">
                                            <label class="form-label-title col-sm-3 mb-0">Category Name</label>
                                            <div class="col-sm-9">
                                                <input class="form-control" type="text" placeholder="Category Name"
                                                    name="category_name" value="{{ $category->category_name }}">
                                                @error('category_name')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="mb-4 row align-items-center">
                                            <label class="form-label-title col-sm-3 mb-0">Category Details</label>
                                            <div class="col-sm-9">
                                                <textarea name="category_details" class="form-control" rows="6">{{ $category->category_details }}</textarea>
                                                @error('category_details')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="mb-4 row align-items-center">
                                            <label class="form-label-title col-sm-3 mb-0">Category Icon</label>
                                            <div class="col-sm-9">
                                                <input class="form-control" type="file" name="category_icon">
                                                @error('category_icon')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="mb-4 row align-items-center">
                                            <div class="col-sm-3">
                                            </div>
                                            <div class="col-sm-7">
                                                <button type="submit" class="btn btn-info"> Update Category </button>
                                            </div>
                                        </div>


                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- New Product Add End -->
    @endsection
