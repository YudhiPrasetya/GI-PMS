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
                        <li class="breadcrumb-item active" aria-current="page">Finish Good (Out)</li>
                    </ol>
                </nav>
            </div>
        </div>
        <h6 class="mb-0 text-uppercase">Finish Good (Out)</h6>
        <hr />
        <div class="row">
            <div class="col-12 ">
                <div class="card rounded-4 w-100">
                    <div class="card-body">
                        <div class="mx-3 my-3">

                            <div class="row mb-3">
                                <div class="col-lg-1">
                                    <label for="orc" class="col-form-label">ORC</label>
                                </div>
                                <div class="col-lg-3">
                                    <select class="single_select" id="orc" style="width: 100%;"></select>
                                </div>
                            </div>

                            <!-- <div class="table-responsive"> -->
                            <table class="table table-bordered table-striped table-hover table-sm nowrap" id="tableTransferAreaIn" style="width:100%;">
                                <thead>
                                    <tr>
                                        <th class="text-center">ID</th>
                                        <th class="text-center">No.</th>
                                        <th class="text-center">PO</th>
                                        <th class="text-center">ORC</th>
                                        <th class="text-center">Style</th>
                                        <th class="text-center">Color</th>
                                        <th class="text-center">Size</th>
                                        <th class="text-center">No. Box</th>
                                        <th class="text-center">Qty Pcs</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th colspan="8" class="text-center">Total</th>
                                        <th></th>
                                    </tr>
                                </tfoot>
                            </table>
                            <!-- </div> -->

                        </div>

                    </div>
                </div>
            </div>
        </div><!--end row-->

        <h6 class="mb-0 text-uppercase mt-4">List of Transfer Area (OUT)</h6>
        <hr />
        <div class="row">
            <div class="col-12 ">
                <div class="card rounded-4 w-100">
                    <div class="card-body">
                        <div class="mx-3 my-3">

                            <!-- <div class="table-responsive"> -->
                            <table class="table table-hover table-striped table-bordered table-sm nowrap" style="width:100%" id="tableTransferAreaOut">
                                <thead>
                                    <tr>
                                        <th class="text-center">No.</th>
                                        <th class="text-center">Date</th>
                                        <th class="text-center">PO</th>
                                        <th class="text-center">Style</th>
                                        <th class="text-center">Color</th>
                                        <th class="text-center">ORC</th>
                                        <th class="text-center">Total Box</th>
                                        <th class="text-center">Total Pcs</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                            </table>
                            <!-- </div> -->

                        </div>

                    </div>
                </div>
            </div>

        </div><!--end row-->

    </div>
</div>
<!--end page wrapper -->



<!-- Modal -->
<!-- Modal Output Transfer Area Size Details -->
<div class="modal fade" id="transferAreaOutDetailsModal" tabindex="-1" aria-labelledby="transferAreaOutDetailsLabelModal" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="transferAreaOutDetailsLabelModal">Transfer Area (Out) Details</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="mx-3 my-3">

                    <table id="tableTransferAreaOutDetails" class="table table-striped table-bordered table-hover table-sm nowrap" style="width:100%;">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Date</th>
                                <th>PO</th>
                                <th>Style</th>
                                <th>Color</th>
                                <th>ORC</th>
                                <th>Size</th>
                                <th>No.Box</th>
                                <th>Qty</th>
                                <th>Barcode</th>
                                <th>Location</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <th colspan="8">Total</th>
                            <th></th>
                            <th></th>
                            <th></th>
                        </tfoot>
                    </table>

                </div>
            </div>
            <!-- <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div> -->
        </div>
    </div>
</div>





<script>
    $('.single_select').select2({
        theme: 'bootstrap-5',
        width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style',

    });
