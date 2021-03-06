@extends('master')
@section('css')
    <!--plugin styles-->
    {{-- <link type="text/css" rel="stylesheet" href="admin/vendors/select2/css/select2.min.css" />
<link type="text/css" rel="stylesheet" href="admin/vendors/datatables/css/scroller.bootstrap.min.css" />
<link type="text/css" rel="stylesheet" href="admin/vendors/datatables/css/colReorder.bootstrap.min.css" />
<link type="text/css" rel="stylesheet" href="admin/vendors/datatables/css/dataTables.bootstrap.min.css" /> --}}
    <link type="text/css" rel="stylesheet" href="{{ asset('/tmpl_admin/css/pages/dataTables.bootstrap.css') }}" />
    <link type="text/css" rel="stylesheet"
        href="{{ asset('/tmpl_admin/css/plugincss/responsive.dataTables.min.css') }}" />
    <link type="text/css" rel="stylesheet" href="{{ asset('/tmpl_admin/vendors/wow/css/animate.css') }}" />
    {{-- <link type="text/css" rel="stylesheet" href="/tmpl_admin/vendors/bootstrap-tagsinput/css/bootstrap-tagsinput.css" /> --}}
    <link type="text/css" rel="stylesheet" href="{{ asset('/tmpl_admin/vendors/sweetalert/css/sweetalert2.min.css') }}" />
    <link type="text/css" rel="stylesheet" href="{{ asset('/tmpl_admin/css/pages/sweet_alert.css') }}" />
    <!-- end of plugin styles -->
    <!--Page level styles-->
    <link type="text/css" rel="stylesheet" href="{{ asset('/tmpl_admin/css/pages/tables.css') }}" />
    {{-- <link type="text/css" rel="stylesheet" href="/tmpl_admin/css/pages/portlet.css" />
<link type="text/css" rel="stylesheet" href="/tmpl_admin/css/pages/advanced_components.css" /> --}}
    <link type="text/css" rel="stylesheet"
        href="{{ asset('/tmpl_admin/vendors/daterangepicker/css/daterangepicker.css') }}" />
    <link type="text/css" rel="stylesheet"
        href="{{ asset('/tmpl_admin/vendors/datepicker/css/bootstrap-datepicker.min.css') }}" />
    {{-- <link type="text/css" rel="stylesheet" href="/tmpl_admin/vendors/bootstrap-timepicker/css/bootstrap-timepicker.min.css" />
<link type="text/css" rel="stylesheet" href="admin/vendors/datetimepicker/css/DateTimePicker.min.css" />
<link type="text/css" rel="stylesheet" href="admin/vendors/j_timepicker/css/jquery.timepicker.css" /> --}}
    <!--End of page level styles-->
@endsection
@section('active-dt')
    active
@endsection
@section('judul')
    Antrian
@endsection
@section('logo-judul')
    fa-bars
@endsection
@section('content')
    <div class="inner bg-light lter bg-container">
        <div class="row justify-content-center">
            @if (empty($datasisa))
                <div class="card card-inverse card-warning m-t-35">
                    <div class="card-header bg-white">Antrian</div>
                    <div class="card-block" style="text-align: center">
                        <p style="font-size: 40px"> Tidak ada antrian hari ini </p>
                    </div>
                </div>
            @else

                @if ($datasisa[0]['open'] == '0')
                    <div class="card card-inverse card-warning m-t-35">
                        <div class="card-header bg-white">Antrian</div>
                        <div class="card-block" style="text-align: center">
                            <form action="{{ route('antrian.open') }}" method="POST">
                                @csrf
                                <input name="tanggal" value="{{ date('d-m-Y') }}">
                                <button type="submit" class="btn btn-success">Buka</button>
                            </form>
                        </div>
                    </div>
                @else

                    <div class="col-6 align-self-center">
                        <!-- BEGIN EXAMPLE1 TABLE PORTLET-->
                        <div class="card card-inverse card-warning m-t-35">
                            <div class="card-header bg-white">Antrian</div>
                            <div class="card-block" style="text-align: center">
                                <p class="card-text" style="font-size: 100px">
                                    {{ $datasisa[0]['no_antrian'] }}/{{ count($dataall) }}
                                </p>
                                <div class="row">
                                    <div class="col">
                                        <p class="card-text" style="font-size: 10px">No Antrian:
                                        <p class="card-text" style="font-size: 20px"> {{ $datasisa[0]['no_antrian'] }}
                                        </p>
                                        </p>
                                    </div>
                                    <div class="col">
                                        <p class="card-text" style="font-size: 10px">Nama:
                                        <p class="card-text" style="font-size: 20px"> {{ $datasisa[0]['nama'] }}</p>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div style="text-align: center">
                            <form method="POST" action="{{ route('antrian.post') }}">
                                @csrf
                                <input name="id_pasien" hidden value="{{ $datasisa[0]['id_pasien'] }}">
                                <input name="id" hidden value="{{ $datasisa[0]['id'] }}">
                                <input name="antrian" hidden value="{{ $datasisa[0]['no_antrian'] }}">
                                <button type="submit" class="btn btn-success">Lanjut ></button>
                            </form>

                        </div>
                    </div>
                @endif
            @endif
        </div>
    </div>
@endsection
@section('js')
    <!--  plugin scripts -->
    <!-- end of plugin scripts -->
    <!--Page level scripts-->
    <script type="text/javascript">
        $(document).on("click", "#edit-data", function() {

            var id = $(this).data('id');
            var id_pasien = $(this).data('id_pasien');
            var antrian = $(this).data('antrian');
            $.ajax({
                type: 'POST',
                data: {
                    id: id,
                    id_pasien: id_pasien,
                    antrian: antrian
                },
                url: "{{ route('get.edit.booking') }}"
            }).then(function(data) {
                if (data) {
                    $('.body-edit').html(data);
                    $("#m-edit-data").modal('show');
                }
            });
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

        // $(document).on("click", "#edit-data", function() {
        //     $("#m-edit-data").modal('show');
        //     var id = $(this).data('id');
        //     var nama = $(this).data('nama');
        //     var harga = $(this).data('harga');
        //     $(".modal-body .id").val(id);
        //     $(".modal-body #e-nama").val(nama);
        //     $(".modal-body #e-harga").val(harga);
        // });

        function deleteConfirmation(id) {
            swal({
                title: "Yakin ingin menghapus data ini?",
                text: "jika terhapus tidak dapat dikembalikan.",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "red",
                confirmButtonText: "Ya",
                cancelButtonText: "Tidak",
            }).then(function(e) {
                if (e === true) {
                    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
                    $.ajax({
                        type: 'DELETE',
                        // method: 'DELETE',
                        url: "/booking/" + id,
                        success: function(data) {
                            if (data.alertdelete === true) {
                                swal({
                                    title: 'Sukses!',
                                    text: 'Data Berhasil dihapus',
                                    type: 'success'
                                }).then(function() {
                                    location.reload();
                                });
                            } else {
                                location.reload();
                            }
                        }
                    })
                } else {
                    location.reload();
                }
            });
        };

    </script>
    <script type="text/javascript" src="{{ asset('tmpl_admin/js/pages/sweet_alerts.js') }}"></script>
    <script type="text/javascript" src="{{ asset('tmpl_admin/js/pages/datatable.js') }}"></script>
    <script type="text/javascript" src="{{ asset('tmpl_admin/js/pages/modals.js') }}"></script>

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

    <!-- end of global scripts-->
@endsection
