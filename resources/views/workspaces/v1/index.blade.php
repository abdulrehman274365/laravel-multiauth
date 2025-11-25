<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Workspace Grid — Modern</title>


    <!-- Bootstrap Css -->
    <link href="{{ asset('web/assets/css/bootstrap.min.css') }}" id="bootstrap-style" rel="stylesheet">

    <!-- Icons Css -->
    <link href="{{ asset('web/assets/css/icons.min.css') }}" rel="stylesheet">

    <!-- App Css -->
    <link href="{{ asset('web/assets/css/app.min.css') }}" id="app-style" rel="stylesheet">

    <!-- jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    <style>
        :root {
            --primary: #04A2B3;
            --secondary: #3C4957;
            --dark-bg: #323C48;
        }

        body {
            background: #eef1f6;
            font-family: "Inter", sans-serif;
        }

        /* Header Section — Gradient using primary + darker tint */
        .header-section {
            background: linear-gradient(135deg, var(--primary), #067e8b);
            padding: 35px 20px;
            border-radius: 20px;
            color: white;
            margin-bottom: 25px;
            box-shadow: 0 8px 18px rgba(0, 0, 0, 0.1);
        }

        /* Scroll Wrapper */
        .workspace-wrapper {
            max-height: 450px;
            overflow-y: auto;
            padding-right: 5px;

            /* Hide scrollbars */
            scrollbar-width: none;
            -ms-overflow-style: none;
        }

        .workspace-wrapper::-webkit-scrollbar {
            display: none;
        }

        /* Workspace Cards */
        .workspace-card {
            border-radius: 16px;
            background: white;
            transition: 0.25s ease;
            border: 1px solid #f1f1f1;
        }

        .workspace-card:hover {
            transform: translateY(-6px);
            box-shadow: 0 12px 26px rgba(0, 0, 0, 0.08);
            background: #ffffff;
            border-color: var(--primary);
        }

        /* Icon color uses your primary */
        .workspace-card i {
            color: var(--primary);
        }

        /* Active selection */
        .selected-card {
            border: 2px solid var(--primary) !important;
            background: rgba(4, 162, 179, 0.08) !important;
            transform: translateY(-4px);
            box-shadow: 0 8px 18px rgba(4, 162, 179, 0.15);
        }

        /* Secondary text tone */
        .text-secondary-custom {
            color: var(--secondary) !important;
        }

        .workspace-container {
            max-width: 1150px;
        }
    </style>
</head>

<body>

    <div class="container py-5 d-flex justify-content-center">
        <div class="workspace-container w-100">

            <!-- Modern Gradient Header -->
            <div class="header-section text-center mb-4">
                <h2 class="fw-bold mb-1">Your Workspaces</h2>
                <p class="opacity-75 mb-0">Select the workspace you want to work on</p>
            </div>

            <!-- Scrollable Workspaces -->
            <div class="card shadow-sm border-0 p-4 workspace-wrapper mx-auto">

                <div class="row" id="workspace-list">
                    @for ($i = 1; $i <= 20; $i++)
                        <div class="col-md-3 col-sm-6 mb-3">
                            <!-- Hidden Radio -->
                            <input type="radio" name="workspace" id="workspace-{{ $i }}" value="{{ $i }}"
                                class="d-none workspace-radio">
                            <!-- Card Label -->
                            <label for="workspace-{{ $i }}" class="workspace-card text-center p-4 d-block">
                                <i class="ri-folder-2-line fs-1 mb-2"></i>
                                <h6 class="fw-semibold mb-0 text-secondary-custom">Workspace {{ $i }}</h6>
                            </label>

                        </div>
                    @endfor
                </div>

            </div>

            <div class="d-flex justify-content-center gap-2 mt-3">
                <a href="{{ route('dashboard') }}" class="btn btn-outline-primary d-inline-flex align-items-center gap-2">
                    <i class="ri-dashboard-line"></i>
                    Dashboard
                </a>

                <a class="btn btn-outline-secondary d-inline-flex align-items-center gap-2">
                    <i class="ri-add-circle-line"></i>
                    Add Workspace
                </a>

                <form method="POST" action="{{ route('logout') }}" class="d-inline">
                    @csrf
                    <a href="{{route('logout')}}" onclick="event.preventDefault(); this.closest('form').submit();"
                        class="btn btn-outline-danger d-inline-flex align-items-center gap-2">
                        <i class="ri-logout-circle-line"></i>
                        Logout
                    </a>
                </form>

            </div>



        </div>
    </div>

    <script>
        $(document).ready(function () {

            $(".workspace-radio").change(function () {
                let selectedId = $(this).val();
                console.log("Selected Workspace:", selectedId);

                $(".workspace-card").removeClass("selected-card");
                $('label[for="workspace-' + selectedId + '"]').addClass("selected-card");
            });

        });
    </script>
</body>

</html>