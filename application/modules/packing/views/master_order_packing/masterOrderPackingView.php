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
   <div class="breadcrumb-title pe-3">Packing</div>
   <div class="ps-3">
    <nav aria-label="breadcrumb">
     <ol class="breadcrumb mb-0 p-0">
      <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
      </li>
      <li class="breadcrumb-item active" aria-current="page">Master Order Packing</li>
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
  <h6 class="mb-0 text-uppercase">Master Order Packing</h6>
  <hr />


  <div class="card">
   <div class="card-body">
    <div class="row my-3 mx-2">
     <div class="col-lg-12">

      <!-- <div class="row">
              <div class="col-lg-12">
                <div class="alert alert-primary" role="alert">
                  Update : Penambahan fitur <b>"Cancel Request"</b> untuk Merchandiser. <b>"Cancel Request"</b> dapat digunakan saat "Sample Request" belum di confirm oleh Admin Sample.
                </div>
              </div>
            </div> -->

      <div class="row mb-3">
       <div class="col-lg-12">
        <div class="accordion" id="accordionExample">
         <div class="accordion-item" style="border: 0px;">
          <h2 class="accordion-header" id="headingOne">
           <button class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
            <i class='bx bx-plus-circle'></i> Create New Order
           </button>
          </h2>
          <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
           <div class="accordion-body">
            <div class="row">

             <div class="col-lg-6">

              <div class="row g-3 align-items-center mb-3">
               <div class="col-lg-3">
                <label for="orc" class="col-form-label">ORC <sup style="color: red;">*</sup></label>
               </div>
               <div class="col-lg-6">
                <input type="text" id="orc" class="form-control">
               </div>
              </div>
              <div class="row g-3 align-items-center mb-3">
               <div class="col-lg-3">
                <label for="style" class="col-form-label">Style <sup style="color: red;">*</sup></label>
               </div>
               <div class="col-lg-6">
                <input type="text" id="style" class="form-control">
               </div>
              </div>
              <div class="row g-3 align-items-center mb-3">
               <div class="col-lg-3">
                <label for="color" class="col-form-label">Color <sup style="color: red;">*</sup></label>
               </div>
               <div class="col-lg-6">
                <input type="text" id="color" class="form-control">
               </div>
              </div>
              <div class="row g-3 align-items-center mb-3">
               <div class="col-lg-3">
                <label for="buyer" class="col-form-label">Buyer <sup style="color: red;">*</sup></label>
               </div>
               <div class="col-lg-6">
                <input type="text" id="buyer" class="form-control">
               </div>
              </div>
              <div class="row g-3 align-items-center mb-3">
               <div class="col-lg-3">
                <label for="no_po" class="col-form-label">No. PO <sup style="color: red;">*</sup></label>
               </div>
               <div class="col-lg-6">
                <input type="text" id="no_po" class="form-control">
               </div>
              </div>
              <div class="row g-3 align-items-center mb-3">
               <div class="col-lg-3">
                <label for="qty_order" class="col-form-label">Qty Order <sup style="color: red;">*</sup></label>
               </div>
               <div class="col-lg-2">
                <input type="number" id="qty_order" class="form-control">
               </div>
              </div>

              <div class="row g-3 mb-3">
               <div class="col-lg-3"></div>
               <div class="col-lg-7">
                <button class="btn btn-primary" id="btn_save">Save</button>
                <button class="btn btn-outline-secondary" id="btn_reset">Reset</button>

               </div>
              </div>

             </div>


             <div class="col-lg-6">

              <div class="row g-3 mb-3">
               <div class="col-lg-2">
                <label for="size" class="col-form-label">Size / Qty <sup style="color: red;">*</sup></label>
               </div>
               <div class="col-lg-7" id="size_row">
                <div class="row mb-3">
                 <div class="col-lg-7">
                  <select class="select2 size" id="size_1"></select>
                 </div>
                 <div class="col-lg-3">
                  <input type="text" class="form-control text-center qty_size" min="1" placeholder="0">
                 </div>
                 <div class="col-lg-2">
                  <button class="btn btn-primary" id="btn_add_row_size"><i class='bx bx-plus-circle ms-1'></i></button>
                 </div>
                </div>
               </div>

              </div>


             </div>
            </div>
           </div>
          </div>
         </div>

        </div>
       </div>
      </div>




      <!-- <div class="row">
       <div class="col-lg-12">

        <button class="btn btn-info btn-sm me-2" id="btn_on_progress" disabled><i class='bx bx-walk'></i>On Progress</button>
        <button class="btn btn-outline-info btn-sm me-2" id="btn_sent"><i class='bx bxs-paper-plane'></i>Sent</button>
        <button class="btn btn-outline-danger btn-sm me-2" id="btn_canceled"><i class='bx bx-x-circle'></i>Canceled</button>
        <button class="btn btn-outline-info btn-sm" id="btn_show_all"><i class='bx bx-clipboard'></i>Show All</button>
       </div>
      </div> -->


      <div class="row">
       <div class="col-lg-12">
        <!-- <div class="table-responsive"> -->
        <table id="masterOrderPackingTable" class="table table-striped table-bordered table-sm nowrap" style="width:100%">
         <thead>
          <tr>
           <th>No.</th>
           <th>Created Date</th>
           <th>ORC</th>
           <th>Style</th>
           <th>Color</th>
           <th>Buyer</th>
           <th>No.PO</th>
           <th>Qty Order</th>
           <th>Action</th>
          </tr>
         </thead>
         <tfoot>
          <th colspan="7">Total Qty</th>
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
<!-- Modal Details -->
<div class="modal fade" id="orderPackingDetailsModal" aria-hidden="true" style="overflow:hidden;">
 <div class="modal-dialog modal-lg">
  <div class="modal-content">
   <div class="modal-header">
    <h5 class="modal-title">Order Details</h5>
    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
   </div>
   <div class="modal-body">
    <div class="row mx-3 mb-3">

     <div class="row align-items-center mb-2">
      <div class="col-lg-2">
       <label for="orc_modal" class="col-form-label">ORC</label>
      </div>
      <div class="col-lg-6">
       <label id="orc_modal" class="col-form-label"></label>
      </div>
     </div>
     <div class="row align-items-center mb-2">
      <div class="col-lg-2">
       <label for="style_modal" class="col-form-label">Style</label>
      </div>
      <div class="col-lg-6">
       <label id="style_modal" class="col-form-label"></label>
      </div>
     </div>
     <div class="row align-items-center mb-2">
      <div class="col-lg-2">
       <label for="color_modal" class="col-form-label">Color</label>
      </div>
      <div class="col-lg-6">
       <label id="color_modal" class="col-form-label"></label>
      </div>
     </div>

     <div class="col-lg-12">
      <!-- <div class="table-responsive"> -->
      <table id="masterOrderPackingDetailsTable" class="table table-striped table-bordered table-sm nowrap" style="width:100%">
       <thead>
        <tr>
         <th>Size</th>
         <th>Qty</th>
         <th>Box Capacity</th>
        </tr>
       </thead>
       <tfoot>
        <th>Total Qty</th>
        <th></th>
        <th></th>
       </tfoot>
      </table>

      <!-- </div> -->
     </div>


    </div>
   </div>
   <div class="modal-footer">
    <!-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> -->
    <!-- <button type="button" id="btn_save_create_" class="btn btn-primary">Save</button> -->
   </div>
  </div>
 </div>
