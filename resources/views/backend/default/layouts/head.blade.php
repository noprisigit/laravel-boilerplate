<!-- Meta Data -->
<meta charset="UTF-8">
<meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=no'>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>{{ config('app.name') }} - @yield('title', __('Beranda')) </title>

<!-- Favicon -->
<link rel="icon" href="{{ asset(get_admin_template_base_path() . '/images/brand-logos/favicon.ico') }}"
    type="image/x-icon">

<!-- Choices JS -->
<script src="{{ asset(get_admin_template_base_path() . '/libs/choices.js/public/assets/scripts/choices.min.js') }}">
</script>

<!-- Main Theme Js -->
<script src="{{ asset(get_admin_template_base_path() . '/js/main.js') }}"></script>

<!-- Bootstrap Css -->
<link id="style" href="{{ asset(get_admin_template_base_path() . '/libs/bootstrap/css/bootstrap.min.css') }}"
    rel="stylesheet">

<!-- Style Css -->
<link href="{{ asset(get_admin_template_base_path() . '/css/styles.min.css') }}" rel="stylesheet">

<!-- Icons Css -->
<link href="{{ asset(get_admin_template_base_path() . '/css/icons.css') }}" rel="stylesheet">

<!-- Node Waves Css -->
<link href="{{ asset(get_admin_template_base_path() . '/libs/node-waves/waves.min.css') }}" rel="stylesheet">

<!-- Simplebar Css -->
<link href="{{ asset(get_admin_template_base_path() . '/libs/simplebar/simplebar.min.css') }}" rel="stylesheet">

<!-- Color Picker Css -->
<link rel="stylesheet" href="{{ asset(get_admin_template_base_path() . '/libs/flatpickr/flatpickr.min.css') }}">
<link rel="stylesheet"
    href="{{ asset(get_admin_template_base_path() . '/libs/@simonwep/pickr/themes/nano.min.css') }}">

<!-- Choices Css -->
<link rel="stylesheet"
    href="{{ asset(get_admin_template_base_path() . '/libs/choices.js/public/assets/styles/choices.min.css') }}">

<link href="https://cdn.jsdelivr.net/npm/tom-select@2.4.1/dist/css/tom-select.css" rel="stylesheet">

@stack('css')

@livewireStyles
