<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="UTF-8">
    <title>Admin</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="/tmpl_admin/img/logo1.ico" />
    <!--global styles-->
    <link type="text/css" rel="stylesheet" href="/tmpl_admin/css/components.css" />
    <link type="text/css" rel="stylesheet" href="/tmpl_admin/css/custom.css" />
    <link type="text/css" rel="stylesheet" href="/tmpl_admin/vendors/datepicker/css/bootstrap-datepicker.min.css" />
    <link type="text/css" rel="stylesheet" href="/tmpl_admin/vendors/j_timepicker/css/jquery.timepicker.css" />
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- end of global styles-->

    @yield('css')
</head>

<body class="body">
    <div class="preloader" style=" position: fixed;
  width: 100%;
  height: 100%;
  top: 0;
  left: 0;
  z-index: 100000;
  backface-visibility: hidden;
  background: #ffffff;">
        <div class="preloader_img" style="width: 200px;
  height: 200px;
  position: absolute;
  left: 48%;
  top: 48%;
  background-position: center;
z-index: 999999">
            <img src="/tmpl_admin/img/loader.gif" style=" width: 50px;" alt="loading...">
        </div>
    </div>
    <div id="wrap">
        <div id="top">
            <!-- .navbar -->
            <nav class="navbar navbar-static-top">
                <div class="container-fluid m-0">
                    <a class="navbar-brand float-left" href="/">
                        <h4><img src="" class="admin_img" alt="logo"> Admin</h4>
                    </a>
                    <div class="menu">
                        <span class="toggle-left" id="menu-toggle">
                            <i class="fa fa-bars"></i>
                        </span>
                    </div>
                    <div class="topnav dropdown-menu-right float-right">
                        <div class="btn-group hidden-md-up small_device_search" data-toggle="modal"
                            data-target="#search_modal">
                            <i class="fa fa-search text-primary"></i>
                        </div>
                        <div class="btn-group">
                            <div class="user-settings no-bg">
                                <button type="button" class="btn btn-default no-bg micheal_btn" data-toggle="dropdown">
                                    <img src="/tmpl_admin/img/admin.jpg"
                                        class="admin_img2 img-thumbnail rounded-circle avatar-img" alt="avatar">
                                    <strong></strong>
                                    <span class="fa fa-sort-down white_bg"></span>
                                </button>
                                <div class="dropdown-menu admire_admin">
                                    <a class="dropdown-item" href="{{ route('logout.web') }}"><i
                                            class="fa fa-sign-out"></i>
                                        Log Out</a>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->
            </nav>
            <!-- /.navbar -->
            <!-- /.head -->
        </div>
        <!-- /#top -->
        <div class="wrapper">
            <div id="left">
                <div class="menu_scroll">
                    <div class="left_media">
                        <div class="media user-media">
                            <div class="user-media-toggleHover">
                                <span class="fa fa-user"></span>
                            </div>
                            <div class="user-wrapper">
                                <a class="user-link" href="#">
                                    <img class="media-object img-thumbnail user-img rounded-circle admin_img3"
                                        alt="User Picture" src="/tmpl_admin/img/admin.jpg">
                                    <p class="user-info menu_hide">Welcome Micheal</p>
                                </a>
                            </div>
                        </div>
                        <hr />
                    </div>
                    <ul id="menu">
                        <li class="@yield('active-ds')">
                            <a href="/">
                                <i class="fa fa-home"></i>
                                <span class="link-title menu_hide">&nbsp;Dashboard</span>
                            </a>
                        </li>
                        <li class="@yield('active-dt')">
                            <a href="javascript:;">
                                <i class="fa fa-database"></i>
                                <span class="link-title menu_hide">&nbsp;Data
                                </span>
                                <span class="fa arrow menu_hide"></span>
                            </a>
                            <ul>
                                <li>
                                    <a href="{{ route('pasien.index') }}">
                                        <i class="fa fa-id-card"></i>
                                        <span class="link-title menu_hide">&nbsp;Data Pasien
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('booking.index') }}">
                                        <i class="fa fa-book"></i>
                                        <span class="link-title menu_hide">&nbsp;Data Booking
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('swab.index') }}">
                                        <i class="fa fa-exchange"></i>
                                        <span class="link-title menu_hide">&nbsp;Data Hasil Swab
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('antrian.index') }}">
                                        <i class="fa fa-exchange"></i>
                                        <span class="link-title menu_hide">&nbsp;Antrian
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                    <!-- /#menu -->
                </div>
            </div>
            <!-- /#left -->
            <div id="content" class="bg-container">
                <header class="head">
                    <div class="main-bar">
                        <div class="row no-gutters">
                            <div class="col-6">
                                <h4 class="m-t-5">
                                    <i class="fa @yield('logo-judul')"></i>
                                    @yield('judul')
                                </h4>
                            </div>
                        </div>
                    </div>
                </header>
                <div class="outer">
                    @yield('content')
                </div>
            </div>
            <!-- /.inner -->

            <!-- /.outer -->
            <!-- /#content -->
            <!-- Modal -->
            <div class="modal fade" id="search_modal" tabindex="-1" role="dialog" aria-hidden="true">
                <form>
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span class="float-right" aria-hidden="true">&times;</span>
                            </button>
                            <div class="input-group search_bar_small">
                                <input type="text" class="form-control" placeholder="Search..." name="search">
                                <span class="input-group-btn">
                                    <button class="btn btn-secondary" type="submit"><i
                                            class="fa fa-search"></i></button>
                                </span>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!--wrapper-->

    </div>
    <!-- /#wrap -->
    <!-- global scripts-->
    <script type="text/javascript" src="/tmpl_admin/js/components.js"></script>
    <script type="text/javascript" src="/tmpl_admin/js/custom.js"></script>
    <script type="text/javascript" src="/tmpl_admin/js/jquery.number.min.js"></script>

    <script type="text/javascript" src="/tmpl_admin/vendors/datepicker/js/bootstrap-datepicker.min.js">
    </script>
    <script type="text/javascript" src="/tmpl_admin/vendors/datetimepicker/js/DateTimePicker.min.js">
    </script>
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        })

        $('.datepicker').datepicker({
            format: 'dd-mm-yyyy',
            todayHighlight: true,
            autoclose: true,
            orientation: "top"
        });

    </script>
    <!--end of global scripts-->
    @yield('js')
</body>

</html>
