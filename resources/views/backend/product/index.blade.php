@extends('layouts.backend_master')
@section('content')
    <!-- Container-fluid starts-->
    <div class="page-body">
        <!-- All User Table Start -->
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="title-header option-title">
                                <h5>All Product ({{ $products->count() }})</h5>
                                <form class="d-inline-flex">
                                    <a href="{{ route('product.create') }}" class="align-items-center btn btn-theme">
                                        <i data-feather="plus-square"></i>Add New
                                    </a>
                                </form>
                            </div>

                            <div class="table-responsive Product-table">
                                <table class="table all-package theme-table" id="table_id">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Product Name</th>
                                            <th>Product Image</th>
                                            <th>Date</th>
                                            <th>Option</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($products as $product)
                                            <tr>
                                                <td>{{ $product->id }}</td>
                                                <td>
                                                    {{ $product->product_name }}
                                                </td>
                                                <td>
                                                    @foreach (App\Models\Product_photo::where('product_id', $product->id)->get() as $product_photo)
                                                        <img width="70"
                                                            src="{{ asset('uploads/product_photos') }}/{{ $product_photo->product_photo }}"
                                                            alt="">
                                                    @endforeach
                                                </td>
                                                <td>{{ $product->created_at }}</td>



                                                <td>
                                                    <a href="{{ route('stock', $product->id) }}"
                                                        class="btn btn-primary">Stock</a>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="5" class="text-center text-danger">No Product to show!</td>
                                            </tr>
                                        @endforelse

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </div>
        <!-- All User Table Ends-->
    @endsection
