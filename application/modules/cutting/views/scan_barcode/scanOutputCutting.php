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
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Cutting</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Scan Output Trimstore</li>
                    </ol>
                </nav>
            </div>
        </div>
        <h6 class="mb-0 text-uppercase">Scan Output Trimstore</h6>
        <hr />
        <div class="row">
            <div class="col-12 ">
                <div class="card rounded-4 w-100">
                    <div class="card-body">
                        <div class="mx-3 my-3">
                            <div class="row">
                                <div class="col-sm-10"></div>
                                <div class="col-sm-2 text-end">
                                    <button id="unscanned" type="button" class="btn btn-info position-relative" title="Waiting List Barcode"><i class='bx bxs-bell align-middle'></i><span class="position-absolute top-0 start-100 translate-middle badge border border-light rounded-circle bg-danger p-2" id="countUnscannedBarcode"><span class="visually-hidden">unread messages</span></span>
                                    </button>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="qty" class="form-label">Select Line</label>
                                <select class="single-select" id="line"></select>
                            </div>
                            </p>
                            <div class="form-group">
                                <label for="qty" class="form-label">Scan Bundle Record</label>
                                <input type="text" class="form-control" id="barcode" placeholder="Scan barcode here.." required>
                            </div>
                            </p>
                            <!-- <div class="table-responsive"> -->
                            <table id="outputCuttingTable" class="table table-striped table-bordered table-sm nowrap" style="width:100%">
                                <thead>
                                    <th>No.</th>
                                    <th>Date</th>
                                    <th>ORC</th>
                                    <th>WO</th>
                                    <th>Style</th>
                                    <th>Color</th>
                                    <th>No. Bundle</th>
                                    <th>Size</th>
                                    <th>Qty</th>
                                    <th>Line</th>
                                </thead>
                                <tfoot>
                                    <th colspan="8">Total Output</th>
                                    <th></th>
                                    <th></th>
                                </tfoot>
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
<!-- Button Information -->
<div class="modal fade" id="unscannedBarcodeModal" tabindex="-1" aria-labelledby="unscannedBarcodeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="unscannedBarcodeModalLabel">Waiting List Barcode</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="mx-2">
                    <table id="unscannedBarcodeTable" class="table table-striped table-bordered table-sm nowrap" style="width:100%">
                        <thead>
                            <th>No.</th>
                            <th>ORC</th>
                            <th>WO</th>
                            <th>Style</th>
                            <th>Color</th>
                            <th>No. Bundle</th>
                            <th>Size</th>
                            <th>Barcode</th>
                        </thead>
                        <!-- <tfoot>
                            <th colspan="7">Total Output</th>
                            <th></th>
                            <th></th>
                        </tfoot> -->
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $('.single-select').select2({
        theme: 'bootstrap-5',
        width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style',
        // placeholder: $(this).data('placeholder'),
        // allowClear: Boolean($(this).data('allow-clear')),
        // dropdownParent: $('#modalAddbundle')
    });

    $(document).ready(function() {
        const sweet_loader = '<div class="sweet_loader"><svg viewBox="0 0 140 140" width="140" height="140"><g class="outline"><path d="m 70 28 a 1 1 0 0 0 0 84 a 1 1 0 0 0 0 -84" stroke="rgba(0,0,0,0.1)" stroke-width="4" fill="none" stroke-linecap="round" stroke-linejoin="round"></path></g><g class="circle"><path d="m 70 28 a 1 1 0 0 0 0 84 a 1 1 0 0 0 0 -84" stroke="#71BBFF" stroke-width="4" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-dashoffset="200" stroke-dasharray="300"></path></g></svg></div>';

        var outputCuttingTable = $('#outputCuttingTable').DataTable({
            aaSorting: false,
            autoWidth: false,
            processing: true,
            destroy: true,
            info: true,
            searching: true,
            paging: true,
            fixedHeader: true,
            scrollX: true,

            ajax: {
                url: '<?= site_url('cutting/getOutputCutting'); ?>',
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
                    'className': 'text-center px-3',
                    render: function(data, type, row) {
                        if (row['created_time'] == null) {
                            return row['tgl']
                        } else {
                            return row['tgl'] + ' ' + row['created_time'];
                        }
                    }
                },
                {
                    'data': 'orc',
                    'className': "text-center px-2"
                },
                {
                    'data': 'wo',
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
                    'data': 'qty_pcs',
                    'className': "text-center px-2"
                },
                {
                    'data': 'line',
                    'className': "text-center px-2"
                },


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

                // Update footer
                // api.column(6).footer().innerHTML =
                //   total
            }
        });

        const loadLine = () => {
            $('#line').empty();
            $.ajax({
                url: " <?= site_url('cutting/ajax_get_all_line'); ?>",
                type: 'GET',
                dataType: 'JSON',
                beforeSend: function() {
                    $("#line").prepend($('<option></option>').html('Loading...'));
                },
            }).done(function(data) {
                $('#line').empty();
                $('#line').append($('<option>', {
                    value: "",
                    text: "- Select Line-"
                }));
                $.each(data, function(i, item) {
                    $('#line').append($('<option>', {
                        value: item.name,
                        text: item.name
                    }));
                });
            });
        }

        loadLine();

        $('#barcode').keypress(function(e) {
            if (e.keyCode == 13) {
                e.preventDefault();

                let line = $('#line').val();
                var barcode = $('#barcode').val();
                var barcodeUpper = barcode.toUpperCase();

                barcodeSplit = barcodeUpper.split("_");
                if (line != '') {
                    swal.fire({
                        html: '<h5>Loading...</h5>',
                        showConfirmButton: false,
                        didOpen: function() {
                            $('.swal2-html-container').prepend(sweet_loader);
                        }
                    });

                    check_barcode(barcodeSplit[1]);
                } else {
                    Swal.fire({
                        icon: "warning",
                        title: "Warning!",
                        text: "Pilih line terlebih dahulu!",
                        showConfirmButton: false,
                        timer: 1750
                    });
                }

            }
        });

        function check_barcode(barcode) {
            // console.log('barcode: ', barcode);
            $.ajax({
                url: '<?php echo site_url("cutting/ajax_check_by_barcode"); ?>/' + barcode,
                type: 'GET',
                dataType: 'json'
            }).done(function(dt) {
                if (dt == null) {
                    Swal.fire({
                        icon: "warning",
                        title: "Warning!",
                        text: "Barcode tidak ada!",
                        showConfirmButton: false,
                        timer: 1750
                    });
                    $('#barcode').val('');
                    $('#barcode').focus();
                } else {
                    check_barcode1(dt);
                }
            });
        }

        function check_barcode1(dt) {
            $.ajax({
                url: '<?php echo site_url("cutting/ajax_check_barcode_output"); ?>/' + dt.kode_barcode,
                type: 'POST',
                dataType: 'json'
            }).done(function(dta) {
                // console.log('dta: ', dta);
                if (dta != null) {
                    Swal.fire({
                        icon: "warning",
                        title: "Warning!",
                        text: "Barcode ini sudah discan!",
                        showConfirmButton: false,
                        timer: 1750
                    }).then(function() {
                        $('#barcode').val('');
                        $('#barcode').focus();
                    })
                } else {
                    save_input_sewing(dt);
                }
            });
        }

        function save_input_sewing(data) {
            var color = data.color;
            if (color.includes("BLACK") == true) {
                var colorGroup = "Black";
            } else if (color.includes("WHITE") == true) {
                var colorGroup = "White";
            } else {
                var colorGroup = "color"
            }

            var style = data.style;
            var size = data.size;
            var groupSize;
            var cpSAM;
            var bwSAM;
            var cSAM;
            var aSAM;
            var ajaxGetGroupSize;
            var ajaxGetSewingSAM;
            var dataForSewingSAM;

            var dtInputCutting;
            var dtInputSewing;

            ajaxGetGroupSize = $.ajax({
                url: '<?php echo site_url('cutting/ajax_get_by_size'); ?>',
                type: 'POST',
                data: {
                    'dataSize': size
                },
                dataType: 'json'
            }),
            ajaxGetSewingSAM = ajaxGetGroupSize.then(function(dt) {
                groupSize = dt.group;

                dataForSewingSAM = {
                    'style': style,
                    'color': colorGroup,
                    'grup_size': groupSize
                };
                // console.log('dataForSewingSAM: ', dataForSewingSAM);
                return $.ajax({
                    url: '<?php echo site_url("cutting/ajax_get_sewing_sam"); ?>',
                    type: 'POST',
                    data: {
                        'dataForSewingSAM': dataForSewingSAM
                    },
                    dataType: 'json'
                });

            });
            ajaxGetSewingSAM.done(function(d) {
                if(d == null){
                    cpSAM = 0.0;
                    bwSAM = 0.0;
                    cSAM = 0.0;
                    aSAM = 0.0;
                }else{
                    cpSAM = d.center_panel_sam == null ? 0.00 : d.center_panel_sam;
                    bwSAM = d.back_wings_sam == null ? 0.00 : d.back_wings_sam;
                    cSAM = d.cups_sam == null ? 0.00 : d.cups_sam;
                    aSAM = d.assembly_sam == null ? 0.00 : d.assembly_sam;
                }
                // orc = data.orc;

                var dataStr = {
                    'id_order_icon_main': parseInt(data.id_master_order_icon_main),
                    'line': $('#line').val(),
                    'orc': data.orc,
                    'wo': data.wo,
                    'style': data.style,
                    'color': data.color,
                    'no_bundle': data.no_bundle,
                    'size': data.size,
                    'qty_pcs': data.qty_pcs,
                    'center_panel_sam': cpSAM,
                    'back_wings_sam': bwSAM,
                    'cups_sam': cSAM,
                    'assembly_sam': aSAM,
                    'kode_barcode': barcodeSplit[1]
                };
                insertInputSewing(dataStr);
            });

            function insertInputSewing(data) {
                $.ajax({
                    url: '<?php echo site_url("cutting/ajax_save_sewing"); ?>',
                    data: {
                        'dataStr': data
                    },
                    method: 'POST',
                    dataType: 'json',
                }).done(function(dataReturn) {
                    if (dataReturn != null) {
                        Swal.fire({
                            icon: 'info',
                            title: 'Data saved successfully.',
                            showConfirmButton: false,
                            timer: 750
                        }).then(function() {
                            // console.log('orc: ', data.orc)
                            // comparingData(data.orc);
                        })

                    }
                    $('#barcode').val('');
                    $('#barcode').focus();
                    reload_table();
                    countUnscannedBarcode();
                })
            }
        }

        // function comparingData(o) {
        //     $.ajax({
        //         type: 'GET',
        //         url: '<//?php echo site_url("cutting/ajax_comparing_inputcutting_inputsewing"); ?>/' + o,
        //         dataType: 'json',
        //     }).done(function(data) {
        //         unScannedData = data;
        //         // console.log(unScannedData.count);
        //         if (data.count > 0) {
        //             $('#spanUnscanned').removeClass('bg-primary');
        //             $('#spanUnscanned').addClass('bg-danger');
        //             $('#spanUnscanned').html("Untuk ORC: " + o + " ada " + data.count.toString() + " bundel belum discan!");
        //         } else {
        //             $('#spanUnscanned').removeClass('bg-danger');
        //             $('#spanUnscanned').addClass('bg-primary');
        //             $('#spanUnscanned').html("Untuk ORC: " + o + "semua bundel sudah discan.");
        //         }
        //     });
        // }


        let unscanned = document.getElementById('unscanned');
        let tooltip = new bootstrap.Tooltip(unscanned);
        $('#unscanned').click(function() {
            let unscannedBarcodeTable = $('#unscannedBarcodeTable').DataTable({
                autoWidth: false,
                info: true,
                searching: true,
                paging: true,
                scrollX: true,
                // fixedHeader: true,
                // stateSave: true,
                destroy: true,
                ajax: {
                    url: '<?= site_url('cutting/getUnscannedBarcode'); ?>',
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
                        'data': 'no_bundle',
                        'className': 'text-center px-2'
                    },
                    {
                        'data': 'size',
                        'className': 'text-center px-2'
                    },
                    {
                        'data': 'kode_barcode',
                        'className': 'text-center px-2'
                    }
                ]
            });

            $("#unscannedBarcodeModal").on('shown.bs.modal', function() {
                $('#unscannedBarcodeTable').DataTable().columns.adjust();
            });

            $("#unscannedBarcodeModal").modal("show");
        });

        const countUnscannedBarcode = () => {
            $('#countUnscannedBarcode').empty();
            $.ajax({
                url: '<?= site_url("cutting/getUnscannedBarcode"); ?>',
                type: 'GET',
                dataType: 'JSON',
                beforeSend: function() {
                    $('#countUnscannedBarcode').html('...');
                },
                success: function(result) {
                    $('#countUnscannedBarcode').html(result.data.length)
                }
            });
        }

        countUnscannedBarcode();

        function reload_table() {
            outputCuttingTable.ajax.reload(null, false);
        }

        // $('#inputSewingUnscannedModal').on('shown.bs.modal', function() {
        //     // $('#barcode_input_molding').trigger('focus');
        //     $.each(unScannedData.rows, function(i, item) {
        //         unscannedTable.row.add([
        //             item.orc, item.style, item.size, item.no_bundle, item.kode_barcode
        //         ]).draw();
        //     });
        // });

        // $('#inputSewingUnscannedModal').on('hidden.bs.modal', function() {
        //     unscannedTable.clear();
        // })


    })
</script>