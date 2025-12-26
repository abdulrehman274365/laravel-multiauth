<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8" />
    <title>Dashboard | Appzia - Admin & Dashboard Template</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesdesign" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('web/assets/images/favicon.ico') }}">

    <!-- jquery.vectormap css -->
    <link href="{{ asset('web/assets/libs/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.css') }}"
        rel="stylesheet">

    <!-- morris.js -->
    <link rel="stylesheet" href="{{ asset('web/assets/libs/morris.js/morris.css') }}">

    <!-- DataTables -->
    <link href="{{ asset('web/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet">

    <!-- Responsive datatable examples -->
    <link href="{{ asset('web/assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css') }}"
        rel="stylesheet">

    <!-- Bootstrap Css -->
    <link href="{{ asset('web/assets/css/bootstrap.min.css') }}" id="bootstrap-style" rel="stylesheet">

    <!-- Icons Css -->
    <link href="{{ asset('web/assets/css/icons.min.css') }}" rel="stylesheet">

    <!-- App Css -->
    <link href="{{ asset('web/assets/css/app.min.css') }}" id="app-style" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css"
        integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Toastr CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">



    @php
        $workspace = session()->get('workspace')
    @endphp

    <style>
        hr {
            color: grey;
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
            z-index: 99999;
        }

        #customContextMenu {
            position: absolute;
            display: none;
            z-index: 9999;
            box-shadow: 2px 2px 10px rgba(0, 0, 0, 0.2);
            border-radius: 5px;
            min-width: 180px;
            font-family: Arial, sans-serif;
        }

        #customContextMenu ul {
            list-style: none;
            margin: 0;
            padding: 5px 0;
        }

        #customContextMenu li.context-item {
            padding: 8px 15px;
            cursor: pointer;
            display: flex;
            align-items: center;
            gap: 10px;
            transition: background 0.2s, color 0.2s;
            border-radius: 3px;
        }

        #customContextMenu li.context-item:hover {
            background: #04A2B3;
            color: #fff;
        }

        #customContextMenu li.context-item i {
            width: 20px;
            text-align: center;
        }
    </style>
</head>

<div class="loading-screen d-none">
    <div class="loading-content text-center">
        <i class="fa-solid fa-spinner fa-spin-pulse" style="font-size: 100px;"></i>
        <p style="font-size: 20px;; margin-top: 20px;">Please wait...</p>
    </div>
</div>

@php
    $settings = auth()->user()->dashboardSettings;
    $default_theme = 'light';
    $left_side_bar_collpsed = '';
    if (Auth::check()) {
        if (auth()->user()->dashboardSettings->night_mode == 1) {
            $default_theme = 'dark';
        }
        if (auth()->user()->dashboardSettings->left_side_bar_collpsed == true) {
            $left_side_bar_collpsed = 'sidebar-enable vertical-collpsed';
        }
    }
@endphp

<body data-sidebar="dark" cz-shortcut-listen="true" data-bs-theme="{{$default_theme}}"
    class="{{ $left_side_bar_collpsed }}">
    <div id="layout-wrapper">
        @include('layouts.include.header')
        @include('layouts.include.leftSideBar')
        <div class="main-content">
            <main class="site-main" data-bs-spy="scroll" data-bs-target="#siteMenu" data-bs-root-margin="0px"
                data-bs-smooth-scroll="true" tabindex="0">
                @yield('content')
                @include('layouts.include.footer')
            </main>
        </div>
        @include('layouts.include.rightSideBar')
        @include('layouts.include.scripts')
    </div>
    <!-- Custom context menu -->
    <div id="customContextMenu" class="card">
        <ul>
            <a href="{{ route('user.profile') }}">
                <li class="context-item"><i class="fa-solid fa-user"></i> Profile</li>
            </a>
            <a href="{{ route('workspaces.index') }}">
                <li class="context-item"><i class="fa-solid fa-building"></i> Workspaces</li>
            </a>
            <a href="#">
                <li class="context-item"><i class="fa-solid fa-gear"></i> Settings</li>
            </a>
            <a href="{{ route('user.lock') }}">
                <li class="context-item"><i class="fa-solid fa-lock"></i> Lock</li>
            </a>
            <hr>
            <form method="POST" action="{{ route('logout') }}" class="d-inline">
                @csrf
                <a onclick="event.preventDefault(); this.closest('form').submit();" href="{{route('logout')}}">
                    <li class="context-item"><i class="fa-solid fa-sign-out-alt"></i> Logout</li>
                </a>
            </form>
        </ul>
    </div>

</body>
<script>
    toastr.options = {
        "closeButton": true,
        "debug": false,
        "newestOnTop": true,
        "positionClass": "toast-top-right",
        "preventDuplicates": false,
        "showDuration": 300,
        "hideDuration": 1000,
        "timeOut": 5000,
        "extendedTimeOut": 1000,
        "tapToDismiss": true,
    }

    @if(session('toast'))
        toastr["{{ session('toast.type') }}"](
            "{{ session('toast.message') }}",
            "{{ session('toast.title') }}"
        );
    @endif

    document.addEventListener('DOMContentLoaded', function () {
        const menu = document.getElementById('customContextMenu');
        document.addEventListener('contextmenu', function (e) {
            e.preventDefault();
            menu.style.top = e.pageY + 'px';
            menu.style.left = e.pageX + 'px';
            menu.style.display = 'block';
        });
        document.addEventListener('click', function (e) {
            menu.style.display = 'none';
        });
        window.addEventListener('scroll', function () {
            menu.style.display = 'none';
        });
    });

    $('#page-header-notifications-dropdown').on('show.bs.dropdown', function () {
        console.log('Dropdown opening, fire AJAX');

        $.ajax({
            url: '{{ route('get.latest.logs') }}',
            method: 'GET',
            success: function (response) {
                $('.logs-loading-div').addClass('d-none');
                if (response.success) {
                    var logsDiv = $('.logs-data-div');
                    logsDiv.empty();
                    response.logs.forEach(function (log) {
                        var timeAgo = moment(log.created_at).fromNow();

                        var logHtml = `
                    <div class="text-reset notification-item">
                        <div class="d-flex">
                            <div class="avatar-xs me-3">
                                <span class="avatar-title rounded-circle font-size-16" style="color: ${log.log_style.color}; background-color: ${log.log_style.backgroundColor};">
                                    <i class="${log.log_icon}"></i>
                                </span>
                            </div>
                            <div class="flex-1">
                                <h6 class="mb-1">${log.log_title}</h6>
                                <div class="font-size-12 text-muted">
                                    <p class="mb-1">${log.user_log}</p>
                                    <p class="mb-0"><i class="mdi mdi-clock-outline"></i> ${timeAgo}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                `;
                        logsDiv.append(logHtml);
                        logsDiv.removeClass('d-none')
                    });
                } else {
                    $('.logs-empty-div').removeClass('d-none');
                }
            },
            error: function (err) {
                console.error(err);
            }
        });
    });


</script>

</html>