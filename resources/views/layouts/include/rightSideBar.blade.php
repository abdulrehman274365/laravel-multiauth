<!-- Right Sidebar -->
<div class="right-bar">
    <div data-simplebar class="h-100">
        <div class="rightbar-title d-flex align-items-center px-3 py-4 shadow">

            <h5 class="m-0 me-2">Settings</h5>

            <a href="javascript:void(0);" class="right-bar-toggle ms-auto">
                <i class="mdi mdi-close noti-icon"></i>
            </a>
        </div>

        <!-- Settings -->
        <hr class="mt-0" />
        <h6 class="text-center mb-0">Theme Setting</h6>
        <div class="p-4">
            <div class="form-check form-switch mb-3">
                <input class="form-check-input" type="checkbox" id="night-mode-switch">
                <label class="form-check-label" for="night-mode-switch">Dark Mode</label>
            </div>
        </div>

        <h6 class="text-center mb-0">Left Sidebar Setting</h6>
        <div class="p-4">
            <div class="form-check form-switch mb-3">
                <input class="form-check-input" {{ auth()->user()->dashboardSettings->left_side_bar_collpsed?'checked':'' }} type="checkbox" id="side-bar-night-mode-switch">
                <label class="form-check-label" for="side-bar-night-mode-switch">Collapsed</label>
            </div>
        </div>

    </div> <!-- end slimscroll-menu-->
</div>

<script>
    function initSettings() {
        $("#night-mode-switch").off("change").on("change", function () {
            updateThemeSetting($(this).prop("checked"));
        });

        $("#side-bar-night-mode-switch").off("change").on("change", function () {
            console.log('Working ...')
            $('#vertical-menu-btn').trigger('click');
            updateLeftSideBar($(this).prop("checked"));
        });

        // Check current mode on load
        if (document.body.getAttribute("data-bs-theme") === "dark") {
            $("#night-mode-switch").prop("checked", true);
        }
    }

    function updateLeftSideBar(isDarkMode) {
        $('.loading-screen').removeClass('d-none');
        $.ajax({
            url: "{{ route('user.left.side.bar.setting') }}",
            data: {
                left_side_bar_collpsed: isDarkMode,
            },
            type: "GET",
            success: function (response) {
                $('.loading-screen').addClass('d-none');
                console.log(response)
            },
            error: function (xhr, status, error) {
                console.error("Error:", error);
            }
        });
    }
    function updateThemeSetting(isDarkMode) {
        if (isDarkMode) {
            document.body.setAttribute('data-bs-theme', 'dark');

            if ($("#rtl-mode-switch").prop("checked") === true) {
                $("html").attr("dir", 'rtl');
            } else {
                $("html").removeAttr("dir");
            }
            if (document.body.getAttribute("data-topbar") === "dark") {
                document.body.setAttribute('data-sidebar', 'light');
            }
        } else {
            document.body.setAttribute('data-bs-theme', 'light');
            $("html").removeAttr("dir");
        }
        $('.loading-screen').removeClass('d-none');
        $.ajax({
            url: "{{ route('user.night.mode.setting') }}",
            data: {
                night_mode: isDarkMode,
            },
            type: "GET",
            success: function (response) {
                $('.loading-screen').addClass('d-none');
                console.log(response)
            },
            error: function (xhr, status, error) {
                console.error("Error:", error);
            }
        });
    }

    // Initialize
    $(document).ready(function () {
        initSettings();
    });
</script>
<!-- /Right-bar -->