</div>

<!-- Modal Add Carton Capacity -->
<div class="modal fade" id="orderPackingAddCartonCapacityModal" aria-hidden="true" style="overflow:hidden;">
 <div class="modal-dialog modal-lg">
  <div class="modal-content">
   <div class="modal-header">
    <h5 class="modal-title">Order Details</h5>
    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
   </div>
   <div class="modal-body">
    <div class="row mx-3 mb-3">

     <div class="row align-items-center mb-2">
      <div class="col-lg-2">
       <label for="orc_modal2" class="col-form-label">ORC</label>
      </div>
      <div class="col-lg-6">
       <label id="orc_modal2" class="col-form-label"></label>
      </div>
     </div>
     <div class="row align-items-center mb-2">
      <div class="col-lg-2">
       <label for="style_modal2" class="col-form-label">Style</label>
      </div>
      <div class="col-lg-6">
       <label id="style_modal2" class="col-form-label"></label>
      </div>
     </div>
     <div class="row align-items-center mb-2">
      <div class="col-lg-2">
       <label for="color_modal2" class="col-form-label">Color</label>
      </div>
      <div class="col-lg-6">
       <label id="color_modal2" class="col-form-label"></label>
      </div>
     </div>

     <div class="col-lg-12">
      <!-- <div class="table-responsive"> -->
      <table id="masterOrderPackingAddCartonCapacityTable" class="table table-striped table-bordered table-sm nowrap" style="width:100%">
       <thead>
        <tr>
         <th>Size</th>
         <th>Qty</th>
         <th>Box Capacity</th>
        </tr>
       </thead>
       <!-- <tfoot>
        <th>Total Qty</th>
        <th></th>
        <th></th>
       </tfoot> -->
      </table>

      <!-- </div> -->
     </div>


    </div>
   </div>
   <div class="modal-footer">
    <!-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> -->
    <button type="button" id="btn_save_carton_capacity" class="btn btn-primary">Save</button>
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


  const loadSize = () => {
   $('.size').empty();
   $.ajax({
    url: " <?= site_url('packing/getSize'); ?>",
    type: 'GET',
    dataType: 'JSON',
    beforeSend: function() {
     $(".size").prepend($('<option></option>').html('Loading...'));
    },
   }).done(function(data) {
    $('.size').empty();
    $('.size').append($('<option>', {
     value: "",
     text: "- Select Size -"
    }));
    $.each(data, function(i, item) {
     $('.size').append($('<option>', {
      value: item.id_mastersize,
      text: item.size
     }));
    });
   });
  }

  loadSize();


  const resetAll = () => {
   $('#orc').val('');
   $('#style').val('');
   $('#color').val('');
   $('#buyer').val('');
   $('#no_po').val('');
   $('#qty_order').val('');

   $('.size').val(null).trigger('change');
   $('.qty_size').val('')
   $('.added_row').remove();
  }









  $('#masterOrderPackingTable thead tr')
   .clone(true)
   .addClass('filters')
   .appendTo('#masterOrderPackingTable thead');

  let masterOrderPackingTable = $('#masterOrderPackingTable').DataTable({
   lengthChange: true,
   // buttons: ['copy', 'excel', 'pdf', 'print'],
   destroy: true,
   scrollX: true,
   scrollX: true,
   paging: true,
   // scrollCollapse: true,
   // scrollY: '500px',
   orderCellsTop: true,
   initComplete: function() {
    let api = this.api();
    // For each column
    api.columns().eq(0).each(function(colIdx) {
     // Set the header cell to contain the input element
     let cell = $('.filters th').eq($(api.column(colIdx).header()).index());
     let title = $(cell).text();
     $(cell).html('<input type="text" class="form-control form-control-sm text-center" placeholder="' + title + '" />');
     // On every keypress in this input
     $('input', $('.filters th').eq($(api.column(colIdx).header()).index()))
      .off('keyup change')
      .on('keyup change', function(e) {
       e.stopPropagation();
       // Get the search value
       $(this).attr('title', $(this).val());
       var regexr = '({search})'; //$(this).parents('th').find('select').val();
       var cursorPosition = this.selectionStart;
       // Search the column for that value
       api
        .column(colIdx)
        .search((this.value != "") ? regexr.replace('{search}', '(((' + this.value + ')))') : "", this.value != "", this.value == "")
        .draw();
       $(this).focus()[0].setSelectionRange(cursorPosition, cursorPosition);
      });
    });
   },
   ajax: {
    url: '<?= site_url("packing/getMasterOrderPacking"); ?>',
    type: 'GET',
    dataType: 'JSON'
   },
   columns: [{
     "data": null,
     "orderable": true,
     "searchable": true,
     'className': 'text-center px-4 align-middle',
     // "width": "100px",
     "render": function(data, type, row, meta) {
      return meta.row + meta.settings._iDisplayStart + 1;
     }
    },
    {
     'data': 'created_date',
     'className': 'text-center px-3 align-middle'
    },
    {
     'data': 'orc',
     'className': 'text-center px-3 align-middle'
    },
    {
     'data': 'style',
     'className': 'text-center px-3 align-middle'
    },
    {
     'data': 'color',
     'className': 'text-center px-3 align-middle'
    },
    {
     'data': 'buyer',
     'className': 'text-center px-3 align-middle'
    },
    {
     'data': 'no_po',
     'className': 'text-center px-3 align-middle'
    },
    {
     'data': 'qty_order',
     'className': 'text-center px-3 align-middle'
    },
    {
     'className': 'text-center px-3 align-middle',
     render: function(data, type, row) {
      return '<span class="badge text-bg-primary text-white" style="cursor: pointer;" id="btn_details">Details</span> <span class="badge text-bg-info text-white" style="cursor: pointer;" id="btn_add_carton_capacity">Add Carton Capacity</span>';
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
    // api.column(7).footer().innerHTML =
    //   total
   }

  });










  $('.qty_size').keypress(function(e) {
   let charCode = (e.which) ? e.which : e.keyCode;
   if (charCode > 31 && (charCode < 48 || charCode > 57)) {
    return false;
   }
  });

  let i = 2;
  let j = 2;
  let k;
  $('#btn_add_row_size').click(function() {
   $('#size_row').append(`<div class="row mb-3 added_row">
                              <div class="col-lg-7">
                                <select class="select2 size" id='size_${i}'></select>
                              </div>
                              <div class="col-lg-3">
                                <input type="text" class="form-control text-center qty_size" min="1" placeholder="0">
                              </div>
                              <div class="col-lg-2">
                                <button class="btn btn-danger btn_remove_row_size"><i class='bx bx-trash ms-1'></i></button>
                              </div>
                            </div>`);
   // <select class="select2 size" id="size_${i++}"></select>
   i++;
   $('.select2').select2({
    theme: 'bootstrap-5',
    width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style',
   });

   // loadSize();

   $(`#size_${j}`).empty();
   $.ajax({
    url: " <?= site_url('packing/getSize'); ?>",
    type: 'GET',
    dataType: 'JSON',
    beforeSend: function() {
     $(`#size_${j}`).prepend($('<option></option>').html('Loading...'));
    },
   }).done(function(data) {
    $(`#size_${j}`).empty();
    $(`#size_${j}`).append($('<option>', {
     value: "",
     text: "- Select Size -"
    }));
    k = j
    j++;
    $.each(data, function(i, item) {
     $(`#size_${k}`).append($('<option>', {
      value: item.id_mastersize,
      text: item.size
     }));

    });
   });


   $('.qty_size').keypress(function(e) {
    let charCode = (e.which) ? e.which : e.keyCode;
    if (charCode > 31 && (charCode < 48 || charCode > 57)) {
     return false;
    }
   });


  });


  $('#size_row').on('click', '.btn_remove_row_size', function(e) {
   e.preventDefault();
   $(this).parents('.added_row').remove();
  });


  // Button save Sample Request
  $('#btn_save').click(function() {
   let orc = $('#orc').val();
   let style = $('#style').val();
   let color = $('#color').val();
   let buyer = $('#buyer').val();
   let no_po = $('#no_po').val();
   let qty_order = $('#qty_order').val();

   let id_size = [];
   $(".size").each(function() {
    if ($(this).val() != '') {
     id_size.push($(this).val());
    }
   });

   let qty_size = [];
   $(".qty_size").each(function() {
    if ($(this).val() != '') {
     qty_size.push($(this).val());
    }
   });

   if (orc != '' && style != '' && color != '' && buyer != '' && no_po != '' && qty_order != '') {
    if ($(".size").length == id_size.length && $(".size").length == qty_size.length) {
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

       $.ajax({
        type: "POST",
        url: "<?= site_url('packing/postMasterOrderPacking') ?>",
        dataType: "JSON",
        data: {
         'orc': orc,
         'style': style,
         'color': color,
         'buyer': buyer,
         'no_po': no_po,
         'qty_order': qty_order,
         'id_size': id_size,
         'qty_size': qty_size

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
         masterOrderPackingTable.ajax.reload(null, false);

         swal.fire({
          icon: 'success',
          title: 'Success!',
          text: 'Data saved successfully.',
          // timer: 1000,
          showCancelButton: false,
          showConfirmButton: true
         }).then(function() {
          resetAll();
         })
        }
       });
      }

     });
    } else {
     swal.fire({
      icon: 'warning',
      title: 'Warning!',
      text: 'Size and Qty required.',
      // timer: 1000,
      showCancelButton: false,
      showConfirmButton: true
     });
    }


   } else {
    swal.fire({
     icon: 'warning',
     title: 'Warning!',
     text: 'There are forms that have not been filled out.',
     // timer: 1000,
     showCancelButton: false,
     showConfirmButton: true
    });
   }


  });

  $('#btn_reset').click(function() {
   resetAll();
  })




  // Button Details
  $('#masterOrderPackingTable tbody').on('click', '#btn_details', function() {
   let id = masterOrderPackingTable.row($(this).parents('tr')).data().id;
   let orc = masterOrderPackingTable.row($(this).parents('tr')).data().orc;
   let style = masterOrderPackingTable.row($(this).parents('tr')).data().style;
   let color = masterOrderPackingTable.row($(this).parents('tr')).data().color;

   $('#orc_modal').html(': ' + orc);
   $('#style_modal').html(': ' + style);
   $('#color_modal').html(': ' + color);

   let masterOrderPackingDetailsTable = $('#masterOrderPackingDetailsTable').DataTable({
    // lengthChange: false,
    // buttons: ['copy', 'excel', 'pdf', 'print'],
    destroy: true,
    scrollX: true,
    paging: false,
    info: false,
    searching: false,
    ajax: {
     url: '<?= site_url("packing/getMasterOrderPackingDetails"); ?>',
     type: 'GET',
     dataType: 'JSON',
     data: {
      'id': id
     }
    },
    columns: [{
      'data': 'size',
      'className': 'text-center px-3 align-middle'
     },
     {
      'data': 'qty',
      'className': 'text-center px-3 align-middle'
     },
     {
      'data': 'carton_capacity',
      'className': 'text-center px-3 align-middle'
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
      .column(1)
      .data()
      .reduce((a, b) => intVal(a) + intVal(b), 0);

     // Total over this page
     pageTotal = api
      .column(1, {
       page: 'current'
      })
      .data()
      .reduce((a, b) => intVal(a) + intVal(b), 0);

     // Update footer
     api.column(1).footer().innerHTML =
      total

     // Update footer
     // api.column(1).footer().innerHTML =
     //   total

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
      total

     // Update footer
     // api.column(2).footer().innerHTML =
     //   total


    }



   });



   $("#orderPackingDetailsModal").modal("show");
   $("#orderPackingDetailsModal").on("shown.bs.modal", function() {
    $('#masterOrderPackingDetailsTable').DataTable().columns.adjust();
   });
  });


  // Button Details
  $('#masterOrderPackingTable tbody').on('click', '#btn_add_carton_capacity', function() {
   let id = masterOrderPackingTable.row($(this).parents('tr')).data().id;
   let orc = masterOrderPackingTable.row($(this).parents('tr')).data().orc;
   let style = masterOrderPackingTable.row($(this).parents('tr')).data().style;
   let color = masterOrderPackingTable.row($(this).parents('tr')).data().color;

   $('#orc_modal2').html(': ' + orc);
   $('#style_modal2').html(': ' + style);
   $('#color_modal2').html(': ' + color);

   let masterOrderPackingAddCartonCapacityTable = $('#masterOrderPackingAddCartonCapacityTable').DataTable({
    // lengthChange: false,
    // buttons: ['copy', 'excel', 'pdf', 'print'],
    destroy: true,
    scrollX: true,
    paging: false,
    info: false,
    searching: false,
    ajax: {
     url: '<?= site_url("packing/getMasterOrderPackingDetails"); ?>',
     type: 'GET',
     dataType: 'JSON',
     data: {
      'id': id
     }
    },
    columns: [{
      'data': 'size',
      'className': 'text-center px-3 align-middle'
     },
     {
      'data': 'qty',
      'className': 'text-center px-3 align-middle'
     },
     {
      'className': 'text-center px-3 align-middle',
      'width': '150px',
      render: function(data, type, row) {
       return '<input type="number" id="carton_capacity_modal" class="form-control form-control-sm">';
      }
     }


    ],

    // footerCallback: function(row, data, start, end, display) {
    //  let api = this.api();

    //  // Remove the formatting to get integer data for summation
    //  let intVal = function(i) {
    //   return typeof i === 'string' ?
    //    i.replace(/[\$,]/g, '') * 1 :
    //    typeof i === 'number' ?
    //    i :
    //    0;
    //  };

    //  // Total over all pages
    //  total = api
    //   .column(1)
    //   .data()
    //   .reduce((a, b) => intVal(a) + intVal(b), 0);

    //  // Total over this page
    //  pageTotal = api
    //   .column(1, {
    //    page: 'current'
    //   })
    //   .data()
    //   .reduce((a, b) => intVal(a) + intVal(b), 0);

    //  // Update footer
    //  api.column(1).footer().innerHTML =
    //   total

    //  // Update footer
    //  // api.column(1).footer().innerHTML =
    //  //   total

    //  // Total over all pages
    //  total = api
    //   .column(2)
    //   .data()
    //   .reduce((a, b) => intVal(a) + intVal(b), 0);

    //  // Total over this page
    //  pageTotal = api
    //   .column(2, {
    //    page: 'current'
    //   })
    //   .data()
    //   .reduce((a, b) => intVal(a) + intVal(b), 0);

    //  // Update footer
    //  api.column(2).footer().innerHTML =
    //   total

    //  // Update footer
    //  // api.column(2).footer().innerHTML =
    //  //   total


    // }



   });



   $("#orderPackingAddCartonCapacityModal").modal("show");
   $("#orderPackingAddCartonCapacityModal").on("shown.bs.modal", function() {
    $('#masterOrderPackingAddCartonCapacityTable').DataTable().columns.adjust();
   });
  });


































 });
</script>