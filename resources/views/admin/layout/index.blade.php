@include('admin.layout.head')

<div id="wrapper">
    @include('admin.layout.sidebar')
    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">
        <!-- Main Content -->
        <div id="content">
            @include('admin.layout.navbar')
            <div class="container-fluid">
                <!-- Hiển thị nội dung của từng trang con-->
                @yield('content')
            </div>
        </div>
        @include('admin.layout.footer')
    </div>
    @include('admin.layout.js')
