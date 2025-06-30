<!--start page wrapper -->
<div class="page-wrapper">
  <div class="page-content">
    <div class="row row-cols-1 row-cols-lg-4">
      <div class="col">
        <a href="input_trimstore">
          <div class="card rounded-4 bg-gradient-rainbow bubble position-relative overflow-hidden" style="cursor: pointer;">
            <div class="card-body">
              <div class="d-flex align-items-center justify-content-between mb-0">
                <div class="">
                  <h4 class="mb-0 text-white" id="total_input_cutting"></h4>
                  <p class="mb-0 text-white">Total Input Trimstore</p>
                </div>
                <div class="fs-1 text-white">
                  <i class='bx bx-down-arrow-circle'></i>
                </div>
              </div>
              <small class="mb-0 text-white year"></small>
            </div>
          </div>
        </a>
      </div>
      <div class="col">
        <a href="output_trimstore">
          <div class="card rounded-4 bg-gradient-burning bubble position-relative overflow-hidden" style="cursor: pointer;">
            <div class="card-body">
              <div class="d-flex align-items-center justify-content-between mb-0">
                <div class="">
                  <h4 class="mb-0 text-white" id="total_output_cutting"></h4>
                  <p class="mb-0 text-white">Total Output Trimstore</p>
                </div>
                <div class="fs-1 text-white">
                  <i class='bx bx-up-arrow-circle'></i>
                </div>
              </div>
              <small class="mb-0 text-white year"></small>
            </div>
          </div>
        </a>
      </div>
      <!-- <div class="col">
        <div class="card rounded-4 bg-gradient-moonlit bubble position-relative overflow-hidden" id="btn_total_shipped" style="cursor: pointer;">
          <div class="card-body">
            <div class="d-flex align-items-center justify-content-between mb-0">
              <div class="">
                <h4 class="mb-0 text-white" id="total_shipped"></h4>
                <p class="mb-0 text-white">Total Shipped</p>
              </div>
              <div class="fs-1 text-white">
                <i class='bx bxs-ship'></i>
              </div>
            </div>
            <small class="mb-0 text-white year"></small>
          </div>
        </div>
      </div> -->
      <!-- <div class="col">
        <div class="card rounded-4 bg-gradient-cosmic bubble position-relative overflow-hidden">
          <div class="card-body">
            <div class="d-flex align-items-center justify-content-between mb-0">
              <div class="">
                <h4 class="mb-0 text-white">22%</h4>
                <p class="mb-0 text-white">Total Growth</p>
              </div>
              <div class="fs-1 text-white">
                <i class='bx bx-line-chart-down'></i>
              </div>
            </div>
            <small class="mb-0 text-white">+2.6% Since Last Week</small>
          </div>
        </div>
      </div> -->
    </div><!--end row-->


    <div class="row">
      <!-- <div class="col-12 col-lg-8 d-flex">
        <div class="card rounded-4 w-100">
          <div class="card-body">
            <div class="d-flex align-items-center mb-3">
              <div>
                <h6 class="mb-0">Sales Overview</h6>
              </div>
              <div class="dropdown ms-auto">
                <a class="dropdown-toggle dropdown-toggle-nocaret" href="#" data-bs-toggle="dropdown"><i class='bx bx-dots-horizontal-rounded font-22 text-option'></i>
                </a>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="javascript:;">Action</a>
                  </li>
                  <li><a class="dropdown-item" href="javascript:;">Another action</a>
                  </li>
                  <li>
                    <hr class="dropdown-divider">
                  </li>
                  <li><a class="dropdown-item" href="javascript:;">Something else here</a>
                  </li>
                </ul>
              </div>
            </div>
            <div class="chart-container-0">
              <canvas id="chart1"></canvas>
            </div>
          </div>
        </div>
      </div> -->
      <div class="col-12 col-lg-6 d-flex">
        <div class="card rounded-4 w-100">
          <div class="card-body">
            <div class="d-flex align-items-center mb-3">
              <div>
                <h6 class="mb-0">Weekly Input Trimstore</h6>
              </div>
              <div class="dropdown ms-auto">
                <!-- <a class="dropdown-toggle dropdown-toggle-nocaret" href="#" data-bs-toggle="dropdown"><i class='bx bx-dots-horizontal-rounded font-22 text-option'></i>
                </a>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="javascript:;">Action</a>
                  </li>
                  <li><a class="dropdown-item" href="javascript:;">Another action</a>
                  </li>
                  <li>
                    <hr class="dropdown-divider">
                  </li>
                  <li><a class="dropdown-item" href="javascript:;">Something else here</a>
                  </li>
                </ul> -->
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
                <h6 class="mb-0">Weekly Output Trimstore</h6>
              </div>
              <div class="dropdown ms-auto">
                <!-- <a class="dropdown-toggle dropdown-toggle-nocaret" href="#" data-bs-toggle="dropdown"><i class='bx bx-dots-horizontal-rounded font-22 text-option'></i>
                      </a>
                      <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="javascript:;">Action</a>
                        </li>
                        <li><a class="dropdown-item" href="javascript:;">Another action</a>
                        </li>
                        <li>
                          <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href="javascript:;">Something else here</a>
                        </li>
                      </ul> -->
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
<!--end page wrapper -->

