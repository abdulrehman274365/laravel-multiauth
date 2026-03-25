@extends('layouts.app')
@section('content')
@php
    $workspace = session()->get('workspace');
    $icons = [

        // ========== USER / PROFILE ==========
        "fa-solid fa-user",
        "fa-solid fa-users",
        "fa-solid fa-user-plus",
        "fa-solid fa-user-check",
        "fa-solid fa-user-gear",
        "fa-solid fa-user-tie",
        "fa-solid fa-id-badge",

        // ========== DASHBOARD / UI ==========
        "fa-solid fa-house",
        "fa-solid fa-gauge",
        "fa-solid fa-bars",
        "fa-solid fa-border-all",
        "fa-solid fa-list",
        "fa-solid fa-table",
        "fa-solid fa-layer-group",

        // ========== BUSINESS / OFFICE ==========
        "fa-solid fa-briefcase",
        "fa-solid fa-building",
        "fa-solid fa-chart-line",
        "fa-solid fa-chart-pie",
        "fa-solid fa-chart-column",
        "fa-solid fa-diagram-project",
        "fa-solid fa-sitemap",

        // ========== COMMUNICATION ==========
        "fa-solid fa-envelope",
        "fa-solid fa-envelope-open",
        "fa-solid fa-comments",
        "fa-solid fa-message",
        "fa-solid fa-phone",
        "fa-solid fa-phone-volume",
        "fa-solid fa-headset",

        // ========== FILES / DOCUMENTS ==========
        "fa-solid fa-file",
        "fa-solid fa-file-lines",
        "fa-solid fa-file-circle-check",
        "fa-solid fa-file-pen",
        "fa-solid fa-folder",
        "fa-solid fa-folder-open",
        "fa-solid fa-folder-plus",

        // ========== E-COMMERCE ==========
        "fa-solid fa-cart-shopping",
        "fa-solid fa-bag-shopping",
        "fa-solid fa-store",
        "fa-solid fa-credit-card",
        "fa-solid fa-wallet",
        "fa-solid fa-tag",
        "fa-solid fa-tags",

        // ========== SETTINGS / TOOLS ==========
        "fa-solid fa-gear",
        "fa-solid fa-gears",
        "fa-solid fa-wrench",
        "fa-solid fa-screwdriver-wrench",
        "fa-solid fa-toolbox",
        "fa-solid fa-sliders",

        // ========== SECURITY ==========
        "fa-solid fa-lock",
        "fa-solid fa-lock-open",
        "fa-solid fa-shield",
        "fa-solid fa-shield-halved",
        "fa-solid fa-key",
        "fa-solid fa-fingerprint",

        // ========== MEDIA ==========
        "fa-solid fa-camera",
        "fa-solid fa-image",
        "fa-solid fa-photo-film",
        "fa-solid fa-video",
        "fa-solid fa-volume-high",

        // ========== SOCIAL ==========
        "fa-solid fa-thumbs-up",
        "fa-solid fa-heart",
        "fa-solid fa-star",
        "fa-solid fa-share",
        "fa-solid fa-bell",

        // ========== NAVIGATION ==========
        "fa-solid fa-arrow-right",
        "fa-solid fa-arrow-left",
        "fa-solid fa-arrow-up",
        "fa-solid fa-arrow-down",
        "fa-solid fa-up-right-from-square",

        // ========== STATUS / FEEDBACK ==========
        "fa-solid fa-check",
        "fa-solid fa-xmark",
        "fa-solid fa-circle-check",
        "fa-solid fa-circle-exclamation",
        "fa-solid fa-circle-info",
        "fa-solid fa-triangle-exclamation",

        // ========== MISC ==========
        "fa-solid fa-globe",
        "fa-solid fa-location-dot",
        "fa-solid fa-map",
        "fa-solid fa-clock",
        "fa-solid fa-calendar",
        "fa-solid fa-lightbulb",
        "fa-solid fa-paperclip",
        "fa-solid fa-magnifying-glass",
        "fa-solid fa-truck",
    ];
@endphp
<!-- ============================================================== -->
<!-- Start right Content here -->
<!-- ============================================================== -->
<style>
    .menu-item {
        transition: 0.25s ease;
    }

    .menu-item:hover {
        border-radius: 6px;
        cursor: pointer;
        padding-left: 40px;
        transform: scale(1.03);
    }

    a[aria-expanded="true"] .ri-arrow-down-s-line {
        transform: rotate(180deg);
        transition: 0.3s ease;
    }

    .icon-option {
        padding: 8px;
        border: 2px solid transparent;
        border-radius: 10px;
        cursor: pointer;
        transition: 0.2s ease;
    }

    .icon-option:hover {
        background: #f1f5f9;
    }

    .icon-option input {
        display: none;
    }

    /* Highlight selected icon */
    .icon-option:has(input:checked) {
        border-color: #04a2b3;
        background: #e7f1ff;
    }
