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
                        <li class="breadcrumb-item active" aria-current="page">WIP Packing</li>
                    </ol>
                </nav>
            </div>
        </div>
        <h6 class="mb-0 text-uppercase">WIP Packing Report</h6>
        <hr />
        <div class="row">
            <div class="col-12 ">
                <div class="card rounded-4 w-100">
                    <div class="card-body">
                        <div class="mx-3 my-3">



                            <table id="wipTable" class="table table-bordered table-striped table-sm nowrap" style="width: 100%">
                                <thead>
                                    <tr>
                                        <th class="text-center">No.</th>
                                        <th class="text-center">ORC Number</th>
                                        <th class="text-center">Style</th>
                                        <th class="text-center">Color</th>
                                        <th class="text-center">Qty Order</th>
                                        <th class="text-center">Output Sewing</th>
                                        <th class="text-center">Qty Packed</th>
                                        <th class="text-center">Balance</th>
                                        <th class="text-center">WIP</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th colspan="8" class="text-center">Total</th>
                                        <th class="text-center"></th>
                                    </tr>
                                </tfoot>
                            </table>
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
        var table = $('#wipTable').DataTable({
            dom: 'Bfrtip',
            buttons: [
                'copy', 'csv', 'excel', 'pdf', 'print'
            ],

            "footerCallback": function(row, data, start, end, display) {
                var api = this.api(),
                    data;

                // Remove the formatting to get integer data for summation
                var intVal = function(i) {
                    return typeof i === 'string' ?
                        i.replace(/[\$,]/g, '') * 1 :
                        typeof i === 'number' ?
                        i : 0;
                };

                // Total over all pages
                total = api
                    .column(8)
                    .data()
                    .reduce(function(a, b) {
                        return intVal(a) + intVal(b);
                    }, 0);

                // Total over this page
                pageTotal = api
                    .column(8, {
                        page: 'current'
                    })
                    .data()
                    .reduce(function(a, b) {
                        return intVal(a) + intVal(b);
                    }, 0);

                // Update footer
                $(api.column(8).footer()).html(
                    pageTotal + '( ' + total + ' )'
                );
            },
            ajax: {
                url: "<?= site_url('packing/wip_packing'); ?>",
                type: "POST",

            },
            language: {
                processing: '<i class="fa fa-spinner fa-spin fa-3x fa-fw"></i><br><div><p>Silahkan Menunggu...</p></div> ',
                emptyTable: 'Tidak ada data',
                lengthMenu: '_MENU_',
            },
            columns: [{
                    "data": null,
                    "className": "text-center px-2 align-middle",
                    "orderable": true,
                    "searchable": true,
                    // "width": "100px",
                    "render": function(data, type, row, meta) {
                        return meta.row + meta.settings._iDisplayStart + 1;
                    }
                },
                {
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
                    'data': 'qty_order',
                    'className': 'text-center px-2'
                },
                {
                    'data': 'qty',
                    'className': 'text-center px-2'
                },
                {
                    'data': 'actual_qty',
                    'className': 'text-center px-2'
                },
                {
                    'data': 'wip',
                    'className': 'text-center px-2'
                },
                {
                    'data': 'balance',
                    'className': 'text-center px-2'
                },
            ],

        });
    });
</script>