</script>
<script>
    $(document).ready(function() {
        var barcodeOp, barcodePacking, noUrut = 0,
            selectedTAInRows = null;

        $('#tglOut').val(new Date().toJSON().slice(0, 10));

        var tableTransferAreaIn = $('#tableTransferAreaIn').DataTable({
            destroy: true,
            select: {
                style: 'multi'
            }
        })

        var listORC = $.ajax({
            type: 'GET',
            url: '<?= site_url("packing/ajax_get_distinct_orc_packing"); ?>',
            dataType: 'json'
        });

        listORC.done(function(rst) {
            $('#orc').empty();
            $('#orc').append($('<option>', {
                value: "",
                text: "- Select ORC -"
            }));
            $.each(rst, function(i, itm) {
                $('#orc').append($('<option>', {
                    value: itm.orc,
                    text: itm.orc
                }));
            });
            // $('#orc').select2('open').trigger('change');
        });

        $('#orc').change(function() {
            let orc = $(this).val();
            loadTableTAIn(orc);
        });

        function loadTableTAIn(o) {
            tableTransferAreaIn = $('#tableTransferAreaIn').DataTable({
                destroy: true,
                processing: true,
                dom: 'lfBrtip',
                select: {
                    style: 'multi'
                },
                buttons: [{
                        text: 'Select All',
                        action: function() {
                            tableTransferAreaIn.rows({
                                page: 'all'
                            }).select();
                            getSelectedTAIn();

                        }
                    },
                    {
                        text: 'Select All On Page',
                        action: function() {
                            tableTransferAreaIn.rows({
                                page: 'current'
                            }).select();
                            getSelectedTAIn()
                        }
                    },
                    {
                        text: 'Deselect All',
                        action: function() {
                            tableTransferAreaIn.rows({
                                page: 'all'
                            }).deselect();
                            getSelectedTAIn();
                        }
                    },
                    {
                        text: 'Deselect All On Page',
                        action: function() {
                            tableTransferAreaIn.rows({
                                page: 'current'
                            }).deselect();
                            getSelectedTAIn();
                        }
                    },
                    {
                        text: 'Get Out',
                        action: () => {
                            if (selectedTAInRows == null) {
                                swal.fire({
                                    icon: 'warning',
                                    text: 'Peringatan!',
                                    title: 'Pilih data yang akan dikeluarkan terlebih dahulu!',
                                    showConfirmButton: true
                                });
                                return false;
                            }

                            let dataForTransferAreaOut = [];

                            $.each(selectedTAInRows, function(i, itm) {
                                dataForTransferAreaOut.push({
                                    'id_transfer_area': itm.id_transfer_area,
                                    'status': 'out'
                                });
                            });

                            $.ajax({
                                type: 'POST',
                                url: '<?= site_url("packing/ajax_update_batch_transfer_area"); ?>',
                                data: {
                                    'dataForTransferAreaOut': dataForTransferAreaOut
                                },
                                dataType: 'json'
                            }).done(function(rowAff) {
                                if (rowAff > 0) {
                                    swal.fire({
                                        icon: 'success',
                                        title: 'Berhasil',
                                        text: 'Data berhasil diUpdate',
                                        timer: 750,
                                        showCancelButton: false,

                                    }).then(function() {
                                        tableTransferAreaIn.rows({
                                            page: 'all'
                                        }).deselect();
                                        $('#orc').select2('open');
                                        loadTableOut();
                                        // tableTransferAreaOut.ajax.reload(null, false);
                                        tableTransferAreaIn.ajax.reload(null, false);
                                    })
                                }
                            })
                        }
                    }
                ],
                // scrollY: '200px',
                // scrollCollapse: true,
                ajax: {
                    type: 'POST',
                    url: '<?= site_url("packing/ajax_get_by_orc_in"); ?>/' + o,
                    dataType: 'json'
                },
                columns: [{
                        'data': 'id_transfer_area',
                        'className': 'text-center px-2 align-middle'
                    },
                    {
                        'data': null,
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
                        'data': 'size',
                        'className': 'text-center px-2 align-middle'
                    },
                    {
                        'data': 'carton_no',
                        'className': 'text-center px-2 align-middle'
                    },
                    {
                        'data': 'qty_box',
                        'className': 'text-center px-2 align-middle'
                    },

                ],
                columnDefs: [{
                    'targets': [0],
                    visible: false
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

                    // Update footer
                    $(api.column(8).footer()).html(
                        pageTotal + ' (' + total + ')'
                    );
                }
            });

            tableTransferAreaIn.on('order.dt search.dt', function() {
                tableTransferAreaIn.column(1, {
                    search: 'applied',
                    order: 'applied'
                }).nodes().each(function(cell, i) {
                    cell.innerHTML = i + 1;
                });
            }).draw();

        }

        $('#tableTransferAreaIn tbody').on('click', 'tr', function() {
            $(this).toggleClass('selected');
            getSelectedTAIn();
        })

        function getSelectedTAIn() {
            selectedTAInRows = tableTransferAreaIn.rows('.selected').data();
            console.log(selectedTAInRows.length);

        }


        let tableTransferAreaOut = $('#tableTransferAreaOut').DataTable({
            autoWidth: true,
            // processing: true,
            destroy: true,
            // lengthMenu: [
            //     [5, 10, 15, 20, 25, 75, 100],
            //     [5, 10, 15, 20, 25, 75, 100]
            // ],
            // select: {
            //     style: "single"
            // },
            ajax: {
                url: "<?php echo site_url('packing/ajax_get_all_out'); ?>",
                type: "GET",
                dataType: "json",
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
                    "data": 'tgl',
                    'className': 'text-center px-2 align-middle'
                },
                {
                    "data": 'po',
                    'className': 'text-center px-2 align-middle'
                },
                {
                    "data": 'style',
                    'className': 'text-center px-2 align-middle'
                },
                {
                    "data": 'color',
                    'className': 'text-center px-2 align-middle'
                },
                {
                    "data": 'orc',
                    'className': 'text-center px-2 align-middle'
                },
                {
                    "data": 'jmlBox',
                    'className': 'text-center px-2 align-middle'
                },
                {
                    "data": 'jmlPcs',
                    'className': 'text-center px-2 align-middle'
                },
                {
                    'className': 'text-center px-2 align-middle',
                    "render": function(data, type, row, meta) {
                        return '<button class="btn btn-info btn-sm btnShowDetailTransferAreaOut">Detail</button>';
                    }
                },

            ],
        });

        // tableTransferAreaOut.on('order.dt search.dt', function() {
        //     tableTransferAreaOut.column(0, {
        //         search: 'applied',
        //         order: 'applied'
        //     }).nodes().each(function(cell, i) {
        //         cell.innerHTML = i + 1;
        //     });
        // }).draw();

        // $('#tableTransferAreaOut tbody').on('click', 'button.btnShowDetailTransferAreaOut', function() {
        //     let selectedRow = tableTransferAreaOut.row($(this).parents('tr')).data();
        //     console.log('selectedRow: ', selectedRow);
        //     open(`< ?= site_url("packing/ajax_show_detail_out_by_orc"); ?>/${selectedRow.orc}`, '_self');

        // });

        // Click qty cutting (load size details)
        $('#tableTransferAreaOut tbody').on('click', 'button.btnShowDetailTransferAreaOut', function() {
            let orc = tableTransferAreaOut.row($(this).parents('tr')).data().orc;

            let tableTransferAreaOutDetails = $('#tableTransferAreaOutDetails').DataTable({
                autoWidth: false,
                // aaSorting: false,
                buttons: ['excel', 'print'],
                dom: '<"top"Blf>rt<"bottom"ip>',
                // info: false,
                // searching: false,
                // paging: false,
                scrollX: true,
                fixedHeader: true,
                // lengthMenu: false,
                destroy: true,
                ajax: {
                    url: '<?= site_url('packing/ajax_show_detail_out_by_orc'); ?>',
                    type: 'GET',
                    data: {
                        'orc': orc
                    }
                },
                columns: [{
                        "data": null,
                        "className": "text-center",
                        "orderable": true,
                        "searchable": false,
                        // "width": "100px",
                        "render": function(data, type, row, meta) {
                            return meta.row + meta.settings._iDisplayStart + 1;
                        }
                    },
                    {
                        'data': 'tgl_out',
                        'className': 'text-center px-2'
                    },
                    {
                        'data': 'po',
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
                        'data': 'orc',
                        'className': 'text-center px-2'
                    },
                    {
                        'data': 'size',
                        'className': 'text-center px-2'
                    },
                    {
                        'data': 'carton_no',
                        'className': 'text-center px-2'
                    },
                    {
                        'data': 'qty_box',
                        'className': 'text-center px-2'
                    },
                    {
                        'data': 'barcode',
                        'className': 'text-center px-2'
                    },
                    {
                        'className': 'text-center px-2 align-middle',
                        "render": function(data, type, row, meta) {
                            if (row['lokasi'] == 'sementara') {
                                return 'Temporary';
                            } else {
                                return row['lokasi'];
                            }
                        }
                    },
                ],

                footerCallback: function(row, data, start, end, display) {
                    let api = this.api();

                    // Remove the formatting to get integer data for summation
                    let intVal = function(i) {
                        return typeof i === 'string' ?
                            i.replace(/[\$,]/g, '') * 1 :
                            typeof i === 'number' ?
                            i :
                            0;
                    };


                    // Total over all pages
                    total = api
                        .column(8)
                        .data()
                        .reduce((a, b) => intVal(a) + intVal(b), 0);

                    // Total over this page
                    pageTotal = api
                        .column(8, {
                            page: 'current'
                        })
                        .data()
                        .reduce((a, b) => intVal(a) + intVal(b), 0);

                    // Update footer
                    api.column(8).footer().innerHTML =
                        pageTotal + ' ( ' + total + ' )';
                }


            });

            $("#transferAreaOutDetailsModal").on('shown.bs.modal', function() {
                $('#tableTransferAreaOutDetails').DataTable().columns.adjust();
            });

            $("#transferAreaOutDetailsModal").modal("show");
        });

        function loadTableOut() {
            tableTransferAreaOut.ajax.reload(null, false);
        }

    })
</script>