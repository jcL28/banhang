@include('admin.partials.header')

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        @include('admin.partials.sidebar')
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                @include('admin.partials.topbar')
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Danh Sách Khách Hàng</h1>

                        {{-- Thông báo nếu cần --}}

                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif


                    </div>

                    <!-- Customer Table -->
                    <div class="card shadow mb-4">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th style="width: 2%;">ID</th>
                                            <th>Tên</th>
                                            <th>Email</th>
                                            <th>Điện thoại</th>
                                            <th>Quốc gia</th>
                                            <th>Địa chỉ</th>
                                            <th>Loại tài khoản</th>
                                            <th style="width: 10%;">Trạng thái</th>
                                            <th>Chức năng</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($customers as $user)
                                            <tr>
                                                <td>{{ $user->id }}</td>
                                                <td>{{ $user->name }}</td>
                                                <td>{{ $user->email }}</td>
                                                <td>{{ $user->phone }}</td>
                                                <td>{{ $user->country }}</td>
                                                <td>{{ $user->address }}</td>
                                                <td>
                                                    @switch($user->type)
                                                        @case(0)
                                                            Admin
                                                        @break

                                                        @case(2)
                                                            Nhân Viên
                                                        @break

                                                        @default
                                                            Khách Hàng
                                                    @endswitch
                                                </td>
                                                <td>
                                                    @if ($user->status == 1)
                                                        <span class="badge badge-success">Đã Xác Thực</span>
                                                    @else
                                                        <span class="badge badge-secondary">Chưa Xác Thực</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    <a href="{{ route('admin.customer.edit', $user->id) }}"
                                                        class="btn btn-primary btn-sm">Chỉnh sửa</a>
                                                    <form action="{{ route('admin.customer.delete', $user->id) }}"
                                                        method="POST" style="display:inline;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger btn-sm"
                                                            onclick="return confirm('Bạn có chắc chắn muốn xóa tài khoản này không?')">Xóa</button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            @include('admin.partials.footer')
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    @include('admin.partials.logout_modal')

    <!-- Bootstrap core JavaScript-->
    <script src="{{ asset('sb2/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('sb2/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{ asset('sb2/vendor/jquery-easing/jquery.easing.min.js') }}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{ asset('sb2/js/sb-admin-2.min.js') }}"></script>
</body>

</html>