</style>

<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Settings</h4>
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Appzia</a></li>
                            <li class="breadcrumb-item active">Settings</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-12">
                <div class="p-4">
                    <div class="border-bottom mb-2">
                        <small class="text-muted fw-bold text-uppercase ">Settings</small>
                    </div>

                    <ul class="list-unstyled m-0" id="settingsAccordion">

                        <!-- Workspace Settings -->
                        <li class="py-2 menu-item">
                            <a class="text-decoration-none d-flex align-items-center justify-content-between"
                                data-bs-toggle="collapse" href="#workspaceSettings" role="button" aria-expanded="false"
                                aria-controls="workspaceSettings">
                                <span>
                                    <i class="fa-solid fa-building me-2 fs-5"></i>
                                    {{ $workspace->name }} settings
                                </span>
                            </a>
                        </li>
                        <li class="collapse ps-4" id="workspaceSettings" data-bs-parent="#settingsAccordion">
                            <ul class="list-unstyled">
                                <li class="py-2 menu-item">
                                    <a href="#" type="button" data-bs-toggle="modal"
                                        data-bs-target=".edit-workspace-modal" class="text-decoration-none">
                                        <i class="fa-solid fa-file-pen"></i> Workspace Profile
                                    </a>
                                </li>
                                <li class="py-2 menu-item">
                                    <form id="workspaceForm" method="POST"
                                        action="{{ route('user.workspace.settings') }}" class="d-inline">
                                        @csrf
                                        <input type="hidden" name="workspace_id" value="{{ $workspace->id }}">
                                    </form>

                                    <a href="javascript:void(0);"
                                        onclick="document.getElementById('workspaceForm').submit();"
                                        class="text-decoration-none">
                                        <i class="fa-solid fa-users me-2"></i>
                                        Users
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <!-- All Workspaces -->
                        <li class="py-2 menu-item">
                            <a class="text-decoration-none d-flex align-items-center justify-content-between"
                                data-bs-toggle="collapse" href="#workspacesSettings" role="button" aria-expanded="false"
                                aria-controls="workspacesSettings">
                                <span>
                                    <i class="fa-solid fa-city me-2 fs-5"></i>
                                    All Workspaces
                                </span>
                            </a>
                        </li>
                        <li class="collapse ps-4" id="workspacesSettings" data-bs-parent="#settingsAccordion">
                            <ul class="list-unstyled">

                                <li class="py-2 menu-item">
                                    <a type="button" data-bs-toggle="modal" data-bs-target=".add-workspace-modal"
                                        class="text-decoration-none">
                                        <i class="fa-solid fa-building-circle-arrow-right"></i>
                                        New Workspace
                                    </a>
                                </li>

                                <li class="py-2 menu-item">
                                    <a href="#" class="text-decoration-none">
                                        <i class="fa-solid fa-pen-to-square me-2"></i>
                                        Edit Workspaces
                                    </a>
                                </li>


                            </ul>
                        </li>

                        <!-- All Users -->
                        <li class="py-2 menu-item">
                            <a class="text-decoration-none d-flex align-items-center justify-content-between"
                                data-bs-toggle="collapse" href="#usersSettings" role="button" aria-expanded="false"
                                aria-controls="usersSettings">
                                <span>
                                    <i class="fa-solid fa-users me-2 fs-5"></i>
                                    Users
                                </span>
                            </a>
                        </li>
                        <li class="collapse ps-4" id="usersSettings" data-bs-parent="#settingsAccordion">
                            <ul class="list-unstyled">
                                <li class="py-2 menu-item">
                                    <a href="{{ route('user.workspace.settings', ['all']) }}"
                                        class="text-decoration-none">
                                        <i class="fa-solid fa-list"></i>
                                        All Users
                                    </a>
                                </li>
                                <li class="py-2 menu-item">
                                    <a href="#" class="text-decoration-none">
                                        <i class="fa-solid fa-user-plus"></i>
                                        New User
                                    </a>
                                </li>
                                <li class="py-2 menu-item">
                                    <a href="#" class="text-decoration-none">
                                        <i class="fa-solid fa-pen-to-square me-2"></i>
                                        Edit Users
                                    </a>
                                </li>
                            </ul>
                        </li>

                    </ul>
                </div>
            </div>
        </div>

    </div>
