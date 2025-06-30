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
      <div class="breadcrumb-title pe-3">Mechanic</div>
      <div class="ps-3">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb mb-0 p-0">
            <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">Master User</li>
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
    <h6 class="mb-0 text-uppercase">Master User</h6>
    <hr />


    <div class="card">
      <div class="card-body">
        <div class="row my-3 mx-2">
          <div class="col-lg-12">
            <div class="row mb-3">
              <div class="col-lg-12">
                <div class="alert alert-info" role="alert">
                  Silahkan menghubungi "MIS Team" untuk pembuatan username.
                </div>
                <button type="button" class="btn btn-primary btn-sm" id="btn_create_new_user"><i class='bx bx-plus-circle' style="margin-top: -1.1em;"></i>Create New User</button>
              </div>
            </div>

            <div class="row">
              <div class="col-lg-12">
                <!-- <div class="table-responsive"> -->
                <table id="masterUserTable" class="table table-striped table-bordered table-sm nowrap" style="width:100%">
                  <thead>
                    <tr>
                      <th class="text-center">No.</th>
                      <th class="text-center">NIK</th>
                      <th class="text-center">FullName</th>
                      <th class="text-center">Username</th>
                      <th class="text-center">Nickname</th>
                      <th class="text-center">Position</th>
                      <th class="text-center">Shift</th>
                      <th class="text-center">Active</th>
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
<!-- Modal Create New User -->
<div class="modal fade" id="createNewUserModal" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Create New User</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="row mx-3 mt-2">

          <div class="col-lg-12">
            <div class="row g-3 align-items-center mb-3">
              <div class="col-lg-4">
                <input type="hidden" id="id" name="id">
                <label for="nik" class="col-form-label">NIK <sup style="color: red;">*</sup></label>
              </div>
              <div class="col-lg-7">
                <input type="text" id="nik" class="form-control">
              </div>
            </div>
            <div class="row g-3 align-items-center mb-3">
              <div class="col-lg-4">
                <label for="nama" class="col-form-label">Full Name <sup style="color: red;">*</sup></label>
              </div>
              <div class="col-lg-7">
                <input type="text" id="nama" class="form-control">
              </div>
            </div>
            <div class="row g-3 align-items-center mb-3">
              <div class="col-lg-4">
                <label for="inisial" class="col-form-label">Initials Name <sup style="color: red;">*</sup></label>
              </div>
              <div class="col-lg-7">
                <input type="text" id="inisial" class="form-control">
              </div>
            </div>
            <div class="row g-3 align-items-center mb-3">
              <div class="col-lg-4">
                <label for="bagian" class="col-form-label">Position <sup style="color: red;">*</sup></label>
              </div>
              <div class="col-lg-7">
                <select id="bagian" class="form-control">
                  <option hidden value>- Select Position -</option>
                  <option value="Manager">Manager</option>
                  <option value="Admin">Admin</option>
                  <option value="Head">Head</option>
                  <option value="Mekanik">Mekanik</option>
                </select>
              </div>
            </div>
            <div class="row g-3 align-items-center mb-3">
              <div class="col-lg-4">
                <label for="po_no_modal" class="col-form-label">Shift <sup style="color: red;">*</sup></label>
              </div>
              <div class="col-lg-7">
                <select id="shift" class="form-control">
                  <option hidden value>- Select Shift -</option>
                  <option value="Shift 1">Shift 1</option>
                  <option value="Shift 2">Shift 2</option>
                  <option value="Shift 3">Shift 3</option>
                </select>
              </div>
            </div>
            <!-- <div class="row g-3 align-items-center mb-3">
              <div class="col-lg-4">
                <label for="noTelp" class="col-form-label">Phone Number <sup style="color: red;">*</sup></label>
              </div>
              <div class="col-lg-7">
                <input type="text" id="noTelp" class="form-control" placeholder="e.g 085123456789">
              </div>
            </div> -->
          </div>



        </div>
      </div>
      <div class="modal-footer">
        <button type="button" id="btn_save_create_new_user" class="btn btn-primary">Save</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal Edit User -->
