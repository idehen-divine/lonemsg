<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="{{ asset('assets/css/theme/theme-default-dark.css') }}"/>
    <link rel="stylesheet" href="{{ asset('assets/css/theme/core-dark.css') }}"/>
    <link rel="stylesheet" href="{{ asset('assets/fonts/boxicons.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/fonts/font-awesome/css/all.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/sweetalert/min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/spinkit/spinkit.css') }}">

    <title>@yield('title') | L0N3MSG</title>

    <style>
        .mine {
            min-width: 60%;
            border-radius: 20px;
        }
    </style>
    @yield('style')
</head>

<body class="d-flex flex-column h-100">
    @yield('contents')

    <x-toast/>

    <x-footer>
</body>

<script src="{{ asset('assets/vendor/jquery/jquery.js') }}"></script>
<script src="{{ asset('assets/vendor/popper/popper.js') }}"></script>
<script src="{{ asset('assets/js/bootstrap.js') }}"></script>
<script src="{{ asset('assets/fonts/font-awesome/js/all.js') }}"></script>
<script src="{{ asset('assets/vendor/clipboard/clipboard.min.js') }}"></script>
<script src="{{ asset('assets/vendor/sweetalert/all.min.js') }}"></script>
<script src="{{ asset('assets/js/popover.js') }}"></script>
    <script src="{{ asset('assets/js/script.js') }}"></script>

@yield('script')

</html>
