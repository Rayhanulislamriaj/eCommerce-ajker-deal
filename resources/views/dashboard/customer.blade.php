@extends('layouts.frontend_master')
@section('content')
    <!-- Breadcrumb Section Start -->
    <section class="breadscrumb-section pt-0">
        <div class="container-fluid-lg">
            <div class="row">
                <div class="col-12">
                    <div class="breadscrumb-contain">
                        <h2>User Dashboard</h2>
                        <nav>
                            <ol class="breadcrumb mb-0">
                                <li class="breadcrumb-item">
                                    <a href="index.html">
                                        <i class="fa-solid fa-house"></i>
                                    </a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">User Dashboard</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- User Dashboard Section Start -->
    <section class="user-dashboard-section section-b-space">
        <div class="container-fluid-lg">
            <div class="row">
                <div class="col-xxl-3 col-lg-4">
                    <div class="dashboard-left-sidebar">
                        <div class="close-button d-flex d-lg-none">
                            <button class="close-sidebar">
                                <i class="fa-solid fa-xmark"></i>
                            </button>
                        </div>
                        <div class="profile-box">
                            <div class="cover-image">
                                <img src="{{ asset('theme_assets') }}/images/inner-page/cover-img.jpg"
                                    class="img-fluid blur-up lazyload" alt="">
                            </div>

                            <div class="profile-contain">
                                <div class="profile-image">
                                    <div class="position-relative">
                                        <img src="{{ asset('theme_assets') }}/images/inner-page/user/1.jpg"
                                            class="blur-up lazyload update_img" alt="">
                                        <div class="cover-icon">
                                            <i class="fa-solid fa-pen">
                                                <input type="file" onchange="readURL(this,0)">
                                            </i>
                                        </div>
                                    </div>
                                </div>

                                <div class="profile-name">
                                    <h3>{{ auth()->user()->name }}</h3>
                                    <h6 class="text-content">{{ auth()->user()->email }}</h6>
                                </div>
                            </div>
                        </div>

                        <ul class="nav nav-pills user-nav-pills" id="pills-tab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="pills-dashboard-tab" data-bs-toggle="pill"
                                    data-bs-target="#pills-dashboard" type="button" role="tab"
                                    aria-controls="pills-dashboard" aria-selected="true"><i data-feather="home"></i>
                                    DashBoard</button>
                            </li>

                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="pills-order-tab" data-bs-toggle="pill"
                                    data-bs-target="#pills-order" type="button" role="tab" aria-controls="pills-order"
                                    aria-selected="false"><i data-feather="shopping-bag"></i>Order</button>
                            </li>

                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="pills-wishlist-tab" data-bs-toggle="pill"
                                    data-bs-target="#pills-wishlist" type="button" role="tab"
                                    aria-controls="pills-wishlist" aria-selected="false"><i data-feather="heart"></i>
                                    Wishlist</button>
                            </li>

                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="pills-card-tab" data-bs-toggle="pill"
                                    data-bs-target="#pills-card" type="button" role="tab" aria-controls="pills-card"
                                    aria-selected="false"><i data-feather="credit-card"></i> Saved Card</button>
                            </li>

                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="pills-address-tab" data-bs-toggle="pill"
                                    data-bs-target="#pills-address" type="button" role="tab"
                                    aria-controls="pills-address" aria-selected="false"><i data-feather="map-pin"></i>
                                    Address</button>
                            </li>

                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill"
                                    data-bs-target="#pills-profile" type="button" role="tab"
                                    aria-controls="pills-profile" aria-selected="false"><i data-feather="user"></i>
                                    Profile</button>
                            </li>

                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="pills-security-tab" data-bs-toggle="pill"
                                    data-bs-target="#pills-security" type="button" role="tab"
                                    aria-controls="pills-security" aria-selected="false"><i data-feather="shield"></i>
                                    Privacy</button>
                            </li>

                            <li class="nav-item" role="presentation">
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <a class="nav-link" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                            this.closest('form').submit();">
                                        <i data-feather="log-out"></i>
                                        <span>Log Out</span>
                                    </a>
                                </form>
                            </li>


                        </ul>
                    </div>
                </div>

                <div class="col-xxl-9 col-lg-8">
                    <button class="btn left-dashboard-show btn-animation btn-md fw-bold d-block mb-4 d-lg-none">Show
                        Menu</button>
                    <div class="dashboard-right-sidebar">
                        <div class="tab-content" id="pills-tabContent">
                            <div class="tab-pane fade show active" id="pills-dashboard" role="tabpanel"
                                aria-labelledby="pills-dashboard-tab">
                                <div class="dashboard-home">
                                    <div class="title">
                                        <h2>My Dashboard</h2>
                                        <span class="title-leaf">
                                            <svg class="icon-width bg-gray">
                                                <use xlink:href="{{ asset('theme_assets') }}/svg/leaf.svg#leaf"></use>
                                            </svg>
                                        </span>
                                    </div>

                                    <div class="dashboard-user-name">
                                        <h6 class="text-content">Hello, <b
                                                class="text-title">{{ auth()->user()->name }}</b></h6>
                                        <p class="text-content">From your My Account Dashboard you have the ability to
                                            view a snapshot of your recent account activity and update your account
                                            information. Select a link below to view or edit information.</p>
                                    </div>

                                    <div class="total-box">
                                        <div class="row g-sm-4 g-3">
                                            <div class="col-xxl-4 col-lg-6 col-md-4 col-sm-6">
                                                <div class="totle-contain">
                                                    <img src="{{ asset('theme_assets') }}/images/svg/order.svg"
                                                        class="img-1 blur-up lazyload" alt="">
                                                    <img src="{{ asset('theme_assets') }}/images/svg/order.svg"
                                                        class="blur-up lazyload" alt="">
                                                    <div class="totle-detail">
                                                        <h5>Total Invoices</h5>
                                                        <h3>{{ $invoices->count() }}</h3>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-xxl-4 col-lg-6 col-md-4 col-sm-6">
                                                <div class="totle-contain">
                                                    <img src="{{ asset('theme_assets') }}/images/svg/pending.svg"
                                                        class="img-1 blur-up lazyload" alt="">
                                                    <img src="{{ asset('theme_assets') }}/images/svg/pending.svg"
                                                        class="blur-up lazyload" alt="">
                                                    <div class="totle-detail">
                                                        <h5>Total Amount</h5>
                                                        <h3>{{ $invoices->sum('total') }}</h3>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-xxl-4 col-lg-6 col-md-4 col-sm-6">
                                                <div class="totle-contain">
                                                    <img src="{{ asset('theme_assets') }}/images/svg/wishlist.svg"
                                                        class="img-1 blur-up lazyload" alt="">
                                                    <img src="{{ asset('theme_assets') }}/images/svg/wishlist.svg"
                                                        class="blur-up lazyload" alt="">
                                                    <div class="totle-detail">
                                                        <h5>Invoice Unpaid</h5>
                                                        <h3>{{ $invoices->where('payment_status', 'unpaid')->count() }}
                                                        </h3>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="dashboard-title">
                                        <h3>Account Information</h3>
                                    </div>

                                    <div class="row g-4">
                                        <div class="col-xxl-6">
                                            <div class="dashboard-contant-title">
                                                <h4>Contact Information <a href="javascript:void(0)"
                                                        data-bs-toggle="modal" data-bs-target="#editProfile">Edit</a>
                                                </h4>
                                            </div>
                                            <div class="dashboard-detail">
                                                <h6 class="text-content">MARK JECNO</h6>
                                                <h6 class="text-content">vicki.pope@gmail.com</h6>
                                                <a href="javascript:void(0)">Change Password</a>
                                            </div>
                                        </div>

                                        <div class="col-xxl-6">
                                            <div class="dashboard-contant-title">
                                                <h4>Newsletters <a href="javascript:void(0)" data-bs-toggle="modal"
                                                        data-bs-target="#editProfile">Edit</a></h4>
                                            </div>
                                            <div class="dashboard-detail">
                                                <h6 class="text-content">You are currently not subscribed to any
                                                    newsletter</h6>
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <div class="dashboard-contant-title">
                                                <h4>Address Book <a href="javascript:void(0)" data-bs-toggle="modal"
                                                        data-bs-target="#editProfile">Edit</a></h4>
                                            </div>

                                            <div class="row g-4">
                                                <div class="col-xxl-6">
                                                    <div class="dashboard-detail">
                                                        <h6 class="text-content">Default Billing Address</h6>
                                                        <h6 class="text-content">You have not set a default billing
                                                            address.</h6>
                                                        <a href="javascript:void(0)" data-bs-toggle="modal"
                                                            data-bs-target="#editProfile">Edit Address</a>
                                                    </div>
                                                </div>

                                                <div class="col-xxl-6">
                                                    <div class="dashboard-detail">
                                                        <h6 class="text-content">Default Shipping Address</h6>
                                                        <h6 class="text-content">You have not set a default shipping
                                                            address.</h6>
                                                        <a href="javascript:void(0)" data-bs-toggle="modal"
                                                            data-bs-target="#editProfile">Edit Address</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="tab-pane fade show" id="pills-wishlist" role="tabpanel"
                                aria-labelledby="pills-wishlist-tab">
                                <div class="dashboard-wishlist">
                                    <div class="title">
                                        <h2>My Wishlist History</h2>
                                        <span class="title-leaf title-leaf-gray">
                                            <svg class="icon-width bg-gray">
                                                <use xlink:href="{{ asset('theme_assets') }}/svg/leaf.svg#leaf"></use>
                                            </svg>
                                        </span>
                                    </div>
                                    <div class="row g-sm-4 g-3">
                                        <div class="col-xxl-3 col-lg-6 col-md-4 col-sm-6">
                                            <div class="product-box-3 theme-bg-white h-100">
                                                <div class="product-header">
                                                    <div class="product-image">
                                                        <a href="product-left-thumbnail.html">
                                                            <img src="{{ asset('theme_assets') }}/images/cake/product/2.png"
                                                                class="img-fluid blur-up lazyload" alt="">
                                                        </a>

                                                        <div class="product-header-top">
                                                            <button class="btn wishlist-button close_button">
                                                                <i data-feather="x"></i>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="product-footer">
                                                    <div class="product-detail">
                                                        <span class="span-name">Vegetable</span>
                                                        <a href="product-left-thumbnail.html">
                                                            <h5 class="name">Fresh Bread and Pastry Flour 200 g</h5>
                                                        </a>
                                                        <p class="text-content mt-1 mb-2 product-content">Cheesy feet
                                                            cheesy grin brie. Mascarpone cheese and wine hard cheese the
                                                            big cheese everyone loves smelly cheese macaroni cheese
                                                            croque monsieur.</p>
                                                        <h6 class="unit mt-1">250 ml</h6>
                                                        <h5 class="price">
                                                            <span class="theme-color">$08.02</span>
                                                            <del>$15.15</del>
                                                        </h5>
                                                        <div class="add-to-cart-box mt-2">
                                                            <button class="btn btn-add-cart addcart-button"
                                                                tabindex="0">Add
                                                                <span class="add-icon">
                                                                    <i class="fa-solid fa-plus"></i>
                                                                </span>
                                                            </button>
                                                            <div class="cart_qty qty-box">
                                                                <div class="input-group">
                                                                    <button type="button" class="qty-left-minus"
                                                                        data-type="minus" data-field="">
                                                                        <i class="fa fa-minus" aria-hidden="true"></i>
                                                                    </button>
                                                                    <input class="form-control input-number qty-input"
                                                                        type="text" name="quantity" value="0">
                                                                    <button type="button" class="qty-right-plus"
                                                                        data-type="plus" data-field="">
                                                                        <i class="fa fa-plus" aria-hidden="true"></i>
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-xxl-3 col-lg-6 col-md-4 col-sm-6">
                                            <div class="product-box-3 theme-bg-white h-100">
                                                <div class="product-header">
                                                    <div class="product-image">
                                                        <a href="product-left-thumbnail.html">
                                                            <img src="{{ asset('theme_assets') }}/images/cake/product/3.png"
                                                                class="img-fluid blur-up lazyload" alt="">
                                                        </a>

                                                        <div class="product-header-top">
                                                            <button class="btn wishlist-button close_button">
                                                                <i data-feather="x"></i>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="product-footer">
                                                    <div class="product-detail">
                                                        <span class="span-name">Vegetable</span>
                                                        <a href="product-left-thumbnail.html">
                                                            <h5 class="name">Peanut Butter Bite Premium Butter Cookies
                                                                600 g</h5>
                                                        </a>
                                                        <p class="text-content mt-1 mb-2 product-content">Feta taleggio
                                                            croque monsieur swiss manchego cheesecake dolcelatte
                                                            jarlsberg. Hard cheese danish fontina boursin melted cheese
                                                            fondue.</p>
                                                        <h6 class="unit mt-1">350 G</h6>
                                                        <h5 class="price">
                                                            <span class="theme-color">$04.33</span>
                                                            <del>$10.36</del>
                                                        </h5>
                                                        <div class="add-to-cart-box mt-2">
                                                            <button class="btn btn-add-cart addcart-button"
                                                                tabindex="0">Add
                                                                <span class="add-icon">
                                                                    <i class="fa-solid fa-plus"></i>
                                                                </span>
                                                            </button>
                                                            <div class="cart_qty qty-box">
                                                                <div class="input-group">
                                                                    <button type="button" class="qty-left-minus"
                                                                        data-type="minus" data-field="">
                                                                        <i class="fa fa-minus" aria-hidden="true"></i>
                                                                    </button>
                                                                    <input class="form-control input-number qty-input"
                                                                        type="text" name="quantity" value="0">
                                                                    <button type="button" class="qty-right-plus"
                                                                        data-type="plus" data-field="">
                                                                        <i class="fa fa-plus" aria-hidden="true"></i>
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-xxl-3 col-lg-6 col-md-4 col-sm-6">
                                            <div class="product-box-3 theme-bg-white h-100">
                                                <div class="product-header">
                                                    <div class="product-image">
                                                        <a href="product-left-thumbnail.html">
                                                            <img src="{{ asset('theme_assets') }}/images/cake/product/4.png"
                                                                class="img-fluid blur-up lazyload" alt="">
                                                        </a>

                                                        <div class="product-header-top">
                                                            <button class="btn wishlist-button close_button">
                                                                <i data-feather="x"></i>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="product-footer">
                                                    <div class="product-detail">
                                                        <span class="span-name">Snacks</span>
                                                        <a href="product-left-thumbnail.html">
                                                            <h5 class="name">SnackAmor Combo Pack of Jowar Stick and
                                                                Jowar Chips</h5>
                                                        </a>
                                                        <p class="text-content mt-1 mb-2 product-content">Lancashire
                                                            hard cheese parmesan. Danish fontina mozzarella cream cheese
                                                            smelly cheese cheese and wine cheesecake dolcelatte stilton.
                                                            Cream cheese parmesan who moved my cheese when the cheese
                                                            comes out everybody's happy cream cheese red leicester
                                                            ricotta edam.</p>
                                                        <h6 class="unit mt-1">570 G</h6>
                                                        <h5 class="price">
                                                            <span class="theme-color">$12.52</span>
                                                            <del>$13.62</del>
                                                        </h5>
                                                        <div class="add-to-cart-box mt-2">
                                                            <button class="btn btn-add-cart addcart-button"
                                                                tabindex="0">Add
                                                                <span class="add-icon">
                                                                    <i class="fa-solid fa-plus"></i>
                                                                </span>
                                                            </button>
                                                            <div class="cart_qty qty-box">
                                                                <div class="input-group">
                                                                    <button type="button" class="qty-left-minus"
                                                                        data-type="minus" data-field="">
                                                                        <i class="fa fa-minus" aria-hidden="true"></i>
                                                                    </button>
                                                                    <input class="form-control input-number qty-input"
                                                                        type="text" name="quantity" value="0">
                                                                    <button type="button" class="qty-right-plus"
                                                                        data-type="plus" data-field="">
                                                                        <i class="fa fa-plus" aria-hidden="true"></i>
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-xxl-3 col-lg-6 col-md-4 col-sm-6">
                                            <div class="product-box-3 theme-bg-white h-100">
                                                <div class="product-header">
                                                    <div class="product-image">
                                                        <a href="product-left-thumbnail.html">
                                                            <img src="{{ asset('theme_assets') }}/images/cake/product/5.png"
                                                                class="img-fluid blur-up lazyload" alt="">
                                                        </a>

                                                        <div class="product-header-top">
                                                            <button class="btn wishlist-button close_button">
                                                                <i data-feather="x"></i>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="product-footer">
                                                    <div class="product-detail">
                                                        <span class="span-name">Snacks</span>
                                                        <a href="product-left-thumbnail.html">
                                                            <h5 class="name">Yumitos Chilli Sprinkled Potato Chips 100 g
                                                            </h5>
                                                        </a>
                                                        <p class="text-content mt-1 mb-2 product-content">Cheddar
                                                            cheddar pecorino hard cheese hard cheese cheese and biscuits
                                                            bocconcini babybel. Cow goat paneer cream cheese fromage
                                                            cottage cheese cauliflower cheese jarlsberg.</p>
                                                        <h6 class="unit mt-1">100 G</h6>
                                                        <h5 class="price">
                                                            <span class="theme-color">$10.25</span>
                                                            <del>$12.36</del>
                                                        </h5>
                                                        <div class="add-to-cart-box mt-2">
                                                            <button class="btn btn-add-cart addcart-button"
                                                                tabindex="0">Add
                                                                <span class="add-icon">
                                                                    <i class="fa-solid fa-plus"></i>
                                                                </span>
                                                            </button>
                                                            <div class="cart_qty qty-box">
                                                                <div class="input-group">
                                                                    <button type="button" class="qty-left-minus"
                                                                        data-type="minus" data-field="">
                                                                        <i class="fa fa-minus" aria-hidden="true"></i>
                                                                    </button>
                                                                    <input class="form-control input-number qty-input"
                                                                        type="text" name="quantity" value="0">
                                                                    <button type="button" class="qty-right-plus"
                                                                        data-type="plus" data-field="">
                                                                        <i class="fa fa-plus" aria-hidden="true"></i>
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-xxl-3 col-lg-6 col-md-4 col-sm-6">
                                            <div class="product-box-3 theme-bg-white h-100">
                                                <div class="product-header">
                                                    <div class="product-image">
                                                        <a href="product-left-thumbnail.html">
                                                            <img src="{{ asset('theme_assets') }}/images/cake/product/6.png"
                                                                class="img-fluid blur-up lazyload" alt="">
                                                        </a>

                                                        <div class="product-header-top">
                                                            <button class="btn wishlist-button close_button">
                                                                <i data-feather="x"></i>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="product-footer">
                                                    <div class="product-detail">
                                                        <span class="span-name">Vegetable</span>
                                                        <a href="product-left-thumbnail.html">
                                                            <h5 class="name">Fantasy Crunchy Choco Chip Cookies</h5>
                                                        </a>
                                                        <p class="text-content mt-1 mb-2 product-content">Bavarian
                                                            bergkase smelly cheese swiss cut the cheese lancashire who
                                                            moved my cheese manchego melted cheese. Red leicester paneer
                                                            cow when the cheese comes out everybody's happy croque
                                                            monsieur goat melted cheese port-salut.</p>
                                                        <h6 class="unit mt-1">550 G</h6>
                                                        <h5 class="price">
                                                            <span class="theme-color">$14.25</span>
                                                            <del>$16.57</del>
                                                        </h5>
                                                        <div class="add-to-cart-box mt-2">
                                                            <button class="btn btn-add-cart addcart-button"
                                                                tabindex="0">Add
                                                                <span class="add-icon">
                                                                    <i class="fa-solid fa-plus"></i>
                                                                </span>
                                                            </button>
                                                            <div class="cart_qty qty-box">
                                                                <div class="input-group">
                                                                    <button type="button" class="qty-left-minus"
                                                                        data-type="minus" data-field="">
                                                                        <i class="fa fa-minus" aria-hidden="true"></i>
                                                                    </button>
                                                                    <input class="form-control input-number qty-input"
                                                                        type="text" name="quantity" value="0">
                                                                    <button type="button" class="qty-right-plus"
                                                                        data-type="plus" data-field="">
                                                                        <i class="fa fa-plus" aria-hidden="true"></i>
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-xxl-3 col-lg-6 col-md-4 col-sm-6">
                                            <div class="product-box-3 theme-bg-white h-100">
                                                <div class="product-header">
                                                    <div class="product-image">
                                                        <a href="product-left-thumbnail.html">
                                                            <img src="{{ asset('theme_assets') }}/images/cake/product/7.png"
                                                                class="img-fluid blur-up lazyload" alt="">
                                                        </a>

                                                        <div class="product-header-top">
                                                            <button class="btn wishlist-button close_button">
                                                                <i data-feather="x"></i>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="product-footer">
                                                    <div class="product-detail">
                                                        <span class="span-name">Vegetable</span>
                                                        <a href="product-left-thumbnail.html">
                                                            <h5 class="name">Fresh Bread and Pastry Flour 200 g</h5>
                                                        </a>
                                                        <p class="text-content mt-1 mb-2 product-content">Melted cheese
                                                            babybel chalk and cheese. Port-salut port-salut cream cheese
                                                            when the cheese comes out everybody's happy cream cheese
                                                            hard cheese cream cheese red leicester.</p>
                                                        <h6 class="unit mt-1">1 Kg</h6>
                                                        <h5 class="price">
                                                            <span class="theme-color">$12.68</span>
                                                            <del>$14.69</del>
                                                        </h5>
                                                        <div class="add-to-cart-box mt-2">
                                                            <button class="btn btn-add-cart addcart-button"
                                                                tabindex="0">Add
                                                                <span class="add-icon">
                                                                    <i class="fa-solid fa-plus"></i>
                                                                </span>
                                                            </button>
                                                            <div class="cart_qty qty-box">
                                                                <div class="input-group">
                                                                    <button type="button" class="qty-left-minus"
                                                                        data-type="minus" data-field="">
                                                                        <i class="fa fa-minus" aria-hidden="true"></i>
                                                                    </button>
                                                                    <input class="form-control input-number qty-input"
                                                                        type="text" name="quantity" value="0">
                                                                    <button type="button" class="qty-right-plus"
                                                                        data-type="plus" data-field="">
                                                                        <i class="fa fa-plus" aria-hidden="true"></i>
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-xxl-3 col-lg-6 col-md-4 col-sm-6">
                                            <div class="product-box-3 theme-bg-white h-100">
                                                <div class="product-header">
                                                    <div class="product-image">
                                                        <a href="product-left-thumbnail.html">
                                                            <img src="{{ asset('theme_assets') }}/images/cake/product/2.png"
                                                                class="img-fluid blur-up lazyload" alt="">
                                                        </a>

                                                        <div class="product-header-top">
                                                            <button class="btn wishlist-button close_button">
                                                                <i data-feather="x"></i>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="product-footer">
                                                    <div class="product-detail">
                                                        <span class="span-name">Vegetable</span>
                                                        <a href="product-left-thumbnail.html">
                                                            <h5 class="name">Fresh Bread and Pastry Flour 200 g</h5>
                                                        </a>
                                                        <p class="text-content mt-1 mb-2 product-content">Squirty cheese
                                                            cottage cheese cheese strings. Red leicester paneer danish
                                                            fontina queso lancashire when the cheese comes out
                                                            everybody's happy cottage cheese paneer.</p>
                                                        <h6 class="unit mt-1">250 ml</h6>
                                                        <h5 class="price">
                                                            <span class="theme-color">$08.02</span>
                                                            <del>$15.15</del>
                                                        </h5>
                                                        <div class="add-to-cart-box mt-2">
                                                            <button class="btn btn-add-cart addcart-button"
                                                                tabindex="0">Add
                                                                <span class="add-icon">
                                                                    <i class="fa-solid fa-plus"></i>
                                                                </span>
                                                            </button>
                                                            <div class="cart_qty qty-box">
                                                                <div class="input-group">
                                                                    <button type="button" class="qty-left-minus"
                                                                        data-type="minus" data-field="">
                                                                        <i class="fa fa-minus" aria-hidden="true"></i>
                                                                    </button>
                                                                    <input class="form-control input-number qty-input"
                                                                        type="text" name="quantity" value="0">
                                                                    <button type="button" class="qty-right-plus"
                                                                        data-type="plus" data-field="">
                                                                        <i class="fa fa-plus" aria-hidden="true"></i>
                                                                    </button>
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

                            <div class="tab-pane fade show" id="pills-order" role="tabpanel"
                                aria-labelledby="pills-order-tab">
                                <div class="dashboard-order">
                                    <div class="title">
                                        <h2>My Orders History</h2>
                                        <span class="title-leaf title-leaf-gray">
                                            <svg class="icon-width bg-gray">
                                                <use xlink:href="{{ asset('theme_assets') }}/svg/leaf.svg#leaf"></use>
                                            </svg>
                                        </span>
                                    </div>

                                    <div class="order-contain">
                                        <div>
                                            <h2>Invoices</h2>
                                        </div>
                                        <div class="table-responsive col-12">
                                            <table class="table">
                                                <thead>
                                                    <tr class="table-success text-center">
                                                        <th scope="col">ID</th>
                                                        <th scope="col">Total</th>
                                                        <th scope="col">Delivery Charge</th>
                                                        <th scope="col">Payment Option</th>
                                                        <th scope="col">Payment Status</th>
                                                        <th scope="col">Date</th>
                                                        <th scope="col">Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @forelse ($invoices as $invoice)
                                                        <tr class="text-center">
                                                            <td>{{ $invoice->id }}</td>
                                                            <td>{{ $invoice->total }}</td>
                                                            <td>{{ $invoice->delivery_charge }}</td>
                                                            <td>{{ $invoice->payment_option }}</td>
                                                            <td>{{ $invoice->payment_status }}
                                                                @if ($invoice->payment_status == 'unpaid' && $invoice->payment_option == 'online')
                                                                    <br>
                                                                    <a href="{{ url('pay/now') }}/{{ $invoice->id }}">Pay
                                                                        now</a>
                                                                @endif
                                                            </td>
                                                            <td>{{ $invoice->created_at->diffForHumans() }}</td>
                                                            <td>
                                                                <a class="success"
                                                                    href="{{ route('download.invoice', $invoice->id) }}">Download
                                                                    <i class="fa-solid fa-download"></i>
                                                                </a>
                                                                @if ($invoice->payment_status == 'paid')
                                                                    |
                                                                    <a class="success"
                                                                        href="{{ route('give.review', $invoice->id) }}">Review
                                                                        <i class="fa fa-star"></i>
                                                                    </a>
                                                                @endif
                                                            </td>
                                                        </tr>
                                                    @empty
                                                        <tr>
                                                            <td colspan="50" class="alert alert-danger text-center">
                                                                <h2>Sorry! You have no Invoices.</h2>
                                                                <p>Please Collect some products and Create your Invoice list
                                                                    first.
                                                                </p>
                                                            </td>
                                                        </tr>
                                                    @endforelse
                                                </tbody>
                                            </table>
                                        </div>

                                        {{-- <div class="order-box dashboard-bg-box">
                                            <div class="order-container">
                                                <div class="order-icon">
                                                    <i data-feather="box"></i>
                                                </div>

                                                <div class="order-detail">
                                                    <h4>Delivere <span>Panding</span></h4>
                                                    <h6 class="text-content">Gouda parmesan caerphilly mozzarella
                                                        cottage cheese cauliflower cheese taleggio gouda.</h6>
                                                </div>
                                            </div>

                                            <div class="product-order-detail">
                                                <a href="product-left-thumbnail.html" class="order-image">
                                                    <img src="{{ asset('theme_assets') }}/images/vegetable/product/1.png"
                                                        class="blur-up lazyload" alt="">
                                                </a>

                                                <div class="order-wrap">
                                                    <a href="product-left-thumbnail.html">
                                                        <h3>Fantasy Crunchy Choco Chip Cookies</h3>
                                                    </a>
                                                    <p class="text-content">Cheddar dolcelatte gouda. Macaroni cheese
                                                        cheese strings feta halloumi cottage cheese jarlsberg cheese
                                                        triangles say cheese.</p>
                                                    <ul class="product-size">
                                                        <li>
                                                            <div class="size-box">
                                                                <h6 class="text-content">Price : </h6>
                                                                <h5>$20.68</h5>
                                                            </div>
                                                        </li>

                                                        <li>
                                                            <div class="size-box">
                                                                <h6 class="text-content">Rate : </h6>
                                                                <div class="product-rating ms-2">
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
                                                                </div>
                                                            </div>
                                                        </li>

                                                        <li>
                                                            <div class="size-box">
                                                                <h6 class="text-content">Sold By : </h6>
                                                                <h5>Fresho</h5>
                                                            </div>
                                                        </li>

                                                        <li>
                                                            <div class="size-box">
                                                                <h6 class="text-content">Quantity : </h6>
                                                                <h5>250 G</h5>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="order-box dashboard-bg-box">
                                            <div class="order-container">
                                                <div class="order-icon">
                                                    <i data-feather="box"></i>
                                                </div>

                                                <div class="order-detail">
                                                    <h4>Delivered <span class="success-bg">Success</span></h4>
                                                    <h6 class="text-content">Cheese on toast cheesy grin cheesy grin
                                                        cottage cheese caerphilly everyone loves cottage cheese the big
                                                        cheese.</h6>
                                                </div>
                                            </div>

                                            <div class="product-order-detail">
                                                <a href="product-left-thumbnail.html" class="order-image">
                                                    <img src="{{ asset('theme_assets') }}/images/vegetable/product/2.png"
                                                        alt="" class="blur-up lazyload">
                                                </a>

                                                <div class="order-wrap">
                                                    <a href="product-left-thumbnail.html">
                                                        <h3>Cold Brew Coffee Instant Coffee 50 g</h3>
                                                    </a>
                                                    <p class="text-content">Pecorino paneer port-salut when the cheese
                                                        comes out everybody's happy red leicester mascarpone blue
                                                        castello cauliflower cheese.</p>
                                                    <ul class="product-size">
                                                        <li>
                                                            <div class="size-box">
                                                                <h6 class="text-content">Price : </h6>
                                                                <h5>$20.68</h5>
                                                            </div>
                                                        </li>

                                                        <li>
                                                            <div class="size-box">
                                                                <h6 class="text-content">Rate : </h6>
                                                                <div class="product-rating ms-2">
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
                                                                </div>
                                                            </div>
                                                        </li>

                                                        <li>
                                                            <div class="size-box">
                                                                <h6 class="text-content">Sold By : </h6>
                                                                <h5>Fresho</h5>
                                                            </div>
                                                        </li>

                                                        <li>
                                                            <div class="size-box">
                                                                <h6 class="text-content">Quantity : </h6>
                                                                <h5>250 G</h5>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="order-box dashboard-bg-box">
                                            <div class="order-container">
                                                <div class="order-icon">
                                                    <i data-feather="box"></i>
                                                </div>

                                                <div class="order-detail">
                                                    <h4>Delivere <span>Panding</span></h4>
                                                    <h6 class="text-content">Cheesy grin boursin cheesy grin cheesecake
                                                        blue castello cream cheese lancashire melted cheese.</h6>
                                                </div>
                                            </div>

                                            <div class="product-order-detail">
                                                <a href="product-left-thumbnail.html" class="order-image">
                                                    <img src="{{ asset('theme_assets') }}/images/vegetable/product/3.png"
                                                        alt="" class="blur-up lazyload">
                                                </a>

                                                <div class="order-wrap">
                                                    <a href="product-left-thumbnail.html">
                                                        <h3>Peanut Butter Bite Premium Butter Cookies 600 g</h3>
                                                    </a>
                                                    <p class="text-content">Cow bavarian bergkase mascarpone paneer
                                                        squirty cheese fromage frais cheese slices when the cheese comes
                                                        out everybody's happy.</p>
                                                    <ul class="product-size">
                                                        <li>
                                                            <div class="size-box">
                                                                <h6 class="text-content">Price : </h6>
                                                                <h5>$20.68</h5>
                                                            </div>
                                                        </li>

                                                        <li>
                                                            <div class="size-box">
                                                                <h6 class="text-content">Rate : </h6>
                                                                <div class="product-rating ms-2">
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
                                                                </div>
                                                            </div>
                                                        </li>

                                                        <li>
                                                            <div class="size-box">
                                                                <h6 class="text-content">Sold By : </h6>
                                                                <h5>Fresho</h5>
                                                            </div>
                                                        </li>

                                                        <li>
                                                            <div class="size-box">
                                                                <h6 class="text-content">Quantity : </h6>
                                                                <h5>250 G</h5>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="order-box dashboard-bg-box">
                                            <div class="order-container">
                                                <div class="order-icon">
                                                    <i data-feather="box"></i>
                                                </div>

                                                <div class="order-detail">
                                                    <h4>Delivered <span class="success-bg">Success</span></h4>
                                                    <h6 class="text-content">Caerphilly port-salut parmesan pecorino
                                                        croque monsieur dolcelatte melted cheese cheese and wine.</h6>
                                                </div>
                                            </div>

                                            <div class="product-order-detail">
                                                <a href="product-left-thumbnail.html" class="order-image">
                                                    <img src="{{ asset('theme_assets') }}/images/vegetable/product/4.png"
                                                        class="blur-up lazyload" alt="">
                                                </a>

                                                <div class="order-wrap">
                                                    <a href="product-left-thumbnail.html">
                                                        <h3>SnackAmor Combo Pack of Jowar Stick and Jowar Chips</h3>
                                                    </a>
                                                    <p class="text-content">The big cheese cream cheese pepper jack
                                                        cheese slices danish fontina everyone loves cheese on toast
                                                        bavarian bergkase.</p>
                                                    <ul class="product-size">
                                                        <li>
                                                            <div class="size-box">
                                                                <h6 class="text-content">Price : </h6>
                                                                <h5>$20.68</h5>
                                                            </div>
                                                        </li>

                                                        <li>
                                                            <div class="size-box">
                                                                <h6 class="text-content">Rate : </h6>
                                                                <div class="product-rating ms-2">
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
                                                                </div>
                                                            </div>
                                                        </li>

                                                        <li>
                                                            <div class="size-box">
                                                                <h6 class="text-content">Sold By : </h6>
                                                                <h5>Fresho</h5>
                                                            </div>
                                                        </li>

                                                        <li>
                                                            <div class="size-box">
                                                                <h6 class="text-content">Quantity : </h6>
                                                                <h5>250 G</h5>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div> --}}
                                    </div>
                                </div>
                            </div>

                            <div class="tab-pane fade show" id="pills-address" role="tabpanel"
                                aria-labelledby="pills-address-tab">
                                <div class="dashboard-address">
                                    <div class="title title-flex">
                                        <div>
                                            <h2>My Address Book</h2>
                                            <span class="title-leaf">
                                                <svg class="icon-width bg-gray">
                                                    <use xlink:href="{{ asset('theme_assets') }}/svg/leaf.svg#leaf"></use>
                                                </svg>
                                            </span>
                                        </div>

                                        <!-- Button trigger modal -->
                                        <button class="btn theme-bg-color text-white btn-sm fw-bold mt-lg-0 mt-3"
                                            data-bs-toggle="modal" data-bs-target="#exampleModal"><i data-feather="plus"
                                                class="me-2"></i> Add New Address</button>

                                        <!-- Modal -->
                                        <div class="modal fade" id="exampleModal" tabindex="-1"
                                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Add New Address
                                                        </h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <form action="{{ route('add.address') }}" method="POST">
                                                        @csrf
                                                        <div class="modal-body">
                                                            <div class="mb-3">
                                                                <label for="exampleFormControlInput1"
                                                                    class="form-label">Tag
                                                                </label>
                                                                <input type="text" class="form-control" name="tag"
                                                                    placeholder="Home">
                                                                @error('tag')
                                                                    <span class="text-danger">{{ $message }}</span>
                                                                @enderror
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="exampleFormControlInput1"
                                                                    class="form-label">Name
                                                                </label>
                                                                <input type="text" class="form-control" name="name"
                                                                    placeholder="Name">
                                                                @error('name')
                                                                    <span class="text-danger">{{ $message }}</span>
                                                                @enderror
                                                            </div>
                                                            <div class="mb-3">
                                                                <div class="row">
                                                                    <div class="col-6">
                                                                        <label for="exampleFormControlInput1"
                                                                            class="form-label">House No
                                                                        </label>
                                                                        <input type="text" class="form-control"
                                                                            name="house">
                                                                        @error('house')
                                                                            <span
                                                                                class="text-danger">{{ $message }}</span>
                                                                        @enderror
                                                                    </div>
                                                                    <div class="col-6">
                                                                        <label for="exampleFormControlInput1"
                                                                            class="form-label">Road/Sector/Village
                                                                        </label>
                                                                        <input type="text" class="form-control"
                                                                            name="road">
                                                                        @error('road')
                                                                            <span
                                                                                class="text-danger">{{ $message }}</span>
                                                                        @enderror
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="mb-3">
                                                                <div class="row">
                                                                    <div class="col-6">
                                                                        <label for="exampleFormControlInput1"
                                                                            class="form-label">Post
                                                                            Office
                                                                        </label>
                                                                        <input type="text" class="form-control"
                                                                            name="post_office">
                                                                        @error('post_office')
                                                                            <span
                                                                                class="text-danger">{{ $message }}</span>
                                                                        @enderror
                                                                    </div>
                                                                    <div class="col-6">
                                                                        <label for="exampleFormControlInput1"
                                                                            class="form-label">Post Code
                                                                        </label>
                                                                        <input type="number" class="form-control"
                                                                            name="post_code">
                                                                        @error('post_code')
                                                                            <span
                                                                                class="text-danger">{{ $message }}</span>
                                                                        @enderror
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="mb-3">
                                                                <div class="row">
                                                                    <div class="col-6">
                                                                        <label for="exampleFormControlInput1"
                                                                            class="form-label">City
                                                                        </label>
                                                                        <input type="text" class="form-control"
                                                                            name="city">
                                                                        @error('city')
                                                                            <span
                                                                                class="text-danger">{{ $message }}</span>
                                                                        @enderror
                                                                    </div>
                                                                    <div class="col-6">
                                                                        <label for="exampleFormControlInput1"
                                                                            class="form-label">Country
                                                                        </label>
                                                                        <input type="text" class="form-control"
                                                                            name="country">
                                                                        @error('country')
                                                                            <span
                                                                                class="text-danger">{{ $message }}</span>
                                                                        @enderror
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="exampleFormControlInput1"
                                                                    class="form-label">Phone Number
                                                                </label>
                                                                <input type="text" class="form-control" name="phone"
                                                                    placeholder="+880...">
                                                                @error('phone')
                                                                    <span class="text-danger">{{ $message }}</span>
                                                                @enderror
                                                            </div>

                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-sm bg-danger"
                                                                data-bs-dismiss="modal">Close</button>
                                                            <button type="submit" class="btn btn-sm bg-info">Save
                                                                changes</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row g-sm-4 g-3">
                                        @forelse ($addresses as $address)
                                            <div class="col-xxl-4 col-xl-6 col-lg-12 col-md-6">
                                                <div class="address-box">
                                                    <div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="jack"
                                                                id="flexRadioDefault2" checked>
                                                        </div>

                                                        <div class="label">
                                                            <label>{{ $address->tag }}</label>
                                                        </div>

                                                        <div class="table-responsive address-table">
                                                            <table class="table">
                                                                <tbody>
                                                                    <tr>
                                                                        <td colspan="2">{{ $address->name }}</td>
                                                                    </tr>

                                                                    <tr>
                                                                        <td>Address :</td>
                                                                        <td>
                                                                            <p>
                                                                                {{ $address->house }},
                                                                                {{ $address->road }},
                                                                                {{ $address->city }},
                                                                                {{ $address->country }}
                                                                            </p>
                                                                        </td>
                                                                    </tr>

                                                                    <tr>
                                                                        <td>Zip Code :
                                                                        <td>
                                                                            {{ $address->post_office }}-
                                                                            {{ $address->post_code }}
                                                                        </td>
                                                                        </td>
                                                                    </tr>

                                                                    <tr>
                                                                        <td>Phone :</td>
                                                                        <td>{{ $address->phone }}</td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>

                                                    <div class="button-group">
                                                        {{-- <form action="{{ route('add.address.edit') }}" method="POST"> --}}
                                                        @csrf
                                                        {{-- <button class="btn btn-sm add-button w-100"
                                                                data-bs-toggle="modal" data-bs-target="#editProfile"><i
                                                                    data-feather="edit"></i>
                                                                Edit</button> --}}
                                                        <!-- Button trigger modal -->
                                                        <button class="btn btn-sm add-button w-100" data-bs-toggle="modal"
                                                            data-bs-target="#exampleModal1"><i data-feather="plus"
                                                                class="me-2"></i> Edit</button>

                                                        <!-- Modal -->
                                                        <form action="{{ route('add.address.edit', $address->id) }}"
                                                            method="POST">
                                                            @csrf
                                                            @method('PUT')
                                                            <div class="modal fade" id="exampleModal1" tabindex="-1"
                                                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                                <div class="modal-dialog modal-dialog-centered">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h5 class="modal-title"
                                                                                id="exampleModalLabel">
                                                                                Edit Address
                                                                            </h5>
                                                                            <button type="button" class="btn-close"
                                                                                data-bs-dismiss="modal"
                                                                                aria-label="Close"></button>
                                                                        </div>
                                                                        {{-- <form
                                                                        action="{{ route('add.address.edit', $address->id) }}"
                                                                        method="POST">
                                                                        @csrf
                                                                        @method('PUT') --}}
                                                                        <div class="modal-body">
                                                                            <div class="mb-3">
                                                                                <label for="exampleFormControlInput1"
                                                                                    class="form-label">Tag
                                                                                </label>
                                                                                <input type="text" class="form-control"
                                                                                    name="tag" placeholder="Home">
                                                                                {{-- @error('tag')
                                                                                    <span
                                                                                        class="text-danger">{{ $message }}</span>
                                                                                @enderror --}}
                                                                            </div>
                                                                            <div class="mb-3">
                                                                                <label for="exampleFormControlInput1"
                                                                                    class="form-label">Name
                                                                                </label>
                                                                                <input type="text" class="form-control"
                                                                                    name="name" placeholder="Name">
                                                                                {{-- @error('name')
                                                                                    <span
                                                                                        class="text-danger">{{ $message }}</span>
                                                                                @enderror --}}
                                                                            </div>
                                                                            <div class="mb-3">
                                                                                <div class="row">
                                                                                    <div class="col-6">
                                                                                        <label
                                                                                            for="exampleFormControlInput1"
                                                                                            class="form-label">House No
                                                                                        </label>
                                                                                        <input type="text"
                                                                                            class="form-control"
                                                                                            name="house">
                                                                                        {{-- @error('house')
                                                                                            <span
                                                                                                class="text-danger">{{ $message }}</span>
                                                                                        @enderror --}}
                                                                                    </div>
                                                                                    <div class="col-6">
                                                                                        <label
                                                                                            for="exampleFormControlInput1"
                                                                                            class="form-label">Road/Sector/Village
                                                                                        </label>
                                                                                        <input type="text"
                                                                                            class="form-control"
                                                                                            name="road">
                                                                                        {{-- @error('road')
                                                                                            <span
                                                                                                class="text-danger">{{ $message }}</span>
                                                                                        @enderror --}}
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="mb-3">
                                                                                <div class="row">
                                                                                    <div class="col-6">
                                                                                        <label
                                                                                            for="exampleFormControlInput1"
                                                                                            class="form-label">Post
                                                                                            Office
                                                                                        </label>
                                                                                        <input type="text"
                                                                                            class="form-control"
                                                                                            name="post_office">
                                                                                        {{-- @error('post_office')
                                                                                            <span
                                                                                                class="text-danger">{{ $message }}</span>
                                                                                        @enderror --}}
                                                                                    </div>
                                                                                    <div class="col-6">
                                                                                        <label
                                                                                            for="exampleFormControlInput1"
                                                                                            class="form-label">Post Code
                                                                                        </label>
                                                                                        <input type="number"
                                                                                            class="form-control"
                                                                                            name="post_code">
                                                                                        {{-- @error('post_code')
                                                                                            <span
                                                                                                class="text-danger">{{ $message }}</span>
                                                                                        @enderror --}}
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="mb-3">
                                                                                <div class="row">
                                                                                    <div class="col-6">
                                                                                        <label
                                                                                            for="exampleFormControlInput1"
                                                                                            class="form-label">City
                                                                                        </label>
                                                                                        <input type="text"
                                                                                            class="form-control"
                                                                                            name="city">
                                                                                        {{-- @error('city')
                                                                                            <span
                                                                                                class="text-danger">{{ $message }}</span>
                                                                                        @enderror --}}
                                                                                    </div>
                                                                                    <div class="col-6">
                                                                                        <label
                                                                                            for="exampleFormControlInput1"
                                                                                            class="form-label">Country
                                                                                        </label>
                                                                                        <input type="text"
                                                                                            class="form-control"
                                                                                            name="country"
                                                                                            value="{{ $address->country }}">
                                                                                        {{-- @error('country')
                                                                                            <span
                                                                                                class="text-danger">{{ $message }}</span>
                                                                                        @enderror --}}
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="mb-3">
                                                                                <label for="exampleFormControlInput1"
                                                                                    class="form-label">Phone Number
                                                                                </label>
                                                                                <input type="text" class="form-control"
                                                                                    name="phone"
                                                                                    value="{{ $address->phone }}">
                                                                                {{-- @error('phone')
                                                                                    <span
                                                                                        class="text-danger">{{ $message }}</span>
                                                                                @enderror --}}
                                                                            </div>

                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <button type="button"
                                                                                class="btn btn-sm bg-danger"
                                                                                data-bs-dismiss="modal">Close</button>
                                                                            <button type="submit"
                                                                                class="btn btn-sm bg-info">Save
                                                                                changes</button>
                                                                        </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                            {{-- </form> --}}
                                            <button class="btn btn-sm add-button w-100" data-bs-toggle="modal"
                                                data-bs-target="#removeProfile"><i data-feather="trash-2"></i>
                                                Remove</button>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <div class="alert alert-danger form-control">
                                Please input your Address!
                            </div>
                            @endforelse
                        </div>
                    </div>
                </div>

                <div class="tab-pane fade show" id="pills-card" role="tabpanel" aria-labelledby="pills-card-tab">
                    <div class="dashboard-card">
                        <div class="title title-flex">
                            <div>
                                <h2>My Card Details</h2>
                                <span class="title-leaf">
                                    <svg class="icon-width bg-gray">
                                        <use xlink:href="{{ asset('theme_assets') }}/svg/leaf.svg#leaf"></use>
                                    </svg>
                                </span>
                            </div>

                            <button class="btn theme-bg-color text-white btn-sm fw-bold mt-lg-0 mt-3"
                                data-bs-toggle="modal" data-bs-target="#editCard"><i data-feather="plus"
                                    class="me-2"></i> Add New Card</button>
                        </div>

                        <div class="row g-4">
                            <div class="col-xxl-4 col-xl-6 col-lg-12 col-sm-6">
                                <div class="payment-card-detail">
                                    <div class="card-details">
                                        <div class="card-number">
                                            <h4>XXXX - XXXX - XXXX - 2548</h4>
                                        </div>

                                        <div class="valid-detail">
                                            <div class="title">
                                                <span>valid</span>
                                                <span>thru</span>
                                            </div>
                                            <div class="date">
                                                <h3>08/05</h3>
                                            </div>
                                            <div class="primary">
                                                <span class="badge bg-pill badge-light">primary</span>
                                            </div>
                                        </div>

                                        <div class="name-detail">
                                            <div class="name">
                                                <h5>Audrey Carol</h5>
                                            </div>
                                            <div class="card-img">
                                                <img src="{{ asset('theme_assets') }}/images/payment-icon/1.jpg"
                                                    class="img-fluid blur-up lazyloaded" alt="">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="edit-card">
                                        <a data-bs-toggle="modal" data-bs-target="#editCard" href="javascript:void(0)"><i
                                                class="far fa-edit"></i> edit</a>
                                        <a href="javascript:void(0)" data-bs-toggle="modal"
                                            data-bs-target="#removeProfile"><i class="far fa-minus-square"></i> delete</a>
                                    </div>
                                </div>

                                <div class="edit-card-mobile">
                                    <a data-bs-toggle="modal" data-bs-target="#editCard" href="javascript:void(0)"><i
                                            class="far fa-edit"></i> edit</a>
                                    <a href="javascript:void(0)"><i class="far fa-minus-square"></i>
                                        delete</a>
                                </div>
                            </div>

                            <div class="col-xxl-4 col-xl-6 col-lg-12 col-sm-6">
                                <div class="payment-card-detail">
                                    <div class="card-details card-visa">
                                        <div class="card-number">
                                            <h4>XXXX - XXXX - XXXX - 1536</h4>
                                        </div>

                                        <div class="valid-detail">
                                            <div class="title">
                                                <span>valid</span>
                                                <span>thru</span>
                                            </div>
                                            <div class="date">
                                                <h3>12/23</h3>
                                            </div>
                                            <div class="primary">
                                                <span class="badge bg-pill badge-light">primary</span>
                                            </div>
                                        </div>

                                        <div class="name-detail">
                                            <div class="name">
                                                <h5>Leah Heather</h5>
                                            </div>
                                            <div class="card-img">
                                                <img src="{{ asset('theme_assets') }}/images/payment-icon/2.jpg"
                                                    class="img-fluid blur-up lazyloaded" alt="">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="edit-card">
                                        <a data-bs-toggle="modal" data-bs-target="#editCard" href="javascript:void(0)"><i
                                                class="far fa-edit"></i> edit</a>
                                        <a href="javascript:void(0)" data-bs-toggle="modal"
                                            data-bs-target="#removeProfile"><i class="far fa-minus-square"></i> delete</a>
                                    </div>
                                </div>

                                <div class="edit-card-mobile">
                                    <a data-bs-toggle="modal" data-bs-target="#editCard" href="javascript:void(0)"><i
                                            class="far fa-edit"></i> edit</a>
                                    <a href="javascript:void(0)"><i class="far fa-minus-square"></i>
                                        delete</a>
                                </div>
                            </div>

                            <div class="col-xxl-4 col-xl-6 col-lg-12 col-sm-6">
                                <div class="payment-card-detail">
                                    <div class="card-details dabit-card">
                                        <div class="card-number">
                                            <h4>XXXX - XXXX - XXXX - 1366</h4>
                                        </div>

                                        <div class="valid-detail">
                                            <div class="title">
                                                <span>valid</span>
                                                <span>thru</span>
                                            </div>
                                            <div class="date">
                                                <h3>05/21</h3>
                                            </div>
                                            <div class="primary">
                                                <span class="badge bg-pill badge-light">primary</span>
                                            </div>
                                        </div>

                                        <div class="name-detail">
                                            <div class="name">
                                                <h5>mark jecno</h5>
                                            </div>
                                            <div class="card-img">
                                                <img src="{{ asset('theme_assets') }}/images/payment-icon/3.jpg"
                                                    class="img-fluid blur-up lazyloaded" alt="">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="edit-card">
                                        <a data-bs-toggle="modal" data-bs-target="#editCard" href="javascript:void(0)"><i
                                                class="far fa-edit"></i> edit</a>
                                        <a href="javascript:void(0)" data-bs-toggle="modal"
                                            data-bs-target="#removeProfile"><i class="far fa-minus-square"></i> delete</a>
                                    </div>
                                </div>

                                <div class="edit-card-mobile">
                                    <a data-bs-toggle="modal" data-bs-target="#editCard" href="javascript:void(0)"><i
                                            class="far fa-edit"></i> edit</a>
                                    <a href="javascript:void(0)"><i class="far fa-minus-square"></i>
                                        delete</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="tab-pane fade show" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                    <div class="dashboard-profile">
                        <div class="title">
                            <h2>My Profile</h2>
                            <span class="title-leaf">
                                <svg class="icon-width bg-gray">
                                    <use xlink:href="{{ asset('theme_assets') }}/svg/leaf.svg#leaf"></use>
                                </svg>
                            </span>
                        </div>

                        <div class="profile-detail dashboard-bg-box">
                            <div class="dashboard-title">
                                <h3>Profile Name</h3>
                            </div>
                            <div class="profile-name-detail">
                                <div class="d-sm-flex align-items-center d-block">
                                    <h3>Vicki E. Pope</h3>
                                    <div class="product-rating profile-rating">
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
                                                <i data-feather="star"></i>
                                            </li>
                                            <li>
                                                <i data-feather="star"></i>
                                            </li>
                                        </ul>
                                    </div>
                                </div>

                                <a href="javascript:void(0)" data-bs-toggle="modal"
                                    data-bs-target="#editProfile">Edit</a>
                            </div>

                            <div class="location-profile">
                                <ul>
                                    <li>
                                        <div class="location-box">
                                            <i data-feather="map-pin"></i>
                                            <h6>Downers Grove, IL</h6>
                                        </div>
                                    </li>

                                    <li>
                                        <div class="location-box">
                                            <i data-feather="mail"></i>
                                            <h6>vicki.pope@gmail.com</h6>
                                        </div>
                                    </li>

                                    <li>
                                        <div class="location-box">
                                            <i data-feather="check-square"></i>
                                            <h6>Licensed for 2 years</h6>
                                        </div>
                                    </li>
                                </ul>
                            </div>

                            <div class="profile-description">
                                <p>Residences can be classified by and how they are connected to
                                    neighbouring residences and land. Different types of housing tenure can
                                    be used for the same physical type.</p>
                            </div>
                        </div>

                        <div class="profile-about dashboard-bg-box">
                            <div class="row">
                                <div class="col-xxl-7">
                                    <div class="dashboard-title mb-3">
                                        <h3>Profile About</h3>
                                    </div>

                                    <div class="table-responsive">
                                        <table class="table">
                                            <tbody>
                                                <tr>
                                                    <td>Gender :</td>
                                                    <td>Female</td>
                                                </tr>
                                                <tr>
                                                    <td>Birthday :</td>
                                                    <td>21/05/1997</td>
                                                </tr>
                                                <tr>
                                                    <td>Phone Number :</td>
                                                    <td>
                                                        <a href="javascript:void(0)"> +91 846 - 547 -
                                                            210</a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Address :</td>
                                                    <td>549 Sulphur Springs Road, Downers, IL</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>

                                    <div class="dashboard-title mb-3">
                                        <h3>Login Details</h3>
                                    </div>

                                    <div class="table-responsive">
                                        <table class="table">
                                            <tbody>
                                                <tr>
                                                    <td>Email :</td>
                                                    <td>
                                                        <a href="javascript:void(0)">vicki.pope@gmail.com
                                                            <span data-bs-toggle="modal"
                                                                data-bs-target="#editProfile">Edit</span></a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Password :</td>
                                                    <td>
                                                        <a href="javascript:void(0)">●●●●●●
                                                            <span data-bs-toggle="modal"
                                                                data-bs-target="#editProfile">Edit</span></a>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                                <div class="col-xxl-5">
                                    <div class="profile-image">
                                        <img src="{{ asset('theme_assets') }}/images/inner-page/dashboard-profile.png"
                                            class="img-fluid blur-up lazyload" alt="">
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="tab-pane fade show" id="pills-security" role="tabpanel"
                    aria-labelledby="pills-security-tab">
                    <div class="dashboard-privacy">
                        <div class="dashboard-bg-box">
                            <div class="dashboard-title mb-4">
                                <h3>Privacy</h3>
                            </div>

                            <div class="privacy-box">
                                <div class="d-flex align-items-start">
                                    <h6>Allows others to see my profile</h6>
                                    <div class="form-check form-switch switch-radio ms-auto">
                                        <input class="form-check-input" type="checkbox" role="switch" id="redio"
                                            aria-checked="false">
                                        <label class="form-check-label" for="redio"></label>
                                    </div>
                                </div>

                                <p class="text-content">all peoples will be able to see my profile</p>
                            </div>

                            <div class="privacy-box">
                                <div class="d-flex align-items-start">
                                    <h6>who has save this profile only that people see my profile</h6>
                                    <div class="form-check form-switch switch-radio ms-auto">
                                        <input class="form-check-input" type="checkbox" role="switch" id="redio2"
                                            aria-checked="false">
                                        <label class="form-check-label" for="redio2"></label>
                                    </div>
                                </div>

                                <p class="text-content">all peoples will not be able to see my profile</p>
                            </div>

                            <button class="btn theme-bg-color btn-md fw-bold mt-4 text-white">Save
                                Changes</button>
                        </div>

                        <div class="dashboard-bg-box mt-4">
                            <div class="dashboard-title mb-4">
                                <h3>Account settings</h3>
                            </div>

                            <div class="privacy-box">
                                <div class="d-flex align-items-start">
                                    <h6>Deleting Your Account Will Permanently</h6>
                                    <div class="form-check form-switch switch-radio ms-auto">
                                        <input class="form-check-input" type="checkbox" role="switch" id="redio3"
                                            aria-checked="false">
                                        <label class="form-check-label" for="redio3"></label>
                                    </div>
                                </div>
                                <p class="text-content">Once your account is deleted, you will be logged out
                                    and will be unable to log in back.</p>
                            </div>

                            <div class="privacy-box">
                                <div class="d-flex align-items-start">
                                    <h6>Deleting Your Account Will Temporary</h6>
                                    <div class="form-check form-switch switch-radio ms-auto">
                                        <input class="form-check-input" type="checkbox" role="switch" id="redio4"
                                            aria-checked="false">
                                        <label class="form-check-label" for="redio4"></label>
                                    </div>
                                </div>

                                <p class="text-content">Once your account is deleted, you will be logged out
                                    and you will be create new account</p>
                            </div>

                            <button class="btn theme-bg-color btn-md fw-bold mt-4 text-white">Delete My
                                Account</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
        </div>
        </div>
    </section>
    <!-- User Dashboard Section End -->
@endsection

@section('footer_scripts')
@endsection
