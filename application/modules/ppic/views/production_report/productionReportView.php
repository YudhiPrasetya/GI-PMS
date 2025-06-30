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
      <div class="breadcrumb-title pe-3">PPIC</div>
      <div class="ps-3">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb mb-0 p-0">
            <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">Production Report</li>
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
    <h6 class="mb-0 text-uppercase">Production Report</h6>
    <hr />


    <div class="card">
      <div class="card-body">
        <div class="row my-3 mx-2">
          <table id="productionReportTable" class="table table-striped table-bordered table-sm nowrap" style="width:100%">
            <thead>
              <tr>
                <th>No.</th>
                <th>Style</th>
                <th>ORC</th>
                <th>Color</th>
                <th>Qty Order</th>
                <th>Qty Output Cutting</th>
                <th>Qty Output Sewing</th>
                <th>Qty Output Packing</th>
                <th>Qty Output Transfer Area</th>
                <th>ETD</th>
                <th>Plan Export</th>
                <th>Action</th>
              </tr>
            </thead>
          </table>

        </div>
      </div>
    </div>


  </div>
</div>
<!--end page wrapper -->

<!-- Modal Output Cutting Size Details -->
<div class="modal fade" id="outputCuttingSizeDetailsModal" tabindex="-1" aria-labelledby="outputCuttingSizeDetailsModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="outputCuttingSizeDetailsModalLabel">Details Output Cutting Per Size</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="mx-3 my-3">

          <table id="outputCuttingSizeDetailsTable" class="table table-striped table-hover nowrap table-sm" style="width:100%;">
            <thead>
              <tr>
                <th>No.</th>
                <th>ORC</th>
                <th>Size</th>
                <th>Qty Output Cutting</th>
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

<!-- Modal Output Sewing Size Details -->
<div class="modal fade" id="outputSewingSizeDetailsModal" tabindex="-1" aria-labelledby="outputSewingSizeDetailsModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="outputSewingSizeDetailsModalLabel">Details Output Sewing Per Size</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="mx-3 my-3">

          <table id="outputSewingSizeDetailsTable" class="table table-striped table-hover nowrap table-sm" style="width:100%;">
            <thead>
              <tr>
                <th>No.</th>
                <th>ORC</th>
                <th>Size</th>
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

<!-- Modal Output Packing Size Details -->
<div class="modal fade" id="outputPackingSizeDetailsModal" tabindex="-1" aria-labelledby="outputPackingSizeDetailsModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="outputPackingSizeDetailsModalLabel">Details Output Packing Per Size</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="mx-3 my-3">

          <table id="outputPackingSizeDetailsTable" class="table table-striped table-hover nowrap table-sm" style="width:100%;">
            <thead>
              <tr>
                <th>No.</th>
                <th>ORC</th>
                <th>Size</th>
                <th>Qty Output Packing</th>
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

<!-- Modal Output Transfer Area Size Details -->
<div class="modal fade" id="transferAreaSizeDetailsModal" tabindex="-1" aria-labelledby="transferAreaSizeDetailsModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="transferAreaSizeDetailsModalLabel">Details Output Packing Per Size</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="mx-3 my-3">

          <table id="transferAreaSizeDetailsTable" class="table table-striped table-hover nowrap table-sm" style="width:100%;">
            <thead>
              <tr>
                <th>No.</th>
                <th>ORC</th>
                <th>Size</th>
                <th>Qty Output Packing</th>
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

