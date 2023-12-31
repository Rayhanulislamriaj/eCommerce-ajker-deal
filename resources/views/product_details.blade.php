@extends('layouts.frontend_master')
@section('content')
    <!-- Breadcrumb Section Start -->
    <section class="breadscrumb-section pt-0">
        <div class="container-fluid-lg">
            <div class="row">
                <div class="col-12">
                    <div class="breadscrumb-contain">
                        <h2>{{ $product->product_name }}</h2>
                        <nav>
                            <ol class="breadcrumb mb-0">
                                <li class="breadcrumb-item">
                                    <a href="{{ url('/') }}">
                                        <i class="fa-solid fa-house"></i>
                                    </a>
                                </li>

                                <li class="breadcrumb-item active">{{ $product->product_name }}</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Product Left Sidebar Start -->
    <section class="product-section">
        <div class="container-fluid-lg">
            <div class="row">
                <div class="col-xxl-9 col-xl-8 col-lg-7 wow fadeInUp">
                    <div class="row g-4">
                        <div class="col-xl-6 wow fadeInUp">
                            <div class="product-left-box">
                                <div class="row g-2">
                                    <div class="col-xxl-10 col-lg-12 col-md-10 order-xxl-2 order-lg-1 order-md-2">
                                        <div class="product-main-2 no-arrow">
                                            @foreach ($product_photos as $product_photo)
                                                <div>
                                                    <div class="slider-image">
                                                        <img src="{{ asset('uploads/product_photos') }}/{{ $product_photo->product_photo }}"
                                                            id="img-1"
                                                            data-zoom-image="{{ asset('theme_assets') }}/images/product/category/1.jpg"
                                                            class="img-fluid image_zoom_cls-0 blur-up lazyload"
                                                            alt="">
                                                    </div>
                                                </div>
                                            @endforeach


                                        </div>
                                    </div>

                                    <div class="col-xxl-2 col-lg-12 col-md-2 order-xxl-1 order-lg-2 order-md-1">
                                        <div class="left-slider-image-2 left-slider no-arrow slick-top">
                                            @foreach ($product_photos as $product_photo)
                                                <div>
                                                    <div class="sidebar-image">
                                                        <img src="{{ asset('uploads/product_photos') }}/{{ $product_photo->product_photo }}"
                                                            class="img-fluid blur-up lazyload" alt="">
                                                    </div>
                                                </div>
                                            @endforeach


                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-6 wow fadeInUp" data-wow-delay="0.1s">
                            <div class="right-box-contain">
                                <h6 class="offer-top">30% Off</h6>
                                <h2 class="name">{{ $product->product_name }}</h2>
                                <div class="price-rating">
                                    <h3 id="price_quantity_holder">From {{ lowest_product_price($product->id) }} Tk</h3>
                                    <div class="product-rating custom-rate">
                                        <ul class="rating">
                                            @for ($i = 1; $i <= round(reviews($product->id)->average('rating')); $i++)
                                                <li>
                                                    <i data-feather="star" class="fill"></i>
                                                </li>
                                            @endfor
                                            @for ($i = 1; $i <= 5 - round(reviews($product->id)->average('rating')); $i++)
                                                <li>
                                                    <i data-feather="star"></i>
                                                </li>
                                            @endfor

                                        </ul>
                                        <span class="review">{{ reviews($product->id)->count() }} Reviews</span>
                                    </div>
                                </div>

                                <div class="procuct-contain">
                                    <p>
                                        {{ $product->product_short_details }}
                                    </p>
                                </div>

                                <div class="product-packege ">
                                    <div class="product-title">
                                        <h4>Color</h4>
                                    </div>
                                    <select name="" class="form-control" id="color_dropdown">
                                        <option value="">--Select One Color--</option>
                                        @foreach ($available_colors as $available_color)
                                            <option value="{{ $available_color->color_id }}">
                                                {{ App\Models\Color::find($available_color->color_id)->color_name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <div class="product-title">
                                        <h4>Size</h4>
                                    </div>
                                    <select name="" class="form-control" id="size_dropdown">
                                        <option value="">--Choose Color First--</option>
                                    </select>
                                </div>
                                <div class="note-box product-packege">
                                    <div class="cart_qty qty-box product-qty">
                                        <div class="input-group">
                                            <button type="button" class="qty-left-minus" data-type="minus" data-field="">
                                                <i class="fa fa-minus" aria-hidden="true"></i>
                                            </button>
                                            <input id="user_input" class="form-control input-number qty-input"
                                                type="text" name="quantity" value="1">
                                            <button type="button" class="qty-right-plus" data-type="plus" data-field="">
                                                <i class="fa fa-plus" aria-hidden="true"></i>
                                        </div>
                                    </div>
                                    @auth
                                        <button class="d-none btn btn-md bg-dark cart-button text-white w-100"
                                            id="add_to_cart_btn">Add To
                                            Cart</button>
                                        <span class="d-none" id="stock"></span>
                                    @else
                                        <button onclick="location.href = '{{ route('login') }}'"
                                            class="btn btn-md bg-dark cart-button text-white w-100" id="add_to_cart_btn">Please
                                            Login First</button>
                                    @endauth
                                </div>

                                <div class="buy-box">
                                    <a href="wishlist.html">
                                        <i data-feather="heart"></i>
                                        <span>Add To Wishlist</span>
                                    </a>
                                </div>

                                <div class="pickup-box">
                                    <div class="product-title">
                                        <h4>Store Information</h4>
                                    </div>



                                    <div class="product-info">
                                        <ul class="product-info-list product-info-list-2">
                                            <li>Category :
                                                <a href="">{{ $product->relationtocategory->category_name }}</a>
                                            </li>

                                        </ul>
                                    </div>
                                </div>

                                <div class="paymnet-option">
                                    <div class="product-title">
                                        <h4>Guaranteed Safe Checkout</h4>
                                    </div>
                                    <ul>
                                        <li>
                                            <a href="javascript:void(0)">
                                                <img src="{{ asset('theme_assets') }}/images/product/payment/1.svg"
                                                    class="blur-up lazyload" alt="">
                                            </a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0)">
                                                <img src="{{ asset('theme_assets') }}/images/product/payment/2.svg"
                                                    class="blur-up lazyload" alt="">
                                            </a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0)">
                                                <img src="{{ asset('theme_assets') }}/images/product/payment/3.svg"
                                                    class="blur-up lazyload" alt="">
                                            </a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0)">
                                                <img src="{{ asset('theme_assets') }}/images/product/payment/4.svg"
                                                    class="blur-up lazyload" alt="">
                                            </a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0)">
                                                <img src="{{ asset('theme_assets') }}/images/product/payment/5.svg"
                                                    class="blur-up lazyload" alt="">
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="product-section-box">
                                <ul class="nav nav-tabs custom-nav" id="myTab" role="tablist">
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link active" id="description-tab" data-bs-toggle="tab"
                                            data-bs-target="#description" type="button" role="tab"
                                            aria-controls="description" aria-selected="true">Description</button>
                                    </li>

                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link" id="info-tab" data-bs-toggle="tab"
                                            data-bs-target="#info" type="button" role="tab" aria-controls="info"
                                            aria-selected="false">Additional info</button>
                                    </li>

                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link" id="care-tab" data-bs-toggle="tab"
                                            data-bs-target="#care" type="button" role="tab" aria-controls="care"
                                            aria-selected="false">Care Instuctions</button>
                                    </li>

                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link" id="review-tab" data-bs-toggle="tab"
                                            data-bs-target="#review" type="button" role="tab"
                                            aria-controls="review" aria-selected="false">Review</button>
                                    </li>
                                </ul>

                                <div class="tab-content custom-tab" id="myTabContent">
                                    <div class="tab-pane fade show active" id="description" role="tabpanel"
                                        aria-labelledby="description-tab">
                                        <div class="product-description">
                                            {{ $product->product_long_details }}
                                        </div>
                                    </div>

                                    <div class="tab-pane fade" id="info" role="tabpanel"
                                        aria-labelledby="info-tab">
                                        {{ $product->product_additional_info }}
                                    </div>

                                    <div class="tab-pane fade" id="care" role="tabpanel"
                                        aria-labelledby="care-tab">
                                        <div class="information-box">
                                            {{ $product->product_care_instructions }}
                                        </div>
                                    </div>

                                    <div class="tab-pane fade" id="review" role="tabpanel"
                                        aria-labelledby="review-tab">
                                        <div class="review-box">
                                            <div class="row g-4">
                                                <div class="col-xl-6">
                                                    <div class="review-title">
                                                        <h4 class="fw-500">Customer reviews</h4>
                                                    </div>

                                                    <div class="d-flex">
                                                        <div class="product-rating">
                                                            <ul class="rating">
                                                                @for ($i = 1; $i <= round(reviews($product->id)->average('rating')); $i++)
                                                                    <li>
                                                                        <i data-feather="star" class="fill"></i>
                                                                    </li>
                                                                @endfor
                                                                @for ($i = 1; $i <= 5 - round(reviews($product->id)->average('rating')); $i++)
                                                                    <li>
                                                                        <i data-feather="star"></i>
                                                                    </li>
                                                                @endfor

                                                            </ul>
                                                        </div>
                                                        <h6 class="ms-3">{{ reviews($product->id)->average('rating') }}
                                                            Out Of 5</h6>
                                                    </div>

                                                    <div class="rating-box">
                                                        <ul>
                                                            <li>
                                                                <div class="rating-list">
                                                                    <h5>5 Star</h5>
                                                                    <div class="progress">
                                                                        <div class="progress-bar" role="progressbar"
                                                                            style="width: {{ App\Models\Review::where('rating', ['rating' => 5])->count() }}%"
                                                                            aria-valuenow="100" aria-valuemin="0"
                                                                            aria-valuemax="100">
                                                                            {{ App\Models\Review::where('rating', ['rating' => 5])->count() }}%
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </li>

                                                            <li>
                                                                <div class="rating-list">
                                                                    <h5>4 Star</h5>
                                                                    <div class="progress">
                                                                        <div class="progress-bar" role="progressbar"
                                                                            style="width: {{ App\Models\Review::where('rating', ['rating' => 4])->count() }}%"
                                                                            aria-valuenow="100" aria-valuemin="0"
                                                                            aria-valuemax="100">
                                                                            {{ App\Models\Review::where('rating', ['rating' => 4])->count() }}
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </li>

                                                            <li>
                                                                <div class="rating-list">
                                                                    <h5>3 Star</h5>
                                                                    <div class="progress">
                                                                        <div class="progress-bar" role="progressbar"
                                                                            style="width: {{ App\Models\Review::where('rating', ['rating' => 3])->count() }}%"
                                                                            aria-valuenow="100" aria-valuemin="0"
                                                                            aria-valuemax="100">
                                                                            {{ App\Models\Review::where('rating', ['rating' => 3])->count() }}%
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </li>

                                                            <li>
                                                                <div class="rating-list">
                                                                    <h5>2 Star</h5>
                                                                    <div class="progress">
                                                                        <div class="progress-bar" role="progressbar"
                                                                            style="width: {{ App\Models\Review::where('rating', ['rating' => 2])->count() }}%"
                                                                            aria-valuenow="100" aria-valuemin="0"
                                                                            aria-valuemax="100">
                                                                            {{ App\Models\Review::where('rating', ['rating' => 2])->count() }}%
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </li>

                                                            <li>
                                                                <div class="rating-list">
                                                                    <h5>1 Star</h5>
                                                                    <div class="progress">
                                                                        <div class="progress-bar" role="progressbar"
                                                                            style="width: {{ App\Models\Review::where('rating', ['rating' => 1])->count() }}%"
                                                                            aria-valuenow="100" aria-valuemin="0"
                                                                            aria-valuemax="100">
                                                                            {{ App\Models\Review::where('rating', ['rating' => 1])->count() }}%
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>



                                                <div class="col-12">
                                                    <div class="review-title">
                                                        <h4 class="fw-500">Customer Feedback</h4>
                                                    </div>
                                                    <div class="review-people">
                                                        <ul class="review-list">
                                                            @foreach (reviews($product->id) as $review)
                                                                <li>
                                                                    <div class="people-box">
                                                                        <div>
                                                                            <div class="people-image">
                                                                                <img src="{{ asset('theme_assets') }}/images/review/1.jpg"
                                                                                    class="img-fluid blur-up lazyload"
                                                                                    alt="">
                                                                            </div>
                                                                        </div>

                                                                        <div class="people-comment">
                                                                            <a class="name"
                                                                                href="javascript:void(0)">{{ $review->user->name }}</a>
                                                                            <div class="date-time">
                                                                                <h6 class="text-content">
                                                                                    {{ $review->created_at->format('d M, Y') }}
                                                                                    at
                                                                                    {{ $review->created_at->format('h.m A') }}
                                                                                </h6>

                                                                                <div class="product-rating">
                                                                                    <ul class="rating">
                                                                                        @for ($i = 1; $i <= $review->rating; $i++)
                                                                                            <li>
                                                                                                <i data-feather="star"
                                                                                                    class="fill"></i>
                                                                                            </li>
                                                                                        @endfor
                                                                                        @for ($i = 1; $i <= 5 - $review->rating; $i++)
                                                                                            <li>
                                                                                                <i data-feather="star"></i>
                                                                                            </li>
                                                                                        @endfor
                                                                                    </ul>
                                                                                </div>
                                                                            </div>
                                                                            <div class="reply">
                                                                                <p>{{ $review->review }}<a
                                                                                        href="javascript:void(0)">Reply</a>
                                                                                </p>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                            @endforeach
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xxl-3 col-xl-4 col-lg-5 d-none d-lg-block wow fadeInUp">
                    <div class="right-sidebar-box">
                        <div class="vendor-box">
                            <div class="verndor-contain">
                                <div class="vendor-image">
                                    <img src="{{ asset('uploads/profile_photos') }}/{{ $vendor->profile_photo }}"
                                        class="blur-up lazyload" alt="">
                                </div>

                                <div class="vendor-name">
                                    <h5 class="fw-500">{{ $vendor->name }}</h5>

                                    <div class="product-rating mt-1">
                                        <ul class="rating">
                                            <li>
                                                <i data-feather="star" class="fill"></i>
                                            </li>
                                            <li>
                                                <i data-feather="star" class="fill"></i>
                                            </li>
                                            <li>
                                                <i data-feather="star" class="fill"></i>
                                            </li>
                                            <li>
                                                <i data-feather="star" class="fill"></i>
                                            </li>
                                            <li>
                                                <i data-feather="star"></i>
                                            </li>
                                        </ul>
                                        <span>(36 Reviews)</span>
                                    </div>

                                </div>
                            </div>

                            <div class="vendor-list">
                                <h5>Email Address: <span class="text-content">{{ $vendor->email }}</span></h5>
                            </div>
                        </div>

                        <!-- Trending Product -->
                        <div class="pt-25">
                            <div class="category-menu">
                                <h3>Trending Products</h3>

                                <ul class="product-list product-right-sidebar border-0 p-0">
                                    <li>
                                        <div class="offer-product">
                                            <a href="product-left-thumbnail.html" class="offer-image">
                                                <img src="{{ asset('theme_assets') }}/images/vegetable/product/23.png"
                                                    class="img-fluid blur-up lazyload" alt="">
                                            </a>

                                            <div class="offer-detail">
                                                <div>
                                                    <a href="product-left-thumbnail.html">
                                                        <h6 class="name">Meatigo Premium Goat Curry</h6>
                                                    </a>
                                                    <span>450 G</span>
                                                    <h6 class="price theme-color">$ 70.00</h6>
                                                </div>
                                            </div>
                                        </div>
                                    </li>

                                    <li>
                                        <div class="offer-product">
                                            <a href="product-left-thumbnail.html" class="offer-image">
                                                <img src="{{ asset('theme_assets') }}/images/vegetable/product/24.png"
                                                    class="blur-up lazyload" alt="">
                                            </a>

                                            <div class="offer-detail">
                                                <div>
                                                    <a href="product-left-thumbnail.html">
                                                        <h6 class="name">Dates Medjoul Premium Imported</h6>
                                                    </a>
                                                    <span>450 G</span>
                                                    <h6 class="price theme-color">$ 40.00</h6>
                                                </div>
                                            </div>
                                        </div>
                                    </li>

                                    <li>
                                        <div class="offer-product">
                                            <a href="product-left-thumbnail.html" class="offer-image">
                                                <img src="{{ asset('theme_assets') }}/images/vegetable/product/25.png"
                                                    class="blur-up lazyload" alt="">
                                            </a>

                                            <div class="offer-detail">
                                                <div>
                                                    <a href="product-left-thumbnail.html">
                                                        <h6 class="name">Good Life Walnut Kernels</h6>
                                                    </a>
                                                    <span>200 G</span>
                                                    <h6 class="price theme-color">$ 52.00</h6>
                                                </div>
                                            </div>
                                        </div>
                                    </li>

                                    <li class="mb-0">
                                        <div class="offer-product">
                                            <a href="product-left-thumbnail.html" class="offer-image">
                                                <img src="{{ asset('theme_assets') }}/images/vegetable/product/26.png"
                                                    class="blur-up lazyload" alt="">
                                            </a>

                                            <div class="offer-detail">
                                                <div>
                                                    <a href="product-left-thumbnail.html">
                                                        <h6 class="name">Apple Red Premium Imported</h6>
                                                    </a>
                                                    <span>1 KG</span>
                                                    <h6 class="price theme-color">$ 80.00</h6>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <!-- Banner Section -->
                        <div class="ratio_156 pt-25">
                            <div class="home-contain">
                                <img src="{{ asset('theme_assets') }}/images/vegetable/banner/8.jpg"
                                    class="bg-img blur-up lazyload" alt="">
                                <div class="home-detail p-top-left home-p-medium">
                                    <div>
                                        <h6 class="text-yellow home-banner">Seafood</h6>
                                        <h3 class="text-uppercase fw-normal"><span
                                                class="theme-color fw-bold">Freshes</span> Products</h3>
                                        <h3 class="fw-light">every hour</h3>
                                        <button onclick="location.href = 'shop-left-sidebar.html';"
                                            class="btn btn-animation btn-md fw-bold mend-auto">Shop Now <i
                                                class="fa-solid fa-arrow-right icon"></i></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Product Left Sidebar End -->

    <!-- Releted Product Section Start -->
    <section class="product-list-section section-b-space">
        <div class="container-fluid-lg">
            <div class="title">
                <h2>Related Products</h2>
                <span class="title-leaf">
                    <svg class="icon-width">
                        <use xlink:href="{{ asset('theme_assets') }}/svg/leaf.svg#leaf"></use>
                    </svg>
                </span>
            </div>
            <div class="row">
                @php
                    $products = App\Models\Product::all();
                @endphp
                @forelse($related_products as $related_product)
                    <div class="col-3 px-0">
                        <div class="product-box" style="border-right: 0px">
                            <div class="product-image">
                                <a href="{{ route('product.details', $related_product->id) }}">
                                    <img src="{{ asset('uploads/product_photos') }}/{{ App\Models\Product_photo::where('product_id', $related_product->id)->get()->random()->product_photo }}"
                                        class="img-fluid blur-up lazyload" alt="">
                                </a>
                                <ul class="product-option">
                                    <li data-bs-toggle="tooltip" data-bs-placement="top" title="View">
                                        <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#view">
                                            <i data-feather="eye"></i>
                                        </a>
                                    </li>

                                    <li data-bs-toggle="tooltip" data-bs-placement="top" title="Compare">
                                        <a href="compare.html">
                                            <i data-feather="refresh-cw"></i>
                                        </a>
                                    </li>

                                    <li data-bs-toggle="tooltip" data-bs-placement="top" title="Wishlist">
                                        <a href="wishlist.html" class="notifi-wishlist">
                                            <i data-feather="heart"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="product-detail text-center">
                                <a href="{{ route('product.details', $related_product->id) }}">
                                    <h6 class="name">{{ $related_product->product_name }}</h6>
                                </a>

                                <h5 class="sold text-content">
                                    <span class="theme-color price">From
                                        {{ lowest_product_price($related_product->id) }} tk</span>
                                </h5>

                                <div class="mt-sm-2 mt-1">
                                    <ul class="rating">
                                        @for ($i = 1; $i <= round(reviews($related_product->id)->average('rating')); $i++)
                                            <li>
                                                <i data-feather="star" class="fill"></i>
                                            </li>
                                        @endfor
                                        @for ($i = 1; $i <= 5 - round(reviews($related_product->id)->average('rating')); $i++)
                                            <li>
                                                <i data-feather="star"></i>
                                            </li>
                                        @endfor
                                    </ul>
                                    @if (stock_checker($related_product->id))
                                        <h6 class="theme-color">In Stock</h6>
                                    @else
                                        <h6 class="text-danger">Stock Out</h6>
                                    @endif
                                </div>

                                <div class="add-to-cart-box">
                                    <a href="{{ route('product.details', $related_product->id) }}"
                                        class="btn btn-add-cart">Details</a>

                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <h3 class="text-warning">Nothing to show.</h3>
                @endforelse
            </div>
        </div>
    </section>
    <!-- Releted Product Section End -->
