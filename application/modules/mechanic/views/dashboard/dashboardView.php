<!--start page wrapper -->
<div class="page-wrapper">
  <div class="page-content">
    <div class="row row-cols-1 row-cols-lg-4">
      <div class="col">
        <a href="machine_repairing">
          <div class="card rounded-4 bg-gradient-rainbow bubble position-relative overflow-hidden" style="cursor: pointer;">
            <div class="card-body">
              <div class="d-flex align-items-center justify-content-between mb-0">
                <div class="">
                  <h4 class="mb-0 text-white" id="machine_repairing"></h4>
                  <p class="mb-0 text-white">Machine Repairing</p>
                </div>
                <div class="fs-1 text-white">
                  <i class='bx bx-cog'></i>
                </div>
              </div>
              <small class="mb-0 text-white year"></small>
            </div>
          </div>
        </a>
      </div>
      <div class="col">
        <a href="machine_waiting">
          <div class="card rounded-4 bg-gradient-burning bubble position-relative overflow-hidden" style="cursor: pointer;">
            <div class="card-body">
              <div class="d-flex align-items-center justify-content-between mb-0">
                <div class="">
                  <h4 class="mb-0 text-white" id="machine_waiting"></h4>
                  <p class="mb-0 text-white">Machine Waiting</p>
                </div>
                <div class="fs-1 text-white">
                  <i class='bx bxs-hourglass'></i>
                </div>
              </div>
              <small class="mb-0 text-white year"></small>
            </div>
          </div>
        </a>
      </div>
      <div class="col">
        <a href="machine_breakdown_monitoring">
          <div class="card rounded-4 bg-gradient-moonlit bubble position-relative overflow-hidden" id="btn_total_shipped" style="cursor: pointer;">
            <div class="card-body">
              <div class="d-flex align-items-center justify-content-between mb-0">
                <div class="">
                  <h4 class="mb-0 text-white" id="total_repairing_or_waiting"></h4>
                  <p class="mb-0 text-white">Total Repairing & Waiting</p>
                </div>
                <div class="fs-1 text-white">
                  <i class='bx bx-food-menu'></i>
                </div>
              </div>
              <small class="mb-0 text-white year"></small>
            </div>
          </div>
        </a>
      </div>
      <div class="col">
        <a href="master_user">
          <div class="card rounded-4 bg-gradient-cosmic bubble position-relative overflow-hidden">
            <div class="card-body">
              <div class="d-flex align-items-center justify-content-between mb-0">
                <div class="">
                  <h4 class="mb-0 text-white" id="active_mechanics"></h4>
                  <p class="mb-0 text-white">Active Mechanics</p>
                </div>
                <div class="fs-1 text-white">
                  <i class='bx bx-user'></i>
                </div>
              </div>
              <small class="mb-0 text-white year"></small>
            </div>
          </div>
        </a>
      </div>
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
      <div class="col-12 col-lg-12 d-flex">
        <div class="card rounded-4 w-100">
          <div class="card-body">
            <div class="d-flex align-items-center mb-3">
              <div>
                <h6 class="mb-0" id="card1"></h6>
              </div>
              <div class="dropdown ms-auto">
                <input type="date" class="form-control" id="inputDate" value="<?php echo date("Y-m-d"); ?>">
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
            <div class="chart-container-0" style="height: auto;">
              <div class="row mx-3">
                <div class="col-lg-12">
                  <canvas id="chart" style="position: relative; height:50vh; width:80vw"></canvas>
                </div>
              </div>

            </div>
          </div>
        </div>
      </div>
    </div>




  </div>
</div>
<!--end page wrapper -->

<!-- Modal -->


