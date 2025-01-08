<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('admin.home') }}">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Webbanhang Admin</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Nav Item - Pages Collapse Menu -->
    <!-- Quản Lý Hàng Hóa -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
            aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-cog"></i>
            <span class="highlight-text">Quản Lý Hàng Hóa</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Custom Components:</h6>
                <a class="collapse-item" href="{{ route('admin.product.list') }}">Sản Phẩm</a>
                <a class="collapse-item" href="{{ route('admin.category.list') }}">Danh Mục</a>
            </div>
        </div>
    </li>

    <!-- Quản Lý Nhân Sự -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
            aria-expanded="true" aria-controls="collapseUtilities">
            <i class="fas fa-fw fa-wrench"></i>
            <span class="highlight-text">Quản Lý Nhân Sự</span>
        </a>
        <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Custom Utilities:</h6>
                <a class="collapse-item" href="{{route('admin.customer.list')}}">Khách Hàng</a>
                <a class="collapse-item" href="{{route('admin.employee.list')}}">Nhân Viên</a>
                <a class="collapse-item" href="utilities-animation.html">Đơn Hàng</a>
                <a class="collapse-item" href="utilities-other.html">Other</a>
            </div>
        </div>
    </li>



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
