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
      <div class="breadcrumb-title pe-3">Manager</div>
      <div class="ps-3">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb mb-0 p-0">
            <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">Bundle Records</li>
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
    <h6 class="mb-0 text-uppercase">Bundle Record</h6>
    <hr />


    <div class="card">
      <div class="card-body">
        <div class="row my-3 mx-2">
          <div class="col-lg-12">
            <div class="row">
              <div class="col-lg-6">
                <div class="row g-3 align-items-center mb-3">
                  <div class="col-lg-3">
                    <label for="orc" class="col-form-label">ORC <sup style="color: red;">*</sup></label>
                  </div>
                  <div class="col-lg-6">
                    <select id="orc" class="form-control select2_1" style="width: 100%;"></select>
                  </div>
                  <div class="col-lg-2">
                    <button class="btn btn-outline-secondary" id="btn_reset">Reset</button>
                  </div>
                </div>
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
                    <label for="qty_order" class="col-form-label">Qty Order</label>
                  </div>
                  <div class="col-lg-7">
                    <label id="qty_order" class="col-form-label">: -</label>
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
                    <label for="color" class="col-form-label">Color</label>
                  </div>
                  <div class="col-lg-7">
                    <label id="color" class="col-form-label">: -</label>
                  </div>
                </div>
              </div>
              <div class="col-lg-6">
                <div class="row g-3 align-items-center mb-3" style="margin-top: 35px;">
                  <div class="col-lg-3">
                    <label for="com" class="col-form-label">Com</label>
                  </div>
                  <div class="col-lg-7">
                    <label id="com" class="col-form-label">: -</label>
                  </div>
                </div>
                <div class="row g-3 align-items-center mb-3">
                  <div class="col-lg-3">
                    <label for="prepared_on" class="col-form-label">Prepared On</label>
                  </div>
                  <div class="col-lg-2">
                    <label id="prepared_on" class="col-form-label">: -</label>
                  </div>
                </div>
                <div class="row g-3 align-items-center mb-3">
                  <div class="col-lg-3">
                    <label for="po_numb" class="col-form-label">PO Numb.</label>
                  </div>
                  <div class="col-lg-2">
                    <label id="po_numb" class="col-form-label">: -</label>
                  </div>
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
              <table id="bundleRecordTable" class="table table-striped table-bordered table-sm nowrap" style="width:100%">
                <thead>
                  <tr>
                    <th class="text-center">No.</th>
                    <th class="text-center">Size</th>
                    <th class="text-center">No Bundle</th>
                    <th class="text-center">Barcode</th>
                    <th class="text-center">Scan Trimstore</th>
                    <th class="text-center">Scan Sewing</th>
                    <th class="text-center">Quantity Bundle</th>
                    <th class="text-center">Quantity Scan Sewing</th>
                    <th class="text-center">WIP</th>
                  </tr>
                </thead>
                <tfoot>
                  <tr>
                    <th colspan="6" class="text-center">Total Qty</th>
                    <th class="text-center"></th>
                    <th class="text-center"></th>
                    <th class="text-center"></th>
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

    // Load ORC
    const loadOrc = () => {
      $('#orc').empty();
      $.ajax({
        url: " <?= site_url('manager/get_orc'); ?>",
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

    let style, orc, color, buyer, com, order, po_numb, bundle, qty_order, prepare;

    // Main Table
    let bundleRecordTable = $('#bundleRecordTable').DataTable({
      // lengthChange: false,
      // buttons: ['copy', 'excel', 'pdf', 'print'],
      scrollX: true,
      destroy: true,
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

        // Total over all pages
        total = api
          .column(7)
          .data()
          .reduce((a, b) => intVal(a) + intVal(b), 0);

        // Total over this page
        pageTotal = api
          .column(7, {
            page: 'current'
          })
          .data()
          .reduce((a, b) => intVal(a) + intVal(b), 0);

        // Update footer
        api.column(7).footer().innerHTML =
          pageTotal + ' ( ' + total + ' )';

        // Total over all pages
        total = api
          .column(8)
          .data()
          .reduce((a, b) => intVal(a) + intVal(b), 0);

        // Total over this page
        pageTotal = api
          .column(8, {
            page: 'current'
          })
          .data()
          .reduce((a, b) => intVal(a) + intVal(b), 0);

        // Update footer
        api.column(8).footer().innerHTML =
          pageTotal + ' ( ' + total + ' )';

        // Update footer
        // api.column(6).footer().innerHTML =
        //   total
      }
    });

    $('#orc').change(function() {
      let orc = $(this).val();

      if (orc != "") {
        $.ajax({
          url: " <?= site_url('manager/get_detail_orc'); ?>",
          type: 'GET',
          dataType: 'JSON',
          data: {
            'orc': orc
          },
        }).done(function(data) {
          style = data[0].style;
          color = data[0].color;
          buyer = data[0].buyer;
          comm = data[0].comm;
          order = data[0].order;
          po_numb = data[0].so;
          bundle = data[0].no_bundle;
          qty_order = data[0].qty_order;
          prepare = data[0].date_created;

          $('#style').html(': ' + data[0].style);
          $('#color').html(': ' + data[0].color);
          $('#buyer').html(': ' + data[0].buyer);
          $('#com').html(': ' + data[0].comm);
          $('#order').html(': ' + data[0].order);
          $('#po_numb').html(': ' + data[0].so);
          $('#bundle').html(': ' + data[0].no_bundle);
          $('#qty_order').html(': ' + data[0].qty_order);
          $('#prepare').html(': ' + data[0].date_created);
        });

        bundleRecordTable = $('#bundleRecordTable').DataTable({
          // lengthChange: false,
          // buttons: ['copy', 'excel', 'pdf', 'print'],
          scrollX: true,
          destroy: true,
          ajax: {
            url: '<?= site_url('sewing/get_datas_reports'); ?>',
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
              // "width": "100px",
              "render": function(data, type, row, meta) {
                return meta.row + meta.settings._iDisplayStart + 1;
              }
            },
            {
              'data': 'size',
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
              'className': 'text-center px-2',
              render: function(data, type, row) {
                if (row['barcode_inputan'] == null) {
                  return "<i class='bx bx-x-circle' style='color:red'></i>"
                } else if (row['barcode_inputan'] != null) {
                  return row['barcode_inputan']
                } else {
                  return "<span></span>"
                }
              }
            },
            {
              'className': 'text-center px-2',
              render: function(data, type, row) {
                if (row['barcode_sewing'] == null) {
                  return "<i class='bx bx-x-circle' style='color:red'></i>"
                } else if (row['barcode_sewing'] != 0) {
                  return row['barcode_sewing']
                } else {
                  return "<span></span>"
                }
              }
            },
            {
              'data': 'qty_pcs',
              'className': 'text-center px-2'
            },
            {
              'data': 'qt_act',
              'className': 'text-center px-2'
            },
            {
              'data': 'minus',
              'className': 'text-center px-2'
            },
          ],

          // fnRowCallback: function(nRow, aData, iDisplayIndex, iDisplayIndexFull) {

          //   if (aData['minus'] > 0) {
          //     $('td', nRow).css('background-color', '#fca5a5');
          //   }

          // },

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


            total = api
              .column(7)
              .data()
              .reduce((a, b) => intVal(a) + intVal(b), 0);

            // Total over this page
            pageTotal = api
              .column(7, {
                page: 'current'
              })
              .data()
              .reduce((a, b) => intVal(a) + intVal(b), 0);

            // Update footer
            api.column(7).footer().innerHTML =
              pageTotal + ' ( ' + total + ' )';


            // Total over all pages
            total = api
              .column(8)
              .data()
              .reduce((a, b) => intVal(a) + intVal(b), 0);

            // Total over this page
            pageTotal = api
              .column(8, {
                page: 'current'
              })
              .data()
              .reduce((a, b) => intVal(a) + intVal(b), 0);

            // Update footer
            api.column(8).footer().innerHTML =
              pageTotal + ' ( ' + total + ' )';

          },


        });
      } else {
        bundleRecordTable.clear().draw();
        $("#bundleRecordView").empty();
        $("#bundleRecordView").append('<p class="text-center">No Data Available</p>');
      }
    });


    $('#btn_reset').click(function() {
      $("#orc").val('').trigger('change');

      $('#style').html(': -');
      $('#color').html(': -');
      $('#buyer').html(': -');
      $('#com').html(': -');
      $('#order').html(': -');
      $('#po_numb').html(': -');
      $('#bundle').html(': -');
      $('#qty_order').html(': -');
      $('#prepare').html(': -');
    });




  });
</script>