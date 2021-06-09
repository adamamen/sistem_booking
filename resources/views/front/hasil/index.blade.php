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
    <link type="text/css" rel="stylesheet" href="/tmpl_admin/css/components.css" />
    <link type="text/css" rel="stylesheet" href="/tmpl_admin/css/custom.css" />
    <link type="text/css" rel="stylesheet" href="/tmpl_admin/vendors/circliful/css/jquery.circliful.css">
    <link href="Bocor/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="Bocor/assets/vendor/icofont/icofont.min.css" rel="stylesheet">
    <link href="Bocor/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="Bocor/assets/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="Bocor/assets/vendor/venobox/venobox.css" rel="stylesheet">
    <link href="Bocor/assets/vendor/aos/aos.css" rel="stylesheet">

    <link type="text/css" rel="stylesheet" href="/tmpl_admin/vendors/animate/css/animate.min.css" />
    <!-- Template Main CSS File -->
    <link href="Bocor/assets/css/style.css" rel="stylesheet">
    <style>


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
                        <div class="btn-group" hidden>
                            <div class="notifications request_section no-bg">
                                <a class="btn btn-default btn-sm messages jn" id="request_btn">
                                    <i class="fa fa-sliders" aria-hidden="true"></i>
                                </a>
                            </div>
                        </div>
                        <div class="btn-group">
                            <div class="notifications messages no-bg ">
                                <a class="btn btn-default btn-sm jn" data-toggle="dropdown" id="notifications_section">
                                    <i style="color: white" class="fa fa-bell-o"></i><span id="countn"
                                        class="badge badge-pill badge-danger notifications_badge_top"></span>
                                </a>
                                <div class="dropdown-menu drop_box_align" role="menu" id="notifications_dropdown">
                                    <div id="notifications">

                                    </div>
                                </div>
                            </div>
                        </div>
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

    <script>
        $('#tb-hasil').DataTable({
            dom: "<'table-responsive'><'row'<'col-md-5 col-12'><'col-md-7 col-12'>>",
            iDisplayLength: 25,
            // order: [[ 0, "desc" ]],
        });

        $("#request_btn, #notifications_section, #messages_section").on("click", function() {
            var animationEnd = 'webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend';
            $('#notifications_dropdown, #messages_dropdown').addClass('animated fadeIn').one(
                animationEnd,
                function() {
                    $("#notifications_dropdown, #messages_dropdown").removeClass(
                        'animated fadeIn');
                });
        });

    </script>

    @if (Auth::guard('client')->check())
        <script>
            var timeOutId = 0;
            var ajaxdata1 = function() {
                $.ajax({
                    url: "{{ route('get.notif') }}",
                    type: "GET"
                }).then(function(data) {
                    $('#notifications').html(data);
                    if (data) {
                        $.ajax({
                            url: "{{ route('get.notifj') }}",
                            type: "GET"
                        }).then(function(data) {
                            $('#countn').html(data);

                        });
                    }
                    timeOutId = setTimeout(ajaxdata1, 2000);
                });
            }
            ajaxdata1();
            timeOutId = setTimeout(ajaxdata1, 2000);

        </script>

    @endif

    <!-- Template Main JS File -->
    <script src="Bocor/assets/js/main.js"></script>

</body>

</html>
