
@if(Auth::user()->level == "2")

@else

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="icon" href="{{ URL::asset('adminutama/production/images/logo2.png')}}" type="image/ico" />

    <title>Uvers</title>
    <!--script src="{{ asset('js/app.js') }}" defer></script-->
    <!-- Styles -->
    <!--link href="{{ asset('css/app.css') }}" rel="stylesheet"-->
    <script>
        var laravel = @json(['baseURL' => url('/')])
    </script>


    <!-- Bootstrap -->
    <link href="{{ URL::asset('adminutama/vendors/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">
    <!-- Font Awesome -->
    <!--link rel="stylesheet" href="{{ URL::asset('admin/plugins/fontawesome-free/css/all.min.css')}}"-->
    <link href="{{ URL::asset('adminutama/vendors/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
    <!-- NProgress -->
    <link href="{{ URL::asset('adminutama/vendors/nprogress/nprogress.css')}}" rel="stylesheet">
    <!-- iCheck -->
    <link href="{{ URL::asset('adminutama/vendors/iCheck/skins/flat/green.css')}}" rel="stylesheet">
    
    <!-- bootstrap-progressbar -->
    <link href="{{ URL::asset('adminutama/vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css')}}" rel="stylesheet">
    <!-- JQVMap -->
    <link href="{{ URL::asset('adminutama/vendors/jqvmap/dist/jqvmap.min.css')}}" rel="stylesheet"/>
    <!-- bootstrap-daterangepicker -->
    <link href="{{ URL::asset('adminutama/vendors/bootstrap-daterangepicker/daterangepicker.css')}}" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="{{ URL::asset('adminutama/build/css/custom.min.css')}}" rel="stylesheet">
    <!-- Datatables -->
    <link rel="stylesheet" href="{{ URL::asset('admin/plugins/datatables-bs4/css/dataTables.bootstrap4.css') }}">
    <!-- SweetAlert2 -->
    <link rel="stylesheet" href="{{ URL::asset('admin/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css') }}">

    <!--select2--> 
    <link rel="stylesheet" href="{{ URL::asset('admin/plugins/select2/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('admin/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">

    <!-- summernote -->
    <link rel="stylesheet" href="{{ URL::asset('admin/plugins/summernote/summernote-bs4.css') }}">

    <!-- Switchery -->
    <link href="{{ URL::asset('adminutama/vendors/switchery/dist/switchery.min.css') }} " rel="stylesheet">


</head>

<body class="nav-md">
  <div class="container body">
    <div class="main_container">
      <!-- Navbar -->
        <!-- Navbar -->
         @include('admin.include.sidebaradminutama')
        <!-- /.navbar -->
        <!-- Content Wrapper. Contains page content -->
          <!-- Content Header (Page header) -->
          @yield('content')
        <!-- /.content-wrapper -->

        <!-- Main Footer -->
         @include('admin.include.footer')
        <!-- Main Footer -->
        </div>
    </div>
</body>


<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->
<script src="{{ URL::asset('adminutama/vendors/jquery/dist/jquery.min.js')}}"></script>
<!-- Bootstrap -->
<script src="{{ URL::asset('adminutama/vendors/bootstrap/dist/js/bootstrap.bundle.min.js')}}"></script>
<!-- FastClick -->
<script src="{{ URL::asset('adminutama/vendors/fastclick/lib/fastclick.js')}}"></script>
<!-- NProgress -->
<script src="{{ URL::asset('adminutama/vendors/nprogress/nprogress.js')}}"></script>
<!-- Chart.js -->
<script src="{{ URL::asset('adminutama/vendors/Chart.js/dist/Chart.min.js')}}"></script>
<!-- gauge.js -->
<script src="{{ URL::asset('adminutama/vendors/gauge.js/dist/gauge.min.js')}}"></script>
<!-- bootstrap-progressbar -->
<script src="{{ URL::asset('adminutama/vendors/bootstrap-progressbar/bootstrap-progressbar.min.js')}}"></script>
<!-- iCheck -->
<script src="{{ URL::asset('adminutama/vendors/iCheck/icheck.min.js')}}"></script>
<!-- Skycons -->
<script src="{{ URL::asset('adminutama/vendors/skycons/skycons.js')}}"></script>
<!-- DateJS -->
<script src="{{ URL::asset('adminutama/vendors/DateJS/build/date.js')}}"></script>
<!-- bootstrap-daterangepicker -->
<script src="{{ URL::asset('adminutama/vendors/moment/min/moment.min.js')}}"></script>
<script src="{{ URL::asset('adminutama/vendors/bootstrap-daterangepicker/daterangepicker.js')}}"></script>

<!-- Custom Theme Scripts -->
<script src="{{ URL::asset('adminutama/build/js/custom.min.js')}}"></script>

<!-- Datatables -->

<!-- Bootstrap 4 -->
<script src="{{ URL::asset('admin/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- DataTables -->
<script src="{{ URL::asset('admin/plugins/datatables/jquery.dataTables.js') }}"></script>
<script src="{{ URL::asset('admin/plugins/datatables-bs4/js/dataTables.bootstrap4.js') }}"></script>
<script src="{{ URL::asset('adminutama/vendors/datatables.net-keytable/js/dataTables.keyTable.min.js')}}"></script>
<script src="{{ URL::asset('adminutama/vendors/datatables.net-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{ URL::asset('adminutama/vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js')}}"></script>
<script src="{{ URL::asset('adminutama/vendors/datatables.net-scroller/js/dataTables.scroller.min.js')}}"></script>

<!-- SweetAlert2 -->
<script src="{{ URL::asset('admin/plugins/sweetalert2/sweetalert2.min.js') }}"></script>

<!-- Select2 -->
<script src="{{ URL::asset('admin/plugins/select2/js/select2.full.min.js') }}"></script>
<!--Jquery block ui-->
<script src="{{ URL::asset('admin/dist/js/jquery.blockUI.js')}}"></script>

<!--rich text-->
<script src="{{ URL::asset('admin/plugins/summernote/summernote-bs4.min.js') }}"></script>

<!-- Switchery -->
<script src="{{ URL::asset('adminutama/vendors/switchery/dist/switchery.min.js') }}"></script>



<style>
.btn-group-xs > .btn, .btn-xs {
  padding: .25rem .4rem;
  font-size: .875rem;
  line-height: .5;
  border-radius: .2rem;
}
</style>
@yield('script')
</html>

@endif