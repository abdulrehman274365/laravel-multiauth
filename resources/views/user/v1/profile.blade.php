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

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Profile</h4>
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Appzia</a></li>
                            <li class="breadcrumb-item active">Profile</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>

        {{-- PROFILE IMAGE SECTION --}}
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">

                        <div class="row align-items-center">
                            <div class="col-md-12 border-bottom mb-3 d-flex align-items-center gap-2">
                                <i class="ri-camera-fill fs-5"></i>
                                <small class="text-muted fw-bold">PROFILE IMAGE</small>
                            </div>
                            <div class="col-auto">
                                <img class="img-fluid rounded-circle user-image"
                                    src="{{ asset('web/uploads/profile_image/' . auth()->user()->profile_image) }}"
                                    alt="Profile Image" style="width: 150px; height: 150px; object-fit: cover;">

                            </div>
                            <div class="col">
                                <small class="text-danger fw-bold image-error"></small>
                                <div class="d-flex flex-wrap gap-2">
                                    <button class="btn btn-primary select-image">Select Image</button>
                                    <form method="POST" action="{{ route('upload.profile.image') }}"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <!-- Hidden file input -->
                                        <input type="file" name="profile_image" id="profileUpload"
                                            accept="image/svg+xml,image/webp,image/jpg,image/jpeg,image/png" hidden>
                                        <button class="btn btn-primary upload-image d-none" type="submit">Upload
                                            Image</button>
                                    </form>

                                    <button class="btn btn-outline-secondary d-none cancel-image">Cancel</button>
                                    <form method="POST" action="{{ route('default.profile.image') }}">
                                        @csrf
                                        <button class="btn btn-outline-danger delete-image d-none"
                                            type="submit">Delete</button>
                                    </form>

                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        {{-- GENERAL INFORMATION SECTION --}}
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="col-md-12 border-bottom mb-3 d-flex align-items-center gap-2">
                            <i class="ri-information-line fs-5"></i>
                            <small class="text-muted fw-bold">GENERAL INFORMATION</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
<!-- End Page-content -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    const user_image = "{{ auth()->user()->profile_image }}"
    $(document).ready(function () {
        console.log(user_image);
        if (user_image == 'default.svg') {
            console.log('hide button');
            $('.delete-image').addClass('d-none')
        } else {
            console.log('show button')
            $('.delete-image').removeClass('d-none')
        }

        $('.select-image').click(function (e) {
            e.preventDefault();
            $('#profileUpload').click();
        });

        $('#profileUpload').change(function () {
            const file = this.files[0];
            if (file) {
                const allowedExtensions = ['svg', 'webp', 'jpg', 'jpeg', 'png'];
                const maxSize = 10 * 1024 * 1024;
                const fileExtension = file.name.split('.').pop().toLowerCase();

                if (!allowedExtensions.includes(fileExtension)) {
                    $('.image-error').text('Invalid file type. Only SVG, WEBP, JPG, PNG are allowed.');
                    $(this).val('');
                    return false;
                }

                if (file.size > maxSize) {
                    $('.image-error').text('File size exceeds 10 MB.');
                    $(this).val('');
                    return false;
                }

                const reader = new FileReader();
                reader.onload = function (e) {
                    $('.user-image').attr('src', e.target.result);
                }
                reader.readAsDataURL(file);
                $('.cancel-image').removeClass('d-none')
                $('.upload-image').removeClass('d-none')
                $('.select-image').addClass('d-none')
                $('.delete-image').addClass('d-none')
            }
        });


        $('.remove-image').click(function (e) {
            e.preventDefault();
            $('.user-image').attr('src', "{{ asset('web/uploads/profile_image/' . auth()->user()->profile_image) }}");
            $('#profileUpload').val('');
        });

        $('.cancel-image').click(function (e) {
            e.preventDefault();
            $('.user-image').attr('src', "{{ asset('web/uploads/profile_image/' . auth()->user()->profile_image) }}");
            $('#profileUpload').val('');
            $('.cancel-image').addClass('d-none')
            $('.upload-image').addClass('d-none')
            $('.select-image').removeClass('d-none')
            if (user_image == 'default.svg') {
                $('.delete-image').addClass('d-none')
            } else {
                $('.delete-image').removeClass('d-none')
            }
        });
    });
</script>
@stop