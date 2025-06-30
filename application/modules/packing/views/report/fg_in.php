<style>
    .dt-buttons {
        margin-bottom: 10px;
    }

    .dataTables_length {
        margin-bottom: -30px;
    }

    .swal-wide {
        font-size: .85rem;
    }

    .sweet_loader {
        width: 140px;
        height: 140px;
        margin: 0 auto;
        animation-duration: 0.5s;
        animation-timing-function: linear;
        animation-iteration-count: infinite;
        animation-name: ro;
        transform-origin: 50% 50%;
        transform: rotate(0) translate(0, 0);
    }

    @keyframes ro {
        100% {
            transform: rotate(-360deg) translate(0, 0);
        }
    }
</style>

<!--start page wrapper -->
<div class="page-wrapper">
    <div class="page-content">
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Packing</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Finish Good IN</li>
                    </ol>
                </nav>
            </div>
        </div>
        <h6 class="mb-0 text-uppercase">Finish Good IN Report</h6>
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
                                    <input name="datefrom" class="form-control" id="datefrom" type="date" value="<?= date("Y-m-d"); ?>">
                                </div>
                                <div class="col-md-1 text-center">
                                    <label class="col-form-label">to</label>
                                </div>
                                <div class=" col-md-3 ">
                                    <input name="dateto" class="form-control" id="dateto" type="date" value="<?= date("Y-m-d"); ?>">
                                </div>
                                <div class="col-lg-2">
                                    <input type="button" name="filter" id="filter" value="Filter" class="btn btn-info">
                                </div>
                            </div>



                            <table id="fg_in" class="table table-bordered table-striped table-hover table-sm nowrap" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Date</th>
                                        <th>ORC</th>
                                        <th>Style</th>
                                        <th>Color</th>
                                        <th>Qty</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody></tbody>
                                <tfoot>
                                    <tr>
                                        <th colspan="5" class="text-center">Total</th>
                                        <th></th>
                                        <th></th>
                                    </tr>
                                </tfoot>

                            </table>

                        </div>
                    </div>
                </div>
            </div>

        </div>


        <!-- Mixed Size -->
        <h6 class="mb-0 text-uppercase mt-4">Output Mixed Size Report</h6>
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
                                    <input class="form-control" id="date_from_mixed_size" type="date">
                                </div>
                                <div class="col-md-1 text-center">
                                    <label class="col-form-label">to</label>
                                </div>
                                <div class=" col-md-3 ">
                                    <input class="form-control" id="date_to_mixed_size" type="date">
                                </div>
                                <div class="col-lg-2">
                                    <input type="button" id="filter_output_mixed_size_report" value="Filter" class="btn btn-info">
                                </div>
                            </div>



                            <table id="outputMixedSizeTable" class="table table-bordered table-striped table-hover table-sm nowrap" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Date</th>
                                        <th>PO Number</th>
                                        <th>ORC</th>
                                        <th>Style</th>
                                        <th>Color</th>
                                        <th>Total Box</th>
                                        <th>Scanned Box</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody></tbody>
                                <tfoot>
                                    <tr>
                                        <th colspan="6" class="text-center">Total</th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
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


<!-- Modal -->
<div class="modal fade" id="orcDetail" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="modal-body">
                    <table id="mydata" class="table table-bordered table-striped table-hover table-sm nowrap" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Date</th>
                                <th>ORC</th>
                                <th>Style</th>
                                <th>Color</th>
                                <th>Size</th>
                                <th>Qty</th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                        <tfoot>
                            <tr>
                                <th colspan="6" class="text-center">Total</th>
                                <th></th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal Mixed Size -->
