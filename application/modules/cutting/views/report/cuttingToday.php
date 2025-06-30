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
                        <li class="breadcrumb-item active" aria-current="page">Cutting Today</li>
                    </ol>
                </nav>
            </div>
        </div>
        <h6 class="mb-0 text-uppercase">Cutting Today</h6>
        <hr />
        <div class="row">
            <div class="col-lg-6">
                <div class="card rounded-4 w-100">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="ms-auto">
                                    <div class="row">
                                        <div class="col-lg-12 text-center mt-3 mb-4">
                                            <h6 class="mb-0 text-uppercase">OUTPUT CUTTING</h6>
                                        </div>

                                    </div>
                                </div>
                                <!-- <hr /> -->

                                <!-- <div class="table-responsive"> -->
                                <table id="inputTable" class="table table-striped table-bordered table-sm nowrap" style="width:100%">
                                    <thead>
                                        <th>Tanggal</th>
                                        <th>Orc</th>
                                        <th>Style</th>
                                        <th>Color</th>
                                        <th>Qty</th>
                                    </thead>

                                </table>
                                <!-- </div> -->

                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="card rounded-4 w-100">
                    <div class="card-body">
                        <div class="row">

                            <div class="col-lg-12">
                                <div class="ms-auto">
                                    <div class="row">
                                        <div class="col-lg-12 text-center mt-3 mb-4">
                                            <h6 class="mb-0 text-uppercase">OUTPUT TRIMSTORE</h6>
                                        </div>

                                    </div>
                                </div>
                                <!-- <hr /> -->

                                <!-- <div class="table-responsive"> -->
                                <table id="outputTable" class="table table-striped table-bordered table-sm nowrap" style="width:100%">
                                    <thead>
                                        <th>Date</th>
                                        <th>ORC</th>
                                        <th>Style</th>
                                        <th>Color</th>
                                        <th>Qty</th>
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

        const getDateNowSystem = new Date().toISOString().slice(0, 10); // convert to format -> '2020-04-24'
        const tglNow = getDateNowSystem;
        var tables;
        var table2;


        getDataInput();

        function getDataInput() {
            tables = $('#inputTable').DataTable({
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
                    url: '<?= site_url('cutting/inputCuttingData'); ?>',
                    type: 'GET',
                    data: {
                        'tgl': tglNow
                    },
                },
                language: {
                    processing: '<i class="fa fa-spinner fa-spin fa-3x fa-fw"></i><br><div><p>Silahkan Menunggu...</p></div> ',
                    emptyTable: 'Tidak ada data',
                    lengthMenu: '_MENU_',
                },
                columns: [{
                        'data': 'tgl',
                        'className': 'text-center px-3'
                    },
                    {
                        'data': 'orc',
                        'className': 'text-center px-3'
                    },
                    {
                        'data': 'style',
                        'className': 'text-center px-3'
                    },
                    {
                        'data': 'color',
                        'className': 'text-center px-3'
                    },
                    {
                        'data': 'qt_cut',
                        'className': 'text-center px-3'
                    },
                ],
            });
        }

        getDataOutput();

        function getDataOutput() {
            table2 = $('#outputTable').DataTable({
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
                    url: '<?= site_url('cutting/outputCuttingData'); ?>',
                    type: 'GET',
                    data: {
                        'tgl': tglNow
                    },
                },
                language: {
                    processing: '<i class="fa fa-spinner fa-spin fa-3x fa-fw"></i><br><div><p>Silahkan Menunggu...</p></div> ',
                    emptyTable: 'Tidak ada data',
                    lengthMenu: '_MENU_',
                },
                columns: [{
                        'data': 'tgl',
                        'className': 'text-center px-3'
                    },
                    {
                        'data': 'orc',
                        'className': 'text-center px-3'
                    },
                    {
                        'data': 'style',
                        'className': 'text-center px-3'
                    },
                    {
                        'data': 'color',
                        'className': 'text-center px-3'
                    },
                    {
                        'data': 'qty_out',
                        'className': 'text-center px-3'
                    },
                ],
            });
        }


    })
</script>