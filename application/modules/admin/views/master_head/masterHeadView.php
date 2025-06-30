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
                        <li class="breadcrumb-item active" aria-current="page">Master Head</li>
                    </ol>
                </nav>
            </div>
        </div>
        <!--end breadcrumb-->
        <h6 class="mb-0 text-uppercase">Master Head</h6>
        <hr />
        <div class="card">
            <div class="card-body">
                <div class="row my-3 mx-2">
                    <div class="col mb-3">
                        <div class="accordion" id="accordionExample">
                            <div class="accordion-item" style="border: 0px;">
                                <h2 class="accordion-header" id="headingOne">
                                    <button class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne" id="btn_create_Head">
                                        <i class='bx bx-plus-circle'></i> Create Head
                                    </button>
                                </h2>
                                <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
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
                                                        <label for="nameHead" class="col-form-label">Name Head</label>
                                                    </div>
                                                    <div class="col-lg-8">
                                                        <input class="form-control" id="nameHead" style="height: 40px"></input>
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
                    <table id="masterHeadTable" class="table table-striped table-bordered table-sm nowrap" style="width:100%">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Nik</th>
                                <th>Head</th>
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
<div class="modal fade" id="editHeadModal">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Head</h5>
                <button id="closeModal" type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
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
                                <label for="nameHeadModal" class="col-form-label">Name Head</label>
                            </div>
                            <div class="col-lg-8">
                                <input class="form-control" id="nameHeadModal" style="height: 40px"></input>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <!-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> -->
                    <button type="button" id="btn_save_edit_head" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        let masterHeadTable = $('#masterHeadTable').DataTable({
            // lengthChange: false,
            // buttons: ['copy', 'excel', 'pdf', 'print'],
            scrollX: true,
            ajax: {
                url: '<?= site_url("admin/getMasterHeadTable"); ?>',
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
                    'data': 'nama_head',
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
            let nik = $('#nik').val();
            let nameHead = $('#nameHead').val();

            $('#btn_save').prop('disabled', true);
            $('#btn_save').html('Saving..');

            if (nik !== '' && nameHead !== '') {

                $.ajax({
                    type: "POST",
                    url: "<?= site_url('admin/postHead') ?>",
                    dataType: "JSON",
                    data: {
                        'nik': nik,
                        'nameHead': nameHead
                    },
                    success: function(data) {
                        masterHeadTable.ajax.reload(null, false);

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
                            $('#nik').val("");
                            $('#nameHead').val("");

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
        $('#btn_reset').click(function() {
            $('#nik').val("");
            // $('#nik').focus();
            $('#nameHead').val("");

            setTimeout(function() {
                $('#nik').focus();
            }, 500)
        })
        $('#masterHeadTable tbody').on('click', '#btn_delete', function() {
            let id_head = masterHeadTable.row($(this).parents('tr')).data().id;

            swal.fire({
                icon: 'warning',
                title: 'Warning!',
                html: "Are you sure you want to delete this Head ?",
                showCancelButton: true,
                // confirmButtonColor: '#3085d6',
                // cancelButtonColor: '#d33',
                confirmButtonText: 'Yes',
                cancelButtonText: 'No',
            }).then(function(result) {
                if (result.value) {

                    $.ajax({
                        type: "POST",
                        url: "<?= site_url('admin/deleteHead') ?>",
                        dataType: "JSON",
                        data: {
                            'id_head': id_head
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
                            masterHeadTable.ajax.reload(null, false);
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
        let id_head;
        $('#masterHeadTable tbody').on('click', '#btn_edit', function() {
            id_head = masterHeadTable.row($(this).parents('tr')).data().id;

            let nikModal = masterHeadTable.row($(this).parents('tr')).data().nik;
            let nameHeadModal = masterHeadTable.row($(this).parents('tr')).data().nama_head;
            // console.log(namelineModal);
            // console.log(descriptionModal);


            $("#nikModal").val(nikModal);
            $("#nameHeadModal").val(nameHeadModal);

            $("#editHeadModal").modal("show");

        });
        $('#btn_save_edit_head').on('click', function() {
            let nikModal = $('#nikModal').val();
            let nameHeadModal = $('#nameHeadModal').val();

            $('#btn_save_edit_head').prop('disabled', true);
            $('#btn_save_edit_head').html('Saving..');

            if (nikModal !== '' && nameHeadModal !== '') {

                $.ajax({
                    type: "POST",
                    url: "<?= site_url('admin/updateHead') ?>",
                    dataType: "JSON",
                    data: {
                        'id_head': id_head,
                        'nikModal': nikModal,
                        'nameHeadModal': nameHeadModal
                    },
                    success: function(data) {
                        masterHeadTable.ajax.reload(null, false);
                        swal.fire({
                            icon: 'success',
                            title: 'Success!',
                            text: 'Data saved successfully.',
                            timer: 1000,
                            showCancelButton: false,
                            showConfirmButton: false
                        }).then(function() {
                            $('#btn_save_edit_head').prop('disabled', false);
                            $('#btn_save_edit_head').html('Save');
                            $("#editHeadModal").modal("hide");
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
                    $('#btn_save_edit_head').prop('disabled', false);
                    $('#btn_save_edit_head').html('Save');
                });
            }
        });
    })
</script>