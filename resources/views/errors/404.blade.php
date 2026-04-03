<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>404 - Page Not Found</title>

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

        /* 404 TEXT */
        .code {
            font-size: 90px;
            font-weight: 700;
            color: #212529;
            letter-spacing: -2px;
            position: relative;
            display: inline-block;
        }

        /* subtle 3D shadow */
        .code::after {
            content: "404";
            position: absolute;
            top: 6px;
            left: 6px;
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

        /* IMAGE */
        .illustration img {
            max-width: 90%;
            opacity: 0.9;
        }

        /* RESPONSIVE */
        @media (max-width: 768px) {
            .code {
                font-size: 70px;
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

                    <div class="code">404</div>

                    <div class="divider mx-md-0 mx-auto"></div>

                    <h4 class="mb-2 fw-semibold">Page not found</h4>

                    <p class="text-muted-custom mb-4">
                        The page you’re trying to access doesn’t exist or has been moved.
                        Please check the URL or return to the dashboard.
                    </p>

                    <a href="/" class="btn btn-dark btn-custom">
                        Go back home
                    </a>

                </div>

                <!-- RIGHT -->
                <div class="col-md-6 text-center illustration">
                    <img src="{{ asset('web/assets/images/error/lost_person.png') }}" alt="Lost illustration">
                </div>

            </div>
        </div>
    </div>

</body>

</html>