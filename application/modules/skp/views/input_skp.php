<style>
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

        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">SKP</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">SKP</li>
                    </ol>
                </nav>
            </div>
        </div>
        <!--end breadcrumb-->

        <h6 class="mb-0 text-uppercase">Scan Input SKP</h6>
        <hr />

        <div class="card">
            <div class="card-body">
                <div class="row my-3 mx-2">

                    <div class="col-lg-12 mb-3">
                        <label for="barcode" class="col-form-label">Scan Bundle Record</label>
                        <input type="text" id="barcode" class="form-control" placeholder="Scan barcode here...">
                    </div>

                    <table id="inputSkpTable" class="table table-striped table-bordered table-sm nowrap" style="width:100%">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Date</th>
                                <th>ORC</th>
                                <th>Style</th>
                                <th>Color</th>
                                <th>Bundle #</th>
                                <th>Size</th>
                                <th>Qty</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>


    </div>
</div>
<!--end page wrapper -->

<!-- Modal -->

<!-- Modal Man Power -->
<div class="modal fade" id="modal_man_power" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="modal_man_power_Label" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modal_man_power_Label">Man Power Line <?= ucfirst(strtolower($this->session->userdata['username'])); ?></h5>
            </div>
            <div class="modal-body">
                <div class="row mx-2 my-4 justify-content-center">
                    <label for="assembly_op" class="col-sm-5 col-form-label">Assembly Man Power</label>
                    <div class="col-sm-4">
                        <input type="number" class="form-control text-center" id="assembly_op" name="assembly_op" placeholder="0" min="0">
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" id="btnSaveMP">Save</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal Edit Qty -->
<div class="modal fade" id="modal_edit_qty" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="modal_edit_qty_Label" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modal_edit_qty_Label">Qty Check Output Juwita</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="post" id="form-man-power">
                    <div class="row mx-2 my-4 justify-content-center">
                        <label for="qtyOutputJuwita" class="col-sm-2 col-form-label">Qty</label>
                        <div class="col-sm-4">
                            <input type="number" class="form-control text-center" id="qtyOutputJuwita">
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" id="btnSaveQtyOutputJuwita" class="btn btn-success">Save</button>
                <button type="button" class="btn" data-bs-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div>

<script>
    var barcodeSplit;
    $(document).ready(function() {
        const sweet_loader = '<div class="sweet_loader"><svg viewBox="0 0 140 140" width="140" height="140"><g class="outline"><path d="m 70 28 a 1 1 0 0 0 0 84 a 1 1 0 0 0 0 -84" stroke="rgba(0,0,0,0.1)" stroke-width="4" fill="none" stroke-linecap="round" stroke-linejoin="round"></path></g><g class="circle"><path d="m 70 28 a 1 1 0 0 0 0 84 a 1 1 0 0 0 0 -84" stroke="#71BBFF" stroke-width="4" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-dashoffset="200" stroke-dasharray="300"></path></g></svg></div>';

        $('#barcode').focus();

        let inputSkpTable = $('#inputSkpTable').DataTable({
            // aaSorting: false,
            autoWidth: false,
            processing: true,
            destroy: true,
            info: true,
            searching: true,
            paging: true,
            fixedHeader: true,
            scrollX: true,

            ajax: {
                url: '<?= site_url('skp/getInputSkp'); ?>',
                type: 'GET',

            },
            language: {
                processing: '<i class="fa fa-spinner fa-spin fa-3x fa-fw"></i><br><div><p>Silahkan Menunggu...</p></div> ',
                emptyTable: 'Tidak ada data',
                lengthMenu: '_MENU_',
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
                    'data': 'date_created',
                    'className': "text-center px-2"
                },
                {
                    'data': 'orc',
                    'className': "text-center px-2"
                },
                {
                    'data': 'style',
                    'className': "text-center px-2"
                },
                {
                    'data': 'color',
                    'className': "text-center px-2"
                },
                {
                    'data': 'no_bundle',
                    'className': "text-center px-2"
                },
                {
                    'data': 'size',
                    'className': "text-center px-2"
                },
                {
                    'data': 'qty',
                    'className': "text-center px-2"
                },

            ],



        });

        $('#barcode').focus();


        $('#barcode').keypress(function(e) {
            if (e.keyCode == 13) {
                e.preventDefault();

                let barcode = $('#barcode').val();
                if (barcode == '') {
                    Swal.fire({
                        icon: "warning",
                        title: "Warning!",
                        text: "Please enter the barcode.",
                        showConfirmButton: false,
                        timer: 750
                    });
                } else {
                    swal.fire({
                        html: '<h5>Loading...</h5>',
                        showConfirmButton: false,
                        didOpen: function() {
                            $('.swal2-html-container').prepend(sweet_loader);
                        }
                    });
                    checkBarcodeExist(barcode);
                }
            }
        });

        function checkBarcodeExist(barcode) {
            $.ajax({
                url: '<?= site_url("skp/getCheckBarcodeInputCutting"); ?>',
                type: 'GET',
                dataType: 'JSON',
                data: {
                    "barcode": barcode
                },
                success: function(result) {

                    if (result == 0) {
                        Swal.fire({
                            icon: "warning",
                            title: "Warning!",
                            text: "Unregistered barcode.",
                            showConfirmButton: false,
                            timer: 1000
                        });
                        $('#barcode').val('');
                        $('#barcode').focus();
                    } else if (result == 1) {
                        Swal.fire({
                            icon: "warning",
                            title: "Warning!",
                            text: 'Barcode has not been scanned in "Input Cutting".',
                            showConfirmButton: false,
                            timer: 1500
                        });
                        $('#barcode').val('');
                        $('#barcode').focus();
                    } else if (result == 2) {
                        Swal.fire({
                            icon: "warning",
                            title: "Warning!",
                            text: "Barcode has been scanned.",
                            showConfirmButton: false,
                            timer: 1000
                        });
                        $('#barcode').val('');
                        $('#barcode').focus();
                    } else {
                        saveInputCutting(barcode);
                    }

                }
            });
        }

        function saveInputCutting(barcode) {
            $.ajax({
                url: '<?= site_url("skp/postInputCutting"); ?>',
                method: 'POST',
                dataType: 'JSON',
                data: {
                    'barcode': barcode
                },
            }).done(function() {
                Swal.fire({
                    icon: 'success',
                    title: 'Success',
                    text: 'Data saved successfully.',
                    showConfirmButton: false,
                    timer: 750
                });

                $('#barcode').val('');
                $('#barcode').focus();
                inputSkpTable.ajax.reload();
            });
        }

    });
</script>