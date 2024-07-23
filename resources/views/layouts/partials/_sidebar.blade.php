<div class="main-sidebar-header">
    <a href="{{ url('/home') }}" class="header-logo">
        <img src="{{ asset('eofficeadmin/images/brand-logos/logo-eoffice.png') }}" alt="logo" class="desktop-logo">
        <img src="{{ asset('eofficeadmin/images/brand-logos/toggle-logo-eoffice.png') }}" alt="logo" class="toggle-logo">
        <img src="{{ asset('eofficeadmin/images/brand-logos/logo-eoffice-dark.png') }}" alt="logo" class="desktop-dark">
        <img src="{{ asset('eofficeadmin/images/brand-logos/toggle-logo-eoffice.png') }}" alt="logo" class="toggle-dark">
        <img src="{{ asset('eofficeadmin/images/brand-logos/logo-eoffice.png') }}" alt="logo" class="desktop-white">
        <img src="{{ asset('eofficeadmin/images/brand-logos/toggle-logo-eoffice.png') }}" alt="logo" class="toggle-white">
    </a>
</div>
<!-- End::main-sidebar-header -->

<!-- Start::main-sidebar -->
<div class="main-sidebar" id="sidebar-scroll">

    <!-- Start::nav -->
    <nav class="main-menu-container nav nav-pills flex-column sub-open">
        <div class="slide-left" id="slide-left"><svg xmlns="http://www.w3.org/2000/svg" fill="#7b8191" width="24"
                height="24" viewBox="0 0 24 24">
                <path d="M13.293 6.293 7.586 12l5.707 5.707 1.414-1.414L10.414 12l4.293-4.293z"></path>
            </svg></div>
        <ul class="main-menu">
            <!-- Start::slide__category -->
            <li class="slide__category"><span class="category-name">Main</span></li>
            <!-- End::slide__category -->

            <!-- Start::slide -->
            <li class="slide">
                <a href="{{ route('home') }}" class="side-menu__item">
                    <i class="bx bx-home side-menu__icon"></i>
                    <span class="side-menu__label">Dashboards</span>
                </a>
            </li>
            <!-- End::slide -->
            
            <!-- Start::slide__category -->
            <li class="slide__category"><span class="category-name">Data</span></li>
            <!-- End::slide__category -->

            <!-- Start::slide -->
            <li class="slide">
                <a href="#" class="side-menu__item">
                    <i class="bx bx-receipt side-menu__icon"></i>
                    <span class="side-menu__label">Menu 1</span>
                </a>
            </li>
            <!-- End::slide -->

            <!-- Start::slide -->
            <li class="slide">
                <a href="#" class="side-menu__item">
                <i class="bx bx-check-shield side-menu__icon"></i>
                    <span class="side-menu__label">Menu 2</span>
                </a>
            </li>
            <!-- End::slide -->

            <!-- Start::slide -->
            <li class="slide">
                <a href="#" class="side-menu__item">
                <i class="bx bx-git-repo-forked side-menu__icon"></i>
                    <span class="side-menu__label">Menu 3</span>
                </a>
            </li>
            <!-- End::slide -->

            <!-- Start::slide -->
            <li class="slide">
                <a href="#" class="side-menu__item">
                <i class="bx bx-book side-menu__icon"></i>
                    <span class="side-menu__label">Menu 4</span>
                </a>
            </li>
            <!-- End::slide -->
            
            <!-- Start::slide__category -->
            <li class="slide__category"><span class="category-name">Master</span></li>
            <!-- End::slide__category -->

            <!-- Start::slide -->
            <li class="slide">
                <a href="#" class="side-menu__item">
                <i class="bx bx-notepad side-menu__icon"></i>
                    <span class="side-menu__label">Menu 1</span>
                </a>
            </li>
            <!-- End::slide -->

            <!-- Start::slide -->
            <li class="slide">
                <a href="#" class="side-menu__item">
                <i class="bx bxs-institution side-menu__icon"></i>
                    <span class="side-menu__label">Menu 2</span>
                </a>
            </li>
            <!-- End::slide -->

            <!-- Start::slide__category -->
            <li class="slide__category"><span class="category-name">Report</span></li>
            <!-- End::slide__category -->

            <!-- Start::slide -->
            <li class="slide">
                <a href="#" class="side-menu__item">
                <i class="bx bx-printer side-menu__icon"></i>
                    <span class="side-menu__label">Menu 1</span>
                </a>
            </li>
            <!-- End::slide -->

            <!-- Start::slide -->
            <li class="slide">
                <a href="#" class="side-menu__item">
                <i class="bx bx-printer side-menu__icon"></i>
                    <span class="side-menu__label">Menu 2</span>
                </a>
            </li>
            <!-- End::slide -->

            <!-- Start::slide__category -->
            <li class="slide__category"><span class="category-name">Users</span></li>
            <!-- End::slide__category -->

            <!-- Start::slide -->
            <li class="slide has-sub">
                <a href="javascript:void(0);" class="side-menu__item">
                <i class="bx bx-user side-menu__icon"></i>
                    <span class="side-menu__label">Users<span
                            class="text-success text-[0.75em] badge !py-[0.25rem] !px-[0.45rem] rounded-sm bg-success/10 ms-2">20</span></span>
                    <i class="fe fe-chevron-right side-menu__angle"></i>
                </a>
                <ul class="slide-menu child1">
                    <li class="slide">
                        <a href="#" class="side-menu__item">User</a>
                    </li>
                    <li class="slide">
                        <a href="#" class="side-menu__item">Role</a>
                    </li>
                </ul>
            </li>
            <!-- End::slide -->
        <div class="slide-right" id="slide-right"><svg xmlns="http://www.w3.org/2000/svg" fill="#7b8191" width="24"
                height="24" viewBox="0 0 24 24">
                <path d="M10.707 17.707 16.414 12l-5.707-5.707-1.414 1.414L13.586 12l-4.293 4.293z"></path>
            </svg>
        </div>
    </nav>
    <!-- End::nav -->

</div>
<!-- End::main-sidebar -->
