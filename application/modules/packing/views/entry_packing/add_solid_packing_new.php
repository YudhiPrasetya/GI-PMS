<style>
    .select2-result-row {
        display: flex;
        justify-content: space-between; /* Or other alignment */
        padding: 5px;
    }
    .select2-result-column {
        flex: 1; /* Distribute space equally */
        padding: 0 5px;
    }
    .select2-result-column.column1 {
        width: 5%; /* Example fixed width */
    }
    .select2-result-column.column2 {
        width: 10%; /* Example fixed width */
    }
    .select2-result-column.column3 {
        width: 10%; /* Example fixed width */
    }
    .select2-result-column.column4 {
        width: 10%; /* Example fixed width */
    }
    .select2-result-column.column5 {
        width: 10%; /* Example fixed width */
    }
    .select2-result-column.column6 {
        width: 10%; /* Example fixed width */
    }
    .select2-result-column.column7 {
        width: 10%; /* Example fixed width */
    }
    .select2-result-column.column8 {
        width: 10%; /* Example fixed width */
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
                        <li class="breadcrumb-item active" aria-current="page">Input Packing</li>
                    </ol>
                </nav>
            </div>
        </div>
        <h6 class="mb-0 text-uppercase">Add Solid Packing</h6>
        <hr />
        <div class="row">
            <div class="col-12">
                <div class="card rounded-4 w-100">
                    <!-- <form id='frmPackingList' method="POST"> -->
                        <div class="card-body">
                            <div class="mx-3 my-3">

                                <!-- <div class="row mb-3">
                                    <div class="col-lg-1">
                                        <label for="wo" class="col-form-label"><b>Work Order:</b></label>
                                    </div>
                                    <div class="col-lg-11">
                                        <select id="wo" name="wo" class="form-control select2" placeholder="Select Work Order">
                                        </select>
                                    </div>
                                </div> -->

                                <div class="row mb-4">
                                    <div class="col-6">
                                        <!-- <div class="row mb-1">
                                            <div class="col-lg-2">
                                                <label for="wo" class="col-form-label"><b>Work Order:</b></label>
                                            </div>
                                            <div class="col-lg-6">
                                                <input type="text" id="wo" name="wo" class="form-control form-control-sm" disabled>
                                            </div>
                                        </div> -->
                                        <div class="row mb-1">
                                            <div class="col-lg-2">
                                                <label for="wo" class="col-form-label"><b>Work Order:</b></label>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="input-group">
                                                    <input type="text" class="form-control form-control-sm" id="wo" name="wo" disabled />
                                                    <button class="btn btn-outline-secondary" id="btnSearchWO">Search WO</button>
                                                </div>
                                            </div>                                            
                                        </div>

                                        <div class="row mb-1">
                                            <div class="col-lg-2">
                                                <label for="orc" class="col-form-label"><b>ORC:</b></label>
                                            </div>
                                            <div class="col-lg-6">
                                                <input type="text" id="orc" name="orc" class="form-control form-control-sm" disabled>
                                            </div>
                                        </div>
    
                                        <div class="row align-items-center mb-1">
                                            <div class="col-lg-2">
                                                <label for="color" class="col-form-label"><b>Color:</b></label>
                                            </div>
                                            <div class="col-lg-6">
                                                <input type="text" id="color" name="color" class="form-control form-control-sm" disabled>
                                            </div>
                                        </div>
    
                                        <div class="row align-items-center mb-1">
                                            <div class="col-lg-2">
                                                <label for="style" class="col-form-label"><b>Style:</b></label>
                                            </div>
                                            <div class="col-lg-6">
                                                <input type="text" id="style" name="style" class="form-control form-control-sm" disabled>
                                            </div>
                                        </div>
                                    </div>
    
                                    <div class="col-6">
                                        <div class="row align-items-center mb-1">
                                            <div class="col-lg-2">
                                                <label for="buyer" class="col-form-label"><b>Buyer:</b></label>
                                            </div>
                                            <div class="col-lg-6">
                                                <input type="text" id="buyer" name="buyer" class="form-control form-control-sm" disabled>
                                            </div>
                                        </div>
    
                                        <div class="row align-items-center mb-1">
                                            <div class="col-lg-2">
                                                <label for="po" class="col-form-label"><b>No.PO:</b></label>
                                            </div>
                                            <div class="col-lg-6">
                                                <input type="text" id="po" name="po" class="form-control form-control-sm" disabled>
                                            </div>
                                        </div>
    
                                        <div class="row align-items-center mb-1">
                                            <div class="col-lg-2">
                                                <label for="qty_order" class="col-form-label"><b>Qty Order:</b></label>
                                            </div>
                                            <div class="col-lg-6">
                                                <input type="text" id="qty_order" name="qty_order" class="form-control form-control-sm" disabled>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row mb-4">
                                    <table id="solidPackingTable" class="table table-striped table-bordered table-sm" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th width="15%">ID</th>
                                                <th width="15%">Size</th>
                                                <th width="25%">Qty Size Per Karton</th>
                                                <th width="15%">Qty Order</th>
                                                <th width="15%">Total Box</th>
                                                <!-- <th width="25%">Action</th> -->
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th></th>
                                                <th></th>
                                                <th></th>
                                                <th></th>
                                                <th></th>
                                                <!-- <th></th> -->
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                                <div class="d-flex flex-row-reverse bd-highlight">
                                    <div class="p-2 bd-gighlight">
                                        <button type="button" class="btn btn-success btn-lg" id="btnUpdate" disabled>Save</button>
                                    </div>
                                    <div class="p-2 bd-highlight">
                                        <a href="<?= site_url('packing/packing_solid_new'); ?>" class="btn btn-link">Back</a>
                                    </div>
                                </div>
                                <!-- <div class="row align-items-center mb-3">
                                    <div class="col-lg-1">
                                    </div>
                                    <div class="col-lg-1">
                                    </div>
                                </div> -->
                            </div>
                        </div>
                    <!-- </form> -->
                </div>
            </div>
        </div>

    </div>
</div>
</div>

<!-- Modal -->
<div class="modal fade" id="editQtySolidPackingModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Qty Solid Packing</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="my-4">
                    <div class="row align-items-center justify-content-center">
                        <div class="col-lg-1">
                            <label for="color" class="col-form-label">Qty</label>
                        </div>
                        <div class="col-lg-4">
                            <input type="number" id="qty" name="qty" class="form-control text-center">
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" id="btnOK">Save changes</button>
            </div>
        </div>
    </div>
</div>
<!-- End Modal -->

<!-- Modal -->
<div class="modal fade" id="searchWOModal" >
    <div class="modal-dialog modal-fullscreen">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Search Work Order On Master Order Packing</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="my-4">
                    <div class="row">
                        <table class="table table-striped table-hover table-bordered shadow cursor-pointer" width="100%" id="tableWO">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>IdMasterOrderPackingMain</th>
                                    <th>IdMasterOrderIconMain</th>
                                    <th>Buyer</th>
                                    <th>ORC</th>
                                    <th>Work Order</th>
                                    <th>Style</th>
                                    <th>Color</th>
                                    <th>PO</th>
                                    <th>QTY Order</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary btn-lg" id="btnSelectWO">OK</button>
            </div>
        </div>
    </div>
</div>
<!-- End Modal -->



<script>
    $(document).ready(function() {
        var idMasterOrderPackingMain = 0;
        var idMasterOrderIconMain = 0;

        var table = $('#solidPackingTable').DataTable({
            // "dom": 'lfr<"toolbar">tip',
            "destroy": true,
            "footerCallback": function(row, data, start, end, display) {
                var api = this.api(),
                    data;
                var intVal = function(i) {
                    return typeof i === 'string' ? i.replace(/[\$,]/g, '') * 1 : typeof i === "number" ? i : 0;
                };

                var totalPcs = api.column(3).data().reduce(function(a, b) {
                    return intVal(a) + intVal(b);
                }, 0);

                var totalBox = api.column(4).data().reduce(function(a, b) {
                    return intVal(a) + intVal(b);
                }, 0);


                $(api.column(2).footer()).html('Total:');
                $(api.column(3).footer()).html(totalPcs);
                $(api.column(4).footer()).html(totalBox);

            },


            "select": {
                "style": "single"
            },
            "columnDefs": [{
                "targets": [1, 2, 3, 4],
                "className": "text-center align-middle"
            }, {
                "targets": [0],
                "visible": false
            }]
        });

        var tableWO = $('#tableWO').DataTable({
            destroy: true,
            select: {
                style: 'single'
            },
            columnDefs:[
                {
                    targets: 1,
                    visible: false
                },
                {
                    targets: 2,
                    visible: false
                },
            ]
        });


        $('#btn_submit_orc').click(function() {

            var orcVal = $('#orc').val();

            if (orcVal != "") {

                //cek kapasitas karton
                $.ajax({
                    type: "GET",
                    url: "<?= site_url('packing/ajax_get_master_order_packing'); ?>/" + orcVal,
                    dataType: 'json',
                }).done(function(dt) {
                    console.log(dt);
                    // if (dt[0].carton_capacity == null) {
                    if (dt.length == 0) {
                        swal.fire({
                            icon: 'warning',
                            title: 'Warning',
                            // html: 'Kapasitas karton belum diisi.',
                            html: 'ORC atau work order tidak ditemukan!!',
                            showConfirmButton: true
                            // timer: 2000,
                        });
                    } else {
                        //cek di solid packing list
                        if(dt[0].carton_capacity == null){
                            swal.fire({
                                icon: 'warning',
                                title: 'Warning',
                                html: 'Kapasitas karton untuk style ' + dt[0].style + ' belum dibuat!',
                                showConfirmButton: true
                                // timer: 2000,
                            });                            
                        }else{
                            $.ajax({
                                type: 'GET',
                                url: '<?= site_url("packing/ajax_check_solid_packing_list_by_orc"); ?>/' + orcVal,
                                dataType: 'json',
                            }).done(function(rowCount) {
                                if (rowCount > 0) {
                                    swal.fire({
                                        icon: 'warning',
                                        title: 'Warning',
                                        html: 'ORC atau work order sudah diinput.',
                                        showConfirmButton: true,
                                    }).then(function() {
                                        $('#orc').val('');
                                        $('#orc').trigger('focus')
                                    })
                                } else {
                                    $('#btnUpdate').prop('disabled', false);
    
                                    $('#color').val(dt[0].color);
                                    $('#style').val(dt[0].style);
                                    $.ajax({
                                        type: 'POST',
                                        url: "<?= site_url('packing/ajax_get_master_order_packing'); ?>/" + orcVal,
                                        // data: {
                                        //     'style': $('#style').val()
                                        // },
                                        dataType: 'json'
                                    }).done(function(rows) {
                                        if (rows != null) {
                                            $.each(rows, function(i, item) {
                                                table.row.add([
                                                    0,
                                                    item.size,
                                                    item.carton_capacity,
                                                    0, 0,
                                                    '<button type="button" class="btn btn-outline-info btn-sm btnEditQty"><i class="bx bx-edit-alt"></i> Edit pcs</button>'
                                                ]).draw();
                                            })
                                        }
                                    });                                
                                }
                            })
                        }
                    }
                });

            } else {
                swal.fire({
                    icon: 'warning',
                    title: 'Warning',
                    html: 'Silahkan input ORC atau work order.',
                    showConfirmButton: true,
                })
            }
        });

        $('#solidPackingTable tbody').on('click', 'button.btnEditQty', function() {
            var data = table.row($(this).parents('tr')).data();
            // console.log('data[3]: ', data[3]);
            $('#qty').val(data[3]);
            $('#editQtySolidPackingModal').modal('show');
        })

        $('#btnOK').click(function() {
            if ($('#qty').val() != '') {
                table.rows({
                    selected: true
                }).every(function(rowIdx, tableLoop, rowLoop) {
                    table.cell(rowIdx, 3).data($('#qty').val());
                    let qtySize = table.cell(rowIdx, 2).data();
                    let pcs = table.cell(rowIdx, 3).data();
                    let box = Math.ceil(pcs / qtySize);
                    table.cell(rowIdx, 4).data(box);
                }).draw();

            }
            $('#editQtySolidPackingModal').modal('hide');

            // hitungJmlBox();

        });


        $('#editQtySolidPackingModal').on('shown.modal.bs', function() {
            $('#qty').focus();
        });

        $('#editQtySolidPackingModal').on('hidden.modal.bs', function() {
            $('#qty').val('');
            table.rows().deselect();
        });

        $('#btnUpdate').click(function() {

            // $('#btnUpdate').prop('disabled', true);

            let rows = table.rows().data();
            let orc = $('#orc').val();
            let wo = $('#wo').val();
            let style = $('#style').val();
            let color = $('#color').val();
            let po = $('#po').val();

            let arrPackingList = [];
            $.each(rows, function(i, item) {
                if (parseInt(item[3]) != 0) {
                    let objPackingList = {
                        // "id_packing_list": item[0],
                        "id_master_order_icon_main": idMasterOrderIconMain,
                        "orc": orc,
                        "wo": wo,
                        "po": po,
                        "color": color,
                        "style": style,
                        "size": item[1],
                        "qty": parseInt(item[3]),
                        "box_capacity": parseInt(item[2]),
                        "total_box": parseInt(item[4])
                    };
                    arrPackingList.push(objPackingList);
                }
            });
            console.log('arrPackingList: ', arrPackingList);

            $.ajax({
                type: 'POST',
                url: '<?php echo site_url("packing/ajax_update_batch_solid_packing_list"); ?>',
                data: {
                    "arrPackingList": arrPackingList
                },
                dataType: 'json'
            }).done(function(rst) {
                if (rst > 0) {
                    $.ajax({
                        type: 'GET',
                        url: '<?= site_url("packing/ajax_get_packing_wo"); ?>/' + wo,
                        dataType: 'json'
                    }).done(function(retData) {
                        if (retData != null) {
                            let noBox = 0;
                            let arrSolidPackingBarcode = [];
                            let zero = "0";

                            $.each(retData, function(i, item) {
                                let sisa = (item.qty % item.box_capacity);
                                for (let x = 1; x <= item.total_box; x++) {
                                    noBox++;
                                    let objSolidPackingBarcode = {
                                        "id_packing_list": item.id_packing_list,
                                        "no_box": noBox,
                                        "qty": (x == item.total_box && sisa > 0 ? sisa : parseInt(item.box_capacity)),
                                        "barcode": item.wo + "-" + zero.repeat(4 - noBox.toString().length) + noBox.toString()
                                        // "barcode": item.orc + "-" + zero.repeat(4 - noBox.toString().length) + noBox.toString()
                                    }
                                    arrSolidPackingBarcode.push(objSolidPackingBarcode);
                                }
                            });

                            $.ajax({
                                type: 'POST',
                                url: '<?= site_url("packing/ajax_insert_solid_packing_barcode_batch"); ?>',
                                data: {
                                    'arrSolidPackingBarcode': arrSolidPackingBarcode
                                },
                                dataType: 'json'
                            }).done(function(val) {
                                if (val > 0) {
                                    swal.fire({
                                        icon: 'success',
                                        title: 'Success',
                                        html: 'Data solid packing list berhasil diupdate.',
                                        showConfirmButton: true,
                                    }).then(function() {
                                        table.clear().draw();
                                        $('#orc').val('');
                                        $('#wo').val('');
                                        $('#color').val('');
                                        $('#style').val('');
                                        $('#buyer').val('');
                                        $('#po').val('');
                                        $('#qty_order').val('');

                                        table.clear().draw();
                                        $('#btnUpdate').prop('disabled', true);
                                    })
                                }
                            });

                        }
                    })

                }
            });


        });

        $('#btnSearchWO').click(function(){
            $('#searchWOModal').modal('show');
        });

        $('#searchWOModal').on('shown.modal.bs', function(){
            loadWO();
            function loadWO(){
                $.ajax({
                    type: 'GET',
                    url: '<?= site_url("packing/ajax_getPackingOrders"); ?>',
                    dataType: 'JSON',
                    success: function(response){
                        let result = response.data;
                        for(let x = 0; x < result.length; x++){
                            tableWO.row.add([
                                x+1,
                                result[x].id,
                                result[x].id_master_order_icon_main,
                                result[x].buyer,
                                result[x].orc,
                                result[x].wo,
                                result[x].style,
                                result[x].color,
                                result[x].no_po,
                                result[x].qty_order,
                            ]).draw()
                        }
                    }
                })
            }
        });

        $('#searchWOModal').on('hidden.modal.bs', function(){
            tableWO.clear().draw();
        });

        $('#btnSelectWO').click(function(){
            let selectedRow = tableWO.row('.selected').data();
            console.log('selectedRow: ', selectedRow);
            idMasterOrderPackingMain = parseInt(selectedRow[1]);
            idMasterOrderIconMain = parseInt(selectedRow[2]);

            $('#buyer').val(selectedRow[3]);
            $('#orc').val(selectedRow[4])
            $('#wo').val(selectedRow[5]);
            $('#style').val(selectedRow[6]);
            $('#color').val(selectedRow[7]);
            $('#po').val(selectedRow[8]);
            $('#qty_order').val(selectedRow[9]);


            $('#searchWOModal').modal('hide');

            loadSolidPackingTable(idMasterOrderPackingMain);
        });

        function loadSolidPackingTable(id){
            console.log('id: ', id);
            $.ajax({
                type: 'GET',
                url: '<?= site_url("Packing/ajax_getPackingOrderDetail"); ?>/' + id,
                dataType: 'JSON',
                success: function(result){
                    let data = result.data;
                    table.clear().draw();
                    for(let x = 0; x < data.length; x++){
                        table.row.add([
                            0,
                            data[x].size,
                            parseInt(data[x].carton_capacity),
                            parseInt(data[x].qty),
                            Math.ceil(parseInt(data[x].qty)/parseInt(data[x].carton_capacity)),
                            // '<button type="button" class="btn btn-outline-info btn-sm btnEditQty"><i class="bx bx-edit-alt"></i> Edit pcs</button>'
                        ]).draw();
                    }
                    $('#btnUpdate').prop('disabled', false);
                }
            })
        }


    });
</script>