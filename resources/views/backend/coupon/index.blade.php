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
                                        <h5>Coupon Add Form</h5>
                                    </div>

                                    @if (session('success'))
                                        <div class="alert alert-primary">{{ session('success') }}</div>
                                    @endif


                                    <form class="theme-form theme-form-2 mega-form" method="POST"
                                        action="{{ route('coupon.store') }}">
                                        @csrf


                                        <div class="mb-4 row align-items-center">
                                            <label class="form-label-title col-sm-3 mb-0">Coupon Name</label>
                                            <div class="col-sm-9">
                                                <input class="form-control" type="text" placeholder="Coupon Name"
                                                    name="coupon_name">
                                                @error('coupon_name')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="mb-4 row align-items-center">
                                            <label class="form-label-title col-sm-3 mb-0">Discount Percentage (%)</label>
                                            <div class="col-sm-9">
                                                <input class="form-control" type="number"
                                                    placeholder="Discount Percentag (%)" name="discount_percentage">
                                                @error('discount_percentage')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="mb-4 row align-items-center">
                                            <label class="form-label-title col-sm-3 mb-0">Validity</label>
                                            <div class="col-sm-9">
                                                <input class="form-control" type="date" placeholder="Validity"
                                                    name="validity"
                                                    min="{{ \Carbon\Carbon::yesterday()->format('Y-m-d') }}">
                                                @error('validity')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                        </div>


                                        <div class="mb-4 row align-items-center">
                                            <label class="form-label-title col-sm-3 mb-0">Limit</label>
                                            <div class="col-sm-9">
                                                <input class="form-control" type="number" placeholder="Maximum Limit"
                                                    name="limit">
                                                @error('limit')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="mb-4 row align-items-center">
                                            <label class="form-label-title col-sm-3 mb-0">Highest Discount Amount</label>
                                            <div class="col-sm-9">
                                                <input class="form-control" type="number" placeholder="Amount"
                                                    name="highest_discount_amount">
                                                @error('highest_discount_amount')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="mb-4 row align-items-center">
                                            <div class="col-sm-3">
                                            </div>
                                            <div class="col-sm-7">
                                                <button type="submit" class="btn btn-dark"> Add New Coupon </button>
                                            </div>
                                        </div>


                                    </form>
                                </div>
                            </div>

                            <div class="card">
                                <div class="card-body">
                                    <div class="card-header-2">
                                        <h5>Coupon List</h5>
                                    </div>
                                    <div class="table-responsive">
                                        <table class="table table-bordered">
                                            <thead class="table-primary">
                                                <tr>
                                                    <th scope="col">Coupon Name</th>
                                                    <th scope="col">Discount Percentage (%)</th>
                                                    <th scope="col">Validity</th>
                                                    <th scope="col">Limit</th>
                                                    <th scope="col">Highest Discount Amount</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @forelse ($coupons as $coupon)
                                                    <tr class="">
                                                        <td scope="row">{{ $coupon->coupon_name }}</td>
                                                        <td>{{ $coupon->discount_percentage }}%</td>
                                                        <td>{{ $coupon->validity }}</td>
                                                        <td>{{ $coupon->limit }}</td>
                                                        <td>{{ $coupon->highest_discount_amount }}</td>
                                                    </tr>
                                                @empty
                                                    <div class="alert alert-primary form-control text-center">
                                                        Coupon field is empty!
                                                    </div>
                                                @endforelse
                                            </tbody>
                                        </table>
                                        {{ $coupons->links() }}
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
