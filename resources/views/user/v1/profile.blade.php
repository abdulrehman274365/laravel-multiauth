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
                                    <button class="btn btn-primary btn-sm select-image">Select Image</button>
                                    <form method="POST" action="{{ route('upload.profile.image') }}"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <!-- Hidden file input -->
                                        <input type="file" name="profile_image" id="profileUpload"
                                            accept="image/svg+xml,image/webp,image/jpg,image/jpeg,image/png" hidden>
                                        <button class="btn btn-primary btn-sm upload-image d-none" type="submit">Upload
                                            Image</button>
                                    </form>

                                    <button class="btn btn-outline-secondary btn-sm d-none cancel-image">Cancel</button>
                                    <form method="POST" action="{{ route('default.profile.image') }}">
                                        @csrf
                                        <button class="btn btn-outline-danger btn-sm delete-image d-none"
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
            <div class="col-lg-12">
                <div class="card shadow-sm">
                    <div class="card-body">

                        <!-- Header -->
                        <div class="d-flex align-items-center gap-2 border-bottom pb-2 mb-4">
                            <i class="ri-information-line fs-5 text-primary"></i>
                            <small class="text-muted fw-bold text-uppercase">
                                General Information
                            </small>
                        </div>

                        <!-- Form -->
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label">Name</label>
                                <input type="text" name="name" class="form-control form-control-sm"
                                    value="{{ auth()->user()->name }}">
                                <small class="text-danger name-error"></small>
                            </div>

                            <div class="col-md-6">
                                <label class="form-label">Last Name</label>
                                <input type="text" name="last_name" class="form-control form-control-sm"
                                    value="{{ auth()->user()->last_name }}">
                                <small class="text-danger last-name-error"></small>
                            </div>

                            <div class="col-md-4">
                                <label class="form-label">Gender</label>
                                <select name="gender" class="form-control form-control-sm">
                                    <option value="">Select Gender</option>
                                    <option value="male" {{ auth()->user()->gender === 'male' ? 'selected' : '' }}> Male
                                    </option>
                                    <option value="female" {{ auth()->user()->gender === 'female' ? 'selected' : '' }}>
                                        Female </option>
                                    <option value="other" {{ auth()->user()->gender === 'other' ? 'selected' : '' }}>
                                        Other </option>
                                </select>
                                <small class="text-danger gender-error"></small>
                            </div>

                            <div class="col-md-4">
                                <label class="form-label">Phone</label>
                                <input type="text" name="phone" class="form-control form-control-sm"
                                    value="{{ auth()->user()->phone}}">
                                <small class="text-danger phone-error"></small>
                            </div>

                            <div class="col-md-4">
                                <label class="form-label">ID Card</label>
                                <input type="text" name="id_card" class="form-control form-control-sm"
                                    value="{{ auth()->user()->id_card }}">
                                <small class="text-danger id-card-error"></small>
                            </div>

                            <div class="col-md-12">
                                <label class="form-label">Address</label>
                                <input type="text" name="address" class="form-control form-control-sm"
                                    value="{{ auth()->user()->address }}">
                                <small class="text-danger address-error"></small>
                            </div>

                        </div>

                        <!-- Button -->
                        <div class="text-end mt-4">
                            <button class="btn btn-sm btn-primary px-4 save-general-information">Save</button>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        {{-- PASSWORD SECTION --}}
        <div class="row">
            <div class="col-lg-12">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <!-- Header -->
                        <div class="d-flex align-items-center gap-2 border-bottom pb-2 mb-4">
                            <i class="ri-lock-unlock-line fs-5 text-primary"></i>
                            <small class="text-muted fw-bold text-uppercase">
                                Change Password
                            </small>
                        </div>
                        <div class="row g-3">
                            <form class="change-password-form">
                                <div class="col-md-12">
                                    <label class="form-label">Old password</label>
                                    <input type="password" name="old_password" class="form-control form-control-sm"
                                        value="">
                                    <small class="text-danger old-password-error"></small>
                                </div>
                                <div class="col-md-12">
                                    <label class="form-label">New password</label>
                                    <input type="password" name="new_password" class="form-control form-control-sm"
                                        value="">
                                    <small class="text-danger new-password-error"></small>
                                </div>
                                <div class="col-md-12">
                                    <label class="form-label">Confirm password</label>
                                    <input type="password" name="confirm_password" class="form-control form-control-sm"
                                        value="">
                                    <small class="text-danger confirm-password-error"></small>
                                </div>
                            </form>
                        </div>
                        <div class="text-end mt-4">
                            <button class="btn btn-sm btn-primary px-4 update-password">Update</button>
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
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        if (user_image == 'default.svg') {
            console.log('hide button');
            $('.delete-image').addClass('d-none')
        } else {
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

        $(document).on('click', '.save-general-information', function (e) {
            e.preventDefault();
            validateGeneralInformation();
        });

        function validateGeneralInformation() {

            let name = $('input[name="name"]');
            let last_name = $('input[name="last_name"]');
            let gender = $('select[name="gender"]');
            let phone = $('input[name="phone"]');
            let id_card = $('input[name="id_card"]');
            let address = $('input[name="address"]');

            let hasError = false;

            let phoneRegex = /^[0-9]{7,15}$/;

            function required(field, errorClass, message) {
                if (!field.val() || !field.val().trim()) {
                    $(errorClass).text(message);
                    field.removeClass("is-valid").addClass("is-invalid");
                    hasError = true;
                } else {
                    $(errorClass).text("");
                    field.removeClass("is-invalid").addClass("is-valid");
                }
            }

            // Required validations
            required(name, ".name-error", "Name is required");
            required(last_name, ".last-name-error", "Last name is required");
            required(gender, ".gender-error", "Gender is required");
            required(phone, ".phone-error", "Phone number is required");
            required(id_card, ".id-card-error", "ID card is required");
            required(address, ".address-error", "Address is required");

            // Phone format
            if (phone.val().trim() && !phoneRegex.test(phone.val().trim())) {
                $(".phone-error").text("Phone must be 7–15 digits");
                phone.removeClass("is-valid").addClass("is-invalid");
                hasError = true;
            }

            if (hasError) return false;

            saveGeneralInformation();
        }

        function saveGeneralInformation() {

            $.ajax({
                url: "{{ route('user.update.profile') }}", // adjust if needed
                type: "POST",
                data: {
                    name: $('input[name="name"]').val(),
                    last_name: $('input[name="last_name"]').val(),
                    gender: $('select[name="gender"]').val(),
                    phone: $('input[name="phone"]').val(),
                    id_card: $('input[name="id_card"]').val(),
                    address: $('input[name="address"]').val(),
                },
                success: function (response) {
                    toastr[response.toast.type](
                        response.toast.message,
                        response.toast.title
                    );
                },
                error: function (xhr) {
                    console.log(xhr.responseText);
                }
            });
        }

        $(document).on('click', '.update-password', function () {
            validatePasswordForm();
        });

        function validatePasswordForm() {
            let oldPassword = $('input[name="old_password"]');
            let newPassword = $('input[name="new_password"]');
            let confirmPassword = $('input[name="confirm_password"]');

            let hasError = false;

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
            required(oldPassword, ".old-password-error", "Old password is required");
            required(newPassword, ".new-password-error", "New password is required");
            required(confirmPassword, ".confirm-password-error", "Confirm password is required");

            // Password length
            if (newPassword.val().trim() && newPassword.val().length < 8) {
                $(".new-password-error").text("Password must be at least 8 characters");
                newPassword.removeClass("is-valid").addClass("is-invalid");
                hasError = true;
            }

            if (
                newPassword.val().trim() &&
                confirmPassword.val().trim() &&
                newPassword.val() !== confirmPassword.val()
            ) {
                $(".confirm-password-error").text("Passwords do not match");
                confirmPassword.removeClass("is-valid").addClass("is-invalid");
                hasError = true;
            }

            if (hasError) {
                return false;
            }
            updatePassword();
            return true;
        }

        function updatePassword() {
            $.ajax({
                url: "{{ route('user.change.password')}}",
                type: "POST",
                data: {
                    old_password: $('input[name="old_password"]').val(),
                    new_password: $('input[name="new_password"]').val(),
                    confirm_password: $('input[name="confirm_password"]').val(),
                },
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
                },
                success: function (response) {
                    resetPasswordForm()
                    if (response.success) {
                        toastr[response.toast.type](
                            response.toast.message,
                            response.toast.title
                        );
                    } else {
                        $('input[name="old_password"]').removeClass('is-valid').addClass('is-invalid');
                        $(".old-password-error").text(response.message)
                    }
                },
                error: function (xhr) {
                    if (xhr.responseJSON?.errors) {
                        let errors = xhr.responseJSON.errors;

                        if (errors.old_password) {
                            $(".old-password-error").text(errors.old_password[0]);
                        }
                        if (errors.new_password) {
                            $(".new-password-error").text(errors.new_password[0]);
                        }
                    }
                }
            });
        }

        function resetPasswordForm() {
            let form = $('.change-password-form');
            form[0].reset();
            form.find('.is-valid, .is-invalid').removeClass('is-valid is-invalid');
            form.find('small.text-danger').text('');
        }
    });
</script>
@stop