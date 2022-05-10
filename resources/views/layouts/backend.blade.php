<!doctype html>
<html lang="{{ config('app.locale') }}" dir="{{ __('voyager::generic.is_rtl') == 'true' ? 'rtl' : 'ltr' }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">

    <title>@yield('page_title', setting('admin.title') . " - " . setting('admin.description'))</title>

    <meta name="description" content="{{setting('admin.description','description')}}">
    <meta name="author" content="{{setting('admin.company','Midadtek')}}">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Icons -->
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('media/favicons/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('media/favicons/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('media/favicons/favicon-16x16.png') }}">
    <link rel="manifest" href="{{ asset('media/favicons/site.webmanifes') }}t">
    <link rel="mask-icon" href="{{ asset('media/favicons/safari-pinned-tab.svg') }}" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">

    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('favicon/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('favicon/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('favicon/favicon-16x16.png') }}">
    <link rel="manifest" href="{{ asset('favicon/site.webmanifest') }}">
    <link rel="mask-icon" href="{{ asset('favicon/safari-pinned-tab.svg') }}" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">
    <!-- Fonts and Styles -->
    @yield('css_before')
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap">
    <link rel="stylesheet" id="css-main" href="{{ mix('css/dashmix.css') }}">

    <!-- You can include a specific file from public/css/themes/ folder to alter the default color theme of the template. eg: -->
    <link rel="stylesheet" id="css-theme" href="{{ mix('css/themes/xinspire.css') }}">
    @yield('css_after')

    <!-- Scripts -->
    <script>
        window.Laravel = {!! json_encode(['csrfToken' => csrf_token()]) !!};
    </script>
</head>

