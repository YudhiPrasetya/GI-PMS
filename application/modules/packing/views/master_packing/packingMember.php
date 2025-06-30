<!--start page wrapper -->
<div class="page-wrapper">
    <div class="page-content">
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Packing</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Packing Member</li>
                    </ol>
                </nav>
            </div>
        </div>
        <h6 class="mb-0 text-uppercase">Packing Member</h6>
        <hr />
        <div class="row">
            <div class="col-12 ">
                <div class="card rounded-4 w-100">
                    <div class="card-body">
                        <div class="mx-3 my-3">
                            <!-- <div class="table-responsive"> -->
                            <table id="packingMemberTable" class="table table-striped table-bordered table-sm nowrap" style="width:100%">
                                <thead>
                                    <th>ID</th>
                                    <th>No.</th>
                                    <th>NIK</th>
                                    <th>Full Name</th>
                                    <th>Telp.</th>
                                    <th>Shift</th>
                                </thead>
                            </table>

                        </div>
                        <!-- </div> -->

                    </div>
                </div>
            </div>
        </div>
    </div><!--end row-->
</div>
</div>
<!--end page wrapper -->

<div class="modal fade" id="packingMemberModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-dark" id="bundle_title">Add New Packing Member</h5>
                <!-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> -->
            </div>
            <form id='frmDataPackingMember' method="POST">
                <div class="modal-body">
                    <div class="mx-3">
                        <div class="form-group row">
                            <div class="col-md-3">
                                <label for="nik" class="col-form-label">NIK</label>
                            </div>
                            <div class="col-md-8">
                                <input type="hidden" class="form-control" id="id_packing_member" name="id_packing_member">
                                <input type="text" class="form-control" id="nik" name="nik" required>
                            </div>
                        </div>
                        </br>
                        <div class="form-group row">
                            <div class="col-md-3">
                                <label for="nama_lengkap" class="col-form-label">Name</label>
                            </div>
                            <div class="col-md-8">
                                <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap" required>
                            </div>
                        </div>
                        </br>
                        <div class="form-group row">
                            <div class="col-md-3">
                                <label for="no_hp" class="col-form-label">Telp.</label>
                            </div>
                            <div class="col-md-8">
                                <input type="text" class="form-control" id="no_hp" name="no_hp" required>
                            </div>
                        </div>
                        </br>
                        <div class="form-group row">
                            <div class="col-md-3">
                                <label for="qty" class="col-form-label">Shift</label>
                            </div>
                            <div class="col-md-8">
                                <select class="form-select mb-3" id="shift" name="shift" aria-label="Default select example">
                                    <option selected>- Select Shift - </option>
                                    <option value="1">Pertama</option>
                                    <option value="2">Kedua</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" id="btnCreateBundle">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>


