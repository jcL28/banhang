<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
    <!-- Sidebar Toggle (Topbar) -->
    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
        <i class="fa fa-bars"></i>
    </button>

    <!-- Topbar Search -->
    <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search" method="GET"
        action="{{ route('product.search') }}">
        <div class="input-group">
            <input type="text" name="query" class="form-control bg-light border-0 small" placeholder="Search for..."
                aria-label="Search" aria-describedby="basic-addon2">
            <div class="input-group-append">
                <button class="btn btn-primary" type="submit">
                    <i class="fas fa-search fa-sm"></i>
                </button>
            </div>
        </div>
    </form>

    <!-- Topbar Navbar -->
    <ul class="navbar-nav ml-auto">

        <div class="topbar-divider d-none d-sm-block"></div>

        <!-- Nav Item - User Information -->

        <li class="nav-item dropdown no-arrow">
            @if (Auth::user() && session('isAdmin'))
                <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

                    <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{ Auth::user()->name }}</span>
                    <img class="img-profile rounded-circle" src="{{ asset('sb2/img/undraw_profile.svg') }}"
                        alt="Profile Image">
                </a>
                <!-- Dropdown - User Information -->
                <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                    <a class="dropdown-item" href="{{ route('profile') }}">
                        <i class="fas fa-user fa-sm fa-fw mr-2 text-400"></i>
                        Thông Tin Cá Nhân
                    </a>
                    <a class="dropdown-item" href="{{ route('cart') }}">
                        <i class="fas fa-shopping-cart fa-sm fa-fw mr-2 text-400"></i>
                        Giỏ Hàng
                    </a>
                    <a class="dropdown-item" href="{{ route('order-tracking.show') }}">
                        <i class="fas fa-shopping-cart fa-sm fa-fw mr-2 text-400"></i>
                        Đơn Mua
                    </a>
                    <a class="dropdown-item" href="{{ route('admin.home') }}">
                        <i class="fas fa-cogs fa-sm fa-fw mr-2 text-400"></i>
                        Quay lại trang quản lý
                    </a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="javascript:void(0)" data-toggle="modal" data-target="#logoutModal">
                        <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-400"></i>
                        Logout
                    </a>
                </div>
            @elseif (Auth::user())
                <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

                    <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{ Auth::user()->name }}</span>
                    <img class="img-profile rounded-circle" src="{{ asset('sb2/img/undraw_profile.svg') }}"
                        alt="Profile Image">
                </a>
                <!-- Dropdown - User Information -->
                <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                    <a class="dropdown-item" href="{{ route('profile') }}">
                        <i class="fas fa-user fa-sm fa-fw mr-2 text-400"></i>
                        Thông Tin Cá Nhân
                    </a>
                    <a class="dropdown-item" href="{{ route('cart') }}">
                        <i class="fas fa-shopping-cart fa-sm fa-fw mr-2 text-400"></i>
                        Giỏ Hàng
                    </a>
                    <a class="dropdown-item" href="{{ route('order-tracking.show') }}">
                        <i class="fas fa-shopping-cart fa-sm fa-fw mr-2 text-400"></i>
                        Đơn Mua
                    </a>
                    <a class="dropdown-item" href="#">
                        <i class="fas fa-list fa-sm fa-fw mr-2 text-400"></i>
                        Activity Log
                    </a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="javascript:void(0)" data-toggle="modal" data-target="#logoutModal">
                        <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-400"></i>
                        Logout
                    </a>
                </div>
            @else
                <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span class="mr-2 d-none d-lg-inline text-gray-600 small">Chưa Đăng Nhập</span>
                    <img class="img-profile rounded-circle" src="{{ asset('sb2/img/undraw_profile.svg') }}"
                        alt="Profile Image">
                </a>
                <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                    <a class="dropdown-item" href="{{ route('login') }}">
                        <i class="fas fa-user fa-sm fa-fw mr-2 text-400"></i>
                        Đăng Nhập
                    </a>
                    <a class="dropdown-item" href="{{ route('register') }}">
                        <i class="fas fa-cogs fa-sm fa-fw mr-2 text-400"></i>
                        Đăng Ký
                    </a>
                </div>
            @endif
        </li>
    </ul>
</nav>
