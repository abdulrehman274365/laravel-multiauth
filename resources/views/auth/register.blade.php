<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Register</title>

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

    <div class="container-fluid">
        <div class="row" style="min-height: 100vh;">

            <!-- LEFT SIDE REGISTER FORM -->
            <div class="col-md-4 d-flex align-items-center bg-white shadow-sm">
                <div class="w-100 p-5">

                    <!-- Logo -->
                    <div class="text-start mb-4">
                        <a href="/">
                            <img src="/your-logo.png" width="70" alt="Logo">
                        </a>
                    </div>

                    <!-- Validation Errors -->
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul class="m-0 ps-3">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <h3 class="mb-4">Create Account</h3>

                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <!-- Name -->
                        <div class="mb-3">
                            <label class="form-label">Name</label>
                            <input type="text" name="name" class="form-control"
                                   value="{{ old('name') }}" required autofocus>
                        </div>

                        <!-- Email -->
                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <input type="email" name="email" class="form-control"
                                   value="{{ old('email') }}" required>
                        </div>

                        <!-- Password -->
                        <div class="mb-3">
                            <label class="form-label">Password</label>
                            <input type="password" name="password" class="form-control" required>
                        </div>

                        <!-- Confirm Password -->
                        <div class="mb-3">
                            <label class="form-label">Confirm Password</label>
                            <input type="password" name="password_confirmation" class="form-control" required>
                        </div>

                        <!-- Already registered -->
                        <div class="mb-3">
                            <a class="text-decoration-none" href="{{ route('login') }}">
                                Already registered?
                            </a>
                        </div>

                        <!-- Button -->
                        <button type="submit" class="btn btn-primary w-100">
                            Register
                        </button>
                    </form>

                </div>
            </div>

            <!-- RIGHT SIDE EMPTY -->
            <div class="col-md-8 bg-light">
                <!-- You can add image/banner here -->
            </div>

        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
