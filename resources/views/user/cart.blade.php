@extends('user.partials.layout')

@section('content')
    @if ($cart && count($cart) > 0)
        <div class="container-fluid">
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">Giỏ Hàng</h1>
            </div>

            <!-- Giỏ hàng -->
            <div class="row">
                <div class="col-lg-12">
                    <!-- Table Giỏ hàng -->
                    <form action="{{ route('cart.update') }}" method="POST">
                        @method('PUT')
                        @csrf
                        <div class="card shadow mb-4">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered text-center" id="cart-table" width="100%"
                                        cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>Ảnh</th>
                                                <th>Tên</th>
                                                <th>Giá</th>
                                                <th>Số Lượng</th>
                                                <th>Tổng Giá</th>
                                                <th>Hành Động</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($cart as $key => $item)
                                                <tr class="row-cart" data-id={{ $key }}>
                                                    <td>
                                                        <img src="{{ asset('storage/' . $item['image']) }}"
                                                            alt="{{ $item['name'] }}" style="width: 50px;">
                                                    </td>
                                                    <td>{{ $item['name'] }}</td>
                                                    <td data-price="{{ $item['price'] }}">
                                                        {{ number_format($item['price'], 0, ',', '.') }} VND</td>
                                                    <td>
                                                        <input type="hidden" name="quantities[{{ $key }}][price]" value="{{ $item['price'] }}">
                                                        <input type="number" name="quantities[{{ $key }}][quantity]"
                                                            class="form-control" value="{{ $item['quantity'] }}"
                                                            min="1">
                                                    </td>
                                                    <td>
                                                        <span
                                                            class="total-price-item">{{ number_format($item['price'] * $item['quantity'], 0, ',', '.') }}</span>
                                                        VND
                                                    </td>
                                                    <td>
                                                        <!-- Nút xóa sản phẩm -->
                                                            <button type="button" class="btn btn-danger btn-delete-cart" data-id="{{ $key }}"
                                                                onclick="return confirm('Bạn có chắc chắn muốn xóa sản phẩm này khỏi giỏ hàng?');">
                                                                <i class="fas fa-trash"></i>
                                                            </button>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                        <!-- Tổng giá trị và nút hành động -->
                        <div class="card shadow mb-4">
                            <div class="card-body d-flex justify-content-between align-items-center">
                                <h5 class="card-title">Tổng: <strong><span
                                            id="total">{{ number_format($total, 0, ',', '.') }}</span> VND</strong>
                                </h5>
                                <div>
                                    {{-- <button type="submit" class="btn btn-primary">Cập nhật</button> --}}
                                    <button type="submit" class="btn btn-success ml-2">Thanh Toán</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @else
        <div class="container text-center">
            <h4>Giỏ hàng của bạn đang trống!</h4>
        </div>
    @endif
@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            // Cập nhật số lượng sản phẩm
            $('#cart-table input[type="number"]').on('change', function() {
                var quantity = $(this).val();
                var price = $(this).closest('tr').find('td').eq(2).data('price');
                var total = quantity * price;
                $(this).closest('tr').find('td').eq(4).find('.total-price-item').text(total.toLocaleString('vi-VN'));
                updateTotal();
            });

            // Cập nhật tổng giá trị
            function updateTotal() {
                var total = 0;
                $('#cart-table tbody tr').each(function() {
                    total += parseInt($(this).find('.total-price-item').text().replace(/\./g, ''));
                });
                $('#total').text(total.toLocaleString('vi-VN'));
            }

            $('.btn-delete-cart').on('click', function() {
                const urlRemove = "{{ route('cart.remove') }}";
                var id = $(this).data('id');
                console.log(`product id ${id}`)
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    url: urlRemove,
                    method: 'DELETE',
                    data: {id: id},
                    success: function(response) {
                        // Handle success response
                        $(`.row-cart[data-id=${id}]`).remove();
                        updateTotal();
                    },
                    error: function(response) {
                        // Handle error response
                        alert('Đã xảy ra lỗi khi cập nhật giỏ hàng.');
                    }
                });
            });
        });
        
    </script>
@endpush
