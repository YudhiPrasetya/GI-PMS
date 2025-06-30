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
            <li class="breadcrumb-item active" aria-current="page">Output Packing</li>
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
    <h6 class="mb-0 text-uppercase">Daily Data Output Packing <b>Line <?= strtoupper($this->session->userdata('username')); ?></b></h6>
    <hr />

    <div class="card">
      <div class="card-body">
        <div class="row my-3 mx-2">
          <div class="col-lg-12 mb-4">
            <div class="row mb-4">
              <div class="col-lg-12">
                <label for="kode_barcode" class="col-form-label">Scan Output Packing</label>
                <input type="text" id="kode_barcode" class="form-control" autocomplete="off" placeholder="Scan barcode here...">
              </div>
            </div>
            <div class="row">
              <div class="col-lg-12">
                <table id="outputPackingTable" class="table table-striped table-bordered table-sm nowrap" style="width:100%">
                  <thead>
                    <tr>
                      <th>No.</th>
                      <th>Output Date</th>
                      <th>ORC</th>
                      <th>Bundle #</th>
                      <th>Style</th>
                      <th>Color</th>
                      <th>Size</th>
                      <th>Qty Out</th>
                      <th>Line</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <th colspan="7">Total Daily Output Packing</th>
                    <th></th>
                    <th></th>
                  </tfoot>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <h6 class="mb-0 text-uppercase mt-5">All Data Output Packing <b>Line <?= strtoupper($this->session->userdata('username')); ?></b></h6>
    <hr />
    <div class="card">
      <div class="card-body">
        <div class="row my-3 mx-2">
          <div class="col-lg-12 mb-4">
            <div class="row">
              <div class="col-lg-12">
                <table id="allOutputPackingTable" class="table table-striped table-bordered table-sm nowrap" style="width:100%">
                  <thead>
                    <tr>
                      <th>No.</th>
                      <th>ORC</th>
                      <th>Style</th>
                      <th>Color</th>
                      <th>Size</th>
                      <th>Qty</th>
                      <th>Actions</th>
                    </tr>
                  </thead>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!--end page wrapper -->

  <!-- Modal -->
  <!-- Modal Create New Order -->
  <div class="modal fade" id="allOutputPackingDetailsModal" aria-hidden="true">
    <div class="modal-dialog modal-xl">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Output Packing Details</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="row mx-3">
            <div class="col-lg-12">
              <table id="allOutputPackingDetailsTable" class="table table-striped table-bordered table-sm nowrap" style="width:100%">
                <thead>
                  <tr>
                    <th>No.</th>
                    <th>Output Date</th>
                    <th>ORC</th>
                    <th>Style</th>
                    <th>Color</th>
                    <th>Bundle #</th>
                    <th>Size</th>
                    <th>Qty Pcs</th>
                    <th>Line</th>
                  </tr>
                </thead>
                <tfoot>
                  <th colspan="7">Total Output Packing</th>
                  <th></th>
                  <th></th>
                </tfoot>
              </table>
            </div>
          </div>
        </div>
        <!-- <div class="modal-footer"> -->
        <!-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> -->
        <!-- <button type="button" id="btn_save_create_new_order" class="btn btn-primary">Simpan</button> -->
        <!-- </div> -->
      </div>
    </div>
  </div>

  <form id="form_validation">
    <!-- MODAL VERIFIKASI -->
    <div class="row">
      <div class="modal fade" data-bs-backdrop="static" id="modalverifikasi" role="dialog">
        <div class="modal-dialog modal-dialog-centered modal-md">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">NIK Verification</h5>
            </div>
            <div class="modal-body">
              <div class="mx-4">

                <div class="row g-3 mb-3">
                  <div class="col-lg-3">
                    <label for="add_remarks_modal" class="col-form-label">NIK <sup style="color: red;">*</sup></label>
                  </div>
                  <div class="col-lg-8">
                    <input type="text" class="form-control" id="ver_nik" name="ver_nik" autocomplete="off" placeholder='Scan "NIK" barcode here..'></input>
                    <text id="validasinik" style="font-size:10px;color:red">NIK salah/kosong!</text>
                  </div>
                </div>
              </div>
              <div class="modal-footer">
                <a href="<?= base_url('sewing/output_sewing') ?>">
                  <button id="back" type="button" class="btn btn-secondary ">Back</button>
                </a>
                <button type="submit" class="btn btn-success" id="cek_nik">Verifikasi</button>
              </div>
            </div>
          </div>
        </div>
      </div>
  </form>

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
      $("#modalverifikasi").modal("show");
      $("#modalverifikasi").on("shown.bs.modal", function() {
        $("#ver_nik").focus();
      });

      $('#validasinik').hide();
      const line_name = '<?= $this->session->userdata("username"); ?>';
      const groupLocation = '<?= $this->session->userdata("group_location"); ?>';
      const sweet_loader = '<div class="sweet_loader"><svg viewBox="0 0 140 140" width="140" height="140"><g class="outline"><path d="m 70 28 a 1 1 0 0 0 0 84 a 1 1 0 0 0 0 -84" stroke="rgba(0,0,0,0.1)" stroke-width="4" fill="none" stroke-linecap="round" stroke-linejoin="round"></path></g><g class="circle"><path d="m 70 28 a 1 1 0 0 0 0 84 a 1 1 0 0 0 0 -84" stroke="#71BBFF" stroke-width="4" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-dashoffset="200" stroke-dasharray="300"></path></g></svg></div>';
      const regBarcodeBundle = /(cp|bw|cu|as|pa)+[^]*-/i;

      $('#kode_barcode').focus();

      let outputPackingTable = $('#outputPackingTable').DataTable({
        // lengthChange: false,
        // buttons: ['copy', 'excel', 'pdf', 'print'],
        scrollX: true,
        destroy: true,
        ajax: {
          url: '<?= site_url("sewing/getOutputPacking"); ?>',
          type: 'GET',
          dataType: 'JSON'
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
            'data': 'tgl',
            'className': 'text-center px-2'
          },
          {
            'data': 'orc',
            'className': 'text-center px-2'
          },
          {
            'data': 'no_bundle',
            'className': 'text-center px-2'
          },
          {
            'data': 'style',
            'className': 'text-center px-2'
          },
          {
            'data': 'color',
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
            'data': 'line',
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

      var kode;
      var qty = 0;

      let allOutputPackingTable = $('#allOutputPackingTable').DataTable({
        // lengthChange: false,
        // buttons: ['copy', 'excel', 'pdf', 'print'],
        scrollX: true,
        destroy: true,
        ajax: {
          url: '<?= site_url("sewing/ajax_list"); ?>',
          type: 'GET',
          dataType: 'JSON'
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
            'data': 'orc',
            'className': 'text-center px-2'
          },
          {
            'data': 'style',
            'className': 'text-center px-2'
          },
          {
            'data': 'color',
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
            'className': 'text-center px-2',
            render: function(data, type, row, meta) {
              return "<span class='badge text-bg-info text-white mx-3' id='btnShowDetail' style='cursor: pointer;'>Details</span>"
            }
          },

        ],



      });

      $('#kode_barcode').keypress(function(e) {
        if (e.keyCode == 13) {
          e.preventDefault();
          var barcode = $(this).val();
          // console.log(nik_success)

          swal.fire({
            html: '<h5>Loading...</h5>',
            showConfirmButton: false,
            didOpen: function() {
              $('.swal2-html-container').prepend(sweet_loader);
            }
          });

          if (!regBarcodeBundle.test(barcode)) {

            Swal.fire({
              icon: 'warning',
              title: 'Warning',
              text: 'Invalid barcode!',
              showConfirmButton: false,
              timer: 1000
            }).then(function() {
              $('#kode_barcode').val('');
              $('#kode_barcode').focus();
            })
          } else {
            kode = barcode.split('_');
            // console.log(kode);
            $.ajax({
              type: 'GET',
              url: '<?php echo site_url("sewing/ajax_check_input_packing"); ?>/' + kode[1],
              dataType: 'json'
            }).done(function(retVal) {
              if (retVal == 0) {
                // console.log(retVal);
                // console.log('ppp');
                $.ajax({
                  type: 'GET',
                  url: '<?php echo site_url("sewing/ajax_check_output_sewing_detail"); ?>/' + kode[1],
                  dataType: 'json'
                }).done(function(retVal1) {
                  if (retVal1 > 0) {
                    // showBarcodeDetail();
                    //checking group line
                    $.ajax({
                      type: 'GET',
                      url: '<?php echo site_url("sewing/ajax_get_group_line_by_barcode"); ?>/' + kode[1],
                      dataType: 'json'
                    }).done(function(data) {
                      // if (retVal1 > 0) {
                      // if (data != null) {
                      // if (data.row['line'] != groupLocation) {
                      if (data.groupLine != groupLocation) {
                        swal.fire({
                          icon: 'warning',
                          title: 'Warning',
                          html: `Barcode ini bukan untuk line ${line_name}`,
                          showConfirmButton: false,
                          timer: 1750
                        });
                        $('#kode_barcode').val('');
                        $('#kode_barcode').focus();
                      } else {

                        saveOutputPacking(nik_success);

                      }
                      // }

                      // showBarcodeDetail();

                      // } else {
                      //   Swal.fire({
                      //     icon: 'warning',
                      //     title: 'Peringatan!',
                      //     text: 'Barcode bukan .',
                      //     showConfirmButton: false,
                      //     timer: 2000
                      //   });
                      //   $('#kode_barcode').val('');
                      //   $('#kode_barcode').focus('');
                      // }
                    })
                    // saveOutputPacking(nik_success);
                  } else {
                    Swal.fire({
                      icon: 'warning',
                      title: 'Peringatan!',
                      text: 'Barcode belum di-SCAN di Output Sewing.',
                      showConfirmButton: false,
                      timer: 2000
                    });
                    $('#kode_barcode').val('');
                    $('#kode_barcode').focus('');
                  }
                })
              } else {
                Swal.fire({
                  icon: 'warning',
                  title: 'Warning!',
                  text: 'Barcode sudah di-SCAN.',
                  showConfirmButton: false,
                  timer: 2000
                });
                $('#kode_barcode').val('');
                $('#kode_barcode').focus('');
              }
            })
          }
        }
      });

      function saveOutputPacking(nik_success) {
        $.ajax({
          type: 'POST',
          url: '<?php echo site_url("sewing/ajax_get_cutting_detail"); ?>/' + kode[1],
          dataType: 'json'
        }).done(function(d) {
          // console.log('d: ', d);
          if (d != null) {
            var dataStr = {
              'kode_barcode': kode[1],
              'orc': d.orc,
              'style': d.style,
              'color': d.color,
              'qty': d.qty_pcs,
              'size': d.size,
              'no_bundle': d.no_bundle,
              'actual_qty': d.qty_pcs
            }

            $.ajax({
              type: 'POST',
              url: '<?php echo site_url("sewing/ajax_save_packing"); ?>',
              data: {
                'dataStr': dataStr,
                'nik': nik_success
              },
              dataType: 'json'
            }).done(function(id) {
              if (id > 0) {
                reloadTable();

                Swal.fire({
                  icon: 'success',
                  title: 'Berhasil',
                  text: 'Data Output Packing berhasil disimpan',
                  showConfirmButton: false,
                  timer: 750,
                }).then(function() {
                  $('#kode_barcode').val('');
                  $('#kode_barcode').focus('');
                })
              }
            });
          }
        })
      }

      function reloadTable() {
        outputPackingTable.ajax.reload(null, false);
        allOutputPackingTable.ajax.reload(null, false);
      }

      $('#allOutputPackingTable tbody').on('click', '#btnShowDetail', function() {
        let orc = allOutputPackingTable.row($(this).parents('tr')).data().orc;

        let allOutputPackingDetailsTable = $('#allOutputPackingDetailsTable').DataTable({
          // lengthChange: false,
          // buttons: ['copy', 'excel', 'pdf', 'print'],
          scrollX: true,
          destroy: true,
          ajax: {
            url: '<?= site_url("sewing/ajax_get_by_orc1_packing"); ?>',
            type: 'GET',
            dataType: 'JSON',
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
              'data': 'tgl',
              'className': 'text-center px-2'
            },
            {
              'data': 'orc',
              'className': 'text-center px-2'
            },
            {
              'data': 'style',
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
              'data': 'actual_qty',
              'className': 'text-center px-2'
            },
            {
              'data': 'line',
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

        $("#allOutputPackingDetailsModal").on('shown.bs.modal', function() {
          $('#allOutputPackingDetailsTable').DataTable().columns.adjust();
        });

        $("#allOutputPackingDetailsModal").modal("show");

      });
      let nik_success;
      $('#cek_nik').click(function() {
        let nik = $('#ver_nik').val();
        const id = [];

        $.ajax({
          url: '<?= site_url('sewing/verifikasi_nik') ?>',
          type: 'POST',
          dataType: 'json',
          data: {
            nik: nik,
          },
          success: function(data) {
            if (data[0].nik == '1') {
              swal.fire({
                icon: 'success',
                title: 'Success!',
                text: 'Verifikasi berhasil.',
                timer: 1000,
                showCancelButton: false,
                showConfirmButton: false
              }).then(function(result) {
                $("#modalverifikasi").modal("hide");
                $('#kode_barcode').focus();
                $('#validasinik').hide();
                nik_success = nik;
              });
              // console.log(data);
            } else {
              Swal.fire(
                'Error!',
                'Verifikasi Nik Gagal!',
                'error'
              ).then(function(data) {
                $('#ver_nik').val('');
                $('#ver_nik').focus();
                $('#validasinik').show();
                // window.location.href = '../sewing/output_sewing';
              });
            }
          }
        });
      });

      $('#form_validation').submit(function(e) {
        e.preventDefault();
      })
    });
  </script>