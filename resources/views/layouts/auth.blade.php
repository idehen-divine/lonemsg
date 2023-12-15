<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="{{ asset('assets/css/theme/theme-default-dark.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/theme/core-dark.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/fonts/boxicons.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/fonts/font-awesome/css/all.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/sweetalert/min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/spinkit/spinkit.css') }}">

    <!-- Page Css -->
    <link rel="stylesheet" href="{{ asset('assets/css/pages/auth.css') }}" />

    <title>@yield('title') | L0N3MSG</title>

    <style>
        .mine {
            min-width: 60%;
            border-radius: 20px;
        }

        .btn-user {
            position: fixed;
            bottom: 3rem;
            right: 1.625rem;
            z-index: 1080;
            border-radius: 100%;
            margin: 0px;
            padding: 0px;
            background-color: transparent;
        }
    </style>

    @yield('style')
</head>

<body class="d-flex flex-column h-100">
    @yield('contents')

    @if (Route::is('message'))
        <li class="nav-item dropdown btn btn-user">
            <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
                <i id="bx-icon" class="far fa-user-circle" style="width: 36px; height: 36px;"></i>
            </a>
            <ul class="dropdown-menu dropdown-menu-end dropdown-styles">
                @if (auth()->guard('user')->check())
                    <li>
                        <a class="dropdown-item" href="javascript:void(0);" onclick="logout()" id="light-toggle">
                            <span class="align-middle"><i class="fas fa-sign-out-alt me-2"></i>LOGOUT</span>
                        </a>
                    </li>
                @else
                    <li>
                        <a class="dropdown-item" href="{{ route('login') }}" id="dark-toggle">
                            <span class="align-middle"><i class="fas fa-user-check me-2"></i>LOGIN</span>
                        </a>
                    </li>
                @endif
            </ul>
        </li>
    @endif

    <form id="logout" action="{{ route('logout') }}" method="post">@csrf</form>

    <x-toast />

    <x-footer />
</body>

<script src="{{ asset('assets/vendor/jquery/jquery.js') }}"></script>
<script src="{{ asset('assets/vendor/popper/popper.js') }}"></script>
<script src="{{ asset('assets/js/bootstrap.js') }}"></script>
<script src="{{ asset('assets/fonts/font-awesome/js/all.js') }}"></script>
<script src="{{ asset('assets/vendor/clipboard/clipboard.min.js') }}"></script>
<script src="{{ asset('assets/vendor/sweetalert/all.min.js') }}"></script>
<script src="{{ asset('assets/js/popover.js') }}"></script>
<script src="{{ asset('assets/js/script.js') }}"></script>

<!-- Page Js -->
<script src="{{ asset('assets/js/pages/auth.js') }}"></script>
<script>
    function logout() {
        $('#logout').submit();
    }
</script>
@yield('script')

</html>
