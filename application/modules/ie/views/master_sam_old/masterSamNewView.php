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
            <li class="breadcrumb-item active" aria-current="page">Master SAM (Old)</li>
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
    <h6 class="mb-0 text-uppercase">Create New Master SAM (Old)</h6>
    <hr />


    <div class="card">
      <div class="card-body">
        <div class="row my-3 mx-2">
          <div class="col-lg-12">
            <div class="row mb-4 mt-3">
              <div class="col-lg-4">
                <div class="row">
                  <label for="input_style" class="col-sm-3 col-form-label">Style</label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" id="input_style" placeholder="e.g. PT5997P">
                    <div id="input_styleFeedback" class="invalid-feedback">Style tidak boleh kosong.</div>
                  </div>
                </div>
              </div>
              <div class="col-lg-1"></div>
              <div class="col-lg-4">
                <div class="row">
                  <label for="input_sam" class="col-sm-3 col-form-label">SAM</label>
                  <div class="col-sm-8">
                    <input type="number" class="form-control" id="input_sam" placeholder="e.g 15.23">
                    <div id="input_samFeedback" class="invalid-feedback">SAM tidak boleh kosong.</div>
                  </div>
                </div>
              </div>
              <div class="col-lg-2">
                <div class="row">
                  <div class="col-lg-2">
                    <button type="button" class="btn btn-primary" id="btn_save">Save</button>
                  </div>
                </div>
              </div>
            </div>

            <hr>

            <div class="row mt-4">
              <div class="col-lg-12">
                <!-- <div class="table-responsive"> -->
                <table id="masterSamTable" class="table table-striped table-bordered table-sm nowrap" style="width:100%">
                  <thead>
                    <tr>
                      <th class="text-center">No.</th>
                      <th class="text-center">Date Created</th>
                      <th class="text-center">Style</th>
                      <th class="text-center">SAM</th>
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

    $('#input_style').focus();

    // Main Table
    let masterSamTable = $('#masterSamTable').DataTable({
      // lengthChange: false,
      // buttons: ['copy', 'excel', 'pdf', 'print'],
      scrollX: true,
      destroy: true,
      ajax: {
        url: '<?= site_url('ie/ajax_list_old'); ?>',
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
          'data': 'created',
          'className': 'text-center px-2'
        },
        {
          'data': 'style',
          'className': 'text-center px-2'
        },
        {
          'data': 'sam',
          'className': 'text-center px-2'
        },
        {
          'className': 'text-center px-2',
          render: function(data, type, row) {
            return "<span class='badge text-bg-secondary text-white' id='btn_copy' style='cursor: pointer;'>Copy Style</span> <span class='badge text-bg-danger text-white' id='btn_delete' style='cursor: pointer;'>Delete</span>"
          }
        },
      ],

    });

    // Button copy
    $('#masterSamTable tbody').on('click', '#btn_copy', function() {
      let style = masterSamTable.row($(this).parents('tr')).data().style;
      $('#input_style').val(style);
      $('#input_sam').focus();

      // $('#input-sam').setProperty('--animate-duration', '2s');
    });

    // Button Delete
    $('#masterSamTable tbody').on('click', '#btn_delete', function() {
      let id_master_sam = masterSamTable.row($(this).parents('tr')).data().id_master_sam;
      let style = masterSamTable.row($(this).parents('tr')).data().style;

      swal.fire({
        icon: 'warning',
        title: 'Warning!',
        html: "Apakah anda yakin akan menghapus style " + style + " ?",
        showCancelButton: true,
        // confirmButtonColor: '#3085d6',
        // cancelButtonColor: '#d33',
        confirmButtonText: 'Yes',
        cancelButtonText: 'No',
      }).then(function(result) {
        if (result.value) {

          $.ajax({
            url: "<?= site_url('ie/delete_sam') ?>",
            type: "POST",
            dataType: "JSON",
            data: {
              'id_master_sam': id_master_sam
            },
            // beforeSend: function() {
            //   swal.fire({
            //     html: '<h5>Loading...</h5>',
            //     showConfirmButton: false,
            //     didOpen: function() {
            //       $('.swal2-html-container').prepend(sweet_loader);
            //     }
            //   });
            // },
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
                $('#input_style').val('');
                $('#input_sam').val('');
              });
            }



          });
        }
      })



    });

    // Button Save
    $('#btn_save').on('click', function() {
      let style = $('#input_style').val();
      let sam = $('#input_sam').val();

      if (style == '' || sam == '') {

        if (style == '') {
          $('#input_style').addClass('is-invalid');
          $('#input_sam').removeClass('is-invalid');
          $('#input_style').focus();
        } else if (sam == '') {
          $('#input_sam').addClass('is-invalid');
          $('#input_style').removeClass('is-invalid');
          $('#input_sam').focus();
        }
      } else {
        swal.fire({
          icon: 'warning',
          title: 'Warning!',
          html: "Apakah anda yakin akan menambahkan style " + style + " ?",
          showCancelButton: true,
          // confirmButtonColor: '#3085d6',
          // cancelButtonColor: '#d33',
          confirmButtonText: 'Yes',
          cancelButtonText: 'No',
        }).then(function(result) {
          if (result.value) {

            $.ajax({
              url: "<?= site_url('ie/add_old') ?>",
              type: "POST",
              dataType: "JSON",
              data: {
                'style': style,
                'sam': sam
              },
              // beforeSend: function() {
              //   swal.fire({
              //     html: '<h5>Loading...</h5>',
              //     showConfirmButton: false,
              //     didOpen: function() {
              //       $('.swal2-html-container').prepend(sweet_loader);
              //     }
              //   });
              // },
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
                  $('#input_style').removeClass('is-invalid');
                  $('#input_sam').removeClass('is-invalid');
                  $('#input_style').val('');
                  $('#input_sam').val('');
                });
              }



            });
          }
        })
      }
    })

  });
</script>