@extends('layouts.frontend_master')

@section('content')
    <!-- Breadcrumb Section Start -->
    <section class="breadscrumb-section pt-0">
        <div class="container-fluid-lg">
            <div class="row">
                <div class="col-12">
                    <div class="breadscrumb-contain">
                        <h2>Sign In</h2>
                        <nav>
                            <ol class="breadcrumb mb-0">
                                <li class="breadcrumb-item">
                                    <a href="index.html">
                                        <i class="fa-solid fa-house"></i>
                                    </a>
                                </li>
                                <li class="breadcrumb-item active">Sign In</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- log in section start -->
    <section class="log-in-section section-b-space">
        <div class="container-fluid-lg w-100">
            <div class="row">
                <div class="col-xxl-6 col-xl-5 col-lg-6 d-lg-block d-none ms-auto">
                    <div class="image-contain">
                        <img src="{{ asset('theme_assets') }}/images/inner-page/sign-up.png" class="img-fluid"
                            alt="">
                    </div>
                </div>

                <div class="col-xxl-4 col-xl-5 col-lg-6 col-sm-8 mx-auto">
                    <div class="log-in-box">
                        <div class="log-in-title text-center">
                            <h3>Welcome To {{ env('APP_NAME') }}</h3>
                            <h4>Create New Customer Account</h4>
                        </div>

                        <div class="input-box">
                            <form class="row g-4" method="POST" action="{{ route('register') }}">
                                @csrf
                                <div class="col-12">
                                    <div class="form-floating theme-form-floating">
                                        <input type="text" class="form-control @error('name') is-invalid @enderror"
                                            id="name" placeholder="Name" name="name">
                                        <label for="fullname">Name</label>
                                        @error('name')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-floating theme-form-floating">
                                        <input type="email" class="form-control @error('email') is-invalid @enderror"
                                            id="email" placeholder="Email Address" name="email">
                                        <label for="email">Email Address</label>
                                        @error('email')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="form-floating theme-form-floating">
                                        <input type="password" class="form-control @error('password') is-invalid @enderror"
                                            id="password" placeholder="Password" name="password">
                                        <label for="password">Password</label>
                                        @error('password')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-floating theme-form-floating">
                                        <input type="password"
                                            class="form-control @error('password_confirmation') is-invalid @enderror"
                                            id="password" placeholder="Confirm Password" name="password_confirmation">
                                        <label for="password">Confirm Password</label>
                                        @error('password_confirmation')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="forgot-box">
                                        <div class="form-check ps-0 m-0 remember-box">
                                            <input class="checkbox_animated check-box" type="checkbox"
                                                id="flexCheckDefault">
                                            <label class="form-check-label" for="flexCheckDefault">I agree with
                                                <span>Terms</span> and <span>Privacy</span></label>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <button class="btn btn-animation w-100" type="submit">Registration</button>
                                </div>
                            </form>
                        </div>

                        <div class="other-log-in">
                            <h6>or</h6>
                        </div>

                        <div class="log-in-button">
                            <ul>
                                <li>
                                    <a href="{{ route('google.redirect') }}" class="btn google-button w-100">
                                        <img src="{{ asset('theme_assets') }}/images/inner-page/google.png"
                                            class="blur-up lazyload" alt="">
                                        Sign up with Google
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#otp"
                                        class="btn google-button w-100">
                                        <img src="{{ asset('theme_assets') }}/images/inner-page/phone1.png"
                                            class="blur-up lazyload" alt="">
                                        Sign up with Phone Number
                                    </a>
                                </li>
                            </ul>
                        </div>

                        <div class="other-log-in">
                            <h6></h6>
                        </div>

                        <div class="sign-up-box">
                            <h4>Already have an account?</h4>
                            <a href="{{ url('login') }}">Log In</a>
                        </div>
                    </div>
                </div>

                <div class="col-xxl-7 col-xl-6 col-lg-6"></div>
            </div>
        </div>
    </section>
    <!-- log in section end -->

    <!-- Edit Profile Start -->
    <div class="modal fade theme-modal" id="otp" tabindex="-1" aria-labelledby="exampleModalLabel2"
        aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered modal-fullscreen-sm-down">
            <div class="modal-content">
                <form action="{{ route('send.otp') }}" method="POST">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel2">Register with Phone Number</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                            <i class="fa-solid fa-xmark"></i>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row g-4">
                            <div class="col-xxl-12">
                                <div class="form-floating theme-form-floating">
                                    <input type="text" class="form-control" id="pname" placeholder="017xxxxx"
                                        name="phone_number">
                                    <label for="pname">Phone Number</label>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-animation btn-md fw-bold"
                            data-bs-dismiss="modal">Close</button>
                        <button type="submit" data-bs-dismiss="modal"
                            class="btn theme-bg-color btn-md fw-bold text-light">Send
                            OTP</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Edit Profile End -->
@endsection
