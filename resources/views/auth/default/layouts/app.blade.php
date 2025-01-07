<!DOCTYPE html>
<html lang="en" dir="ltr" data-nav-layout="vertical" data-vertical-style="overlay" data-theme-mode="light"
    data-header-styles="light" data-menu-styles="light" data-toggled="close">

<head>

    <!-- Meta Data -->
    <meta charset="UTF-8">
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title> {{ config('app.name') }} - @yield('title', __('Login')) </title>

    <!-- Favicon -->
    <link rel="icon" href="{{ asset(get_admin_template_base_path() . '/images/brand-logos/favicon.ico') }}"
        type="image/x-icon">

    <!-- Main Theme Js -->
    <script src="{{ asset(get_admin_template_base_path() . '/js/authentication-main.js') }}"></script>

    <!-- Bootstrap Css -->
    <link id="style" href="{{ asset(get_admin_template_base_path() . '/libs/bootstrap/css/bootstrap.min.css') }}"
        rel="stylesheet">

    <!-- Style Css -->
    <link href="{{ asset(get_admin_template_base_path() . '/css/styles.min.css') }}" rel="stylesheet">

    <!-- Icons Css -->
    <link href="{{ asset(get_admin_template_base_path() . '/css/icons.min.css') }}" rel="stylesheet">


</head>

<body>

    <div class="container">
        @yield('content')
    </div>

    <!-- Bootstrap JS -->
    <script src="{{ asset(get_admin_template_base_path() . '/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <!-- Show Password JS -->
    <script src="{{ asset(get_admin_template_base_path() . '/js/show-password.js') }}"></script>

</body>

</html>
