@extends('master')
@section('css')
    <!--plugin styles-->
    <link type="text/css" rel="stylesheet" href="/tmpl_admin/vendors/select2/css/select2.min.css" />
    <link type="text/css" rel="stylesheet" href="/tmpl_admin/vendors/datatables/css/scroller.bootstrap.min.css" />
    <link type="text/css" rel="stylesheet" href="/tmpl_admin/vendors/datatables/css/colReorder.bootstrap.min.css" />
    <link type="text/css" rel="stylesheet" href="/tmpl_admin/vendors/datatables/css/dataTables.bootstrap.min.css" />
    <link type="text/css" rel="stylesheet" href="/tmpl_admin/css/pages/dataTables.bootstrap.css" />
    <link type="text/css" rel="stylesheet" href="/tmpl_admin/css/plugincss/responsive.dataTables.min.css" />
    {{-- <link type="text/css" rel="stylesheet" href="/tmpl_admin/vendors/wow/css/animate.css" />
    <link type="text/css" rel="stylesheet" href="/tmpl_admin/vendors/bootstrap-tagsinput/css/bootstrap-tagsinput.css" /> --}}
    <link type="text/css" rel="stylesheet" href="/tmpl_admin/vendors/sweetalert/css/sweetalert2.min.css" />
    <link type="text/css" rel="stylesheet" href="/tmpl_admin/css/pages/sweet_alert.css" />
    <!-- end of plugin styles -->
    <!--Page level styles-->
    <link type="text/css" rel="stylesheet" href="/tmpl_admin/css/pages/tables.css" />
    {{-- <link type="text/css" rel="stylesheet" href="admin/css/pages/portlet.css" />
    <link type="text/css" rel="stylesheet" href="admin/css/pages/advanced_components.css" />
    <link type="text/css" rel="stylesheet" href="admin/vendors/daterangepicker/css/daterangepicker.css" />
    <link type="text/css" rel="stylesheet" href="admin/vendors/datepicker/css/bootstrap-datepicker.min.css" />
    <link type="text/css" rel="stylesheet" href="admin/vendors/bootstrap-timepicker/css/bootstrap-timepicker.min.css" />
    <link type="text/css" rel="stylesheet" href="admin/vendors/datetimepicker/css/DateTimePicker.min.css" />
    <link type="text/css" rel="stylesheet" href="admin/vendors/j_timepicker/css/jquery.timepicker.css" /> --}}
    <!--End of page level styles-->
@endsection
@section('active-dt')
    active
@endsection
@section('judul')
    Data Pasien
@endsection
@section('logo-judul')
    fa-bars
