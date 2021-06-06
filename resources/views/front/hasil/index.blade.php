<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Booking Swab</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="Bocor/assets/img/favicon.png" rel="icon">
    <link href="Bocor/assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="Bocor/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="Bocor/assets/vendor/icofont/icofont.min.css" rel="stylesheet">
    <link href="Bocor/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="Bocor/assets/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="Bocor/assets/vendor/venobox/venobox.css" rel="stylesheet">
    <link href="Bocor/assets/vendor/aos/aos.css" rel="stylesheet">
    <link type="text/css" rel="stylesheet" href="/tmpl_admin/vendors/select2/css/select2.min.css" />
    <link type="text/css" rel="stylesheet" href="/tmpl_admin/vendors/datatables/css/scroller.bootstrap.min.css" />
    <link type="text/css" rel="stylesheet" href="/tmpl_admin/vendors/datatables/css/colReorder.bootstrap.min.css" />
    {{-- <link type="text/css" rel="stylesheet" href="/tmpl_admin/vendors/datatables/css/dataTables.bootstrap.min.css" /> --}}
    <link type="text/css" rel="stylesheet" href="/tmpl_admin/css/pages/dataTables.bootstrap.css" />
    {{-- <link type="text/css" rel="stylesheet" href="/tmpl_admin/css/plugincss/responsive.dataTables.min.css" /> --}}
    <link type="text/css" rel="stylesheet" href="/tmpl_admin/vendors/chosen/css/chosen.css" />

    <link type="text/css" rel="stylesheet" href="/tmpl_admin/css/pages/tables.css" />

    <!-- Template Main CSS File -->
    <link href="Bocor/assets/css/style.css" rel="stylesheet">
    <link type="text/css" rel="stylesheet" href="/tmpl_admin/css/components.css" />
    <style>
        .bodyall {
            padding: 0;
            margin: 0;
        }

    </style>

    <!-- =======================================================
  * Template Name: Bocor - v2.2.1
  * Template URL: https://bootstrapmade.com/bocor-bootstrap-template-nice-animation/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

    <!-- ======= Header ======= -->
    <header id="header">
        <div class="container d-flex align-items-center">

            <div class="logo mr-auto">
                <h1 class="text-light"><a href="/">Booking<span>Swab</span></a></h1>
                <!-- Uncomment below if you prefer to use an image logo -->
                <!-- <a href="index.html"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
            </div>

            <nav class="nav-menu d-none d-lg-block">
                <ul>
                    {{-- <li class="active"><a href="index.html">Home</a></li>
                    <li><a href="#about">About Us</a></li>
                    <li><a href="#services">Services</a></li>
                    <li><a href="#portfolio">Portfolio</a></li> --}}
                    @if (Auth::guard('client')->check())
                        <li><a href="{{ route('bookingc.index') }}">Booking</a></li>
                        <li><a href="{{ route('antrianc.index') }}">Antrian</a></li>
                        <li><a href="{{ route('hasilc.index') }}">Hasil Swab</a></li>
                    @endif
                    @if (!Auth::guard('client')->check())
                        <li><a href="{{ route('login.index') }}">Login</a></li>
                        <li><a href="{{ route('register.index') }}">Signup</a></li>
                    @endif
                    <li><a href="{{ route('tentang') }}">Tentang</a></li>
                    @if (Auth::guard('client')->check())
                        <li><a href="{{ route('logout') }}">Logout</a></li>
                    @endif

                    {{-- <li class="drop-down"><a href="">Drop Down</a>
                        <ul>
                            <li><a href="#">Drop Down 1</a></li>
                            <li class="drop-down"><a href="#">Drop Down 2</a>
                                <ul>
                                    <li><a href="#">Deep Drop Down 1</a></li>
                                    <li><a href="#">Deep Drop Down 2</a></li>
                                    <li><a href="#">Deep Drop Down 3</a></li>
                                    <li><a href="#">Deep Drop Down 4</a></li>
                                    <li><a href="#">Deep Drop Down 5</a></li>
                                </ul>
                            </li>
                            <li><a href="#">Drop Down 3</a></li>
                            <li><a href="#">Drop Down 4</a></li>
                            <li><a href="#">Drop Down 5</a></li>
                        </ul>
                    </li> --}}


                    {{-- <li class="get-started"><a href="#about">Get Started</a></li> --}}
                </ul>
            </nav><!-- .nav-menu -->

        </div>
    </header><!-- End Header -->

    <!-- ======= Hero Section ======= -->
    <section id="hero">

        <div class="container c-c">
            <div class="row d-flex align-items-center" style="height: 580px">
                <div class=" col-lg-12 py-5 py-lg-0 order-2 order-lg-1">
                    <p style="font-weight: bold; font-size: 45px; text-align: center; color: white">DATA HASIL SWAB</p>
                    <table class="table table-striped table-bordered table-hover" style="background: white"
                        id="tb-hasil">
                        <thead>
                            <tr>
                                <th>Nama</th>
                                <th>Jenis Kelamin</th>
                                <th>Umur</th>
                                <th>Alamat</th>
                                <th>Tanggal</th>
                                <th>Hasil</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $no = 1;
                            @endphp
                            @foreach ($data as $datas)
                                <tr>

                                    <td>{{ $datas->nama }}</td>
                                    <td>{{ $datas->jenis_kelamin }}</td>
                                    <td>{{ $datas->umur }}</td>
                                    <td>{{ $datas->alamat }}</td>
                                    <td>{{ $datas->tanggal }}</td>
                                    <td>{{ $datas->hasil }}</td>

                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </section><!-- End Hero -->

    <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>

    <!-- Vendor JS Files -->
    <script src="Bocor/assets/vendor/jquery/jquery.min.js"></script>
    <script src="Bocor/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="Bocor/assets/vendor/jquery.easing/jquery.easing.min.js"></script>
    <script src="Bocor/assets/vendor/php-email-form/validate.js"></script>
    <script src="Bocor/assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="Bocor/assets/vendor/owl.carousel/owl.carousel.min.js"></script>
    <script src="Bocor/assets/vendor/venobox/venobox.min.js"></script>
    <script src="Bocor/assets/vendor/aos/aos.js"></script>
    <script type="text/javascript" src="tmpl_admin/js/jquery.min.js"></script>
    <script type="text/javascript" src="/tmpl_admin/js/components.js"></script>

    <script type="text/javascript" src="tmpl_admin/vendors/datatables/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="tmpl_admin/js/pluginjs/dataTables.tableTools.js"></script>
    <script type="text/javascript" src="tmpl_admin/vendors/datatables/js/dataTables.colReorder.min.js"></script>
    <script type="text/javascript" src="tmpl_admin/vendors/datatables/js/dataTables.bootstrap.min.js"></script>
    <script type="text/javascript" src="tmpl_admin/vendors/datatables/js/dataTables.buttons.min.js"></script>
    <script type="text/javascript" src="tmpl_admin/js/pluginjs/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="tmpl_admin/vendors/datatables/js/dataTables.responsive.min.js"></script>
    <script type="text/javascript" src="tmpl_admin/vendors/datatables/js/dataTables.rowReorder.min.js"></script>
    <script type="text/javascript" src="tmpl_admin/vendors/datatables/js/buttons.colVis.min.js"></script>
    <script type="text/javascript" src="tmpl_admin/vendors/datatables/js/buttons.html5.min.js"></script>
    <script type="text/javascript" src="tmpl_admin/vendors/datatables/js/buttons.bootstrap.min.js"></script>
    <script type="text/javascript" src="tmpl_admin/vendors/datatables/js/buttons.print.min.js"></script>
    <script type="text/javascript" src="tmpl_admin/vendors/chosen/js/chosen.jquery.js"></script>
    <script>
        $('#tb-hasil').DataTable({
            dom: "<'table-responsive'><'row'<'col-md-5 col-12'><'col-md-7 col-12'>>",
            iDisplayLength: 25,
            // order: [[ 0, "desc" ]],
        });

    </script>
    <!-- Template Main JS File -->
    <script src="Bocor/assets/js/main.js"></script>

</body>

</html>
