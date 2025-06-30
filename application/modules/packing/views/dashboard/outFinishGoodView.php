<!--start page wrapper -->
<div class="page-wrapper">
    <div class="page-content">
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Dashboard</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Daily Out Finish Good Details</li>
                    </ol>
                </nav>
            </div>
        </div>
        <h6 class="mb-0 text-uppercase">Daily Out Finish Good Details</h6>
        <hr />
        <div class="row">
            <div class="col-12 ">
                <div class="card rounded-4 w-100">
                    <div class="card-body">
                        <div class="mx-3 my-3">

                            <!-- <div class="table-responsive"> -->
                            <table id="tableOutFinishGood" class="table table-striped table-bordered table-sm nowrap" style="width:100%">
                                <thead>
                                    <th>No.</th>
                                    <th>Scan Date</th>
                                    <th>ORC</th>
                                    <th>Style</th>
                                    <th>Color</th>
                                    <th>Size</th>
                                    <th>No. PO</th>
                                    <th>No. Carton</th>
                                    <th>Qty</th>
                                    <th>Operator</th>
                                    <th>Location</th>
                                </thead>
                                <tfoot>
                                    <th colspan="8">Total Qty</th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                </tfoot>

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


        var tableOutFinishGood = $('#tableOutFinishGood').DataTable({

            autoWidth: true,
            scrollX: true,
            processing: true,
            destroy: true,
            info: true,
            searching: true,
            paging: true,
            fixedHeader: true,

            ajax: {
                url: '<?= site_url('packing/outFilterByLine'); ?>',
                type: 'GET',
                dataType: 'JSON'
            },
            language: {
                processing: '<i class="fa fa-spinner fa-spin fa-3x fa-fw"></i><br><div><p>Silahkan Menunggu...</p></div> ',
                emptyTable: 'Tidak ada data',
                lengthMenu: '_MENU_',
            },
            columns: [{
                    "data": null,
                    "className": "text-center",
                    "orderable": true,
                    "searchable": false,
                    'className': 'text-center px-4',
                    // "width": "100px",
                    "render": function(data, type, row, meta) {
                        return meta.row + meta.settings._iDisplayStart + 1;
                    }
                },
                {
                    'data': 'tgl_out',
                    'className': "text-center px-2"
                },
                {
                    'data': 'orc',
                    'className': "text-center px-2"
                },
                {
                    'data': 'style',
                    'className': "text-center px-2"
                },
                {
                    'data': 'color',
                    'className': "text-center px-2"
                },
                {
                    'data': 'size',
                    'className': "text-center px-2"
                },
                {
                    'data': 'po',
                    'className': "text-center px-2"
                },
                {
                    'data': 'carton_no',
                    'className': "text-center px-2"
                },
                {
                    'data': 'qty_box',
                    'className': "text-center px-2"
                },
                {
                    'data': 'nama_lengkap',
                    'className': "text-center px-2"
                },
                {
                    'data': 'lokasi',
                    'className': "text-center px-2"
                },
                // {
                //     'className': 'text-center px-2',
                //     render: function(data, type, row) {
                //         if (row['lokasi'] == 'sementara')
                //             return "Temporary";
                //         else {
                //             return row['lokasi'];
                //         }
                //     },
                // }
                // {
                //     'data': 'lokasi',
                //     'className': "text-center px-2"
                // },
                // {
                //     'className': 'text-center px-3 align-middle',
                //     render: function(data, type, row) {
                //         return "<button class='btn btn-sm btn-gradient-info px-3' type='button' id='btn-detail' >Detail</button>"
                //     },
                // }


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

                // Update footer
                // api.column(6).footer().innerHTML =
                //   total
            }
        });

        // var lokasi;
        // $("#tableInFinishGood tbody").on("click", "#btn-detail", function() {
        //     lokasi = tableFGAllOut.row($(this).parents('tr')).data().lokasi;
        //     console.log(lokasi);
        //     window.open("< ?php echo site_url('packing/ajax_show_detail_fg_by_lokasi_out'); ?>/" + lokasi, "_self");

        // });





    })
</script>