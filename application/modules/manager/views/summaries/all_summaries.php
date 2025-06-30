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
                        <div class="chart">
                            <canvas id="barSummary" style="max-height: 500px; height: 500px; max-height: 500px; max-width: 100%;"></canvas>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="row justify-content-sm text-center">

                            <div class="col-sm-3 col-6" style="background-color: #bf00ff;">
                                <div class="description-block border-right p-2">
                                    <a href="<?= site_url('manager/cuttingToday'); ?>">
                                        <h4 class="description-text text-white mt-1"><b>CUTTING</b><br /><span id="cuttingSum"></span></h4>
                                    </a>
                                </div>
                            </div>

                            <div class="col-sm-2 col-6 bg-info">
                                <div class="description-block border-right p-2">
                                    <a href="manager/molding_today">
                                        <h4 class="description-text text-white mt-1"><b>MOLDING</b><br /><span id="mouldingSum"></span></h4>
                                    </a>
                                </div>
                            </div>
                            <div class="col-sm-2 col-12 bg-danger">
                                <div class="description-block border-right p-2">
                                    <a href="<?= site_url('manager/sewingToday'); ?>">
                                        <h4 class="description-text text-white mt-1"><b>SEWING</b><br /><span id="sewingSum"></span></h4>
                                    </a>
                                </div>
                            </div>
                            <div class="col-sm-2 col-6 bg-primary">
                                <div class="description-block border-right p-2">
                                    <a href="<?= site_url('manager/packingToday'); ?>">
                                        <h4 class="description-text text-white mt-1"><b>PACKING</b><br /><span id="packingSum"></span></h4>
                                    </a>
                                </div>
                            </div>
                            <div class="col-sm-3 col-6 bg-success">
                                <div class="description-block border-right p-2">
                                    <a href="<?= site_url('manager/FinishGoodToday'); ?>">
                                        <h4 class="description-text text-white mt-1"><b>FINISH GOOD</b><br /><span id="finishGoodSum"></span></h4>
                                    </a>
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
    // $('[data-widget="pushmenu"]').PushMenu("collapse");

    graphSum();
    // graphBuyer();

    function graphSum() {
        $.ajax({
            url: '<?php echo site_url('manager/ajax_get_sum'); ?>',
            type: 'GET',
            dataType: 'JSON',
            success: function(data) {
                var chartSumProduction = $('#barSummary').get(0).getContext('2d');
                var arrChartDataCuttingVal = [];
                var arrChartDataMoldingVal = [];
                var arrChartDataSewingVal = [];
                var arrChartDataFinishGoodVal = [];
                var arrChartDataPackingVal = [];
                var arrChartLabel = [];

                $.each(data, function(i, item) {

                    if (item.tgl) {
                        var d = new Date(item.tgl);
                        var day = String(d.getDate()).padStart(2, '0');
                        var month = String(d.getMonth() + 1).padStart(2, '0');
                        var year = d.getFullYear();
                        var tgl = day + "-" + month + "-" + year;
                    } else {
                        var tgl = " "
                    }

                    arrChartDataCuttingVal.push(JSON.parse(item.CuttingToLine));
                    arrChartDataMoldingVal.push(JSON.parse(item.MoldToAssembly));
                    arrChartDataSewingVal.push(JSON.parse(item.Sewing));
                    arrChartDataFinishGoodVal.push(JSON.parse(item.FinishGood));
                    arrChartDataPackingVal.push(JSON.parse(item.Packing));
                    arrChartLabel.push(tgl);
                });

                new Chart(chartSumProduction, {
                    type: 'bar',
                    data: {
                        labels: arrChartLabel,
                        datasets: [{
                                type: 'line',
                                // borderColor: "#ffff1a",
                                borderColor: "#bf00ff",
                                label: 'Cutting',
                                yAxisID: 'axisBarLine',
                                data: arrChartDataCuttingVal,
                                fill: false,
                                borderWidth: 4,
                            },
                            {
                                type: 'line',
                                borderColor: "#5bc0de",
                                label: 'Molding',
                                yAxisID: 'axisBarLine',
                                data: arrChartDataMoldingVal,
                                fill: false,
                                borderWidth: 4,
                            },
                            {
                                type: 'line',
                                borderColor: "#ff1a1a",
                                label: 'Sewing',
                                yAxisID: 'axisBarLine',
                                data: arrChartDataSewingVal,
                                fill: false,
                                borderWidth: 4,
                            },
                            {
                                type: 'line',
                                borderColor: "#0275d8",
                                label: 'Packing',
                                yAxisID: 'axisBarLine',
                                data: arrChartDataPackingVal,
                                fill: false,
                                borderWidth: 4,
                            },
                            {
                                type: 'line',
                                borderColor: "#33cc33",
                                label: 'FinishGood',
                                yAxisID: 'axisBarLine',
                                data: arrChartDataFinishGoodVal,
                                fill: false,
                                borderWidth: 4,
                            },
                        ]
                    },
                    plugins: [ChartDataLabels],
                    options: {
                        plugins: {
                            datalabels: {
                                opacity: 1,
                                color: '#000000',
                                font: {
                                    size: 16
                                }
                            }
                        },
                        scales: {
                            xAxes: [{
                                display: true,
                                ticks: {
                                    autoSkip: false,
                                    max: 4,
                                }
                            }],
                            yAxes: [{
                                id: 'axisBarLine',
                                type: "linear",
                                ticks: {
                                    beginAtZero: true,
                                    min: 0,
                                }
                            }]
                        },
                        tooltips: {
                            mode: 'label'
                        },
                        responsive: true,
                        title: {
                            display: true,
                            text: ['Summary Output Production', '28 Days Interval'],
                        },
                        maintainAspectRatio: true,
                    }
                });

                let sumCutting = arrChartDataCuttingVal.reduce((partialSum, a) => partialSum + a, 0);
                let sumPacking = arrChartDataPackingVal.reduce((partialSum, a) => partialSum + a, 0);
                let sumMoulding = arrChartDataMoldingVal.reduce((partialSum, a) => partialSum + a, 0);
                let sumSewing = arrChartDataSewingVal.reduce((partialSum, a) => partialSum + a, 0);
                let sumFinishGood = arrChartDataFinishGoodVal.reduce((partialSum, a) => partialSum + a, 0);

                $.ajax({
                    url: "<?= base_url('manager/ajax_get_sum_cutting') ?>",
                    dataType: "json",
                    type: "POST",
                    success: function(data) {
                        $("#cuttingSum").text(parseFloat(data[0].sum).toFixed(0).replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1."));
                    }
                });

                $.ajax({
                    url: "<?= base_url('manager/ajax_get_sum_packing') ?>",
                    dataType: "json",
                    type: "POST",
                    success: function(data) {
                        $("#packingSum").text(parseFloat(data[0].sum).toFixed(0).replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1."));
                    }
                });

                $.ajax({
                    url: "<?= base_url('manager/ajax_get_sum_fg') ?>",
                    dataType: "json",
                    type: "POST",
                    success: function(data) {
                        $("#finishGoodSum").text(parseFloat(data[0].sum).toFixed(0).replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1."));
                    }
                });

                $.ajax({
                    url: "<?= base_url('manager/ajax_get_sum_moulding') ?>",
                    dataType: "json",
                    type: "POST",
                    success: function(data) {
                        $("#mouldingSum").text(parseFloat(data[0].sum).toFixed(0).replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1."));
                    }
                });

                $("#sewingSum").text(parseFloat(sumSewing).toFixed(0).replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1."));

            }
        });

        setTimeout(function() {
            graphSum()
        }, 30000);
    };
</script>