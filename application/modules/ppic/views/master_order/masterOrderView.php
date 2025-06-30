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
      <div class="breadcrumb-title pe-3">PPIC</div>
      <div class="ps-3">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb mb-0 p-0">
            <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">Master Order</li>
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
    <h6 class="mb-0 text-uppercase">Master Order</h6>
    <hr />


    <div class="card">
      <div class="card-body">
        <div class="row my-3 mx-2">
          <div class="col mb-3">
            <button type="button" class="btn btn-primary btn-sm" id="btn_create_new_order"><i class='bx bx-plus-circle' style="margin-top: -1.1em;"></i>Create New Order</button>
          </div>
          <!-- <div class="table-responsive"> -->
          <table id="masterOrderTable" class="table table-striped table-bordered table-sm nowrap" style="width:100%">
            <thead>
              <tr>
                <th>No.</th>
                <th>Created Date</th>
                <th>Style</th>
                <th>ORC</th>
                <th>Com</th>
                <th>Buyer</th>
                <th>No. Po</th>
                <th>Color</th>
                <th>Qty</th>
                <th>ETD</th>
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

<!-- Modal Create New Order -->
<div class="modal fade" id="createNewOrderModal" aria-hidden="true" style="overflow:hidden;">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Create New Order</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body" id="createNewOrderModal_body">
        <div class="row mx-3">

          <div class="col-lg-6">
            <div class="row g-3 align-items-center mb-3">
              <div class="col-lg-3">
                <label for="buyer_modal" class="col-form-label">Buyer <sup style="color: red;">*</sup></label>
              </div>
              <div class="col-lg-7">
                <input type="text" id="buyer_modal" class="form-control">
              </div>
            </div>
            <div class="row g-3 align-items-center mb-3">
              <div class="col-lg-3">
                <label for="color_modal" class="col-form-label">Color <sup style="color: red;">*</sup></label>
              </div>
              <div class="col-lg-7">
                <input type="text" id="color_modal" class="form-control">
              </div>
            </div>
            <div class="row g-3 align-items-center mb-3">
              <div class="col-lg-3">
                <label for="shipment_modal" class="col-form-label">Shipment Plan</label>
              </div>
              <div class="col-lg-7">
                <input type="date" id="shipment_modal" class="form-control">
              </div>
            </div>
            <div class="row g-3 align-items-center mb-3">
              <div class="col-lg-3">
                <label for="etd_modal" class="col-form-label">ETD <sup style="color: red;">*</sup></label>
              </div>
              <div class="col-lg-7">
                <input type="date" id="etd_modal" class="form-control">
              </div>
            </div>
            <div class="row g-3 align-items-center mb-3">
              <div class="col-lg-3">
                <label for="po_no_modal" class="col-form-label">Po Numb. <sup style="color: red;">*</sup></label>
              </div>
              <div class="col-lg-7">
                <input type="text" id="po_no_modal" class="form-control">
              </div>
            </div>
            <div class="row g-3 align-items-center mb-3">
              <div class="col-lg-3">
                <label for="orc_modal" class="col-form-label">ORC <sup style="color: red;">*</sup></label>
              </div>
              <div class="col-lg-7">
                <input type="text" id="orc_modal" class="form-control" placeholder="e.g G3-24A001A-1">
              </div>
            </div>
          </div>


          <div class="col-lg-6">
            <div class="row g-3 align-items-center mb-3">
              <div class="col-lg-3">
                <label for="style_modal" class="col-form-label">Style <sup style="color: red;">*</sup></label>
              </div>
              <div class="col-lg-7">
                <input type="text" id="style_modal" class="form-control">
              </div>
            </div>
            <div class="row g-3 align-items-center mb-3">
              <div class="col-lg-3">
                <label for="style_sam_modal" class="col-form-label">Style SAM <sup style="color: red;">*</sup></label>
              </div>
              <div class="col-lg-7">
                <select class="select2_modal_1" id="style_sam_modal"></select>
              </div>
            </div>
            <div class="row g-3 align-items-center mb-3">
              <div class="col-lg-3">
                <label for="com_modal" class="col-form-label">Com <sup style="color: red;">*</sup></label>
              </div>
              <div class="col-lg-2">
                <input type="number" id="com_modal" class="form-control" min="1">
              </div>
            </div>
            <div class="row g-3 align-items-center mb-3">
              <div class="col-lg-3">
                <label for="qty_modal" class="col-form-label">Total Qty <sup style="color: red;">*</sup></label>
              </div>
              <div class="col-lg-3">
                <input type="number" id="qty_modal" class="form-control" min="1">
              </div>
            </div>
            <div class="row g-3 align-items-center mb-3">
              <div class="col-lg-3">
                <label for="line_allocation_1_modal" class="col-form-label">Line Allocation 1</label>
              </div>
              <div class="col-lg-7">
                <select class="select2_modal_1" id="line_allocation_1_modal"></select>
              </div>
            </div>
            <div class="row g-3 align-items-center mb-3">
              <div class="col-lg-3">
                <label for="line_allocation_2_modal" class="col-form-label">Line Allocation 2</label>
              </div>
              <div class="col-lg-7">
                <select class="select2_modal_1" id="line_allocation_2_modal"></select>
              </div>
            </div>
            <div class="row g-3 align-items-center mb-3">
              <div class="col-lg-3">
                <label for="line_allocation_3_modal" class="col-form-label">Line Allocation 3</label>
              </div>
              <div class="col-lg-7">
                <select class="select2_modal_1" id="line_allocation_3_modal"></select>
              </div>
            </div>
          </div>


        </div>
      </div>
      <div class="modal-footer">
        <!-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> -->
        <button type="button" id="btn_save_create_new_order" class="btn btn-primary">Simpan</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal Edit Order -->
