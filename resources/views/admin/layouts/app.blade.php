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

    @php
        use Illuminate\Support\Str;
    @endphp

    <div class="">
        <aside class="sidebar" id="sidebar">
            <div class="logo">
                <img src="{{ asset('assets/T&T logo.png') }}" alt="">
                <i class="fas fa-arrow-right mobile" id="admin-menu-close"></i>
            </div>
            <ul class="sidebar-nav">
                <li class="sidebar-item {{ Str::startsWith(request()->path(), 'admin/dashboard') ? 'active' : '' }}"><a href="/admin/dashboard" class="sidebar-link"><i class="fas fa-tachometer-alt"></i> Dashboard</a></li>
                <li class="sidebar-item {{ Str::startsWith(request()->path(), 'admin/user') ? 'active' : '' }}"><a href="{{ route('admin.users') }}" class="sidebar-link"><i class="fas fa-users"></i> Users</a></li>
                <li class="sidebar-item {{ Str::startsWith(request()->path(), 'admin/product') ? 'active' : '' }}"><a href=" {{ route('admin.products') }} " class="sidebar-link"><i class="fas fa-box"></i> Products</a></li>
                <li class="sidebar-item {{ Str::startsWith(request()->path(), 'admin/order') ? 'active' : '' }}"><a href=" {{ route('admin.orders') }} " class="sidebar-link"><i class="fas fa-cart-plus"></i> Orders</a></li>
                <li class="sidebar-item {{ Str::startsWith(request()->path(), '') ? '' : '' }}"><a href="#" class="sidebar-link"><i class="fas fa-chart-line"></i> Reports</a></li>
                <li class="sidebar-item {{ Str::startsWith(request()->path(), 'admin/newsletter') ? 'active' : '' }}"><a href="{{ route('admin.newsletter') }}" class="sidebar-link"><i class="fas fa-chart-line"></i> Subscribers</a></li>
                <li class="sidebar-item {{ Str::startsWith(request()->path(), 'admin/setting') ? 'active' : '' }}"><a href="{{ route('admin.settings') }}" class="sidebar-link"><i class="fas fa-cogs"></i> Settings</a></li>
            </ul>
        </aside>
    </div>

    <main class="main-content">

        <div>
            @foreach ($errors->all() as $message)
                <div id="notification" class="status stat-2 failed">
                    <p>{{ $message }}</p>
                </div>
            @endforeach

            @if (session('success'))
                <div id="notification" class="status stat-2 success">
                    <p>{{ session('success') }}</p>
                </div>
            @endif

            @if (session('error'))
                <div id="notification" class="status stat-2 failed">
                    <p>{{ session('error') }}</p>
                </div>
            @endif
        </div>

        <header>
            <div class="flex-4">
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

        <div class="inner-content" style="padding-bottom: 2em;">
            @yield('content')
        </div>

    </main>
    <script src="{{ asset('js/script.js') }}"></script>

    <script>
        document.querySelectorAll(".delete-btn").forEach(button => {
        button.addEventListener("click", function() {
            console.log("Delete button clicked!"); // Debugging
            let subscriberId = this.closest("form").dataset.id;
            console.log("Subscriber ID:", subscriberId); // Debugging

            if (confirm("Are you sure you want to delete this subscriber?")) {
                console.log("Confirmed deletion"); // Debugging
                fetch(`/admin/newsletter/${subscriberId}`, {
                    method: "DELETE",
                    headers: {
                        "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').getAttribute("content"),
                        "Content-Type": "application/json"
                    }
                })
                .then(response => response.json())
                .then(data => {
                    console.log("Server response:", data); // Debugging
                    if (data.success) {
                        alert("Subscriber deleted successfully!");
                        location.reload(); // Refresh to update the list
                    } else {
                        alert("Error deleting subscriber.");
                    }
                })
                .catch(error => console.error("Error:", error));
            }
        });
    });
    </script>
    @include('scripts.adm-menu')
    @stack('scripts')
</body>
</html>
