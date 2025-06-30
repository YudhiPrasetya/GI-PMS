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

  span.select2-container {
    z-index: 10050;
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
            <li class="breadcrumb-item active" aria-current="page">Order Allocation</li>
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
    <h6 class="mb-0 text-uppercase">Order Allocation</h6>
    <hr />


    <div class="card">
      <div class="card-body">
        <div class="row my-3 mx-2">
          <div class="col mb-3">
          </div>
          <!-- <div class="table-responsive"> -->
          <table id="orderAllocationTable" class="table table-striped table-bordered table-sm nowrap" style="width:100%">
            <thead>
              <tr>
                <th>No.</th>
                <th>Style</th>
                <th>ORC</th>
                <th>Color</th>
                <th>Buyer</th>
                <th>Qty Order</th>
                <th>Qty Allocated</th>
                <th>Stock Order</th>
                <th>Recom. Line</th>
                <th>ETD</th>
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

<!-- Modal -->

<!-- Modal Order Allocation -->
<div class="modal fade" id="orderAllocationModal" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Update Planning</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body" id="orderAllocationModal_body">
        <div class="row mx-3">

          <div class="col-lg-6">
            <div class="row g-3 align-items-center mb-2">
              <div class="col-lg-4">
                <label for="style_modal" class="col-form-label">Style</label>
              </div>
              <div class="col-lg-8">
                <label id="style_modal" class="col-form-label"></label>
              </div>
            </div>
            <div class="row g-3 align-items-center mb-2">
              <div class="col-lg-4">
                <label for="color_modal" class="col-form-label">Color</label>
              </div>
              <div class="col-lg-8">
                <label id="color_modal" class="col-form-label"></label>
              </div>
            </div>
            <div class="row g-3 align-items-center mb-2">
              <div class="col-lg-4">
                <label for="qty_order_modal" class="col-form-label">Qty Order</label>
              </div>
              <div class="col-lg-8">
                <label id="qty_order_modal" class="col-form-label"></label>
              </div>
            </div>
            <div class="row g-3 align-items-center mb-2">
              <div class="col-lg-4">
                <label for="stock_order_modal" class="col-form-label">Stock Order</label>
              </div>
              <div class="col-lg-8">
                <label id="stock_order_modal" class="col-form-label"></label>
                <input type="hidden" id="stock_order_hidden_modal">
              </div>
            </div>
          </div>

          <div class="col-lg-6">
            <div class="row g-3 align-items-center mb-2">
              <div class="col-lg-1"></div>
              <div class="col-lg-4">
                <label for="orc_modal" class="col-form-label">ORC</label>
              </div>
              <div class="col-lg-7">
                <label id="orc_modal" class="col-form-label"></label>
              </div>
            </div>
            <div class="row g-3 align-items-center mb-2">
              <div class="col-lg-1"></div>
              <div class="col-lg-4">
                <label for="recom_line_modal" class="col-form-label">Recom. Line</label>
              </div>
              <div class="col-lg-7">
                <label id="recom_line_modal" class="col-form-label"></label>
              </div>
            </div>
            <div class="row g-3 align-items-center mb-2">
              <div class="col-lg-1"></div>
              <div class="col-lg-4">
                <label for="etd_modal" class="col-form-label">ETD</label>
              </div>
              <div class="col-lg-7">
                <label id="etd_modal" class="col-form-label"></label>
              </div>
            </div>
          </div>

          <hr>

          <div class="col-lg-6">
            <div class="row g-3 align-items-center mb-3">
              <div class="col-lg-4">
                <label for="line_modal" class="col-form-label">Line <sup style="color: red;">*</sup></label>
              </div>
              <div class="col-lg-6">
                <select class="select2_modal_1" id="line_modal"></select>
              </div>
              <div class="col-lg-2">
                <button type="button" class="btn btn-outline-secondary" id="btn_reset_line_modal">Reset</button>
              </div>
            </div>
            <div class="row g-3 align-items-center mb-3">
              <div class="col-lg-4">
                <label for="start_date_modal" class="col-form-label">Start Date <sup style="color: red;">*</sup></label>
              </div>
              <div class="col-lg-6">
                <input type="date" id="start_date_modal" class="form-control">
              </div>
            </div>
            <div class="row g-3 mb-3">
              <div class="col-lg-4">
                <label for="eta_mat_modal" class="col-form-label">ETA Mat</label>
              </div>
              <div class="col-lg-6">
                <input type="date" id="eta_mat_modal" class="form-control">
                <small id="eta_mat_modal_help" class="form-text text-muted">
                  (optional)
                </small>
              </div>
            </div>
          </div>

          <div class="col-lg-6">
            <div class="row g-3 align-items-center mb-3">
              <div class="col-lg-2"></div>
              <div class="col-lg-4">
                <label for="qty_allocation_modal" class="col-form-label">Qty Allocation <sup style="color: red;">*</sup></label>
              </div>
              <div class="col-lg-6">
                <input type="text" id="qty_allocation_modal" class="form-control text-center" placeholder="0">
              </div>
            </div>
            <div class="row g-3 align-items-center mb-3">
              <div class="col-lg-2"></div>
              <div class="col-lg-4">
                <label for="target_output_modal" class="col-form-label">Target Output per Day <sup style="color: red;">*</sup></label>
              </div>
              <div class="col-lg-6">
                <input type="text" id="target_output_modal" class="form-control text-center" placeholder="0">
              </div>
            </div>
            <div class="row g-3 align-items-center mb-3">
              <div class="col-lg-2"></div>
              <div class="col-lg-4">
                <label for="end_date_modal" class="col-form-label">End Date <sup style="color: red;">*</sup></label>
              </div>
              <div class="col-lg-6">
                <input type="date" id="end_date_modal" class="form-control">
              </div>
            </div>
          </div>
        </div>
        <div class="row mx-3">
          <div class="col-lg-12">
            <div class="row g-3 mb-3">
              <div class="col-lg-2">
                <label for="remarks_modal" class="col-form-label">Remarks <sup style="color: red;">*</sup></label>
              </div>
              <div class="col-lg-6">
                <textarea class="form-control" id="remarks_modal" rows="3"></textarea>
                <small id="remarks_modal_help" class="form-text text-muted">
                  (optional)
                </small>
              </div>
            </div>
          </div>
        </div>
        <div class="row mx-3 mb-4">
          <div class="col-lg-12 text-center mb-4">
            <button type="button" id="btn_save_update_planning_modal" class="btn btn-primary">Simpan</button>
          </div>

          <hr>

          <table id="updatePlanningTable" class="table table-striped table-bordered table-sm nowrap" style="width:100%;">
            <thead>
              <tr>
                <th>No.</th>
                <th>Created Date</th>
                <th>Line</th>
                <th>Qty Allocation</th>
                <th>Start Date</th>
                <th>End Date</th>
                <th>Remarks</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
            </tbody>
          </table>
        </div>




      </div>
      <!-- <div class="modal-footer"> -->
      <!-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> -->
      <!-- <button type="button" id="btn_save_create_new_order" class="btn btn-primary">Simpan</button> -->
      <!-- </div> -->
    </div>
  </div>
</div>

<!-- Modal Edit Planning -->
<div class="modal fade" id="updateDateModal" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Edit Planning</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="row mx-3">

          <div class="row g-1 align-items-center">
            <div class="col-lg-5">
              <label for="line_edit_planning_modal" class="col-form-label">Line</label>
            </div>
            <div class="col-lg-6">
              <label id="line_edit_planning_modal" class="col-form-label">Line</label>
            </div>
          </div>
          <div class="row g-1 align-items-center">
            <div class="col-lg-5">
              <label for="qty_stock_order_edit_planning_modal" class="col-form-label">Stock Order</label>
            </div>
            <div class="col-lg-6">
              <label id="qty_stock_order_edit_planning_modal" class="col-form-label"></label>
            </div>
          </div>
          <div class="row g-1 align-items-center">
            <div class="col-lg-5">
              <label for="qty_allocation_edit_planning_modal" class="col-form-label">Qty Allocation</label>
            </div>
            <div class="col-lg-6">
              <label id="qty_allocation_edit_planning_modal" class="col-form-label">Qty Allocation</label>
            </div>
          </div>
          <div class="row g-1">
            <div class="col-lg-5">
              <label for="target_output_per_day_edit_planning_modal" class="col-form-label">Target Output per Day</label>
            </div>
            <div class="col-lg-6">
              <label id="target_output_per_day_edit_planning_modal" class="col-form-label">Target Output per Day</label>
            </div>
          </div>
          <div class="row g-1 align-items-center">
            <div class="col-lg-5">
              <label for="etd_edit_planning_modal" class="col-form-label">ETD</label>
            </div>
            <div class="col-lg-6">
              <label id="etd_edit_planning_modal" class="col-form-label"></label>
            </div>
          </div>
          <div class="row g-1">
            <div class="col-lg-5">
              <label for="eta_mat_edit_planning_modal" class="col-form-label">ETA Mat</label>
            </div>
            <div class="col-lg-6">
              <input type="date" id="eta_mat_edit_planning_modal" class="form-control">
              <small id="eta_mat_edit_planning_modal_help" class="form-text text-muted">
                (optional)
              </small>
            </div>
          </div>
          <div class="row g-1 align-items-center">
            <div class="col-lg-5">
              <label for="start_date_edit_planning_modal" class="col-form-label">Start Date</label>
            </div>
            <div class="col-lg-6">
              <input type="date" id="start_date_edit_planning_modal" class="form-control">
            </div>
          </div>
          <div class="row g-1 align-items-center">
            <div class="col-lg-5">
              <label for="end_date_edit_planning_modal" class="col-form-label">End Date</label>
            </div>
            <div class="col-lg-6">
              <input type="date" id="end_date_edit_planning_modal" class="form-control">
            </div>
          </div>
        </div>

      </div>
      <div class="modal-footer">
        <!-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> -->
        <button type="button" id="btn_save_edit_planning" class="btn btn-primary">Simpan</button>
      </div>
    </div>
  </div>
</div>




<script>
  $('.select2_modal_1').select2({
    theme: 'bootstrap-5',
    width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style',
    // placeholder: $(this).data('placeholder'),
    // allowClear: Boolean($(this).data('allow-clear')),
    dropdownParent: $('#orderAllocationModal_body')
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
      $('#line_modal').empty();
      $.ajax({
        url: " <?= site_url('ppic/getLine'); ?>",
        type: 'GET',
        dataType: 'JSON',
        beforeSend: function() {
          $("#line_modal").prepend($('<option></option>').html('Loading...'));
        },
      }).done(function(data) {
        $('#line_modal').empty();
        $('#line_modal').append($('<option>', {
          value: "",
          text: "- Select Line -"
        }));
        $.each(data, function(i, item) {
          $('#line_modal').append($('<option>', {
            value: item.id_line,
            text: item.name
          }));
        });
      });
    }

    let orderAllocationTable = $('#orderAllocationTable').DataTable({
      // lengthChange: false,
      // buttons: ['copy', 'excel', 'pdf', 'print'],
      scrollX: true,
      ajax: {
        url: '<?= site_url("ppic/getOrder"); ?>',
        type: 'GET',
        dataType: 'JSON'
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
          'data': 'buyer',
          'className': 'text-center px-2'
        },
        {
          'data': 'qty_order',
          'className': 'text-center px-2'
        },
        {
          'data': 'qty_allocated',
          'className': 'text-center px-2'
        },
        {
          'data': 'stock_order',
          'className': 'text-center px-2'
        },
        {
          'data': 'line_allocation1',
          'className': 'text-center px-2'
        },
        {
          'data': 'etd',
          'className': 'text-center px-2'
        },
        {
          'className': 'text-center',
          render: function(data, type, row) {
            return "<span class='badge text-bg-info text-white mx-3' id='btn_set_allocation' style='cursor: pointer;'>Set Allocation</span>"
          }
        },
      ],

    });





    let id_order;
    let updatePlanningTable;
    let qty_order;
    let etd;
    $('#orderAllocationTable tbody').on('click', '#btn_set_allocation', function() {
      id_order = orderAllocationTable.row($(this).parents('tr')).data().id_order;
      let style = orderAllocationTable.row($(this).parents('tr')).data().style;
      let orc = orderAllocationTable.row($(this).parents('tr')).data().orc;
      let color = orderAllocationTable.row($(this).parents('tr')).data().color;
      qty_order = orderAllocationTable.row($(this).parents('tr')).data().qty_order;
      let recom_line = orderAllocationTable.row($(this).parents('tr')).data().line_allocation1;
      etd = orderAllocationTable.row($(this).parents('tr')).data().etd;


      $("#style_modal").html(": " + style);
      $("#orc_modal").html(": " + orc);
      $("#color_modal").html(": " + color);
      if (recom_line) {
        $("#recom_line_modal").html(": " + recom_line);
      } else {
        $("#recom_line_modal").html(": " + "-");
      }
      $("#qty_order_modal").html(": " + qty_order);
      $("#etd_modal").html(": " + etd);


      loadLine();
      $('#line_modal').prop('disabled', false);
      $("#qty_allocation_modal").val("");
      $("#qty_allocation_modal").prop("disabled", true);
      $("#start_date_modal").val("");
      $("#start_date_modal").prop("disabled", true);
      $("#target_output_modal").val("");
      $("#target_output_modal").prop("disabled", true);
      $("#eta_mat_modal").val("");
      $("#eta_mat_modal").prop("disabled", true);
      $("#end_date_modal").val("");
      $("#end_date_modal").prop("disabled", true);
      $("#remarks_modal").val("");
      $("#remarks_modal").prop("disabled", true);


      $("#btn_save_update_planning_modal").prop('disabled', true);

      $("#stock_order_modal").html(': Loading..');
      $("#qty_allocation_modal").val('0');
      let qty_stock_order;
      $.post('<?= site_url("ppic/getCheckIdOrder/"); ?>' + id_order, function(data) {
        if (data > 0) {
          $.getJSON('<?= site_url("ppic/getStockOrder/"); ?>' + id_order, function(data) {
            qty_allocated = data[0].qty_allocated;

            qty_stock_order = qty_order - qty_allocated

            $("#stock_order_modal").html(": " + qty_stock_order);
            $("#stock_order_hidden_modal").val(qty_stock_order);
            $("#qty_allocation_modal").val(qty_stock_order);

            if (qty_stock_order <= 0) {
              $("#btn_save_update_planning_modal").prop('disabled', true);
            } else {
              $("#btn_save_update_planning_modal").prop('disabled', false);
            }
          })
        } else {
          $("#stock_order_modal").html(": " + qty_order);
          $("#stock_order_hidden_modal").val(qty_order);
          $("#qty_allocation_modal").val(qty_order);

          $("#btn_save_update_planning_modal").prop('disabled', false);
        }
      });



      updatePlanningTable = $('#updatePlanningTable').DataTable({
        autoWidth: false,
        info: false,
        searching: false,
        paging: false,
        scrollX: true,
        fixedHeader: true,
        lengthMenu: false,
        destroy: true,
        ajax: {
          url: '<?= site_url('ppic/getPlanning'); ?>',
          type: 'GET',
          data: {
            'id_order': id_order
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
            'data': 'created_date',
            'className': 'text-center px-2'
          },
          {
            'data': 'line',
            'className': 'text-center px-2'
          },
          {
            'data': 'qty_allocation',
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
            'data': 'remarks',
            'className': 'text-center px-2'
          },
          {
            'className': 'text-center',
            render: function(data, type, row) {
              // return "<span class='badge badge-danger' id='btn_delete_modal' style='cursor: pointer;'><i class='fa fa-trash'></i></span>"
              return "<span class='badge text-bg-info text-white' id='btn_edit_modal' style='cursor: pointer;'><i class='bx bx-edit'></i></span> <span class='badge text-bg-danger' id='btn_delete_modal' style='cursor: pointer;'><i class='bx bx-trash'></i></span>"
            }
          },
        ],


      });




      $("#orderAllocationModal").on('shown.bs.modal', function() {
        $('#updatePlanningTable').DataTable().columns.adjust();
      });

      $("#orderAllocationModal").modal("show");
    });

    // Select Line
    $('#line_modal').on('change', function() {
      let id_line = $('#line_modal').val();

      $('#line_modal').prop('disabled', true);
      $('#start_date_modal').prop('disabled', false);
      $('#btn_reset_line_modal').prop('disabled', false);
      $('#eta_mat_modal').prop('disabled', false);
      $('#remarks_modal').prop('disabled', false);

      $.ajax({
        url: " <?= site_url('ppic/getMaxDate'); ?>",
        type: 'GET',
        data: {
          "id_line": id_line
        },
        dataType: 'JSON',
        // beforeSend: function() {
        //   $("#start_date_modal").prepend($('<option></option>').html('Loading...'));
        // },
      }).done(function(data) {
        if (data[0].max_date === null) {
          $('#start_date_modal').prop('disabled', false);
          $('#qty_allocation_modal').prop('disabled', true);
          $('#target_output_modal').prop('disabled', true);
        } else {
          $('#start_date_modal').prop('disabled', false);
          $('#qty_allocation_modal').prop('disabled', false);
          $('#target_output_modal').prop('disabled', false);
        }

        $('#start_date_modal').empty();
        $('#start_date_modal').val(data[0].max_date);

      });
    });

    // Disable Enable (Target Output)
    $('#start_date_modal').on('input', function() {
      let empty = false;

      $('#start_date_modal').prop('disabled', true)


      $('#start_date_modal').each(function() {
        empty = $(this).val().length == 0;
      });

      if (empty) {
        $("#target_output_modal").prop('disabled', true);
        $("#target_output_modal").val("");
        $("#end_date_modal").prop('disabled', true);
        $("#end_date_modal").val("");
      } else {
        $("#qty_allocation_modal").prop("disabled", false);
        $("#target_output_modal").prop('disabled', false);
      }
    });

    // Button reset
    $('#btn_reset_line_modal').on('click', function() {

      loadLine();
      $('#line_modal').prop('disabled', false);
      $("#qty_allocation_modal").prop("disabled", true);
      $("#start_date_modal").val("");
      $("#start_date_modal").prop("disabled", true);
      $("#target_output_modal").val("");
      $("#target_output_modal").prop("disabled", true);;
      $("#eta_mat_modal").prop("disabled", true);
      $("#end_date_modal").val("");
      $("#end_date_modal").prop("disabled", true);
      $("#remarks_modal").val("");
      $("#remarks_modal").prop("disabled", true);



      $('#btn_reset_line_modal').prop('disabled', true);
    });

    // Disable Enable (End Date) & Automatically End Date By Target Output per Day
    $('#target_output_modal').on('input', function() {
      let empty = false;

      $('#target_output_modal').each(function() {
        empty = $(this).val().length == 0;
      });

      if (empty) {
        $("#end_date_modal").prop('disabled', true);
      } else {
        $("#end_date_modal").prop('disabled', false);
      }




      let target_output = $(this).val();
      let qty_allocation = $('#qty_allocation_modal').val();
      let start_date = $('#start_date_modal').val();

      if (target_output === "" || target_output == 0) {
        let date_value = 0;
        $("#end_date_modal").val("");
        $("#end_date_modal").prop("disabled", true);

      } else {
        $("#end_date_modal").prop("disabled", false);

        let date_value = Math.ceil(qty_allocation / target_output);

        if (date_value === 1) {
          let addDate = new Date(start_date);
          let numberOfDaysToAdd = date_value;


          count = 0;
          while (count <= numberOfDaysToAdd - 1) {
            endDate = new Date(addDate.setDate(addDate.getDate()));
            if (endDate.getDay() != 0 && endDate.getDay() != 6) {
              //Date.getDay() gives weekday starting from 0(Sunday) to 6(Saturday)
              count++;
            }
          }

          let day = ("0" + endDate.getDate()).slice(-2);
          let month = ("0" + (endDate.getMonth() + 1)).slice(-2);
          let year = endDate.getFullYear();

          $("#end_date_modal").val([year, month, day].join('-'));

        } else {
          let addDate = new Date(start_date);
          let numberOfDaysToAdd = date_value;

          count = 0;
          while (count < numberOfDaysToAdd - 1) {
            endDate = new Date(addDate.setDate(addDate.getDate() + 1));
            if (endDate.getDay() != 0 && endDate.getDay() != 6) {
              //Date.getDay() gives weekday starting from 0(Sunday) to 6(Saturday)
              count++;
            }
          }

          let day = ("0" + endDate.getDate()).slice(-2);
          let month = ("0" + (endDate.getMonth() + 1)).slice(-2);
          let year = endDate.getFullYear();

          $("#end_date_modal").val([year, month, day].join('-'));
        }


      }






    });

    // Disable Enable (End Date) & Automatically End Date By Qty Allocation
    $('#qty_allocation_modal').on('input', function() {
      let empty = false;

      $('#qty_allocation_modal').each(function() {
        empty = $(this).val().length == 0;
      });

      if (empty) {
        $("#end_date_modal").prop('disabled', true);
      } else {
        $("#end_date_modal").prop('disabled', false);
      }




      let target_output = $('#target_output_modal').val();
      let qty_allocation = $(this).val();
      let start_date = $('#start_date_modal').val();

      if (target_output === "" || target_output == 0) {
        let date_value = 0;
        $("#end_date_modal").val("");
        $("#end_date_modal").prop("disabled", true);

      } else {
        $("#end_date_modal").prop("disabled", false);

        let date_value = Math.ceil(qty_allocation / target_output);

        if (date_value === 1) {
          let addDate = new Date(start_date);
          let numberOfDaysToAdd = date_value;


          count = 0;
          while (count <= numberOfDaysToAdd - 1) {
            endDate = new Date(addDate.setDate(addDate.getDate()));
            if (endDate.getDay() != 0 && endDate.getDay() != 6) {
              //Date.getDay() gives weekday starting from 0(Sunday) to 6(Saturday)
              count++;
            }
          }

          let day = ("0" + endDate.getDate()).slice(-2);
          let month = ("0" + (endDate.getMonth() + 1)).slice(-2);
          let year = endDate.getFullYear();

          $("#end_date_modal").val([year, month, day].join('-'));

        } else {
          let addDate = new Date(start_date);
          let numberOfDaysToAdd = date_value;

          count = 0;
          while (count < numberOfDaysToAdd - 1) {
            endDate = new Date(addDate.setDate(addDate.getDate() + 1));
            if (endDate.getDay() != 0 && endDate.getDay() != 6) {
              //Date.getDay() gives weekday starting from 0(Sunday) to 6(Saturday)
              count++;
            }
          }

          let day = ("0" + endDate.getDate()).slice(-2);
          let month = ("0" + (endDate.getMonth() + 1)).slice(-2);
          let year = endDate.getFullYear();

          $("#end_date_modal").val([year, month, day].join('-'));
        }

      }

    });



    // Button save (Modal)
    let stock_order;
    $('#btn_save_update_planning_modal').click(function() {
      let line_name = $('#line_modal').find(":selected").text();
      let line_modal = $('#line_modal').val();
      stock_order = $('#stock_order_hidden_modal').val();
      let qty_allocation_modal = $('#qty_allocation_modal').val();
      let target_output_modal = $('#target_output_modal').val();
      let start_date_modal = $('#start_date_modal').val();
      let end_date_modal = $('#end_date_modal').val();
      let eta_mat_modal = $('#eta_mat_modal').val();
      let remarks_modal = $('#remarks_modal').val();

      let start_date_new = new Date(start_date_modal);
      let end_date_new = new Date(end_date_modal);

      let etd_new = new Date(etd);

      if (line_modal != "" &&
        qty_allocation_modal != "" &&
        start_date_modal != "" &&
        target_output_modal != "" &&
        end_date_modal != "") {
        if (parseInt(qty_allocation_modal) <= parseInt(stock_order)) {
          // if (start_date_new < etd_new && end_date_new < etd_new) {
          if (start_date_new <= end_date_new) {

            // $('#btn_save_update_planning_modal').empty();
            // $('#btn_save_update_planning_modal').prop('disabled', true);
            // $('#btn_save_update_planning_modal').append('<span class="spinner-border spinner-border-sm mr-1" style="margin-bottom: 1px;" role="status" aria-hidden="true"></span>Loading');

            swal.fire({
              icon: 'warning',
              title: 'Warning!',
              html: "Apakah anda yakin akan mengalokasikan Qty Order sebanyak " + qty_allocation_modal + " ke Line " + line_name + " ?",
              showCancelButton: true,
              confirmButtonColor: '#3085d6',
              cancelButtonColor: '#d33',
              confirmButtonText: 'Yes',
              cancelButtonText: 'No',
            }).then(function(result) {
              if (result.value) {

                $.ajax({
                  type: "POST",
                  url: "<?= site_url('ppic/postPlanning') ?>",
                  dataType: "JSON",
                  data: {
                    'id_order': id_order,
                    'line': line_modal,
                    'qty_allocation': qty_allocation_modal,
                    'target_output': target_output_modal,
                    'start_date': start_date_modal,
                    'end_date': end_date_modal,
                    'eta_mat': eta_mat_modal,
                    'remarks': remarks_modal
                  },
                  beforeSend: function() {
                    swal.fire({
                      html: '<h5>Loading...</h5>',
                      showConfirmButton: false,
                      didOpen: function() {
                        $('.swal2-content').prepend(sweet_loader);
                      }
                    });
                  },
                  success: function(data) {
                    swal.fire({
                      icon: 'success',
                      title: 'Success!',
                      text: 'Data berhasil disimpan.',
                      timer: 1000,
                      showCancelButton: false,
                      showConfirmButton: false
                    }).then(function() {


                      loadLine();

                      $('#line_modal').prop('disabled', false);
                      $("#qty_allocation_modal").val("");
                      $("#qty_allocation_modal").prop("disabled", true);
                      $("#start_date_modal").val("");
                      $("#start_date_modal").prop("disabled", true);
                      $("#target_output_modal").val("");
                      $("#target_output_modal").prop("disabled", true);
                      $("#eta_mat_modal").val("");
                      $("#eta_mat_modal").prop("disabled", true);
                      $("#end_date_modal").val("");
                      $("#end_date_modal").prop("disabled", true);
                      $("#remarks_modal").val("");
                      $("#remarks_modal").prop("disabled", true);



                      $('#btn_reset_start_date_modal').prop('disabled', true);

                      $('#btn_save_update_planning_modal').empty();
                      $('#btn_save_update_planning_modal').html('Simpan');


                      updatePlanningTable.ajax.reload();
                      orderAllocationTable.ajax.reload(null, false)


                      $("#stock_order_modal").html(': Loading..');
                      $("#qty_allocation_modal").val('0');
                      $.post('<?= site_url("ppic/getCheckIdOrder/"); ?>' + id_order, function(data) {
                        if (data > 0) {
                          $.getJSON('<?= site_url("ppic/getStockOrder/"); ?>' + id_order, function(data) {
                            qty_allocated = data[0].qty_allocated;

                            qty_stock_order = qty_order - qty_allocated

                            $("#stock_order_modal").html(": " + qty_stock_order);
                            $("#stock_order_hidden_modal").val(qty_stock_order);
                            $("#qty_allocation_modal").val(qty_stock_order);

                            if (qty_stock_order <= 0) {
                              $("#btn_save_update_planning_modal").prop('disabled', true);
                            } else {
                              $("#btn_save_update_planning_modal").prop('disabled', false);
                            }
                          })
                        } else {
                          $("#stock_order_modal").html(": " + qty_order);
                          $("#stock_order_hidden_modal").val(qty_order);

                          $("#qty_allocation_modal").val(qty_order);


                          $("#btn_save_update_planning_modal").prop('disabled', false);
                        }
                      });

                    });
                  }
                });

              }
              // } else if (result.dismiss == 'cancel') {
              //   $('#btn_save_update_planning_modal').empty();
              //   $('#btn_save_update_planning_modal').html('Save');
              //   $("#btn_save_update_planning_modal").prop('disabled', false);
              // }


            });

          } else {
            swal.fire({
              icon: 'warning',
              title: 'Warning!',
              text: '"Start Date" tidak boleh melebihi "End Date".',
              // timer: 1000,
              showCancelButton: false,
              showConfirmButton: true
            });
          }

          // } else {
          //   swal.fire({
          //     type: 'warning',
          //     title: 'Warning!',
          //     text: '"Start Date" & "End Date" tidak boleh melebihi "ETD".',
          //     // timer: 1000,
          //     showCancelButton: false,
          //     showConfirmButton: true
          //   });
          // }

        } else {
          swal.fire({
            icon: 'warning',
            title: 'Warning!',
            text: 'Qty Allocation tidak boleh melebihi Stock Order!',
            // timer: 1000,
            showCancelButton: false,
            showConfirmButton: true
          });
        }

      } else {
        swal.fire({
          icon: 'warning',
          title: 'Warning!',
          text: 'Ada form yang belum diisi.',
          // timer: 1000,
          showCancelButton: false,
          showConfirmButton: true
        });
      }

    });


    // Button edit (Modal)
    let id_planning;
    let qty_allocation;
    $('#updatePlanningTable tbody').on('click', '#btn_edit_modal', function() {
      id_planning = updatePlanningTable.row($(this).parents('tr')).data().id;
      let line = updatePlanningTable.row($(this).parents('tr')).data().line;
      qty_allocation = updatePlanningTable.row($(this).parents('tr')).data().qty_allocation;
      let target_output_per_day = updatePlanningTable.row($(this).parents('tr')).data().target_output_per_day;
      let start_date = updatePlanningTable.row($(this).parents('tr')).data().start_date;
      let end_date = updatePlanningTable.row($(this).parents('tr')).data().end_date;
      let eta_mat = updatePlanningTable.row($(this).parents('tr')).data().eta_mat_date;

      let stock_order = $('#stock_order_hidden_modal').val();

      let stock_order_edit = parseInt(stock_order) + parseInt(qty_allocation);

      if (isNaN(stock_order_edit)) {
        swal.fire({
          icon: 'warning',
          title: 'Warning!',
          text: 'Silahkan tunggu data "Stock Order" muncul, kemudian coba lagi.',
          // timer: 1000,
          showCancelButton: false,
          showConfirmButton: true
        });

      } else {
        $("#line_edit_planning_modal").html(": " + line);
        $("#qty_stock_order_edit_planning_modal").html(": " + stock_order_edit);
        $("#qty_allocation_edit_planning_modal").html(": " + qty_allocation);
        $("#target_output_per_day_edit_planning_modal").html(": " + target_output_per_day);
        $("#etd_edit_planning_modal").html(": " + etd);
        $("#eta_mat_edit_planning_modal").val(eta_mat);
        $("#start_date_edit_planning_modal").val(start_date);
        $("#end_date_edit_planning_modal").val(end_date);


        $("#updateDateModal").modal("show");
      }

    });

    // Button save edit planning (modal)
    $('#btn_save_edit_planning').click(function() {
      // let line = $("#line_edit_planning_modal").val();
      // let qty_allocations = $("#qty_allocation_edit_planning_modal").val();
      // let target_output_per_day = $("#target_output_per_day_edit_planning_modal").val();
      let eta_mat = $("#eta_mat_edit_planning_modal").val();
      let start_date = $("#start_date_edit_planning_modal").val();
      let end_date = $("#end_date_edit_planning_modal").val();


      // let stock_order = $('#stock_order_hidden_modal').val();


      let start_date_new = new Date(start_date);
      let end_date_new = new Date(end_date);

      let etd_new = new Date(etd);
      let stock_order_edit = parseInt(stock_order) + parseInt(qty_allocation);

      if (start_date != "" && start_date != "") {
        // if (qty_allocations <= stock_order_edit) {
        // if (start_date_new < etd_new && end_date_new < etd_new) {
        if (start_date_new <= end_date_new) {

          // $('#btn_save_edit_planning').empty();
          // $('#btn_save_edit_planning').prop('disabled', true);
          // $('#btn_save_edit_planning').append('<span class="spinner-border spinner-border-sm mr-1" style="margin-bottom: 1px;" role="status" aria-hidden="true"></span>Loading');

          swal.fire({
            icon: 'warning',
            title: 'Warning!',
            html: "Apakah anda yakin akan merubah data ?",
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes',
            cancelButtonText: 'No',
          }).then(function(result) {
            if (result.value) {

              $.ajax({
                type: "POST",
                url: "<?= site_url('ppic/updatePlanning') ?>",
                dataType: "JSON",
                data: {
                  'id_planning': id_planning,
                  'eta_mat': eta_mat,
                  'start_date': start_date,
                  'end_date': end_date
                },
                beforeSend: function() {
                  swal.fire({
                    html: '<h5>Loading...</h5>',
                    showConfirmButton: false,
                    didOpen: function() {
                      $('.swal2-content').prepend(sweet_loader);
                    }
                  });
                },
                success: function(data) {
                  swal.fire({
                    icon: 'success',
                    title: 'Success!',
                    text: 'Data updated successfully!',
                    timer: 1000,
                    showCancelButton: false,
                    showConfirmButton: false
                  }).then(function() {

                    updatePlanningTable.ajax.reload();
                    orderAllocationTable.ajax.reload(null, false);

                    $('#btn_save_edit_planning').empty();
                    $("#btn_save_edit_planning").prop('disabled', false);
                    $('#btn_save_edit_planning').html('Simpan');


                    $("#stock_order_modal").html(': Loading..');
                    $("#qty_allocation_modal").val('0');
                    $.post('<?= site_url("ppic/getCheckIdOrder/"); ?>' + id_order, function(data) {
                      if (data > 0) {
                        $.getJSON('<?= site_url("ppic/getStockOrder/"); ?>' + id_order, function(data) {
                          qty_allocated = data[0].qty_allocated;

                          qty_stock_order = qty_order - qty_allocated

                          $("#stock_order_modal").html(": " + qty_stock_order);
                          $("#stock_order_hidden_modal").val(qty_stock_order);
                          $("#qty_allocation_modal").val(qty_stock_order);

                          if (qty_stock_order <= 0) {
                            $("#btn_save_update_planning_modal").prop('disabled', true);
                          } else {
                            $("#btn_save_update_planning_modal").prop('disabled', false);
                          }
                        })
                      } else {
                        $("#stock_order_modal").html(": " + qty_order);
                        $("#stock_order_hidden_modal").val(qty_order);

                        $("#qty_allocation_modal").val(qty_order);


                        $("#btn_save_update_planning_modal").prop('disabled', false);
                      }
                    });

                    $("#updateDateModal").modal("hide");

                  });
                }
              });

            }
            // } else if (result.dismiss == 'cancel') {
            //   $('#btn_save_edit_planning').empty();
            //   $('#btn_save_edit_planning').html('Save');
            //   $("#btn_save_edit_planning").prop('disabled', false);
            // }


          });


        } else {
          swal.fire({
            icon: 'warning',
            title: 'Warning!',
            text: '"Start Date" tidak boleh melebihi "End Date".',
            // timer: 1000,
            showCancelButton: false,
            showConfirmButton: true
          });
        }

        // } else {
        //   swal.fire({
        //     type: 'warning',
        //     title: 'Warning!',
        //     text: '"Start Date" & "End Date" tidak boleh melebihi "ETD".',
        //     // timer: 1000,
        //     showCancelButton: false,
        //     showConfirmButton: true
        //   });
        // }

        // } else {
        //   swal.fire({
        //     icon: 'warning',
        //     title: 'Warning!',
        //     text: 'Qty Allocation tidak boleh melebihi Stock Order!',
        //     // timer: 1000,
        //     showCancelButton: false,
        //     showConfirmButton: true
        //   });
        // }

      } else {
        swal.fire({
          icon: 'warning',
          title: 'Warning!',
          text: 'Form tidak boleh ada yang kosong!',
          // timer: 1000,
          showCancelButton: false,
          showConfirmButton: true
        });
      }



    });

    // Button delete (modal)
    $('#updatePlanningTable tbody').on('click', '#btn_delete_modal', function() {
      let id_planning = updatePlanningTable.row($(this).parents('tr')).data().id;

      swal.fire({
        icon: 'warning',
        title: 'Warning!',
        html: "Apakah anda yakin akan menghapus data ini ?",
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes',
        cancelButtonText: 'No',
      }).then(function(result) {
        if (result.value) {

          $.ajax({
            type: "POST",
            url: "<?= site_url('ppic/deletePlanning') ?>",
            dataType: "JSON",
            data: {
              'id_planning': id_planning
            },
            beforeSend: function() {
              swal.fire({
                html: '<h5>Loading...</h5>',
                showConfirmButton: false,
                didOpen: function() {
                  $('.swal2-content').prepend(sweet_loader);
                }
              });
            },
            success: function(data) {
              swal.fire({
                icon: 'success',
                title: 'Success!',
                text: 'Data berhasil dihapus.',
                timer: 1000,
                showCancelButton: false,
                showConfirmButton: false
              }).then(function() {

                updatePlanningTable.ajax.reload();
                orderAllocationTable.ajax.reload(null, false);

                $('#btn_save_edit_planning').empty();
                $("#btn_save_edit_planning").prop('disabled', false);
                $('#btn_save_edit_planning').html('Simpan');


                $("#stock_order_modal").html(': Loading..');
                $("#qty_allocation_modal").val('0');
                $.post('<?= site_url("ppic/getCheckIdOrder/"); ?>' + id_order, function(data) {
                  if (data > 0) {
                    $.getJSON('<?= site_url("ppic/getStockOrder/"); ?>' + id_order, function(data) {
                      qty_allocated = data[0].qty_allocated;

                      qty_stock_order = qty_order - qty_allocated

                      $("#stock_order_modal").html(": " + qty_stock_order);
                      $("#stock_order_hidden_modal").val(qty_stock_order);
                      $("#qty_allocation_modal").val(qty_stock_order);

                      if (qty_stock_order <= 0) {
                        $("#btn_save_update_planning_modal").prop('disabled', true);
                      } else {
                        $("#btn_save_update_planning_modal").prop('disabled', false);
                      }
                    })
                  } else {
                    $("#stock_order_modal").html(": " + qty_order);
                    $("#stock_order_hidden_modal").val(qty_order);

                    $("#qty_allocation_modal").val(qty_order);


                    $("#btn_save_update_planning_modal").prop('disabled', false);
                  }
                });


              });
            }
          });


        } else if (result.dismiss == 'cancel') {
          $('#btn_save_edit_planning').empty();
          $('#btn_save_edit_planning').html('Simpan');
          $("#btn_save_edit_planning").prop('disabled', false);
        }


      });
    });













    // $("#btn_create_new_order").click(function() {
    //   $("#createNewOrderModal").modal("show");
    // });

    // // Button save (Modal)
    // $('#btn_save_create_new_order').click(function() {

    //   let buyer = $('#buyer_modal').val();
    //   let color = $('#color_modal').val();
    //   let shipment = $('#shipment_modal').val();
    //   let etd = $('#etd_modal').val();
    //   let po_no = $('#po_no_modal').val();
    //   let orc = $('#orc_modal').val();
    //   let style = $('#style_modal').val();
    //   let style_sam = $('#style_sam_modal').val();
    //   let com = $('#com_modal').val();
    //   let qty = $('#qty_modal').val();
    //   let line_allocation_1 = $('#line_allocation_1_modal').val();
    //   let line_allocation_2 = $('#line_allocation_2_modal').val();
    //   let line_allocation_3 = $('#line_allocation_3_modal').val();

    //   if (buyer != '' && color != '' && etd != '' && po_no != '' && orc != '' && style != '' && style_sam != '' && com != '' && qty != '') {
    //     swal.fire({
    //       icon: 'warning',
    //       title: 'Warning!',
    //       html: "Apakah anda yakin ?",
    //       showCancelButton: true,
    //       // confirmButtonColor: '#3085d6',
    //       // cancelButtonColor: '#d33',
    //       confirmButtonText: 'Yes',
    //       cancelButtonText: 'No',
    //     }).then(function(result) {
    //       if (result.value) {

    //         $.ajax({
    //           type: "POST",
    //           url: "<?= site_url('ppic/postNewOrder') ?>",
    //           dataType: "JSON",
    //           data: {
    //             'buyer': buyer,
    //             'color': color,
    //             'shipment': shipment,
    //             'etd': etd,
    //             'po_no': po_no,
    //             'orc': orc,
    //             'style': style,
    //             'style_sam': style_sam,
    //             'com': com,
    //             'qty': qty,
    //             'line_allocation_1': line_allocation_1,
    //             'line_allocation_2': line_allocation_2,
    //             'line_allocation_3': line_allocation_3,
    //           },
    //           beforeSend: function() {
    //             swal.fire({
    //               html: '<h5>Loading...</h5>',
    //               showConfirmButton: false,
    //               didOpen: function() {
    //                 $('.swal2-html-container').prepend(sweet_loader);
    //               }
    //             });
    //           },
    //           success: function(data) {
    //             masterOrderTable.ajax.reload(null, false);

    //             swal.fire({
    //               icon: 'success',
    //               title: 'Success!',
    //               text: 'Data berhasil disimpan.',
    //               timer: 1000,
    //               showCancelButton: false,
    //               showConfirmButton: false
    //             }).then(function() {

    //               $("#createNewOrderModal").modal("hide");
    //             });
    //           }
    //         });
    //       }

    //     });


    //   } else {
    //     swal.fire({
    //       icon: 'warning',
    //       title: 'Warning!',
    //       text: 'Ada form yang belum diisi.',
    //       // timer: 1000,
    //       showCancelButton: false,
    //       showConfirmButton: true
    //     });
    //   }


    // });

    // // Button delete
    // $('#masterOrderTable tbody').on('click', '#btn_delete', function() {
    //   let id_order = masterOrderTable.row($(this).parents('tr')).data().id_order;
    //   let orc = masterOrderTable.row($(this).parents('tr')).data().orc;

    //   swal.fire({
    //     icon: 'warning',
    //     title: 'Warning!',
    //     html: "Apakah anda yakin akan menghapus ORC " + orc + " ?",
    //     showCancelButton: true,
    //     // confirmButtonColor: '#3085d6',
    //     // cancelButtonColor: '#d33',
    //     confirmButtonText: 'Ya',
    //     cancelButtonText: 'Batal',
    //   }).then(function(result) {
    //     if (result.value) {

    //       $.ajax({
    //         type: "POST",
    //         url: "<?= site_url('ppic/deleteMasterOrder') ?>",
    //         dataType: "JSON",
    //         data: {
    //           'id_order': id_order
    //         },
    //         beforeSend: function() {
    //           swal.fire({
    //             html: '<h5>Loading...</h5>',
    //             showConfirmButton: false,
    //             didOpen: function() {
    //               $('.swal2-html-container').prepend(sweet_loader);
    //             }
    //           });
    //         },
    //         success: function(data) {
    //           masterOrderTable.ajax.reload(null, false);
    //           swal.fire({
    //             icon: 'success',
    //             title: 'Success!',
    //             text: 'Data berhasil dihapus.',
    //             timer: 1000,
    //             showCancelButton: false,
    //             showConfirmButton: false
    //           }).then(function() {});
    //         }
    //       });


    //     }


    //   });
    // });

    // // Button Edit
    // let id_order;
    // $('#masterOrderTable tbody').on('click', '#btn_edit', function() {
    //   id_order = masterOrderTable.row($(this).parents('tr')).data().id_order;
    //   let buyer = masterOrderTable.row($(this).parents('tr')).data().buyer;
    //   let color = masterOrderTable.row($(this).parents('tr')).data().color;
    //   let shipment = masterOrderTable.row($(this).parents('tr')).data().plan_export;
    //   let etd = masterOrderTable.row($(this).parents('tr')).data().etd;
    //   let po_no = masterOrderTable.row($(this).parents('tr')).data().po_no;
    //   let orc = masterOrderTable.row($(this).parents('tr')).data().orc;
    //   let style = masterOrderTable.row($(this).parents('tr')).data().style;
    //   let style_sam = masterOrderTable.row($(this).parents('tr')).data().style_sam;
    //   let com = masterOrderTable.row($(this).parents('tr')).data().comm;
    //   let qty = masterOrderTable.row($(this).parents('tr')).data().qty;
    //   let line_allocation_1 = masterOrderTable.row($(this).parents('tr')).data().line_allocation1;
    //   let line_allocation_2 = masterOrderTable.row($(this).parents('tr')).data().line_allocation2;
    //   let line_allocation_3 = masterOrderTable.row($(this).parents('tr')).data().line_allocation3;


    //   $("#buyer_edit_modal").val(buyer);
    //   $("#color_edit_modal").val(color);
    //   $("#shipment_edit_modal").val(shipment);
    //   $("#etd_edit_modal").val(etd);
    //   $("#po_no_edit_modal").val(po_no);
    //   $("#orc_edit_modal").val(orc);
    //   $("#style_edit_modal").val(style);
    //   $("#style_sam_edit_modal option[value='" + style_sam + "']").prop("selected", true);
    //   $("#com_edit_modal").val(com);
    //   $("#qty_edit_modal").val(qty);
    //   $("#line_allocation_1_edit_modal option[value='" + line_allocation_1 + "']").prop("selected", true);
    //   $("#line_allocation_2_edit_modal option[value='" + line_allocation_2 + "']").prop("selected", true);
    //   $("#line_allocation_3_edit_modal option[value='" + line_allocation_3 + "']").prop("selected", true);




    //   $("#editOrderModal").modal("show");


    // });

    // // Button edit (Modal)
    // $('#btn_save_edit_order').click(function() {

    //   let buyer = $('#buyer_edit_modal').val();
    //   let color = $('#color_edit_modal').val();
    //   let shipment = $('#shipment_edit_modal').val();
    //   let etd = $('#etd_edit_modal').val();
    //   let po_no = $('#po_no_edit_modal').val();
    //   let orc = $('#orc_edit_modal').val();
    //   let style = $('#style_edit_modal').val();
    //   let style_sam = $('#style_sam_edit_modal').val();
    //   let com = $('#com_edit_modal').val();
    //   let qty = $('#qty_edit_modal').val();
    //   let line_allocation_1 = $('#line_allocation_1_edit_modal').val();
    //   let line_allocation_2 = $('#line_allocation_2_edit_modal').val();
    //   let line_allocation_3 = $('#line_allocation_3_edit_modal').val();

    //   if (buyer != '' && color != '' && etd != '' && po_no != '' && orc != '' && style != '' && style_sam != '' && com != '' && qty != '') {
    //     swal.fire({
    //       icon: 'warning',
    //       title: 'Warning!',
    //       html: "Apakah anda yakin akan mengedit data ini ?",
    //       showCancelButton: true,
    //       // confirmButtonColor: '#3085d6',
    //       // cancelButtonColor: '#d33',
    //       confirmButtonText: 'Yes',
    //       cancelButtonText: 'No',
    //     }).then(function(result) {
    //       if (result.value) {

    //         $.ajax({
    //           type: "POST",
    //           url: "<?= site_url('ppic/updateOrder') ?>",
    //           dataType: "JSON",
    //           data: {
    //             'id_order': id_order,
    //             'buyer': buyer,
    //             'color': color,
    //             'shipment': shipment,
    //             'etd': etd,
    //             'po_no': po_no,
    //             'orc': orc,
    //             'style': style,
    //             'style_sam': style_sam,
    //             'com': com,
    //             'qty': qty,
    //             'line_allocation_1': line_allocation_1,
    //             'line_allocation_2': line_allocation_2,
    //             'line_allocation_3': line_allocation_3,
    //           },
    //           beforeSend: function() {
    //             swal.fire({
    //               html: '<h5>Loading...</h5>',
    //               showConfirmButton: false,
    //               didOpen: function() {
    //                 $('.swal2-html-container').prepend(sweet_loader);
    //               }
    //             });
    //           },
    //           success: function(data) {
    //             masterOrderTable.ajax.reload(null, false);

    //             swal.fire({
    //               icon: 'success',
    //               title: 'Success!',
    //               text: 'Data berhasil disimpan.',
    //               timer: 1000,
    //               showCancelButton: false,
    //               showConfirmButton: false
    //             }).then(function() {

    //               $("#editOrderModal").modal("hide");
    //             });
    //           }
    //         });
    //       }

    //     });


    //   } else {
    //     swal.fire({
    //       icon: 'warning',
    //       title: 'Warning!',
    //       text: 'Ada form yang belum diisi.',
    //       // timer: 1000,
    //       showCancelButton: false,
    //       showConfirmButton: true
    //     });
    //   }


    // });


  });
</script>