<div class="modal fade" id="editOrderModal" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Edit Order</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body" id="editOrderModal_body">
        <div class="row mx-3">

          <div class="col-lg-6">
            <div class="row g-3 align-items-center mb-3">
              <div class="col-lg-3">
                <label for="buyer_edit_modal" class="col-form-label">Buyer <sup style="color: red;">*</sup></label>
              </div>
              <div class="col-lg-7">
                <input type="text" id="buyer_edit_modal" class="form-control">
              </div>
            </div>
            <div class="row g-3 align-items-center mb-3">
              <div class="col-lg-3">
                <label for="color_edit_modal" class="col-form-label">Color <sup style="color: red;">*</sup></label>
              </div>
              <div class="col-lg-7">
                <input type="text" id="color_edit_modal" class="form-control">
              </div>
            </div>
            <div class="row g-3 align-items-center mb-3">
              <div class="col-lg-3">
                <label for="shipment_edit_modal" class="col-form-label">Shipment Plan</label>
              </div>
              <div class="col-lg-7">
                <input type="date" id="shipment_edit_modal" class="form-control">
              </div>
            </div>
            <div class="row g-3 align-items-center mb-3">
              <div class="col-lg-3">
                <label for="etd_edit_modal" class="col-form-label">ETD <sup style="color: red;">*</sup></label>
              </div>
              <div class="col-lg-7">
                <input type="date" id="etd_edit_modal" class="form-control">
              </div>
            </div>
            <div class="row g-3 align-items-center mb-3">
              <div class="col-lg-3">
                <label for="po_no_edit_modal" class="col-form-label">Po Numb. <sup style="color: red;">*</sup></label>
              </div>
              <div class="col-lg-7">
                <input type="text" id="po_no_edit_modal" class="form-control">
              </div>
            </div>
            <div class="row g-3 align-items-center mb-3">
              <div class="col-lg-3">
                <label for="orc_edit_modal" class="col-form-label">ORC <sup style="color: red;">*</sup></label>
              </div>
              <div class="col-lg-7">
                <input type="text" id="orc_edit_modal" class="form-control" placeholder="e.g G3-24A001A-1">
              </div>
            </div>
          </div>


          <div class="col-lg-6">
            <div class="row g-3 align-items-center mb-3">
              <div class="col-lg-3">
                <label for="style_edit_modal" class="col-form-label">Style <sup style="color: red;">*</sup></label>
              </div>
              <div class="col-lg-7">
                <input type="text" id="style_edit_modal" class="form-control">
              </div>
            </div>
            <div class="row g-3 align-items-center mb-3">
              <div class="col-lg-3">
                <label for="style_sam_edit_modal" class="col-form-label">Style SAM <sup style="color: red;">*</sup></label>
              </div>
              <div class="col-lg-7">
                <select class="select2_modal_2" id="style_sam_edit_modal"></select>
              </div>
            </div>
            <div class="row g-3 align-items-center mb-3">
              <div class="col-lg-3">
                <label for="com_edit_modal" class="col-form-label">Com <sup style="color: red;">*</sup></label>
              </div>
              <div class="col-lg-2">
                <input type="number" id="com_edit_modal" class="form-control" min="1">
              </div>
            </div>
            <div class="row g-3 align-items-center mb-3">
              <div class="col-lg-3">
                <label for="qty_edit_modal" class="col-form-label">Total Qty <sup style="color: red;">*</sup></label>
              </div>
              <div class="col-lg-3">
                <input type="number" id="qty_edit_modal" class="form-control" min="1">
              </div>
            </div>
            <div class="row g-3 align-items-center mb-3">
              <div class="col-lg-3">
                <label for="line_allocation_1_edit_modal" class="col-form-label">Line Allocation 1</label>
              </div>
              <div class="col-lg-7">
                <select class="select2_modal_2" id="line_allocation_1_edit_modal"></select>
              </div>
            </div>
            <div class="row g-3 align-items-center mb-3">
              <div class="col-lg-3">
                <label for="line_allocation_2_edit_modal" class="col-form-label">Line Allocation 2</label>
              </div>
              <div class="col-lg-7">
                <select class="select2_modal_2" id="line_allocation_2_edit_modal"></select>
              </div>
            </div>
            <div class="row g-3 align-items-center mb-3">
              <div class="col-lg-3">
                <label for="line_allocation_3_edit_modal" class="col-form-label">Line Allocation 3</label>
              </div>
              <div class="col-lg-7">
                <select class="select2_modal_2" id="line_allocation_3_edit_modal"></select>
              </div>
            </div>
          </div>


        </div>
      </div>
      <div class="modal-footer">
        <!-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> -->
        <button type="button" id="btn_save_edit_order" class="btn btn-primary">Simpan</button>
      </div>
    </div>
  </div>
