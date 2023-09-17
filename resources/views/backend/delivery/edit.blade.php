@extends('layouts.backend_master')
@section('content')
    <div class="page-body">

        <!-- New Product Add Start -->
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="row">
                        <div class="col-sm-8 m-auto">
                            <div class="card">
                                <div class="card-body">
                                    <div class="card-header-2">
                                        <h5>Delivery Cost Information</h5>
                                    </div>

                                    @if (session('success'))
                                        <div class="alert alert-primary">{{ session('success') }}</div>
                                    @endif


                                    <form class="theme-form theme-form-2 mega-form" method="POST"
                                        action="{{ route('delivery.update', $delivery->id) }}">
                                        @csrf
                                        @method('PUT')
                                        <div class="mb-4 row align-items-center">
                                            <label class="form-label-title col-sm-3 mb-0">Delivery Details</label>
                                            <div class="col-sm-9">
                                                <input class="form-control" type="text" name="details"
                                                    value="{{ $delivery->details }}">
                                                @error('details')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="mb-4 row align-items-center">
                                            <label class="form-label-title col-sm-3 mb-0">Delivery Cost</label>
                                            <div class="col-sm-9">
                                                <input class="form-control" type="text" name="cost"
                                                    value="{{ $delivery->cost }}">
                                                @error('cost')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="mb-4 row align-items-center">
                                            <div class="col-sm-3">
                                            </div>
                                            <div class="col-sm-7">
                                                <button type="submit" class="btn btn-dark">Update Delivery Details
                                                </button>
                                            </div>
                                        </div>


                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- New Product Add End -->
    @endsection
