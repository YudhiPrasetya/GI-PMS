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
                        <li class="breadcrumb-item active" aria-current="page">Report Finish Good</li>
                    </ol>
                </nav>
            </div>
        </div>
        <h6 class="mb-0 text-uppercase">ALL FINISH GOOD</h6>
        <hr />
        <div class="row">
            <div class="col-12 ">
                <div class="card rounded-4 w-100">
                    <div class="card-body">
                        <table id="wipTable" class="table table-bordered table-striped" style="width: 100%">
                            <thead>
                                <tr>
                                    <td>ORC</td>
                                    <td>Style</td>
                                    <td>Color</td>
                                    <td>Qty Order</td>
                                    <td>Finish Good In</td>
                                    <td>Finish Good Out / loading</td>
                                    <td>Balance in</td>
                                    <td>Balance Out</td>
                                    <td>Stock</td>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th colspan="9" style="text-align:right">Total:</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div><!--end row-->
    </div>

    <!-- Modal Details -->
    <div class="modal fade" id="modalDetail" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Detail Finish Good In</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row mx-3 my-3">
                        <div class="col-md-12">
                            <table id="tableDetail" class="table table-striped">
                                <thead>
                                    <tr>
                                        <!-- <th>No.</th> -->
                                        <th>Date In</th>
                                        <th>Orc</th>
                                        <th>Style</th>
                                        <th>Color</th>
                                        <th>Size</th>
                                        <th>No. Carton</th>
                                        <th>QTY Box</th>
                                        <th>Barcode</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Details -->
    <div class="modal fade" id="modalDetailOut" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Detail Finish Good Out</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row mx-3 my-3">
                        <div class="col-md-12">
                            <table id="tableDetailOut" class="table table-striped">
                                <thead>
                                    <tr>
                                        <!-- <th>No.</th> -->
                                        <th>Date In</th>
                                        <th>Orc</th>
                                        <th>Style</th>
                                        <th>Color</th>
                                        <th>Size</th>
                                        <th>No. Carton</th>
                                        <th>QTY Box</th>
                                        <th>Barcode</th>
                                    </tr>
                                </thead>
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
    $(document).ready(function() {
        var table = $('#wipTable').DataTable({
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
                title: 'Data Finish Good IN'
            }],
            lengthMenu: [
                [50, 100, -1],
                [50, 100, 'All'],
            ],
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
                    .column(8)
                    .data()
                    .reduce(function(a, b) {
                        return intVal(a) + intVal(b);
                    }, 0);

                // Total over this page
                pageTotal = api
                    .column(8, {
                        page: 'current'
                    })
                    .data()
                    .reduce(function(a, b) {
                        return intVal(a) + intVal(b);
                    }, 0);

                $(api.column(8).footer()).html(
                    +pageTotal + '( ' + total + ' Total)'
                );
            },

            ajax: {
                url: "<?= site_url('manager/all_fg'); ?>",
                type: "POST",

            },
            language: {
                processing: '<i class="fa fa-spinner fa-spin fa-3x fa-fw"></i><br><div><p>Silahkan Menunggu...</p></div> ',
                emptyTable: 'Tidak ada data',
                lengthMenu: '_MENU_',
            },
            columns: [{
                    'data': 'orc'
                },
                {
                    'data': 'style'
                },
                {
                    'data': 'color'
                },
                {
                    'data': 'qt_ord',
                },

                {
                    'className': 'text-center px-3',
                    render: function(data, type, row) {
                        return '<span class="badge text-bg-success text-white" style="cursor: pointer;" id="btn_in">' + row['input_fg'] + '</span> '
                    }
                },
                {
                    'className': 'text-center px-3',
                    render: function(data, type, row) {
                        return '<span class="badge text-bg-info text-white" style="cursor: pointer;" id="btn_out">' + row['ouput_fg'] + '</span> '
                    }
                },

                {
                    'data': 'bal_in',
                },
                {
                    'data': 'bal_out',
                },
                {
                    'data': 'stok'
                },
            ],


        });

        $("#wipTable tbody").on("click", "#btn_in", function() {
            orc = table.row($(this).parents('tr')).data().orc;
            console.log(orc);
            var tableDetail = $('#tableDetail').DataTable({
                autoWidth: false,
                destroy: true,
                info: false,
                searching: false,
                paging: true,
                fixedHeader: true,
                lengthMenu: [
                    [50, 100, -1],
                    [50, 100, 'All'],
                ],
                dom: 'Blfrtip',
                buttons: [{
                    extend: 'excel',
                    title: 'Data Input Finish Good '
                }],

                ajax: {
                    url: '<?= site_url('manager/get_detail_in'); ?>',
                    type: 'POST',
                    data: {
                        orc: orc,
                    },

                },
                columns: [{
                        'data': 'tgl_in',
                        'className': "text-center"
                    },
                    {
                        'data': 'orc',
                        'className': "text-center"
                    },
                    {
                        'data': 'style',
                        'className': "text-center"
                    },
                    {
                        'data': 'color',
                        'className': "text-center"
                    },
                    {
                        'data': 'size',
                        'className': "text-center"
                    },
                    {
                        'data': 'carton_no',
                        'className': "text-center"
                    },
                    {
                        'data': 'qty_box',
                        'className': "text-center"
                    },
                    {
                        'data': 'barcode',
                        'className': "text-center"
                    },
                ],

            });

            $("#modalDetail").modal('show');
        });


        $("#wipTable tbody").on("click", "#btn_out", function() {
            orc = table.row($(this).parents('tr')).data().orc;
            console.log(orc);
            var tableDetailOut = $('#tableDetailOut').DataTable({
                autoWidth: false,
                destroy: true,
                info: false,
                searching: false,
                paging: true,
                fixedHeader: true,
                lengthMenu: [
                    [50, 100, -1],
                    [50, 100, 'All'],
                ],
                dom: 'Blfrtip',
                buttons: [{
                    extend: 'excel',
                    title: 'Data Output Finish Good '
                }],

                ajax: {
                    url: '<?= site_url('manager/get_detail_out'); ?>',
                    type: 'POST',
                    data: {
                        orc: orc,
                    },

                },
                columns: [{
                        'data': 'tgl_in',
                        'className': "text-center"
                    },
                    {
                        'data': 'orc',
                        'className': "text-center"
                    },
                    {
                        'data': 'style',
                        'className': "text-center"
                    },
                    {
                        'data': 'color',
                        'className': "text-center"
                    },
                    {
                        'data': 'size',
                        'className': "text-center"
                    },
                    {
                        'data': 'carton_no',
                        'className': "text-center"
                    },
                    {
                        'data': 'qty_box',
                        'className': "text-center"
                    },
                    {
                        'data': 'barcode',
                        'className': "text-center"
                    },
                ],

            });

            $("#modalDetailOut").modal('show');
        });
    });
</script>