<!--start page wrapper -->
<div class="page-wrapper">
    <div class="page-content">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title text-center mt-2"><b>Production Summary Graph</b></h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-10">
                                <div class="chart">
                                    <canvas id="barSewingLineShift1" style="min-height: 500px; height: 500px; max-height: 500px; max-width: 100%;"></canvas>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="col-md-12">
                                    <div class="card rounded-4 bg-gradient-burning bubble position-relative overflow-hidden pt-2">
                                        <div class="card-header text-center text-white">
                                            <span><b>Current Output</b></span>
                                            <h3 id="outputSewingShift1" class="text-white" style="font-weight: bold;"></h3>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="card rounded-4 bg-gradient-burning bubble position-relative overflow-hidden pt-2">
                                        <div class="card-header text-center text-white">
                                            <span><b>Total ORC</b></span>
                                            <h3 id="orcSewingShift1" class="text-white" style="font-weight: bold;"></h3>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="card rounded-4 bg-gradient-burning bubble position-relative overflow-hidden pt-2">
                                        <div class="card-header text-center text-white">
                                            <span><b>Total Line</b></span>
                                            <h3 id="lineSewingShift1" class="text-white" style="font-weight: bold;"></h3>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="card rounded-4 bg-gradient-burning bubble position-relative overflow-hidden pt-2">
                                        <div class="card-header text-center text-white">
                                            <span><b>Total Downtime</b></span>
                                            <h3 id="downtimeSewingShift1" class="text-white" style="font-weight: bold;"></h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="card col-md-12">
                <div class=" card-warning">
                    <div class="card-header">
                        <h4 class="card-title text-center mt-2"><b>Output Sewing Today</b></h4>
                    </div>
                </div>
                <div class="card-body">
                    <!-- <div class="table-responsive"> -->
                    <table id="table1" class="table table-hover table-bordered table-striped table-sm" style="width: 100%;">
                        <thead>
                            <tr>
                                <th>Line</th>
                                <th>Output Date</th>
                                <th class="bg-danger">Qty Output</th>
                                <th>Detail</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                    <!-- </div> -->
                </div>
            </div>
        </div>

    </div>
</div><!--end row-->

<!--end page wrapper -->

<!-- Modal -->
<div class="modal fade" id="modal-detail" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title text-center" id="detailOrc" style="font-weight: bold;">Detail ORC</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="mx-2">
                    <table id="table2" class="table table-hover table-bordered table-sm table-striped">
                        <thead>
                            <tr>
                                <th>Line</th>
                                <th>ORC</th>
                                <th>Color</th>
                                <th>Size</th>
                                <th class="bg-danger">Qty Output</th>
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

