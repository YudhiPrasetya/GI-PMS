<style>
  .select-info {
    margin-left: 10px;
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

  #defect_form .select2 {
    margin-bottom: .5rem !important;
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
            <li class="breadcrumb-item active" aria-current="page">Recut Sewing</li>
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
    <h6 class="mb-0 text-uppercase">Recut Sewing</h6>
    <hr />


    <div class="card">
      <div class="card-body">
        <div class="row my-3 mx-2">
          <div class="col-lg-12">
            <ul class="nav nav-tabs nav-primary" role="tablist">
              <li class="nav-item" role="presentation">
                <a class="nav-link active" data-bs-toggle="tab" href="#primaryhome" role="tab" aria-selected="true">
                  <div class="d-flex align-items-center">
                    <div class="tab-icon"><i class='bx bx-plus-circle font-18 me-1'></i>
                    </div>
                    <div class="tab-title">Recut Request</div>
                  </div>
                </a>
              </li>
              <li class="nav-item" role="presentation">
                <a class="nav-link" data-bs-toggle="tab" href="#primaryprofile" role="tab" aria-selected="false">
                  <div class="d-flex align-items-center">
                    <div class="tab-icon"><i class='bx bx-down-arrow-circle font-18 me-1'></i>
                    </div>
                    <div class="tab-title">Received Recut</div>
                  </div>
                </a>
              </li>
            </ul>
            <div class="tab-content py-3">
              <div class="tab-pane fade show active" id="primaryhome" role="tabpanel">
                <div class="row mb-5">
                  <div class="col-lg-6">
                    <div class="row g-3 align-items-center mb-3">
                      <div class="col-lg-2">
                        <label for="barcode" class="col-form-label">Barcode <sup style="color: red;">*</sup></label>
                      </div>
                      <div class="col-lg-6" style="margin-left: -30px;">
                        <input type="text" id="barcode" class="form-control" placeholder="Scan barcode here.." autocomplete="off">
                      </div>
                      <div class="col-lg-3">
                        <!-- <button class="btn btn-info" id="btn_reset">Submit</button> -->
                        <button class="btn btn-outline-secondary" id="btn_reset">Reset</button>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-lg-3">

                    <div class="row g-3 align-items-center mb-3">
                      <div class="col-lg-3">
                        <label for="buyer" class="col-form-label">Buyer</label>
                      </div>
                      <div class="col-lg-7">
                        <label id="buyer" class="col-form-label">: -</label>
                      </div>
                    </div>
                    <div class="row g-3 align-items-center mb-3">
                      <div class="col-lg-3">
                        <label for="orc" class="col-form-label">ORC</label>
                      </div>
                      <div class="col-lg-7">
                        <label id="orc" class="col-form-label">: -</label>
                      </div>
                    </div>
                    <div class="row g-3 align-items-center mb-3">
                      <div class="col-lg-3">
                        <label for="color" class="col-form-label">Color</label>
                      </div>
                      <div class="col-lg-7">
                        <label id="color" class="col-form-label">: -</label>
                      </div>
                    </div>
                    <div class="row g-3 align-items-center mb-3">
                      <div class="col-lg-3">
                        <label for="style" class="col-form-label">Style</label>
                      </div>
                      <div class="col-lg-7">
                        <label id="style" class="col-form-label">: -</label>
                      </div>
                    </div>
                    <div class="row g-3 align-items-center mb-3">
                      <div class="col-lg-3">
                        <label for="size" class="col-form-label">Size</label>
                      </div>
                      <div class="col-lg-7">
                        <label id="size" class="col-form-label">: -</label>
                      </div>
                    </div>
                    <div class="row g-3 align-items-center mb-3">
                      <div class="col-lg-3">
                        <label for="no_bundle" class="col-form-label">No. Bundle</label>
                      </div>
                      <div class="col-lg-7">
                        <label id="no_bundle" class="col-form-label">: -</label>
                        <input type="hidden" id="qty_barcode">
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-9">
                    <div class="row g-3 align-items-center mb-3">
                      <div class="col-lg-1">
                        <label for="item" class="col-form-label">Item <sup style="color: red;">*</sup></label>
                      </div>
                      <div class="col-lg-3">
                        <select id="item" class="form-control select2_1" style="width: 100%;" disabled></select>
                      </div>
                    </div>
                    <div class="row g-3">
                      <div class="col-lg-1">
                        <label for="part" class="col-form-label">Part <sup style="color: red;">*</sup></label>
                      </div>
                      <div class="col-lg-2" id="part">
                        <label for="part" class="col-form-label ms-2"> -</label>
                      </div>
                      <div class="col-lg-1" id="qty_part">
                      </div>
                      <div class="col-lg-3" id="defect_form">
                      </div>
                      <div class="col-lg-2" id="other_defect">
                      </div>
                      <div class="col-lg-2" id="remarks_form">
                      </div>


                    </div>
                    <div class="row mb-3">
                      <div class="col-lg-1"></div>
                      <div class="col-lg-2" id="other_part">
                      </div>


                    </div>
                    <!-- <div class="row g-3 align-items-center mb-3">
                      <div class="col-lg-2">
                        <label for="qty" class="col-form-label">Defect <sup style="color: red;">*</sup></label>
                      </div>
                      <div class="col-lg-4">
                        <select id="defect" class="form-control select2_1" style="width: 100%;" disabled></select>
                      </div>
                    </div> -->
                    <!-- <div class="row g-3 mb-3">
                      <div class="col-lg-2">
                        <label for="remarks" class="col-form-label">Remarks <sup style="color: red;">*</sup></label>
                      </div>
                      <div class="col-lg-4">
                        <textarea class="form-control" id="remarks" style="height: 100px" disabled></textarea>
                      </div>
                    </div> -->


                    <input type="hidden" id="line" value="<?= $this->session->userdata('username') ?>">
                    <div class="row g-3 align-items-center mt-3 mb-3">
                      <div class="col-lg-1"></div>
                      <div class="col-lg-2">
                        <button class="btn btn-primary" id="btn_save" disabled>Save</button>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="tab-pane fade" id="primaryprofile" role="tabpanel">
                <div class="row">
                  <div class="col-lg-12">
                    <div class="form-group mt-4 mb-2">
                      <label for="barcode" class="form-label">Scan Bundle Record to Receive Recut</label>
                      <input type="text" class="form-control" id="barcode_receipt" placeholder="Scan barcode here.." required>
                    </div>

                  </div>
                </div>
              </div>
            </div>


            <div class="row mb-3 mt-4">
              <div class="col-lg-12">
                <button class="btn btn-info btn-sm me-2" id="btn_on_progress" disabled>On Progress</button>
                <button class="btn btn-outline-info btn-sm  me-2" id="btn_complete">Complete</button>
                <button class="btn btn-outline-danger btn-sm  me-2" id="btn_rejected">Rejected</button>
              </div>
            </div>

            <div class="row">
              <div class="col-lg-12">
                <!-- <div class="table-responsive"> -->
                <table id="recutSewingTable" class="table table-striped table-bordered table-sm nowrap" style="width:100%">
                  <thead>
                    <tr>
                      <th>No.</th>
                      <th>Request Date</th>
                      <th>Barcode</th>
                      <th>Style</th>
                      <th>Buyer</th>
                      <th>ORC</th>
                      <th>Color</th>
                      <th>No. Bundle</th>
                      <th>Size</th>
                      <th>Item</th>
                      <th>Part</th>
                      <th>Qty Recut</th>
                      <th>Remarks</th>
                      <th>Other Part</th>
                      <th>Defect Code</th>
                      <th>Defect Desc</th>
                      <th>Other Defect Desc</th>
                      <th>Input Cutting Date</th>
                      <th>Output Cutting Date</th>
                      <th>Received Date</th>
                      <th>Status</th>
                      <th>Reject Remarks</th>
                    </tr>
                  </thead>
                  <!-- <tfoot>
                  <tr>
                    <th colspan="5">Total Defect</th>
                    <th></th>
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
</div>
<!--end page wrapper -->

<!-- Modal -->
<!-- Part Details -->
<div class="modal fade" id="partDetailsModal" data-bs-keyboard="false" tabindex="-1" aria-labelledby="partDetailsModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="partDetailsModalLabel">Part Details</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="mx-2 my-2">
          <table id="partDetailsTable" class="table table-striped table-bordered table-sm nowrap" style="width:100%">
            <thead>
              <th>No.</th>
              <th>Item</th>
              <th>Part</th>
              <th>Qty Recut</th>
              <th>Defect Code</th>
              <th>Defect Desc</th>
            </thead>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Scan Barcode -->
<div class="modal fade" id="scanBarcodeValueModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="scanBarcodeValueModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="scanBarcodeValueModalLabel">Scan Barcode Value</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="mx-2 mt-3">
          <h5 class="text-center mb-3">Data found more than one, please choose one.</h5>
          <table id="scanBarcodeValueTable" class="table table-striped table-bordered table-sm nowrap" style="width:100%">
            <thead>
              <th>No.</th>
              <th>Request Date</th>
              <th>Buyer</th>
              <th>Style</th>
              <th>ORC</th>
              <th>Part</th>
              <th>Bundle #</th>
              <th>Size</th>
              <th>Qty Recut</th>
              <th>Defect Code</th>
              <th>Defect Desc</th>
              <th>Line</th>
              <th>Remarks</th>
            </thead>
          </table>

        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" id="btn_receive_modal">Receive</button>
      </div>
    </div>
  </div>
</div>

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


    // Load defect
    const loadItem = () => {
      $('#item').empty();
      $.ajax({
        url: " <?= site_url('sewing/getItem'); ?>",
        type: 'GET',
        dataType: 'JSON',
        beforeSend: function() {
          $("#item").prepend($('<option></option>').html('Loading...'));
        },
      }).done(function(data) {
        $('#item').empty();
        $('#item').append($('<option>', {
          value: "",
          text: "- Select Item -"
        }));
        $.each(data, function(i, item) {
          $('#item').append($('<option>', {
            value: item.id,
            text: item.item_desc
          }));
        });
      });
    }

    loadItem();




    const resetAll = () => {
      $("#barcode").val('').prop('disabled', false);
      $('#defect').val(null).trigger('change');
      $('#item').val(null).trigger('change');
      $('#qty_barcode').val('');
      $('#remarks').val('');

      $('#buyer').html(': -');
      $('#orc').html(': -');
      $('#color').html(': -');
      $('#style').html(': -');
      $('#size').html(': -');
      $('#no_bundle').html(': -');

      $('#item').prop('disabled', true);
      $('#defect').prop('disabled', true);
      $('#remarks').prop('disabled', true);

      $('#btn_save').prop('disabled', true);

      $('#barcode').focus();
    }

    // Main Table
    let recutSewingTable = $('#recutSewingTable').DataTable({
      // lengthChange: false,
      // buttons: ['copy', 'excel', 'pdf', 'print'],
      scrollX: true,
      destroy: true,
      ajax: {
        url: '<?= site_url('sewing/getRecutSewingOnProgress'); ?>',
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
          'data': 'created_date',
          'className': 'text-center px-2'
        },
        {
          'data': 'barcode',
          'className': 'text-center px-2'
        },
        {
          'data': 'style',
          'className': 'text-center px-2'
        },
        {
          'data': 'buyer',
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
          'data': 'no_bundle',
          'className': 'text-center px-2'
        },
        {
          'data': 'size',
          'className': 'text-center px-2'
        },
        {
          'data': 'item_desc',
          'className': 'text-center px-2'
        },
        {
          'data': 'part_desc',
          'className': 'text-center px-2'
        },
        {
          'data': 'qty',
          'className': 'text-center px-2'
        },
        {
          'data': 'remarks',
          'className': 'text-center px-2'
        },
        {
          'data': 'other_item_part_desc',
          'className': 'text-center px-2'
        },
        {
          'className': 'text-center px-2',
          render: function(data, type, row, meta) {
            return (row['defect_code'] < 10) ? "D-0" + row['defect_code'] : "D-" + row['defect_code']
          }
        },
        {
          'data': 'defect_desc',
          'className': 'text-center px-2'
        },
        {
          'data': 'other_defect_desc',
          'className': 'text-center px-2'
        },
        {
          'data': 'input_date',
          'className': 'text-center px-2'
        },
        {
          'data': 'output_date',
          'className': 'text-center px-2'
        },
        {
          'data': 'date_received',
          'className': 'text-center px-2'
        },
        {
          'className': 'text-center px-2',
          render: function(data, type, row) {
            if (row['input_date'] == null && row['output_date'] == null && row['date_received'] == null && row['reject'] == 0) {
              return "<i class='bx bxs-hourglass' style='color: #9ca3af'></i> <b>Waiting for Cutting to be Received</b>"
            } else if (row['input_date'] != null && row['output_date'] == null && row['date_received'] == null && row['reject'] == 0) {
              return "<i class='bx bx-recycle' style='color: #9ca3af'></i> <b>On Progress</b>"
            } else if (row['input_date'] != null && row['output_date'] != null && row['date_received'] == null && row['reject'] == 0) {
              return "<i class='bx bxs-hourglass' style='color: #9ca3af'></i> <b>Waiting for Received</b>"
            } else if (row['input_date'] != null && row['output_date'] != null && row['date_received'] != null && row['reject'] == 0) {
              return "<i class='bx bx-check-circle' style='color: #22c55e'></i> <b>Complete</b>"
            } else if (row['reject'] == 1) {
              return "<i class='bx bx-x-circle' style='color: #ef4444'></i> <b>Canceled</b>"
            } else {
              return ""
            }
          }
        },
        {
          visible: false,
          'data': 'reject_remarks',
          'className': 'text-center px-2'
        },
        // {
        //   'className': 'text-center px-2',
        //   render: function(data, type, row) {
        //     if (row['input_date'] != null && row['output_date'] != null && row['date_received'] != null && row['reject'] == 0) {
        //       return "<i class='bx bx-check-circle' style='color: #22c55e'></i> <b>Complete</b>"
        //     } else if (row['input_date'] != null && row['output_date'] != null && row['date_received'] == null) {
        //       return "<i class='bx bxs-hourglass' style='color: #22c55e'></i> <b>Waiting for received</b>"
        //     } else {
        //       return "<i class='bx bx-recycle' style='color: #9ca3af'></i> <b>On Progress</b>"
        //     }
        //   }
        // },
      ],

      fnRowCallback: function(nRow, aData, iDisplayIndex, iDisplayIndexFull) {

        if (aData['input_date'] != null && aData['output_date'] != null && aData['date_received'] == null) {
          $('td', nRow).css('background-color', '#bbf7d0');
        }

        if (aData['reject'] == 1) {
          $('td', nRow).css('background-color', '#fca5a5');
        }

      },

      // footerCallback: function(row, data, start, end, display) {
      //   let api = this.api();

      //   // Remove the formatting to get integer data for summation
      //   let intVal = function(i) {
      //     return typeof i === 'string' ?
      //       i.replace(/[\$,]/g, '') * 1 :
      //       typeof i === 'number' ?
      //       i :
      //       0;
      //   };

      //   // Total over all pages
      //   total = api
      //     .column(5)
      //     .data()
      //     .reduce((a, b) => intVal(a) + intVal(b), 0);

      //   // Total over this page
      //   pageTotal = api
      //     .column(5, {
      //       page: 'current'
      //     })
      //     .data()
      //     .reduce((a, b) => intVal(a) + intVal(b), 0);

      //   // Update footer
      //   api.column(5).footer().innerHTML =
      //     pageTotal + ' ( ' + total + ' )';

      //   // Update footer
      //   // api.column(6).footer().innerHTML =
      //   //   total
      // }

    });

    $('#btn_on_progress').on('click', function() {
      $('#btn_on_progress').removeClass('btn-outline-info');
      $('#btn_on_progress').addClass('btn-info');
      $('#btn_on_progress').prop('disabled', true);

      $('#btn_complete').removeClass('btn-info');
      $('#btn_complete').addClass('btn-outline-info');
      $('#btn_complete').prop('disabled', false);

      $('#btn_rejected').removeClass('btn-danger');
      $('#btn_rejected').addClass('btn-outline-danger');
      $('#btn_rejected').prop('disabled', false);


      recutSewingTable = $('#recutSewingTable').DataTable({
        // lengthChange: false,
        // buttons: ['copy', 'excel', 'pdf', 'print'],
        scrollX: true,
        destroy: true,
        ajax: {
          url: '<?= site_url('sewing/getRecutSewingOnProgress'); ?>',
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
            'data': 'created_date',
            'className': 'text-center px-2'
          },
          {
            'data': 'barcode',
            'className': 'text-center px-2'
          },
          {
            'data': 'style',
            'className': 'text-center px-2'
          },
          {
            'data': 'buyer',
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
            'data': 'no_bundle',
            'className': 'text-center px-2'
          },
          {
            'data': 'size',
            'className': 'text-center px-2'
          },
          {
            'data': 'item_desc',
            'className': 'text-center px-2'
          },
          {
            'data': 'part_desc',
            'className': 'text-center px-2'
          },
          {
            'data': 'qty',
            'className': 'text-center px-2'
          },
          {
            'data': 'remarks',
            'className': 'text-center px-2'
          },
          {
            'data': 'other_item_part_desc',
            'className': 'text-center px-2'
          },
          {
            'className': 'text-center px-2',
            render: function(data, type, row, meta) {
              return (row['defect_code'] < 10) ? "D-0" + row['defect_code'] : "D-" + row['defect_code']
            }
          },
          {
            'data': 'defect_desc',
            'className': 'text-center px-2'
          },
          {
            'data': 'other_defect_desc',
            'className': 'text-center px-2'
          },
          {
            'data': 'input_date',
            'className': 'text-center px-2'
          },
          {
            'data': 'output_date',
            'className': 'text-center px-2'
          },
          {
            'data': 'date_received',
            'className': 'text-center px-2'
          },
          {
            'className': 'text-center px-2',
            render: function(data, type, row) {
              if (row['input_date'] == null && row['output_date'] == null && row['date_received'] == null && row['reject'] == 0) {
                return "<i class='bx bxs-hourglass' style='color: #9ca3af'></i> <b>Waiting for Cutting to be Received</b>"
              } else if (row['input_date'] != null && row['output_date'] == null && row['date_received'] == null && row['reject'] == 0) {
                return "<i class='bx bx-recycle' style='color: #9ca3af'></i> <b>On Progress</b>"
              } else if (row['input_date'] != null && row['output_date'] != null && row['date_received'] == null && row['reject'] == 0) {
                return "<i class='bx bxs-hourglass' style='color: #9ca3af'></i> <b>Waiting for Received</b>"
              } else if (row['input_date'] != null && row['output_date'] != null && row['date_received'] != null && row['reject'] == 0) {
                return "<i class='bx bx-check-circle' style='color: #22c55e'></i> <b>Complete</b>"
              } else if (row['reject'] == 1) {
                return "<i class='bx bx-x-circle' style='color: #ef4444'></i> <b>Canceled</b>"
              } else {
                return ""
              }
            }
          },
          {
            visible: false,
            'data': 'reject_remarks',
            'className': 'text-center px-2'
          },
          // {
          //   'className': 'text-center px-2',
          //   render: function(data, type, row) {
          //     if (row['input_date'] != null && row['output_date'] != null && row['date_received'] != null && row['reject'] == 0) {
          //       return "<i class='bx bx-check-circle' style='color: #22c55e'></i> <b>Complete</b>"
          //     } else if (row['input_date'] != null && row['output_date'] != null && row['date_received'] == null) {
          //       return "<i class='bx bxs-hourglass' style='color: #22c55e'></i> <b>Waiting for received</b>"
          //     } else {
          //       return "<i class='bx bx-recycle' style='color: #9ca3af'></i> <b>On Progress</b>"
          //     }
          //   }
          // },
        ],

        fnRowCallback: function(nRow, aData, iDisplayIndex, iDisplayIndexFull) {

          if (aData['input_date'] != null && aData['output_date'] != null && aData['date_received'] == null) {
            $('td', nRow).css('background-color', '#bbf7d0');
          }

        },
      });
    });

    $('#btn_complete').on('click', function() {
      $('#btn_complete').removeClass('btn-outline-info');
      $('#btn_complete').addClass('btn-info');
      $('#btn_complete').prop('disabled', true);

      $('#btn_on_progress').removeClass('btn-info');
      $('#btn_on_progress').addClass('btn-outline-info');
      $('#btn_on_progress').prop('disabled', false);

      $('#btn_rejected').removeClass('btn-danger');
      $('#btn_rejected').addClass('btn-outline-danger');
      $('#btn_rejected').prop('disabled', false);


      recutSewingTable = $('#recutSewingTable').DataTable({
        // lengthChange: false,
        // buttons: ['copy', 'excel', 'pdf', 'print'],
        scrollX: true,
        destroy: true,
        ajax: {
          url: '<?= site_url('sewing/getRecutSewingComplete'); ?>',
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
            'data': 'created_date',
            'className': 'text-center px-2'
          },
          {
            'data': 'barcode',
            'className': 'text-center px-2'
          },
          {
            'data': 'style',
            'className': 'text-center px-2'
          },
          {
            'data': 'buyer',
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
            'data': 'no_bundle',
            'className': 'text-center px-2'
          },
          {
            'data': 'size',
            'className': 'text-center px-2'
          },
          {
            'data': 'item_desc',
            'className': 'text-center px-2'
          },
          {
            'data': 'part_desc',
            'className': 'text-center px-2'
          },
          {
            'data': 'qty',
            'className': 'text-center px-2'
          },
          {
            'data': 'remarks',
            'className': 'text-center px-2'
          },
          {
            'data': 'other_item_part_desc',
            'className': 'text-center px-2'
          },
          {
            'className': 'text-center px-2',
            render: function(data, type, row, meta) {
              return (row['defect_code'] < 10) ? "D-0" + row['defect_code'] : "D-" + row['defect_code']
            }
          },
          {
            'data': 'defect_desc',
            'className': 'text-center px-2'
          },
          {
            'data': 'other_defect_desc',
            'className': 'text-center px-2'
          },
          {
            'data': 'input_date',
            'className': 'text-center px-2'
          },
          {
            'data': 'output_date',
            'className': 'text-center px-2'
          },
          {
            'data': 'date_received',
            'className': 'text-center px-2'
          },
          {
            'className': 'text-center px-2',
            render: function(data, type, row) {
              if (row['input_date'] == null && row['output_date'] == null && row['date_received'] == null && row['reject'] == 0) {
                return "<i class='bx bxs-hourglass' style='color: #9ca3af'></i> <b>Waiting for Cutting to be Received</b>"
              } else if (row['input_date'] != null && row['output_date'] == null && row['date_received'] == null && row['reject'] == 0) {
                return "<i class='bx bx-recycle' style='color: #9ca3af'></i> <b>On Progress</b>"
              } else if (row['input_date'] != null && row['output_date'] != null && row['date_received'] == null && row['reject'] == 0) {
                return "<i class='bx bxs-hourglass' style='color: #9ca3af'></i> <b>Waiting for Received</b>"
              } else if (row['input_date'] != null && row['output_date'] != null && row['date_received'] != null && row['reject'] == 0) {
                return "<i class='bx bx-check-circle' style='color: #22c55e'></i> <b>Complete</b>"
              } else if (row['reject'] == 1) {
                return "<i class='bx bx-x-circle' style='color: #ef4444'></i> <b>Canceled</b>"
              } else {
                return ""
              }
            }
          },
          {
            visible: false,
            'data': 'reject_remarks',
            'className': 'text-center px-2'
          },
          // {
          //   'className': 'text-center px-2',
          //   render: function(data, type, row) {
          //     if (row['input_date'] != null && row['output_date'] != null && row['date_received'] != null && row['reject'] == 0) {
          //       return "<i class='bx bx-check-circle' style='color: #22c55e'></i> <b>Complete</b>"
          //     } else if (row['input_date'] != null && row['output_date'] != null && row['date_received'] == null) {
          //       return "<i class='bx bxs-hourglass' style='color: #22c55e'></i> <b>Waiting for received</b>"
          //     } else {
          //       return "<i class='bx bx-recycle' style='color: #9ca3af'></i> <b>On Progress</b>"
          //     }
          //   }
          // },
        ],
      });
    });

    $('#btn_rejected').on('click', function() {
      $('#btn_rejected').removeClass('btn-outline-danger');
      $('#btn_rejected').addClass('btn-danger');
      $('#btn_rejected').prop('disabled', true);

      $('#btn_on_progress').removeClass('btn-info');
      $('#btn_on_progress').addClass('btn-outline-info');
      $('#btn_on_progress').prop('disabled', false);

      $('#btn_complete').removeClass('btn-info');
      $('#btn_complete').addClass('btn-outline-info');
      $('#btn_complete').prop('disabled', false);


      recutSewingTable = $('#recutSewingTable').DataTable({
        // lengthChange: false,
        // buttons: ['copy', 'excel', 'pdf', 'print'],
        scrollX: true,
        destroy: true,
        ajax: {
          url: '<?= site_url('sewing/getRecutSewingReject'); ?>',
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
            'data': 'created_date',
            'className': 'text-center px-2'
          },
          {
            'data': 'barcode',
            'className': 'text-center px-2'
          },
          {
            'data': 'style',
            'className': 'text-center px-2'
          },
          {
            'data': 'buyer',
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
            'data': 'no_bundle',
            'className': 'text-center px-2'
          },
          {
            'data': 'size',
            'className': 'text-center px-2'
          },
          {
            'data': 'item_desc',
            'className': 'text-center px-2'
          },
          {
            'data': 'part_desc',
            'className': 'text-center px-2'
          },
          {
            'data': 'qty',
            'className': 'text-center px-2'
          },
          {
            'data': 'remarks',
            'className': 'text-center px-2'
          },
          {
            'data': 'other_item_part_desc',
            'className': 'text-center px-2'
          },
          {
            'className': 'text-center px-2',
            render: function(data, type, row, meta) {
              return (row['defect_code'] < 10) ? "D-0" + row['defect_code'] : "D-" + row['defect_code']
            }
          },
          {
            'data': 'defect_desc',
            'className': 'text-center px-2'
          },
          {
            'data': 'other_defect_desc',
            'className': 'text-center px-2'
          },
          {
            'data': 'input_date',
            'className': 'text-center px-2'
          },
          {
            'data': 'output_date',
            'className': 'text-center px-2'
          },
          {
            'data': 'date_received',
            'className': 'text-center px-2'
          },
          {
            'className': 'text-center px-2',
            render: function(data, type, row) {
              if (row['input_date'] == null && row['output_date'] == null && row['date_received'] == null && row['reject'] == 0) {
                return "<i class='bx bxs-hourglass' style='color: #9ca3af'></i> <b>Waiting for Cutting to be Received</b>"
              } else if (row['input_date'] != null && row['output_date'] == null && row['date_received'] == null && row['reject'] == 0) {
                return "<i class='bx bx-recycle' style='color: #9ca3af'></i> <b>On Progress</b>"
              } else if (row['input_date'] != null && row['output_date'] != null && row['date_received'] == null && row['reject'] == 0) {
                return "<i class='bx bxs-hourglass' style='color: #9ca3af'></i> <b>Waiting for Received</b>"
              } else if (row['input_date'] != null && row['output_date'] != null && row['date_received'] != null && row['reject'] == 0) {
                return "<i class='bx bx-check-circle' style='color: #22c55e'></i> <b>Complete</b>"
              } else if (row['reject'] == 1) {
                return "<i class='bx bx-x-circle' style='color: #ef4444'></i> <b>Canceled</b>"
              } else {
                return ""
              }
            }
          },
          {
            'data': 'reject_remarks',
            'className': 'text-center px-2'
          },
          // {
          //   'className': 'text-center px-2',
          //   render: function(data, type, row) {
          //     if (row['input_date'] != null && row['output_date'] != null && row['date_received'] != null && row['reject'] == 0) {
          //       return "<i class='bx bx-check-circle' style='color: #22c55e'></i> <b>Complete</b>"
          //     } else if (row['input_date'] != null && row['output_date'] != null && row['date_received'] == null) {
          //       return "<i class='bx bxs-hourglass' style='color: #22c55e'></i> <b>Waiting for received</b>"
          //     } else {
          //       return "<i class='bx bx-recycle' style='color: #9ca3af'></i> <b>On Progress</b>"
          //     }
          //   }
          // },
        ],
      });
    });


    const loadBarcodeDetails = (kode_barcode) => {
      $.ajax({
        url: " <?= site_url('sewing/getBarcodeDetailsRecutSewing'); ?>",
        type: 'GET',
        dataType: 'JSON',
        data: {
          'kode_barcode': kode_barcode
        },
        beforeSend: function() {
          $("#buyer").html(': Loading...');
          $("#orc").html(': Loading...');
          $("#color").html(': Loading...');
          $("#style").html(': Loading...');
          $("#size").html(': Loading...');
          $("#no_bundle").html(': Loading...');
        },
      }).done(function(data) {
        $('#buyer').html(': -');
        $('#orc').html(': -');
        $('#color').html(': -');
        $('#style').html(': -');
        $('#size').html(': -');
        $('#no_bundle').html(': -');

        // console.log(data)
        if (data.length != 0) {
          $('#buyer').html(': ' + data[0].buyer);
          $('#orc').html(': ' + data[0].orc);
          $('#color').html(': ' + data[0].color);
          $('#style').html(': ' + data[0].style);
          $('#size').html(': ' + data[0].size);
          $('#no_bundle').html(': ' + data[0].no_bundle);
          $('#qty_barcode').val(data[0].qty_pcs);

          // $('#qty').prop('disabled', false);
          $('#item').prop('disabled', false);
          $('#defect').prop('disabled', false);
          $('#remarks').prop('disabled', false);
          $('input[name="part"]').prop('disabled', false);

          $('#btn_save').prop('disabled', false);
        } else {
          swal.fire({
            icon: 'warning',
            title: 'Warning!',
            text: 'Barcode tidak valid.',
            timer: 1000,
            showCancelButton: false,
            showConfirmButton: false
          }).then(function() {
            $("#barcode").val('').prop('disabled', false);
            $('#qty').val('');

            $('#buyer').html(': -');
            $('#orc').html(': -');
            $('#color').html(': -');
            $('#style').html(': -');
            $('#size').html(': -');
            $('#no_bundle').html(': -');
            $('#qty_barcode').val('');
            $('#remarks').val('');

            $('#qty').prop('disabled', true);
            $('#defect').prop('disabled', true);
            $('#remarks').prop('disabled', true);
            $('input[name="part"]').prop('disabled', true);

            $('#btn_save').prop('disabled', true);

            $('#barcode').focus();

          });
        }




      });
    }


    // Scan Barcode Recut Request
    $('#barcode').focus();
    $('#barcode').keypress(function(e) {

      if (e.keyCode == 13) {

        $('#barcode').prop('disabled', true);
        let barcode = $(this).val();

        if (barcode != "") {

          const barcodeUpper = barcode.toUpperCase();
          const barcodeSplit = barcodeUpper.split("_");
          const kode_barcode = barcodeSplit[1];

          $.ajax({
            url: " <?= site_url('sewing/getCheckBarcodeRecutRequest'); ?>",
            type: 'GET',
            dataType: 'JSON',
            data: {
              'kode_barcode': kode_barcode
            }
          }).done(function(data) {
            if (data > 0) {
              swal.fire({
                icon: 'warning',
                title: 'Warning!',
                text: 'Barcode masih dalam tahap proses "Recut Request".',
                timer: 2000,
                showCancelButton: false,
                showConfirmButton: false
              }).then(function() {
                $("#barcode").val('').prop('disabled', false);
                $('#barcode').focus();
              });
            } else {
              loadBarcodeDetails(kode_barcode);

            }

          });

        }
        return false;
      }

    });

    $('#item').change(function() {
      $('#part').empty();
      $('#other_part').empty();
      $('#qty_part').empty();
      $('#defect_form').empty();
      $('#other_defect').empty();
      $('#remarks_form').empty();

      let id_item = $(this).val();
      if (id_item != '') {
        $.ajax({
          url: '<?= site_url("sewing/getItemPart"); ?>',
          dataType: 'JSON',
          type: 'GET',
          data: {
            'id_item': id_item
          },
          beforeSend: function() {
            $("#part").html('Loading..');
          },
        }).done(function(data) {
          $("#part").html('');
          $.each(data, function(i, item) {
            $('#part').append('<div class="form-check mt-2 mb-4"><input class="form-check-input" name="part" type="checkbox" id="part_' + item.code + '" value="' + item.id + '"><label class="form-check-label" for="part_' + item.code + '">' + item.part_desc + '</label></div>');

            $('#part_' + item.code).change(function() {
              if ($(this).not(":checked").length > 0) {

                if ($(this).val() == 30) {
                  $('#other_part').empty();
                }

                $('#qty_part_' + item.code).prop('disabled', true);
                $('#qty_part_' + item.code).val('');

                $('#defect_' + item.code).prop('disabled', true);
                $('#defect_' + item.code).val(null).trigger('change');

                // $('#other_defect_' + item.code).prop('disabled', true);
                // $('#other_defect_' + item.code).val('');
                $('#other_defect_form_' + item.code).prop('required', false);

                $('#remarks_' + item.code).prop('disabled', true);
                $('#remarks_' + item.code).val('');

              } else {
                if ($(this).val() == 30) {
                  $('#other_part').append('<input type="text" id="other_part_' + item.code + '" class="form-control ms-4 mb-2 other_part" placeholder="e.g Other Part">');
                }


                $('#qty_part_' + item.code).prop('disabled', false);
                $('#defect_' + item.code).prop('disabled', false);
                // $('#other_defect_form_' + item.code).prop('disabled', false);
                $('#other_defect_form_' + item.code).prop('required', true);
                $('#remarks_' + item.code).prop('disabled', false);

              }
            });
          });



          // Qty Part
          $.each(data, function(i, item) {
            $('#qty_part').append('<input type="text" id="qty_part_' + item.code + '" class="form-control text-center mb-2 qty_part" placeholder="0" min="0" disabled>');
          });

          $('.qty_part').keypress(function(e) {
            let charCode = (e.which) ? e.which : e.keyCode;
            if (charCode > 31 && (charCode < 48 || charCode > 57)) {
              return false;
            }
          });

          $('.qty_part').on('input', function() {
            let value = $(this).val();
            let qty_barcode = $('#qty_barcode').val();

            if ((value !== '') && (value.indexOf('.') === -1)) {
              $(this).val(Math.max(Math.min(value, qty_barcode), -qty_barcode));
            }
          });

          $.each(data, function(i, item) {
            $('#remarks_form').append('<div class="row"><input type="text" id="remarks_' + item.code + '" class="form-control mb-2 remarks" placeholder="e.g Remarks" disabled></div>');
            // $('#other_defect_form_' + item.code).prop("type", "hidden");

          });



          // Defect
          $.each(data, function(i, item) {
            $('#defect_form').append('<select id="defect_' + item.code + '" class="form-control select2_1 defect" style="width: 100%;" disabled></select>');
            $('#other_defect').append('<input type="text" id="other_defect_form_' + item.code + '" class="form-control mb-2 other_defect" placeholder="e.g Lain-lain" disabled>');
            // $('#other_defect_form_' + item.code).prop("type", "hidden");

            $('#defect_' + item.code).change(function() {
              let id_defect = $(this).val();

              if (id_defect == 35) {
                // $('#other_defect_form_' + item.code).prop("type", "text");
                $('#other_defect_form_' + item.code).prop('disabled', false);


              } else {
                // $('#other_defect_form_' + item.code).prop("type", "hidden");
                $('#other_defect_form_' + item.code).prop('disabled', true);

                $('#other_defect_form_' + item.code).val('')
              }
            });
          });

          $('.select2_1').select2({
            theme: 'bootstrap-5',
            width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style',
            // placeholder: $(this).data('placeholder'),
            // allowClear: Boolean($(this).data('allow-clear')),
            // dropdownParent: $('#createNewOrderModal')
          });

          // Load defect
          const loadDefect = () => {
            $('.defect').empty();
            $.ajax({
              url: " <?= site_url('sewing/getDefectRecutMaster'); ?>",
              type: 'GET',
              dataType: 'JSON',
              beforeSend: function() {
                $(".defect").prepend($('<option></option>').html('Loading...'));
              },
            }).done(function(data) {
              $('.defect').empty();
              $('.defect').append($('<option>', {
                value: "",
                text: "- Select Defect -"
              }));
              $.each(data, function(i, item) {
                $('.defect').append($('<option>', {
                  value: item.id,
                  text: item.id + ' - ' + item.defect_desc
                }));
              });
            });
          }

          loadDefect();





        });
      } else {
        $('#part').empty();
        $('#part').append('<label for="part" class="col-form-label ms-2"> -</label>')
      }

    });





    // Button Reset
    $('#btn_reset').on('click', function() {
      resetAll()
    });


    // Button Save
    $('#btn_save').on('click', function() {
      let full_barcode = $('#barcode').val();
      let barcodeUpper = full_barcode.toUpperCase();
      let barcodeSplit = barcodeUpper.split("_");
      let barcode = barcodeSplit[1];


      let line = $('#line').val();
      let id_item = $('#item').val();
      let id_part = []
      $("input:checkbox[name='part']:checked").each(function() {
        id_part.push($(this).val());
      });

      let other_part = [];
      $("#other_part_30").each(function() {
        let i;
        for (i = 0; i < id_part.length - 1; ++i) {
          other_part.push('');
        }
        other_part.push($(this).val());
      });

      let qty_part = [];
      $(".qty_part").each(function() {
        if ($(this).val() != '') {
          qty_part.push($(this).val());
        }
      });

      let id_defect = [];
      $(".defect").each(function() {
        if ($(this).val() != '') {
          id_defect.push($(this).val());
        }
      });

      let other_defect = [];
      $(".other_defect:required").each(function() {
        other_defect.push($(this).val());
      });

      let remarks = [];
      $(".remarks:not(:disabled)").each(function() {
        remarks.push($(this).val());
      });



      if (barcode != '' && id_item != '') {
        if (id_part.length == qty_part.length && id_part.length == id_defect.length) {
          swal.fire({
            icon: 'warning',
            title: 'Warning!',
            html: "Are you sure ?",
            showCancelButton: true,
            // confirmButtonColor: '#3085d6',
            // cancelButtonColor: '#d33',
            confirmButtonText: 'Yes',
            cancelButtonText: 'No',
          }).then(function(result) {
            if (result.value) {
              $.ajax({
                type: "POST",
                url: "<?php echo site_url('sewing/postRecutSewing') ?>",
                dataType: "JSON",
                data: {
                  'barcode': barcode,
                  'line': line,
                  'id_item': id_item,
                  'id_part': id_part,
                  'other_part': other_part,
                  'qty_part': qty_part,
                  'id_defect': id_defect,
                  'other_defect': other_defect,
                  'remarks': remarks
                },
                beforeSend: function() {
                  swal.fire({
                    html: '<h5>Loading...</h5>',
                    showConfirmButton: false,
                    didOpen: function() {
                      $('.swal2-html-container').prepend(sweet_loader);
                    }
                  });
                },
                error: function(data) {
                  swal.fire({
                    icon: 'success',
                    title: 'Success!',
                    text: 'Data berhasil disimpan!',
                    timer: 1000,
                    showCancelButton: false,
                    showConfirmButton: false
                  }).then(function() {
                    resetAll();

                    recutSewingTable.ajax.reload();

                  });
                }
              });
            }

          });
        } else {
          Swal.fire(
            'Warning.',
            'Qty Recut dan Defect tidak boleh ada kosong.',
            'warning'
          );
        }

      } else {
        Swal.fire(
          'Warning.',
          'Silakan pilih "Item" terlebih dahulu.',
          'warning'
        );
      }
    });








    // Receive Recut
    // ========================================================================================================================



    // Scan Barcode Recut Request
    let scanBarcodeValueTable;
    $('#barcode_receipt').focus();
    $('#barcode_receipt').keypress(function(e) {
      if (e.keyCode == 13) {
        e.preventDefault();

        let full_barcode = $('#barcode_receipt').val();
        let barcodeUpper = full_barcode.toUpperCase();
        let barcodeSplit = barcodeUpper.split("_");
        let barcode = barcodeSplit[1];


        if (full_barcode == '') {
          Swal.fire({
            icon: "warning",
            title: "Warning!",
            text: "Please enter the barcode.",
            showConfirmButton: false,
            timer: 750
          });
        } else {
          // swal.fire({
          //   html: '<h5>Loading...</h5>',
          //   showConfirmButton: false,
          //   didOpen: function() {
          //     $('.swal2-html-container').prepend(sweet_loader);
          //   }
          // });
          // $('#barcode').prop('disabled', true);
          checkBarcodeExist(barcode);
        }




      }
    });

    function checkBarcodeExist(barcode) {
      $.ajax({
        url: '<?= site_url("sewing/getCheckBarcodeRecutSewing"); ?>',
        type: 'GET',
        dataType: 'JSON',
        data: {
          "barcode": barcode
        },
        success: function(result) {

          if (result == 404) {
            Swal.fire({
              icon: "warning",
              title: "Warning!",
              text: "Unregistered barcode.",
              showConfirmButton: false,
              timer: 1000
            });
            $('#barcode_receipt').val('');
            $('#barcode_receipt').focus();

          } else if (result == 403) {
            Swal.fire({
              icon: "warning",
              title: "Warning!",
              text: 'Barcode has not been added in "Recut Sewing".',
              showConfirmButton: false,
              timer: 1500
            });
            $('#barcode_receipt').val('');
            $('#barcode_receipt').focus();

          } else if (result == 402) {
            Swal.fire({
              icon: "warning",
              title: "Warning!",
              text: "Barcode has been scanned.",
              showConfirmButton: false,
              timer: 1000
            });
            $('#barcode_receipt').val('');
            $('#barcode_receipt').focus();

          } else {
            saveInputRecutByBarcode(barcode)
          }

        }
      });
    }

    function saveInputRecutByBarcode(barcode) {
      $.ajax({
        url: '<?= site_url("sewing/postReceivedRecutSewingByBarcode"); ?>',
        method: 'POST',
        dataType: 'JSON',
        data: {
          'barcode': barcode
        },
      }).done(function() {
        Swal.fire({
          icon: 'success',
          title: 'Success',
          text: 'Data received successfully.',
          showConfirmButton: false,
          timer: 750
        });

        $('#barcode_receipt').val('');
        $('#barcode_receipt').focus();

        recutSewingTable.ajax.reload();

        countUnreceivedRecutSewing();
      });
    }






    // auto reload table 
    setInterval(reloadRecutSewingTable, 16000);

    function reloadRecutSewingTable() {
      recutSewingTable.ajax.reload(null, false)
    }








    // $('#btn_daily').on('click', function() {
    //   $('#btn_daily').removeClass('btn-outline-info');
    //   $('#btn_daily').addClass('btn-info');
    //   $('#btn_daily').prop('disabled', true);

    //   $('#btn_monthly').removeClass('btn-info');
    //   $('#btn_monthly').addClass('btn-outline-info');
    //   $('#btn_monthly').prop('disabled', false);

    //   $('#btn_show_all').removeClass('btn-info');
    //   $('#btn_show_all').addClass('btn-outline-info');
    //   $('#btn_show_all').prop('disabled', false);


    //   recutSewingTable = $('#recutSewingTable').DataTable({
    //     // lengthChange: false,
    //     // buttons: ['copy', 'excel', 'pdf', 'print'],
    //     scrollX: true,
    //     destroy: true,
    //     ajax: {
    //       url: '<?= site_url('sewing/getRecutSewing'); ?>',
    //       type: 'GET'
    //     },
    //     columns: [{
    //         "data": null,
    //         "orderable": true,
    //         "searchable": true,
    //         'className': 'text-center px-4',
    //         // "width": "100px",
    //         "render": function(data, type, row, meta) {
    //           return meta.row + meta.settings._iDisplayStart + 1;
    //         }
    //       },
    //       {
    //         'data': 'created_date',
    //         'className': 'text-center px-2'
    //       },
    //       {
    //         'data': 'buyer',
    //         'className': 'text-center px-2'
    //       },
    //       {
    //         'data': 'style',
    //         'className': 'text-center px-2'
    //       },
    //       {
    //         'data': 'orc',
    //         'className': 'text-center px-2'
    //       },
    //       {
    //         'data': 'part_desc',
    //         'className': 'text-center px-2'
    //       },
    //       {
    //         'data': 'no_bundle',
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
    //       {
    //         'data': 'defect_code',
    //         'className': 'text-center px-2'
    //       },
    //       {
    //         'data': 'defect',
    //         'className': 'text-center px-2'
    //       },
    //       {
    //         'data': 'remarks',
    //         'className': 'text-center px-2'
    //       },
    //       {
    //         'className': 'text-center',
    //         render: function(data, type, row) {
    //           return ""
    //           // if (row['date_received'] == null) {
    //           //   return "<i class='bx bxs-hourglass'></i>"
    //           // } else {
    //           //   return "<i class='bx bx-check-circle' style='color: #22c55e'></i>"
    //           // }

    //         }
    //       },
    //       {
    //         'className': 'text-center',
    //         render: function(data, type, row) {

    //           return "";

    //         }
    //       },
    //     ],
    //   });
    // });

    // $('#btn_monthly').on('click', function() {

    //   $('#btn_daily').removeClass('btn-info');
    //   $('#btn_daily').addClass('btn-outline-info');
    //   $('#btn_daily').prop('disabled', false);

    //   $('#btn_monthly').removeClass('btn-outline-info');
    //   $('#btn_monthly').addClass('btn-info');
    //   $('#btn_monthly').prop('disabled', true);

    //   $('#btn_show_all').removeClass('btn-info');
    //   $('#btn_show_all').addClass('btn-outline-info');
    //   $('#btn_show_all').prop('disabled', false);

    //   recutSewingTable = $('#recutSewingTable').DataTable({
    //     // lengthChange: false,
    //     // buttons: ['copy', 'excel', 'pdf', 'print'],
    //     scrollX: true,
    //     destroy: true,
    //     ajax: {
    //       url: '<?= site_url('sewing/getRecutSewingMonthly'); ?>',
    //       type: 'GET'
    //     },
    //     columns: [{
    //         "data": null,
    //         "orderable": true,
    //         "searchable": true,
    //         'className': 'text-center px-4',
    //         // "width": "100px",
    //         "render": function(data, type, row, meta) {
    //           return meta.row + meta.settings._iDisplayStart + 1;
    //         }
    //       },
    //       {
    //         'data': 'created_date',
    //         'className': 'text-center px-2'
    //       },
    //       {
    //         'data': 'buyer',
    //         'className': 'text-center px-2'
    //       },
    //       {
    //         'data': 'style',
    //         'className': 'text-center px-2'
    //       },
    //       {
    //         'data': 'orc',
    //         'className': 'text-center px-2'
    //       },
    //       {
    //         'data': 'part_desc',
    //         'className': 'text-center px-2'
    //       },
    //       {
    //         'data': 'no_bundle',
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
    //       {
    //         'data': 'defect_code',
    //         'className': 'text-center px-2'
    //       },
    //       {
    //         'data': 'defect',
    //         'className': 'text-center px-2'
    //       },
    //       {
    //         'data': 'remarks',
    //         'className': 'text-center px-2'
    //       },
    //       {
    //         'className': 'text-center',
    //         render: function(data, type, row) {
    //           return ""
    //           // if (row['date_received'] == null) {
    //           //   return "<i class='bx bxs-hourglass'></i>"
    //           // } else {
    //           //   return "<i class='bx bx-check-circle' style='color: #22c55e'></i>"
    //           // }

    //         }
    //       },
    //       {
    //         'className': 'text-center',
    //         render: function(data, type, row) {

    //           return "";

    //         }
    //       },
    //     ],
    //   });
    // });

    // $('#btn_show_all').on('click', function() {
    //   $('#btn_daily').removeClass('btn-info');
    //   $('#btn_daily').addClass('btn-outline-info');
    //   $('#btn_daily').prop('disabled', false);

    //   $('#btn_monthly').removeClass('btn-info');
    //   $('#btn_monthly').addClass('btn-outline-info');
    //   $('#btn_monthly').prop('disabled', false);

    //   $('#btn_show_all').removeClass('btn-outline-info');
    //   $('#btn_show_all').addClass('btn-info');
    //   $('#btn_show_all').prop('disabled', true);

    //   recutSewingTable = $('#recutSewingTable').DataTable({
    //     // lengthChange: false,
    //     // buttons: ['copy', 'excel', 'pdf', 'print'],
    //     scrollX: true,
    //     destroy: true,
    //     ajax: {
    //       url: '<?= site_url('sewing/getRecutSewingShowAll'); ?>',
    //       type: 'GET'
    //     },
    //     columns: [{
    //         "data": null,
    //         "orderable": true,
    //         "searchable": true,
    //         'className': 'text-center px-4',
    //         // "width": "100px",
    //         "render": function(data, type, row, meta) {
    //           return meta.row + meta.settings._iDisplayStart + 1;
    //         }
    //       },
    //       {
    //         'data': 'created_date',
    //         'className': 'text-center px-2'
    //       },
    //       {
    //         'data': 'buyer',
    //         'className': 'text-center px-2'
    //       },
    //       {
    //         'data': 'style',
    //         'className': 'text-center px-2'
    //       },
    //       {
    //         'data': 'orc',
    //         'className': 'text-center px-2'
    //       },
    //       {
    //         'data': 'part_desc',
    //         'className': 'text-center px-2'
    //       },
    //       {
    //         'data': 'no_bundle',
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
    //       {
    //         'data': 'defect_code',
    //         'className': 'text-center px-2'
    //       },
    //       {
    //         'data': 'defect',
    //         'className': 'text-center px-2'
    //       },
    //       {
    //         'data': 'remarks',
    //         'className': 'text-center px-2'
    //       },
    //       {
    //         'className': 'text-center',
    //         render: function(data, type, row) {
    //           return ""
    //           // if (row['date_received'] == null) {
    //           //   return "<i class='bx bxs-hourglass'></i>"
    //           // } else {
    //           //   return "<i class='bx bx-check-circle' style='color: #22c55e'></i>"
    //           // }

    //         }
    //       },
    //       {
    //         'className': 'text-center',
    //         render: function(data, type, row) {

    //           return "";

    //         }
    //       },
    //     ],
    //   });
    // });

  });
</script>