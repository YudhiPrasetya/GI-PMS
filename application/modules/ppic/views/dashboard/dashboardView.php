<!--start page wrapper -->
<div class="page-wrapper">
  <div class="page-content">
    <div class="row row-cols-1 row-cols-lg-4">
      <div class="col">
        <div class="card rounded-4 bg-gradient-rainbow bubble position-relative overflow-hidden btn_customers_and_total_orders" style="cursor: pointer;">
          <div class="card-body">
            <div class="d-flex align-items-center justify-content-between mb-0">
              <div class="">
                <h4 class="mb-0 text-white" id="total_orders"></h4>
                <p class="mb-0 text-white">Total Orders</p>
              </div>
              <div class="fs-1 text-white">
                <i class='bx bx-cart'></i>
              </div>
            </div>
            <small class="mb-0 text-white year"></small>
          </div>
        </div>
      </div>
      <div class="col">
        <div class="card rounded-4 bg-gradient-burning bubble position-relative overflow-hidden btn_customers_and_total_orders" style="cursor: pointer;">
          <div class="card-body">
            <div class="d-flex align-items-center justify-content-between mb-0">
              <div class="">
                <h4 class="mb-0 text-white" id="total_customers"></h4>
                <p class="mb-0 text-white">Customers</p>
              </div>
              <div class="fs-1 text-white">
                <i class='bx bx-group'></i>
              </div>
            </div>
            <small class="mb-0 text-white year"></small>
          </div>
        </div>
      </div>
      <div class="col">
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
      </div>
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
                <h6 class="mb-0">Monthly Orders</h6>
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
                <h6 class="mb-0">Monthly Shipped</h6>
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

    const d = new Date();
    let year = d.getFullYear();
    $('.year').html(year);

    const loadTotalOrders = () => {
      $('#total_orders').empty();
      $.ajax({
        url: " <?= site_url('ppic/getTotalOrders'); ?>",
        type: 'GET',
        dataType: 'JSON',
        beforeSend: function() {
          $("#total_orders").html('...');
        },
      }).done(function(data) {

        $('#total_orders').empty();
        $('#total_orders').html(numberWithCommas(data[0].total_orders));

      });
    }

    loadTotalOrders()


    const loadTotalCustomers = () => {
      $('#total_customers').empty();
      $.ajax({
        url: " <?= site_url('ppic/getTotalCustomers'); ?>",
        type: 'GET',
        dataType: 'JSON',
        beforeSend: function() {
          $("#total_customers").html('...');
        },
      }).done(function(data) {
        $('#total_customers').empty();
        $('#total_customers').html(numberWithCommas(data));

      });
    }

    loadTotalCustomers()

    const loadTotalShipped = () => {
      $('#total_shipped').empty();
      $.ajax({
        url: " <?= site_url('ppic/getTotalShipped'); ?>",
        type: 'GET',
        dataType: 'JSON',
        beforeSend: function() {
          $("#total_shipped").html('...');
        },
      }).done(function(data) {
        $('#total_shipped').empty();
        $('#total_shipped').html(numberWithCommas(data[0].total_shipped));

      });
    }

    loadTotalShipped()

    $('.btn_customers_and_total_orders').on('click', function() {
      let customersAndTotalOrdersTable = $('#customersAndTotalOrdersTable').DataTable({
        autoWidth: false,
        info: false,
        searching: false,
        paging: false,
        scrollX: true,
        fixedHeader: true,
        lengthMenu: false,
        destroy: true,
        ajax: {
          url: '<?= site_url('ppic/getCustomersAndTotalOrders'); ?>',
          type: 'GET'
        },
        columns: [{
            "data": null,
            "className": "text-center",
            "orderable": true,
            "searchable": false,
            // "width": "100px",
            "render": function(data, type, row, meta) {
              return meta.row + meta.settings._iDisplayStart + 1;
            }
          },
          {
            'data': 'buyer',
            'className': 'text-center px-2'
          },
          {
            'data': 'total_orders',
            'className': 'text-center px-2',
            'render': function(data, type, row, meta) {
              return numberWithCommas(data)
            }
          },
          // {
          //   'className': 'text-center',
          //   render: function(data, type, row) {
          //     return row['total_orders']
          //   }
          // },
        ],

        footerCallback: function(row, data, start, end, display) {
          let api = this.api();

          // Remove the formatting to get integer data for summation
          let intVal = function(i) {
            return typeof i === 'string' ?
              i.replace(/[\$,]/g, '') * 1 :
              typeof i === 'number' ?
              i :
              0;
          };

          // Total over all pages
          total = api
            .column(2)
            .data()
            .reduce((a, b) => intVal(a) + intVal(b), 0);

          // Update footer
          api.column(2).footer().innerHTML =
            numberWithCommas(total)
        }


      });

      $("#customersAndTotalOrdersModal").on('shown.bs.modal', function() {
        $('#customersAndTotalOrdersTable').DataTable().columns.adjust();
      });

      $("#customersAndTotalOrdersModal").modal("show");
    });

    $('#btn_total_shipped').on('click', function() {
      let totalShippedTable = $('#totalShippedTable').DataTable({
        autoWidth: false,
        info: false,
        searching: false,
        paging: false,
        scrollX: true,
        fixedHeader: true,
        lengthMenu: false,
        destroy: true,
        ajax: {
          url: '<?= site_url('ppic/getTotalShippedDetails'); ?>',
          type: 'GET'
        },
        columns: [{
            "data": null,
            "className": "text-center",
            "orderable": true,
            "searchable": false,
            // "width": "100px",
            "render": function(data, type, row, meta) {
              return meta.row + meta.settings._iDisplayStart + 1;
            }
          },
          {
            'data': 'buyer',
            'className': 'text-center px-2'
          },
          {
            'data': 'total_shipped',
            'className': 'text-center px-2',
            'render': function(data, type, row, meta) {
              return numberWithCommas(data)
            }
          },
          // {
          //   'className': 'text-center',
          //   render: function(data, type, row) {
          //     return row['total_orders']
          //   }
          // },
        ],

        footerCallback: function(row, data, start, end, display) {
          let api = this.api();

          // Remove the formatting to get integer data for summation
          let intVal = function(i) {
            return typeof i === 'string' ?
              i.replace(/[\$,]/g, '') * 1 :
              typeof i === 'number' ?
              i :
              0;
          };

          // Total over all pages
          total = api
            .column(2)
            .data()
            .reduce((a, b) => intVal(a) + intVal(b), 0);

          // Update footer
          api.column(2).footer().innerHTML =
            numberWithCommas(total)
        }


      });

      $("#totalShippedModal").on('shown.bs.modal', function() {
        $('#totalShippedTable').DataTable().columns.adjust();
      });

      $("#totalShippedModal").modal("show");
    });








    // chart 1
    $.ajax({
      url: "<?= site_url('ppic/getTotalOrdersPerMonth'); ?>",
      type: 'GET',
      dataType: 'JSON'
    }).done(function(data) {
      let month = [];
      let qty_orders = [];

      $.each(data, function(i, item) {
        month.push(item.month);
        qty_orders.push(JSON.parse(item.qty_orders));
      });

      var ctx = document.getElementById('chart1').getContext('2d');

      var gradientStroke = ctx.createLinearGradient(0, 0, 0, 300);
      gradientStroke.addColorStop(0, '#08a50e');
      gradientStroke.addColorStop(1, '#cddc35');

      var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
          labels: month,
          datasets: [{
            label: 'Orders',
            data: qty_orders,
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
              barPercentage: .4,
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
      url: "<?= site_url('ppic/getTotalShippedPerMonth'); ?>",
      type: 'GET',
      dataType: 'JSON'
    }).done(function(data) {
      let month = [];
      let qty_shipped = [];

      $.each(data, function(i, item) {
        month.push(item.month);
        qty_shipped.push(JSON.parse(item.qty_shipped));
      });

      var ctx = document.getElementById('chart2').getContext('2d');

      var gradientStroke = ctx.createLinearGradient(0, 0, 0, 300);
      gradientStroke.addColorStop(0, '#08a50e');
      gradientStroke.addColorStop(1, '#cddc35');

      var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
          labels: month,
          datasets: [{
            label: 'Shipped',
            data: qty_shipped,
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
              barPercentage: .4,
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