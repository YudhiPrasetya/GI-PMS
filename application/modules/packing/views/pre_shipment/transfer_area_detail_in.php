<!--start page wrapper -->
<style>
    .toolbar {
        float: right;
    }
</style>

<div class="page-wrapper">
    <div class="page-content">
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Packing</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Finish Good (in)</li>
                        <li class="breadcrumb-item active" aria-current="page">Detail Transfer Area (In)</li>
                    </ol>
                </nav>
            </div>
        </div>
        <h6 class="mb-0 text-uppercase">Detail Transfer Area (In)</h6>
        <hr />
        <div class="row">
            <div class="col-12 ">
                <div class="card rounded-4 w-100">
                    <div class="card-body">
                        <div class="mx-3 my-3">


                            <input type="hidden" id="orc" value="<?= $orc; ?>">
                            <!-- <div class="table-responsive"> -->
                            <table id="tableTransferAreaDetailIn" class="table table-striped table-bordered table-sm nowrap" style="width:100%">
                                <thead>
                                    <th>ID</th>
                                    <th>No.</th>
                                    <th>Created Date</th>
                                    <th>PO</th>
                                    <th>Style</th>
                                    <th>Color</th>
                                    <th>ORC</th>
                                    <th>Size</th>
                                    <th>No. Box</th>
                                    <th>Qty</th>
                                    <th>Barcode</th>
                                    <th>Location</th>
                                </thead>

                            </table>
                            <!-- </div> -->

                            <div class="row mb-3">
                                <div class="col-lg-1">
                                    <label for="lineBaru" class="col-form-label">Line</label>
                                </div>
                                <div class="col-lg-2">
                                    <select class="select2_modal_1 mb-5" id="lineBaru" style="width:100%" disabled></select>
                                </div>
                                <div class="col-lg-4">
                                    <button id="btnUbahLine" class="btn btn-primary mx-2" disabled>Change Location</button>
                                </div>
                            </div>

                            <div class="row mt-5 mb-3">
                                <div class="col-lg-1">
                                    <a href="../transfer_area_in" class="btn btn-outline-secondary">Back</a>
                                </div>
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
    $('.select2_modal_1').select2({
        theme: 'bootstrap-5',
        width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style',

    });
