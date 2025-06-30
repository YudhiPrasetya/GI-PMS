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
            <li class="breadcrumb-item active" aria-current="page">Output Molding</li>
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
    <h6 class="mb-0 text-uppercase">Output Molding</h6>
    <hr />


    <div class="card">
      <div class="card-body">
        <div class="row my-3 mx-2">
          <div class="col-lg-12">
            <div class="row">
              <div class="col-sm-12 col-md-8 col-lg-6">
                <div class="row g-3 align-items-center mb-4">
                  <div class="col-sm-6 col-md-5 col-lg-5">
                    <label for="scan_bundle_record" class="col-form-label">Scan Machine / Bundle Record</label>
                  </div>
                  <div class="col-sm-6 col-md-6 col-lg-6">
                    <input type="text" id="scan_bundle_record" class="form-control" placeholder="Scan barcode here...">
                  </div>
                </div>
              </div>
              <div class="d-sm-none d-md-block col-md-4 col-lg-6 text-end">
                <span class="btn btn-primary position-relative" style="cursor: context-menu;"> <i class='bx bx-time-five align-middle'></i> <span class="align-middle shift"></span>
                  <!-- <span class="position-absolute top-0 start-100 translate-middle badge border border-light rounded-circle bg-danger p-2"><span class="visually-hidden">unread messages</span></span> -->
                </span>
                <input type="hidden" id="shift_hidden">
              </div>
            </div>
            <div class="row mb-3">
              <div class="col-sm-6 col-md-6 col-lg-6">
                <button class="btn btn-info btn-sm me-1" id="btn_daily" disabled>Daily</button>
                <button class="btn btn-outline-info btn-sm me-1" id="btn_yesterday">Yesterday</button>
                <button class="btn btn-outline-info btn-sm" id="btn_30_days_ago">30 Days Ago</button>
              </div>
              <div class="col-sm-6 d-md-none d-lg-none d-xl-none text-end">
                <span class="btn btn-primary btn-sm position-relative" style="cursor: context-menu;"> <i class='bx bx-time-five align-middle'></i> <span class="align-middle shift"></span>
              </div>
            </div>

            <!-- <div class="table-responsive"> -->
            <table id="outputMoldingTable" class="table table-striped table-bordered table-sm nowrap" style="width:100%">
              <thead>
                <tr>
                  <th>No.</th>
                  <th>Scan Date</th>
                  <th>Shift</th>
                  <th>Machine</th>
                  <th>ORC</th>
                  <th>Style</th>
                  <th>Color</th>
                  <th>Size</th>
                  <th>Bundle</th>
                  <th>Qty Outer</th>
                  <th>Qty Mid</th>
                  <th>Qty Linning</th>
                  <th>Outer SAM Result</th>
                  <th>Mid SAM Result</th>
                  <th>Linning SAM Result</th>
                </tr>
              </thead>
              <tfoot>
                <th colspan="9">Total Output Molding</th>
                <th></th>
                <th></th>
                <th></th>
                <th colspan="3"></th>
              </tfoot>
            </table>
            <!-- </div> -->
          </div>
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

    const showShift = () => {
      $.ajax({
        url: '<?php echo site_url("molding/ajax_get_shift"); ?>',
        type: 'GET',
        dataType: 'json'
      }).done(function(data) {
        if (data != null) {
          if (data.shift == 'pertama') {
            $('.shift').html("Shift : 1");
            $('#shift_hidden').val(data.shift);
          } else if (data.shift == 'kedua') {
            $('.shift').html("Shift : 2");
            $('#shift_hidden').val(data.shift);
          } else {
            $('.shift').html("Shift : 3");
            $('#shift_hidden').val(data.shift);
          }
        } else {
          $('.shift').html("Shift : 3");
          $('#shift_hidden').val('ketiga');
          // console.log($('#shift_hidden').val());
        }

      });
    }

    showShift();




    let outputMoldingTable = $('#outputMoldingTable').DataTable({
      // lengthChange: false,
      // buttons: ['copy', 'excel', 'pdf', 'print'],
      scrollX: true,
      destroy: true,
      ajax: {
        url: '<?= site_url("molding/getOutputMolding"); ?>',
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
          'className': 'text-center px-3',
          render: function(data, type, row) {
            if (row['shift'] == 'pertama') {
              return "1"
            } else if (row['shift'] == 'kedua') {
              return "2"
            } else if (row['shift'] == 'ketiga') {
              return "3"
            } else {
              return ""
            }
          }
        },
        {
          'data': 'no_mesin',
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
          'data': 'qty_outermold',
          'className': 'text-center px-3'
        },
        {
          'data': 'qty_midmold',
          'className': 'text-center px-3'
        },
        {
          'data': 'qty_linningmold',
          'className': 'text-center px-3'
        },
        {
          'data': 'outermold_sam_result',
          'className': 'text-center px-3'
        },
        {
          'data': 'midmold_sam_result',
          'className': 'text-center px-3'
        },
        {
          'data': 'linningmold_sam_result',
          'className': 'text-center px-3'
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
          .column(9)
          .data()
          .reduce((a, b) => intVal(a) + intVal(b), 0);

        // Total over this page
        pageTotal = api
          .column(9, {
            page: 'current'
          })
          .data()
          .reduce((a, b) => intVal(a) + intVal(b), 0);

        // Update footer
        api.column(9).footer().innerHTML =
          pageTotal + ' ( ' + total + ' )';

        // Total over all pages
        total = api
          .column(10)
          .data()
          .reduce((a, b) => intVal(a) + intVal(b), 0);

        // Total over this page
        pageTotal = api
          .column(10, {
            page: 'current'
          })
          .data()
          .reduce((a, b) => intVal(a) + intVal(b), 0);

        // Update footer
        api.column(10).footer().innerHTML =
          pageTotal + ' ( ' + total + ' )';

        // Total over all pages
        total = api
          .column(11)
          .data()
          .reduce((a, b) => intVal(a) + intVal(b), 0);

        // Total over this page
        pageTotal = api
          .column(11, {
            page: 'current'
          })
          .data()
          .reduce((a, b) => intVal(a) + intVal(b), 0);

        // Update footer
        api.column(11).footer().innerHTML =
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



      outputMoldingTable.clear().draw();

      outputMoldingTable = $('#outputMoldingTable').DataTable({
        // lengthChange: false,
        // buttons: ['copy', 'excel', 'pdf', 'print'],
        scrollX: true,
        destroy: true,
        ajax: {
          url: '<?= site_url("molding/getOutputMolding"); ?>',
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
            'className': 'text-center px-3',
            render: function(data, type, row) {
              if (row['shift'] == 'pertama') {
                return "1"
              } else if (row['shift'] == 'kedua') {
                return "2"
              } else if (row['shift'] == 'ketiga') {
                return "3"
              } else {
                return ""
              }
            }
          },
          {
            'data': 'no_mesin',
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
            'data': 'qty_outermold',
            'className': 'text-center px-3'
          },
          {
            'data': 'qty_midmold',
            'className': 'text-center px-3'
          },
          {
            'data': 'qty_linningmold',
            'className': 'text-center px-3'
          },
          {
            'data': 'outermold_sam_result',
            'className': 'text-center px-3'
          },
          {
            'data': 'midmold_sam_result',
            'className': 'text-center px-3'
          },
          {
            'data': 'linningmold_sam_result',
            'className': 'text-center px-3'
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
            .column(9)
            .data()
            .reduce((a, b) => intVal(a) + intVal(b), 0);

          // Total over this page
          pageTotal = api
            .column(9, {
              page: 'current'
            })
            .data()
            .reduce((a, b) => intVal(a) + intVal(b), 0);

          // Update footer
          api.column(9).footer().innerHTML =
            pageTotal + ' ( ' + total + ' )';

          // Total over all pages
          total = api
            .column(10)
            .data()
            .reduce((a, b) => intVal(a) + intVal(b), 0);

          // Total over this page
          pageTotal = api
            .column(10, {
              page: 'current'
            })
            .data()
            .reduce((a, b) => intVal(a) + intVal(b), 0);

          // Update footer
          api.column(10).footer().innerHTML =
            pageTotal + ' ( ' + total + ' )';

          // Total over all pages
          total = api
            .column(11)
            .data()
            .reduce((a, b) => intVal(a) + intVal(b), 0);

          // Total over this page
          pageTotal = api
            .column(11, {
              page: 'current'
            })
            .data()
            .reduce((a, b) => intVal(a) + intVal(b), 0);

          // Update footer
          api.column(11).footer().innerHTML =
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

      outputMoldingTable.clear().draw();

      outputMoldingTable = $('#outputMoldingTable').DataTable({
        // lengthChange: false,
        // buttons: ['copy', 'excel', 'pdf', 'print'],
        scrollX: true,
        destroy: true,
        ajax: {
          url: '<?= site_url("molding/getOutputMoldingYesterday"); ?>',
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
            'className': 'text-center px-3',
            render: function(data, type, row) {
              if (row['shift'] == 'pertama') {
                return "1"
              } else if (row['shift'] == 'kedua') {
                return "2"
              } else if (row['shift'] == 'ketiga') {
                return "3"
              } else {
                return ""
              }
            }
          },
          {
            'data': 'no_mesin',
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
            'data': 'qty_outermold',
            'className': 'text-center px-3'
          },
          {
            'data': 'qty_midmold',
            'className': 'text-center px-3'
          },
          {
            'data': 'qty_linningmold',
            'className': 'text-center px-3'
          },
          {
            'data': 'outermold_sam_result',
            'className': 'text-center px-3'
          },
          {
            'data': 'midmold_sam_result',
            'className': 'text-center px-3'
          },
          {
            'data': 'linningmold_sam_result',
            'className': 'text-center px-3'
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
            .column(9)
            .data()
            .reduce((a, b) => intVal(a) + intVal(b), 0);

          // Total over this page
          pageTotal = api
            .column(9, {
              page: 'current'
            })
            .data()
            .reduce((a, b) => intVal(a) + intVal(b), 0);

          // Update footer
          api.column(9).footer().innerHTML =
            pageTotal + ' ( ' + total + ' )';

          // Total over all pages
          total = api
            .column(10)
            .data()
            .reduce((a, b) => intVal(a) + intVal(b), 0);

          // Total over this page
          pageTotal = api
            .column(10, {
              page: 'current'
            })
            .data()
            .reduce((a, b) => intVal(a) + intVal(b), 0);

          // Update footer
          api.column(10).footer().innerHTML =
            pageTotal + ' ( ' + total + ' )';

          // Total over all pages
          total = api
            .column(11)
            .data()
            .reduce((a, b) => intVal(a) + intVal(b), 0);

          // Total over this page
          pageTotal = api
            .column(11, {
              page: 'current'
            })
            .data()
            .reduce((a, b) => intVal(a) + intVal(b), 0);

          // Update footer
          api.column(11).footer().innerHTML =
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

      outputMoldingTable.clear().draw();

      outputMoldingTable = $('#outputMoldingTable').DataTable({
        // lengthChange: false,
        // buttons: ['copy', 'excel', 'pdf', 'print'],
        scrollX: true,
        destroy: true,
        ajax: {
          url: '<?= site_url("molding/getOutputMolding30DaysAgo"); ?>',
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
            'className': 'text-center px-3',
            render: function(data, type, row) {
              if (row['shift'] == 'pertama') {
                return "1"
              } else if (row['shift'] == 'kedua') {
                return "2"
              } else if (row['shift'] == 'ketiga') {
                return "3"
              } else {
                return ""
              }
            }
          },
          {
            'data': 'no_mesin',
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
            'data': 'qty_outermold',
            'className': 'text-center px-3'
          },
          {
            'data': 'qty_midmold',
            'className': 'text-center px-3'
          },
          {
            'data': 'qty_linningmold',
            'className': 'text-center px-3'
          },
          {
            'data': 'outermold_sam_result',
            'className': 'text-center px-3'
          },
          {
            'data': 'midmold_sam_result',
            'className': 'text-center px-3'
          },
          {
            'data': 'linningmold_sam_result',
            'className': 'text-center px-3'
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
            .column(9)
            .data()
            .reduce((a, b) => intVal(a) + intVal(b), 0);

          // Total over this page
          pageTotal = api
            .column(9, {
              page: 'current'
            })
            .data()
            .reduce((a, b) => intVal(a) + intVal(b), 0);

          // Update footer
          api.column(9).footer().innerHTML =
            pageTotal + ' ( ' + total + ' )';

          // Total over all pages
          total = api
            .column(10)
            .data()
            .reduce((a, b) => intVal(a) + intVal(b), 0);

          // Total over this page
          pageTotal = api
            .column(10, {
              page: 'current'
            })
            .data()
            .reduce((a, b) => intVal(a) + intVal(b), 0);

          // Update footer
          api.column(10).footer().innerHTML =
            pageTotal + ' ( ' + total + ' )';

          // Total over all pages
          total = api
            .column(11)
            .data()
            .reduce((a, b) => intVal(a) + intVal(b), 0);

          // Total over this page
          pageTotal = api
            .column(11, {
              page: 'current'
            })
            .data()
            .reduce((a, b) => intVal(a) + intVal(b), 0);

          // Update footer
          api.column(11).footer().innerHTML =
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

        var barcodeUpper = barcode.toUpperCase();

        if (barcodeUpper.length == 10) {
          barcodeNoMesin = barcodeUpper;
          $.ajax({
            url: "<?php echo site_url('molding/ajax_get_molding_mesin_by_barcode'); ?>/" + barcode,
            type: "GET",
            dataType: "json"
          }).done(function(dt) {
            if (dt != null) {
              mesinMolding = dt.name;
              Swal.fire({
                icon: 'info',
                title: 'Mesin Molding ' + dt.name + " terdeteksi. Silahkan scan bundle",
                showConfirmButton: false,
                timer: 2000
              });
              $('#scan_bundle_record').val('');
              $('#scan_bundle_record').focus();
            }
          });
        } else {
          if (barcodeNoMesin == "") {
            Swal.fire({
              icon: 'warning',
              title: 'Scan barcode mesin molding terlebih dahulu!!',
              showConfirmButton: false,
              timer: 2000
            });
            $('#scan_bundle_record').val('');
            $('#scan_bundle_record').focus();
          } else {
            var brcode = $(this).val();

            var brcodeUpper = brcode.toUpperCase();

            var prfx = brcodeUpper.charAt(0);

            switch (prfx) {
              case "O":
                check_barcode_outer(brcodeUpper);
                break;
              case "M":
                check_barcode_mid(brcodeUpper);
                break;
              case "L":
                check_barcode_linning(brcodeUpper);
                break;
            }
          }
        }
      }
    });

    function check_barcode_outer(code) {
      //check barcode di table input molding
      $.ajax({
        url: "<?php echo site_url('molding/ajax_get_by_outermold_barcode'); ?>/" + code,
        // type: 'GET',
        dataType: 'json'
      }).done(function(dt) {
        // console.log('dt OUTER: ', dt);
        if (dt == null) {
          Swal.fire({
            icon: 'warning',
            title: 'Warning!!',
            text: 'Barcode not found!!',
            showConfirmButton: false,
            timer: 1500
          });
          $('#scan_bundle_record').val('');
          $('#scan_bundle_record').focus();
        } else {
          // save_output_molding(dt);
          check_barcode_outer1(code, dt);
        }
      });
    }

    function check_barcode_outer1(c, d) {
      $.ajax({
        url: '<?php echo site_url("molding/ajax_check_by_barcode_outer"); ?>/' + c,
        type: 'GET',
        dataType: 'json'
      }).done(function(retVal) {
        if (retVal > 0) {
          Swal.fire({
            icon: 'warning',
            title: 'Warning!!',
            text: 'Barcode already scanned!!',
            showConfirmButton: false,
            timer: 1750
          });
          $('#scan_bundle_record').val('');
          $('#scan_bundle_record').focus();
        } else {
          save_output_molding(d);
        }
      })
    }

    function check_barcode_mid(code) {
      //check barcode di table input molding

      $.ajax({
        url: "<?php echo site_url('molding/ajax_get_by_midmold_barcode'); ?>/" + code,
        type: 'GET',
        dataType: 'json'
      }).done(function(dt) {
        if (dt == null) {
          Swal.fire({
            icon: 'warning',
            title: 'Warning!!',
            text: 'Barcode not found!!',
            showConfirmButton: false,
            timer: 1500
          });
          $('#scan_bundle_record').val('');
          $('#scan_bundle_record').focus();
        } else {
          // save_output_molding(dt);
          check_barcode_mid1(code, dt);
        }
      });
    }

    function check_barcode_mid1(c, d) {
      $.ajax({
        url: '<?php echo site_url("molding/ajax_check_by_barcode_mid"); ?>/' + c,
        type: 'GET',
        dataType: 'json'
      }).done(function(retVal) {
        if (retVal > 0) {
          Swal.fire({
            icon: 'warning',
            title: 'Warning!!',
            text: 'Barcode already scanned!!',
            showConfirmButton: false,
            timer: 1750
          });
          $('#scan_bundle_record').val('');
          $('#scan_bundle_record').focus();
        } else {
          save_output_molding(d);
        }
      })
    }

    function check_barcode_linning(code) {
      //check barcode di table input molding

      $.ajax({
        url: "<?php echo site_url('molding/ajax_get_by_linningmold_barcode'); ?>/" + code,
        type: 'GET',
        dataType: 'json'
      }).done(function(dt) {
        if (dt == null) {
          Swal.fire({
            icon: 'warning',
            title: 'Warning!!',
            text: 'Barcode not found!!',
            showConfirmButton: false,
            timer: 1500
          });
          $('#scan_bundle_record').val('');
          $('#scan_bundle_record').focus();
        } else {
          // save_output_molding(dt);
          check_barcode_linning1(code, dt);
        }
      });
    }

    function check_barcode_linning1(c, d) {
      $.ajax({
        url: '<?php echo site_url("molding/ajax_check_by_barcode_linning"); ?>/' + c,
        type: 'GET',
        dataType: 'json'
      }).done(function(retVal) {
        if (retVal > 0) {
          Swal.fire({
            icon: 'warning',
            title: 'Warning!!',
            text: 'Barcode already scanned!!',
            showConfirmButton: false,
            timer: 1750
          });
          $('#scan_bundle_record').val('');
          $('#scan_bundle_record').focus();
        } else {
          save_output_molding(d);
        }
      })
    }

    function save_output_molding(data) {
      var shift = $('#shift_hidden').val();
      // var shift = shiftLengkap.split(":");

      console.log(shift);

      var dataStr = {
        'shift': (shift == undefined ? "ketiga" : shift),
        //'shift': shift[1],
        'no_mesin': mesinMolding,
        'orc': data.orc,
        'style': data.style,
        'color': data.color,
      };

      $.ajax({
        url: '<?php echo site_url("molding/ajax_save"); ?>',
        data: {
          'dataStr': dataStr
        },
        method: 'post',
        dataType: 'json',
      }).done(function(id) {
        if (id > 0) {
          var brcode = $('#scan_bundle_record').val();
          saveDetail(data, brcode, id);

        }
      });
    }

    function saveDetail(dt, b, idOutputMolding) {
      var preffix = b.charAt(0);

      switch (preffix) {
        case "O":
          saveOuterMold(dt, b, idOutputMolding);
          break;
        case "M":
          saveMidMold(dt, b, idOutputMolding);
          break;
        case "L":
          saveLinningMold(dt, b, idOutputMolding);
          break;
      }
    }

    function saveOuterMold(data, bar, idOutputMolding) {
      var dataOuterMold = {
        'id_output_molding': idOutputMolding,
        'no_bundle': data.no_bundle,
        'size': data.size,
        'group_size': data.group_size,
        'qty_outermold': data.qty_pcs,
        'outermold_barcode': bar,
        'outermold_sam_result': data.qty_pcs * data.outermold_sam
      }

      $.ajax({
        url: "<?php echo site_url('molding/ajax_save_detail_outermold'); ?>",
        type: "POST",
        data: {
          'dataOuterMold': dataOuterMold
        },
        dataType: 'json'
      }).done(function(dt) {
        if (dt > 0) {
          Swal.fire({
            icon: 'info',
            title: 'Save Data Success!!',
            showConfirmButton: false,
            timer: 1500
          });

          $('#scan_bundle_record').val('');
          $('#scan_bundle_record').focus();
          reload_table();
        }
      })
    }

    function saveMidMold(data, bar, idOutputMolding) {
      var dataMidMold = {
        'id_output_molding': idOutputMolding,
        'no_bundle': data.no_bundle,
        'size': data.size,
        'group_size': data.group_size,
        'qty_midmold': data.qty_pcs,
        'midmold_barcode': bar,
        'midmold_sam_result': data.qty_pcs * data.mildmold_sam
      }

      console.log('dataMidMold: ', dataMidMold);

      $.ajax({
        url: "<?php echo site_url('molding/ajax_save_detail_midmold'); ?>",
        type: "POST",
        data: {
          'dataMidMold': dataMidMold
        },
        dataType: 'json'
      }).done(function(dt) {
        if (dt > 0) {
          Swal.fire({
            icon: 'info',
            title: 'Save Data Success!!',
            showConfirmButton: false,
            timer: 1500
          });

          $('#scan_bundle_record').val('');
          $('#scan_bundle_record').focus();
          reload_table();
        }
      });
    }

    function saveLinningMold(data, bar, idOutputMolding) {
      var dataLinningMold = {
        'id_output_molding': idOutputMolding,
        'no_bundle': data.no_bundle,
        'size': data.size,
        'group_size': data.group_size,
        'qty_linningmold': data.qty_pcs,
        'linningmold_barcode': bar,
        'linningmold_sam_result': data.qty_pcs * data.linningmold_sam
      }

      $.ajax({
        url: "<?php echo site_url('molding/ajax_save_detail_linningmold'); ?>",
        type: "POST",
        data: {
          'dataLinningMold': dataLinningMold
        },
        dataType: 'json'
      }).done(function(dt) {
        if (dt > 0) {
          Swal.fire({
            icon: 'info',
            title: 'Save Data Success!!',
            showConfirmButton: false,
            timer: 1500
          });

          $('#scan_bundle_record').val('');
          $('#scan_bundle_record').focus();
          reload_table();
        }
      })
    }

    function reload_table() {
      outputMoldingTable.ajax.reload(null, false);
    }



  });
</script>