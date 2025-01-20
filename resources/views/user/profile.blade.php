@extends('user.partials.layout')

@section('content')
<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow">
                <div class="card-header bg-primary text-white">
                    <h5>Thông Tin Cá Nhân</h5>
                </div>
                <div class="card-body">
                    <div class="row mb-3">
                        <div class="col-md-4 text-center">
                            <img src="{{ asset('sb2/img/undraw_profile.svg') }}" alt="Profile Image" class="rounded-circle img-thumbnail" style="width: 150px; height: 150px;">
                        </div>
                        <div class="col-md-8">
                            <h5 class="card-title">{{ $user->name }}</h5>
                            <p class="card-text">Email: {{ $user->email }}</p>
                            <p class="card-text">Phone: {{ $user->phone}}</p>
                            <p class="card-text">Address: {{ $user->address}}</p>
                        </div>
                    </div>
                    <div class="text-right">
                        <a href="#" class="btn btn-primary">Chỉnh Sửa Thông Tin</a>
                        <a href="#" class="btn btn-secondary">Thay Đổi mật khẩu</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
