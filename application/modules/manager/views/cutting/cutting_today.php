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
                                    <canvas id="barCutting" style="min-height: 500px; height: 500px; max-height: 500px; max-width: 100%;"></canvas>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="card rounded-4 bg-gradient-pinki pt-2">
                                    <div class="card-header text-center">
                                        <span><b>Output Today</b></span>
                                        <h3 id="outputCut" style="font-weight: bold;"></h3>
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
                <div>
                    <div class="card-header">
                        <h4 class="card-title text-center"><b>Output Cutting Today</b></h4>
                    </div>
                </div>
                <div class="card-body">
                    <!-- <div class="table-responsive"> -->
                    <table id="table1" class="table table-hover table-bordered table-striped table-sm nowrap" style="width: 100%;">
                        <thead>
                            <tr>
                                <th>ORC</th>
                                <th>Output Date</th>
                                <th>Style</th>
                                <th>Color</th>
                                <th class="bg-warning">Qty Output</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                    <!-- </div> -->
                </div>
            </div>

        </div>
        <div class="row">
            <div class="card col-md-12">

                <div class="card-header">
                    <h3 class="card-title text-center"><b>Summary Output Cutting</b></h3>
                </div>

                <div class="card-body">
                    <!-- <div class="table-responsive"> -->
                    <table id="table2" class="table table-hover table-bordered table-striped table-sm nowrap" style="width: 100%;">
                        <thead>
                            <tr>
                                <th>ORC</th>
                                <th>Buyer</th>
                                <th>Style</th>
                                <th>Color</th>
                                <th>Order</th>
                                <th>Input</th>
                                <th class="bg-warning">Output</th>
                                <th>WIP</th>
                                <th>Balance</th>
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
        <div class="modal fade" id="modal-detail-graph" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="detailOrcToday" style="font-weight: bold;"></h4>

                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <table id="table3" style="width: 100%;" class="table table-hover table-bordered table-sm table-striped nowrap">
                            <thead>
                                <tr>
                                    <th>ORC</th>
                                    <th>Style</th>
                                    <th>Color</th>
                                    <th>Size</th>
                                    <th>Output</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="modal-detail-sum" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title text-center" id="detailOrcSum" style="font-weight: bold;"></h4>

                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <table id="table4" class="table table-hover table-bordered table-striped table-sm nowrap" style="width: 100%;">
                            <thead>
                                <tr>
                                    <th>ORC</th>
                                    <th>Buyer</th>
                                    <th>Style</th>
                                    <th>Color</th>
                                    <th>Size</th>
                                    <th>Order</th>
                                    <th>Input</th>
                                    <th class="bg-warning">Output</th>
                                    <th>WIP</th>
                                    <th>Balance</th>
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
        // $('[data-widget="pushmenu"]').PushMenu("collapse");

        showReportSewingLine();
        totalOutput();

        function showReportSewingLine() {

            $.ajax({
                url: '<?php echo site_url('manager/ajax_get_graph'); ?>',
                type: 'GET',
                dataType: 'JSON',
                success: function(data) {
                    // console.log('cek:', data);
                    var chartReportCuttingCanvas = $('#barCutting').get(0).getContext('2d');
                    var chartReportCuttingLabels = [];
                    var chartReportCuttingValues = [];
                    var arrChartDataOutputVal = [];
                    var arrChartLabel = [];

                    $.each(data, function(i, item) {

                        arrChartDataOutputVal.push(JSON.parse(item.outCut));
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
                            onClick: function(event, array) {
                                let element = this.getElementAtEvent(event);

                                if (element.length > 0) {
                                    var series = element[0]._model.datasetLabel;
                                    var label = element[0]._model.label;
                                    var value = this.data.datasets[element[0]._datasetIndex].data[element[0]._index];

                                    var orc = [label];
                                    // console.log('line:', line);

                                    $.ajax({
                                        url: "<?php echo site_url('manager/ajax_get_detail_orc'); ?>/" + orc,
                                        method: "POST",
                                        dataType: 'JSON',
                                        success: function(data) {
                                            // console.log('dataTableGraph: ', data);
                                            table3.clear();
                                            $.each(data, function(i, item) {
                                                table3.row.add([
                                                    item.orc,
                                                    item.style,
                                                    item.color,
                                                    item.size,
                                                    item.outCut,
                                                    // "<button type='button' class='btn btn-warning btn-sm' onclick='getOrcSize(\"" + item.orc + "/" + item.size + "\");' >Detail</button>"
                                                ]).draw();
                                                $('#modal-detail-graph').modal("show");
                                            });
                                        }
                                    });

                                    document.getElementById('detailOrcToday').innerHTML = orc;
                                }
                            }
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
                url: '<?php echo site_url('manager/ajax_get_total'); ?>',
                method: 'GET',
                dataType: 'json',

                success: function(rst) {
                    // console.log('cek output cutting :', rst);
                    $.each(rst, function(index, val) {
                        output.push(val.qtyOut);
                    });

                    setTimeout(function() {
                        totalOutput()
                    }, 30000);

                    document.getElementById('outputCut').innerHTML = output;

                },
            });
        }


        var table1 = $('#table1').DataTable({
            info: true,
            searching: true,
            paging: true,
            cache: true,
            scrollX: true,
            dom: '<"top"lf>rt<"bottom"ip>',
            ajax: {
                url: '<?= site_url('manager/ajax_get_today'); ?>',
                type: 'GET',
            },
            columns: [{
                    'data': 'orc',
                    'className': 'text-center align-middle px-2'
                },
                {
                    'data': 'tgl',
                    'className': 'text-center align-middle px-2'
                },
                {
                    'data': 'style',
                    'className': 'text-center align-middle px-2'
                },
                {
                    'data': 'color',
                    'className': 'text-center align-middle px-2'
                },
                {
                    'data': 'outCut',
                    'className': 'text-center align-middle px-2'
                },
                {
                    'className': 'text-center align-middle px-2',
                    render: function(data, type, row) {
                        return "<button type='button' class='btn btn-warning btn-sm btnDetailToday'>Detail</button>"
                    }
                },
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
            scrollX: true,
            ajax: {
                url: '<?= site_url('manager/ajax_get_summary_cutting'); ?>',
                type: 'GET',
            },
            columns: [{
                    'data': 'orc',
                    'className': 'text-center align-middle px-2'
                },
                {
                    'data': 'buyer',
                    'className': 'text-center align-middle px-2'
                },
                {
                    'data': 'style',
                    'className': 'text-center align-middle px-2'
                },
                {
                    'data': 'color',
                    'className': 'text-center align-middle px-2'
                },
                {
                    'data': 'qty',
                    'className': 'text-center align-middle px-2'
                },
                {
                    'data': 'inCut',
                    'className': 'text-center align-middle px-2'
                },
                {
                    'data': 'outCut',
                    'className': 'text-center align-middle px-2'
                },
                {
                    'data': 'wip',
                    'className': 'text-center align-middle px-2'
                },
                {
                    'data': 'balance',
                    'className': 'text-center align-middle px-2'
                },
                {
                    'className': 'text-center align-middle px-2',
                    render: function(data, type, row) {
                        return "<button type='button' class='btn btn-warning btn-sm btnDetailSummary'>Detail</button>"
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

        var table3 = $('#table3').DataTable({
            info: true,
            searching: true,
            paging: true,
            scrollX: true,
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
            var selectedRow = table1.row($(this).parents('tr')).data().orc;
            $.ajax({
                url: "<?php echo site_url('manager/ajax_get_detail_orc'); ?>/" + selectedRow,
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
                            item.outCut,
                            // "<button type='button' class='btn btn-warning btn-sm' onclick='getOrcSize(\"" + item.orc + "/" + item.size + "\");' >Detail</button>"
                        ]).draw();
                        $('#modal-detail-graph').modal("show");
                    });
                }
            });

            document.getElementById('detailOrcToday').innerHTML = selectedRow;
        });

        var table4 = $('#table4').DataTable({
            responsive: true,
            info: true,
            searching: true,
            paging: true,
            scrollX: true,
            cache: true,
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
                {
                    'className': 'text-center px-2'
                },

            ],
            lengthMenu: [
                [5, 10, 100],
                [5, 10, 100]
            ],
            "order": [
                [4, "asc"]
            ]
        });

        $('#table2').on('click', '.btnDetailSummary', function() {
            var cek = table2.row($(this).parents('tr')).data().orc;
            var out = table2.row($(this).parents('tr')).data().outCut;
            // console.log('cek btnini :', cek);
            if (out != 0) {
                $.ajax({
                    url: "<?php echo site_url('manager/ajax_get_detail_sum_cutting'); ?>/" + cek,
                    method: "GET",
                    dataType: 'JSON',
                    success: function(data) {
                        table4.clear();
                        $.each(data, function(i, item) {
                            table4.row.add([
                                item.orc,
                                item.buyer,
                                item.style,
                                item.color,
                                item.size,
                                item.order,
                                item.inCut,
                                item.outCut,
                                item.WIP,
                                item.Balance
                                // "<button type='button' class='btn btn-warning btn-sm' onclick='getOrcSize(\"" + item.orc + "/" + item.size + "\");' >Detail</button>"
                            ]).draw();
                            $('#modal-detail-sum').modal("show");
                        });
                    }
                });
                document.getElementById('detailOrcSum').innerHTML = cek;

            } else if (out == 0) {
                Swal.fire(
                    'ORC ini belum dikerjakan',
                    '',
                    'error'
                )
            }
        });
    })
</script>