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

  table.dataTable.dtr-inline.collapsed>tbody>tr>td.child,
  table.dataTable.dtr-inline.collapsed>tbody>tr>th.child,
  table.dataTable.dtr-inline.collapsed>tbody>tr>td.dataTables_empty {
    cursor: default !important;
  }

  table.dataTable.dtr-inline.collapsed>tbody>tr>td.child:before,
  table.dataTable.dtr-inline.collapsed>tbody>tr>th.child:before,
  table.dataTable.dtr-inline.collapsed>tbody>tr>td.dataTables_empty:before {
    display: none !important;
  }

  table.dataTable.dtr-inline.collapsed>tbody>tr>td.dtr-control,
  table.dataTable.dtr-inline.collapsed>tbody>tr>th.dtr-control {
    cursor: pointer;
  }

  table.dataTable.dtr-inline.collapsed>tbody>tr>td.dtr-control:before,
  table.dataTable.dtr-inline.collapsed>tbody>tr>th.dtr-control:before {
    margin-right: 0.5em;
    display: inline-block;
    box-sizing: border-box;
    content: "";
    border-top: 5px solid transparent;
    border-left: 10px solid rgba(0, 0, 0, 0.5);
    border-bottom: 5px solid transparent;
    border-right: 0px solid transparent;
  }

  table.dataTable.dtr-inline.collapsed>tbody>tr>td.dtr-control.arrow-right::before,
  table.dataTable.dtr-inline.collapsed>tbody>tr>th.dtr-control.arrow-right::before {
    border-top: 5px solid transparent;
    border-left: 0px solid transparent;
    border-bottom: 5px solid transparent;
    border-right: 10px solid rgba(0, 0, 0, 0.5);
  }

  table.dataTable.dtr-inline.collapsed>tbody>tr.dtr-expanded>td.dtr-control:before,
  table.dataTable.dtr-inline.collapsed>tbody>tr.dtr-expanded>th.dtr-control:before {
    border-top: 10px solid rgba(0, 0, 0, 0.5);
    border-left: 5px solid transparent;
    border-bottom: 0px solid transparent;
    border-right: 5px solid transparent;
  }

  table.dataTable.dtr-inline.collapsed.compact>tbody>tr>td.dtr-control,
  table.dataTable.dtr-inline.collapsed.compact>tbody>tr>th.dtr-control {
    padding-left: 0.333em;
  }

  table.dataTable.dtr-column>tbody>tr>td.dtr-control,
  table.dataTable.dtr-column>tbody>tr>th.dtr-control,
  table.dataTable.dtr-column>tbody>tr>td.control,
  table.dataTable.dtr-column>tbody>tr>th.control {
    cursor: pointer;
  }

  table.dataTable.dtr-column>tbody>tr>td.dtr-control:before,
  table.dataTable.dtr-column>tbody>tr>th.dtr-control:before,
  table.dataTable.dtr-column>tbody>tr>td.control:before,
  table.dataTable.dtr-column>tbody>tr>th.control:before {
    display: inline-block;
    box-sizing: border-box;
    content: "";
    border-top: 5px solid transparent;
    border-left: 10px solid rgba(0, 0, 0, 0.5);
    border-bottom: 5px solid transparent;
    border-right: 0px solid transparent;
  }

  table.dataTable.dtr-column>tbody>tr>td.dtr-control.arrow-right::before,
  table.dataTable.dtr-column>tbody>tr>th.dtr-control.arrow-right::before,
  table.dataTable.dtr-column>tbody>tr>td.control.arrow-right::before,
  table.dataTable.dtr-column>tbody>tr>th.control.arrow-right::before {
    border-top: 5px solid transparent;
    border-left: 0px solid transparent;
    border-bottom: 5px solid transparent;
    border-right: 10px solid rgba(0, 0, 0, 0.5);
  }

  table.dataTable.dtr-column>tbody>tr.dtr-expanded td.dtr-control:before,
  table.dataTable.dtr-column>tbody>tr.dtr-expanded th.dtr-control:before,
  table.dataTable.dtr-column>tbody>tr.dtr-expanded td.control:before,
  table.dataTable.dtr-column>tbody>tr.dtr-expanded th.control:before {
    border-top: 10px solid rgba(0, 0, 0, 0.5);
    border-left: 5px solid transparent;
    border-bottom: 0px solid transparent;
    border-right: 5px solid transparent;
  }

  table.dataTable>tbody>tr.child {
    padding: 0.5em 1em;
  }

  table.dataTable>tbody>tr.child:hover {
    background: transparent !important;
  }

  table.dataTable>tbody>tr.child ul.dtr-details {
    display: inline-block;
    list-style-type: none;
    margin: 0;
    padding: 0;
  }

  table.dataTable>tbody>tr.child ul.dtr-details>li {
    border-bottom: 1px solid #efefef;
    padding: 0.5em 0;
  }

  table.dataTable>tbody>tr.child ul.dtr-details>li:first-child {
    padding-top: 0;
  }

  table.dataTable>tbody>tr.child ul.dtr-details>li:last-child {
    padding-bottom: 0;
    border-bottom: none;
  }

  table.dataTable>tbody>tr.child span.dtr-title {
    display: inline-block;
    min-width: 75px;
    font-weight: bold;
  }

  div.dtr-modal {
    position: fixed;
    box-sizing: border-box;
    top: 0;
    left: 0;
    height: 100%;
    width: 100%;
    z-index: 100;
    padding: 10em 1em;
  }

  div.dtr-modal div.dtr-modal-display {
    position: absolute;
    top: 0;
    left: 0;
    bottom: 0;
    right: 0;
    width: 50%;
    height: fit-content;
    max-height: 75%;
    overflow: auto;
    margin: auto;
    z-index: 102;
    overflow: auto;
    background-color: #f5f5f7;
    border: 1px solid black;
    border-radius: 0.5em;
    box-shadow: 0 12px 30px rgba(0, 0, 0, 0.6);
  }

  div.dtr-modal div.dtr-modal-content {
    position: relative;
    padding: 2.5em;
  }

  div.dtr-modal div.dtr-modal-content h2 {
    margin-top: 0;
  }

  div.dtr-modal div.dtr-modal-close {
    position: absolute;
    top: 6px;
    right: 6px;
    width: 22px;
    height: 22px;
    text-align: center;
    border-radius: 3px;
    cursor: pointer;
    z-index: 12;
  }

  div.dtr-modal div.dtr-modal-background {
    position: fixed;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    z-index: 101;
    background: rgba(0, 0, 0, 0.6);
  }

  @media screen and (max-width: 767px) {
    div.dtr-modal div.dtr-modal-display {
      width: 95%;
    }
  }

  html.dark table.dataTable>tbody>tr>td.dtr-control:before,
  html[data-bs-theme=dark] table.dataTable>tbody>tr>td.dtr-control:before {
    border-left-color: rgba(255, 255, 255, 0.5) !important;
  }

  html.dark table.dataTable>tbody>tr>td.dtr-control.arrow-right::before,
  html[data-bs-theme=dark] table.dataTable>tbody>tr>td.dtr-control.arrow-right::before {
    border-right-color: rgba(255, 255, 255, 0.5) !important;
  }

  html.dark table.dataTable>tbody>tr.dtr-expanded>td.dtr-control:before,
  html.dark table.dataTable>tbody>tr.dtr-expanded>th.dtr-control:before,
  html[data-bs-theme=dark] table.dataTable>tbody>tr.dtr-expanded>td.dtr-control:before,
  html[data-bs-theme=dark] table.dataTable>tbody>tr.dtr-expanded>th.dtr-control:before {
    border-top-color: rgba(255, 255, 255, 0.5) !important;
    border-left-color: transparent !important;
    border-right-color: transparent !important;
  }

  html.dark table.dataTable>tbody>tr.child ul.dtr-details>li,
  html[data-bs-theme=dark] table.dataTable>tbody>tr.child ul.dtr-details>li {
    border-bottom-color: rgb(64, 67, 70);
  }

  html.dark div.dtr-modal div.dtr-modal-display,
  html[data-bs-theme=dark] div.dtr-modal div.dtr-modal-display {
    background-color: rgb(33, 37, 41);
    border: 1px solid rgba(255, 255, 255, 0.15);
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
            <li class="breadcrumb-item active" aria-current="page">Bundle Records <?= ucwords(strtolower($this->session->userdata['username'])); ?></li>
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
    <h6 class="mb-0 text-uppercase">Bundle Record <?= $this->session->userdata['username']; ?></h6>
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

          <div class="row" style="display: none;">
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
                    <th class="text-center">Quantity Scan</th>
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

          <h4 class="mt-3">Bundle Records By Size</h4>
          <hr />

          <div class="row">
            <div class="col-12 d-flex justify-content-center gap-3">
              <div class="d-flex gap-1">
                <span class="badge bg-light" style="width: 20px; height: 20px; display: inline-block !important; border: 1px solid black"></span>
                <p>No Progress</p>
              </div>

              <div class="d-flex gap-1">
                <span class="badge bg-success" style="width: 20px; height: 20px; display: inline-block !important"></span>
                <p>Finish</p>
              </div>

              <div class="d-flex gap-1">
                <span class="badge bg-danger" style="width: 20px; height: 20px; display: inline-block !important"></span>
                <p>WIP</p>
              </div>
            </div>
          </div>

          <div class="row" id="bundleRecordView">
            <p class="text-center">No Data Available</p>
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
        url: " <?= site_url('sewing/get_orc'); ?>",
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
          url: " <?= site_url('sewing/get_detail_orc'); ?>",
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

          fnRowCallback: function(nRow, aData, iDisplayIndex, iDisplayIndexFull) {

            if (aData['minus'] > 0) {
              $('td', nRow).css('background-color', '#fca5a5');
            }

          },

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

          initComplete: function() {
            $("#bundleRecordView").empty();

            let bsColumnDefault = 12;
            let maxDividerOfColumn = 4;
            let maxDividerOfColumnLeft = 0;

            let orcDetails = bundleRecordTable.rows().data().toArray();
            let groupOfSize = [];
            let groupOfSizeWithTotal = [];
            let column = '';
            let row = '';
            let multiplier = 0;

            orcDetails.forEach(function(item, index) {
              let regexedSize = item.size.replace(/[()]/g, '');
              if (!groupOfSize.includes(regexedSize)) {
                groupOfSize.push(regexedSize);
                groupOfSizeWithTotal.push({
                  size: regexedSize,
                  total: parseInt(item.qty_pcs)
                });
              } else {
                groupOfSizeWithTotal.forEach(function(item2, index2) {
                  if (item2.size == regexedSize) {
                    groupOfSizeWithTotal[index2].total += parseInt(item.qty_pcs);
                  }
                });
              }
            });

            let lengthOfGroupOfSize = groupOfSize.length;
            let bsColumn = bsColumnDefault % lengthOfGroupOfSize;
            let bsColumnDivision = bsColumnDefault / lengthOfGroupOfSize;
            let sortedgroupOfSize = groupOfSize.slice().sort((a, b) => a - b);

            if (bsColumn == 0) {
              for (let i = 0; i < sortedgroupOfSize.length; i++) {
                column += `
                  <div class="mt-3 col-12 col-lg-${bsColumnDefault / sortedgroupOfSize.length}">
                    <table class="table table-bordered" style="width: 100%" id="tableHead${sortedgroupOfSize[i]}">
                        <tr class="bg-info" style="border-radius: 10px;">
                          <th>Size</th>
                          <th colspan="3" class="text-center">
                            ${sortedgroupOfSize[i]}
                          </th>
                        </tr>
                        <tr>
                          <th>Qty.</th>
                          <th colspan="3" class="text-center" id="total${sortedgroupOfSize[i]}">0</th>
                        </tr>
                      </table>
                    <table class="table table-hover nowrap" style="width: 100%" id="table${sortedgroupOfSize[i]}">
                      <thead class="text-center">
                        <tr>
                          <th>No.</th>
                          <th>Out</th>
                          <th>Balance</th>
                          <th>Date</th>
                        </tr>
                      </thead>
                      <tbody id="columnSize${sortedgroupOfSize[i]}">
                      </tbody>
                    </table>
                  </div>
                `;
              }
            } else {
              while (maxDividerOfColumn < lengthOfGroupOfSize) {
                maxDividerOfColumn += 4;
                maxDividerOfColumnLeft = maxDividerOfColumn - 4;
              }

              for (let i = 0; i < sortedgroupOfSize.length; i++) {
                if (i >= maxDividerOfColumnLeft) {
                  // console.log("bsColumnDefault", bsColumnDefault, "maxDividerOfColumnLeft", maxDividerOfColumnLeft, sortedgroupOfSize.length - maxDividerOfColumnLeft);
                  column += `
                    <div class="mt-3 col-12 col-lg-${(bsColumnDefault / (sortedgroupOfSize.length - maxDividerOfColumnLeft))}">
                      <table class="table table-bordered" style="width: 100%" id="tableHead${sortedgroupOfSize[i]}">
                        <tr class="bg-info" style="border-radius: 10px;">
                          <th>Size</th>
                          <th colspan="3" class="text-center">
                            ${sortedgroupOfSize[i]}
                          </th>
                        </tr>
                        <tr>
                          <th>Qty.</th>
                          <th colspan="3" class="text-center" id="total${sortedgroupOfSize[i]}">0</th>
                        </tr>
                      </table>

                      <table class="table table-hover nowrap" style="width: 100%" id="table${sortedgroupOfSize[i]}">
                      <thead class="text-center">
                        <tr>
                          <th>No.</th>
                          <th>Out</th>
                          <th>Balance</th>
                          <th>Date</th>
                        </tr>
                      </thead>
                      <tbody id="columnSize${sortedgroupOfSize[i]}">
                      </tbody>
                    </table>
                    </div>
                  `;
                } else {
                  column += `
                    <div class="mt-3 col-12 col-lg-3">
                      <table class="table table-bordered" style="width: 100%" id="tableHead${sortedgroupOfSize[i]}">
                        <tr class="bg-info" style="border-radius: 10px;">
                          <th>Size</th>
                          <th colspan="3" class="text-center">
                            ${sortedgroupOfSize[i]}
                          </th>
                        </tr>
                        <tr>
                          <th>Qty.</th>
                          <th colspan="3" class="text-center" id="total${sortedgroupOfSize[i]}">0</th>
                        </tr>
                      </table>

                      <table class="table table-striped table-bordered table-hover table-sm nowrap" style="width: 100%" id="table${sortedgroupOfSize[i]}">
                      <thead class="text-center">
                        <tr>
                          <th>No.</th>
                          <th>Out</th>
                          <th>Balance</th>
                          <th>Date</th>
                        </tr>
                      </thead>
                      <tbody id="columnSize${sortedgroupOfSize[i]}">
                      </tbody>
                    </table>
                    </div>
                  `;
                }
              }
            }

            $("#bundleRecordView").append(column);

            orcDetails.forEach(function(item, index) {
              let regexedSize = item.size.replace(/[()]/g, '');
              row = `
                <tr style="cursor: pointer; ${(item.qt_act == 0? '' : (item.minus > 0 ? 'background-color: #fca5a5' : 'background-color: #86efac'))}">
                  <td class="align-middle text-center">
                    <div class="d-flex">
                      <p class="noBundle" style="margin-top: 15px !important;">${item.no_bundle}</p>
                      <p class="kodeBarcode" style="display: none;">${item.kode_barcode}</p>
                      <p class="sizeBundle" style="display: none;">${item.size}</p>
                      &nbsp;
                      <button class="btn btn-sm radius-30 btn-outline-primary barcodeBtn" title="Show barcode bundle" style="width: 30px !important; height: 30px !important; margin-top: 10px">
                        <i class="bx bx-search-alt-2" style="margin-right: 0px !important; font-size: 1rem; !important"></i>
                      </button>
                    </div>
                  </td>
                  <td class="align-middle text-center">${item.qt_act}</td>
                  <td class="align-middle text-center">${item.minus}</td>
                  <td class="align-middle text-center">${item.date_created}</td>
                </tr>
              `;

              $("#columnSize" + regexedSize).append(row);
            });

            sortedgroupOfSize.forEach(function(item, index) {
              $("#table" + item).DataTable({
                scrollX: true,
                scrollY: 300,
                paging: false,
                info: false,
                // responsive: true
              });

              $("#total" + item).html(groupOfSizeWithTotal[index].total);
            });

            $(".dataTables_filter").each(function(index, item) {
              item.parentElement.classList = "col-12 col-lg-12";
            });

            $(".barcodeBtn").on("click", function() {
              let arrSelectedRows = [];
              let orc = $("#orc").val();
              let noBundle = $(this).parent().find(".noBundle").text();
              let kodeBarcode = $(this).parent().find(".kodeBarcode").text();
              let sizeBundle = $(this).parent().find(".sizeBundle").text();

              arrSelectedRows.push({
                "orc": orc,
                "style": style,
                "color": color,
                "buyer": buyer,
                "comm": comm,
                "so": po_numb,
                "qty": qty_order,
                // "boxes": item.boxes,
                "prepare_on": prepare,
                "size": sizeBundle,
                "no_bundle": noBundle,
                "kode_barcode": kodeBarcode,
                "cp": "",
                "bw": "",
                "cu": "",
                "as": "as_"
              });

              localStorage.removeItem('selectedRows');
              localStorage.setItem("selectedRows", JSON.stringify(arrSelectedRows));

              window.open("<?php echo site_url('sewing/show_print_bundle'); ?>");
            });
          }
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