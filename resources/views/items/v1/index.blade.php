@extends('layouts.app')
@section('content')

<!-- ============================================================== -->
<!-- Start right Content here -->
<!-- ============================================================== -->


<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Items</h4>
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Appzia</a></li>
                            <li class="breadcrumb-item active">Items</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>
        <!-- end page title -->

        <!--- ITEMS SUMMARY-->
        <div class="row">
            <div class="col-sm-6 col-lg-3">
                <div class="card text-center">
                    <div class="card-body">
                        <h4 class="card-title text-muted">Total Subscription</h4>
                        <h2 class="mt-3 mb-2"><i class="mdi mdi-arrow-down text-danger me-2"></i><b>8952</b>
                        </h2>
                        <p class="text-muted mb-0 mt-3"><b>48%</b> From Last 24 Hours</p>
                    </div>
                </div>
            </div>

            <div class="col-sm-6 col-lg-3">
                <div class="card text-center">
                    <div class="card-body p-t-10">
                        <h4 class="card-title text-muted mb-0">Order Status</h4>
                        <h2 class="mt-3 mb-2"><i class="mdi mdi-arrow-up text-success me-2"></i><b>6521</b></h2>
                        <p class="text-muted mb-0 mt-3"><b>42%</b> Orders in Last 10 months</p>
                    </div>
                </div>
            </div>

            <div class="col-sm-6 col-lg-3">
                <div class="card text-center">
                    <div class="card-body p-t-10">
                        <h4 class="card-title text-muted mb-0">Unique Visitors</h4>
                        <h2 class="mt-3 mb-2"><i class="mdi mdi-arrow-up text-success me-2"></i><b>452</b></h2>
                        <p class="text-muted mb-0 mt-3"><b>22%</b> From Last 24 Hours</p>
                    </div>
                </div>
            </div>

            <div class="col-sm-6 col-lg-3">
                <div class="card text-center">
                    <div class="card-body p-t-10">
                        <h4 class="card-title text-muted mb-0">Monthly Earnings</h4>
                        <h2 class="mt-3 mb-2"><i class="mdi mdi-arrow-down text-danger me-2"></i><b>5621</b>
                        </h2>
                        <p class="text-muted mb-0 mt-3"><b>35%</b> From Last 1 Month</p>
                    </div>
                </div>
            </div>
        </div>
        <!--- ITEMS SUMMARY-->


        <div class="row">
            <div class="col-12">
                <div class="bg-white rounded shadow-sm p-4">
                    <div class="border-bottom mb-2">
                        <small class="text-muted fw-bold text-uppercase ">Select Option</small>
                    </div>

                    <ul class="list-unstyled m-0">

                        <li class="py-2 menu-item">
                            <a href="#" class="text-dark text-decoration-none d-flex align-items-center">
                                <i class="ri-add-line me-2 fs-5"></i> New Item
                            </a>
                        </li>

                        <li class="py-2  menu-item">
                            <a href="#" class="text-dark text-decoration-none d-flex align-items-center">
                                <i class="ri-file-list-line me-2 fs-5"></i> Items List
                            </a>
                        </li>

                        <li class="py-2  menu-item">
                            <a href="#" class="text-dark text-decoration-none d-flex align-items-center">
                                <i class="ri-folder-add-line me-2 fs-5"></i> New Category
                            </a>
                        </li>

                        <li class="py-2  menu-item">
                            <a href="#" class="text-dark text-decoration-none d-flex align-items-center">
                                <i class="ri-folders-line me-2 fs-5"></i> Categories List
                            </a>
                        </li>

                    </ul>
                </div>
            </div>
        </div>

        <style>
            .menu-item:hover {
                background: #f8f9fa;
                border-radius: 6px;
                cursor: pointer;
                padding-left: 8px;
                transition: 0.2s;
            }
        </style>



    </div>
</div>
<!-- End Page-content -->

@stop