<div class="modal fade" id="editUserModal" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Edit User</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="row mx-3 mt-2">

          <div class="col-lg-12">
            <div class="row g-3 align-items-center mb-3">
              <div class="col-lg-4">
                <input type="hidden" id="id" name="id">
                <label for="nik_edit" class="col-form-label">NIK <sup style="color: red;">*</sup></label>
              </div>
              <div class="col-lg-7">
                <input type="text" id="nik_edit" class="form-control" disabled>
              </div>
            </div>
            <div class="row g-3 align-items-center mb-3">
              <div class="col-lg-4">
                <label for="nama_edit" class="col-form-label">Full Name <sup style="color: red;">*</sup></label>
              </div>
              <div class="col-lg-7">
                <input type="text" id="nama_edit" class="form-control">
              </div>
            </div>
            <div class="row g-3 align-items-center mb-3">
              <div class="col-lg-4">
                <label for="inisial_edit" class="col-form-label">Initials Name <sup style="color: red;">*</sup></label>
              </div>
              <div class="col-lg-7">
                <input type="text" id="inisial_edit" class="form-control">
              </div>
            </div>
            <div class="row g-3 align-items-center mb-3">
              <div class="col-lg-4">
                <label for="bagian_edit" class="col-form-label">Position <sup style="color: red;">*</sup></label>
              </div>
              <div class="col-lg-7">
                <select id="bagian_edit" class="form-control">
                  <option hidden value>- Select Position -</option>
                  <option value="Manager">Manager</option>
                  <option value="Admin">Admin</option>
                  <option value="Head">Head</option>
                  <option value="Mekanik">Mekanik</option>
                </select>
              </div>
            </div>
            <div class="row g-3 align-items-center mb-3">
              <div class="col-lg-4">
                <label for="shift_edit" class="col-form-label">Shift <sup style="color: red;">*</sup></label>
              </div>
              <div class="col-lg-7">
                <select id="shift_edit" class="form-control">
                  <option hidden value>- Select Shift -</option>
                  <option value="Shift 1">Shift 1</option>
                  <option value="Shift 2">Shift 2</option>
                  <option value="Shift 3">Shift 3</option>
                </select>
              </div>
            </div>
            <!-- <div class="row g-3 align-items-center mb-3">
              <div class="col-lg-4">
                <label for="noTelp" class="col-form-label">Phone Number <sup style="color: red;">*</sup></label>
              </div>
              <div class="col-lg-7">
                <input type="text" id="noTelp" class="form-control" placeholder="e.g 085123456789">
              </div>
            </div> -->
          </div>



        </div>
      </div>
      <div class="modal-footer">
        <button type="button" id="btn_save_edit_user" class="btn btn-primary">Save</button>
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

    // Load ORC
    // const loadOrc = () => {
    //   $('#orc').empty();
    //   $.ajax({
    //     url: " <?= site_url('sewing/get_orc'); ?>",
    //     type: 'GET',
    //     dataType: 'JSON',
    //     beforeSend: function() {
    //       $("#orc").prepend($('<option></option>').html('Loading...'));
    //     },
    //   }).done(function(data) {
    //     $('#orc').empty();
    //     $('#orc').append($('<option>', {
    //       value: "",
    //       text: "- Select ORC -"
    //     }));
    //     $.each(data, function(i, item) {
    //       $('#orc').append($('<option>', {
    //         value: item.orc,
    //         text: item.orc
    //       }));
    //     });
    //   });
    // }

    // loadOrc();

    // Main Table
    let masterUserTable = $('#masterUserTable').DataTable({
      // lengthChange: false,
      // buttons: ['copy', 'excel', 'pdf', 'print'],
      scrollX: true,
      destroy: true,
      ajax: {
        url: '<?= site_url('mechanic/getMasterUser'); ?>',
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
          'data': 'NIK',
          'className': 'text-center px-2'
        },
        {
          'data': 'Nama',
          'className': 'text-center px-2'
        },
        {
          'data': 'user_name',
          'className': 'text-center px-2'
        },
        {
          'data': 'inisial',
          'className': 'text-center px-2'
        },
        {
          'data': 'Bagian',
          'className': 'text-center px-2'
        },
        {
          'data': 'Shift',
          'className': 'text-center px-2'
        },
        {
          'className': 'text-center px-2',
          render: function(data, type, row) {
            if (row['active'] == 1) {
              return `<div class="form-switch">
                        <input class="form-check-input" type="checkbox" id="btn_active_user" value="1" checked>
                      </div>`
            } else if (row['active'] == 0) {
              return `<div class="form-switch">
                        <input class="form-check-input" type="checkbox" id="btn_active_user" value="0">
                      </div>`
            } else {
              return ""
            }
          }
        },
        {
          'className': 'text-center px-2',
          render: function(data, type, row) {
            return "<span class='badge text-bg-info text-white' id='btn_edit' style='cursor: pointer;'>Edit</span>"

          }
        },
        // {
        //   'className': 'text-center px-2',
        //   render: function(data, type, row) {
        //     return "<span class='badge text-bg-info text-white' id='btn_edit' style='cursor: pointer;'>Edit</span> <span class='badge text-bg-danger' id='btn_delete_modal' style='cursor: pointer;'>Delete</span>"

        //   }
        // },
      ],
    });

    $('#masterUserTable tbody').on('click', '#btn_active_user', function(e) {
      let id_user_mekanik = masterUserTable.row($(this).parents('tr')).data().id_user_mekanik;
      let isChecked = $(e.target).is(':checked');
      let active = (isChecked == true) ? 1 : 0;

      $.ajax({
        url: "<?= site_url('mechanic/updateUserActive'); ?>",
        type: 'POST',
        data: {
          "id_user_mekanik": id_user_mekanik,
          "active": active,
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
          if (active == 1) {
            swal.fire(
              'Success!',
              'User berhasil diaktifkan.',
              'success'
            ).then(function() {
              // newsTable.ajax.reload();
            })
          } else {
            swal.fire(
              'Success!',
              'User berhasil dinonaktifkan.',
              'success'
            ).then(function() {
              // newsTable.ajax.reload();
            })
          }

        }
      });
    });

    // Create Mechanic Member
    $('#btn_create_new_user').click(function() {
      $("#createNewUserModal").modal("show");
      $("#createNewUserModal").on("shown.bs.modal", function() {
        $('#nik').focus();
      });
    });

    $("#nik").keypress(function(e) {
      var charCode = (e.which) ? e.which : e.keyCode;
      if (charCode > 31 && (charCode < 48 || charCode > 57)) {
        return false;
      }
    });

    // Button save (Modal)
    $('#btn_save_create_new_user').click(function() {

      let nik = $('#nik').val();
      let nama = $('#nama').val();
      let inisial = $('#inisial').val();
      let bagian = $('#bagian').val();
      let shift = $('#shift').val();
      // let noTelp = $('#noTelp').val();
      if (nik != '' && nama != '' && inisial != '' && bagian != '' && shift != '') {
        swal.fire({
          icon: 'warning',
          title: 'Warning!',
          html: "Apakah anda yakin akan menambahkan user ?",
          showCancelButton: true,
          // confirmButtonColor: '#3085d6',
          // cancelButtonColor: '#d33',
          confirmButtonText: 'Yes',
          cancelButtonText: 'No',
        }).then(function(result) {
          if (result.value) {

            $.post('<?= site_url("mechanic/getCheckUser/"); ?>' + nik, function(id) {
              if (id > 0) {
                Swal.fire(
                  'Warning!',
                  'NIK sudah terdaftar.',
                  'warning'
                ).then(function() {
                  $('#nik').val("");
                });
              } else {
                $.ajax({
                  type: "POST",
                  url: "<?= site_url('mechanic/postNewUser') ?>",
                  dataType: "JSON",
                  data: {
                    'nik': nik,
                    'nama': nama,
                    'inisial': inisial,
                    'bagian': bagian,
                    'shift': shift
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
                    masterUserTable.ajax.reload(null, false);

                    swal.fire({
                      icon: 'success',
                      title: 'Success!',
                      text: 'Data berhasil disimpan.',
                      timer: 1000,
                      showCancelButton: false,
                      showConfirmButton: false
                    }).then(function() {

                      $("#createNewUserModal").modal("hide");
                    });
                  }
                });
              }

            });
          }
        })

      } else {
        swal.fire({
          icon: 'warning',
          title: 'Warning!',
          text: 'Ada form yang belum diisi.',
          // timer: 1000,
          showCancelButton: false,
          showConfirmButton: true
        });
      } // end if ''


    });



    // Edit User 
    let id_mekanik_member;
    $('#masterUserTable tbody').on('click', '#btn_edit', function(e) {
      id_mekanik_member = masterUserTable.row($(this).parents('tr')).data().id_mekanik_member;
      let nik_edit = masterUserTable.row($(this).parents('tr')).data().NIK;
      let nama_edit = masterUserTable.row($(this).parents('tr')).data().Nama;
      let inisial_edit = masterUserTable.row($(this).parents('tr')).data().inisial;
      let bagian_edit = masterUserTable.row($(this).parents('tr')).data().Bagian;
      let shift_edit = masterUserTable.row($(this).parents('tr')).data().Shift;


      $("#editUserModal").modal("show");
      $("#editUserModal").on("shown.bs.modal", function() {
        $('#nik_edit').focus();
      });

      $("#nik_edit").val(nik_edit);
      $("#nama_edit").val(nama_edit);
      $("#inisial_edit").val(inisial_edit);
      $("#bagian_edit").val(bagian_edit).change();
      $("#shift_edit").val(shift_edit).change();
    });

    $('#btn_save_edit_user').click(function() {

      let nama = $('#nama_edit').val();
      let inisial = $('#inisial_edit').val();
      let bagian = $('#bagian_edit').val();
      let shift = $('#shift_edit').val();
      // let noTelp = $('#noTelp').val();


      if (nik != '' && nama != '' && inisial != '' && bagian != '' && shift != '') {
        swal.fire({
          icon: 'warning',
          title: 'Warning!',
          html: "Apakah anda yakin akan mengedit user ?",
          showCancelButton: true,
          // confirmButtonColor: '#3085d6',
          // cancelButtonColor: '#d33',
          confirmButtonText: 'Yes',
          cancelButtonText: 'No',
        }).then(function(result) {
          if (result.value) {


            $.ajax({
              type: "POST",
              url: "<?= site_url('mechanic/updateUser') ?>",
              dataType: "JSON",
              data: {
                'id_mekanik_member': id_mekanik_member,
                'nama': nama,
                'inisial': inisial,
                'bagian': bagian,
                'shift': shift
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
                masterUserTable.ajax.reload(null, false);

                swal.fire({
                  icon: 'success',
                  title: 'Success!',
                  text: 'Data berhasil diedit.',
                  timer: 1000,
                  showCancelButton: false,
                  showConfirmButton: false
                }).then(function() {

                  $("#editUserModal").modal("hide");
                });
              }
            });

          }
        })

      } else {
        swal.fire({
          icon: 'warning',
          title: 'Warning!',
          text: 'Ada form yang belum diisi.',
          // timer: 1000,
          showCancelButton: false,
          showConfirmButton: true
        });
      } // end if ''


    });


  });
</script>