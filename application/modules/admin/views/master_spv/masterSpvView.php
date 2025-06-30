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
                        <li class="breadcrumb-item active" aria-current="page">Master Spv</li>
                    </ol>
                </nav>
            </div>
        </div>
        <!--end breadcrumb-->
        <h6 class="mb-0 text-uppercase">Master Spv</h6>
        <hr />
        <div class="card">
            <div class="card-body">
                <div class="row my-3 mx-2">
                    <div class="col mb-3">
                        <div class="accordion" id="accordionExample">
                            <div class="accordion-item" style="border: 0px;">
                                <h2 class="accordion-header" id="headingOne">
                                    <button class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" id="btn_create_Spv">
                                        <i class='bx bx-plus-circle'></i> Create Spv
                                    </button>
                                </h2>
                                <div id="collapseOne" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <div class="row">

                                            <div class="col-lg-12">
                                                <div class="row g-3 mb-3">
                                                    <div class="col-lg-2">
                                                        <label for="nik" class="col-form-label">Nik</label>
                                                    </div>
                                                    <div class="col-lg-8">
                                                        <input class="form-control" id="nik" style="height: 40px"></input>
                                                    </div>
                                                </div>
                                                <div class="row g-3 mb-3">
                                                    <div class="col-lg-2">
                                                        <label for="nameSpv" class="col-form-label">Name Spv</label>
                                                    </div>
                                                    <div class="col-lg-5">
                                                        <input class="form-control" id="nameSpv" style="height: 40px"></input>
                                                    </div>
                                                    <div class="col-lg-1">
                                                        <label for="shift" class="col-form-label">Shift</label>
                                                    </div>
                                                    <div class="col-lg-2">
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
                    <table id="masterSpvTable" class="table table-striped table-bordered table-sm nowrap" style="width:100%">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Nik</th>
                                <th>Name Spv</th>
                                <th>Shift</th>
                                <th>Action</th>
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
<div class="modal fade" id="editSpvModal">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Spv</h5>
                <button id="closeModal" type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" id="bodySpvModal">
                <div class="row mx-3">

                    <div class="col-lg-12">
                        <div class="row g-3 mb-3">
                            <div class="col-lg-2">
                                <label for="nikModal" class="col-form-label">Nik</label>
                            </div>
                            <div class="col-lg-8">
                                <input class="form-control" id="nikModal" style="height: 40px"></input>
                            </div>
                        </div>
                        <div class="row g-3 mb-3">
                            <div class="col-lg-2">
                                <label for="nameSpvModal" class="col-form-label">Name Spv</label>
                            </div>
                            <div class="col-lg-5">
                                <input class="form-control" id="nameSpvModal" style="height: 40px"></input>
                            </div>
                            <div class="col-lg-1">
                                <label for="shiftModal" class="col-form-label">Shift</label>
                            </div>
                            <div class="col-lg-2">
                                <select class="form-control select2_2" id="shiftModal" name="shiftModal" placeholder="" style="height: 40px; width: 100%;">
                                    <option value="">--Select Shift--</option>
                                    <option value="1">Shift 1</option>
                                    <option value="2">Shift 2</option>
                                    <option value="3">Shift 3</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <!-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> -->
                    <button type="button" id="btn_save_edit_Spv" class="btn btn-primary">Save changes</button>
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
        let masterSpvTable = $('#masterSpvTable').DataTable({
            // lengthChange: false,
            // buttons: ['copy', 'excel', 'pdf', 'print'],
            scrollX: true,
            ajax: {
                url: '<?= site_url("admin/getMasterDataSpvTable"); ?>',
                type: 'GET',
                dataType: 'JSON'
            },
            columns: [{
                    "data": null,
                    "orderable": true,
                    "searchable": false,
                    'className': 'text-center px-4',
                    "width": "50px",
                    "render": function(data, type, row, meta) {
                        return meta.row + meta.settings._iDisplayStart + 1;
                    }
                },
                {
                    'data': 'nik',
                    'className': 'text-center px-3'
                },
                {
                    'data': 'name',
                    'className': 'text-center px-3'
                },
                {
                    'data': 'shift',
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
        $('#btn_reset').on('click', function() {
            $('#nik').val("");
            $('#nameSpv').val("");
            $('#shift').val("").change();
            setTimeout(function() {
                $('#nik').focus();
            }, 500)
        })
        $('#btn_save').click(function() {
            let nik = $('#nik').val();
            let nameSpv = $('#nameSpv').val();
            let shift = $('#shift').val();

            $('#btn_save').prop('disabled', true);
            $('#btn_save').html('Saving..');

            if (nik !== '' && nameSpv !== '' && shift !== '') {

                $.ajax({
                    type: "POST",
                    url: "<?= site_url('admin/postSpv') ?>",
                    dataType: "JSON",
                    data: {
                        'nik': nik,
                        'nameSpv': nameSpv,
                        'shift': shift
                    },
                    success: function(data) {
                        masterSpvTable.ajax.reload(null, false);

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
                            $('#nik').val("");
                            // $('#nik').focus();
                            $('#nameSpv').val("");
                            $('#shift').val("").change();
                            setTimeout(function() {
                                $('#nik').focus();
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
        $('#masterSpvTable tbody').on('click', '#btn_delete', function() {
            let id_spv = masterSpvTable.row($(this).parents('tr')).data().id_spv;

            swal.fire({
                icon: 'warning',
                title: 'Warning!',
                html: "Are you sure you want to delete this Spv ?",
                showCancelButton: true,
                // confirmButtonColor: '#3085d6',
                // cancelButtonColor: '#d33',
                confirmButtonText: 'Yes',
                cancelButtonText: 'No',
            }).then(function(result) {
                if (result.value) {

                    $.ajax({
                        type: "POST",
                        url: "<?= site_url('admin/deleteSpv') ?>",
                        dataType: "JSON",
                        data: {
                            'id_spv': id_spv
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
                            masterSpvTable.ajax.reload(null, false);
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
        let id_spv;
        $('#masterSpvTable tbody').on('click', '#btn_edit', function() {
            id_spv = masterSpvTable.row($(this).parents('tr')).data().id_spv;

            let nikModal = masterSpvTable.row($(this).parents('tr')).data().nik;
            let nameSpvModal = masterSpvTable.row($(this).parents('tr')).data().name;
            let shiftModal = masterSpvTable.row($(this).parents('tr')).data().shift;
            // console.log(namelineModal);
            // console.log(descriptionModal);


            $("#nikModal").val(nikModal);
            $("#nameSpvModal").val(nameSpvModal);
            $("#shiftModal").val(shiftModal).change();

            $("#editSpvModal").modal("show");

        });
        $('#btn_save_edit_Spv').on('click', function() {
            let nikModal = $('#nikModal').val();
            let nameSpvModal = $('#nameSpvModal').val();
            let shiftModal = $('#shiftModal').val();

            $('#btn_save_edit_Spv').prop('disabled', true);
            $('#btn_save_edit_Spv').html('Saving..');

            if (nikModal !== '' && nameSpvModal !== '' && shiftModal !== '') {

                $.ajax({
                    type: "POST",
                    url: "<?= site_url('admin/updateSpv') ?>",
                    dataType: "JSON",
                    data: {
                        'id_spv': id_spv,
                        'nikModal': nikModal,
                        'nameSpvModal': nameSpvModal,
                        'shiftModal': shiftModal
                    },
                    success: function(data) {
                        masterSpvTable.ajax.reload(null, false);
                        swal.fire({
                            icon: 'success',
                            title: 'Success!',
                            text: 'Data saved successfully.',
                            timer: 1000,
                            showCancelButton: false,
                            showConfirmButton: false
                        }).then(function() {
                            $('#btn_save_edit_Spv').prop('disabled', false);
                            $('#btn_save_edit_Spv').html('Save');
                            $("#editSpvModal").modal("hide");
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
                    $('#btn_save_edit_Spv').prop('disabled', false);
                    $('#btn_save_edit_Spv').html('Save');
                });
            }
        });
    })
</script>