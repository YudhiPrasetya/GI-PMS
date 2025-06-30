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
        <h6 class="mb-0 text-uppercase">Finish Good IN</h6>
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
                            <table id="fg_in" class="table table-bordered table-striped" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th>Tanggal</th>
                                        <th>ORC</th>
                                        <th>Style</th>
                                        <th>Color</th>
                                        <th>Size</th>
                                        <th>Qty</th>
                                        <th>DETAIL</th>
                                    </tr>
                                </thead>
                                <tbody>

                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th colspan="7" style="text-align:right">Total:</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>

                        <!-- <div class="modal fade" id="orcDetail" tabindex="-1" aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <table id="mydata" class="table table-bordered table-striped" cellspacing="0" width="100%">
                                            <thead>
                                                <tr>
                                                    <th>Tanggal</th>
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
                                                    <th colspan="6" style="text-align:right">Total:</th>
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>-->
                    </div>
                </div>
            </div>
        </div>

    </div><!--end row-->

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

            table = $('#fg_in').DataTable({
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
                    url: '<?= site_url('manager/filter_fg_in'); ?>',
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
                columns: [

                    {
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
                        'data': 'qty',

                    },
                    {
                        render: function(data, type, row) {
                            return "<button type='button' class='btn btn-warning btn-sm btnDetail' id='btn-detail'>Detail</button>"
                        }
                    }

                ],
                lengthMenu: [
                    [50, 100, -1],
                    [50, 100, 'All'],
                ],
                // order: [
                //     [1, 'ASC'],
                // ]
                // "aaSorting": [
                //     [0, "asc"]
                // ]
            });

        }

        // $('#fg_in tbody').on('click', '#btn-detail', function() {
        //     tgl = table.row($(this).parents('tr')).data().tgl;
        //     console.log(tgl);
        //     orc = table.row($(this).parents('tr')).data().orc;

        //     let dt = $('#mydata').DataTable({
        //         autoWidth: false,
        //         processing: true,
        //         destroy: true,
        //         info: true,
        //         searching: true,
        //         stateSave: true,
        //         paging: true,
        //         fixedHeader: true,
        //         dom: 'Blfrtip',
        //         buttons: [{
        //             extend: 'excel',
        //             title: 'Data Output Finish Good '
        //         }],
        //         "footerCallback": function(row, data, start, end, display) {
        //             var api = this.api(),
        //                 data;

        //             // Remove the formatting to get integer data for summation
        //             var intVal = function(i) {
        //                 return typeof i === 'string' ?
        //                     i.replace(/[\$,]/g, '') * 1 :
        //                     typeof i === 'number' ?
        //                     i : 0;
        //             };

        //             // Total over all pages
        //             total = api
        //                 .column(5)
        //                 .data()
        //                 .reduce(function(a, b) {
        //                     return intVal(a) + intVal(b);
        //                 }, 0);

        //             // Total over this page
        //             pageTotal = api
        //                 .column(5, {
        //                     page: 'current'
        //                 })
        //                 .data()
        //                 .reduce(function(a, b) {
        //                     return intVal(a) + intVal(b);
        //                 }, 0);

        //             // Update footer
        //             $(api.column(5).footer()).html(
        //                 +pageTotal + '( ' + total + ' Total)'
        //             );
        //         },
        //         ajax: {
        //             url: '<?= site_url('manager/detail_fg_in'); ?>',
        //             type: 'POST',
        //             data: {
        //                 tgl: tgl,
        //                 orc: orc,
        //             },
        //         },
        //         columns: [{
        //                 'data': 'tgl'
        //             },
        //             {
        //                 'data': 'orc'
        //             },
        //             {
        //                 'data': 'style'
        //             },
        //             {
        //                 'data': 'color'
        //             },
        //             {
        //                 'data': 'size'
        //             },
        //             {
        //                 'data': 'qty_box'
        //             },

        //         ],

        //     });
        //     $('#orcDetail').modal("show");


        // });

    });
</script>