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
                        <li class="breadcrumb-item active" aria-current="page">Output Mixed Size</li>
                    </ol>
                </nav>
            </div>
        </div>
        <h6 class="mb-0 text-uppercase">Output Mixed Size Packing List</h6>
        <hr />
        <div class="row">
            <div class="col-12 ">
                <div class="card rounded-4 w-100">
                    <div class="card-body">
                        <div class="mx-3 my-3">

                            <div class="mb-5 mt-4 row">
                                <label for="barcode" class="col-sm-1 col-form-label">Barcode</label>
                                <div class="col-sm-3">
                                    <input type="text" class="form-control" id="barcode">
                                </div>
                            </div>

                            <!-- <div class="form-group row">
                                <div class="col-sm-1">
                                    <label for="qty" class="form-label">Barcode</label>
                                </div>
                                <div class="col-md-3">
                                    <input type="text" class="form-control" id="barcode" required>
                                </div>
                            </div> -->


                            <!-- <div class="table-responsive"> -->
                            <table id="outputMixedSizePackingTable" class="table table-striped table-bordered table-hover nowrap" style="width:100%">
                                <thead>
                                    <th>No.</th>
                                    <th>PO Number</th>
                                    <th>ORC</th>
                                    <th>Style</th>
                                    <th>Color</th>
                                    <th>Total Box</th>
                                    <th>Scanned Box</th>
                                    <th>Action</th>
                                </thead>

                            </table>
                            <!-- </div> -->

                        </div>

                    </div>
                </div>
            </div>

            <div class="col">
                <div class="modal fade" id="detailsOutputMixedPackingListModal" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Data Detail Input Packing</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="form-group row" style="margin-bottom: -10px;">
                                    <label for="transaction_number_modal" class="col-lg-2 col-sm-4 col-form-label">ORC</label>
                                    <div class="col-lg-10 col-sm-6 col-12 mb-lg-2 mb-sm-0">
                                        <label id="orc_modal" class="col-form-label"></label>
                                    </div>
                                </div>
                                <div class="form-group row" style="margin-bottom: -10px;">
                                    <label for="transaction_number_modal" class="col-lg-2 col-sm-4 col-form-label">Style</label>
                                    <div class="col-lg-10 col-sm-6 col-12 mb-lg-2 mb-sm-0">
                                        <label id="style_modal" class="col-form-label"></label>
                                    </div>
                                </div>
                                <div class="form-group row mb-2" style="margin-bottom: -10px;">
                                    <label for="transaction_number_modal" class="col-lg-2 col-sm-4 col-form-label">Color</label>
                                    <div class="col-lg-10 col-sm-6 col-12 mb-lg-2 mb-sm-0">
                                        <label id="color_modal" class="col-form-label"></label>
                                    </div>
                                </div>
                                <div class="table-responsive">
                                    <table id="outputMixedSizePackingDetailsTable" class="table table-striped table-bordered" style="width:100%">
                                        <thead>
                                            <th>No.</th>
                                            <th>Scan Out Date</th>
                                            <th>Barcode</th>
                                            <th>Box Numb.</th>
                                            <th>Size</th>
                                            <th>Qty In</th>
                                            <th>Qty Out</th>
                                        </thead>
                                        <tbody>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th colspan="5">Total PCS</th>
                                                <th></th>
                                                <th></th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
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
    $(document).ready(function() {

        // Main Table
        let outputMixedSizePackingTable = $('#outputMixedSizePackingTable').DataTable({
            autoWidth: false,
            info: true,
            searching: true,
            paging: true,
            scrollX: true,
            fixedHeader: true,
            // stateSave: true,
            destroy: true,
            // dom: '<"top"Bfl>rt<"bottom"ip>',
            buttons: [{
                extend: 'colvis',
                className: 'mx-3 rounded'
            }, ],
            lengthMenu: [
                [10, 25, 50, 100],
                [10, 25, 50, 100]
            ],
            ajax: {
                url: '<?= site_url('packing/getOutputMixedSizePackingTable'); ?>',
                type: 'GET'
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
                    'data': 'po',
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
                    'data': 'box',
                    'className': 'text-center px-2'
                },
                {
                    'data': 'total_actual_box',
                    'className': 'text-center px-2'
                },
                {
                    'className': 'text-center',
                    render: function(data, type, row) {
                        return "<span id='btn_details' class='badge bg-info' style='cursor: pointer;'>Details</span>"
                    }
                }
            ],


        });

        $('#barcode').focus();
        $('#barcode').keypress(function(e) {

            if (e.keyCode == 13) {
                barcode = $(this).val();

                if (barcode != "") {
                    $.post('<?= site_url("packing/getMixedPackingCheckingBarcodeRegistered/"); ?>' + barcode, function(id) {
                        if (id > 0) {

                            $.post('<?= site_url("packing/getMixedPackingCheckingBarcode/"); ?>' + barcode, function(ids) {
                                if (ids > 0) {
                                    swal.fire(
                                        'Warning!',
                                        "Barcode sudah di scan.",
                                        'warning'
                                    ).then(function() {
                                        $('#barcode').val("")
                                    });
                                } else {
                                    $.getJSON('<?= site_url("packing/getMixedBarcodeDetails/"); ?>' + barcode, function(data) {
                                        orc = data[0].orc;
                                        box_number = data[0].box_number;
                                        id_mixed = data[0].id_mixed;
                                        id_order = data[0].id_order;

                                        $.ajax({
                                            type: "POST",
                                            url: "<?= site_url('packing/postOutputMixedSizePacking') ?>",
                                            dataType: "JSON",
                                            data: {
                                                'barcode': barcode,
                                                'orc': orc,
                                                'box_number': box_number,
                                                'id_mixed': id_mixed,
                                                'id_order': id_order
                                            },
                                            success: function(data) {
                                                swal.fire({
                                                    icon: 'success',
                                                    title: 'Success!',
                                                    text: 'Data berhasil disimpan.',
                                                    timer: 1000,
                                                    showCancelButton: false,
                                                    showConfirmButton: false
                                                }).then(function() {
                                                    outputMixedSizePackingTable.ajax.reload();
                                                });
                                                $("#barcode").val('');
                                                $("#barcode").focus();;
                                            }
                                        });

                                    });
                                }
                            });

                        } else {
                            swal.fire(
                                'Warning!',
                                "Barcode tidak terdaftar.",
                                'warning'
                            ).then(function() {
                                $('#barcode').val("")
                            });
                        }
                    });

                } else {
                    swal.fire(
                        'Warning',
                        'This form is required.',
                        'warning'
                    );
                }
                return false;
            }
        });

        // Button details
        $('#outputMixedSizePackingTable tbody').on('click', '#btn_details', function() {

            let id_order = outputMixedSizePackingTable.row($(this).parents('tr')).data().id_order;
            let orc = outputMixedSizePackingTable.row($(this).parents('tr')).data().orc;
            let style = outputMixedSizePackingTable.row($(this).parents('tr')).data().style;
            let color = outputMixedSizePackingTable.row($(this).parents('tr')).data().color;

            $("#orc_modal").html(": " + orc);
            $("#style_modal").html(": " + style);
            $("#color_modal").html(": " + color);

            let outputMixedSizePackingDetailsTable = $('#outputMixedSizePackingDetailsTable').DataTable({
                autoWidth: false,
                info: true,
                searching: true,
                paging: true,
                scrollX: true,

                destroy: true,
                lengthMenu: [
                    [10, 25, 50, 100],
                    [10, 25, 50, 100]
                ],
                ajax: {
                    url: '<?= site_url('packing/getOutputMixedSizePackingListDetails'); ?>',
                    type: 'GET',
                    data: {
                        'id_order': id_order
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
                        'data': 'created_date',
                        'className': 'text-center px-2'
                    },
                    {
                        'data': 'barcode',
                        'className': 'text-center px-2'
                    },
                    {
                        'data': 'box_number',
                        'className': 'text-center px-2'
                    },
                    {
                        'data': 'size',
                        'className': 'text-center px-2'
                    },
                    {
                        'data': 'qty_in',
                        'className': 'text-center px-2'
                    },
                    {
                        'data': 'qty_out',
                        'className': 'text-center px-2'
                    }
                ],

                footerCallback: function(row, data, start, end, display) {
                    let api = this.api();

                    // Remove the formatting to get integer data for summation
                    let intVal = function(i) {
                        return typeof i === 'string' ? i.replace(/[\$,]/g, '') * 1 : typeof i === 'number' ? i : 0;
                    };

                    // Total over this page
                    pageTotal1 = api
                        .column(5, {
                            page: 'current'
                        })
                        .data()
                        .reduce((a, b) => intVal(a) + intVal(b), 0);

                    total_value1 = api
                        .column(5)
                        .data()
                        .reduce(function(a, b) {
                            return intVal(a) + intVal(b);
                        }, 0);

                    // Total over this page
                    pageTotal2 = api
                        .column(6, {
                            page: 'current'
                        })
                        .data()
                        .reduce((a, b) => intVal(a) + intVal(b), 0);

                    total_value2 = api
                        .column(6)
                        .data()
                        .reduce(function(a, b) {
                            return intVal(a) + intVal(b);
                        }, 0);


                    if (total_value1 != 0) {
                        $(api.column(5).footer()).html(pageTotal1 + ' (' + total_value1 + ')');
                    } else {
                        $(api.column(5).footer()).html('-');
                    }

                    if (total_value2 != 0) {
                        $(api.column(6).footer()).html(pageTotal2 + ' (' + total_value2 + ')');
                    } else {
                        $(api.column(6).footer()).html('-');
                    }

                },

            });

            $("#detailsOutputMixedPackingListModal").on('shown.bs.modal', function() {
                $('#outputMixedSizePackingDetailsTable').DataTable().columns.adjust();
            });

            $("#detailsOutputMixedPackingListModal").modal("show");


        });


        // Button Print Packing List
        $('#packingListTable tbody').on('click', 'button.btnPrintPackingList', function() {
            let po = table.row($(this).parents('tr')).data().po;

            open("<?= site_url("Packing/getExcelPackingList/"); ?>" + po);
        });


        $('#packingListTable tbody').on('click', 'button.btnGenerateBarcode', function() {
            var selRow = table.row($(this).parents('tr')).data();
            open("<?php echo site_url("Packing/ajax_barcode_mixed_print_preview"); ?>/" + selRow.po, '_blank');
        });


        // Button delete
        $('#packingListTable tbody').on('click', '#btnDeletePackingList', function() {

            let id_order = table.row($(this).parents('tr')).data().id_order;

            swal.fire({
                icon: 'warning',
                title: 'Warning!',
                text: "Apakah anda yakin?",
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya',
                cancelButtonText: 'Batal',
            }).then(function(result) {
                if (result.value) {
                    $.ajax({
                        url: "<?= site_url('Packing/deleteMixedPackingList'); ?>",
                        type: 'POST',
                        data: {
                            'id_order': id_order
                        },
                        success: function(data) {
                            swal.fire(
                                'Success!',
                                'Data berhasil dihapus.',
                                'success'
                            ).then(function() {
                                table.ajax.reload(null, false);
                            })
                        }
                    });
                }
            });

        });


        var toolbar = "<div class='form-group row'>" +
            "<div class='btn-group' role='toolbar'>" +
            "<a href='<?php echo site_url("Packing/add_packing_mixed_new"); ?>' id='btnAddNewPackingList' class='btn btn-primary'><i class='fa fa-plus'></i> Add New</a>" +
            "</div>" +
            "</div>";

        $("div.toolbar").html(toolbar);

        function reloadTable() {
            table.ajax.reload(null, false);
        }

    });
</script>