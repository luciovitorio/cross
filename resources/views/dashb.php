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

  <title>Box do Índio</title>

  <!-- Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet" />
  <!-- End fonts -->

  <!-- core:css -->
  <link rel="stylesheet" href="views/assets/vendors/core/core.css" />
  <!-- endinject -->

  <!-- Plugin js for sweetalert2 -->
  <script src="views/assets/vendors/sweetalert2/sweetalert2.min.js"></script>
  <!-- End plugin js for sweetalert2 -->

  <!-- inject:css -->
  <link rel="stylesheet" href="views/assets/fonts/feather-font/css/iconfont.css" />
  <link rel="stylesheet" href="views/assets/vendors/flag-icon-css/css/flag-icon.min.css" />
  <!-- endinject -->

  <!-- Plugin css for datatable -->
  <link rel="stylesheet" href="views/assets/vendors/datatables.net-bs5/dataTables.bootstrap5.css">
  <link rel="stylesheet" href="views/css/responsiveDataTable.css">
  <!-- End plugin css for datatable -->

  <!-- Layout styles -->
  <link rel="stylesheet" href="views/assets/css/demo1/style.min.css" />
  <!-- End layout styles -->

  <!-- Plugin css for sweetalert2 -->
  <link rel="stylesheet" href="views/assets/vendors/sweetalert2/sweetalert2.min.css">
  <!-- End plugin css for sweetalert2 -->

  <link rel="shortcut icon" href="views/img/favicon.png" />
</head>

<body>
  <div class="main-wrapper">
    <?php
    if (isset($_SESSION['sessionStart']) && $_SESSION['sessionStart'] == 'ok') {
      // SIDEBAR
      include "partials/sidebar.php";
      echo '<div class="page-wrapper">';

      // HEADER
      include "partials/header.php";

      // CONTENT
      if (isset($_GET["route"])) {
        if (
          $_GET["route"] == "home" ||
          $_GET["route"] == "users" ||
          $_GET["route"] == "schedule" ||
          $_GET["route"] == "hours" ||
          $_GET["route"] == "days" ||
          $_GET["route"] == "alerts" ||
          $_GET["route"] == "blocks" ||
          $_GET["route"] == "training" ||
          $_GET["route"] == "logout"
        ) {
          include "pages/" . $_GET["route"] . ".php";
        } else {
          include "pages/404.php";
        }
      } else {
        include "pages/home.php";
      }

      // FOOTER
      include "partials/footer.php";
    } else {
      include "pages/login.php";
    }
    ?>
  </div>
  </div>

  <!-- core:js -->
  <script src="views/assets/vendors/core/core.js"></script>
  <!-- endinject -->

  <!-- inject:js -->
  <script src="views/assets/vendors/feather-icons/feather.min.js"></script>
  <script src="views/assets/js/template.js"></script>
  <!-- endinject -->

  <!-- Plugin js for datatables -->
  <script src="views/assets/vendors/datatables.net/jquery.dataTables.js"></script>
  <script src="views/assets/vendors/datatables.net-bs5/dataTables.bootstrap5.js"></script>
  <!-- End plugin js datatables -->

  <!-- Custom js for datatables -->
  <script src="views/js/responsive2.4.0.js"></script>
  <!-- End custom js datatables -->

  <script src="views/js/script.js"></script>
  <script src="views/js/users.js"></script>

</body>

</html>