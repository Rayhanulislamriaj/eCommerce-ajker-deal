@extends('layouts.frontend_master')
@section('content')
    <!-- Breadcrumb Section Start -->
    <section class="breadscrumb-section pt-0">
        <div class="container-fluid-lg">
            <div class="row">
                <div class="col-12">
                    <div class="breadscrumb-contain">
                        <h2>Checkout</h2>
                        <nav>
                            <ol class="breadcrumb mb-0">
                                <li class="breadcrumb-item">
                                    <a href="index.html">
                                        <i class="fa-solid fa-house"></i>
                                    </a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">Checkout</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Checkout section Start -->
    <section class="checkout-section-2 section-b-space">
        <div class="container-fluid-lg">
            <form action="{{ route('final.checkout') }}" method="POST">
                @csrf
                <div class="row g-sm-4 g-3">
                    <div class="col-lg-8">
                        <div class="left-sidebar-checkout">
                            <div class="checkout-detail-box">
                                <ul>
                                    <li>
                                        <div class="checkout-icon">
                                            <lord-icon target=".nav-item" src="https://cdn.lordicon.com/ggihhudh.json"
                                                trigger="loop-on-hover"
                                                colors="primary:#121331,secondary:#646e78,tertiary:#0baf9a"
                                                class="lord-icon">
                                            </lord-icon>
                                        </div>
                                        <div class="checkout-box">
                                            <div class="checkout-title">
                                                <h4>Delivery Address</h4>
                                            </div>

                                            <div class="checkout-detail">
                                                <div class="row g-4">
                                                    @foreach ($addresses as $address)
                                                        <div class="col-xxl-6 col-lg-12 col-md-6">
                                                            <div class="delivery-address-box">
                                                                <div>
                                                                    <div class="form-check">
                                                                        <input class="form-check-input" type="radio"
                                                                            value="{{ $address->id }}" name="address_id"
                                                                            {{ $loop->first ? 'checked' : '' }}>
                                                                    </div>

                                                                    <div class="label">
                                                                        <label>{{ $address->tag }}</label>
                                                                    </div>

                                                                    <ul class="delivery-address-detail">
                                                                        <li>
                                                                            <h4 class="fw-500">{{ $address->name }}</h4>
                                                                        </li>

                                                                        <li>
                                                                            <p class="text-content"><span
                                                                                    class="text-title">Address
                                                                                    : </span>
                                                                                {{ $address->house }},
                                                                                {{ $address->road }},
                                                                                {{ $address->city }},
                                                                                {{ $address->country }}
                                                                            </p>
                                                                        </li>

                                                                        <li>
                                                                            <h6 class="text-content"><span
                                                                                    class="text-title">Zip
                                                                                    Code
                                                                                    :</span>
                                                                                {{ $address->post_office }}-
                                                                                {{ $address->post_code }}
                                                                            </h6>
                                                                        </li>

                                                                        <li>
                                                                            <h6 class="text-content mb-0"><span
                                                                                    class="text-title">Phone
                                                                                    :</span> {{ $address->phone }}</h6>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                    <div class="col-12 text-center">
                                                        <div
                                                            class="card br-secondary text-white btn-sm fw-bold mt-lg-0 mt-3">
                                                            <a data-bs-target="#exampleModal"
                                                                href="{{ url('dashboard') }}">
                                                                Add new address
                                                            </a>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>

                                    <li>
                                        <div class="checkout-icon">
                                            <lord-icon target=".nav-item" src="https://cdn.lordicon.com/oaflahpk.json"
                                                trigger="loop-on-hover" colors="primary:#0baf9a" class="lord-icon">
                                            </lord-icon>
                                        </div>
                                        <div class="checkout-box">
                                            <div class="checkout-title">
                                                <h4>Delivery Option</h4>
                                            </div>


                                            <div class="checkout-detail">
                                                <div class="row g-4">
                                                    @foreach ($deliveries as $delivery)
                                                        <div class="col-xxl-6">
                                                            <div class="delivery-option">
                                                                <div class="delivery-category">
                                                                    <div class="shipment-detail">
                                                                        <div
                                                                            class="form-check custom-form-check hide-check-box">
                                                                            <input class="form-check-input delivery_choose"
                                                                                type="radio" name="delivery_cost"
                                                                                value="{{ $delivery->cost }}"
                                                                                {{ $loop->first ? 'checked' : '' }}>
                                                                            <label class="form-check-label" for="standard"
                                                                                {{ $loop->first ? 'checked' : '' }}>
                                                                                {{ $delivery->details }}
                                                                                ({{ $delivery->cost }})
                                                                            </label>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endforeach



                                                    <div class="col-12 future-box">
                                                        <div class="future-option">
                                                            <div class="row g-md-0 gy-4">
                                                                <div class="col-md-6">
                                                                    <div class="delivery-items">
                                                                        <div>
                                                                            <h5 class="items text-content"><span>3
                                                                                    Items</span>@
                                                                                $693.48</h5>
                                                                            <h5 class="charge text-content">Delivery Charge
                                                                                $34.67
                                                                                <button type="button" class="btn p-0"
                                                                                    data-bs-toggle="tooltip"
                                                                                    data-bs-placement="top"
                                                                                    title="Extra Charge">
                                                                                    <i
                                                                                        class="fa-solid fa-circle-exclamation"></i>
                                                                                </button>
                                                                            </h5>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="col-md-6">
                                                                    <form
                                                                        class="form-floating theme-form-floating date-box">
                                                                        <input type="date" class="form-control">
                                                                        <label>Select Date</label>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>


                                        </div>
                                    </li>

                                    <li>
                                        <div class="checkout-icon">
                                            <lord-icon target=".nav-item" src="https://cdn.lordicon.com/qmcsqnle.json"
                                                trigger="loop-on-hover" colors="primary:#0baf9a,secondary:#0baf9a"
                                                class="lord-icon">
                                            </lord-icon>
                                        </div>
                                        <div class="checkout-box">
                                            <div class="checkout-title">
                                                <h4>Payment Option</h4>
                                            </div>

                                            <div class="checkout-detail">
                                                <div class="accordion accordion-flush custom-accordion"
                                                    id="accordionFlushExample">
                                                    <div class="accordion-item">
                                                        <div class="accordion-header" id="flush-headingFour">
                                                            <div class="accordion-button collapsed"
                                                                data-bs-toggle="collapse"
                                                                data-bs-target="#flush-collapseFour">
                                                                <div class="custom-form-check form-check mb-0">
                                                                    <label class="form-check-label" for="cash">
                                                                        <input class="form-check-input mt-0"
                                                                            type="radio" name="payment_option"
                                                                            value="cod" id="cash" checked>
                                                                        Cash
                                                                        On Delivery</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div id="flush-collapseFour"
                                                            class="accordion-collapse collapse show"
                                                            data-bs-parent="#accordionFlushExample">
                                                            <div class="accordion-body">
                                                                <p class="cod-review">Pay after you get the products. Cash
                                                                    can
                                                                    be accepted in this
                                                                    areas. <a href="javascript:void(0)">Know more.</a>
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="accordion-item">
                                                        <div class="accordion-header" id="flush-headingFour">
                                                            <div class="accordion-button collapsed"
                                                                data-bs-toggle="collapse"
                                                                data-bs-target="#flush-collapseFour">
                                                                <div class="custom-form-check form-check mb-0">
                                                                    <label class="form-check-label" for="online">
                                                                        <input class="form-check-input mt-0"
                                                                            type="radio" name="payment_option"
                                                                            value="online" id="online">
                                                                        Online Payment System</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div id="flush-collapseFour" class="accordion-collapse collapse"
                                                            data-bs-parent="#accordionFlushExample">
                                                            <div class="accordion-body">
                                                                <p class="cod-review">Pay digitally with Visa & Master
                                                                    Card.
                                                                    You can also payment with Mobile Banhking like Bkash,
                                                                    Nagod,
                                                                    Upay, Roket etc. <a href="javascript:void(0)">Know
                                                                        more.</a>
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="right-side-summery-box">
                            <div class="summery-box-2">
                                <div class="summery-header">
                                    <h3>Order Summery</h3>
                                </div>

                                <ul class="summery-total">
                                    <li>
                                        <h4>Subtotal</h4>
                                        <h4 class="price">{{ session('S_sub_total') }}</h4>
                                    </li>

                                    <li>
                                        <h4>Coupon Discount</h4>
                                        <h4 class="price">{{ session('S_coupon_discount') }}%</h4>
                                    </li>

                                    <li>
                                        <h4>Discount Amount</h4>
                                        <h4 class="price">(-){{ session('S_discount_amount') }}</h4>
                                    </li>
                                    <li>
                                        <h4>Delivery Charge</h4>
                                        <h4 class="price">(+)
                                            <span class="delivery_charge">
                                                {{ $delivery->first()->cost }}
                                            </span>
                                        </h4>
                                    </li>

                                    <li>
                                        <h4>Coupon/Code</h4>
                                        <h4 class="price">
                                            @if (session('S_coupon_name'))
                                                {{ session('S_coupon_name') }}
                                            @else
                                                N/A
                                            @endif
                                        </h4>
                                    </li>


                                    <li class="list-total">
                                        <h4>Total (BDT)</h4>
                                        <p class="d-none total_amount">{{ session('S_total') }}</p>
                                        <h4 class="price final_total_amount">
                                            {{ session('S_total') + $delivery->first()->cost }}</h4>
                                    </li>
                                </ul>
                            </div>
                            <button type="submit" class="btn theme-bg-color text-white btn-md w-100 mt-4 fw-bold">Place
                                Order</button>
            </form>
        </div>
        </div>
        </div>
        </form>
        </div>
    </section>
    <!-- Checkout section End -->
@endsection

@section('footer_scripts')
    <script>
        $(document).ready(function() {
            $('.delivery_choose').click(function() {
                $('.delivery_charge').html($(this).val());
                var delivery_charge = parseInt($(this).val());
                var total_amount = parseInt($('.total_amount').html());
                $('.final_total_amount').html(delivery_charge + total_amount);
            });
        })
    </script>
@endsection
