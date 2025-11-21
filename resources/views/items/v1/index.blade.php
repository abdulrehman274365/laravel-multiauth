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
                            <li class="breadcrumb-item active">items</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row bg-white rounded shadow-sm p-3">
            <div class="col-12">
                <small class="text-muted fw-bold">Select Option</small>
                <hr>
                <p><i class="ri-user-line align-middle me-1"></i> New Item</p>
                <p><i class="ri-user-line align-middle me-1"></i> Items List</p>

                <p><i class="ri-user-line align-middle me-1"></i> New Category</p>
                <p><i class="ri-user-line align-middle me-1"></i> Categories List</p>

                <p><i class="ri-user-line align-middle me-1"></i> New Tax</p>
                <p><i class="ri-user-line align-middle me-1"></i> Taxs List</p>
            </div>
        </div>


    </div>
</div>
<!-- End Page-content -->

@stop