<!-- Modal -->
<!-- Modal Customer And Total Order -->
<div class="modal fade" id="customersAndTotalOrdersModal" tabindex="-1" aria-labelledby="customersAndTotalOrdersModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="customersAndTotalOrdersModalLabel">Orders Details</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="mx-3 my-3">

          <table id="customersAndTotalOrdersTable" class="table table-striped table-hover nowrap table-sm" style="width:100%;">
            <thead>
              <tr>
                <th>No.</th>
                <th>Customers</th>
                <th>Qty Orders</th>
              </tr>
            </thead>
            <tbody></tbody>
            <tfoot>
              <tr>
                <th colspan="2">Total</th>
                <th></th>
              </tr>
            </tfoot>
          </table>

        </div>
      </div>
      <!-- <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div> -->
    </div>
  </div>
</div>

<div class="modal fade" id="totalShippedModal" tabindex="-1" aria-labelledby="totalShippedModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="totalShippedModalLabel">Shipped Details</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="mx-3 my-3">

          <table id="totalShippedTable" class="table table-striped table-hover nowrap table-sm" style="width:100%;">
            <thead>
              <tr>
                <th>No.</th>
                <th>Customers</th>
                <th>Qty Shipped</th>
              </tr>
            </thead>
            <tbody></tbody>
            <tfoot>
              <tr>
                <th colspan="2">Total</th>
                <th></th>
              </tr>
            </tfoot>
          </table>

        </div>
      </div>
      <!-- <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div> -->
    </div>
  </div>
</div>



<script>
  $(document).ready(function() {
    const numberWithCommas = (x) => {
      return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
    }

    // const d = new Date();
    // let year = d.getFullYear();
    // $('.year').html(year);

    // Date Now
    const dates = new Date();
    const yyyy = dates.getFullYear();
    let mm = dates.getMonth() + 1; // Months start at 0!
    let dd = dates.getDate();

    if (dd < 10) dd = '0' + dd;
    if (mm < 10) mm = '0' + mm;

    const formattedDates = dd + '-' + mm + '-' + yyyy;

    $('.year').html(formattedDates);

    const loadTotalInputCutting = () => {
      $('#total_input_cutting').empty();
      $.ajax({
        url: " <?= site_url('cutting/getTotalInputCutting'); ?>",
        type: 'GET',
        dataType: 'JSON',
        beforeSend: function() {
          $("#total_input_cutting").html('...');
        },
      }).done(function(data) {

        $('#total_input_cutting').empty();
        $('#total_input_cutting').html(numberWithCommas(data[0].total_input_cutting) + ' pcs');

      });
    }

    loadTotalInputCutting()


    const loadTotalOutputCuting = () => {
      $('#total_output_cutting').empty();
      $.ajax({
        url: " <?= site_url('cutting/getTotalOutputCutting'); ?>",
        type: 'GET',
        dataType: 'JSON',
        beforeSend: function() {
          $("#total_output_cutting").html('...');
        },
      }).done(function(data) {
        $('#total_output_cutting').empty();
        $('#total_output_cutting').html(numberWithCommas(data[0].total_output_cutting) + ' pcs');

      });
    }

    loadTotalOutputCuting();










    // chart 1
    $.ajax({
      url: "<?= site_url('cutting/getInputCuttingChart'); ?>",
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
          // animation: {
          //   duration: 1,
          //   onComplete: function() {
          //     var chartInstance = this.chart,
          //       ctx = chartInstance.ctx;

          //     ctx.font = Chart.helpers.fontString(Chart.defaults.global.defaultFontSize, Chart.defaults.global.defaultFontStyle, Chart.defaults.global.defaultFontFamily);
          //     ctx.textAlign = 'center';
          //     ctx.textBaseline = 'bottom';

          //     this.data.datasets.forEach(function(dataset, i) {
          //       var meta = chartInstance.controller.getDatasetMeta(i);
          //       meta.data.forEach(function(bar, index) {
          //         var data = dataset.data[index];
          //         ctx.fillText(data, bar._model.x, bar._model.y - 5);
          //       });
          //     });
          //   }
          // },
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
      url: "<?= site_url('cutting/getOutputCuttingChart'); ?>",
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
          // hover: {
          //   animationDuration: 0
          // },
          // animation: {
          //   duration: 1,
          //   onComplete: function() {
          //     var chartInstance = this.chart,
          //       ctx = chartInstance.ctx;

          //     ctx.font = Chart.helpers.fontString(Chart.defaults.global.defaultFontSize, Chart.defaults.global.defaultFontStyle, Chart.defaults.global.defaultFontFamily);
          //     ctx.textAlign = 'center';
          //     ctx.textBaseline = 'bottom';

          //     this.data.datasets.forEach(function(dataset, i) {
          //       var meta = chartInstance.controller.getDatasetMeta(i);
          //       meta.data.forEach(function(bar, index) {
          //         var data = dataset.data[index];
          //         ctx.fillText(data, bar._model.x, bar._model.y - 5);
          //       });
          //     });
          //   }
          // },
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
                // max: Math.max(...qty_out_cutting) + ,
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