<div class="modal fade" id="outputMixedSizeModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="modal-body">
                    <table id="outputMixedSizeTableDetails" class="table table-bordered table-striped table-hover table-sm nowrap" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Date</th>
                                <th>ORC</th>
                                <th>Style</th>
                                <th>Color</th>
                                <th>Box Number</th>
                                <th>Size</th>
                                <th>Qty</th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                        <tfoot>
                            <tr>
                                <th colspan="7" class="text-center">Total</th>
                                <th></th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

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

            let datefrom = $('#datefrom').val();
            let dateto = $('#dateto').val();

            datepicker = {
                'datefrom': datefrom,
                'dateto': dateto
            };

            table = $('#fg_in').DataTable({
                autoWidth: false,
                // processing: true,
                destroy: true,
                info: true,
                searching: true,
                scrollX: true,
                // stateSave: true,
                dom: 'Blfrtip',
                // dom: '<"dt-top"<"left-col"Bl><"right-col"f>>rt<"dt-bottom"<"left-col"i><"right-col"p>>',
                buttons: [{
                    extend: 'excel',
                    title: 'Finish Good IN'
                }],
                ajax: {
                    url: '<?= site_url('packing/fg_in'); ?>',
                    type: 'POST',
                    data: {
                        'datefrom': datefrom,
                        'dateto': dateto
                    },
                },
                // language: {
                //     processing: '<i class="fa fa-spinner fa-spin fa-3x fa-fw"></i><br><div><p>Silahkan Menunggu...</p></div> ',
                //     emptyTable: 'Tidak ada data',
                //     lengthMenu: '_MENU_',
                // },
                columns: [{
                        "data": null,
                        "className": "text-center px-2 align-middle",
                        "orderable": true,
                        "searchable": true,
                        // "width": "100px",
                        "render": function(data, type, row, meta) {
                            return meta.row + meta.settings._iDisplayStart + 1;
                        }
                    },
                    {
                        'data': 'tgl',
                        'className': 'text-center px-2 align-middle'
                    },
                    {
                        'data': 'orc',
                        'className': 'text-center px-2 align-middle'
                    },
                    {
                        'data': 'style',
                        'className': 'text-center px-2 align-middle'
                    },
                    {
                        'data': 'color',
                        'className': 'text-center px-2 align-middle'
                    },
                    {
                        'data': 'qty',
                        'className': 'text-center px-2 align-middle'
                    },
                    {
                        'className': 'text-center',
                        render: function(data, type, row) {
                            return "<span id='btn-detail' class='badge bg-info' style='cursor: pointer;'>Details</span>"
                        }
                    }
                ],
                footerCallback: function(row, data, start, end, display) {
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
                        pageTotal + ' ( ' + total + ' )'
                    );
                },

            });
            return true;
        }

        $('#fg_in tbody').on('click', '#btn-detail', function() {
            tgl = table.row($(this).parents('tr')).data().tgl;
            // console.log(tgl);
            orc = table.row($(this).parents('tr')).data().orc;

            let dt = $('#mydata').DataTable({
                autoWidth: false,
                // processing: true,
                destroy: true,
                info: true,
                searching: true,
                paging: true,
                scrollX: true,
                dom: 'Blfrtip',
                buttons: [{
                    extend: 'excel',
                    title: 'Finish Good IN Details'
                }],
                ajax: {
                    url: '<?= site_url('packing/detail_in'); ?>',
                    type: 'POST',
                    data: {
                        tgl: tgl,
                        orc: orc,
                    },
                },
                columns: [{
                        "data": null,
                        "className": "text-center px-2 align-middle",
                        "orderable": true,
                        "searchable": true,
                        // "width": "100px",
                        "render": function(data, type, row, meta) {
                            return meta.row + meta.settings._iDisplayStart + 1;
                        }
                    },
                    {
                        'data': 'tgl',
                        'className': 'text-center px-2 align-middle'
                    },
                    {
                        'data': 'orc',
                        'className': 'text-center px-2 align-middle'
                    },
                    {
                        'data': 'style',
                        'className': 'text-center px-2 align-middle'
                    },
                    {
                        'data': 'color',
                        'className': 'text-center px-2 align-middle'
                    },
                    {
                        'data': 'size',
                        'className': 'text-center px-2 align-middle'
                    },
                    {
                        'data': 'qty_box',
                        'className': 'text-center px-2 align-middle'
                    },

                ],

                footerCallback: function(row, data, start, end, display) {
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
                        .column(6)
                        .data()
                        .reduce(function(a, b) {
                            return intVal(a) + intVal(b);
                        }, 0);

                    // Total over this page
                    pageTotal = api
                        .column(6, {
                            page: 'current'
                        })
                        .data()
                        .reduce(function(a, b) {
                            return intVal(a) + intVal(b);
                        }, 0);

                    // Update footer
                    $(api.column(6).footer()).html(
                        pageTotal + ' ( ' + total + ' )'
                    );
                },

            });
            $("#orcDetail").on('shown.bs.modal', function() {
                $('#mydata').DataTable().columns.adjust();
            });
            $('#orcDetail').modal("show");


        });





        // Mixed Size
        let outputMixedSizeTable = $('#outputMixedSizeTable').DataTable({
            autoWidth: false,
            // processing: true,
            destroy: true,
            info: true,
            searching: true,
            scrollX: true,
            // stateSave: true,
            dom: 'Blfrtip',
            // dom: '<"dt-top"<"left-col"Bl><"right-col"f>>rt<"dt-bottom"<"left-col"i><"right-col"p>>',
            buttons: [{
                extend: 'excel',
                title: 'Finish Good Output Mixed Size'
            }],
            ajax: {
                url: '<?= site_url('packing/getOutputMixedSizeTableCurrentDate'); ?>',
                type: 'GET'
            },
            columns: [{
                    "data": null,
                    "className": "text-center px-2 align-middle",
                    "orderable": true,
                    "searchable": true,
                    // "width": "100px",
                    "render": function(data, type, row, meta) {
                        return meta.row + meta.settings._iDisplayStart + 1;
                    }
                },
                {
                    'data': 'date',
                    'className': 'text-center px-2 align-middle'
                },
                {
                    'data': 'po',
                    'className': 'text-center px-2 align-middle'
                },
                {
                    'data': 'orc',
                    'className': 'text-center px-2 align-middle'
                },
                {
                    'data': 'style',
                    'className': 'text-center px-2 align-middle'
                },
                {
                    'data': 'color',
                    'className': 'text-center px-2 align-middle'
                },
                {
                    'data': 'box',
                    'className': 'text-center px-2 align-middle'
                },
                {
                    'data': 'total_actual_box',
                    'className': 'text-center px-2 align-middle'
                },
                {
                    'className': 'text-center',
                    render: function(data, type, row) {
                        return "<span id='btn_details_mixed_size' class='badge bg-info' style='cursor: pointer;'>Details</span>"
                    }
                }
            ],

            footerCallback: function(row, data, start, end, display) {
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
                    .column(6)
                    .data()
                    .reduce(function(a, b) {
                        return intVal(a) + intVal(b);
                    }, 0);

                // Total over this page
                pageTotal = api
                    .column(6, {
                        page: 'current'
                    })
                    .data()
                    .reduce(function(a, b) {
                        return intVal(a) + intVal(b);
                    }, 0);

                // Update footer
                $(api.column(6).footer()).html(
                    pageTotal + ' ( ' + total + ' )'
                );

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
                    pageTotal + ' ( ' + total + ' )'
                );
            },

        });

        $('#filter_output_mixed_size_report').on('click', function() {
            let datefrom = $('#date_from_mixed_size').val();
            let dateto = $('#date_to_mixed_size').val();

            outputMixedSizeTable = $('#outputMixedSizeTable').DataTable({
                autoWidth: false,
                // processing: true,
                destroy: true,
                info: true,
                searching: true,
                scrollX: true,
                // stateSave: true,
                dom: 'Blfrtip',
                // dom: '<"dt-top"<"left-col"Bl><"right-col"f>>rt<"dt-bottom"<"left-col"i><"right-col"p>>',
                buttons: [{
                    extend: 'excel',
                    title: 'Finish Good Output Mixed Size'
                }],
                ajax: {
                    url: '<?= site_url('packing/getOutputMixedSizeTableSelectedDate'); ?>',
                    type: 'GET',
                    data: {
                        'datefrom': datefrom,
                        'dateto': dateto
                    },
                },
                columns: [{
                        "data": null,
                        "className": "text-center px-2 align-middle",
                        "orderable": true,
                        "searchable": true,
                        // "width": "100px",
                        "render": function(data, type, row, meta) {
                            return meta.row + meta.settings._iDisplayStart + 1;
                        }
                    },
                    {
                        'data': 'date',
                        'className': 'text-center px-2 align-middle'
                    },
                    {
                        'data': 'po',
                        'className': 'text-center px-2 align-middle'
                    },
                    {
                        'data': 'orc',
                        'className': 'text-center px-2 align-middle'
                    },
                    {
                        'data': 'style',
                        'className': 'text-center px-2 align-middle'
                    },
                    {
                        'data': 'color',
                        'className': 'text-center px-2 align-middle'
                    },
                    {
                        'data': 'box',
                        'className': 'text-center px-2 align-middle'
                    },
                    {
                        'data': 'total_actual_box',
                        'className': 'text-center px-2 align-middle'
                    },
                    {
                        'className': 'text-center',
                        render: function(data, type, row) {
                            return "<span id='btn_details_mixed_size' class='badge bg-info' style='cursor: pointer;'>Details</span>"
                        }
                    }
                ],

                footerCallback: function(row, data, start, end, display) {
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
                        .column(6)
                        .data()
                        .reduce(function(a, b) {
                            return intVal(a) + intVal(b);
                        }, 0);

                    // Total over this page
                    pageTotal = api
                        .column(6, {
                            page: 'current'
                        })
                        .data()
                        .reduce(function(a, b) {
                            return intVal(a) + intVal(b);
                        }, 0);

                    // Update footer
                    $(api.column(6).footer()).html(
                        pageTotal + ' ( ' + total + ' )'
                    );

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
                        pageTotal + ' ( ' + total + ' )'
                    );
                },

            });
        });

        $('#outputMixedSizeTable tbody').on('click', '#btn_details_mixed_size', function() {
            let date = outputMixedSizeTable.row($(this).parents('tr')).data().date;
            let orc = outputMixedSizeTable.row($(this).parents('tr')).data().orc;

            let outputMixedSizeTableDetails = $('#outputMixedSizeTableDetails').DataTable({
                autoWidth: false,
                // processing: true,
                destroy: true,
                info: true,
                searching: true,
                paging: true,
                scrollX: true,
                dom: 'Blfrtip',
                buttons: [{
                    extend: 'excel',
                    title: 'Finish Good IN Details'
                }],
                ajax: {
                    url: '<?= site_url('packing/getOutputMixedSizeTableDetails'); ?>',
                    type: 'GET',
                    data: {
                        'date': date,
                        'orc': orc
                    },
                },
                columns: [{
                        "data": null,
                        "className": "text-center px-2 align-middle",
                        "orderable": true,
                        "searchable": true,
                        // "width": "100px",
                        "render": function(data, type, row, meta) {
                            return meta.row + meta.settings._iDisplayStart + 1;
                        }
                    },
                    {
                        'data': 'created_date',
                        'className': 'text-center px-2 align-middle'
                    },
                    {
                        'data': 'orc',
                        'className': 'text-center px-2 align-middle'
                    },
                    {
                        'data': 'style',
                        'className': 'text-center px-2 align-middle'
                    },
                    {
                        'data': 'color',
                        'className': 'text-center px-2 align-middle'
                    },
                    {
                        'data': 'box_number',
                        'className': 'text-center px-2 align-middle'
                    },
                    {
                        'data': 'size',
                        'className': 'text-center px-2 align-middle'
                    },
                    {
                        'data': 'qty_out',
                        'className': 'text-center px-2 align-middle'
                    },

                ],

                footerCallback: function(row, data, start, end, display) {
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
                        pageTotal + ' ( ' + total + ' )'
                    );
                },

            });
            $("#outputMixedSizeModal").on('shown.bs.modal', function() {
                $('#outputMixedSizeTableDetails').DataTable().columns.adjust();
            });
            $('#outputMixedSizeModal').modal("show");


        });
    });
</script>