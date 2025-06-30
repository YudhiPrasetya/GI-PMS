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
      <div class="breadcrumb-title pe-3">PPIC</div>
      <div class="ps-3">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb mb-0 p-0">
            <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">Production Planning</li>
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
    <h6 class="mb-0 text-uppercase">Production Planning</h6>
    <hr />


    <div class="card">
      <div class="card-body">
        <div class="row my-3 mx-2">
          <div class="row g-3 align-items-center mb-5">
            <div class="col-1">
              <label for="line_master" class="col-form-label">Line</label>
            </div>
            <div class="col-3">
              <select class="select2_modal_1" id="line_master"></select>
            </div>
            <div class="col-auto">
              <button type="button" class="btn btn-outline-secondary" id="btn_reset_line_master">Reset</button>
            </div>
          </div>
          <!-- <div class="table-responsive"> -->
          <table id="productionPlanningTable" class="table table-bordered table-sm table-striped nowrap" style="width:100%">
            <thead>
              <tr>
                <th>No.</th>
                <th>Line Code</th>
                <th>Line Allocation</th>
                <th>Style</th>
                <th>ORC</th>
                <th>Color</th>
                <th>Qty Line Order</th>
                <th>Sewing Progress</th>
                <th>Balance</th>
                <th>Target Output per Day</th>
                <th>ETA Mat</th>
                <th>Start Date</th>
                <th>End Date</th>
                <th>ETD</th>
                <th>Remarks</th>
                <th>Status</th>
                <th>Action</th>
              </tr>
            </thead>
          </table>
          <!-- </div> -->
        </div>
      </div>
    </div>


  </div>
</div>
<!--end page wrapper -->

<!-- Modal Output Sewing Details -->
<div class="modal fade" id="outputSewingDetailsModal" tabindex="-1" aria-labelledby="outputSewingDetailsModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="outputSewingDetailsModalLabel">Details Output Sewing</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="row mx-3 my-3">
          <table id="outputSewingDetailsTable" class="table table-striped table-sm nowrap" style="width:100%;">
            <thead>
              <tr>
                <th>No.</th>
                <th>ORC</th>
                <th>Output Date</th>
                <th>Qty Output Sewing</th>
              </tr>
            </thead>
            <tbody></tbody>
            <tfoot>
              <th colspan="3">Total</th>
              <th></th>
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
  $('.select2_modal_1').select2({
    theme: 'bootstrap-5',
    width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style',
    // placeholder: $(this).data('placeholder'),
    // allowClear: Boolean($(this).data('allow-clear')),
    // dropdownParent: $('#orderAllocationModal')
  });

  // $('.select2_modal_2').select2({
  //   theme: 'bootstrap4',
  //   width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style',
  //   // placeholder: $(this).data('placeholder'),
  //   // allowClear: Boolean($(this).data('allow-clear')),
  //   dropdownParent: $('#editOrderModal')
  // });
