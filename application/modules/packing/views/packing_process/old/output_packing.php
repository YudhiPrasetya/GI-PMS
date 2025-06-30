<!--start page wrapper -->
<div class="page-wrapper">
    <div class="page-content">
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">PACKING</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Output Packing</li>
                    </ol>
                </nav>
            </div>
        </div>
        <h6 class="mb-0 text-uppercase">DAILY DATA OUTPUT PACKING</h6>
        <hr />
        <div class="row">
            <div class="col-12 ">
                <div class="card rounded-4 w-100">
                    <div class="card-body">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-2">
                                        <label for="qty" class="form-label">BARCODE: </label>
                                    </div>
                                    <div class="col-md-5">
                                        <input type="text" class="form-control" id="kode_barcode" required>
                                    </div>
                                </div>

                                </p>
                                <div class="table-responsive">
                                    <table id="outputPackingTable" class="table table-striped table-bordered" style="width:100%">
                                        <thead>
                                            <th>No</th>
                                            <th>Created Date</th>
                                            <th>ORC</th>
                                            <th>No.Bundle</th>
                                            <th>Style</th>
                                            <th>Color</th>
                                            <th>Size</th>
                                            <th>Qty</th>
                                            <th>Line</th>
                                        </thead>

                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="card">
                    <div class="card-header">

                    </div>
                    <div class="card-body">
                        <table id="inputPackingTable" class="table table-striped table-bordered" style="width: 100%">
                            <thead>
                                <tr>
                                    <th>ORC</th>
                                    <th>Style</th>
                                    <th>Color</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="modal fade" id="modalDetail" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Data Detail Input Packing</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="table-responsive">
                                    <table id="detailPacking" class="table table-striped table-bordered" style="width:100%">
                                        <thead>
                                            <th>ID</th>
                                            <th>ORC</th>
                                            <th>Tanggal</th>
                                            <th>Style</th>
                                            <th>Color</th>
                                            <th>Size</th>
                                            <th>Pcs</th>
                                            <th>No.Bundle</th>
                                            <th>Output Line</th>
                                        </thead>

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
    const regBarcodeBundle = /(cp|bw|cu|as|pa)+[^]*-/i; //regex untuk barcode Sewing

    const sweet_loader = '<div class="sweet_loader"><svg viewBox="0 0 140 140" width="140" height="140"><g class="outline"><path d="m 70 28 a 1 1 0 0 0 0 84 a 1 1 0 0 0 0 -84" stroke="rgba(0,0,0,0.1)" stroke-width="4" fill="none" stroke-linecap="round" stroke-linejoin="round"></path></g><g class="circle"><path d="m 70 28 a 1 1 0 0 0 0 84 a 1 1 0 0 0 0 -84" stroke="#71BBFF" stroke-width="4" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-dashoffset="200" stroke-dasharray="300"></path></g></svg></div>';

    // var table;
    var tableDetail;
    var kode;
    var qty = 0;
    $(document).ready(function() {
        var tableOutput = $('#outputPackingTable').DataTable({

            autoWidth: false,
            processing: true,
            destroy: true,
            info: true,
            searching: true,
            paging: true,
            fixedHeader: true,

            ajax: {
                url: '<?= site_url('packing/getOutputPacking'); ?>',
                type: 'POST',

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
                    "searchable": true,
                    'className': 'text-center px-4',
                    "render": function(data, type, row, meta) {
                        return meta.row + meta.settings._iDisplayStart + 1;
                    }
                },
                {
                    'data': 'tgl',
                    'className': 'text-center px-2'
                },
                {
                    'data': 'orc',
                    'className': 'text-center px-2'
                },
                {
                    'data': 'no_bundle',
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
                    'data': 'size',
                    'className': 'text-center px-2'
                },
                {
                    'data': 'qty',
                    'className': 'text-center px-2'
                },
                {
                    'data': 'line',
                    'className': 'text-center px-2'
                },

            ],
            lengthMenu: [
                [10, 25, 50, 100, -1],
                [10, 25, 50, 100, 'All'],
            ],
        });

        var inputPackingTable = $('#inputPackingTable').DataTable({
            "autoWidth": true,
            "lengthMenu": [
                [10, 25, 50, 100],
                [10, 25, 55, 100]
            ],
            "ajax": {
                "url": "<?php echo site_url('packing/ajax_list'); ?>",
                "type": "POST",
                "dataType": "json",
            },
            "columns": [{
                    "data": 'orc',
                    'className': 'text-center px-2'
                },
                {
                    "data": 'style',
                    'className': 'text-center px-2'
                },
                {
                    "data": 'color',
                    'className': 'text-center px-2'
                },

                {
                    'className': 'text-center px-2',
                    render: function(data, type, row, meta) {
                        return '<button type="button" class="btn btn-info btn-sm btnShowDetail" id="btnShowDetail">Show Detail</button>';
                    }
                },
            ],
        });

        $('#kode_barcode').focus();

        $('#kode_barcode').keypress(function(e) {
            if (e.keyCode == 13) {
                e.preventDefault();
                var barcode = $(this).val();

                swal.fire({
                    html: '<h5>Loading...</h5>',
                    showConfirmButton: false,
                    onBeforeOpen: function() {
                        $('.swal2-content').prepend(sweet_loader);
                    }
                });

                if (!regBarcodeBundle.test(barcode)) {

                    Swal.fire({
                        icon: 'warning',
                        title: 'Warning',
                        html: '<h1><strong>Invalid barcode!!</strong></h1>',
                        showConfirmButton: false,
                        timer: 1000,
                    }).then(function() {
                        $(this).val('');
                        $(this).focus();
                    });
                } else {
                    kode = barcode.split('_');
                    // console.log(kode);
                    $.ajax({
                        type: 'GET',
                        url: '<?php echo site_url("packing/ajax_check_input_packing"); ?>/' + kode[1],
                        dataType: 'json'
                    }).done(function(retVal) {
                        if (retVal == 0) {
                            // console.log(retVal);
                            // console.log('ppp');
                            $.ajax({
                                type: 'GET',
                                url: '<?php echo site_url("packing/ajax_check_output_sewing_detail"); ?>/' + kode[1],
                                dataType: 'json'
                            }).done(function(retVal1) {
                                if (retVal1 > 0) {
                                    // showBarcodeDetail();
                                    saveOutputPacking();
                                } else {
                                    Swal.fire({
                                        icon: 'warning',
                                        title: 'Peringatan!',
                                        html: '<h1><strong>Barcode belum di-SCAN di sewing!!</strong></h1>',
                                        showConfirmButton: false,
                                        timer: 2000
                                    });

                                }
                            })
                        } else {
                            Swal.fire({
                                icon: 'warning',
                                title: 'Peringatan!',
                                html: '<h1><strong>Barcode sudah di-SCAN!!</strong></h1>',
                                showConfirmButton: false,
                                timer: 2000
                            });

                        }
                    })
                }
            }
        });

        function saveOutputPacking() {
            $.ajax({
                type: 'POST',
                url: '<?php echo site_url("packing/ajax_get_cutting_detail"); ?>/' + kode[1],
                dataType: 'json'
            }).done(function(d) {
                // console.log('d: ', d);
                if (d != null) {
                    var dataStr = {
                        'kode_barcode': kode[1],
                        'orc': d.orc,
                        'style': d.style,
                        'color': d.color,
                        'qty': d.qty_pcs,
                        'size': d.size,
                        'no_bundle': d.no_bundle,
                        'actual_qty': d.qty_pcs
                    }

                    $.ajax({
                        type: 'POST',
                        url: '<?php echo site_url("packing/ajax_save"); ?>',
                        data: {
                            'dataStr': dataStr
                        },
                        dataType: 'json'
                    }).done(function(id) {
                        if (id > 0) {
                            Swal.fire({
                                icon: 'success',
                                title: 'Berhasil',
                                html: '<strong>Simpan Data Input Packing Berhasil</strong>',
                                showConfirmButton: false,
                                timer: 750,

                            }).then(function() {
                                $('#kode_barcode').trigger('focus');
                            });
                        }
                        reloadTable();
                        $('#kode_barcode').val('');
                        $('#kode_barcode').focus();
                    });
                }
            })
        }

        $('#btnSave').click(function() {
            saveData();
        })

        function reloadTable() {
            tableOutput.ajax.reload(null, false);
            inputPackingTable.ajax.reload(null, false);

        }

        $("#inputPackingTable tbody").on("click", "#btnShowDetail", function() {
            var orc = inputPackingTable.row($(this).parents('tr')).data().orc;
            // var style = packingListTable.row($(this).parents('tr')).data().style;

            $("#modalDetail").modal('show');
            var detailPacking = $('#detailPacking').DataTable({

                autoWidth: false,
                processing: true,
                serverSide: true,
                destroy: true,
                info: true,
                searching: true,
                paging: true,
                fixedHeader: true,

                ajax: {
                    url: '<?= site_url('packing/ajax_detail_ouput_packing'); ?>',
                    type: 'POST',
                    data: {
                        orc: orc
                    },

                },
                language: {
                    processing: '<i class="fa fa-spinner fa-spin fa-3x fa-fw"></i><br><div><p>Silahkan Menunggu...</p></div> ',
                    emptyTable: 'Tidak ada data',
                    lengthMenu: '_MENU_',
                },
                columns: [{
                        'data': 'id_input_packing',
                        'className': "text-center"
                    },
                    {
                        'data': 'orc',
                        'className': "text-center"
                    },
                    {
                        'data': 'tgl',
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
                        'data': 'actual_qty',
                        'className': "text-center"
                    },
                    {
                        'data': 'no_bundle',
                        'className': "text-center"
                    },
                    {
                        'data': 'line',
                        'className': "text-center"
                    }


                ],
                lengthMenu: [
                    [10, 25, 50, 100, -1],
                    [10, 25, 50, 100, 'All'],
                ],
            });
        });


    })
</script>