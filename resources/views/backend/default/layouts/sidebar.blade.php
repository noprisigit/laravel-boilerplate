<aside class="app-sidebar sticky" id="sidebar">

    <!-- Start::main-sidebar-header -->
    <div class="main-sidebar-header">
        <a href="index.html" class="header-logo">
            <img src="{{ asset(get_admin_template_base_path() . '/images/brand-logos/desktop-logo.png') }}" alt="logo"
                class="desktop-logo">
            <img src="{{ asset(get_admin_template_base_path() . '/images/brand-logos/toggle-logo.png') }}" alt="logo"
                class="toggle-logo">
            <img src="{{ asset(get_admin_template_base_path() . '/images/brand-logos/desktop-dark.png') }}"
                alt="logo" class="desktop-dark">
            <img src="{{ asset(get_admin_template_base_path() . '/images/brand-logos/toggle-dark.png') }}"
                alt="logo" class="toggle-dark">
        </a>
    </div>
    <!-- End::main-sidebar-header -->

    <!-- Start::main-sidebar -->
    <div class="main-sidebar" id="sidebar-scroll">

        <!-- Start::nav -->
        <nav class="main-menu-container nav nav-pills flex-column sub-open">
            <div class="slide-left" id="slide-left">
                <svg xmlns="http://www.w3.org/2000/svg" fill="#7b8191" width="24" height="24"
                    viewBox="0 0 24 24">
                    <path d="M13.293 6.293 7.586 12l5.707 5.707 1.414-1.414L10.414 12l4.293-4.293z"></path>
                </svg>
            </div>
            <ul class="main-menu">
                <!-- Start::slide__category -->
                <li class="slide__category"><span class="category-name">Main</span></li>
                <!-- End::slide__category -->


                <!-- Start::slide__category -->
                <li class="slide__category"><span class="category-name">Pages</span></li>
                <!-- End::slide__category -->

                <!-- Start::slide -->
                <li class="slide has-sub">
                    <a href="javascript:void(0);" class="side-menu__item ">
                        <i class="bx bx-file-blank side-menu__icon"></i>
                        <span class="side-menu__label">Pages</span>
                        <i class="fe fe-chevron-right side-menu__angle"></i>
                    </a>
                    <ul class="slide-menu child1 ">
                        <li class="slide side-menu__label1">
                            <a href="javascript:void(0)">Pages</a>
                        </li>
                        <li class="slide ">
                            <a href="empty.html" class="side-menu__item ">Empty</a>
                        </li>
                    </ul>
                </li>
                <!-- End::slide -->

                <!-- Start::slide__category -->
                <li class="slide__category"><span class="category-name">Maps & Icons</span></li>
                <!-- End::slide__category -->

                <!-- Start::slide -->
                <li class="slide has-sub @if (Request::is('apps/users*')) active open @endif">
                    <a href="javascript:void(0);" class="side-menu__item @if (Request::is('apps/users*')) active @endif">
                        <i class="bx bx-user side-menu__icon"></i>
                        <span class="side-menu__label">{{ __('Pengguna') }}</span>
                        <i class="fe fe-chevron-right side-menu__angle"></i>
                    </a>
                    <ul class="slide-menu child1 @if (Request::is('apps/users*')) active @endif">
                        <li class="slide side-menu__label1">
                            <a href="javascript:void(0)">{{ __('Pengguna') }}</a>
                        </li>
                        <li class="slide @if (Request::is('apps/users')) active @endif">
                            <a href="{{ route('users.index') }}" class="side-menu__item @if (Request::is('apps/users')) active @endif">{{ __('Semua Pengguna') }}</a>
                        </li>
                        <li class="slide @if (Request::is('apps/users/create')) active @endif">
                            <a href="{{ route('users.create') }}" class="side-menu__item @if (Request::is('apps/users/create')) active @endif">{{ __('Tambah Pengguna') }}</a>
                        </li>
                    </ul>
                </li>
                <!-- End::slide -->

                <!-- Start::slide -->
                <li class="slide">
                    <a href="icons.html" class="side-menu__item">
                        <i class="bx bx-store-alt side-menu__icon"></i>
                        <span class="side-menu__label">Icons</span>
                    </a>
                </li>
                <!-- End::slide -->
            </ul>
            <div class="slide-right" id="slide-right"><svg xmlns="http://www.w3.org/2000/svg" fill="#7b8191"
                    width="24" height="24" viewBox="0 0 24 24">
                    <path d="M10.707 17.707 16.414 12l-5.707-5.707-1.414 1.414L13.586 12l-4.293 4.293z"></path>
                </svg></div>
        </nav>
        <!-- End::nav -->

    </div>
    <!-- End::main-sidebar -->

</aside>