</div>

<script>
  $('.select2_modal_1').select2({
    theme: 'bootstrap-5',
    width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style',
    // placeholder: $(this).data('placeholder'),
    // allowClear: Boolean($(this).data('allow-clear')),
    dropdownParent: $('#createNewOrderModal_body')
  });

  $('.select2_modal_2').select2({
    theme: 'bootstrap-5',
    width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style',
    // placeholder: $(this).data('placeholder'),
    // allowClear: Boolean($(this).data('allow-clear')),
    dropdownParent: $('#editOrderModal_body')
  });
</script>
<script>
  $(document).ready(function() {
    const sweet_loader = '<div class="sweet_loader"><svg viewBox="0 0 140 140" width="140" height="140"><g class="outline"><path d="m 70 28 a 1 1 0 0 0 0 84 a 1 1 0 0 0 0 -84" stroke="rgba(0,0,0,0.1)" stroke-width="4" fill="none" stroke-linecap="round" stroke-linejoin="round"></path></g><g class="circle"><path d="m 70 28 a 1 1 0 0 0 0 84 a 1 1 0 0 0 0 -84" stroke="#71BBFF" stroke-width="4" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-dashoffset="200" stroke-dasharray="300"></path></g></svg></div>';

    const loadStyleSam = () => {
      $('#style_sam_modal').empty();
      $.ajax({
        url: " <?= site_url('ppic/getStyleSam'); ?>",
        type: 'GET',
        dataType: 'JSON',
        beforeSend: function() {
          $("#style_sam_modal").prepend($('<option></option>').html('Loading...'));
        },
      }).done(function(data) {
        $('#style_sam_modal').empty();
        $('#style_sam_modal').append($('<option>', {
          value: "",
          text: "- Select Style SAM -"
        }));
        $.each(data, function(i, item) {
          $('#style_sam_modal').append($('<option>', {
            value: item.style,
            text: item.style
          }));
        });
      });
    }

    loadStyleSam();

    const loadStyleSamEdit = () => {
      $('#style_sam_edit_modal').empty();
      $.ajax({
        url: " <?= site_url('ppic/getStyleSam'); ?>",
        type: 'GET',
        dataType: 'JSON',
        beforeSend: function() {
          $("#style_sam_edit_modal").prepend($('<option></option>').html('Loading...'));
        },
      }).done(function(data) {
        $('#style_sam_edit_modal').empty();
        $('#style_sam_edit_modal').append($('<option>', {
          value: "",
          text: "- Select Style SAM -"
        }));
        $.each(data, function(i, item) {
          $('#style_sam_edit_modal').append($('<option>', {
            value: item.style,
            text: item.style
          }));
        });
      });
    }

    loadStyleSamEdit();


    const loadLine = () => {
      $('#line_allocation_1_modal').empty();
      $('#line_allocation_2_modal').empty();
      $('#line_allocation_3_modal').empty();
      $.ajax({
        url: " <?= site_url('ppic/getLine'); ?>",
        type: 'GET',
        dataType: 'JSON',
        beforeSend: function() {
          $("#line_allocation_1_modal").prepend($(' <option > < /option>').html('Loading...'));
          $("#line_allocation_2_modal").prepend($('<option></option>').html('Loading...'));
          $("#line_allocation_3_modal").prepend($('<option></option>').html('Loading...'));
        },
      }).done(function(data) {
        $('#line_allocation_1_modal').empty();
        $('#line_allocation_2_modal').empty();
        $('#line_allocation_3_modal').empty();

        $('#line_allocation_1_modal').append($('<option>', {
          value: "",
          text: "- Select Line -"
        }));
        $('#line_allocation_2_modal').append($('<option> ', {
          value: "",
          text: "- Select Line -"
        }));
        $('#line_allocation_3_modal').append($(' <option > ', {
          value: "",
          text: "- Select Line -"
        }));

        $.each(data, function(i, item) {
          $('#line_allocation_1_modal').append($(' <option > ', {
            value: item.name,
            text: item.name
          }));
        });
        $.each(data, function(i, item) {
          $('#line_allocation_2_modal').append($(' <option > ', {
            value: item.name,
            text: item.name
          }));
        });
        $.each(data, function(i, item) {
          $('#line_allocation_3_modal').append($(' <option > ', {
            value: item.name,
            text: item.name
          }));
        });
      });
    }

    loadLine();

    const loadLineEdit = () => {
      $('#line_allocation_1_edit_modal').empty();
      $('#line_allocation_2_edit_modal').empty();
      $('#line_allocation_3_edit_modal').empty();
      $.ajax({
        url: " <?= site_url('ppic/getLine'); ?>",
        type: 'GET',
        dataType: 'JSON',
        beforeSend: function() {
          $("#line_allocation_1_edit_modal").prepend($(' <option > < /option>').html('Loading...'));
          $("#line_allocation_2_edit_modal").prepend($('<option></option>').html('Loading...'));
          $("#line_allocation_3_edit_modal").prepend($('<option></option>').html('Loading...'));
        },
      }).done(function(data) {
        $('#line_allocation_1_edit_modal').empty();
        $('#line_allocation_2_edit_modal').empty();
        $('#line_allocation_3_edit_modal').empty();

        $('#line_allocation_1_edit_modal').append($('<option>', {
          value: "",
          text: "- Select Line -"
        }));
        $('#line_allocation_2_edit_modal').append($('<option> ', {
          value: "",
          text: "- Select Line -"
        }));
        $('#line_allocation_3_edit_modal').append($(' <option > ', {
          value: "",
          text: "- Select Line -"
        }));

        $.each(data, function(i, item) {
          $('#line_allocation_1_edit_modal').append($(' <option > ', {
            value: item.name,
            text: item.name
          }));
        });
        $.each(data, function(i, item) {
          $('#line_allocation_2_edit_modal').append($(' <option > ', {
            value: item.name,
            text: item.name
          }));
        });
        $.each(data, function(i, item) {
          $('#line_allocation_3_edit_modal').append($(' <option > ', {
            value: item.name,
            text: item.name
          }));
        });
      });
    }

    loadLineEdit();



    let masterOrderTable = $('#masterOrderTable').DataTable({
      // lengthChange: false,
      // buttons: ['copy', 'excel', 'pdf', 'print'],
      scrollX: true,
      ajax: {
        url: '<?= site_url("ppic/getMasterOrder"); ?>',
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
          'data': 'style',
          'className': 'text-center px-3'
        },
        {
          'data': 'orc',
          'className': 'text-center px-3'
        },
        {
          'data': 'comm',
          'className': 'text-center px-3'
        },
        {
          'data': 'buyer',
          'className': 'text-center px-3'
        },
        {
          'data': 'po_no',
          'className': 'text-center px-3'
        },
        {
          'data': 'color',
          'className': 'text-center px-3'
        },
        {
          'data': 'qty',
          'className': 'text-center px-3'
        },
        {
          'data': 'etd',
          'className': 'text-center px-3'
        },
        {
          'className': 'text-center px-3',
          render: function(data, type, row) {
            return '<span class="badge text-bg-info text-white" style="cursor: pointer;" id="btn_edit">Edit</span> <span class="badge text-bg-danger" style="cursor: pointer;" id="btn_delete">Delete</span>'
          }
        },

      ],

    });


    $("#btn_create_new_order").click(function() {
      $("#createNewOrderModal").modal("show");
    });

    // Button save (Modal)
    $('#btn_save_create_new_order').click(function() {

      let buyer = $('#buyer_modal').val();
      let color = $('#color_modal').val();
      let shipment = $('#shipment_modal').val();
      let etd = $('#etd_modal').val();
      let po_no = $('#po_no_modal').val();
      let orc = $('#orc_modal').val();
      let style = $('#style_modal').val();
      let style_sam = $('#style_sam_modal').val();
      let com = $('#com_modal').val();
      let qty = $('#qty_modal').val();
      let line_allocation_1 = $('#line_allocation_1_modal').val();
      let line_allocation_2 = $('#line_allocation_2_modal').val();
      let line_allocation_3 = $('#line_allocation_3_modal').val();

      if (buyer != '' && color != '' && etd != '' && po_no != '' && orc != '' && style != '' && style_sam != '' && com != '' && qty != '') {
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
              url: "<?= site_url('ppic/postNewOrder') ?>",
              dataType: "JSON",
              data: {
                'buyer': buyer,
                'color': color,
                'shipment': shipment,
                'etd': etd,
                'po_no': po_no,
                'orc': orc,
                'style': style,
                'style_sam': style_sam,
                'com': com,
                'qty': qty,
                'line_allocation_1': line_allocation_1,
                'line_allocation_2': line_allocation_2,
                'line_allocation_3': line_allocation_3,
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
                masterOrderTable.ajax.reload(null, false);

                swal.fire({
                  icon: 'success',
                  title: 'Success!',
                  text: 'Data berhasil disimpan.',
                  timer: 1000,
                  showCancelButton: false,
                  showConfirmButton: false
                }).then(function() {

                  $("#createNewOrderModal").modal("hide");
                });
              }
            });
          }

        });


      } else {
        swal.fire({
          icon: 'warning',
          title: 'Warning!',
          text: 'Ada form yang belum diisi.',
          // timer: 1000,
          showCancelButton: false,
          showConfirmButton: true
        });
      }


    });

    // Button delete
    $('#masterOrderTable tbody').on('click', '#btn_delete', function() {
      let id_order = masterOrderTable.row($(this).parents('tr')).data().id_order;
      let orc = masterOrderTable.row($(this).parents('tr')).data().orc;

      swal.fire({
        icon: 'warning',
        title: 'Warning!',
        html: "Apakah anda yakin akan menghapus ORC " + orc + " ?",
        showCancelButton: true,
        // confirmButtonColor: '#3085d6',
        // cancelButtonColor: '#d33',
        confirmButtonText: 'Ya',
        cancelButtonText: 'Batal',
      }).then(function(result) {
        if (result.value) {

          $.ajax({
            type: "POST",
            url: "<?= site_url('ppic/deleteMasterOrder') ?>",
            dataType: "JSON",
            data: {
              'id_order': id_order
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
              masterOrderTable.ajax.reload(null, false);
              swal.fire({
                icon: 'success',
                title: 'Success!',
                text: 'Data berhasil dihapus.',
                timer: 1000,
                showCancelButton: false,
                showConfirmButton: false
              }).then(function() {});
            }
          });


        }


      });
    });

    // Button Edit
    let id_order;
    $('#masterOrderTable tbody').on('click', '#btn_edit', function() {
      id_order = masterOrderTable.row($(this).parents('tr')).data().id_order;
      let buyer = masterOrderTable.row($(this).parents('tr')).data().buyer;
      let color = masterOrderTable.row($(this).parents('tr')).data().color;
      let shipment = masterOrderTable.row($(this).parents('tr')).data().plan_export;
      let etd = masterOrderTable.row($(this).parents('tr')).data().etd;
      let po_no = masterOrderTable.row($(this).parents('tr')).data().po_no;
      let orc = masterOrderTable.row($(this).parents('tr')).data().orc;
      let style = masterOrderTable.row($(this).parents('tr')).data().style;
      let style_sam = masterOrderTable.row($(this).parents('tr')).data().style_sam;
      let com = masterOrderTable.row($(this).parents('tr')).data().comm;
      let qty = masterOrderTable.row($(this).parents('tr')).data().qty;
      let line_allocation_1 = masterOrderTable.row($(this).parents('tr')).data().line_allocation1;
      let line_allocation_2 = masterOrderTable.row($(this).parents('tr')).data().line_allocation2;
      let line_allocation_3 = masterOrderTable.row($(this).parents('tr')).data().line_allocation3;


      $("#buyer_edit_modal").val(buyer);
      $("#color_edit_modal").val(color);
      $("#shipment_edit_modal").val(shipment);
      $("#etd_edit_modal").val(etd);
      $("#po_no_edit_modal").val(po_no);
      $("#orc_edit_modal").val(orc);
      $("#style_edit_modal").val(style);
      $("#style_sam_edit_modal").val(style_sam).change();
      // $("#style_sam_edit_modal option[value='" + style_sam + "']").prop("selected", true);
      $("#com_edit_modal").val(com);
      $("#qty_edit_modal").val(qty);
      $("#line_allocation_1_edit_modal").val(line_allocation_1).change();
      $("#line_allocation_2_edit_modal").val(line_allocation_2).change();
      $("#line_allocation_3_edit_modal").val(line_allocation_3).change();
      // $("#line_allocation_1_edit_modal option[value='" + line_allocation_1 + "']").prop("selected", true);
      // $("#line_allocation_2_edit_modal option[value='" + line_allocation_2 + "']").prop("selected", true);
      // $("#line_allocation_3_edit_modal option[value='" + line_allocation_3 + "']").prop("selected", true);




      $("#editOrderModal").modal("show");


    });

    // Button edit (Modal)
    $('#btn_save_edit_order').click(function() {

      let buyer = $('#buyer_edit_modal').val();
      let color = $('#color_edit_modal').val();
      let shipment = $('#shipment_edit_modal').val();
      let etd = $('#etd_edit_modal').val();
      let po_no = $('#po_no_edit_modal').val();
      let orc = $('#orc_edit_modal').val();
      let style = $('#style_edit_modal').val();
      let style_sam = $('#style_sam_edit_modal').val();
      let com = $('#com_edit_modal').val();
      let qty = $('#qty_edit_modal').val();
      let line_allocation_1 = $('#line_allocation_1_edit_modal').val();
      let line_allocation_2 = $('#line_allocation_2_edit_modal').val();
      let line_allocation_3 = $('#line_allocation_3_edit_modal').val();

      if (buyer != '' && color != '' && etd != '' && po_no != '' && orc != '' && style != '' && style_sam != '' && com != '' && qty != '') {
        swal.fire({
          icon: 'warning',
          title: 'Warning!',
          html: "Apakah anda yakin akan mengedit data ini ?",
          showCancelButton: true,
          // confirmButtonColor: '#3085d6',
          // cancelButtonColor: '#d33',
          confirmButtonText: 'Yes',
          cancelButtonText: 'No',
        }).then(function(result) {
          if (result.value) {

            $.ajax({
              type: "POST",
              url: "<?= site_url('ppic/updateOrder') ?>",
              dataType: "JSON",
              data: {
                'id_order': id_order,
                'buyer': buyer,
                'color': color,
                'shipment': shipment,
                'etd': etd,
                'po_no': po_no,
                'orc': orc,
                'style': style,
                'style_sam': style_sam,
                'com': com,
                'qty': qty,
                'line_allocation_1': line_allocation_1,
                'line_allocation_2': line_allocation_2,
                'line_allocation_3': line_allocation_3,
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
                masterOrderTable.ajax.reload(null, false);

                swal.fire({
                  icon: 'success',
                  title: 'Success!',
                  text: 'Data berhasil disimpan.',
                  timer: 1000,
                  showCancelButton: false,
                  showConfirmButton: false
                }).then(function() {

                  $("#editOrderModal").modal("hide");
                });
              }
            });
          }

        });


      } else {
        swal.fire({
          icon: 'warning',
          title: 'Warning!',
          text: 'Ada form yang belum diisi.',
          // timer: 1000,
          showCancelButton: false,
          showConfirmButton: true
        });
      }


    });


  });
</script>