<script>
  $(document).ready(function() {
    const numberWithCommas = (x) => {
      return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
    }

    // Years
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

    $('#card1').html('Daily Total Machine Breakdown (' + formattedDates + ')')
    $('.year').html(formattedDates);







    const loadMachineRepairingOrWaiting = () => {
      $('#total_repairing_or_waiting').empty();
      $.ajax({
        url: " <?= site_url('mechanic/ajax_count_all_machines'); ?>",
        type: 'GET',
        dataType: 'JSON',
        beforeSend: function() {
          $("#total_repairing_or_waiting").html('...');
        },
      }).done(function(data) {

        $('#total_repairing_or_waiting').empty();
        $('#total_repairing_or_waiting').html(numberWithCommas(data.countLine));

      });
    }

    loadMachineRepairingOrWaiting()


    const loadMachineRepairing = () => {
      $('#machine_repairing').empty();
      $.ajax({
        url: " <?= site_url('mechanic/ajax_count_repairing_machines'); ?>",
        type: 'GET',
        dataType: 'JSON',
        beforeSend: function() {
          $("#machine_repairing").html('...');
        },
      }).done(function(data) {

        $('#machine_repairing').empty();
        $('#machine_repairing').html(numberWithCommas(data.countLine));

      });
    }

    loadMachineRepairing()


    const loadMachineWaiting = () => {
      $('#machine_waiting').empty();
      $.ajax({
        url: " <?= site_url('mechanic/ajax_count_waiting_machines'); ?>",
        type: 'GET',
        dataType: 'JSON',
        beforeSend: function() {
          $("#machine_waiting").html('...');
        },
      }).done(function(data) {

        $('#machine_waiting').empty();
        $('#machine_waiting').html(numberWithCommas(data.countLine));

      });
    }

    loadMachineWaiting()

    const loadActiveMechanics = () => {
      $('#active_mechanics').empty();
      $.ajax({
        url: " <?= site_url('mechanic/getActiveMechanics'); ?>",
        type: 'GET',
        dataType: 'JSON',
        beforeSend: function() {
          $("#active_mechanics").html('...');
        },
      }).done(function(data) {
        $('#active_mechanics').empty();
        $('#active_mechanics').html(numberWithCommas(data[0].count_active_mechanics));

      });
    }

    loadActiveMechanics()


    setInterval(loadMachineRepairingOrWaiting, 15000);
    setInterval(loadMachineRepairing, 15000);
    setInterval(loadMachineWaiting, 15000);
    // setInterval(loadActiveMechanics, 10000);


    // let showing = [];

    function randomColor() {
      return "hsl(" + 360 * Math.random() + ',' +
        (10 + 70 * Math.random()) + '%,' +
        (55 + 10 * Math.random()) + '%)'
    };

    // let chart;
    let dateLoad = $('#inputDate').val();
    showDailyChart(dateLoad);

    let dailyChart;
    // On change date
    $('#inputDate').change(function() {
      dailyChart.destroy();

      let date = $(this).val();

      showDailyChart(date);

      const dates = new Date(date);
      const yyyy = dates.getFullYear();
      let mm = dates.getMonth() + 1; // Months start at 0!
      let dd = dates.getDate();

      if (dd < 10) dd = '0' + dd;
      if (mm < 10) mm = '0' + mm;

      const formattedDates = dd + '-' + mm + '-' + yyyy;

      $('#card1').html('Daily Total Machine Breakdown (' + formattedDates + ')')
    });









    function showDailyChart(date) {
      // chart.destroy();

      $.ajax({
        url: "<?= site_url('mechanic/getChartMachineBreakdown'); ?>",
        type: 'GET',
        dataType: 'JSON',
        data: {
          'date': date
        },
      }).done(function(data) {
        let machine_type = [];
        let count_machine_type = [];

        $.each(data, function(i, item) {
          machine_type.push(item.machine_type);
          count_machine_type.push(JSON.parse(item.count_machine_type));
        });

        var ctx = document.getElementById('chart').getContext('2d');

        var gradientStroke = ctx.createLinearGradient(0, 0, 0, 300);
        gradientStroke.addColorStop(0, '#08a50e');
        gradientStroke.addColorStop(1, '#cddc35');

        dailyChart = new Chart(ctx, {
          type: 'bar',
          data: {
            labels: machine_type,
            datasets: [{
              label: 'Machine Breakdown',
              data: count_machine_type,
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
                barPercentage: .8,
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
                  fontColor: '#757575',
                  // callback: function(value, index, ticks) {
                  //   return value;
                  // }
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
    }

    // setInterval(showDailyChart, 30000);
    // setInterval(function() {
    //   showDailyChart(date)
    // }, 5000);












  });
</script>