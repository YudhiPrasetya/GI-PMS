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
            <div class="breadcrumb-title pe-3">Sewing</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Sewing By Date</li>
                    </ol>
                </nav>
            </div>
        </div>
        <h6 class="mb-0 text-uppercase">Report Sewing By Date</h6>
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
                                <div class="col-md-3">
                                    <input name="dateto" class="form-control" id="dateto" type="date" value="<?= date("Y-m-d"); ?>">
                                </div>
                                <div class="col-md-4">
                                    <button class="btn btn-primary" id="filter">Filter</button>
                                    <button class="btn btn-outline-secondary" id="btn_reset">Reset</button>
                                </div>
                            </div>


                            <table id="tableOrcSewing" class="table table-bordered table-striped table-sm nowrap" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Date</th>
                                        <th>ORC</th>
                                        <th>Style</th>
                                        <th>Color</th>
                                        <th>Size</th>
                                        <th>Qty Sewing</th>
                                    </tr>
                                </thead>
                                <tbody>

                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th colspan="6" class="text-center">Total Qty Sewing</th>
                                        <th class="text-center"></th>
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
</div>
<!--end page wrapper -->

<script>
    var table;

    $(document).ready(function() {
        $(".preloader").fadeOut();


        datePacking();

        var table, date, datepicker;

        $('#filter').on('click', function() {
            let datefrom = $('#datefrom').val();
            let dateto = $('#dateto').val();

            if (datefrom != '' && dateto != '') {
                datePacking();
            } else {
                Swal.fire({
                    icon: 'warning',
                    title: 'Warning',
                    text: 'Please select the date.',
                    showConfirmButton: false,
                    timer: 1000
                });
            }
        });

        function datePacking() {

            let datefrom = $('#datefrom').val();
            let dateto = $('#dateto').val();

            datepicker = {
                'datefrom': datefrom,
                'dateto': dateto
            };

            table = $('#tableOrcSewing').DataTable({
                autoWidth: false,
                // processing: true,
                destroy: true,
                info: true,
                searching: true,
                // stateSave: true,
                scrollX: true,
                paging: true,
                fixedHeader: true,

                dom: '<"dt-top"<"left-col"Bl><"right-col"f>>rt<"dt-bottom"<"left-col"i><"right-col"p>>',
                buttons: [{
                    extend: 'excel',
                    title: 'Sewing By Date'
                }],
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
                        .column(6)
                        .data()
                        .reduce(function(a, b) {
                            return intVal(a) + intVal(b);
                        }, 0);

                    // Total over this page
                    pageTotal = api
                        .column(6, {
                            page: 'current'
                        })
                        .data()
                        .reduce(function(a, b) {
                            return intVal(a) + intVal(b);
                        }, 0);

                    // Update footer
                    $(api.column(6).footer()).html(
                        +pageTotal + ' ( ' + total + ' )'
                    );
                },
                ajax: {
                    url: '<?= site_url('manager/daily_sewing'); ?>',
                    type: 'POST',
                    data: {
                        'datefrom': datefrom,
                        'dateto': dateto
                    },
                },

                columns: [{
                        "data": null,
                        "orderable": true,
                        "searchable": true,
                        'className': 'text-center px-4',
                        "render": function(data, type, row, meta) {
                            return meta.row + meta.settings._iDisplayStart + 1;
                        }
                    },
                    {
                        'data': 'tgl',
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

                    }, {
                        'data': 'qty_out',
                        'className': 'text-center px-2'
                    },

                ],
                lengthMenu: [
                    [10, 25, 50, 100, -1],
                    [10, 25, 50, 100, 'All'],
                ],

            });

        }

        $('#btn_reset').on('click', function() {
            $('#datefrom').val("");
            $('#dateto').val("");
            table.clear().draw();
        });

    });
</script>