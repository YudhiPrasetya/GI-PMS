<style>
    .select-info {
        margin-left: 10px;
    }

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
            <div class="breadcrumb-title pe-3">Molding</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Molding Machine Allocation</li>
                    </ol>
                </nav>
            </div>
        </div>
        <hr />
        <div class="row">
            <div class="col-12 ">
                <div class="card rounded-4 w-100">
                    <div class="card-body">

                        <div class="p-4">
                            <div class="row">
                                <div class="col-lg-2">
                                    <label for="validationCustom01" class="form-label"> <strong>No Machine</strong></label>
                                    <select class="select2" id="id_machine"></select>
                                </div>
                                <div class="col-lg-2">
                                    <label for="validationCustom01" class="form-label"><strong>Operator Name</strong></label>
                                    <select class="select2" id="id_molding_member"></select>
                                </div>
                                <div class="col-lg-2">
                                    <label for="validationCustom01" class="form-label"><strong>Line</strong></label>
                                    <select class="select2" id="id_line"></select>
                                </div>
                                <div class="col-lg-2">
                                    <label for="style" class="form-label"><strong>Demands</strong></label>
                                    <input type="text" class="form-control" id="demands" placeholder="Kebutuhan" required>
                                </div>
                                <div class="col-lg-2">
                                    <label for="comm" class="form-label"><strong>Target</strong></label>
                                    <input type="text" class="form-control" id="target" placeholder="target" required>
                                </div>
                            </div>
                            </br>
                            <div class="breadcrumb-title pe-3x">Details</div>
                            <hr width="100%" size="2">
                            <div id="details_row">
                                <div class="row g-3 mb-3">
                                    <div class="col-lg-1">
                                        <label for="validationCustom01" class="form-label"><strong>Component</strong></label>
                                        <!-- <input type="text" class="form-control" id="component" required> -->
                                        <select class="form-select component" id="component" aria-label="Default select example">
                                            <option selected>-Select Component-</option>
                                            <option value="OTR">OTR</option>
                                            <option value="SKP">SKP</option>
                                            <option value="LNG">LNG</option>
                                        </select>
                                    </div>
                                    <div class="col-lg-2">
                                        <label for="validationCustom01" class="form-label"><strong>Style</strong></label>
                                        <select class="select2 style" id="style"></select>
                                    </div>
                                    <div class="col-lg-2">
                                        <label for="validationCustom01" class="form-label"><strong>Orc</strong></label>
                                        <select class="select2 orc" id="orc"></select>
                                    </div>
                                    <div class="col-lg-2">
                                        <label for="style" class="form-label"><strong>Color</strong></label>
                                        <select class="select2 color" id="color"></select>
                                    </div>
                                    <div class="col-lg-2">
                                        <label for="kegel" class="form-label"><strong>Kegel</strong></label>
                                        <select class="select2 kegel" id="kegel"></select>
                                    </div>
                                    <div class="col-lg-1">
                                        <label for="size" class="form-label"><strong>Size</strong></label>
                                        <select class="select2 size" id="size"></select>
                                    </div>
                                    <div class="col-lg-1">
                                        <label for="qty" class="form-label"><strong>qty</strong></label>
                                        <input type="text" class="form-control qty" id="qty" placeholder="qty" required>
                                    </div>
                                    <div class="col-lg-1">
                                        <button class="btn btn-primary" style="margin-top: 29px;" id="btn_add_row_details"><i class='bx bx-plus-circle ms-1'></i></button>
                                    </div>
                                </div>
                            </div>
                            <button type="button" class="btn btn-primary mt-3" id="AddAllocation">Save Allocation</button>
                        </div>
                    </div>
                </div>
            </div>

        </div><!--end row-->

    </div>
</div>
<!--end page wrapper -->

<script>
    $('.select2').select2({
        theme: 'bootstrap-5',
        width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style',
        // placeholder: $(this).data('placeholder'),
        // allowClear: Boolean($(this).data('allow-clear')),
        // dropdownParent: $('#modalAddbundle')
    });
