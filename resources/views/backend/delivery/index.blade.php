@extends('layouts.backend_master')
@section('content')
    <!-- Container-fluid starts-->
    <div class="page-body">
        <!-- All User Table Start -->
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="title-header option-title">
                                <h5>All Delivery Details ({{ $deliveries->count() }})</h5>
                                <form class="d-inline-flex">
                                    <a href="{{ route('delivery.create') }}" class="align-items-center btn btn-theme">
                                        <i data-feather="plus-square"></i>Add New
                                    </a>
                                </form>
                            </div>

                            <div class="table-responsive category-table">
                                <table class="table all-package theme-table" id="table_id">
                                    <thead>
                                        <tr>
                                            <th>Delivery Details</th>
                                            <th>Cost</th>
                                            <th>Option</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($deliveries as $delivery)
                                            <tr>
                                                <td>{{ $delivery->details }}</td>
                                                <td>{{ $delivery->cost }}</td>


                                                <td>
                                                    <ul>
                                                        {{-- <li>
                                                            <a href="{{ route('delivery.show', $delivery->id) }}">
                                                                <i class="ri-eye-line"></i>
                                                            </a>
                                                        </li> --}}

                                                        <li>
                                                            <a href="{{ route('delivery.edit', $delivery->id) }}">
                                                                <i class="ri-pencil-line"></i>
                                                            </a>
                                                        </li>

                                                        {{-- <li>
                                                            <form action="{{ route('delivery.destroy', $delivery->id) }}"
                                                                method="POST">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button class="btn btn-sm"type="submit">
                                                                    <i class="text-danger ri-delete-bin-line"></i>
                                                                </button>
                                                            </form>
                                                        </li> --}}
                                                    </ul>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="5" class="text-center text-danger">No Details to show!</td>
                                            </tr>
                                        @endforelse

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- All User Table Ends-->
@endsection
