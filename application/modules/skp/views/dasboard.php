<style>
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


        <div class="row row-cols-1 row-cols-md-2 row-cols-xl-5">
            <div class="col">
                <div class="card rounded-4 bg-gradient-rainbow">
                    <div class="card-body">
                        <div class="d-flex align-items-center justify-content-between">
                            <div>
                                <p class="mb-0 text-white">Total Input Today</p>
                                <h4 class="my-1 text-white"><?= $inputToday[0]->total ?> (pcs)</h4>
                            </div>
                            <div class="fs-1 text-white"><i class="bx bx-arrow-to-bottom"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card rounded-4 bg-gradient-smile">
                    <div class="card-body">
                        <div class="d-flex align-items-center justify-content-between">
                            <div>
                                <p class="mb-0 text-white">Total Input Yesterday</p>
                                <h4 class="my-1 text-white"><?= $inputYesterday[0]->total ?> (pcs)</h4>
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
                                <p class="mb-0 text-white">Work In Progress</p>
                                <h4 class="my-1 text-white"><?= $wipBundleYearly[0]->total ?></h4>
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
                                <p class="mb-0 text-white">Total Output Today</p>
                                <h4 class="my-1 text-white"><?= $outputToday[0]->total ?> (pcs)</h4>
                            </div>
                            <div class="fs-1 text-white"><i class="bx bx-arrow-to-top"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card rounded-4 bg-gradient-smile">
                    <div class="card-body">
                        <div class="d-flex align-items-center justify-content-between">
                            <div>
                                <p class="mb-0 text-white">Total Output Yesterday</p>
                                <h4 class="my-1 text-white"><?= $outputYesterday[0]->total ?> (pcs)</h4>
                            </div>
                            <div class="fs-1 text-white"><i class="bx bx-arrow-to-top"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12 col-lg-6 d-flex">
                <div class="card rounded-4 w-100">
                    <div class="card-body">
                        <div class="d-flex align-items-center mb-3">
                            <div>
                                <h6 class="mb-0">Weekly Input SKP</h6>
                            </div>
                            <div class="dropdown ms-auto">
                            </div>
                        </div>
                        <div class="chart-container-0">
                            <canvas id="chart1"></canvas>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12 col-lg-6 d-flex">
                <div class="card rounded-4 w-100">
                    <div class="card-body">
                        <div class="d-flex align-items-center mb-3">
                            <div>
                                <h6 class="mb-0">Weekly Output SKP</h6>
                            </div>
                            <div class="dropdown ms-auto">
                            </div>
                        </div>
                        <div class="chart-container-0">
                            <canvas id="chart2"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

<script>
    $(document).ready(function() {
        // chart 1
        $.ajax({
            url: "<?= site_url('skp/getInputSkpChart'); ?>",
            type: 'GET',
            dataType: 'JSON'
        }).done(function(data) {
            let date = [];
            let qty_in_cutting = [];

            $.each(data, function(i, item) {
                date.push(item.tgl);
                qty_in_cutting.push(JSON.parse(item.qty_in_cutting));
            });

            var ctx = document.getElementById('chart1').getContext('2d');

            var gradientStroke = ctx.createLinearGradient(0, 0, 0, 300);
            gradientStroke.addColorStop(0, '#08a50e');
            gradientStroke.addColorStop(1, '#cddc35');

            var inputCuttingChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: date,
                    datasets: [{
                        label: 'Qty',
                        data: qty_in_cutting,
                        backgroundColor: gradientStroke,
                        hoverBackgroundColor: gradientStroke,
                        borderColor: "#fff",
                        pointRadius: 6,
                        pointHoverRadius: 6,
                        pointHoverBackgroundColor: "#fff",
                        borderWidth: 2

                    }]
                },
                options: {
                    maintainAspectRatio: false,
                    legend: {
                        display: false,
                        labels: {
                            fontColor: '#ddd',
                            boxWidth: 40
                        }
                    },
                    tooltips: {
                        displayColors: false
                    },
                    scales: {
                        xAxes: [{
                            barPercentage: .6,
                            ticks: {
                                beginAtZero: true,
                                fontColor: '#757575'
                            },
                            gridLines: {
                                display: false,
                                color: "rgba(0, 0, 0, 0.1)"
                            },
                        }],
                        yAxes: [{
                            ticks: {
                                beginAtZero: true,
                                fontColor: '#757575'
                            },
                            gridLines: {
                                display: true,
                                color: "rgba(0, 0, 0, 0.1)"
                            },
                        }]
                    }

                }
            });


        });



        // chart 2
        $.ajax({
            url: "<?= site_url('skp/getOutputSkpChart'); ?>",
            type: 'GET',
            dataType: 'JSON'
        }).done(function(data) {
            let date = [];
            let qty_out_cutting = [];

            $.each(data, function(i, item) {
                date.push(item.tgl);
                qty_out_cutting.push(JSON.parse(item.qty_out_cutting));
            });

            var ctx = document.getElementById('chart2').getContext('2d');

            var gradientStroke = ctx.createLinearGradient(0, 0, 0, 300);
            gradientStroke.addColorStop(0, '#08a50e');
            gradientStroke.addColorStop(1, '#cddc35');

            var outputCuttingChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: date,
                    datasets: [{
                        label: 'Qty',
                        data: qty_out_cutting,
                        backgroundColor: gradientStroke,
                        hoverBackgroundColor: gradientStroke,
                        borderColor: "#fff",
                        pointRadius: 6,
                        pointHoverRadius: 6,
                        pointHoverBackgroundColor: "#fff",
                        borderWidth: 2

                    }]
                },
                options: {
                    maintainAspectRatio: false,
                    legend: {
                        display: false,
                        labels: {
                            fontColor: '#ddd',
                            boxWidth: 40
                        }
                    },
                    tooltips: {
                        displayColors: false
                    },
                    scales: {
                        xAxes: [{
                            barPercentage: .6,
                            ticks: {
                                beginAtZero: true,
                                fontColor: '#757575',
                                mirror: true
                            },
                            gridLines: {
                                display: false,
                                color: "rgba(0, 0, 0, 0.1)"
                            },
                        }],
                        yAxes: [{
                            ticks: {
                                beginAtZero: true,
                                fontColor: '#757575',
                            },
                            gridLines: {
                                display: true,
                                color: "rgba(0, 0, 0, 0.1)"
                            },
                        }]
                    }

                }
            });


        });
    });
</script>