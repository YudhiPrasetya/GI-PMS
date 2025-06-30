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

    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
      <div class="breadcrumb-title pe-3">Manager</div>
      <div class="ps-3">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb mb-0 p-0">
            <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">Date Range Line Per Hours</li>
          </ol>
        </nav>
      </div>
      <!-- <div class="ms-auto">
        <div class="btn-group">
          <button type="button" class="btn btn-primary">Settings</button>
          <button type="button" class="btn btn-primary split-bg-primary dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown"> <span class="visually-hidden">Toggle Dropdown</span>
          </button>
          <div class="dropdown-menu dropdown-menu-right dropdown-menu-lg-end"> <a class="dropdown-item" href="javascript:;">Action</a>
            <a class="dropdown-item" href="javascript:;">Another action</a>
            <a class="dropdown-item" href="javascript:;">Something else here</a>
            <div class="dropdown-divider"></div> <a class="dropdown-item" href="javascript:;">Separated link</a>
          </div>
        </div>
      </div> -->
    </div>
    <!--end breadcrumb-->
    <h6 class="mb-0 text-uppercase">Date Range Line Per Hours</h6>
    <hr />


    <div class="card">
      <div class="card-body">
        <div class="row my-3 mx-2">
          <div class="col-lg-12">
            <div class="row">
              <div class="col-lg-6">
                <div class="row g-3 align-items-center mb-3">
                  <div class="col-lg-2">
                    <label for="date" class="col-form-label">Select Date</label>
                  </div>
                  <div class="col-lg-4">
                    <input type="date" class="form-control" id="date" value="<?= date("Y-m-d"); ?>">
                  </div>
                  <div class="col-lg-2">
                    <button class="btn btn-outline-secondary" id="btn_reset">Reset</button>
                  </div>
                </div>
              </div>
            </div>

            <!-- <div class="row mb-3 mt-4">
            <div class="col-lg-12">
              <button class="btn btn-info me-2 " id="btn_daily">Daily</button>
              <button class="btn btn-outline-info me-2" id="btn_monthly">Monthly</button>
              <button class="btn btn-outline-info" id="btn_show_all">Show All</button>
            </div>
          </div> -->

            <h4 class="mt-3" style="display: none;">All Bundle Records</h4>
            <hr style="display: none;" />

            <div class="row mt-3">
              <div class="col-lg-12">
                <!-- <div class="table-responsive"> -->
                <table id="dateRangLinePerHoursTable" class="table table-striped table-bordered table-sm nowrap" style="width:100%">
                  <thead>
                    <tr>
                      <th rowspan="2" class="text-center align-middle">No.</th>
                      <th rowspan="2" class="text-center align-middle">Day</th>
                      <th rowspan="2" class="text-center align-middle">Date</th>
                      <th rowspan="2" class="text-center align-middle">Description</th>
                      <th rowspan="2" class="text-center align-middle">Line</th>
                      <th rowspan="2" class="text-center align-middle">ORC</th>
                      <th rowspan="2" class="text-center align-middle">Style</th>
                      <th rowspan="2" class="text-center align-middle">Color</th>
                      <th colspan="10" class="text-center align-middle">Hours</th>
                      <th rowspan="2" class="text-center align-middle">Total</th>
                    </tr>
                    <tr>
                      <th class="text-center">1<sup>st</sup></th>
                      <th class="text-center">2<sup>nd</sup></th>
                      <th class="text-center">3<sup>rd</sup></th>
                      <th class="text-center">4<sup>th</sup></th>
                      <th class="text-center">5<sup>th</sup></th>
                      <th class="text-center">6<sup>th</sup></th>
                      <th class="text-center">7<sup>th</sup></th>
                      <th class="text-center">8<sup>th</sup></th>
                      <th class="text-center">9<sup>th</sup></th>
                      <th class="text-center">10<sup>th</sup></th>
                    </tr>
                  </thead>
                  <!-- <tfoot>
                    <tr>
                      <th colspan="6" class="text-center">Total Qty</th>
                      <th class="text-center"></th>
                      <th class="text-center"></th>
                      <th class="text-center"></th>
                    </tr>
                  </tfoot> -->
                </table>
                <!-- </div> -->
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
  $('.select2_1').select2({
    theme: 'bootstrap-5',
    width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style',
    // placeholder: $(this).data('placeholder'),
    // allowClear: Boolean($(this).data('allow-clear')),
    // dropdownParent: $('#createNewOrderModal')
  });
</script>
<script>
  $(document).ready(function() {
    const sweet_loader = '<div class="sweet_loader"><svg viewBox="0 0 140 140" width="140" height="140"><g class="outline"><path d="m 70 28 a 1 1 0 0 0 0 84 a 1 1 0 0 0 0 -84" stroke="rgba(0,0,0,0.1)" stroke-width="4" fill="none" stroke-linecap="round" stroke-linejoin="round"></path></g><g class="circle"><path d="m 70 28 a 1 1 0 0 0 0 84 a 1 1 0 0 0 0 -84" stroke="#71BBFF" stroke-width="4" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-dashoffset="200" stroke-dasharray="300"></path></g></svg></div>';

    // Main Table
    let dateRangLinePerHoursTable = $('#dateRangLinePerHoursTable').DataTable({
      // lengthChange: false,
      // buttons: ['copy', 'excel', 'pdf', 'print'],
      scrollX: true,
      destroy: true
    });

    let date;
    const loadDateRangLinePerHoursTable = () => {
      date = $('#date').val();

      dateRangLinePerHoursTable = $('#dateRangLinePerHoursTable').DataTable({
        // lengthChange: false,
        dom: 'Blfrtip',
        buttons: ['excel'],
        scrollX: true,
        destroy: true,
        ajax: {
          url: '<?= site_url('manager/getDateRangLinePerHours'); ?>',
          type: 'GET',
          data: {
            'date': date
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
            'data': 'HR',
            'className': 'text-center px-2'
          },
          {
            'data': 'tgl_ass',
            'className': 'text-center px-2'
          },
          {
            'data': 'description',
            'className': 'text-center px-2'
          },
          {
            'data': 'line',
            'className': 'text-center px-2'
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
            'data': 'pertama',
            'className': 'text-center px-2'
          },
          {
            'data': 'kedua',
            'className': 'text-center px-2'
          },
          {
            'data': 'ketiga',
            'className': 'text-center px-2'
          },
          {
            'data': 'keempat',
            'className': 'text-center px-2'
          },
          {
            'data': 'kelima',
            'className': 'text-center px-2'
          },
          {
            'data': 'keenam',
            'className': 'text-center px-2'
          },
          {
            'data': 'ketuju',
            'className': 'text-center px-2'
          },
          {
            'data': 'kedelan',
            'className': 'text-center px-2'
          },
          {
            'data': 'kesembilan',
            'className': 'text-center px-2'
          },
          {
            'data': 'kesepuluh',
            'className': 'text-center px-2'
          },
          {
            'data': 'total',
            'className': 'text-center px-2'
          },

        ]
      });
    }

    // Load First
    loadDateRangLinePerHoursTable();


    // Select date
    $('#date').change(function() {
      date = $(this).val();

      if (date != "") {
        loadDateRangLinePerHoursTable();
      } else {
        dateRangLinePerHoursTable.clear().draw();
      }
    });


    $('#btn_reset').click(function() {
      $("#date").val('').trigger('change');
    });




  });
</script>