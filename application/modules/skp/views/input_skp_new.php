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
                        <li class="breadcrumb-item active" aria-current="page">Input SKP</li>
                    </ol>
                </nav>
            </div>

        </div>
        <!--end breadcrumb-->
        <h6 class="mb-0 text-uppercase">Input SKP</h6>
        <hr />


        <div class="card">
            <div class="card-body">
                <div class="row my-3 mx-2">
                    <div class="row g-3 align-items-center mb-4">
                        <div class="col-sm-4 col-md-3 col-lg-2">
                            <label for="scan_bundle_record" class="col-form-label">Scan Bundle Record</label>
                        </div>
                        <div class="col-sm-8 col-md-5 col-lg-3">
                            <input type="text" id="scan_bundle_record" class="form-control" placeholder="Scan barcode here...">
                        </div>
                    </div>
                    <div class="mb-3">
                        <button class="btn btn-info btn-sm me-1" id="btn_daily" disabled>Daily</button>
                        <button class="btn btn-outline-info btn-sm me-1" id="btn_yesterday">Yesterday</button>
                        <button class="btn btn-outline-info btn-sm" id="btn_30_days_ago">30 Days Ago</button>
                    </div>
                    <!-- <div class="table-responsive"> -->
                    <table id="inputSkpTable" class="table table-striped table-bordered table-sm nowrap" style="width:100%">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Scan Date</th>
                                <th>ORC</th>
                                <th>Style</th>
                                <th>Color</th>
                                <th>Size</th>
                                <th>Bundle</th>
                                <th>Qty</th>
                                <th>Barcode</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <th colspan="7">Total Input SKP</th>
                            <th></th>
                        </tfoot>
                    </table>
                    <!-- </div> -->
                </div>
            </div>
        </div>


    </div>
</div>
<!--end page wrapper -->