</div>

{{-- EDIT NEW WORKSPACE --}}
<div class="modal fade edit-workspace-modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">

    <div class="modal-dialog modal-xl">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title" id="myExtraLargeModalLabel">Edit Workspace</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <div class="container">
                    <form class="add-new-workspace-form">
                        <div class="row">

                            <div class="col-md-12 border-bottom mb-3 d-flex align-items-center gap-2">
                                <i class="ri-information-line fs-5"></i>
                                <small class="text-muted fw-bold">GENERAL INFORMATION</small>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label>Name</label>
                                <small class="text-danger fw-bold name-error"></small>
                                <input type="text" name="name" class=" form-control form-control-sm"
                                    value="{{ $workspace->name }}" placeholder="Enter workspace name" />
                            </div>

                            <div class="col-md-6 mb-3">
                                <label>Website</label>
                                <small class="text-danger fw-bold website-error"></small>
                                <input type="text" name="website" class=" form-control form-control-sm"
                                    value="{{ $workspace->website }}" placeholder="Enter workspace website" />
                            </div>

                            <div class="col-md-6 mb-3">
                                <label>Email</label>
                                <small class="text-danger fw-bold email-error"></small>
                                <input type="text" name="email" class="form-control form-control-sm"
                                    placeholder="Enter workspace email" value="{{ $workspace->email }}" />
                            </div>

                            <div class="col-md-6 mb-3">
                                <label>Phone</label>
                                <small class="text-danger fw-bold phone-error"></small>
                                <input type="text" name="phone" class=" form-control form-control-sm"
                                    placeholder="Enter workspace phone" value="{{ $workspace->phone }}" />
                            </div>

                            <div class="col-md-12 border-bottom mb-3 d-flex align-items-center gap-2">
                                <i class="ri-map-pin-line fs-5"></i>
                                <small class="text-muted fw-bold">ADDRESS</small>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label>Country</label>
                                <small class="text-danger fw-bold country-error"></small>
                                <input type="text" name="country" class=" form-control form-control-sm"
                                    placeholder="Enter workspace country" />
                            </div>

                            <div class="col-md-6 mb-3">
                                <label>City</label>
                                <small class="text-danger fw-bold city-error"></small>
                                <input type="text" name="city" class="form-control form-control-sm"
                                    placeholder="Enter workspace city" />
                            </div>

                            <div class="col-md-12 mb-3">
                                <label>Address</label>
                                <small class="text-danger fw-bold address-error"></small>
                                <input type="text" name="address" class="form-control form-control-sm"
                                    value="{{ $workspace->address }}" placeholder="Enter workspace address" />
                            </div>

                            <div class="col-md-12 border-bottom mb-3 d-flex align-items-center gap-2">
                                <i class="ri-palette-line fs-5"></i>
                                <small class="text-muted fw-bold">STYLE</small>
                            </div>

                            <div class="col-md-12 mb-3">
                                <label>Icons</label>
                                <small class="text-danger fw-bold icon-error"></small>

                                <!-- Scrollable Grid Container -->
                                <div class="icon-picker-container border rounded p-2">
                                    <div class="row g-2 icon-grid">

                                        @foreach ($icons as $icon)
                                            <div class="col-2 col-md-1">
                                                <label
                                                    class="icon-option w-100 d-flex justify-content-center align-items-center">
                                                    <input type="radio" name="iconRadio" value="{{ $icon }}">
                                                    <i class="{{ $icon }} fs-4"></i>
                                                </label>
                                            </div>
                                        @endforeach

                                    </div>
                                </div>


                            </div>


                            <div class="col-md-6 mb-3">
                                <label>Color</label>
                                <small class="text-danger fw-bold color-error"></small>
                                <input type="color" name="color" class="form-control form-control-sm" />
                            </div>

                            <div class="col-md-6 mb-3">
                                <label>Background Color</label>
                                <small class="text-danger fw-bold backgroundcolor-error"></small>
                                <input type="color" name="backgroundcolor" class="form-control form-control-sm" />
                            </div>


                        </div>
                    </form>
                </div>
            </div>

            <!-- ✅ Modal Footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                    Close
                </button>
                <button type="button" class="btn btn-primary add-new-workspace">
                    Save
                </button>
            </div>

        </div>
    </div>
</div>

