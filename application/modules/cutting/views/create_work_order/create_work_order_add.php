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
       <div class="row mb-4">
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
        <div class="col-lg-6">
         <div class="row">
          <div class="col-lg-8">
           <table id="sizeTable" class="table table-striped table-bordered table-sm nowrap" style="width:100%">
            <thead>
             <th class="text-center">Size</th>
             <th class="text-center">Qty Size</th>
             <th class="text-center">Qty Allocated</th>
             <th class="text-center">Qty Stock</th>
            </thead>
            <tfoot>
             <th class="text-center">Total</th>
             <th class="text-center">-</th>
             <th class="text-center">-</th>
             <th class="text-center">-</th>
            </tfoot>
           </table>
          </div>
         </div>
        </div>
       </div>

       <hr>

       <div class="row mt-3">
        <div class="col lg-12">
         <h6><b>Create Work Order</b></h6>
        </div>
       </div>

       <div class="row mt-5">
        <div class="col-lg-12">
         <div class="row g-3 mb-3">
          <!-- <div class="col-lg-1 d-flex align-items-center justify-content-center">
           <label class="col-form-label"><b>No.</b></label>
          </div> -->
          <div class="col-lg-2 d-flex align-items-center justify-content-center">
           <label class="col-form-label"><b>Work Order</b></label>
          </div>
          <div class="col-lg-1 d-flex align-items-center justify-content-center">
           <label class="col-form-label"><b>Size</b></label>
          </div>
          <div class="col-lg-1 d-flex align-items-center justify-content-center">
           <label class="col-form-label"><b>Qty Size</b></label>
          </div>
          <div class="col-lg-3 d-flex align-items-center justify-content-center">
           <label class="col-form-label"><b>Allocation</b></label>
          </div>
          <!-- <div class="col-lg-2 d-flex align-items-center justify-content-center">
           <label class="col-form-label"><b>Qty Allocation</b></label>
          </div> -->
         </div>

         <div id="work_order_row">
          <div class="row g-3 mb-3">
           <div class="col-lg-2">
            <label class="col-form-label d-flex align-items-center justify-content-center" id="work_order">-</label>
           </div>
           <div class="col-lg-2" id="add_size_row">
            <div class="row mb-2">
             <div class="col-lg-6">
              <label class="col-form-label d-flex align-items-center justify-content-center">-</label>
             </div>
             <div class="col-lg-6">
              <input type="text" class="form-control text-center" min="1" placeholder="0" disabled>
             </div>
            </div>
           </div>
           <div class="col-lg-3">
            <select class="form-control select2 allocation" id="allocation" disabled>
             <option value="">Select Line</option>
            </select>
           </div>
           <div class="col-lg-2">
            <button class="btn btn-primary" id="btn_save" disabled>Save</button>
           </div>
          </div>
          <div class="row g-3 mb-3">
           <div class="col-lg-2"></div>
           <div class="col-lg-2">
            <div class="row mb-2">
             <div class="col-lg-6">
              <label class="col-form-label d-flex align-items-center justify-content-center"><b>Total Allocation</b></label>
             </div>
             <div class="col-lg-6">
              <label class="col-form-label d-flex align-items-center justify-content-center" id="total_qty_size"><b>0</b></label>
             </div>
            </div>
           </div>
           <div class="col-lg-3"></div>
           <div class="col-lg-2"></div>
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
          <tfoot>
           <th class="text-center" colspan='3'>Total Work Order</th>
           <th class="text-center">-</th>
           <th class="text-center" colspan="2"></th>
          </tfoot>
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
<div class="modal fade" id="sizeDetailsModal" data-bs-keyboard="false" tabindex="-1" aria-hidden="true">
 <div class="modal-dialog">
  <div class="modal-content">
   <div class="modal-header">
    <h5 class="modal-title" id="bundle_title">Size Details</h5>
    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="btn_close_modal"></button>
   </div>
   <div class="modal-body" id="sizeDetailsModal_body">
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

     <div class="row mt-5">
      <div class="col-lg-12">
       <table id="sizeDetailsTable" class="table table-striped table-bordered table-sm nowrap" style="width:100%">
        <thead>
         <th class="text-center">Size</th>
         <th class="text-center">Qty Size</th>
        </thead>
        <tfoot>
         <th>Total</th>
         <th>-</th>
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


