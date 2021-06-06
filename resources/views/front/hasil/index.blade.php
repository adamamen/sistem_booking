<link type="text/css" rel="stylesheet" href="/tmpl_admin/vendors/select2/css/select2.min.css" />
<link type="text/css" rel="stylesheet" href="/tmpl_admin/vendors/datatables/css/scroller.bootstrap.min.css" />
<link type="text/css" rel="stylesheet" href="/tmpl_admin/vendors/datatables/css/colReorder.bootstrap.min.css" />
<link type="text/css" rel="stylesheet" href="/tmpl_admin/vendors/datatables/css/dataTables.bootstrap.min.css" />
<link type="text/css" rel="stylesheet" href="/tmpl_admin/css/pages/dataTables.bootstrap.css" />
<link type="text/css" rel="stylesheet" href="/tmpl_admin/css/plugincss/responsive.dataTables.min.css" />
<link type="text/css" rel="stylesheet" href="/tmpl_admin/vendors/chosen/css/chosen.css" />

<link type="text/css" rel="stylesheet" href="/tmpl_admin/vendors/chosen/css/chosen.css" />
<link type="text/css" rel="stylesheet" href="/tmpl_admin/css/pages/tables.css" />
<link type="text/css" rel="stylesheet" href="/tmpl_admin/css/components.css" />



<div class="row">
    <div class="col-12 data_tables">
        <div style="text-align: center">
            <p style="font-weight: bold; font-size: 45px">DATA HASIL SWAB</p>
        </div>
        <!-- BEGIN EXAMPLE1 TABLE PORTLET-->
        <div class="card">
            <div class="card-block p-t-25">
                <div class="col-sm-12 col-md-12 col-xs-12">

                    <div class="m-t-25">
                        <div class="pull-sm-right">
                            <div class="tools pull-sm-right"></div>
                        </div>
                    </div>

                    <table class="table table-striped table-bordered table-hover" id="tb-hasil">
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
                                    <td>
                                        <div class="hidden-sm hidden-xs action-buttons" style="text-align: center;">
                                            <a data-id="{{ $datas->id_swab }}" class="green" id="edit-data">
                                                <i style="color: green" class="ace-icon fa fa-pencil bigger-130"></i>
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

                <!-- END EXAMPLE4 TABLE PORTLET-->
            </div>
        </div>
    </div>
</div>

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
        dom: "flrt<'table-responsive't><'row'<'col-md-5 col-12'i><'col-md-7 col-12'p>>",
        iDisplayLength: 25,
        // order: [[ 0, "desc" ]],
    });

</script>
