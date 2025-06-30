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
      <div class="breadcrumb-title pe-3">Master</div>
      <div class="ps-3">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb mb-0 p-0">
            <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">Master Quote</li>
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
    <h6 class="mb-0 text-uppercase">Master Quote</h6>
    <hr />


    <div class="card">
      <div class="card-body">
        <div class="row my-3 mx-2">
          <div class="col mb-3">


            <div class="accordion" id="accordionExample">
              <div class="accordion-item" style="border: 0px;">
                <h2 class="accordion-header" id="headingOne">
                  <button class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne" id="btn_create_quote">
                    <i class='bx bx-plus-circle'></i> Create Quote
                  </button>
                </h2>
                <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                  <div class="accordion-body">
                    <div class="row">

                      <div class="col-lg-12">
                        <div class="row g-3 mb-3">
                          <div class="col-lg-1">
                            <label for="quote" class="col-form-label">Quote</label>
                          </div>
                          <div class="col-lg-8">
                            <textarea class="form-control" id="quotes" style="height: 60px"></textarea>
                          </div>
                        </div>
                        <div class="row g-3 mb-3">
                          <div class="col-lg-1">
                            <label for="author" class="col-form-label">Author</label>
                          </div>
                          <div class="col-lg-2">
                            <input type="text" class="form-control" id="author" placeholder="e.g Aristoteles">
                            <div class="form-text" style="color: lightgrey;">
                              (optional)
                            </div>
                          </div>
                        </div>
                        <div class="row g-3 mb-3">
                          <div class="col-lg-1">
                          </div>
                          <div class="col-lg-8">
                            <button class="btn btn-primary" id="btn_save">Save</button>
                            <button class="btn btn-outline-secondary" id="btn_reset">Reset</button>
                          </div>
                        </div>
                      </div>

                    </div>
                  </div>
                </div>
              </div>

            </div>


          </div>
          <!-- <div class="table-responsive"> -->
          <table id="masterQuoteTable" class="table table-striped table-bordered table-sm nowrap" style="width:100%">
            <thead>
              <tr>
                <th>No.</th>
                <th>Create Date</th>
                <th class="text-center">Quote</th>
                <th>Author</th>
                <th>Active</th>
                <th>Action</th>
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
<!-- Modal Edit Order -->
<div class="modal fade" id="editQuoteModal" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Edit Quote</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="row mx-3">

          <div class="col-lg-12 mt-3 mb-2">
            <div class="row g-3 mb-3">
              <div class="col-lg-1">
                <label for="quote_edit_modal" class="col-form-label">Quote</label>
              </div>
              <div class="col-lg-10">
                <textarea class="form-control" id="quote_edit_modal" style="height: 60px"></textarea>
              </div>
            </div>
            <div class="row g-3 mb-3">
              <div class="col-lg-1">
                <label for="author_edit_modal" class="col-form-label">Author</label>
              </div>
              <div class="col-lg-3">
                <input type="text" class="form-control" id="author_edit_modal" placeholder="e.g Socrates">
                <div class="form-text" style="color: lightgrey;">
                  (optional)
                </div>
              </div>
            </div>


          </div>
        </div>
        <div class="modal-footer">
          <!-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> -->
          <button type="button" id="btn_save_edit_quote" class="btn btn-primary">Save changes</button>
        </div>
      </div>
    </div>
  </div>
</div>



<script>
  $('.select2').select2({
    theme: 'bootstrap-5',
    width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style',
    // placeholder: $(this).data('placeholder'),
    // allowClear: Boolean($(this).data('allow-clear')),
    // dropdownParent: $('#createNewOrderModal_body')
  });
