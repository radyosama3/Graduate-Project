@include('admin.header')
    <body>
    <!-- =============== Navigation ================ -->
    <div class="container">
        @include('admin.sidebar')
        <!-- ========================= Main ==================== -->
        <div class="main">

                @include('admin.topbar')

            <div class="container1">
                @yield('body')

                {{-- add course --}}
                {{-- @include('admin.addcourse') --}}
                {{-- add adduser --}}
                {{-- @include('admin.adduser') --}}
                {{-- assin course --}}
                {{-- @include('admin.assigncourse') --}}
                {{-- add lec --}}
                {{-- @include('admin.addLec') --}}
            </div>

        </div>

    </div>

    <!-- =========== Scripts =========  -->
    <script src="scripts.js"></script>
    <script src="{{asset("admin/assets")}}/js/main.js"></script>
    <!-- ======= Charts JS ====== -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.7.1/dist/chart.min.js"></script>
    <script src="{{asset("admin/assets")}}/js/chartsJS.js"></script>

    <!-- ====== ionicons ======= -->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    </body>

</html>