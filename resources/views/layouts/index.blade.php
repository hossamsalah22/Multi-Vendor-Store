<!DOCTYPE html>

<html lang="en">
<head>
    @include('partials.head')
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

    <!-- Navbar -->
    @include('partials.navbar')
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    @include('partials.aside')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        @include('partials.header')
        <!-- /.content-header -->
        <div class="content">
            <div class="mt4">
                @yield('content')
            </div>
        </div>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <!-- Control Sidebar -->
    @include('partials.side-controller')
    <!-- /.control-sidebar -->

    <!-- Main Footer -->
    @include('partials.footer')
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->
@include('partials.scripts')
</body>
</html>