<body>
<div id="page-container" class="sidebar-dark enable-page-overlay side-scroll page-header-fixed page-header-dark page-header-glass side-trans-enabled main-content-narrow @if(__('voyager::generic.is_rtl') == 'true') rtl-support @endif">
    <!-- Sidebar -->
    <nav id="sidebar" aria-label="Main Navigation">
        <!-- Side Header -->
        <div class="content-header bg-primary">
            <!-- Logo -->
            <?php $admin_logo_img = Voyager::setting('admin.icon_image', ''); ?>
            <h3 class="block-title">
                @if($admin_logo_img == '')
                    <img class="img-avatar" src="{{asset('media/avatars/avatar7.jpg')}}" alt="Logo Icon">
                @else
                    <img class="img-avatar" style="width: 100px;height: auto;" src="{{ Voyager::image($admin_logo_img) }}" alt="Logo Icon">
                @endif

                <a class="fs-sm fw-semibold ms-2" href="javascript:void(0)">{{Voyager::setting('admin.title', 'VOYAGER')}}</a>
            </h3>
            <!-- END Logo -->

            <!-- Options -->
            <div>
                <!-- Close Sidebar, Visible only on mobile screens -->
                <a class="d-lg-none text-white ms-2" data-toggle="layout" data-action="sidebar_close" href="javascript:void(0)">
                    <i class="fa fa-times-circle"></i>
                </a>
                <!-- END Close Sidebar -->
            </div>
            <!-- END Options -->
        </div>
        <!-- END Side Header -->

        <!-- Sidebar Scrolling -->
        <div class="js-sidebar-scroll">
            <!-- User Info -->
            <div class="smini-hidden">
                <div class="content-side content-side-full bg-black-10 d-flex align-items-center">
                    <a class="img-link d-inline-block" href="javascript:void(0)">
                        <img class="img-avatar img-avatar48 img-avatar-thumb" src="{{ asset('media/avatars/avatar13.jpg') }}" alt="">
                    </a>
                    <div class="ms-3">
                        <a class="fw-semibold text-dual" href="javascript:void(0)">John Doe</a>
                        <div class="fs-sm text-dual">Web Developer</div>
                    </div>
                </div>
            </div>
            <!-- END User Info -->

            <!-- Side Navigation -->
            <div class="content-side content-side-full">
                <ul class="nav-main">
                    <li class="nav-main-item">
                        <a class="nav-main-link{{ request()->is('db_corporate_slim') ? ' active' : '' }}" href="/db_corporate_slim">
                            <i class="nav-main-link-icon fa fa-compass"></i>
                            <span class="nav-main-link-name">Dashboard</span>
                        </a>
                    </li>
                    <li class="nav-main-heading">More</li>
                    <li class="nav-main-item">
                        <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true" aria-expanded="false" href="#">
                            <i class="nav-main-link-icon fa fa-briefcase"></i>
                            <span class="nav-main-link-name">Projects</span>
                        </a>
                        <ul class="nav-main-submenu">
                            <li class="nav-main-item">
                                <a class="nav-main-link" href="">
                                    <i class="nav-main-link-icon fa fa-check"></i>
                                    <span class="nav-main-link-name">Active</span>
                                    <span class="nav-main-link-badge badge rounded-pill bg-success">3</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
            <!-- END Side Navigation -->
        </div>
        <!-- END Sidebar Scrolling -->
    </nav>
    <!-- END Sidebar -->

    <!-- Header -->
    <header id="page-header">
        <!-- Header Content -->
        <div class="content-header">
            <!-- Left Section -->
            <div class="d-flex align-items-center">
                <!-- Logo -->
                <h3 class="block-title">
                    @if($admin_logo_img == '')
                        <img class="img-avatar img-avatar32" src="{{asset('media/avatars/avatar7.jpg')}}" alt="Logo Icon">
                    @else
                        <img class="img-avatar" style="width: 100px;height: auto;" src="{{ Voyager::image($admin_logo_img) }}" alt="Logo Icon">
                    @endif

                    <a class="fs-sm fw-semibold ms-2" href="javascript:void(0)">{{Voyager::setting('admin.title', 'VOYAGER')}}</a>
                </h3>
                <!-- END Logo -->

                <!-- Menu -->
                <ul class="nav-main nav-main-horizontal nav-main-hover d-none d-lg-block ms-3">
                    <li class="nav-main-item">
                        <a class="nav-main-link active" href="db_corporate_slim.html">
                            <i class="nav-main-link-icon fa fa-compass"></i>
                            <span class="nav-main-link-name">Dashboard</span>
                        </a>
                    </li>
                    <li class="nav-main-item">
                        <a class="nav-main-link" href="">
                            <i class="nav-main-link-icon fa fa-user-circle"></i>
                            <span class="nav-main-link-name">Profile</span>
                        </a>
                    </li>
                    <li class="nav-main-item">
                        <a class="nav-main-link" href="">
                            <i class="nav-main-link-icon fa fa-envelope-open"></i>
                            <span class="nav-main-link-name">Messages</span>
                        </a>
                    </li>
                    <li class="nav-main-heading">More</li>
                    <li class="nav-main-item">
                        <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true" aria-expanded="false" href="#">
                            <i class="nav-main-link-icon fa fa-briefcase"></i>
                            <span class="nav-main-link-name">Projects</span>
                        </a>
                        <ul class="nav-main-submenu">
                            <li class="nav-main-item">
                                <a class="nav-main-link" href="">
                                    <i class="nav-main-link-icon fa fa-check"></i>
                                    <span class="nav-main-link-name">Active</span>
                                    <span class="nav-main-link-badge badge rounded-pill bg-success">3</span>
                                </a>
                            </li>
                            <li class="nav-main-item">
                                <a class="nav-main-link" href="">
                                    <i class="nav-main-link-icon fa fa-users"></i>
                                    <span class="nav-main-link-name">Colleagues</span>
                                    <span class="nav-main-link-badge badge rounded-pill bg-primary">24</span>
                                </a>
                            </li>
                            <li class="nav-main-item">
                                <a class="nav-main-link" href="">
                                    <i class="nav-main-link-icon fa fa-cog"></i>
                                    <span class="nav-main-link-name">Manage</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
                <!-- END Menu -->
            </div>
            <!-- END Left Section -->

            <!-- Right Section -->
            <div>
                <!-- Open Search Section -->
                <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
                <button type="button" class="btn btn-alt-secondary d-lg-none" data-toggle="layout" data-action="header_search_on">
                    <i class="fa fa-fw fa-search"></i>
                </button>
                <!-- END Open Search Section -->

                <!-- Search form in larger screens -->
                <form class="d-none d-lg-inline-block me-1" action="be_pages_generic_search.html" method="POST">
                    <input type="text" class="form-control form-control-sm border-0 rounded-pill px-3" placeholder="Search.." id="page-header-search-input-full" name="page-header-search-input-full">
                </form>
                <!-- END Search form in larger screens -->

                <!-- Notifications Dropdown -->
                <div class="dropdown d-inline-block">
                    <button type="button" class="btn btn-alt-secondary" id="page-header-notifications-dropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fa fa-fw fa-bell"></i>
                        <span class="badge bg-black-50 rounded-pill">6</span>
                    </button>
                    <div class="dropdown-menu dropdown-menu-end dropdown-menu-lg p-0" aria-labelledby="page-header-notifications-dropdown">
                        <div class="bg-primary rounded-top fw-semibold text-white text-center p-3">
                            Notifications
                        </div>
                        <ul class="nav-items my-2">
                            <li>
                                <a class="d-flex text-dark py-2" href="javascript:void(0)">
                                    <div class="flex-shrink-0 mx-3">
                                        <i class="fa fa-check-circle text-success"></i>
                                    </div>
                                    <div class="flex-grow-1 fs-sm pe-2">
                                        <div class="fw-semibold">Project X completed successfully.</div>
                                        <div class="text-muted">13 min ago</div>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a class="d-flex text-dark py-2" href="javascript:void(0)">
                                    <div class="flex-shrink-0 mx-3">
                                        <i class="fa fa-fw fa-user-plus text-primary"></i>
                                    </div>
                                    <div class="flex-grow-1 fs-sm pe-2">
                                        <div class="fw-semibold">John Doe assigned you to a project.</div>
                                        <div class="text-muted">7 hours ago</div>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a class="d-flex text-dark py-2" href="javascript:void(0)">
                                    <div class="flex-shrink-0 mx-3">
                                        <i class="fa fa-check-circle text-success"></i>
                                    </div>
                                    <div class="flex-grow-1 fs-sm pe-2">
                                        <div class="fw-semibold">Backup completed successfully!</div>
                                        <div class="text-muted">9 hours ago</div>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a class="d-flex text-dark py-2" href="javascript:void(0)">
                                    <div class="flex-shrink-0 mx-3">
                                        <i class="fa fa-exclamation-circle text-warning"></i>
                                    </div>
                                    <div class="flex-grow-1 fs-sm pe-2">
                                        <div class="fw-semibold">You are running out of space. Please contact your IT manager.</div>
                                        <div class="text-muted">1 day ago</div>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a class="d-flex text-dark py-2" href="javascript:void(0)">
                                    <div class="flex-shrink-0 mx-3">
                                        <i class="fa fa-envelope-open text-info"></i>
                                    </div>
                                    <div class="flex-grow-1 fs-sm pe-2">
                                        <div class="fw-semibold">You have a new message!</div>
                                        <div class="text-muted">2 days ago</div>
                                    </div>
                                </a>
                            </li>
                        </ul>
                        <div class="p-2 border-top">
                            <a class="btn btn-alt-primary w-100 text-center" href="javascript:void(0)">
                                <i class="fa fa-fw fa-eye opacity-50 me-1"></i> View All
                            </a>
                        </div>
                    </div>
                </div>
                <!-- END Notifications Dropdown -->

                <!-- Toggle Sidebar -->
                <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
                <button type="button" class="btn btn-alt-secondary d-lg-none" data-toggle="layout" data-action="sidebar_toggle">
                    <i class="fa fa-fw fa-bars"></i>
                </button>
                <!-- END Toggle Sidebar -->
            </div>
            <!-- END Right Section -->
        </div>
        <!-- END Header Content -->

        <!-- Header Search -->
        <div id="page-header-search" class="overlay-header bg-primary">
            <div class="content-header">
                <form class="w-100" action="be_pages_generic_search.html" method="POST">
                    <div class="input-group">
                        <button type="button" class="btn btn-primary" data-toggle="layout" data-action="header_search_off">
                            <i class="fa fa-fw fa-times-circle"></i>
                        </button>
                        <input type="text" class="form-control border-0" placeholder="Search your company.." id="page-header-search-input" name="page-header-search-input">
                    </div>
                </form>
            </div>
        </div>
        <!-- END Header Search -->

        <!-- Header Loader -->
        <!-- Please check out the Loaders page under Components category to see examples of showing/hiding it -->
        <div id="page-header-loader" class="overlay-header bg-primary-darker">
            <div class="content-header">
                <div class="w-100 text-center">
                    <i class="fa fa-fw fa-2x fa-sun fa-spin text-white"></i>
                </div>
            </div>
        </div>
        <!-- END Header Loader -->
    </header>
    <!-- END Header -->
    <!-- Main Container -->
    <main id="main-container">
        <!-- Hero -->
        <div class="bg-image" style="background-image: url('{{ asset('media/photos/bg@2x.jpg')}}');">
            <div class="bg-primary-dark-op">
                <div class="content content-full content-top">
                    <div class="row pt-3">
                        <div class="col-md py-3 d-md-flex align-items-md-center text-center">
                            <h1 class="text-white mb-0">
                                <span class="fw-semibold">Dashboard</span>
                                <span class="fw-medium fs-base text-white-75 d-block d-md-inline-block">Welcome John</span>
                            </h1>
                        </div>
                        <div class="col-md py-3 d-md-flex align-items-md-center justify-content-md-end text-center">
                            <button type="button" class="btn btn-primary me-1">
                                <i class="fa fa-plus opacity-50 me-1"></i> New Project
                            </button>
                            <button type="button" class="btn btn-primary">
                                <i class="fa fa-cog"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END Hero -->

        <!-- Page Content -->
        <div class="bg-body-extra-light">
            <div class="content content-full">
                <!-- Breadcrumb -->
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb breadcrumb-alt bg-body-light px-4 py-2 rounded push">
                        <li class="breadcrumb-item">
                            <a href="javascript:void(0)">Home</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
                    </ol>
                </nav>
                <!-- END Breadcrumb -->

                <!-- Quick Menu -->
                <div class="row">
                    <div class="col-6 col-md-4 col-xl-2">
                        <a class="block block-rounded block-bordered block-link-shadow text-center" href="javascript:void(0)">
                            <div class="block-content">
                                <p class="my-2">
                                    <i class="fa fa-compass fa-2x text-muted"></i>
                                </p>
                                <p class="fw-semibold">Home</p>
                            </div>
                        </a>
                    </div>
                    <div class="col-6 col-md-4 col-xl-2">
                        <a class="block block-rounded block-bordered block-link-shadow ribbon ribbon-modern ribbon-primary text-center" href="javascript:void(0)">
                            <div class="ribbon-box">2</div>
                            <div class="block-content">
                                <p class="my-2">
                                    <i class="fa fa-envelope-open fa-2x text-muted"></i>
                                </p>
                                <p class="fw-semibold">Inbox</p>
                            </div>
                        </a>
                    </div>
                    <div class="col-6 col-md-4 col-xl-2">
                        <a class="block block-rounded block-bordered block-link-shadow ribbon ribbon-modern ribbon-success text-center" href="javascript:void(0)">
                            <div class="ribbon-box">3</div>
                            <div class="block-content">
                                <p class="my-2">
                                    <i class="fa fa-briefcase fa-2x text-muted"></i>
                                </p>
                                <p class="fw-semibold">Projects</p>
                            </div>
                        </a>
                    </div>
                    <div class="col-6 col-md-4 col-xl-2">
                        <a class="block block-rounded block-bordered block-link-shadow text-center" href="javascript:void(0)">
                            <div class="block-content">
                                <p class="my-2">
                                    <i class="fa fa-chart-pie fa-2x text-muted"></i>
                                </p>
                                <p class="fw-semibold">Statistics</p>
                            </div>
                        </a>
                    </div>
                    <div class="col-6 col-md-4 col-xl-2">
                        <a class="block block-rounded block-bordered block-link-shadow ribbon ribbon-modern ribbon-primary text-center" href="javascript:void(0)">
                            <div class="ribbon-box">24</div>
                            <div class="block-content">
                                <p class="my-2">
                                    <i class="fa fa-user-tie fa-2x text-muted"></i>
                                </p>
                                <p class="fw-semibold">People</p>
                            </div>
                        </a>
                    </div>
                    <div class="col-6 col-md-4 col-xl-2">
                        <a class="block block-rounded block-bordered block-link-shadow text-center" href="javascript:void(0)">
                            <div class="block-content">
                                <p class="my-2">
                                    <i class="fa fa-file-word fa-2x text-muted"></i>
                                </p>
                                <p class="fw-semibold">Documents</p>
                            </div>
                        </a>
                    </div>
                </div>
                <!-- END Quick Menu -->

                <!-- Statistics -->
                <div class="row">
                    <div class="col-md-6">
                        <div class="block block-rounded block-bordered block-mode-loading-refresh">
                            <div class="block-header">
                                <h3 class="block-title">Projects</h3>
                                <div class="block-options">
                                    <button type="button" class="btn-block-option" data-toggle="block-option" data-action="state_toggle" data-action-mode="demo">
                                        <i class="fa fa-sync"></i>
                                    </button>
                                    <button type="button" class="btn-block-option">
                                        <i class="fa fa-wrench"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="block-content p-2">
                                <!-- Chart.js Charts are initialized in js/pages/db_corporate_slim.min.js which was auto compiled from _js/pages/db_corporate_slim.js -->
                                <!-- For more info and examples you can check out http://www.chartjs.org/docs/ -->
                                <canvas id="js-chartjs-corporate-slim-projects"></canvas>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="block block-rounded block-bordered block-mode-loading-refresh">
                            <div class="block-header">
                                <h3 class="block-title">Tickets</h3>
                                <div class="block-options">
                                    <button type="button" class="btn-block-option" data-toggle="block-option" data-action="state_toggle" data-action-mode="demo">
                                        <i class="fa fa-sync"></i>
                                    </button>
                                    <button type="button" class="btn-block-option">
                                        <i class="fa fa-wrench"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="block-content p-2">
                                <!-- Chart.js Charts are initialized in js/pages/db_corporate_slim.min.js which was auto compiled from _js/pages/db_corporate_slim.js -->
                                <!-- For more info and examples you can check out http://www.chartjs.org/docs/ -->
                                <canvas id="js-chartjs-corporate-slim-tickets"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END Statistics -->

                <!-- Quick Stats -->
                <div class="row">
                    <div class="col-md-6 col-xl-3">
                        <a class="block block-rounded block-bordered" href="javascript:void(0)">
                            <div class="block-content p-2">
                                <div class="py-5 text-center bg-body-light rounded">
                                    <div class="fs-2 fw-bold mb-0">45</div>
                                    <div class="fs-sm fw-semibold text-uppercase">All Projects</div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-6 col-xl-3">
                        <a class="block block-rounded block-bordered" href="javascript:void(0)">
                            <div class="block-content p-2">
                                <div class="py-5 text-center bg-body-light rounded">
                                    <div class="fs-2 fw-bold mb-0">4</div>
                                    <div class="fs-sm fw-semibold text-uppercase">Pending Tasks</div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-6 col-xl-3">
                        <a class="block block-rounded block-bordered" href="javascript:void(0)">
                            <div class="block-content p-2">
                                <div class="py-5 text-center bg-body-light rounded">
                                    <div class="fs-2 fw-bold mb-0">19</div>
                                    <div class="fs-sm fw-semibold text-uppercase">Tickets</div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-6 col-xl-3">
                        <a class="block block-rounded block-bordered" href="javascript:void(0)">
                            <div class="block-content p-2">
                                <div class="py-5 text-center bg-body-light rounded">
                                    <div class="fs-2 fw-bold mb-0">2</div>
                                    <div class="fs-sm fw-semibold text-uppercase">Meetings</div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                <!-- END Quick Stats -->

                <!-- People and Tickets -->
                <div class="row items-push">
                    <div class="col-xl-6">
                        <!-- People -->
                        <div class="block block-rounded block-bordered block-mode-loading-refresh h-100 mb-0">
                            <div class="block-header border-bottom">
                                <h3 class="block-title">People</h3>
                                <div class="block-options">
                                    <button type="button" class="btn-block-option" data-toggle="block-option" data-action="state_toggle" data-action-mode="demo">
                                        <i class="fa fa-sync"></i>
                                    </button>
                                    <button type="button" class="btn-block-option">
                                        <i class="fa fa-wrench"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="block-content">
                                <table class="table table-striped table-hover table-borderless table-vcenter fs-sm">
                                    <thead>
                                    <tr class="text-uppercase">
                                        <th class="fw-bold text-center" style="width: 120px;">Photo</th>
                                        <th class="fw-bold">Name</th>
                                        <th class="d-none d-sm-table-cell fw-bold text-center">Projects</th>
                                        <th class="fw-bold text-center" style="width: 60px;"></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td class="text-center">
                                            <img class="img-avatar img-avatar32 img-avatar-thumb" src="{{ asset('media/avatars/avatar2.jpg')}}" alt="">
                                        </td>
                                        <td>
                                            <div class="fw-semibold fs-base">Danielle Jones</div>
                                            <div class="text-muted">carol@example.com</div>
                                        </td>
                                        <td class="d-none d-sm-table-cell fs-base text-center">
                                            <span class="badge bg-dark">2</span>
                                        </td>
                                        <td class="text-center">
                                            <a href="javascript:void(0)" data-bs-toggle="tooltip" data-bs-placement="left" title="View Colleague">
                                                <i class="fa fa-fw fa-user-circle"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-center">
                                            <img class="img-avatar img-avatar32 img-avatar-thumb" src="{{ asset('media/avatars/avatar9.jpg')}}" alt="">
                                        </td>
                                        <td>
                                            <div class="fw-semibold fs-base">Scott Young</div>
                                            <div class="text-muted">smith@example.com</div>
                                        </td>
                                        <td class="d-none d-sm-table-cell fs-base text-center">
                                            <span class="badge bg-warning">4</span>
                                        </td>
                                        <td class="text-center">
                                            <a href="javascript:void(0)" data-bs-toggle="tooltip" data-bs-placement="left" title="View Colleague">
                                                <i class="fa fa-fw fa-user-circle"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-center">
                                            <img class="img-avatar img-avatar32 img-avatar-thumb" src="{{ asset('media/avatars/avatar14.jpg')}}" alt="">
                                        </td>
                                        <td>
                                            <div class="fw-semibold fs-base">Jesse Fisher</div>
                                            <div class="text-muted">john@example.com</div>
                                        </td>
                                        <td class="d-none d-sm-table-cell fs-base text-center">
                                            <span class="badge bg-dark">2</span>
                                        </td>
                                        <td class="text-center">
                                            <a href="javascript:void(0)" data-bs-toggle="tooltip" data-bs-placement="left" title="View Colleague">
                                                <i class="fa fa-fw fa-user-circle"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-center">
                                            <img class="img-avatar img-avatar32 img-avatar-thumb" src="{{ asset('media/avatars/avatar3.jpg')}}" alt="">
                                        </td>
                                        <td>
                                            <div class="fw-semibold fs-base">Betty Kelley</div>
                                            <div class="text-muted">lori@example.com</div>
                                        </td>
                                        <td class="d-none d-sm-table-cell fs-base text-center">
                                            <span class="badge bg-success">12</span>
                                        </td>
                                        <td class="text-center">
                                            <a href="javascript:void(0)" data-bs-toggle="tooltip" data-bs-placement="left" title="View Colleague">
                                                <i class="fa fa-fw fa-user-circle"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-center">
                                            <img class="img-avatar img-avatar32 img-avatar-thumb" src="{{ asset('media/avatars/avatar12.jpg')}}" alt="">
                                        </td>
                                        <td>
                                            <div class="fw-semibold fs-base">David Fuller</div>
                                            <div class="text-muted">jack@example.com</div>
                                        </td>
                                        <td class="d-none d-sm-table-cell fs-base text-center">
                                            <span class="badge bg-warning">6</span>
                                        </td>
                                        <td class="text-center">
                                            <a href="javascript:void(0)" data-bs-toggle="tooltip" data-bs-placement="left" title="View Colleague">
                                                <i class="fa fa-fw fa-user-circle"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!-- END People -->
                    </div>
                    <div class="col-xl-6">
                        <!-- Tickets -->
                        <div class="block block-rounded block-bordered block-mode-loading-refresh h-100 mb-0">
                            <div class="block-header border-bottom">
                                <h3 class="block-title">Tickets</h3>
                                <div class="block-options">
                                    <button type="button" class="btn-block-option" data-toggle="block-option" data-action="state_toggle" data-action-mode="demo">
                                        <i class="fa fa-sync"></i>
                                    </button>
                                    <button type="button" class="btn-block-option">
                                        <i class="fa fa-wrench"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="block-content">
                                <table class="table table-striped table-hover table-borderless table-vcenter fs-sm">
                                    <thead>
                                    <tr class="text-uppercase">
                                        <th class="fw-bold">Product</th>
                                        <th class="d-none d-sm-table-cell fw-bold">Date</th>
                                        <th class="fw-bold">State</th>
                                        <th class="fw-bold text-center" style="width: 60px;"></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td>
                                            <span class="fw-semibold">Project: X</span>
                                        </td>
                                        <td class="d-none d-sm-table-cell">
                                            <span class="fs-sm text-muted">today</span>
                                        </td>
                                        <td>
                                            <span class="fw-semibold text-warning">Awaiting..</span>
                                        </td>
                                        <td class="text-center">
                                            <a href="javascript:void(0)" data-bs-toggle="tooltip" data-bs-placement="left" title="Manage">
                                                <i class="fa fa-fw fa-life-ring"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <span class="fw-semibold">Project: X</span>
                                        </td>
                                        <td class="d-none d-sm-table-cell">
                                            <span class="fs-sm text-muted">today</span>
                                        </td>
                                        <td>
                                            <span class="fw-semibold text-warning">Awaiting..</span>
                                        </td>
                                        <td class="text-center">
                                            <a href="javascript:void(0)" data-bs-toggle="tooltip" data-bs-placement="left" title="Manage">
                                                <i class="fa fa-fw fa-life-ring"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <span class="fw-semibold">Project X</span>
                                        </td>
                                        <td class="d-none d-sm-table-cell">
                                            <span class="fs-sm text-muted">today</span>
                                        </td>
                                        <td>
                                            <span class="fw-semibold text-warning">Awaiting..</span>
                                        </td>
                                        <td class="text-center">
                                            <a href="javascript:void(0)" data-bs-toggle="tooltip" data-bs-placement="left" title="Manage">
                                                <i class="fa fa-fw fa-life-ring"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <span class="fw-semibold">Project: X</span>
                                        </td>
                                        <td class="d-none d-sm-table-cell">
                                            <span class="fs-sm text-muted">yesterday</span>
                                        </td>
                                        <td>
                                            <span class="fw-semibold text-success">Solved</span>
                                        </td>
                                        <td class="text-center">
                                            <a href="javascript:void(0)" data-bs-toggle="tooltip" data-bs-placement="left" title="Manage">
                                                <i class="fa fa-fw fa-life-ring"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <span class="fw-semibold">Project: Inspire</span>
                                        </td>
                                        <td class="d-none d-sm-table-cell">
                                            <span class="fs-sm text-muted">yesterday</span>
                                        </td>
                                        <td>
                                            <span class="fw-semibold text-success">Solved</span>
                                        </td>
                                        <td class="text-center">
                                            <a href="javascript:void(0)" data-bs-toggle="tooltip" data-bs-placement="left" title="Manage">
                                                <i class="fa fa-fw fa-life-ring"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <span class="fw-semibold">Project: Inspire</span>
                                        </td>
                                        <td class="d-none d-sm-table-cell">
                                            <span class="fs-sm text-muted">yesterday</span>
                                        </td>
                                        <td>
                                            <span class="fw-semibold text-success">Solved</span>
                                        </td>
                                        <td class="text-center">
                                            <a href="javascript:void(0)" data-bs-toggle="tooltip" data-bs-placement="left" title="Manage">
                                                <i class="fa fa-fw fa-life-ring"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <span class="fw-semibold">Project: Point</span>
                                        </td>
                                        <td class="d-none d-sm-table-cell">
                                            <span class="fs-sm text-muted">yesterday</span>
                                        </td>
                                        <td>
                                            <span class="fw-semibold text-success">Solved</span>
                                        </td>
                                        <td class="text-center">
                                            <a href="javascript:void(0)" data-bs-toggle="tooltip" data-bs-placement="left" title="Manage">
                                                <i class="fa fa-fw fa-life-ring"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <span class="fw-semibold">Project: Point</span>
                                        </td>
                                        <td class="d-none d-sm-table-cell">
                                            <span class="fs-sm text-muted">yesterday</span>
                                        </td>
                                        <td>
                                            <span class="fw-semibold text-danger">Deleted</span>
                                        </td>
                                        <td class="text-center">
                                            <a href="javascript:void(0)" data-bs-toggle="tooltip" data-bs-placement="left" title="Manage">
                                                <i class="fa fa-fw fa-life-ring"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!-- END Tickets -->
                    </div>
                </div>
                <!-- END People and Tickets -->
            </div>
        </div>
        <!-- END Page Content -->
    </main>
    <!-- END Main Container -->

    <!-- Footer -->
    <footer id="page-footer" class="bg-body-light">
        <div class="content py-0">
            <div class="row fs-sm">
                <div class="col-sm-6 order-sm-2 mb-1 mb-sm-0 text-center text-sm-end">
                    Created with <i class="fa fa-heart text-danger"></i> by <a class="fw-semibold" href="http://midadtek.com" target="_blank">MIDADTEK</a>
                </div>
                <div class="col-sm-6 order-sm-1 text-center text-sm-start">
                    <a class="fw-semibold" href="https://rmcs-app.com" target="_blank">RMCS v4.0</a> &copy; <span data-toggle="year-copy"></span>
                </div>
            </div>
        </div>
    </footer>
    <!-- END Footer -->
</div>
<!-- END Page Container -->

<!-- Dashmix Core JS -->
<script src="{{ mix('js/dashmix.app.js') }}"></script>
<!-- Laravel Original JS -->
<!-- <script src="{{ mix('/js/laravel.app.js') }}"></script> -->
<script>
    document.onreadystatechange = function() {
        if (document.readyState !== "complete") {
            Dashmix.layout('header_loader_on');
        } else {
            Dashmix.layout('header_loader_off');
        }
    };
</script>
@yield('js_after')
</body>

</html>
