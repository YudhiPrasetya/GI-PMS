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
                        <li class="breadcrumb-item active" aria-current="page">Report Packing</li>
                    </ol>
                </nav>
            </div>
        </div>
        <h6 class="mb-0 text-uppercase">Packing By Date</h6>
        <hr />
        <div class="row">
            <div class="col-12 ">
                <div class="card rounded-4 w-100">
                    <div class="card-body">
                        <div class="mx-3 my-3">
                            <div class="row mb-4">
                                <div class="col-md-3">
                                    <input name="date" class="form-control" id="date" type="date" class="datepicker form-control" placeholder="From Date" value="<?php echo date("Y-m-d"); ?>">
                                </div>
                            </div>
                            <table id="tableOrcPacking" class="table table-bordered table-striped table-sm nowrap" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th>Day</th>
                                        <th>Date</th>
                                        <th>Line</th>
                                        <th>ORC</th>
                                        <th>1<sup>st</sup></th>
                                        <th>2<sup>nd</sup></th>
                                        <th>3<sup>rd</sup></th>
                                        <th>4<sup>th</sup></th>
                                        <th>5<sup>th</sup></th>
                                        <th>6<sup>th</sup></th>
                                        <th>7<sup>th</sup></th>
                                        <th>8<sup>th</sup></th>
                                        <th>9<sup>th</sup></th>
                                        <th>10<sup>th</sup></th>
                                        <th>11<sup>th</sup></th>
                                        <th>12<sup>th</sup></th>
                                        <th>13<sup>th</sup></th>
                                        <th>Total</th>
                                    </tr>
                                </thead>
                                <tbody>

                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th colspan="17" class="text-center">Total</th>
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

        dateHour();

        var table, date, datepicker;

        function dateHour() {
            date = $('#date').val();

            datepicker = {
                'tgl': date
            };

            table = $('#tableOrcPacking').DataTable({
                scrollX: true,
                dom: 'Blfrtip',
                bDestroy: true,
                scrollX: true,
                // processing: true,
                // stateSave: true,
                // lengthMenu: [
                //     [10, 25, 50, 100, 200, 300, 400],
                //     [10, 25, 50, 100, 200, 300, 400]
                // ],
                buttons: [
                    'excel', 'csv'
                ],
                ajax: {
                    url: "<?php echo site_url('manager/packing_filter_hours'); ?>",
                    method: "POST",
                    dataType: 'json',
                    data: {
                        'data': datepicker
                    },

                },
                columns: [{
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
                        'data': 'kesebelas',
                        'className': 'text-center px-2'
                    },
                    {
                        'data': 'keduabelas',
                        'className': 'text-center px-2'
                    },
                    {
                        'data': 'ketigabelas',
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
                        .column(17)
                        .data()
                        .reduce(function(a, b) {
                            return intVal(a) + intVal(b);
                        }, 0);

                    // Total over this page
                    pageTotal = api
                        .column(17, {
                            page: 'current'
                        })
                        .data()
                        .reduce(function(a, b) {
                            return intVal(a) + intVal(b);
                        }, 0);

                    // Update footer
                    $(api.column(17).footer()).html(
                        +pageTotal + ' ( ' + total + ' )'
                    );
                },


            });

        }

        $('#date').on('change', function() {
            dateHour();
        });

    });
</script>