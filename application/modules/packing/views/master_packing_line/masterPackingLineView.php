<div class="page-wrapper">
    <div class="page-content">
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Packing</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Packing Master Line</li>
                    </ol>
                </nav>
            </div>
        </div>
        <h6 class="mb-0 text-uppercase">Packing Master Line</h6>
        <hr />
        <div class="row">
            <div class="col-12 ">
                <div class="card rounded-4 w-100">
                    <div class="card-body">
                        <div class="mx-3 my-3">
                            <div class="col mb-3">
                                <div class="accordion" id="accordionExample">
                                    <div class="accordion-item" style="border: 0px;">
                                        <h2 class="accordion-header" id="headingOne">
                                            <button class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" id="btn_create_Line">
                                                <i class='bx bx-plus-circle'></i> Create Line
                                            </button>
                                        </h2>
                                        <div id="collapseOne" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                                            <div class="accordion-body">
                                                <div class="row">

                                                    <div class="col-lg-12">
                                                        <div class="row g-3 mb-3">
                                                            <div class="col-lg-2">
                                                                <label for="line" class="col-form-label">Line</label>
                                                            </div>
                                                            <div class="col-lg-5">
                                                                <input class="form-control" id="line" style="height: 40px"></input>
                                                            </div>
                                                            <div class="col-lg-1">
                                                                <label for="zone" class="col-form-label">Zone</label>
                                                            </div>
                                                            <div class="col-lg-3">
                                                                <select class="form-control select2_1" id="zone" placeholder="" style="height: 40px; width: 100%;">
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="row g-3 mb-3">
                                                            <div class="col-lg-2">
                                                                <label for="boxCapacity" class="col-form-label">Max Box Capacity</label>
                                                            </div>
                                                            <div class="col-lg-5">
                                                                <input class="form-control" id="boxCapacity" style="height: 40px"></input>
                                                            </div>
                                                            <div class="col-lg-1">
                                                                <label for="factory" class="col-form-label">Factory</label>
                                                            </div>
                                                            <div class="col-lg-3">
                                                                <select class="form-control select2_1" id="factory" placeholder="" style="height: 40px; width: 100%;">
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
                            <table id="MasterLineTable" class="table table-striped table-bordered table-sm nowrap" style="width:100%">
                                <thead>
                                    <th>ID</th>
                                    <th>Zona</th>
                                    <th>Line</th>
                                    <th>Max Box Capacity</th>
                                    <th>Factory</th>
                                    <th>Action</th>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="editLineModal">
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
                                <label for="lineModal" class="col-form-label">Line</label>
                            </div>
                            <div class="col-lg-5">
                                <input class="form-control" id="lineModal" style="height: 40px"></input>
                            </div>
                            <div class="col-lg-1">
                                <label for="zoneModal" class="col-form-label">Zone</label>
                            </div>
                            <div class="col-lg-3">
                                <select class="form-control select2_1" id="zoneModal" placeholder="" style="height: 40px; width: 100%;">
                                </select>
                            </div>
                        </div>
                        <div class="row g-3 mb-3">
                            <div class="col-lg-2">
                                <label for="boxCapacityModal" class="col-form-label">Max Box Capacity</label>
                            </div>
                            <div class="col-lg-5">
                                <input class="form-control" id="boxCapacityModal" style="height: 40px"></input>
                            </div>
                            <div class="col-lg-1">
                                <label for="factoryModal" class="col-form-label">Factory</label>
                            </div>
                            <div class="col-lg-3">
                                <select class="form-control select2_1" id="factoryModal" placeholder="" style="height: 40px; width: 100%;">
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
        dropdownParent: $('#bodySpvModal')
    });
