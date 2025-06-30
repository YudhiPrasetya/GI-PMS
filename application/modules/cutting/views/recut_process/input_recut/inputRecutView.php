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

 @media (min-width: 768px) {
  .modal-xl {
   width: 90%;
   max-width: 1500px;
  }
 }
</style>

<!--start page wrapper -->
<div class="page-wrapper">
 <div class="page-content">

  <!--breadcrumb-->
  <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
   <div class="breadcrumb-title pe-3">Process</div>
   <div class="ps-3">
    <nav aria-label="breadcrumb">
     <ol class="breadcrumb mb-0 p-0">
      <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
      </li>
      <li class="breadcrumb-item active" aria-current="page">Input Recut</li>
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
  <h6 class="mb-0 text-uppercase">Input Recut</h6>
  <hr />


  <div class="card">
   <div class="card-body">
    <div class="row my-3 mx-2">


     <div class="col-sm-10"></div>
     <div class="col-sm-2 text-end">
      <button id="unscanned" type="button" class="btn btn-info position-relative" title="Waiting List Ticket"><i class='bx bxs-bell align-middle'></i><span class="position-absolute top-0 start-100 translate-middle badge border border-light rounded-circle bg-danger p-2" id="countUnscannedBarcode"><span class="visually-hidden">unread messages</span></span>
      </button>
     </div>


     <div class="form-group mb-5">
      <label for="barcode" class="form-label">Scan Bundle Record</label>
      <input type="text" class="form-control" id="barcode" placeholder="Scan barcode here.." autocomplete="off" required>
     </div>

     <div class="row mb-3 mt-4">
      <div class="col-lg-12">
       <button class="btn btn-info btn-sm me-2" id="btn_on_progress" disabled>On Progress</button>
       <button class="btn btn-outline-info btn-sm  me-2" id="btn_complete">Complete</button>
      </div>
     </div>


     <!-- <div class="table-responsive"> -->
     <table id="inputRecutTable" class="table table-striped table-bordered table-sm nowrap" style="width:100%">
      <thead>
       <tr>
        <th>No.</th>
        <th>Sequence Numb.</th>
        <th>Request Date</th>
        <th>Barcode</th>
        <th>Line</th>
        <th>Style</th>
        <th>Buyer</th>
        <th>ORC</th>
        <th>Color</th>
        <th>No. Bundle</th>
        <th>Size</th>
        <th>Item</th>
        <th>Part</th>
        <th>Qty Recut</th>
        <th>Remarks</th>
        <th>Other Part</th>
        <th>Defect Code</th>
        <th>Defect Desc</th>
        <th>Other Defect Desc</th>
        <th>Input Cutting Date</th>
        <th>Output Cutting Date</th>
        <th>Status</th>
       </tr>
      </thead>
      <tfoot>
       <th colspan="13">Total Qty</th>
       <th></th>
       <th colspan="8"></th>
      </tfoot>

     </table>

     <div class="col-sm-6 mt-3">
      <button type="button" id="btn_print_selected" class="btn btn-gradient-info" disabled><i class='bx bx-printer'></i> Print Selected</button>
     </div>
     <!-- </div> -->
    </div>


   </div>
  </div>


 </div>
</div>
<!--end page wrapper -->

<!-- Modal -->
<!-- Button Notification -->
<div class="modal fade" id="unscannedBarcodeModal" tabindex="-1" aria-labelledby="unscannedBarcodeModalLabel" aria-hidden="true">
 <div class="modal-dialog modal-xl">
  <div class="modal-content">
   <div class="modal-header">
    <h5 class="modal-title" id="unscannedBarcodeModalLabel">Waiting List Ticket</h5>
    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
   </div>
   <div class="modal-body">
    <div class="mx-2">
     <div class="row mb-3 mt-2">
      <div class="col-lg-12">
       <button class="btn btn-info btn-sm me-2" id="btn_waiting" disabled>Waiting</button>
       <button class="btn btn-outline-danger btn-sm  me-2" id="btn_rejected">Rejected</button>
      </div>
     </div>

     <table id="unscannedBarcodeTable" class="table table-striped table-bordered table-sm nowrap" style="width:100%">
      <thead>
       <th>No.</th>
       <th>Sequence Numb.</th>
       <th>Request Date</th>
       <th>Barcode</th>
       <th>Line</th>
       <th>Style</th>
       <th>Buyer</th>
       <th>ORC</th>
       <th>Color</th>
       <th>No. Bundle</th>
       <th>Size</th>
       <th>Item</th>
       <th>Part</th>
       <th>Qty Recut</th>
       <th>Remarks</th>
       <th>Other Part</th>
       <th>Defect Code</th>
       <th>Defect Desc</th>
       <th>Other Defect Desc</th>
       <th>Action</th>
       <th>Reject Remarks</th>
      </thead>
      <tfoot>
       <th colspan="13">Total Qty</th>
       <th></th>
       <th colspan="6"></th>
      </tfoot>
     </table>
    </div>
   </div>
  </div>
 </div>
