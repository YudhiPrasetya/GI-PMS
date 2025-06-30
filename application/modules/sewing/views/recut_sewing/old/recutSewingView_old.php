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
                <div class="row">
                  <div class="col-lg-6">
                    <div class="row g-3 align-items-center mb-3">
                      <div class="col-lg-3">
                        <label for="barcode" class="col-form-label">Barcode <sup style="color: red;">*</sup></label>
                      </div>
                      <div class="col-lg-6">
                        <input type="text" id="barcode" class="form-control" placeholder="Scan barcode here..">
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
                  <div class="col-lg-6">
                    <div class="row g-3 mb-3 mt-4">
                      <div class="col-lg-3">
                        <label for="part" class="col-form-label">Part <sup style="color: red;">*</sup></label>
                      </div>
                      <div class="col-lg-7">
                        <div class="form-check">
                          <input class="form-check-input" type="radio" name="part" id="center_panel" value="1" disabled>
                          <label class="form-check-label" for="center_panel">
                            Center Panel
                          </label>
                        </div>
                        <div class="form-check">
                          <input class="form-check-input" type="radio" name="part" id="back_wings" value="2" disabled>
                          <label class="form-check-label" for="back_wings">
                            Back Wings
                          </label>
                        </div>
                        <div class="form-check">
                          <input class="form-check-input" type="radio" name="part" id="cup" value="3" disabled>
                          <label class="form-check-label" for="cup">
                            Cups
                          </label>
                        </div>
                        <div class="form-check">
                          <input class="form-check-input" type="radio" name="part" id="assembly" value="4" disabled>
                          <label class="form-check-label" for="assembly">
                            Assembly
                          </label>
                        </div>
                      </div>
                    </div>
                    <div class="row g-3 align-items-center mb-3">
                      <div class="col-lg-3">
                        <label for="qty" class="col-form-label">Qty Recut <sup style="color: red;">*</sup></label>
                      </div>
                      <div class="col-lg-2">
                        <input type="text" id="qty" class="form-control text-center" placeholder="0" min="0" disabled>
                      </div>
                    </div>
                    <div class="row g-3 align-items-center mb-3">
                      <div class="col-lg-3">
                        <label for="qty" class="col-form-label">Defect <sup style="color: red;">*</sup></label>
                      </div>
                      <div class="col-lg-6">
                        <select id="defect" class="form-control select2_1" style="width: 100%;" disabled></select>
                      </div>
                    </div>
                    <div class="row g-3 mb-3">
                      <div class="col-lg-3">
                        <label for="remarks" class="col-form-label">Remarks <sup style="color: red;">*</sup></label>
                      </div>
                      <div class="col-lg-6">
                        <textarea class="form-control" id="remarks" style="height: 100px" disabled></textarea>
                      </div>
                    </div>

                    <input type="hidden" id="line" value="<?= $this->session->userdata('username') ?>">
                    <div class="row g-3 align-items-center mb-3">
                      <div class="col-lg-3"></div>
                      <div class="col-lg-7">
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







            <!-- <div class="row mb-3 mt-4">
              <div class="col-lg-12">
                <button class="btn btn-info btn-sm me-2" id="btn_daily" disabled>Daily</button>
                <button class="btn btn-outline-info btn-sm  me-2" id="btn_monthly">Monthly</button>
                <button class="btn btn-outline-info btn-sm " id="btn_show_all">Show All</button>
              </div>
            </div> -->

            <div class="row">
              <div class="col-lg-12">
                <!-- <div class="table-responsive"> -->
                <table id="recutSewingTable" class="table table-striped table-bordered table-sm nowrap" style="width:100%">
                  <thead>
                    <tr>
                      <th>No.</th>
                      <th>Created Date</th>
                      <th>Buyer</th>
                      <th>Style</th>
                      <th>ORC</th>
                      <th>Part</th>
                      <th>Bundle #</th>
                      <th>Size</th>
                      <th>Qty Recut</th>
                      <th>Defect Code</th>
                      <th>Defect Desc</th>
                      <th>Remarks</th>
                      <th>Input Cutting Date</th>
                      <th>Output Cutting Date</th>
                      <th>Received Date</th>
                      <th>Status</th>
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
    const loadDefect = () => {
      $('#defect').empty();
      $.ajax({
        url: " <?= site_url('sewing/getDefectMaster'); ?>",
        type: 'GET',
        dataType: 'JSON',
        beforeSend: function() {
          $("#defect").prepend($('<option></option>').html('Loading...'));
        },
      }).done(function(data) {
        $('#defect').empty();
        $('#defect').append($('<option>', {
          value: "",
          text: "- Select Defect -"
        }));
        $.each(data, function(i, item) {
          $('#defect').append($('<option>', {
            value: item.id_df,
            text: item.DCode + ' | ' + item.Defect
          }));
        });
      });
    }

    loadDefect();

    // Main Table
    let recutSewingTable = $('#recutSewingTable').DataTable({
      // lengthChange: false,
      // buttons: ['copy', 'excel', 'pdf', 'print'],
      scrollX: true,
      destroy: true,
      ajax: {
        url: '<?= site_url('sewing/getRecutSewing'); ?>',
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
          'data': 'buyer',
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
          'data': 'part_desc',
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
          'data': 'qty',
          'className': 'text-center px-2'
        },
        {
          'data': 'defect_code',
          'className': 'text-center px-2'
        },
        {
          'data': 'defect',
          'className': 'text-center px-2'
        },
        {
          'data': 'remarks',
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
            if (row['input_date'] != null && row['output_date'] != null && row['date_received'] != null) {
              return "<i class='bx bx-check-circle' style='color: #22c55e'></i> <b>Complete</b>"
            } else if (row['input_date'] != null && row['output_date'] != null && row['date_received'] == null) {
              return "<i class='bx bxs-hourglass' style='color: #22c55e'></i> <b>Waiting for received</b>"
            } else {
              return "<i class='bx bx-recycle' style='color: #9ca3af'></i> <b>On Progress</b>"
            }
          }
        },
      ],

      fnRowCallback: function(nRow, aData, iDisplayIndex, iDisplayIndexFull) {

        if (aData['input_date'] != null && aData['output_date'] != null && aData['date_received'] == null) {
          $('td', nRow).css('background-color', '#86efac');
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

              $('#qty').prop('disabled', false);
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
        return false;
      }

    });

    $('#qty').keypress(function(e) {
      let charCode = (e.which) ? e.which : e.keyCode;
      if (charCode > 31 && (charCode < 48 || charCode > 57)) {
        return false;
      }


    });

    $('#qty').on('input', function() {
      let value = $(this).val();
      let qty_barcode = $('#qty_barcode').val();

      if ((value !== '') && (value.indexOf('.') === -1)) {
        $(this).val(Math.max(Math.min(value, qty_barcode), -qty_barcode));
      }
    });

    // Button Reset
    $('#btn_reset').on('click', function() {
      $("#barcode").val('').prop('disabled', false);
      $('#qty').val('');
      $('#defect').val(null).trigger('change');

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
      $('input[name="part"]').prop('checked', false);

      $('#btn_save').prop('disabled', true);

      $('#barcode').focus();

    });


    // Button Save
    $('#btn_save').on('click', function() {
      let full_barcode = $('#barcode').val();
      let barcodeUpper = full_barcode.toUpperCase();
      let barcodeSplit = barcodeUpper.split("_");
      let barcode = barcodeSplit[1];

      let line = $('#line').val();
      let id_part = $('input[name="part"]:checked').val();
      let qty = $('#qty').val();
      let id_defect = $('#defect').val();
      let remarks = $('#remarks').val();

      if (barcode != '' && id_part != '' && qty != '' && id_defect != '' && remarks != '') {
        swal.fire({
          icon: 'warning',
          title: 'Warning!',
          html: "Apakah anda yakin ?",
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
                'id_part': id_part,
                'qty': qty,
                'id_defect': id_defect,
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
              success: function(data) {
                swal.fire({
                  icon: 'success',
                  title: 'Success!',
                  text: 'Data berhasil disimpan!',
                  timer: 1000,
                  showCancelButton: false,
                  showConfirmButton: false
                }).then(function() {
                  $("#barcode").val('').prop('disabled', false);
                  $('#qty').val('');
                  $('#defect').val(null).trigger('change');

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
                  $('input[name="part"]').prop('checked', false);

                  $('#btn_save').prop('disabled', true);

                  $('#barcode').focus();

                  recutSewingTable.ajax.reload();

                });
              }
            });
          }

        });
      } else {
        Swal.fire(
          'Warning.',
          'Ada form yang belum diisi',
          'warning'
        );
      }
    });







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
            if (result > 1) {
              saveInputRecutBySelect(barcode);
            } else {
              saveInputRecutByBarcode(barcode)
            }
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
        countUnscannedBarcode();
      });
    }

    function saveInputRecutBySelect(barcode) {
      scanBarcodeValueTable = $('#scanBarcodeValueTable').DataTable({
        autoWidth: false,
        info: true,
        searching: false,
        paging: false,
        scrollX: true,
        select: {
          style: 'single'
        },
        // fixedHeader: true,
        // stateSave: true,
        destroy: true,
        ajax: {
          url: '<?= site_url('sewing/getScanBarcodeValueReceivedRecutSewing'); ?>',
          type: 'GET',
          data: {
            "barcode": barcode
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
            'data': 'created_date',
            'className': 'text-center px-2'
          },
          {
            'data': 'buyer',
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
            'data': 'part_desc',
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
            'data': 'qty',
            'className': 'text-center px-2'
          },
          {
            'data': 'defect_code',
            'className': 'text-center px-2'
          },
          {
            'data': 'defect',
            'className': 'text-center px-2'
          },
          {
            'data': 'line',
            'className': 'text-center px-2'
          },
          {
            'data': 'remarks',
            'className': 'text-center px-2'
          },
        ],


      });

      scanBarcodeValueTable.on('select deselect', function() {
        let selectedRows = scanBarcodeValueTable.rows({
          selected: true
        }).count();

        if (selectedRows > 0) {
          $("#btn_receive_modal").prop('disabled', false);
        } else {
          $("#btn_receive_modal").prop('disabled', true);
        }
      });

      $("#scanBarcodeValueModal").on('shown.bs.modal', function() {
        $('#scanBarcodeValueTable').DataTable().columns.adjust();
      });

      $("#scanBarcodeValueModal").modal("show");

      $('#scanBarcodeValueModal').on('hidden.bs.modal', function() {
        $('#barcode_receipt').val('');
        $('#barcode_receipt').focus();
        $('#barcode_receipt').prop('disabled', false);
      });
    }

    $('#btn_receive_modal').click(function() {
      let id_recut_sewing = scanBarcodeValueTable.rows('.selected').data()[0].id;

      $.ajax({
        url: '<?= site_url("sewing/postReceivedRecutSewingBySelected"); ?>',
        method: 'POST',
        dataType: 'JSON',
        data: {
          'id_recut_sewing': id_recut_sewing
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
        $('#barcode_receipt').prop('disabled', false);

        $("#scanBarcodeValueModal").modal("hide");

        scanBarcodeValueTable.ajax.reload();
        recutSewingTable.ajax.reload();
        countUnscannedBarcode();
      });
    });





    // auto reload table 
    setInterval(reloadRecutSewingTable, 20000);

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