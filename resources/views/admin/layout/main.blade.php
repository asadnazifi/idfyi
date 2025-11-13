<!DOCTYPE html>
<html lang="fa">

<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'پنل مدیریت')</title>

    {{-- CSS --}}
    <link rel="stylesheet" href="{{ asset('admin/dist/css/bootstrap-theme.css') }}">
    <!-- Bootstrap rtl -->
    <link rel="stylesheet" href="{{ asset('admin/dist/css/rtl.css') }}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('admin/bower_components/font-awesome/css/font-awesome.min.css') }}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="{{ asset('admin/bower_components/Ionicons/css/ionicons.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('admin/dist/css/AdminLTE.css') }}">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="{{ asset('admin/dist/css/skins/_all-skins.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/admin-custom.css') }}"> {{-- استایل دلخواهت برای فینیش لوکس --}}
    @stack('style')
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
                {{-- پیام‌های سراسری Laravel --}}
                @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade in" style="direction: rtl; text-align: right">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <i class="fa fa-check-circle"></i> {{ session('success') }}
                    </div>
                @endif

                @if(session('error'))
                    <div class="alert alert-danger alert-dismissible fade in" style="direction: rtl; text-align: right">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <i class="fa fa-times-circle"></i> {{ session('error') }}
                    </div>
                @endif

                {{-- پیام‌های ولیدیشن (خطاهای فرم) --}}
                @if ($errors->any())
                    <div class="alert alert-warning alert-dismissible fade in" style="direction: rtl; text-align: right">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <strong>خطا در اعتبارسنجی:</strong>
                        <ul style="margin-top:5px;">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                @yield('content')
            </section>
        </div>

        {{-- Footer --}}
        @include('admin.layout.footer')

        {{-- Control Sidebar --}}
        @include('admin.layout.control-sidebar')
    </div>

    {{-- Scripts --}}
    <script src="{{ asset('admin/bower_components/jquery/dist/jquery.min.js') }}"></script>
    <!-- Bootstrap 3.3.7 -->
    <script src="{{ asset('admin/bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>
    <!-- SlimScroll -->
    <script src="{{ asset('admin/bower_components/jquery-slimscroll/jquery.slimscroll.min.js') }}"></script>
    <!-- FastClick -->
    <script src="{{ asset('admin/bower_components/fastclick/lib/fastclick.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('admin/dist/js/adminlte.min.js') }}"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="{{ asset('admin/dist/js/demo.js') }}"></script>
    <script>
        $(function () {
            $('.sidebar-menu').tree()
        })
    </script>

    @stack('scripts')
</body>

</html>
