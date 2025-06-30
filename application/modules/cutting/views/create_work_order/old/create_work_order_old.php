<!--start page wrapper -->
<div class="page-wrapper">
 <div class="page-content">
  <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
   <div class="breadcrumb-title pe-3">Cutting</div>
   <div class="ps-3">
    <nav aria-label="breadcrumb">
     <ol class="breadcrumb mb-0 p-0">
      <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
      </li>
      <li class="breadcrumb-item active" aria-current="page">Create Work Order</li>
     </ol>
    </nav>
   </div>
  </div>
  <h6 class="mb-0 text-uppercase">Create Work Order</h6>
  <hr />
  <div class="row">
   <div class="col-12 ">
    <div class="card rounded-4 w-100">
     <div class="card-body">

      <div class="row mx-2 mt-3">
       <div class="row mb-3">
        <div class="col-lg-12">
         <div class="row g-3 align-items-center mb-3">
          <div class="col-lg-1">
           <label for="sales_order" class="col-form-label">Sales Order <sup style="color: red;">*</sup></label>
          </div>
          <div class="col-lg-4">
           <select id="sales_order" class="form-control select2">
            <option value="">Select Sales Order</option>
           </select>
          </div>
          <div class="col-lg-3">
           <!-- <button class="btn btn-info" id="btn_reset">Submit</button> -->
           <button class="btn btn-outline-secondary" id="btn_reset">Reset</button>
          </div>
         </div>
        </div>
       </div>
       <div class="row">
        <div class="col-lg-6">
         <div class="row g-3 align-items-center mb-3">
          <div class="col-lg-2">
           <label for="buyer" class="col-form-label">Buyer</label>
          </div>
          <div class="col-lg-8">
           <input type="hidden" id="id_order">
           <label id="buyer" class="col-form-label">: -</label>
          </div>
         </div>

         <div class="row g-3 align-items-center mb-3">
          <div class="col-lg-2">
           <label for="style" class="col-form-label">Style</label>
          </div>
          <div class="col-lg-8">
           <label id="style" class="col-form-label">: -</label>
          </div>
         </div>
         <div class="row g-3 align-items-center mb-3">
          <div class="col-lg-2">
           <label for="color" class="col-form-label">Color</label>
          </div>
          <div class="col-lg-8">
           <label id="color" class="col-form-label">: -</label>
          </div>
         </div>
        </div>
        <div class="col-lg-6">
         <div class="row g-3 align-items-center mb-3">
          <div class="col-lg-2">
           <label for="po_number" class="col-form-label">PO Number</label>
          </div>
          <div class="col-lg-8">
           <label id="po_number" class="col-form-label">: -</label>
          </div>
         </div>
         <div class="row g-3 align-items-center mb-3">
          <div class="col-lg-2">
           <label for="etd" class="col-form-label">ETD</label>
          </div>
          <div class="col-lg-8">
           <label id="etd" class="col-form-label">: -</label>
          </div>
         </div>
         <div class="row g-3 align-items-center mb-3">
          <div class="col-lg-2">
           <label for="qty_order" class="col-form-label">Qty Sales Order</label>
          </div>
          <div class="col-lg-8">
           <label id="qty_order" class="col-form-label">: -</label>
           <input type="hidden" id="qty_order_hidden">
          </div>
         </div>
        </div>

        <div class="row mt-5" id="work_order_form">
         <div class="col-lg-12">
          <div class="row g-3 mb-3">
           <div class="col-lg-1 d-flex align-items-center justify-content-center">
            <label class="col-form-label"><b>No.</b></label>
           </div>
           <div class="col-lg-2 d-flex align-items-center justify-content-center">
            <label class="col-form-label"><b>Work Order</b></label>
           </div>
           <div class="col-lg-3 d-flex align-items-center justify-content-center">
            <label class="col-form-label"><b>Allocation</b></label>
           </div>
           <div class="col-lg-2 d-flex align-items-center justify-content-center">
            <label class="col-form-label"><b>Qty Allocation</b></label>
           </div>
          </div>

          <div id="work_order_row">
           <div class="row g-3 mb-3">
            <div class="col-lg-1">
             <label class="col-form-label d-flex align-items-center justify-content-center">1.</label>
            </div>
            <div class="col-lg-2">
             <label class="col-form-label d-flex align-items-center justify-content-center work_order" id="work_order_first">-</label>
            </div>
            <div class="col-lg-3">
             <select class="form-control select2 allocation" id="allocation_first">
              <option value="">Select Line</option>
             </select>
            </div>
            <div class="col-lg-2">
             <input type="text" class="form-control text-center qty_allocation" min="1" placeholder="0" id="qty_allocation_first">
            </div>
            <div class="col-lg-1 d-flex align-items-center justify-content-center">
             <button class="btn btn-primary" id="btn_add_row_allocation"><i class='bx bx-plus-circle ms-1'></i></button>
            </div>
           </div>
          </div>

          <div class="row g-3 mb-3">
           <div class="col-lg-3 d-flex align-items-center justify-content-center"></div>
           <div class="col-lg-3 d-flex align-items-center justify-content-center">
            <label class="col-form-label"><b>Total</b></label>
           </div>
           <div class="col-lg-2 d-flex align-items-center justify-content-center">
            <label class="col-form-label" id="total_qty_allocation"><b>0</b></label>
           </div>
          </div>

          <div class="row g-3 mb-3 mt-3">
           <div class="col-lg-1 ms-5">
            <button class="btn btn-primary" id="btn_save">Save</button>
           </div>
          </div>

         </div>
        </div>


        <div class="row mt-5">
         <div class="col-lg-12">
          <table id="createWorkOrderTable" class="table table-striped table-bordered table-sm nowrap" style="width:100%">
           <thead>
            <th class="text-center">No</th>
            <th class="text-center">Date Created</th>
            <th class="text-center">Work Order</th>
            <th class="text-center">Qty WO</th>
            <th class="text-center">Allocation</th>
            <th class="text-center">Action</th>
           </thead>
           <!-- <tfoot>
            <th class="text-center" colspan='3'>Total</th>
            <th class="text-center">-</th>
            <th class="text-center" colspan="2"></th>
           </tfoot> -->
          </table>
         </div>
        </div>
       </div>




      </div>
     </div>
    </div>



   </div><!--end row-->

  </div>
 </div>
 <!--end page wrapper -->


 <!-- Modal -->
 <div class="modal fade" id="setSizeModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-lg">
   <div class="modal-content">
    <div class="modal-header">
     <h5 class="modal-title" id="bundle_title">Set Size</h5>
     <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="btn_close_modal"></button>
    </div>
    <div class="modal-body" id="setSizeModal_body">
     <div class="mx-3">
      <div class="row align-items-center mb-2">
       <div class="col-lg-4">
        <label for="work_order_modal" class="col-form-label">Work Order</label>
       </div>
       <div class="col-lg-6">
        <label id="work_order_modal" class="col-form-label"></label>
       </div>
      </div>
      <div class="row align-items-center mb-2">
       <div class="col-lg-4">
        <label for="qty_allocation_modal" class="col-form-label">Qty WO</label>
       </div>
       <div class="col-lg-6">
        <label id="qty_allocation_modal" class="col-form-label"></label>
        <input type="hidden" id="qty_allocation_hidden_modal">
       </div>
      </div>
      <div class="row align-items-center mb-2">
       <div class="col-lg-4">
        <label for="allocation_modal" class="col-form-label">Allocation</label>
       </div>
       <div class="col-lg-6">
        <label id="allocation_modal" class="col-form-label"></label>
       </div>
      </div>

      <div class="row align-items-center mb-2">
       <div class="col-lg-4">
        <label for="stock_qty_wo_modal" class="col-form-label">Stock Qty WO</label>
       </div>
       <div class="col-lg-6">
        <label id="stock_qty_wo_modal" class="col-form-label"></label>
        <input type="hidden" id="stock_qty_wo_hidden_modal">
       </div>
      </div>

      <div class="row align-items-center mb-2">
       <div class="col-lg-4">
        <label for="size_modal" class="col-form-label">Size</label>
       </div>
       <div class="col-lg-6">
        <select class="form-control select2" id="size_modal"></select>
       </div>
      </div>
      <div class="row align-items-center mb-2">
       <div class="col-lg-4">
        <label for="qty_size_modal" class="col-form-label">Qty Size</label>
       </div>
       <div class="col-lg-4">
        <input type="number" id="qty_size_modal" class="form-control" placeholder="e.g 2000" min="0">
       </div>
      </div>
      <div class="row align-items-center mb-2 mt-4">
       <div class="col-lg-4"></div>
       <div class="col-lg-4">
        <button type="button" class="btn btn-primary" id="btn_save_set_size">Save</button>
       </div>
      </div>

      <div class="row mt-5">
       <div class="col-lg-12">
        <table id="setSizeTable" class="table table-striped table-bordered table-sm nowrap" style="width:100%">
         <thead>
          <th class="text-center">No</th>
          <th class="text-center">Size</th>
          <th class="text-center">Qty Size</th>
          <th class="text-center">Action</th>
         </thead>
         <tfoot>
          <th colspan="2">Total</th>
          <th>-</th>
          <th></th>
         </tfoot>
        </table>
       </div>
      </div>
     </div>

    </div>
   </div>
   <!-- <div class="modal-footer">
     <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
     <button type="button" class="btn btn-primary" id="btn_save_set_size">Save</button>
    </div> -->
  </div>
 </div>
