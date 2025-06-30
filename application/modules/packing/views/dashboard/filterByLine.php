<!--start page wrapper -->
<div class="page-wrapper">
    <div class="page-content">
        <div class="row">
            <div class="col-12 ">
                <div class="card rounded-4 w-100">
                    <div class="card-body">

                        <div class="ms-auto">
                            <div class="row">
                                <div class="col-md-6">
                                    <h6 class="mb-0 text-uppercase">Finish Good Show ALL</h6>
                                </div>

                            </div>
                        </div>
                        <hr />
                        <div class="card">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="tableFGAll" class="table table-striped table-bordered" style="width:100%">
                                        <thead>
                                            <th>ID</th>
                                            <th>Lokasi</th>
                                            <th>TGL IN</th>
                                            <th>TGL OUT</th>
                                            <th>PO</th>
                                            <th>ORC</th>
                                            <th>Style</th>
                                            <th>Color</th>
                                            <th>Size</th>
                                            <th>Jml Karton</th>
                                            <th>Jml Qty</th>
                                            <th>Status</th>
                                            <th></th>
                                        </thead>

                                    </table>
                                </div>
                            </div>
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
        var tableFGAll = $('#tableFGAll').DataTable({
            dom: 'lBfrtip',
            lengthMenu: [
                [5, 10, 25, 50, 75, 100, -1],
                [5, 10, 25, 50, 75, 100, "all"]
            ],
            buttons: [
                'excel', 'print',
                {
                    text: 'Kembali',
                    action: function() {
                        open('<?= site_url("DashboardPacking"); ?>', '_self');
                    }
                }
            ],
            ajax: {
                type: 'GET',
                url: '<?= site_url("packing/ajax_get_all_filter_by_line"); ?>',
                dataType: 'json'
            },
            columns: [{
                    'data': 'id_transfer_area'
                },
                {
                    'data': 'lokasi'
                },
                {
                    'data': 'tgl_in'
                },
                {
                    'data': 'tgl_out'
                },
                {
                    'data': 'po'
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
                    'data': 'jmlBox'
                },
                {
                    'data': 'jmlPcs'
                },
                {
                    'data': 'status'
                },
                {
                    'data': null
                },
            ],
            columnDefs: [{
                targets: [0],
                visible: false
            }, {
                targets: [12],
                render: function(data, type, row, meta) {
                    return '<button class="btn btn-gradient-info px-3 btnDetail">Detail</button>';
                }
            }],
            select: {
                style: 'single'
            }
        });

        $('#tableFGAll tbody').on('click', 'button.btnDetail', function() {
            let selectedRow = tableFGAll.row($(this).parents('tr')).data();
            console.log('selectedRow: ', selectedRow.lokasi);
            open(`<?= site_url("packing/ajax_show_detail_fg_by_lokasi"); ?>/${selectedRow.lokasi}`, '_self');

        })


    })
</script>