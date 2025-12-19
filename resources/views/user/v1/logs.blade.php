@extends('layouts.app')
@section('content')
<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Recent</h4>
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Appzia</a></li>
                            <li class="breadcrumb-item active">Recent Activity</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">

            <div class="col-md-12">
                <div class="card card-body">
                    <h3 class="card-title">Log title</h3>
                    <small class="fw-bold mb-2">Here is all recent activity and visible to admin.</small>
                    @foreach ($logs as $log)
                        <div class="alert alert-light" role="alert">
                            <i class="{{ $log->log_icon }} me-2"></i>
                            {{ $log->user_log }}
                            <div class="text-end">
                                {{ $log->created_at }}
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

        </div>

    </div>
</div>
@stop