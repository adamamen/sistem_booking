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

    <style>
        .notifications_badge_top {
            top: -12px !important;
            margin-left: -7px !important;
        }

    </style>
    {{-- <link type="text/css" rel="stylesheet" href="/tmpl_admin/vendors/pnotify/css/pnotify.css" /> --}}
    <link type="text/css" rel="stylesheet" href="/tmpl_admin/vendors/animate/css/animate.min.css" />
    {{-- <link type="text/css" rel="stylesheet" href="/tmpl_admin/vendors/pnotify/css/pnotify.buttons.css" />
    <link type="text/css" rel="stylesheet" href="/tmpl_admin/vendors/pnotify/css/pnotify.history.css" />
    <link type="text/css" rel="stylesheet" href="/tmpl_admin/vendors/pnotify/css/pnotify.mobile.css" /> --}}
    <!--End of Plugin styles-->
    <!--Page level styles-->
    {{-- <link type="text/css" rel="stylesheet" href="/tmpl_admin/css/pages/p_notify.css" /> --}}
    <!-- Template Main CSS File -->
    {{-- <link type="text/css" rel="stylesheet" href="/tmpl_admin/css/components.css" />
    <link type="text/css" rel="stylesheet" href="/tmpl_admin/css/custom.css" /> --}}

    <link href="Bocor/assets/css/style.css" rel="stylesheet">

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
                    {{-- <button class="btn btn-warning notify_flash m-r-20">Flash
                    </button> --}}
                    {{-- <div class="topnav dropdown-menu-right float-right">
                        <div class="btn-group">
                            <div class="notifications messages no-bg">
                                <div class="dropdown-menu drop_box_align" role="menu" id="notifications_dropdown">
                                    <div id="notifications">
                                        <div class="data">
                                            <div class="row">
                                                <div class="col-2">
                                                    <img src="img/mailbox_imgs/1.jpg"
                                                        class="message-img avatar rounded-circle" alt="avatar1">
                                                </div>
                                                <div class="col-10 message-data">
                                                    <i class="fa fa-clock-o"></i>
                                                    <strong>Remo</strong>
                                                    sent you an image
                                                    <br>
                                                    <small class="primary_txt">just now.</small>
                                                    <br>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="data">
                                            <div class="row">
                                                <div class="col-2">
                                                    <img src="img/mailbox_imgs/2.jpg"
                                                        class="message-img avatar rounded-circle" alt="avatar1">
                                                </div>
                                                <div class="col-10 message-data">
                                                    <i class="fa fa-clock-o"></i>
                                                    <strong>clay</strong>
                                                    business propasals
                                                    <br>
                                                    <small class="primary_txt">20min Back.</small>
                                                    <br>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="data">
                                            <div class="row">
                                                <div class="col-2">
                                                    <img src="img/mailbox_imgs/3.jpg"
                                                        class="message-img avatar rounded-circle" alt="avatar1">
                                                </div>
                                                <div class="col-10 message-data">
                                                    <i class="fa fa-clock-o"></i>
                                                    <strong>John</strong>
                                                    meeting at Ritz
                                                    <br>
                                                    <small class="primary_txt">2hrs Back.</small>
                                                    <br>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="data">
                                            <div class="row">
                                                <div class="col-2">
                                                    <img src="img/mailbox_imgs/6.jpg"
                                                        class="message-img avatar rounded-circle" alt="avatar1">
                                                </div>
                                                <div class="col-10 message-data">
                                                    <i class="fa fa-clock-o"></i>
                                                    <strong>Luicy</strong>
                                                    Request Invitation
                                                    <br>
                                                    <small class="primary_txt">Yesterday.</small>
                                                    <br>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="data">
                                            <div class="row">
                                                <div class="col-2">
                                                    <img src="img/mailbox_imgs/1.jpg"
                                                        class="message-img avatar rounded-circle" alt="avatar1">
                                                </div>
                                                <div class="col-10 message-data">
                                                    <i class="fa fa-clock-o"></i>
                                                    <strong>Remo</strong>
                                                    sent you an image
                                                    <br>
                                                    <small class="primary_txt">just now.</small>
                                                    <br>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="data">
                                            <div class="row">
                                                <div class="col-2">
                                                    <img src="img/mailbox_imgs/2.jpg"
                                                        class="message-img avatar rounded-circle" alt="avatar1">
                                                </div>
                                                <div class="col-10 message-data">
                                                    <i class="fa fa-clock-o"></i>
                                                    <strong>clay</strong>
                                                    business propasals
                                                    <br>
                                                    <small class="primary_txt">20min Back.</small>
                                                    <br>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="data">
                                            <div class="row">
                                                <div class="col-2">
                                                    <img src="img/mailbox_imgs/3.jpg"
                                                        class="message-img avatar rounded-circle" alt="avatar1">
                                                </div>
                                                <div class="col-10 message-data">
                                                    <i class="fa fa-clock-o"></i>
                                                    <strong>John</strong>
                                                    meeting at Ritz
                                                    <br>
                                                    <small class="primary_txt">2hrs Back.</small>
                                                    <br>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="data">
                                            <div class="row">
                                                <div class="col-2">
                                                    <img src="img/mailbox_imgs/6.jpg"
                                                        class="message-img avatar rounded-circle" alt="avatar1">
                                                </div>
                                                <div class="col-10 message-data">
                                                    <i class="fa fa-clock-o"></i>
                                                    <strong>Luicy</strong>
                                                    Request Invitation
                                                    <br>
                                                    <small class="primary_txt">Yesterday.</small>
                                                    <br>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="data">
                                            <div class="row">
                                                <div class="col-2">
                                                    <img src="img/mailbox_imgs/1.jpg"
                                                        class="message-img avatar rounded-circle" alt="avatar1">
                                                </div>
                                                <div class="col-10 message-data">
                                                    <i class="fa fa-clock-o"></i>
                                                    <strong>Remo</strong>
                                                    sent you an image
                                                    <br>
                                                    <small class="primary_txt">just now.</small>
                                                    <br>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="popover-footer">
                                        <a href="#" class="text-white">View All</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> --}}
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

        <div class="container">
            <div class="row d-flex align-items-center" style="height: 580px">
                <div class=" col-lg-6 py-5 py-lg-0 order-2 order-lg-1" data-aos="fade-right">
                    <h1>Platform Booking Swab Online</h1>
                    <h2>Cepat | Praktis | Akurat</h2>
                    <a href="{{ route('bookingc.index') }}" class="btn-get-started scrollto">Book Now!</a>
                </div>
                <div style="padding: 100px" class="col-lg-6 order-1 order-lg-2 hero-img" data-aos="fade-left">
                    <img src="Bocor/assets/img/0000028.png" class="img-fluid" alt="">
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
    {{-- <script type="text/javascript" src="/tmpl_admin/vendors/pnotify/js/pnotify.js"></script>
    <script type="text/javascript" src="/tmpl_admin/vendors/pnotify/js/pnotify.animate.js"></script>
    <script type="text/javascript" src="/tmpl_admin/vendors/pnotify/js/pnotify.buttons.js"></script>
    <script type="text/javascript" src="/tmpl_admin/vendors/pnotify/js/pnotify.confirm.js"></script>
    <script type="text/javascript" src="/tmpl_admin/vendors/pnotify/js/pnotify.nonblock.js"></script>
    <script type="text/javascript" src="/tmpl_admin/vendors/pnotify/js/pnotify.mobile.js"></script>
    <script type="text/javascript" src="/tmpl_admin/vendors/pnotify/js/pnotify.desktop.js"></script>
    <script type="text/javascript" src="/tmpl_admin/vendors/pnotify/js/pnotify.history.js"></script>
    <script type="text/javascript" src="/tmpl_admin/vendors/pnotify/js/pnotify.callbacks.js"></script> --}}
    {{-- <script type="text/javascript" src="/tmpl_admin/js/pages/p_notify.js"></script> --}}

    <!-- Template Main JS File -->
    <script src="Bocor/assets/js/main.js"></script>
    {{-- <script type="text/javascript" src="/tmpl_admin/js/custom.js"></script> --}}

    <script>
        $(document).ready(function() {
            $(".notify_flash").on("click", function() {
                new PNotify({
                    title: 'Attention Seeker',
                    text: 'Click the button to see how you can highlight the notice with the Animate module:&lt;br&gt;',
                    type: 'warning',
                    after_init: function(notice) {
                        notice.attention('flash');
                    }
                });
                return false;
            });

            PNotify.prototype.options.styling = "fontawesome";
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

</body>

</html>
