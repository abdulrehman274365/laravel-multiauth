@extends('layouts.app')
@section('content')

<!-- ============================================================== -->
<!-- Start right Content here -->
<!-- ============================================================== -->
@php
    $workspace = session()->get('workspace')
@endphp

<style>
    #digitalClock {
        border-radius: 12px;
        background: var(--bs-body-bg);
    }
</style>

<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Dashboard</h4>
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Appzia</a></li>
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>
        <!-- end page title -->
         
        <div class="col-md-12">
            <div class="card border-0 shadow-lg overflow-hidden rounded-3 profile-card">

                {{-- 1. Gradient Banner Background --}}
                <div class="card-header border-0 p-0"
                    style="height: 50px; background: linear-gradient(135deg, #04A2B3 0%, #2A323C 100%);">
                </div>

                <div class="card-body p-4 position-relative">

                    {{-- 2. Profile Image (Overlapping) --}}
                    <div class="profile-img-container mb-4">
                        <img src="{{ asset('web/uploads/profile_image/' . auth()->user()->profile_image) }}"
                            class="rounded-circle border border-4 border-white shadow-sm" width="140" height="140"
                            alt="User Image" style="object-fit: cover;">

                        {{-- Status Indicator Dot --}}
                        <span class="position-absolute bottom-0 end-0 p-2 border border-2 border-white rounded-circle
                    @if(auth()->user()->status == 'active') bg-success
                    @elseif(auth()->user()->status == 'inactive') bg-secondary
                    @else bg-danger @endif" style="right: 15px; bottom: 10px;">
                        </span>
                    </div>

                    {{-- 3. Main Header Info --}}
                    <div class="d-flex justify-content-between align-items-start flex-wrap">
                        <div>
                            <h3 class="fw-bold text-dark mb-0">{{ auth()->user()->name }}
                                {{ auth()->user()->last_name }}</h3>
                            <p class="text-muted text-uppercase small fw-bold mb-3 ls-1">{{ auth()->user()->user_type }}
                            </p>

                            <span class="badge rounded-pill px-3 py-2 
                        @if(auth()->user()->status == 'active') bg-light text-success border border-success
                        @elseif(auth()->user()->status == 'inactive') bg-light text-secondary border border-secondary
                        @else bg-light text-danger border border-danger @endif">
                                <i class="fas fa-circle me-1 small"></i> {{ ucfirst(auth()->user()->status) }}
                            </span>
                        </div>

                        {{-- Optional: Action Button --}}
                        <div class="mt-3 mt-md-0">
                            <button class="btn btn-outline-primary btn-sm rounded-pill px-4">
                                <i class="fas fa-edit me-1"></i> Edit Profile
                            </button>
                        </div>
                    </div>

                    <hr class="my-4 text-muted opacity-25">

                    {{-- 4. Information Grid with Icons --}}
                    <div class="row g-4">
                        {{-- Email --}}
                        <div class="col-md-4 col-sm-6">
                            <div class="d-flex align-items-center p-3 bg-light rounded-3 h-100">
                                <div class="icon-box bg-white text-primary shadow-sm rounded-circle me-3">
                                    <i class="fas fa-envelope"></i>
                                </div>
                                <div>
                                    <small class="text-muted d-block">Email Address</small>
                                    <span class="fw-medium text-dark">{{ auth()->user()->email }}</span>
                                </div>
                            </div>
                        </div>

                        {{-- Phone --}}
                        @if(auth()->user()->phone)
                            <div class="col-md-4 col-sm-6">
                                <div class="d-flex align-items-center p-3 bg-light rounded-3 h-100">
                                    <div class="icon-box bg-white text-success shadow-sm rounded-circle me-3">
                                        <i class="fas fa-phone"></i>
                                    </div>
                                    <div>
                                        <small class="text-muted d-block">Phone Number</small>
                                        <span class="fw-medium text-dark">{{ auth()->user()->phone }}</span>
                                    </div>
                                </div>
                            </div>
                        @endif

                        {{-- Gender --}}
                        @if(auth()->user()->gender)
                            <div class="col-md-4 col-sm-6">
                                <div class="d-flex align-items-center p-3 bg-light rounded-3 h-100">
                                    <div class="icon-box bg-white text-info shadow-sm rounded-circle me-3">
                                        <i class="fas fa-user"></i>
                                    </div>
                                    <div>
                                        <small class="text-muted d-block">Gender</small>
                                        <span class="fw-medium text-dark">{{ ucfirst(auth()->user()->gender) }}</span>
                                    </div>
                                </div>
                            </div>
                        @endif

                        {{-- Employee ID --}}
                        @if(auth()->user()->employe_number)
                            <div class="col-md-4 col-sm-6">
                                <div class="d-flex align-items-center p-3 bg-light rounded-3 h-100">
                                    <div class="icon-box bg-white text-warning shadow-sm rounded-circle me-3">
                                        <i class="fas fa-id-badge"></i>
                                    </div>
                                    <div>
                                        <small class="text-muted d-block">Employee ID</small>
                                        <span class="fw-medium text-dark">{{ auth()->user()->employe_number }}</span>
                                    </div>
                                </div>
                            </div>
                        @endif

                        {{-- ID Card --}}
                        @if(auth()->user()->id_card)
                            <div class="col-md-4 col-sm-6">
                                <div class="d-flex align-items-center p-3 bg-light rounded-3 h-100">
                                    <div class="icon-box bg-white text-secondary shadow-sm rounded-circle me-3">
                                        <i class="fas fa-address-card"></i>
                                    </div>
                                    <div>
                                        <small class="text-muted d-block">CNIC / ID</small>
                                        <span class="fw-medium text-dark">{{ auth()->user()->id_card }}</span>
                                    </div>
                                </div>
                            </div>
                        @endif

                        {{-- Address (Full Width) --}}
                        @if(auth()->user()->address)
                            <div class="col-12">
                                <div class="d-flex align-items-center p-3 bg-light rounded-3 h-100">
                                    <div class="icon-box bg-white text-danger shadow-sm rounded-circle me-3">
                                        <i class="fas fa-map-marker-alt"></i>
                                    </div>
                                    <div>
                                        <small class="text-muted d-block">Current Address</small>
                                        <span class="fw-medium text-dark">{{ auth()->user()->address }}</span>
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        <style>
            /* Custom Styling for Professional Look */
            .profile-card {
                transition: transform 0.3s ease, box-shadow 0.3s ease;
            }

            .profile-card:hover {
                transform: translateY(-5px);
                box-shadow: 0 15px 30px rgba(0, 0, 0, 0.1) !important;
            }

            /* Negative margin to pull image up into banner */
            .profile-img-container {
                margin-top: -85px;
                display: inline-block;
                position: relative;
            }

            .ls-1 {
                letter-spacing: 1px;
            }

            /* Icon Box Styling */
            .icon-box {
                width: 45px;
                height: 45px;
                display: flex;
                align-items: center;
                justify-content: center;
                font-size: 1.2rem;
            }
        </style>

        <div class="d-flex justify-content-center mb-3">
            <div id="digitalClock" class="card shadow-sm px-3 py-2 text-center">
                <div id="clockTime" class="fw-bold fs-4"></div>
                <div id="clockDate" class="text-muted small"></div>
            </div>
        </div>

    </div>
</div>
<!-- End Page-content -->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<script>
    $(document).ready(function () {

        function updateClock() {
            const now = new Date();

            const time = now.toLocaleTimeString('en-US', {
                hour: '2-digit',
                minute: '2-digit',
                second: '2-digit',
                hour12: true
            });

            const date = now.toLocaleDateString('en-US', {
                weekday: 'long',
                year: 'numeric',
                month: 'long',
                day: 'numeric'
            });

            $('#clockTime').text(time);
            $('#clockDate').text(date);
        }

        updateClock();              // initial call
        setInterval(updateClock, 1000);
    });
</script>

@stop