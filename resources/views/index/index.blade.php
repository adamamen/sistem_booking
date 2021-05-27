@extends('master')



@section('css')

<link type="text/css" rel="stylesheet" href="admin/vendors/chartist/css/chartist.min.css" />

<link type="text/css" rel="stylesheet" href="admin/vendors/circliful/css/jquery.circliful.css">

<link type="text/css" rel="stylesheet" href="admin/css/pages/index.css">



<link type="text/css" rel="stylesheet" href="admin/vendors/sweetalert/css/sweetalert2.min.css"/>

<link type="text/css" rel="stylesheet" href="admin/css/pages/sweet_alert.css"/>

<style type="text/css">

    #jumlah{

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



    <div class="row m-t-35">

        <div class="col-lg-12">

            <div class="card">

                <div class="card-header bg-white">

                    <span class="card-title">Form Pencarian Data</span>

                    <div class="dropdown chart_drop float-right">

                        

                        <i class="fa fa-arrows-alt"></i>

                    </div>

                    </div>

                <div class="card-block">

                    <div class="col-lg-12 input_field_sections">

                        <h5>Input Nopol</h5> <br>

                        <form method="post" action="/cari">

                            <div class="input-group">

                                {{csrf_field()}}

                                <input type="text" name="nopol" class="form-control">

                                <span class="input-group-btn">

                            		<button class="btn btn-primary" type="submit">

                                		<span class="glyphicon glyphicon-search" aria-hidden="true"> </span> Cari

                                	</button>

                            	</span>

                            </div>

                        </form>

                    </div>

                    

                </div>

                @if($dataada != null)

                <div class="card-block" style="text-align: center;">

                	<div class="col-lg-12 input_field_sections">

                		<div class="alert alert-success">

	                        <a href="/" type="button" class="close" aria-hidden="true">×

	                        </a>

	                        <h4 class="text-white" style="font-size: 30px;">Data Ditemukan!</h4>

	                        <p>

                                @foreach($dataada as $data)

    	                            <a class="alert-link" style="font-size: 25px;">No</a><br>

    	                            {{$data->no}} <br> <br>

    	                            <a class="alert-link" style="font-size: 25px;">Nama</a><br>

    	                            {{$data->nama}} <br> <br>

    	                            <a class="alert-link" style="font-size: 25px;">Golongan</a><br>

    	                            {{$data->nama_golongan}} <br> <br>

    	                            <a class="alert-link" style="font-size: 25px;">Nopol</a><br>

    	                            {{$data->no_pol}} <br> <br>

    	                            <a class="alert-link" style="font-size: 25px;">Rute</a><br>

    	                            {{$data->nama_rute}} <br> <br>

    	                            <a class="alert-link" style="font-size: 25px;">Tanggal</a><br>

                                    <?php 

                                        $date = date_create($data->tanggal);

                                        echo date_format($date, "d/m/Y"); ?>
                                         - {{$data->jam}}

                                    <br> <br>

    	                            <a class="alert-link" style="font-size: 25px;"> Harga</a><br>

    	                            Rp. <?php echo number_format($data->harga)?> <br>

                                @endforeach

	                        </p>

	                       

	                    </div>

                	</div>

                </div>

                @endif

            </div>

        </div>



    </div>



</div>

@endsection



@section ('js')



<!--  plugin scripts -->

<script type="text/javascript" src="admin/vendors/countUp.js/js/countUp.min.js"></script>

<script type="text/javascript" src="admin/vendors/flip/js/jquery.flip.min.js"></script>

<script type="text/javascript" src="admin/js/pluginjs/jquery.sparkline.js"></script>

<script type="text/javascript" src="admin/vendors/chartist/js/chartist.min.js"></script>

<script type="text/javascript" src="admin/js/pluginjs/chartist-tooltip.js"></script>

<script type="text/javascript" src="admin/vendors/swiper/js/swiper.min.js"></script>

<script type="text/javascript" src="admin/vendors/circliful/js/jquery.circliful.min.js"></script>

<script type="text/javascript" src="admin/vendors/flotchart/js/jquery.flot.js" ></script>

<script type="text/javascript" src="admin/vendors/flotchart/js/jquery.flot.resize.js"></script>

<!--end of plugin scripts-->

<script type="text/javascript">

$(document).ready(function() {

<?php if ($alertkosong != null) { ?>

swal(

    'Gagal!',

    'Nopol Tidak Boleh Kosong!',

    'error'

)

<?php } ?>



<?php if ($alertnf != null) { ?>

swal(

    'Gagal!',

    'Nopol Tidak Ditemukan!',

    'error'

)

<?php } ?>



<?php if ($dataada != null) { ?>

swal(

    'Berhasil!',

    'Nopol Ditemukan!',

    'success'

)

<?php } ?>



var options = {

        useEasing: true,

        useGrouping: true,

        decimal: '.',

        prefix: '',

        suffix: ''

    };

    new CountUp("jumlah", 0, <?php echo $jumlahdata ?>, 0, 5.0, options).start();

});



</script>

@if(session('alertsukses'))

<script type="text/javascript">

    $(document).ready(function () {

        swal({
            title: 'Sukses!',
            text: 'Berhasil Login!',
            type: 'success'

        }          
        ).then(function(){
            location.reload();
        });

    });

</script>

@endif



<script type="text/javascript" src="admin/vendors/wow/js/wow.min.js"></script>

<script type="text/javascript" src="admin/vendors/sweetalert/js/sweetalert2.min.js"></script>









@endsection