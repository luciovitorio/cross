<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta name="description" content="Responsive HTML Admin Dashboard Template based on Bootstrap 5">
  <meta name="author" content="NobleUI">
  <meta name="keywords"
    content="nobleui, bootstrap, bootstrap 5, bootstrap5, admin, dashboard, template, responsive, css, sass, html, theme, front-end, ui kit, web">

  <title>CTFormiga</title>

  <!-- Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">
  <!-- End fonts -->

  <!-- core:css -->
  <link rel="stylesheet" href="{{asset('assets/vendors/core/core.css')}}">
  <!-- endinject -->

  <!-- Plugin js for sweetalert2 -->
  <script src="{{asset('assets/vendors/sweetalert2/sweetalert2.min.js')}}"></script>
  <!-- End plugin js for sweetalert2 -->

  <!-- Plugin css for this page -->
  <!-- End plugin css for this page -->

  <!-- inject:css -->
  <link rel="stylesheet" href="{{asset('assets/fonts/feather-font/css/iconfont.css')}}">
  <link rel="stylesheet" href="{{asset('assets/vendors/flag-icon-css/css/flag-icon.min.css')}}">
  <!-- endinject -->

  <!-- Layout styles -->
  <link rel="stylesheet" href="{{asset('assets/css/demo1/style.css')}}">
  <!-- End layout styles -->

  <!-- Plugin css for sweetalert2 -->
  <link rel="stylesheet" href="{{asset('assets/vendors/sweetalert2/sweetalert2.min.css')}}">
  <!-- End plugin css for sweetalert2 -->

  <link rel="shortcut icon" href="{{asset('assets/images/favicon.png')}}" />
  <meta name="csrf-token" content="{{csrf_token()}}">
</head>

<body>
  <div class="main-wrapper">
    <div class="page-wrapper full-page">

      <div class="page-content d-flex align-items-center justify-content-center">
        <div class="row w-100 mx-0 auth-page">
          <div class="col-md-8 col-xl-6 mx-auto">
            <div class="card">
              <div class="back">

                <div class="row">
                  <div>
                    <div class="auth-form-wrapper px-4 py-5">
                      <a href="#" class="noble-ui-logo d-block mb-2">CT<span>FORMIGA</span></a>
                      <h5 class="text-muted fw-normal mb-4">Seja bem-vindo(a) a página de login.</h5>
                      <form name="login" method="POST" action="{{route('login')}}" class="forms-sample"
                        autocomplete="off">
                        <div class="input-group mb-3">
                          <span class="input-group-text" id="basic-addon1"><i data-feather="mail"></i></span>
                          <input type="email" class="form-control" name="email" placeholder="Insira seu E-mail"
                            aria-describedby="basic-addon1">
                        </div>

                        <div class="input-group mb-3">
                          <span class="input-group-text" id="basic-addon1"><i data-feather="lock"></i></span>
                          <input type="password" class="form-control" name="password" placeholder="Insira sua Senha"
                            aria-describedby="basic-addon1">
                        </div>
                        <div>
                          <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-primary btn-icon-text">
                              <i data-feather="log-in" class="btn-icon-prepend"></i>
                              Entrar
                            </button>
                          </div>
                        </div>
                        <a href="https://api.whatsapp.com/send?phone=5521981465951&text=Oi,%20estou%20com%20um%20problema%20para%20logar.%20Pode%20me%20ajudar?" class="d-block mt-3 text-muted" target="_blank">Está com dificuldades? Clique aqui!</a>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

        </div>
      </div>
    </div>
    <!-- core:js -->
    <script src="{{asset('assets/vendors/core/core.js')}}"></script>
    <!-- endinject -->

    <!-- Plugin js for this page -->
    <!-- End plugin js for this page -->

    <!-- inject:js -->
    <script src="{{asset('assets/vendors/feather-icons/feather.min.js')}}"></script>
    <script src="{{asset('assets/js/template.js')}}"></script>
    <!-- endinject -->

    <!-- Custom js for this page -->
    <script src="{{asset('assets/js/_login.js')}}"></script>
    <!-- End custom js for this page -->

</body>

</html>