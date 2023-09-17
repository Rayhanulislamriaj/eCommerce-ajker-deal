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
                                        <h5>Product Information</h5>
                                    </div>

                                    @if (session('success'))
                                        <div class="alert alert-primary">{{ session('success') }}</div>
                                    @endif


                                    <form class="theme-form theme-form-2 mega-form" enctype="multipart/form-data"
                                        method="POST" action="{{ route('product.store') }}">
                                        @csrf
                                        <div class="mb-4 row align-items-center">
                                            <label class="form-label-title col-sm-3 mb-0">Category Name</label>
                                            <div class="col-sm-9">
                                                <select class="form-select" name="category_id">
                                                    <option value="">-Select One Category-</option>
                                                    @foreach ($categories as $category)
                                                        <option value="{{ $category->id }}">
                                                            {{ $category->category_name }}</option>
                                                    @endforeach
                                                </select>
                                                {{-- @error('category_name')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror --}}
                                            </div>
                                        </div>

                                        <div class="mb-4 row align-items-center">
                                            <label class="form-label-title col-sm-3 mb-0">Product Name</label>
                                            <div class="col-sm-9">
                                                <input class="form-control" type="text" placeholder="Product Name"
                                                    name="product_name">
                                                @error('product_name')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="mb-4 row align-items-center">
                                            <label class="form-label-title col-sm-3 mb-0">Product Short Details</label>
                                            <div class="col-sm-9">
                                                <textarea name="product_short_details" class="form-control" rows="2"></textarea>
                                                @error('product_short_details')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="mb-4 row align-items-center">
                                            <label class="form-label-title col-sm-3 mb-0">Product Long Details</label>
                                            <div class="col-sm-9">
                                                <textarea name="product_long_details" class="form-control" rows="4"></textarea>
                                                @error('product_long_details')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="mb-4 row align-items-center">
                                            <label class="form-label-title col-sm-3 mb-0">Additional Info</label>
                                            <div class="col-sm-9">
                                                <textarea name="product_additional_info" class="form-control" rows="4"></textarea>
                                                @error('product_additional_info')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="mb-4 row align-items-center">
                                            <label class="form-label-title col-sm-3 mb-0">Care Instructions</label>
                                            <div class="col-sm-9">
                                                <textarea name="product_care_instructions" class="form-control" rows="4"></textarea>
                                                @error('product_care_instructions')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="mb-4 row align-items-center">
                                            <label class="form-label-title col-sm-3 mb-0">Product Photos</label>
                                            <div class="col-sm-9">
                                                <input class="form-control" type="file" name="product_photos[]" multiple>
                                                {{-- @error('category_icon')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror --}}
                                            </div>
                                        </div>

                                        <div class="mb-4 row align-items-center">
                                            <div class="col-sm-3">
                                            </div>
                                            <div class="col-sm-7">
                                                <button type="submit" class="btn btn-dark"> Add New Product </button>
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
