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
                        <h1 class="h3 mb-0 text-gray-800">Chỉnh Sửa Loại Tài Khoản Khách Hàng</h1>
                    </div>

                    <!-- Edit User Form -->
                    <div class="card shadow mb-4">
                        <div class="card-body">
                            <form action="{{ route('admin.customer.edit.post', $customer->id) }}" method="POST">
                                @csrf
                                @method('POST')
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th style="width: 2%;">ID</th>
                                            <th>Tên</th>
                                            <th>Loại tài khoản hiện tại</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>{{ $customer->id }}</td>
                                            <td>{{ $customer->name }}</td>
                                            <td>
                                                <div class="form-group">
                                                    <select name="type" id="type" class="form-control">
                                                        <option value="1"
                                                            {{ $customer->type == 1 ? 'selected' : '' }}>Khách Hàng
                                                        </option>
                                                        <option value="2"
                                                            {{ $customer->type == 2 ? 'selected' : '' }}>Nhân Viên
                                                        </option>
                                                    </select>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="3" class="text-right">
                                                <button type="submit" class="btn btn-info btn-md">Cập Nhật</button>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </form>
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