</div>


<script>
 $(document).ready(function() {
  $('.select2').select2({
   theme: "bootstrap-5",
   width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style'
  });
 });
</script>

<script>
 document.getElementById("work_order_form").style.display = "none";

 //  Load Sales Order
 const loadSalesOrder = () => {
  const salesOrder = document.getElementById('sales_order');

  salesOrder.innerHTML = "<option>Loading...</option>";

  fetch("<?= site_url('cutting/getSalesOrder'); ?>")
   .then(response => response.json())
   .then(data => {

    salesOrder.innerHTML = "";

    const defaultOption = document.createElement('option');
    defaultOption.value = "";
    defaultOption.textContent = "Select ORC";
    salesOrder.appendChild(defaultOption);

    if (data.length > 0) {
     data.forEach(item => {
      const option = document.createElement('option');
      option.value = item.id_order;
      option.textContent = item.orc;
      salesOrder.appendChild(option);
     });
    }

   })
   .catch(error => {
    console.error('Error loading :', error);
    salesOrder.innerHTML = "<option>Error loading data</option>";
   })
 };

 loadSalesOrder();

 //  Load Allocation
 const loadAllocation = () => {
  const allocations = document.getElementsByClassName('allocation');

  Array.from(allocations).forEach(select => {
   select.innerHTML = "<option>Loading...</option>";
  });

  fetch("<?= site_url('cutting/getAllocation'); ?>")
   .then(response => response.json())
   .then(data => {
    Array.from(allocations).forEach(select => {
     select.innerHTML = "";

     const defaultOption = document.createElement('option');
     defaultOption.value = "";
     defaultOption.textContent = "Select Line";
     select.appendChild(defaultOption);

     if (data.length > 0) {
      data.forEach(item => {
       const option = document.createElement('option');
       option.value = item.id_line;
       option.textContent = item.name;
       select.appendChild(option);
      });
     }
    });
   })
   .catch(error => {
    console.error('Error loading:', error);
    Array.from(allocations).forEach(select => {
     select.innerHTML = "<option>Error loading data</option>";
    });
   });
 };


 loadAllocation();



 //  Load Allocation
 const loadSize = () => {
  const size = document.getElementById('size_modal');

  size.innerHTML = "<option>Loading...</option>";

  fetch("<?= site_url('cutting/get_size'); ?>")
   .then(response => response.json())
   .then(data => {

    size.innerHTML = "";

    const defaultOption = document.createElement('option');
    defaultOption.value = "";
    defaultOption.textContent = "Select Size";
    size.appendChild(defaultOption);

    if (data.length > 0) {
     data.forEach(item => {
      const option = document.createElement('option');
      option.value = item.size;
      option.textContent = item.size;
      size.appendChild(option);
     });
    }

   })
   .catch(error => {
    console.error('Error loading :', error);
    size.innerHTML = "<option>Error loading data</option>";
   })
 };

 let createWorkOrderTable
 $(document).ready(function() {
  $('#createWorkOrderTable thead tr')
   .clone(true)
   .addClass('filters')
   .appendTo('#createWorkOrderTable thead');

  createWorkOrderTable = $('#createWorkOrderTable').DataTable({
   // lengthChange: false,
   // buttons: ['copy', 'excel', 'pdf', 'print'],
   destroy: true,
   scrollX: true,
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
    url: '<?= site_url("cutting/getWorkOrder"); ?>',
    type: 'GET',
    dataType: 'JSON'
   },
   columns: [{
     "data": null,
     "orderable": true,
     "searchable": true,
     'className': 'text-center px-4 align-middle',
     "width": "50px",
     "render": function(data, type, row, meta) {
      return meta.row + meta.settings._iDisplayStart + 1;
     }
    },
    {
     'data': 'created_at',
     'className': 'text-center px-3 align-middle'
    },
    {
     'data': 'work_order',
     'className': 'text-center px-3 align-middle'
    },
    {
     'data': 'qty_allocation',
     'className': 'text-center px-3 align-middle'
    },
    {
     'data': 'allocation',
     'className': 'text-center px-3 align-middle'
    },
    {
     'className': 'text-center px-3 align-middle',
     render: function(data, type, row) {
      return '<span class="badge text-bg-primary text-white" style="cursor: pointer;" id="btn_set_size">Set Size</span>'
     }
    },

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
   //   .column(3)
   //   .data()
   //   .reduce((a, b) => intVal(a) + intVal(b), 0);

   //  // Update footer
   //  api.column(3).footer().innerHTML =
   //   total
   // }

  });


  // Button Set Size
  let id_work_order;
  let setSizeTable;

  // stock Function
  const stockFunction = () => {
   setSizeTable.on('xhr', function() {
    let data = setSizeTable.ajax.json().data;

    let totalQty = data.reduce((total, row) => {
     return total + parseInt(row.qty_size || 0);
    }, 0);

    let qty_allocation = document.getElementById('qty_allocation_hidden_modal').value;

    let stock = qty_allocation - totalQty;
    document.getElementById('stock_qty_wo_modal').innerHTML = ': ' + stock;
    document.getElementById('stock_qty_wo_hidden_modal').value = stock;

    if (stock <= 0) {
     document.getElementById('size_modal').disabled = true;
     document.getElementById('qty_size_modal').disabled = true;
     document.getElementById('btn_save_set_size').disabled = true;
     document.getElementById('btn_save_set_size').innerHTML = 'Save';
    } else {
     document.getElementById('size_modal').disabled = false;
     document.getElementById('qty_size_modal').disabled = false;
     document.getElementById('btn_save_set_size').disabled = false;
     document.getElementById('btn_save_set_size').innerHTML = 'Save';
    }
   });
  }

  // Click set size
  document.querySelector('#createWorkOrderTable tbody').addEventListener('click', function(event) {
   if (event.target && event.target.id === 'btn_set_size') {
    let row = event.target.closest('tr');

    let table = $('#createWorkOrderTable').DataTable();
    let data = table.row(row).data();

    id_work_order = data.id;
    let work_order = data.work_order;
    let qty_allocation = data.qty_allocation;
    let allocation = data.allocation;

    if (work_order) document.getElementById('work_order_modal').innerHTML = ': ' + work_order;
    if (qty_allocation) document.getElementById('qty_allocation_modal').innerHTML = ': ' + qty_allocation;
    if (allocation) document.getElementById('allocation_modal').innerHTML = ': ' + allocation;

    if (qty_allocation) document.getElementById('qty_allocation_hidden_modal').value = qty_allocation;

    loadSize();

    setSizeTable = $('#setSizeTable').DataTable({
     destroy: true,
     scrollX: true,
     ajax: {
      url: '<?= site_url("cutting/getSetSize"); ?>',
      type: 'GET',
      dataType: 'JSON',
      data: {
       id_work_order: id_work_order
      }
     },
     columns: [{
       "data": null,
       "orderable": true,
       "searchable": true,
       'className': 'text-center px-4 align-middle',
       "width": "50px",
       "render": function(data, type, row, meta) {
        return meta.row + meta.settings._iDisplayStart + 1;
       }
      },
      {
       'data': 'size',
       'className': 'text-center px-3 align-middle'
      },
      {
       'data': 'qty_size',
       'className': 'text-center px-3 align-middle'
      },
      {
       'className': 'text-center px-3 align-middle',
       render: function(data, type, row) {
        return '<span class="badge text-bg-danger text-white" style="cursor: pointer;" id="btn_delete_size">Delete</span>'
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

      // Update footer
      api.column(2).footer().innerHTML =
       total;
     }


    });

    stockFunction();


    document.getElementById('qty_size_modal').addEventListener('input', function() {
     let stock = document.getElementById('stock_qty_wo_hidden_modal').value;
     let value = this.value;

     if (value !== '' && value.indexOf('.') === -1) {
      this.value = Math.max(Math.min(value, stock), 0);
     }
    });




    let modal = new bootstrap.Modal(document.getElementById('setSizeModal'));
    modal.show();

    // Focus after modal is shown
    document.getElementById('setSizeModal').addEventListener('shown.bs.modal', function() {
     $('#setSizeTable').DataTable().columns.adjust();
    }, {
     once: true
    });


    // Button Delete
    document.querySelector('#setSizeTable tbody').addEventListener('click', function(event) {
     if (event.target && event.target.id === 'btn_delete_size') {
      let row = event.target.closest('tr');

      let table = $('#setSizeTable').DataTable();
      let data = table.row(row).data();

      let id_work_order_details = data.id;

      Swal.fire({
       icon: 'warning',
       title: 'Warning!',
       html: "Are you sure you want to delete this size ?",
       showCancelButton: true,
       confirmButtonText: 'Yes',
       cancelButtonText: 'No',
      }).then(function(result) {
       if (result.isConfirmed) {

        fetch("<?= site_url('cutting/deleteSize') ?>", {
          method: "POST",
          headers: {
           'Content-Type': 'application/json'
          },
          body: JSON.stringify({
           id_work_order_details: id_work_order_details
          })
         })
         .then(response => response.json())
         .then(data => {
          if (typeof setSizeTable !== 'undefined' && typeof setSizeTable.ajax !== 'undefined') {
           setSizeTable.ajax.reload();
          }

          stockFunction();

          Swal.fire({
           icon: 'success',
           title: 'Success!',
           text: 'Size deleted successfully.',
           timer: 1000,
           showCancelButton: false,
           showConfirmButton: false
          });
         })
         .catch(error => {
          console.error('Error:', error);
          Swal.fire({
           icon: 'error',
           title: 'Error!',
           text: 'Something went wrong.'
          });
         });
       }
      });


     }
    });
   }
  });


  // Button Save Set Size
  document.getElementById('btn_save_set_size').addEventListener('click', function() {
   const saveButton = document.getElementById('btn_save_set_size');
   saveButton.disabled = true;
   saveButton.innerHTML = `Processing...`;

   let size = document.getElementById('size_modal').value;
   let qty_size = document.getElementById('qty_size_modal').value;


   if (!size || !qty_size) {
    Swal.fire({
     title: 'Warning',
     text: 'There are fields that are not filled. Please complete all required fields.',
     icon: 'warning',
     showCloseButton: false
    }).then(function() {
     saveButton.disabled = false;
     saveButton.innerHTML = `Save`;
    });
    return;
   }


   fetch("<?= site_url('cutting/postSetSize'); ?>", {
     method: "POST",
     headers: {
      'Content-Type': 'application/json'
     },
     body: JSON.stringify({
      id_work_order: id_work_order,
      size: size,
      qty_size: qty_size
     })
    })
    .then(response => response.json())
    .then(data => {

     loadSize();
     document.getElementById('qty_size_modal').value = '';
     setSizeTable.ajax.reload();



     Swal.fire({
      title: 'Success',
      text: 'Size saved successfully.',
      icon: 'success',
      showCloseButton: false
     }).then(function() {
      stockFunction();
     })
    })
    .catch(error => {
     Swal.fire({
      title: 'Error',
      text: 'An error occurred while saving the data. Please try again.',
      icon: 'error',
      showCloseButton: false
     }).then(function() {
      saveButton.disabled = false;
      saveButton.innerHTML = `Save`;
     })
    });

  });




 });




 // Reset Function
 const resetAll = () => {
  document.getElementById('buyer').innerHTML = ': -';
  document.getElementById('style').innerHTML = ': -';
  document.getElementById('color').innerHTML = ': -';
  document.getElementById('po_number').innerHTML = ': -';
  document.getElementById('etd').innerHTML = ': -';
  document.getElementById('qty_order').innerHTML = ': -';

  document.getElementById('work_order_first').innerHTML = '-';
  $('#allocation_first').val(null).trigger('change');
  document.getElementById('qty_allocation_first').value = '';

  document.getElementById('total_qty_allocation').innerHTML = '<b>0</b>';

  const addedRows = document.getElementsByClassName('added_row');
  for (let i = 0; i < addedRows.length; i++) {
   addedRows[i].innerHTML = '';
  }

  i = 2;
  j = 2;
  alphabet = 'B'

  document.getElementById("work_order_form").style.display = "none";

  // createWorkOrderTable.clear().draw();

  // location.reload();
 }




 // Select Sales Order
 let orc = '';
 $('#sales_order').on('change', function() {
  const selectElement = document.getElementById("sales_order");

  const idOrder = selectElement.value;
  orc = selectElement.options[selectElement.selectedIndex].text;

  if (idOrder) {

   const idOrderParam = encodeURIComponent(idOrder);
   fetch(`<?= site_url('cutting/getSalesOrderDetails'); ?>?sales_order=${idOrderParam}`, {
     method: 'GET',
     headers: {
      'Content-Type': 'application/json'
     }
    })
    .then(response => {
     if (!response.ok) {
      throw new Error('Network response was not ok');
     }
     return response.json();
    })
    .then(result => {
     document.getElementById("work_order_form").style.display = "block";

     const data = result[0];

     if (idOrder) document.getElementById('id_order').value = idOrder;

     if (data.buyer) document.getElementById('buyer').innerHTML = ': ' + data.buyer;
     if (data.style) document.getElementById('style').innerHTML = ': ' + data.style;
     if (data.color) document.getElementById('color').innerHTML = ': ' + data.color;
     if (data.po_number) document.getElementById('po_number').innerHTML = ': ' + data.po_number;
     if (data.etd) document.getElementById('etd').innerHTML = ': ' + data.etd;
     if (data.qty_order) document.getElementById('qty_order').innerHTML = ': ' + data.qty_order;
     if (data.qty_order) document.getElementById('qty_order_hidden').value = data.qty_order;

     if (data.orc) document.getElementById('work_order_first').innerHTML = data.orc + '-A';





    })
    .catch(error => {
     console.error('Error fetching sales order details:', error);
    });

  } else {
   resetAll();
  }


 });

 // Qty Allocation keypress
 $('.qty_allocation').keypress(function(e) {
  let charCode = (e.which) ? e.which : e.keyCode;
  if (charCode > 31 && (charCode < 48 || charCode > 57)) {
   return false;
  }
 });

 // Total Qty Allocation
 document.querySelectorAll('.qty_allocation').forEach(input => {
  input.addEventListener('input', () => {
   let total = 0;
   document.querySelectorAll('.qty_allocation').forEach(field => {
    const value = parseFloat(field.value);
    if (!isNaN(value)) {
     total += value;
    }
   });
   document.getElementById('total_qty_allocation').innerHTML = `<b>${total}</b>`;
  });
 });





 // Add button
 let i = 2;
 let j = 2;
 let k;
 let alphabet = 'B'
 $('#btn_add_row_allocation').click(function() {
  $('#work_order_row').append(`<div class="row g-3 mb-3 added_row" >
                           <div class="col-lg-1">
                            <label class="col-form-label d-flex align-items-center justify-content-center">${i}.</label>
                           </div>
                           <div class="col-lg-2">
                            <label class="col-form-label d-flex align-items-center justify-content-center work_order">${orc}-${alphabet}</label>
                           </div>
                           <div class="col-lg-3">
                            <select class="form-control select2 allocation" id='allocation_${i}'>
                             <option value="">Select Line</option>
                            </select>
                           </div>
                           <div class="col-lg-2">
                            <input type="text" class="form-control text-center qty_allocation" min="1" placeholder="0">
                           </div>
                          </div>`);
  i++;
  alphabet = String.fromCharCode(alphabet.charCodeAt(0) + 1);

  $('.select2').select2({
   theme: 'bootstrap-5',
   width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style',
  });

  const select = document.querySelector(`#allocation_${j}`);
  select.innerHTML = '';

  const loadingOption = document.createElement('option');
  loadingOption.textContent = 'Loading...';
  select.appendChild(loadingOption);

  fetch("<?= site_url('cutting/getAllocation'); ?>", {
    method: 'GET',
    headers: {
     'Accept': 'application/json'
    }
   })
   .then(response => {
    if (!response.ok) {
     throw new Error('Network response was not ok');
    }
    return response.json();
   })
   .then(data => {
    select.innerHTML = '';

    // Add default option
    const defaultOption = document.createElement('option');
    defaultOption.value = '';
    defaultOption.textContent = 'Select Line';
    select.appendChild(defaultOption);

    const k = j;
    j++;

    data.forEach(item => {
     const option = document.createElement('option');
     option.value = item.id_line;
     option.textContent = item.name;
     document.querySelector(`#allocation_${k}`).appendChild(option);
    });
   })
   .catch(error => {
    console.error('Fetch error:', error);
   });


  $('.qty_allocation').keypress(function(e) {
   let charCode = (e.which) ? e.which : e.keyCode;
   if (charCode > 31 && (charCode < 48 || charCode > 57)) {
    return false;
   }
  });



  document.querySelectorAll('.qty_allocation').forEach(input => {
   input.addEventListener('input', () => {
    let total = 0;
    document.querySelectorAll('.qty_allocation').forEach(field => {
     const value = parseFloat(field.value);
     if (!isNaN(value)) {
      total += value;
     }
    });
    document.getElementById('total_qty_allocation').innerHTML = `<b>${total}</b>`;
   });
  });



 });

 // Remove list button
 // $('#work_order_row').on('click', '.btn_remove_row_allocation', function(e) {
 //  e.preventDefault();
 //  $(this).parents('.added_row').remove();
 // });



 // Button Save
 document.getElementById('btn_save').addEventListener('click', function() {
  const saveButton = document.getElementById('btn_save');
  saveButton.disabled = true;
  saveButton.innerHTML = `Processing...`;

  let id_order = document.getElementById('id_order').value;
  let qty_order = parseInt(document.getElementById('qty_order_hidden').value, 10);
  let total_qty_allocation = parseInt(document.getElementById('total_qty_allocation').textContent, 10);

  let work_order = [];
  document.querySelectorAll('.work_order').forEach(function(element) {
   if (element.innerHTML.trim() !== '') {
    work_order.push(element.innerHTML.trim());
   }
  });


  let allocation = [];
  document.querySelectorAll('.allocation').forEach(function(element) {
   if (element.value !== '') {
    allocation.push(element.value);
   }
  });

  let qty_allocation = [];
  document.querySelectorAll('.qty_allocation').forEach(function(element) {
   if (element.value !== '') {
    qty_allocation.push(element.value);
   }
  });


  if (!id_order || !work_order || allocation.length === 0 || qty_allocation.length === 0) {
   Swal.fire({
    title: 'Warning',
    text: 'There are fields that are not filled. Please complete all required fields.',
    icon: 'warning',
    showCloseButton: false
   }).then(function() {
    saveButton.disabled = false;
    saveButton.innerHTML = `Save`;
   });
   return;
  }

  if (qty_order !== total_qty_allocation) {
   Swal.fire({
    title: 'Warning',
    text: "The allocated quantity does't match the sales quantity",
    icon: 'warning',
    showCloseButton: false
   }).then(function() {
    saveButton.disabled = false;
    saveButton.innerHTML = `Save`;
   });
   return;
  }

  // fetch("<?= site_url('cutting/postWorkOrder'); ?>", {
  //   method: "POST",
  //   headers: {
  //    'Content-Type': 'application/json'
  //   },
  //   body: JSON.stringify({
  //    id_order: id_order,
  //    work_order: work_order,
  //    allocation: allocation,
  //    qty_allocation: qty_allocation
  //   })
  //  })
  //  .then(response => response.json())
  //  .then(data => {

  //   loadSalesOrder();
  //   resetAll();
  //   createWorkOrderTable.ajax.reload();

  //   Swal.fire({
  //    title: 'Success',
  //    text: 'Work Order created successfully.',
  //    icon: 'success',
  //    showCloseButton: false
  //   }).then(function() {
  //    saveButton.disabled = false;
  //    saveButton.innerHTML = `Save`;
  //   })
  //  })
  //  .catch(error => {
  //   Swal.fire({
  //    title: 'Error',
  //    text: 'An error occurred while saving the data. Please try again.',
  //    icon: 'error',
  //    showCloseButton: false
  //   }).then(function() {
  //    saveButton.disabled = false;
  //    saveButton.innerHTML = `Save`;
  //   })
  //  });

 });






 // Button Reset
 document.getElementById("btn_reset").addEventListener("click", function() {
  $('#sales_order').val(null).trigger('change');
  resetAll();
 });
</script>