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

      <div class="row g-3 align-items-center mb-3">
       <div class="col-lg-6">
        <a href="<?= base_url('cutting/create_work_order'); ?>" type="button" class="btn btn-primary"><i class='bx bx-plus-circle'></i> Create Work Order</a>
       </div>
      </div>

      <div class="row mt-5">
       <div class="col-lg-12">
        <table id="workOrderTable" class="table table-striped table-bordered table-sm nowrap" style="width:100%">
         <thead>
          <th class="text-center">No</th>
          <th class="text-center">Date Created</th>
          <th class="text-center">Customer</th>
          <th class="text-center">Sales Order</th>
          <th class="text-center">Work Order</th>
          <th class="text-center">Qty WO</th>
          <th class="text-center">Allocation</th>
          <th class="text-center">Action</th>
         </thead>
         <!-- <tfoot>
          <th class="text-center" colspan='3'>Total Work Order</th>
          <th class="text-center">-</th>
          <th class="text-center" colspan="2"></th>
         </tfoot> -->
        </table>
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
 $(document).ready(function() {
  // Load Main Table
  $('#workOrderTable thead tr')
   .clone(true)
   .addClass('filters')
   .appendTo('#workOrderTable thead');
  workOrderTable = $('#workOrderTable').DataTable({
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
    url: '<?= site_url("cutting/getWorkOrderMain"); ?>',
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
     "width": "100px",
     'className': 'text-center px-3 align-middle'
    },
    {
     'data': 'customer_name',
     'className': 'text-center px-3 align-middle'
    },
    {
     'data': 'sales_order',
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
      return '<span class="badge text-bg-primary text-white" style="cursor: pointer;" id="btn_details">Details</span>';
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
   //   .column(3)
   //   .data()
   //   .reduce((a, b) => intVal(a) + intVal(b), 0);

   //  // Update footer
   //  api.column(3).footer().innerHTML =
   //   total;
   // }

  });


  // Click Action
  document.querySelector('#workOrderTable tbody').addEventListener('click', function(event) {
   //  Load Details
   if (event.target && event.target.id === 'btn_details') {
    let row = event.target.closest('tr');

    let table = $('#workOrderTable').DataTable();
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

   }

  });

 });
</script>