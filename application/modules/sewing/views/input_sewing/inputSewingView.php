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
            <li class="breadcrumb-item active" aria-current="page">Input Sewing</li>
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
    <h6 class="mb-0 text-uppercase">Input Sewing</h6>
    <hr />


    <div class="card">
      <div class="card-body">
        <div class="row my-3 mx-2">
          <div class="col-lg-12 mb-4">
            <div class="row">
              <div class="col-lg-6">
                <span class="btn btn-primary position-relative" style="cursor: context-menu;"> <i class='bx bx-group'></i> <span class="align-middle">Line : <?= ucwords(strtolower($this->session->userdata('username'))); ?></span>
                </span>
                <input type="hidden" id="line" value="<?= $this->session->userdata('username'); ?>">
              </div>
            </div>
          </div>

          <div class="col-lg-12 mb-3">
            <label for="barcode" class="col-form-label">Scan Bundle Record</label>
            <input type="text" id="barcode" class="form-control" placeholder="Scan barcode here...">
          </div>
          <!-- <div class="my-3">
            <button class="btn btn-secondary btn-sm me-1" id="btn_daily">Daily</button>
            <button class="btn btn-outline-secondary btn-sm" id="btn_30_days_ago">30 Days Ago</button>
          </div> -->
          <!-- <div class="table-responsive"> -->
          <table id="inputSewingTable" class="table table-striped table-bordered table-sm nowrap" style="width:100%">
            <thead>
              <tr>
                <th>No.</th>
                <th>Line</th>
                <th>Date</th>
                <th>ORC</th>
                <th>Style</th>
                <th>Color</th>
                <th>Bundle #</th>
                <th>Size</th>
                <th>Qty</th>
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

