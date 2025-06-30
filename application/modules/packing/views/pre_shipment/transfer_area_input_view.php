<style>
    input::-webkit-outer-spin-button,
    input::-webkit-inner-spin-button {
        -webkit-appearance: none;
        margin: 0;
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
                        <li class="breadcrumb-item active" aria-current="page">Finish Good (In)</li>
                    </ol>
                </nav>
            </div>
        </div>
        <h6 class="mb-0 text-uppercase">Finish Good (In)</h6>
        <hr />
        <div class="row">
            <div class="col-12 ">
                <div class="card rounded-4 w-100">
                    <div class="card-body">
                        <div class="mx-3 my-3">

                            <ul class="nav nav-tabs nav-primary" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link active" data-bs-toggle="tab" href="#fixed_box" role="tab" aria-selected="true">
                                        <div class="d-flex align-items-center">
                                            <div class="tab-icon"><i class='bx bx-pie-chart-alt font-18 me-1'></i>
                                            </div>
                                            <div class="tab-title">Fixed Box</div>
                                        </div>
                                    </a>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link" data-bs-toggle="tab" href="#pcs_box" role="tab" aria-selected="false">
                                        <div class="d-flex align-items-center">
                                            <div class="tab-icon"><i class='bx bx-pie-chart-alt-2 font-18 me-1'></i>
                                            </div>
                                            <div class="tab-title">Pcs Box</div>
                                        </div>
                                    </a>
                                </li>
                            </ul>
                            <div class="tab-content py-3">
                                <div class="tab-pane fade show active" id="fixed_box" role="tabpanel">
                                    <div class="row mb-4 mt-3">
                                        <div class="col-lg-6">
                                            <div class="row">
                                                <div class="col-lg-4">
                                                    <label for="barcodeOperator" class="col-form-label">Barcode Operator</label>
                                                </div>
                                                <div class="col-lg-6">
                                                    <input type="number" id="barcodeOperator" class="form-control">
                                                </div>
                                            </div>

                                        </div>
                                        <div class="col-lg-6">
                                            <div class="row">
                                                <div class="col-lg-4">
                                                    <label for="barcodePacking" class="col-form-label">Barcode Packing</label>
                                                </div>
                                                <div class="col-lg-6">
                                                    <input type="text" id="barcodePacking" class="form-control" disabled>
                                                </div>

                                                <div class="col-lg-2">
                                                    <button type="button" class="btn btn-outline-secondary" id="btnNewInputTA">Reset</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                    <table class="table table-bordered table-striped table-hover table-sm nowrap" id="tableInputTransferAreaTemp">
                                        <thead>
                                            <tr>
                                                <th class="text-center">#</th>
                                                <th class="text-center">ORC</th>
                                                <th class="text-center">Style</th>
                                                <th class="text-center">Color</th>
                                                <th class="text-center">Size</th>
                                                <th class="text-center">No.Box</th>
                                                <th class="text-center">Pcs</th>
                                                <th class="text-center">Barcode</th>
                                                <th class="text-center">Lokasi</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th colspan="6" class="text-center">Total </th>
                                                <th class="text-center"></th>
                                                <th class="text-center"></th>
                                                <th class="text-center"></th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                                <div class="tab-pane fade" id="pcs_box" role="tabpanel">
                                    <div class="row my-3">
                                        <div class="col-lg-12">
                                            <button type="button" id="btnInputManual" class="btn btn-info text-end"><i class="fadeIn animated bx bx-user"></i> Input Manual</button>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="row mb-3">
                                                <div class="col-lg-3">
                                                    <label for="barcodePackingPcs" class="col-form-label">Barcode</label>
                                                </div>
                                                <div class="col-lg-6">
                                                    <input type="text" id="barcodePackingPcs" class="form-control">
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <div class="col-lg-3">
                                                    <label for="orc" class="col-form-label">ORC</label>
                                                </div>
                                                <div class="col-lg-6">
                                                    <input type="text" id="orc" class="form-control" disabled>
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <div class="col-lg-3">
                                                    <label for="style" class="col-form-label">Style</label>
                                                </div>
                                                <div class="col-lg-6">
                                                    <input type="text" id="style" class="form-control" disabled>
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <div class="col-lg-3">
                                                    <label for="color" class="col-form-label">Color</label>
                                                </div>
                                                <div class="col-lg-6">
                                                    <input type="text" id="color" class="form-control" disabled>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="row mb-3">
                                                <div class="col-lg-3">
                                                    <label for="size" class="col-form-label">Size</label>
                                                </div>
                                                <div class="col-lg-6">
                                                    <input type="text" id="size" class="form-control" disabled>
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <div class="col-lg-3">
                                                    <label for="no_bundle" class="col-form-label">No. Bundle</label>
                                                </div>
                                                <div class="col-lg-6">
                                                    <input type="text" id="no_bundle" class="form-control" disabled>
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <div class="col-lg-3">
                                                    <label for="pcs" class="col-form-label">Qty Pcs</label>
                                                </div>
                                                <div class="col-lg-3">
                                                    <input type="number" id="pcs" class="form-control" disabled>
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <div class="col-lg-3">
                                                    <label for="new_pcs" class="col-form-label">Qty New Pcs</label>
                                                </div>
                                                <div class="col-lg-3">
                                                    <input type="number" id="new_pcs" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row my-4">
                                        <div class="col-lg-6">
                                            <div class="row">
                                                <div class="col-lg-3"></div>
                                                <div class="col-lg-9">


                                                    <button type="button" id="btnUpdatePcsBox" class="btn btn-success" disabled><i class="fadeIn animated bx bx-upload"></i>&nbsp;Update</button>

                                                    <button type="button" id="btnCancelPcsBox" class="btn btn-warning"><i class="fadeIn animated bx bx-window-close"></i>&nbsp;Cancel</button>
                                                </div>
                                            </div>
                                        </div>


                                    </div>

                                    <hr>
                                    <table class="table table-bordered table-striped table-hover table-sm nowrap" id="tableInputTransferAreaPcsTemp">
                                        <thead>
                                            <tr>
                                                <th class="text-center">#</th>
                                                <th class="text-center">ORC</th>
                                                <th class="text-center">Style</th>
                                                <th class="text-center">Color</th>
                                                <th class="text-center">Size</th>
                                                <th class="text-center">No.Box</th>
                                                <th class="text-center">Pcs</th>
                                                <th class="text-center">Barcode</th>
                                                <th class="text-center">Lokasi</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th colspan="6" class="text-center">Total</th>
                                                <th class="text-center"></th>
                                                <th class="text-center"></th>
                                                <th class="text-center"></th>
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



        <h6 class="mb-0 text-uppercase mt-5">List of Transfer Area - Summary And Detail</h6>
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
                                    <button type="button" name="filter" id="filter" class="btn btn-success">Filter</button>
                                    <button type="button" name="reset" id="reset" class="btn btn-outline-secondary">Reset</button>
                                </div>

                            </div>
                            <table class="table table-hover table-striped table-sm nowrap" style="width:100%" id="tableInputTransferArea">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <!-- <th>Date</th> -->
                                        <th>PO</th>
                                        <th>Style</th>
                                        <th>Color</th>
                                        <th>ORC</th>
                                        <th>Qty Box</th>
                                        <th>Total Pcs</th>
                                        <th>Location</th>
                                        <th>Action</th>
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


<!-- Modal -->
<div class="modal fade" id="modalInputFG" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Input Manual</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="formInputManual" name="formInputManual">
                <div class="modal-body">
                    <div class="mx-3 my-3">

                        <div class="row">
                            <div class="col-lg-6">
                                <div class="row mb-3">
                                    <div class="col-lg-3">
                                        <label for="orcManual" class="col-form-label">ORC</label>
                                    </div>
                                    <div class="col-lg-8">
                                        <input type="text" id="orcManual" name="orcManual" class="form-control inputManual">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-lg-3">
                                        <label for="styleManual" class="col-form-label">Style</label>
                                    </div>
                                    <div class="col-lg-8">
                                        <input type="text" id="styleManual" name="styleManual" class="form-control inputManual">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-lg-3">
                                        <label for="colorManual" class="col-form-label">Color</label>
                                    </div>
                                    <div class="col-lg-8">
                                        <input type="text" id="colorManual" name="colorManual" class="form-control inputManual">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-lg-3">
                                        <label for="sizeManual" class="col-form-label">Size</label>
                                    </div>
                                    <div class="col-lg-8">
                                        <input type="text" id="sizeManual" name="sizeManual" class="form-control inputManual">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="row mb-3">
                                    <div class="col-lg-3">
                                        <label for="noBoxManual" class="col-form-label">No. Box</label>
                                    </div>
                                    <div class="col-lg-5">
                                        <input type="text" id="noBoxManual" name="noBoxManual" class="form-control inputManual">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-lg-3">
                                        <label for="pcsManual" class="col-form-label">Qty Pcs</label>
                                    </div>
                                    <div class="col-lg-5">
                                        <input type="text" id="pcsManual" name="pcsManual" class="form-control inputManual">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-lg-3">
                                        <label for="pcsManual" class="col-form-label">Line</label>
                                    </div>
                                    <div class="col-lg-8">
                                        <select class="single_select" id="lineManual" name="lineManual" style="width:100%"></select>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>
                <div class="modal-footer">
                    <button type="submit" id="btnSaveManual" class="btn btn-primary">Save</button>
                    <!-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> -->
                </div>
            </form>
        </div>
    </div>
</div>

<!--end page wrapper -->
<script>
    $('.single_select').select2({
        theme: 'bootstrap-5',
        width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style',
        dropdownParent: $('#modalInputFG')
    });
</script>
<script>
    $(document).ready(function() {
        const opCodeRegex = /\d{8}/;
        const packingCodeRegex = /[^]*-/i //regex untuk barcode packing

        var barcodeOp, barcodePacking, noUrut = 0,
            noUrutPcs = 0,
            findDoublePackingBarcode = false;

        $('#barcodeOperator').focus();
        $('#btnNewInputTA').click(function() {
            tableInputTransferAreaTemp.clear().draw();
            noUrut = 0;
            $('#barcodeOperator').val('');
            $('#barcodeOperator').prop('disabled', false);
            $('#barcodeOperator').focus();
            $('#barcodePacking').prop('disabled', true);
        })

        var tableInputTransferAreaTemp = $('#tableInputTransferAreaTemp').DataTable({
            destroy: true,
            columns: [{
                    "className": "text-center px-2"
                },
                {
                    "className": "text-center px-2"
                },
                {
                    "className": "text-center px-2"
                },
                {
                    "className": "text-center px-2"
                },
                {
                    "className": "text-center px-2"
                },
                {
                    "className": "text-center px-2"
                },
                {
                    "className": "text-center px-2"
                },
                {
                    "className": "text-center px-2"
                },
                {
                    "className": "text-center px-2"
                },


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
            }
        });

        var tableInputTransferAreaPcsTemp = $('#tableInputTransferAreaPcsTemp').DataTable({
            destroy: true,
            select: {
                style: 'single'
            },
            columns: [{
                    "className": "text-center px-2"
                },
                {
                    "className": "text-center px-2"
                },
                {
                    "className": "text-center px-2"
                },
                {
                    "className": "text-center px-2"
                },
                {
                    "className": "text-center px-2"
                },
                {
                    "className": "text-center px-2"
                },
                {
                    "className": "text-center px-2"
                },
                {
                    "className": "text-center px-2"
                },
                {
                    "className": "text-center px-2"
                },


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
                    pageTotal + ' (' + total + ')'
                );
            }
        });

        // var tableInputTransferArea = $('#tableInputTransferArea').DataTable({
        //     dom: 'Bflrtip',
        //     autoWidth: true,
        //     processing: true,
        //     // lengthMenu: [
        //     //     [5, 10, 15, 20, 25, 75, 100],
        //     //     [5, 10, 15, 20, 25, 75, 100]
        //     // ],
        //     // select: {
        //     //     style: "single"
        //     // },
        //     ajax: {
        //         url: "<?php echo site_url('packing/ajax_get_all_in'); ?>",
        //         type: "GET",
        //         dataType: "json",
        //     },
        //     columns: [{
        //             "data": null,
        //             "className": "text-center align-middle",
        //             "orderable": true,
        //             "searchable": true,
        //             // "width": "100px",
        //             "render": function(data, type, row, meta) {
        //                 return meta.row + meta.settings._iDisplayStart + 1;
        //             }
        //         },
        //         {
        //             "data": 'po',
        //             "className": "text-center px-2 align-middle"
        //         },
        //         {
        //             "data": 'style',
        //             "className": "text-center px-2 align-middle"
        //         },
        //         {
        //             "data": 'color',
        //             "className": "text-center px-2 align-middle"
        //         },
        //         {
        //             "data": 'orc',
        //             "className": "text-center px-2 align-middle"
        //         },
        //         {
        //             "data": 'jmlBox',
        //             "className": "text-center px-2 align-middle"
        //         },
        //         {
        //             "data": 'jmlPcs',
        //             "className": "text-center px-2 align-middle"
        //         },
        //         {
        //             "data": 'lokasi',
        //             "className": "text-center px-2 align-middle"
        //         },
        //         {
        //             "className": "text-center px-2 align-middle",
        //             render: function(data, type, row, meta) {
        //                 return '<button class="btn btn-success btn-sm mx-1 btnShowSummaryTransferArea" id="btnShowSummaryTransferArea">Summary</button>' +
        //                     '<button class="btn btn-info btn-sm mx-1 btnShowDetailTransferArea" id="btnShowDetailTransferArea">Detail</button>';
        //             }
        //         },

        //     ],
        //     // "columnDefs": [{
        //     //         "targets": [0],
        //     //         "visible": false
        //     //     },
        //     //     {
        //     //         "targets": [8],
        //     //         "render": function(data, type, row, meta) {
        //     //             return '<button class="btn btn-success btn-sm mx-1 btnShowSummaryTransferArea" id="btnShowSummaryTransferArea">Summary</button>' +
        //     //                 '<button class="btn btn-info btn-sm mx-1 btnShowDetailTransferArea" id="btnShowDetailTransferArea">Detail</button>';
        //     //         }
        //     //     },
        //     // ],
        // });
        datePacking();

        var tableInputTransferArea, date, datepicker;

        $('#filter').on('click', function() {
            datePacking();
        });

        $('#reset').on('click', function() {
            datePackingReset();
        });

        function datePackingReset() {

            $('#datefrom').val('');
            $('#dateto').val('');

            tableInputTransferArea.clear().draw();
            tableInputTransferArea = $('#tableInputTransferArea').DataTable({
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

                ajax: {
                    url: '<?= site_url('packing/ajax_get_all_in_reset'); ?>',
                    type: 'GET',

                },
                language: {
                    processing: '<i class="fa fa-spinner fa-spin fa-3x fa-fw"></i><br><div><p>Silahkan Menunggu...</p></div> ',
                    emptyTable: 'Tidak ada data',
                    lengthMenu: '_MENU_',
                },
                columns: [{
                        "data": null,
                        "className": "text-center align-middle",
                        "orderable": true,
                        "searchable": true,
                        // "width": "100px",
                        "render": function(data, type, row, meta) {
                            return meta.row + meta.settings._iDisplayStart + 1;
                        }
                    },
                    // {
                    //     "data": 'tgl',
                    //     "className": "text-center px-2 align-middle"
                    // },
                    {
                        "data": 'po',
                        "className": "text-center px-2 align-middle"
                    },
                    {
                        "data": 'style',
                        "className": "text-center px-2 align-middle"
                    },
                    {
                        "data": 'color',
                        "className": "text-center px-2 align-middle"
                    },
                    {
                        "data": 'orc',
                        "className": "text-center px-2 align-middle"
                    },
                    {
                        "data": 'jmlBox',
                        "className": "text-center px-2 align-middle"
                    },
                    {
                        "data": 'jmlPcs',
                        "className": "text-center px-2 align-middle"
                    },
                    {
                        "data": 'lokasi',
                        "className": "text-center px-2 align-middle"
                    },
                    {
                        "className": "text-center px-2 align-middle",
                        render: function(data, type, row, meta) {
                            return '<button class="btn btn-success btn-sm mx-1 btnShowSummaryTransferArea" id="btnShowSummaryTransferArea">Summary</button>' +
                                '<button class="btn btn-info btn-sm mx-1 btnShowDetailTransferArea" id="btnShowDetailTransferArea">Detail</button>';
                        }
                    },

                ],
                // "columnDefs": [{
                //         "targets": [0] ,
                //         "visible": false
                //     },
                //     {
                //         "targets": [8],
                //         "render": function(data, type, row, meta) {
                //             return '<button class="btn btn-success btn-sm mx-1 btnShowSummaryTransferArea" id="btnShowSummaryTransferArea">Summary</button>' +
                //                 '<button class="btn btn-info btn-sm mx-1 btnShowDetailTransferArea" id="btnShowDetailTransferArea">Detail</button>';
                //         }
                //     },
                // ],
                lengthMenu: [
                    [20, 50, 100, -1],
                    [20, 50, 100, 'All'],
                ],

            });

        }

        function datePacking() {

            datefrom = $('#datefrom').val();
            dateto = $('#dateto').val();

            datepicker = {
                'datefrom': datefrom,
                'dateto': dateto
            };

            tableInputTransferArea = $('#tableInputTransferArea').DataTable({
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

                ajax: {
                    url: '<?= site_url('packing/ajax_get_all_in'); ?>',
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
                        "className": "text-center align-middle",
                        "orderable": true,
                        "searchable": true,
                        // "width": "100px",
                        "render": function(data, type, row, meta) {
                            return meta.row + meta.settings._iDisplayStart + 1;
                        }
                    },
                    // {
                    //     "data": 'tgl',
                    //     "className": "text-center px-2 align-middle"
                    // },
                    {
                        "data": 'po',
                        "className": "text-center px-2 align-middle"
                    },
                    {
                        "data": 'style',
                        "className": "text-center px-2 align-middle"
                    },
                    {
                        "data": 'color',
                        "className": "text-center px-2 align-middle"
                    },
                    {
                        "data": 'orc',
                        "className": "text-center px-2 align-middle"
                    },
                    {
                        "data": 'jmlBox',
                        "className": "text-center px-2 align-middle"
                    },
                    {
                        "data": 'jmlPcs',
                        "className": "text-center px-2 align-middle"
                    },
                    {
                        "data": 'lokasi',
                        "className": "text-center px-2 align-middle"
                    },
                    {
                        "className": "text-center px-2 align-middle",
                        render: function(data, type, row, meta) {
                            return '<button class="btn btn-success btn-sm mx-1 btnShowSummaryTransferAreaDate" id="btnShowSummaryTransferAreaDate">Summary</button>' +
                                '<button class="btn btn-info btn-sm mx-1 btnShowDetailTransferArea" id="btnShowDetailTransferArea">Detail</button>';
                        }
                    },

                ],
                // "columnDefs": [{
                //         "targets": [0] ,
                //         "visible": false
                //     },
                //     {
                //         "targets": [8],
                //         "render": function(data, type, row, meta) {
                //             return '<button class="btn btn-success btn-sm mx-1 btnShowSummaryTransferArea" id="btnShowSummaryTransferArea">Summary</button>' +
                //                 '<button class="btn btn-info btn-sm mx-1 btnShowDetailTransferArea" id="btnShowDetailTransferArea">Detail</button>';
                //         }
                //     },
                // ],
                lengthMenu: [
                    [20, 50, 100, -1],
                    [20, 50, 100, 'All'],
                ],

            });

        }

        $('#tableInputTransferArea tbody').on('click', '#btnShowDetailTransferArea', function() {
            var orc = tableInputTransferArea.row($(this).parents('tr')).data().orc;
            window.open("<?= site_url("packing/detail_in_by_orc"); ?>/" + orc, "_self");

        })

        $('#tableInputTransferArea tbody').on('click', '#btnShowSummaryTransferAreaDate', function() {
            var datefrom = $('#datefrom').val();
            var dateto = $('#dateto').val();

            var orc = tableInputTransferArea.row($(this).parents('tr')).data().orc;
            window.open("<?= site_url("packing/summary_in_by_orc"); ?>/" + orc + '/' + datefrom + '/' + dateto, "_self");

        })

        $('#tableInputTransferArea tbody').on('click', '#btnShowSummaryTransferArea', function() {


            var orc = tableInputTransferArea.row($(this).parents('tr')).data().orc;
            window.open("<?= site_url("packing/summary_in_by_orc_reset"); ?>/" + orc, "_self");

        })


        $('#barcodeOperator').keypress(function(e) {
            if (e.keyCode == 13) {
                e.preventDefault();



                barcodeOp = $(this).val().toString();
                // console.log(barcodeOp)
                let barcodeOpValidate = opCodeRegex.test(barcodeOp);
                switch (barcodeOpValidate) {
                    case true:
                        cekBarcodeOp(barcodeOp);
                        break;
                    case false:
                        invalidBarcodeOp();
                        break;
                }
            }
        });

        function invalidBarcodeOp() {
            swal.fire({
                icon: 'warning',
                title: 'Peringatan!',
                html: 'Invalid barcode operator packing.',
                showConfirmButton: true
            }).then(function() {
                $('#barcodeOperator').val('');
                $('#barcodeOperator').focus();
            })
        }

        function cekBarcodeOp(oc) {
            $.ajax({
                type: 'GET',
                url: `<?= site_url("packing/ajax_get_by_barcode"); ?>/${oc}`,
                dataType: 'json'
            }).done(function(row) {
                // console.log('rowPackingMember: ', row);
                if (row == null) {
                    swal.fire({
                        icon: 'warning',
                        title: 'Peringatan!',
                        html: 'Barcode operator tidak ada di database.'
                    }).then(function() {
                        $('#barcodeOperator').val('');
                        $('#barcodeOperator').focus();
                    })
                } else {
                    zona = row.fg_zone;
                    $('#barcodeOperator').prop('disabled', true);
                    $('#barcodePacking').prop('disabled', false);
                    $('#barcodePacking').focus();
                }
            })
        }

        $('#barcodePacking').keypress(function(e) {
            if (e.keyCode == 13) {
                e.preventDefault();
                barcodePacking = $(this).val();
                // cekBarcodePacking(barcodePacking);
                let barcodePackingValidate = packingCodeRegex.test(barcodePacking);
                // console.log('barcodePackingValidate :', barcodePackingValidate);
                switch (barcodePackingValidate) {
                    case true:
                        cekBarcodePacking(barcodePacking);
                        break;
                    case false:
                        invalidBarcodePacking();
                        break;
                }

            }
        });

        function invalidBarcodePacking() {
            swal.fire({
                icon: 'warning',
                title: 'Peringatan!',
                html: 'Invalid barcode packing.',
                showConfirmButton: false,
                timer: 1000,
            }).then(function() {
                $('#barcodePacking').val('');
                $('#barcodePacking').focus();

                $('#barcodePackingPcs').val('');
                $('#barcodePackingPcs').focus();
            })
        }

        function cekBarcodePacking(pc) {
            var getOutputPackingDetail = $.ajax({
                type: 'GET',
                url: '<?= site_url("packing/ajax_join_get_by_barcode"); ?>/' + pc,
                dataType: 'json'
            });

            var checkInputTransferArea = $.ajax({
                type: 'GET',
                url: '<?= site_url("packing/ajax_check_by_barcode"); ?>/' + pc,
                dataType: 'json'
            });

            $.when(getOutputPackingDetail, checkInputTransferArea).done(function(outputPackingDetailRst, inputTransferAreaRst) {
                // console.log('okkkk');

                function cekAtTransferArea() {
                    var transferAreaStatus = {
                        get status() {
                            let status = true;
                            if (outputPackingDetailRst[0] == null || inputTransferAreaRst[0] > 0) {
                                status = false;
                            }
                            return status;
                        },

                        get msg() {
                            let message = '';
                            if (outputPackingDetailRst[0] == null) {
                                message = 'Barcode packing tidak ditemukan di database!';
                            } else if (inputTransferAreaRst[0] > 0) {
                                message = 'Barcode packing sudah di scan!!';
                            }
                            return message;
                        }
                    }

                    if (!transferAreaStatus.status) {
                        swal.fire({
                            icon: 'warning',
                            title: 'Peringatan!',
                            html: `${transferAreaStatus.msg}`,
                            showConfirmButton: true
                        }).then(function() {
                            $('#barcodePacking').val('');
                            $('#barcodePacking').focus();
                        })
                    } else {
                        // console.log('bebasss');
                        // addToTempTable();
                        saveToTransferArea();
                    }
                }
                cekAtTransferArea();

                function saveToTransferArea() {


                    var dataForTransferArea = {
                        // 'tgl_in': dateNow,
                        'style': outputPackingDetailRst[0].style,
                        'color': outputPackingDetailRst[0].color,
                        'orc': outputPackingDetailRst[0].orc,
                        'size': outputPackingDetailRst[0].size,
                        'carton_no': parseInt(outputPackingDetailRst[0].no_box),
                        'qty_box': parseInt(outputPackingDetailRst[0].qty),
                        'barcode': outputPackingDetailRst[0].barcode,
                        'barcode_operator': $('#barcodeOperator').val(),
                        'status': 'in'
                    }
                    // console.log('dataForTransferArea:', dataForTransferArea);
                    //menentukan lokasi line
                    $.ajax({
                        type: 'GET',
                        url: '<?= site_url("packing/ajax_get_by_orc"); ?>/' + dataForTransferArea.orc,
                        dataType: 'json',
                    }).done(function(row) {
                        // console.log('row: ', row);
                        if (row['data'] != null) {
                            dataForTransferArea.lokasi = row['data']['lokasi']
                        } else {
                            dataForTransferArea.lokasi = 'sementara'
                        }

                        // simpan ke database
                        $.ajax({
                            type: 'POST',
                            url: '<?= site_url("packing/ajax_save_transfer_area"); ?>',
                            data: {
                                'dataForTransferArea': dataForTransferArea
                            },
                            dataType: 'json'
                        }).done(function(id) {
                            if (id > 0) {
                                swal.fire({
                                    icon: 'success',
                                    title: 'Success',
                                    html: 'Data berhasil disimpan.',
                                    showConfirmButton: false,
                                    timer: 500,

                                }).then(function() {
                                    $('#barcodePacking').val('');
                                    $('#barcodePacking').focus();
                                    loadTable();

                                    //tambahkan ke table temp
                                    noUrut++;
                                    tableInputTransferAreaTemp.row.add([
                                        noUrut,
                                        dataForTransferArea.orc,
                                        dataForTransferArea.style,
                                        dataForTransferArea.color,
                                        dataForTransferArea.size,
                                        dataForTransferArea.carton_no,
                                        dataForTransferArea.qty_box,
                                        dataForTransferArea.barcode,
                                        dataForTransferArea.lokasi,
                                    ]).draw();
                                })
                            }
                        })
                    })
                }
            });

        }

        function loadTable() {
            tableInputTransferArea.ajax.reload(null, false);
        }

        $('#barcodePackingPcs').keypress(function(e) {
            if (e.keyCode == 13) {
                e.preventDefault();
                // console.log('okkkkk');
                barcodePackingPcs = $(this).val();
                let barcodePackingPcsValidate = packingCodeRegex.test(barcodePackingPcs);
                // console.log('barcodePackingPcsValidate:', barcodePackingPcsValidate);


                switch (barcodePackingPcsValidate) {
                    case true:
                        cekBarcodePackingPcs(barcodePackingPcs);
                        break;
                    case false:
                        invalidBarcodePacking();
                        break;
                }

            }
        });

        function cekBarcodePackingPcs(pc) {
            var getOutputPackingDetail = $.ajax({
                type: 'GET',
                url: `<?= site_url("packing/ajax_join_get_by_barcode"); ?>/${pc}`,
                dataType: 'json'
            });

            var checkInputTransferAreaPcs = $.ajax({
                type: 'GET',
                url: `<?= site_url("packing/ajax_check_by_barcode"); ?>/${pc}`,
                dataType: 'json'
            });

            $.when(getOutputPackingDetail, checkInputTransferAreaPcs).done(function(outputPackingDetailRst, inputTransferAreaPcsRst) {
                // console.log('outputPackingDetailRst:', outputPackingDetailRst);

                function cekAtTransferAreaPcs() {
                    var transferAreaPcsStatus = {
                        get status() {
                            let status = true;
                            if (outputPackingDetailRst[0] == null || inputTransferAreaPcsRst[0] > 0) {
                                status = false;
                            }
                            return status;
                        },

                        get msg() {
                            let message = '';
                            if (outputPackingDetailRst[0] == null) {
                                message = 'Barcode packing tidak ditemukan di database!';
                            } else if (inputTransferAreaPcsRst[0] > 0) {
                                message = 'Barcode packing sudah di scan!!';
                            }
                            return message;
                        }
                    }

                    if (!transferAreaPcsStatus.status) {
                        swal.fire({
                            icon: 'warning',
                            title: 'Peringatan!',
                            html: `${transferAreaPcsStatus.msg}`,
                            showConfirmButton: true
                        }).then(function() {
                            $('#barcodePackingPcs').val('');
                            $('#barcodePackingPcs').focus();
                        });
                    } else {
                        // addToTempTable();
                        // saveToTransferAreaPcs();
                        $('#btnUpdatePcsBox').prop('disabled', false);
                        $('#orc').val(outputPackingDetailRst[0].orc);
                        $('#style').val(outputPackingDetailRst[0].style);
                        $('#color').val(outputPackingDetailRst[0].color);
                        $('#size').val(outputPackingDetailRst[0].size);
                        $('#no_bundle').val(outputPackingDetailRst[0].no_box);
                        $('#pcs').val(outputPackingDetailRst[0].qty);
                        $('#new_pcs').val(outputPackingDetailRst[0].qty);
                        $('#new_pcs').attr({
                            'max': outputPackingDetailRst[0].qty
                        });
                        $('#new_pcs').focus();
                    }
                }
                cekAtTransferAreaPcs();

            });

        }

        $('#btnUpdatePcsBox').click(function() {
            saveToTransferAreaPcs();
        });

        function saveToTransferAreaPcs() {
            const dateFormat = 'YYYY-MM-DD HH:mm:ss';
            var date = new Date();
            var dateNow = moment(date).format(dateFormat);
            var dataForTransferAreaPcs = {
                'tgl_in': dateNow,
                'style': $('#style').val(),
                'color': $('#color').val(),
                'orc': $('#orc').val(),
                'size': $('#size').val(),
                'carton_no': $('#no_bundle').val(),
                'qty_box': parseInt($('#new_pcs').val()),
                'barcode': $('#barcodePackingPcs').val(),
                'lokasi': 'Line 1A',
                'status': 'in'
            }

            // simpan ke database
            $.ajax({
                type: 'POST',
                url: '<?= site_url("packing/ajax_save_transfer_area_pcs"); ?>',
                data: {
                    'dataForTransferAreaPcs': dataForTransferAreaPcs
                },
                dataType: 'json'
            }).done(function(id) {
                if (id > 0) {
                    swal.fire({
                        icon: 'success',
                        title: 'Berhasil',
                        html: 'Data berhasil disimpan.',
                        showConfirmButton: false,
                        timer: 750,

                    }).then(function() {
                        noUrutPcs++;
                        tableInputTransferAreaPcsTemp.row.add([
                            noUrutPcs,
                            dataForTransferAreaPcs.orc,
                            dataForTransferAreaPcs.style,
                            dataForTransferAreaPcs.color,
                            dataForTransferAreaPcs.size,
                            dataForTransferAreaPcs.carton_no,
                            dataForTransferAreaPcs.qty_box,
                            dataForTransferAreaPcs.barcode,
                            dataForTransferAreaPcs.lokasi
                        ]).draw();
                        clearControls();
                        $('#barcodePackingPcs').focus();
                        $('#btnUpdatePcsBox').prop('disabled', true);
                        loadTable();
                    })
                }
            })
        }

        $('#btnCancelPcsBox').click(function() {
            clearControls();
            $('#barcodePackingPcs').focus();
        });

        function clearControls() {
            $('#style').val('');
            $('#color').val('');
            $('#orc').val('');
            $('#size').val('');
            $('#no_bundle').val('');
            $('#pcs').val('0');
            $('#new_pcs').val('0');
            $('#barcodePackingPcs').val('');
        }

        $('#btnInputManual').click(function() {
            $('#modalInputFG').modal('show');
        });

        $('#modalInputFG').on('hidden.bs.modal', function() {
            clearInputManual();
        });

        $('#modalInputFG').on('shown.bs.modal', function() {
            $('#orcManual').focus();
        });

        const clearInputManual = () => {
            $('.inputManual').val('');
        }

        $('#btnCancelManual').click(function() {
            clearInputManual();
            $('#orcManual').focus();
        })

        // $('#lineManual').select2();

        const getAllLines = () => {
            $.ajax({
                type: 'GET',
                url: '<?= site_url("packing/ajax_get_all_lokasi_packing"); ?>',
                dataType: 'json'
            }).done(function(data) {
                $.each(data, function(i, item) {
                    $('#lineManual').append($('<option>', {
                        value: item.line,
                        text: item.line
                    })).trigger('change')
                })
            })
        }

        getAllLines();

        $('form[id="formInputManual"]').validate({
            rules: {
                orcManual: {
                    'required': true,
                    // 'minlength': 10
                },
                styleManual: {
                    'required': true
                },
                colorManual: {
                    'required': true
                },
                sizeManual: {
                    'required': true
                },
                pcsManual: {
                    'required': true
                },
                lineManual: {
                    'required': true
                },
            },
            errorClass: 'error fail-alert',
            validClass: 'valid success-alert',
            messages: {
                orcManual: {
                    required: 'ORC harus diisi!',
                    minlength: 'ORC harus diisi lengkap!'
                },
                styleManual: {
                    required: 'Style harus diisi!'
                },
                colorManual: {
                    required: 'Color harus diisi!'
                },
                sizeManual: {
                    required: 'Size harus diisi!'
                },
                pcsManual: {
                    required: 'Pcs harus diisi!'
                },
                lineManual: {
                    required: 'Line harus diisi!'
                },

            },
            submitHandler: function(form, e) {
                e.preventDefault();

                let data = $(form).serializeArray();
                // console.log('data: ', data);
                let dataForFGPcs = {};
                const dateFormat = 'YYYY-MM-DD HH:mm:ss';
                var date = new Date();
                var dateNow = moment(date).format(dateFormat);

                dataForFGPcs.tgl_in = dateNow;
                dataForFGPcs.orc = data[0].value;
                dataForFGPcs.style = data[1].value;
                dataForFGPcs.color = data[2].value;
                dataForFGPcs.size = data[3].value;
                dataForFGPcs.carton_no = data[4].value;
                dataForFGPcs.qty_box = data[5].value;
                dataForFGPcs.barcode = " - "
                dataForFGPcs.lokasi = data[6].value;
                dataForFGPcs.status = "in";

                $.ajax({
                    type: 'POST',
                    url: '<?= site_url("packing/ajax_save_transfer_area_pcs"); ?>',
                    data: {
                        'dataForTransferAreaPcs': dataForFGPcs
                    },
                    dataType: 'json'
                }).done(function(id) {
                    if (id > 0) {
                        swal.fire({
                            icon: 'success',
                            title: 'Berhasil',
                            html: 'Data berhasil disimpan.',
                            showConfirmButton: false,
                            timer: 750
                        }).then(function() {
                            //tambahkan ke table temp
                            noUrutPcs++;
                            tableInputTransferAreaPcsTemp.row.add([
                                noUrutPcs,
                                dataForFGPcs.orc,
                                dataForFGPcs.style,
                                dataForFGPcs.color,
                                dataForFGPcs.size,
                                dataForFGPcs.carton_no,
                                dataForFGPcs.qty_box,
                                '-',
                                dataForFGPcs.lokasi
                            ]).draw();
                            clearInputManual();
                            $('#orcManual').focus();
                        })
                    }
                })

                return false;

            }
        });

    })
</script>