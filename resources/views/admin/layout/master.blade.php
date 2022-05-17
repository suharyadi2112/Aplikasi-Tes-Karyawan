
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" href="{{ URL::asset('adminutama/production/images/logo2.png')}}" type="image/ico" />
    <title>Uvers</title>
    <!--script src="{{ asset('js/app.js') }}" defer></script-->
    <!-- Styles -->
    <!--link href="{{ asset('css/app.css') }}" rel="stylesheet"-->
    <script>
        var laravel = @json(['baseURL' => url('/')])
    </script>
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{ URL::asset('admin/plugins/fontawesome-free/css/all.min.css')}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ URL::asset('admin/dist/css/adminlte.min.css')}}">
    <!-- pace progress -->
    <link href="{{ URL::asset('admin/plugins/pace-1.0.2/themes/blue/pace-theme-flash.css')}}" rel="stylesheet" />
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">


    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{ URL::asset('admin/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ URL::asset('admin/dist/css/adminlte.min.css')}}">
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ URL::asset('admin/plugins/datatables-bs4/css/dataTables.bootstrap4.css') }}">
    <!--select2--> 
    <link rel="stylesheet" href="{{ URL::asset('admin/plugins/select2/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('admin/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
    <!--checkbox-->
    <link rel="stylesheet" href="{{ URL::asset('admin/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
    <script src="{{ URL::asset('admin/plugins/moment/moment.min.js')}}"></script>
    <!-- Include SmartWizard CSS -->
    <link href="{{ URL::asset('admin/wizardform/dist/css/smart_wizard.css') }}" rel="stylesheet" type="text/css" />
    <!-- Optional SmartWizard theme -->
    <link href="{{ URL::asset('admin/wizardform/dist/css/smart_wizard_theme_arrows.css') }}" rel="stylesheet" type="text/css" />
   <!-- SweetAlert2 -->
    <link rel="stylesheet" href="{{ URL::asset('admin/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css') }}">
      <!-- daterange picker -->
    <link rel="stylesheet" href="{{ URL::asset('admin/plugins/daterangepicker/daterangepicker.css') }}">
    <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
    <!-- Ion Slider -->
    <link rel="stylesheet" href="{{ URL::asset('admin/plugins/ion-rangeslider/css/ion.rangeSlider.min.css') }}">
 


</head>

<body class="hold-transition layout-top-nav ">
    <div class="wrapper">
      <!-- Navbar -->
        <!-- Navbar -->
         @include('admin.include.header')
        <!-- /.navbar -->
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
          <!-- Content Header (Page header) -->
        @php
        $dt123 = DB::table('datadiri')
                ->select('status_finish')
                ->where('id_user', '=', Auth::id())
                ->first();
        @endphp        
            

        <!--link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
        <div class="help-block text-center">
          <h1 style="font-family: 'Kaushan Script', cursive;">Formulir Permohonan Kerja</h1>
        </div>
        
        <div class="text-center">
          <a href="{{URL::to('/pemohon')}}"><h4>--<span class="fa fa-child"></span> Anda Telah Selesai --</h4></a><br>
          Jika ada yang ingin ditanyakan silahkan hubungi : <br> Nomor WhatsApp <b>+62 857-6603-6533</b>
        </div>
        <div class="lockscreen-footer text-center">

        <hr style="width: 20%">
            Kompleks Maha Vihara Duta Maitreya<br>
            Bukit Beruntung, Sei Panas<br>
            Batam 29456,<br>
            Kepulauan Riau - Indonesia<br><br>

            Copyright &copy; 2019 <b><a href="http://uvers.ac.id/in/" target="_blank" class="text-black">Universitas Universal</a></b><br>
        </div-->



            @yield('content')

        </div>
        <!-- /.content-wrapper -->

        <!-- Main Footer -->
         @include('admin.include.footer')
        <!-- Main Footer -->
    </div>
</body>

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="{{ URL::asset('admin/plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{ URL::asset('admin/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{ URL::asset('admin/dist/js/adminlte.min.js')}}"></script>
<script src="{{ asset('admin/plugins/pace-1.0.2/pace.js')}}"></script>

<!-- PAGE PLUGINS -->
<!-- jQuery Mapael -->
<script src="{{ URL::asset('admin/plugins/jquery-mousewheel/jquery.mousewheel.js') }}"></script>

<!-- PAGE SCRIPTS -->
<script src="{{ URL::asset('admin/dist/js/pages/dashboard2.js') }}"></script>

<!-- Bootstrap 4 -->
<script src="{{ URL::asset('admin/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- DataTables -->
<script src="{{ URL::asset('admin/plugins/datatables/jquery.dataTables.js') }}"></script>
<script src="{{ URL::asset('admin/plugins/datatables-bs4/js/dataTables.bootstrap4.js') }}"></script>

<!-- Select2 -->
<script src="{{ URL::asset('admin/plugins/select2/js/select2.full.min.js') }}"></script>
<!-- wizardform -->
<script type="text/javascript" src="{{ URL::asset('admin/wizardform/dist/js/jquery.smartWizard.min.js') }}"></script>
<!-- SweetAlert2 -->
<script src="{{ URL::asset('admin/plugins/sweetalert2/sweetalert2.min.js') }}"></script>

<!-- date-range-picker -->
<script src="{{ URL::asset('admin/plugins/daterangepicker/daterangepicker.js') }}"></script>

<!-- inpus mask -->
<script src="{{ URL::asset('admin/plugins/inputmask/min/jquery.inputmask.bundle.min.js')}}"></script>

<script src="{{ URL::asset('admin/dist/js/jquery.blockUI.js')}}"></script>

<script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>

<!-- Ion Slider -->
<script src="{{ URL::asset('admin/plugins/ion-rangeslider/js/ion.rangeSlider.min.js')}}"></script>

@yield('script')
</html>
