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
            <li class="breadcrumb-item active" aria-current="page">Machine Breakdown</li>
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
    <h6 class="mb-0 text-uppercase">Machine Breakdown</h6>
    <hr />


    <div class="card">
      <div class="card-body">
        <div class="row my-3 mx-2">
          <div class="col-lg-12 mb-4">
            <div class="row">
              <div class="col-lg-6">
                <span class="btn btn-primary position-relative" style="cursor: context-menu;"> <i class='bx bx-group'></i> <span class="align-middle">Line : <?= ucwords(strtolower($this->session->userdata('username'))); ?></span>
                </span>
              </div>
              <div class="col-lg-6" id="alert_barcode_symptom"></div>
            </div>

            <div id="form_barcode"></div>

            <!-- <div class="table-responsive"> -->
            <div class="row mt-4">
              <div class="col-lg-12">
                <table id="machineBreakdownTable" class="table table-striped table-bordered table-sm nowrap" style="width:100%">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Start Scan</th>
                      <th>Start Repairing</th>
                      <th>Barcode</th>
                      <th>Brand</th>
                      <th>Type</th>
                      <th>SN</th>
                      <th>Symptom</th>
                      <th>Status</th>
                      <th>Duration</th>
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
  <!--end page wrapper -->

  <!-- Modal -->

  <script src="<?= base_url('assets/plugins/easytimer/easytimer.min.js'); ?>"></script>

  </script>
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


      let machineBreakdownTable = $('#machineBreakdownTable').DataTable({
        // lengthChange: false,
        // buttons: ['copy', 'excel', 'pdf', 'print'],
        scrollX: true,
        destroy: true,
        // ajax: {
        //   url: '<?= site_url("sewing/getOutputSewing"); ?>',
        //   type: 'GET',
        //   dataType: 'JSON'
        // },
        // columns: [{
        //     "data": null,
        //     "orderable": true,
        //     "searchable": false,
        //     'className': 'text-center px-4',
        //     // "width": "100px",
        //     "render": function(data, type, row, meta) {
        //       return meta.row + meta.settings._iDisplayStart + 1;
        //     }
        //   },
        //   {
        //     'data': 'output_date',
        //     'className': 'text-center px-3'
        //   },
        //   {
        //     'data': 'style',
        //     'className': 'text-center px-3'
        //   },
        //   {
        //     'data': 'orc',
        //     'className': 'text-center px-3'
        //   },
        //   {
        //     'data': 'no_bundle',
        //     'className': 'text-center px-3'
        //   },
        //   {
        //     'data': 'size',
        //     'className': 'text-center px-3'
        //   },
        //   {
        //     'data': 'qty',
        //     'className': 'text-center px-3'
        //   },
        //   // {
        //   //   'className': 'text-center px-3',
        //   //   render: function(data, type, row) {
        //   //     return '<span class="badge text-bg-info text-white" style="cursor: pointer;" id="btn_edit">Edit</span> <span class="badge text-bg-danger" style="cursor: pointer;" id="btn_delete">Delete</span>'
        //   //   }
        //   // },

        // ],
      });

      var firstBarcode;
      var firstBarcodeLength;
      var secondBarcode;
      var thirdBarcode;


      // firstBarcode = localStorage.getItem('firstBarcode');
      firstBarcode = '<?= $code; ?>';
      firstBarcodeLength = firstBarcode.length;





      function showMachineBreakdownAndRepairing() {

        let machineBreakdownTable = $('#machineBreakdownTable').DataTable({
          // lengthChange: false,
          // buttons: ['copy', 'excel', 'pdf', 'print'],
          scrollX: true,
          destroy: true,
          ajax: {
            url: '<?= site_url("sewing/ajax_get_machines_breakdown_repairing"); ?>',
            type: 'GET',
            dataType: 'JSON'
          },
          columns: [{
              'data': 'id_machine_breakdown',
              'className': 'text-center px-2'
            },
            {
              'data': 'start_waiting',
              'className': 'text-center px-2'
            },
            {
              'className': 'text-center px-2',
              render: function(data, type, row, meta) {
                if (row['end_waiting'] == '00:00:00') {
                  return "";
                } else {
                  return row['end_waiting'];
                }
              }
            },
            {
              'data': 'barcode_machine',
              'className': 'text-center px-2'
            },
            {
              'data': 'machine_brand',
              'className': 'text-center px-2'
            },
            {
              'data': 'machine_type',
              'className': 'text-center px-2'
            },
            {
              'data': 'machine_sn',
              'className': 'text-center px-2'
            },
            {
              'data': 'sympton',
              'className': 'text-center px-2'
            },
            {
              'className': 'text-center px-2',
              render: function(data, type, row, meta) {
                if (row['status'] == 'Waiting...') {
                  return "<span class='badge rounded-pill text-bg-danger text-white mx-1'>Waiting</span>"
                } else {
                  return "<span class='badge rounded-pill text-bg-warning mx-1'>Repairing</span>"
                }
              }
            },
            {
              'className': 'text-center px-2',
              render: function(data, type, row, meta) {
                let timer = new easytimer.Timer();
                timer.start({
                  precision: 'seconds',
                  startValues: {
                    hours: parseInt(row['duration'].substr(0, 2)),
                    minutes: parseInt(row['duration'].substr(3, 2)),
                    seconds: parseInt(row['duration'].substr(6, 2)),
                  }
                });
                timer.addEventListener('secondsUpdated', function(e) {
                  $("#" + row['id_machine_breakdown'].toString()).html(timer.getTimeValues().toString());
                });

                return "<span class='tmr' id='" + row['id_machine_breakdown'] + "''></span>"
              }
            },

          ],

        });


      }

      showMachineBreakdownAndRepairing();

      function showWizard() {
        if (firstBarcodeLength >= 10) {
          // console.log(firstBarcode)
          checkMachineBreakdown(firstBarcode).done(function(rsp) {
            // console.log('rsp: ', rsp);
            if (rsp == null) {
              // console.log('oke')
              machineBreakdownWizard(firstBarcode);
            } else {
              // if(rsp.length > 0){
              if (rsp.status == "Settled") {
                machineBreakdownWizard();
              } else if (rsp.status == "Waiting...") {
                // machineRepairingWizard(rsp);
              } else if (rsp.status == "Repairing...") {
                // machineSettledOrDelayedWizard();
              } else if (rsp.status == "Delayed") {
                // machineSettledWizard();
              }
              // }
            }
          });
        }

        function machineBreakdownWizard() {
          let alert =
            `<div class="alert alert-info border-0 bg-info alert-dismissible fade show">
                <div class="text-white">Silahkan scan "Barcode Symptom".</div>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>`;

          $('#alert_barcode_symptom').html(alert);

          let form_barcode =
            `<div class="row mt-3">
                <div class="col-lg-6">
                  <div class="row">
                    <label for="barcode" class="col-sm-4 col-form-label">Barcode Machine</label>
                    <div class="col-sm-6">
                      <input type="text" class="form-control" id="barcodeMachine" disabled>
                    </div>
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="row">
                    <label for="barcode" class="col-sm-4 col-form-label">Barcode Symptom</label>
                    <div class="col-sm-6">
                      <input type="text" class="form-control" id="barcodeSymptom">
                    </div>
                  </div>
                </div>
              </div>`;

          $('#form_barcode').html(form_barcode);


          $('#barcodeMachine').val(firstBarcode);
          $('#barcodeSymptom').focus();



          $('#barcodeSymptom').keypress(function(e) {
            if (e.keyCode == 13) {
              let kode = $(this).val();
              // let barcodePrefix = $(this).val().substr(0,2);
              let barcodePrefix = kode.substr(0, 2);
              if (barcodePrefix.toUpperCase() != "MM") {
                Swal.fire({
                  icon: 'warning',
                  title: 'Warning!',
                  text: 'Invalid barcode symptom!',
                  showConfirmButton: false,
                  timer: 4000
                });
                $('#barcodeSymptom').val('');
                $('#barcodeSymptom').focus();
              } else {
                e.preventDefault();
                // secondBarcode = $('#barcodeSymptom').val();
                secondBarcode = kode.toUpperCase();


                addMachineBreakdown(firstBarcode, secondBarcode);
              }
            }
          });
        }

        function addMachineBreakdown(machineBarcode, symptomBarcode) {
          $('#barcodeSymptom').prop('disabled', true);
          let dataMachineBreakdown = {
            'codeMesin': machineBarcode,
            'codeSympton': symptomBarcode
          };

          // console.log('dataMachineBreakdown: ', dataMachineBreakdown);

          $.ajax({
            type: 'POST',
            url: '<?= site_url("sewing/ajax_add_machine_breakdown"); ?>',
            data: {
              'dataBarcode': dataMachineBreakdown
            },
            dataType: 'json'
          }).done(function(idMachineBreakdown) {
            // console.log('idMachineBreakdown: ', idMachineBreakdown);
            if (idMachineBreakdown > 0) {
              var dataNotif = {
                'title': 'New Order',
                'id': idMachineBreakdown
              };
              $.ajax({
                type: 'POST',
                url: '<?= site_url("sewing/sendNotification"); ?>',
                data: {
                  'dataNotif': dataNotif
                }
              }).done(function(result) {
                // console.log('result: ', result);

                // if (result != null) {
                // jsonResult = JSON.parse(result);

                // console.log('jsonResult: ', jsonResult);
                // console.log('jsonResult: ', jsonResult.success);

                // jsonResult Sementara dikomentari (dikarenakan invalid key)
                // if (jsonResult) {
                Swal.fire({
                  icon: 'success',
                  title: 'Success',
                  html: 'Data machine breakdown added successfully',
                  showConfirmButton: false,
                  timer: 4000
                }).then(function() {
                  window.open('<?= site_url("sewing/output_sewing"); ?>', '_self');
                });

                // }
                // }
              });
            } else {
              Swal.fire({
                type: 'error',
                title: 'Error!!',
                text: 'Add data failed!, something wrong happened!!',
                showConfirmButton: true,
              });
              // window.open('<//?php echo site_url("outputsewing"); ?>');
            }
            // window.open('<//?php echo site_url("outputsewing"); ?>');
            // setTimeout(backToSewing, 800);
          });
        }

        // function backToSewing() {
        //   window.open('<?= site_url("sewing_output_sewing"); ?>', '_self');
        // }
      }



      function checkMachineBreakdown(c) {
        return $.ajax({
          type: 'GET',
          url: '<?php echo site_url("sewing/ajax_check_machine_at_breakdown"); ?>/' + c,
          dataType: 'json',
          success: function(response) {}
        });
      }

      showWizard();












    });
  </script>