{{-- Header --}}
@include('user.partials.header')


<body>
    <div id="wrapper">

        {{-- Sidebar --}}
        @include('user.partials.sidebar')

        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">

                {{-- Topbar --}}
                @include('user.partials.topbar')

                {{-- Banner --}}
                <div class="banner text-white text-center py-2"
                    style="background-image: url('{{ asset('storage/images/banner.jpg') }}'); background-size: cover; background-position: center; height:70%">
                </div>

                {{-- Thông Báo --}}
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
                @if (session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                @endif

                <div class="container-fluid">
                    {{-- Contents --}}
                    @yield('content')
                </div>

            </div>

            {{-- Footer --}}
            @include('user.partials.footer')
        </div>

    </div>

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    @if (session('isAdmin'))
        @include('admin.partials.logout_modal')
    @else
        @include('user.partials.logout_modal')
    @endif

    <!-- Scripts -->
    <script src="{{ asset('sb2/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('sb2/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('sb2/vendor/jquery-easing/jquery.easing.min.js') }}"></script>
    <script src="{{ asset('sb2/js/sb-admin-2.min.js') }}"></script>
    <script src="{{ asset('sb2/vendor/chart.js/Chart.min.js') }}"></script>
    <script src="{{ asset('sb2/js/demo/chart-area-demo.js') }}"></script>
    <script src="{{ asset('sb2/js/demo/chart-pie-demo.js') }}"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>


    <style>
        .banner {
            height: 150px;
            color: rgb(255, 255, 255);
            display: flex;
            justify-content: center;
            align-items: center;
            text-shadow: 1px 1px 3px rgba(0, 0, 0, 0.5);
        }
    </style>

    @stack('css')
    @stack('scripts')
</body>

</html>
