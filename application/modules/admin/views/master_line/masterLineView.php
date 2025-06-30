<style>
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
</style>
<div class="page-wrapper">
    <div class="page-content">

        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Master</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Master Line</li>
                    </ol>
                </nav>
            </div>
        </div>
        <!--end breadcrumb-->
        <h6 class="mb-0 text-uppercase">Master Line</h6>
        <hr />
        <div class="card">
            <div class="card-body">
                <div class="row my-3 mx-2">
                    <div class="col mb-3">
                        <div class="accordion" id="accordionExample">
                            <div class="accordion-item" style="border: 0px;">
                                <h2 class="accordion-header" id="headingOne">
                                    <button class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne" id="btn_create_user">
                                        <i class='bx bx-plus-circle'></i> Create Line
                                    </button>
                                </h2>
                                <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <div class="row">

                                            <div class="col-lg-12">
                                                <div class="row g-3 mb-3">
                                                    <div class="col-lg-2">
                                                        <label for="nameline" class="col-form-label">Name Line</label>
                                                    </div>
                                                    <div class="col-lg-8">
                                                        <input class="form-control" id="nameline" placeholder="Name Line" style="height: 40px"></input>
                                                    </div>
                                                </div>
                                                <div class="row g-3 mb-3">
                                                    <div class="col-lg-2">
                                                        <label for="description" class="col-form-label">Description</label>
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <input class="form-control" id="description" style="height: 40px"></input>
                                                    </div>
                                                    <div class="col-lg-1">
                                                        <label for="shift" class="col-form-label">Shift</label>
                                                    </div>
                                                    <div class="col-lg-3">
                                                        <select class="form-control select2_1" id="shift" name="shift" placeholder="" style="height: 40px; width: 100%;">
                                                            <option value="">--Select Shift--</option>
                                                            <option value="1">Shift 1</option>
                                                            <option value="2">Shift 2</option>
                                                            <option value="3">Shift 3</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="row g-3 mb-3">
                                                    <div class="col-lg-2">
                                                        <label for="head" class="col-form-label">Head</label>
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <select id="head" class="form-control select2_1" name="head">
                                                        </select>
                                                    </div>
                                                    <div class="col-lg-1">
                                                        <label for="spv" class="col-form-label">Spv</label>
                                                    </div>
                                                    <div class="col-lg-3">
                                                        <select id="spv" class="form-control select2_1" name="spv">
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="row g-3 mb-3">
                                                    <div class="col-lg-2">
                                                        <label for="zone" class="col-form-label">Zone</label>
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <select class="form-control select2_1" id="zone" name="zone" placeholder="" style="height: 40px; width: 100%;">
                                                            <option value="">--Select Zone--</option>
                                                            <option value="ZONA A">ZONA A</option>
                                                            <option value="ZONA B">ZONA B</option>
                                                            <option value="ZONA C">ZONA C</option>
                                                            <option value="ZONA D">ZONA D</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-lg-1">
                                                        <label for="zone" class="col-form-label">Factory</label>
                                                    </div>
                                                    <div class="col-lg-3">
                                                        <select id="factory" class="form-control select2_1" name="factory">
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="row g-3 mb-3">
                                                    <div class="col-lg-2">
                                                    </div>
                                                    <div class="col-lg-8">
                                                        <button class="btn btn-primary" id="btn_save">Save</button>
                                                        <button class="btn btn-outline-secondary" id="btn_reset">Reset</button>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- <div class="table-responsive"> -->
                    <table id="masterLineTable" class="table table-striped table-bordered table-sm nowrap" style="width:100%">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Name Line</th>
                                <th>Description</th>
                                <th>Shift</th>
                                <!-- <th>Operator</th> -->
                                <th>Head</th>
                                <th>Spv</th>
                                <th>Zone</th>
                                <th>Factory</th>
                                <th>Action</th>
                                <!-- <th class="text-center">Quote</th>
                                <th>Action</th> -->
                            </tr>
                        </thead>
                    </table>
                    <!-- </div> -->
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<!-- Modal Edit Order -->
<div class="modal fade" id="editLineModal" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Line</h5>
                <button id="closeModal" type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" id="bodyLineModal">
                <div class="row mx-3">

                    <div class="col-lg-12">
                        <div class="row g-3 mb-3">
                            <div class="col-lg-2">
                                <label for="namelineModal" class="col-form-label">Name Line</label>
                            </div>
                            <div class="col-lg-8">
                                <input class="form-control" id="namelineModal" placeholder="Name Line" style="height: 40px"></input>
                            </div>
                        </div>
                        <div class="row g-3 mb-3">
                            <div class="col-lg-2">
                                <label for="descriptionModal" class="col-form-label">Description</label>
                            </div>
                            <div class="col-lg-4">
                                <input class="form-control" id="descriptionModal" style="height: 40px"></input>
                            </div>
                            <div class="col-lg-1">
                                <label for="shiftModal" class="col-form-label">Shift</label>
                            </div>
                            <div class="col-lg-3">
                                <select class="form-control select2_2" id="shiftModal" name="shiftModal" placeholder="" style="height: 40px; width: 100%;">
                                    <option value="">--Select Shift--</option>
                                    <option value="1">Shift 1</option>
                                    <option value="2">Shift 2</option>
                                    <option value="3">Shift 3</option>
                                </select>
                            </div>
                        </div>
                        <div class="row g-3 mb-3">
                            <div class="col-lg-2">
                                <label for="headModal" class="col-form-label">Head</label>
                            </div>
                            <div class="col-lg-4">
                                <select id="headModal" class="form-control select2_2" name="headModal">
                                </select>
                            </div>
                            <div class="col-lg-1">
                                <label for="spvModal" class="col-form-label">Spv</label>
                            </div>
                            <div class="col-lg-3">
                                <select id="spvModal" class="form-control select2_2" name="spvModal">
                                </select>
                            </div>
                        </div>
                        <div class="row g-3 mb-3">
                            <div class="col-lg-2">
                                <label for="zoneModal" class="col-form-label">Zone</label>
                            </div>
                            <div class="col-lg-4">
                                <select class="form-control select2_2" id="zoneModal" name="zoneModal" placeholder="" style="height: 40px; width: 100%;">
                                    <option value="">--Select Zone--</option>
                                    <option value="ZONA A">ZONA A</option>
                                    <option value="ZONA B">ZONA B</option>
                                    <option value="ZONA C">ZONA C</option>
                                    <option value="ZONA D">ZONA D</option>
                                </select>
                            </div>
                            <div class="col-lg-1">
                                <label for="role" class="col-form-label">Factory</label>
                            </div>
                            <div class="col-lg-3">
                                <select id="factoryModal" class="form-control select2_2" name="factory">
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <!-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> -->
                    <button type="button" id="btn_save_edit_line" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $('.select2_1').select2({
        theme: 'bootstrap-5',
        width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style',
        // placeholder: $(this).data('placeholder'),
        // allowClear: Boolean($(this).data('allow-clear')),
        // dropdownParent: $('#createNewOrderModal')
    });
    $('.select2_2').select2({
        theme: 'bootstrap-5',
        width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style',
        dropdownParent: $('#bodyLineModal')
    });
