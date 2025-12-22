@extends('layouts.app')
@section('content')
<style>
    .activity-log .log-item {
        box-shadow: 0 3px 5px rgba(0, 0, 0, 0.12);
        transition:
            transform 0.2s ease,
            box-shadow 0.2s ease;
        will-change: transform;
    }

    .activity-log .log-item:hover {
        transform: scale(1.015);
        box-shadow: 0 8px 22px rgba(0, 0, 0, 0.12);
    }


    .log-icon {
        width: 42px;
        height: 42px;
        min-width: 42px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 18px;
    }
</style>
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
                <div class="card shadow-sm border-0">
                    <div class="card-body">
                        <h4 class="card-title mb-1">Activity Logs</h4>
                        <small class="text-muted">Recent activities visible to admin</small>

                        <div class="activity-log mt-3">
                            @forelse ($logs as $log)
                                <div class="d-flex align-items-start gap-3 p-3 rounded log-item mb-2">

                                    <!-- Icon -->
                                    <div class="log-icon"
                                        style="color:{{ $log->log_style['color'] }};background:{{ $log->log_style['backgroundColor'] }}">
                                        <i class="{{ $log->log_icon }}"></i>
                                    </div>

                                    <!-- Content -->
                                    <div class="flex-grow-1">
                                        <div class="d-flex justify-content-between align-items-start">
                                            <h6 class="mb-1 fw-semibold">
                                                {{ $log->log_title }}
                                            </h6>

                                            <!-- Time (Right Corner) -->
                                            <small class="text-secondary text-nowrap">
                                                {{ $log->created_at->diffForHumans() }}
                                            </small>
                                        </div>

                                        <p class="mb-0 text-muted small">
                                            {{ $log->user_log }}
                                        </p>
                                    </div>

                                </div>
                            @empty
                                <div class="text-center text-muted py-4">
                                    No activity found
                                </div>
                            @endforelse
                        </div>
                        
                    </div>
                </div>
            </div>


        </div>

    </div>
</div>
@stop