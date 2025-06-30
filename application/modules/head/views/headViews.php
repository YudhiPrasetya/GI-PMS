<!--start page wrapper -->
<div class="page-wrapper">
    <div class="page-content">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title text-center mt-2"><b>Output Sewing Today</b></h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <div class="card rounded-4 shadow bg-gradient-pinki">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center justify-content-between">
                                            <div>
                                                <p class="mb-0 text-white">Total All Output</p>
                                                <h4 class="my-1 text-white" id="outputSewingShift1"></h4>
                                            </div>
                                            <div class="fs-1 text-white"><i class="bx bx-arrow-to-bottom"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="card rounded-4 shadow bg-gradient-danger">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center justify-content-between">
                                            <div>
                                                <p class="mb-0 text-white">Total Line Today</p>
                                                <h4 class="my-1 text-white" id="lineSewing"></h4>
                                            </div>
                                            <div class="fs-1 text-white"><i class="bx bx-arrow-to-bottom"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="card rounded-4 bg-gradient-worldcup">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center justify-content-between">
                                            <div>
                                                <p class="mb-0 text-white">Total orc</p>
                                                <h4 class="my-1 text-white" id="orcSewing"></h4>
                                            </div>
                                            <div class="fs-1 text-white"><i class="bx bxs-cog"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="card rounded-4 bg-gradient-rainbow">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center justify-content-between">
                                            <div>
                                                <p class="mb-0 text-white">Total Output Yesterday</p>
                                                <h4 class="my-1 text-white" id="outputYesterday"></h4>
                                            </div>
                                            <div class="fs-1 text-white"><i class="bx bx-arrow-to-top"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="chart">
                                    <canvas id="barSewingLine" style="min-height: 500px; height: 500px; max-height: 500px; max-width: 100%;"></canvas>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="card rounded-4 w-100">
                                    <div class="card-body">
                                        <div class="mx-3 my-3">
                                            <table id="dateRangLinePerHoursTable" class="table table-striped table-bordered table-sm nowrap" style="width:100%">
                                                <thead>
                                                    <tr>
                                                        <th rowspan="2" class="text-center align-middle">No.</th>
                                                        <th rowspan="2" class="text-center align-middle">Date</th>
                                                        <th rowspan="2" class="text-center align-middle">Line</th>
                                                        <th colspan="10" class="text-center align-middle">Hours</th>
                                                        <th rowspan="2" class="text-center align-middle">Total</th>
                                                    </tr>
                                                    <tr>
                                                        <th class="text-center">1<sup>st</sup></th>
                                                        <th class="text-center">2<sup>nd</sup></th>
                                                        <th class="text-center">3<sup>rd</sup></th>
                                                        <th class="text-center">4<sup>th</sup></th>
                                                        <th class="text-center">5<sup>th</sup></th>
                                                        <th class="text-center">6<sup>th</sup></th>
                                                        <th class="text-center">7<sup>th</sup></th>
                                                        <th class="text-center">8<sup>th</sup></th>
                                                        <th class="text-center">9<sup>th</sup></th>
                                                        <th class="text-center">10<sup>th</sup></th>
                                                    </tr>
                                                </thead>

                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
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

