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
            <li class="breadcrumb-item active" aria-current="page">Output Sewing</li>
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
    <h6 class="mb-0 text-uppercase">Output Sewing</h6>
    <hr />


    <div class="card">
      <div class="card-body">
        <div class="row my-3 mx-2">
          <div class="col-lg-12 mb-4">
            <div class="row">
              <div class="col-sm-6">
                <span class="btn btn-primary position-relative" style="cursor: context-menu;"> <i class='bx bx-group'></i> <span class="align-middle">Line : <?= ucwords(strtolower($this->session->userdata('username'))); ?></span>
                  <input type="hidden" value="<?= $this->session->userdata('username'); ?>" id="group_location">
                </span>
              </div>
              <div class="col-sm-6 text-end">
                <span class="btn btn-primary position-relative" style="cursor: context-menu;"> <i class='bx bx-time-five align-middle'></i> <span class="align-middle" id="time"></span>
                  <!-- <span class="btn btn-primary position-relative" style="cursor: context-menu;"> <i class='bx bx-time-five align-middle'></i> <span class="align-middle"></span> 12:10:02 <span class="position-absolute top-0 start-100 translate-middle badge border border-light rounded-circle bg-danger p-2"><span class="visually-hidden">unread messages</span></span> -->
                </span>
              </div>
            </div>
          </div>

          <div class="col-lg-12 mb-3">
            <label for="bundle_barcode" class="col-form-label">Scan Barcode Here (Untuk Calling Mechanic SCAN BARCODE MESIN TERLEBIH DAHULU)</label>
            <input type="text" id="bundle_barcode" class="form-control" autocomplete="off" placeholder="Scan barcode here...">
          </div>
          <div class="row my-3">
            <div class="col-sm-10">
              <button class="btn btn-info btn-sm me-1" id="btn_daily" disabled>Daily</button>
              <button class="btn btn-outline-info btn-sm me-1" id="btn_yesterday">Yesterday</button>
              <button class="btn btn-outline-info btn-sm" id="btn_3_months_ago">3 Months Ago</button>
              <span style="color: lightgray;" class="mx-3">|</span>
              <a href="bundle_record_v2" class="btn btn-sm btn-outline-secondary"><i class='bx bx-search-alt'></i> Check Bundle Record</a>
            </div>
            <div class="col-sm-2 text-end">
              <span style="cursor: pointer; color: #0dcaf0; font-size: 1.8em;" id="btn_information" title="Output Hour Information"><i class='bx bx-info-circle'></i></span>
            </div>

          </div>
          <!-- <div class="table-responsive"> -->
          <table id="outputSewingTable" class="table table-striped table-bordered table-sm nowrap" style="width:100%">
            <thead>
              <tr>
                <th>No.</th>
                <th>Output Date</th>
                <th>Style</th>
                <th>ORC</th>
                <th>WO</th>
                <th>Bundle #</th>
                <th>Size</th>
                <th>Qty Out</th>
                <!-- <th>Actual Qty</th> -->
              </tr>
            </thead>
            <tfoot>
              <th colspan="6">Total Output Sewing</th>
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

<!-- Modal -->

<!-- Modal Man Power -->
<div class="modal fade" id="modal_man_power" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="modal_man_power_Label" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modal_man_power_Label">Man Power Line <?= ucwords(strtolower($this->session->userdata('username'))); ?></h5>
        <!-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> -->
      </div>
      <div class="modal-body">
        <div class="row mx-2 my-4 justify-content-center">
          <label for="assembly_op" class="col-sm-5 col-form-label">Assembly Man Power</label>
          <div class="col-sm-4">
            <input type="number" class="form-control text-center" id="assembly_op" name="assembly_op" placeholder="0" min="0">
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <!-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> -->
        <button type="button" class="btn btn-primary" id="btnSaveMP">Save</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal Edit Qty -->
<div class="modal fade" id="modal_edit_qty" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="modal_edit_qty_Label" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modal_edit_qty_Label">Qty Check Output Sewing</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="row mx-2 my-4 justify-content-center">
          <label for="qtyOutputSewing" class="col-sm-2 col-form-label">Qty</label>
          <div class="col-sm-4">
            <input type="number" class="form-control text-center" id="qtyOutputSewing">
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" id="btnSaveQtyOutputSewing" class="btn btn-success">Save</button>
        <button type="button" class="btn" data-bs-dismiss="modal">Cancel</button>
      </div>
    </div>
  </div>
