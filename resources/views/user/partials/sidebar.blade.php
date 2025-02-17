<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('home') }}">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Webbanhang User</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Nav Item - Danh Mục -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
            aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-tshirt"></i>
            <span>Danh Mục</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Các loại sản phẩm:</h6>
                <a class="collapse-item" href="{{ route('products', ['category' => 'Áo']) }}">Áo</a>
                <a class="collapse-item" href="{{ route('products', ['category' => 'Quần']) }}">Quần</a>
                <a class="collapse-item" href="{{ route('products', ['category' => 'Mũ']) }}">Mũ</a>
                <a class="collapse-item" href="{{ route('products', ['category' => 'Giày']) }}">Giày</a>
            </div>
        </div>
    </li>

    <!-- Nav Item - Giá -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
            aria-expanded="true" aria-controls="collapseUtilities">
            <i class="fas fa-fw fa-dollar-sign"></i>
            <span>Giá</span>
        </a>
        <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Chỉ từ:</h6>
                <a class="collapse-item" href="{{ route('products', ['price' => '1000000']) }}">Từ 1.000.000 VND</a>
                <a class="collapse-item" href="{{ route('products', ['price' => '800000-999999']) }}">800.000 -
                    999.999 VND</a>
                <a class="collapse-item" href="{{ route('products', ['price' => '500000-799999']) }}">500.000 - 799.999
                    VND</a>
                <a class="collapse-item" href="{{ route('products', ['price' => '200000-499999']) }}">200.000 - 499.999
                    VND</a>
                <a class="collapse-item" href="{{ route('products', ['price' => '0-199999']) }}">
                    Dưới 200.000 VND</a>
            </div>
        </div>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Addons
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
            aria-expanded="true" aria-controls="collapsePages">
            <i class="fas fa-fw fa-folder"></i>
            <span>Pages</span>
        </a>
        <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Login Screens:</h6>
                <a class="collapse-item" href="login.html">Login</a>
                <a class="collapse-item" href="register.html">Register</a>
                <a class="collapse-item" href="forgot-password.html">Forgot Password</a>
                <div class="collapse-divider"></div>
                <h6 class="collapse-header">Other Pages:</h6>
                <a class="collapse-item" href="404.html">404 Page</a>
                <a class="collapse-item" href="blank.html">Blank Page</a>
            </div>
        </div>
    </li>

    <!-- Nav Item - Charts -->
    <li class="nav-item">
        <a class="nav-link" href="charts.html">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>Charts</span>
        </a>
    </li>

    <!-- Nav Item - Tables -->
    <li class="nav-item">
        <a class="nav-link" href="tables.html">
            <i class="fas fa-fw fa-table"></i>
            <span>Tables</span>
        </a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>
</ul>

<style>
    .bg-gradient-primary {
        background: linear-gradient(to bottom left, #00c8ff, #6f42c1);
    }

    .nav-item .nav-link {
        font-weight: bold;
        /* Đậm chữ */
        font-size: 1.1rem;
        /* Tăng kích thước chữ */
        color: #ffffff;
        /* Màu chữ trắng */
        transition: all 0.4s ease;
        /* Thêm hiệu ứng chuyển động */
    }

    .nav-item .nav-link:hover {
        background-color: rgba(0, 238, 255, 0.34);
        /* Màu nền mờ khi di chuột qua */
    }
</style>
