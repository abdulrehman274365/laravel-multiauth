@extends('layouts.app')
@section('content')

<!-- ============================================================== -->
<!-- Start right Content here -->
<!-- ============================================================== -->
@php
    $workspace = session()->get('workspace')
@endphp

<div class="page-content">
    <div class="container-fluid">
        <section>
            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Sprint Summary</h4>
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Appzia</a></li>
                                <li class="breadcrumb-item "><a href="{{ route('sprint.index') }}">Sprint</a></li>
                                <li class="breadcrumb-item active">Summary</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <!-- end page title -->
        </section>

        Create Sprint <a href="{{ route('sprint.create') }}">create new sprint</a>
    </div>
</div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>


@stop