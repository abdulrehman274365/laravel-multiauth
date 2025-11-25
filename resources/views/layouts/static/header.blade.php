<header id="page-topbar">
    <div class="navbar-header">
        <div class="d-flex">
            <h1>Appzia</h1>
        </div>

        @if(Auth::check())
            <div class="d-flex">
                <div class="dropdown d-inline-block user-dropdown">
                    <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown"
                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="d-none d-xl-inline-block ms-1">{{ auth()->user()->name }}</span>
                        <i class="mdi mdi-chevron-down d-none d-xl-inline-block"></i>
                    </button>
                    <div class="dropdown-menu dropdown-menu-end">
                        <!-- item-->
                        <a class="dropdown-item" href="#"><i class="ri-user-line align-middle me-1"></i> Profile</a>
                        <div class="dropdown-divider"></div>
                        <form method="POST" action="{{ route('logout') }}" class="d-inline">
                            @csrf
                            <a onclick="event.preventDefault(); this.closest('form').submit();"
                                class="dropdown-item text-danger" href="{{route('logout')}}"><i
                                    class="ri-shut-down-line align-middle me-1 text-danger"></i> Logout</a>
                        </form>
                    </div>
                </div>
            </div>
        @endif
    </div>
</header>