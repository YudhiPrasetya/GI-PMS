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
                        <li class="breadcrumb-item active" aria-current="page">Master Kegel</li>
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
                                <div class="col-lg-3">
                                    <label for="validationCustom01" class="form-label"> <strong>Kegel Type</strong></label>
                                    <select class="select2" id="id_kegel_type"></select>
                                </div>
                                <div class="col-lg-3">
                                    <label for="validationCustom01" class="form-label"><strong>Diameter</strong></label>
                                    <input type="text" class="form-control" id="diameter" placeholder="Diameter" required>
                                </div>
                                <div class="col-lg-4">
                                    <label for="validationCustom01" class="form-label"><strong>Shape</strong></label>
                                    <select class="form-select shape" id="shape" aria-label="Default select example">
                                        <option selected>-Select Shape-</option>
                                        <option value="Miring">Miring</option>
                                        <option value="Bulat, Langsing, Kecil, Tumpul">Bulat, Langsing, Kecil, Tumpul</option>
                                        <option value="Bulat, Langsing, Kecil, Lancip">Bulat, Langsing, Kecil, Lancip</option>
                                        <option value="Bulat, Besar, Tumpul">Bulat, Besar, Tumpul</option>
                                        <option value="Bulat, Lancip">Bulat, Lancip</option>
                                    </select>
                                </div>
                                <div class="col-lg-2">
                                    <button class="btn btn-primary" style="margin-top: 29px;" id="AddAllocation">Add</button>
                                </div>
                            </div>
                            </br>

                        </div>

                        <table id="tableMasterKegel" class="table table-bordered table-striped table-sm nowrap" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Kegel Type</th>
                                    <th>Diameter</th>
                                    <th>Shape</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                            <tfoot>
                            </tfoot>
                        </table>
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

    });
</script>

<script>
    $(document).ready(function() {

        var tableMasterKegel = $('#tableMasterKegel').DataTable({
            // dom: '<"toolbar">lfrtip',
            autoWidth: true,
            scrollX: true,
            processing: true,
            destroy: true,
            info: true,
            searching: true,
            paging: true,
            // fixedHeader: true,

            ajax: {
                url: '<?= site_url('molding/ajax_molding_kegel'); ?>',
                type: 'GET',

            },

            columns: [{
                    "data": null,
                    "className": "text-center",
                    "orderable": true,
                    "searchable": false,
                    // "width": "100px",
                    "render": function(data, type, row, meta) {
                        return meta.row + meta.settings._iDisplayStart + 1;
                    }
                },
                {
                    "data": "kegel_type",
                    'className': "text-center px-2 align-middle"
                },
                {
                    "data": "diameter",
                    'className': "text-center px-2 align-middle"
                },
                {
                    "data": "shape",
                    'className': "text-center px-2 align-middle"
                },


            ],
            lengthMenu: [
                [10, 25, 50, 100, -1],
                [10, 25, 50, 100, 'All'],
            ],
        });

        const sweet_loader = '<div class="sweet_loader"><svg viewBox="0 0 140 140" width="140" height="140"><g class="outline"><path d="m 70 28 a 1 1 0 0 0 0 84 a 1 1 0 0 0 0 -84" stroke="rgba(0,0,0,0.1)" stroke-width="4" fill="none" stroke-linecap="round" stroke-linejoin="round"></path></g><g class="circle"><path d="m 70 28 a 1 1 0 0 0 0 84 a 1 1 0 0 0 0 -84" stroke="#71BBFF" stroke-width="4" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-dashoffset="200" stroke-dasharray="300"></path></g></svg></div>';

        const loadType = () => {
            $('#id_kegel_type').empty();
            $.ajax({
                url: " <?php echo site_url('molding/getMasterKegel'); ?>",
                type: 'get',
                dataType: 'json',
                beforeSend: function() {
                    $("#id_kegel_type").prepend($('<option></option>').html('Loading...'));
                },
            }).done(function(data) {
                $('#id_kegel_type').empty();
                $('#id_kegel_type').append($('<option>', {
                    value: "",
                    text: "- Select Kegel Type -"
                }));
                $.each(data, function(i, item) {
                    $('#id_kegel_type').append($('<option>', {
                        value: item.id_kegel_type,
                        text: item.kegel_type
                    }));
                });
            });
        }

        loadType();


        // Button save Add Allocation
        $('#AddAllocation').click(function() {
            let id_kegel_type = $('#id_kegel_type').val();
            let diameter = $('#diameter').val();
            let shape = $('#shape').val();


            if (id_kegel_type != '' && diameter != '' && shape != '') {
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
                            url: "<?= site_url('molding/addMasterKegel') ?>",
                            dataType: "JSON",
                            data: {
                                'id_kegel_type': id_kegel_type,
                                'diameter': diameter,
                                'shape': shape,

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
                                        window.location.href = "masterKegel";

                                    })
                            }
                        });
                    }

                });

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