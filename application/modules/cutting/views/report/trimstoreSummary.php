<!--start page wrapper -->
<div class="page-wrapper">
    <div class="page-content">
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Cutting</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Summary Trimstore</li>
                    </ol>
                </nav>
            </div>
        </div>
        <h6 class="mb-0 text-uppercase">WIP Summary</h6>
        <hr />
        <div class="row">
            <div class="col-12">
                <div class="card rounded-4 w-100">
                    <div class="card-body">
                        <div class="mx-3 my-3">


                            <!-- <div class="table-responsive"> -->
                            <table id="bundleTable" class="table table-striped table-bordered table-sm nowrap" style="width:100%">
                                <thead>
                                    <th>Orc</th>
                                    <th>Style</th>
                                    <th>Color</th>
                                    <th>Buyer</th>
                                    <th>PO</th>
                                    <th>DDD</th>
                                    <th>Order</th>
                                    <th>Cutting Out</th>
                                    <th>Trimstore Out</th>
                                    <th>Bal To Cut</th>
                                    <th>Bal Trimstore</th>
                                    <th>Stok</th>
                                    <th>Sewing Out</th>
                                    <th>WIP Sewing</th>
                                    <th>Bal Sewing</th>
                                </thead>

                            </table>
                            <!-- </div> -->

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

        getDataReport();
        var tables;

        function getDataReport() {
            tables = $('#bundleTable').DataTable({
                // autoWidth: false,
                processing: true,
                destroy: true,
                info: true,
                searching: true,
                scrollX: true,
                // stateSave: true,
                paging: true,
                fixedHeader: true,

                ajax: {
                    url: '<?= site_url('cutting/trimstore'); ?>',
                    type: 'GET',

                },
                language: {
                    processing: '<i class="fa fa-spinner fa-spin fa-3x fa-fw"></i><br><div><p>Silahkan Menunggu...</p></div> ',
                    emptyTable: 'Tidak ada data',
                    lengthMenu: '_MENU_',
                },
                columns: [{
                        'data': 'orc',
                        'className': 'text-center px-2'

                    },
                    {
                        'data': 'style',
                        'className': 'text-center px-2'
                    },
                    {
                        'data': 'color',
                        'className': 'text-center px-2'
                    },
                    {
                        'data': 'buyer',
                        'className': 'text-center px-2'
                    },
                    {
                        'data': 'po',
                        'className': 'text-center px-2'
                    },
                    {
                        'data': 'etd',
                        'className': 'text-center px-2'
                    },
                    {
                        'data': 'qty_order',
                        'className': 'text-center px-2'
                    },
                    {
                        'data': 'cutting',
                        'className': 'text-center px-2'
                    },
                    {
                        'data': 'out_trim',
                        'className': 'text-center px-2'
                    },
                    {
                        'data': 'bal_to_cut',
                        'className': 'text-center px-2'
                    },
                    {
                        'data': 'bal_cut',
                        'className': 'text-center px-2'
                    },
                    {
                        'data': 'stok_trim',
                        'className': 'text-center px-2'
                    },
                    {
                        'data': 'qty_sewing',
                        'className': 'text-center px-2'
                    },
                    {
                        'data': 'wip_sewing',
                        'className': 'text-center px-2'
                    },
                    {
                        'data': 'bal_sewing',
                        'className': 'text-center px-2'
                    },

                ],
            });
        }


    })
</script>