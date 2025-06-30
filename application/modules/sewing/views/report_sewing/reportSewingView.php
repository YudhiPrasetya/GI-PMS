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

    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
      <div class="breadcrumb-title pe-3">Sewing</div>
      <div class="ps-3">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb mb-0 p-0">
            <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">Report Sewing Line <?= ucwords(strtolower($this->session->userdata['username'])); ?></li>
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
    <h6 class="mb-0 text-uppercase">Report Sewing Line <?= $this->session->userdata['username']; ?></h6>
    <hr />


    <div class="card mb-5">
      <div class="card-body">
        <div class="row my-3 mx-2">
          <div class="col-lg-12">

            <div class="row">
              <div class="col-lg-12">
                <!-- <div class="table-responsive"> -->
                <table id="reportSewingTable" class="table table-striped table-bordered table-sm nowrap" style="width:100%">
                  <thead>
                    <tr>
                      <th>ORC</th>
                      <th>Color</th>
                      <th>SAM</th>
                      <th>ETD</th>
                      <th>Qty Order</th>
                      <th>Cumulative Output</th>
                      <th>Balance</th>
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


    <h6 class="mb-0 text-uppercase">Report Sewing Details Line <?= $this->session->userdata['username']; ?></h6>
    <hr />


    <div class="card">
      <div class="card-body">
        <div class="row my-3 mx-2">
          <div class="col-lg-12">

            <div class="row">
              <div class="col-lg-12">
                <!-- <div class="table-responsive"> -->
                <table id="reportSewingDetailsTable" class="table table-striped table-bordered table-sm nowrap" style="width:100%">
                  <thead>
                    <tr>
                      <th>No.</th>
                      <th>ORC</th>
                      <th>No Bundle</th>
                      <th>Kode Barcode</th>
                      <th>Size</th>
                      <th>Time</th>
                      <th>QTY</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th colspan="6">Total Daily Output Sewing</th>
                      <th></th>
                    </tr>
                  </tfoot>
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
<!-- Modal Balance Details -->
<!-- <div class="modal fade" id="balanceDetailsModal" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Balance Details</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="row mx-3">
          <div class="col-lg-12"></div>
          <table id="balanceDetailsTable" class="table table-striped table-bordered table-sm nowrap" style="width:100%">
            <thead>
              <tr>
                <th>No.</th>
                <th>ORC</th>
                <th>Size</th>
                <th>Qty</th>
              </tr>
            </thead>
            <tfoot>
              <tr>
                <th colspan="3">Total</th>
                <th></th>
              </tr>
            </tfoot>
          </table>

        </div>
      </div>
    </div>
  </div>
</div> -->

<script>
  $('.select2_1').select2({
    theme: 'bootstrap4',
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
    let reportSewingTable = $('#reportSewingTable').DataTable({
      // lengthChange: false,
      // buttons: ['copy', 'excel', 'pdf', 'print'],
      scrollX: true,
      destroy: true,
      ajax: {
        url: '<?= site_url('sewing/get_datas'); ?>',
        type: 'GET'
      },
      columns: [{
          'data': 'orc2',
          'className': 'text-center px-2'
        },
        {
          'data': 'color',
          'className': 'text-center px-2'
        },
        {
          'data': 'total_sewing_sam',
          'className': 'text-center px-2'
        },
        {
          'data': 'etd',
          'className': 'text-center px-2'
        },
        {
          'data': 'order2',
          'className': 'text-center px-2'
        },
        {
          'data': 'out_sewing',
          'className': 'text-center px-2'
        },
        {
          'data': 'bal',
          'className': 'text-center px-2'
        },
        // {
        //   'className': 'text-center px-3 text-nowrap',
        //   render: function(data, type, row) {
        //     return "<span id='btn_detail' style='cursor: pointer; color:#3b82f6; '>" + row['bal'] + " </span>"
        //   }
        // },
      ],

    });

    // Table Main Details
    let reportSewingDetailsTable = $('#reportSewingDetailsTable').DataTable({
      // lengthChange: false,
      // buttons: ['copy', 'excel', 'pdf', 'print'],
      scrollX: true,
      destroy: true,
      ajax: {
        url: '<?= site_url('sewing/get_detail'); ?>',
        type: 'GET'
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
          'className': 'text-center px-2'
        },
        {
          'data': 'no_bundle',
          'className': 'text-center px-2'
        },
        {
          'data': 'kode_barcode',
          'className': 'text-center px-2'
        },
        {
          'data': 'size',
          'className': 'text-center px-2'
        },
        {
          'data': 'assembly',
          'className': 'text-center px-2'
        },
        {
          'data': 'qty',
          'className': 'text-center px-2'
        },
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
          .column(6)
          .data()
          .reduce((a, b) => intVal(a) + intVal(b), 0);

        // Total over this page
        pageTotal = api
          .column(6, {
            page: 'current'
          })
          .data()
          .reduce((a, b) => intVal(a) + intVal(b), 0);

        // Update footer
        api.column(6).footer().innerHTML =
          pageTotal + ' ( ' + total + ' )';

        // Update footer
        // api.column(6).footer().innerHTML =
        //   total
      }

    });

    // $("#reportSewingTable tbody").on("click", "#btn_detail", function() {
    //   let orc = reportSewingTable.row($(this).parents('tr')).data().orc2;

    //   let balanceDetailsTable = $('#balanceDetailsTable').DataTable({
    //     // lengthChange: false,
    //     // buttons: ['copy', 'excel', 'pdf', 'print'],
    //     info: false,
    //     searching: false,
    //     paging: false,
    //     scrollX: true,
    //     destroy: true,
    //     ajax: {
    //       url: '<?= site_url('sewing/get_balance'); ?>',
    //       type: 'GET',
    //       data: {
    //         'orc': orc
    //       }
    //     },
    //     columns: [{
    //         "data": null,
    //         "orderable": true,
    //         "searchable": true,
    //         'className': 'text-center px-4',
    //         "width": "20px",
    //         "render": function(data, type, row, meta) {
    //           return meta.row + meta.settings._iDisplayStart + 1;
    //         }
    //       },
    //       {
    //         'data': 'orc',
    //         'className': 'text-center px-2'
    //       },
    //       {
    //         'data': 'size',
    //         'className': 'text-center px-2'
    //       },
    //       {
    //         'data': 'qty',
    //         'className': 'text-center px-2'
    //       },
    //     ],


    //     footerCallback: function(row, data, start, end, display) {
    //       let api = this.api();

    //       // Remove the formatting to get integer data for summation
    //       let intVal = function(i) {
    //         return typeof i === 'string' ?
    //           i.replace(/[\$,]/g, '') * 1 :
    //           typeof i === 'number' ?
    //           i :
    //           0;
    //       };

    //       // Total over all pages
    //       total = api
    //         .column(3)
    //         .data()
    //         .reduce((a, b) => intVal(a) + intVal(b), 0);

    //       // Total over this page
    //       // pageTotal = api
    //       //   .column(3, {
    //       //     page: 'current'
    //       //   })
    //       //   .data()
    //       //   .reduce((a, b) => intVal(a) + intVal(b), 0);

    //       // Update footer
    //       // api.column(3).footer().innerHTML =
    //       //   pageTotal + ' ( ' + total + ' )';

    //       // Update footer
    //       api.column(3).footer().innerHTML =
    //         total
    //     }

    //   });

    //   $("#balanceDetailsModal").on('shown.bs.modal', function() {
    //     $('#balanceDetailsTable').DataTable().columns.adjust();
    //   });

    //   $("#balanceDetailsModal").modal("show");
    // });






  });
</script>