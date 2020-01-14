<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>@yield('title') - {{ config('app.name', 'CHPC') }}</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('/admin/')}}/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="{{asset('/admin/')}}/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="{{asset('/admin/')}}/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="{{asset('/admin/')}}/plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('/admin/')}}/dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{asset('/admin/')}}/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{asset('/admin/')}}/plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="{{asset('/admin/')}}/plugins/summernote/summernote-bs4.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet">

  @stack('css')
</head>


<body class="hold-transition sidebar-mini layout-fixed">

   {{-- topbar --}}
    @include('layouts.admin.partial.topbar')
    {{-- topbar end --}}

    {{-- sidebar --}}
    @include('layouts.admin.partial.sidebar')
    <!-- #END# Left Sidebar -->


  
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">


    @yield('content')


  </div>
  <!-- /.content-wrapper -->



  <footer class="main-footer">
    <strong>Copyright &copy; 2020 CHPC</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 1.0.0
    </div>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->




<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
{{-- <script src="{{asset('/admin/')}}/plugins/jquery/jquery.min.js"></script> --}}
<!-- jQuery UI 1.11.4 -->
<script src="{{asset('/admin/')}}/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="{{asset('/admin/')}}/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- jQuery Knob Chart -->
<script src="{{asset('/admin/')}}/plugins/jquery-knob/jquery.knob.min.js"></script>

<!-- daterangepicker -->
<script src="{{asset('/admin/')}}/plugins/moment/moment.min.js"></script>
<script src="{{asset('/admin/')}}/plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{asset('/admin/')}}/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="{{asset('/admin/')}}/plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="{{asset('/admin/')}}/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="{{asset('/admin/')}}/dist/js/adminlte.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
{{-- <script src="{{asset('/admin/')}}/dist/js/pages/dashboard.js"></script> --}}
<!-- AdminLTE for demo purposes -->
{{-- <script src="{{asset('/admin/')}}/dist/js/demo.js"></script> --}}

{{-- <script src="{{asset('/admin/')}}/dist/js/demo.js"></script> --}}


<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

{!! Toastr::message() !!}

<script>
  @if($errors->any())
      @foreach($errors->all() as $error)
            toastr.error('{{ $error }}','Error',{
                closeButton:true,
                progressBar:true,
             });
      @endforeach
  @endif
</script>

@stack('js')
</body>
</html>
