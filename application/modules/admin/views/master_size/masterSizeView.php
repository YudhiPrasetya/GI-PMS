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
                        <li class="breadcrumb-item active" aria-current="page">Master Size</li>
                    </ol>
                </nav>
            </div>
        </div>
        <!--end breadcrumb-->
        <h6 class="mb-0 text-uppercase">Master Size</h6>
        <hr />
        <div class="card">
            <div class="card-body">
                <div class="row my-3 mx-2">
                    <div class="col mb-3">
                        <div class="accordion" id="accordionExample">
                            <div class="accordion-item" style="border: 0px;">
                                <h2 class="accordion-header" id="headingOne">
                                    <button class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne" id="btn_create_Size">
                                        <i class='bx bx-plus-circle'></i> Create Size
                                    </button>
                                </h2>
                                <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <div class="row">

                                            <div class="col-lg-12">
                                                <div class="row g-3 mb-3">
                                                    <div class="col-lg-2">
                                                        <label for="size" class="col-form-label">Size</label>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input class="form-control" id="size" style="height: 40px"></input>
                                                    </div>
                                                </div>
                                                <div class="row g-3 mb-3">
                                                    <div class="col-lg-2">
                                                        <label for="group" class="col-form-label">Group</label>
                                                    </div>
                                                    <div class="col-lg-2">
                                                        <select class="form-control select2_1" id="group" name="group" placeholder="" style="height: 40px; width: 100%;">
                                                            <option value="">--Select Group--</option>
                                                            <option value="reguler">reguler</option>
                                                            <option value="big">big</option>
                                                            <option value="extra large">extra large</option>
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
                    <table id="masterSizeTable" class="table table-striped table-bordered table-sm nowrap" style="width:100%">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Group</th>
                                <th>Size</th>
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
<div class="modal fade" id="editSizeModal">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Size</h5>
                <button id="closeModal" type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" id="bodySizeModal">
                <div class="row mx-3">

                    <div class="col-lg-12">
                        <div class="row g-3 mb-3">
                            <div class="col-lg-2">
                                <label for="sizeModal" class="col-form-label">Size</label>
                            </div>
                            <div class="col-lg-7">
                                <input class="form-control" id="sizeModal" style="height: 40px"></input>
                            </div>
                        </div>
                        <div class="row g-3 mb-3">
                            <div class="col-lg-2">
                                <label for="groupModal" class="col-form-label">Group</label>
                            </div>
                            <div class="col-lg-2">
                                <select class="form-control select2_2" id="groupModal" name="groupModal" placeholder="" style="height: 40px; width: 100%;">
                                    <option value="">--Select Group--</option>
                                    <option value="reguler">reguler</option>
                                    <option value="big">big</option>
                                    <option value="extra large">extra large</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <!-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> -->
                    <button type="button" id="btn_save_edit_size" class="btn btn-primary">Save changes</button>
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
        // dropdownParent: $('#editSizeModal')
    });
    $('.select2_2').select2({
        theme: 'bootstrap-5',
        width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style',
        dropdownParent: $('#bodySizeModal')
    });
