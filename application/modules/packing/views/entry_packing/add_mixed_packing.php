<style>
    input::-webkit-outer-spin-button,
    input::-webkit-inner-spin-button {
        -webkit-appearance: none;
        margin: 0;
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
                        <li class="breadcrumb-item active" aria-current="page">Mixed Size Packing</li>
                        <li class="breadcrumb-item active" aria-current="page">Add Mixed Size Packing</li>
                    </ol>
                </nav>
            </div>
        </div>
        <h6 class="mb-0 text-uppercase">Mixed Size Packing</h6>
        <hr />
        <div class="row">
            <div class="col-12">
                <div class="card rounded-4 w-100">
                    <div class="card-body">
                        <div class="mx-3 my-3">

                            <form id='frmPackingList' method="POST">
                                <div class="card-body">
                                    <div class="form-group row">
                                        <div class="col-sm-3">
                                            <label for="po" class="col-form-label col-form-label-sm">Po Number</label>
                                            <!-- <select id="po" name="po" class="form-control"></select> -->
                                            <select class="select2_modal_1" id="po"></select>
                                        </div>
                                        <div class="col-sm-3">id="total"
                                            <label for="colors" class="col-form-label col-form-label-sm">Color</label>
                                            <input type="text" id="colors" name="color" class="form-control" value=" -" disabled>
                                        </div>
                                        <div class="col-sm-4">
                                            <label for="style" class="col-form-label col-form-label-sm">Style & ORC</label>
                                            <!-- <select id="style" class="form-control select2" style="width: 100%;" disabled></select> -->
                                            <select class="select2_modal_1" id="style">
                                                <option value="">-</option>
                                            </select>
                                            <!-- <select class="select2_modal_1" id="po"></select> -->
                                        </div>

                                        <div class="col-sm-1">
                                            <button type="button" class="btn btn-outline-secondary ml-3" style="margin-top: 30px;" id="btn_reset">Reset</button>
                                        </div>
                                    </div>

                                    <!-- <hr> -->
                                    <input type="number" id="total" name="total" class="form-control form-control-sm" hidden disabled>

                                    <div class="mt-4" id="scrolltable"></div>



                                    <a href="<?php echo site_url('packing/packing_mixed'); ?>" class="btn btn-outline-secondary mt-5">Back</a>
                                </div>

                            </form>


                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>

</div>

<!-- <script src="https://cdn.datatables.net/fixedcolumns/5.0.0/js/dataTables.fixedColumns.js"></script> -->
<!-- <script src="https://cdn.datatables.net/fixedcolumns/5.0.0/js/fixedColumns.dataTables.js"></script> -->
<script>
    $('.select2_modal_1').select2({
        theme: 'bootstrap-5',
        width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style',

    });
    $('.select2_modal_2').select2({
        theme: 'bootstrap-5',
        width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style',

    });
</script>
<script>
    $(document).ready(function() {
        $("#style").prop('disabled', true);

        $('.nav-link').trigger('click');
        var po;
        var orc;
        $('#total').val(1);


        const loadPO = () => {
            $('#po').empty();
            $.ajax({
                url: " <?= site_url('packing/ajax_get_po1'); ?>",
                type: 'GET',
                dataType: 'JSON',
                beforeSend: function() {
                    $("#po").prepend($('<option></option>').html('Loading...'));
                },
            }).done(function(data) {
                $('#po').empty();
                $('#po').append($('<option>', {
                    value: "",
                    text: "- Select PO Number -"
                }));
                $.each(data, function(i, item) {
                    $('#po').append($('<option>', {
                        value: item.po,
                        text: item.po
                    }));
                });
            });
        }

        loadPO();


        // Function Load Style & ORC Select
        // $('#style').select2({
        //     placeholder: '- Select Style -',
        //     theme: 'bootstrap4'
        // });
        const loadStyleOrc = (poVal) => {
            $('#style').empty();
            $.ajax({
                url: " <?= site_url('packing/getOrcStyle'); ?>",
                type: 'GET',
                dataType: 'JSON',
                data: {
                    'poVal': poVal
                },
                beforeSend: function() {
                    $("#style").prepend($('<option></option>').html('Loading...'));
                },
            }).done(function(data) {
                $('#colors').val(data[0].color);

                $('#style').empty();
                $('#style').prop('disabled', false);
                $('#style').append($('<option>', {
                    value: "",
                    text: "- Select Style -"
                }));
                $.each(data, function(i, item) {
                    $('#style').append($('<option>', {
                        value: item.id_order,
                        text: item.style + ' | ' + item.orc
                    }));
                });
            });
        }


        // Select PO
        let table;
        $('#po').change(function() {

            $(this).prop('disabled', true);

            var poVal = $(this).val();


            if (poVal === '') {
                $('#po').val('');
                $('#po').trigger('focus')

            } else if (poVal !== null) {
                loadStyleOrc(poVal)
            }
        });


        // Select Style & ORC
        // $('#style').change(function() {

        //     $(this).prop('disabled', true);

        //     let id_order = $(this).val();
        //     let poVal = $('#po').val();

        //     if (id_order !== '') {
        //         //cek di solid packing list
        //         $.ajax({
        //             type: 'GET',
        //             url: '<?= site_url("packing/ajax_check_mixed_packing_list_by_po"); ?>',
        //             data: {
        //                 'id_order': id_order,
        //                 'poVal': poVal
        //             },
        //             dataType: 'json',
        //         }).done(function(rowCount) {
        //             // console.log('ajax_check_mixed_packing_list_by_po: ', rowCount);
        //             if (rowCount > 0) {
        //                 swal.fire({
        //                     icon: 'warning',
        //                     title: 'This PO Number and Style have been inputted',
        //                     showConfirmButton: true,
        //                     // timer: 2000
        //                 }).then(function() {
        //                     $("#style").val('').trigger('change');
        //                     $("#style").prop('disabled', false);
        //                 })
        //             } else {


        //                 // Check size in output sewing detail
        //                 $.ajax({
        //                     type: "GET",
        //                     url: "<?= site_url('packing/ajax_get_cutting_by_po2'); ?>/" + poVal,
        //                     dataType: 'json',
        //                 }).done(function(dt) {
        //                     if (dt.length < 1) {
        //                         swal.fire({
        //                             icon: 'warning',
        //                             title: 'Size not found',
        //                             showConfirmButton: true,
        //                             // timer: 2000,
        //                         }).then(function() {
        //                             $("#style").val('').trigger('change');
        //                             $("#style").prop('disabled', false);
        //                         })
        //                     } else {

        //                         // Show Table
        //                         // Show Table
        //                         $('#scrolltable').show();

        //                         document.getElementById('scrolltable').innerHTML = '<table id="mixedPackingTable" class="table table-striped table-bordered table-hover nowrap" style="width:100%;text-align: center;"><thead class="text-white"><tr><th rowspan="2" style="vertical-align: middle;background: darkslategray;">START</th><th rowspan="2" style="vertical-align: middle;background: darkslategray;">END</th><th rowspan="2" style="vertical-align: middle;background: darkslategray;">COLOR</th><th colspan="' + dt.length + '" style="background: darkslategray;">SIZE</th><th rowspan="2" style="vertical-align: middle;background: darkslategray;">TOTAL PCS</th><th rowspan="2" style="vertical-align: middle;background: darkslategray;">PCS/BOX</th></tr><tr id="trzise"></tr></thead></table>';
        //                         document.getElementById('scrolltable').innerHTML += '<br><button type="button" class="btn btn-primary shadow m-2" id="addrow">ADD ROW</button> <button type="button" class="btn btn-success shadow m-2" id="getdata">SAVE DATA</button><br><br>';
        //                         for (let i = 0; i < dt.length; i++) {
        //                             document.getElementById('trzise').innerHTML += '<th style="background: darkslategray;">' + dt[i].size + '</th>';
        //                         };

        //                         table = $('#mixedPackingTable').DataTable({
        //                             responsive: true,
        //                             autoWidth: true,
        //                             paging: false,
        //                             searching: false,
        //                             fixedHeader: true,
        //                             // fixedColumns: {
        //                             //     left: 3,
        //                             //     right: 2
        //                             // },
        //                             scrollX: true,
        //                             info: false,
        //                             ordering: false,
        //                         });
        //                         if (dt != null) {
        //                             const rowx = [];
        //                             for (let i = 1; i < 2; i++) {
        //                                 rowx.push(
        //                                     '<input style="min-width:70px;text-align: center;" type="number" id="krtnstart' + i + '"  class="form-control" placeholder="0"></input>',
        //                                     '<input style="min-width:70px;text-align: center;" type="number" id="krtnend' + i + '" class="form-control" placeholder="0"></input>',
        //                                     '<input style="min-width:150px;text-align: center;" type="text" id="color' + i + '" class="form-control colorss"></input>',
        //                                 );
        //                             };
        //                             for (let ii = 0; ii < dt.length; ii++) {
        //                                 rowx.push(
        //                                     '<input style="min-width:60px;text-align: center;" type="number" id="' + dt[ii].size + '1" class="form-control" placeholder="0"></input>'
        //                                 );
        //                             };
        //                             for (let iii = 1; iii < 2; iii++) {
        //                                 rowx.push(
        //                                     '<input style="min-width:70px;text-align: center;" type="number" id="ttlpcs' + iii + '" class="form-control" placeholder="0" readonly></input>',
        //                                     '<input style="min-width:70px;text-align: center;" type="number" id="pcspbox' + iii + '" class="form-control" placeholder="0" readonly></input>',
        //                                 );
        //                             };
        //                             table.row.add(rowx).draw();
        //                             $.ajax({
        //                                 url: '<?php echo site_url("Packing/ajax_get_color"); ?>/' + poVal,
        //                                 type: 'GET',
        //                                 dataType: 'json'
        //                             }).done(function(dt) {

        //                                 const arrcolor = [];

        //                                 $('#color1').prop('disabled', true);
        //                                 $('#color1').val(dt[0].color);
        //                             });
        //                         }

        //                         $('#addrow').click(function() {
        //                             var $tableBody = $('#mixedPackingTable').find("tbody"),
        //                                 $trLast = $tableBody.find("tr:last"),
        //                                 $trNew = $trLast.clone();
        //                             $trNew.find("input").not(".colorss").val("");
        //                             // Find by attribute 'id'
        //                             $trNew.find('[id]').each(function() {
        //                                 this.id = this.id.slice(0, -1) + (parseInt($('#total').val()) + 1);
        //                             });
        //                             $trLast.after($trNew);
        //                             $('#total').val(1 + parseInt($('#total').val()))
        //                             var total = $('#total').val();
        //                             // console.log(total);
        //                             countRowData();
        //                         });

        //                         // Button Save Data
        //                         $('#getdata').click(function() {
        //                             swal.fire({
        //                                 title: 'SAVE MIXED PACKING FOR PO NUMBER: ' + $('#po').val() + '?',
        //                                 type: 'warning',
        //                                 showCancelButton: true,
        //                                 confirmButtonText: 'Yes',
        //                                 cancelButtonText: 'No',
        //                                 reverseButtons: true
        //                             }).then((result) => {
        //                                 if (result.value) {
        //                                     var looping = $('#total').val();
        //                                     const arrdata = [];
        //                                     const arrdata2 = [];
        //                                     const arrdatax = [];
        //                                     for (let ix = 1; ix <= looping; ix++) {
        //                                         arrdata.push({
        //                                             "id_order": $('#style').val(),
        //                                             "po": $('#po').val(),
        //                                             // "style": $('#style').val(),
        //                                             "box_start": $('#krtnstart' + ix).val(),
        //                                             "box_end": $('#krtnend' + ix).val(),
        //                                             "color": $('#color' + ix).val(),
        //                                             "type": $('#type' + ix).val(),
        //                                             "total_pcs": $('#ttlpcs' + ix).val(),
        //                                             "pcs_box": $('#pcspbox' + ix).val(),
        //                                             "jmlh_karton": $('#krtnend' + ix).val() - $('#krtnstart' + ix).val() + 1,
        //                                         });

        //                                     };
        //                                     // console.log('arrdata karton: ', arrdata);
        //                                     $.ajax({
        //                                         type: 'POST',
        //                                         url: '<?php echo site_url("packing/ajax_insert_mixed_packing_list"); ?>',
        //                                         data: {
        //                                             "arrdata": arrdata
        //                                         },
        //                                         dataType: 'json',
        //                                         success: function(id) {
        //                                             // console.log("id_mixed: ", id);
        //                                             var looping = $('#total').val();
        //                                             const arrdata = [];
        //                                             const arrdata1 = [];
        //                                             const arrdata2 = [];
        //                                             // LOOPING SIZE
        //                                             for (let qq = 0; qq < id.length; qq++) {
        //                                                 for (let qqq = 0; qqq < dt.length; qqq++) {
        //                                                     arrdata1.push({
        //                                                         "id_mixed": id[qq],
        //                                                         "size": dt[qqq].size,
        //                                                         "qty": $('#' + dt[qqq].size + (qq + 1)).val()
        //                                                     });
        //                                                 };
        //                                             };
        //                                             // LOPPING BARCODE
        //                                             for (let qq = 0; qq < id.length; qq++) {
        //                                                 var total_box = $('#krtnend' + (qq + 1)).val();
        //                                             };
        //                                             for (let qq = 0; qq < id.length; qq++) {
        //                                                 for (let iy = 1; iy <= $('#krtnend' + (qq + 1)).val() - $('#krtnstart' + (qq + 1)).val() + 1; iy++) {
        //                                                     arrdata.push({
        //                                                         "id_mixed": id[qq],
        //                                                     });
        //                                                 };
        //                                             };
        //                                             for (let iy = 1; iy <= total_box; iy++) {
        //                                                 arrdata2.push({
        //                                                     "box_number": iy,
        //                                                 });
        //                                             };
        //                                             // console.log("ARRDATA1: ", arrdata1);
        //                                             // console.log("ID MIXED: ", arrdata);
        //                                             // console.log("BOX_NUMBER: ", arrdata2);

        //                                             // AJAX BARCODE
        //                                             $.ajax({
        //                                                 type: 'POST',
        //                                                 url: '<?php echo site_url("packing/ajax_insert_mixed_packing_list_barcode"); ?>',
        //                                                 data: {
        //                                                     "arrdata": arrdata
        //                                                 },
        //                                                 dataType: 'json',
        //                                                 success: function(id) {
        //                                                     let id_box = id.map((item, i) => Object.assign({}, item, arrdata2[i]));
        //                                                     // console.log("GABUNAGN FIX: ", id_box);
        //                                                     $.ajax({
        //                                                         type: 'POST',
        //                                                         url: '<?php echo site_url("packing/ajax_update_mixed_packing_list_barcode"); ?>',
        //                                                         data: {
        //                                                             "arrdata": id_box,
        //                                                         },
        //                                                         dataType: 'json',
        //                                                         success: function() {
        //                                                             // console.log('OK!');
        //                                                         },
        //                                                         error: function(xhr) {
        //                                                             // console.log(xhr.responseText);
        //                                                         }
        //                                                     });
        //                                                 }
        //                                             });
        //                                             // AJAX SIZE
        //                                             $.ajax({
        //                                                 type: 'POST',
        //                                                 url: '<?php echo site_url("packing/ajax_insert_mixed_size_list"); ?>',
        //                                                 data: {
        //                                                     "arrdata1": arrdata1
        //                                                 },
        //                                                 dataType: 'json',
        //                                                 success: function(id) {
        //                                                     swal.fire({
        //                                                         type: 'success',
        //                                                         title: 'Add mixed list successfuly!',
        //                                                         showConfirmButton: false,
        //                                                         timer: 1000,
        //                                                     });
        //                                                     // console.log("id_mixed: ", id);
        //                                                     const arrdata1 = [];
        //                                                     for (let qq = 0; qq < id.length; qq++) {
        //                                                         for (let qqq = 0; qqq < dt.length; qqq++) {
        //                                                             arrdata1.push({
        //                                                                 "id_mixed": id[qq],
        //                                                                 "size": dt[qqq].size + (qq + 1),
        //                                                                 "qty": $('#' + dt[qqq].size + (qq + 1)).val()
        //                                                             });
        //                                                         };
        //                                                     };

        //                                                     let getUrl = window.location;
        //                                                     let baseUrl = getUrl.protocol + "//" + getUrl.host + "/" + getUrl.pathname.split('/')[1];

        //                                                     window.location = baseUrl + '/Packing/packing_mixed'

        //                                                 },
        //                                                 error: function(xhr) {
        //                                                     // console.log(xhr.responseText);
        //                                                 }
        //                                             });
        //                                         },
        //                                         error: function(xhr) {
        //                                             // console.log(xhr.responseText);
        //                                         }
        //                                     });
        //                                 }
        //                             });
        //                         });

        //                         countRowData();

        //                         function countRowData() {
        //                             // console.log('OOOKKKK', $('#total').val(), '#############');
        //                             // var looping = $('#total').val();
        //                             // console.log('LOOPING: ', $('#total').val());
        //                             const total = [];
        //                             // LOPPING BY ROW LENGTH
        //                             for (let ix = 1; ix <= $('#total').val(); ix++) {
        //                                 // console.log('LOOOP 111111', $('#total').val(), '#############');
        //                                 // LOOPING BY SIZE
        //                                 for (let ii = 0; ii < dt.length; ii++) {
        //                                     // console.log('LOOOP 222222222', $('#total').val(), '#############');
        //                                     $("#" + dt[ii].size + "" + ix).on("keyup", function(event) {
        //                                         total.length = 0;
        //                                         // LOOPING TO GET SIZE VALUE
        //                                         for (let iix = 0; iix < dt.length; iix++) {
        //                                             // console.log('LOOOP 33333333333', $('#total').val(), '#############');
        //                                             // console.log('size' + dt[iix].size + ix + ': ', $("#" + dt[iix].size + ix).val());
        //                                             total.push(
        //                                                 // $("#" + dt[iix].size + ix).val(), 
        //                                                 $("#" + dt[iix].size + ix).val() == '' ? 0 : $("#" + dt[iix].size + ix).val()
        //                                             );
        //                                         };
        //                                         // console.log('total size: ', total);
        //                                         var result = total.map(function(x) {
        //                                             return parseInt(x, 10);
        //                                         });
        //                                         var pcsbox = result.reduce((partialSum, a) => partialSum + a, 0);
        //                                         $('#pcspbox' + ix).val(pcsbox);
        //                                         // console.log('total size: ', result);
        //                                         // console.log('total size: ', pcsbox);
        //                                         var selisih = $('#krtnend' + ix).val() - $('#krtnstart' + ix).val() + 1;
        //                                         $('#ttlpcs' + ix).val(pcsbox * selisih);
        //                                     });
        //                                 };
        //                             };
        //                         };

        //                     }
        //                 });

        //             }
        //         });


        //     };


        // });



        // Select Style & ORC
        $('#style').change(function() {

            $(this).prop('disabled', true);

            let id_order = $(this).val();
            let poVal = $('#po').val();

            if (id_order !== '') {
                //cek di solid packing list
                $.ajax({
                    type: 'GET',
                    url: '<?= site_url("packing/ajax_check_mixed_packing_list_by_po"); ?>',
                    data: {
                        'id_order': id_order,
                        'poVal': poVal
                    },
                    dataType: 'json',
                }).done(function(rowCount) {
                    // console.log('ajax_check_mixed_packing_list_by_po: ', rowCount);
                    if (rowCount > 0) {
                        Swal.fire({
                            icon: 'warning',
                            title: 'This PO Number and Style have been inputted',
                            showConfirmButton: true,
                            // timer: 2000,
                        }).then(function() {
                            $("#style").val('').trigger('change');
                            $("#style").prop('disabled', false);
                        });
                    } else {


                        // Check size in output sewing detail
                        $.ajax({
                            type: "GET",
                            url: "<?= site_url('packing/ajax_get_cutting_by_po2'); ?>/" + poVal,
                            dataType: 'json',
                        }).done(function(dt) {
                            if (dt.length < 1) {
                                Swal.fire({
                                    icon: 'warning',
                                    title: 'Size not found',
                                    showConfirmButton: true,
                                    // timer: 2000,
                                }).then(function() {
                                    $("#style").val('').trigger('change');
                                    $("#style").prop('disabled', false);
                                });
                            } else {

                                // Show Table
                                $('#scrolltable').show();

                                document.getElementById('scrolltable').innerHTML = '<table id="mixedPackingTable" class="table table-striped table-bordered table-hover nowrap" style="width:100%;text-align: center;"><thead class="text-white"><tr><th rowspan="2" style="vertical-align: middle;background: darkslategray;">START</th><th rowspan="2" style="vertical-align: middle;background: darkslategray;">END</th><th rowspan="2" style="vertical-align: middle;background: darkslategray;">COLOR</th><th colspan="' + dt.length + '" style="background: darkslategray;">SIZE</th><th rowspan="2" style="vertical-align: middle;background: darkslategray;">TOTAL PCS</th><th rowspan="2" style="vertical-align: middle;background: darkslategray;">PCS/BOX</th></tr><tr id="trsize"></tr></thead></table>';
                                document.getElementById('scrolltable').innerHTML += '<br><div class="row"><div class="col-sm-6"><button type="button" class="btn btn-primary shadow m-2" id="addrow">ADD ROW</button></div> <div class="col-sm-6 text-end"><button type="button" class="btn btn-success shadow m-2" id="getdata">SAVE DATA</button></div><br><br></div>';
                                for (let i = 0; i < dt.length; i++) {
                                    document.getElementById('trsize').innerHTML += '<th style="background: darkslategray;">' + dt[i].size + '</th>';
                                };

                                table = $('#mixedPackingTable').DataTable({
                                    // responsive: true,
                                    autoWidth: true,
                                    paging: false,
                                    searching: false,
                                    // fixedHeader: true,
                                    // fixedColumns: {
                                    //     left: 3,
                                    //     right: 2
                                    // },
                                    // scrollCollapse: true,
                                    scrollX: true,
                                    info: false,
                                    ordering: false,
                                    // pageLength: 30
                                    // lengthMenu: false,
                                    lengthChange: false
                                });
                                if (dt != null) {
                                    const rowx = [];
                                    for (let i = 1; i < 2; i++) {
                                        rowx.push(
                                            '<input style="min-width:70px;text-align: center;" type="number" id="krtnstart' + i + '" class="form-control" placeholder="0"></input>',
                                            '<input style="min-width:70px;text-align: center;" type="number" id="krtnend' + i + '" class="form-control" placeholder="0"></input>',
                                            '<input style="min-width:150px;text-align: center;" type="text" id="color' + i + '" class="form-control colorss"></input>',
                                            // '<select style="min-width:100px;" id="color' + i + '" class="form-control"></select>',
                                            // '<input style="min-width:100px;text-align: center;" type="text" id="type' + i + '" class="form-control"></input>',
                                        );
                                    };
                                    for (let ii = 0; ii < dt.length; ii++) {
                                        rowx.push(
                                            // '<input style="min-width:60px;text-align: center;" type="number" id="' + dt[ii].size + '1" class="form-control" value="0"></input>'
                                            '<input style="min-width:60px;text-align: center;" type="number" id="' + dt[ii].size + '1" class="form-control" placeholder="0"></input>'
                                        );
                                    };
                                    for (let iii = 1; iii < 2; iii++) {
                                        rowx.push(
                                            '<input style="min-width:70px;text-align: center;" type="number" id="ttlpcs' + iii + '" class="form-control" placeholder="0" disabled></input>',
                                            '<input style="min-width:70px;text-align: center;" type="number" id="pcspbox' + iii + '" class="form-control" placeholder="0" disabled></input>',
                                            // '<button type="button" class="btn btn-danger btnhapusform"><i class="bx bx-trash ms-1"></i></i></button>'
                                        );
                                    };
                                    // table.row.add(rowx).draw();
                                    table.row.add(rowx).draw();
                                    $.ajax({
                                        url: '<?php echo site_url("packing/ajax_get_color"); ?>/' + poVal,
                                        type: 'GET',
                                        dataType: 'json'
                                    }).done(function(dt) {
                                        // console.log('color: ', dt);
                                        // $('#color1').append($('<option>', {
                                        // 	value: '0',
                                        // 	text: 'Select color...'
                                        // }));
                                        const arrcolor = [];
                                        // $.each(dt, function(i, item) {
                                        // 	arrcolor.push(item.color);
                                        // 	$('#color1').append($('<option>', {
                                        // 		value: item.color,
                                        // 		text: item.color
                                        // 	}));
                                        // });
                                        $('#color1').prop('disabled', true);
                                        $('#color1').val(dt[0].color);
                                    });
                                }

                                $('#addrow').click(function() {
                                    var $tableBody = $('#mixedPackingTable').find("tbody"),
                                        $trLast = $tableBody.find("tr:last"),
                                        $trNew = $trLast.clone();
                                    $trNew.find("input").not(".colorss").val("");

                                    $trNew.find('[id]').each(function() {
                                        this.id = ($('#total').val().length < 2) ? this.id.slice(0, -1) + (parseInt($('#total').val()) + 1) : this.id.slice(0, -2) + (parseInt($('#total').val()) + 1);
                                    });
                                    $trLast.after($trNew);
                                    $('#total').val(1 + parseInt($('#total').val()))
                                    var total = $('#total').val();

                                    countRowData();
                                });



                                // Button Save Data
                                $('#getdata').click(function() {
                                    if ($('#krtnstart1').val() == '') {
                                        // console.log('kosong')
                                    }
                                    Swal.fire({
                                        title: 'Warning',
                                        text: 'Are you sure save mixed packing for ' + $('#po').val() + '?',
                                        icon: 'warning',
                                        showCancelButton: true,
                                        confirmButtonText: 'Yes',
                                        cancelButtonText: 'No',
                                        reverseButtons: true
                                    }).then((result) => {
                                        if (result.value) {
                                            var looping = $('#total').val();
                                            const arrdata = [];
                                            const arrdata2 = [];
                                            const arrdatax = [];
                                            for (let ix = 1; ix <= looping; ix++) {
                                                arrdata.push({
                                                    "id_order": $('#style').val(),
                                                    "po": $('#po').val(),
                                                    // "style": $('#style').val(),
                                                    "box_start": $('#krtnstart' + ix).val(),
                                                    "box_end": $('#krtnend' + ix).val(),
                                                    "color": $('#color' + ix).val(),
                                                    "type": $('#type' + ix).val(),
                                                    "total_pcs": $('#ttlpcs' + ix).val(),
                                                    "pcs_box": $('#pcspbox' + ix).val(),
                                                    "jmlh_karton": $('#krtnend' + ix).val() - $('#krtnstart' + ix).val() + 1,
                                                });

                                            };
                                            // console.log('arrdata karton: ', arrdata);
                                            $.ajax({
                                                type: 'POST',
                                                url: '<?php echo site_url("packing/ajax_insert_mixed_packing_list"); ?>',
                                                data: {
                                                    "arrdata": arrdata
                                                },
                                                dataType: 'json',
                                                success: function(id) {
                                                    // console.log("id_mixed: ", id);
                                                    var looping = $('#total').val();
                                                    const arrdata = [];
                                                    const arrdata1 = [];
                                                    const arrdata2 = [];
                                                    // LOOPING SIZE
                                                    for (let qq = 0; qq < id.length; qq++) {
                                                        for (let qqq = 0; qqq < dt.length; qqq++) {
                                                            arrdata1.push({
                                                                "id_mixed": id[qq],
                                                                "size": dt[qqq].size,
                                                                "qty": $('#' + dt[qqq].size + (qq + 1)).val()
                                                            });
                                                        };
                                                    };
                                                    // LOPPING BARCODE
                                                    for (let qq = 0; qq < id.length; qq++) {
                                                        var total_box = $('#krtnend' + (qq + 1)).val();
                                                    };
                                                    for (let qq = 0; qq < id.length; qq++) {
                                                        for (let iy = 1; iy <= $('#krtnend' + (qq + 1)).val() - $('#krtnstart' + (qq + 1)).val() + 1; iy++) {
                                                            arrdata.push({
                                                                "id_mixed": id[qq],
                                                            });
                                                        };
                                                    };
                                                    for (let iy = 1; iy <= total_box; iy++) {
                                                        arrdata2.push({
                                                            "box_number": iy,
                                                        });
                                                    };
                                                    // console.log("ARRDATA1: ", arrdata1);
                                                    // console.log("ID MIXED: ", arrdata);
                                                    // console.log("BOX_NUMBER: ", arrdata2);

                                                    // AJAX BARCODE
                                                    $.ajax({
                                                        type: 'POST',
                                                        url: '<?php echo site_url("packing/ajax_insert_mixed_packing_list_barcode"); ?>',
                                                        data: {
                                                            "arrdata": arrdata
                                                        },
                                                        dataType: 'json',
                                                        success: function(id) {
                                                            let id_box = id.map((item, i) => Object.assign({}, item, arrdata2[i]));
                                                            // console.log("GABUNAGN FIX: ", id_box);
                                                            $.ajax({
                                                                type: 'POST',
                                                                url: '<?php echo site_url("packing/ajax_update_mixed_packing_list_barcode"); ?>',
                                                                data: {
                                                                    "arrdata": id_box,
                                                                },
                                                                dataType: 'json',
                                                                success: function() {
                                                                    // console.log('OK!');
                                                                },
                                                                error: function(xhr) {
                                                                    // console.log(xhr.responseText);
                                                                }
                                                            });
                                                        }
                                                    });
                                                    // AJAX SIZE
                                                    $.ajax({
                                                        type: 'POST',
                                                        url: '<?php echo site_url("packing/ajax_insert_mixed_size_list"); ?>',
                                                        data: {
                                                            "arrdata1": arrdata1
                                                        },
                                                        dataType: 'json',
                                                        success: function(id) {
                                                            Swal.fire({
                                                                icon: 'success',
                                                                title: 'Add mixed list successfuly!',
                                                                showConfirmButton: false,
                                                                timer: 1000,
                                                            });
                                                            // console.log("id_mixed: ", id);
                                                            const arrdata1 = [];
                                                            for (let qq = 0; qq < id.length; qq++) {
                                                                for (let qqq = 0; qqq < dt.length; qqq++) {
                                                                    arrdata1.push({
                                                                        "id_mixed": id[qq],
                                                                        "size": dt[qqq].size + (qq + 1),
                                                                        "qty": $('#' + dt[qqq].size + (qq + 1)).val()
                                                                    });
                                                                };
                                                            };

                                                            let getUrl = window.location;
                                                            let baseUrl = getUrl.protocol + "//" + getUrl.host + "/" + getUrl.pathname.split('/')[1];

                                                            window.location = baseUrl + '/packing/packing_mixed'

                                                        },
                                                        error: function(xhr) {
                                                            // console.log(xhr.responseText);
                                                        }
                                                    });
                                                },
                                                error: function(xhr) {
                                                    // console.log(xhr.responseText);
                                                }
                                            });
                                        }
                                    });
                                });



                                countRowData();

                                function countRowData() {
                                    // console.log('OOOKKKK', $('#total').val(), '#############');
                                    // var looping = $('#total').val();
                                    // console.log('LOOPING: ', $('#total').val());
                                    const total = [];
                                    // LOPPING BY ROW LENGTH
                                    for (let ix = 1; ix <= parseInt($('#total').val()); ix++) {
                                        // console.log(ix)
                                        // console.log('LOOOP 111111', $('#total').val(), '#############');
                                        // LOOPING BY SIZE
                                        for (let ii = 0; ii < dt.length; ii++) {
                                            $("#" + dt[ii].size + "" + ix).on("keyup", function(event) {
                                                // console.log('LOOOP 222222222', $('#total').val(), '#############');
                                                total.length = 0;
                                                // LOOPING TO GET SIZE VALUE
                                                for (let iix = 0; iix < dt.length; iix++) {
                                                    // console.log('LOOOP 33333333333', $('#total').val(), '#############');
                                                    // console.log('size' + dt[iix].size + ix + ': ', $("#" + dt[iix].size + ix).val());
                                                    total.push(
                                                        // $("#" + dt[iix].size + ix).val(), 
                                                        $("#" + dt[iix].size + ix).val() == '' ? 0 : $("#" + dt[iix].size + ix).val()
                                                    );
                                                    // console.log("iix :" + iix)
                                                };
                                                // console.log('total size: ', total);
                                                var result = total.map(function(x) {
                                                    return parseInt(x, 10);
                                                });
                                                var pcsbox = result.reduce((partialSum, a) => partialSum + a, 0);
                                                $('#pcspbox' + ix).val(pcsbox);
                                                // console.log('total result: ', result);
                                                // console.log('total pcsbox: ', pcsbox);
                                                var selisih = $('#krtnend' + ix).val() - $('#krtnstart' + ix).val() + 1;
                                                $('#ttlpcs' + ix).val(pcsbox * selisih);

                                                // console.log($('#ttlpcs' + ix).val())
                                            });
                                            // console.log("ix :" + ix)

                                        };
                                    };
                                };

                            }
                        });

                    }
                });


            };


        });

        // $(document).on('click', '.btnhapusform', function(e) {
        //     e.preventDefault();

        //     $(this).parents('tr').remove();

        // });


        $('#btn_reset').click(function() {
            $("#po").val('').trigger('change');
            $('#colors').val(' -');
            $("#style").val('').trigger('change');

            $('#po').prop('disabled', false);
            $('#colors').prop('disabled', true);
            $('#style').prop('disabled', true);

            $('#scrolltable').hide();

        });

    });
</script>