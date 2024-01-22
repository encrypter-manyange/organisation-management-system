<!doctype html>
<html lang="en" >

<head>
    <meta charset="utf-8" />
    <title>Dashboard | {{$page_name}}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Webantico Fusion" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{asset('backend-assets/images/favicon.ico')}}">

    <!-- jquery.vectormap css -->
    <link href="{{asset('backend-assets/libs/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.css')}}" rel="stylesheet" type="text/css" />
    <!-- Bootstrap Css -->
    <link href="{{asset('backend-assets/css/bootstrap.min.css')}}" id="bootstrap-style" rel="stylesheet" type="text/css" />
    <!-- DataTables -->
    <link href="{{asset('backend-assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css')}} " rel="stylesheet" type="text/css" />
    <link href="{{asset('backend-assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css')}}" rel="stylesheet"
          type="text/css" />

    <!-- Responsive datatable examples -->
    <link href="{{asset('backend-assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css')}}" rel="stylesheet"
          type="text/css" />
    <!-- Icons Css -->
    <link href="{{asset('backend-assets/css/icons.min.css')}}" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="{{asset('backend-assets/css/app.min.css')}}"  id="app-style"  rel="stylesheet" type="text/css" />
</head>
<body data-layout="detached" data-topbar="colored">
<!-- <body data-layout="horizontal" data-topbar="dark"> -->
<div class="container-fluid">
    <!-- Begin page -->
    <div id="layout-wrapper">

        @include('components.admin.header')
        @include('components.admin.sidebar')
        <!-- Left Sidebar End -->

        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="main-content">
            <div class="page-content">

                @yield('content')
                <!-- end row -->
            </div>
            <!-- End Page-content -->

            @include('components.admin.footer')
        </div>
        <!-- end main content-->

    </div>
    <!-- END layout-wrapper -->

</div>
<!-- end container-fluid -->


<!-- Right bar overlay-->
<div class="rightbar-overlay"></div>

<!-- JAVASCRIPT -->
<!-- JAVASCRIPT -->
<script src="{{asset('backend-assets/libs/jquery/jquery.min.js')}}"></script>
<script src="{{asset('backend-assets/libs/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('backend-assets/libs/metismenu/metisMenu.min.js')}}"></script>
<script src="{{asset('backend-assets/libs/simplebar/simplebar.min.js')}}"></script>
<script src="{{asset('backend-assets/libs/node-waves/waves.min.js')}}"></script>
<script src="{{asset('backend-assets/libs/jquery-sparkline/jquery.sparkline.min.js')}}"></script>

<!-- apexcharts -->
<script src="{{asset('backend-assets/libs/apexcharts/apexcharts.min.js')}}"></script>

<!-- jquery.vectormap map -->
<script src="{{asset('backend-assets/libs/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.min.js')}}"></script>
<script src="{{asset('backend-assets/libs/admin-resources/jquery.vectormap/maps/jquery-jvectormap-us-merc-en.js')}}"></script>

<script src="{{asset('backend-assets/js/pages/dashboard.init.js')}}"></script>

<!-- Required datatable js -->
<script src="{{asset('backend-assets/libs/datatables.net/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('backend-assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<!-- Buttons examples -->
<script src="{{asset('backend-assets/libs/datatables.net-buttons/js/dataTables.buttons.min.js')}}"></script>
<script src="{{asset('backend-assets/libs/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js')}}"></script>
<script src="{{asset('backend-assets/libs/jszip/jszip.min.js')}}"></script>
<script src="{{asset('backend-assets/libs/pdfmake/build/pdfmake.min.js')}}"></script>
<script src="{{asset('backend-assets/libs/pdfmake/build/vfs_fonts.js')}}"></script>
<script src="{{asset('backend-assets/libs/datatables.net-buttons/js/buttons.html5.min.js')}}"></script>
<script src="{{asset('backend-assets/libs/datatables.net-buttons/js/buttons.print.min.js')}}"></script>
<script src="{{asset('backend-assets/libs/datatables.net-buttons/js/buttons.colVis.min.js')}}"></script>
<!-- Responsive examples -->
<script src="{{asset('backend-assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('backend-assets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js')}}"></script>

<!-- Datatable init js -->
<script src="{{asset('backend-assets/js/pages/datatables.init.js')}}"></script>
<script src="{{asset('backend-assets/js/app.js')}}"></script>

</body>

</html>