</script>
<script>
    $(document).ready(function() {
        let masterSizeTable = $('#masterSizeTable').DataTable({
            // lengthChange: false,
            // buttons: ['copy', 'excel', 'pdf', 'print'],
            scrollX: true,
            ajax: {
                url: '<?= site_url("admin/getMasterSizeTable"); ?>',
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
                    'data': 'group',
                    'className': 'text-center px-3'
                },
                {
                    'data': 'size',
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
            let size = $('#size').val();
            let group = $('#group').val();

            $('#btn_save').prop('disabled', true);
            $('#btn_save').html('Saving..');

            $.ajax({
                type: "GET",
                url: "<?= site_url('admin/check_size') ?>",
                dataType: "JSON",
                data: {
                    'size': size,
                    'group': group
                },
                success: function(data) {
                    console.log(data)
                    if (data == 1) {
                        swal.fire({
                            icon: 'warning',
                            title: 'Warning!',
                            text: 'size and group are available',
                            showCancelButton: false,
                            showConfirmButton: true
                        }).then(function() {
                            $('#btn_save').prop('disabled', false);
                            $('#btn_save').html('Save');
                            $('#size').val('');
                            $('#group').val('').change();

                            setTimeout(function() {
                                $('#size').focus();
                            }, 500)
                        });
                    } else if (data == 0) {
                        if (size !== '' && group !== '') {

                            $.ajax({
                                type: "POST",
                                url: "<?= site_url('admin/postSize') ?>",
                                dataType: "JSON",
                                data: {
                                    'size': size,
                                    'group': group
                                },
                                success: function(data) {
                                    masterSizeTable.ajax.reload(null, false);

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
                                        // $('#nik').focus();
                                        $('#size').val("");
                                        $('#group').val("").change();

                                        setTimeout(function() {
                                            $('#size').focus();
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
                    }
                },
            })
        });
        $('#btn_reset').click(function() {
            $('#size').val("");
            // $('#nik').focus();
            $('#group').val("").change();

            setTimeout(function() {
                $('#size').focus();
            }, 500)
        })
        $('#masterSizeTable tbody').on('click', '#btn_delete', function() {
            let id_mastersize = masterSizeTable.row($(this).parents('tr')).data().id_mastersize;

            swal.fire({
                icon: 'warning',
                title: 'Warning!',
                html: "Are you sure you want to delete this Size ?",
                showCancelButton: true,
                // confirmButtonColor: '#3085d6',
                // cancelButtonColor: '#d33',
                confirmButtonText: 'Yes',
                cancelButtonText: 'No',
            }).then(function(result) {
                if (result.value) {

                    $.ajax({
                        type: "POST",
                        url: "<?= site_url('admin/deleteSize') ?>",
                        dataType: "JSON",
                        data: {
                            'id_mastersize': id_mastersize
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
                            masterSizeTable.ajax.reload(null, false);
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
        let id_mastersize;
        $('#masterSizeTable tbody').on('click', '#btn_edit', function() {
            id_mastersize = masterSizeTable.row($(this).parents('tr')).data().id_mastersize;

            let sizeModal = masterSizeTable.row($(this).parents('tr')).data().size;
            let groupModal = masterSizeTable.row($(this).parents('tr')).data().group;
            // console.log(namelineModal);
            // console.log(descriptionModal);

            $("#sizeModal").val(sizeModal);
            $("#groupModal").val(groupModal).change();

            $("#editSizeModal").modal("show");

        });
        $('#btn_save_edit_size').on('click', function() {
            let sizeModal = $('#sizeModal').val();
            let groupModal = $('#groupModal').val();

            $('#btn_save_edit_size').prop('disabled', true);
            $('#btn_save_edit_size').html('Saving..');

            if (sizeModal !== '' && groupModal !== '') {
                $.ajax({
                    type: "POST",
                    url: "<?= site_url('admin/updateSize') ?>",
                    dataType: "JSON",
                    data: {
                        'id_mastersize': id_mastersize,
                        'sizeModal': sizeModal,
                        'groupModal': groupModal
                    },
                    success: function(data) {
                        masterSizeTable.ajax.reload(null, false);
                        swal.fire({
                            icon: 'success',
                            title: 'Success!',
                            text: 'Data saved successfully.',
                            timer: 1000,
                            showCancelButton: false,
                            showConfirmButton: false
                        }).then(function() {
                            $('#btn_save_edit_size').prop('disabled', false);
                            $('#btn_save_edit_size').html('Save');
                            $("#editSizeModal").modal("hide");
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
                    $('#btn_save_edit_size').prop('disabled', false);
                    $('#btn_save_edit_size').html('Save');
                });
            }
        });
    })
</script>