<script>
    $(document).ready(function() {
        const sweet_loader = '<div class="sweet_loader"><svg viewBox="0 0 140 140" width="140" height="140"><g class="outline"><path d="m 70 28 a 1 1 0 0 0 0 84 a 1 1 0 0 0 0 -84" stroke="rgba(0,0,0,0.1)" stroke-width="4" fill="none" stroke-linecap="round" stroke-linejoin="round"></path></g><g class="circle"><path d="m 70 28 a 1 1 0 0 0 0 84 a 1 1 0 0 0 0 -84" stroke="#71BBFF" stroke-width="4" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-dashoffset="200" stroke-dasharray="300"></path></g></svg></div>';

        $('#scan_bundle_record').focus();

        let inputSkpTable = $('#inputSkpTable').DataTable({
            // lengthChange: false,
            // buttons: ['copy', 'excel', 'pdf', 'print'],
            scrollX: true,
            destroy: true,
            ajax: {
                url: '<?= site_url("skp/getInputSkp"); ?>',
                type: 'GET',
                dataType: 'JSON'
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
                    'data': 'date_created',
                    'className': 'text-center px-3'
                },
                {
                    'data': 'orc',
                    'className': 'text-center px-3'
                },
                {
                    'data': 'style',
                    'className': 'text-center px-3'
                },
                {
                    'data': 'color',
                    'className': 'text-center px-3'
                },
                {
                    'data': 'size',
                    'className': 'text-center px-3'
                },
                {
                    'data': 'no_bundle',
                    'className': 'text-center px-3'
                },
                {
                    'data': 'qty',
                    'className': 'text-center px-3'
                },
                {
                    'data': 'kode_barcode',
                    'className': 'text-center px-3'
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
                    .column(7)
                    .data()
                    .reduce((a, b) => intVal(a) + intVal(b), 0);

                // Total over this page
                pageTotal = api
                    .column(7, {
                        page: 'current'
                    })
                    .data()
                    .reduce((a, b) => intVal(a) + intVal(b), 0);

                // Update footer
                api.column(7).footer().innerHTML =
                    pageTotal + ' ( ' + total + ' )';

                // Update footer
                // api.column(6).footer().innerHTML =
                //   total
            }

        });

        $('#btn_daily').click(function() {
            $('#btn_daily').removeClass('btn-outline-info');
            $('#btn_daily').addClass('btn-info');
            $('#btn_daily').prop('disabled', true);

            $('#btn_yesterday').removeClass('btn-info');
            $('#btn_yesterday').addClass('btn-outline-info');
            $('#btn_yesterday').prop('disabled', false);

            $('#btn_30_days_ago').removeClass('btn-info');
            $('#btn_30_days_ago').addClass('btn-outline-info');
            $('#btn_30_days_ago').prop('disabled', false);

            inputSkpTable.clear().draw();

            inputSkpTable = $('#inputSkpTable').DataTable({
                // lengthChange: false,
                // buttons: ['copy', 'excel', 'pdf', 'print'],
                scrollX: true,
                destroy: true,
                ajax: {
                    url: '<?= site_url("skp/getInputSkp"); ?>',
                    type: 'GET',
                    dataType: 'JSON'
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
                        'data': 'tgl',
                        'className': 'text-center px-3'
                    },
                    {
                        'data': 'orc',
                        'className': 'text-center px-3'
                    },
                    {
                        'data': 'style',
                        'className': 'text-center px-3'
                    },
                    {
                        'data': 'color',
                        'className': 'text-center px-3'
                    },
                    {
                        'data': 'size',
                        'className': 'text-center px-3'
                    },
                    {
                        'data': 'no_bundle',
                        'className': 'text-center px-3'
                    },
                    {
                        'data': 'qty_pcs',
                        'className': 'text-center px-3'
                    },
                    {
                        'data': 'kode_barcode',
                        'className': 'text-center px-3'
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
                        .column(7)
                        .data()
                        .reduce((a, b) => intVal(a) + intVal(b), 0);

                    // Total over this page
                    pageTotal = api
                        .column(7, {
                            page: 'current'
                        })
                        .data()
                        .reduce((a, b) => intVal(a) + intVal(b), 0);

                    // Update footer
                    api.column(7).footer().innerHTML =
                        pageTotal + ' ( ' + total + ' )';

                    // Update footer
                    // api.column(6).footer().innerHTML =
                    //   total
                }



            });
        });

        $('#btn_yesterday').click(function() {
            $('#btn_daily').removeClass('btn-info');
            $('#btn_daily').addClass('btn-outline-info');
            $('#btn_daily').prop('disabled', false);

            $('#btn_yesterday').removeClass('btn-outline-info');
            $('#btn_yesterday').addClass('btn-info');
            $('#btn_yesterday').prop('disabled', true);

            $('#btn_30_days_ago').removeClass('btn-info');
            $('#btn_30_days_ago').addClass('btn-outline-info');
            $('#btn_30_days_ago').prop('disabled', false);

            inputSkpTable.clear().draw();

            inputSkpTable = $('#inputSkpTable').DataTable({
                // lengthChange: false,
                // buttons: ['copy', 'excel', 'pdf', 'print'],
                scrollX: true,
                destroy: true,
                ajax: {
                    url: '<?= site_url("skp/getInputSkpYesterday"); ?>',
                    type: 'GET',
                    dataType: 'JSON'
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
                        'data': 'date_created',
                        'className': 'text-center px-3'
                    },
                    {
                        'data': 'orc',
                        'className': 'text-center px-3'
                    },
                    {
                        'data': 'style',
                        'className': 'text-center px-3'
                    },
                    {
                        'data': 'color',
                        'className': 'text-center px-3'
                    },
                    {
                        'data': 'size',
                        'className': 'text-center px-3'
                    },
                    {
                        'data': 'no_bundle',
                        'className': 'text-center px-3'
                    },
                    {
                        'data': 'qty_pcs',
                        'className': 'text-center px-3'
                    },
                    {
                        'data': 'kode_barcode',
                        'className': 'text-center px-3'
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
                        .column(7)
                        .data()
                        .reduce((a, b) => intVal(a) + intVal(b), 0);

                    // Total over this page
                    pageTotal = api
                        .column(7, {
                            page: 'current'
                        })
                        .data()
                        .reduce((a, b) => intVal(a) + intVal(b), 0);

                    // Update footer
                    api.column(7).footer().innerHTML =
                        pageTotal + ' ( ' + total + ' )';

                    // Update footer
                    // api.column(6).footer().innerHTML =
                    //   total
                }

            });
        });

        $('#btn_30_days_ago').click(function() {
            $('#btn_daily').removeClass('btn-info');
            $('#btn_daily').addClass('btn-outline-info');
            $('#btn_daily').prop('disabled', false);

            $('#btn_yesterday').removeClass('btn-info');
            $('#btn_yesterday').addClass('btn-outline-info');
            $('#btn_yesterday').prop('disabled', false);

            $('#btn_30_days_ago').removeClass('btn-outline-info');
            $('#btn_30_days_ago').addClass('btn-info');
            $('#btn_30_days_ago').prop('disabled', true);

            inputSkpTable.clear().draw();

            inputSkpTable = $('#inputSkpTable').DataTable({
                // lengthChange: false,
                // buttons: ['copy', 'excel', 'pdf', 'print'],
                scrollX: true,
                destroy: true,
                ajax: {
                    url: '<?= site_url("skp/getInputSkp30DaysAgo"); ?>',
                    type: 'GET',
                    dataType: 'JSON'
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
                        'data': 'date_created',
                        'className': 'text-center px-3'
                    },
                    {
                        'data': 'orc',
                        'className': 'text-center px-3'
                    },
                    {
                        'data': 'style',
                        'className': 'text-center px-3'
                    },
                    {
                        'data': 'color',
                        'className': 'text-center px-3'
                    },
                    {
                        'data': 'size',
                        'className': 'text-center px-3'
                    },
                    {
                        'data': 'no_bundle',
                        'className': 'text-center px-3'
                    },
                    {
                        'data': 'qty_pcs',
                        'className': 'text-center px-3'
                    },
                    {
                        'data': 'kode_barcode',
                        'className': 'text-center px-3'
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
                        .column(7)
                        .data()
                        .reduce((a, b) => intVal(a) + intVal(b), 0);

                    // Total over this page
                    pageTotal = api
                        .column(7, {
                            page: 'current'
                        })
                        .data()
                        .reduce((a, b) => intVal(a) + intVal(b), 0);

                    // Update footer
                    api.column(7).footer().innerHTML =
                        pageTotal + ' ( ' + total + ' )';

                    // Update footer
                    // api.column(6).footer().innerHTML =
                    //   total
                }

            });

        });

        $('#scan_bundle_record').keypress(function(e) {
            if (e.keyCode == 13) {
                e.preventDefault();

                let barcode = $('#scan_bundle_record').val();
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
            console.log(barcode);
            $.ajax({
                url: '<?= site_url("skp/getCheckBarcodCutting"); ?>',
                type: 'GET',
                dataType: 'JSON',
                data: {
                    "barcode": barcode
                },
                success: function(result) {
                    console.log(result);
                    if (result == 0) {
                        Swal.fire({
                            icon: "warning",
                            title: "Warning!",
                            text: "Unregistered barcode.",
                            showConfirmButton: false,
                            timer: 1000
                        });
                        $('#scan_bundle_record').val('');
                        $('#scan_bundle_record').focus();
                        // } else if (result == 1) {
                        //     Swal.fire({
                        //         icon: "warning",
                        //         title: "Warning!",
                        //         text: 'Barcode has not been scanned in "Input Skp".',
                        //         showConfirmButton: false,
                        //         timer: 1500
                        //     });
                        //     $('#scan_bundle_record').val('');
                        //     $('#scan_bundle_record').focus();
                    } else if (result == 1) {
                        Swal.fire({
                            icon: "warning",
                            title: "Warning!",
                            text: "Barcode has been scanned.",
                            showConfirmButton: false,
                            timer: 1000
                        });
                        $('#scan_bundle_record').val('');
                        $('#scan_bundle_record').focus();
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

                $('#scan_bundle_record').val('');
                $('#scan_bundle_record').focus();
                inputSkpTable.ajax.reload();
            });
        }


    });
</script>