<!-- Modal Man Power -->
<div class="modal fade" id="modal_man_power" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="modal_man_power_Label" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modal_man_power_Label">Man Power Line <?= ucfirst(strtolower($this->session->userdata['username'])); ?></h5>
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
        <form method="post" id="form-man-power">
          <div class="row mx-2 my-4 justify-content-center">
            <label for="qtyOutputSewing" class="col-sm-2 col-form-label">Qty</label>
            <div class="col-sm-4">
              <input type="number" class="form-control text-center" id="qtyOutputSewing">
            </div>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" id="btnSaveQtyOutputSewing" class="btn btn-success">Save</button>
        <button type="button" class="btn" data-bs-dismiss="modal">Cancel</button>
      </div>
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

    $('#barcode').focus();

    let inputSewingTable = $('#inputSewingTable').DataTable({
      // lengthChange: false,
      // buttons: ['copy', 'excel', 'pdf', 'print'],
      scrollX: true,
      destroy: true,
      ajax: {
        url: '<?= site_url("sewing/getInputSewing"); ?>',
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
          'data': 'line',
          'className': 'text-center px-3'
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
          'data': 'no_bundle',
          'className': 'text-center px-3'
        },
        {
          'data': 'size',
          'className': 'text-center px-3'
        },
        {
          'data': 'qty_pcs',
          'className': 'text-center px-3'
        },
        // {
        //   'className': 'text-center px-3',
        //   render: function(data, type, row) {
        //     return '<span class="badge text-bg-info text-white" style="cursor: pointer;" id="btn_edit">Edit</span> <span class="badge text-bg-danger" style="cursor: pointer;" id="btn_delete">Delete</span>'
        //   }
        // },

      ],


    });


    $('#barcode').keypress(function(e) {
      if (e.keyCode == 13) {
        e.preventDefault();

        let barcode = $('#barcode').val();
        let barcodeUpper = barcode.toUpperCase();

        barcodeSplit = barcodeUpper.split("_");

        check_barcode(barcodeSplit[1]);
      }
    });

    function check_barcode(bar) {
      $.ajax({
        url: '<?= site_url("sewing/checkCuttingDetail"); ?>/' + bar,
        type: 'GET',
        dataType: 'json'
      }).done(function(dt) {
        // console.log('dt: ', dt);
        if (dt == null) {
          Swal.fire({
            icon: "warning",
            title: "Warning!",
            text: "Barcode tidak ada di cutting!",
            showConfirmButton: false,
            timer: 1750
          });
          $('#barcode').val('');
          $('#barcode').focus();
        } else {
          check_barcode1(dt);
        }
      });
    }

    function check_barcode1(d) {
      var dataStr = {
        'barcode': barcodeSplit[1],
        'line': $('#line').val()
      };

      // console.log('dataStr: ', dataStr);
      var ajaxCheckBarcode = $.ajax({
        url: '<?php echo site_url("sewing/ajax_get_by_barcode"); ?>',
        type: 'POST',
        data: {
          'dataStr': dataStr
        },
        dataType: 'json'
      }).done(function(dataInputSewing) {
        // console.log('data input sewing: ', dataInputSewing);
        if (dataInputSewing != null) {
          if (dataInputSewing.line == $('#line').val()) {
            Swal.fire({
              icon: "warning",
              title: "Warning!",
              text: "Barcode sudah di scan sebelumnya!",
              showConfirmButton: false,
              timer: 1750
            });
            $('#barcode').val('');
            $('#barcode').focus();
          } else {
            if (dataInputSewing.outputed == "Yes") {
              Swal.fire({
                icon: "warning",
                title: "Warning!",
                text: "Sudah menjadi output untuk line " + dataInputSewing.line,
                showConfirmButton: false,
                timer: 1750
              });
              $('#barcode').val('');
              $('#barcode').focus();
            } else {
              updateInputSewingChangeLine(dataInputSewing.id_input_sewing);
            }
          }
        } else {
          save_input_sewing(d);
        }
      });
    }

    function save_input_sewing(data) {
      // console.log('data: ', data);

      var color = data.color;
      if (color.includes("BLACK") == true) {
        var colorGroup = "Black";
      } else if (color.includes("WHITE") == true) {
        var colorGroup = "White";
      } else {
        var colorGroup = "color"
      }

      var style = data.style;
      var size = data.size;
      var groupSize;
      var cpSAM;
      var bwSAM;
      var cSAM;
      var aSAM;
      var ajaxGetGroupSize;
      var ajaxGetSewingSAM;
      var dataForSewingSAM;

      var dtInputCutting;
      var dtInputSewing;

      ajaxGetGroupSize = $.ajax({
          url: '<?php echo site_url('sewing/ajax_get_by_size'); ?>',
          type: 'POST',
          data: {
            'dataSize': size
          },
          dataType: 'json'
        }),
        ajaxGetSewingSAM = ajaxGetGroupSize.then(function(dt) {
          groupSize = dt.group;

          dataForSewingSAM = {
            'style': style,
            'color': colorGroup,
            'grup_size': groupSize
          };
          // console.log('dataForCuttingSAM: ', dataForCuttingSAM);
          // console.log('dataForSewingSAM: ', dataForSewingSAM);
          return $.ajax({
            url: '<?php echo site_url("sewing/ajax_get_sewing_sam"); ?>',
            type: 'POST',
            data: {
              'dataForSewingSAM': dataForSewingSAM
            },
            dataType: 'json'
          });

        });

      ajaxGetSewingSAM.done(function(d) {
        // console.log('d: ', d);
        cpSAM = d.center_panel_sam;
        bwSAM = d.back_wings_sam;
        cSAM = d.cups_sam;
        aSAM = d.assembly_sam;

        orc = data.orc;

        var dataStr = {
          'line': $('#line').val(),
          'orc': data.orc,
          'style': data.style,
          'color': data.color,
          'no_bundle': data.no_bundle,
          'size': data.size,
          'qty_pcs': data.qty_pcs,
          'center_panel_sam': cpSAM,
          'back_wings_sam': bwSAM,
          'cups_sam': cSAM,
          'assembly_sam': aSAM,
          'kode_barcode': barcodeSplit[1],
          'outputed': 'No'
        };

        // console.log('dataCuttingDetail: ', dataCuttingDetail);

        insertInputSewing(dataStr);
      });


    }

    function insertInputSewing(data) {
      $.ajax({
        url: '<?php echo site_url("sewing/ajax_save_input_sewing"); ?>',
        data: {
          'dataStr': data
        },
        method: 'POST',
        dataType: 'json',
      }).done(function(dataReturn) {
        if (dataReturn != null) {
          Swal.fire({
            icon: 'success',
            title: 'Success!',
            text: "Data berhasil disimpan.",
            showConfirmButton: false,
            timer: 1500
          });

        }

        $('#barcode').val('');
        $('#barcode').focus();
        reload_table();
      })
    }

    function reload_table() {
      inputSewingTable.ajax.reload(null, false);
    }

    function updateInputSewingChangeLine(idInputSewing) {
      let dataUpdate = {
        'id_input_sewing': idInputSewing,
        'line': $('#line').val()
      };

      $.ajax({
        type: 'POST',
        url: '<?= site_url("sewing/ajax_update_change_line"); ?>',
        data: {
          'dataUpdate': dataUpdate
        },
        dataType: 'json'
      }).done(function(id) {
        if (id > 0) {
          Swal.fire({
            icon: 'success',
            title: 'Success!',
            text: "Data berhasil diperbaharui.",
            showConfirmButton: false,
            timer: 1500
          });
          $('#barcode').val('');
          $('#barcode').focus();
          reload_table();
        }
      })
    }







  });
</script>