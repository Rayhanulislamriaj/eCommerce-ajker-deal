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
                                <h5>All Category ({{ $categories->count() }})</h5>
                                <form class="d-inline-flex">
                                    <a href="{{ route('category.create') }}" class="align-items-center btn btn-theme">
                                        <i data-feather="plus-square"></i>Add New
                                    </a>
                                </form>
                            </div>

                            <div class="table-responsive category-table">
                                <table class="table all-package theme-table" id="table_id">
                                    <thead>
                                        <tr>
                                            <th>Category Name</th>
                                            <th>Date</th>
                                            <th>Category Icon</th>
                                            <th>Slug</th>
                                            <th>Option</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($categories as $category)
                                            <tr>
                                                <td>{{ $category->category_name }}</td>
                                                <td>{{ $category->created_at }}</td>

                                                <td>
                                                    <div class="category-icon">
                                                        <img src="{{ asset('uploads/category_icons') }}/{{ $category->category_icon }}"
                                                            class="img-fluid" alt="Not found!">

                                                    </div>
                                                </td>

                                                <td>
                                                    <a href="">{{ $category->category_slug }}</a>
                                                </td>

                                                <td>
                                                    <ul>
                                                        <li>
                                                            <a href="{{ route('category.show', $category->id) }}">
                                                                <i class="ri-eye-line"></i>
                                                            </a>
                                                        </li>

                                                        <li>
                                                            <a href="{{ route('category.edit', $category->id) }}">
                                                                <i class="ri-pencil-line"></i>
                                                            </a>
                                                        </li>

                                                        <li>
                                                            <form action="{{ route('category.destroy', $category->id) }}"
                                                                method="POST">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button class="btn btn-sm btn-secondary" type="submit">
                                                                    {{-- <i class="text-danger ri-delete-bin-line"></i> --}}
                                                                    Deactive
                                                                </button>
                                                            </form>
                                                        </li>
                                                    </ul>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="5" class="text-center text-danger">No Category to show!</td>
                                            </tr>
                                        @endforelse

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-header bg-success">
                                <div class="title-header option-title">
                                    <h5 class="m-3">Category Recycle Bin</h5>

                                </div>
                            </div>


                            <div class="table-responsive category-table">
                                <table class="table all-package theme-table" id="table_id">
                                    <thead>
                                        <tr>
                                            <th>Category Name</th>
                                            <th>Date</th>
                                            <th>Category Icon</th>
                                            <th>Slug</th>
                                            <th>Option</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($deleted_categories as $deleted_category)
                                            <tr>
                                                <td>{{ $deleted_category->category_name }}</td>
                                                <td>{{ $deleted_category->created_at }}</td>

                                                <td>
                                                    <div class="category-icon">
                                                        <img src="{{ asset('uploads/category_icons') }}/{{ $deleted_category->category_icon }}"
                                                            class="img-fluid" alt="Not found!">

                                                    </div>
                                                </td>

                                                <td>
                                                    <a href="">{{ $deleted_category->category_slug }}</a>
                                                </td>

                                                <td>
                                                    <ul>


                                                        <li>
                                                            <a href="{{ route('category.restore', $deleted_category->id) }}"
                                                                class="btn btn-sm btn-primary" type="submit">
                                                                {{-- <i class="text-danger ri-delete-bin-line"></i> --}}
                                                                Restore
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="{{ route('category.parmanent.delete', $deleted_category->id) }}"
                                                                class="btn btn-sm btn-secondary" type="submit">
                                                                {{-- <i class="text-danger ri-delete-bin-line"></i> --}}
                                                                Parmanent Delete
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="5" class="text-center text-danger">No Category to show!</td>
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
        <!-- All User Table Ends-->
    @endsection
