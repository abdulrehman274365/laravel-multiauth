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

    /* Card look */
    .card {
        background: #ffffff;
    }

    /* Table */
    .custom-table {
        border-collapse: separate;
        border-spacing: 0 10px;
    }

    /* Header */
    .custom-table thead th {
        font-size: 13px;
        text-transform: uppercase;
        color: #9ca3af;
        font-weight: 600;
        border: none;
    }

    /* Rows */
    .custom-table tbody tr {
        background: #f9fafb;
        border-radius: 12px;
        transition: 0.2s ease;
    }

    .custom-table tbody tr:hover {
        background: #f1f5f9;
    }

    /* Cells */
    .custom-table tbody td {
        border-top: none;
        border-bottom: none;
        padding: 14px;
    }

    /* Rounded row effect */
    .custom-table tbody tr td:first-child {
        border-radius: 12px 0 0 12px;
    }

    .custom-table tbody tr td:last-child {
        border-radius: 0 12px 12px 0;
    }

    /* Profile Image */
    .user-img {
        width: 42px;
        height: 42px;
        object-fit: cover;
        border-radius: 50%;
        border: 2px solid #e5e7eb;
    }

    /* Status badge */
    .status-badge {
        padding: 5px 12px;
        border-radius: 20px;
        font-size: 12px;
        font-weight: 500;
    }

    .status-badge.active {
        background: #dcfce7;
        color: #16a34a;
    }

    .status-badge.inactive {
        background: #fee2e2;
        color: #dc2626;
    }

    /* Button */
    .action-btn {
        border-radius: 8px;
        padding: 6px 14px;
        font-size: 13px;
        transition: 0.2s;
    }

    .action-btn:hover {
        background: #111827;
        color: #fff;
    }
</style>

<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Users & Pemissions</h4>
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Appzia</a></li>
                            <li class="breadcrumb-item active">Settings</li>
                            <li class="breadcrumb-item active">Users List</li>
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
                        <small class="text-muted fw-bold text-uppercase ">Users & Roles</small>
                    </div>
                    <!------------- TABLE AREA (START)------------>
                    <div class="card shadow-sm border-0 rounded-4">
                        <div class="card-body p-4">

                            <table id="usersTable" class="table align-middle custom-table">
                                <thead>
                                    <tr>
                                        <th>Image</th>
                                        <th>Name<br><small class="fw-light">Email</small></th>
                                        <th>Details</th>
                                        <th>Role</th>
                                        <th>Status</th>
                                        <th class="text-end">Action</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach($users as $user)
                                        <tr>
                                            <td>
                                                <img src="{{ asset('web/uploads/profile_image/' . $user->profile_image) }}"
                                                    class="user-img">
                                            </td>

                                            <td>
                                                <div class="fw-semibold">{{ $user->name }}</div>
                                                <small class="fw-light">{{ $user->email }}</small>
                                            </td>
                                            <td>
                                                <div><small class="fw-light"><b>Gender:</b> {{ $user->gender }}</small>
                                                </div>
                                                <div><small class="fw-light"><b>Phone:</b> {{ $user->phone }}</small></div>
                                                <div><small class="fw-light"><b>ID No.:</b> {{ $user->id_card }}</small>
                                                </div>
                                                <div><small class="fw-light"><b>Employe No:</b>
                                                        {{ $user->employe_number }}</small></div>
                                            </td>
                                            <td>
                                                <span class="badge bg-primary">{{ $user->pivot->role }}</span>
                                            </td>
                                            <td>
                                                <span
                                                    class="status-badge {{ $user->status == 'active' ? 'active' : 'inactive' }}">
                                                    {{ ucfirst($user->status) }}
                                                </span>
                                            </td>

                                            <td class="text-end">
                                                <button class="btn btn-light btn-sm action-btn">
                                                    Edit
                                                </button>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>

                        </div>
                    </div>
                    <!------------- TABLE AREA (END)------------>
                </div>
            </div>
        </div>

    </div>
</div>

<!-- jQuery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<script>
    $(document).ready(function () {
        $('#usersTable').DataTable({
            pageLength: 10,
            ordering: true,
            searching: true,
            lengthChange: true
        });
    });
</script>

@stop