</script>
<script>
    $(document).ready(function() {

        const sweet_loader = '<div class="sweet_loader"><svg viewBox="0 0 140 140" width="140" height="140"><g class="outline"><path d="m 70 28 a 1 1 0 0 0 0 84 a 1 1 0 0 0 0 -84" stroke="rgba(0,0,0,0.1)" stroke-width="4" fill="none" stroke-linecap="round" stroke-linejoin="round"></path></g><g class="circle"><path d="m 70 28 a 1 1 0 0 0 0 84 a 1 1 0 0 0 0 -84" stroke="#71BBFF" stroke-width="4" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-dashoffset="200" stroke-dasharray="300"></path></g></svg></div>';

        const loadMachine = () => {
            $('#id_machine').empty();
            $.ajax({
                url: " <?php echo site_url('molding/getMachineMolding'); ?>",
                type: 'get',
                dataType: 'json',
                beforeSend: function() {
                    $("#id_machine").prepend($('<option></option>').html('Loading...'));
                },
            }).done(function(data) {
                $('#id_machine').empty();
                $('#id_machine').append($('<option>', {
                    value: "",
                    text: "- Select Machine -"
                }));
                $.each(data, function(i, item) {
                    $('#id_machine').append($('<option>', {
                        value: item.name,
                        text: item.name
                    }));
                });
            });
        }

        loadMachine();

        const loadMoldingMember = () => {
            $('#id_molding_member').empty();
            $.ajax({
                url: " <?php echo site_url('molding/getMemberMolding'); ?>",
                type: 'get',
                dataType: 'json',
                beforeSend: function() {
                    $("#id_molding_member").prepend($('<option></option>').html('Loading...'));
                },
            }).done(function(data) {
                $('#id_molding_member').empty();
                $('#id_molding_member').append($('<option>', {
                    value: "",
                    text: "- Select Member -"
                }));
                $.each(data, function(i, item) {
                    $('#id_molding_member').append($('<option>', {
                        value: item.id_molding_member,
                        text: item.name
                    }));
                });
            });
        }

        loadMoldingMember();

        const loadMoldingLine = () => {
            $('#id_line').empty();
            $.ajax({
                url: " <?php echo site_url('molding/getLineMolding'); ?>",
                type: 'get',
                dataType: 'json',
                beforeSend: function() {
                    $("#id_line").prepend($('<option></option>').html('Loading...'));
                },
            }).done(function(data) {
                $('#id_line').empty();
                $('#id_line').append($('<option>', {
                    value: "",
                    text: "- Select Line -"
                }));
                $.each(data, function(i, item) {
                    $('#id_line').append($('<option>', {
                        value: item.id_line,
                        text: item.name
                    }));
                });
            });
        }

        loadMoldingLine();


        const loadMoldingStyle = () => {
            $('#style').empty();
            $.ajax({
                url: " <?php echo site_url('molding/getStyleMolding'); ?>",
                type: 'get',
                dataType: 'json',
                beforeSend: function() {
                    $("#style").prepend($('<option></option>').html('Loading...'));
                },
            }).done(function(data) {
                $('#style').empty();
                $('#style').append($('<option>', {
                    value: "",
                    text: "- Select style -"
                }));
                $.each(data, function(i, item) {
                    $('#style').append($('<option>', {
                        value: item.style,
                        text: item.style
                    }));
                });
            });
        }

        loadMoldingStyle();

        const loadMoldingOrc = () => {
            $('#orc').empty();
            $.ajax({
                url: " <?php echo site_url('molding/getOrcMolding'); ?>",
                type: 'get',
                dataType: 'json',
                beforeSend: function() {
                    $("#orc").prepend($('<option></option>').html('Loading...'));
                },
            }).done(function(data) {
                $('#orc').empty();
                $('#orc').append($('<option>', {
                    value: "",
                    text: "- Select orc -"
                }));
                $.each(data, function(i, item) {
                    $('#orc').append($('<option>', {
                        value: item.orc,
                        text: item.orc
                    }));
                });
            });
        }

        loadMoldingOrc();

        const loadMoldingColor = () => {
            $('#color').empty();
            $.ajax({
                url: " <?php echo site_url('molding/getColorMolding'); ?>",
                type: 'get',
                dataType: 'json',
                beforeSend: function() {
                    $("#color").prepend($('<option></option>').html('Loading...'));
                },
            }).done(function(data) {
                $('#color').empty();
                $('#color').append($('<option>', {
                    value: "",
                    text: "- Select color -"
                }));
                $.each(data, function(i, item) {
                    $('#color').append($('<option>', {
                        value: item.color,
                        text: item.color
                    }));
                });
            });
        }

        loadMoldingColor();

        const loadMoldingSize = () => {
            $('#size').empty();
            $.ajax({
                url: " <?php echo site_url('molding/getSizeMolding'); ?>",
                type: 'get',
                dataType: 'json',
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

        loadMoldingSize();

        const loadMoldingKegel = () => {
            $('#kegel').empty();
            $.ajax({
                url: " <?php echo site_url('molding/getKegelMolding'); ?>",
                type: 'get',
                dataType: 'json',
                beforeSend: function() {
                    $("#kegel").prepend($('<option></option>').html('Loading...'));
                },
            }).done(function(data) {
                $('#kegel').empty();
                $('#kegel').append($('<option>', {
                    value: "",
                    text: "- Select kegel -"
                }));
                $.each(data, function(i, item) {
                    $('#kegel').append($('<option>', {
                        value: item.kegel,
                        text: item.kegel
                    }));
                });
            });
        }

        loadMoldingKegel();

        const resetAll = () => {
            $('.added_row').remove();
        }


        var i = 2;
        var j = 2;
        var j2 = 2;
        var j3 = 2;
        var j4 = 2;
        var j5 = 2;
        var k;
        var k2;
        var k3;
        var k4;
        var k5;


        $('#btn_add_row_details').click(function() {
            $('#details_row').append(` <div class="row g-3 mb-3 added_row">
                                <div class="col-lg-1">
                                    <select class="form-select component" aria-label="Default select example">
                                            <option selected>-Select Component-</option>
                                            <option value="OTR">OTR</option>
                                            <option value="SKP">SKP</option>
                                            <option value="LNG">LNG</option>
                                    </select>
                                </div>
                                <div class="col-lg-2">
                                    <select class="select2 style" id='style_${i}'></select>
                                </div>
                                <div class="col-lg-2">
                                    <select class="select2 orc" id='orc_${i}'></select>
                                </div>
                                <div class="col-lg-2">
                                    <select class="select2 color" id='color_${i}'></select>
                                </div>
                                <div class="col-lg-2">
                                    <select class="select2 kegel" id='kegel_${i}'></select>
                                </div>
                                <div class="col-lg-1">
                                    <select class="select2 size" id='size_${i}'></select>
                                </div>
                                <div class="col-lg-1">
                                    <input type="text" class="form-control qty" id="qty" placeholder="qty" required>
                                </div>
                                <div class="col-lg-1">
                                    <button class="btn btn-danger btn_remove_row_details"><i class='bx bx-trash ms-1'></i></button>
                                </div>
                            </div>`);
            i++;
            $('.select2').select2({
                theme: 'bootstrap-5',
                width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style',
            });
            // select style 
            $(`#style_${j}`).empty();
            $.ajax({
                url: " <?= site_url('molding/getStyleMolding'); ?>",
                type: 'GET',
                dataType: 'JSON',
                beforeSend: function() {
                    $(`#style_${j}`).prepend($('<option></option>').html('Loading...'));
                },
            }).done(function(data) {
                $(`#style_${j}`).empty();
                $(`#style_${j}`).append($('<option>', {
                    value: "",
                    text: "- Select Style -"
                }));
                k = j
                j++;
                $.each(data, function(i, item) {
                    $(`#style_${k}`).append($('<option>', {
                        value: item.style,
                        text: item.style
                    }));

                });
            });

            // select orc
            $(`#orc_${j2}`).empty();
            $.ajax({
                url: " <?= site_url('molding/getOrcMolding'); ?>",
                type: 'GET',
                dataType: 'JSON',
                beforeSend: function() {
                    $(`#orc_${j2}`).prepend($('<option></option>').html('Loading...'));
                },
            }).done(function(data) {
                // console.log(data);
                // console.log(j);
                $(`#orc_${j2}`).empty();
                $(`#orc_${j2}`).append($('<option>', {
                    value: "",
                    text: "- Select orc -"
                }));
                k2 = j2
                j2++;
                $.each(data, function(i, item) {
                    $(`#orc_${k2}`).append($('<option>', {
                        value: item.orc,
                        text: item.orc
                    }));

                });
            });

            // select color
            $(`#color_${j3}`).empty();
            $.ajax({
                url: " <?= site_url('molding/getColorMolding'); ?>",
                type: 'GET',
                dataType: 'JSON',
                beforeSend: function() {
                    $(`#color_${j3}`).prepend($('<option></option>').html('Loading...'));
                },
            }).done(function(data) {
                // console.log(data);
                // console.log(j3);
                $(`#color_${j3}`).empty();
                $(`#color_${j3}`).append($('<option>', {
                    value: "",
                    text: "- Select Color -"
                }));
                k3 = j3
                j3++;
                $.each(data, function(i, item) {
                    $(`#color_${k3}`).append($('<option>', {
                        value: item.color,
                        text: item.color
                    }));

                });
            });

            // select kegel
            $(`#kegel_${j4}`).empty();
            $.ajax({
                url: " <?= site_url('molding/getKegelMolding'); ?>",
                type: 'GET',
                dataType: 'JSON',
                beforeSend: function() {
                    $(`#kegel_${j4}`).prepend($('<option></option>').html('Loading...'));
                },
            }).done(function(data) {
                $(`#kegel_${j4}`).empty();
                $(`#kegel_${j4}`).append($('<option>', {
                    value: "",
                    text: "- Select Kegel -"
                }));
                k4 = j4
                j4++;
                $.each(data, function(i, item) {
                    $(`#kegel_${k4}`).append($('<option>', {
                        value: item.kegel,
                        text: item.kegel
                    }));

                });
            });

            // select size
            $(`#size_${j5}`).empty();
            $.ajax({
                url: " <?= site_url('molding/getSizeMolding'); ?>",
                type: 'GET',
                dataType: 'JSON',
                beforeSend: function() {
                    $(`#size_${j5}`).prepend($('<option></option>').html('Loading...'));
                },
            }).done(function(data) {
                $(`#size_${j5}`).empty();
                $(`#size_${j5}`).append($('<option>', {
                    value: "",
                    text: "- Select Size -"
                }));
                k5 = j5
                j5++;
                $.each(data, function(i, item) {
                    $(`#size_${k5}`).append($('<option>', {
                        value: item.size,
                        text: item.size
                    }));
                });
            });
        });

        $('#details_row').on('click', '.btn_remove_row_details', function(e) {
            e.preventDefault();
            $(this).parents('.added_row').remove();

        });


        // Button save Add Allocation
        $('#AddAllocation').click(function() {
            let id_machine = $('#id_machine').val();
            let id_molding_member = $('#id_molding_member').val();
            let id_line = $('#id_line').val();
            let demands = $('#demands').val();
            let target = $('#target').val();


            let component = [];
            $(".component").each(function() {
                if ($(this).val() != '') {
                    component.push($(this).val());
                }
            });

            let orc = [];
            $(".orc").each(function() {
                if ($(this).val() != '') {
                    orc.push($(this).val());
                }
            });

            let style = [];
            $(".style").each(function() {
                if ($(this).val() != '') {
                    style.push($(this).val());
                }
            });

            let color = [];
            $(".color").each(function() {
                if ($(this).val() != '') {
                    color.push($(this).val());
                }
            });

            let kegel = [];
            $(".kegel").each(function() {
                if ($(this).val() != '') {
                    kegel.push($(this).val());
                }
            });

            let size = [];
            $(".size").each(function() {
                if ($(this).val() != '') {
                    size.push($(this).val());
                }
            });

            let qty = [];
            $(".qty").each(function() {
                if ($(this).val() != '') {
                    qty.push($(this).val());
                }
            });

            if (id_machine != '' && id_molding_member != '' && id_line != '' && demands != '' && target != '') {
                if ($(".component").length == component.length && $(".orc").length == orc.length && $(".style").length == style.length && $(".kegel").length == kegel.length && $(".size").length == size.length && $(".qty").length == qty.length) {
                    swal.fire({
                        icon: 'warning',
                        title: 'Warning!',
                        html: "Are you sure ?",
                        showCancelButton: true,
                        confirmButtonText: 'Yes',
                        cancelButtonText: 'No',
                    }).then(function(result) {
                        if (result.value) {

                            $.ajax({
                                type: "POST",
                                url: "<?= site_url('molding/addAllocationMolding') ?>",
                                dataType: "JSON",
                                data: {
                                    'id_machine': id_machine,
                                    'id_molding_member': id_molding_member,
                                    'id_line': id_line,
                                    'target': target,
                                    'demands': demands,
                                    'component': component,
                                    'orc': orc,
                                    'style': style,
                                    'color': color,
                                    'kegel': kegel,
                                    'size': size,
                                    'qty': qty,

                                },
                                beforeSend: function() {
                                    swal.fire({
                                        html: '<h5>Loading...</h5>',
                                        showConfirmButton: false,
                                        didOpen: function() {
                                            $('.swal2-html-container').prepend(sweet_loader);
                                        }
                                    });
                                },
                                success: function(data) {

                                    swal.fire({
                                            icon: 'success',
                                            title: 'Success!',
                                            text: 'Data sent successfully.',
                                            // timer: 1000,
                                            showCancelButton: false,
                                            showConfirmButton: true
                                        })
                                        .then(function() {
                                            window.location.href = "allocation_datatable";

                                        })
                                }
                            });
                        }

                    });
                } else {
                    swal.fire({
                        icon: 'warning',
                        title: 'Warning!',
                        text: 'Size and Qty required.',
                        showCancelButton: false,
                        showConfirmButton: true
                    });
                }


            } else {
                swal.fire({
                    icon: 'warning',
                    title: 'Warning!',
                    text: 'There are forms that have not been filled out.',
                    showCancelButton: false,
                    showConfirmButton: true
                });
            }


        });
    })
</script>