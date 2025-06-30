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
                                    <canvas id="barMolding" style="min-height: 500px; height: 500px; max-height: 500px; max-width: 100%;"></canvas>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="col-md-12">
                                    <div class="card rounded-4 bg-gradient-info text-white bubble position-relative overflow-hidden pt-2">
                                        <div class="card-header text-center">
                                            <span><b>Current Linning</b></span>
                                            <h4 id="currentLinning" class="text-white" style="font-weight: bold;"></h4>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="card rounded-4 bg-gradient-info text-white bubble position-relative overflow-hidden pt-2">
                                        <div class="card-header text-center">
                                            <span><b>Current Middle</b></span>
                                            <h4 id="currentMiddle" class="text-white" style="font-weight: bold;"></h4>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="card rounded-4 bg-gradient-info text-white bubble position-relative overflow-hidden pt-2">
                                        <div class="card-header text-center">
                                            <span><b>Current Outer</b></span>
                                            <h4 id="currentOuter" class="text-white" style="font-weight: bold;"></h4>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="card rounded-4 bg-gradient-info text-white bubble position-relative overflow-hidden pt-2">
                                        <div class="card-header text-center">
                                            <span><b>Current Assemble</b></span>
                                            <h4 id="currentAssemble" class="text-white" style="font-weight: bold;"></h4>
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
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title text-center mt-2"><b>Current Output Molding</b></h4>
                </div>

                <div class="card-body">
                    <!-- <div class="table-responsive"> -->
                    <table id="currentOutputMoldingTable" class="table table-hover table-bordered table-striped table-sm" style="width: 100%;">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>ORC</th>
                                <th>Style</th>
                                <th>Color</th>
                                <th>Size</th>
                                <th>Linning</th>
                                <th>Middle</th>
                                <th>Outer</th>
                                <th class="bg-info">Output Assemble</th>
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
<!-- <div class="modal fade" id="modal-detail-graph" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="detailOrcToday" style="font-weight: bold;"></h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <table id="detailsTable" style="width: 100%;" class="table table-hover table-bordered table-sm table-striped nowrap">
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
</div> -->


