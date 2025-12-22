<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Lock</title>

    <!-- Bootstrap Css -->
    <link href="{{ asset('web/assets/css/bootstrap.min.css') }}" id="bootstrap-style" rel="stylesheet">

    <!-- Icons Css -->
    <link href="{{ asset('web/assets/css/icons.min.css') }}" rel="stylesheet">

    <!-- App Css -->
    <link href="{{ asset('web/assets/css/app.min.css') }}" id="app-style" rel="stylesheet">
</head>
<style>
    .bg-img {
        @if(auth()->user()->profile_image == 'default.svg')
            background-image: url('https://images.unsplash.com/photo-1498050108023-c5249f4df085?auto=format&fit=crop&w=1400&q=80');
        @else 
            background-image: url('web/uploads/profile_image/{{ auth()->user()->profile_image}}');
        @endif
         background-size: cover;
        background-position: center;
        position: absolute;
        inset: 0;
        z-index: 1;
    }

    .overlay-blur {
        position: absolute;
        inset: 0;
        background: rgba(0, 0, 0, 0.5);
        backdrop-filter: blur(3px);
        z-index: 2;
    }

    .text-center {
        z-index: 3;
    }

    .user-thumb img {
        height: 200px !important;
        width: 200px !important;
    }
</style>

<body class="bg-light">

    <div class="container-fluid">
        <div class="row" style="min-height: 100vh;">

            <!-- LEFT SIDE LOGIN FORM -->
            <div class="col-lg-4">
                <div class="authentication-page-content p-4 d-flex align-items-center min-vh-100">
                    <div class="w-100">
                        <div class="row justify-content-center">
                            <div class="col-lg-9">
                                <div>
                                    <div class="text-center">
                                        <div>
                                            <a href="index.html" class="">
                                                <!-- <img src="assets/images/logo-dark.png" alt="" height="20"
                                                        class="auth-logo logo-dark mx-auto"> -->
                                                <img src="assets/images/logo-light.png" alt="" height="20"
                                                    class="auth-logo logo-light mx-auto d-block">
                                            </a>
                                        </div>

                                        <h4 class="font-size-18 mt-4 text-dark">Lock screen</h4>
                                        <p class="text-dark">Enter your password to unlock the screen!</p>
                                    </div>

                                    <div class="p-2 mt-5">
                                        <form class="" action="{{ route('user.unlock') }}" method="post">
                                            @csrf
                                            <div class="user-thumb text-center mb-5">
                                                <img src="{{ asset('web/uploads/profile_image/' . auth()->user()->profile_image) }}"
                                                    class="rounded-circle img-thumbnail avatar-md" alt="thumbnail">
                                                <h5 class="font-size-15 mt-3 text-dark">{{ auth()->user()->name }}</h5>
                                            </div>
                                            <div class="mb-3 auth-form-group-custom mb-4">
                                                <i class="ri-lock-2-line auti-custom-input-icon text-light"></i>
                                                <label class="form-label text-dark" for="userpassword">Password</label>
                                                <input type="password" name="password" class="form-control bg-light"
                                                    id="userpassword" placeholder="Enter password">
                                            </div>

                                            <div class="mt-4 text-center">
                                                <button class="btn btn-primary w-md waves-effect waves-light"
                                                    type="submit">Unlock</button>
                                            </div>

                                        </form>
                                    </div>

                                    <div class="mt-5 text-center text-dark">
                                        <p>Not you ? return
                                        <form method="POST" action="{{ route('logout') }}">
                                            @csrf
                                            <a onclick="event.preventDefault(); this.closest('form').submit();"
                                                href="{{route('logout')}}" class="fw-medium text-primary">
                                                Log in </a>
                                        </form>
                                        </p>
                                        <p>©
                                            <script>document.write(new Date().getFullYear())</script> Appzia.
                                            Crafted with <i class="mdi mdi-heart text-danger"></i> by MARK
                                        </p>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- RIGHT SIDE WITH BACKGROUND IMAGE + TEXT -->
            <div class="col-md-8 position-relative d-flex justify-content-center align-items-center p-0">

                <!-- Background Image -->
                <div class="bg-img"></div>

                <!-- Overlay Blur -->
                <div class="overlay-blur"></div>

                <!-- Banner Text -->
                <div class="text-center text-white position-absolute px-5">

                    <h1 class="fw-bold display-4 mb-3 text-white">Welcome Back!</h1>

                    <p class="fs-5 mb-2">
                        Streamline your daily workflow with ease and confidence.
                    </p>
                    <p class="fs-6 mb-4">
                        Access your workspaces, manage items, handle bookings, and stay connected — all in one smart
                        dashboard.
                    </p>

                    <!-- Social Icons -->
                    <div class="mt-4">
                        <a href="#" class="text-white fs-4 me-3"><i class="ri-facebook-circle-fill"></i></a>
                        <a href="#" class="text-white fs-4 me-3"><i class="ri-instagram-fill"></i></a>
                        <a href="#" class="text-white fs-4"><i class="ri-linkedin-box-fill"></i></a>
                    </div>

                </div>


            </div>


        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>