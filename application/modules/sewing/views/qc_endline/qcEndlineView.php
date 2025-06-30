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
      <li class="breadcrumb-item active" aria-current="page">QC Endline</li>
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
  <h6 class="mb-0 text-uppercase">QC Endline</h6>
  <hr />


  <div class="card">
   <div class="card-body">
    <div class="row my-3 mx-2">
     <div class="col-lg-12">
      <div class="row">
       <div class="col-lg-6">
        <div class="row g-3 align-items-center mb-3">
         <div class="col-lg-3">
          <label for="barcode" class="col-form-label">Barcode <sup style="color: red;">*</sup></label>
         </div>
         <div class="col-lg-5">
          <input type="text" id="barcode" class="form-control" placeholder="Scan barcode here..">
         </div>
         <div class="col-lg-2">
          <button class="btn btn-outline-secondary" id="btn_reset">Reset</button>
         </div>
        </div>
        <div class="row g-3 align-items-center mb-3">
         <div class="col-lg-3">
          <label for="orc" class="col-form-label">ORC</label>
         </div>
         <div class="col-lg-7">
          <label id="orc" class="col-form-label">: -</label>
          <input type="hidden" id="orc_hidden">
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
          <label for="no_po" class="col-form-label">PO</label>
         </div>
         <div class="col-lg-7">
          <label id="no_po" class="col-form-label">: -</label>
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
       </div>




       <div class="col-lg-6">
        <!-- <div class="row g-3 align-items-center mb-3 mt-4">
              <div class="col-lg-3">
                <label for="defect" class="col-form-label">Defect <sup style="color: red;">*</sup></label>
              </div>
              <div class="col-lg-7">
                <select id="defect" class="form-control select2_1" style="width: 100%;" disabled></select>
              </div>
            </div>
            <div class="row g-3 align-items-center mb-3">
              <div class="col-lg-3">
                <label for="qty_defect" class="col-form-label">Qty Defect <sup style="color: red;">*</sup></label>
              </div>
              <div class="col-lg-2">
                <input type="text" id="qty_defect" class="form-control text-center" placeholder="0" min="0">
              </div>
            </div> -->
        <div class="row g-3 mb-3">
         <div class="col-lg-2">
          <label for="defect" class="col-form-label">Defect <sup style="color: red;">*</sup></label>
         </div>
         <div class="col-lg-9" id="defect_row">
          <div class="row mb-3">
           <div class="col-lg-6">
            <select id="defect_1" class="form-control select2_1 defect" disabled></select>
           </div>
           <div class="col-lg-3">
            <input type="text" class="form-control text-center qty_defect" min="1" placeholder="0" disabled>
           </div>
           <div class="col-lg-3">
            <button class="btn btn-primary btn_add_row_defect" disabled><i class='bx bx-plus-circle ms-1'></i></button>
           </div>
          </div>

         </div>
        </div>


        <input type="hidden" id="line" value="<?= $this->session->userdata('username') ?>">
        <div class="row g-3 align-items-center mb-3">
         <div class="col-lg-2"></div>
         <div class="col-lg-7">
          <button class="btn btn-primary" id="btn_save" disabled>Save</button>
         </div>
        </div>
       </div>
      </div>
     </div>

     <div class="row mb-3 mt-4">
      <div class="col-lg-12">
       <button class="btn btn-info btn-sm me-1" id="btn_daily" disabled>Daily</button>
       <button class="btn btn-outline-info btn-sm me-1" id="btn_yesterday">Yesterday</button>
       <button class="btn btn-outline-info btn-sm me-1" id="btn_monthly">Monthly</button>
       <button class="btn btn-outline-info btn-sm " id="btn_show_all">Show All</button>
      </div>
     </div>

     <div class="row">
      <div class="col-lg-12">
       <!-- <div class="table-responsive"> -->
       <table id="qcEndlineTable" class="table table-striped table-bordered table-sm nowrap" style="width:100%">
        <thead>
         <tr>
          <th>No.</th>
          <th>Created Date</th>
          <th>ORC</th>
          <th>Defect Code</th>
          <th>Defect Desc</th>
          <th>Qty Defect</th>
         </tr>
        </thead>
        <tfoot>
         <tr>
          <th colspan="5">Total Defect</th>
          <th></th>
         </tr>
        </tfoot>
       </table>
       <!-- </div> -->
      </div>
     </div>

     <div class="row mt-4">
      <div class="col-lg-12">
       <!-- <div class="table-responsive"> -->
       <table id="percentageQcEndlineTable" class="table table-striped table-bordered table-sm nowrap" style="width:100%">
        <thead>
         <tr>
          <th>No.</th>
          <th>ORC</th>
          <th style="background-color: #22c55e;">Qty Pass</th>
          <th style="background-color: #ef4444;">Qty Defect</th>
          <th>Qty Checked</th>
          <th>Percentage Defect ( % )</th>
         </tr>
        </thead>
        <tfoot>
         <th colspan="2"></th>
         <th></th>
         <th></th>
         <th></th>
         <th></th>
        </tfoot>
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

  // Load defect
  const loadDefect = () => {
   $('#defect_1').empty();
   $.ajax({
    url: " <?= site_url('sewing/getDefectMaster'); ?>",
    type: 'GET',
    dataType: 'JSON',
    beforeSend: function() {
     $("#defect_1").prepend($('<option></option>').html('Loading...'));
    },
   }).done(function(data) {
    $('#defect_1').empty();
    $('#defect_1').append($('<option>', {
     value: "",
     text: "- Select Defect -"
    }));
    $.each(data, function(i, item) {
     $('#defect_1').append($('<option>', {
      value: item.id_df,
      text: item.DCode + ' | ' + item.Defect
     }));
    });
   });
  }

  loadDefect();

  const resetAll = () => {
   $("#barcode").val('').prop('disabled', false);
   $("#defect").val(null).trigger('change')
   $('#qty_defect').val(1);

   $('#orc').html(': -');
   $('#style').html(': -');
   $('#no_po').html(': -');;
   $('#color').html(': -');

   $('#defect').prop('disabled', true);
   $('#qty_defect').prop('disabled', true);

   $('#btn_save').prop('disabled', true);

   $('#barcode').focus();

   $('#defect_1').val(null).trigger('change');
   $('#defect_1').prop('disabled', true)
   $('.qty_defect').val('')
   $('.qty_defect').prop('disabled', true)
   $('.btn_add_row_defect').prop('disabled', true)
   $('.added_row').remove();
  }

  // Main Table
  let qcEndlineTable = $('#qcEndlineTable').DataTable({
   // lengthChange: false,
   // buttons: ['copy', 'excel', 'pdf', 'print'],
   scrollX: true,
   destroy: true,
   ajax: {
    url: '<?= site_url('sewing/getQcEndlineDefectDaily'); ?>',
    type: 'GET'
   },
   columns: [{
     "data": null,
     "orderable": true,
     "searchable": true,
     'className': 'text-center px-4',
     "width": "50px",
     "render": function(data, type, row, meta) {
      return meta.row + meta.settings._iDisplayStart + 1;
     }
    },
    {
     'data': 'created_date',
     'className': 'text-center px-2'
    },
    {
     'data': 'orc',
     'className': 'text-center px-2'
    },
    {
     'data': 'DCode',
     'className': 'text-center px-2'
    },
    {
     'data': 'Defect',
     'className': 'text-center px-2'
    },
    {
     'data': 'qty_defect',
     'className': 'text-center px-2'
    },
    // {
    //   'className': 'text-center',
    //   render: function(data, type, row) {
    //     return "<span class='badge badge-danger mx-3' id='btn_delete' style='cursor: pointer;'>Delete</span>"
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
     .column(5)
     .data()
     .reduce((a, b) => intVal(a) + intVal(b), 0);

    // Total over this page
    pageTotal = api
     .column(5, {
      page: 'current'
     })
     .data()
     .reduce((a, b) => intVal(a) + intVal(b), 0);

    // Update footer
    api.column(5).footer().innerHTML =
     pageTotal + ' ( ' + total + ' )';

    // Update footer
    // api.column(6).footer().innerHTML =
    //   total
   }

  });

  // Main Table
  let percentageQcEndlineTable = $('#percentageQcEndlineTable').DataTable({
   // lengthChange: false,
   // buttons: ['copy', 'excel', 'pdf', 'print'],
   scrollX: true,
   destroy: true,
   ajax: {
    url: '<?= site_url('sewing/getPercentageQcEndlineDaily'); ?>',
    type: 'GET'
   },
   columns: [{
     "data": null,
     "orderable": true,
     "searchable": true,
     'className': 'text-center px-4',
     "width": "50px",
     "render": function(data, type, row, meta) {
      return meta.row + meta.settings._iDisplayStart + 1;
     }
    },
    {
     'data': 'orc',
     'className': 'text-center px-2'
    },
    {
     'data': 'total_qty_pass',
     'className': 'text-center px-2'
    },
    {
     'data': 'total_qty_defect',
     'className': 'text-center px-2'
    },
    {
     'data': 'total_qty_check',
     'className': 'text-center px-2'
    },
    {
     'className': 'text-center',
     render: function(data, type, row) {
      if (row['percentage_defect'] !== null) {
       return row['percentage_defect'] + " %";
      } else {
       return "";
      }

     }
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
     .column(2)
     .data()
     .reduce((a, b) => intVal(a) + intVal(b), 0);

    // Total over this page
    pageTotal = api
     .column(2, {
      page: 'current'
     })
     .data()
     .reduce((a, b) => intVal(a) + intVal(b), 0);

    // Update footer
    api.column(2).footer().innerHTML =
     pageTotal + ' ( ' + total + ' )';





    // Total over all pages
    total = api
     .column(3)
     .data()
     .reduce((a, b) => intVal(a) + intVal(b), 0);

    // Total over this page
    pageTotal = api
     .column(3, {
      page: 'current'
     })
     .data()
     .reduce((a, b) => intVal(a) + intVal(b), 0);

    // Update footer
    api.column(3).footer().innerHTML =
     pageTotal + ' ( ' + total + ' )';





    // Total over all pages
    total = api
     .column(4)
     .data()
     .reduce((a, b) => intVal(a) + intVal(b), 0);

    // Total over this page
    pageTotal = api
     .column(4, {
      page: 'current'
     })
     .data()
     .reduce((a, b) => intVal(a) + intVal(b), 0);

    // Update footer
    api.column(4).footer().innerHTML =
     pageTotal + ' ( ' + total + ' )';


   }

  });

  // Scan Barcode
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
      url: " <?= site_url('sewing/getBarcodeDetails'); ?>",
      type: 'GET',
      dataType: 'JSON',
      data: {
       'kode_barcode': kode_barcode
      },
      beforeSend: function() {
       $("#orc").html(': Loading...');
       $("#style").html(': Loading...');
       $("#no_po").html(': Loading...');
       $("#color").html(': Loading...');
      },
     }).done(function(data) {
      $('#orc').html(': -');
      $('#style').html(': -');
      $('#no_po').html(': -');
      $('#color').html(': -');

      // console.log(data)
      if (data.length != 0) {
       $('#orc').html(': ' + data[0].orc);
       $('#orc_hidden').val(data[0].orc);
       $('#style').html(': ' + data[0].style);
       $('#no_po').html(': ' + data[0].no_po);
       $('#color').html(': ' + data[0].color);
       // $('#qty_bundle').val(data[0].qty_pcs);

       // $('#qty_pass').val(data[0].qty_pcs - $('#qty_defect').val());

       $('.defect').prop('disabled', false);
       $('.qty_defect').prop('disabled', false);
       $('.btn_add_row_defect').prop('disabled', false);

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
        $("#defect").val(null).trigger('change')
        $('#qty_defect').val(1);

        $('#orc').html(': -');
        $('#style').html(': -');
        $('#no_po').html(': -');;
        $('#color').html(': -');

        $('#defect').prop('disabled', true);
        $('#qty_defect').prop('disabled', true);

        $('#btn_save').prop('disabled', true);

        $('#barcode').focus();

       });
      }



     });
    }
    return false;
   }

  });


  $('.qty_defect').keypress(function(e) {
   let charCode = (e.which) ? e.which : e.keyCode;
   if (charCode > 31 && (charCode < 48 || charCode > 57)) {
    return false;
   }
  });

  let i = 2;
  let j = 2;
  let k;
  $('.btn_add_row_defect').click(function() {
   $('#defect_row').append(`<div class="row mb-3 added_row">
                              <div class="col-lg-6">
                                <select id='defect_${i}' class="select2_1 defect" ></select>
                              </div>
                              <div class="col-lg-3">
                                <input type="text" class="form-control text-center qty_defect" min="1" placeholder="0">
                              </div>
                              <div class="col-lg-3">
                                <button class="btn btn-danger btn_remove_row_defect"><i class='bx bx-trash ms-1'></i></button>
                              </div>
                            </div>`);

   i++;
   $('.select2_1').select2({
    theme: 'bootstrap-5',
    width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style',
   });

   $(`#defect_${j}`).empty();
   $.ajax({
    url: " <?= site_url('sewing/getDefectMaster'); ?>",
    type: 'GET',
    dataType: 'JSON',
    beforeSend: function() {
     $(`#defect_${j}`).prepend($('<option></option>').html('Loading...'));
    },
   }).done(function(data) {
    $(`#defect_${j}`).empty();
    $(`#defect_${j}`).append($('<option>', {
     value: "",
     text: "- Select Defect -"
    }));
    k = j
    j++;
    $.each(data, function(i, item) {
     $(`#defect_${k}`).append($('<option>', {
      value: item.id_df,
      text: item.DCode + ' | ' + item.Defect
     }));
    });
   });



   $('.qty_defect').keypress(function(e) {
    let charCode = (e.which) ? e.which : e.keyCode;
    if (charCode > 31 && (charCode < 48 || charCode > 57)) {
     return false;
    }
   });


  });


  $('#defect_row').on('click', '.btn_remove_row_defect', function(e) {
   e.preventDefault();
   $(this).parents('.added_row').remove();

  });








  // Button Reset
  $('#btn_reset').on('click', function() {
   resetAll();
  });


  // Button Save
  $('#btn_save').on('click', function() {
   let orc = $('#orc_hidden').val();
   let line = $('#line').val();

   let id_defect = [];
   $(".defect").each(function() {
    if ($(this).val() != '') {
     id_defect.push($(this).val());
    }
   });

   let qty_defect = [];
   $(".qty_defect").each(function() {
    if ($(this).val() != '') {
     qty_defect.push($(this).val());
    }
   });

   if (orc != '') {
    if ($(".defect").length == id_defect.length && $(".defect").length == qty_defect.length) {

     swal.fire({
      icon: 'warning',
      title: 'Warning!',
      html: "Are you sure ?",
      showCancelButton: true,
      // confirmButtonColor: '#3085d6',
      // cancelButtonColor: '#d33',
      confirmButtonText: 'Yes',
      cancelButtonText: 'No',
     }).then(function(result) {
      if (result.value) {

       $('#btn_save').empty();
       $('#btn_save').prop('disabled', true);
       $('#btn_save').append('<span class="spinner-border spinner-border-sm me-1" style="margin-bottom: 1px;" role="status" aria-hidden="true"></span>Loading');

       $.ajax({
        type: "POST",
        url: "<?php echo site_url('sewing/postQcEndlineMultipleDefect') ?>",
        dataType: "JSON",
        data: {
         'orc': orc,
         'id_defect': id_defect,
         'qty_defect': qty_defect,
         'line': line
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
          $('#btn_save').empty();
          $('#btn_save').html('Save');

          resetAll();

          qcEndlineTable.ajax.reload();
          percentageQcEndlineTable.ajax.reload();

         });
        }
       });


      }

     });
    } else {
     swal.fire({
      icon: 'warning',
      title: 'Warning!',
      text: 'Defect and Qty required.',
      // timer: 1000,
      showCancelButton: false,
      showConfirmButton: true
     });
    }
   } else {
    Swal.fire(
     'Warning.',
     'There are forms that have not been filled.',
     'warning'
    );
   }
  });



  $('#btn_daily').on('click', function() {
   $('#btn_daily').removeClass('btn-outline-info');
   $('#btn_daily').addClass('btn-info');
   $('#btn_daily').prop('disabled', true);

   $('#btn_yesterday').removeClass('btn-info');
   $('#btn_yesterday').addClass('btn-outline-info');
   $('#btn_yesterday').prop('disabled', false);

   $('#btn_monthly').removeClass('btn-info');
   $('#btn_monthly').addClass('btn-outline-info');
   $('#btn_monthly').prop('disabled', false);

   $('#btn_show_all').removeClass('btn-info');
   $('#btn_show_all').addClass('btn-outline-info');
   $('#btn_show_all').prop('disabled', false);

   qcEndlineTable.clear().draw();
   percentageQcEndlineTable.clear().draw();


   qcEndlineTable = $('#qcEndlineTable').DataTable({
    // lengthChange: false,
    // buttons: ['copy', 'excel', 'pdf', 'print'],
    scrollX: true,
    destroy: true,
    ajax: {
     url: '<?= site_url('sewing/getQcEndlineDefectDaily'); ?>',
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
      'data': 'orc',
      'className': 'text-center px-2'
     },
     {
      'data': 'DCode',
      'className': 'text-center px-2'
     },
     {
      'data': 'Defect',
      'className': 'text-center px-2'
     },
     {
      'data': 'qty_defect',
      'className': 'text-center px-2'
     },
     // {
     //   'className': 'text-center',
     //   render: function(data, type, row) {
     //     return "<span class='badge badge-danger mx-3' id='btn_delete' style='cursor: pointer;'>Delete</span>"
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
      .column(5)
      .data()
      .reduce((a, b) => intVal(a) + intVal(b), 0);

     // Total over this page
     pageTotal = api
      .column(5, {
       page: 'current'
      })
      .data()
      .reduce((a, b) => intVal(a) + intVal(b), 0);

     // Update footer
     api.column(5).footer().innerHTML =
      pageTotal + ' ( ' + total + ' )';

     // Update footer
     // api.column(6).footer().innerHTML =
     //   total
    }

   });

   percentageQcEndlineTable = $('#percentageQcEndlineTable').DataTable({
    // lengthChange: false,
    // buttons: ['copy', 'excel', 'pdf', 'print'],
    scrollX: true,
    destroy: true,
    ajax: {
     url: '<?= site_url('sewing/getPercentageQcEndlineDaily'); ?>',
     type: 'GET'
    },
    columns: [{
      "data": null,
      "orderable": true,
      "searchable": true,
      'className': 'text-center px-4',
      "width": "50px",
      "render": function(data, type, row, meta) {
       return meta.row + meta.settings._iDisplayStart + 1;
      }
     },
     {
      'data': 'orc',
      'className': 'text-center px-2'
     },
     {
      'data': 'total_qty_pass',
      'className': 'text-center px-2'
     },
     {
      'data': 'total_qty_defect',
      'className': 'text-center px-2'
     },
     {
      'data': 'total_qty_check',
      'className': 'text-center px-2'
     },
     {
      'className': 'text-center',
      render: function(data, type, row) {
       if (row['percentage_defect'] !== null) {
        return row['percentage_defect'] + " %";
       } else {
        return "";
       }

      }
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
      .column(2)
      .data()
      .reduce((a, b) => intVal(a) + intVal(b), 0);

     // Total over this page
     pageTotal = api
      .column(2, {
       page: 'current'
      })
      .data()
      .reduce((a, b) => intVal(a) + intVal(b), 0);

     // Update footer
     api.column(2).footer().innerHTML =
      pageTotal + ' ( ' + total + ' )';





     // Total over all pages
     total = api
      .column(3)
      .data()
      .reduce((a, b) => intVal(a) + intVal(b), 0);

     // Total over this page
     pageTotal = api
      .column(3, {
       page: 'current'
      })
      .data()
      .reduce((a, b) => intVal(a) + intVal(b), 0);

     // Update footer
     api.column(3).footer().innerHTML =
      pageTotal + ' ( ' + total + ' )';





     // Total over all pages
     total = api
      .column(4)
      .data()
      .reduce((a, b) => intVal(a) + intVal(b), 0);

     // Total over this page
     pageTotal = api
      .column(4, {
       page: 'current'
      })
      .data()
      .reduce((a, b) => intVal(a) + intVal(b), 0);

     // Update footer
     api.column(4).footer().innerHTML =
      pageTotal + ' ( ' + total + ' )';


    }

   });


  });

  $('#btn_yesterday').on('click', function() {
   $('#btn_daily').removeClass('btn-info');
   $('#btn_daily').addClass('btn-outline-info');
   $('#btn_daily').prop('disabled', false);

   $('#btn_yesterday').removeClass('btn-outline-info');
   $('#btn_yesterday').addClass('btn-info');
   $('#btn_yesterday').prop('disabled', true);

   $('#btn_monthly').removeClass('btn-info');
   $('#btn_monthly').addClass('btn-outline-info');
   $('#btn_monthly').prop('disabled', false);

   $('#btn_show_all').removeClass('btn-info');
   $('#btn_show_all').addClass('btn-outline-info');
   $('#btn_show_all').prop('disabled', false);

   qcEndlineTable.clear().draw();
   percentageQcEndlineTable.clear().draw();

   qcEndlineTable = $('#qcEndlineTable').DataTable({
    // lengthChange: false,
    // buttons: ['copy', 'excel', 'pdf', 'print'],
    scrollX: true,
    destroy: true,
    ajax: {
     url: '<?= site_url('sewing/getQcEndlineDefectYesterday'); ?>',
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
      'data': 'orc',
      'className': 'text-center px-2'
     },
     {
      'data': 'DCode',
      'className': 'text-center px-2'
     },
     {
      'data': 'Defect',
      'className': 'text-center px-2'
     },
     {
      'data': 'qty_defect',
      'className': 'text-center px-2'
     },
     // {
     //   'className': 'text-center',
     //   render: function(data, type, row) {
     //     return "<span class='badge badge-danger mx-3' id='btn_delete' style='cursor: pointer;'>Delete</span>"
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
      .column(5)
      .data()
      .reduce((a, b) => intVal(a) + intVal(b), 0);

     // Total over this page
     pageTotal = api
      .column(5, {
       page: 'current'
      })
      .data()
      .reduce((a, b) => intVal(a) + intVal(b), 0);

     // Update footer
     api.column(5).footer().innerHTML =
      pageTotal + ' ( ' + total + ' )';

     // Update footer
     // api.column(6).footer().innerHTML =
     //   total
    }

   });

   percentageQcEndlineTable = $('#percentageQcEndlineTable').DataTable({
    // lengthChange: false,
    // buttons: ['copy', 'excel', 'pdf', 'print'],
    scrollX: true,
    destroy: true,
    ajax: {
     url: '<?= site_url('sewing/getPercentageQcEndlineYesterday'); ?>',
     type: 'GET'
    },
    columns: [{
      "data": null,
      "orderable": true,
      "searchable": true,
      'className': 'text-center px-4',
      "width": "50px",
      "render": function(data, type, row, meta) {
       return meta.row + meta.settings._iDisplayStart + 1;
      }
     },
     {
      'data': 'orc',
      'className': 'text-center px-2'
     },
     {
      'data': 'total_qty_pass',
      'className': 'text-center px-2'
     },
     {
      'data': 'total_qty_defect',
      'className': 'text-center px-2'
     },
     {
      'data': 'total_qty_check',
      'className': 'text-center px-2'
     },
     {
      'className': 'text-center',
      render: function(data, type, row) {
       if (row['percentage_defect'] !== null) {
        return row['percentage_defect'] + " %";
       } else {
        return "";
       }

      }
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
      .column(2)
      .data()
      .reduce((a, b) => intVal(a) + intVal(b), 0);

     // Total over this page
     pageTotal = api
      .column(2, {
       page: 'current'
      })
      .data()
      .reduce((a, b) => intVal(a) + intVal(b), 0);

     // Update footer
     api.column(2).footer().innerHTML =
      pageTotal + ' ( ' + total + ' )';





     // Total over all pages
     total = api
      .column(3)
      .data()
      .reduce((a, b) => intVal(a) + intVal(b), 0);

     // Total over this page
     pageTotal = api
      .column(3, {
       page: 'current'
      })
      .data()
      .reduce((a, b) => intVal(a) + intVal(b), 0);

     // Update footer
     api.column(3).footer().innerHTML =
      pageTotal + ' ( ' + total + ' )';





     // Total over all pages
     total = api
      .column(4)
      .data()
      .reduce((a, b) => intVal(a) + intVal(b), 0);

     // Total over this page
     pageTotal = api
      .column(4, {
       page: 'current'
      })
      .data()
      .reduce((a, b) => intVal(a) + intVal(b), 0);

     // Update footer
     api.column(4).footer().innerHTML =
      pageTotal + ' ( ' + total + ' )';


    }

   });
  });

  $('#btn_monthly').on('click', function() {

   $('#btn_daily').removeClass('btn-info');
   $('#btn_daily').addClass('btn-outline-info');
   $('#btn_daily').prop('disabled', false);

   $('#btn_yesterday').removeClass('btn-info');
   $('#btn_yesterday').addClass('btn-outline-info');
   $('#btn_yesterday').prop('disabled', false);

   $('#btn_monthly').removeClass('btn-outline-info');
   $('#btn_monthly').addClass('btn-info');
   $('#btn_monthly').prop('disabled', true);

   $('#btn_show_all').removeClass('btn-info');
   $('#btn_show_all').addClass('btn-outline-info');
   $('#btn_show_all').prop('disabled', false);

   qcEndlineTable.clear().draw();
   percentageQcEndlineTable.clear().draw();

   qcEndlineTable = $('#qcEndlineTable').DataTable({
    // lengthChange: false,
    // buttons: ['copy', 'excel', 'pdf', 'print'],
    scrollX: true,
    destroy: true,
    ajax: {
     url: '<?= site_url('sewing/getQcEndlineDefectMonthly'); ?>',
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
      'data': 'orc',
      'className': 'text-center px-2'
     },
     {
      'data': 'DCode',
      'className': 'text-center px-2'
     },
     {
      'data': 'Defect',
      'className': 'text-center px-2'
     },
     {
      'data': 'qty_defect',
      'className': 'text-center px-2'
     },
     // {
     //   'className': 'text-center',
     //   render: function(data, type, row) {
     //     return "<span class='badge badge-danger mx-3' id='btn_delete' style='cursor: pointer;'>Delete</span>"
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
      .column(5)
      .data()
      .reduce((a, b) => intVal(a) + intVal(b), 0);

     // Total over this page
     pageTotal = api
      .column(5, {
       page: 'current'
      })
      .data()
      .reduce((a, b) => intVal(a) + intVal(b), 0);

     // Update footer
     api.column(5).footer().innerHTML =
      pageTotal + ' ( ' + total + ' )';

     // Update footer
     // api.column(6).footer().innerHTML =
     //   total
    }

   });

   percentageQcEndlineTable = $('#percentageQcEndlineTable').DataTable({
    // lengthChange: false,
    // buttons: ['copy', 'excel', 'pdf', 'print'],
    scrollX: true,
    destroy: true,
    ajax: {
     url: '<?= site_url('sewing/getPercentageQcEndlineMonthly'); ?>',
     type: 'GET'
    },
    columns: [{
      "data": null,
      "orderable": true,
      "searchable": true,
      'className': 'text-center px-4',
      "width": "50px",
      "render": function(data, type, row, meta) {
       return meta.row + meta.settings._iDisplayStart + 1;
      }
     },
     {
      'data': 'orc',
      'className': 'text-center px-2'
     },
     {
      'data': 'total_qty_pass',
      'className': 'text-center px-2'
     },
     {
      'data': 'total_qty_defect',
      'className': 'text-center px-2'
     },
     {
      'data': 'total_qty_check',
      'className': 'text-center px-2'
     },
     {
      'className': 'text-center',
      render: function(data, type, row) {
       if (row['percentage_defect'] !== null) {
        return row['percentage_defect'] + " %";
       } else {
        return "";
       }

      }
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
      .column(2)
      .data()
      .reduce((a, b) => intVal(a) + intVal(b), 0);

     // Total over this page
     pageTotal = api
      .column(2, {
       page: 'current'
      })
      .data()
      .reduce((a, b) => intVal(a) + intVal(b), 0);

     // Update footer
     api.column(2).footer().innerHTML =
      pageTotal + ' ( ' + total + ' )';





     // Total over all pages
     total = api
      .column(3)
      .data()
      .reduce((a, b) => intVal(a) + intVal(b), 0);

     // Total over this page
     pageTotal = api
      .column(3, {
       page: 'current'
      })
      .data()
      .reduce((a, b) => intVal(a) + intVal(b), 0);

     // Update footer
     api.column(3).footer().innerHTML =
      pageTotal + ' ( ' + total + ' )';





     // Total over all pages
     total = api
      .column(4)
      .data()
      .reduce((a, b) => intVal(a) + intVal(b), 0);

     // Total over this page
     pageTotal = api
      .column(4, {
       page: 'current'
      })
      .data()
      .reduce((a, b) => intVal(a) + intVal(b), 0);

     // Update footer
     api.column(4).footer().innerHTML =
      pageTotal + ' ( ' + total + ' )';


    }

   });
  });

  $('#btn_show_all').on('click', function() {
   $('#btn_daily').removeClass('btn-info');
   $('#btn_daily').addClass('btn-outline-info');
   $('#btn_daily').prop('disabled', false);

   $('#btn_yesterday').removeClass('btn-info');
   $('#btn_yesterday').addClass('btn-outline-info');
   $('#btn_yesterday').prop('disabled', false);

   $('#btn_monthly').removeClass('btn-info');
   $('#btn_monthly').addClass('btn-outline-info');
   $('#btn_monthly').prop('disabled', false);

   $('#btn_show_all').removeClass('btn-outline-info');
   $('#btn_show_all').addClass('btn-info');
   $('#btn_show_all').prop('disabled', true);



   qcEndlineTable = $('#qcEndlineTable').DataTable({
    // lengthChange: false,
    // buttons: ['copy', 'excel', 'pdf', 'print'],
    scrollX: true,
    destroy: true,
    ajax: {
     url: '<?= site_url('sewing/getQcEndlineDefectShowAll'); ?>',
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
      'data': 'orc',
      'className': 'text-center px-2'
     },
     {
      'data': 'DCode',
      'className': 'text-center px-2'
     },
     {
      'data': 'Defect',
      'className': 'text-center px-2'
     },
     {
      'data': 'qty_defect',
      'className': 'text-center px-2'
     },
     // {
     //   'className': 'text-center',
     //   render: function(data, type, row) {
     //     return "<span class='badge badge-danger mx-3' id='btn_delete' style='cursor: pointer;'>Delete</span>"
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
      .column(5)
      .data()
      .reduce((a, b) => intVal(a) + intVal(b), 0);

     // Total over this page
     pageTotal = api
      .column(5, {
       page: 'current'
      })
      .data()
      .reduce((a, b) => intVal(a) + intVal(b), 0);

     // Update footer
     api.column(5).footer().innerHTML =
      pageTotal + ' ( ' + total + ' )';

     // Update footer
     // api.column(6).footer().innerHTML =
     //   total
    }

   });

   percentageQcEndlineTable = $('#percentageQcEndlineTable').DataTable({
    // lengthChange: false,
    // buttons: ['copy', 'excel', 'pdf', 'print'],
    scrollX: true,
    destroy: true,
    ajax: {
     url: '<?= site_url('sewing/getPercentageQcEndlineShowAll'); ?>',
     type: 'GET'
    },
    columns: [{
      "data": null,
      "orderable": true,
      "searchable": true,
      'className': 'text-center px-4',
      "width": "50px",
      "render": function(data, type, row, meta) {
       return meta.row + meta.settings._iDisplayStart + 1;
      }
     },
     {
      'data': 'orc',
      'className': 'text-center px-2'
     },
     {
      'data': 'total_qty_pass',
      'className': 'text-center px-2'
     },
     {
      'data': 'total_qty_defect',
      'className': 'text-center px-2'
     },
     {
      'data': 'total_qty_check',
      'className': 'text-center px-2'
     },
     {
      'className': 'text-center',
      render: function(data, type, row) {
       if (row['percentage_defect'] !== null) {
        return row['percentage_defect'] + " %";
       } else {
        return "";
       }

      }
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
      .column(2)
      .data()
      .reduce((a, b) => intVal(a) + intVal(b), 0);

     // Total over this page
     pageTotal = api
      .column(2, {
       page: 'current'
      })
      .data()
      .reduce((a, b) => intVal(a) + intVal(b), 0);

     // Update footer
     api.column(2).footer().innerHTML =
      pageTotal + ' ( ' + total + ' )';





     // Total over all pages
     total = api
      .column(3)
      .data()
      .reduce((a, b) => intVal(a) + intVal(b), 0);

     // Total over this page
     pageTotal = api
      .column(3, {
       page: 'current'
      })
      .data()
      .reduce((a, b) => intVal(a) + intVal(b), 0);

     // Update footer
     api.column(3).footer().innerHTML =
      pageTotal + ' ( ' + total + ' )';





     // Total over all pages
     total = api
      .column(4)
      .data()
      .reduce((a, b) => intVal(a) + intVal(b), 0);

     // Total over this page
     pageTotal = api
      .column(4, {
       page: 'current'
      })
      .data()
      .reduce((a, b) => intVal(a) + intVal(b), 0);

     // Update footer
     api.column(4).footer().innerHTML =
      pageTotal + ' ( ' + total + ' )';


    }

   });
  });

 });
</script>