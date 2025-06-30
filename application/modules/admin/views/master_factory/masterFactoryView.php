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
                        <li class="breadcrumb-item active" aria-current="page">Master Factory</li>
                    </ol>
                </nav>
            </div>
        </div>
        <!--end breadcrumb-->
        <h6 class="mb-0 text-uppercase">Master Factory</h6>
        <hr />
        <div class="card">
            <div class="card-body">
                <div class="row my-3 mx-2">
                    <div class="col mb-3">
                        <div class="accordion" id="accordionExample">
                            <div class="accordion-item" style="border: 0px;">
                                <h2 class="accordion-header" id="headingOne">
                                    <button class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne" id="btn_create_factory">
                                        <i class='bx bx-plus-circle'></i> Create Factory
                                    </button>
                                </h2>
                                <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <div class="row">

                                            <div class="col-lg-12">
                                                <div class="row g-3 mb-3">
                                                    <div class="col-lg-2">
                                                        <label for="factory" class="col-form-label">Name Factory</label>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input class="form-control" id="factory" placeholder="Name Factory" style="height: 40px"></input>
                                                    </div>
                                                </div>
                                                <div class="row g-3 mb-3">
                                                    <div class="col-lg-2">
                                                        <label for="address" class="col-form-label">Address</label>
                                                    </div>
                                                    <div class="col-lg-8">
                                                        <input class="form-control" id="address" placeholder="Address" style="height: 80px"></input>
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
                    <table id="masterFactoryTable" class="table table-striped table-bordered table-sm nowrap" style="width:100%">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Name Factory</th>
                                <th>Address</th>
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
<div class="modal fade" id="editFactoryModal" aria-hidden="true">
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
                                <label for="factoryModal" class="col-form-label">Name Factory</label>
                            </div>
                            <div class="col-lg-7">
                                <input class="form-control" id="factoryModal" placeholder="Name Factory" style="height: 40px"></input>
                            </div>
                        </div>
                        <div class="row g-3 mb-3">
                            <div class="col-lg-2">
                                <label for="addressModal" class="col-form-label">Address</label>
                            </div>
                            <div class="col-lg-8">
                                <input class="form-control" id="addressModal" placeholder="Address" style="height: 80px"></input>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <!-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> -->
                    <button type="button" id="btn_save_edit_Factory" class="btn btn-primary">Save changes</button>
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

        let masterFactoryTable = $('#masterFactoryTable').DataTable({
            // lengthChange: false,
            // buttons: ['copy', 'excel', 'pdf', 'print'],
            scrollX: true,
            ajax: {
                url: '<?= site_url("admin/getMasterFactoryData"); ?>',
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
                    'data': 'Factory',
                    'className': 'text-center px-3'
                },
                {
                    'data': 'address',
                    "width": "60px",
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
        $('#btn_create_factory').click(function() {
            $('#factory').focus();
            // $('#address').focus();
        })
        $('#btn_reset').click(function() {
            $('#factory').val("");
            $('#address').val("");

            setTimeout(function() {
                $('#factory').focus();
            }, 500)

        })
        $('#btn_save').click(function() {
            let factory = $('#factory').val();
            let address = $('#address').val();

            $('#btn_save').prop('disabled', true);
            $('#btn_save').html('Saving..');

            if (address !== '' && factory !== '') {

                $.ajax({
                    type: "POST",
                    url: "<?= site_url('admin/postFactory') ?>",
                    dataType: "JSON",
                    data: {
                        'address': address,
                        'factory': factory
                    },
                    success: function(data) {
                        masterFactoryTable.ajax.reload(null, false);

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
                            $('#factory').val("");
                            $('#address').val("");

                            setTimeout(function() {
                                $('#factory').focus();
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
        $('#masterFactoryTable tbody').on('click', '#btn_delete', function() {
            let idFactory = masterFactoryTable.row($(this).parents('tr')).data().idFactory;

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
                        url: "<?= site_url('admin/deleteFactory') ?>",
                        dataType: "JSON",
                        data: {
                            'idFactory': idFactory
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
                            masterFactoryTable.ajax.reload(null, false);
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
        let idFactory;
        $('#masterFactoryTable tbody').on('click', '#btn_edit', function() {
            idFactory = masterFactoryTable.row($(this).parents('tr')).data().idFactory;

            let factoryModal = masterFactoryTable.row($(this).parents('tr')).data().Factory;
            let addressModal = masterFactoryTable.row($(this).parents('tr')).data().address;

            $("#factoryModal").val(factoryModal);
            $("#addressModal").val(addressModal);

            $("#editFactoryModal").modal("show");

        });
        $('#btn_save_edit_Factory').on('click', function() {
            let factoryModal = $('#factoryModal').val();
            let addressModal = $('#addressModal').val();

            $('#btn_save_edit_Factory').prop('disabled', true);
            $('#btn_save_edit_Factory').html('Saving..');

            if (addressModal !== '' && factoryModal !== '') {

                $.ajax({
                    type: "POST",
                    url: "<?= site_url('admin/updateFactory') ?>",
                    dataType: "JSON",
                    data: {
                        'idFactory': idFactory,
                        'factoryModal': factoryModal,
                        'addressModal': addressModal
                    },
                    success: function(data) {
                        masterFactoryTable.ajax.reload(null, false);
                        swal.fire({
                            icon: 'success',
                            title: 'Success!',
                            text: 'Data saved successfully.',
                            timer: 1000,
                            showCancelButton: false,
                            showConfirmButton: false
                        }).then(function() {
                            $('#btn_save_edit_Factory').prop('disabled', false);
                            $('#btn_save_edit_Factory').html('Save');
                            $("#editFactoryModal").modal("hide");
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
                    $('#btn_save_edit_Factory').prop('disabled', false);
                    $('#btn_save_edit_Factory').html('Save');
                });
            }
        });
    })
</script>