@extends('layouts.frontend_master')
@section('content')
    <!-- Breadcrumb Section Start -->
    <section class="breadscrumb-section pt-0">
        <div class="container-fluid-lg">
            <div class="row">
                <div class="col-12">
                    <div class="breadscrumb-contain">
                        <h2>Cart</h2>
                        <nav>
                            <ol class="breadcrumb mb-0">
                                <li class="breadcrumb-item">
                                    <a href="index.html">
                                        <i class="fa-solid fa-house"></i>
                                    </a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">Cart</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Cart Section Start -->
    <section class="cart-section section-b-space">
        <div class="container-fluid-lg">
            <div class="row g-sm-5 g-3">
                <div class="col-xxl-9">
                    <div class="cart-table">
                        <div class="table-responsive-xl">
                            @if (session('success'))
                                <div class="alert alert-success">
                                    {{ session('success') }}
                                </div>
                            @endif
                            <form action="{{ route('cart.update') }}" method="POST">
                                @csrf
                                <table class="table">
                                    <tbody>
                                        @php
                                            $flag = false;
                                            $sub_total = 0;
                                        @endphp
                                        @forelse ($carts as $cart)
                                            <tr class="product-box-contain">
                                                <td class="product-detail">
                                                    <div class="product border-0">
                                                        <a href="product-left-thumbnail.html" class="product-image">
                                                            <img src="{{ asset('uploads/product_photos') }}/{{ App\Models\Product_photo::where('product_id', $cart->relationtoproduct->id)->first()->product_photo }}"
                                                                class="img-fluid blur-up lazyload" alt="Not Found">
                                                        </a>
                                                        <div class="product-detail">
                                                            <ul>
                                                                <li class="name">
                                                                    <a
                                                                        href="{{ route('product.details', $cart->relationtoproduct->id) }}">{{ $cart->relationtoproduct->product_name }}
                                                                    </a>
                                                                </li>

                                                                <li class="text-content"><span class="text-title">Sold
                                                                        By:</span> {{ $cart->relationtouser->name }}</li>

                                                                <li class="text-content">
                                                                    <span class="text-title">Size: </span>
                                                                    {{ $cart->relationtosize->size_name }}
                                                                </li>

                                                                <li>
                                                                    <h5 class="text-content d-inline-block">Price :</h5>
                                                                    <span>$35.10</span>
                                                                    <span class="text-content">$45.68</span>
                                                                </li>

                                                                <li>
                                                                    <h5 class="saving theme-color">Saving : $20.68</h5>
                                                                </li>

                                                                <li class="quantity-price-box">
                                                                    <div class="cart_qty">
                                                                        <div class="input-group">
                                                                            <button type="button"
                                                                                class="btn qty-left-minus" data-type="minus"
                                                                                data-field="">
                                                                                <i class="fa fa-minus ms-0"
                                                                                    aria-hidden="true"></i>
                                                                            </button>
                                                                            <input
                                                                                class="form-control input-number qty-input"
                                                                                type="text" name=""
                                                                                value="0">
                                                                            <button type="button"
                                                                                class="btn qty-right-plus" data-type="plus"
                                                                                data-field="">
                                                                                <i class="fa fa-plus ms-0"
                                                                                    aria-hidden="true"></i>
                                                                            </button>
                                                                        </div>
                                                                    </div>
                                                                </li>

                                                                <li>
                                                                    <h5>Total: $35.10</h5>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </td>

                                                <td class="price">
                                                    @php
                                                        $inventory = App\Models\Inventory::where([
                                                            'product_id' => $cart->product_id,
                                                            'color_id' => $cart->color_id,
                                                            'size_id' => $cart->size_id,
                                                        ])->first();
                                                    @endphp
                                                    <h4 class="table-title text-content">Price</h4>
                                                    <h5>
                                                        @if ($inventory->regular_price != $inventory->product_price)
                                                            <del> {{ $inventory->regular_price }} </del>
                                                            &nbsp;
                                                        @endif
                                                        {{ $product_price = $inventory->product_price }}
                                                    </h5>
                                                    <span class="badge bg-warning">Stock :
                                                        {{ $inventory->product_quantity }}</span>
                                                    <h6 class="theme-color">Color :
                                                        {{ $cart->relationtocolor->color_name }}
                                                    </h6>
                                                </td>

                                                <td class="quantity">
                                                    <h4 class="table-title text-content">
                                                        Qty
                                                        @if ($inventory->product_quantity < $cart->user_input)
                                                            @php
                                                                $flag = true;
                                                            @endphp
                                                            <span class="badge bg-danger">Sold Out</span>
                                                        @endif
                                                    </h4>
                                                    <div class="quantity-price">
                                                        <div class="cart_qty">
                                                            <div class="input-group">
                                                                <button type="button" class="btn qty-left-minus"
                                                                    data-type="minus" data-field="">
                                                                    <i class="fa fa-minus ms-0" aria-hidden="true"></i>
                                                                </button>
                                                                <input class="form-control input-number qty-input"
                                                                    type="text" name="quantity[{{ $cart->id }}]"
                                                                    value="{{ $cart->user_input }}">
                                                                <button type="button" class="btn qty-right-plus"
                                                                    data-type="plus" data-field="">
                                                                    <i class="fa fa-plus ms-0" aria-hidden="true"></i>
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>

                                                <td class="subtotal">
                                                    <h4 class="table-title text-content">Total</h4>
                                                    <h5>
                                                        {{ $product_price * $cart->user_input }}
                                                        @php
                                                            $sub_total += $product_price * $cart->user_input;
                                                        @endphp
                                                    </h5>
                                                </td>

                                                <td class="save-remove">
                                                    <h4 class="table-title text-content">Action</h4>
                                                    <a class="remove close_button"
                                                        href="{{ route('cart.remove', $cart->id) }}">
                                                        <i class="fa fa-trash"></i>
                                                        Remove
                                                    </a>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td>
                                                    <div class="alert text-center bg-info">
                                                        Your Cart is empty!
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforelse
                                        @if ($carts->count() != 0)
                                            <tr>
                                                <td>
                                                    <a href="{{ url('/') }}"
                                                        class="btn bg-primary btn-dark form-control">
                                                        Continue Shopping..
                                                    </a>
                                                </td>
                                                <td></td>
                                                <td>
                                                    <button type="submit" class="btn bg-info btn-dark form-control">Update
                                                        Cart</button>
                                                </td>
                                                <td></td>
                                                <td>
                                                    <a href="{{ route('cart.clear') }}"
                                                        class="btn bg-danger btn-dark form-control">Clear Cart</a>
                                                </td>
                                            </tr>
                                        @endif
                                    </tbody>
                                </table>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="col-xxl-3">
                    <div class="summery-box p-sticky">
                        <div class="summery-header">
                            <h3>Cart Total</h3>
                        </div>

                        <div class="summery-contain">
                            <div class="coupon-cart">
                                <form action="" method="GET>
                                <h6 class="text-content
                                    mb-2">Coupon Apply</h6>
                                    @if (session('c_error'))
                                        <div class="bg-dark p-1 mb-1 text-center">
                                            <span class="text-danger">{{ session('c_error') }}</span>
                                        </div>
                                    @endif
                                    <div class="mb-3 coupon-box input-group">
                                        <input type="text" class="form-control"
                                            placeholder="Enter Coupon Code Here..." name="coupon_name"
                                            value="{{ $coupon_name }}">
                                        {{ session(['S_coupon_name' => $coupon_name]) }}
                                        <button class="btn-apply">Apply</button>
                                    </div>
                                </form>
                            </div>
                            <ul>
                                <li>
                                    <h4>Subtotal</h4>
                                    <h4 class="price">{{ $sub_total }}</h4>
                                    {{ session(['S_sub_total' => $sub_total]) }}
                                </li>

                                <li>
                                    <h4>Coupon Discount(%)</h4>
                                    <h4 class="price">(-) {{ $coupon_discount }}%</h4>
                                    {{ session(['S_coupon_discount' => $coupon_discount]) }}
                                </li>
                                <li>
                                    <h4>Coupon Discount Amount</h4>
                                    @php
                                        $calculated_discount_amount = floor(($sub_total * $coupon_discount) / 100);
                                    @endphp
                                    <h4 class="price">(-)
                                        @if ($calculated_discount_amount > $highest_discount_amount)
                                            {{ $highest_discount_amount }}
                                            {{ session(['S_discount_amount' => $highest_discount_amount]) }}
                                        @else
                                            {{ $calculated_discount_amount }}
                                            {{ session(['S_discount_amount' => $calculated_discount_amount]) }}
                                        @endif
                                    </h4>

                                </li>

                                {{-- <li class="align-items-start">
                                    <h4>Shipping</h4>
                                    <h4 class="price text-end">$6.90</h4>
                                </li> --}}
                            </ul>
                        </div>

                        <ul class="summery-total">
                            <li class="list-total border-top-0">
                                <h4>Total (BDT)</h4>
                                <h4 class="price theme-color">
                                    @if ($calculated_discount_amount > $highest_discount_amount)
                                        {{ $sub_total - $highest_discount_amount }}
                                        {{ session(['S_total' => $sub_total - $highest_discount_amount]) }}
                                    @else
                                        {{ $sub_total - $calculated_discount_amount }}
                                        {{ session(['S_total' => $sub_total - $calculated_discount_amount]) }}
                                    @endif
                                </h4>
                            </li>
                        </ul>

                        <div class="button-group cart-button">
                            <ul>
                                <li>
                                    @if ($flag)
                                        <div class="alert alert-danger text-center">
                                            Please check your cart for any sold out item!
                                        </div>
                                    @endif
                                    @if ($carts->count() != 0)
                                        <button onclick="location.href = '{{ route('checkout') }}';"
                                            class="btn btn-animation proceed-btn fw-bold @if ($flag) disabled @endif">
                                            Process To Checkout
                                        </button>
                                    @endif


                                </li>

                                <li>
                                    <button onclick="location.href = '/';"
                                        class="btn btn-light shopping-button text-dark">
                                        <i class="fa-solid fa-arrow-left-long"></i>Return To Shopping</button>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Cart Section End -->
@endsection

@section('footer_scripts')
@endsection
