@include('layouts/header')
@include('layouts/sidebar')
<!-- End of Topbar -->

<!-- Begin Page Content -->
<div class="container-fluid">
    @yield('content')
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

@include('layouts/footer')