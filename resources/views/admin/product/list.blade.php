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
                        <h1 class="h3 mb-0 text-gray-800">Danh Sách Sản Phẩm</h1>

                        {{-- Thông báo --}}
                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif

                        <a href="{{ route('admin.product.add') }} "
                            class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                class="fas fa-download fa-sm text-white-50"></i> Thêm Sản Phẩm Mới</a>
                    </div>

                    <!-- Product Container -->
                    <div class="card shadow mb-4">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th style="width: 2%;">ID</th>
                                            <th>Tên</th>
                                            <th>Hình Ảnh</th>
                                            <th>Danh Mục</th>
                                            <th>Giá</th>
                                            <th>Màu</th>
                                            <th style="width: 8%;">Kích cỡ</th>
                                            <th style="width: 8%;">Mô tả</th>
                                            <th style="width: 15%;">Chức Năng</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($products as $product)
                                            <tr>
                                                <td>{{ $product->id }}</td>
                                                <td>{{ $product->product_name }}</td>
                                                <td>
                                                    @php
                                                        $productImages = !empty($product->images)
                                                            ? $product->images
                                                            : null;
                                                    @endphp
                                                    @if (!empty($productImages))
                                                        @php
                                                            $images = json_decode($productImages->images);
                                                        @endphp
                                                        @foreach ($images as $image)
                                                            <img src="{{ asset('storage/' . $image) }}"
                                                                alt="{{ $product->product_name }}"
                                                                style="width: 60px; height: 60px; margin-right: 5px;">
                                                        @endforeach
                                                    @endif
                                                </td>
                                                <td>
                                                    {{ $product->categories->pluck('category_name')->join(', ') }}

                                                </td>
                                                <td>{{ number_format($product->product_price, 0, ',', '.') }} VND</td>
                                                <td>{{ $product->product_color }}</td>
                                                <td>{{ $product->product_size }}</td>
                                                <td>{{ $product->product_description }}</td>
                                                <td>
                                                    <a href="{{ route('admin.product.edit', $product->id) }}"
                                                        class="btn btn-primary btn-sm">Chỉnh Sửa</a>
                                                    <form action="{{ route('admin.product.delete', $product->id) }}"
                                                        method="POST"
                                                        onsubmit="return confirm('Bạn có chắc chắn muốn xóa sản phẩm này không?');"
                                                        style="display:inline;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit"
                                                            class="btn btn-danger btn-sm">Xóa</button>
                                                    </form>

                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
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

    <!-- Page level plugins -->
    <script src="{{ asset('sb2/vendor/chart.js/Chart.min.js') }}"></script>

    <!-- Page level custom scripts -->
    <script src="{{ asset('sb2/js/demo/chart-area-demo.js') }}"></script>
    <script src="{{ asset('sb2/js/demo/chart-pie-demo.js') }}"></script>

</body>

</html>