<script>
    $(document).ready(function() {
        var table;
        var kode;
        var mode;
        var selectedRows = [];

        table = $('#packingMemberTable').DataTable({
            "dom": '<"toolbar">lfrtip',
            "destroy": true,
            "processing": true,
            "order": [],
            "destroy": true,
            "select": {
                "style": "multi"
            },
            "ajax": {
                "type": "GET",
                "url": "<?php echo site_url('packing/ajax_get_packing_members_all'); ?>"
            },
            "columns": [{
                    "data": "id_packing_member"
                },
                {
                    "data": null,
                    "className": "text-center",
                    "orderable": true,
                    "searchable": false,
                    'className': 'text-center px-4',
                    // "width": "100px",
                    "render": function(data, type, row, meta) {
                        return meta.row + meta.settings._iDisplayStart + 1;
                    }
                },
                {
                    "data": "nik",
                    'className': "text-center px-2"
                },
                {
                    "data": "nama_lengkap",
                    'className': "text-center px-2"
                },
                {
                    "data": "no_hp",
                    'className': "text-center px-2"
                },
                {
                    "data": "shift",
                    'className': "text-center px-2"
                },
            ],
            // "lengthMenu": [
            //     [5, 10, 15, 20, 25, 75, 100],
            //     [5, 10, 15, 20, 25, 75, 100]
            // ],

            "columnDefs": [{
                    "targets": [0],
                    "visible": false
                },

            ],
        });


        function checkImgExist(url) {
            var xhr = new XMLHttpRequest();
            xhr.open('HEAD', url, false);
            xhr.send();

            if (xhr.status == "404") {
                return false;
            } else {
                return true;
            }
        }

        $('#btnSave').prop('disabled', true);
        $('#btnCancel').prop('disabled', true);

        var toolbar = "<div class='form-group row mb-3'>" +
            "<div class='btn-group btn-group-sm' role='toolbar'>" +
            "<button type='button' id='btnAddNewPackingMember' class='btn btn-gradient-success px-5 radius-30 mx-1'><i class='fa fa-plus'></i> Add New</button>" +
            "<button type='button' id='btnEditPackingMember' class='btn btn-gradient-warning px-5 radius-30 mx-1'><i class='fa fa-pencil'></i> Edit Data</button>" +
            "<button type='button' id='btnDeletePackingMember' class='btn btn-gradient-danger px-5 radius-30 mx-1'><i class='fa fa-trash'></i> Delete Data</button>" +
            "<button type='button' id='btnPrintBarcodeAllData' class='btn btn-gradient-secondary px-5 radius-30 mx-1'><i class='fa fa-barcode'></i> Print Barcode All</button>" +
            "<button type='button' id='btnPrintBarcodeSelectedData' class='btn btn-gradient-primary px-5 radius-30 mx-1'><i class='fa fa-barcode'></i> Print Barcode Selected Data</button>" +
            "</div>" +
            "</div>";

        $('#packingMemberTable tbody').on('click', 'tr', function() {
            $(this).toggleClass('selected');

            // console.log('selectedRows: ', selectedRows);

            let rowsCount = table.rows('.selected').data().length;
            // console.log('rowsCount: ', rowsCount);
            if (rowsCount == 0) {
                $('#btnEditPackingMember').prop('disabled', true);
                $('#btnDeletePackingMember').prop('disabled', true);
                $('#btnPrintBarcodeSelectedData').prop('disabled', true);
            } else if (rowsCount == 1) {
                $('#btnEditPackingMember').prop('disabled', false);
                $('#btnDeletePackingMember').prop('disabled', false);
                $('#btnPrintBarcodeSelectedData').prop('disabled', false);
            } else if (rowsCount > 1) {
                $('#btnEditPackingMember').prop('disabled', true);
                $('#btnDeletePackingMember').prop('disabled', true);
                $('#btnPrintBarcodeSelectedData').prop('disabled', false);
            }
        })

        $("div.toolbar").html(toolbar);
        $('#btnEditPackingMember').prop('disabled', true);
        $('#btnDeletePackingMember').prop('disabled', true);

        $('#btnPrintBarcodeSelectedData').prop('disabled', true);

        $('#btnEditPackingMember').click(function() {
            mode = "Edit Data"
            let selRow = table.rows({
                selected: true
            }).data();

            let photo = '<?= base_url("img/staf_karyawan"); ?>/' + selRow[0].nik + ".jpg";

            // console.log('selRow: ', selRow);
            $('#id_packing_member').val(selRow[0].id_packing_member);
            $('#nik').val(selRow[0].nik);
            $('#nama_lengkap').val(selRow[0].nama_lengkap);
            $('#no_hp').val(selRow[0].no_hp);
            $('#shift').val(selRow[0].shift);


            $('#packingMemberModal').modal('show');
        });

        $('#btnDeletePackingMember').click(function() {
            // const swalWithBootstrapButtons = swal.mixin({
            //     customClass: {
            //         confirmButton: 'btn btn-success',
            //         cancelButton: 'btn btn-danger'
            //     },
            //     buttonsStyling: false
            // })
            // swalWithBootstrapButtons.fire({

            swal.fire({
                title: 'Warning?',
                text: "Apakah anda yakin menghapus data ini?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes',
                cancelButtonText: 'Cancel',
                reverseButtons: true
            }).then((result) => {
                // console.log('result: ', result);
                if (result.value == true) {
                    let selRow = table.rows({
                        selected: true
                    }).data();
                    let id = selRow[0].id_packing_member;
                    // console.log('id: ', id);
                    $.ajax({
                        url: '<?php echo site_url("packing/delete_packing_member"); ?>/' + id,
                        dataType: 'json'
                    }).done(function(rowAff) {
                        if (rowAff > 0) {
                            table.rows('.selected').remove().draw();
                            swal.fire(
                                'Success!',
                                'Data berhasil dihapus.',
                                'success'
                            );
                            reloadTable();
                        }
                    })
                } else if (
                    /* Read more about handling dismissals below */
                    result.dismiss === swal.DismissReason.cancel
                ) {
                    swal.fire(
                        'Canceled',
                        'Data tidak dihapus.',
                        'error'
                    )
                }
            })
        })

        $("#frmDataPackingMember").validate({
            rules: {
                nik: 'required',
                nama_lengkap: 'required',
                shift: 'required'

            },
            messages: {
                nik: 'NIK harus diisi!',
                nama_lengkap: 'Nama harus diisi!',
                shift: 'SHIFT harus di isi'

            },
            submitHandler: function(form) {
                // console.log(mode);
                let urlString = '';
                if (mode == "Add New") {
                    urlString = '<?php echo site_url("packing/insert_packing_member"); ?>';
                } else {
                    urlString = '<?php echo site_url("packing/edit_packing_member"); ?>'
                }
                $.ajax({
                    type: 'POST',
                    url: urlString,
                    data: $(form).serialize(),
                    dataType: 'json'
                }).done(function(dt) {
                    // console.log('dt: ', dt);
                    if (dt > 0) {

                        swal.fire({
                            icon: 'success',
                            title: 'Success',
                            text: 'Update data member packing berhasil!',
                            showConfirmButton: false,
                            timer: 1500,

                        }).then(function() {
                            if (mode == "Add New") {
                                // table.row.add([

                                clearForm();
                                $('#nik').trigger('focus');
                            } else {

                                $('#packingMemberModal').modal('hide');
                            }
                            reloadTable();
                        });
                    }
                })
            }
        });

        function clearForm() {
            $('#frmDataPackingMember').find('input, textarea').val('').end();
        }

        $('#btnPrintBarcodeSelectedData').click(function() {
            let selRows = table.rows({
                selected: true
            }).data();

            // console.log('selRows: ', selRows);

            let dataId = [];

            $.each(selRows, function(i, item) {
                // dataSelectedRows.push(parseInt(item[0]));
                dataId.push(item.id_packing_member);
            });


            let dataIdStr = dataId.toString();
            dataIdStr = dataIdStr.replace(/,/g, '-');

            // console.log('dataIdStr: ', dataIdStr);

            open('<?php echo site_url("packing/print_selected_packing_member_barcode"); ?>/' + dataIdStr);
        });

        $('#btnAddNewPackingMember').click(function() {
            mode = 'Add New';
            $('#packingMemberModal').modal('show');
        });

        $('#packingMemberModal').on('shown.bs.modal', function(e) {
            if (mode == "Add New") {
                $('#mode').removeClass('badge-danger').addClass('badge-success').text('New Data');
            } else {
                $('#mode').removeClass('badge-success').addClass('badge-danger').text('Edit Data');
            }
            $('#nik').trigger('focus');

        });

        $('#packingMemberModal').on('hidden.bs.modal', function(e) {
            $('#frmDataPackingMember').find('input, textarea').val('').end();
        });

        $('#btnPrintBarcodeAllData').click(function() {
            open('<?php echo site_url("packing/print_all_packing_member_barcode"); ?>');
        })

        function reloadTable() {
            table.ajax.reload(null, false);
        }
    })
</script>