<script type="text/javascript">
    $(document).ready(function() {

        showReportSewingLine();
        totalOutput();
        totalLineSewing();
        totalOrc();
        totaLOutputYesterday();
        linePerHour();

        function showReportSewingLine() {

            $.ajax({
                url: '<?= site_url("head/ajax_get_grafik_line"); ?>',
                type: 'GET',
                dataType: 'JSON',
                success: function(data) {
                    // console.log('cek:', data);
                    var chartReportCuttingCanvas = $('#barSewingLine').get(0).getContext('2d');
                    var chartReportCuttingLabels = [];
                    var chartReportCuttingValues = [];
                    var arrChartDataOutputVal = [];
                    var arrChartLabel = [];

                    $.each(data, function(i, item) {

                        arrChartDataOutputVal.push(JSON.parse(item.qty));
                        arrChartLabel.push(item.line + ` (${item.description})`);
                    });

                    var arrColor = [];
                    for (x = 0; x <= arrChartDataOutputVal.length; x++) {
                        arrColor.push(
                            randomColor()
                        );
                    }

                    var d = new Date();
                    var day = String(d.getDate()).padStart(2, '0');
                    var month = String(d.getMonth() + 1).padStart(2, '0');
                    var year = d.getFullYear();
                    var tgl = day + "-" + month + "-" + year;

                    if (window.myCharts != undefined)
                        window.myCharts.destroy();
                    window.myCharts = new Chart(chartReportCuttingCanvas, {

                        type: 'bar',
                        data: {
                            labels: arrChartLabel,
                            datasets: [{
                                label: 'Output',
                                data: arrChartDataOutputVal,
                                yAxisID: 'axisBarChart',
                                backgroundColor: arrColor
                            }]
                        },

                        options: {
                            scales: {
                                xAxes: [{
                                    display: true,
                                    // barPercentage: 1.3,
                                    ticks: {
                                        autoSkip: false,
                                        max: 3,
                                    }
                                }],
                                yAxes: [{
                                    id: "axisBarChart",
                                    ticks: {
                                        beginAtZero: true,

                                    },
                                    min: 0
                                }]
                            },
                            tooltips: {
                                mode: 'label'
                            },
                            title: {
                                display: true,
                                text: ['Output Graph Sewing Per Line', tgl],
                            },
                            legend: false,
                            maintainAspectRatio: true,

                        }
                    });

                    setTimeout(function() {
                        showReportSewingLine()
                    }, 30000);
                }
            });

            function randomColor() {
                return "hsl(" + 360 * Math.random() + ',' +
                    (10 + 70 * Math.random()) + '%,' +
                    (55 + 10 * Math.random()) + '%)'
            };

        };

        function totalOutput() {
            const output = [];

            $.ajax({
                url: '<?php echo site_url('head/ajax_get_all_qty'); ?>',
                method: 'GET',
                dataType: 'json',

                success: function(rst) {
                    console.log('cek out :', rst);
                    $.each(rst, function(index, val) {
                        output.push(val.qty);
                    });

                    setTimeout(function() {
                        totalOutput()
                    }, 30000);

                    document.getElementById('outputSewingShift1').innerHTML = output;

                },
            });
        }

        function totalLineSewing() {
            const output = [];

            $.ajax({
                url: '<?php echo site_url('head/ajax_get_all_count'); ?>',
                method: 'GET',
                dataType: 'json',

                success: function(rst) {
                    console.log('cek out :', rst);
                    $.each(rst, function(index, val) {
                        output.push(val.qty);
                    });

                    setTimeout(function() {
                        totalLineSewing()
                    }, 30000);

                    document.getElementById('lineSewing').innerHTML = output;

                },
            });
        }

        function totalOrc() {
            const output = [];

            $.ajax({
                url: '<?php echo site_url('head/ajax_get_all_orc'); ?>',
                method: 'GET',
                dataType: 'json',

                success: function(rst) {
                    console.log('cek out :', rst);
                    $.each(rst, function(index, val) {
                        output.push(val.qty);
                    });

                    setTimeout(function() {
                        totalLineSewing()
                    }, 30000);

                    document.getElementById('orcSewing').innerHTML = output;

                },
            });
        }

        function totaLOutputYesterday() {
            const output = [];

            $.ajax({
                url: '<?php echo site_url('head/ajax_get_qty_yesterday'); ?>',
                method: 'GET',
                dataType: 'json',

                success: function(rst) {
                    console.log('cek out :', rst);
                    $.each(rst, function(index, val) {
                        output.push(val.qty);
                    });

                    setTimeout(function() {
                        totalLineSewing()
                    }, 30000);

                    document.getElementById('outputYesterday').innerHTML = output;

                },
            });
        }

        function linePerHour() {
            var table = $('#dateRangLinePerHoursTable').DataTable({
                processing: true,
                destroy: true,
                info: true,
                scrollX: true,
                searching: true,
                paging: true,
                fixedHeader: true,

                ajax: {
                    url: '<?= site_url('head/get_sewing_per_hour'); ?>',
                    type: 'POST',

                },
                language: {
                    processing: '<i class="fa fa-spinner fa-spin fa-3x fa-fw"></i><br><div><p>Silahkan Menunggu...</p></div> ',
                    emptyTable: 'Tidak ada data',
                    lengthMenu: '_MENU_',
                },
                columns: [{
                        "data": null,
                        "orderable": true,
                        "searchable": true,
                        'className': 'text-center px-4',
                        // "width": "100px",
                        "render": function(data, type, row, meta) {
                            return meta.row + meta.settings._iDisplayStart + 1;
                        }
                    },

                    {
                        'data': 'tgl_ass',
                        'className': 'text-center px-2'
                    },

                    {
                        'data': 'line',
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
                lengthMenu: [
                    [10, 25, 50, 100, -1],
                    [10, 25, 50, 100, 'All'],
                ],
            });
        }


    })
</script>