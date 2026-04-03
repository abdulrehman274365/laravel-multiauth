<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>503 - Maintenance</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Inter', sans-serif;
            height: 100vh;
            display: flex;
            align-items: center;
            background: linear-gradient(135deg, #f8f9fa, #eef1f5);
        }

        .wrapper {
            max-width: 1100px;
            margin: auto;
        }

        /* 503 TEXT */
        .code {
            font-size: 80px;
            font-weight: 700;
            color: #212529;
            position: relative;
        }

        .code::after {
            content: "503";
            position: absolute;
            top: 5px;
            left: 5px;
            color: #dee2e6;
            z-index: -1;
        }

        .divider {
            width: 60px;
            height: 3px;
            background: #dee2e6;
            margin: 20px 0;
        }

        .text-muted-custom {
            color: #6c757d;
            font-size: 15px;
            line-height: 1.6;
        }

        /* BUTTON */
        .btn-custom {
            border-radius: 8px;
            padding: 10px 22px;
            font-weight: 500;
            transition: all 0.25s ease;
        }

        .btn-custom:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(0,0,0,0.08);
        }

        /* LOADER */
        .loader {
            width: 40px;
            height: 40px;
            border: 3px solid #dee2e6;
            border-top: 3px solid #212529;
            border-radius: 50%;
            animation: spin 0.8s linear infinite;
            margin: 20px 0;
        }

        @keyframes spin {
            to {
                transform: rotate(360deg);
            }
        }

        /* IMAGE */
        .illustration img {
            max-width: 90%;
            opacity: 0.95;
        }

        @media (max-width: 768px) {
            .code {
                font-size: 60px;
            }
        }
    </style>
</head>

<body>

<div class="container">
    <div class="wrapper">
        <div class="row align-items-center">

            <!-- LEFT -->
            <div class="col-md-6 text-md-start text-center mb-5 mb-md-0">

                <div class="code">503</div>

                <div class="divider mx-md-0 mx-auto"></div>

                <h4 class="fw-semibold mb-2">We’re under maintenance</h4>

                <p class="text-muted-custom mb-3">
                    Our website is currently undergoing scheduled maintenance.
                    We’ll be back shortly. Thank you for your patience.
                </p>

                <!-- Loader -->
                <div class="loader mx-md-0 mx-auto"></div>

                <p class="text-muted-custom small">
                    Estimated time: <strong>15–30 minutes</strong>
                </p>

                <a href="/" class="btn btn-dark btn-custom mt-3">
                    Retry
                </a>

            </div>

            <!-- RIGHT -->
            <div class="col-md-6 text-center illustration">
                <img src="{{ asset('web/assets/images/error/maintenance.png') }}" alt="Maintenance illustration">
            </div>

        </div>
    </div>
</div>

</body>

</html>