</script>
<script>
  $(document).ready(function() {
    const sweet_loader = '<div class="sweet_loader"><svg viewBox="0 0 140 140" width="140" height="140"><g class="outline"><path d="m 70 28 a 1 1 0 0 0 0 84 a 1 1 0 0 0 0 -84" stroke="rgba(0,0,0,0.1)" stroke-width="4" fill="none" stroke-linecap="round" stroke-linejoin="round"></path></g><g class="circle"><path d="m 70 28 a 1 1 0 0 0 0 84 a 1 1 0 0 0 0 -84" stroke="#71BBFF" stroke-width="4" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-dashoffset="200" stroke-dasharray="300"></path></g></svg></div>';



    // Load Select Line
    const loadLine = () => {
      $('#line_master').empty();
      $.ajax({
        url: " <?= site_url('ppic/getLine'); ?>",
        type: 'GET',
        dataType: 'JSON',
        beforeSend: function() {
          $("#line_master").prepend($('<option></option>').html('Loading...'));
        },
      }).done(function(data) {
        $('#line_master').empty();
        $('#line_master').append($('<option>', {
          value: "",
          text: "- Select Line -"
        }));
        $.each(data, function(i, item) {
          $('#line_master').append($('<option>', {
            value: item.id_line,
            text: item.name
          }));
        });
      });
    }

    loadLine();

    // Main Table
    let productionPlanningTable = $('#productionPlanningTable').DataTable({
      // lengthChange: false,
      // buttons: ['copy', 'excel', 'pdf', 'print'],
      destroy: true,
      scrollX: true,
      ajax: {
        url: '<?= site_url('ppic/getPlanningProduction'); ?>',
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
          'data': 'line_code',
          'className': 'text-center px-2'
        },
        {
          'data': 'line',
          'className': 'text-center px-2'
        },
        {
          'data': 'style',
          'className': 'text-center px-2'
        },
        {
          'data': 'orc',
          'className': 'text-center px-2'
        },
        {
          'data': 'color',
          'className': 'text-center px-2'
        },
        {
          'data': 'qty_line',
          'className': 'text-center px-2'
        },
        {
          'data': 'qty_sewing_total',
          'className': 'text-center px-2'
        },
        {
          'data': 'balance',
          'className': 'text-center px-2'
        },
        {
          'data': 'target_output_per_day',
          'className': 'text-center px-2'
        },
        {
          'data': 'eta_mat_date',
          'className': 'text-center px-2'
        },
        {
          'data': 'start_date',
          'className': 'text-center px-2'
        },
        {
          'data': 'end_date',
          'className': 'text-center px-2'
        },
        {
          'data': 'etd',
          'className': 'text-center px-2'
        },
        {
          'data': 'remarks',
          'className': 'text-center px-2'
        },
        {
          'className': 'text-center px-2',
          render: function(data, type, row) {
            if (row['balance'] == 0) {
              return "<i class='bx bxs-check-circle' style='color: green;' data-bs-toggle='tooltip' title='Done'></i>"
            } else if (row['balance'] >= 0) {
              // return '<dotlottie-player src="https://lottie.host/94ff7bba-6b04-43bc-9c9a-77fc4e97956c/vlCF1LhSaI.json" background="transparent" speed="1" style="width: 30px; height: 30px" direction="1" mode="normal" loop autoplay></dotlottie-player>'
              return "<i class='bx bxs-hourglass' style='color: gray;' data-bs-toggle='tooltip' title='On Progress'></i>"
            } else {
              return "<span></span>"
            }
          }
        },
        {
          'className': 'text-center px-2',
          render: function(data, type, row) {
            return "<span class='badge text-bg-info text-white mx-3' id='btn_details' style='cursor: pointer;'>Details</span>"
          }
        },
      ],

      fnRowCallback: function(nRow, aData, iDisplayIndex, iDisplayIndexFull) {
        let current_date = new Date();
        let end_date = new Date(aData['end_date']);

        let get_day_current_date = current_date.getDate();
        let get_day_end_date = end_date.getDate();

        let substract = get_day_end_date - get_day_current_date;

        if (substract < 0) {
          if (aData['balance'] > 0) {
            $('td', nRow).css('background-color', '#fca5a5');
          }
        } else {

          if (substract == 1 && parseInt(aData['balance']) > parseInt(aData['target_output_per_day'])) {
            $('td', nRow).css('background-color', '#fdba74');
          } else if (substract == 1 && parseInt(aData['balance']) > 0 && parseInt(aData['balance']) < parseInt(aData['target_output_per_day'])) {
            $('td', nRow).css('background-color', '#fcd34d');
          } else if (substract == 0 && parseInt(aData['balance']) > 0) {
            $('td', nRow).css('background-color', '#fca5a5');
          } else {
            $('td', nRow).css('background-color', 'none');
          }
        }
      }

    });


    // Select Line (Load By Line)
    $('#line_master').change(function() {

      let id_line = $(this).val();

      if (id_line != "") {

        productionPlanningTable = $('#productionPlanningTable').DataTable({
          // lengthChange: false,
          // buttons: ['copy', 'excel', 'pdf', 'print'],
          destroy: true,
          scrollX: true,
          ajax: {
            url: '<?= site_url('ppic/getPlanningProductionFilterByLine'); ?>',
            type: 'GET',
            data: {
              'id_line': id_line
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
              'data': 'line_code',
              'className': 'text-center px-2'
            },
            {
              'data': 'line',
              'className': 'text-center px-2'
            },
            {
              'data': 'style',
              'className': 'text-center px-2'
            },
            {
              'data': 'orc',
              'className': 'text-center px-2'
            },
            {
              'data': 'color',
              'className': 'text-center px-2'
            },
            {
              'data': 'qty_line',
              'className': 'text-center px-2'
            },
            {
              'data': 'qty_sewing_total',
              'className': 'text-center px-2'
            },
            {
              'data': 'balance',
              'className': 'text-center px-2'
            },
            {
              'data': 'target_output_per_day',
              'className': 'text-center px-2'
            },
            {
              'data': 'eta_mat_date',
              'className': 'text-center px-2'
            },
            {
              'data': 'start_date',
              'className': 'text-center px-2'
            },
            {
              'data': 'end_date',
              'className': 'text-center px-2'
            },
            {
              'data': 'etd',
              'className': 'text-center px-2'
            },
            {
              'data': 'remarks',
              'className': 'text-center px-2'
            },
            {
              'className': 'text-center px-2',
              render: function(data, type, row) {
                if (row['balance'] == 0) {
                  return "<i class='bx bxs-check-circle' style='color: green;' data-bs-toggle='tooltip' title='Done'></i>"
                } else if (row['balance'] >= 0) {
                  // return '<dotlottie-player src="https://lottie.host/94ff7bba-6b04-43bc-9c9a-77fc4e97956c/vlCF1LhSaI.json" background="transparent" speed="1" style="width: 30px; height: 30px" direction="1" mode="normal" loop autoplay></dotlottie-player>'
                  return "<i class='bx bxs-hourglass' style='color: gray;' data-bs-toggle='tooltip' title='On Progress'></i>"
                } else {
                  return "<span></span>"
                }
              }
            },
            {
              'className': 'text-center px-2',
              render: function(data, type, row) {
                return "<span class='badge text-bg-info text-white mx-3' id='btn_details' style='cursor: pointer;'>Details</span>"
              }
            },
          ],

        });

      } else {
        productionPlanningTable.clear().draw();
      }
    });


    // Button Reset
    $('#btn_reset_line_master').click(function() {
      loadLine();

      productionPlanningTable = $('#productionPlanningTable').DataTable({
        // lengthChange: false,
        // buttons: ['copy', 'excel', 'pdf', 'print'],
        destroy: true,
        scrollX: true,
        ajax: {
          url: '<?= site_url('ppic/getPlanningProduction'); ?>',
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
            'data': 'line_code',
            'className': 'text-center px-2'
          },
          {
            'data': 'line',
            'className': 'text-center px-2'
          },
          {
            'data': 'style',
            'className': 'text-center px-2'
          },
          {
            'data': 'orc',
            'className': 'text-center px-2'
          },
          {
            'data': 'color',
            'className': 'text-center px-2'
          },
          {
            'data': 'qty_line',
            'className': 'text-center px-2'
          },
          {
            'data': 'qty_sewing_total',
            'className': 'text-center px-2'
          },
          {
            'data': 'balance',
            'className': 'text-center px-2'
          },
          {
            'data': 'target_output_per_day',
            'className': 'text-center px-2'
          },
          {
            'data': 'eta_mat_date',
            'className': 'text-center px-2'
          },
          {
            'data': 'start_date',
            'className': 'text-center px-2'
          },
          {
            'data': 'end_date',
            'className': 'text-center px-2'
          },
          {
            'data': 'etd',
            'className': 'text-center px-2'
          },
          {
            'data': 'remarks',
            'className': 'text-center px-2'
          },
          {
            'className': 'text-center px-2',
            render: function(data, type, row) {
              if (row['balance'] == 0) {
                return "<i class='bx bxs-check-circle' style='color: green;' data-bs-toggle='tooltip' title='Done'></i>"
              } else if (row['balance'] >= 0) {
                // return '<dotlottie-player src="https://lottie.host/94ff7bba-6b04-43bc-9c9a-77fc4e97956c/vlCF1LhSaI.json" background="transparent" speed="1" style="width: 30px; height: 30px" direction="1" mode="normal" loop autoplay></dotlottie-player>'
                return "<i class='bx bxs-hourglass' style='color: gray;' data-bs-toggle='tooltip' title='On Progress'></i>"
              } else {
                return "<span></span>"
              }
            }
          },
          {
            'className': 'text-center px-2',
            render: function(data, type, row) {
              return "<span class='badge text-bg-info text-white mx-3' id='btn_details' style='cursor: pointer;'>Details</span>"
            }
          },
        ],

      });
    });


    // Button details
    $('#productionPlanningTable tbody').on('click', '#btn_details', function() {
      let orc = productionPlanningTable.row($(this).parents('tr')).data().orc;

      let outputSewingDetailsTable = $('#outputSewingDetailsTable').DataTable({
        autoWidth: false,
        info: false,
        searching: false,
        paging: false,
        scrollX: false,
        fixedHeader: true,
        lengthMenu: false,
        destroy: true,
        ajax: {
          url: '<?= site_url('ppic/getOutputSewingDetails'); ?>',
          type: 'GET',
          data: {
            'orc': orc
          }
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
            'data': 'orc',
            'className': 'text-center px-2'
          },
          {
            'data': 'tgl_ass',
            'className': 'text-center px-2'
          },
          {
            'data': 'qty_output_sewing',
            'className': 'text-center px-2'
          }
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
            .column(3)
            .data()
            .reduce((a, b) => intVal(a) + intVal(b), 0);

          // Update footer
          api.column(3).footer().innerHTML =
            total
        }


      });

      $("#outputSewingDetailsModal").on('shown.bs.modal', function() {
        $('#outputSewingDetailsTable').DataTable().columns.adjust();
      });

      $("#outputSewingDetailsModal").modal("show");
    });





  });
</script>