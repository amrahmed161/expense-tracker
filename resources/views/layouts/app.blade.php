<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" dir="{{ app()->getLocale() == 'ar' ? 'rtl' : 'ltr' }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Expense Tracker | @yield('title', 'Dashboard')</title>

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@400;500;700&display=swap" rel="stylesheet">

    <!-- AdminLTE CSS -->
    <link rel="stylesheet" href="{{ asset('adminlte/plugins/fontawesome-free/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('adminlte/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
    <link rel="stylesheet" href="{{ asset('adminlte/dist/css/adminlte.min.css') }}">

    <style>
        body {
            font-family: 'Tajawal', sans-serif;
        }

        /* Sidebar */
        .main-sidebar {
            background: linear-gradient(180deg, #1a1a2e, #16213e) !important;
        }

        .brand-link {
            background: rgba(255,255,255,0.05) !important;
            border-bottom: 1px solid rgba(255,255,255,0.1) !important;
        }

        .brand-link .brand-text {
            color: white !important;
            font-weight: 700;
            font-size: 18px;
        }

        /* Nav Links */
        .nav-sidebar .nav-item .nav-link {
            color: rgba(255,255,255,0.7) !important;
            border-radius: 8px;
            margin: 2px 8px;
            transition: all 0.3s;
        }

        .nav-sidebar .nav-item .nav-link:hover,
        .nav-sidebar .nav-item .nav-link.active {
            background: linear-gradient(135deg, #667eea, #764ba2) !important;
            color: white !important;
        }

        .nav-sidebar .nav-item .nav-link .nav-icon {
            color: rgba(255,255,255,0.7) !important;
        }

        .nav-sidebar .nav-item .nav-link.active .nav-icon,
        .nav-sidebar .nav-item .nav-link:hover .nav-icon {
            color: white !important;
        }

        /* User Panel */
        .user-panel {
            border-bottom: 1px solid rgba(255,255,255,0.1) !important;
            padding: 15px;
        }

        .user-panel .info a {
            color: white !important;
            font-weight: 600;
        }

        /* Navbar */
        .main-header.navbar {
            background: white;
            border-bottom: 2px solid #f0f0f0;
        }

        /* Content */
        .content-wrapper {
            background: #f4f6f9;
        }

        /* Cards */
        .card {
            border: none;
            border-radius: 12px;
            box-shadow: 0 2px 15px rgba(0,0,0,0.08);
        }

        .card-header {
            border-radius: 12px 12px 0 0 !important;
            border-bottom: 1px solid rgba(0,0,0,0.05);
        }

        /* Buttons */
        .btn {
            border-radius: 8px;
            font-weight: 500;
        }

        /* Alerts */
        .alert {
            border-radius: 10px;
            border: none;
        }

        /* Page Header */
        .content-header h1 {
            font-weight: 700;
            font-size: 22px;
        }
    </style>

    @stack('styles')
</head>

<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

    {{-- Navbar --}}
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#" role="button">
                    <i class="fas fa-bars"></i>
                </a>
            </li>
        </ul>

        <ul class="navbar-nav mr-auto">
            <li class="nav-item d-none d-sm-inline-block">
                <a href="{{ route('dashboard') }}" class="nav-link font-weight-bold">
                    <i class="fas fa-home ml-1"></i> الرئيسية
                </a>
            </li>
        </ul>

        {{-- Right Navbar --}}
        <ul class="navbar-nav mr-auto ml-auto">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown">
                    <i class="fas fa-user-circle fa-lg ml-1"></i>
                    {{ Auth::user()->name }}
                </a>
                <div class="dropdown-menu dropdown-menu-right">
                    <a class="dropdown-item" href="#">
                        <i class="fas fa-user ml-2"></i> الملف الشخصي
                    </a>
                    <div class="dropdown-divider"></div>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="dropdown-item text-danger">
                            <i class="fas fa-sign-out-alt ml-2"></i> تسجيل الخروج
                        </button>
                    </form>
                </div>
            </li>
            {{-- Language Switcher --}}
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown">
                <i class="fas fa-globe fa-lg"></i>
                {{ app()->getLocale() == 'ar' ? 'العربية' : 'English' }}
            </a>
            <div class="dropdown-menu dropdown-menu-right">
                <a class="dropdown-item" href="{{ route('lang.switch', 'ar') }}">
                    🇪🇬 العربية
                </a>
                <a class="dropdown-item" href="{{ route('lang.switch', 'en') }}">
                    🇬🇧 English
                </a>
            </div>
        </li>
        </ul>
    </nav>

    {{-- Sidebar --}}
    <aside class="main-sidebar sidebar-dark-primary elevation-4">

        {{-- Brand --}}
        <a href="{{ route('dashboard') }}" class="brand-link">
            <i class="fas fa-wallet brand-image ml-2" style="color: #667eea; font-size: 24px;"></i>
            <span class="brand-text">Expense Tracker</span>
        </a>

        {{-- Sidebar Menu --}}
        <div class="sidebar">
            {{-- User Panel --}}
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="image">
                    <div style="width:35px; height:35px; background: linear-gradient(135deg, #667eea, #764ba2);
                                border-radius: 50%; display:flex; align-items:center;
                                justify-content:center; color:white; font-weight:700;">
                        {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                    </div>
                </div>
                <div class="info">
                    <a href="#">{{ Auth::user()->name }}</a>
                    <br>
                    <small style="color: rgba(255,255,255,0.4); font-size: 11px;">
                        {{ Auth::user()->email }}
                    </small>
                </div>
            </div>

            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column nav-legacy"
                    data-widget="treeview" role="menu">

                    {{-- Dashboard --}}
                    <li class="nav-item">
                        <a href="{{ route('dashboard') }}"
                           class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p>لوحة التحكم</p>
                        </a>
                    </li>

                    {{-- Expenses --}}
                    <li class="nav-item">
                        <a href="{{ route('expenses.index') }}"
                           class="nav-link {{ request()->routeIs('expenses.*') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-money-bill-wave"></i>
                            <p>المصروفات</p>
                        </a>
                    </li>

                    {{-- Categories --}}
                    <li class="nav-item">
                        <a href="{{ route('categories.index') }}"
                           class="nav-link {{ request()->routeIs('categories.*') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-tags"></i>
                            <p>الفئات</p>
                        </a>
                    </li>

                </ul>
            </nav>
        </div>
    </aside>

    {{-- Content Wrapper --}}
    <div class="content-wrapper">

        {{-- Page Header --}}
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>@yield('title', 'Dashboard')</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-left">
                            <li class="breadcrumb-item">
                                <a href="{{ route('dashboard') }}">الرئيسية</a>
                            </li>
                            @yield('breadcrumb')
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        {{-- Main Content --}}
        <div class="content">
            <div class="container-fluid">

                {{-- Success Alert --}}
                @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show">
                        <i class="fas fa-check-circle ml-2"></i>
                        {{ session('success') }}
                        <button type="button" class="close" data-dismiss="alert">
                            <span>&times;</span>
                        </button>
                    </div>
                @endif

                {{-- Error Alert --}}
                @if(session('error'))
                    <div class="alert alert-danger alert-dismissible fade show">
                        <i class="fas fa-exclamation-circle ml-2"></i>
                        {{ session('error') }}
                        <button type="button" class="close" data-dismiss="alert">
                            <span>&times;</span>
                        </button>
                    </div>
                @endif

                {{-- Page Content --}}
                @yield('content')

            </div>
        </div>
    </div>

    {{-- Footer --}}
    <footer class="main-footer">
        <strong>Expense Tracker</strong> &copy; {{ date('Y') }}
        <div class="float-right d-none d-sm-inline-block">
            Made with <i class="fas fa-heart text-danger"></i> Laravel & AdminLTE
        </div>
    </footer>

    <aside class="control-sidebar control-sidebar-dark"></aside>
</div>

<!-- AdminLTE JS -->
<script src="{{ asset('adminlte/plugins/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('adminlte/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
<script src="{{ asset('adminlte/dist/js/adminlte.min.js') }}"></script>

@stack('scripts')

</body>
</html>
