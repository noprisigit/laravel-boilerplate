<!DOCTYPE html>
<html lang="en" dir="ltr" data-nav-layout="vertical" data-theme-mode="light" data-header-styles="light"
    data-menu-styles="dark" data-toggled="close">

<head>

    @include(get_admin_template_base_path() . '.layouts.head')

</head>

<body>
    <!-- Start Switcher -->
    @include(get_admin_template_base_path() . '.layouts.switcher')
    <!-- End Switcher -->

    <div class="page">
        <!-- app-header -->
        @include(get_admin_template_base_path() . '.layouts.header')
        <!-- /app-header -->

        <!-- Start::app-sidebar -->
        @include(get_admin_template_base_path() . '.layouts.sidebar')
        <!-- End::app-sidebar -->

        <!-- Start::app-content -->
        <div class="main-content app-content">
            <div class="container-fluid">

                <!-- Page Header -->
                {{-- <div class="d-md-flex d-block align-items-center justify-content-between my-4 page-header-breadcrumb">
                    <h1 class="page-title fw-semibold fs-18 mb-0">Empty</h1>
                    <div class="ms-md-1 ms-0">
                        <nav>
                            <ol class="breadcrumb mb-0">
                                <li class="breadcrumb-item"><a href="#">Pages</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Empty</li>
                            </ol>
                        </nav>
                    </div>
                </div> --}}
                <!-- Page Header Close -->

                <!-- Start::row-1 -->
                @yield('content')
                <!--End::row-1 -->

            </div>
        </div>
        <!-- End::app-content -->

        <!-- Footer Start -->
        @include(get_admin_template_base_path() . '.layouts.footer')
        <!-- Footer End -->

    </div>


    @include(get_admin_template_base_path() . '.layouts.scripts')

</body>

</html>
