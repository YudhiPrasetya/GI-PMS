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
            <div class="breadcrumb-title pe-3">ADMIN SEWING</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Sewing</li>
                    </ol>
                </nav>
            </div>
        </div>
        <h6 class="mb-0 text-uppercase">Bundle Record</h6>
        <hr />
        <div class="row">
            <div class="col-12 ">
                <div class="card rounded-4 w-100">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <select id="search_orc" class="form-control select2_1" style="width: 100%;"></select>
                                    </div>
                                    <div class="col-md-4">
                                        <input type="button" name="filter" id="filter_orc" value="Filter" class="btn btn-success">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <table id="bundles" class="table table-bordered table-striped nowrap">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Orc</th>
                                    <th>Style</th>
                                    <th>Color</th>
                                    <th>Size</th>
                                    <th>No Bundle</th>
                                    <th>Date</th>
                                    <th>Time</th>
                                    <th>Qty</th>
                                    <th>Kode Barcode</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div><!--end row-->
        <div class="modal fade" id="editBundleModal" aria-hidden="true">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Edit Bundle</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body" id="editBundleModal_body">
                        <div class="row mx-3">

                            <div class="col-lg-6">
                                <div class="row g-3 align-items-center mb-3">
                                    <div class="col-lg-3">
                                        <label for="orc_edit" class="col-form-label">Orc <sup style="color: red;">*</sup></label>
                                    </div>
                                    <div class="col-lg-7">
                                        <input type="text" id="orc_edit" class="form-control">
                                    </div>
                                </div>
                                <div class="row g-3 align-items-center mb-3">
                                    <div class="col-lg-3">
                                        <label for="style_edit" class="col-form-label">Style <sup style="color: red;">*</sup></label>
                                    </div>
                                    <div class="col-lg-7">
                                        <input type="text" id="style_edit" class="form-control">
                                    </div>
                                </div>
                                <div class="row g-3 align-items-center mb-3">
                                    <div class="col-lg-3">
                                        <label for="color_edit" class="col-form-label">Color</label>
                                    </div>
                                    <div class="col-lg-7">
                                        <input type="text" id="color_edit" class="form-control">
                                    </div>
                                </div>
                                <div class="row g-3 align-items-center mb-3">
                                    <div class="col-lg-3">
                                        <label for="size_edit" class="col-form-label">Size <sup style="color: red;">*</sup></label>
                                    </div>
                                    <div class="col-lg-7">
                                        <input type="text" id="size_edit" class="form-control">
                                    </div>
                                </div>
                                <div class="row g-3 align-items-center mb-3">
                                    <div class="col-lg-3">
                                        <label for="no_bundle_edit" class="col-form-label">No bundle <sup style="color: red;">*</sup></label>
                                    </div>
                                    <div class="col-lg-7">
                                        <input type="text" id="no_bundle_edit" class="form-control">
                                    </div>
                                </div>
                                <div class="row g-3 align-items-center mb-3">
                                    <div class="col-lg-3">
                                        <label for="tgl_ass_edit" class="col-form-label">Date <sup style="color: red;">*</sup></label>
                                    </div>
                                    <div class="col-lg-7">
                                        <input type="date" id="tgl_ass_edit" class="form-control">
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="row g-3 align-items-center mb-3">
                                    <div class="col-lg-3">
                                        <label for="assembly_edit" class="col-form-label">Time <sup style="color: red;">*</sup></label>
                                    </div>
                                    <div class="col-lg-7">
                                        <input type="time" id="assembly_edit" class="form-control">
                                    </div>
                                </div>
                                <div class="row g-3 align-items-center mb-3">
                                    <div class="col-lg-3">
                                        <label for="qty_edit" class="col-form-label">Qty <sup style="color: red;">*</sup></label>
                                    </div>
                                    <div class="col-lg-7">
                                        <input type="text" class="form-control" id="qty_edit">
                                    </div>
                                </div>
                                <div class="row g-3 align-items-center mb-3">
                                    <div class="col-lg-3">
                                        <label for="kode_barcode_edit" class="col-form-label">Kode Barcode <sup style="color: red;">*</sup></label>
                                    </div>
                                    <div class="col-lg-7">
                                        <input type="text" id="kode_barcode_edit" class="form-control">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <!-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> -->
                        <button type="button" id="btn_save_edit_bundle" class="btn btn-primary">Simpan</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--end page wrapper -->
