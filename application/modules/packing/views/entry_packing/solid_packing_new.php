<div class="page-wrapper">
    <div class="page-content">
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Packing</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Solid Packing New</li>
                    </ol>
                </nav>
            </div>
        </div>
        <h6 class="mb-0 text-uppercase">Input Solid Packing</h6>
        <hr />
        <div class="row">
            <div class="col-12 ">
                <div class="card rounded-4 w-100">
                    <div class="card-body">
                        <div class="mx-3 my-3">
                            <div class='form-group row mb-3'>
                                <div class='col-md-3'>
                                    <a href='<?php echo site_url("packing/add_packing_solid_new"); ?>' id='btnAddNewPackingList' class='btn btn-primary'><i class='bx bx-plus-circle'></i> Add New</a>
                                </div>

                            </div>
                            <table id="packingListTable" class="table table-striped table-bordered table-sm nowrap" style="width:100%">
                                <thead>
                                    <th>No.</th>
                                    <th>ORC</th>
                                    <th>Work Order</th>
                                    <th>Color</th>
                                    <th>Style</th>
                                    <th>Action</th>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>


<!-- Modal Detail -->
<div class="modal fade" id="modalDetail" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Size Box Capacity</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="mx-3 my-3">
                    <!-- <div class="table-responsive"> -->
                    <table id="showSizeCapacity" class="table table-striped table-bordered table-sm nowrap" style="width:100%">
                        <thead>
                            <th>Size</th>
                            <th>Qty</th>
                            <th>Box Capacity</th>
                            <th>Total Box</th>
                        </thead>
                        <tfoot>
                            <th></th>
                            <th></th>
                            <th></th>
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
        var packingListTable = $('#packingListTable').DataTable({
            // dom: '<"toolbar">lfrtip',
            autoWidth: true,
            scrollX: true,
            // processing: true,
            destroy: true,
            info: true,
            searching: true,
            // paging: true,
            // fixedHeader: true,

            ajax: {
                url: '<?= site_url('packing/ajax_get_solid_packing'); ?>',
                type: 'GET',

            },
            // language: {
            //     processing: '<i class="fa fa-spinner fa-spin fa-3x fa-fw"></i><br><div><p>Silahkan Menunggu...</p></div> ',
            //     emptyTable: 'Tidak ada data',
            //     lengthMenu: '_MENU_',
            // },
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
                    "data": "orc",
                    'className': "text-center px-2 align-middle"
                },
                {
                    "data": "wo",
                    'className': "text-center px-2 align-middle"
                },
                {
                    "data": "color",
                    'className': "text-center px-2 align-middle"
                },
                {
                    "data": "style",
                    'className': "text-center px-2 align-middle"
                },
                {
                    'className': 'text-center px-3 align-middle',
                    render: function(data, type, row) {
                        return "<button class='btn btn-sm btn-outline-primary shadow btnDetail' id='btnDetail'><i class='lni lni-pointer-right'></i>Detail</button> <button class='btn btn-sm btn-outline-warning shadow btnBarcode' id='btnBarcode'><i class='fadeIn animated bx bx-barcode'></i>Barcode</button> <button class='btn btn-sm btn-outline-success shadow btnPrintPackingList' id='btnPrintPackingList'><i class='lni lni-printer'></i>Print Packing List</button> <button class='btn btn-sm btn-outline-danger shadow btnDeletePackingList' id='btnDeletePackingList'><i class='lni lni-trash'></i> Delete</button"

                    },
                },


            ],
            // lengthMenu: [
            //     [10, 25, 50, 100, -1],
            //     [10, 25, 50, 100, 'All'],
            // ],
        });

        // var toolbar = "<div class='form-group row mb-3'>" +
        //     "<div class='col-md-3" +
        //     "<div class='btn-group btn-group-sm' role='toolbar'>" +
        //     "<a href='< ?php echo site_url("packing/packing_solid/add_packing_solid"); ?>' id='btnAddNewPackingList' class='btn btn-primary'><i class='lni lni-circle-plus'></i> Add New</a>" +
        //     "</div>" +
        //     "</div>" +
        //     "</div>";

        // $("div.toolbar").html(toolbar);
        // var style;
        $("#packingListTable tbody").on("click", "#btnDetail", function() {
            var orc = packingListTable.row($(this).parents('tr')).data().orc;
            var style = packingListTable.row($(this).parents('tr')).data().style;
            let wo = packingListTable.row($(this).parents('tr')).data().wo;

            var showSizeCapacity = $('#showSizeCapacity').DataTable({

                autoWidth: true,
                scrollX: true,
                processing: true,
                serverSide: true,
                destroy: true,
                info: false,
                searching: false,
                paging: false,

                ajax: {
                    url: '<?= site_url('packing/ajax_get_solid_packing_detail'); ?>',
                    type: 'POST',
                    data: {
                        style: style,
                        // orc: orc
                        wo: wo
                    },

                },
                // language: {
                //     processing: '<i class="fa fa-spinner fa-spin fa-3x fa-fw"></i><br><div><p>Silahkan Menunggu...</p></div> ',
                //     emptyTable: 'Tidak ada data',
                //     lengthMenu: '_MENU_',
                // },
                columns: [{
                        'data': 'size',
                        'className': "text-center"
                    },
                    {
                        'data': 'qty',
                        'className': "text-center"
                    },
                    {
                        'data': 'box_capacity',
                        'className': "text-center"
                    },
                    {
                        'data': 'total_box',
                        'className': "text-center"
                    }


                ],


                // lengthMenu: [
                //     [10, 25, 50, 100, -1],
                //     [10, 25, 50, 100, 'All'],
                // ],

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
                        .column(1)
                        .data()
                        .reduce((a, b) => intVal(a) + intVal(b), 0);

                    // Update footer
                    api.column(1).footer().innerHTML =
                        total

                    // Total over all pages
                    total = api
                        .column(3)
                        .data()
                        .reduce((a, b) => intVal(a) + intVal(b), 0);

                    // Update footer
                    api.column(3).footer().innerHTML =
                        total


                }
            });

            $("#modalDetail").on('shown.bs.modal', function() {
                $('#showSizeCapacity').DataTable().columns.adjust();
            });
            $("#modalDetail").modal('show');
        });

        $("#packingListTable tbody").on("click", "#btnBarcode", function() {
            // var orc = packingListTable.row($(this).parents('tr')).data().orc;
            let wo = packingListTable.row($(this).parents('tr')).data().wo;
            // window.open("<//?php echo site_url("packing/ajax_barcode_print_preview"); ?>/" + orc, '_blank');
            window.open("<?php echo site_url("packing/ajax_barcode_print_preview"); ?>/" + wo, '_blank');

        });

        $("#packingListTable tbody").on("click", "#btnPrintPackingList", function() {
            // console.log('ok');
            // var orc = packingListTable.row($(this).parents('tr')).data().orc;
            var wo = packingListTable.row($(this).parents('tr')).data().wo;
            // window.open("<//?php echo site_url("packing/ajax_packing_list_print_preview"); ?>/" + orc, '_blank');
            window.open("<?php echo site_url("packing/ajax_packing_list_print_preview"); ?>/" + wo, '_blank');

        });

        $("#packingListTable tbody").on("click", "#btnDeletePackingList", function() {

            // var orc = packingListTable.row($(this).parents('tr')).data().orc;
            var orc = packingListTable.row($(this).parents('tr')).data().wo;
            // console.log(orc);
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
                        url: '<?php echo site_url("Packing/ajax_delete_packing_list_by_wo"); ?>/' + orc,
                        type: 'POST',

                        success: function(data) {
                            swal.fire(
                                'Success!',
                                'Data berhasil dihapus.',
                                'success'
                            ).then(function() {
                                packingListTable.ajax.reload(null, false);
                            })
                        }
                    });
                }
            });
        });






    })
</script>