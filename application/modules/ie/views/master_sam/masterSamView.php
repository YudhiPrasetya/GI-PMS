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
      <div class="breadcrumb-title pe-3">IE</div>
      <div class="ps-3">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb mb-0 p-0">
            <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">Master SAM</li>
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
    <h6 class="mb-0 text-uppercase">Create New Master SAM</h6>
    <hr />


    <div class="card" id="card-tab">
      <div class="card-body">
        <div class="row my-3 mx-2">
          <div class="col-lg-12">
            <div class="row my-3">
              <div class="col-lg-12">
                <button class="btn btn-primary" id="btn_create_new_master_sam">Create New Master SAM</button>
              </div>
            </div>
            <ul class="nav nav-tabs nav-primary" role="tablist">
              <li class="nav-item" role="presentation">
                <a class="nav-link active" data-bs-toggle="tab" href="#primarystyle" role="tab" aria-selected="true">
                  <div class="d-flex align-items-center">
                    <div class="tab-icon"><i class='bx bx-hive font-18 me-1'></i>
                    </div>
                    <div class="tab-title">Style</div>
                  </div>
                </a>
              </li>
              <li class="nav-item" role="presentation">
                <a class="nav-link" data-bs-toggle="tab" href="#primarycutting" role="tab" aria-selected="false">
                  <div class="d-flex align-items-center">
                    <div class="tab-icon"><i class='bx bx-cut font-18 me-1'></i>
                    </div>
                    <div class="tab-title">Cutting</div>
                  </div>
                </a>
              </li>
              <li class="nav-item" role="presentation">
                <a class="nav-link" data-bs-toggle="tab" href="#primarymolding" role="tab" aria-selected="false">
                  <div class="d-flex align-items-center">
                    <div class="tab-icon"><i class='bx bx-collection font-18 me-1'></i>
                    </div>
                    <div class="tab-title">Molding</div>
                  </div>
                </a>
              </li>
              <li class="nav-item" role="presentation">
                <a class="nav-link" data-bs-toggle="tab" href="#primarysewing" role="tab" aria-selected="false">
                  <div class="d-flex align-items-center">
                    <div class="tab-icon"><i class='bx bx-map-pin font-18 me-1'></i>
                    </div>
                    <div class="tab-title">Sewing</div>
                  </div>
                </a>
              </li>
              <li class="nav-item" role="presentation">
                <a class="nav-link" data-bs-toggle="tab" href="#primarypacking" role="tab" aria-selected="false">
                  <div class="d-flex align-items-center">
                    <div class="tab-icon"><i class='bx bx-package font-18 me-1'></i>
                    </div>
                    <div class="tab-title">Packing</div>
                  </div>
                </a>
              </li>
            </ul>
            <div class="tab-content py-3">
              <div class="tab-pane fade show active" id="primarystyle" role="tabpanel">
                <div class="ms-3">
                  <div class="mb-3 row mt-3">
                    <input type="hidden" id="idSAM">
                    <label for="style" class="col-sm-2 col-form-label">Style</label>
                    <div class="col-sm-3">
                      <select class="form-control select2_1" id="style"></select>
                    </div>
                  </div>
                  <div class="mb-3 row">
                    <label for="color" class="col-sm-2 col-form-label">Color</label>
                    <div class="col-sm-3">
                      <select class="form-control select2_1" id="color">
                        <option value="" hidden value>- Select Color -</option>
                        <option value="White">White</option>
                        <option value="Black">Black</option>
                        <option value="color">Color</option>
                      </select>
                    </div>
                  </div>
                  <div class="mb-3 row">
                    <label for="size" class="col-sm-2 col-form-label">Size</label>
                    <div class="col-sm-3">
                      <select class="form-control select2_1" id="size">
                        <option value="" hidden value>- Select Size -</option>
                        <option value="reguler">Reguler</option>
                        <option value="big">Big</option>
                        <option value="extra large">Extra Large</option>
                      </select>
                    </div>
                  </div>
                </div>
              </div>
              <div class="tab-pane fade" id="primarycutting" role="tabpanel">
                <div class="ms-3">
                  <div class="mb-3 row mt-3">
                    <label for="sam_cutting" class="col-sm-2 col-form-label">Cutting SAM</label>
                    <div class="col-sm-3">
                      <input type="number" class="form-control" id="sam_cutting" placeholder="0">
                    </div>
                  </div>
                </div>
              </div>
              <div class="tab-pane fade" id="primarymolding" role="tabpanel">
                <div class="ms-3">
                  <div class="mb-3 row mt-3">
                    <label for="linning_sam" class="col-sm-2 col-form-label">Linning</label>
                    <div class="col-sm-3">
                      <input type="number" class="form-control mold-input" id="linning_sam" placeholder="0">
                    </div>
                  </div>
                  <div class="mb-3 row">
                    <label for="mid_sam" class="col-sm-2 col-form-label">Middle</label>
                    <div class="col-sm-3">
                      <input type="number" class="form-control mold-input" id="mid_sam" placeholder="0">
                    </div>
                  </div>
                  <div class="mb-3 row">
                    <label for="outer_sam" class="col-sm-2 col-form-label">Outer</label>
                    <div class="col-sm-3">
                      <input type="number" class="form-control mold-input" id="outer_sam" placeholder="0">
                    </div>
                  </div>
                  <div class="mb-3 row">
                    <label for="total_mold_sam" class="col-sm-2 col-form-label">Total Mold</label>
                    <div class="col-sm-3">
                      <input type="number" class="form-control" id="total_mold_sam" placeholder="0">
                    </div>
                  </div>
                </div>
              </div>
              <div class="tab-pane fade" id="primarysewing" role="tabpanel">
                <div class="ms-3">
                  <div class="mb-3 row mt-3">
                    <label for="center_panel_sam" class="col-sm-2 col-form-label">Center Panel</label>
                    <div class="col-sm-3">
                      <input type="number" class="form-control sewing-input" id="center_panel_sam" placeholder="0">
                    </div>
                  </div>
                  <div class="mb-3 row">
                    <label for="back_wings_sam" class="col-sm-2 col-form-label">Back Wings</label>
                    <div class="col-sm-3">
                      <input type="number" class="form-control sewing-input" id="back_wings_sam" placeholder="0">
                    </div>
                  </div>
                  <div class="mb-3 row">
                    <label for="cups_sam" class="col-sm-2 col-form-label">Cups</label>
                    <div class="col-sm-3">
                      <input type="number" class="form-control sewing-input" id="cups_sam" placeholder="0">
                    </div>
                  </div>
                  <div class="mb-3 row">
                    <label for="assembly_sam" class="col-sm-2 col-form-label">Assembly</label>
                    <div class="col-sm-3">
                      <input type="number" class="form-control sewing-input" id="assembly_sam" placeholder="0">
                    </div>
                  </div>
                  <div class="mb-3 row">
                    <label for="total_sewing_sam" class="col-sm-2 col-form-label">Total Sewing</label>
                    <div class="col-sm-3">
                      <input type="text" class="form-control" id="total_sewing_sam" placeholder="0">
                    </div>
                  </div>
                </div>
              </div>
              <div class="tab-pane fade" id="primarypacking" role="tabpanel">
                <div class="ms-3">
                  <div class="mb-3 row mt-3">
                    <label for="packing_sam" class="col-sm-2 col-form-label">Packing SAM</label>
                    <div class="col-sm-3">
                      <input type="number" class="form-control" id="packing_sam" placeholder="0">
                    </div>
                  </div>
                </div>

              </div>
            </div>

            <div class="row ms-1">
              <div class="col-lg-2"></div>
              <div class="col-lg-4" id="btn_group">
                <button class="btn btn-primary me-1" id="btn_save_add_new">Save</button>
                <button class="btn btn-outline-secondary" id="btn_reset">Reset</button>
              </div>
            </div>

            <div class="row mt-4">
              <div class="col-lg-12">
                <!-- <div class="table-responsive"> -->
                <table id="masterSamTable" class="table table-striped table-bordered table-sm nowrap" style="width:100%">
                  <thead>
                    <tr>
                      <th class="text-center">No.</th>
                      <th class="text-center">Style</th>
                      <th class="text-center">Color</th>
                      <th class="text-center">Size</th>
                      <th class="text-center">Action</th>
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

    $('#btn_save_edit').hide();

    const loadStyleSam = () => {
      $('#style').empty();
      $.ajax({
        url: " <?= site_url('ie/getStyleSam'); ?>",
        type: 'GET',
        dataType: 'JSON',
        beforeSend: function() {
          $("#style").prepend($('<option></option>').html('Loading...'));
        },
      }).done(function(data) {
        $('#style').empty();
        $('#style').append($('<option>', {
          value: "",
          text: "- Select Style -"
        }));
        $.each(data, function(i, item) {
          $('#style').append($('<option>', {
            value: item.style,
            text: item.style
          }));
        });
      });
    }

    loadStyleSam();

    // Main Table
    let masterSamTable = $('#masterSamTable').DataTable({
      // lengthChange: false,
      // buttons: ['copy', 'excel', 'pdf', 'print'],
      lengthMenu: [
        [9, 25, 50, 100],
        [9, 25, 50, 100]
      ],
      scrollX: true,
      destroy: true,
      ajax: {
        url: '<?= site_url('ie/ajax_list'); ?>',
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
          'data': 'color',
          'className': 'text-center px-2'
        },
        {
          'data': 'grup_size',
          'className': 'text-center px-2'
        },
        {
          'className': 'text-center px-2',
          render: function(data, type, row) {
            return "<span class='badge text-bg-info text-white' id='btn_edit' style='cursor: pointer;'>Edit</span> <span class='badge text-bg-danger text-white' id='btn_delete' style='cursor: pointer;'>Delete</span>"
          }
        },
      ],

    });

    function controlsOff() {
      $('.tab-content input').prop('disabled', true);
      $('.tab-content select').prop('disabled', true);
      $('#btn_save_add_new').prop('disabled', true);
      $('#btn_reset').prop('disabled', true);
    }

    function controlsOn() {
      $('.tab-content input').prop('disabled', false);

      $('#total_mold_sam').prop('disabled', true);
      $('#total_sewing_sam').prop('disabled', true);

      $('#card-tab select').prop('disabled', false);
      // $('#card-tab :button').prop('disabled', false);
      $('.tab-content button').prop('disabled', false);
    }

    function clearControls() {
      $('#style').val(null).trigger('change');
      $('#color').val(null).trigger('change');
      $('#size').val(null).trigger('change');
      $('#card-tab input').val("");
    }

    $('.mold-input').keyup(function() {
      var totalMold = 0;
      $('.mold-input').each(function(index, element) {
        var valMold = parseFloat($(element).val());
        if (!isNaN(valMold)) {
          totalMold += valMold;
        }
      });

      $('#total_mold_sam').val(totalMold);


    });

    $('.sewing-input').keyup(function() {
      var totalSewing = 0;
      $('.sewing-input').each(function(index, element) {
        var valSewing = parseFloat($(element).val());
        if (!isNaN(valSewing)) {
          totalSewing += valSewing;
        }
      });

      $('#total_sewing_sam').val(totalSewing);


    });

    controlsOff();


    $('#masterSamTable tbody').on('click', '#btn_edit', function() {
      let data = masterSamTable.row($(this).parents('tr')).data();

      $('#idSAM').val(data.id_master_sam);
      $('#style').val(data.style).change();
      $('#color').val(data.color).change();

      $('#size').val(data.grup_size).change();

      $('#sam_cutting').val(data.sam_cutting);

      $('#linning_sam').val(data.linning_sam);
      $('#mid_sam').val(data.mid_sam);
      $('#outer_sam').val(data.outer_sam);
      $('#total_mold_sam').val(data.total_mold_sam);

      $('#center_panel_sam').val(data.center_panel_sam);
      $('#back_wings_sam').val(data.back_wings_sam);
      $('#cups_sam').val(data.cups_sam);
      $('#assembly_sam').val(data.assembly_sam);
      $('#total_sewing_sam').val(data.total_sewing_sam);
      $('#packing_sam').val(data.packing_sam);

      $('#btn_save_add_new').remove();
      $('#btn_update').remove();
      $('#btn_group').prepend('<button class="btn btn-primary me-1" id="btn_update">Update</button>');

      $('#btn_reset').prop('disabled', false);
      // $('#btn_save_edit').show();

      controlsOn();

    });

    $("#btn_create_new_master_sam").click(function() {
      clearControls();
      controlsOn();
      $("#btn_create_new_master_sam").prop('disabled', true);

      $('#btn_save_add_new').prop('disabled', false);
      $('#btn_reset').prop('disabled', false);
    });

    $('#btn_group').on('click', '#btn_save_add_new', function() {
      let style = $('#style').val();
      let color = $('#color').val();
      let grup_size = $('#size').val();
      let sam_cutting = $('#sam_cutting').val();
      let linning_sam = $('#linning_sam').val();
      let mid_sam = $('#mid_sam').val();
      let outer_sam = $('#outer_sam').val();
      let total_mold_sam = $('#total_mold_sam').val();
      let center_panel_sam = $('#center_panel_sam').val();
      let back_wings_sam = $('#back_wings_sam').val();
      let cups_sam = $('#cups_sam').val();
      let assembly_sam = $('#assembly_sam').val();
      let total_sewing_sam = $('#total_sewing_sam').val();
      let packing_sam = $('#packing_sam').val();

      if (style != "" && color != "" && grup_size != "") {

        swal.fire({
          icon: 'warning',
          title: 'Warning!',
          html: "Apakah anda yakin ingin menambahkan Master SAM untuk style " + style + " ?",
          showCancelButton: true,
          // confirmButtonColor: '#3085d6',
          // cancelButtonColor: '#d33',
          confirmButtonText: 'Yes',
          cancelButtonText: 'No',
        }).then(function(result) {
          if (result.value) {

            $.ajax({
              url: "<?= site_url('ie/postMasterSam') ?>",
              type: "POST",
              dataType: "JSON",
              data: {
                'style': style,
                'color': color,
                'grup_size': grup_size,
                'sam_cutting': sam_cutting,
                'linning_sam': linning_sam,
                'mid_sam': mid_sam,
                'outer_sam': outer_sam,
                'total_mold_sam': total_mold_sam,
                'center_panel_sam': center_panel_sam,
                'back_wings_sam': back_wings_sam,
                'cups_sam': cups_sam,
                'assembly_sam': assembly_sam,
                'total_sewing_sam': total_sewing_sam,
                'packing_sam': packing_sam
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
                masterSamTable.ajax.reload(null, false);

                swal.fire({
                  icon: 'success',
                  title: 'Success!',
                  text: 'Data berhasil ditambahkan.',
                  timer: 1000,
                  showCancelButton: false,
                  showConfirmButton: false
                }).then(function() {
                  controlsOn();
                  $("#btn_create_new_master_sam").prop('disabled', true);

                  $('#color').val(null).trigger('change');
                  $('#size').val(null).trigger('change');
                });
              }



            });
          }
        });

      } else {
        swal.fire({
          icon: 'warning',
          title: 'Warning!',
          text: 'Silahkan masukkan Style, Color & Size.',
          timer: 2000,
          showCancelButton: false,
          showConfirmButton: false
        })
      }



    });

    $('#btn_group').on('click', '#btn_update', function() {
      let id = $('#idSAM').val();
      let style = $('#style').val();
      let color = $('#color').val();
      let grup_size = $('#size').val();
      let sam_cutting = $('#sam_cutting').val();
      let linning_sam = $('#linning_sam').val();
      let mid_sam = $('#mid_sam').val();
      let outer_sam = $('#outer_sam').val();
      let total_mold_sam = $('#total_mold_sam').val();
      let center_panel_sam = $('#center_panel_sam').val();
      let back_wings_sam = $('#back_wings_sam').val();
      let cups_sam = $('#cups_sam').val();
      let assembly_sam = $('#assembly_sam').val();
      let total_sewing_sam = $('#total_sewing_sam').val();
      let packing_sam = $('#packing_sam').val();


      if (style != "" && color != "" && grup_size != "") {

        swal.fire({
          icon: 'warning',
          title: 'Warning!',
          html: "Apakah anda yakin ingin mengubah data Master SAM untuk style " + style + " ?",
          showCancelButton: true,
          // confirmButtonColor: '#3085d6',
          // cancelButtonColor: '#d33',
          confirmButtonText: 'Yes',
          cancelButtonText: 'No',
        }).then(function(result) {
          if (result.value) {

            $.ajax({
              url: "<?= site_url('ie/updateMasterSam') ?>",
              type: "POST",
              dataType: "JSON",
              data: {
                'id': id,
                'style': style,
                'color': color,
                'grup_size': grup_size,
                'sam_cutting': sam_cutting,
                'linning_sam': linning_sam,
                'mid_sam': mid_sam,
                'outer_sam': outer_sam,
                'total_mold_sam': total_mold_sam,
                'center_panel_sam': center_panel_sam,
                'back_wings_sam': back_wings_sam,
                'cups_sam': cups_sam,
                'assembly_sam': assembly_sam,
                'total_sewing_sam': total_sewing_sam,
                'packing_sam': packing_sam
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
                masterSamTable.ajax.reload(null, false);

                swal.fire({
                  icon: 'success',
                  title: 'Success!',
                  text: 'Data berhasil diubah.',
                  timer: 1000,
                  showCancelButton: false,
                  showConfirmButton: false
                }).then(function() {
                  controlsOff();
                  clearControls();
                  $("#btn_create_new_master_sam").prop('disabled', false);

                  $('#btn_update').remove();
                  $('#btn_save_add_new').remove();
                  $('#btn_group').prepend('<button class="btn btn-primary me-1" id="btn_save_add_new">Save</button>');

                  $('#btn_reset').prop('disabled', false);
                });
              }

            });
          }
        });

      } else {
        swal.fire({
          icon: 'warning',
          title: 'Warning!',
          text: 'Silahkan masukkan Style, Color & Size.',
          timer: 2000,
          showCancelButton: false,
          showConfirmButton: false
        })
      }
    });

    $('#masterSamTable tbody').on('click', '#btn_delete', function() {
      let id_master_sam = masterSamTable.row($(this).parents('tr')).data().id_master_sam;
      let style = masterSamTable.row($(this).parents('tr')).data().style;

      console.log(id_master_sam);

      swal.fire({
        icon: 'warning',
        title: 'Warning!',
        html: "Apakah anda yakin ingin menghapus data ini ?",
        showCancelButton: true,
        // confirmButtonColor: '#3085d6',
        // cancelButtonColor: '#d33',
        confirmButtonText: 'Yes',
        cancelButtonText: 'No',
      }).then(function(result) {
        if (result.value) {

          $.ajax({
            url: "<?= site_url('ie/deleteMasterSam') ?>",
            type: "POST",
            dataType: "JSON",
            data: {
              'id_master_sam': id_master_sam
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
              masterSamTable.ajax.reload(null, false);

              swal.fire({
                icon: 'success',
                title: 'Success!',
                text: 'Data berhasil dihapus.',
                timer: 1000,
                showCancelButton: false,
                showConfirmButton: false
              }).then(function() {
                // 
              });
            }

          });
        }
      });

    });

    $("#btn_reset").click(function() {
      controlsOff();
      clearControls();
      $("#btn_create_new_master_sam").prop('disabled', false)

      $('#btn_update').remove();
      $('#btn_save_add_new').remove();
      $('#btn_group').prepend('<button class="btn btn-primary me-1" id="btn_save_add_new">Save</button>');
      $('#btn_save_add_new').prop('disabled', true)
    });
  });
</script>