<!--start page wrapper -->
<div class="page-wrapper">
    <div class="page-content">
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">MANAGER</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Report Cutting</li>
                    </ol>
                </nav>
            </div>
        </div>
        <h6 class="mb-0 text-uppercase">Cutting By Date Range</h6>
        <hr />
        <div class="row">
            <div class="col-12 ">
                <div class="card rounded-4 w-100">
                    <div class="card-body">

                        <div class="mx-3 my-3">

                            <div class="row mb-4">

                                <div class="col-md-1">
                                    <label class="col-form-label">Date Range</label>
                                </div>
                                <div class="col-md-3">
                                    <input name="datefrom" class="form-control" id="datefrom" type="date" value="<?php echo date("Y-m-d"); ?>">
                                </div>
                                <div class="col-md-1 text-center">
                                    <label class="col-form-label">to</label>
                                </div>
                                <div class="col-md-3">
                                    <input name="dateto" class="form-control" id="dateto" type="date" value="<?php echo date("Y-m-d"); ?>">
                                </div>
                                <div class="col-md-4">
                                    <input type="button" name="filter" id="filter" value="Filter" class="btn btn-success">
                                </div>
                            </div>
                            <table id="tableOrc" class="table table-bordered table-striped table-sm nowrap" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Tanggal</th>
                                        <th>ORC</th>
                                        <th>Style</th>
                                        <th>Color</th>
                                        <th>Qty_Cut</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th colspan="7" class="text-center">Total</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div><!--end row-->
    <div class="modal fade" id="modal-detail-in" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title text-center" id="detailOrc" style="font-weight: bold;">Detail Cutting </h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mx-2">
                        <table id="tableIn" class="table table-hover table-bordered table-sm table-striped nowrap">
                            <thead>
                                <tr>
                                    <th>Date</th>
                                    <th>ORC</th>
                                    <th>Style</th>
                                    <th>Color</th>
                                    <th>Size</th>
                                    <th>No Bundle</th>
                                    <th>To Line</th>
                                    <th>Qty</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th colspan="8" style="text-align:right">Total:</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
</div>
<!--end page wrapper -->

<script>
    var table;

    $(document).ready(function() {
        $(".preloader").fadeOut();


        datePacking();

        var table, date, datepicker;

        $('#filter').on('click', function() {
            datePacking();
        });

        function datePacking() {

            datefrom = $('#datefrom').val();
            dateto = $('#dateto').val();

            datepicker = {
                'datefrom': datefrom,
                'dateto': dateto
            };

            table = $('#tableOrc').DataTable({
                autoWidth: false,
                processing: true,
                destroy: true,
                info: true,
                searching: true,
                // stateSave: true,
                paging: true,
                fixedHeader: true,

                dom: '<"dt-top"<"left-col"Bl><"right-col"f>>rt<"dt-bottom"<"left-col"i><"right-col"p>>',
                buttons: [{
                    extend: 'excel',
                    title: 'Data Line Sewing '
                }],
                "footerCallback": function(row, data, start, end, display) {
                    var api = this.api(),
                        data;

                    // Remove the formatting to get integer data for summation
                    var intVal = function(i) {
                        return typeof i === 'string' ?
                            i.replace(/[\$,]/g, '') * 1 :
                            typeof i === 'number' ?
                            i : 0;
                    };

                    // Total over all pages
                    total = api
                        .column(5)
                        .data()
                        .reduce(function(a, b) {
                            return intVal(a) + intVal(b);
                        }, 0);

                    // Total over this page
                    pageTotal = api
                        .column(5, {
                            page: 'current'
                        })
                        .data()
                        .reduce(function(a, b) {
                            return intVal(a) + intVal(b);
                        }, 0);

                    // Update footer
                    $(api.column(5).footer()).html(
                        +pageTotal + '( ' + total + ' Total)'
                    );
                },
                ajax: {
                    url: '<?= site_url('manager/daily_cutting'); ?>',
                    type: 'POST',
                    data: {
                        'datefrom': datefrom,
                        'dateto': dateto
                    },
                },
                language: {
                    processing: '<i class="fa fa-spinner fa-spin fa-3x fa-fw"></i><br><div><p>Silahkan Menunggu...</p></div> ',
                    emptyTable: 'Tidak ada data',
                    lengthMenu: '_MENU_',
                },
                columns: [{
                        "data": null,
                        "className": "text-center px-2 align-middle",
                        "orderable": true,
                        "searchable": true,
                        "render": function(data, type, row, meta) {
                            return meta.row + meta.settings._iDisplayStart + 1;
                        }
                    },
                    {
                        'data': 'tgl',
                        'className': 'text-center px-2'
                    },
                    {
                        'data': 'orc',
                        'className': 'text-center px-2'
                    },
                    {
                        'data': 'style',
                        'className': 'text-center px-2'
                    },
                    {
                        'data': 'color',
                        'className': 'text-center px-2'
                    },
                    {
                        'data': 'qty_cutting',
                        'className': 'text-center px-2'
                    },
                    {
                        'className': 'text-center align-middle',
                        render: function(data, type, row) {
                            return "<button type='button' class='btn btn-warning btn-sm btnDetailIn'>Detail</button>"
                        }
                    }

                ],
                lengthMenu: [
                    [20, 50, 100, -1],
                    [20, 50, 100, 'All'],
                ],

            });


            $('#tableOrc').on('click', '.btnDetailIn', function() {
                var orc = table.row($(this).parents('tr')).data().orc;
                var tgl = table.row($(this).parents('tr')).data().tgl;

                let dt = $('#tableIn').DataTable({
                    autoWidth: false,
                    processing: true,
                    destroy: true,
                    info: true,
                    searching: true,
                    stateSave: true,
                    paging: true,
                    fixedHeader: true,
                    dom: 'Blfrtip',
                    buttons: [{
                        extend: 'excel',
                        title: 'Data Output Finish Good '
                    }],
                    "footerCallback": function(row, data, start, end, display) {
                        var api = this.api(),
                            data;

                        // Remove the formatting to get integer data for summation
                        var intVal = function(i) {
                            return typeof i === 'string' ?
                                i.replace(/[\$,]/g, '') * 1 :
                                typeof i === 'number' ?
                                i : 0;
                        };

                        // Total over all pages
                        total = api
                            .column(7)
                            .data()
                            .reduce(function(a, b) {
                                return intVal(a) + intVal(b);
                            }, 0);

                        // Total over this page
                        pageTotal = api
                            .column(7, {
                                page: 'current'
                            })
                            .data()
                            .reduce(function(a, b) {
                                return intVal(a) + intVal(b);
                            }, 0);

                        // Update footer
                        $(api.column(7).footer()).html(
                            +pageTotal + '( ' + total + ' Total)'
                        );
                    },
                    ajax: {
                        url: '<?= site_url('manager/ajax_get_detail_cut'); ?>',
                        type: 'POST',
                        data: {
                            orc: orc,
                            tgl: tgl
                        },
                    },
                    columns: [{
                            'data': 'tgl'
                        },
                        {
                            'data': 'orc'
                        },
                        {
                            'data': 'style'
                        },
                        {
                            'data': 'color'
                        },
                        {
                            'data': 'size'
                        },
                        {
                            'data': 'no_bundle'
                        },

                        {
                            'data': 'line'
                        },
                        {
                            'data': 'qty_pcs'
                        },

                    ],

                });
                $('#modal-detail-in').modal("show");

            });

        }

    });
</script>