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
                        <li class="breadcrumb-item active" aria-current="page">Create Bundle Barcode</li>
                        <li class="breadcrumb-item active" aria-current="page">Add Bundle Cutting</li>
                    </ol>
                </nav>
            </div>
        </div>
        <h6 class="mb-0 text-uppercase">Create Data Bundle Cutting</h6>
        <hr />
        <div class="row">
            <div class="col-12 ">
                <div class="card rounded-4 w-100">
                    <div class="card-body">

                        <div class="p-4">
                            <form class="row g-3 needs-validation" novalidate>
                                <div class="col-md-4">
                                    <label for="validationCustom01" class="form-label">ORC</label>
                                    <select class="single_select" id="orc"></select>
                                    <!-- <select class="single_select"></select> -->
                                </div>
                                <div class="col-md-4">
                                    <label for="buyer" class="form-label">Buyer</label>
                                    <input type="text" class="form-control" id="buyer" required disabled>
                                </div>
                                <div class="col-md-4">
                                    <label for="qty" class="form-label">Qty</label>
                                    <input type="text" class="form-control" id="qty" required disabled>
                                </div>
                                <div class="col-md-4">
                                    <label for="style" class="form-label">Style</label>
                                    <input type="text" class="form-control" id="style" required disabled>
                                </div>
                                <div class="col-md-4">
                                    <label for="comm" class="form-label">Com</label>
                                    <input type="text" class="form-control" id="comm" required disabled>
                                </div>
                                <div class="col-md-4">
                                    <label for="boxes" class="form-label">Bundle Qty (Box)</label>
                                    <input type="text" class="form-control" id="boxes" required disabled>
                                </div>
                                <div class="col-md-4">
                                    <label for="color" class="form-label">Color</label>
                                    <input type="text" class="form-control" id="color" required disabled>
                                </div>
                                <div class="col-md-4">
                                    <label for="so" class="form-label">PO Number</label>
                                    <input type="text" class="form-control" id="so" required disabled>
                                </div>
                                <div class="col-md-4">
                                    <label for="prepare_on" class="form-label">Prepared On</label>
                                    <input type="text" class="form-control" id="prepare_on" required disabled>
                                </div>
                            </form>

                            <button type="button" class="btn btn-primary mt-3" id="AddBundle" disabled>Create Bundle</button>


                            <!-- <div class="table-responsive"> -->
                            <div class="row mt-5">
                                <table id="showBundleTable" class="table table-striped table-bordered table-sm " style="width:100% ">
                                    <thead>
                                        <th class="text-center">Size</th>
                                        <th class="text-center">Qty</th>
                                        <th class="text-center">Pcs Each Bundle</th>
                                        <th class="text-center">No. Bundle</th>
                                        <th class="text-center">Barcode</th>
                                    </thead>

                                </table>
                            </div>

                            <!-- </div> -->

                        </div>


                    </div>
                </div>
            </div>


            <!-- Modal -->
            <div class="modal fade" id="modalBundle" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="bundle_title">Create Bundle</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="btn_close_modal"></button>
                        </div>
                        <div class="modal-body" id="modalBundle_body">
                            <div class="mx-3">
                                <div class="row align-items-center mb-2">
                                    <div class="col-lg-4">
                                        <label for="orc" class="col-form-label">ORC</label>
                                    </div>
                                    <div class="col-lg-6">
                                        <label id="orc_modal" class="col-form-label"></label>
                                    </div>
                                </div>
                                <div class="row align-items-center mb-2">
                                    <div class="col-lg-4">
                                        <label for="style_modal" class="col-form-label">Style</label>
                                    </div>
                                    <div class="col-lg-6">
                                        <label id="style_modal" class="col-form-label"></label>
                                    </div>
                                </div>
                                <div class="row align-items-center mb-2">
                                    <div class="col-lg-4">
                                        <label for="qty_order_modal" class="col-form-label">Qty Order</label>
                                    </div>
                                    <div class="col-lg-6">
                                        <label id="qty_order_modal" class="col-form-label"></label>
                                    </div>
                                </div>

                                <div class="row align-items-center mb-2">
                                    <div class="col-lg-4">
                                        <label for="stock_qty_order_modal" class="col-form-label">Stock Qty Order</label>
                                    </div>
                                    <div class="col-lg-6">
                                        <label id="stock_qty_order_modal" class="col-form-label"></label>
                                    </div>
                                </div>

                                <div class="row align-items-center mb-2">
                                    <div class="col-lg-4">
                                        <label for="size" class="col-form-label">Size</label>
                                    </div>
                                    <div class="col-lg-6">
                                        <select class="select2_modal" id="size"></select>
                                    </div>
                                </div>
                                <div class="row align-items-center mb-2">
                                    <div class="col-lg-4">
                                        <label for="qty_modal" class="col-form-label">Qty</label>
                                    </div>
                                    <div class="col-lg-4">
                                        <input type="number" id="qty_modal" class="form-control" placeholder="e.g 2000" min="0">
                                    </div>
                                </div>
                                <div class="row align-items-center mb-2">
                                    <div class="col-lg-4">
                                        <label for="pcs_each_bundle" class="col-form-label">Pcs Each Bundle</label>
                                    </div>
                                    <div class="col-lg-4">
                                        <input type="number" id="pcs_each_bundle" class="form-control" placeholder="e.g 18" min="0">
                                    </div>
                                </div>
                                <div class="row  mb-2">
                                    <div class="col-lg-4">
                                        <label for="" class="col-form-label">Category</label>
                                    </div>
                                    <div class="col-lg-6 mt-2">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="no_mold" name="no_mold">
                                            <label class="form-check-label" for="no_mold">Bra Without Mold</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input mold" type="checkbox" id="outer_mold" name="outer_mold">
                                            <label class="form-check-label" for="outer_mold">Outer Mold</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input mold" type="checkbox" id="mid_mold" name="mid_mold">
                                            <label class="form-check-label" for="mid_mold">Mid Cover Mold</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input mold" type="checkbox" id="linning_mold" name="linning_mold">
                                            <label class="form-check-label" for="linning_mold">Linning Mold</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="panty" name="panty">
                                            <label class="form-check-label" for="panty">Panty</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input outerwear" type="checkbox" id="juwita" name="juwita">
                                            <label class="form-check-label" for="juwita">Juwita</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input outerwear" type="checkbox" id="skp" name="skp">
                                            <label class="form-check-label" for="skp">SKP</label>
                                        </div>

                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="modal-footer">
                            <!-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> -->
                            <button type="button" class="btn btn-primary" id="btnCreateBundle">Create Bundle</button>
                        </div>
                    </div>
                </div>
            </div>


        </div><!--end row-->

    </div>
