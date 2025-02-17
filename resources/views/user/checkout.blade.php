@extends('user.partials.layout')

@section('content')
    <div class="container">
        <h2>Thanh Toán</h2>
        <form action="{{ route('checkout.process') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="name">Tên:</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ Auth::user()->name }}"
                    required>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" id="email" name="email" value="{{ Auth::user()->email }}"
                    required>
            </div>
            <div class="form-group">
                <label for="address">Địa Chỉ:</label>
                <input type="text" class="form-control" id="address" name="address" value="{{ Auth::user()->address }}"
                    required>
            </div>
            <div class="form-group">
                <label for="phone">Số Điện Thoại:</label>
                <input type="text" class="form-control" id="phone" name="phone" value="{{ Auth::user()->phone }}"
                    required>
            </div>
            <div class="form-group">
                <label for="total_price">Tổng Giá:</label>
                <input type="text" class="form-control" id="total_price" name="total_price"
                    value="{{ number_format($total, 0, ',', '.') }} VND" readonly>
            </div>
            <button type="submit" class="btn btn-primary">Đặt Hàng</button>
        </form>
    </div>
@endsection
