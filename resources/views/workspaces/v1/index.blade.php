<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Workspace Grid — Modern</title>


    <!-- Bootstrap Css -->
    <link href="{{ asset('web/assets/css/bootstrap.min.css') }}" id="bootstrap-style" rel="stylesheet">

    <!-- Icons Css -->
    <link href="{{ asset('web/assets/css/icons.min.css') }}" rel="stylesheet">

    <!-- App Css -->
    <link href="{{ asset('web/assets/css/app.min.css') }}" id="app-style" rel="stylesheet">

    <!-- jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css"
        integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <meta name="csrf-token" content="{{ csrf_token() }}">


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


    <style>
        :root {
            --primary: #04A2B3;
            --secondary: #3C4957;
            --dark-bg: #323C48;
        }

        body {
            background: #eef1f6;
            font-family: "Inter", sans-serif;
        }

        /* Header Section — Gradient using primary + darker tint */
        .header-section {
            background: linear-gradient(135deg, var(--primary), #067e8b);
            padding: 35px 20px;
            border-radius: 5px;
            color: white;
            margin-bottom: 25px;
            box-shadow: 0 8px 18px rgba(0, 0, 0, 0.1);
        }

        /* Scroll Wrapper */
        .workspace-wrapper {
            max-height: 450px;
            overflow-y: auto;
            padding-right: 5px;

            /* Hide scrollbars */
            scrollbar-width: none;
            -ms-overflow-style: none;
        }

        .workspace-wrapper::-webkit-scrollbar {
            display: none;
        }

        /* Workspace Cards */
        .workspace-card {
            border-radius: 16px;
            background: white;
            transition: 0.25s ease;
            border: 1px solid #f1f1f1;
        }

        .workspace-card:hover {
            transform: translateY(-6px);
            box-shadow: 0 12px 26px rgba(0, 0, 0, 0.08);
            background: #ffffff;
            border-color: var(--primary);
        }

        /* Icon color uses your primary */
        .workspace-card i {
            color: var(--primary);
        }

        /* Active selection */
        .selected-card {
            border: 2px solid var(--primary) !important;
            background: rgba(4, 162, 179, 0.08) !important;
            transform: translateY(-4px);
            box-shadow: 0 8px 18px rgba(4, 162, 179, 0.15);
        }

        /* Secondary text tone */
        .text-secondary-custom {
            color: var(--secondary) !important;
        }

        .workspace-container {
            max-width: 1150px;
        }

        .loading-screen {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(255, 255, 255, 0.5);
            display: flex;
            justify-content: center;
            align-items: center;
            z-index: 9999;
        }

        .icon-picker-container {
            max-height: 250px;
            /* fixed height */
            overflow-y: auto;
            /* vertical scroll */
            background: #fff;
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

        .add-workspace-modal .modal-dialog {
            max-height: 90vh;
        }

        .add-workspace-modal .modal-content {
            max-height: 90vh;
            display: flex;
            flex-direction: column;
        }

        .add-workspace-modal .modal-body {
            overflow-y: auto !important;
            padding-right: 10px;
        }

        .add-workspace-modal .modal-body::-webkit-scrollbar {
            width: 6px;
        }

        .add-workspace-modal .modal-body::-webkit-scrollbar-thumb {
            background: #ccc;
            border-radius: 20px;
        }
    </style>

</head>

<body>
    <div class="loading-screen d-none">
        <div class="loading-content text-center">
            <i class="fa-solid fa-spinner fa-spin-pulse" style="font-size: 100px;"></i>
        </div>
    </div>
    <div class="container py-5 d-flex justify-content-center">
        <div class="workspace-container w-100">

            <!-- Modern Gradient Header -->
            <div class="header-section text-center mb-4">
                <h2 class="fw-bold mb-1">Your Workspaces</h2>
                <p class="opacity-75 mb-0">Select the workspace you want to work on</p>
            </div>

            <!-- Scrollable Workspaces -->
            <div class="card shadow-sm border-0 p-4 workspace-wrapper mx-auto">

                <div class="loading-div d-none card shadow-sm border-0 p-4 workspace-wrapper mx-auto text-center">
                    <div class="loading-content text-center">
                        <i class="fa-solid fa-spinner fa-spin-pulse" style="font-size: 50px;"></i>
                    </div>
                </div>
                <div id="get-workspace-container"></div>


            </div>

            <div class="d-flex justify-content-center gap-2 mt-3 button-div d-none">
                @if(Auth::check())
                    @if($workspace)
                        <a href="{{ route('dashboard') }}"
                            class="btn btn-outline-primary d-inline-flex align-items-center gap-2">
                            <i class="ri-dashboard-line"></i>
                            Dashboard
                        </a>
                    @endif
                    @if(auth()->user()->user_type == 'owner')
                        <button type="button" class="btn btn-outline-secondary d-inline-flex align-items-center gap-2"
                            data-bs-toggle="modal" data-bs-target=".add-workspace-modal">
                            <i class="ri-add-circle-line"></i> Add Workspace</button>
                    @endif
                    <form method="POST" action="{{ route('logout') }}" class="d-inline">
                        @csrf
                        <a href="{{route('logout')}}" onclick="event.preventDefault(); this.closest('form').submit();"
                            class="btn btn-outline-danger d-inline-flex align-items-center gap-2">
                            <i class="ri-logout-circle-line"></i>
                            Logout
                        </a>
                    </form>
                @endif
            </div>

        </div>
    </div>


    <!--  Modal content for the above example -->
    <div class="modal fade add-workspace-modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">

        <div class="modal-dialog modal-xl">
            <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title" id="myExtraLargeModalLabel">Extra large modal</h5>
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


    <script>
        const user_type = "{{ auth()->user()->user_type }}";
        $(document).ready(function () {
            getWorkspaces();

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
                        getWorkspaces();
                    }
                });

            }

            function getWorkspaces() {
                $('.loading-div').removeClass('d-none');
                $('.add-workspace-modal').modal('hide');
                resetWorkspaceForm()
                $.ajax({
                    url: "{{ route('get.workspaces') }}",
                    type: "GET",

                    success: function (response) {
                        $('.loading-div').addClass('d-none');
                        $('.button-div').removeClass('d-none');

                        let html = "";

                        if (response.success) {

                            html += `<div class="row" id="workspace-list">`;

                            response.data.forEach(function (workspace) {
                                html += `
                        <div class="col-md-3 col-sm-6 mb-3">
                            <input type="radio" name="workspace" id="workspace-${workspace.id}"
                                value="${workspace.id}" class="d-none workspace-radio">

                            <label for="workspace-${workspace.id}" class="workspace-card text-center p-4 d-block" style="cursor:pointer">
                                <i style="font-size:40px"
                                    class="${workspace.icon} text-primary"></i>

                                <h6 class="fw-semibold mt-2 mb-0 text-secondary-custom">
                                    ${workspace.name}
                                </h6>
                            </label>
                        </div>
                    `;
                            });

                            html += `</div>`;

                        } else {

                            if (user_type == "owner") {
                                html = `
                    <div class="text-center py-5">
                        <div class="empty-workspace-box mx-auto p-5">
                            <div class="mb-3">
                                <i class="ri-folder-info-line" style="font-size: 45px; color: #6c63ff;"></i>
                            </div>

                            <h5 class="fw-semibold text-secondary mb-2">No Workspaces Available</h5>

                            <p class="text-muted mb-0">
                                You currently don’t have any workspaces created yet.
                            </p>
                        </div>
                    </div>
                `;
                            } else if (user_type == "employee") {
                                html = `
                    <div class="text-center py-5">
                        <div class="empty-workspace-box mx-auto p-5">
                            <div class="mb-3">
                                <i class="ri-folder-info-line" style="font-size: 45px; color: #6c63ff;"></i>
                            </div>

                            <h5 class="fw-semibold text-secondary mb-2">No Workspaces Available</h5>

                            <p class="text-muted mb-0">
                                Ask admin assign you to any workspace
                            </p>
                        </div>
                    </div>
                `;
                            }
                        }

                        $("#get-workspace-container").html(html);
                    },

                    error: function (xhr, status, error) {
                        console.error("Error:", error);
                    }
                });
            }

        });
    </script>
</body>

</html>