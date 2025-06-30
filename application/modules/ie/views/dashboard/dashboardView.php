<!--start page wrapper -->
<div class="page-wrapper">
  <div class="page-content">
    <div class="row row-cols-1 row-cols-lg-3">
      <div class="col">
        <a href="master_sam">
          <div class="card rounded-4 bg-gradient-rainbow bubble position-relative overflow-hidden" style="cursor: pointer;">
            <div class="card-body">
              <div class="d-flex align-items-center justify-content-between mb-0">
                <div class="">
                  <h4 class="mb-0 text-white" id="total_master_sam_new"></h4>
                  <p class="mb-0 text-white">Total Master SAM(New)</p>
                </div>
                <div class="fs-1 text-white">
                  <i class='bx bx-hive'></i>
                </div>
              </div>
              <small class="mb-0 text-white year"></small>
            </div>
          </div>
        </a>
      </div>
      <div class="col">
        <a href="master_sam">
          <div class="card rounded-4 bg-gradient-burning bubble position-relative overflow-hidden" style="cursor: pointer;">
            <div class="card-body">
              <div class="d-flex align-items-center justify-content-between mb-0">
                <div class="">
                  <h4 class="mb-0 text-white" id="total_master_sam"></h4>
                  <p class="mb-0 text-white">Total Master SAM</p>
                </div>
                <div class="fs-1 text-white">
                  <i class='bx bx-hive'></i>
                </div>
              </div>
              <small class="mb-0 text-white year"></small>
            </div>
          </div>
        </a>
      </div>
      <!-- <div class="col">
        <a href="master_sam_new">
          <div class="card rounded-4 bg-gradient-burning bubble position-relative overflow-hidden" style="cursor: pointer;">
            <div class="card-body">
              <div class="d-flex align-items-center justify-content-between mb-0">
                <div class="">
                  <h4 class="mb-0 text-white" id="total_master_sam_new"></h4>
                  <p class="mb-0 text-white">Total Master SAM (New)</p>
                </div>
                <div class="fs-1 text-white">
                  <i class='bx bx-hive'></i>
                </div>
              </div>
              <small class="mb-0 text-white year"></small>
            </div>
          </div>
        </a>
      </div> -->
      <!-- <div class="col">
        <a href="machine_breakdown_monitoring">
          <div class="card rounded-4 bg-gradient-moonlit bubble position-relative overflow-hidden" style="cursor: pointer;">
            <div class="card-body">
              <div class="d-flex align-items-center justify-content-between mb-0">
                <div class="">
                  <h4 class="mb-0 text-white" id="total_master_sam_old"></h4>
                  <p class="mb-0 text-white">Total Master SAM (Old)</p>
                </div>
                <div class="fs-1 text-white">
                  <i class='bx bx-hive'></i>
                </div>
              </div>
              <small class="mb-0 text-white year"></small>
            </div>
          </div>
        </a>
      </div> -->
      <!-- <div class="col">
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
      <!-- <div class="col-12 col-lg-12 d-flex">
        <div class="card rounded-4 w-100">
          <div class="card-body">
            <div class="d-flex align-items-center mb-3">
              <div>
                <h6 class="mb-0" id="card1"></h6>
              </div>
              <div class="dropdown ms-auto">
                <input type="date" class="form-control" id="inputDate" value="<?php echo date("Y-m-d"); ?>">
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
            <div class="chart-container-0" style="height: auto;">
              <div class="row mx-3">
                <div class="col-lg-12">
                  <canvas id="chart" style="position: relative; height:50vh; width:80vw"></canvas>
                </div>
              </div>

            </div>
          </div>
        </div>
      </div> -->
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
    const d = new Date();
    let year = d.getFullYear();
    $('.year').html(year);

    //   // Date Now
    //   const dates = new Date();
    //   const yyyy = dates.getFullYear();
    //   let mm = dates.getMonth() + 1; // Months start at 0!
    //   let dd = dates.getDate();

    //   if (dd < 10) dd = '0' + dd;
    //   if (mm < 10) mm = '0' + mm;

    //   const formattedDates = dd + '-' + mm + '-' + yyyy;

    //   $('#card1').html('Daily Total Machine Breakdown (' + formattedDates + ')')
    //   $('.year').html(formattedDates);







    const loadTotalMasterSam = () => {
      $('#total_master_sam').empty();
      $.ajax({
        url: " <?= site_url('ie/getCountMasterSam'); ?>",
        type: 'GET',
        dataType: 'JSON',
        beforeSend: function() {
          $("#total_master_sam").html('...');
        },
      }).done(function(data) {

        $('#total_master_sam').empty();
        $('#total_master_sam').html(numberWithCommas(data));

      });
    }

    loadTotalMasterSam();

    const loadTotalMasterSamNew = () => {
      $('#total_master_sam_new').empty();
      $.ajax({
        url: " <?= site_url('ie/getCountMasterSam'); ?>",
        type: 'GET',
        dataType: 'JSON',
        beforeSend: function() {
          $("#total_master_sam_new").html('...');
        },
      }).done(function(data) {

        $('#total_master_sam_new').empty();
        $('#total_master_sam_new').html(numberWithCommas(data));

      });
    }

    loadTotalMasterSamNew();



    // const loadTotalMasterSamNew = () => {
    //   $('#total_master_sam_new').empty();
    //   $.ajax({
    //     url: " <?= site_url('ie/getCountMasterSamNew'); ?>",
    //     type: 'GET',
    //     dataType: 'JSON',
    //     beforeSend: function() {
    //       $("#total_master_sam_new").html('...');
    //     },
    //   }).done(function(data) {

    //     $('#total_master_sam_new').empty();
    //     $('#total_master_sam_new').html(numberWithCommas(data));

    //   });
    // }
    loadTotalMasterSamNew();
    const loadTotalMasterSamOld = () => {
      $('#total_master_sam_old').empty();
      $.ajax({
        url: " <?= site_url('ie/getCountMasterSamNew'); ?>",
        type: 'GET',
        dataType: 'JSON',
        beforeSend: function() {
          $("#total_master_sam_old").html('...');
        },
      }).done(function(data) {

        $('#total_master_sam_old').empty();
        $('#total_master_sam_old').html(numberWithCommas(data));

      });
    }

    loadTotalMasterSamOld();






















  });
</script>