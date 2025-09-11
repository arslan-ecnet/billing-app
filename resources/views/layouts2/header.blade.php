<nav class="main-header navbar navbar-expand-lg navbar-white navbar-light"
     style="margin-top: 2rem; position: relative;">
    <!-- Theme Toggle -->
{{--    <button id="toggle-theme" class="btn btn-link"--}}
{{--            style="position: absolute; left: 10px; top: 10px; font-size: 1.5rem;">--}}
{{--        <i id="theme-icon" class="fas fa-moon" style="color: black;"></i>--}}
{{--    </button>--}}

{{--    <!-- Logo -->--}}
{{--    <div id="logo-container" class="position-absolute top-50 start-50 translate-middle">--}}
{{--        <img src="/logo.png" width="100" height="100" id="logo">--}}
{{--        <h2 class="header-title d-none" id="dark-title" style="margin:0;">--}}
{{--            <b>--}}
{{--                <span class="animated-text1">Peer</span>--}}
{{--                <span class="animated-text2">Jee</span>--}}
{{--                <span class="animated-text3">Kurta</span>--}}
{{--            </b>--}}
{{--        </h2>--}}
{{--    </div>--}}
    <div class="d-flex align-items-center w-100">
        <!-- Theme Toggle (left) -->
        <button id="toggle-theme" class="btn btn-link" style="font-size: 1.5rem;">
            <i id="theme-icon" class="fas fa-moon" style="color: black;"></i>
        </button>

        <!-- Logo (center) -->
        <div class="mx-auto text-center">
            <img src="/logo.png" width="100" height="100" id="logo">
        </div>

        <!-- Hamburger (right) -->
        <button class="navbar-toggler ms-auto" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarMenu" aria-controls="navbarMenu"
                aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
    </div>


    <!-- Collapsible Menu -->
    <div class="collapse navbar-collapse justify-content-end" id="navbarMenu">
        <ul class="navbar-nav">
            @if (Route::has('login'))
                @auth
                    <li class="nav-item">
                        <div class="d-flex gap-2">
                            <a href="{{ url('/dashboard') }}" class="btn btn-success">Dashboard</a>&nbsp;
                            <form method="POST" action="{{ route('logout') }}" style="margin:0;">
                                @csrf
                                <button type="submit" class="btn btn-dark">Logout</button>
                            </form>
                        </div>
                    </li>
                @else
                    <li class="nav-item">
                        <a href="{{ route('login') }}" class="btn btn-warning">Login</a>
                    </li>
                @endauth
            @endif
        </ul>

    </div>
</nav>