</div>

<!-- Modal -->
<div class="modal fade" id="rejectRemarksModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="rejectRemarksModalLabel" aria-hidden="true" style="background: 
    rgba(0,0,0,0.5);">
 <div class="modal-dialog modal-dialog-centered modal-lg">
  <div class="modal-content">
   <div class="modal-header">
    <h1 class="modal-title fs-5" id="rejectRemarksModalLabel">Reject Remarks</h1>
    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
   </div>
   <div class="modal-body">
    <div class="mb-3 mx-2">
     <div class="row g-3 align-items-center mb-3">
      <div class="col-lg-2">
       <label for="barcode_modal" class="col-form-label">Barcode</label>
      </div>
      <div class="col-lg-7">
       <label id="barcode_modal" class="col-form-label"></label>
      </div>
     </div>

     <label for="reject_remarks_modal" class="form-label">Remarks</label>
     <textarea class="form-control" placeholder="..." id="reject_remarks_modal" style="height: 100px"></textarea>
    </div>
   </div>
   <div class="modal-footer">
    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
    <button type="button" class="btn btn-danger" id="btn_reject_remarks">Reject</button>
   </div>
  </div>
 </div>
</div>



<script>
 $(document).ready(function() {
  const sweet_loader = '<div class="sweet_loader"><svg viewBox="0 0 140 140" width="140" height="140"><g class="outline"><path d="m 70 28 a 1 1 0 0 0 0 84 a 1 1 0 0 0 0 -84" stroke="rgba(0,0,0,0.1)" stroke-width="4" fill="none" stroke-linecap="round" stroke-linejoin="round"></path></g><g class="circle"><path d="m 70 28 a 1 1 0 0 0 0 84 a 1 1 0 0 0 0 -84" stroke="#71BBFF" stroke-width="4" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-dashoffset="200" stroke-dasharray="300"></path></g></svg></div>';

  $('#barcode').focus();

  // Input Recut Table
  $('#inputRecutTable thead tr')
   .clone(true)
   .addClass('filters')
   .appendTo('#inputRecutTable thead');
  // Main Table
  let inputRecutTable = $('#inputRecutTable').DataTable({
   // lengthChange: false,
   // buttons: ['copy', 'excel', 'pdf', 'print'],
   scrollX: true,
   paging: false,
   scrollCollapse: true,
   scrollY: '500px',
   destroy: true,
   select: {
    style: 'multi'
   },
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
    url: '<?= site_url('cutting/getInputRecut'); ?>',
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
     'className': 'text-center px-2',
     render: function(data, type, row, meta) {
      if (row['sequence_number'] != null) {
       if (row['sequence_number'] < 100) {
        return (row['sequence_number'] < 10) ? "00" + row['sequence_number'] : "0" + row['sequence_number'];
       } else {
        return row['sequence_number'];
       }
      } else {
       return "";
      }
     }
    },
    {
     'data': 'created_date',
     'className': 'text-center px-2'
    },
    {
     'data': 'barcode',
     'className': 'text-center px-2'
    },
    {
     'data': 'line',
     'className': 'text-center px-2'
    },
    {
     'data': 'style',
     'className': 'text-center px-2'
    },
    {
     'data': 'buyer',
     'className': 'text-center px-2'
    },
    {
     'data': 'orc',
     'className': 'text-center px-2'
    },
    {
     'data': 'color',
     'className': 'text-center px-2'
    },
    {
     'data': 'no_bundle',
     'className': 'text-center px-2'
    },
    {
     'data': 'size',
     'className': 'text-center px-2'
    },
    {
     'data': 'item_desc',
     'className': 'text-center px-2'
    },
    {
     'data': 'part_desc',
     'className': 'text-center px-2'
    },
    {
     'data': 'qty',
     'className': 'text-center px-2'
    },
    {
     'data': 'remarks',
     'className': 'text-center px-2'
    },
    {
     'data': 'other_item_part_desc',
     'className': 'text-center px-2'
    },
    {
     'className': 'text-center px-2',
     render: function(data, type, row, meta) {
      if (row['defect_code'] != null) {
       return (row['defect_code'] < 10) ? "D-0" + row['defect_code'] : "D-" + row['defect_code'];
      } else {
       return "";
      }
     }
    },
    {
     'data': 'defect_desc',
     'className': 'text-center px-2'
    },
    {
     'data': 'other_defect_desc',
     'className': 'text-center px-2'
    },
    {
     'data': 'input_date',
     'className': 'text-center px-2'
    },
    {
     'data': 'output_date',
     'className': 'text-center px-2'
    },
    {
     'className': 'text-center px-2',
     render: function(data, type, row) {
      if (row['input_date'] != null && row['output_date'] == null) {
       return "<i class='bx bx-recycle' style='color: #9ca3af'></i> <b>On Progress</b>"
      } else if (row['input_date'] != null && row['output_date'] != null) {
       return "<i class='bx bx-check-circle' style='color: #22c55e'></i> <b>Complete</b>"
      } else {
       return ""
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
     .column(13)
     .data()
     .reduce((a, b) => intVal(a) + intVal(b), 0);

    // Total over this page
    pageTotal = api
     .column(13, {
      page: 'current'
     })
     .data()
     .reduce((a, b) => intVal(a) + intVal(b), 0);

    // Update footer
    api.column(13).footer().innerHTML =
     pageTotal + ' ( ' + total + ' )';

    // Update footer
    // api.column(6).footer().innerHTML =
    //   total
   }




  });

  $('#btn_on_progress').on('click', function() {
   $('#btn_on_progress').removeClass('btn-outline-info');
   $('#btn_on_progress').addClass('btn-info');
   $('#btn_on_progress').prop('disabled', true);

   $('#btn_complete').removeClass('btn-info');
   $('#btn_complete').addClass('btn-outline-info');
   $('#btn_complete').prop('disabled', false);

   inputRecutTable.clear().draw();

   inputRecutTable = $('#inputRecutTable').DataTable({
    // lengthChange: false,
    // buttons: ['copy', 'excel', 'pdf', 'print'],
    scrollX: true,
    paging: false,
    scrollCollapse: true,
    scrollY: '500px',
    destroy: true,
    select: {
     style: 'multi'
    },
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
     url: '<?= site_url('cutting/getInputRecut'); ?>',
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
      'className': 'text-center px-2',
      render: function(data, type, row, meta) {
       if (row['sequence_number'] != null) {
        if (row['sequence_number'] < 100) {
         return (row['sequence_number'] < 10) ? "00" + row['sequence_number'] : "0" + row['sequence_number'];
        } else {
         return row['sequence_number'];
        }
       } else {
        return "";
       }
      }
     },
     {
      'data': 'created_date',
      'className': 'text-center px-2'
     },
     {
      'data': 'barcode',
      'className': 'text-center px-2'
     },
     {
      'data': 'line',
      'className': 'text-center px-2'
     },
     {
      'data': 'style',
      'className': 'text-center px-2'
     },
     {
      'data': 'buyer',
      'className': 'text-center px-2'
     },
     {
      'data': 'orc',
      'className': 'text-center px-2'
     },
     {
      'data': 'color',
      'className': 'text-center px-2'
     },
     {
      'data': 'no_bundle',
      'className': 'text-center px-2'
     },
     {
      'data': 'size',
      'className': 'text-center px-2'
     },
     {
      'data': 'item_desc',
      'className': 'text-center px-2'
     },
     {
      'data': 'part_desc',
      'className': 'text-center px-2'
     },
     {
      'data': 'qty',
      'className': 'text-center px-2'
     },
     {
      'data': 'remarks',
      'className': 'text-center px-2'
     },
     {
      'data': 'other_item_part_desc',
      'className': 'text-center px-2'
     },
     {
      'className': 'text-center px-2',
      render: function(data, type, row, meta) {
       if (row['defect_code'] != null) {
        return (row['defect_code'] < 10) ? "D-0" + row['defect_code'] : "D-" + row['defect_code'];
       } else {
        return "";
       }
      }
     },
     {
      'data': 'defect_desc',
      'className': 'text-center px-2'
     },
     {
      'data': 'other_defect_desc',
      'className': 'text-center px-2'
     },
     {
      'data': 'input_date',
      'className': 'text-center px-2'
     },
     {
      'data': 'output_date',
      'className': 'text-center px-2'
     },
     {
      'className': 'text-center px-2',
      render: function(data, type, row) {
       if (row['input_date'] != null && row['output_date'] == null) {
        return "<i class='bx bx-recycle' style='color: #9ca3af'></i> <b>On Progress</b>"
       } else if (row['input_date'] != null && row['output_date'] != null) {
        return "<i class='bx bx-check-circle' style='color: #22c55e'></i> <b>Complete</b>"
       } else {
        return ""
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
      .column(13)
      .data()
      .reduce((a, b) => intVal(a) + intVal(b), 0);

     // Total over this page
     pageTotal = api
      .column(13, {
       page: 'current'
      })
      .data()
      .reduce((a, b) => intVal(a) + intVal(b), 0);

     // Update footer
     api.column(13).footer().innerHTML =
      pageTotal + ' ( ' + total + ' )';

     // Update footer
     // api.column(6).footer().innerHTML =
     //   total
    }




   });
  });

  $('#btn_complete').on('click', function() {
   $('#btn_complete').removeClass('btn-outline-info');
   $('#btn_complete').addClass('btn-info');
   $('#btn_complete').prop('disabled', true);

   $('#btn_on_progress').removeClass('btn-info');
   $('#btn_on_progress').addClass('btn-outline-info');
   $('#btn_on_progress').prop('disabled', false);

   inputRecutTable.clear().draw();
   inputRecutTable = $('#inputRecutTable').DataTable({
    // lengthChange: false,
    // buttons: ['copy', 'excel', 'pdf', 'print'],
    scrollX: true,
    destroy: true,
    select: {
     style: 'multi'
    },
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
     url: '<?= site_url('cutting/getInputRecutComplete'); ?>',
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
      'className': 'text-center px-2',
      render: function(data, type, row, meta) {
       if (row['sequence_number'] != null) {
        if (row['sequence_number'] < 100) {
         return (row['sequence_number'] < 10) ? "00" + row['sequence_number'] : "0" + row['sequence_number'];
        } else {
         return row['sequence_number'];
        }
       } else {
        return "";
       }
      }
     },
     {
      'data': 'created_date',
      'className': 'text-center px-2'
     },
     {
      'data': 'barcode',
      'className': 'text-center px-2'
     },
     {
      'data': 'line',
      'className': 'text-center px-2'
     },
     {
      'data': 'style',
      'className': 'text-center px-2'
     },
     {
      'data': 'buyer',
      'className': 'text-center px-2'
     },
     {
      'data': 'orc',
      'className': 'text-center px-2'
     },
     {
      'data': 'color',
      'className': 'text-center px-2'
     },
     {
      'data': 'no_bundle',
      'className': 'text-center px-2'
     },
     {
      'data': 'size',
      'className': 'text-center px-2'
     },
     {
      'data': 'item_desc',
      'className': 'text-center px-2'
     },
     {
      'data': 'part_desc',
      'className': 'text-center px-2'
     },
     {
      'data': 'qty',
      'className': 'text-center px-2'
     },
     {
      'data': 'remarks',
      'className': 'text-center px-2'
     },
     {
      'data': 'other_item_part_desc',
      'className': 'text-center px-2'
     },
     {
      'className': 'text-center px-2',
      render: function(data, type, row, meta) {
       if (row['defect_code'] != null) {
        return (row['defect_code'] < 10) ? "D-0" + row['defect_code'] : "D-" + row['defect_code'];
       } else {
        return "";
       }
      }
     },
     {
      'data': 'defect_desc',
      'className': 'text-center px-2'
     },
     {
      'data': 'other_defect_desc',
      'className': 'text-center px-2'
     },
     {
      'data': 'input_date',
      'className': 'text-center px-2'
     },
     {
      'data': 'output_date',
      'className': 'text-center px-2'
     },
     {
      'className': 'text-center px-2',
      render: function(data, type, row) {
       if (row['input_date'] != null && row['output_date'] == null) {
        return "<i class='bx bx-recycle' style='color: #9ca3af'></i> <b>On Progress</b>"
       } else if (row['input_date'] != null && row['output_date'] != null) {
        return "<i class='bx bx-check-circle' style='color: #22c55e'></i> <b>Complete</b>"
       } else {
        return ""
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
      .column(13)
      .data()
      .reduce((a, b) => intVal(a) + intVal(b), 0);

     // Total over this page
     pageTotal = api
      .column(13, {
       page: 'current'
      })
      .data()
      .reduce((a, b) => intVal(a) + intVal(b), 0);

     // Update footer
     api.column(13).footer().innerHTML =
      pageTotal + ' ( ' + total + ' )';

     // Update footer
     // api.column(6).footer().innerHTML =
     //   total
    }




   });
  });

  inputRecutTable.on('select deselect', function() {
   let selectedRows = inputRecutTable.rows({
    selected: true
   }).count();

   if (selectedRows > 0) {
    $("#btn_print_selected").prop('disabled', false);
   } else {
    $("#btn_print_selected").prop('disabled', true);
   }
  });


  let scanBarcodeValueTable;
  $('#barcode').keypress(function(e) {
   if (e.keyCode == 13) {
    e.preventDefault();

    let full_barcode = $('#barcode').val();
    let barcodeUpper = full_barcode.toUpperCase();
    let barcodeSplit = barcodeUpper.split("_");
    let barcode = barcodeSplit[1];


    if (full_barcode == '') {
     Swal.fire({
      icon: "warning",
      title: "Warning!",
      text: "Please enter the barcode.",
      showConfirmButton: false,
      timer: 750
     });
    } else {
     // swal.fire({
     //   html: '<h5>Loading...</h5>',
     //   showConfirmButton: false,
     //   didOpen: function() {
     //     $('.swal2-html-container').prepend(sweet_loader);
     //   }
     // });
     // $('#barcode').prop('disabled', true);
     checkBarcodeExist(barcode);
    }




   }
  });

  function checkBarcodeExist(barcode) {
   $.ajax({
    url: '<?= site_url("cutting/getCheckBarcodeRecutCutting"); ?>',
    type: 'GET',
    dataType: 'JSON',
    data: {
     "barcode": barcode
    },
    success: function(result) {

     if (result == 404) {
      Swal.fire({
       icon: "warning",
       title: "Warning!",
       text: "Unregistered barcode.",
       showConfirmButton: false,
       timer: 1000
      });
      $('#barcode').val('');
      $('#barcode').focus();

     } else if (result == 403) {
      Swal.fire({
       icon: "warning",
       title: "Warning!",
       text: 'Barcode has not been added in "Recut Sewing".',
       showConfirmButton: false,
       timer: 1500
      });
      $('#barcode').val('');
      $('#barcode').focus();

     } else if (result == 402) {
      Swal.fire({
       icon: "warning",
       title: "Warning!",
       text: "Barcode has been scanned.",
       showConfirmButton: false,
       timer: 1000
      });
      $('#barcode').val('');
      $('#barcode').focus();

     } else {
      saveInputRecutByBarcode(barcode)
     }

    }
   });
  }

  function saveInputRecutByBarcode(barcode) {
   $.ajax({
    url: '<?= site_url("cutting/postInputRecutByBarcode"); ?>',
    method: 'POST',
    dataType: 'JSON',
    data: {
     'barcode': barcode
    },
   }).done(function() {
    Swal.fire({
     icon: 'success',
     title: 'Success',
     text: 'Data received successfully.',
     showConfirmButton: false,
     timer: 750
    });

    $('#barcode').val('');
    $('#barcode').focus();

    inputRecutTable.ajax.reload(null, false);
    countUnscannedBarcode();
   });
  }


  let unscanned = document.getElementById('unscanned');
  let tooltip = new bootstrap.Tooltip(unscanned);
  let unscannedBarcodeTable;
  // Input Recut Table


  $('#unscanned').click(function() {
   $('#btn_waiting').removeClass('btn-outline-info');
   $('#btn_waiting').addClass('btn-info');
   $('#btn_waiting').prop('disabled', true);

   $('#btn_rejected').removeClass('btn-danger');
   $('#btn_rejected').addClass('btn-outline-danger');
   $('#btn_rejected').prop('disabled', false);

   $('#unscannedBarcodeTable thead tr')
    .clone(true)
    .addClass('filter')
    .appendTo('#unscannedBarcodeTable thead');


   unscannedBarcodeTable = $('#unscannedBarcodeTable').DataTable({
    autoWidth: false,
    info: true,
    searching: true,
    scrollX: true,
    paging: false,
    scrollCollapse: true,
    scrollY: '500px',
    orderCellsTop: true,
    initComplete: function() {
     let apis = this.api();
     // For each column
     apis.columns().eq(0).each(function(colIdxs) {
      // Set the header cell to contain the input element
      let cells = $('.filter th').eq($(apis.column(colIdxs).header()).index());
      let titles = $(cells).text();
      $(cells).html('<input type="text" class="form-control form-control-sm text-center" placeholder="' + titles + '" />');
      // On every keypress in this input
      $('input', $('.filter th').eq($(apis.column(colIdxs).header()).index()))
       .off('keyup change')
       .on('keyup change', function(e) {
        e.stopPropagation();
        // Get the search value
        $(this).attr('title', $(this).val());
        var regexr = '({search})'; //$(this).parents('th').find('select').val();
        var cursorPosition = this.selectionStart;
        // Search the column for that value
        apis
         .column(colIdxs)
         .search((this.value != "") ? regexr.replace('{search}', '(((' + this.value + ')))') : "", this.value != "", this.value == "")
         .draw();
        $(this).focus()[0].setSelectionRange(cursorPosition, cursorPosition);
       });
     });
    },
    // fixedHeader: true,
    // stateSave: true,
    destroy: true,
    ajax: {
     url: '<?= site_url('cutting/getRecutSewing'); ?>',
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
      'className': 'text-center px-2',
      render: function(data, type, row, meta) {
       if (row['sequence_number'] != null) {
        if (row['sequence_number'] < 100) {
         return (row['sequence_number'] < 10) ? "00" + row['sequence_number'] : "0" + row['sequence_number'];
        } else {
         return row['sequence_number'];
        }
       } else {
        return "";
       }
      }
     },
     {
      'data': 'created_date',
      'className': 'text-center px-2'
     },
     {
      'data': 'barcode',
      'className': 'text-center px-2'
     },
     {
      'data': 'line',
      'className': 'text-center px-2'
     },
     {
      'data': 'style',
      'className': 'text-center px-2'
     },
     {
      'data': 'buyer',
      'className': 'text-center px-2'
     },
     {
      'data': 'orc',
      'className': 'text-center px-2'
     },
     {
      'data': 'color',
      'className': 'text-center px-2'
     },
     {
      'data': 'no_bundle',
      'className': 'text-center px-2'
     },
     {
      'data': 'size',
      'className': 'text-center px-2'
     },
     {
      'data': 'item_desc',
      'className': 'text-center px-2'
     },
     {
      'data': 'part_desc',
      'className': 'text-center px-2'
     },
     {
      'data': 'qty',
      'className': 'text-center px-2'
     },
     {
      'data': 'remarks',
      'className': 'text-center px-2'
     },
     {
      'data': 'other_item_part_desc',
      'className': 'text-center px-2'
     },
     {
      'className': 'text-center px-2',
      render: function(data, type, row, meta) {
       if (row['defect_code'] != null) {
        return (row['defect_code'] < 10) ? "D-0" + row['defect_code'] : "D-" + row['defect_code'];
       } else {
        return "";
       }
      }
     },
     {
      'data': 'defect_desc',
      'className': 'text-center px-2'
     },
     {
      'data': 'other_defect_desc',
      'className': 'text-center px-2'
     },
     {
      'className': 'text-center px-3',
      render: function(data, type, row) {
       return '<span class="badge text-bg-danger" style="cursor: pointer;" id="btn_reject">Reject</span>'
      }
     },
     {
      visible: false,
      'data': 'reject_remarks',
      'className': 'text-center px-2'
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
      .column(13)
      .data()
      .reduce((a, b) => intVal(a) + intVal(b), 0);

     // Total over this page
     pageTotal = api
      .column(13, {
       page: 'current'
      })
      .data()
      .reduce((a, b) => intVal(a) + intVal(b), 0);

     // Update footer
     api.column(13).footer().innerHTML =
      pageTotal + ' ( ' + total + ' )';

     // Update footer
     // api.column(6).footer().innerHTML =
     //   total
    }
   });

   // auto reload table 
   setInterval(reloadTable, 16000);

   function reloadTable() {
    unscannedBarcodeTable.ajax.reload(null, false);
   }


   // Button Reject
   let id_main;
   let barcode;
   $('#unscannedBarcodeTable tbody').on('click', '#btn_reject', function() {
    id_main = unscannedBarcodeTable.row($(this).parents('tr')).data().id;
    barcode = unscannedBarcodeTable.row($(this).parents('tr')).data().barcode;

    $('#barcode_modal').html(': ' + barcode);

    $("#rejectRemarksModal").modal("show");
    $("#rejectRemarksModal").on('shown.bs.modal', function() {
     $('#reject_remarks_modal').focus();
    });



   });

   $('#btn_reject_remarks').on('click', function() {
    let reject_remarks = $('#reject_remarks_modal').val();

    swal.fire({
     icon: 'warning',
     title: 'Warning!',
     html: 'Are you sure you will reject barcode <br> "' + barcode + '" ?',
     showCancelButton: true,
     // confirmButtonColor: '#3085d6',
     // cancelButtonColor: '#d33',
     confirmButtonText: 'Yes',
     cancelButtonText: 'No',
    }).then(function(result) {
     if (result.value) {

      $.ajax({
       type: "POST",
       url: "<?= site_url('cutting/updateRejectRecutRequestSewing') ?>",
       dataType: "JSON",
       data: {
        'id_main': id_main,
        'reject_remarks': reject_remarks
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
        unscannedBarcodeTable.ajax.reload(null, false);
        countUnscannedBarcode();
        swal.fire({
         icon: 'success',
         title: 'Success!',
         text: 'Data successfully rejected.',
         timer: 1000,
         showCancelButton: false,
         showConfirmButton: false
        }).then(function() {
         $("#rejectRemarksModal").modal("hide");
        })
       }
      });

     }
    });

   });






   $('#btn_waiting').on('click', function() {
    $('#btn_waiting').removeClass('btn-outline-info');
    $('#btn_waiting').addClass('btn-info');
    $('#btn_waiting').prop('disabled', true);

    $('#btn_rejected').removeClass('btn-danger');
    $('#btn_rejected').addClass('btn-outline-danger');
    $('#btn_rejected').prop('disabled', false);

    unscannedBarcodeTable.clear().draw();
    unscannedBarcodeTable = $('#unscannedBarcodeTable').DataTable({
     autoWidth: false,
     info: true,
     searching: true,
     scrollX: true,
     paging: false,
     scrollCollapse: true,
     scrollY: '500px',
     orderCellsTop: true,
     initComplete: function() {
      let apis = this.api();
      // For each column
      apis.columns().eq(0).each(function(colIdxs) {
       // Set the header cell to contain the input element
       // let cells = $('.filter th').eq($(apis.column(colIdxs).header()).index());
       // let titles = $(cells).text();
       // $(cells).html('<input type="text" class="form-control form-control-sm text-center" placeholder="' + titles + '" />');
       // On every keypress in this input
       $('input', $('.filter th').eq($(apis.column(colIdxs).header()).index()))
        .off('keyup change')
        .on('keyup change', function(e) {
         e.stopPropagation();
         // Get the search value
         $(this).attr('title', $(this).val());
         var regexr = '({search})'; //$(this).parents('th').find('select').val();
         var cursorPosition = this.selectionStart;
         // Search the column for that value
         apis
          .column(colIdxs)
          .search((this.value != "") ? regexr.replace('{search}', '(((' + this.value + ')))') : "", this.value != "", this.value == "")
          .draw();
         $(this).focus()[0].setSelectionRange(cursorPosition, cursorPosition);
        });
      });
     },
     // fixedHeader: true,
     // stateSave: true,
     destroy: true,
     ajax: {
      url: '<?= site_url('cutting/getRecutSewing'); ?>',
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
       'className': 'text-center px-2',
       render: function(data, type, row, meta) {
        if (row['sequence_number'] != null) {
         if (row['sequence_number'] < 100) {
          return (row['sequence_number'] < 10) ? "00" + row['sequence_number'] : "0" + row['sequence_number'];
         } else {
          return row['sequence_number'];
         }
        } else {
         return "";
        }
       }
      },
      {
       'data': 'created_date',
       'className': 'text-center px-2'
      },
      {
       'data': 'barcode',
       'className': 'text-center px-2'
      },
      {
       'data': 'line',
       'className': 'text-center px-2'
      },
      {
       'data': 'style',
       'className': 'text-center px-2'
      },
      {
       'data': 'buyer',
       'className': 'text-center px-2'
      },
      {
       'data': 'orc',
       'className': 'text-center px-2'
      },
      {
       'data': 'color',
       'className': 'text-center px-2'
      },
      {
       'data': 'no_bundle',
       'className': 'text-center px-2'
      },
      {
       'data': 'size',
       'className': 'text-center px-2'
      },
      {
       'data': 'item_desc',
       'className': 'text-center px-2'
      },
      {
       'data': 'part_desc',
       'className': 'text-center px-2'
      },
      {
       'data': 'qty',
       'className': 'text-center px-2'
      },
      {
       'data': 'remarks',
       'className': 'text-center px-2'
      },
      {
       'data': 'other_item_part_desc',
       'className': 'text-center px-2'
      },
      {
       'className': 'text-center px-2',
       render: function(data, type, row, meta) {
        if (row['defect_code'] != null) {
         return (row['defect_code'] < 10) ? "D-0" + row['defect_code'] : "D-" + row['defect_code'];
        } else {
         return "";
        }
       }
      },
      {
       'data': 'defect_desc',
       'className': 'text-center px-2'
      },
      {
       'data': 'other_defect_desc',
       'className': 'text-center px-2'
      },
      {
       'className': 'text-center px-3',
       render: function(data, type, row) {
        return '<span class="badge text-bg-danger" style="cursor: pointer;" id="btn_reject">Reject</span>'
       }
      },
      {
       visible: false,
       'data': 'reject_remarks',
       'className': 'text-center px-2'
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
       .column(13)
       .data()
       .reduce((a, b) => intVal(a) + intVal(b), 0);

      // Total over this page
      pageTotal = api
       .column(13, {
        page: 'current'
       })
       .data()
       .reduce((a, b) => intVal(a) + intVal(b), 0);

      // Update footer
      api.column(13).footer().innerHTML =
       pageTotal + ' ( ' + total + ' )';

      // Update footer
      // api.column(6).footer().innerHTML =
      //   total
     }
    });
   });

   $('#btn_rejected').on('click', function() {
    $('#btn_rejected').removeClass('btn-outline-danger');
    $('#btn_rejected').addClass('btn-danger');
    $('#btn_rejected').prop('disabled', true);

    $('#btn_waiting').removeClass('btn-info');
    $('#btn_waiting').addClass('btn-outline-info');
    $('#btn_waiting').prop('disabled', false);

    unscannedBarcodeTable.clear().draw();
    unscannedBarcodeTable = $('#unscannedBarcodeTable').DataTable({
     autoWidth: false,
     info: true,
     searching: true,
     scrollX: true,
     paging: false,
     scrollCollapse: true,
     scrollY: '500px',
     orderCellsTop: true,
     initComplete: function() {
      let apis = this.api();
      // For each column
      apis.columns().eq(0).each(function(colIdxs) {
       // Set the header cell to contain the input element
       let cells = $('.filter th').eq($(apis.column(colIdxs).header()).index());
       let titles = $(cells).text();
       $(cells).html('<input type="text" class="form-control form-control-sm text-center" placeholder="' + titles + '" />');
       // On every keypress in this input
       $('input', $('.filter th').eq($(apis.column(colIdxs).header()).index()))
        .off('keyup change')
        .on('keyup change', function(e) {
         e.stopPropagation();
         // Get the search value
         $(this).attr('title', $(this).val());
         var regexr = '({search})'; //$(this).parents('th').find('select').val();
         var cursorPosition = this.selectionStart;
         // Search the column for that value
         apis
          .column(colIdxs)
          .search((this.value != "") ? regexr.replace('{search}', '(((' + this.value + ')))') : "", this.value != "", this.value == "")
          .draw();
         $(this).focus()[0].setSelectionRange(cursorPosition, cursorPosition);
        });
      });
     },
     // fixedHeader: true,
     // stateSave: true,
     destroy: true,
     ajax: {
      url: '<?= site_url('cutting/getRecutSewingRejected'); ?>',
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
       'className': 'text-center px-2',
       render: function(data, type, row, meta) {
        if (row['sequence_number'] != null) {
         if (row['sequence_number'] < 100) {
          return (row['sequence_number'] < 10) ? "00" + row['sequence_number'] : "0" + row['sequence_number'];
         } else {
          return row['sequence_number'];
         }
        } else {
         return "";
        }
       }
      },
      {
       'data': 'created_date',
       'className': 'text-center px-2'
      },
      {
       'data': 'barcode',
       'className': 'text-center px-2'
      },
      {
       'data': 'line',
       'className': 'text-center px-2'
      },
      {
       'data': 'style',
       'className': 'text-center px-2'
      },
      {
       'data': 'buyer',
       'className': 'text-center px-2'
      },
      {
       'data': 'orc',
       'className': 'text-center px-2'
      },
      {
       'data': 'color',
       'className': 'text-center px-2'
      },
      {
       'data': 'no_bundle',
       'className': 'text-center px-2'
      },
      {
       'data': 'size',
       'className': 'text-center px-2'
      },
      {
       'data': 'item_desc',
       'className': 'text-center px-2'
      },
      {
       'data': 'part_desc',
       'className': 'text-center px-2'
      },
      {
       'data': 'qty',
       'className': 'text-center px-2'
      },
      {
       'data': 'remarks',
       'className': 'text-center px-2'
      },
      {
       'data': 'other_item_part_desc',
       'className': 'text-center px-2'
      },
      {
       'className': 'text-center px-2',
       render: function(data, type, row, meta) {
        if (row['defect_code'] != null) {
         return (row['defect_code'] < 10) ? "D-0" + row['defect_code'] : "D-" + row['defect_code'];
        } else {
         return "";
        }
       }
      },
      {
       'data': 'defect_desc',
       'className': 'text-center px-2'
      },
      {
       'data': 'other_defect_desc',
       'className': 'text-center px-2'
      },
      {
       'className': 'text-center px-3',
       render: function(data, type, row) {
        return '<span class="badge text-bg-danger" style="cursor: not-allowed; opacity: .5;">Rejected</span>'
       }
      },
      {
       'data': 'reject_remarks',
       'className': 'text-center px-2'
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
       .column(13)
       .data()
       .reduce((a, b) => intVal(a) + intVal(b), 0);

      // Total over this page
      pageTotal = api
       .column(13, {
        page: 'current'
       })
       .data()
       .reduce((a, b) => intVal(a) + intVal(b), 0);

      // Update footer
      api.column(13).footer().innerHTML =
       pageTotal + ' ( ' + total + ' )';

      // Update footer
      // api.column(6).footer().innerHTML =
      //   total
     }
    });
   });










   $("#unscannedBarcodeModal").on('shown.bs.modal', function() {
    $('#unscannedBarcodeTable').DataTable().columns.adjust();
   });

   $("#unscannedBarcodeModal").modal("show");
  });

  $('#unscannedBarcodeModal').on('hidden.bs.modal', function() {
   unscannedBarcodeTable.clear().draw();
  })








  const countUnscannedBarcode = () => {
   $('#countUnscannedBarcode').empty();
   $.ajax({
    url: '<?= site_url("cutting/getUnscannedBarcodeRecutSewing"); ?>',
    type: 'GET',
    dataType: 'JSON',
    beforeSend: function() {
     $('#countUnscannedBarcode').html(' ');
    },
    success: function(result) {
     $('#countUnscannedBarcode').html(result[0].count_unscanned);
    }
   });
  }

  countUnscannedBarcode();





  // auto reload notif
  setInterval(reloadNotif, 15000);

  function reloadNotif() {
   countUnscannedBarcode();
  }







  $('#btn_print_selected').click(function() {

   let selRows = inputRecutTable.rows({
    selected: true
   }).data();

   let arrSelectedRows = []
   $.each(selRows, function(x, item) {
    arrSelectedRows.push({
     "id_recut_sewing_main": item.id,
     "sequence_number": item.sequence_number,
     "created_date": item.created_date,
     "line": item.line,
     "orc": item.orc,
     "style": item.style,
     "color": item.color,
     "size": item.size,
     "no_bundle": item.no_bundle,
     "part_desc": item.part_desc,
     "qty": item.qty,
     "remarks": item.remarks

    });
   });

   localStorage.removeItem('selectedRows');
   localStorage.setItem("selectedRows", JSON.stringify(arrSelectedRows));
   window.open("<?= site_url('cutting/print_input_recut'); ?>");


  });









 });
</script>