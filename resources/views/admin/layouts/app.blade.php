<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <title>E Commerce Website || @yield('title') </title>
</head>
<body class="admin">

    <div class="">
        <aside class="sidebar" id="sidebar">
            <div class="logo">
                <img src="{{ asset('assets/T&T logo.png') }}" alt="">
                <i class="fas fa-arrow-right mobile" id="admin-menu-close"></i>
            </div>
            <ul class="sidebar-nav">
                <li class="sidebar-item active"><a href="#" class="sidebar-link"><i class="fas fa-tachometer-alt"></i> Dashboard</a></li>
                <li class="sidebar-item"><a href="#" class="sidebar-link"><i class="fas fa-users"></i> Users</a></li>
                <li class="sidebar-item"><a href="#" class="sidebar-link"><i class="fas fa-box"></i> Products</a></li>
                <li class="sidebar-item"><a href="#" class="sidebar-link"><i class="fas fa-chart-line"></i> Reports</a></li>
                <li class="sidebar-item"><a href="#" class="sidebar-link"><i class="fas fa-cogs"></i> Settings</a></li>
            </ul>
        </aside>
    </div>

    <main class="main-content">

        <header>
            <div class="flex">
                <div class="navbar-title">
                    <h2>{{ $pageTitle ?? 'Dashboard' }}</h2>
                    <div class="flex-1">
                        <p>T & T</p> > <p>{{ $pageTitle ?? 'Dashboard' }}</p>
                    </div>
                </div>
                <div>
                    <p class="desktop">Admin <span><i class="fas fa-chevron-down"></i></span> </p>
                    <p class="mobile"><span><i class="fas fa-bars" id="admin-menu-open"></i></span> </p>
                </div>
            </div>
        </header>

        <div class="inner-content">
            @yield('content')
        </div>

        <footer>
            <p>&copy; {{ date('Y') }} T & T African Heritage LLC. All rights reserved.</p>
        </footer>
    </main>
    <script src="{{ asset('js/script.js') }}"></script>
</body>
</html>
