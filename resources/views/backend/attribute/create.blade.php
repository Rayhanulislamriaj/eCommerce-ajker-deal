@extends('layouts.backend_master')
@section('content')
    <div class="page-body">

        <!-- New Product Add Start -->
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="card">
                                <div class="card-body">
                                    <div class="card-header-2">
                                        <h5>Color add Form</h5>
                                    </div>

                                    @if (session('success_color'))
                                        <div class="alert alert-primary">{{ session('success_color') }}</div>
                                    @endif


                                    <form class="theme-form theme-form-2 mega-form" method="POST"
                                        action="{{ route('color.store') }}">
                                        @csrf


                                        <div class="mb-4 row align-items-center">
                                            <label class="form-label-title col-sm-3 mb-0">Color Name</label>
                                            <div class="col-sm-9">
                                                <input class="" type="text" placeholder="Color Name"
                                                    id="color_picker" name="color_name">
                                                @error('color_name')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                        </div>



                                        <div class="mb-4 row align-items-center">
                                            <div class="col-sm-3">
                                            </div>
                                            <div class="col-sm-7">
                                                <button type="submit" class="btn btn-dark"> Add New Color </button>
                                            </div>
                                        </div>
                                    </form>
                                    @foreach ($colors as $color)
                                        <li>{{ $color->color_name }}</li>
                                    @endforeach
                                </div>
                            </div>
                        </div>


                        <div class="col-sm-6">
                            <div class="card">
                                <div class="card-body">
                                    <div class="card-header-2">
                                        <h5>Size add Form</h5>
                                    </div>

                                    @if (session('success_size'))
                                        <div class="alert alert-primary">{{ session('success_size') }}</div>
                                    @endif


                                    <form class="theme-form theme-form-2 mega-form" method="POST"
                                        action="{{ route('size.store') }}">
                                        @csrf


                                        <div class="mb-4 row align-items-center">
                                            <label class="form-label-title col-sm-3 mb-0">Size Name</label>
                                            <div class="col-sm-9">
                                                <input class="" type="text" placeholder="Size Name"
                                                    id="size_picker" name="size_name">
                                                @error('size_name')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                        </div>



                                        <div class="mb-4 row align-items-center">
                                            <div class="col-sm-3">
                                            </div>
                                            <div class="col-sm-7">
                                                <button type="submit" class="btn btn-dark"> Add New Size </button>
                                            </div>
                                        </div>
                                    </form>
                                    @foreach ($sizes as $size)
                                        <li>{{ $size->size_name }}</li>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- New Product Add End -->
    @endsection

    @section('footer_scripts')
        <script>
            $(function() {
                $("#color_picker").selectize({
                    delimiter: ",",
                    persist: false,
                    create: function(input) {
                        return {
                            value: input,
                            text: input,
                        };
                    },
                });
                $("#size_picker").selectize({
                    delimiter: ",",
                    persist: false,
                    create: function(input) {
                        return {
                            value: input,
                            text: input,
                        };
                    },
                });
            });
        </script>
    @endsection