</div>

<!-- Button Information -->
<div class="modal fade" id="informationModal" tabindex="-1" aria-labelledby="informationModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="informationModalLabel">Output In Hours Information</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="row m-3">
          <div class="col-lg-6 text-center">
            <h5>Senin - Kamis</h5>
            <table class="table table-sm mb-0 table-hover table-bordered text-center">
              <thead>
                <tr>
                  <th scope="col" style="background-color: #cbd5e1;">Rentang Waktu</th>
                  <th scope="col" style="background-color: #cbd5e1;">Jam ke - </th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>07.30 - 08.30</td>
                  <td>1</td>
                </tr>
                <tr>
                  <td>08.30 - 09.30</td>
                  <td>2</td>
                </tr>
                <tr>
                  <td>09.30 - 10.30</td>
                  <td>3</td>
                </tr>
                <tr>
                  <td>10.30 - 11.30</td>
                  <td>4</td>
                </tr>
                <tr>
                  <td>11.30 - 12.15</td>
                  <td>Istirahat<sup style="color: red">*</sup></td>
                </tr>
                <tr>
                  <td>12.15 - 13.15</td>
                  <td>5</td>
                </tr>
                <tr>
                  <td>13.15 - 14.15</td>
                  <td>6</td>
                </tr>
                <tr>
                  <td>14.15 - 15.15</td>
                  <td>7</td>
                </tr>
                <tr>
                  <td>15.15 - 16.15</td>
                  <td>8</td>
                </tr>
                <tr>
                  <td>16.15 - 17.15</td>
                  <td>9</td>
                </tr>
                <tr>
                  <td>17.15 - 18.15</td>
                  <td>10</td>
                </tr>
                <tr>
                  <td>18.15 - 19.15</td>
                  <td>11</td>
                </tr>
                <tr>
                  <td>19.15 - 20.15</td>
                  <td>12</td>
                </tr>
              </tbody>
            </table>
          </div>
          <div class="col-lg-6 text-center">
            <h5>Jumat</h5>
            <table class="table table-sm mb-0 table-hover table-bordered text-center">
              <thead>
                <tr>
                  <th scope="col" style="background-color: #cbd5e1;">Rentang Waktu</th>
                  <th scope="col" style="background-color: #cbd5e1;">Jam ke - </th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>07.30 - 08.30</td>
                  <td>1</td>
                </tr>
                <tr>
                  <td>08.30 - 09.30</td>
                  <td>2</td>
                </tr>
                <tr>
                  <td>09.30 - 10.30</td>
                  <td>3</td>
                </tr>
                <tr>
                  <td>10.30 - 11.30</td>
                  <td>4</td>
                </tr>
                <tr>
                  <td>11.30 - 12.30</td>
                  <td>Istirahat<sup style="color: red">*</sup></td>
                </tr>
                <tr>
                  <td>12.30 - 13.30</td>
                  <td>5</td>
                </tr>
                <tr>
                  <td>13.30 - 14.30</td>
                  <td>6</td>
                </tr>
                <tr>
                  <td>14.30 - 15.30</td>
                  <td>7</td>
                </tr>
                <tr>
                  <td>15.30 - 16.30</td>
                  <td>8</td>
                </tr>
                <tr>
                  <td>16.30 - 17.30</td>
                  <td>9</td>
                </tr>
                <tr>
                  <td>17.30 - 18.30</td>
                  <td>10</td>
                </tr>
                <tr>
                  <td>18.30 - 19.30</td>
                  <td>11</td>
                </tr>
                <tr>
                  <td>19.30 - 20.30</td>
                  <td>12</td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
        <div class="row my-4">
          <div class="col-lg-12 text-center">
            Notes<sup style="color: red">*</sup> : Jika scan out di waktu <b>istirahat</b> maka akan masuk di Jam ke - 4
          </div>
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
  // $('.select2_modal_1').select2({
  //   theme: 'bootstrap4',
  //   width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style',
  //   // placeholder: $(this).data('placeholder'),
  //   // allowClear: Boolean($(this).data('allow-clear')),
  //   dropdownParent: $('#createNewOrderModal')
  // });
