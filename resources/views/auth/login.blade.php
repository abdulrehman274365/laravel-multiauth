<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

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
                            <input type="email" name="email" class="form-control"
                                   value="{{ old('email') }}" required autofocus>
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

            <!-- EMPTY RIGHT SIDE -->
            <div class="col-md-8 bg-light">
                <!-- Optional image or content -->
            </div>

        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
