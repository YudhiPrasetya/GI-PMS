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
                                    <h6 class="mb-0 text-uppercase">Finish Good Show OUT</h6>
                                </div>

                            </div>
                        </div>
                        <hr />
                        <div class="card">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="tableFGAllOut" class="table table-striped table-bordered" style="width:100%">
                                        <thead>
                                            <th>ID</th>
                                            <th>Lokasi</th>
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

        var tableFGAllOut = $('#tableFGAllOut').DataTable({

            autoWidth: false,
            processing: true,
            destroy: true,
            info: true,
            searching: true,
            paging: true,
            fixedHeader: true,

            ajax: {
                url: '<?= site_url('packing/dashboard/outFilterByLine'); ?>',
                type: 'POST',

            },
            language: {
                processing: '<i class="fa fa-spinner fa-spin fa-3x fa-fw"></i><br><div><p>Silahkan Menunggu...</p></div> ',
                emptyTable: 'Tidak ada data',
                lengthMenu: '_MENU_',
            },
            columns: [{
                    'data': 'id_transfer_area',
                    'className': "text-center"
                },
                {
                    'data': 'lokasi',
                    'className': "text-center"
                },
                {
                    'data': 'tgl_out',
                    'className': "text-center"
                },
                {
                    'data': 'po',
                    'className': "text-center"
                },
                {
                    'data': 'orc',
                    'className': "text-center"
                },
                {
                    'data': 'style',
                    'className': "text-center"
                },
                {
                    'data': 'color',
                    'className': "text-center"
                },
                {
                    'data': 'size',
                    'className': "text-center"
                },
                {
                    'data': 'jmlBox',
                    'className': "text-center"
                },
                {
                    'data': 'jmlPcs',
                    'className': "text-center"
                },
                {
                    'data': 'status',
                    'className': "text-center"
                },
                {
                    'className': 'text-center px-3 text-nowrap',
                    render: function(data, type, row) {
                        return "<button class='btn btn-gradient-info px-3' type='button' id='btn-detail' >Detail</button>"
                    },
                }


            ],
            lengthMenu: [
                [10, 25, 50, 100, -1],
                [10, 25, 50, 100, 'All'],
            ],
        });
        var lokasi;
        $("#tableFGAllOut tbody").on("click", "#btn-detail", function() {
            lokasi = tableFGAllOut.row($(this).parents('tr')).data().lokasi;
            console.log(lokasi);
            window.open("<?php echo site_url('packing/ajax_show_detail_fg_by_lokasi_out'); ?>/" + lokasi, "_self");

        });





    })
</script>