</script>
<script>
  $(document).ready(function() {
    const sweet_loader = '<div class="sweet_loader"><svg viewBox="0 0 140 140" width="140" height="140"><g class="outline"><path d="m 70 28 a 1 1 0 0 0 0 84 a 1 1 0 0 0 0 -84" stroke="rgba(0,0,0,0.1)" stroke-width="4" fill="none" stroke-linecap="round" stroke-linejoin="round"></path></g><g class="circle"><path d="m 70 28 a 1 1 0 0 0 0 84 a 1 1 0 0 0 0 -84" stroke="#71BBFF" stroke-width="4" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-dashoffset="200" stroke-dasharray="300"></path></g></svg></div>';

    var btn_information = document.getElementById('btn_information')
    var tooltip = new bootstrap.Tooltip(btn_information)

    $('#btn_information').click(function() {
      $('#informationModal').modal('show');

      // $('#informationModal').on('shown.bs.modal', function() {
      //   $('#assembly_op').focus();
      // })
    });

    // const loadStyleSam = () => {
    //   $('#style_sam_modal').empty();
    //   $.ajax({
    //     url: " <//?= site_url('ppic/getStyleSam'); ?>",
    //     type: 'GET',
    //     dataType: 'JSON',
    //     beforeSend: function() {
    //       $("#style_sam_modal").prepend($('<option></option>').html('Loading...'));
    //     },
    //   }).done(function(data) {
    //     $('#style_sam_modal').empty();
    //     $('#style_sam_modal').append($('<option>', {
    //       value: "",
    //       text: "- Select Style SAM -"
    //     }));
    //     $.each(data, function(i, item) {
    //       $('#style_sam_modal').append($('<option>', {
    //         value: item.style,
    //         text: item.style
    //       }));
    //     });
    //   });
    // }

    // loadStyleSam();

    $('#bundle_barcode').focus();

    setInterval(function() {
      let d = new Date(); // for now
      d.toLocaleString('id-ID', {
        hour24: true,
      });
      let hours = d.getHours();
      let minute = d.getMinutes();
      let time = hours + '' + minute;

      function padZero(num) {
        return num < 10 ? '0' + num : num;
      }

      $('#time').text(padZero(d.getHours()) + ':' + padZero(d.getMinutes()) + ':' + padZero(d.getSeconds()));
      // if (time >= 1759 && time <= 2345) {
      //   // $('#bundle_barcode').prop('disabled', false);
      // } else {
      //   // $('#bundle_barcode').prop('disabled', false);
      //   // $('#bundle_barcode').focus();
      // }
    }, 1000);

    let outputSewingTable = $('#outputSewingTable').DataTable({
      // lengthChange: false,
      // buttons: ['copy', 'excel', 'pdf', 'print'],
      scrollX: true,
      destroy: true,
      ajax: {
        url: '<?= site_url("sewing/getOutputSewing"); ?>',
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
          'data': 'output_date',
          'className': 'text-center px-3'
        },
        {
          'data': 'style',
          'className': 'text-center px-3'
        },
        {
          'data': 'orc',
          'className': 'text-center px-3'
        },
        {
          'data': 'wo',
          'className': 'text-center px-3'
        },
        {
          'data': 'no_bundle',
          'className': 'text-center px-3'
        },
        {
          'data': 'size',
          'className': 'text-center px-3'
        },
        {
          'data': 'qty',
          'className': 'text-center px-3'
        },
        // {
        //   'className': 'text-center px-3',
        //   render: function(data, type, row) {
        //     return '<span class="badge text-bg-info text-white" style="cursor: pointer;" id="btn_edit">Edit</span> <span class="badge text-bg-danger" style="cursor: pointer;" id="btn_delete">Delete</span>'
        //   }
        // },

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
        api.column(6).footer().innerHTML =
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

      $('#btn_3_months_ago').removeClass('btn-info');
      $('#btn_3_months_ago').addClass('btn-outline-info');
      $('#btn_3_months_ago').prop('disabled', false);

      outputSewingTable.clear().draw();

      outputSewingTable = $('#outputSewingTable').DataTable({
        // lengthChange: false,
        // buttons: ['copy', 'excel', 'pdf', 'print'],
        scrollX: true,
        destroy: true,
        ajax: {
          url: '<?= site_url("sewing/getOutputSewing"); ?>',
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
            'data': 'output_date',
            'className': 'text-center px-3'
          },
          {
            'data': 'style',
            'className': 'text-center px-3'
          },
          {
            'data': 'orc',
            'className': 'text-center px-3'
          },
          {
            'data': 'no_bundle',
            'className': 'text-center px-3'
          },
          {
            'data': 'size',
            'className': 'text-center px-3'
          },
          {
            'data': 'qty',
            'className': 'text-center px-3'
          },
          // {
          //   'className': 'text-center px-3',
          //   render: function(data, type, row) {
          //     return '<span class="badge text-bg-info text-white" style="cursor: pointer;" id="btn_edit">Edit</span> <span class="badge text-bg-danger" style="cursor: pointer;" id="btn_delete">Delete</span>'
          //   }
          // },

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
    });

    $('#btn_yesterday').click(function() {

      $('#btn_daily').removeClass('btn-info');
      $('#btn_daily').addClass('btn-outline-info');
      $('#btn_daily').prop('disabled', false);

      $('#btn_yesterday').removeClass('btn-outline-info');
      $('#btn_yesterday').addClass('btn-info');
      $('#btn_yesterday').prop('disabled', true);

      $('#btn_3_months_ago').removeClass('btn-info');
      $('#btn_3_months_ago').addClass('btn-outline-info');
      $('#btn_3_months_ago').prop('disabled', false);

      outputSewingTable.clear().draw();

      outputSewingTable = $('#outputSewingTable').DataTable({
        // lengthChange: false,
        // buttons: ['copy', 'excel', 'pdf', 'print'],
        scrollX: true,
        destroy: true,
        ajax: {
          url: '<?= site_url("sewing/getOutputSewingYesterday"); ?>',
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
            'data': 'output_date',
            'className': 'text-center px-3'
          },
          {
            'data': 'style',
            'className': 'text-center px-3'
          },
          {
            'data': 'orc',
            'className': 'text-center px-3'
          },
          {
            'data': 'no_bundle',
            'className': 'text-center px-3'
          },
          {
            'data': 'size',
            'className': 'text-center px-3'
          },
          {
            'data': 'qty',
            'className': 'text-center px-3'
          },
          // {
          //   'className': 'text-center px-3',
          //   render: function(data, type, row) {
          //     return '<span class="badge text-bg-info text-white" style="cursor: pointer;" id="btn_edit">Edit</span> <span class="badge text-bg-danger" style="cursor: pointer;" id="btn_delete">Delete</span>'
          //   }
          // },

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
    });

    $('#btn_3_months_ago').click(function() {

      $('#btn_daily').removeClass('btn-info');
      $('#btn_daily').addClass('btn-outline-info');
      $('#btn_daily').prop('disabled', false);

      $('#btn_yesterday').removeClass('btn-info');
      $('#btn_yesterday').addClass('btn-outline-info');
      $('#btn_yesterday').prop('disabled', false);

      $('#btn_3_months_ago').removeClass('btn-outline-info');
      $('#btn_3_months_ago').addClass('btn-info');
      $('#btn_3_months_ago').prop('disabled', true);

      outputSewingTable.clear().draw();

      outputSewingTable = $('#outputSewingTable').DataTable({
        // lengthChange: false,
        // buttons: ['copy', 'excel', 'pdf', 'print'],
        scrollX: true,
        destroy: true,
        ajax: {
          url: '<?= site_url("sewing/getOutputSewing3MonthsAgo"); ?>',
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
            'data': 'output_date',
            'className': 'text-center px-3'
          },
          {
            'data': 'style',
            'className': 'text-center px-3'
          },
          {
            'data': 'orc',
            'className': 'text-center px-3'
          },
          {
            'data': 'no_bundle',
            'className': 'text-center px-3'
          },
          {
            'data': 'size',
            'className': 'text-center px-3'
          },
          {
            'data': 'qty',
            'className': 'text-center px-3'
          },
          // {
          //   'className': 'text-center px-3',
          //   render: function(data, type, row) {
          //     return '<span class="badge text-bg-info text-white" style="cursor: pointer;" id="btn_edit">Edit</span> <span class="badge text-bg-danger" style="cursor: pointer;" id="btn_delete">Delete</span>'
          //   }
          // },

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
    });

    const regBarcodeBundle = /(cp|bw|cu|as|pa)+[^]*-/i;
    const regBarcodeMekanik = /MK-\d{6}/; //regex barcode mekanik member
    const regBarcodeMesin = /\d{10}/ //regex barcode mesin
    const regMasalahMesin = /MM-\d{3}/ //regex masalah mesin
    const groupLocation = '<?= $this->session->userdata("group_location"); ?>';
    const line_name = '<?= $this->session->userdata("username"); ?>';
    // const groupLocation = $('#group_location').val();

    // console.log(groupLocation);


    // Man Power Modal
    $.ajax({
      url: "<?php echo site_url('sewing/ajax_list1'); ?>",
      type: "GET",
      dataType: "json"
    }).done(function(dt) {
      if (dt == null) {
        // $('#modal_man_power').modal({
        //   backdrop: 'static',
        //   keyboard: false,
        //   show: true
        // });
        $('#modal_man_power').modal('show');

        $('#modal_man_power').on('shown.bs.modal', function() {
          $('#assembly_op').focus();
        })
      } else {
        idOutputSewing = dt.id_output_sewing;
      }
    });

    // Button save Man Power
    $('#btnSaveMP').click(function() {

      let assembly_op = $('#assembly_op').val();

      $('#btnSaveMP').prop('disabled', true);

      if (assembly_op != "") {
        if (assembly_op.length <= 2) {

          $.ajax({
            url: '<?php echo site_url("sewing/ajax_save"); ?>',
            type: 'POST',
            data: {
              'assembly_op': assembly_op
            },
            dataType: 'json'
          }).done(function(id) {
            if (id > 0) {
              idOutputSewing = id;
              swal.fire({
                icon: 'success',
                title: 'Success!',
                text: 'Man Power berhasil disimpan.',
                showCancelButton: false,
                showConfirmButton: false,
                timer: 1500,
              }).then(function() {
                $('#modal_man_power').modal('hide');
                $('#assembly_op').val('');
                $('#bundle_barcode').focus();
              });
            }
          });
        } else {
          swal.fire({
            icon: 'warning',
            title: 'Warning!',
            text: 'Silahkan input Man Power dengan benar.',
            timer: 2000,
            showCancelButton: false,
            showConfirmButton: false
          }).then(function() {
            $('#assembly_op').focus();
          });
        }
      } else {
        swal.fire({
          icon: 'warning',
          title: 'Warning!',
          text: 'Man Power belum diisi',
          timer: 2000,
          showCancelButton: false,
          showConfirmButton: false
        }).then(function() {
          $('#assembly_op').focus();
        });

      }




    });

    // Save Man Power (If Enter)
    $('#assembly_op').keypress(function(e) {
      if (e.keyCode == 13) {

        $('#btnSaveMP').click();

      }
    });

    // Scan Form
    $('#bundle_barcode').keypress(function(e) {
      if (e.keyCode == 13) {
        $('#btnSaveQtyOutputSewing').prop('disabled', false);

        let kode = $(this).val();

        if (!regBarcodeBundle.test(kode) && !regBarcodeMesin.test(kode)) {
          swal.fire({
            icon: 'warning',
            title: 'Warning',
            html: 'Invalid barcode.',
            showConfirmButton: false,
            timer: 1500
          }).then(function() {
            $('#bundle_barcode').val('');
            $('#bundle_barcode').focus();
          });
        }

        if (regBarcodeBundle.test(kode)) {
          const codeUpper = kode.toUpperCase();
          codeSplit = codeUpper.split("_");

          checkCode(codeSplit[1])
        }
        // ======================================= //
        if (regBarcodeMesin.test(kode)) {
          $('#bundle_barcode').prop('disabled', true);

          if (kode.length < 13) {
            $('#bundle_barcode').prop('disabled', true);

            // Cek mesin di db
            $.ajax({
              url: '<?= site_url("sewing/getCheckMachineBarcode"); ?>',
              type: 'POST',
              data: {
                'kode': kode
              },
              dataType: 'json',
              beforeSend: function() {
                $('#bundle_barcode').prop('disabled', true);
              },
            }).done(function(id) {
              if (id > 0) {
                showMekanik(kode);
              } else {
                $('#bundle_barcode').prop('disabled', false);

                swal.fire({
                  icon: 'warning',
                  title: 'Warning',
                  html: 'Barcode machine tidak ditemukan.',
                  showConfirmButton: false,
                  timer: 1500
                }).then(function() {
                  $('#bundle_barcode').val('');
                  $('#bundle_barcode').focus();
                });
              }
            });
          } else {
            $('#bundle_barcode').prop('disabled', false);
            swal.fire({
              icon: 'warning',
              title: 'Warning',
              html: 'Invalid machine barcode.',
              showConfirmButton: false,
              timer: 1500
            }).then(function() {
              $('#bundle_barcode').val('');
              $('#bundle_barcode').focus();

            });
          }
        }

      }
    })

    // Mechanic
    function showMekanik(code) {
      // localStorage.removeItem('firstBarcode');
      // localStorage.setItem('firstBarcode', code);

      window.open('<?= site_url("sewing/machine_breakdown/"); ?>' + code, '_self');
    }


    // Ticket Bundle
    function checkCode(barcode) {
      //cek apakah barcode sudah ada di inputsewing
      var ajaxCheckBarcodeFromInputSewing = $.ajax({
        url: "<?php echo site_url('sewing/ajax_check_barcode'); ?>/" + barcode,
        type: "GET",
        dataType: "json"
      });

      ajaxCheckBarcodeFromInputSewing.done(function(dt) {
        if (dt == null) {
          // cek di cutting detail, apakah outerwear
          // if (true) {
          //   checkBarcodeForTheGroupLine(barcode);
          // } else {
          swal.fire({
            icon: 'warning',
            title: 'Warning!',
            text: 'Barcode belum di scan di Input Sewing.',
            showConfirmButton: false,
            timer: 2000
          });
          $('#bundle_barcode').val('');
          $('#bundle_barcode').focus();
          // }

        } else {
          //cek di output sewing detail
          // checkBarcodeForTheLine(barcode);
          checkBarcodeForTheGroupLine(barcode);
        }
      });
    }

    function checkBarcodeForTheGroupLine(code) {
      var ajaxcheckBarcodeForTheGroupLine = $.ajax({
        type: 'GET',
        url: '<?= site_url("sewing/ajax_get_group_line_by_barcode") ?>/' + code,
        dataType: 'json'
      });

      ajaxcheckBarcodeForTheGroupLine.done(function(data) {
        if (data != null) {
          // if (data.row['line'] != groupLocation) {
          if (data.groupLine != groupLocation) {
            swal.fire({
              icon: 'warning',
              title: 'Warning',
              html: `Barcode ini bukan untuk line ${line_name}`,
              showConfirmButton: false,
              timer: 1750
            });
            $('#bundle_barcode').val('');
            $('#bundle_barcode').focus();
          } else {
            $.ajax({
              type: 'GET',
              url: '<?= site_url("sewing/ajax_get_output_sewing_detail_by_barcode"); ?>/' + code,
              dataType: 'json'
            }).done(function(retData) {
              // debugger;
              if(retData.length > 0){
                let currQTY = parseInt(retData[0].qty);
                let countScanned = parseInt(retData[0].countScanned);
                let qtyPCS = parseInt(data.row.qty_pcs);
                if (currQTY == qtyPCS) {
                    swal.fire({
                    icon: 'warning',
                    title: 'Warning',
                    html: 'Barcode ini sudah di scan full!',
                    showConfirmButton: false,
                    timer: 1500,
                  }).then(function() {
                    $('#modal_edit_qty').modal('hide');
                    $('#bundle_barcode').prop('disabled',false);
                    $('#bundle_barcode').val('');
                    $('#bundle_barcode').focus();
                  });
                } else if (currQTY < qtyPCS) {
                    if(countScanned == 2){
                      swal.fire({
                        icon: 'warning',
                        title: 'Warning',
                        html: 'Barcode ini sudah melebihi batas maksimal scan 2 kali!!',
                        showConfirmButton: true,
                        // timer: 1500,
                      }).then(function() {
                        $('#modal_edit_qty').modal('hide');
                        $('#bundle_barcode').prop('disabled',false);
                        $('#bundle_barcode').val('');
                        $('#bundle_barcode').focus();
                      });                      
                    }else{
                      // qtyMax = parseInt(data.row.qty_pcs) - totQtyOutputSewingDetail;
                      qtyMax = parseInt(data.row.qty_pcs) - currQTY;
  
                      data.row.qtyPcsMax = qtyMax;
                      showOutputSewingModal(data.row);
                    }
                } else if (currQTY == 0) {
                    qtyMax = parseInt(data.row.qty_pcs);

                    data.row.qtyPcsMax = qtyMax;
                    showOutputSewingModal(data.row);
                  }                 
              }else{
                qtyMax = parseInt(data.row.qty_pcs);

                data.row.qtyPcsMax = qtyMax;
                showOutputSewingModal(data.row);                
              }
              $('#bundle_barcode').prop('disabled', true);
            });
          }
        }
      })
    }

    function showOutputSewingModal(dtI) {
      $('#modal_edit_qty').modal('show');

      $('#modal_edit_qty').on('shown.bs.modal', function(e) {
        $('#qtyOutputSewing').attr('min', '1');
        $('#qtyOutputSewing').attr('max', dtI.qtyPcsMax);
        $('#qtyOutputSewing').val(dtI.qtyPcsMax);
        $('#qtyOutputSewing').focus();
        dataForOutputSewing = {
          ...dtI
        };
      });
    }

    $('#modal_edit_qty').on('hidden.bs.modal', function() {
      $('#qtyOutputSewing').val('1');
      $('#bundle_barcode').val('');
      $('#bundle_barcode').focus();
      $('#bundle_barcode').prop('disabled', false);
    });

    $('#btnSaveQtyOutputSewing').click(function(e) {
      e.preventDefault();

      $('#btnSaveQtyOutputSewing').prop('disabled', true);

      let qtyPcsActual = $('#qtyOutputSewing').val();

      if (qtyPcsActual != "") {
        if (qtyPcsActual.length <= 3) {

          dataForOutputSewing.qtyPcsActual = qtyPcsActual;
          dataForOutputSewing.id_output_sewing = idOutputSewing;
          dataForOutputSewing.assembly_sam_result = dataForOutputSewing.assembly_sam * dataForOutputSewing.qtyPcsActual;

          if (dataForOutputSewing.qtyPcsActual <= dataForOutputSewing.qtyPcsMax) {
            // console.table(dataForOutputSewing);
            // debugger;
            saveInsertOutputSewing(dataForOutputSewing);
          } else {
            swal.fire({
              icon: 'warning',
              title: 'Warning!',
              text: 'Qty yang diinputkan melebihi qty maksimal.',
              showConfirmButton: false,
              timer: 2000,
            }).then(function() {
              $('#qtyOutputSewing').focus();
              $('#btnSaveQtyOutputSewing').prop('disabled', false);
            });
          }

        } else {
          swal.fire({
            icon: 'warning',
            title: 'Warning!',
            text: 'Qty yang diinputkan terlalu banyak.',
            showConfirmButton: false,
            timer: 2000,
          }).then(function() {
            $('#qtyOutputSewing').focus();
            $('#btnSaveQtyOutputSewing').prop('disabled', false);
          });
        }
      } else {
        swal.fire({
          icon: 'warning',
          title: 'Warning!',
          text: 'Qty harus diisi.',
          showConfirmButton: false,
          timer: 2000,
        }).then(function() {
          $('#qtyOutputSewing').focus();
          $('#btnSaveQtyOutputSewing').prop('disabled', false);
        });
      }
    });

    function saveInsertOutputSewing(data) {
      $.ajax({
        type: 'POST',
        url: '<?= site_url("sewing/ajax_save_detail"); ?>',
        data: {
          'dataStr': dataForOutputSewing
        },
        dataType: 'json'
      }).done(function(valid) {
        if (valid == true) {
          swal.fire({
            icon: 'success',
            title: 'Success!',
            text: 'Data berhasil disimpan',
            showConfirmButton: false,
            timer: 1000,
          }).then(function() {
            reloadTable();
            $('#bundle_barcode').prop('disabled', false);
            $('#bundle_barcode').val('');
            $('#bundle_barcode').focus();
            $('#modal_edit_qty').modal('hide');
          });
        } else {
          swal.fire({
            icon: 'warning',
            title: 'Warning!',
            html: 'Data gagal disimpan, silahkan ulangi scan.',
            // html: 'Data gagal disimpan, sudah melebihi batas maksimal scan 2 kali!!.',
            showConfirmButton: true,
          }).then(function() {
            $('#bundle_barcode').prop('disabled', false);
            $('#bundle_barcode').val('');
            $('#bundle_barcode').focus();
            $('#modal_edit_qty').modal('hide');
          });
        }
      })
    }

    function reloadTable() {
      outputSewingTable.ajax.reload(null, false);
    }

  });
</script>