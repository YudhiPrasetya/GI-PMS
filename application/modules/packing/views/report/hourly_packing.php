<style>
    .dt-buttons {
        margin-bottom: 10px;
    }

    .dataTables_length {
        margin-bottom: -30px;
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
                        <li class="breadcrumb-item active" aria-current="page">Packing Hourly</li>
                    </ol>
                </nav>
            </div>
        </div>
        <h6 class="mb-0 text-uppercase">Packing Hourly Report</h6>
        <hr />
        <div class="row">
            <div class="col-12 ">
                <div class="card rounded-4 w-100">
                    <div class="card-body">
                        <div class="mx-3 my-3">

                            <div class="row mb-4">
                                <div class="col-md-1">
                                    <label class="col-form-label">Date Range</label>
                                </div>
                                <div class="col-md-3">
                                    <input name="datefrom" class="form-control" id="datefrom" type="date" value="<?= date("Y-m-d"); ?>">
                                </div>
                                <div class="col-md-1 text-center">
                                    <label class="col-form-label">to</label>
                                </div>
                                <div class=" col-md-3 ">
                                    <input name="dateto" class="form-control" id="dateto" type="date" value="<?= date("Y-m-d"); ?>">
                                </div>
                                <div class="col-lg-2">
                                    <input type="button" name="filter" id="filter" value="Filter" class="btn btn-info">
                                </div>
                            </div>


                            <table id="tableOrc" class="table table-bordered table-hover table-striped table-sm nowrap" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Day</th>
                                        <th>Date</th>
                                        <th>Line</th>
                                        <th>ORC</th>
                                        <th>1st</th>
                                        <th>2nd</th>
                                        <th>3rd</th>
                                        <th>4th</th>
                                        <th>5th</th>
                                        <th>6th</th>
                                        <th>7th</th>
                                        <th>8th</th>
                                        <th>9th</th>
                                        <th>10th</th>
                                        <th>Total</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th colspan="15" class="tex-center">Total</th>
                                        <th></th>
                                    </tr>
                                </tfoot>

                            </table>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div><!--end row-->
</div>
<!--end page wrapper -->

<script>
    var table;

    $(document).ready(function() {
        $(".preloader").fadeOut();


        datePacking();

        var table, date, datepicker;

        $('#filter').on('click', function() {
            datePacking();
        });

        function datePacking() {

            datefrom = $('#datefrom').val();
            dateto = $('#dateto').val();

            datepicker = {
                'datefrom': datefrom,
                'dateto': dateto
            };

            table = $('#tableOrc').DataTable({
                autoWidth: false,
                processing: true,
                destroy: true,
                info: true,
                searching: true,
                scrollX: true,
                // stateSave: true,

                dom: 'Blfrtip',
                // dom: '<"dt-top"<"left-col"Bl><"right-col"f>>rt<"dt-bottom"<"left-col"i><"right-col"p>>',
                buttons: [{
                    extend: 'excel',
                    title: 'HOURLY PACKING '
                }],

                ajax: {
                    url: '<?= site_url('packing/filter_hours'); ?>',
                    type: 'POST',
                    data: {
                        'datefrom': datefrom,
                        'dateto': dateto
                    },
                },
                language: {
                    // processing: '<i class="fa fa-spinner fa-spin fa-3x fa-fw"></i><br><div><p>Silahkan Menunggu...</p></div> ',
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
                        'data': 'dayname',
                        'className': 'text-center px-2'

                    },
                    {
                        'data': 'tgl',
                        'className': 'text-center px-2'
                    },

                    {
                        'data': 'line',
                        'className': 'text-center px-2'
                    },
                    {
                        'data': 'orc',
                        'className': 'text-center px-2'
                    },
                    {
                        'data': 'pertama',
                        'className': 'text-center px-2'
                    },
                    {
                        'data': 'kedua',
                        'className': 'text-center px-2'
                    },
                    {
                        'data': 'ketiga',
                        'className': 'text-center px-2'
                    },
                    {
                        'data': 'keempat',
                        'className': 'text-center px-2'
                    },
                    {
                        'data': 'kelima',
                        'className': 'text-center px-2'
                    },
                    {
                        'data': 'keenam',
                        'className': 'text-center px-2'
                    },
                    {
                        'data': 'ketuju',
                        'className': 'text-center px-2'
                    },
                    {
                        'data': 'kedelan',
                        'className': 'text-center px-2'
                    },
                    {
                        'data': 'kesembilan',
                        'className': 'text-center px-2'
                    },
                    {
                        'data': 'kesepuluh',
                        'className': 'text-center px-2'
                    },
                    {
                        'data': 'total',
                        'className': 'text-center px-2'
                    },
                ],

                footerCallback: function(row, data, start, end, display) {
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
                        .column(15)
                        .data()
                        .reduce(function(a, b) {
                            return intVal(a) + intVal(b);
                        }, 0);

                    // Total over this page
                    pageTotal = api
                        .column(15, {
                            page: 'current'
                        })
                        .data()
                        .reduce(function(a, b) {
                            return intVal(a) + intVal(b);
                        }, 0);

                    // Update footer
                    $(api.column(15).footer()).html(
                        pageTotal + ' ( ' + total + ' )'
                    );
                },

            });

        }

    });
</script>