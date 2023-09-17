@extends('layouts.backend_master')
@section('content')
    <div class="page-body">

        <!-- New Product Add Start -->
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="row">
                        <div class="col-sm-10 m-auto">
                            <div class="card">
                                <div class="card-body">
                                    <div class="card-header-2">
                                        <h5>Product Stock Add Form ({{ $product->product_name }})</h5>
                                    </div>

                                    @if (session('success'))
                                        <div class="alert alert-primary">{{ session('success') }}</div>
                                    @endif
                                    @if (session('error'))
                                        <div class="alert alert-secondary">{{ session('error') }}</div>
                                    @endif


                                    <form class="theme-form theme-form-2 mega-form" method="POST"
                                        action="{{ route('stock.store', $product->id) }}">
                                        @csrf

                                        <div class="mb-4 row align-items-center">
                                            <label class="form-label-title col-sm-3 mb-0">Color Name</label>
                                            <div class="col-sm-9">
                                                <select class="form-select" name="color_id" id="">
                                                    <option value="">-Select One Color-</option>
                                                    @foreach ($colors as $color)
                                                        <option value="{{ $color->id }}">
                                                            {{ $color->color_name }}</option>
                                                    @endforeach
                                                </select>
                                                @error('product_name')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="mb-4 row align-items-center">
                                            <label class="form-label-title col-sm-3 mb-0">Size Name</label>
                                            <div class="col-sm-9">
                                                <select class="form-select" name="size_id" id="">
                                                    <option value="">-Select One Size-</option>
                                                    @foreach ($sizes as $size)
                                                        <option value="{{ $size->id }}">
                                                            {{ $size->size_name }}</option>
                                                    @endforeach
                                                </select>
                                                @error('product_name')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="mb-4 row align-items-center">
                                            <label class="form-label-title col-sm-3 mb-0">Product Quantity</label>
                                            <div class="col-sm-9">
                                                <input class="form-control" type="text" placeholder="Product Quantity"
                                                    name="product_quantity">
                                                @error('product_quantity')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>

                                        </div>
                                        <div class="mb-4 row align-items-center">
                                            <label class="form-label-title col-sm-3 mb-0">Product Regular Price</label>
                                            <div class="col-sm-9">
                                                <input class="form-control" type="text"
                                                    placeholder="Product Regular Price" name="regular_price">
                                                @error('regular_price')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="mb-4 row align-items-center">
                                            <label class="form-label-title col-sm-3 mb-0">Product Discounted Price</label>
                                            <div class="col-sm-9">
                                                <input class="form-control" type="text"
                                                    placeholder="Product Discounted Price" name="product_price">
                                                @error('product_price')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
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

                            <div class="card">
                                <div class="card-header">
                                    <h5>Current Stock</h5>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-secondary table-bordered">
                                            <thead>
                                                <tr>
                                                    <th scope="col">Color</th>
                                                    <th scope="col">Size</th>
                                                    <th scope="col">Quantity</th>
                                                    <th scope="col">Regular Price</th>
                                                    <th scope="col">Discounted Price</th>
                                                    <th scope="col">Value</th>
                                                    <th scope="col">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @php
                                                    $total_valuation = 0;
                                                @endphp
                                                @foreach ($stocks as $stock)
                                                    <tr class="">
                                                        <td>{{ App\Models\Color::find($stock->color_id)->color_name }}</td>
                                                        <td>{{ App\Models\Size::find($stock->size_id)->size_name }}</td>
                                                        <td>{{ $stock->product_quantity }}</td>
                                                        <td>{{ $stock->regular_price }}</td>
                                                        <td>{{ $stock->product_price }}</td>
                                                        <td>{{ $stock->product_quantity * $stock->product_price }}</td>
                                                        <td>
                                                            <form action="{{ route('add.stock', $stock->id) }}"
                                                                method="POST">
                                                                @csrf
                                                                <div class="row">
                                                                    <div class="col-9">
                                                                        <input class="form-control" type="text"
                                                                            name="quantity">
                                                                    </div>
                                                                    <div class="col-2">
                                                                        <button class="btn btn-sm btn-info">Add</button>
                                                                    </div>
                                                                </div>


                                                            </form>
                                                        </td>
                                                        @php
                                                            $total_valuation += $stock->product_quantity * $stock->product_price;
                                                        @endphp
                                                    </tr>
                                                @endforeach
                                                <tr>
                                                    <td>
                                                        <b>Total </b>
                                                    </td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td class="text-center">
                                                        <b> {{ $total_valuation }}</b>
                                                    </td>
                                                    <td></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- New Product Add End -->
    @endsection
