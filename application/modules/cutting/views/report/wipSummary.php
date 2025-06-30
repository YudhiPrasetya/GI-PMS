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
                        <li class="breadcrumb-item active" aria-current="page">Stock Trimstore</li>
                    </ol>
                </nav>
            </div>
        </div>
        <h6 class="mb-0 text-uppercase">WIP Cutting</h6>
        <hr />
        <div class="row">
            <div class="col-12 ">
                <div class="card rounded-4 w-100">
                    <div class="card-body">
                        <div class="mx-3 my-3">
                            <!-- <div class="table-responsive"> -->
                            <table id="wipTable" class="table table-striped table-bordered" style="width:100%">
                                <thead>
                                    <th class="text-center">ORC</th>
                                    <th class="text-center">Style</th>
                                    <th class="text-center">Color</th>
                                    <th class="text-center">Input</th>
                                    <th class="text-center">Output</th>
                                    <th class="text-center">Stock</th>
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

        var wipTable = $('#wipTable').DataTable({

            // autoWidth: false,
            processing: true,
            destroy: true,
            info: true,
            searching: true,
            paging: true,
            fixedHeader: true,

            ajax: {
                url: '<?= site_url('cutting/wip'); ?>',
                type: 'POST',

            },
            language: {
                processing: '<i class="fa fa-spinner fa-spin fa-3x fa-fw"></i><br><div><p>Silahkan Menunggu...</p></div> ',
                emptyTable: 'Tidak ada data',
                lengthMenu: '_MENU_',
            },
            columns: [{
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
                    'data': 'in_cutting',
                    'className': "text-center"
                },
                {
                    'data': 'in_sewing',
                    'className': "text-center"
                },

                {
                    'data': 'wip',
                    'className': "text-center"
                },


            ],
            lengthMenu: [
                [10, 25, 50, 100, -1],
                [10, 25, 50, 100, 'All'],
            ],
        });







    })
</script>