</script>
<script>
    $(document).ready(function() {
        $('#zone').empty();
        $.ajax({
            url: "<?= site_url('packing/getMasterZone') ?>",
            type: 'GET',
            dataType: 'JSON',
            // data: {},
            success: function(zone) {
                $('#zone').append($('<option>', {
                    value: "",
                    text: "-- Select Zone --"
                }));
                $.each(zone, function(index, item) {
                    $('#zone').append($('<option>', {
                        value: item.id_zone,
                        text: item.zone
                    }));
                });
            }
        })
        $('#factory').empty();
        $.ajax({
            url: "<?= site_url('packing/getMasterFactory') ?>",
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
        $('#zoneModal').empty();
        $.ajax({
            url: "<?= site_url('packing/getMasterZone') ?>",
            type: 'GET',
            dataType: 'JSON',
            // data: {},
            success: function(zone) {
                $('#zoneModal').append($('<option>', {
                    value: "",
                    text: "-- Select Zone --"
                }));
                $.each(zone, function(index, item) {
                    $('#zoneModal').append($('<option>', {
                        value: item.id_zone,
                        text: item.zone
                    }));
                });
            }
        })
        $('#factoryModal').empty();
        $.ajax({
            url: "<?= site_url('packing/getMasterFactory') ?>",
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
        let MasterLineTable = $('#MasterLineTable').DataTable({
            "dom": '<"toolbar">lfrtip',
            "destroy": true,
            "processing": true,
            "order": [],
            "destroy": true,
            "ajax": {
                "type": "GET",
                "url": "<?php echo site_url('packing/ajax_get_master_line'); ?>"
            },
            "columns": [{
                    "width": "30px",
                    "data": "id_line",
                    'className': "text-center px-2"
                },
                {
                    "data": "zone",
                    'className': "text-center px-2"
                },
                {
                    "data": "line",
                    'className': "text-center px-2"
                },
                {
                    "data": "max_box_capacity",
                    'className': "text-center px-2"
                },
                {
                    "data": "Factory",
                    'className': "text-center px-2"
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
            let line = $('#line').val();
            let zone = $('#zone').val();
            let boxCapacity = $('#boxCapacity').val();
            let factory = $('#factory').val();

            $('#btn_save').prop('disabled', true);
            $('#btn_save').html('Saving..');

            if (line !== '' && zone !== '' && boxCapacity !== '' && factory !== '') {

                $.ajax({
                    type: "POST",
                    url: "<?= site_url('packing/postPackingLine') ?>",
                    dataType: "JSON",
                    data: {
                        'line': line,
                        'zone': zone,
                        'boxCapacity': boxCapacity,
                        'factory': factory
                    },
                    success: function(data) {
                        MasterLineTable.ajax.reload(null, false);

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
                            $('#line').val("");
                            $('#boxCapacity').val("");
                            $('#zone').val("").change();
                            $('#factory').val("").change();

                            setTimeout(function() {
                                $('#line').focus();
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
            $('#line').focus();
            $('#line').val("");
            $('#boxCapacity').val("");
            $('#zone').val("").change();
            $('#factory').val("").change();

            setTimeout(function() {
                $('#line').focus();
            }, 500)
        })
        $('#MasterLineTable tbody').on('click', '#btn_delete', function() {
            let id_line = MasterLineTable.row($(this).parents('tr')).data().id_line;

            swal.fire({
                icon: 'warning',
                title: 'Warning!',
                html: "Are you sure you want to delete this  Packing Line ?",
                showCancelButton: true,
                // confirmButtonColor: '#3085d6',
                // cancelButtonColor: '#d33',
                confirmButtonText: 'Yes',
                cancelButtonText: 'No',
            }).then(function(result) {
                if (result.value) {

                    $.ajax({
                        type: "POST",
                        url: "<?= site_url('packing/deletePackingLine') ?>",
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
                            MasterLineTable.ajax.reload(null, false);
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
        $('#MasterLineTable tbody').on('click', '#btn_edit', function() {
            id_line = MasterLineTable.row($(this).parents('tr')).data().id_line;

            let lineModal = MasterLineTable.row($(this).parents('tr')).data().line;
            let zoneModal = MasterLineTable.row($(this).parents('tr')).data().id_zone;
            let boxCapacityModal = MasterLineTable.row($(this).parents('tr')).data().max_box_capacity;
            let factoryModal = MasterLineTable.row($(this).parents('tr')).data().id_factory;
            // console.log(lineModal);
            // console.log(zoneModal);
            // console.log(boxCapacityModal);
            // console.log(factoryModal);


            $("#lineModal").val(lineModal);
            $("#boxCapacityModal").val(boxCapacityModal);
            $("#zoneModal").val(zoneModal).change();
            $("#factoryModal").val(factoryModal).change();

            $("#editLineModal").modal("show");

        });
        let id_line;

        $('#btn_save_edit_line').on('click', function() {
            let lineModal = $('#lineModal').val();
            let boxCapacityModal = $('#boxCapacityModal').val();
            let zoneModal = $('#zoneModal').val();
            let factoryModal = $('#factoryModal').val();

            $('#btn_save_edit_line').prop('disabled', true);
            $('#btn_save_edit_line').html('Saving..');

            if (lineModal !== '' && zoneModal !== '' && boxCapacityModal !== '' && factoryModal !== '') {

                $.ajax({
                    type: "POST",
                    url: "<?= site_url('packing/updatePackingLine') ?>",
                    dataType: "JSON",
                    data: {
                        'id_line': id_line,
                        'lineModal': lineModal,
                        'zoneModal': zoneModal,
                        'boxCapacityModal': boxCapacityModal,
                        'factoryModal': factoryModal
                    },
                    success: function(data) {
                        MasterLineTable.ajax.reload(null, false);
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