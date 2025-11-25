<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>

    <!-- Bootstrap Css -->
    <link href="{{ asset('web/assets/css/bootstrap.min.css') }}" id="bootstrap-style" rel="stylesheet">

    <!-- Icons Css -->
    <link href="{{ asset('web/assets/css/icons.min.css') }}" rel="stylesheet">

    <!-- App Css -->
    <link href="{{ asset('web/assets/css/app.min.css') }}" id="app-style" rel="stylesheet">
</head>
<style>
    .bg-img {
        background-image: url('https://images.unsplash.com/photo-1498050108023-c5249f4df085?auto=format&fit=crop&w=1400&q=80');
        background-size: cover;
        background-position: center;
        position: absolute;
        inset: 0;
        z-index: 1;
    }

    .overlay-blur {
        position: absolute;
        inset: 0;
        background: rgba(0, 0, 0, 0.4);
        backdrop-filter: blur(5px);
        z-index: 2;
    }

    .text-center {
        z-index: 3;
    }
</style>

<body class="bg-light">

    <div class="container-fluid">
        <div class="row" style="min-height: 100vh;">

            <!-- LEFT SIDE LOGIN FORM -->
            <div class="col-md-4 d-flex align-items-center bg-white shadow-sm">
                <div class="w-100 p-5">

                    <!-- Logo -->
                    <div class="text-start mb-4">
                        <a href="/">
                            <img src="/your-logo.png" width="70" alt="Logo">
                        </a>
                    </div>

                    <!-- Session Status -->
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <!-- Errors -->
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul class="m-0 ps-3">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <h3 class="mb-4">Login</h3>

                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <!-- Email -->
                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <input type="email" name="email" class="form-control" value="{{ old('email') }}" required
                                autofocus>
                        </div>

                        <!-- Password -->
                        <div class="mb-3">
                            <label class="form-label">Password</label>
                            <input type="password" name="password" class="form-control" required>
                        </div>

                        <!-- Remember Me -->
                        <div class="form-check mb-3">
                            <input class="form-check-input" type="checkbox" name="remember" id="remember_me">
                            <label class="form-check-label" for="remember_me">Remember me</label>
                        </div>

                        <!-- Forgot password -->
                        @if (Route::has('password.request'))
                            <div class="mb-3">
                                <a href="{{ route('password.request') }}" class="text-decoration-none">
                                    Forgot your password?
                                </a>
                            </div>
                        @endif

                        <!-- Submit Button -->
                        <button type="submit" class="btn btn-primary w-100 mb-3">
                            Log in
                        </button>

                        <!-- Register Link -->
                        <div class="text-center">
                            <span class="text-muted">Don't have an account?</span>
                            <a href="{{ route('register') }}" class="text-decoration-none ms-1">Register</a>
                        </div>

                    </form>

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