@extends('layouts.frontend_master')

@section('content')
    <!-- Breadcrumb Section Start -->
    <section class="breadscrumb-section pt-0">
        <div class="container-fluid-lg">
            <div class="row">
                <div class="col-12">
                    <div class="breadscrumb-contain">
                        <h2>Review</h2>
                        <nav>
                            <ol class="breadcrumb mb-0">
                                <li class="breadcrumb-item">
                                    <a href="index.html">
                                        <i class="fa-solid fa-house"></i>
                                    </a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">Review</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->


    <!-- Client Section Start -->
    <section class="client-section section-lg-space">
        <div class="container-fluid-lg">
            <div class="row">
                <div class="col-12">
                    <div class="about-us-title text-center">
                        <h4>What We Do</h4>
                        <h2 class="center">We are Trusted by Clients. Give your feedback.</h2>
                    </div>

                    @foreach ($products as $product)
                        <div class="product-wrapper mb-3 col-12">
                            <div>
                                <form action="{{ route('insert.review', $product->id) }}" method="POST">
                                    @csrf
                                    <div class="clint-contain">
                                        <div class="card form-control">
                                            <div class="card-header text-center">
                                                <h2>{{ $product->product->product_name }}</h2>
                                                <h4>{{ $product->product->product_name }}</h4>
                                                <img width="200"
                                                    src="{{ asset('uploads/product_photos') }}/{{ App\Models\Product_photo::where('product_id', $product->product->id)->first()->product_photo }}"
                                                    class="img-fluid rounded-top" alt="">
                                                <h5>Color: {{ $product->color->color_name }}</h5>
                                                <h5>Size: {{ $product->size->size_name }}</h5>
                                            </div>
                                            @if (App\Models\Review::where('invoice_details_id', $product->id)->exists())
                                                <div class="alert alert-success text-center">
                                                    <h5>Already Given Review!</h5>
                                                </div>
                                            @else
                                                <div style="flex" class="card-body">
                                                    <div class="col-12">
                                                        <select class="form-select text-center" name="rating"
                                                            id="">
                                                            <option value="1">1 star</option>
                                                            <option value="2">2 stars</option>
                                                            <option value="3">3 stars</option>
                                                            <option value="4">4 stars</option>
                                                            <option value="5">5 stars</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-12 mt-2">
                                                        <input class="form-control text-center" type="text"
                                                            name="review" placeholder="Give your experience">
                                                    </div>
                                                </div>
                                                <button class="btn bg-primary text-white mt-3">Give Review</button>
                                            @endif

                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    <!-- Client Section End -->
@endsection
