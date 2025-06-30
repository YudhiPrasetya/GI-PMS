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
                        <li class="breadcrumb-item active" aria-current="page">Scan Input Trimstore</li>
                    </ol>
                </nav>
            </div>
        </div>
        <h6 class="mb-0 text-uppercase">Scan Input Trimstore</h6>
        <hr />
        <div class="row">
            <div class="col-12 ">
                <div class="card rounded-4 w-100">
                    <div class="card-body">
                        <div class="mx-3 my-3">


                            <div class="form-group mb-3">
                                <label for="qty" class="form-label">Scan Bundle Record</label>
                                <input type="text" class="form-control" id="barcode" placeholder="Scan barcode here.." required>
                            </div>

                            <!-- <div class="table-responsive"> -->
                            <table id="inputCuttingTable" class="table table-striped table-bordered table-sm nowrap" style="width:100%">
                                <thead>
                                    <th>No.</th>
                                    <th>Date</th>
                                    <th>ORC</th>
                                    <th>Work Order</th>
                                    <th>Style</th>
                                    <th>Color</th>
                                    <th>No. Bundle</th>
                                    <th>Size</th>
                                    <th>Qty</th>
                                </thead>
                                <tfoot>
                                    <th colspan="8">Total Input</th>
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

<script>
    // var table;
    var detailTable;
    var idCutting;
    var selectedRow;
    var selectedRows;
    var barcodeSplit;
    $(document).ready(function() {
        const sweet_loader = '<div class="sweet_loader"><svg viewBox="0 0 140 140" width="140" height="140"><g class="outline"><path d="m 70 28 a 1 1 0 0 0 0 84 a 1 1 0 0 0 0 -84" stroke="rgba(0,0,0,0.1)" stroke-width="4" fill="none" stroke-linecap="round" stroke-linejoin="round"></path></g><g class="circle"><path d="m 70 28 a 1 1 0 0 0 0 84 a 1 1 0 0 0 0 -84" stroke="#71BBFF" stroke-width="4" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-dashoffset="200" stroke-dasharray="300"></path></g></svg></div>';

        var table = $('#inputCuttingTable').DataTable({
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
                url: '<?= site_url('cutting/getDataInput'); ?>',
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

                // Update footer
                // api.column(6).footer().innerHTML =
                //   total
            }
            // lengthMenu: [
            //     [10, 25, 50, 100, -1],
            //     [10, 25, 50, 100, 'All'],
            // ],
        });

        $('#barcode').focus();

        $('#barcode').keypress(function(e) {
            if (e.keyCode == 13) {
                e.preventDefault();

                var barcode = $('#barcode').val();
                barcodeSplit = barcode.split("_");

                // console.log('barcode_split[1]: ', barcodeSplit[1]);

                swal.fire({
                    html: '<h5>Loading...</h5>',
                    showConfirmButton: false,
                    didOpen: function() {
                        $('.swal2-html-container').prepend(sweet_loader);
                    }
                });
                check_barcode(barcodeSplit[1]);
            }
        });

        function check_barcode(barcode) {
            $.ajax({
                url: '<?php echo site_url("cutting/ajax_get_by_barcode"); ?>/' + barcode,
                type: 'get',
                dataType: 'json',
                success: function(dt) {
                    if (dt == 0) {
                        Swal.fire({
                            icon: "warning",
                            title: "Warning!",
                            text: "This barcode already scanned!",
                            showConfirmButton: false,
                            timer: 1200
                        });
                        $('#barcode').val('');
                        $('#barcode').focus();
                    } else {
                        save_bundle_record(dt);
                    }

                }
            });
        }

        function save_bundle_record(data) {
            var dataStr = {
                'orc': data.orc,
                // 'line': $('#line').val(),
                'style': data.style,
                'color': data.color,
                'no_bundle': data.no_bundle,
                'size': data.size,
                'qty_pcs': data.qty_pcs,
                'kode_barcode': barcodeSplit[1],
                'id_master_order_icon_main': data.id_order_icon,
                'wo': data.work_order
            };

            $.ajax({
                url: '<?php echo site_url("cutting/ajax_save_input"); ?>',
                data: {
                    'dataStr': dataStr
                },
                method: 'post',
                dataType: 'json'
            }).done(function(retVal) {
                if (retVal > 0) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Data saved successfully.',
                        // text: 'Data saved successfully.',
                        showConfirmButton: false,
                        timer: 1000
                    });
                }
                $('#barcode').val('');
                $('#barcode').focus();
                reload_table();
            });
        }

        function reload_table() {
            table.ajax.reload(null, false);

        }


    })
</script>