@endsection
@section('content')
    <div class="inner bg-light lter bg-container">
        <div class="row">
            <div class="col-12 data_tables">
                <!-- BEGIN EXAMPLE1 TABLE PORTLET-->
                <div class="card">
                    @if ($mssg = Session::get('mssg'))
                        <div class="alert alert-success alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×
                            </button>
                            {{ $mssg }}
                        </div>
                    @endif
                    <div class="card-header bg-white">
                        <i class="fa fa-database"></i>Data Pasien
                    </div>
                    <div class="card-block p-t-25">
                        <div class="col-sm-12 col-md-12 col-xs-12">
                            <button type="button" class="btn btn-labeled btn-info" data-toggle="modal"
                                data-target="#add-data">
                                <span class="btn-label">
                                    <i class="fa fa-plus"></i>
                                </span>
                                Tambah Data Pasien
                            </button>
                            <div class="m-t-25">
                                <div class="pull-sm-right">
                                    <div class="tools pull-sm-right"></div>
                                </div>
                            </div>

                            <table class="table table-striped table-bordered table-hover" id="sample_1">
                                <thead>
                                    <tr>
                                        <th>Kode Pembayaran</th>
                                        <th>Nama</th>
                                        <th>Jenis Kelamin</th>
                                        <th>Umur</th>
                                        <th>Alamat</th>
                                        <th>Tanggal</th>
                                        <th>Jenis Tes</th>
                                        <th>Jumlah Bayar</th>
                                        <th>Bukti Bayar</th>
                                        <th>Status</th>
                                        <th>Aksi</th>
                                        <th>#</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $datas)
                                        <tr>
                                            <td>{{ $datas->codepembayaran }}</td>
                                            <td>{{ $datas->nama }}</td>
                                            <td>{{ $datas->jenis_kelamin }}</td>
                                            <td>{{ $datas->umur }}</td>
                                            <td>{{ $datas->alamat }}</td>
                                            <td>{{ $datas->tanggal }}</td>
                                            <td>{{ $datas->jenis }}</td>
                                            <td>Rp. {{ number_format($datas->harga) }}</td>
                                            <td>
                                                @if ($datas->files) <a
                                                        href="/uploads/{{ $datas->files }}" style="color: blue"
                                                    target="_blank">View</a> @else
                                                    Belum diupload @endif
                                            </td>
                                            <td>
                                                <select class="form-control" name="status" id="st{{ $datas->id }}">
                                                    <option @if ($datas->flag == '1') selected @endif value="1"> Sudah Bayar
                                                    </option>
                                                    <option @if ($datas->flag == '0') selected @endif value="0"> Belum Bayar
                                                    </option>
                                                    <option @if ($datas->flag == '2') selected @endif value="2"> Tidak Valid
                                                    </option>
                                                </select>
                                            </td>
                                            <td><button class="btn btn-primary bt-update"
                                                    data-idpas="{{ $datas->id_pasien }}" data-id="{{ $datas->id }}"
                                                    data-tgl="{{ $datas->tanggal }}">update</button></td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>

                        </div>
                        <!-- END EXAMPLE1 TABLE PORTLET-->
                        <!-- BEGIN EXAMPLE4 TABLE PORTLET-->
                        <div class="card m-t-35" style="display: none;">
                            <div class="card-block p-t-10">
                                <div class=" m-t-25">
                                    <table class="table table-striped table-bordered table-hover " id="sample_6">
                                        <thead>
                                            <tr>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <!-- END EXAMPLE4 TABLE PORTLET-->
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <!--  plugin scripts -->
    <script type="text/javascript" src="tmpl_admin/vendors/select2/js/select2.js"></script>
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
    <script type="text/javascript" src="tmpl_admin/vendors/datatables/js/dataTables.scroller.min.js"></script>
    <script type="text/javascript" src="tmpl_admin/vendors/bootstrapvalidator/js/bootstrapValidator.min.js">
    </script>
    <script type="text/javascript" src="tmpl_admin/vendors/wow/js/wow.min.js"></script>
    <script type="text/javascript" src="tmpl_admin/vendors/sweetalert/js/sweetalert2.min.js"></script>
    <script type="text/javascript" src="tmpl_admin/vendors/datepicker/js/bootstrap-datepicker.min.js"></script>
    <script type="text/javascript" src="tmpl_admin/vendors/bootstrap-timepicker/js/bootstrap-timepicker.min.js">
    </script>
    <script type="text/javascript" src="tmpl_admin/vendors/bootstrap-switch/js/bootstrap-switch.min.js"></script>
    <script type="text/javascript" src="tmpl_admin/vendors/autosize/js/jquery.autosize.min.js"></script>
    <script type="text/javascript" src="tmpl_admin/vendors/jasny-bootstrap/js/inputmask.js"></script>
    <script type="text/javascript" src="tmpl_admin/vendors/datetimepicker/js/DateTimePicker.min.js"></script>
    <script type="text/javascript" src="tmpl_admin/vendors/j_timepicker/js/jquery.timepicker.min.js"></script>
    <!-- end of plugin scripts -->
    <!--Page level scripts-->
    <script type="text/javascript">
        $('.bt-update').click(function() {
            var _id = $(this).data('id');
            var _tgl = $(this).data('tgl');
            var _idpas = $(this).data('idpas');
            var _idsel = '#st' + _id;
            var _selval = $(_idsel).find('option').filter(':selected').val();
            $.ajax({
                data: {
                    id: _id,
                    flag: _selval,
                    tgl: _tgl,
                    idpas: _idpas
                },
                url: "{{ route('buktia.post') }}",
                type: 'POST'
            }).then(function(data) {
                if (data.status) {
                    location.href = "{{ route('buktia.notsccs') }}";
                }
            });
            // console.log(_selval);
        });

        $(document).on("click", "#edit-data", function() {

            var id = $(this).data('id');
            $.ajax({
                type: 'POST',
                data: {
                    id: id
                },
                url: "{{ route('get.edit.pasien') }}"
            }).then(function(data) {
                if (data) {
                    $('.body-edit').html(data);
                    $("#m-edit-data").modal('show');
                }
            });
        });

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
                        url: "/pasien/" + id,
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
    <script type="text/javascript" src="/tmpl_admin/js/pages/sweet_alerts.js"></script>
    <script type="text/javascript" src="/tmpl_admin/js/pages/datatable.js"></script>
    <script type="text/javascript" src="/tmpl_admin/js/pages/modals.js"></script>
    <!-- end of global scripts-->
@endsection