<script type="text/javascript">
    $(document).ready(function() {
        // $('[data-widget="pushmenu"]').PushMenu("collapse");


        showGrafikOutputSewing()

        function showGrafikOutputSewing() {
            var grafikOutputSewingShift1 = $.ajax({
                type: 'GET',
                url: '<?php echo site_url('manager/ajax_get_grafik_sewing_today_shift'); ?>',
                dataType: 'json'
            });

            var countORCTodayShift1 = $.ajax({
                type: 'GET',
                url: '<?= site_url('manager/ajax_get_Count_ORC_Today_Shift'); ?>',
                dataType: 'json'
            });

            var totalDowTimeMachineShift1 = $.ajax({
                type: 'GET',
                url: '<?= site_url('manager/ajax_get_total_down_time_machine'); ?>',
                dataType: 'json'
            });

            $.when(grafikOutputSewingShift1, countORCTodayShift1, totalDowTimeMachineShift1, ).done(function(grafikOutputSewingShift1Rst, countORCTodayShift1Rst, totalDownTimeMachineShift1Rst) {

                //shift 1
                var totalOutputShift1 = grafikOutputSewingShift1Rst[0].reduce((n, {
                    output
                }) => n + (output == null ? 0 : parseInt(output)), 0);

                var totalLineShift1 = grafikOutputSewingShift1Rst[0].length;


                var d = new Date();
                var day = String(d.getDate()).padStart(2, '0');
                var month = String(d.getMonth() + 1).padStart(2, '0');
                var year = d.getFullYear();
                var tgl = day + "-" + month + "-" + year;

                $('#outputSewingShift1').text(totalOutputShift1);
                $('#orcSewingShift1').text(countORCTodayShift1Rst[0].count_orc);
                $('#lineSewingShift1').text(totalLineShift1);
                $('#downtimeSewingShift1').text(totalDownTimeMachineShift1Rst[0].TotalDownTime);





                //grafik shift 1
                var chartReportSewingCanvasShift1 = $('#barSewingLineShift1').get(0).getContext('2d');
                var chartReportSewingLabelsShift1 = [];
                var chartReportSewingValuesShift1 = [];
                var arrChartDataOutputValShift1 = [];
                var arrChartDataWipValShift1 = [];
                var arrChartDataBalanceValShift1 = [];
                var arrChartLabelShift1 = [];

                $.each(grafikOutputSewingShift1Rst[0], function(i, item) {

                    arrChartDataOutputValShift1.push(JSON.parse(item.output));
                    arrChartLabelShift1.push(item.name + ` (${item.description})`);
                    // arrChartLabel2.push(item.orc);
                });

                var arrColorShift1 = [];
                for (x = 0; x <= arrChartDataOutputValShift1.length; x++) {
                    arrColorShift1.push(
                        randomColor()
                    );
                }

                if (window.myCharts != undefined)
                    window.myCharts.destroy();
                window.myCharts = new Chart(chartReportSewingCanvasShift1, {
                    type: 'bar',
                    data: {
                        labels: arrChartLabelShift1,
                        datasets: [{
                            label: 'Output',
                            data: arrChartDataOutputValShift1,
                            yAxisID: 'axisBarChart',
                            backgroundColor: arrColorShift1
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
                        responsive: true,
                        title: {
                            display: true,
                            text: ['Output Graph Sewing Per Line', tgl],
                        },
                        maintainAspectRatio: true
                    }
                });


            });

            // showTblDetail();

            setTimeout(function() {
                showGrafikOutputSewing();
            }, 30000);

            function randomColor() {
                return "hsl(" + 360 * Math.random() + ',' +
                    (10 + 70 * Math.random()) + '%,' +
                    (55 + 10 * Math.random()) + '%)'
            };

        }



        var table1 = $('#table1').DataTable({
            info: true,
            searching: true,
            paging: true,
            cache: true,
            dom: '<"top"lf>rt<"bottom"ip>',
            ajax: {
                url: '<?= site_url('manager/ajax_get_data_sewing_today_coba'); ?>',
                type: 'GET',
            },
            columns: [{
                    'data': 'line',
                    'className': 'text-center align-middle px-2'
                },
                {
                    'data': 'tgl_ass',
                    'className': 'text-center align-middle px-2'
                },
                {
                    'data': 'qty',
                    'className': 'text-center align-middle px-2'
                },
                {
                    'className': 'text-center align-middle px-2',
                    render: function(data, type, row) {
                        return "<button type='button' class='btn btn-warning btn-sm btnDetailToday'>Detail</button>"
                    }
                }

            ],

            lengthMenu: [
                [5, 10, 100],
                [5, 10, 100]
            ],
            "order": [
                [0, "asc"]
            ]
        });

        var table2 = $('#table2').DataTable({
            info: true,
            searching: true,
            paging: true,
            dom: '<"top"lf>rt<"bottom"ip>',
            columns: [{
                    'className': 'text-center px-2'
                },
                {
                    'className': 'text-center px-2'
                },
                {
                    'className': 'text-center px-2'
                },
                {
                    'className': 'text-center px-2'
                },
                {
                    'className': 'text-center px-2'
                },

            ],
            lengthMenu: [
                [5, 10, 100],
                [5, 10, 100]
            ],
            "order": [
                [3, "asc"]
            ]
        });
        $('#table1').on('click', '.btnDetailToday', function() {
            var selectedRow = table1.row($(this).parents('tr')).data().line;
            $.ajax({
                url: "<?php echo site_url('manager/ajax_get_detail_today_new'); ?>/" + selectedRow,
                method: "GET",
                dataType: 'JSON',
                success: function(data) {
                    table2.clear();
                    $.each(data, function(i, item) {
                        table2.row.add([
                            item.line,
                            item.orc,
                            item.color,
                            item.size,
                            item.qty,
                        ]).draw();
                        $('#modal-detail').modal("show");
                    });
                }
            });

            // document.getElementById('detailOrcToday').innerHTML = selectedRow;
        });



        // var table2 = $('#table2').DataTable({
        //     info: true,
        //     searching: true,
        //     paging: true,
        //     cache: true,
        //     dom: '<"top"lf>rt<"bottom"ip>',
        //     ajax: {
        //         url: '<?= site_url('manager/ajax_get_detail_today_new'); ?>',
        //         type: 'GET',
        //     },
        //     columns: [{
        //             'data': 'line'
        //         },
        //         {
        //             'data': 'orc'
        //         },
        //         {
        //             'data': 'color'
        //         },
        //         {
        //             'data': 'size'
        //         },
        //         {
        //             'data': 'qty'
        //         },
        //     ],
        //     columnDefs: [{
        //         targets: [5],
        //         render: function(data, type, row) {
        //             return "<button type='button' class='btn btn-warning btn-sm btnDetailToday'>Detail</button>"
        //         }
        //     }],
        //     lengthMenu: [
        //         [5, 10, 100],
        //         [5, 10, 100]
        //     ],
        //     "order": [
        //         [0, "asc"]
        //     ]
        // });



    })
</script>