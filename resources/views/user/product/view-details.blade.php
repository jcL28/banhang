@extends('user.partials.layout')

@section('content')
    <div class="container-fluid">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Product Details</h1>
        </div>

        <div class="row">
            <div class="col-lg-12 mb-4 section-product">
                @php
                    $images = !empty($product->images) ? json_decode($product->images->images, true) : null;
                @endphp
                <div class="card shadow mb-4 product-img"
                    style="background-image: url('{{ !empty($product->images) ? asset('storage/' . json_decode($product->images->images, true)[0]) : '' }}');">
                </div>

                <div class="card shadow mb-4 product-detail">
                    <div class="card-body">
                        <h5 class="card-title">{{ $product->product_name }}</h5>
                        <p class="card-text">{{ $product->product_description }}</p>
                        <p class="card-text">Màu: {{ $product->product_color }}</p>
                        <p class="card-text">Kích cỡ: {{ $product->product_size }}</p>
                        <p class="card-text">Giá: {{ number_format($product->product_price, 3, ',', '.') }} VND</p>
                        <div class="mt-5">
                            <form action="{{ route('cart.add', $product->id) }}" method="POST">
                                @csrf
                                @if (Auth::user())
                                    <button type="submit" class="btn btn-warning mb-2">
                                        <i class="fas fa-shopping-cart"></i> Thêm Vào Giỏ Hàng
                                    </button>
                                @endif
                            </form>
                            <a href="{{ route('home') }}" class="btn btn-primary">
                                <i class="fas fa-home"></i> Quay Lại Trang Chủ</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('css')
    <style>
        .section-product {
            display: flex;
            flex-direction: row;
        }

        .product-img {
            background-size: contain;
            background-repeat: no-repeat;
            display: flex;
            flex: 0.3;
            min-height: 50vh;
        }

        .product-detail {
            display: flex;
            flex: 1;
            min-height: 50vh;
        }
    </style>
@endpush