<script type="text/javascript">
    $(document).ready(function() {

        const showReportMoldingToday = () => {

            $.ajax({
                url: '<?php echo site_url('manager/getCurrentOutputMoldingGraph'); ?>',
                type: 'GET',
                dataType: 'JSON',
                success: function(data) {
                    // console.log('cek:', data);
                    var chartReportMoldingCanvas = $('#barMolding').get(0).getContext('2d');
                    var chartReportMoldingLabels = [];
                    var chartReportMoldingValues = [];
                    var arrChartDataOutputVal = [];
                    var arrChartLabel = [];

                    $.each(data, function(i, item) {
                        arrChartDataOutputVal.push(JSON.parse(item.output_assemble));
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
                    window.myCharts = new Chart(chartReportMoldingCanvas, {
                        type: 'bar',
                        data: {
                            labels: arrChartLabel,
                            datasets: [{
                                label: 'Output Assamble',
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
                                text: ['Output Assemble Graph Molding Per ORC Today', tgl],
                            },
                            legend: false,
                            maintainAspectRatio: true,
                            // onClick: function(event, array) {
                            //     let element = this.getElementAtEvent(event);

                            //     if (element.length > 0) {
                            //         var series = element[0]._model.datasetLabel;
                            //         var label = element[0]._model.label;
                            //         var value = this.data.datasets[element[0]._datasetIndex].data[element[0]._index];

                            //         var orc = [label];
                            //         console.log('orc molding graph:', orc);

                            //         let detalsModal = $('#detalsModal').DataTable({
                            //             // responsive: true,
                            //             info: true,
                            //             searching: true,
                            //             paging: true,
                            //             scrollX: true,
                            //             // cache: true,
                            //             dom: '<"top"lf>rt<"bottom"ip>',
                            //             ajax: {
                            //                 url: '<?= site_url('manager/getDetailsCurrentOutputMoldingGraph'); ?>',
                            //                 type: 'GET',
                            //             },
                            //             columns: [{
                            //                     "data": null,
                            //                     "orderable": true,
                            //                     "searchable": true,
                            //                     'className': 'text-center px-4',
                            //                     "width": "50px",
                            //                     "render": function(data, type, row, meta) {
                            //                         return meta.row + meta.settings._iDisplayStart + 1;
                            //                     }
                            //                 },
                            //                 {
                            //                     'data': 'orc',
                            //                     'className': 'text-center px-2'
                            //                 },
                            //                 {
                            //                     'data': 'style',
                            //                     'className': 'text-center px-2'
                            //                 },
                            //                 {
                            //                     'data': 'color',
                            //                     'className': 'text-center px-2'
                            //                 },
                            //                 {
                            //                     'data': 'size',
                            //                     'className': 'text-center px-2'
                            //                 },
                            //                 {
                            //                     'data': 'out_outermold',
                            //                     'className': 'text-center px-2'
                            //                 },
                            //                 {
                            //                     'data': 'out_midmold',
                            //                     'className': 'text-center px-2'
                            //                 },
                            //                 {
                            //                     'data': 'out_linningmold',
                            //                     'className': 'text-center px-2'
                            //                 },
                            //                 {
                            //                     'data': 'output_assemble',
                            //                     'className': 'text-center px-2'
                            //                 }
                            //             ]
                            //         });
                            //     }
                            // }
                        }
                    });

                    setTimeout(function() {
                        showReportMoldingToday()
                    }, 30000);
                }
            });

            function randomColor() {
                return "hsl(" + 360 * Math.random() + ',' +
                    (10 + 70 * Math.random()) + '%,' +
                    (55 + 10 * Math.random()) + '%)'
            };

        };

        const totalOutput = () => {
            const lin = [];
            const mid = [];
            const out = [];
            const tot = [];
            const ass = [];

            $.ajax({
                url: '<?php echo site_url('manager/getCurrentTotalOutputMolding'); ?>',
                method: 'GET',
                dataType: 'json',
                success: function(rst) {
                    // console.log('cek output molding :', rst);
                    $.each(rst, function(index, val) {
                        lin.push(val.out_outermold);
                        mid.push(val.out_midmold);
                        out.push(val.out_linningmold);
                        ass.push(val.output_assemble);
                    });
                    // setTimeout(function() {
                    //     totalOutput()
                    // }, 30000);
                    document.getElementById('currentLinning').innerHTML = lin;
                    document.getElementById('currentMiddle').innerHTML = mid;
                    document.getElementById('currentOuter').innerHTML = out;
                    document.getElementById('currentAssemble').innerHTML = ass;
                }
            });
        }

        showReportMoldingToday();
        totalOutput();


        let currentOutputMoldingTable = $('#currentOutputMoldingTable').DataTable({
            // responsive: true,
            info: true,
            searching: true,
            paging: true,
            scrollX: true,
            // cache: true,
            dom: '<"top"lf>rt<"bottom"ip>',
            lengthMenu: [
                [5, 10, 100],
                [5, 10, 100]
            ],
            ajax: {
                url: '<?= site_url('manager/getCurrentOutputMolding'); ?>',
                type: 'GET',
            },
            columns: [{
                    "data": null,
                    "orderable": true,
                    "searchable": true,
                    'className': 'text-center px-4',
                    "width": "50px",
                    "render": function(data, type, row, meta) {
                        return meta.row + meta.settings._iDisplayStart + 1;
                    }
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
                    'data': 'out_outermold',
                    'className': 'text-center px-2'
                },
                {
                    'data': 'out_midmold',
                    'className': 'text-center px-2'
                },
                {
                    'data': 'out_linningmold',
                    'className': 'text-center px-2'
                },
                {
                    'data': 'output_assemble',
                    'className': 'text-center px-2'
                }
            ]
        });




    })
</script>