</script>
<script>
  $(document).ready(function() {
    const sweet_loader = '<div class="sweet_loader"><svg viewBox="0 0 140 140" width="140" height="140"><g class="outline"><path d="m 70 28 a 1 1 0 0 0 0 84 a 1 1 0 0 0 0 -84" stroke="rgba(0,0,0,0.1)" stroke-width="4" fill="none" stroke-linecap="round" stroke-linejoin="round"></path></g><g class="circle"><path d="m 70 28 a 1 1 0 0 0 0 84 a 1 1 0 0 0 0 -84" stroke="#71BBFF" stroke-width="4" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-dashoffset="200" stroke-dasharray="300"></path></g></svg></div>';


    let masterQuoteTable = $('#masterQuoteTable').DataTable({
      // lengthChange: false,
      // buttons: ['copy', 'excel', 'pdf', 'print'],
      scrollX: true,
      ajax: {
        url: '<?= site_url("admin/getMasterQuote"); ?>',
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
          'data': 'created_date',
          'className': 'text-center px-3'
        },
        {
          'data': 'quote',
          'className': 'px-3'
        },
        {
          'data': 'author',
          'className': 'text-center px-3'
        },
        {
          'className': 'text-center px-3',
          render: function(data, type, row) {
            if (row['active'] == 1) {
              return "<div class='form-check form-switch' style='padding-left: 45px'><input class='form-check-input' id='btn_active' type='checkbox' role='switch' checked></div>"
            } else {
              return "<div class='form-check form-switch' style='padding-left: 45px'><input class='form-check-input' id='btn_active' type='checkbox' role='switch'></div>"
            }
          }
        },
        {
          'className': 'text-center px-3',
          render: function(data, type, row) {
            return '<span class="badge text-bg-info text-white" style="cursor: pointer;" id="btn_edit">Edit</span> <span class="badge text-bg-danger" style="cursor: pointer;" id="btn_delete">Delete</span>'
          }
        },

      ],

    });



    // Button save
    $('#btn_save').click(function() {

      let quote = $('#quotes').val();
      let author = $('#author').val();

      $('#btn_save').prop('disabled', true);
      $('#btn_save').html('Saving..');

      if (quote !== '') {

        $.ajax({
          type: "POST",
          url: "<?= site_url('admin/postQuote') ?>",
          dataType: "JSON",
          data: {
            'quote': quote,
            'author': author
          },
          success: function(data) {
            masterQuoteTable.ajax.reload(null, false);

            swal.fire({
              icon: 'success',
              title: 'Success!',
              text: 'Data saved successfully.',
              timer: 1000,
              showCancelButton: false,
              showConfirmButton: false
            }).then(function() {
              $('#btn_save').prop('disabled', false);
              $('#btn_save').html('Save');
              $('#quotes').val('');
              $('#quotes').focus();
              $('#author').val('');
            });
          }
        });

      } else {
        swal.fire({
          icon: 'warning',
          title: 'Warning!',
          text: 'Please fill the form.',
          // timer: 1000,
          showCancelButton: false,
          showConfirmButton: true
        }).then(function() {
          $('#btn_save').prop('disabled', false);
          $('#btn_save').html('Save');
        });
      }


    });

    $('#btn_reset').click(function() {
      $('#quotes').val("");
      $('#quotes').focus();
      $('#author').val("");
    })


    $('#masterQuoteTable tbody').on('click', '#btn_active', function(e) {
      let id_quote = masterQuoteTable.row($(this).parents('tr')).data().id;
      let isChecked = $(e.target).is(':checked');
      let active = (isChecked == true) ? 1 : 0;


      $.ajax({
        url: "<?= site_url('admin/updateActiveQuote'); ?>",
        type: 'POST',
        data: {
          "id_quote": id_quote,
          "active": active,
        },
        // beforeSend: function() {
        //   swal.fire({
        //     html: '<h5>Loading...</h5>',
        //     showConfirmButton: false,
        //     didRender: function() {
        //       $('.swal2-html-container').prepend(sweet_loader);
        //     }
        //   });
        // },
        success: function(data) {
          if (active == 1) {
            swal.fire(
              'Success!',
              'Quote displayed.',
              'success'
            ).then(function() {
              // masterQuoteTable.ajax.reload();
            })
          } else {
            swal.fire(
              'Success!',
              'Quote not displayed.',
              'success'
            ).then(function() {
              // masterQuoteTable.ajax.reload();
            })
          }

        }
      });


    });


    let id_quote;
    $('#masterQuoteTable tbody').on('click', '#btn_edit', function() {
      id_quote = masterQuoteTable.row($(this).parents('tr')).data().id;

      let quote = masterQuoteTable.row($(this).parents('tr')).data().quote;
      let author = masterQuoteTable.row($(this).parents('tr')).data().author;


      $("#quote_edit_modal").val(quote);
      $("#author_edit_modal").val(author);

      $("#editQuoteModal").modal("show");

    });

    // Button edit (Modal)
    $('#btn_save_edit_quote').click(function() {

      let quote = $('#quote_edit_modal').val();
      let author = $('#author_edit_modal').val();

      if (quote != '') {
        swal.fire({
          icon: 'warning',
          title: 'Warning!',
          html: "Are you sure you want to edit this quote ?",
          showCancelButton: true,
          // confirmButtonColor: '#3085d6',
          // cancelButtonColor: '#d33',
          confirmButtonText: 'Yes',
          cancelButtonText: 'No',
        }).then(function(result) {
          if (result.value) {

            $.ajax({
              type: "POST",
              url: "<?= site_url('admin/updateQuote') ?>",
              dataType: "JSON",
              data: {
                'id_quote': id_quote,
                'quote': quote,
                'author': author
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
                masterQuoteTable.ajax.reload(null, false);

                swal.fire({
                  icon: 'success',
                  title: 'Success!',
                  text: 'Quote updated successfully.',
                  timer: 1000,
                  showCancelButton: false,
                  showConfirmButton: false
                }).then(function() {
                  $("#quote_edit_modal").val("");
                  $("#author_edit_modal").val("");

                  $("#editQuoteModal").modal("hide");
                });
              }
            });
          }

        });


      } else {
        swal.fire({
          icon: 'warning',
          title: 'Warning!',
          text: 'Quote form required.',
          // timer: 1000,
          showCancelButton: false,
          showConfirmButton: true
        });
      }


    });



    // Button delete
    $('#masterQuoteTable tbody').on('click', '#btn_delete', function() {
      let id_quote = masterQuoteTable.row($(this).parents('tr')).data().id;

      swal.fire({
        icon: 'warning',
        title: 'Warning!',
        html: "Are you sure you want to delete this quote ?",
        showCancelButton: true,
        // confirmButtonColor: '#3085d6',
        // cancelButtonColor: '#d33',
        confirmButtonText: 'Yes',
        cancelButtonText: 'No',
      }).then(function(result) {
        if (result.value) {

          $.ajax({
            type: "POST",
            url: "<?= site_url('admin/deleteQuote') ?>",
            dataType: "JSON",
            data: {
              'id_quote': id_quote
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
              masterQuoteTable.ajax.reload(null, false);
              swal.fire({
                icon: 'success',
                title: 'Success!',
                text: 'Data deleted successfully.',
                timer: 1000,
                showCancelButton: false,
                showConfirmButton: false
              });
            }
          });


        }


      });
    });





  });
</script>