<script>
    $('.select2_1').select2({
        theme: 'bootstrap-5',
        width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style',

    });
</script>
<script>
    $(document).ready(function() {

        const sweet_loader = '<div class="sweet_loader"><svg viewBox="0 0 140 140" width="140" height="140"><g class="outline"><path d="m 70 28 a 1 1 0 0 0 0 84 a 1 1 0 0 0 0 -84" stroke="rgba(0,0,0,0.1)" stroke-width="4" fill="none" stroke-linecap="round" stroke-linejoin="round"></path></g><g class="circle"><path d="m 70 28 a 1 1 0 0 0 0 84 a 1 1 0 0 0 0 -84" stroke="#71BBFF" stroke-width="4" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-dashoffset="200" stroke-dasharray="300"></path></g></svg></div>';

        let bundles = $('#bundles').DataTable({
            autoWidth: true,
            info: true,
            searching: true,
            paging: true,
            scrollX: true,
            destroy: true,
        })
        const loadOrc = () => {
            $('#search_orc').empty();
            $.ajax({
                url: " <?php echo site_url('adm/getOrcSummary'); ?>",
                type: 'get',
                dataType: 'json',
                beforeSend: function() {
                    $("#search_orc").prepend($('<option></option>').html('Loading...'));
                },
            }).done(function(data) {
                $('#search_orc').empty();
                $('#search_orc').append($('<option>', {
                    value: "",
                    text: "- Select ORC Number -"
                }));
                $.each(data, function(i, item) {
                    $('#search_orc').append($('<option>', {
                        value: item.orc,
                        text: item.orc
                    }));
                });
            });
        }
        loadOrc();

        $('#filter_orc').click(function() {

            let orc = $('#search_orc').val();
            bundles = $('#bundles').DataTable({
                processing: true,
                destroy: true,
                info: true,
                scrollX: true,
                searching: true,
                paging: true,
                fixedHeader: true,

                ajax: {
                    url: '<?= site_url('adm/dataBundle'); ?>',
                    type: 'GET',
                    data: {
                        'orc': orc
                    },
                },
                language: {
                    processing: '<i class="fa fa-spinner fa-spin fa-3x fa-fw"></i><br><div><p>Silahkan Menunggu...</p></div> ',
                    emptyTable: 'Tidak ada data',
                    lengthMenu: '_MENU_',
                },
                columns: [{
                        'data': 'id_output_sewing_detail'
                    },
                    {
                        'data': 'orc'
                    },
                    {
                        'data': 'style'
                    },
                    {
                        'data': 'color'
                    },
                    {
                        'data': 'size'
                    },
                    {
                        'data': 'no_bundle'
                    },
                    {
                        'data': 'tgl_ass'
                    },
                    {
                        'data': 'assembly'
                    },
                    {
                        'data': 'qty'
                    },
                    {
                        'data': 'kode_barcode'
                    },

                    {
                        'className': 'text-center align-middle',
                        render: function(data, type, row) {
                            return "<button type='button' class='btn btn-danger btn-sm btn_delete' id='btn_delete'>delete</button>&nbsp<button type='button' class='btn btn-warning btn-sm btn_edit' id='btn_edit'>Edit</button>"
                        }
                    }

                ],
                lengthMenu: [
                    [10, 25, 50, 100, -1],
                    [10, 25, 50, 100, 'All'],
                ],
            });

        });

        // Button edit (Modal)
        let id_output_sewing_detail;
        $('#bundles tbody').on('click', '#btn_edit', function() {
            id_output_sewing_detail = bundles.row($(this).parents('tr')).data().id_output_sewing_detail;
            let orc = bundles.row($(this).parents('tr')).data().orc;
            let style = bundles.row($(this).parents('tr')).data().style;
            let color = bundles.row($(this).parents('tr')).data().color;
            let size = bundles.row($(this).parents('tr')).data().size;
            let no_bundle = bundles.row($(this).parents('tr')).data().no_bundle;
            let tgl_ass = bundles.row($(this).parents('tr')).data().tgl_ass;
            let assembly = bundles.row($(this).parents('tr')).data().assembly;
            let qty = bundles.row($(this).parents('tr')).data().qty;
            let kode_barcode = bundles.row($(this).parents('tr')).data().kode_barcode;


            $("#orc_edit").val(orc);
            $("#style_edit").val(style);
            $("#color_edit").val(color);
            $("#size_edit").val(size);
            $("#no_bundle_edit").val(no_bundle);
            $("#tgl_ass_edit").val(tgl_ass);
            $("#assembly_edit").val(assembly);
            $("#qty_edit").val(qty)
            $("#kode_barcode_edit").val(kode_barcode).change();


            $("#editBundleModal").modal("show");


        });


        // Button edit (Modal)
        $('#btn_save_edit_bundle').click(function() {

            let orc = $('#orc_edit').val();
            let style = $('#style_edit').val();
            let color = $('#color_edit').val();
            let size = $('#size_edit').val();
            let no_bundle = $('#no_bundle_edit').val();
            let tgl_ass = $('#tgl_ass_edit').val();
            let assembly = $('#assembly_edit').val();
            let qty = $('#qty_edit').val();
            let kode_barcode = $('#kode_barcode_edit').val();


            if (orc != '' && size != '' && color != '' && style != '' && no_bundle != '' && tgl_ass != '' && assembly != '' && qty != '' && kode_barcode != '') {
                swal.fire({
                    icon: 'warning',
                    title: 'Warning!',
                    html: "Apakah anda yakin akan mengedit data ini ?",
                    showCancelButton: true,
                    // confirmButtonColor: '#3085d6',
                    // cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes',
                    cancelButtonText: 'No',
                }).then(function(result) {
                    if (result.value) {

                        $.ajax({
                            type: "POST",
                            url: "<?= site_url('adm/updateBundle') ?>",
                            dataType: "JSON",
                            data: {
                                'id_output_sewing_detail': id_output_sewing_detail,
                                'orc': orc,
                                'style': style,
                                'color': color,
                                'size': size,
                                'no_bundle': no_bundle,
                                'tgl_ass': tgl_ass,
                                'assembly': assembly,
                                'qty': qty,
                                'kode_barcode': kode_barcode,
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
                                bundles.ajax.reload(null, false);

                                swal.fire({
                                    icon: 'success',
                                    title: 'Success!',
                                    text: 'Data berhasil disimpan.',
                                    timer: 1000,
                                    showCancelButton: false,
                                    showConfirmButton: false
                                }).then(function() {

                                    $("#editBundleModal").modal("hide");
                                });
                            }
                        });
                    }

                });


            } else {
                swal.fire({
                    icon: 'warning',
                    title: 'Warning!',
                    text: 'Ada form yang belum diisi.',
                    // timer: 1000,
                    showCancelButton: false,
                    showConfirmButton: true
                });
            }


        });

        // Button delete
        $('#bundles tbody').on('click', '#btn_delete', function() {
            let id_output_sewing_detail = bundles.row($(this).parents('tr')).data().id_output_sewing_detail;

            swal.fire({
                icon: 'warning',
                title: 'Warning!',
                html: "Apakah anda yakin akan menghapus data ini ?",
                showCancelButton: true,
                // confirmButtonColor: '#3085d6',
                // cancelButtonColor: '#d33',
                confirmButtonText: 'Ya',
                cancelButtonText: 'Batal',
            }).then(function(result) {
                if (result.value) {

                    $.ajax({
                        type: "POST",
                        url: "<?= site_url('adm/deleteBundle') ?>",
                        dataType: "JSON",
                        data: {
                            'id_output_sewing_detail': id_output_sewing_detail
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
                            bundles.ajax.reload(null, false);
                            swal.fire({
                                icon: 'success',
                                title: 'Success!',
                                text: 'Data berhasil dihapus.',
                                timer: 1000,
                                showCancelButton: false,
                                showConfirmButton: false
                            }).then(function() {});
                        }
                    });


                }


            });
        });

    })
</script>