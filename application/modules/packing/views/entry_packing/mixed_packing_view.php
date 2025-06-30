<div class="page-wrapper">
    <div class="page-content">
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Packing</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Mixed Size Packing</li>
                    </ol>
                </nav>
            </div>
        </div>
        <h6 class="mb-0 text-uppercase">Mixed Size Packing</h6>
        <hr />
        <div class="row">
            <div class="col-12 ">
                <div class="card rounded-4 w-100">
                    <div class="card-body">
                        <div class="mx-3 my-3">
                            <a href="<?= base_url('packing/add_mixed_packing'); ?>" type="button" class="btn btn-primary mb-3"><i class='bx bx-plus-circle'></i>Add New</a>

                            <!-- <div class="table-responsive"> -->
                            <table id="packingListTable" class="table table-striped table-bordered table-sm nowrap" style="width:100%">
                                <thead>
                                    <th>No.</th>
                                    <th>PO Number</th>
                                    <th>ORC</th>
                                    <th>Style</th>
                                    <th>Color</th>
                                    <th>Total Pcs</th>
                                    <th>Total Box</th>
                                    <th>Action</th>
                                </thead>
                            </table>
                            <!-- </div> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- Modal -->
<div class="modal fade" id="detailsMixedPackingListModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Size Box Capacity</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="mx-3 my-3">
                    <!-- <div class="table-responsive"> -->
                    <table id="mixedSizePackingDetailsTable" class="table table-striped table-bordered table-sm nowrap" style="width:100%">
                        <thead>
                            <th>No.</th>
                            <th>Barcode</th>
                            <th>Box Numb.</th>
                            <th>Size</th>
                            <th>Qty</th>
                        </thead>
                        <tfoot>
                            <th colspan="4">Total Qty</th>
                            <th></th>
                        </tfoot>

                    </table>
                    <!-- </div> -->
                </div>
            </div>
            <!-- <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div> -->
        </div>
    </div>
</div>


<script>
    $(document).ready(function() {
        var mode = "";

        var table = $('#packingListTable').DataTable({
            "processing": true,
            "scrollX": true,
            "lengthMenu": [
                [10, 25, 75, 100],
                [10, 25, 75, 100]
            ],

            "ajax": {
                "url": "<?php echo site_url('packing/ajax_get_mixed_packing'); ?>",
                "type": "GET",
                "dataType": "json",
            },
            "columns": [{
                    "data": null,
                    "className": "text-center",
                    "orderable": true,
                    "searchable": false,
                    "render": function(data, type, row, meta) {
                        return meta.row + meta.settings._iDisplayStart + 1;
                    }
                },

                {
                    "data": "po",
                    "className": "text-center",
                },
                {
                    "data": "orc",
                    "className": "text-center",
                },
                {
                    "data": "style",
                    "className": "text-center",
                },
                {
                    "data": "color",
                    "className": "text-center",
                },
                {
                    "data": "total_pcs",
                    "className": "text-center",
                },
                {
                    "data": "total_carton",
                    "className": "text-center",
                },

                {
                    'className': 'text-center',
                    render: function(data, type, row) {
                        return "<span id='btnGenerateBarcode' class='badge bg-primary' style='cursor: pointer;'>Barcode</span> <span id='btn_details' class='badge bg-info' style='cursor: pointer;'>Details</span> <span id='btnDeletePackingList' class='badge bg-danger' style='cursor: pointer;'>Delete</span>"
                    }
                }

            ],



        });


        // Button Print Packing List
        // $('#packingListTable tbody').on('click', 'button.btnPrintPackingList', function() {
        //     let po = table.row($(this).parents('tr')).data().po;

        //     open("< ?= site_url("packing/getExcelPackingList/"); ?>" + po);
        // });


        $('#packingListTable tbody').on('click', '#btnGenerateBarcode', function() {
            var selRow = table.row($(this).parents('tr')).data();
            open("<?php echo site_url("packing/ajax_barcode_mixed_print_preview"); ?>/" + selRow.po, '_blank');
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
                        url: "<?= site_url('packing/deleteMixedPackingList'); ?>",
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

        // Button details
        $('#packingListTable tbody').on('click', '#btn_details', function() {

            let id_order = table.row($(this).parents('tr')).data().id_order;
            let orc = table.row($(this).parents('tr')).data().orc;
            let style = table.row($(this).parents('tr')).data().style;
            let color = table.row($(this).parents('tr')).data().color;

            $("#orc_modal").html(": " + orc);
            $("#style_modal").html(": " + style);
            $("#color_modal").html(": " + color);

            let mixedSizePackingDetailsTable = $('#mixedSizePackingDetailsTable').DataTable({
                autoWidth: false,
                info: false,
                searching: false,
                paging: false,
                scrollX: true,

                destroy: true,
                lengthMenu: [
                    [10, 25, 50, 100],
                    [10, 25, 50, 100]
                ],
                ajax: {
                    url: '<?= site_url('packing/getMixedSizePackingListDetails'); ?>',
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
                        'data': 'qty',
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
                    pageTotal = api
                        .column(4, {
                            page: 'current'
                        })
                        .data()
                        .reduce((a, b) => intVal(a) + intVal(b), 0);

                    total_value = api
                        .column(4)
                        .data()
                        .reduce(function(a, b) {
                            return intVal(a) + intVal(b);
                        }, 0);


                    if (total_value != 0) {
                        $(api.column(4).footer()).html(total_value);
                    } else {
                        $(api.column(4).footer()).html('-');
                    }

                },

            });

            $("#detailsMixedPackingListModal").on('shown.bs.modal', function() {
                $('#mixedSizePackingDetailsTable').DataTable().columns.adjust();
            });

            $("#detailsMixedPackingListModal").modal("show");



        });

    });
</script>