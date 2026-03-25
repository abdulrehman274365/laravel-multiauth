<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Welcome | POS System</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background: linear-gradient(135deg, #0d6efd, #6610f2);
            min-height: 100vh;
        }
    </style>
</head>
<body>

<div class="container d-flex align-items-center justify-content-center min-vh-100">
    <div class="col-md-6 col-lg-4">
        <div class="card shadow-lg border-0 rounded-4 text-center">
            <div class="card-body p-4">
                <h2 class="fw-bold mb-2">Welcome to POS System</h2>
                <p class="text-muted mb-4">
                    Manage sales, inventory, and customers efficiently.
                </p>

                <div class="d-grid gap-2">
                    <a href="/login" class="btn btn-primary btn-lg">
                        Login
                    </a>
                    <a href="/register" class="btn btn-outline-secondary">
                        Create Account
                    </a>
                </div>
            </div>
            <div class="card-footer bg-light text-muted small">
                ©  {{ date('Y') }} POS System
            </div>
        </div>
    </div>
</div>

</body>
</html>
