@include('clien.layout.head')

<body>

    <!-- ======= Header ======= -->
    <div class="page-wrapper">
        <header class="header header-intro-clearance header-4">
            @include('clien.layout.headertop')
            @include('clien.layout.headermid')
            @include('clien.layout.sidebar')
        </header>

        @include('clien.layout.banner')
        <div class="container new-arrivals">
            <div class="heading heading-flex mb-3">
                <div class="heading-left">
        @yield('content')
                </div>
            </div>
        </div>
        @include('clien.layout.footer')
    </div>
    @include('clien.layout.js')
</body>
