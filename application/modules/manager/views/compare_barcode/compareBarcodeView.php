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
            <li class="breadcrumb-item active" aria-current="page">Compare Barcode</li>
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
    <h6 class="mb-0 text-uppercase">Compare Barcode</h6>
    <hr />


    <div class="card">
      <div class="card-body">
        <div class="row my-3 mx-2">
          <div class="col-lg-12">
            <div class="row">
              <div class="col-lg-6">
                <div class="row g-3 align-items-center mb-3">
                  <div class="col-lg-2">
                    <label for="orc" class="col-form-label">ORC</label>
                  </div>
                  <div class="col-lg-5">
                    <select class="select2_1" id="orc"></select>
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

            <h4 class="mt-3" style="display: none;">All Barcode Bundle Records</h4>
            <hr style="display: none;" />

            <div class="row mt-3">
              <div class="col-lg-12">
                <!-- <div class="table-responsive"> -->
                <table id="compareBarcodeTable" class="table table-striped table-bordered table-sm nowrap" style="width:100%">
                  <thead>
                    <tr>
                      <th class="text-center">No.</th>
                      <th class="text-center">Barcode Order</th>
                      <th class="text-center">Barcode Cutting</th>
                      <th class="text-center">Barcode Input Sewing </th>
                      <th class="text-center">Barcode Output Sewing</th>
                      <th class="text-center">Barcode Output Packing</th>
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

    const loadOrc = () => {
      $('#orc').empty();
      $.ajax({
        url: " <?= site_url('manager/getORCCompareBarcode'); ?>",
        type: 'GET',
        dataType: 'JSON',
        beforeSend: function() {
          $("#orc").prepend($('<option></option>').html('Loading...'));
        },
      }).done(function(data) {
        $('#orc').empty();
        $('#orc').append($('<option>', {
          value: "",
          text: "- Select ORC -"
        }));
        $.each(data, function(i, item) {
          $('#orc').append($('<option>', {
            value: item.orc,
            text: item.orc
          }));
        });
      });
    }
    loadOrc();


    // Main Table
    let compareBarcodeTable = $('#compareBarcodeTable').DataTable({
      destroy: true
    });

    let orc;
    const loadCompareBarcodeTable = () => {
      orc = $('#orc').val();

      compareBarcodeTable = $('#compareBarcodeTable').DataTable({
        // lengthChange: false,
        dom: 'Blfrtip',
        buttons: ['excel'],
        scrollX: true,
        destroy: true,
        ajax: {
          url: '<?= site_url('manager/getCompareBarcodeTable'); ?>',
          type: 'GET',
          data: {
            'orc': orc
          }
        },
        columns: [{
            "data": null,
            "orderable": true,
            "searchable": true,
            'className': 'text-center px-4',
            "width": "50px",
            "render": function(data, type, row, meta) {
              return meta.row + meta.settings._iDisplayStart + 1;
            }
          },
          {
            'data': 'barcode_order',
            'className': 'text-center px-2'
          },
          {
            'className': 'text-center px-2',
            render: function(data, type, row) {
              if (row['barcode_cutting'] == null) {
                return "<i class='bx bx-x-circle' style='color:red'></i>"
              } else if (row['barcode_cutting'] != null) {
                return row['barcode_cutting']
              } else {
                return "<span></span>"
              }
            }
          },
          {
            'className': 'text-center px-2',
            render: function(data, type, row) {
              if (row['barcode_input_sewing'] == null) {
                return "<i class='bx bx-x-circle' style='color:red'></i>"
              } else if (row['barcode_input_sewing'] != null) {
                return row['barcode_input_sewing']
              } else {
                return "<span></span>"
              }
            }
          },
          {
            'className': 'text-center px-2',
            render: function(data, type, row) {
              if (row['barcode_output_sewing'] == null) {
                return "<i class='bx bx-x-circle' style='color:red'></i>"
              } else if (row['barcode_output_sewing'] != null) {
                return row['barcode_output_sewing']
              } else {
                return "<span></span>"
              }
            }
          },
          {
            'className': 'text-center px-2',
            render: function(data, type, row) {
              if (row['barcode_packing'] == null) {
                return "<i class='bx bx-x-circle' style='color:red'></i>"
              } else if (row['barcode_packing'] != null) {
                return row['barcode_packing']
              } else {
                return "<span></span>"
              }
            }
          },

        ]
      });
    }

    // Load First
    loadCompareBarcodeTable();


    // Select orc
    $('#orc').change(function() {
      orc = $(this).val();

      if (orc != "") {
        loadCompareBarcodeTable();
      } else {
        compareBarcodeTable.clear().draw();
      }
    });


    $('#btn_reset').click(function() {
      $("#orc").val('').trigger('change');
    });




  });
</script>