@extends('admin.partials.layout')

@section('content')
    <div class="container-fluid">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Danh Sách Đơn Hàng</h1>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="card shadow mb-4">
                    <div class="card-body text-center">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Người Dùng</th>
                                        <th>Trạng Thái</th>
                                        <th>Ngày Tạo</th>
                                        <th>Tổng Giá</th>
                                        <th>Chức Năng</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($orders as $order)
                                        <tr>
                                            <td>{{ $order->id }}</td>
                                            <td>{{ $order->user->name }}</td>
                                            <td>
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
                                            </td>
                                            <td>{{ $order->created_at }}</td>
                                            <td>{{ number_format($order->total_price, 0, ',', '.') }} VND</td>
                                            <td>
                                                <a href="{{ route('admin.order.detail', $order->id) }}"
                                                    class="btn btn-primary btn-sm">Xem Chi Tiết</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
