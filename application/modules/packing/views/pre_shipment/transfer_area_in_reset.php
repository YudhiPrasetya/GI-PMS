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
                        <li class="breadcrumb-item active" aria-current="page">Finish Good (in)</li>
                        <li class="breadcrumb-item active" aria-current="page">Summary Transfer Area (In)</li>
                    </ol>
                </nav>
            </div>
        </div>
        <h6 class="mb-0 text-uppercase">Summary Transfer Area (In)</h6>
        <hr />
        <div class="row">
            <div class="col-12 ">
                <div class="card rounded-4 w-100">
                    <div class="card-body">
                        <div class="mx-3 my-3">

                            <input type="hidden" id="orc" value="<?= $orc; ?>">


                            <!-- <div class="table-responsive"> -->
                            <table id="tableTransferAreaSummaryIn" class="table table-striped table-bordered table-sm nowrap" style="width:100%">
                                <thead>
                                    <th>No.</th>
                                    <th>Date Created</th>
                                    <th>PO</th>
                                    <th>ORC</th>
                                    <th>Style</th>
                                    <th>Color</th>
                                    <th>Size</th>
                                    <th>Total Box</th>
                                    <th>Total Qty</th>
                                </thead>
                                <tfoot>
                                    <th colspan="7">Total</th>
                                    <th></th>
                                    <th></th>
                                </tfoot>
                            </table>

                            <a href="../transfer_area_in" class="btn btn-outline-secondary">Back</a>

                            <!-- </div> -->
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
        // var tableTransferAreaSummaryIn = $('#tableTransferAreaSummaryIn').DataTable({
        //     dom: 'Bflrtip',
        //     buttons: [
        //         'excel', 'print',
        //         // {
        //         //     text: 'Kembali',
        //         //     action: function() {
        //         //         open('</?= site_url("TransferArea/transferAreaInput"); ?>', '_self');
        //         //     }
        //         // }
        //     ],
        //     columnDefs: [{
        //         targets: [0],
        //         visible: false
        //     }],
        //     select: {
        //         style: 'single'
        //     }
        // });

        let orc = $('#orc').val();


        let tableTransferAreaSummaryIn = $('#tableTransferAreaSummaryIn').DataTable({
            // lengthChange: false,
            // buttons: ['copy', 'excel', 'pdf', 'print'],
            dom: 'Bflrtip',
            buttons: [
                'excel', 'print'
            ],
            scrollX: true,
            destroy: true,
            ajax: {
                url: '<?= site_url("packing/getSummaryByOrcReset"); ?>',
                type: 'GET',
                dataType: 'JSON',
                data: {
                    "orc": orc

                }
            },
            columns: [{
                    "data": null,
                    "className": "text-center",
                    "orderable": true,
                    "searchable": true,
                    'className': 'text-center px-4',
                    // "width": "100px",
                    "render": function(data, type, row, meta) {
                        return meta.row + meta.settings._iDisplayStart + 1;
                    }
                },
                {
                    'data': 'tgl_in',
                    'className': 'text-center px-2'
                },
                {
                    'data': 'po',
                    'className': 'text-center px-2'
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
                    'data': 'size',
                    'className': 'text-center px-2'
                },
                {
                    'data': 'jmlBox',
                    'className': 'text-center px-2'
                },
                {
                    'data': 'jmlQty',
                    'className': 'text-center px-2'
                },

            ],

            footerCallback: function(row, data, start, end, display) {
                let api = this.api();

                // Remove the formatting to get integer data for summation
                let intVal = function(i) {
                    return typeof i === 'string' ?
                        i.replace(/[\$,]/g, '') * 1 :
                        typeof i === 'number' ?
                        i :
                        0;
                };

                // Total over all pages
                total = api
                    .column(7)
                    .data()
                    .reduce((a, b) => intVal(a) + intVal(b), 0);

                // Total over this page
                pageTotal = api
                    .column(7, {
                        page: 'current'
                    })
                    .data()
                    .reduce((a, b) => intVal(a) + intVal(b), 0);

                // Update footer
                api.column(7).footer().innerHTML =
                    pageTotal + ' ( ' + total + ' )';


                // Total over all pages
                total = api
                    .column(8)
                    .data()
                    .reduce((a, b) => intVal(a) + intVal(b), 0);

                // Total over this page
                pageTotal = api
                    .column(8, {
                        page: 'current'
                    })
                    .data()
                    .reduce((a, b) => intVal(a) + intVal(b), 0);

                // Update footer
                api.column(8).footer().innerHTML =
                    pageTotal + ' ( ' + total + ' )';

            }

        });


    })
</script>