@endsection

@section('footer_scripts')
    <script>
        $(document).ready(function() {
            $('#color_dropdown').change(function() {
                var product_id = "{{ $product->id }}";
                var color_id = $(this).val();
                var size_id = $(this).val();
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                //Ajax code start
                $.ajax({
                    type: 'POST',
                    url: '/get/size/lists',
                    data: {
                        product_id: product_id,
                        color_id: color_id
                    },
                    success: function(data) {
                        $('#add_to_cart_btn').addClass('d-none');
                        $('#size_dropdown').html(data);
                        $('#price_quantity_holder').html('from 100 tk');
                    }
                });
                //Ajax code end
            });

            $('#size_dropdown').change(function() {
                var product_id = "{{ $product->id }}";
                var color_id = $('#color_dropdown').val();
                var size_id = $(this).val();
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                //Ajax code start
                $.ajax({
                    type: 'POST',
                    url: '/get/price/quantity',
                    data: {
                        product_id: product_id,
                        color_id: color_id,
                        size_id: size_id
                    },
                    success: function(data) {
                        if (data.split('#')[0] == 0) {
                            $('#add_to_cart_btn').addClass('d-none');
                            $('#price_quantity_holder').addClass('text-danger price');
                            $('#price_quantity_holder').removeClass('text-success price');
                            $('#price_quantity_holder').html('Stock Out!');
                        } else {
                            $('#add_to_cart_btn').removeClass('d-none');
                            $('#price_quantity_holder').addClass('text-success price');
                            $('#price_quantity_holder').removeClass('text-danger price');
                            $('#price_quantity_holder').html('price: ' + data.split('#')[1] +
                                ' Stock: ' + data.split('#')[0]);
                            $('#stock').html(data.split('#')[0]);
                        }
                    }
                });
                //Ajax code end
            });
            $('#add_to_cart_btn').click(function() {
                var user_input = $('#user_input').val();
                var stock = $('#stock').html();
                if (parseInt(user_input) > parseInt(stock)) {
                    Swal.fire(
                        'Warning!',
                        'You can not add more stock we have!',
                        'warning'
                    )
                } else {
                    var color_id = $('#color_dropdown').val();
                    var size_id = $('#size_dropdown').val();
                    var user_input = user_input;
                    var product_id = "{{ $product->id }}";
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    //Ajax code start
                    $.ajax({
                        type: 'POST',
                        url: '/add/to/cart',
                        data: {
                            product_id: product_id,
                            color_id: color_id,
                            size_id: size_id,
                            user_input: user_input
                        },
                        success: function(data) {
                            alert(data);
                            // $('#add_to_cart_btn').addClass('d-none');
                            // $('#size_dropdown').html(data);
                            // $('#price_quantity_holder').html('from 100 tk');
                        }
                    });
                    //Ajax code end
                }
            });
        });
    </script>
@endsection
