<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Cuba admin is super flexible, powerful, clean &amp; modern responsive bootstrap 5 admin template with unlimited possibilities.">
    <meta name="keywords" content="admin template, Cuba admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="pixelstrap">
    <link rel="icon" href="../assets/images/favicon.png" type="image/x-icon">
    <link rel="shortcut icon" href="../assets/images/favicon.png" type="image/x-icon">
    <title>PAJ | Room Booking</title>
    <link href="https://fonts.googleapis.com/css?family=Rubik:400,400i,500,500i,700,700i&amp;display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,500,500i,700,700i,900&amp;display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../assets/admin/css/font-awesome.css">
    <link rel="stylesheet" type="text/css" href="../assets/admin/css/vendors/icofont.css">
    <link rel="stylesheet" type="text/css" href="../assets/admin/css/vendors/themify.css">
    <link rel="stylesheet" type="text/css" href="../assets/admin/css/vendors/flag-icon.css">
    <link rel="stylesheet" type="text/css" href="../assets/admin/css/vendors/feather-icon.css">
    <link rel="stylesheet" type="text/css" href="../assets/admin/css/vendors/slick.css">
    <link rel="stylesheet" type="text/css" href="../assets/admin/css/vendors/slick-theme.css">
    <link rel="stylesheet" type="text/css" href="../assets/admin/css/vendors/scrollbar.css">
    <link rel="stylesheet" type="text/css" href="../assets/admin/css/vendors/animate.css">
    <link rel="stylesheet" type="text/css" href="../assets/admin/css/vendors/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="../assets/admin/css/style.css">
    <link id="color" rel="stylesheet" href="../assets/admin/css/color-1.css" media="screen">
    <link rel="stylesheet" type="text/css" href="../assets/admin/css/responsive.css">
  </head>
  <body onload="startTime()"> 
    <div class="loader-wrapper">
      <div class="loader-index"> <span></span></div>
      <svg>
        <defs></defs>
        <filter id="goo">
          <fegaussianblur in="SourceGraphic" stddeviation="11" result="blur"></fegaussianblur>
          <fecolormatrix in="blur" values="1 0 0 0 0  0 1 0 0 0  0 0 1 0 0  0 0 0 19 -9" result="goo"> </fecolormatrix>
        </filter>
      </svg>
    </div>
    <div class="tap-top"><i data-feather="chevrons-up"></i></div>
    <div class="page-wrapper compact-wrapper" id="pageWrapper">
      @include('template.admin.header')
      <div class="page-body-wrapper">
        @include('template.admin.sidebar')
        <div class="page-body">
          @yield('content')
        </div>
        @include('template.admin.footer')
      </div>
    </div>
  
    <script src="../assets/admin/js/jquery.min.js"></script>
    <script src="../assets/admin/js/bootstrap/bootstrap.bundle.min.js"></script>
    <script src="../assets/admin/js/icons/feather-icon/feather.min.js"></script>
    <script src="../assets/admin/js/icons/feather-icon/feather-icon.js"></script>
    <script src="../assets/admin/js/scrollbar/simplebar.js"></script>
    <script src="../assets/admin/js/scrollbar/custom.js"></script>
    <script src="../assets/admin/js/config.js"></script>
    <script src="../assets/admin/js/sidebar-menu.js"></script>
    <script src="../assets/admin/js/sidebar-pin.js"></script>
    <script src="../assets/admin/js/clock.js"></script>
    <script src="../assets/admin/js/slick/slick.min.js"></script>
    <script src="../assets/admin/js/slick/slick.js"></script>
    <script src="../assets/admin/js/header-slick.js"></script>
    <script src="../assets/admin/js/chart/apex-chart/apex-chart.js"></script>
    <script src="../assets/admin/js/chart/apex-chart/stock-prices.js"></script>
    <script src="../assets/admin/js/chart/apex-chart/moment.min.js"></script>
    <script src="../assets/admin/js/notify/bootstrap-notify.min.js"></script>
    <script src="../assets/admin/js/dashboard/default.js"></script>
    <script src="../assets/admin/js/notify/index.js"></script>
    <script src="../assets/admin/js/typeahead/handlebars.js"></script>
    <script src="../assets/admin/js/typeahead/typeahead.bundle.js"></script>
    <script src="../assets/admin/js/typeahead/typeahead.custom.js"></script>
    <script src="../assets/admin/js/typeahead-search/handlebars.js"></script>
    <script src="../assets/admin/js/typeahead-search/typeahead-custom.js"></script>
    <script src="../assets/admin/js/height-equal.js"></script>
    <script src="../assets/admin/js/animation/wow/wow.min.js"></script>
    <script src="../assets/admin/js/script.js"></script>
    <script src="../assets/admin/js/theme-customizer/customizer.js"></script>
    <script>new WOW().init();</script>
  </body>
</html>