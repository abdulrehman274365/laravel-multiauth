<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="{{url('web/assets/user/dist/css/app.css')}}">
    <meta name="csrf-token" content="{{ csrf_token() }}">




    <title>Document</title>
</head>

<body class="py-5">


    <div class="flex mt-[4.7rem] md:mt-0">

        <!-- BEGIN: Side Menu -->
        <nav class="side-nav">
            <a href="" class="intro-x flex items-center pl-5 pt-4">
                <span class="hidden xl:block text-white text-lg ml-3"> truCancel </span>
            </a>
            <div class="side-nav__devider my-6"></div>
            <ul>
                <li>
                    <a href="{{route('admin.dashboard')}}" class="side-menu
                    @if(Route::currentRouteName() == 'admin.dashboard')
                        side-menu--active
                    @endif
                    ">
                        <div class="side-menu__icon"> <i data-lucide="home"></i> </div>
                        <div class="side-menu__title">
                            Home
                            <div class="side-menu__sub-icon transform rotate-180">
                            </div>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="{{route('admin.users')}}" class="side-menu
                    @if(Route::currentRouteName() == 'admin.users' || Route::currentRouteName() == 'admin.seller' || Route::currentRouteName() == 'admin.purchases' || Route::currentRouteName() == 'admin.buyers' || Route::currentRouteName() == 'admin.get.user.websites.view' || Route::currentRouteName() == 'admin.user.website.details')
                        side-menu--active
                    @endif
                    ">
                        <div class="side-menu__icon"> <i data-lucide="user"></i> </div>
                        <div class="side-menu__title">
                            Users
                            <div class="side-menu__sub-icon "> </div>
                        </div>
                    </a>
                </li>

                <li>
                    <a href="{{route('admin.leadforms')}}" class="side-menu
                    @if(Route::currentRouteName() == 'admin.leadforms')
                        side-menu--active
                    @endif
                    ">
                        <div class="side-menu__icon"> <i data-lucide="home"></i> </div>
                        <div class="side-menu__title">
                            Lead Forms
                            <div class="side-menu__sub-icon transform rotate-180">
                            </div>
                        </div>
                    </a>
                </li>
            </ul>
        </nav>

        <!-- END: Side Menu -->
        <!-- BEGIN: Content -->
        <div class="content">
            <!-- BEGIN: Top Bar -->
            <div class="top-bar">
                <!-- BEGIN: Breadcrumb -->
                <nav aria-label="breadcrumb" class="-intro-x mr-auto hidden sm:flex">
                    <ol class="breadcrumb">
                        @if(Route::currentRouteName() == 'admin.dashboard')
                            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                        @endif
                        @if(Route::currentRouteName() == 'admin.users')
                            <li class="breadcrumb-item"><a href="#">Users</a></li>
                        @endif
                        @if(Route::currentRouteName() == 'admin.seller')
                            <li class="breadcrumb-item"><a href="{{route('admin.users')}}">Users</a></li>
                            <li class="breadcrumb-item"><a href="#">Sellers</a></li>
                        @endif
                        @if(Route::currentRouteName() == 'admin.buyers')
                            <li class="breadcrumb-item"><a href="{{route('admin.users')}}">Users</a></li>
                            <li class="breadcrumb-item"><a href="#">Buyers</a></li>
                        @endif
                        @if(Route::currentRouteName() == 'admin.purchases')
                            <li class="breadcrumb-item"><a href="{{route('admin.users')}}">Users</a></li>
                            <li class="breadcrumb-item"><a href="{{route('admin.buyers')}}">Buyers</a></li>
                            <li class="breadcrumb-item"><a href="#">More Purchases</a></li>
                        @endif
                        @if(Route::currentRouteName() == 'admin.get.user.websites.view')
                            <li class="breadcrumb-item"><a href="{{route('admin.users')}}">Users</a></li>
                            <li class="breadcrumb-item"><a href="{{route('admin.seller')}}">Sellers</a></li>
                            <li class="breadcrumb-item"><a href="#">Websites</a></li>
                        @endif
                        @if(Route::currentRouteName() == 'admin.user.website.details')
                            <li class="breadcrumb-item"><a href="{{route('admin.users')}}">Users</a></li>
                            <li class="breadcrumb-item"><a href="{{route('admin.seller')}}">Sellers</a></li>
                            <li class="breadcrumb-item"><a href="{{ url()->previous() }}">Websites</a></li>
                            <li class="breadcrumb-item"><a href="#">Details</a></li>
                        @endif
                        @if(Route::currentRouteName() == 'admin.leadforms')
                            <li class="breadcrumb-item"><a href="#">User Contacts</a></li>
                        @endif
                    </ol>
                </nav>
                <!-- END: Breadcrumb -->
                <!-- BEGIN: Account Menu -->
                <div style="color:grey;font-size:12px;">{{ Auth::guard('admin')->user()->name }}</div>
                <div class="intro-x dropdown w-8 h-8" style="margin-left:5px;">

                    <div class="dropdown-toggle w-8 h-8 rounded-full overflow-hidden shadow-lg image-fit zoom-in"
                        role="button" aria-expanded="false" data-tw-toggle="dropdown">
                        <img alt="Midone - HTML Admin Template" src="{{url('web/assets/user/dist/images/profile-5.jpg')}}">
                    </div>

                    <div class="dropdown-menu w-56">
                        <ul class="dropdown-content bg-primary text-white">
                            <li class="p-2">
                                <div class="font-medium">
                            @if(Auth::check())
                            {{ Auth::guard('admin')->user()->name }}
                                @endif
                            </div>
                                <div class="text-xs text-white/70 mt-0.5 dark:text-slate-500">{{ Auth::guard('admin')->user()->name }}</div>
                            </li>
                            <li>
                                <hr class="dropdown-divider border-white/[0.08]">
                            </li>

                            <li>
                                <hr class="dropdown-divider border-white/[0.08]">
                            </li>
                            <li>

                            <form method="POST" action="{{ route('admin.logout') }}">
                            @csrf

                            <a href="{{route('admin.logout')}}"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();"
                                                 class="dropdown-item hover:bg-white/5"> <i
                                                 data-lucide="toggle-right" class="w-4 h-4 mr-2"></i> Logout
                            </a>
                        </form>
                            </li>
                        </ul>
                    </div>
                </div>
                <!-- END: Account Menu -->
            </div>
            <!-- END: Top Bar -->
            @yield('content')
        </div>
    </div>
    <!-- END: Content -->
</body>

<script src="{{ url(path: 'web/assets/user/dist/js/app.js') }}"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.5/css/jquery.dataTables.min.css">
<script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>
<!-- Font Awesome CDN -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">







</html>