</div>
<!--end page wrapper -->

<script>
    $('.single_select').select2({
        theme: 'bootstrap-5',
        width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style',
        // placeholder: $(this).data('placeholder'),
        // allowClear: Boolean($(this).data('allow-clear')),
        // dropdownParent: $('#modalAddbundle')
    });



    $('.select2_modal').select2({
        theme: 'bootstrap-5',
        width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style',
        // placeholder: $(this).data('placeholder'),
        // allowClear: Boolean($(this).data('allow-clear')),
        dropdownParent: $('#modalBundle_body')
    });
</script>
<script>
    var totalQtyModal = 0;
    var size;
    var qty;
    var idx = 0;
    var boxCount = 0;
    var dataTable;
    var outerMoldChecked;
    var midMoldChecked;
    var linningMoldChecked;
    var pantyChecked;
    var juwitaChecked;
    var skpChecked;
    var noMoldChecked;
    var bundlingTable;
    var cuttingSam;
    var stock;
    var idx;

    const sweet_loader = '<div class="sweet_loader"><svg viewBox="0 0 140 140" width="140" height="140"><g class="outline"><path d="m 70 28 a 1 1 0 0 0 0 84 a 1 1 0 0 0 0 -84" stroke="rgba(0,0,0,0.1)" stroke-width="4" fill="none" stroke-linecap="round" stroke-linejoin="round"></path></g><g class="circle"><path d="m 70 28 a 1 1 0 0 0 0 84 a 1 1 0 0 0 0 -84" stroke="#71BBFF" stroke-width="4" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-dashoffset="200" stroke-dasharray="300"></path></g></svg></div>';

    $(document).ready(function() {
        bundlingTable = $('#showBundleTable').DataTable({
            columns: [{
                    'className': "text-center px-2"
                },
                {
                    'className': "text-center px-2"
                },
                {
                    'className': "text-center px-2"
                },
                {
                    'className': "text-center px-2"
                },
                {
                    'className': "text-center px-2"
                },

            ],
        });
        // console.log("bundlingTable.rows.data :", bundlingTable.rows().data().length);
        // $('#btnSaveBundle').attr('disabled', true);
        // $('#btnPrintBarcode').attr('disabled', true);
        // $('#btnPrintBarcodeMolding').attr('disabled', true);

        const loadOrc = () => {
            $('#orc').empty();
            $.ajax({
                url: " <?= site_url('cutting/get_orc'); ?>",
                type: 'GET',
                dataType: 'JSON',
                beforeSend: function() {
                    $("#orc").prepend($('<option></option>').html('Loading...'));
                },
            }).done(function(data) {
                $('#orc').empty();
                $('#orc').append($('<option>', {
                    value: "",
                    text: "- Select ORC -"
                }));
                $.each(data, function(i, item) {
                    $('#orc').append($('<option>', {
                        value: item.orc,
                        text: item.orc
                    }));
                });
            });
        }

        loadOrc();

        $('#orc').change(function() {
            var orc = $(this).val();
            // alert(orc);
            $.ajax({
                url: '<?php echo site_url("cutting/getByOrc"); ?>/' + orc,
                type: 'GET',
                dataType: 'json'
            }).done(function(dt) {
                // console.log('dt: ', dt);
                var style = dt[0].style_sam;
                // console.log(style);
                $('#style').val(dt[0].style_sam);

                var color = dt[0].color;
                $('#color').val(dt[0].color);


                if (color.includes("BLACK")) {
                    colorGroup = "Black";
                } else if (color.includes("WHITE")) {
                    colorGroup = "White";
                } else {
                    colorGroup = "color";
                }


                $('#so').val(dt[0].so);

                $('#buyer').val(dt[0].buyer);
                $('#comm').val(dt[0].comm);

                var todayDate = new Date();
                var nowYear = todayDate.getFullYear();
                var nowMonth = todayDate.getMonth() + 1;
                var nowDay = todayDate.getDate();

                var strDateNow = nowYear.toString() + "-" + (nowMonth < 10 ? "0" + nowMonth.toString() : nowMonth.toString()) + "-" + (nowDay < 10 ? "0" + nowDay.toString() : nowDay.toString());

                // console.log(strDateNow);
                $('#prepare_on').val(strDateNow);

                $('#qty').val(dt[0].qty);
                qty = dt[0].qty;
                // console.log('chang:', qty);

                $('#boxes').val("0");
                // $('#btnCreateBundle1').prop('disabled', false);
                // $('#subORC').empty();

                $('#AddBundle').prop('disabled', false);
                bundlingTable.clear().draw();
            })


        });



        $('#AddBundle').click(function() {
            let orc = $('#orc').val();

            idx = 0;

            $('#pcs_each_bundle').val("");
            $('#btnCreateBundle').prop('disabled', false);

            totalQtyModal = 0;
            stock = $('#qty').val() - totalQtyModal;

            $('#qty_modal').on('input', function() {
                let qty_start_order = $('#qty').val();
                var value = $(this).val();

                if ((value !== '') && (value.indexOf('.') === -1)) {
                    $(this).val(Math.max(Math.min(value, stock), 0));
                }
            });


            // $('#qty_modal').on('input', function() {
            //     let qty_start_order = $('#qty').val();
            //     var value = $(this).val();

            //     if ((value !== '') && (value.indexOf('.') === -1)) {
            //         $(this).val(Math.max(Math.min(value, qty_start_order), 0));
            //     }
            // });

            if (orc == "") {
                Swal.fire({
                    icon: "warning",
                    title: "Warning!",
                    text: "Please select an orc",
                    showConfirmButton: false,
                    timer: 1750
                });
            } else {
                $("#modalBundle").modal('show');
                var style = $('#style').val();
                // $('#bundle_title').text('ORC: ' + orc + ' - Style: ' + style + ' QTY: ' + $('#qty').val());
                $('#orc_modal').html(': ' + orc);
                $('#style_modal').html(': ' + style);
                $('#qty_order_modal').html(': ' + $('#qty').val());
                $('#stock_qty_order_modal').html(': ' + $('#qty').val());
                $('#size').empty();
                loadSize();

            }

        })

        const loadSize = () => {
            $('#size').empty();
            $.ajax({
                url: " <?= site_url('cutting/get_size'); ?>",
                type: 'GET',
                dataType: 'JSON',
                beforeSend: function() {
                    $("#size").prepend($('<option></option>').html('Loading...'));
                },
            }).done(function(data) {
                $('#size').empty();
                $('#size').append($('<option>', {
                    value: "",
                    text: "- Select size -"
                }));
                $.each(data, function(i, item) {
                    $('#size').append($('<option>', {
                        value: item.size,
                        text: item.size
                    }));
                });
            });
        }

        $('#size').change(function() {

            size = $(this).val();

            $.ajax({
                url: "<?php echo site_url('cutting/ajax_get_by_size'); ?>",
                type: "POST",
                data: {
                    "dataSize": size
                },
                dataType: "json",
            }).done(function(dt) {
                if (dt != null) {
                    getSAM(dt);
                }
            });

        })

        function getSAM(d) {
            sizeGroup = d.group;
            // console.log(sizeGroup);
            var style = $('#style').val();
            // console.log(style);
            var dataForSAM = {
                'style': style,
                'color': colorGroup,
                'grup_size': sizeGroup
            };

            // console.log('dataForSAM: ', dataForSAM);

            $.ajax({
                url: "<?php echo site_url('cutting/ajax_get_sam'); ?>",
                type: "POST",
                data: {
                    'dataForSAM': dataForSAM
                },
                dataType: "json",
            }).done(function(retVal) {
                // console.log('retVal: ', retVal);
                if (retVal != null) {
                    cuttingSam = retVal.sam_cutting ?? 0.00;
                    // $('#outer_mold').prop('checked', (parseFloat(retVal.outer_sam) != 0.000 ? true : false));
                    // $('#mid_mold').prop('checked', (parseFloat(retVal.mid_sam) != 0.000 ? true : false));
                    // $('#linning_mold').prop('checked', (parseFloat(retVal.linning_sam) != 0.000 ? true : false));
                }else{
                    cuttingSam = 0.00;
                }
            })
        }

        $('#no_mold').click(function() {
            let no_mold = $('#no_mold').is(':checked');

            if (no_mold == true) {
                $('#no_mold').prop('disabled', false);
                $('#outer_mold').prop('disabled', true);
                $('#mid_mold').prop('disabled', true);
                $('#linning_mold').prop('disabled', true);
                $('#panty').prop('disabled', true);
                $("#juwita").prop("disabled", true);
                $("#skp").prop("disabled", true);
            } else {
                $('#no_mold').prop('disabled', false);
                $('#outer_mold').prop('disabled', false);
                $('#mid_mold').prop('disabled', false);
                $('#linning_mold').prop('disabled', false);
                $('#panty').prop('disabled', false);
                $("#juwita").prop("disabled", false);
                $("#skp").prop("disabled", false);
            }
        });

        $('.mold').click(function() {
            let outer_mold = $('#outer_mold').is(':checked');
            let mid_mold = $('#mid_mold').is(':checked');
            let linning_mold = $('#linning_mold').is(':checked');

            if (outer_mold == true || mid_mold == true || linning_mold == true) {
                $('#no_mold').prop('disabled', true);
                $('#outer_mold').prop('disabled', false);
                $('#mid_mold').prop('disabled', false);
                $('#linning_mold').prop('disabled', false);
                $('#panty').prop('disabled', true);
                $("#juwita").prop("disabled", true);
                $("#skp").prop("disabled", true);
            } else if (outer_mold == false && mid_mold == false && linning_mold == false) {
                $('#no_mold').prop('disabled', false);
                $('#outer_mold').prop('disabled', false);
                $('#mid_mold').prop('disabled', false);
                $('#linning_mold').prop('disabled', false);
                $('#panty').prop('disabled', false);
                $("#juwita").prop("disabled", false);
                $("#skp").prop("disabled", false);
            }
        });

        $('#panty').click(function() {
            let panty = $('#panty').is(':checked');

            if (panty == true) {
                $('#no_mold').prop('disabled', true);
                $('#outer_mold').prop('disabled', true);
                $('#mid_mold').prop('disabled', true);
                $('#linning_mold').prop('disabled', true);
                $('#panty').prop('disabled', false);
                $("#juwita").prop("disabled", true);
                $("#skp").prop("disabled", true);
            } else {
                $('#no_mold').prop('disabled', false);
                $('#outer_mold').prop('disabled', false);
                $('#mid_mold').prop('disabled', false);
                $('#linning_mold').prop('disabled', false);
                $('#panty').prop('disabled', false);
                $("#juwita").prop("disabled", false);
                $("#skp").prop("disabled", false);
            }
        });

        $('.outerwear').click(function() {
            let juwita = $('#juwita').is(':checked');
            let skp = $('#skp').is(':checked');

            if (juwita == true || skp == true) {
                $('#no_mold').prop('disabled', true);
                $('#outer_mold').prop('disabled', true);
                $('#mid_mold').prop('disabled', true);
                $('#linning_mold').prop('disabled', true);
                $('#panty').prop('disabled', true);
                $("#juwita").prop("disabled", false);
                $("#skp").prop("disabled", false);
            } else if (juwita == false && skp == false) {
                $('#no_mold').prop('disabled', false);
                $('#outer_mold').prop('disabled', false);
                $('#mid_mold').prop('disabled', false);
                $('#linning_mold').prop('disabled', false);
                $('#panty').prop('disabled', false);
                $("#juwita").prop("disabled", false);
                $("#skp").prop("disabled", false);
            }
        });

        // Old
        // $('#btnCreateBundle').click(function() {
        //     // var qty = $('#qty_modal').val();
        //     totalQtyModal += parseInt($('#qty_modal').val());
        //     // console.log('coba:', totalQtyModal);
        //     // console.log('qtyyy:', qty);
        //     if (qty < totalQtyModal) {

        //         Swal.fire({
        //             icon: "warning",
        //             title: "Warning!",
        //             text: "QTY Overload!!",
        //             showConfirmButton: false,
        //             timer: 1750
        //         });
        //         totalQtyModal -= parseInt($('#qty_modal').val());

        //         var qtySisa = qty - totalQtyModal

        //         $('#qty_modal').val(qtySisa);
        //     }
        //     // console.log('ok');
        //     createBundle();

        //     if (qty == totalQtyModal) {
        //         // createBundle();
        //         totalQtyModal = 0;
        //         $('#modalBundle').modal('hide');
        //     }

        // });





        $('#btnCreateBundle').click(function() {
            let qty_start_order = $('#qty').val();
            let size = $('#size').val();
            let qty_modal = $('#qty_modal').val();
            let pcs_each_bundle = $('#pcs_each_bundle').val();

            let no_mold = $('#no_mold').prop('checked');
            let outer_mold = $('#outer_mold').prop('checked');
            let mid_mold = $('#mid_mold').prop('checked');
            let linning_mold = $('#linning_mold').prop('checked');
            let panty = $('#panty').prop('checked');
            let juwita = $('#juwita').prop('checked');
            let skp = $('#skp').prop('checked');

            // console.log(qty_modal)
            // console.log(pcs_each_bundle)

            if (size == '' || qty_modal == '' || pcs_each_bundle == '') {
                Swal.fire({
                    icon: "warning",
                    title: "Warning!",
                    text: "There are forms that have not been filled.",
                    showConfirmButton: false,
                    timer: 1750
                });
            } else if (no_mold == false && outer_mold == false && mid_mold == false && linning_mold == false && panty == false && juwita == false && skp == false) {
                Swal.fire({
                    icon: "warning",
                    title: "Warning!",
                    text: "Please select category.",
                    showConfirmButton: false,
                    timer: 1750
                });
            } else {
                // if (parseInt(pcs_each_bundle) > parseInt(qty_modal)) {
                //     Swal.fire({
                //         icon: "warning",
                //         title: "Warning!",
                //         text: "Pcs Each Bundle cannot exceed Qty",
                //         showConfirmButton: false,
                //         timer: 1750
                //     });
                // } else {
                totalQtyModal += parseInt($('#qty_modal').val());
                stock = qty_start_order - totalQtyModal;

                console.log(totalQtyModal);
                console.log(stock);

                $('#qty_modal').on('input', function() {
                    let qty_start_order = $('#qty').val();
                    var value = $(this).val();

                    if ((value !== '') && (value.indexOf('.') === -1)) {
                        $(this).val(Math.max(Math.min(value, stock), 0));
                    }
                });



                $('#stock_qty_order_modal').html(': ' + stock);

                swal.fire({
                    html: '<h5>Loading...</h5>',
                    showConfirmButton: false,
                    didOpen: function() {
                        $('.swal2-html-container').prepend(sweet_loader);
                    }
                });

                createBundle();

                if (stock <= 0) {
                    $('#btnCreateBundle').prop('disabled', true)
                }

                // }


            }

        });

        $('#modal_add_bundle').on('hidden.bs.modal', function(e) {
            // if(qty == totalQtyModal){
            // createBundle();
            $(this)
                .find('input,select')
                .val('')
                .end()
                .find('input[type=checkbox], input[type=radio]')
                .prop('checked', '')
                .end();
            // }      
        });

        function createBundle() {
            let orc = $('#orc').val();
            var selectedSize = $('#size').val();
            // var selectedSize = $('#size').select2('data');

            // console.log('okkk');
            //cek base on orc and size;
            var dataString = {
                'orc': orc,
                'size': size
            };
            // console.log(dataString);
            $.ajax({
                type: 'POST',
                url: '<?php echo site_url("cutting/ajax_check_by_orc_size"); ?>',
                data: {
                    'dataString': dataString
                },
                dataType: 'json',
            }).done(function(r) {
                // console.log('r: ', r);
                if (r > 0) {
                    // return false;
                    Swal.fire({
                        type: 'warning',
                        title: 'Warning',
                        text: 'This bundle for ORC ' + orc + ' already inputed!!'
                    });
                    $('#size').val('');
                    $('#size').focus();
                } else {
                    // return true;
                    var pcs_each_bundle = $('#pcs_each_bundle').val();

                    var qty = $('#qty_modal').val();

                    var box = Math.floor(qty / pcs_each_bundle);

                    var zero = "0";

                    var bundleArr = [];

                    var strIdx;

                    var bundleNo;

                    // $('#total_bundle_qty').val(totalQtyModal);

                    for (x = 0; x < box; x++) {
                        idx++;
                        strIdx = idx.toString();
                        bundleNo = zero.repeat(4 - strIdx.length) + strIdx + "(" + pcs_each_bundle.toString() + ")";

                        bundleArr.push({
                            'size': selectedSize,
                            // 'size': selectedSize[0].text,
                            'qty': qty,
                            'qty_pcs': pcs_each_bundle,
                            'no': bundleNo,
                            'barcode': orc + "-" + zero.repeat(4 - strIdx.length) + strIdx //+ "-" + pcs_each_bundle.toString()
                        });

                    }

                    var sisa = Math.round(qty % pcs_each_bundle);

                    // console.log('sisa :' + sisa)

                    if (sisa > 0) {
                        idx++
                        strIdx = idx.toString();
                        bundleNo = zero.repeat(4 - strIdx.length) + idx.toString() + "(" + sisa.toString() + ")";
                        bundleArr.push({
                            'size': selectedSize,
                            // 'size': selectedSize[0].text,
                            'qty': qty,
                            'qty_pcs': sisa,
                            'no': bundleNo,
                            'barcode': orc + "-" + zero.repeat(4 - strIdx.length) + strIdx //+ "-" + sisa.toString()
                        });
                    }

                    boxCount += bundleArr.length;


                    $('#boxes').val(boxCount);
                    // console.log(bundleArr);
                    $.each(bundleArr, function(i, item) {
                        bundlingTable.row.add([
                            item.size,
                            item.qty,
                            item.qty_pcs,
                            item.no,
                            item.barcode
                        ]).draw();
                    });


                    style = $('#style').val();
                    var color = $('#color').val();
                    var buyer = $('#buyer').val();
                    var comm = $('#comm').val();
                    var so = $('#so').val();
                    var qty = $('#qty').val();
                    var boxes = $('#boxes').val();
                    var prepare_on = $('#prepare_on').val();
                    outerMoldChecked = $('#outer_mold').is(':checked');
                    midMoldChecked = $('#mid_mold').is(':checked');
                    linningMoldChecked = $('#linning_mold').is(':checked');
                    pantyChecked = $('#panty').is(':checked');
                    noMoldChecked = $('#no_mold').is(':checked');
                    juwitaChecked = $('#juwita').is(':checked');
                    skpChecked = $('#skp').is(':checked');

                    var dataStrCutting = {
                        'orc': orc,
                        'style': style,
                        'color': color,
                        'grup_color': colorGroup,
                        'buyer': buyer,
                        'comm': comm,
                        'so': so,
                        'qty': qty,
                        'boxes': boxes,
                        'prepare_on': prepare_on
                    }

                    // console.log(juwitaChecked, skpChecked);

                    $.ajax({
                        type: 'POST',
                        url: '<?php echo site_url("cutting/ajax_save_cutting"); ?>',
                        data: {
                            'dataStrCutting': dataStrCutting
                        },
                        dataType: 'json'
                    }).done(function(data) {
                        // console.log("data: ", data);
                        if (data > 0) {
                            idCutting = data;
                            saveDetail(idCutting, bundleArr, outerMoldChecked, midMoldChecked, linningMoldChecked, pantyChecked, noMoldChecked, juwitaChecked, skpChecked);

                        }
                    });
                }
            })

        }

        function saveDetail(idCut, dtTable, outer, mid, linning, panty, noMold, juwita, skp) {

            var dataCuttingDetail;

            // console.log('dtTable: ', dtTable);

            var arrDataCuttingDetail = [];

            $.each(dtTable, function(i, item) {
                // console.log(item);

                if (noMold == true) {
                    dataCuttingDetail = {
                        'id_cutting': idCut,
                        'size': item.size,
                        'grup_size': sizeGroup,
                        'cutting_sam': cuttingSam,
                        'qty': item.qty,
                        'qty_pcs': item.qty_pcs,
                        'sam_result': cuttingSam * item.qty_pcs,
                        'no_bundle': item.no,
                        'kode_barcode': item.barcode,
                        'outermold_barcode': "",
                        'midmold_barcode': "",
                        'linningmold_barcode': "",
                        'panty_barcode': "",
                        'juwita_barcode': "",
                        'skp_barcode': ""
                    };
                } else if (outer == true || mid == true || linning == true) {
                    dataCuttingDetail = {
                        'id_cutting': idCut,
                        'size': item.size,
                        'grup_size': sizeGroup,
                        'cutting_sam': cuttingSam,
                        'qty': item.qty,
                        'qty_pcs': item.qty_pcs,
                        'sam_result': cuttingSam * item.qty_pcs,
                        'no_bundle': item.no,
                        'kode_barcode': item.barcode,
                        'outermold_barcode': (outer == true ? "O" + item.barcode : ""),
                        'midmold_barcode': (mid == true ? "M" + item.barcode : ""),
                        'linningmold_barcode': (linning == true ? "L" + item.barcode : ""),
                        'panty_barcode': "",
                        'juwita_barcode': "",
                        'skp_barcode': ""
                    };
                } else if (panty == true) {
                    dataCuttingDetail = {
                        'id_cutting': idCut,
                        'size': item.size,
                        'grup_size': sizeGroup,
                        'cutting_sam': cuttingSam,
                        'qty': item.qty,
                        'qty_pcs': item.qty_pcs,
                        'sam_result': cuttingSam * item.qty_pcs,
                        'no_bundle': item.no,
                        'kode_barcode': item.barcode,
                        'outermold_barcode': "",
                        'midmold_barcode': "",
                        'linningmold_barcode': "",
                        'panty_barcode': item.barcode,
                        'juwita_barcode': "",
                        'skp_barcode': ""
                    };
                } else if (juwita == true || skp == true) {
                    dataCuttingDetail = {
                        'id_cutting': idCut,
                        'size': item.size,
                        'grup_size': sizeGroup,
                        'cutting_sam': cuttingSam,
                        'qty': item.qty,
                        'qty_pcs': item.qty_pcs,
                        'sam_result': cuttingSam * item.qty_pcs,
                        'no_bundle': item.no,
                        'kode_barcode': item.barcode,
                        'outermold_barcode': "",
                        'midmold_barcode': "",
                        'linningmold_barcode': "",
                        'panty_barcode': "",
                        'juwita_barcode': (juwita == true ? "J" + item.barcode : ""),
                        'skp_barcode': (skp == true ? "S" + item.barcode : "")
                    };
                }
                arrDataCuttingDetail.push(dataCuttingDetail);
                
            });
            // console.table('arrDataCuttingDetail: ', arrDataCuttingDetail);
            // debugger;
            $.ajax({
                type: 'POST',
                url: '<?php echo site_url("cutting/ajax_save_detail_cutting"); ?>',
                data: {
                    'dataCuttingDetail': arrDataCuttingDetail
                },
                dataType: 'json',
                // beforeSend: function() {
                //     swal.fire({
                //         html: '<h5>Loading...</h5>',
                //         showConfirmButton: false,
                //         didOpen: function() {
                //             $('.swal2-html-container').prepend(sweet_loader);
                //         }
                //     });
                // },
            }).done(function(rst) {
                // console.log(rst);
                if (rst == "OK") {
                    Swal.fire({
                        icon: 'success',
                        title: 'Success',
                        text: 'Bundle created successfully.',
                        showConfirmButton: false,
                        timer: 1500
                    });
                    // $('#btnPrintBarcode').attr('disabled', false);
                    // $('#btnPrintBarcodeMolding').attr('disabled', false);
                    // $('#btnAddBundle').attr('disabled', false);
                    // $('#btnAddBundle').attr('disabled', false);
                    // loadOrc();

                    $('#size').val(null).trigger('change');
                    $('#qty_modal').val("");
                    // $('#pcs_each_bundle').val("");
                }
            });
        }

        $('#btn_close_modal').click(function() {
            loadOrc();
            $('#buyer').val('');
            $('#qty').val('');
            $('#style').val('');
            $('#comm').val('');
            $('#boxes').val('');
            $('#color').val('');
            $('#so').val('');
            $('#prepare_on').val('');
            $('#AddBundle').prop('disabled', true);
        })


    })
</script>