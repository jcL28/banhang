@extends('user.partials.layout')

@section('content')
    <div class="container-fluid">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Các Sản Phẩm Mới Nhất</h1>
        </div>
        <div class="row">
            @foreach ($products as $product)
                <div class="col-lg-3 mb-4">
                    <div class="card shadow mb-4">
                        <a href="{{ route('product.view-details', $product->id) }}">
                            @if (!empty($product->images))
                                @php
                                    $images = json_decode($product->images->images, true);
                                @endphp
                                @if (!empty($images[0]))
                                    <img src="{{ asset('storage/' . $images[0]) }}" class="card-img-top"
                                        alt="{{ $product->product_name }}"
                                        style="width: 100%; height: 200px; object-fit: cover;">
                                @endif
                            @endif
                        </a>


                        <div class="card-body text-center">
                            <h5 class="card-title"><a
                                    href="{{ route('product.view-details', $product->id) }}">{{ $product->product_name }}</a>
                            </h5>
                            <p class="card-text">{{ $product->product_description }}</p>
                            <p class="card-text">Màu: {{ $product->product_color }}</p>
                            <p class="card-text">Kích cỡ: {{ $product->product_size }}</p>
                            <p class="card-text">Giá:
                                {{ number_format($product->product_price, 0, ',', '.') }} VND</p>
                            {{-- <a href="{{ route('product.view-details', $product->id) }}" class="btn btn-primary">
                                Xem Chi Tiết</a> --}}
                            <form action="{{ route('cart.add', $product->id) }}" method="POST">
                                @csrf
                                @if (Auth::user())
                                    <button type="submit" class="btn btn-warning mb-2">
                                        <i class="fas fa-shopping-cart"></i> Thêm Vào Giỏ Hàng
                                    </button>
                                @endif
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <style>
        .card-title a {
            text-decoration: none;
        }
    </style>
@endsection
