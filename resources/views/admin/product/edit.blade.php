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

                    <!-- Product Container -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Chỉnh sửa sản phẩm</h6>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('admin.product.edit.post', $product->id) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="product_name">Tên sản phẩm</label>
                                    <input type="text" class="form-control" id="product_name" name="product_name"
                                        value="{{ old('product_name', $product->product_name) }}" required>
                                </div>

                                <div class="form-group">                                    
                                    <label for="product_name">Hình ảnh sản phẩm</label>
                                    <input type="file" class="form-control" id="product_image"
                                        name="product_images[]" multiple accept="image/*">
                                </div>

                                <div class="form-group">
                                    <label for="categories">Danh mục</label>
                                    <div id="categories" class="form-control d-flex flex-wrap"
                                        style="width: 100%; flex-grow: 1; overflow-x: auto; height: calc(3.5 * 1.5em); padding: 10px;">
                                        @foreach ($categories as $category)
                                            <div class="form-check mr-3 mb-2" style="flex-basis: calc(20% - 1rem);">
                                                <input class="form-check-input" type="checkbox" name="categories[]"
                                                    value="{{ $category->id }}" id="category_{{ $category->id }}"
                                                    {{ in_array($category->id, old('categories', $product->categories->pluck('id')->toArray())) ? 'checked' : '' }}>
                                                <label class="form-check-label" for="category_{{ $category->id }}">
                                                    {{ $category->category_name }}
                                                </label>
                                            </div>
                                        @endforeach
                                    </div>

                                    {{-- Thông báo lỗi --}}
                                    @error('categories')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="product_price">Giá</label>
                                    <input type="number" class="form-control" id="product_price" name="product_price"
                                        value="{{ old('product_price', $product->product_price) }}" required>
                                </div>

                                <div class="form-group">
                                    <label for="product_color">Màu</label>
                                    <input type="text" class="form-control" id="product_color" name="product_color"
                                        value="{{ old('product_color', $product->product_color) }}" required>
                                </div>

                                <div class="form-group">
                                    <label for="product_size">Kích cỡ</label>
                                    <input type="text" class="form-control" id="product_size" name="product_size"
                                        value="{{ old('product_size', $product->product_size) }}" required>
                                </div>

                                <div class="form-group">
                                    <label for="product_description">Mô tả</label>
                                    <textarea class="form-control" id="product_description" name="product_description" rows="3" required>{{ old('product_description', $product->product_description) }}</textarea>
                                </div>

                                <div class="d-flex justify-content-between">
                                    <button type="submit" class="btn btn-primary">Cập nhật sản phẩm</button>
                                    <a href="{{ route('admin.product.list') }}" class="btn btn-secondary">
                                        <i class="fas fa-arrow-left"></i> Quay lại
                                    </a>
                                </div>
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

        <!-- Page level plugins -->
        <script src="{{ asset('sb2/vendor/chart.js/Chart.min.js') }}"></script>

        <!-- Page level custom scripts -->
        <script src="{{ asset('sb2/js/demo/chart-area-demo.js') }}"></script>
        <script src="{{ asset('sb2/js/demo/chart-pie-demo.js') }}"></script>

</body>

</html>
