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
                                        <h5>Create New Admin</h5>
                                    </div>

                                    @if (session('success'))
                                        <div class="alert alert-primary">{{ session('success') }}</div>
                                    @endif


                                    <form class="theme-form theme-form-2 mega-form" enctype="multipart/form-data"
                                        method="POST" action="{{ route('add.new.admin.post') }}">
                                        @csrf
                                        <div class="mb-4 row align-items-center">
                                            <label class="form-label-title col-sm-3 mb-0">Name</label>
                                            <div class="col-sm-9">
                                                <input class="form-control" type="text" placeholder="Name"
                                                    name="name">
                                                @error('name')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="mb-4 row align-items-center">
                                            <label class="form-label-title col-sm-3 mb-0">Email</label>
                                            <div class="col-sm-9">
                                                <input class="form-control" type="email" placeholder="Email Address"
                                                    name="email">
                                                @error('email')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                        </div>



                                        <div class="mb-4 row align-items-center">
                                            <div class="col-sm-3">
                                            </div>
                                            <div class="col-sm-7">
                                                <button type="submit" class="btn btn-primary"> Add New Admin </button>
                                            </div>
                                        </div>


                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12">
                    <div class="row">
                        <div class="col-sm-8 m-auto">
                            <div class="card">
                                <div class="card-body">
                                    <div class="card-header-2">
                                        <h5>Admin List</h5>
                                    </div>
                                    <div class="table-responsive">
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th scope="col">Name</th>
                                                    <th scope="col">Email</th>
                                                    @if (auth()->id() == 1)
                                                        <th scope="col">Action</th>
                                                    @endif

                                                </tr>
                                            </thead>
                                            <tbody>
                                                @forelse ($admins as $admin)
                                                    <tr class="">
                                                        <td>{{ $admin->name }}</td>
                                                        <td>{{ $admin->email }}</td>
                                                        @if (auth()->id() == 1)
                                                            <td>
                                                                @if ($admin->id == 1)
                                                                    <span class="badge bg-success">Super Admin</span>
                                                                @else
                                                                    @if ($admin->deleted_at)
                                                                        <a class="btn btn-sm btn-primary"
                                                                            href="{{ route('active.admin', $admin->id) }}">Active</a>
                                                                    @else
                                                                        <a class="btn btn-sm btn-secondary"
                                                                            href="{{ route('deactive.admin', $admin->id) }}">Deactive</a>
                                                                    @endif
                                                                @endif
                                                            </td>
                                                        @endif
                                                    </tr>
                                                @empty
                                                    Admin list are empty!
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
        </div>
        <!-- New Product Add End -->
    @endsection
