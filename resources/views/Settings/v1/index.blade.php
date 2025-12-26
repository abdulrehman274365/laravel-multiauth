@extends('layouts.app')
@section('content')
@php
    $workspace = session()->get('workspace');
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
                                    <a href="#" class="text-decoration-none">
                                        <i class="fa-solid fa-file-pen"></i> Workspace Profile
                                    </a>
                                </li>
                                <li class="py-2 menu-item">
                                    <a href="#" class="text-decoration-none">
                                        <i class="fa-solid fa-building-user"></i> Users & Roles
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
                                    <a href="#" class="text-decoration-none">
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

                          <!-- All Workspaces -->
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



@stop