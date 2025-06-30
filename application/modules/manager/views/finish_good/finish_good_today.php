<!--start page wrapper -->
<div class="page-wrapper">
    <div class="page-content">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title text-center"><b>Report Finish Good</b></h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-10">
                                <div class="chart">
                                    <canvas id="barFinishGoodToday" style="min-height: 500px; height: 500px; max-height: 500px; max-width: 100%;"></canvas>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="card  rounded-4 bg-gradient-rainbow bubble position-relative overflow-hidden">
                                    <div class="card-header text-center">
                                        <span><b>Finish Good Today</b></span>
                                        <h3 id="outputFinishGood" style="font-weight: bold;"></h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="card col-md-12" style="padding: 10px;">
                <div class="card-warning">
                    <div class="card-header">
                        <h3 class="card-title text-center"><b>Finish Good Today</b></h3>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="table1" class="table table-hover table-bordered">
                            <thead>
                                <tr>
                                    <th>ORC</th>
                                    <th>Output Date</th>
                                    <th>Style</th>
                                    <th>Color</th>
                                    <th class="bg-success">Qty Packing</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="modal-detail-packing" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">

                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <table id="table3" class="table table-hover table-bordered">
                            <thead>
                                <tr>
                                    <th>ORC</th>
                                    <th>Style</th>
                                    <th>Color</th>
                                    <th>Size</th>
                                    <th>Qty</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
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

<script type="text/javascript">
    $(document).ready(function() {

        showReportSewingLine();
        totalOutput();

        function showReportSewingLine() {

            $.ajax({
                url: '<?php echo site_url('manager/ajax_get_graph_finishgood'); ?>',
                type: 'GET',
                dataType: 'JSON',
                success: function(data) {
                    // console.log('cek:', data);
                    var chartReportCuttingCanvas = $('#barFinishGoodToday').get(0).getContext('2d');
                    var chartReportCuttingLabels = [];
                    var chartReportCuttingValues = [];
                    var arrChartDataOutputVal = [];
                    var arrChartLabel = [];

                    $.each(data, function(i, item) {

                        arrChartDataOutputVal.push(JSON.parse(item.qty));
                        arrChartLabel.push(item.orc);
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
                                text: ['Output Graph Packing Per ORC', tgl],
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
                url: '<?php echo site_url('manager/ajax_get_total_finish'); ?>',
                method: 'GET',
                dataType: 'json',

                success: function(rst) {
                    // console.log('cek output cutting :', rst);
                    $.each(rst, function(index, val) {
                        output.push(val.qty);
                    });

                    setTimeout(function() {
                        totalOutput()
                    }, 30000);

                    document.getElementById('outputFinishGood').innerHTML = output;

                },
            });
        }

        var table1 = $('#table1').DataTable({
            info: true,
            searching: true,
            paging: true,
            // cache: true,
            dom: '<"top"lf>rt<"bottom"ip>',
            ajax: {
                url: '<?= site_url('manager/ajax_get_finish_today'); ?>',
                type: 'GET',
            },
            columns: [{
                    'data': 'orc'
                },
                {
                    'data': 'tgl'
                },
                {
                    'data': 'style'
                },
                {
                    'data': 'color'
                },
                {
                    'data': 'qty'
                },
                {
                    render: function(data, type, row) {
                        return "<button type='button' class='btn btn-success btn-sm btnDetailToday'>Detail</button>"
                    }
                },
            ],
            // columnDefs: [{
            //     targets: [5],

            // }],
            lengthMenu: [
                [5, 10, 100],
                [5, 10, 100]
            ],
            "order": [
                [0, "asc"]
            ]
        });


        var table3 = $('#table3').DataTable({
            info: true,
            searching: true,
            paging: true,
            dom: '<"top"lf>rt<"bottom"ip>',
            lengthMenu: [
                [5, 10, 100],
                [5, 10, 100]
            ],
            "order": [
                [3, "asc"]
            ]
        });
        $('#table1').on('click', '.btnDetailToday', function() {
            var selectedRow = table1.row($(this).parents('tr')).data().orc;
            $.ajax({
                url: "<?php echo site_url('manager/ajax_get_detail_orc_finish'); ?>/" + selectedRow,
                method: "GET",
                dataType: 'JSON',
                success: function(data) {
                    table3.clear();
                    $.each(data, function(i, item) {
                        table3.row.add([
                            item.orc,
                            item.style,
                            item.color,
                            item.size,
                            item.qty,
                        ]).draw();
                        $('#modal-detail-packing').modal("show");
                    });
                }
            });

        });



    })
</script>