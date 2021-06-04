@extends('master')
@section('css')
    <!--plugin styles-->
    <link type="text/css" rel="stylesheet" href="/tmpl_admin/vendors/select2/css/select2.min.css" />
    <link type="text/css" rel="stylesheet" href="/tmpl_admin/vendors/datatables/css/scroller.bootstrap.min.css" />
    <link type="text/css" rel="stylesheet" href="/tmpl_admin/vendors/datatables/css/colReorder.bootstrap.min.css" />
    <link type="text/css" rel="stylesheet" href="/tmpl_admin/vendors/datatables/css/dataTables.bootstrap.min.css" />
    <link type="text/css" rel="stylesheet" href="/tmpl_admin/css/pages/dataTables.bootstrap.css" />
    <link type="text/css" rel="stylesheet" href="/tmpl_admin/css/plugincss/responsive.dataTables.min.css" />
    <link type="text/css" rel="stylesheet" href="/tmpl_admin/vendors/chosen/css/chosen.css" />
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
    Data Swab
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
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×
                            </button>
                            {{ $message }}
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
                                        <th>Nama</th>
                                        <th>Jenis Kelamin</th>
                                        <th>Umur</th>
                                        <th>Alamat</th>
                                        <th>Tanggal</th>
                                        <th>Hasil</th>
                                        <th>#</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $datas)
                                        <tr>
                                            <td>{{ $datas->nama }}</td>
                                            <td>{{ $datas->email }}</td>
                                            <td></td>
                                            <td>{{ $datas->alamat }}</td>
                                            <td>
                                                <div class="hidden-sm hidden-xs action-buttons" style="text-align: center;">
                                                    <a data-id="{{ $datas->id }}" class="green" id="edit-data">
                                                        <i style="color: green"
                                                            class="ace-icon fa fa-pencil bigger-130"></i>
                                                    </a>
                                                    &emsp;
                                                    <a style="color: red" onclick="deleteConfirmation({{ $datas->id }})">
                                                        <i class="ace-icon fa fa-trash-o bigger-130"></i>
                                                    </a>
                                                </div>
                                            </td>
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

            <div class="modal fade slideExpandUp" id="add-data" role="dialog" aria-labelledby="Modallabel3dsign">
                <div class="modal-dialog" role="document">
                    <div class="modal-content ">
                        <div class="modal-header bg-info ">
                            <h4 class="modal-title text-white" id="Modallabel3dsign">Tambah Data Pasien</h4>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <form action="{{ route('pasien.store') }}" id="" method="post"
                                        class="login_validator">
                                        {{ csrf_field() }}
                                        <div class="form-group">
                                            <label for="email" class="col-form-label"> Nama</label>
                                            <div class="input-group">
                                                <span class="input-group-addon input_email"><i
                                                        class="fa fa-bars text-primary"></i></span>
                                                <select class="form-control col-md-8 col-xs-8 booking" name="booking"
                                                    id="booking" required="">
                                                    <option disabled="" selected=""> -- Pilih Data Booking -- </option>
                                                    @forelse ($dbook as $dbooks)
                                                        <option required="" value="{{ $dbooks->id }}">
                                                            {{ $dbooks->nama }}</option>
                                                    @empty
                                                        <option required="" value=""></option>

                                                    @endforelse
                                                </select>
                                                <a type="button" class="btn btn-labeled btn-info bt-src"
                                                    style="margin-left: 10px" href="#"> <span class="btn-label"> <i
                                                            class="fa fa-sync-alt"></i> </span> Search
                                                </a>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="email" class="col-form-label"> Jenis Kelamin</label>
                                            <div class="input-group">
                                                <span class="input-group-addon input_email"><i
                                                        class="fa fa-money text-primary"></i></span>
                                                <input type="text" name="id" id="id" hidden>
                                                <input type="text" class="form-control  form-control-md" id="jk" readonly>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="email" class="col-form-label"> Umur</label>
                                            <div class="input-group">
                                                <span class="input-group-addon input_email"><i
                                                        class="fa fa-money text-primary"></i></span>
                                                <input type="text" class="form-control  form-control-md" id="umur" readonly>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="email" class="col-form-label"> Alamat</label>
                                            <div class="input-group">
                                                <span class="input-group-addon input_email"><i
                                                        class="fa fa-money text-primary"></i></span>
                                                <input type="text" class="form-control  form-control-md" id="alamat"
                                                    readonly>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="email" class="col-form-label"> Tanggal</label>
                                            <div class="input-group">
                                                <span class="input-group-addon input_email"><i
                                                        class="fa fa-money text-primary"></i></span>
                                                <input type="text" class="form-control  form-control-md" id="tanggal"
                                                    readonly>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="email" class="col-form-label"> Hasil</label>
                                            <div class="input-group">
                                                <span class="input-group-addon input_email"><i
                                                        class="fa fa-money text-primary"></i></span>
                                                <input type="text" name="hasil" class="form-control  form-control-md">
                                            </div>
                                        </div>

                                </div>
                            </div>
                            <div class="modal-footer">
                                <button class="btn btn-info" type="submit">Simpan</button>
                                </form>
                                <button class="btn btn-default" data-dismiss="modal">Tutup</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal fade slideExpandUp" id="m-edit-data" role="dialog" aria-labelledby="Modallabel3dsign">
                <div class="modal-dialog" role="document">
                    <div class="modal-content ">
                        <div class="modal-header bg-info ">
                            <h4 class="modal-title text-white" id="Modallabel3dsign">Edit Data Golongan</h4>
                        </div>

                        <div class="modal-body body-edit">

                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-default" data-dismiss="modal">Tutup</button>
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

        <script type="text/javascript" src="tmpl_admin/vendors/chosen/js/chosen.jquery.js"></script>
        <!-- end of plugin scripts -->
        <!--Page level scripts-->
        <script type="text/javascript">
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
            $(".chzn-select").chosen({
                allow_single_deselect: true
            });

            $('.bt-src').click(function() {
                var id = $('#booking').find('option:selected').val();
                if (id != null) {
                    $.ajax({
                        type: 'POST',
                        url: "{{ route('src.book') }}",
                        data: {
                            id: id
                        }
                    }).then(function(data) {
                        console.log(data);
                        $('#id').val(data.id);
                        $('#jk').val(data.jenis_kelamin);
                        $('#umur').val(data.umur);
                        $('#alamat').val(data.alamat);
                        $('#tanggal').val(data.tanggal);
                    });
                }

            });

        </script>
        <script type="text/javascript" src="tmpl_admin/js/pages/sweet_alerts.js"></script>
        <script type="text/javascript" src="tmpl_admin/js/pages/datatable.js"></script>
        <script type="text/javascript" src="tmpl_admin/js/pages/modals.js"></script>
        <!-- end of global scripts-->
    @endsection