</script>
<script>
    $(document).ready(function() {
        var selectedRows = null;
        // var tableTransferAreaDetailIn = $('#tableTransferAreaDetailIn').DataTable({
        //     dom: 'B<"toolbar">frtip',
        //     buttons: [
        //         'excel', 'print',
        //         {
        //             text: 'Select All',
        //             action: function() {
        //                 tableTransferAreaDetailIn.rows({
        //                     page: 'all'
        //                 }).select();
        //                 getSelectedRows();

        //             }
        //         },
        //         {
        //             text: 'Select All On Page',
        //             action: function() {
        //                 tableTransferAreaDetailIn.rows({
        //                     page: 'current'
        //                 }).select();
        //                 getSelectedRows()
        //             }
        //         },
        //         {
        //             text: 'Deselect All',
        //             action: function() {
        //                 tableTransferAreaDetailIn.rows({
        //                     page: 'all'
        //                 }).deselect();
        //                 getSelectedRows();
        //             }
        //         },
        //         {
        //             text: 'Deselect All On Page',
        //             action: function() {
        //                 tableTransferAreaDetailIn.rows({
        //                     page: 'current'
        //                 }).deselect();
        //                 getSelectedRows();
        //             }
        //         },
        //         {
        //             text: 'Kembali',
        //             action: function() {
        //                 open('<?= site_url("packing/transferAreaInput"); ?>', '_self');
        //             }
        //         },
        //     ],
        //     columnDefs: [{
        //         targets: [0],
        //         visible: false
        //     }],
        //     select: {
        //         style: 'multi'
        //     }
        // });

        let orc = $('#orc').val();

        let tableTransferAreaDetailIn = $('#tableTransferAreaDetailIn').DataTable({
            // lengthChange: false,
            // buttons: ['copy', 'excel', 'pdf', 'print'],
            dom: 'Bflrtip',
            buttons: [
                'excel', 'print',
                {
                    text: 'Select All',
                    action: function() {
                        tableTransferAreaDetailIn.rows({
                            page: 'all'
                        }).select();
                        getSelectedRows();

                    }
                },
                {
                    text: 'Select All On Page',
                    action: function() {
                        tableTransferAreaDetailIn.rows({
                            page: 'current'
                        }).select();
                        getSelectedRows()
                    }
                },
                {
                    text: 'Deselect All',
                    action: function() {
                        tableTransferAreaDetailIn.rows({
                            page: 'all'
                        }).deselect();
                        getSelectedRows();
                    }
                },
                {
                    text: 'Deselect All On Page',
                    action: function() {
                        tableTransferAreaDetailIn.rows({
                            page: 'current'
                        }).deselect();
                        getSelectedRows();
                    }
                },
                // {
                //     text: 'Kembali',
                //     action: function() {
                //         open('<?= site_url("packing/transferAreaInput"); ?>', '_self');
                //     }
                // },
            ],
            select: {
                style: 'multi'
            },
            scrollX: true,
            destroy: true,
            ajax: {
                url: '<?= site_url("packing/get_ajax_in_by_orc"); ?>',
                type: 'GET',
                dataType: 'JSON',
                data: {
                    "orc": orc
                }
            },
            columnDefs: [{
                targets: [0],
                visible: false
            }],
            columns: [{
                    'data': 'id_transfer_area',
                    'className': 'text-center px-2'
                },
                {
                    "data": null,
                    "className": "text-center",
                    "orderable": true,
                    "searchable": true,
                    // "width": "100px",
                    "render": function(data, type, row, meta) {
                        return meta.row + meta.settings._iDisplayStart + 1;
                    }
                },
                {
                    'data': 'tgl_in',
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
                    'data': 'lokasi',
                    'className': 'text-center px-2'
                },

            ],

            // footerCallback: function(row, data, start, end, display) {
            //     let api = this.api();

            //     // Remove the formatting to get integer data for summation
            //     let intVal = function(i) {
            //         return typeof i === 'string' ?
            //             i.replace(/[\$,]/g, '') * 1 :
            //             typeof i === 'number' ?
            //             i :
            //             0;
            //     };

            //     // Total over all pages
            //     total = api
            //         .column(7)
            //         .data()
            //         .reduce((a, b) => intVal(a) + intVal(b), 0);

            //     // Total over this page
            //     pageTotal = api
            //         .column(7, {
            //             page: 'current'
            //         })
            //         .data()
            //         .reduce((a, b) => intVal(a) + intVal(b), 0);

            //     // Update footer
            //     api.column(7).footer().innerHTML =
            //         pageTotal + ' ( ' + total + ' )';


            //     // Total over all pages
            //     total = api
            //         .column(8)
            //         .data()
            //         .reduce((a, b) => intVal(a) + intVal(b), 0);

            //     // Total over this page
            //     pageTotal = api
            //         .column(8, {
            //             page: 'current'
            //         })
            //         .data()
            //         .reduce((a, b) => intVal(a) + intVal(b), 0);

            //     // Update footer
            //     api.column(8).footer().innerHTML =
            //         pageTotal + ' ( ' + total + ' )';

            // }

        });

        // var tableToolbar =
        //     '<div class="row">' +
        //     '<div class="col-md-8">' +
        //     '<select class="select2_modal_1 mb-5" id="lineBaru" style="width:100%" disabled></select>' +
        //     '<button id="btnUbahLine" class="btn btn-sm btn-outline-success mx-2" disabled>Ubah Line</button>'
        // '</div>' +
        // '</div>';
        // $('div.toolbar').html(tableToolbar);



        var listLokasi = $.ajax({
            type: 'GET',
            url: '<?= site_url("packing/ajax_get_all_lokasi_packing"); ?>',
            dataType: 'json'
        });

        listLokasi.done(function(rst) {
            $('#lineBaru').empty();
            $('#lineBaru').append($('<option>', {
                value: "",
                text: '- Select Line -'
            }));
            $.each(rst, function(i, itm) {

                $('#lineBaru').append($('<option>', {
                    value: itm.line,
                    text: itm.line
                }));
            })
        });



        $('#tableTransferAreaDetailIn tbody').on('click', 'tr', function() {
            $(this).toggleClass('selected');
            getSelectedRows();
        })

        function getSelectedRows() {
            selectedRows = tableTransferAreaDetailIn.rows('.selected');
            // console.log(selectedRows)
            // console.log('selectedRows.length: ', selectedRows.data().length);
            $('#lineBaru').prop('disabled', selectedRows.data().length == 0);
        }

        $('#lineBaru').change(function() {
            let lineBaru = $(this).val();
            $('#btnUbahLine').prop('disabled', lineBaru == "");
        });

        $('#btnUbahLine').click(function() {
            swal.fire({
                icon: 'warning',
                title: 'Warning!',
                text: 'Are you sure you will change location ?',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes'
            }).then((result) => {
                if (result.dismiss != 'cancel') {
                    ubahLine();
                }
            })
        });

        function ubahLine() {
            let arrDataForUbahLinePacking = [];
            $.each(selectedRows.data(), function(i, item) {
                // console.log(item)
                arrDataForUbahLinePacking.push({
                    'id_transfer_area': item.id_transfer_area,
                    'lokasi': $('#lineBaru').val()
                });
            });

            // console.log('arrDataForUbahLinePacking: ', arrDataForUbahLinePacking);

            $.ajax({
                type: 'POST',
                url: '<?= site_url("packing/ajax_update_batch_lokasi"); ?>',
                data: {
                    'dataForUbahLinePacking': arrDataForUbahLinePacking
                },
                dataType: 'json'
            }).done(function(affRow) {
                if (affRow > 0) {
                    tableTransferAreaDetailIn.ajax.reload();
                    swal.fire({
                        icon: 'success',
                        title: 'Berhasil',
                        html: '<h3><strong>Data line berhasil diubah</strong></h3>',
                    }).then(function() {
                        // tableTransferAreaDetailIn.rows({
                        //     selected: true
                        // }).every(function(rowIdx, tableLoop, rowLoop) {
                        //     tableTransferAreaDetailIn.cell(rowIdx, 10).data($('#lineBaru').val());
                        // }).draw();

                        tableTransferAreaDetailIn.rows({
                            selected: true
                        }).deselect();
                        selectedRows = null;
                        $('#lineBaru').prop('disabled', true);
                        $('#btnUbahLine').prop('disabled', true);
                    })
                }
            })

        }


    })
</script>