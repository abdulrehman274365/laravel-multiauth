<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>POS System</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Inter', sans-serif;
            background: #f8fafc;
        }

        .navbar {
            background: #fff;
        }

        .hero {
            padding: 80px 0;
        }

        .hero h1 {
            font-size: 40px;
            font-weight: 600;
        }

        .hero p {
            color: #6c757d;
        }

        .section {
            padding: 70px 0;
        }

        .section-title {
            font-weight: 600;
            margin-bottom: 15px;
        }

        .card {
            border: none;
            border-radius: 14px;
            box-shadow: 0 10px 25px rgba(0,0,0,0.05);
        }

        .footer {
            background: #fff;
            padding: 20px 0;
            text-align: center;
            font-size: 14px;
            color: #6c757d;
        }
    </style>
</head>
<body>

<!-- NAVBAR -->
<nav class="navbar navbar-expand-lg border-bottom">
    <div class="container">
        <a class="navbar-brand fw-semibold" href="#">POS System</a>

        <div class="ms-auto">
            <a href="/login" class="btn btn-primary btn-sm me-2">Login</a>
            <a href="/register" class="btn btn-outline-secondary btn-sm">Sign Up</a>
        </div>
    </div>
</nav>

<!-- HERO / SLIDER -->
<section class="hero text-center">
    <div class="container">
        <h1>Smart POS for Modern Businesses</h1>
        <p class="mt-3 mb-4">
            Manage sales, inventory, and customers — all in one place.
        </p>

        <a href="/register" class="btn btn-primary btn-lg me-2">Get Started</a>
        <a href="/login" class="btn btn-outline-dark btn-lg">Login</a>
    </div>
</section>

<!-- FEATURES -->
<section class="section bg-white">
    <div class="container text-center">
        <h2 class="section-title">Features</h2>
        <p class="text-muted mb-5">Everything you need to run your business</p>

        <div class="row g-4">
            <div class="col-md-4">
                <div class="card p-4">
                    <h5>Sales Tracking</h5>
                    <p class="text-muted">Monitor transactions in real-time.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card p-4">
                    <h5>Inventory</h5>
                    <p class="text-muted">Keep stock updated automatically.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card p-4">
                    <h5>Customers</h5>
                    <p class="text-muted">Manage customer data easily.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ABOUT -->
<section class="section">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-6">
                <h2 class="section-title">About Us</h2>
                <p class="text-muted">
                    Our POS system is designed to simplify business operations. 
                    Whether you're running a small shop or a large store, 
                    we provide tools to help you grow efficiently.
                </p>
            </div>
            <div class="col-md-6 text-center">
                <img src="https://via.placeholder.com/400" class="img-fluid rounded-3">
            </div>
        </div>
    </div>
</section>

<!-- MISSION & VISION -->
<section class="section bg-white">
    <div class="container text-center">
        <h2 class="section-title">Our Mission & Vision</h2>

        <div class="row mt-4">
            <div class="col-md-6">
                <div class="card p-4">
                    <h5>Mission</h5>
                    <p class="text-muted">
                        To empower businesses with simple and powerful tools.
                    </p>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card p-4">
                    <h5>Vision</h5>
                    <p class="text-muted">
                        To become a leading POS solution worldwide.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- CTA -->
<section class="section text-center">
    <div class="container">
        <h2 class="section-title">Start Managing Your Business Today</h2>
        <p class="text-muted mb-4">
            Join thousands of businesses using our POS system.
        </p>

        <a href="/register" class="btn btn-primary btn-lg">Create Account</a>
    </div>
</section>

<!-- FOOTER -->
<div class="footer">
    © {{ date('Y') }} POS System. All rights reserved.
</div>

</body>
</html>