<!--start page wrapper -->
<div class="page-wrapper">
    <div class="page-content">
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">MANAGER</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Report Mechanic</li>
                    </ol>
                </nav>
            </div>
        </div>
        <h6 class="mb-0 text-uppercase">Dowtime Report Machine Type</h6>
        <hr />
        <div class="row">
            <div class="col-8">
                <div class="card rounded-4 w-100">
                    <div class="card-body">
                        <div class="card-title text-center">
                            Total of Machine Breakdowns
                        </div>
                        <div class="row" id="penampungCanvas">
                            <div class="col-12">
                                <canvas style="width: 100%" id="barDowntime"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-4">
                <div class="card rounded-4 w-100">
                    <div class="card-body">
                        <div class="card-title text-center">
                            Cumulative Percentages
                        </div>
                        <div class="row" id="groupPercentage">

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
    $(document).ready(function() {
        var table3 = $('#table3').DataTable({
            responsive: true,
            info: true,
            searching: true,
            paging: true,
            cache: true,
            dom: '<"top"lf>rt<"bottom"ip>',
            lengthMenu: [
                [5, 10, 100],
                [5, 10, 100]
            ],
            "order": [
                [3, "asc"]
            ]
        });
        let showing = [];

        downtimeReport();

        function downtimeReport() {
            $("#penampungCanvas").empty();
            $("#groupPercentage").empty();
            $('#penampungCanvas').append('<canvas id="barDowntime"><canvas>');
            var month = $('#month').val();
            $.ajax({
                url: '<?php echo site_url('manager/get_data_machine_type_v3'); ?>',
                type: 'GET',
                dataType: 'json',
                success: function(data) {
                    var chartDowntimeCanvas = $('#barDowntime').get(0).getContext('2d');
                    let arrChartLabel = [];
                    let keys = [];
                    let obj = [];

                    $.each(Object.keys(data[0]), function(i, item) {
                        keys.push(item);
                    });

                    keys.pop();

                    $.each(keys, function(i, item) {
                        obj.push({
                            type: 'line',
                            borderColor: randomColor(),
                            label: item,
                            borderWidth: 4,
                            data: [],
                            yAxisID: 'axisBarLine',
                            fill: false
                        })
                    });

                    $.each(data, function(i, item) {
                        arrChartLabel.push(item.date);
                        $.each(Object.keys(item), function(x, xtem) {
                            $.each(obj, function(y, ytem) {
                                if (xtem == ytem.label) {
                                    ytem.data.push(item[xtem])
                                }
                            })
                        })
                    });

                    new Chart(chartDowntimeCanvas, {
                        type: 'bar',
                        data: {
                            labels: arrChartLabel,
                            datasets: obj
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
                            legend: {
                                position: "left",
                                labels: {
                                    padding: 15
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
                                    },
                                    position: "right"
                                }]
                            },
                            responsive: true,
                            // title: {
                            // 	display: true,
                            // 	text: ['Machine Type'],
                            // },
                            maintainAspectRatio: true,
                            onClick: function(event, array) {
                                let element = this.getElementAtEvent(event);

                                if (element.length > 0) {
                                    var label = this.data.datasets[element[0]._datasetIndex].label;
                                    var tgl = element[0]._xScale.ticks[element[0]._index];

                                    $.ajax({
                                        url: "<?php echo site_url('manager/ajax_get_detail_type_v2'); ?>/" + label + '/' + tgl,
                                        method: "POST",
                                        dataType: 'JSON',
                                        success: function(data) {
                                            table3.clear();
                                            $.each(data, function(i, item) {
                                                table3.row.add([
                                                    item.machine_type,
                                                    item.machine_sn,
                                                    item.barcode_machine,
                                                    item.tot_machine,
                                                ]).draw();
                                                $('#modal-detail-graph').modal("show");
                                            });
                                        }
                                    });
                                }
                            }
                        }
                    });

                    $.each(keys, function(i, item) {
                        $("#groupPercentage").append(`<div class="col-6" style="padding-bottom: 1rem"><canvas id="myChart${i}"></canvas></div>`);

                        $.ajax({
                            url: "<?= base_url('manager/getTotalMachine') ?>",
                            data: {
                                'kodeBarang': item,
                            },
                            dataType: "json",
                            type: "POST",
                            success: function(data) {
                                var id = "myChart" + i;
                                var ctx = document.getElementById(id).getContext('2d');
                                var myChart = new Chart(ctx, {
                                    type: 'pie',
                                    data: {
                                        labels: ["Downtime Records", "Available Machines"],
                                        datasets: [{
                                            data: [data[1].jml, data[0].jml * arrChartLabel.length],
                                            backgroundColor: [
                                                'rgba(255, 99, 132, 0.8)',
                                                'rgba(54, 162, 235, 0.2)',
                                            ],
                                            borderColor: [
                                                'rgba(255,99,132,1)',
                                                'rgba(54, 162, 235, 1)',
                                            ],
                                            borderWidth: 1
                                        }]
                                    },
                                    plugins: [ChartDataLabels],
                                    options: {
                                        plugins: {
                                            datalabels: {
                                                opacity: 1,
                                                color: '#000000',
                                                font: {
                                                    size: 16
                                                },
                                                formatter: function(value, ctx) {
                                                    let sum = 0;
                                                    let dataArr = ctx.chart.data.datasets[0].data;
                                                    dataArr.map(data => {
                                                        sum += parseInt(data);
                                                    });
                                                    let percentage = (value * 100 / sum).toFixed(2) + "%";
                                                    return percentage;
                                                },
                                                anchor: "center",
                                                align: "center",
                                                clamp: true
                                            }
                                        },
                                        title: {
                                            display: true,
                                            text: [item],
                                        },
                                        legend: {
                                            display: false
                                        }
                                    }
                                });
                            }
                        });
                    });

                    showing = [];

                    setTimeout(function() {
                        downtimeReport()
                    }, 60000);
                }

            });

            const mejikuhibiniu = ["HSL(0, 100%, 50%)", "HSL(30, 100%, 50%)", "HSL(60, 100%, 50%)", "HSL(90, 100%, 50%)", "HSL(120, 100%, 50%)", "HSL(150, 100%, 50%)", "HSL(180, 100%, 50%)", "HSL(210, 100%, 50%)", "HSL(240, 100%, 50%)", "HSL(270, 100%, 50%)", "HSL(300, 100%, 50%)", "HSL(330, 100%, 50%)", "HSL(15, 100%, 50%)", "HSL(45, 100%, 50%)", "HSL(75, 100%, 50%)", "HSL(105, 100%, 50%)", "HSL(135, 100%, 50%)", "HSL(165, 100%, 50%)", "HSL(195, 100%, 50%)", "HSL(225, 100%, 50%)", "HSL(260, 100%, 50%)", "HSL(290, 100%, 50%)", "HSL(320, 100%, 50%)", "HSL(40, 100%, 50%)", "HSL(70, 100%, 50%)", "HSL(110, 100%, 50%)", "HSL(140, 100%, 50%)", "HSL(170, 100%, 50%)", "HSL(200, 100%, 50%)", "HSL(230, 100%, 50%)"]

            function randomColor() {
                var randomIndex = Math.floor(Math.random() * mejikuhibiniu.length);

                if (showing.includes(mejikuhibiniu[randomIndex])) {
                    return randomColor();
                } else {
                    showing.push(mejikuhibiniu[randomIndex]);
                    return mejikuhibiniu[randomIndex];
                }
            };
        }
    })
</script>