<!-- Modal Output Transfer Area Size Details -->
<div class="modal fade" id="outputAllDeptSizeDetailsModal" tabindex="-1" aria-labelledby="outputAllDeptSizeDetailsModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="outputAllDeptSizeDetailsModalLabel">Details Output Packing Per Size</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="mx-3 my-3">

          <table id="outputAllDeptSizeDetailsTable" class="table table-striped table-hover table-sm nowrap" style="width:100%;">
            <thead>
              <tr>
                <th>No.</th>
                <th>ORC</th>
                <th>Size</th>
                <th>Qty Output Cutting</th>
                <th>Qty Output Sewing</th>
                <th>Qty Output Packing</th>
                <th>Qty Transfer Area</th>
              </tr>
            </thead>
            <tbody></tbody>
            <tfoot>
              <th colspan="3">Total</th>
              <th></th>
              <th></th>
              <th></th>
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
    theme: 'bootstrap4',
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



    // Main Table
    let productionReportTable = $('#productionReportTable').DataTable({
      // lengthChange: false,
      buttons: ['excel'],
      dom: '<"top"Blf>rt<"bottom"ip>',
      destroy: true,
      scrollX: true,
      ajax: {
        url: '<?= site_url('ppic/getReportPlanningProduction'); ?>',
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
          'data': 'qty',
          'className': 'text-center px-2'
        },
        {
          'className': 'text-center',
          render: function(data, type, row) {
            return "<span style='cursor: pointer; color:#0ea5e9;' id='output_cutting_size_details'>" + row['output_cutting'] + "</span>"
          }
        },
        {
          'className': 'text-center',
          render: function(data, type, row) {
            return "<span style='cursor: pointer; color:#0ea5e9;' id='output_sewing_size_details'>" + row['output_sewing'] + "</span>"
          }
        },
        {
          'className': 'text-center',
          render: function(data, type, row) {
            return "<span style='cursor: pointer; color:#0ea5e9;' id='output_packing_size_details'>" + row['output_packing'] + "</span>"
          }
        },
        {
          'className': 'text-center',
          render: function(data, type, row) {
            return "<span style='cursor: pointer; color:#0ea5e9;' id='transfer_area_size_details'>" + row['transfer_area'] + "</span>"
          }
        },
        {
          'data': 'etd',
          'className': 'text-center px-2'
        },
        {
          'data': 'plan_export',
          'className': 'text-center px-2'
        },
        {
          'className': 'text-center',
          render: function(data, type, row) {
            return "<span class='badge text-bg-info text-white mx-3' id='btn_details_all_dept' style='cursor: pointer;'>Details</span>"
          }
        },
      ],

    });

    productionReportTable.buttons().container()
      .appendTo('#productionReportTable_wrapper .col-md-6:eq(0)');


    // Click qty cutting (load size details)
    $('#productionReportTable tbody').on('click', '#output_cutting_size_details', function() {
      let orc = productionReportTable.row($(this).parents('tr')).data().orc;

      let outputCuttingSizeDetailsTable = $('#outputCuttingSizeDetailsTable').DataTable({
        autoWidth: false,
        info: false,
        searching: false,
        paging: false,
        scrollX: true,
        fixedHeader: true,
        lengthMenu: false,
        destroy: true,
        ajax: {
          url: '<?= site_url('ppic/getOutputCuttingSizeDetails'); ?>',
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
            'data': 'size',
            'className': 'text-center px-2'
          },
          {
            'data': 'qty_sum_per_size',
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

      $("#outputCuttingSizeDetailsModal").on('shown.bs.modal', function() {
        $('#outputCuttingSizeDetailsTable').DataTable().columns.adjust();
      });

      $("#outputCuttingSizeDetailsModal").modal("show");
    });

    // Click qty sewing (load size details)
    $('#productionReportTable tbody').on('click', '#output_sewing_size_details', function() {
      let orc = productionReportTable.row($(this).parents('tr')).data().orc;

      let outputSewingSizeDetailsTable = $('#outputSewingSizeDetailsTable').DataTable({
        autoWidth: false,
        info: false,
        searching: false,
        paging: false,
        scrollX: true,
        fixedHeader: true,
        lengthMenu: false,
        destroy: true,
        ajax: {
          url: '<?= site_url('ppic/getOutputSewingSizeDetails'); ?>',
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
            'data': 'size',
            'className': 'text-center px-2'
          },
          {
            'data': 'qty_sum_per_size',
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

      $("#outputSewingSizeDetailsModal").on('shown.bs.modal', function() {
        $('#outputSewingSizeDetailsTable').DataTable().columns.adjust();
      });

      $("#outputSewingSizeDetailsModal").modal("show");
    });

    // Click qty packing (load size details)
    $('#productionReportTable tbody').on('click', '#output_packing_size_details', function() {
      let orc = productionReportTable.row($(this).parents('tr')).data().orc;

      let outputPackingSizeDetailsTable = $('#outputPackingSizeDetailsTable').DataTable({
        autoWidth: false,
        info: false,
        searching: false,
        paging: false,
        scrollX: true,
        fixedHeader: true,
        lengthMenu: false,
        destroy: true,
        ajax: {
          url: '<?= site_url('ppic/getOutputPackingSizeDetails'); ?>',
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
            'data': 'size',
            'className': 'text-center px-2'
          },
          {
            'data': 'qty_sum_per_size',
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

      $("#outputPackingSizeDetailsModal").on('shown.bs.modal', function() {
        $('#outputPackingSizeDetailsTable').DataTable().columns.adjust();
      });

      $("#outputPackingSizeDetailsModal").modal("show");
    });

    // Click qty transfer area (load size details)
    $('#productionReportTable tbody').on('click', '#transfer_area_size_details', function() {
      let orc = productionReportTable.row($(this).parents('tr')).data().orc;

      let transferAreaSizeDetailsTable = $('#transferAreaSizeDetailsTable').DataTable({
        autoWidth: false,
        info: false,
        searching: false,
        paging: false,
        scrollX: true,
        fixedHeader: true,
        lengthMenu: false,
        destroy: true,
        ajax: {
          url: '<?= site_url('ppic/getTransferAreaSizeDetails'); ?>',
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
            'data': 'size',
            'className': 'text-center px-2'
          },
          {
            'data': 'qty_sum_per_size',
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

      $("#transferAreaSizeDetailsModal").on('shown.bs.modal', function() {
        $('#transferAreaSizeDetailsTable').DataTable().columns.adjust();
      });

      $("#transferAreaSizeDetailsModal").modal("show");
    });

    // Click qty output all dept (load size details)
    $('#productionReportTable tbody').on('click', '#btn_details_all_dept', function() {
      let orc = productionReportTable.row($(this).parents('tr')).data().orc;

      let outputAllDeptSizeDetailsTable = $('#outputAllDeptSizeDetailsTable').DataTable({
        autoWidth: false,
        info: false,
        searching: false,
        paging: false,
        scrollX: true,
        fixedHeader: true,
        lengthMenu: false,
        destroy: true,
        ajax: {
          url: '<?= site_url('ppic/getOutputAllDeptSizeDetails'); ?>',
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
            'data': 'size',
            'className': 'text-center px-2'
          },
          {
            'data': 'output_cutting',
            'className': 'text-center px-2'
          },
          {
            'data': 'output_sewing',
            'className': 'text-center px-2'
          },
          {
            'data': 'output_packing',
            'className': 'text-center px-2'
          },
          {
            'data': 'transfer_area',
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

          // Cutting
          // Total over all pages
          cutting = api
            .column(3)
            .data()
            .reduce((a, b) => intVal(a) + intVal(b), 0);

          // Update footer
          api.column(3).footer().innerHTML =
            cutting

          // Sewing
          // Total over all pages
          sewing = api
            .column(4)
            .data()
            .reduce((a, b) => intVal(a) + intVal(b), 0);

          // Update footer
          api.column(4).footer().innerHTML =
            sewing

          // Packing
          // Total over all pages
          packing = api
            .column(5)
            .data()
            .reduce((a, b) => intVal(a) + intVal(b), 0);

          // Update footer
          api.column(5).footer().innerHTML =
            packing

          // Transfer Area
          // Total over all pages
          transfer_area = api
            .column(6)
            .data()
            .reduce((a, b) => intVal(a) + intVal(b), 0);

          // Update footer
          api.column(6).footer().innerHTML =
            transfer_area
        }


      });

      $("#outputAllDeptSizeDetailsModal").on('shown.bs.modal', function() {
        $('#outputAllDeptSizeDetailsTable').DataTable().columns.adjust();
      });

      $("#outputAllDeptSizeDetailsModal").modal("show");
    });







  });
</script>