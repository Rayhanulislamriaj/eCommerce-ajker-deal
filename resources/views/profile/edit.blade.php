@extends('layouts.backend_master')
@section('content')
    <!-- Settings Section Start -->
    <div class="page-body">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="row">
                        <div class="col-sm-12">
                            <!-- Details Start -->
                            <div class="card">
                                @if (session('success'))
                                    <div class="alert alert-primary">
                                        {{ session('success') }}
                                    </div>
                                @endif

                                <div class="card-body">
                                    <div class="title-header option-title">
                                        <h5>Change Profile Photo</h5>
                                    </div>
                                    <form class="theme-form theme-form-2 mega-form" method="POST"
                                        enctype="multipart/form-data" action="{{ route('profile.photo.change') }}">
                                        @csrf
                                        <div class="row">
                                            <div class="mb-4 row align-items-center">
                                                <label class="form-label-title col-sm-2 mb-0">New Profile Photo</label>
                                                <div class="col-sm-10">
                                                    <input class="form-control" type="file" name="profile_photo">
                                                    @error('profile_photo')
                                                        <small class="text-danger">{{ $message }}</small>
                                                    @enderror
                                                </div>

                                            </div>
                                        </div>
                                        <div class="mb-4 row align-items-center">
                                            <label class="form-label-title col-sm-2 mb-0"></label>
                                            <div class="col-sm-10">
                                                <button class="btn btn-dark btn--hover">Change Profile Photo</button>
                                            </div>
                                        </div>
                                </div>
                                </form>
                            </div>
                        </div>
                        <!-- Details End -->
                        {{-- <!-- Details Start -->
                        <div class="card">
                            @if (session('success'))
                                <div class="alert alert-primary">
                                    {{ session('success') }}
                                </div>
                            @endif

                            <div class="card-body">
                                <div class="title-header option-title">
                                    <h5>Change Your Name</h5>
                                </div>
                                <form class="theme-form theme-form-2 mega-form" method="POST" enctype="multipart/form-data"
                                    action="{{ route('profile.photo.change') }}">
                                    @csrf
                                    <div class="row">
                                        <div class="mb-4 row align-items-center">
                                            <label class="form-label-title col-sm-2 mb-0">New Profile Photo</label>
                                            <div class="col-sm-10">
                                                <input class="form-control" type="file" name="profile_photo">
                                                @error('profile_photo')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>

                                        </div>
                                    </div>
                                    <div class="mb-4 row align-items-center">
                                        <label class="form-label-title col-sm-2 mb-0"></label>
                                        <div class="col-sm-10">
                                            <button class="btn btn-dark btn--hover">Change Profile Photo</button>
                                        </div>
                                    </div>
                            </div>
                            </form>
                        </div>
                    </div> --}}
                        <!-- Details End -->
                        <!-- Details Start -->
                        <div class="card">
                            @if (session('status'))
                                <div class="alert alert-primary">
                                    {{ session('status') }}
                                </div>
                            @endif
                            @if ($errors->updatePassword->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->updatePassword->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <div class="card-body">
                                <div class="title-header option-title">
                                    <h5>Change Password</h5>
                                </div>
                                <form class="theme-form theme-form-2 mega-form" method="POST"
                                    action="{{ route('password.update') }}">
                                    @csrf
                                    @method('put')
                                    <div class="row">
                                        <div class="mb-4 row align-items-center">
                                            <label class="form-label-title col-sm-2 mb-0">Current
                                                Password</label>
                                            <div class="col-sm-9">
                                                <input class="form-control" type="password"
                                                    placeholder="Enter Your Cureent Password" name="current_password"
                                                    id="current_password">

                                                {{-- @error('current_password')
                                                        <small class="text-danger">{{ $message }}</small>
                                                    @enderror --}}

                                            </div>
                                            <div class="col-sm-1">
                                                <script>
                                                    function showCurrentPassword() {
                                                        var x = document.getElementById("current_password");
                                                        if (x.type === "password") {
                                                            x.type = "text";
                                                        } else {
                                                            x.type = "password";
                                                        }
                                                    }
                                                </script>
                                                <a class="btn btn-air-light" onclick="showCurrentPassword()">
                                                    <i class="fa fa-eye"></i>
                                                </a>
                                            </div>
                                        </div>

                                        <div class="mb-4 row align-items-center">
                                            <label class="form-label-title col-sm-2 mb-0">New
                                                Password</label>
                                            <div class="col-sm-9">
                                                <input class="form-control" type="password"
                                                    placeholder="Enter Your New Passowrd" name="password" id="password">
                                                @error('password')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                            <div class="col-sm-1">
                                                <script>
                                                    function showPassword() {
                                                        var x = document.getElementById("password");
                                                        if (x.type === "password") {
                                                            x.type = "text";
                                                        } else {
                                                            x.type = "password";
                                                        }
                                                    }
                                                </script>
                                                <a class="btn btn-air-light" onclick="showPassword()">
                                                    <i class="fa fa-eye"></i>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="mb-4 row align-items-center">
                                            <label class="form-label-title col-sm-2 mb-0">Confirm
                                                Password</label>
                                            <div class="col-sm-9">
                                                <input class="form-control" type="password"
                                                    placeholder="Enter Your Confirm Passowrd" name="password_confirmation"
                                                    id="password_confirmation">
                                                @error('password_confirmation')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                            <div class="col-sm-1">
                                                <script>
                                                    function showConfirmPassword() {
                                                        var x = document.getElementById("password_confirmation");
                                                        if (x.type === "password") {
                                                            x.type = "text";
                                                        } else {
                                                            x.type = "password";
                                                        }
                                                    }
                                                </script>
                                                <a class="btn btn-air-light" onclick="showConfirmPassword()">
                                                    <i class="fa fa-eye"></i>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="mb-4 row align-items-center">
                                            <label class="form-label-title col-sm-2 mb-0"></label>
                                            <div class="col-sm-10">
                                                <button class="btn btn-dark btn--hover">Change
                                                    Password</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <!-- Details End -->

                        <!-- Address Start -->
                        <div class="card">
                            <div class="card-body">
                                <div class="card-header-2 mb-3">
                                    <h5>Address</h5>
                                </div>

                                <div class="save-details-box">
                                    <div class="row g-4">
                                        <div class="col-xl-4 col-md-6">
                                            <div class="save-details">
                                                <div class="save-name">
                                                    <h5>Mark Jugal</h5>
                                                </div>

                                                <div class="save-position">
                                                    <h6>Home</h6>
                                                </div>

                                                <div class="save-address">
                                                    <p>549 Sulphur Springs Road</p>
                                                    <p>Downers Grove, IL</p>
                                                    <p>60515</p>
                                                </div>

                                                <div class="mobile">
                                                    <p class="mobile">Mobile No. +1-123-456-7890</p>
                                                </div>

                                                <div class="button">
                                                    <a href="javascript:void(0)" class="btn btn-sm">Edit</a>
                                                    <a href="javascript:void(0)" class="btn btn-sm">Remove</a>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-xl-4 col-md-6">
                                            <div class="save-details">
                                                <div class="save-name">
                                                    <h5>Method Zaki</h5>
                                                </div>

                                                <div class="save-position">
                                                    <h6>Office</h6>
                                                </div>

                                                <div class="save-address">
                                                    <p>549 Sulphur Springs Road</p>
                                                    <p>Downers Grove, IL</p>
                                                    <p>60515</p>
                                                </div>

                                                <div class="mobile">
                                                    <p class="mobile">Mobile No. +1-123-456-7890</p>
                                                </div>

                                                <div class="button">
                                                    <a href="javascript:void(0)" class="btn btn-sm">Edit</a>
                                                    <a href="javascript:void(0)" class="btn btn-sm">
                                                        Remove</a>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-xl-4 col-md-6">
                                            <div class="save-details">
                                                <div class="save-name">
                                                    <h5>Mark Jugal</h5>
                                                </div>

                                                <div class="save-position">
                                                    <h6>Home</h6>
                                                </div>

                                                <div class="save-address">
                                                    <p>549 Sulphur Springs Road</p>
                                                    <p>Downers Grove, IL</p>
                                                    <p>60515</p>
                                                </div>

                                                <div class="mobile">
                                                    <p class="mobile">Mobile No. +1-123-456-7890</p>
                                                </div>

                                                <div class="button">
                                                    <a href="javascript:void(0)" class="btn btn-sm">Edit</a>
                                                    <a href="javascript:void(0)" class="btn btn-sm">Remove</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Address End -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <!-- Settings Section End -->
    </div>
    <!-- Page Body End-->
@endsection
