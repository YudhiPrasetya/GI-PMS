<!--start page wrapper -->
<div class="page-wrapper">
    <div class="page-content">
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Cutting</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Create Bundle Barcode</li>
                    </ol>
                </nav>
            </div>
        </div>
        <h6 class="mb-0 text-uppercase">Create Bundle and Barcode</h6>
        <hr />
        <div class="row">
            <div class="col-12 ">
                <div class="card rounded-4 w-100">
                    <div class="card-body">

                        <div class="row mx-2 mt-3">
                            <div class="col-lg-12">
                                <div class="ms-auto">
                                    <div class="row mb-4">
                                        <div class="col-md-12">
                                            <a href="<?php echo base_url('cutting/bundleCuttingIconsAdd'); ?>" type="button" class="btn btn-primary"><i class='bx bx-plus-circle'></i> Create Bundle</a>
                                        </div>
                                    </div>
                                </div>

                                <table id="cuttingTable" class="table table-striped table-bordered table-sm nowrap" style="width:100%">
                                    <thead>
                                        <th>ID</th>
                                        <th>ORC</th>
                                        <th>Style</th>
                                        <th>Color</th>
                                        <th>Buyer</th>
                                        <th>Com</th>
                                        <th>PO Numb.</th>
                                        <th>Qty Pcs</th>
                                        <th>Boxes</th>
                                        <th>Prepared On</th>
                                        <th>Action</th>
                                    </thead>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="modalBundle" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-dialog-scrollable">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Size Details</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="row ms-1">
                                <table id="showBundleTable" class="table table-striped table-bordered table-sm" style="width:100%">
                                    <thead>
                                        <th>No.</th>
                                        <th>Size</th>
                                        <th>Qty</th>
                                        <th>No. Bundle</th>
                                    </thead>
                                    <tfoot>
                                        <th colspan="2">Total Qty</th>
                                        <th></th>
                                        <th></th>
                                    </tfoot>
                                </table>
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

        var cuttingTable = $('#cuttingTable').DataTable({

            autoWidth: false,
            processing: true,
            destroy: true,
            info: true,
            searching: true,
            paging: true,
            // fixedHeader: true,
            order: [0, 'desc'],
            scrollX: true,
            ajax: {
                url: '<?= site_url('cutting/get_bundle'); ?>',
                type: 'GET',

            },

            columns: [{
                    'data': 'id_cutting',
                    'className': "text-center align-middle px-2"
                },
                {
                    'data': 'orc',
                    'className': "text-center align-middle px-2"
                },
                {
                    'data': 'style',
                    'className': "text-center align-middle px-2"
                },
                {
                    'data': 'color',
                    'className': "text-center align-middle px-2"
                },
                {
                    'data': 'buyer',
                    'className': "text-center align-middle px-2"
                },
                {
                    'data': 'comm',
                    'className': "text-center align-middle px-2"
                },
                {
                    'data': 'so',
                    'className': "text-center align-middle px-2"
                },
                {
                    'data': 'qty',
                    'className': "text-center align-middle px-2"
                },
                {
                    'data': 'boxes',
                    'className': "text-center align-middle px-2"
                },
                {
                    'data': 'prepare_on',
                    'className': "text-center align-middle px-2"
                },
                {
                    'className': 'text-center align-middle px-3 text-nowrap',
                    render: function(data, type, row) {
                        return "<div class='dropdown'><button class='btn btn-primary btn-sm dropdown-toggle' type='button' data-bs-toggle='dropdown' aria-expanded='false'>Take Action</button><ul class='dropdown-menu'><li><a class='dropdown-item' id='btn-modal' style='cursor: pointer;'>Size Detail</a></li><li><a class='dropdown-item' id='btn-delete' style='cursor: pointer;'>Delete this ORC</a></li></ul></div>"
                    },
                }

            ],

        });

        $("#cuttingTable tbody").on("click", "#btn-modal", function() {
            let id = cuttingTable.row($(this).parents('tr')).data().id_cutting;

            $("#modalBundle").modal('show');
            var showBundleTable = $('#showBundleTable').DataTable({

                autoWidth: false,
                processing: true,
                serverSide: true,
                destroy: true,
                info: false,
                searching: false,
                paging: false,
                fixedHeader: true,

                ajax: {
                    url: '<?= site_url('cutting/get_detail_bundle'); ?>',
                    type: 'POST',
                    data: {
                        id: id,
                    },

                },

                columns: [{
                        "data": null,
                        "orderable": true,
                        "searchable": false,
                        'className': 'text-center px-4',
                        // "width": "100px",
                        "render": function(data, type, row, meta) {
                            return meta.row + meta.settings._iDisplayStart + 1;
                        }
                    },
                    {
                        'data': 'size',
                        'className': "text-center"
                    },
                    {
                        'data': 'qty_pcs',
                        'className': "text-center"
                    },
                    {
                        'data': 'no_bundle',
                        'className': "text-center"
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
                        .column(2)
                        .data()
                        .reduce((a, b) => intVal(a) + intVal(b), 0);


                    // Update footer
                    api.column(2).footer().innerHTML =
                        total;


                }

            });
        });

        $("#cuttingTable tbody").on("click", "#btn-delete", function() {
            let orc = cuttingTable.row($(this).parents('tr')).data().orc;


            Swal.fire({
                title: "Are you sure?",
                text: "Data related to this orc will be deleted.",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, delete it!"
            }).then(function(result) {
                if (result.value) {
                    console.log('ok');
                    $.ajax({
                        url: "<?= site_url('cutting/ajaxDeleteData'); ?>",
                        type: 'POST',
                        data: {
                            "orc": orc
                        },
                        success: function(data) {
                            Swal.fire({
                                title: "Deleted!",
                                text: orc + " has been deleted.",
                                icon: "success"
                            });
                            cuttingTable.ajax.reload();

                        },
                        error: function(xhr, ajaxOptions, thrownError) {
                            swal("Error deleting!", "Please try again", "error");
                        }

                    });
                };

            })

        });

        // $('#modalAdd').click(function() {
        //     $("#modalAddbundle").modal('show');
        // })



    })
</script>