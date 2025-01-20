{{-- Header --}}
@include('admin.partials.header')

<body id="page-top">
    <div id="wrapper">

        <!-- Sidebar -->
        @include('admin.partials.sidebar')

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">
            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                @include('admin.partials.topbar')

                <!-- Page Content -->
                <div class="container-fluid">
                    @yield('content')
                </div>
                
            </div>

            <!-- Footer -->
            @include('admin.partials.footer')

        </div>
    </div>

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal -->
    @include('admin.partials.logout_modal')

    <!-- Scripts -->
    <script src="{{ asset('sb2/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('sb2/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('sb2/vendor/jquery-easing/jquery.easing.min.js') }}"></script>
    <script src="{{ asset('sb2/js/sb-admin-2.min.js') }}"></script>
    <script src="{{ asset('sb2/vendor/chart.js/Chart.min.js') }}"></script>
    <script src="{{ asset('sb2/js/demo/chart-area-demo.js') }}"></script>
    <script src="{{ asset('sb2/js/demo/chart-pie-demo.js') }}"></script>
</body>

</html>