</script>
<script>
    const sweet_loader = '<div class="sweet_loader"><svg viewBox="0 0 140 140" width="140" height="140"><g class="outline"><path d="m 70 28 a 1 1 0 0 0 0 84 a 1 1 0 0 0 0 -84" stroke="rgba(0,0,0,0.1)" stroke-width="4" fill="none" stroke-linecap="round" stroke-linejoin="round"></path></g><g class="circle"><path d="m 70 28 a 1 1 0 0 0 0 84 a 1 1 0 0 0 0 -84" stroke="#71BBFF" stroke-width="4" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-dashoffset="200" stroke-dasharray="300"></path></g></svg></div>';

    $(document).ready(function() {
        $('#head').empty();
        $.ajax({
            url: "<?= site_url('admin/getMasterHead') ?>",
            type: 'GET',
            dataType: 'JSON',
            // data: {},
            success: function(head) {
                $('#head').append($('<option>', {
                    value: "",
                    text: "-- Select Head --"
                }));
                $.each(head, function(index, item) {
                    $('#head').append($('<option>', {
                        value: item.id,
                        text: item.nama_head
                    }));

                });
            }
        })
        $('#headModal').empty();
        $.ajax({
            url: "<?= site_url('admin/getMasterHead') ?>",
            type: 'GET',
            dataType: 'JSON',
            // data: {},
            success: function(head) {
                $('#headModal').append($('<option>', {
                    value: "",
                    text: "-- Select Head --"
                }));
                $.each(head, function(index, item) {
                    $('#headModal').append($('<option>', {
                        value: item.id,
                        text: item.nama_head
                    }));

                });
            }
        })
        $('#factory').empty();
        $.ajax({
            url: "<?= site_url('admin/getMasterFactory') ?>",
            type: 'GET',
            dataType: 'JSON',
            // data: {},
            success: function(factory) {
                $('#factory').append($('<option>', {
                    value: "",
                    text: "-- Select Factory --"
                }));
                $.each(factory, function(index, item) {
                    $('#factory').append($('<option>', {
                        value: item.idFactory,
                        text: item.Factory
                    }));

                });
            }
        })
        $('#factoryModal').empty();
        $.ajax({
            url: "<?= site_url('admin/getMasterFactory') ?>",
            type: 'GET',
            dataType: 'JSON',
            // data: {},
            success: function(factory) {
                $('#factoryModal').append($('<option>', {
                    value: "",
                    text: "-- Select Factory --"
                }));
                $.each(factory, function(index, item) {
                    $('#factoryModal').append($('<option>', {
                        value: item.idFactory,
                        text: item.Factory
                    }));

                });
            }
        })
        $('#spv').empty();
        $.ajax({
            url: "<?= site_url('admin/getMasterSpv') ?>",
            type: 'GET',
            dataType: 'JSON',
            // data: {},
            success: function(spv) {
                $('#spv').append($('<option>', {
                    value: "",
                    text: "-- Select Spv --"
                }));
                $.each(spv, function(index, item) {
                    $('#spv').append($('<option>', {
                        value: item.id_spv,
                        text: item.name
                    }));

                });
            }
        })
        $('#spvModal').empty();
        $.ajax({
            url: "<?= site_url('admin/getMasterSpv') ?>",
            type: 'GET',
            dataType: 'JSON',
            // data: {},
            success: function(spv) {
                $('#spvModal').append($('<option>', {
                    value: "",
                    text: "-- Select Spv --"
                }));
                $.each(spv, function(index, item) {
                    $('#spvModal').append($('<option>', {
                        value: item.id_spv,
                        text: item.name
                    }));

                });
            }
        })
        let masterLineTable = $('#masterLineTable').DataTable({
            // lengthChange: false,
            // buttons: ['copy', 'excel', 'pdf', 'print'],
            scrollX: true,
            ajax: {
                url: '<?= site_url("admin/getMasterLine"); ?>',
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
                    'data': 'name',
                    'className': 'text-center px-3'
                },
                {
                    'data': 'description',
                    'className': 'text-center px-3'
                },
                {
                    'data': 'shift',
                    'className': 'text-center px-3'
                },
                // {
                //     'data': 'operators',
                //     'className': 'text-center px-3'
                // },
                {
                    'data': 'nama_head',
                    'className': 'text-center px-3'
                },
                {
                    'data': 'name_spv',
                    'className': 'text-center px-3'
                },
                {
                    'data': 'Zone',
                    'className': 'text-center px-3'
                },
                {
                    'data': 'Factory',
                    'className': 'text-center px-3'
                },
                {
                    'className': 'text-center px-3',
                    "width": "90px",
                    render: function(data, type, row) {
                        return '<span class="badge text-bg-info text-white" style="cursor: pointer;" id="btn_edit">Edit</span> <span class="badge text-bg-danger" style="cursor: pointer;" id="btn_delete">Delete</span>'
                    }
                },
            ],

        });
        $('#btn_save').click(function() {
            let nameline = $('#nameline').val();
            let description = $('#description').val();
            let shift = $('#shift').val();
            let head = $('#head').val();
            let spv = $('#spv').val();
            let zone = $('#zone').val();
            let factory = $('#factory').val();

            $('#btn_save').prop('disabled', true);
            $('#btn_save').html('Saving..');

            if (nameline !== '' && description !== '' && shift !== '' && head !== '' && spv !== '' && zone !== '' && factory !== '') {

                $.ajax({
                    type: "POST",
                    url: "<?= site_url('admin/postLine') ?>",
                    dataType: "JSON",
                    data: {
                        'nameline': nameline,
                        'description': description,
                        'shift': shift,
                        'head': head,
                        'spv': spv,
                        'zone': zone,
                        'factory': factory
                    },
                    success: function(data) {
                        masterLineTable.ajax.reload(null, false);

                        swal.fire({
                            icon: 'success',
                            title: 'Success!',
                            text: 'Data saved successfully.',
                            timer: 1000,
                            showCancelButton: false,
                            showConfirmButton: false
                        }).then(function() {
                            $('#btn_save').prop('disabled', false);
                            $('#btn_save').html('Save');
                            // $('#nameline').focus();
                            $('#nameline').val("");
                            $('#description').val("");
                            $('#shift').val("").change();
                            $('#head').val("").change();
                            $('#spv').val("").change();
                            $('#zone').val("").change();
                            $('#factory').val("").change();

                            setTimeout(function() {
                                $('#nameline').focus();
                            }, 500)
                        });
                    }
                });
            } else {
                swal.fire({
                    icon: 'warning',
                    title: 'Warning!',
                    text: 'Please fill in all fields.',
                    showCancelButton: false,
                    showConfirmButton: true
                }).then(function() {
                    $('#btn_save').prop('disabled', false);
                    $('#btn_save').html('Save');
                });
            }
        });
        $('#btn_reset').click(function() {
            $('#nameline').focus();
            $('#nameline').val("");
            $('#description').val("");
            $('#shift').val("").change();
            $('#head').val("").change();
            $('#spv').val("").change();
            $('#zone').val("").change();
            $('#factory').val("").change();

            setTimeout(function() {
                $('#nameline').focus();
            }, 500)
        })
        $('#masterLineTable tbody').on('click', '#btn_delete', function() {
            let id_line = masterLineTable.row($(this).parents('tr')).data().id_line;

            swal.fire({
                icon: 'warning',
                title: 'Warning!',
                html: "Are you sure you want to delete this Line ?",
                showCancelButton: true,
                // confirmButtonColor: '#3085d6',
                // cancelButtonColor: '#d33',
                confirmButtonText: 'Yes',
                cancelButtonText: 'No',
            }).then(function(result) {
                if (result.value) {

                    $.ajax({
                        type: "POST",
                        url: "<?= site_url('admin/deleteLine') ?>",
                        dataType: "JSON",
                        data: {
                            'id_line': id_line
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
                            masterLineTable.ajax.reload(null, false);
                            swal.fire({
                                icon: 'success',
                                title: 'Success!',
                                text: 'Data deleted successfully.',
                                timer: 1000,
                                showCancelButton: false,
                                showConfirmButton: false
                            });
                        }
                    });


                }


            });
        });
        let id_line;
        $('#masterLineTable tbody').on('click', '#btn_edit', function() {
            id_line = masterLineTable.row($(this).parents('tr')).data().id_line;

            let namelineModal = masterLineTable.row($(this).parents('tr')).data().name;
            let descriptionModal = masterLineTable.row($(this).parents('tr')).data().description;
            let shiftModal = masterLineTable.row($(this).parents('tr')).data().shift;
            let headModal = masterLineTable.row($(this).parents('tr')).data().head;
            let spvModal = masterLineTable.row($(this).parents('tr')).data().id_spv;
            let zoneModal = masterLineTable.row($(this).parents('tr')).data().Zone;
            let factoryModal = masterLineTable.row($(this).parents('tr')).data().idFactory;
            // console.log(namelineModal);
            // console.log(descriptionModal);
            // console.log(shiftModal);
            // console.log(headModal);
            // console.log(spvModal);
            // console.log(zoneModal);


            $("#namelineModal").val(namelineModal);
            $("#descriptionModal").val(descriptionModal);
            $('#shiftModal').val(shiftModal).change();
            $('#headModal').val(headModal).change();
            $('#spvModal').val(spvModal).change();
            $('#zoneModal').val(zoneModal).change();
            $('#factoryModal').val(factoryModal).change();
            // $("#roleModal").val(roleModal);

            $("#editLineModal").modal("show");

        });
        $('#btn_save_edit_line').on('click', function() {
            let namelineModal = $('#namelineModal').val();
            let descriptionModal = $('#descriptionModal').val();
            let shiftModal = $('#shiftModal').val();
            let headModal = $('#headModal').val();
            let spvModal = $('#spvModal').val();
            let zoneModal = $('#zoneModal').val();
            let factoryModal = $('#factoryModal').val();

            $('#btn_save_edit_line').prop('disabled', true);
            $('#btn_save_edit_line').html('Saving..');

            if (namelineModal !== '' && descriptionModal !== '' && shiftModal !== '' && headModal !== '' && spvModal !== '' && zoneModal !== '' && factoryModal !== '') {

                $.ajax({
                    type: "POST",
                    url: "<?= site_url('admin/updateLine') ?>",
                    dataType: "JSON",
                    data: {
                        'id_line': id_line,
                        'namelineModal': namelineModal,
                        'descriptionModal': descriptionModal,
                        'shiftModal': shiftModal,
                        'headModal': headModal,
                        'spvModal': spvModal,
                        'zoneModal': zoneModal,
                        'factoryModal': factoryModal
                    },
                    success: function(data) {
                        masterLineTable.ajax.reload(null, false);
                        swal.fire({
                            icon: 'success',
                            title: 'Success!',
                            text: 'Data saved successfully.',
                            timer: 1000,
                            showCancelButton: false,
                            showConfirmButton: false
                        }).then(function() {
                            $('#btn_save_edit_line').prop('disabled', false);
                            $('#btn_save_edit_line').html('Save');
                            $("#editLineModal").modal("hide");
                        });
                    }
                });
            } else {
                swal.fire({
                    icon: 'warning',
                    title: 'Warning!',
                    text: 'Please fill in all fields.',
                    showCancelButton: false,
                    showConfirmButton: true
                }).then(function() {
                    $('#btn_save_edit_line').prop('disabled', false);
                    $('#btn_save_edit_line').html('Save');
                });
            }
        });
    })
</script>