<script>
 $(document).ready(function() {
  $('.select2').select2({
   theme: "bootstrap-5",
   width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style'
  });
 });
</script>

<script>
 //  Load Sales Order (From Master Order Icons)
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

 loadSalesOrder();
 loadAllocation();

 // Reset Create Work Order Form Function 
 const resetCreateWorkOrderForm = () => {
  document.getElementById('work_order').innerHTML = '-';

  const container = document.getElementById('add_size_row');
  container.innerHTML = '';
  const row = document.createElement('div');
  row.className = 'row mb-2';

  row.innerHTML = `<div class="col-lg-6">
                         <label class="col-form-label d-flex align-items-center justify-content-center size">-</label>
                       </div>
                       <div class="col-lg-6">
                         <input type="text" class="form-control text-center qty_size" min="1" placeholder="0" value="" disabled>
                       </div>
                      `;

  container.appendChild(row);

  document.getElementById('allocation').disabled = true;
  document.getElementById('btn_save').disabled = true;

  $('#allocation').val(null).trigger('change');
  document.getElementById('total_qty_size').innerHTML = '0';

  createWorkOrderTable.clear().draw();
 }

 // Reset Function
 const resetAll = () => {
  document.getElementById('buyer').innerHTML = ': -';
  document.getElementById('style').innerHTML = ': -';
  document.getElementById('color').innerHTML = ': -';
  document.getElementById('qty_order').innerHTML = ': -';

  sizeTable.clear().draw();
 }

 // Size table
 let sizeTable;
 $(document).ready(function() {
  sizeTable = $('#sizeTable').DataTable({
   destroy: true,
   lengthChange: false,
   paging: false,
   info: false,
   searching: false,
   scrollX: true
  });

  $('#createWorkOrderTable thead tr')
   .clone(true)
   .addClass('filters')
   .appendTo('#createWorkOrderTable thead');

  createWorkOrderTable = $('#createWorkOrderTable').DataTable({
   destroy: true,
   scrollX: true,
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
  });

 });

 // Select Sales Order
 $('#sales_order').on('change', function() {
  const selectElement = document.getElementById("sales_order");

  const idOrder = selectElement.value;
  orc = selectElement.options[selectElement.selectedIndex].text;

  if (idOrder) {
   // Load Sales Order Details
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

     const data = result[0];


     if (idOrder) document.getElementById('id_order').value = idOrder;

     if (data.buyer) document.getElementById('buyer').innerHTML = ': ' + data.buyer;
     if (data.style) document.getElementById('style').innerHTML = ': ' + data.style;
     if (data.color) document.getElementById('color').innerHTML = ': ' + data.color;
     if (data.qty_order) document.getElementById('qty_order').innerHTML = ': ' + data.qty_order;
     if (data.qty_order) document.getElementById('qty_order_hidden').value = data.qty_order;


     sizeTable = $('#sizeTable').DataTable({
      destroy: true,
      lengthChange: false,
      paging: false,
      info: false,
      scrollX: true,
      searching: false,
      // scrollCollapse: true,
      // scrollY: '500px',
      ajax: {
       url: '<?= site_url("cutting/getSalesOrderSize"); ?>',
       type: 'GET',
       dataType: 'JSON',
       data: {
        idOrder: idOrder
       }
      },
      columns: [{
        'data': 'size',
        'className': 'text-center px-3 align-middle'
       },
       {
        'data': 'quantity',
        'className': 'text-center px-3 align-middle'
       },
       {
        'data': 'qty_size_allocated',
        'className': 'text-center px-3 align-middle'
       },
       {
        'data': 'qty_size_stock',
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

       // Update footer
       api.column(1).footer().innerHTML =
        total

       // Total over all pages
       total = api
        .column(2)
        .data()
        .reduce((a, b) => intVal(a) + intVal(b), 0);

       // Update footer
       api.column(2).footer().innerHTML =
        total

       // Total over all pages
       total = api
        .column(3)
        .data()
        .reduce((a, b) => intVal(a) + intVal(b), 0);

       // Update footer
       api.column(3).footer().innerHTML =
        total
      }

     });

     if (data.orc) document.getElementById('work_order').innerHTML = data.orc + '-' + data.incremented_work_order_code;

    })
    .catch(error => {
     console.error('Error fetching sales order details:', error);
    });

   // Load size
   fetch(`<?= site_url('cutting/getSalesOrderSizeCreate'); ?>?sales_order=${idOrderParam}`, {
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

     const container = document.getElementById('add_size_row');
     container.innerHTML = '';

     let total = 0;

     result.forEach(item => {
      const row = document.createElement('div');
      row.className = 'row mb-2';

      row.innerHTML = `<div class="col-lg-6">
                         <label class="col-form-label d-flex align-items-center justify-content-center size">${item.size}</label>
                       </div>
                       <div class="col-lg-6">
                         <input type="text" class="form-control text-center qty_size" min="1" placeholder="0" value="${item.qty_size_stock}">
                         <input type="hidden" value="${item.qty_size_stock}">
                       </div>
                      `;

      container.appendChild(row);

      total += parseInt(item.qty_size_stock, 10) || 0;
     });

     if (total == 0) {
      const qtySizeElements = document.getElementsByClassName('qty_size');
      for (let i = 0; i < qtySizeElements.length; i++) {
       qtySizeElements[i].disabled = true;
      }
      document.getElementById('btn_save').disabled = true;
      document.getElementById('allocation').disabled = true;
     } else {
      const qtySizeElements = document.getElementsByClassName('qty_size');
      for (let i = 0; i < qtySizeElements.length; i++) {
       qtySizeElements[i].disabled = false;
      }
      document.getElementById('btn_save').disabled = false;
      document.getElementById('allocation').disabled = false;
     }


     document.getElementById('total_qty_size').innerHTML = `<b>${total}</b>`;

     // Qty Size keypress
     $('.qty_size').keypress(function(e) {
      let charCode = (e.which) ? e.which : e.keyCode;
      if (charCode > 31 && (charCode < 48 || charCode > 57)) {
       return false;
      }
     });


     // Total Qty Size
     container.querySelectorAll('.qty_size').forEach((input, index) => {
      const hiddenInput = input.nextElementSibling;
      const maxStock = parseInt(hiddenInput.value, 10);

      input.addEventListener('input', () => {
       let value = parseInt(input.value, 10);

       if (isNaN(value) || value < 0) {
        input.value = '';
       } else if (value > maxStock) {
        input.value = maxStock; // Batasi ke stok maksimum
       }

       // Update total
       let total = 0;
       container.querySelectorAll('.qty_size').forEach(field => {
        const val = parseFloat(field.value);
        if (!isNaN(val)) {
         total += val;
        }
       });
       document.getElementById('total_qty_size').innerHTML = `<b>${total}</b>`;
      });
     });




    })
    .catch(error => {
     console.error('Error fetching sales order details:', error);
    });




   // Load Main Table
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
      // let cell = $('.filters th').eq($(api.column(colIdx).header()).index());
      // let title = $(cell).text();
      // $(cell).html('<input type="text" class="form-control form-control-sm text-center" placeholder="' + title + '" />');
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
     dataType: 'JSON',
     data: {
      idOrder: idOrder
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
      'data': 'created_at',
      "width": "100px",
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
     // {
     //  'className': 'text-center px-3 align-middle',
     //  render: function(data, type, row) {
     //   return '<span class="badge text-bg-primary text-white" style="cursor: pointer;" id="btn_details">Details</span> <span class="badge text-bg-danger text-white" style="cursor: pointer;" id="btn_delete">Delete</span>'
     //  }
     // },
     {
      'className': 'text-center px-3 align-middle',
      render: function(data, type, row, meta) {
       // Delete in last row (pending)
       let isLastRow = meta.row === meta.settings._iDisplayLength - 1 || meta.row === meta.settings.aoData.length - 1;

       let deleteBtn = isLastRow ? '<span class="badge text-bg-danger text-white" style="cursor: pointer;" id="btn_delete">Delete</span>' : '';
       return '<span class="badge text-bg-primary text-white" style="cursor: pointer;" id="btn_details">Details</span> ' + deleteBtn;
      }
     }


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
      .column(3)
      .data()
      .reduce((a, b) => intVal(a) + intVal(b), 0);

     // Update footer
     api.column(3).footer().innerHTML =
      total;
    }

   });


   // Click Action
   document.querySelector('#createWorkOrderTable tbody').addEventListener('click', function(event) {
    //  Load Details
    if (event.target && event.target.id === 'btn_details') {
     let row = event.target.closest('tr');

     let table = $('#createWorkOrderTable').DataTable();
     let data = table.row(row).data();

     let id_work_order = data.id;
     let work_order = data.work_order;
     let qty_allocation = data.qty_allocation;
     let allocation = data.allocation;

     if (work_order) document.getElementById('work_order_modal').innerHTML = ': ' + work_order;
     if (qty_allocation) document.getElementById('qty_allocation_modal').innerHTML = ': ' + qty_allocation;
     if (allocation) document.getElementById('allocation_modal').innerHTML = ': ' + allocation;

     let sizeDetailsTable = $('#sizeDetailsTable').DataTable({
      destroy: true,
      scrollX: true,
      ajax: {
       url: '<?= site_url("cutting/getSizeDetails"); ?>',
       type: 'GET',
       dataType: 'JSON',
       data: {
        id_work_order: id_work_order
       }
      },
      columns: [{
        'data': 'size',
        'className': 'text-center px-3 align-middle'
       },
       {
        'data': 'qty_size',
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

       // Update footer
       api.column(1).footer().innerHTML =
        total;
      }


     });

     let modal = new bootstrap.Modal(document.getElementById('sizeDetailsModal'));
     modal.show();

     // Focus after modal is shown
     document.getElementById('sizeDetailsModal').addEventListener('shown.bs.modal', function() {
      $('#sizeDetailsTable').DataTable().columns.adjust();
     }, {
      once: true
     });

    } else if (event.target && event.target.id === 'btn_delete') {
     let row = event.target.closest('tr');

     let table = $('#createWorkOrderTable').DataTable();
     let data = table.row(row).data();

     let id_order = data.id_order;
     let id_work_order = data.id;

     Swal.fire({
      title: 'Are you sure?',
      text: 'Do you want to delete this Work Order?',
      icon: 'question',
      showCancelButton: true,
      confirmButtonText: 'Yes',
      cancelButtonText: 'No',
     }).then((result) => {
      if (result.isConfirmed) {

       fetch("<?= site_url('cutting/deleteWorkOrder'); ?>", {
         method: "POST",
         headers: {
          'Content-Type': 'application/json'
         },
         body: JSON.stringify({
          id_work_order: id_work_order,
          id_order: id_order
         })
        })
        .then(response => response.json())
        .then(data => {

         sizeTable.ajax.reload();
         createWorkOrderTable.ajax.reload();

         Swal.fire({
          title: 'Success',
          text: 'Work Order deleted successfully.',
          icon: 'success',
          showCloseButton: false
         }).then(function() {

          // Renew Create Work Order Form
          let select = document.getElementById('sales_order');
          let orc = select.options[select.selectedIndex].text;

          if (data.work_order_code != null) {


           console.log('1')
           let currentChar = data.work_order_code;
           let nextChar = String.fromCharCode(currentChar.charCodeAt(0) + 1);
           data.work_order_code = nextChar;
           document.getElementById('work_order').innerHTML = orc + '-' + data.work_order_code;


          } else {
           console.log('2')
           document.getElementById('work_order').innerHTML = orc + '-A';
          }

          // Load Size 
          fetch(`<?= site_url('cutting/getSalesOrderSizeCreate'); ?>?sales_order=${idOrder}`, {
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

            const container = document.getElementById('add_size_row');
            container.innerHTML = '';

            let total = 0;

            result.forEach(item => {
             const row = document.createElement('div');
             row.className = 'row mb-2';

             row.innerHTML = `<div class="col-lg-6">
                         <label class="col-form-label d-flex align-items-center justify-content-center size">${item.size}</label>
                       </div>
                       <div class="col-lg-6">
                         <input type="text" class="form-control text-center qty_size" min="1" placeholder="0" value="${item.qty_size_stock}">
                         <input type="hidden" value="${item.qty_size_stock}">
                       </div>
                      `;

             container.appendChild(row);

             total += parseInt(item.qty_size_stock, 10) || 0;
            });

            // disable if total 0
            if (total == 0) {
             const qtySizeElements = document.getElementsByClassName('qty_size');
             for (let i = 0; i < qtySizeElements.length; i++) {
              qtySizeElements[i].disabled = true;
             }
             document.getElementById('btn_save').disabled = true;
             document.getElementById('allocation').disabled = true;
            } else {
             const qtySizeElements = document.getElementsByClassName('qty_size');
             for (let i = 0; i < qtySizeElements.length; i++) {
              qtySizeElements[i].disabled = false;
             }
             document.getElementById('btn_save').disabled = false;
             document.getElementById('allocation').disabled = false;
            }

            document.getElementById('total_qty_size').innerHTML = `<b>${total}</b>`;

            // Qty Size keypress
            $('.qty_size').keypress(function(e) {
             let charCode = (e.which) ? e.which : e.keyCode;
             if (charCode > 31 && (charCode < 48 || charCode > 57)) {
              return false;
             }
            });

            // Total Qty Size
            container.querySelectorAll('.qty_size').forEach((input, index) => {
             const hiddenInput = input.nextElementSibling;
             const maxStock = parseInt(hiddenInput.value, 10);

             input.addEventListener('input', () => {
              let value = parseInt(input.value, 10);

              if (isNaN(value) || value < 0) {
               input.value = '';
              } else if (value > maxStock) {
               input.value = maxStock; // Batasi ke stok maksimum
              }

              // Update total
              let total = 0;
              container.querySelectorAll('.qty_size').forEach(field => {
               const val = parseFloat(field.value);
               if (!isNaN(val)) {
                total += val;
               }
              });
              document.getElementById('total_qty_size').innerHTML = `<b>${total}</b>`;
             });
            });




           })
           .catch(error => {
            console.error('Error fetching sales order details:', error);
           });



         })
        })
        .catch(error => {
         Swal.fire({
          title: 'Error',
          text: 'An error occurred while saving the data. Please try again.',
          icon: 'error',
          showCloseButton: false
         }).then(function() {
          // saveButton.disabled = false;
          // saveButton.innerHTML = `Save`;
         })
        });


      } else {
       // saveButton.disabled = false;
       // saveButton.innerHTML = `Save`;
      }
     });
    }

   });




  } else {
   resetAll();
   resetCreateWorkOrderForm();
  }


 });

 // Button Save
 document.getElementById('btn_save').addEventListener('click', function() {
  const saveButton = document.getElementById('btn_save');
  saveButton.disabled = true;
  saveButton.innerHTML = `Processing...`;

  let id_order = document.getElementById('id_order').value;
  let select = document.getElementById('sales_order');
  let orc = select.options[select.selectedIndex].text;
  let work_order = document.getElementById('work_order').innerHTML;
  let allocation = document.getElementById('allocation').value;
  let qty_allocation = parseInt(document.getElementById('total_qty_size').textContent, 10)
  // let qty_order = parseInt(document.getElementById('qty_order_hidden').value, 10);
  // let total_qty_allocation = parseInt(document.getElementById('total_qty_allocation').textContent, 10);

  let size = [];
  document.querySelectorAll('.size').forEach(function(element) {
   if (element.innerHTML.trim() !== '') {
    size.push(element.innerHTML.trim());
   }
  });

  let qty_size = [];
  document.querySelectorAll('.qty_size').forEach(function(element) {
   if (element.value !== '') {
    qty_size.push(element.value);
   } else {
    qty_size.push(null);
   }
  });

  if (!id_order || size.length === 0 || qty_size.length === 0 || !allocation) {
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


  Swal.fire({
   title: 'Are you sure?',
   text: 'Do you want to save this Work Order?',
   icon: 'question',
   showCancelButton: true,
   confirmButtonText: 'Yes',
   cancelButtonText: 'No',
  }).then((result) => {
   if (result.isConfirmed) {

    fetch("<?= site_url('cutting/postWorkOrder'); ?>", {
      method: "POST",
      headers: {
       'Content-Type': 'application/json'
      },
      body: JSON.stringify({
       id_order: id_order,
       orc: orc,
       work_order: work_order,
       allocation: allocation,
       qty_allocation: qty_allocation,
       size: size,
       qty_size: qty_size,
      })
     })
     .then(response => response.json())
     .then(data => {

      sizeTable.ajax.reload();
      createWorkOrderTable.ajax.reload();

      Swal.fire({
       title: 'Success',
       text: 'Work Order created successfully.',
       icon: 'success',
       showCloseButton: false
      }).then(function() {
       saveButton.disabled = false;
       saveButton.innerHTML = `Save`;



       // Renew Create Work Order Form
       let select1 = document.getElementById('sales_order');
       let orc1 = select1.options[select.selectedIndex].text;

       if (data.work_order_code) {
        let currentChar = data.work_order_code;
        let nextChar = String.fromCharCode(currentChar.charCodeAt(0) + 1);
        data.work_order_code = nextChar;
        document.getElementById('work_order').innerHTML = orc1 + '-' + data.work_order_code;
       }

       // Load Size
       fetch(`<?= site_url('cutting/getSalesOrderSizeCreate'); ?>?sales_order=${id_order}`, {
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

         const container = document.getElementById('add_size_row');
         container.innerHTML = '';

         let total = 0;

         result.forEach(item => {
          const row = document.createElement('div');
          row.className = 'row mb-2';

          row.innerHTML = `<div class="col-lg-6">
                         <label class="col-form-label d-flex align-items-center justify-content-center size">${item.size}</label>
                       </div>
                       <div class="col-lg-6">
                         <input type="text" class="form-control text-center qty_size" min="1" placeholder="0" value="${item.qty_size_stock}">
                         <input type="hidden" value="${item.qty_size_stock}">
                       </div>
                      `;

          container.appendChild(row);

          total += parseInt(item.qty_size_stock, 10) || 0;
         });

         // disable if total 0
         if (total == 0) {
          const qtySizeElements = document.getElementsByClassName('qty_size');
          for (let i = 0; i < qtySizeElements.length; i++) {
           qtySizeElements[i].disabled = true;
          }
          document.getElementById('btn_save').disabled = true;
          document.getElementById('allocation').disabled = true;
         } else {
          const qtySizeElements = document.getElementsByClassName('qty_size');
          for (let i = 0; i < qtySizeElements.length; i++) {
           qtySizeElements[i].disabled = false;
          }
          document.getElementById('btn_save').disabled = false;
          document.getElementById('allocation').disabled = false;
         }

         document.getElementById('total_qty_size').innerHTML = `<b>${total}</b>`;

         // Qty Size keypress
         $('.qty_size').keypress(function(e) {
          let charCode = (e.which) ? e.which : e.keyCode;
          if (charCode > 31 && (charCode < 48 || charCode > 57)) {
           return false;
          }
         });

         // Total Qty Size
         container.querySelectorAll('.qty_size').forEach((input, index) => {
          const hiddenInput = input.nextElementSibling;
          const maxStock = parseInt(hiddenInput.value, 10);

          input.addEventListener('input', () => {
           let value = parseInt(input.value, 10);

           if (isNaN(value) || value < 0) {
            input.value = '';
           } else if (value > maxStock) {
            input.value = maxStock; // Batasi ke stok maksimum
           }

           // Update total
           let total = 0;
           container.querySelectorAll('.qty_size').forEach(field => {
            const val = parseFloat(field.value);
            if (!isNaN(val)) {
             total += val;
            }
           });
           document.getElementById('total_qty_size').innerHTML = `<b>${total}</b>`;
          });
         });




        })
        .catch(error => {
         console.error('Error fetching sales order details:', error);
        });


       $('#allocation').val(null).trigger('change');
       document.getElementById('total_qty_size').innerHTML = '<b>0</b>';
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


   } else {
    saveButton.disabled = false;
    saveButton.innerHTML = `Save`;
   }
  });

 });

 // Button Reset
 document.getElementById("btn_reset").addEventListener("click", function() {
  $('#sales_order').val(null).trigger('change');

  resetAll();
  resetCreateWorkOrderForm();
 });
</script>