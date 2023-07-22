<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta http-equiv="X-UA-Compatible" content="ie=edge" />
  <meta name="description" content="Responsive HTML Admin Dashboard Template based on Bootstrap 5" />
  <meta name="author" content="NobleUI" />
  <meta name="keywords"
    content="nobleui, bootstrap, bootstrap 5, bootstrap5, admin, dashboard, template, responsive, css, sass, html, theme, front-end, ui kit, web" />

  <title>CTFormiga</title>

  <!-- Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet" />
  <!-- End fonts -->

  <!-- core:css -->
  <link rel="stylesheet" href="{{asset('assets/vendors/core/core.css')}}" />
  <!-- endinject -->

  <!-- Plugin js for sweetalert2 -->
  <script src="{{asset('assets/vendors/sweetalert2/sweetalert2.min.js')}}"></script>
  <!-- End plugin js for sweetalert2 -->

  <!-- inject:css -->
  <link rel="stylesheet" href="{{asset('assets/fonts/feather-font/css/iconfont.css')}}" />
  <link rel="stylesheet" href="{{asset('assets/vendors/flag-icon-css/css/flag-icon.min.css')}}" />
  <!-- endinject -->

  <!-- Plugin css for datatable -->
  <link rel="stylesheet" href="{{asset('assets/vendors/datatables.net-bs5/dataTables.bootstrap5.css')}}">
  <link rel="stylesheet" href="{{asset('assets/vendors/datatables.net-bs5/responsiveDataTable.css')}}">
  <!-- End plugin css for datatable -->

  <!-- Layout styles -->
  <link rel="stylesheet" href="{{asset('assets/css/demo1/style.min.css')}}" />
  <!-- End layout styles -->

  <!-- Plugin css for sweetalert2 -->
  <link rel="stylesheet" href="{{asset('assets/vendors/sweetalert2/sweetalert2.min.css')}}">
  <!-- End plugin css for sweetalert2 -->

  <link rel="shortcut icon" href="{{asset('assets/images/favicon.png')}}" />
  @hasSection ('css')
  @yield('css')
  @endif
  <meta name="csrf-token" content="{{csrf_token()}}">
</head>

<body>
  <div class="main-wrapper">
    <div class="page-wrapper">
      @include('partials.sidebar')
      @include('partials.header')
      @yield('content')
      @include('partials.footer')
    </div>
  </div>



  <!-- core:js -->
  <script src="{{asset('assets/vendors/core/core.js')}}"></script>
  <!-- endinject -->

  <!-- inject:js -->
  <script src="{{asset('assets/vendors/feather-icons/feather.min.js')}}"></script>
  <script src="{{asset('assets/js/template.js')}}"></script>
  <!-- endinject -->

  <!-- Plugin js for datatables -->
  <script src="{{asset('assets/vendors/datatables.net/jquery.dataTables.js')}}"></script>
  <script src="{{asset('assets/vendors/datatables.net-bs5/dataTables.bootstrap5.js')}}"></script>
  <!-- End plugin js datatables -->

  <!-- Custom js for datatables -->
  <script src="{{asset('assets/vendors/datatables.net-bs5/responsive2.4.0.js')}}"></script>
  <!-- End custom js datatables -->

  @hasSection ('js')
  @yield('js')
  @endif

</body>

</html>