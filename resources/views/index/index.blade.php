@extends('master')
@section('css')
    <link type="text/css" rel="stylesheet" href="{{ asset('/tmpl_admin/vendors/chartist/css/chartist.min.css') }}" />
    <link type="text/css" rel="stylesheet" href="{{ asset('/tmpl_admin/vendors/circliful/css/jquery.circliful.css') }}">
    <link type="text/css" rel="stylesheet" href="{{ asset('/tmpl_admin/css/pages/index.css') }}">
    <link type="text/css" rel="stylesheet" href="{{ asset('/tmpl_admin/vendors/sweetalert/css/sweetalert2.min.css') }}" />
    <link type="text/css" rel="stylesheet" href="{{ asset('/tmpl_admin/css/pages/sweet_alert.css') }}" />
    <style type="text/css">
        #jumlah {
            font-size: 35px;
            line-height: 1;
        }

    </style>
@endsection
@section('active-ds')
    active
@endsection
@section('judul')
    Dashboard
@endsection
@section('logo-judul')
    fa-home
@endsection
@section('content')
    <div class="inner bg-container">
        <!--top section widgets-->
        <div class="row widget_countup">
            <div class="col-12 col-sm-6 col-xl-3">
                <div id="top_widget1">
                    <div class="">
                        <div class="bg-primary p-d-15 b_r_5">
                            <div class="float-right m-t-5">
                                <i class="fa fa-users"></i>
                            </div>
                            <div class="user_font">Jumlah Data</div>
                            <div id="jumlah">0</div>

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <!--  plugin scripts -->
    <script type="text/javascript" src="{{ URL::to('/') }} /tmpl_admin/vendors/countUp.js/js/countUp.min.js"></script>
    <script type="text/javascript" src="{{ URL::to('/') }} /tmpl_admin/vendors/flip/js/jquery.flip.min.js"></script>
    <script type="text/javascript" src="{{ URL::to('/') }} /tmpl_admin/js/pluginjs/jquery.sparkline.js"></script>
    <script type="text/javascript" src="{{ URL::to('/') }} /tmpl_admin/vendors/chartist/js/chartist.min.js"></script>
    <script type="text/javascript" src="{{ URL::to('/') }} /tmpl_admin/js/pluginjs/chartist-tooltip.js"></script>
    <script type="text/javascript" src="{{ URL::to('/') }} /tmpl_admin/vendors/swiper/js/swiper.min.js"></script>
    <script type="text/javascript" src="{{ URL::to('/') }} /tmpl_admin/vendors/circliful/js/jquery.circliful.min.js">
    </script>
    <script type="text/javascript" src="{{ URL::to('/') }} /tmpl_admin/vendors/flotchart/js/jquery.flot.js"></script>
    <script type="text/javascript" src="{{ URL::to('/') }} /tmpl_admin/vendors/flotchart/js/jquery.flot.resize.js">
    </script>
    <!--end of plugin scripts-->

    <script type="text/javascript" src="{{ URL::to('/') }} /tmpl_admin/vendors/wow/js/wow.min.js"></script>
    <script type="text/javascript" src="{{ URL::to('/') }} /tmpl_admin/vendors/sweetalert/js/sweetalert2.min.js">
    </script>
@endsection
