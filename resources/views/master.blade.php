<!doctype html>

<html class="no-js" lang="en">



<head>


    <meta charset="UTF-8">

    <title>Duanjaya | Admin</title>

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="shortcut icon" href="admin/img/logo1.ico"/>



    <!--global styles-->

    <link type="text/css" rel="stylesheet" href="admin/css/components.css" />

    <link type="text/css" rel="stylesheet" href="admin/css/custom.css" />

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

        <img src="admin/img/loader.gif" style=" width: 50px;" alt="loading...">

    </div>

</div>

<div id="wrap">

    <div id="top">

        <!-- .navbar -->

        <nav class="navbar navbar-static-top">

            <div class="container-fluid m-0">

                <a class="navbar-brand float-left" href="/">

                    <h4><img src="admin/img/logo1.ico" class="admin_img" alt="logo"> DUANJAYA</h4>

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

                                <img src="admin/img/admin.jpg" class="admin_img2 img-thumbnail rounded-circle avatar-img"

                                     alt="avatar"> <strong>{{auth()->user()->name}}</strong>

                                <span class="fa fa-sort-down white_bg"></span>

                            </button>

                            <div class="dropdown-menu admire_admin">

                                <a class="dropdown-item" href="/logout"><i class="fa fa-sign-out"></i>

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

                                <img class="media-object img-thumbnail user-img rounded-circle admin_img3" alt="User Picture"

                                     src="admin/img/admin.jpg">

                                <p class="user-info menu_hide">Welcome Micheal</p>

                            </a>

                        </div>

                    </div>

                    <hr/>

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

                                <a href="/data">

                                    <i class="fa fa-id-card"></i>

                                    <span class="link-title menu_hide">&nbsp;Data Penyebrangan Kendaraan

                                </a>

                            </li>



                            <li>

                                <a href="/golongan">

                                    <i class="fa fa-bars"></i>

                                    <span class="link-title menu_hide">&nbsp;Data Golongan

                                </a>

                            </li>



                            <li>

                                <a href="/rute">

                                    <i class="fa fa-exchange"></i>

                                    <span class="link-title menu_hide">&nbsp;Data Rute

                                </a>

                            </li>
                             @if(auth()->user()->level == '1')
                            <li>

                                <a href="/beban">

                                    <i class="fa fa-tasks"></i>

                                    <span class="link-title menu_hide">&nbsp;Data Beban dan Jual

                                </a>

                            </li>
                            @endif

                        </ul>

                    </li>

                    @if(auth()->user()->level == '1')

                    <li class="@yield('active-lp')">

                        <a href="/laporan">

                            <i class="fa fa-book"></i>

                            <span class="link-title menu_hide">&nbsp;Laporan</span>

                        </a>

                    </li>

                    <li class="@yield('active-us')">

                        <a href="/user">

                            <i class="fa fa-user"></i>

                            <span class="link-title menu_hide">&nbsp;Users



                            </span>

                        </a>

                    </li>
                    @endif
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

        <div class="modal fade" id="search_modal" tabindex="-1" role="dialog"  aria-hidden="true">

            <form>

                <div class="modal-dialog" role="document">

                    <div class="modal-content">

                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">

                            <span class="float-right" aria-hidden="true">&times;</span>

                        </button>

                        <div class="input-group search_bar_small">

                            <input type="text" class="form-control" placeholder="Search..." name="search">

                            <span class="input-group-btn">

                                <button class="btn btn-secondary" type="submit"><i class="fa fa-search"></i></button>

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

<script type="text/javascript" src="admin/js/components.js"></script>

<script type="text/javascript" src="admin/js/custom.js"></script>



<script type="text/javascript" src="admin/js/jquery.number.min.js"></script>

<!--end of global scripts-->

@yield('js')

</body>



</html>

