<!DOCTYPE html>
<html lang="fa">
<head>
  <meta charset="UTF-8">
  <title>@yield('title', 'پنل مدیریت')</title>

  {{-- CSS --}}
  <link rel="stylesheet" href="admin/dist/css/bootstrap-theme.css">
  <!-- Bootstrap rtl -->
  <link rel="stylesheet" href="admin/dist/css/rtl.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="admin/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="admin/bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="admin/dist/css/AdminLTE.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="admin/dist/css/skins/_all-skins.min.css">
  <link rel="stylesheet" href="{{ asset('css/admin-custom.css') }}"> {{-- استایل دلخواهت برای فینیش لوکس --}}
</head>

<body class="hold-transition skin-yellow sidebar-mini">

<div class="wrapper">
  {{-- Header --}}
  @include('admin.layout.header')

  {{-- Sidebar --}}
  @include('admin.layout.sidebar')

  {{-- Content --}}
  <div class="content-wrapper">
    <section class="content-header">
      @yield('page_header')
    </section>
    <section class="content">
      @yield('content')
    </section>
  </div>

  {{-- Footer --}}
  @include('admin.layout.footer')

  {{-- Control Sidebar --}}
  @include('admin.layout.control-sidebar')
</div>

{{-- Scripts --}}
<script src="admin/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="admin/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="admin/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="admin/bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="admin/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="admin/dist/js/demo.js"></script>
<script>
  $(function () {
    $('.sidebar-menu').tree()
  })
</script>

@stack('scripts')
</body>
</html>
