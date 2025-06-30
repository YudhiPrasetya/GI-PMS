<!--start page wrapper -->
<div class="page-wrapper">
  <div class="page-content">
    <div class="row row-cols-1 row-cols-lg-4">
      <div class="col">
        <a href="input_molding">
          <div class="card rounded-4 bg-gradient-rainbow bubble position-relative overflow-hidden" style="cursor: pointer;">
            <div class="card-body">
              <div class="d-flex align-items-center justify-content-between mb-0">
                <div class="">
                  <h4 class="mb-0 text-white" id="total_input_molding"></h4>
                  <p class="mb-0 text-white">Total Input Molding</p>
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
        <a href="output_molding">
          <div class="card rounded-4 bg-gradient-burning bubble position-relative overflow-hidden" style="cursor: pointer;">
            <div class="card-body">
              <div class="d-flex align-items-center justify-content-between mb-0">
                <div class="">
                  <h4 class="mb-0 text-white" id="total_output_molding"></h4>
                  <p class="mb-0 text-white">Total Output Molding</p>
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
                <h6 class="mb-0">Weekly Input Molding</h6>
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
                <h6 class="mb-0">Weekly Output Molding</h6>
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

    const loadTotalInputMolding = () => {
      $('#total_input_molding').empty();
      $.ajax({
        url: " <?= site_url('molding/getTotalInputMolding'); ?>",
        type: 'GET',
        dataType: 'JSON',
        beforeSend: function() {
          $("#total_input_molding").html('...');
        },
      }).done(function(data) {

        $('#total_input_molding').empty();
        $('#total_input_molding').html(numberWithCommas(data[0].total_input_molding) + ' pcs');

      });
    }

    loadTotalInputMolding()


    const loadTotalOutputMolding = () => {
      $('#total_output_molding').empty();
      $.ajax({
        url: " <?= site_url('molding/getTotalOutputMolding'); ?>",
        type: 'GET',
        dataType: 'JSON',
        beforeSend: function() {
          $("#total_output_molding").html('...');
        },
      }).done(function(data) {
        $('#total_output_molding').empty();
        $('#total_output_molding').html(numberWithCommas((parseInt(data[0].outermold) + parseInt(data[0].midmold) + parseInt(data[0].linningmold))) + ' pcs');

      });
    }

    loadTotalOutputMolding();










    // chart 1
    $.ajax({
      url: "<?= site_url('molding/getInputMoldingChart'); ?>",
      type: 'GET',
      dataType: 'JSON'
    }).done(function(data) {
      let date = [];
      let qty_in = [];

      $.each(data, function(i, item) {
        date.push(item.tgl);
        qty_in.push(JSON.parse(item.qty_in_molding));
      });

      var ctx = document.getElementById('chart1').getContext('2d');

      var gradientStroke = ctx.createLinearGradient(0, 0, 0, 300);
      gradientStroke.addColorStop(0, '#08a50e');
      gradientStroke.addColorStop(1, '#cddc35');

      var inputMoldingChart = new Chart(ctx, {
        type: 'bar',
        data: {
          labels: date,
          datasets: [{
            label: 'Qty',
            data: qty_in,
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
      url: "<?= site_url('molding/getOutputMoldingChart'); ?>",
      type: 'GET',
      dataType: 'JSON'
    }).done(function(data) {
      let date = [];
      let qty_out = [];

      $.each(data, function(i, item) {
        date.push(item.tgl);
        qty_out.push(JSON.parse(item.qty_out_molding));
      });

      var ctx = document.getElementById('chart2').getContext('2d');

      var gradientStroke = ctx.createLinearGradient(0, 0, 0, 300);
      gradientStroke.addColorStop(0, '#08a50e');
      gradientStroke.addColorStop(1, '#cddc35');

      var outputMoldingChart = new Chart(ctx, {
        type: 'bar',
        data: {
          labels: date,
          datasets: [{
            label: 'Qty',
            data: qty_out,
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





  });
</script>