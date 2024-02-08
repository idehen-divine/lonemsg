<!DOCTYPE html>


<html lang="en" class="dark-style layout-navbar-fixed layout-menu-fixed layout-compact " dir="ltr"
	data-theme="theme-default" data-assets-path="{{ asset('assets') }}/" data-template="vertical-menu-template">

	<head>
		<meta charset="utf-8" />
		<meta name="viewport"
			content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

		<title>404 Not Found | L0N3MSG</title>

		<!-- CSRF Token -->
		<meta name="csrf-token" content="{{ csrf_token() }}">

		{{-- <meta name="description" content="Starter kits for laravel MVC with custom bootstrap theme!" />
		<meta name="keywords" content="dashboard, bootstrap 5 dashboard, bootstrap 5 design, bootstrap 5"> --}}

		<!-- Favicon -->
		{{-- <link rel="icon" type="image/x-icon" href="{{ asset('assets/img/favicon/favicon.ico') }}" /> --}}

		<!-- Fonts -->
		<link rel="preconnect" href="https://fonts.googleapis.com">
		<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
		<link
			href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
			rel="stylesheet">

		<!-- Icons -->
		<link rel="stylesheet" href="{{ asset('assets/vendor/fonts/boxicons.css') }}" />
		<link rel="stylesheet" href="{{ asset('assets/vendor/fonts/fontawesome.css') }}" />
		<link rel="stylesheet" href="{{ asset('assets/vendor/fonts/flag-icons.css') }}" />

		<!-- Core CSS -->
		<link rel="stylesheet" href="{{ asset('assets/vendor/css/rtl/core.css') }}" class="template-customizer-core-css" />
		<link rel="stylesheet" href="{{ asset('assets/vendor/css/rtl/theme-default.css') }}"
			class="template-customizer-theme-css" />

		<!-- Vendors CSS -->
		<link rel="stylesheet" href="{{ asset('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css') }}" />
		<link rel="stylesheet" href="{{ asset('assets/vendor/libs/typeahead-js/typeahead.css') }}" />

		<!-- Page CSS -->
		<style>
			.misc-wrapper {
				display: flex;
				flex-direction: column;
				justify-content: center;
				align-items: center;
				min-height: calc(100vh - (1.625rem * 2));
				text-align: center
			}
		</style>
		@stack('style')

		<!-- Helpers -->
		<script src="{{ asset('assets/vendor/js/helpers.js') }}"></script>
		<script src="{{ asset('assets/vendor/js/template-customizer.js') }}"></script>
		<script src="{{ asset('assets/js/config.js') }}"></script>

		<!-- Livewire Style-->
		@livewireStyles
		<!-- Livewire Script-->
		@livewireScripts
	</head>

	<body>
		<!-- Layout wrapper -->
		{{ $slot }}
		<!-- / Layout wrapper -->

		<!-- Core JS -->
		<!-- build:js assets/vendor/js/core.js -->

		<script src="{{ asset('assets/vendor/libs/jquery/jquery.js') }}"></script>
		<script src="{{ asset('assets/vendor/libs/popper/popper.js') }}"></script>
		<script src="{{ asset('assets/vendor/js/bootstrap.js') }}"></script>
		<script src="{{ asset('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js') }}"></script>
		<script src="{{ asset('assets/vendor/libs/typeahead-js/typeahead.js') }}"></script>
		<script src="{{ asset('assets/vendor/libs/hammer/hammer.js') }}"></script>
		<script src="{{ asset('assets/vendor/js/menu.js') }}"></script>

		<!-- endbuild -->

		<!-- Vendors JS -->

		<!-- Main JS -->
		<script src="{{ asset('assets/js/main.js') }}"></script>


		<!-- Page JS -->
		@stack('script')

	</body>

</html>
