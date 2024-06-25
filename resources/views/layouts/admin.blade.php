<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ $titlePage }}</title>
    <meta content="width=device-width, initial-scale=1.0, shrink-to-fit=no" name="viewport" />
    {{-- <link rel="icon" href="/vendor/kaiadminlite1.0.0/assets/img/kaiadmin/favicon.ico" type="image/x-icon" /> --}}
    <link rel="shortcut icon" href="/img/logo_puskes_cb.png" type="image/png">

    <!-- Fonts and icons -->
    <script src="/vendor/kaiadminlite1.0.0/assets/js/plugin/webfont/webfont.min.js"></script>
    <script>
        WebFont.load({
            google: {
                families: ["Public Sans:300,400,500,600,700"]
            },
            custom: {
                families: [
                    "Font Awesome 5 Solid",
                    "Font Awesome 5 Regular",
                    "Font Awesome 5 Brands",
                    "simple-line-icons",
                ],
                urls: ["/vendor/kaiadminlite1.0.0/assets/css/fonts.min.css"],
            },
            active: function() {
                sessionStorage.fonts = true;
            },
        });
    </script>

    <!-- CSS Files -->
    <link rel="stylesheet" href="/vendor/kaiadminlite1.0.0/assets/css/bootstrap.min.css" />
    <link rel="stylesheet" href="/vendor/kaiadminlite1.0.0/assets/css/plugins.min.css" />
    <link rel="stylesheet" href="/vendor/kaiadminlite1.0.0/assets/css/kaiadmin.min.css" />
    <link rel="stylesheet" href="/vendor/summernote0.8.18/summernote.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.12.0/dist/sweetalert2.min.css">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="/css/admin_styles.css">
</head>

<body>
    <div class="wrapper">
        <!-- Sidebar -->
        @include('partials.sidebar')
        <!--END Sidebar -->

        <!-- Main Panel -->
        @yield('container-admin')
        <!-- END Main Panel -->


    </div>
    <!--   Core JS Files   -->
    <script src="/vendor/kaiadminlite1.0.0/assets/js/core/jquery-3.7.1.min.js"></script>
    <script src="/vendor/kaiadminlite1.0.0/assets/js/core/popper.min.js"></script>
    <script src="/vendor/kaiadminlite1.0.0/assets/js/core/bootstrap.min.js"></script>

    <!-- jQuery Scrollbar -->
    <script src="/vendor/kaiadminlite1.0.0/assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js"></script>

    <!-- Chart JS -->
    <script src="/vendor/kaiadminlite1.0.0/assets/js/plugin/chart.js/chart.min.js"></script>

    <!-- jQuery Sparkline -->
    <script src="/vendor/kaiadminlite1.0.0/assets/js/plugin/jquery.sparkline/jquery.sparkline.min.js"></script>

    <!-- Chart Circle -->
    <script src="/vendor/kaiadminlite1.0.0/assets/js/plugin/chart-circle/circles.min.js"></script>

    <!-- Datatables -->
    <script src="/vendor/kaiadminlite1.0.0/assets/js/plugin/datatables/datatables.min.js"></script>

    <!-- Bootstrap Notify -->
    <script src="/vendor/kaiadminlite1.0.0/assets/js/plugin/bootstrap-notify/bootstrap-notify.min.js"></script>

    <!-- jQuery Vector Maps -->
    <script src="/vendor/kaiadminlite1.0.0/assets/js/plugin/jsvectormap/jsvectormap.min.js"></script>
    <script src="/vendor/kaiadminlite1.0.0/assets/js/plugin/jsvectormap/world.js"></script>

    <!-- Sweet Alert -->
    {{-- <script src="/vendor/kaiadminlite1.0.0/assets/js/plugin/sweetalert/sweetalert.min.js"></script> --}}
    
    <!-- Sweet Alert 2-->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.12.0/dist/sweetalert2.all.min.js"></script>

    <!-- Kaiadmin JS -->
    <script src="/vendor/kaiadminlite1.0.0/assets/js/kaiadmin.min.js"></script>
    
    <!-- Summernote JS -->
    
<script src="/vendor/summernote0.8.18/summernote.min.js"></script>
    <!-- Custom JS -->
    {{-- <script src="/js/admin_scripts.js"></script> --}}
    <x-script-admin />

    <script>
        $("#lineChart").sparkline([102, 109, 120, 99, 110, 105, 115], {
            type: "line",
            height: "70",
            width: "100%",
            lineWidth: "2",
            lineColor: "#177dff",
            fillColor: "rgba(23, 125, 255, 0.14)",
        });

        $("#lineChart2").sparkline([99, 125, 122, 105, 110, 124, 115], {
            type: "line",
            height: "70",
            width: "100%",
            lineWidth: "2",
            lineColor: "#f3545d",
            fillColor: "rgba(243, 84, 93, .14)",
        });

        $("#lineChart3").sparkline([105, 103, 123, 100, 95, 105, 115], {
            type: "line",
            height: "70",
            width: "100%",
            lineWidth: "2",
            lineColor: "#ffa534",
            fillColor: "rgba(255, 165, 52, .14)",
        });
    </script>
</body>

</html>
