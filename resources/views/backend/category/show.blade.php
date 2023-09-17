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
                                <h5>Details of - {{ $category->category_name }}</h5>
                                <form class="d-inline-flex">
                                    <a href="add-new-category.html" class="align-items-center btn btn-theme">
                                        <i data-feather="plus-square"></i>Add New
                                    </a>
                                </form>
                            </div>

                            <div class="table-responsive category-table">
                                <table class="table all-package theme-table">
                                    <thead class="">
                                        <tr>
                                            <th>Header</th>
                                            <th>Details</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Category Name</td>
                                            <td>{{ $category->category_name }}</td>
                                        </tr>
                                        <tr>
                                            <td>Category Details</td>
                                            <td>{{ $category->category_details }}</td>
                                        </tr>
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
