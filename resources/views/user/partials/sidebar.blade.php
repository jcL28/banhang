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


    <div class="sidebar-heading text-center">
        <span class="heading-text">Danh Mục</span>
    </div>

    <!-- Nav Item - Danh Mục -->
    <li class="nav-item">
        <a class="nav-link" href="{{ route('products', ['category' => 'Áo']) }}">
            <i class="fas fa-fw fa-tshirt"></i>
            <span>Áo</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('products', ['category' => 'Quần']) }}">
            <i class="fas fa-fw fa-tshirt"></i>
            <span>Quần</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('products', ['category' => 'Mũ']) }}">
            <i class="fas fa-fw fa-tshirt"></i>
            <span>Mũ</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('products', ['category' => 'Giày']) }}">
            <i class="fas fa-fw fa-tshirt"></i>
            <span>Giày</span>
        </a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading - Giá -->
    <div class="sidebar-heading text-center">
        <span class="heading-text">Giá</span>
    </div>

    <!-- Nav Item - Giá -->
    <li class="nav-item">
        <a class="nav-link" href="{{ route('products', ['price' => '1000000']) }}">
            <i class="fas fa-fw fa-dollar-sign"></i>
            <span>Từ 1.000.000 VND</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('products', ['price' => '800000-999999']) }}">
            <i class="fas fa-fw fa-dollar-sign"></i>
            <span>800.000 - 999.999 VND</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('products', ['price' => '500000-799999']) }}">
            <i class="fas fa-fw fa-dollar-sign"></i>
            <span>500.000 - 799.999 VND</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('products', ['price' => '200000-499999']) }}">
            <i class="fas fa-fw fa-dollar-sign"></i>
            <span>200.000 - 499.999 VND</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('products', ['price' => '0-199999']) }}">
            <i class="fas fa-fw fa-dollar-sign"></i>
            <span>Dưới 200.000 VND</span>
        </a>
    </li>

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
        font-size: 1.1rem;
        color: #ffffff;
        transition: all 0.4s ease;
    }

    .nav-item .nav-link:hover {
        background-color: rgba(0, 238, 255, 0.34);
    }

    .sidebar-heading {
        font-size: 1.8rem;
        font-weight: bold;
        color: #ffffff;
        margin-top: 1rem;
        margin-bottom: 1rem;
    }

    .heading-text {
        display: block;
        width: 100%;
    }
</style>
