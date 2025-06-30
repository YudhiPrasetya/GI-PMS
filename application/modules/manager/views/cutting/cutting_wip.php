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
        <h6 class="mb-0 text-uppercase">Cutting WIP</h6>
        <hr />
        <div class="row">
            <div class="col-12 ">
                <div class="card rounded-4 w-100">
                    <div class="card-body">
                        <div class="form-group">
                            <div class="box-body">
                                <table id="wipTable" class="table table-bordered table-striped" cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                            <td>ORC Number</td>
                                            <td>Style</td>
                                            <td>Color</td>
                                            <td>Qty</td>
                                            <th>DETAIL</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th colspan="5" style="text-align:right">Total:</th>
                                        </tr>
                                    </tfoot>
                                </table>
                                <!-- </div> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="orcDetail" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Detail ORC </h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="modal-body">
                                <table id="mydata" class="table table-bordered table-striped" cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                            <td>Buyer</td>
                                            <td>Orc</td>
                                            <td>Style</td>
                                            <td>Color</td>
                                            <td>Barcode</td>
                                            <td>Size</td>
                                            <td>Qty</td>
                                        </tr>
                                    </thead>
                                    <tbody></tbody>
                                    <tfoot>
                                        <tr>
                                            <th colspan="7" style="text-align:right">Total:</th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div><!--end row-->
</div>
</div>
<!--end page wrapper -->

<script>
    // var table;

    $(document).ready(function() {
        $(".preloader").fadeOut();


        datePacking();

        var table, date, datepicker;

        function datePacking() {

            datefrom = $('#datefrom').val();
            dateto = $('#dateto').val();


            table = $('#wipTable').DataTable({
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
                    title: 'Data Detail Wip '
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
                        .column(3)
                        .data()
                        .reduce(function(a, b) {
                            return intVal(a) + intVal(b);
                        }, 0);

                    // Total over this page
                    pageTotal = api
                        .column(3, {
                            page: 'current'
                        })
                        .data()
                        .reduce(function(a, b) {
                            return intVal(a) + intVal(b);
                        }, 0);

                    // Update footer
                    $(api.column(3).footer()).html(
                        +pageTotal + '( ' + total + ' Total)'
                    );
                },
                ajax: {
                    url: '<?= site_url('manager/get_all_wip'); ?>',
                    type: 'POST',

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
                        'data': 'balance_cutting_ex',

                    },
                ],
                columnDefs: [{
                        targets: [4],
                        render: function(data, type, row) {
                            //    return "<button type='button' class='btn btn-danger btn-sm' id='btnLihat'>Lihat</button>"
                            return '<button type="button" id="btn-detail" class="btn btn-block btn-primary btn-xs">DETAIL</button>';
                        }
                    }

                ],
                lengthMenu: [
                    [50, 100, -1],
                    [50, 100, 'All'],
                ],

            });

        }

        $('#wipTable tbody').on('click', '#btn-detail', function() {

            orc = table.row($(this).parents('tr')).data().orc;

            let dt = $('#mydata').DataTable({
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
                        +pageTotal + '( ' + total + ' Total)'
                    );
                },
                ajax: {
                    url: '<?= site_url('manager/detail_wip'); ?>',
                    type: 'POST',
                    data: {

                        orc: orc,
                    },
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
                        'data': 'size'
                    },

                    {
                        'data': 'kodebarcodetrims'
                    },
                    {
                        'data': 'size'
                    },
                    {
                        'data': 'qty_pcs'
                    },

                ],
            });
            $('#orcDetail').modal("show");


        });

    });
</script>