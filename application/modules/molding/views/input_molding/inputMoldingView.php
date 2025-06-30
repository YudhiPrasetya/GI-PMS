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
      <div class="breadcrumb-title pe-3">Molding</div>
      <div class="ps-3">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb mb-0 p-0">
            <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">Input Molding</li>
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
    <h6 class="mb-0 text-uppercase">Input Molding</h6>
    <hr />


    <div class="card">
      <div class="card-body">
        <div class="row my-3 mx-2">
          <div class="row g-3 align-items-center mb-4">
            <div class="col-sm-4 col-md-3 col-lg-2">
              <label for="scan_bundle_record" class="col-form-label">Scan Bundle Record</label>
            </div>
            <div class="col-sm-8 col-md-5 col-lg-3">
              <input type="text" id="scan_bundle_record" class="form-control" placeholder="Scan barcode here...">
            </div>
          </div>
          <div class="mb-3">
            <button class="btn btn-info btn-sm me-1" id="btn_daily" disabled>Daily</button>
            <button class="btn btn-outline-info btn-sm me-1" id="btn_yesterday">Yesterday</button>
            <button class="btn btn-outline-info btn-sm" id="btn_30_days_ago">30 Days Ago</button>
          </div>
          <!-- <div class="table-responsive"> -->
          <table id="inputMoldingTable" class="table table-striped table-bordered table-sm nowrap" style="width:100%">
            <thead>
              <tr>
                <th>No.</th>
                <th>Scan Date</th>
                <th>ORC</th>
                <th>Style</th>
                <th>Color</th>
                <th>Size</th>
                <th>Bundle</th>
                <th>Qty</th>
                <th>Outer</th>
                <th>Mid</th>
                <th>Linning</th>
              </tr>
            </thead>
            <tfoot>
              <th colspan="7">Total Input Molding</th>
              <th></th>
              <th></th>
              <th></th>
              <th></th>
            </tfoot>
          </table>
          <!-- </div> -->
        </div>
      </div>
    </div>


  </div>
</div>
<!--end page wrapper -->


