<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    @vite(['resources/css/style.css'])

</head>

<body>
    <div class="d-flex">
        <!-- Sidebar -->
        <div class="side-bar p-3" id="side-bar">
            <h6 class="text-center my-4">🌙 Moon Café Admin</h6>
            <a href="{{ url('/admin/dashboard') }}" class="d-flex align-items-center px-2 py-3 text-decoration-none">
                <i class="fa-solid fa-house-chimney me-3"></i> Dashboard
            </a>

            <!-- Menu Management -->
            <a href="{{ url('/admin/category') }}" class="d-flex align-items-center px-2 py-3 text-decoration-none">
                <i class="fa-solid fa-user me-3"></i> Users
            </a>
            <a href="{{ url('/admin/category') }}" class="d-flex align-items-center px-2 py-3 text-decoration-none">
                <i class="fa-solid fa-list me-3"></i> Menu Categories
            </a>
            <a href="{{ url('/admin/menu') }}" class="d-flex align-items-center px-2 py-3 text-decoration-none">
                <i class="fa-solid fa-th-list me-3"></i> Coffee & Cakes
            </a>
            <a href="{{ url('/admin/addonCategory') }}" class="d-flex align-items-center px-2 py-3 text-decoration-none">
                <i class="fa-solid fa-table-cells me-3"></i> Addon Category
            </a>
            <a href="{{ url('/admin/addon') }}" class="d-flex align-items-center px-2 py-3 text-decoration-none">
                <i class="fa-solid fa-calendar-plus me-3"></i> Addon
            </a>
            <a href="{{ url('/admin/menu_addon_category') }}" class="d-flex align-items-center px-2 py-3 text-decoration-none">
                <i class="fa-solid fa-calendar-plus me-3"></i> Menu Addon Category
            </a>
            <a href="{{ url('/admin/table') }}" class="d-flex align-items-center px-2 py-3 text-decoration-none">
                <i class="fa-solid fa-table me-3"></i> Table
            </a>
            <a href="{{ url('/admin/product') }}" class="d-flex align-items-center px-2 py-3 text-decoration-none">
                <i class="fa-solid fa-mug-hot me-3"></i> Payments
            </a>

            <!-- Orders & Feedback -->
            <a href="{{ url('/admin/orders') }}" class="d-flex align-items-center px-2 py-3 text-decoration-none">
                <i class="fa-solid fa-cart-shopping me-3"></i> Orders
            </a>
            <a href="{{ url('/admin/messages') }}" class="d-flex align-items-center px-2 py-3 text-decoration-none">
                <i class="fa-solid fa-comment-dots me-3"></i> Reviews
            </a>
        </div>

        <!-- Header -->
        <div class="main-div m-3">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <i class="fa-solid fa-bars fs-4" onclick="myClick()"></i>
                <div class="dropdown">
                    <i class="fa-solid fa-user fs-4 dropdown-toggle" data-bs-toggle="dropdown"></i>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">Settings</a></li>
                        <li><button class="dropdown-item btn-coffee">Logout</button></li>
                    </ul>
                </div>
            </div>

            <div>
                @yield('content')
            </div>
        </div>

    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous">
</script>

</html>