{{-- ADD NEW WORKSPACE --}}
<div class="modal fade add-workspace-modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">

    <div class="modal-dialog modal-xl">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title" id="myExtraLargeModalLabel">Add new Workspace</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <div class="container">
                    <form class="add-new-workspace-form">
                        <div class="row">

                            <div class="col-md-12 border-bottom mb-3 d-flex align-items-center gap-2">
                                <i class="ri-information-line fs-5"></i>
                                <small class="text-muted fw-bold">GENERAL INFORMATION</small>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label>Name</label>
                                <small class="text-danger fw-bold name-error"></small>
                                <input type="text" name="name" class=" form-control form-control-sm"
                                    placeholder="Enter workspace name" />
                            </div>

                            <div class="col-md-6 mb-3">
                                <label>Website</label>
                                <small class="text-danger fw-bold website-error"></small>
                                <input type="text" name="website" class=" form-control form-control-sm"
                                    placeholder="Enter workspace website" />
                            </div>

                            <div class="col-md-6 mb-3">
                                <label>Email</label>
                                <small class="text-danger fw-bold email-error"></small>
                                <input type="text" name="email" class="form-control form-control-sm"
                                    placeholder="Enter workspace email" />
                            </div>

                            <div class="col-md-6 mb-3">
                                <label>Phone</label>
                                <small class="text-danger fw-bold phone-error"></small>
                                <input type="text" name="phone" class=" form-control form-control-sm"
                                    placeholder="Enter workspace phone" />
                            </div>

                            <div class="col-md-12 border-bottom mb-3 d-flex align-items-center gap-2">
                                <i class="ri-map-pin-line fs-5"></i>
                                <small class="text-muted fw-bold">ADDRESS</small>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label>Country</label>
                                <small class="text-danger fw-bold country-error"></small>
                                <input type="text" name="country" class=" form-control form-control-sm"
                                    placeholder="Enter workspace country" />
                            </div>

                            <div class="col-md-6 mb-3">
                                <label>City</label>
                                <small class="text-danger fw-bold city-error"></small>
                                <input type="text" name="city" class="form-control form-control-sm"
                                    placeholder="Enter workspace city" />
                            </div>

                            <div class="col-md-12 mb-3">
                                <label>Address</label>
                                <small class="text-danger fw-bold address-error"></small>
                                <input type="text" name="address" class="form-control form-control-sm"
                                    placeholder="Enter workspace address" />
                            </div>

                            <div class="col-md-12 border-bottom mb-3 d-flex align-items-center gap-2">
                                <i class="ri-palette-line fs-5"></i>
                                <small class="text-muted fw-bold">STYLE</small>
                            </div>

                            <div class="col-md-12 mb-3">
                                <label>Icons</label>
                                <small class="text-danger fw-bold icon-error"></small>

                                <!-- Scrollable Grid Container -->
                                <div class="icon-picker-container border rounded p-2">
                                    <div class="row g-2 icon-grid">

                                        @foreach ($icons as $icon)
                                            <div class="col-2 col-md-1">
                                                <label
                                                    class="icon-option w-100 d-flex justify-content-center align-items-center">
                                                    <input type="radio" name="iconRadio" value="{{ $icon }}">
                                                    <i class="{{ $icon }} fs-4"></i>
                                                </label>
                                            </div>
                                        @endforeach

                                    </div>
                                </div>


                            </div>


                            <div class="col-md-6 mb-3">
                                <label>Color</label>
                                <small class="text-danger fw-bold color-error"></small>
                                <input type="color" name="color" class="form-control form-control-sm" />
                            </div>

                            <div class="col-md-6 mb-3">
                                <label>Background Color</label>
                                <small class="text-danger fw-bold backgroundcolor-error"></small>
                                <input type="color" name="backgroundcolor" class="form-control form-control-sm" />
                            </div>


                        </div>
                    </form>
                </div>
            </div>

            <!-- ✅ Modal Footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                    Close
                </button>
                <button type="button" class="btn btn-primary add-new-workspace">
                    Save
                </button>
            </div>

        </div>
    </div>
</div>

