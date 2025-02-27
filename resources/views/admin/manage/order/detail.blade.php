@extends('admin.partials.layout')

@section('content')
    <div class="container-fluid">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Chi Tiết Đơn Hàng</h1>

            <div>
                <form action="{{ route('admin.order.approve', $order->id) }}" method="POST" style="display:inline;">
                    @csrf
                    <button type="submit" class="btn btn-primary">Duyệt</button>
                </form>
                <form action="{{ route('admin.order.reject', $order->id) }}" method="POST" style="display:inline;">
                    @csrf
                    <button type="submit" class="btn btn-danger">Từ Chối</button>
                </form>
                <form action="{{ route('admin.order.delivering', $order->id) }}" method="POST" style="display:inline;">
                    @csrf
                    <button type="submit" class="btn btn-warning">Đang Giao Hàng</button>
                </form>
                <form action="{{ route('admin.order.delivered', $order->id) }}" method="POST" style="display:inline;">
                    @csrf
                    <button type="submit" class="btn btn-info">Đã Giao Hàng</button>
                </form>
                <form action="{{ route('admin.order.paid', $order->id) }}" method="POST" style="display:inline;">
                    @csrf
                    <button type="submit" class="btn btn-success">Đơn Đã Thanh Toán</button>
                </form>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="card shadow mb-4">
                    <div class="card-body">
                        <h5>Thông Tin Người Dùng</h5>
                        <p>Tên: {{ $order->user->name }}</p>
                        <p>Email: {{ $order->user->email }}</p>
                        <p>Địa Chỉ: {{ $order->user->address }}</p>
                        <hr>
                        <h5>Thông Tin Đơn Hàng</h5>
                        <p>ID Đơn Hàng: {{ $order->id }}</p>
                        <p>Tổng Giá: {{ number_format($order->total_price, 0, ',', '.') }} VND</p>
                        <p>Trạng Thái:
                            @if ($order->status == '0')
                                Đang chờ duyệt <i class="fas fa-spinner fa-spin"></i>
                            @elseif ($order->status == '1')
                                Đã duyệt đơn <i class="fas fa-check-circle text-primary"></i>
                            @elseif ($order->status == '2')
                                Đã từ chối <i class="fas fa-times-circle text-danger"></i>
                            @elseif ($order->status == '3')
                                Đang giao hàng <i class="fas fa-truck text-warning"></i>
                            @elseif ($order->status == '4')
                                Đã giao hàng <i class="fas fa-box-open text-info"></i>
                            @elseif ($order->status == '5')
                                Đã thanh toán <i class="fas fa-dollar-sign text-success"></i>
                            @else
                                {{ $order->status }}
                            @endif
                        </p>
                        <hr>
                        <h5>Chi Tiết Sản Phẩm</h5>
                        <table class="table table-bordered text-center">
                            <thead>
                                <tr>
                                    <th>Tên Sản Phẩm</th>
                                    <th>Số Lượng</th>
                                    <th>Giá Mỗi Sản Phẩm</th>
                                </tr>
                            </thead>
                            <tbody>
                                {{-- {{ dd($order->orderItems) }} --}}
                                @foreach ($order->orderItems as $item)
                                    <tr>
                                        <td>{{ $item->product_name }}</td>
                                        <td>{{ $item->quantity }}</td>
                                        <td>{{ number_format($item->price, 0, ',', '.') }} VND</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
