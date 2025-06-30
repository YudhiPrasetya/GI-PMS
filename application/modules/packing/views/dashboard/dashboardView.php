<!--start page wrapper -->
<div class="page-wrapper">
  <div class="page-content">
    <div class="row row-cols-1 row-cols-lg-4">
      <div class="col">
        <a href="in_finish_good_details">
          <div class="card rounded-4 bg-gradient-rainbow bubble position-relative overflow-hidden" style="cursor: pointer;">
            <div class="card-body">
              <div class="d-flex align-items-center justify-content-between mb-0">
                <div class="">
                  <h4 class="mb-0 text-white" id="total_in_fg"></h4>
                  <h5 class="mb-1 text-white" id="total_in_box_fg"></h5>
                  <p class="mb-0 text-white">Total In Finish Good</p>
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
        <a href="out_finish_good_details">
          <div class="card rounded-4 bg-gradient-burning bubble position-relative overflow-hidden" style="cursor: pointer;">
            <div class="card-body">
              <div class="d-flex align-items-center justify-content-between mb-0">
                <div class="">
                  <h4 class="mb-0 text-white" id="total_out_fg"></h4>
                  <h5 class="mb-1 text-white" id="total_out_box_fg"></h5>
                  <p class="mb-0 text-white">Total Out Finish Good</p>
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
                <h6 class="mb-0">Weekly In Finish Good</h6>
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
                <h6 class="mb-0">Weekly Out Finish Good</h6>
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

    <div class="row">
      <div class="col-12 col-lg-6 d-flex">
        <div class="card rounded-4 w-100">
          <div class="card-body">
            <div class="d-flex align-items-center mb-3">
              <div>
                <h6 class="mb-0">Capacity Line</h6>
              </div>

            </div>
            <!-- <div class="chart-container-0"> -->
            <table class="table" id="tableCapacityLine" style="width: 100%">
              <thead>
                <tr>
                  <th class="text-center">Line</th>
                  <th class="text-center">Capacity</th>
                </tr>
              </thead>
            </table>
            <!-- </div> -->
          </div>
        </div>
      </div>
    </div>






  </div>
</div>
<!--end page wrapper -->

<!-- Modal -->
<!-- Modal Customer And Total Order -->
<div class="modal fade" id="progressBarModal" tabindex="-1" aria-labelledby="progressBarModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="progressBarModalLabel">Capacity Line Details</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="mx-3 my-3">

          <table id="tableCapacityLineDetails" class="table table-striped table-hover nowrap table-sm" style="width:100%;">
            <thead>
              <tr>
                <th>No.</th>
                <th>ORC</th>
                <th>Style</th>
                <th>Color</th>
                <th>Size</th>
                <th>No. Box</th>
                <th>Qty</th>
                <th>Barcode</th>
                <th>Location</th>
              </tr>
            </thead>
            <tbody></tbody>
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

    const loadTotalInFinishGood = () => {
      $('#total_in_fg').empty();
      $.ajax({
        url: " <?= site_url('packing/getTotalInFinishGood'); ?>",
        type: 'GET',
        dataType: 'JSON',
        beforeSend: function() {
          $("#total_in_fg").html('...');
        },
      }).done(function(data) {

        $('#total_in_fg').empty();
        $('#total_in_fg').html(numberWithCommas(data[0].total_qty_in_finish_good) + ' pcs');
        $('#total_in_box_fg').html(numberWithCommas(data[0].qty_box) + ' box');

      });
    }

    loadTotalInFinishGood()


    const loadTotalOutFinishGood = () => {
      $('#total_out_fg').empty();
      $.ajax({
        url: " <?= site_url('packing/getTotalOutFinishGood'); ?>",
        type: 'GET',
        dataType: 'JSON',
        beforeSend: function() {
          $("#total_out_fg").html('...');
        },
      }).done(function(data) {
        $('#total_out_fg').empty();
        $('#total_out_fg').html(numberWithCommas(data[0].total_qty_out_finish_good) + ' pcs');
        $('#total_out_box_fg').html(numberWithCommas(data[0].qty_box) + ' box');

      });
    }

    loadTotalOutFinishGood();





    // chart 1
    $.ajax({
      url: "<?= site_url('packing/getTotalInFinishGoodChart'); ?>",
      type: 'GET',
      dataType: 'JSON'
    }).done(function(data) {
      let date = [];
      let qty_in_finish_good = [];

      $.each(data, function(i, item) {
        date.push(item.tgl);
        qty_in_finish_good.push(JSON.parse(item.qty_in_finish_good));
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
            data: qty_in_finish_good,
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
      url: "<?= site_url('packing/getTotalOutFinishGoodChart'); ?>",
      type: 'GET',
      dataType: 'JSON'
    }).done(function(data) {
      let date = [];
      let qty_out_finish_good = [];

      $.each(data, function(i, item) {
        date.push(item.tgl);
        qty_out_finish_good.push(JSON.parse(item.qty_out_finish_good));
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
            data: qty_out_finish_good,
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


    // Capacity Line
    let tableCapacityLine = $('#tableCapacityLine').DataTable({
      scrollX: true,
      lengthMenu: [
        [5, 10, 25, 50],
        [5, 10, 25, 50]
      ],
      order: [],
      ajax: {
        url: '<?= site_url("packing/getCapacityLine"); ?>',
        type: 'GET',
        dataType: 'JSON'
      },
      columns: [{
          'data': 'line',
          'className': 'text-center px-3',
          "width": "100px",
        },
        {
          'className': 'text-center px-3',
          render: function(data, type, row) {
            return `<div class="progress" style="height: 25px; cursor: pointer;" id="progress_bar">
                        <div class="progress-bar" role="progressbar" style="width: ` + row['percentage'] + `%;" aria-valuenow="` + row['max_box_capacity'] + `" aria-valuemin="0" aria-valuemax="` + row['max_box_capacity'] + `">` + row['percentage'] + `% (` + row['total_box'] + ` / ` + row['max_box_capacity'] + `)</div>
                    </div>`
          }
        },

      ],

    });

    $('#tableCapacityLine tbody').on('click', '#progress_bar', function() {
      let line = tableCapacityLine.row($(this).parents('tr')).data().line;

      let tableCapacityLineDetails = $('#tableCapacityLineDetails').DataTable({
        scrollX: true,
        destroy: true,
        ajax: {
          url: '<?= site_url("packing/getCapacityLineDetails"); ?>',
          type: 'GET',
          dataType: 'JSON',
          data: {
            "line": line
          }
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
            'data': 'orc',
            'className': 'text-center px-3'
          },
          {
            'data': 'style',
            'className': 'text-center px-3'
          },
          {
            'data': 'color',
            'className': 'text-center px-3'
          },
          {
            'data': 'size',
            'className': 'text-center px-3'
          },
          {
            'data': 'carton_no',
            'className': 'text-center px-3'
          },
          {
            'data': 'qty_box',
            'className': 'text-center px-3'
          },
          {
            'data': 'barcode',
            'className': 'text-center px-3'
          },
          {
            'data': 'lokasi',
            'className': 'text-center px-3'
          }

        ],


      });

      $("#progressBarModal").on('shown.bs.modal', function() {
        $('#tableCapacityLineDetails').DataTable().columns.adjust();
      });

      $('#progressBarModal').modal("show")
    })






  });
</script>