<!-- jQuery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script>
    const user_type = "{{ auth()->user()->user_type }}";
    $(document).ready(function () {

        $(document).on('change', '.workspace-radio', function () {
            let selectedId = $(this).val();
            console.log("Selected Workspace:", selectedId);
            $('.loading-screen').removeClass('d-none')
            $.ajax({
                url: "{{ route('workspaces.selected') }}",
                data: { workspace_id: selectedId },
                type: "POST",
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
                },
                success: function (response) {
                    if (response.success) {
                        console.log(response.success)
                        window.location.href = '{{ route('dashboard') }}';
                    }
                }
            });

        });

        $(document).on('click', '.add-new-workspace', function () {
            validateData();
        });

        function resetWorkspaceForm() {
            let form = $('.add-new-workspace-form');
            form[0].reset();
            form.find('.is-valid, .is-invalid').removeClass('is-valid is-invalid');
            form.find('small.text-danger').text('');
            $('input[name="iconRadio"]').prop('checked', false);
        }

        function validateData() {
            let name = $('input[name="name"]');
            let website = $('input[name="website"]');
            let email = $('input[name="email"]');
            let phone = $('input[name="phone"]');
            let country = $('input[name="country"]');
            let city = $('input[name="city"]');
            let address = $('input[name="address"]');

            let icon = $("input[name='iconRadio']:checked");

            let color = $('input[name="color"]');
            let backgroundcolor = $('input[name="backgroundcolor"]');

            let hasError = false;

            // Regex validators
            let emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            let websiteRegex = /^(https?:\/\/)?([\w\-]+\.)+[\w]{2,}(\/.*)?$/;
            let phoneRegex = /^[0-9]{7,15}$/;

            function required(field, errorClass, message) {
                if (!field.val().trim()) {
                    $(errorClass).text(message);
                    field.removeClass("is-valid").addClass("is-invalid");
                    hasError = true;
                } else {
                    $(errorClass).text("");
                    field.removeClass("is-invalid").addClass("is-valid");
                }
            }

            // Required fields
            required(name, ".name-error", "Workspace name is required");
            required(phone, ".phone-error", "Phone number is required");
            required(country, ".country-error", "Country is required");
            required(city, ".city-error", "City is required");
            required(address, ".address-error", "Address is required");

            // Icon required
            if (icon.length === 0) {
                $(".icon-error").text("Please select an icon");
                hasError = true;
            } else {
                $(".icon-error").text("");
            }

            // Phone
            if (phone.val().trim() && !phoneRegex.test(phone.val().trim())) {
                $(".phone-error").text("Phone must contain only numbers");
                phone.removeClass("is-valid").addClass("is-invalid");
                hasError = true;
            }

            // Website optional
            if (website.val().trim()) {
                if (!websiteRegex.test(website.val().trim())) {
                    $(".website-error").text("Enter a valid website URL");
                    website.removeClass("is-valid").addClass("is-invalid");
                    hasError = true;
                } else {
                    $(".website-error").text("");
                    website.removeClass("is-invalid").addClass("is-valid");
                }
            }

            // Email optional
            if (email.val().trim()) {
                if (!emailRegex.test(email.val().trim())) {
                    $(".email-error").text("Enter a valid email address");
                    email.removeClass("is-valid").addClass("is-invalid");
                    hasError = true;
                } else {
                    $(".email-error").text("");
                    email.removeClass("is-invalid").addClass("is-valid");
                }
            }

            // Log all values
            console.log("FORM DATA:", {
                name: name.val(),
                website: website.val(),
                email: email.val(),
                phone: phone.val(),
                country: country.val(),
                city: city.val(),
                address: address.val(),
                icon: icon.val(),   // ✔ From radio
                color: color.val(),
                backgroundcolor: backgroundcolor.val()
            });

            if (hasError) {
                return false;
            }

            addNewWorkspace()
            return true;
        }

        function addNewWorkspace() {
            let name = $('input[name="name"]').val();
            let website = $('input[name="website"]').val();
            let email = $('input[name="email"]').val();
            let phone = $('input[name="phone"]').val();
            let country = $('input[name="country"]').val();
            let city = $('input[name="city"]').val();
            let address = $('input[name="address"]').val();

            let icon = $("input[name='iconRadio']:checked").val();

            let color = $('input[name="color"]').val();
            let backgroundcolor = $('input[name="backgroundcolor"]').val();

            $.ajax({
                url: "{{ route('workspace.create') }}",
                data: {
                    name: name,
                    website: website,
                    email: email,
                    phone: phone,
                    country: country,
                    city: city,
                    address: address,
                    icon: icon,
                    color: color,
                    backgroundcolor: backgroundcolor,
                },
                type: "POST",
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
                },
                success: function (response) {
                    if (response.success) {
                        $('.add-workspace-modal').modal('hide')
                        resetWorkspaceForm();
                        toastr['success'](
                            'New Workspace Added',
                            'New Workspace'
                        );
                    } else {
                        $('.add-workspace-modal').modal('hide')
                        resetWorkspaceForm();
                        toastr['danger'](
                            'Oopss! Something went wrong.',
                            'Failed'
                        );
                    }
                }
            });

        }
    });
</script>

@stop