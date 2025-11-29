@extends('layouts.static.app')
@section('content')

<!-- ============================================================== -->
<!-- Start right Content here -->
<!-- ============================================================== -->

<div class="page-content">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-lg-5">
                <div class="text-center mb-5">
                    <h4>Simple Pricing Plans</h4>
                    <p class="text-muted mb-4">Sed ut perspiciatis unde omnis iste natus error sit voluptatem
                        accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo veritatis</p>

                    <ul class="nav nav-pills pricing-nav-tabs">
                        <li class="nav-item">
                            <a class="nav-link active" href="#">Monthly</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Yearly</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- end row -->

        <div class="row">
            @foreach($plans as $plan)
                <div class="col-xl-3 col-sm-6">
                    <div class="card pricing-box">
                        <div class="card-body p-4">
                            <div class="text-center">
                                <div class="mt-3">
                                    <i class="ri-edit-box-line text-primary h1"></i>
                                </div>
                                <h5 class="mt-4">{{ $plan->title }}</h5>

                                <div class="font-size-14 mt-4 pt-2">
                                    <ul class="list-unstyled plan-features">
                                        <li>Free Live Support</li>
                                        <li>Unlimited User</li>
                                        <li>No Time Tracking</li>
                                    </ul>
                                </div>

                                <div class="mt-5">
                                    <h1 class="fw-bold mb-1"><sup class="me-1"><small>$</small></sup>{{ $plan->price }}</h1>
                                    <p class="text-muted">Per month</p>
                                </div>

                                <div class="mt-5 mb-3">
                                    <form action="{{ route('purchase.plan') }}" method="post" class="">
                                        @csrf
                                        <input type="hidden" name="plan_id" value="{{ $plan->id }}" />
                                        <button type="submit" class="btn btn-primary w-md">Get started</button>
                                    </form>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <!-- end row -->

    </div> <!-- container-fluid -->
</div>
<!-- End Page-content -->


@stop