<script>
  $(document).ready(function() {
    const sweet_loader = '<div class="sweet_loader"><svg viewBox="0 0 140 140" width="140" height="140"><g class="outline"><path d="m 70 28 a 1 1 0 0 0 0 84 a 1 1 0 0 0 0 -84" stroke="rgba(0,0,0,0.1)" stroke-width="4" fill="none" stroke-linecap="round" stroke-linejoin="round"></path></g><g class="circle"><path d="m 70 28 a 1 1 0 0 0 0 84 a 1 1 0 0 0 0 -84" stroke="#71BBFF" stroke-width="4" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-dashoffset="200" stroke-dasharray="300"></path></g></svg></div>';

    $('#scan_bundle_record').focus();

    let inputMoldingTable = $('#inputMoldingTable').DataTable({
      // lengthChange: false,
      // buttons: ['copy', 'excel', 'pdf', 'print'],
      scrollX: true,
      destroy: true,
      ajax: {
        url: '<?= site_url("molding/getInputMolding"); ?>',
        type: 'GET',
        dataType: 'JSON'
      },
      columns: [{
          "data": null,
          "orderable": true,
          "searchable": false,
          'className': 'text-center px-4',
          // "width": "100px",
          "render": function(data, type, row, meta) {
            return meta.row + meta.settings._iDisplayStart + 1;
          }
        },
        {
          'data': 'tgl',
          'className': 'text-center px-3'
        },
        {
          'data': 'orc',
          'className': 'text-center px-3'
        },
        {
          'data': 'style',
          'className': 'text-center px-3'
        },
        {
          'data': 'color',
          'className': 'text-center px-3'
        },
        {
          'data': 'size',
          'className': 'text-center px-3'
        },
        {
          'data': 'no_bundle',
          'className': 'text-center px-3'
        },
        {
          'data': 'qty_pcs',
          'className': 'text-center px-3'
        },
        {
          'className': 'text-center px-3',
          render: function(data, type, row) {
            if (row['outermold_barcode']) {
              return "<i class='bx bxs-check-circle' style='color: #22c55e'></i>"
            } else {
              return ""
            }
          }
        },
        {
          'className': 'text-center px-3',
          render: function(data, type, row) {
            if (row['midmold_barcode']) {
              return "<i class='bx bxs-check-circle' style='color: #22c55e'></i>"
            } else {
              return ""
            }
          }
        },
        {
          'className': 'text-center px-3',
          render: function(data, type, row) {
            if (row['linningmold_barcode']) {
              return "<i class='bx bxs-check-circle' style='color: #22c55e'></i>"
            } else {
              return ""
            }
          }
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

        // Update footer
        // api.column(6).footer().innerHTML =
        //   total
      }

    });

    $('#btn_daily').click(function() {
      $('#btn_daily').removeClass('btn-outline-info');
      $('#btn_daily').addClass('btn-info');
      $('#btn_daily').prop('disabled', true);

      $('#btn_yesterday').removeClass('btn-info');
      $('#btn_yesterday').addClass('btn-outline-info');
      $('#btn_yesterday').prop('disabled', false);

      $('#btn_30_days_ago').removeClass('btn-info');
      $('#btn_30_days_ago').addClass('btn-outline-info');
      $('#btn_30_days_ago').prop('disabled', false);

      inputMoldingTable.clear().draw();

      inputMoldingTable = $('#inputMoldingTable').DataTable({
        // lengthChange: false,
        // buttons: ['copy', 'excel', 'pdf', 'print'],
        scrollX: true,
        destroy: true,
        ajax: {
          url: '<?= site_url("molding/getInputMolding"); ?>',
          type: 'GET',
          dataType: 'JSON'
        },
        columns: [{
            "data": null,
            "orderable": true,
            "searchable": false,
            'className': 'text-center px-4',
            // "width": "100px",
            "render": function(data, type, row, meta) {
              return meta.row + meta.settings._iDisplayStart + 1;
            }
          },
          {
            'data': 'tgl',
            'className': 'text-center px-3'
          },
          {
            'data': 'orc',
            'className': 'text-center px-3'
          },
          {
            'data': 'style',
            'className': 'text-center px-3'
          },
          {
            'data': 'color',
            'className': 'text-center px-3'
          },
          {
            'data': 'size',
            'className': 'text-center px-3'
          },
          {
            'data': 'no_bundle',
            'className': 'text-center px-3'
          },
          {
            'data': 'qty_pcs',
            'className': 'text-center px-3'
          },
          {
            'className': 'text-center px-3',
            render: function(data, type, row) {
              if (row['outermold_barcode']) {
                return "<i class='bx bxs-check-circle' style='color: #22c55e'></i>"
              } else {
                return ""
              }
            }
          },
          {
            'className': 'text-center px-3',
            render: function(data, type, row) {
              if (row['midmold_barcode']) {
                return "<i class='bx bxs-check-circle' style='color: #22c55e'></i>"
              } else {
                return ""
              }
            }
          },
          {
            'className': 'text-center px-3',
            render: function(data, type, row) {
              if (row['linningmold_barcode']) {
                return "<i class='bx bxs-check-circle' style='color: #22c55e'></i>"
              } else {
                return ""
              }
            }
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

          // Update footer
          // api.column(6).footer().innerHTML =
          //   total
        }

      });
    });

    $('#btn_yesterday').click(function() {
      $('#btn_daily').removeClass('btn-info');
      $('#btn_daily').addClass('btn-outline-info');
      $('#btn_daily').prop('disabled', false);

      $('#btn_yesterday').removeClass('btn-outline-info');
      $('#btn_yesterday').addClass('btn-info');
      $('#btn_yesterday').prop('disabled', true);

      $('#btn_30_days_ago').removeClass('btn-info');
      $('#btn_30_days_ago').addClass('btn-outline-info');
      $('#btn_30_days_ago').prop('disabled', false);

      inputMoldingTable.clear().draw();

      inputMoldingTable = $('#inputMoldingTable').DataTable({
        // lengthChange: false,
        // buttons: ['copy', 'excel', 'pdf', 'print'],
        scrollX: true,
        destroy: true,
        ajax: {
          url: '<?= site_url("molding/getInputMoldingYesterday"); ?>',
          type: 'GET',
          dataType: 'JSON'
        },
        columns: [{
            "data": null,
            "orderable": true,
            "searchable": false,
            'className': 'text-center px-4',
            // "width": "100px",
            "render": function(data, type, row, meta) {
              return meta.row + meta.settings._iDisplayStart + 1;
            }
          },
          {
            'data': 'tgl',
            'className': 'text-center px-3'
          },
          {
            'data': 'orc',
            'className': 'text-center px-3'
          },
          {
            'data': 'style',
            'className': 'text-center px-3'
          },
          {
            'data': 'color',
            'className': 'text-center px-3'
          },
          {
            'data': 'size',
            'className': 'text-center px-3'
          },
          {
            'data': 'no_bundle',
            'className': 'text-center px-3'
          },
          {
            'data': 'qty_pcs',
            'className': 'text-center px-3'
          },
          {
            'className': 'text-center px-3',
            render: function(data, type, row) {
              if (row['outermold_barcode']) {
                return "<i class='bx bxs-check-circle' style='color: #22c55e'></i>"
              } else {
                return ""
              }
            }
          },
          {
            'className': 'text-center px-3',
            render: function(data, type, row) {
              if (row['midmold_barcode']) {
                return "<i class='bx bxs-check-circle' style='color: #22c55e'></i>"
              } else {
                return ""
              }
            }
          },
          {
            'className': 'text-center px-3',
            render: function(data, type, row) {
              if (row['linningmold_barcode']) {
                return "<i class='bx bxs-check-circle' style='color: #22c55e'></i>"
              } else {
                return ""
              }
            }
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

          // Update footer
          // api.column(6).footer().innerHTML =
          //   total
        }

      });
    });

    $('#btn_30_days_ago').click(function() {
      $('#btn_daily').removeClass('btn-info');
      $('#btn_daily').addClass('btn-outline-info');
      $('#btn_daily').prop('disabled', false);

      $('#btn_yesterday').removeClass('btn-info');
      $('#btn_yesterday').addClass('btn-outline-info');
      $('#btn_yesterday').prop('disabled', false);

      $('#btn_30_days_ago').removeClass('btn-outline-info');
      $('#btn_30_days_ago').addClass('btn-info');
      $('#btn_30_days_ago').prop('disabled', true);

      inputMoldingTable.clear().draw();

      inputMoldingTable = $('#inputMoldingTable').DataTable({
        // lengthChange: false,
        // buttons: ['copy', 'excel', 'pdf', 'print'],
        scrollX: true,
        destroy: true,
        ajax: {
          url: '<?= site_url("molding/getInputMolding30DaysAgo"); ?>',
          type: 'GET',
          dataType: 'JSON'
        },
        columns: [{
            "data": null,
            "orderable": true,
            "searchable": false,
            'className': 'text-center px-4',
            // "width": "100px",
            "render": function(data, type, row, meta) {
              return meta.row + meta.settings._iDisplayStart + 1;
            }
          },
          {
            'data': 'tgl',
            'className': 'text-center px-3'
          },
          {
            'data': 'orc',
            'className': 'text-center px-3'
          },
          {
            'data': 'style',
            'className': 'text-center px-3'
          },
          {
            'data': 'color',
            'className': 'text-center px-3'
          },
          {
            'data': 'size',
            'className': 'text-center px-3'
          },
          {
            'data': 'no_bundle',
            'className': 'text-center px-3'
          },
          {
            'data': 'qty_pcs',
            'className': 'text-center px-3'
          },
          {
            'className': 'text-center px-3',
            render: function(data, type, row) {
              if (row['outermold_barcode']) {
                return "<i class='bx bxs-check-circle' style='color: #22c55e'></i>"
              } else {
                return ""
              }
            }
          },
          {
            'className': 'text-center px-3',
            render: function(data, type, row) {
              if (row['midmold_barcode']) {
                return "<i class='bx bxs-check-circle' style='color: #22c55e'></i>"
              } else {
                return ""
              }
            }
          },
          {
            'className': 'text-center px-3',
            render: function(data, type, row) {
              if (row['linningmold_barcode']) {
                return "<i class='bx bxs-check-circle' style='color: #22c55e'></i>"
              } else {
                return ""
              }
            }
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

          // Update footer
          // api.column(6).footer().innerHTML =
          //   total
        }

      });

    });

    $('#scan_bundle_record').keypress(function(e) {
      if (e.keyCode == 13) {

        e.preventDefault();

        var barcode = $(this).val();

        $.ajax({
          url: '<?php echo site_url("molding/postInputMolding"); ?>/' + barcode,
          type: 'POST',
          dataType: 'json',
          beforeSend: function() {
            swal.fire({
              html: '<h5>Loading...</h5>',
              showConfirmButton: false,
              didOpen: function() {
                $('.swal2-html-container').prepend(sweet_loader);
              }
            });
          },
          success: function(dt) {
            if (dt.success == true) {
              inputMoldingTable.ajax.reload(null, false);
            }
            $('#scan_bundle_record').val('');
            $('#scan_bundle_record').focus();
            Swal.fire({
              icon: (dt.success == true ? 'success' : 'warning'),
              title: (dt.success == true ? 'Success' : 'Warning'),
              text: dt.msg,
              showConfirmButton: false,
              timer: 1750
            })
          }
        })
      }
    });


  });
</script>