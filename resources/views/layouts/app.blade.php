<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8" />
    <title>Dashboard | Appzia - Admin & Dashboard Template</title>
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
            z-index: 9999;
        }
    </style>
</head>

<div class="loading-screen d-none">
    <div class="loading-content text-center">
        <i class="fa-solid fa-spinner fa-spin-pulse" style="font-size: 100px;"></i>
        <p style="font-size: 20px;; margin-top: 20px;">Please wait...</p>
    </div>
</div>

<body data-sidebar="dark">
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
</body>

</html>