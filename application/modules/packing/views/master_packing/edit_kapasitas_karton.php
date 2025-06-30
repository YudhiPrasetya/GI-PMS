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
            <div class="breadcrumb-title pe-3">Packing</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Solid Packing Box Capacity</li>
                        <li class="breadcrumb-item active" aria-current="page">Edit Box Capacity</li>
                    </ol>
                </nav>
            </div>
        </div>

        <div class="row">
            <div class="col-6">
                <h6 class="mb-0 text-uppercase">Edit Box Capacity</h6>
                <hr />
                <div class="card rounded-4 w-100">
                    <div class="card-body">
                        <div class="mx-3 my-3">

                            <table id="editPackingDetailTable" class="table table-striped table-bordered nowrap" style="width:100%">
                                <thead>
                                    <th>ID</th>
                                    <th>Style</th>
                                    <th>Size</th>
                                    <th>Capacity (pcs @box)</th>
                                    <th>Action</th>
                                </thead>
                            </table>

                            <a href="../packing/capacity_box" class="btn btn-outline-secondary mt-5">Back</a>

                        </div>
                    </div>
                </div>
            </div>

            <div class="col-6">
                <h6 class="mb-0 text-uppercase">Selected Data</h6>
                <hr />
                <div class="card rounded-4 w-100">
                    <div class="card-body">
                        <div class="mx-3 my-3">

                            <input type="hidden" id="id_packing_karton">

                            <div class="mb-3">
                                <label for="style_edit" class="form-label">Style</label>
                                <input type="text" class="form-control" id="style_edit" disabled>
                            </div>
                            <div class="mb-3">
                                <label for="size_edit" class="form-label">Size</label>
                                <input type="text" class="form-control" id="size_edit">
                            </div>
                            <div class="mb-3">
                                <label for="box_capacity_edit" class="form-label">Box Capacity</label>
                                <input type="number" class="form-control" id="box_capacity_edit">
                            </div>


                            <button id='btnUpdate' class="btn btn-outline-info shadow">Update</button>

                        </div>

                    </div>
                </div>
            </div>















        </div><!--end row-->

    </div>
</div>
<!--end page wrapper -->

<script>
    $(document).ready(function() {
        var dataSelectedRow;
        // var kapasitas_box = JSON.parse(localStorage.getItem('kapasitas_box'));
        let styleVal = '<?= $style; ?>';

        var tablePackingSize = $('#editPackingDetailTable').DataTable({
            // "dom": "lrtip",
            lengthMenu: [
                [5, 10, 25, 50, 100],
                [5, 10, 25, 50, 100]
            ],
            columnDefs: [{
                "targets": [0],
                "visible": false
            }],
            select: {
                "style": "single"
            },
            ajax: {
                url: '<?= site_url('packing/ajax_get_by_style'); ?>',
                type: 'GET',
                data: {
                    'styleVal': styleVal
                },

            },
            columns: [{
                    'data': 'id_packing_karton',
                    'className': "text-center"
                },
                {
                    'data': 'style',
                    'className': "text-center"
                },
                {
                    'data': 'size',
                    'className': "text-center"
                },
                {
                    'data': 'kapasitas_karton',
                    'className': "text-center"
                },
                {
                    'className': 'text-center px-2',
                    render: function(data, type, row, meta) {
                        return "<span id='btn_delete' class='badge bg-danger' style='cursor: pointer;'>Delete</span>"
                    }
                },
            ],

        });

        $('#btnUpdate').prop('disabled', true);

        // $.each(kapasitas_box, function(i, itm) {
        //     tablePackingSize.row.add([
        //         itm.id_packing_karton, itm.style, itm.size, itm.kapasitas_karton, "<span id='btn_delete' class='badge bg-danger' style='cursor: pointer;'>Delete</span>"
        //     ]).draw();
        // })

        $('#editPackingDetailTable tbody').on('click', 'tr', function() {
            dataSelectedRow = tablePackingSize.row(this).data();

            $('#id_packing_karton').val(dataSelectedRow.id_packing_karton);
            $('#style_edit').val(dataSelectedRow.style);
            $('#size_edit').val(dataSelectedRow.size);
            $('#box_capacity_edit').val(dataSelectedRow.kapasitas_karton);

            $('#btnUpdate').prop('disabled', false);
        });

        $('#editPackingDetailTable tbody').on('click', '#btn_delete', function() {
            let id_packing_karton = tablePackingSize.row($(this).parents('tr')).data().id_packing_karton;

            swal.fire({
                icon: 'warning',
                title: 'Warning!',
                text: "Are you sure you will delete this data?",
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya',
                cancelButtonText: 'Batal',
            }).then(function(result) {
                if (result.value) {
                    $.ajax({
                        url: "<?= site_url('packing/deleteKapasitasKarton'); ?>",
                        type: 'POST',
                        data: {
                            'id_packing_karton': id_packing_karton
                        },
                        success: function(data) {
                            swal.fire(
                                'Success!',
                                'Data successfully deleted.',
                                'success'
                            ).then(function() {
                                tablePackingSize.ajax.reload(null, false)

                                $('#style_edit').val("");
                                $('#size_edit').val("");
                                $('#box_capacity_edit').val("");

                                $('#btnUpdate').prop('disabled', false);


                            })
                        }
                    });
                }
            });
        });

        function addBoxCapacity(style) {
            $('#style').val(style);
            mode = "Add Style Size"

            $('#modal_add_kapasitas_box').modal('show');

        }

        $('#btnUpdate').click(function() {
            let dataKapasitasKarton = {
                'id_packing_karton': $('#id_packing_karton').val(),
                'style': $('#style_edit').val(),
                'size': $('#size_edit').val(),
                'kapasitas_karton': $('#box_capacity_edit').val()
            };

            $.ajax({
                type: 'POST',
                url: '<?php echo site_url("packing/ajax_update_kapasitas_karton"); ?>',
                data: {
                    'dataKapasitasKarton': dataKapasitasKarton
                },
                dataType: 'json'
            }).done(function(affectedRow) {
                if (affectedRow > 0) {
                    // updateTable();
                    swal.fire({
                        icon: 'success',
                        title: 'Success',
                        html: 'Data kapasitas karton berhasil diupdate.',
                        showConfirmButton: false,
                        timer: 1500
                    }).then(function() {
                        tablePackingSize.ajax.reload(null, false)
                        // tablePackingSize.rows({
                        //     selected: true
                        // }).every(function(rowIdx, tableLoop, rowLoop) {
                        //     tablePackingSize.cell(rowIdx, 2).data($('#size_edit').val());
                        //     tablePackingSize.cell(rowIdx, 3).data($('#box_capacity_edit').val());
                        // }).draw();
                    })
                }
            })
        });

        function clearText() {
            $('#cardEdit').find('input').val('').end();
        }

        // $('#btnBack').click(function() {
        //     localStorage.removeItem('kapasitas_box');
        //     open('<?php echo site_url('Packing/box_capacity'); ?>', '_self');
        // });



    })
</script>