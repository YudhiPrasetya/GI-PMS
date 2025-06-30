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
                        <li class="breadcrumb-item active" aria-current="page">Daily Packing Line</li>
                    </ol>
                </nav>
            </div>
        </div>
        <h6 class="mb-0 text-uppercase">Daily Packing Line Report</h6>
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
                                    <input type="date" name="from_date" id="from_date" class="datepicker form-control" placeholder="From Date">
                                </div>
                                <div class="col-md-1 text-center">
                                    <label class="col-form-label">to</label>
                                </div>
                                <div class="col-md-3">
                                    <input type="date" name="to_date" id="to_date" class="datepicker form-control" placeholder="To Date">
                                </div>
                                <div class="col-md-4">
                                    <input type="button" name="filter" id="filter" value="Filter" class="btn btn-info">
                                </div>
                            </div>


                            <table id="tableOrc" class="table table-bordered table-striped table-sm nowrap" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th class="text-center">No.</th>
                                        <th class="text-center">Date</th>
                                        <th class="text-center">Line</th>
                                        <th class="text-center">Bundle</th>
                                        <th class="text-center">ORC</th>
                                        <th class="text-center">color</th>
                                        <th class="text-center">Size</th>
                                        <th class="text-center">Qty Output</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th colspan="7" class="text-center">Total</th>
                                        <th class="text-center">0 ( 0 )</th>

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
        let table = $('#tableOrc').DataTable()

        $('#filter').on('click', function() {

            $('#tableOrc').css('display', '');

            var from_date = $('#from_date').val();
            var to_date = $('#to_date').val();

            var tgl1 = new Date($('#from_date').val());
            var tgl2 = new Date($('#to_date').val());

            var dataStr = {
                'from_date': from_date,
                'to_date': to_date
            };

            if (from_date != '' && to_date != '') {
                if (tgl1 > tgl2) {
                    swal.fire({
                        'type': 'error',
                        'title': 'Tanggl from date tidak boleh lebih besar dari to date',
                        'showCancelButton': false,
                        'showConfirmButton': false,
                        'timer': 2000,
                    })
                } else {
                    table = $('#tableOrc').DataTable({
                        autoWidth: false,
                        info: true,
                        searching: true,
                        paging: true,
                        destroy: true,
                        scrollX: true,
                        dom: 'Blfrtip',
                        // lengthMenu: [
                        //     [10, 25, 50, 100, 200, 300, 400],
                        //     [10, 25, 50, 100, 200, 300, 400]
                        // ],
                        buttons: [
                            'excel', 'csv'
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
                                .column(7)
                                .data()
                                .reduce(function(a, b) {
                                    return intVal(a) + intVal(b);
                                }, 0);

                            // Total over this page
                            pageTotal = api
                                .column(7, {
                                    page: 'current'
                                })
                                .data()
                                .reduce(function(a, b) {
                                    return intVal(a) + intVal(b);
                                }, 0);

                            // Update footer
                            $(api.column(7).footer()).html(
                                pageTotal + '( ' + total + ' )'
                            );
                        },

                        ajax: {
                            url: "<?php echo site_url('packing/get_daily_packing'); ?>",
                            method: "POST",
                            data: {
                                'dataStr': dataStr
                            },
                            dataType: 'json',
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
                                'data': 'tgl',
                                'className': 'text-center px-2'
                            },
                            {
                                'data': 'line',
                                'className': 'text-center px-2'
                            },
                            {
                                'data': 'no_bundle',
                                'className': 'text-center px-2'
                            },
                            {
                                'data': 'orc',
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
                                'data': 'qty',
                                'className': 'text-center px-2'
                            },

                        ]
                    });
                }
            } else {
                swal.fire({
                    'icon': 'error',
                    'title': 'Please Select Date',
                    'showCancelButton': false,
                    'showConfirmButton': false,
                    'timer': 2000,
                });
            }
        });
    });
</script>