<style>
 .dt-buttons {
  margin-bottom: 10px;
 }

 .dataTables_length {
  margin-bottom: -30px;
 }

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
   <div class="breadcrumb-title pe-3">Report</div>
   <div class="ps-3">
    <nav aria-label="breadcrumb">
     <ol class="breadcrumb mb-0 p-0">
      <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
      </li>
      <li class="breadcrumb-item active" aria-current="page">Report Recut</li>
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
  <h6 class="mb-0 text-uppercase">Report Recut</h6>
  <hr />


  <div class="card">
   <div class="card-body">
    <div class="my-3 mx-3">
     <div class="row g-3 mb-4">
      <div class="col-lg-1">
       <label for="date_from" class="col-form-label">Request Date Range</label>
      </div>
      <div class="col-lg-2">
       <input type="date" class="form-control" id="date_from">
       <div id="validation_date_from" class="invalid-feedback">
        Please select the date
       </div>
      </div>
      <div class="col-lg-1 text-center">
       <label for="date_to" class="col-form-label">to</label>
      </div>
      <div class="col-lg-2">
       <input type="date" class="form-control" id="date_to">
       <div id="validation_date_to" class="invalid-feedback">
        Please select the date
       </div>
      </div>
      <div class="col-lg-2">
       <button class="btn btn-primary me-1" id="btn_filter">Filter</button>
       <button class="btn btn-outline-secondary" id="btn_reset">Reset</button>
      </div>
     </div>


     <!-- <div class="table-responsive"> -->
     <table id="reportRecutTable" class="table table-striped table-bordered table-sm nowrap" style="width:100%">
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
        <th>Received Date</th>
        <th>Time Diff Cutting</th>
        <th>Time Diff Sewing</th>
        <th>Status</th>
        <th>Reject Remarks</th>
       </tr>
      </thead>
      <tfoot>
       <th colspan="13">Total Qty</th>
       <th></th>
       <th colspan="12"></th>
      </tfoot>

     </table>

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
     <table id="unscannedBarcodeTable" class="table table-striped table-bordered table-sm nowrap" style="width:100%">
      <thead>
       <th>No.</th>
       <th>Request Date</th>
       <th>Input Cutting Date</th>
       <th>Barcode</th>
       <th>Buyer</th>
       <th>Style</th>
       <th>ORC</th>
       <th>Color</th>
       <th>Size</th>
       <th>No. Bundle</th>
       <th>Item</th>
       <th>Part</th>
       <th>Other Part</th>
       <th>Defect Code</th>
       <th>Defect Desc</th>
       <th>Other Defect Desc</th>
       <th>Qty Recut</th>
       <th>Line</th>
       <th>Remarks</th>
      </thead>
      <tfoot>
       <th colspan="16">Total Qty</th>
       <th></th>
       <th colspan="2"></th>
      </tfoot>
     </table>
    </div>
   </div>
  </div>
 </div>
</div>



<script>
 $(document).ready(function() {
  const sweet_loader = '<div class="sweet_loader"><svg viewBox="0 0 140 140" width="140" height="140"><g class="outline"><path d="m 70 28 a 1 1 0 0 0 0 84 a 1 1 0 0 0 0 -84" stroke="rgba(0,0,0,0.1)" stroke-width="4" fill="none" stroke-linecap="round" stroke-linejoin="round"></path></g><g class="circle"><path d="m 70 28 a 1 1 0 0 0 0 84 a 1 1 0 0 0 0 -84" stroke="#71BBFF" stroke-width="4" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-dashoffset="200" stroke-dasharray="300"></path></g></svg></div>';

  $('#reportRecutTable thead tr')
   .clone(true)
   .addClass('filter')
   .appendTo('#reportRecutTable thead');
  // Main Table
  let reportRecutTable = $('#reportRecutTable').DataTable({
   // lengthChange: false,
   buttons: ['excel'],
   dom: '<"dt-top"<"left-col"Bl><"right-col"f>>rt<"dt-bottom"<"left-col"i><"right-col"p>>',
   scrollX: true,
   destroy: true,
   orderCellsTop: true,
   initComplete: function() {
    let api = this.api();
    // For each column
    api.columns().eq(0).each(function(colIdx) {
     // Set the header cell to contain the input element
     let cell = $('.filter th').eq($(api.column(colIdx).header()).index());
     let title = $(cell).text();
     $(cell).html('<input type="text" class="form-control form-control-sm text-center" placeholder="' + title + '" />');
     // On every keypress in this input
     $('input', $('.filter th').eq($(api.column(colIdx).header()).index()))
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
    url: '<?= site_url('cutting/getReportRecut'); ?>',
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
       return (row['defect_code'] < 10) ? "D-0" + row['defect_code'] : "D-" + row['defect_code']
      } else {
       return ""
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
     'data': 'date_received',
     'className': 'text-center px-2'
    },
    {
     'data': 'time_difference_cutting',
     'className': 'text-center px-2'
    },
    {
     'data': 'time_difference_sewing',
     'className': 'text-center px-2'
    },
    {
     'className': 'text-center px-2',
     render: function(data, type, row) {
      if (row['input_date'] == null && row['output_date'] == null && row['date_received'] == null && row['reject'] == 0) {
       return "<i class='bx bxs-hourglass' style='color: #9ca3af'></i> <b>Waiting for Cutting to be Received</b>"
      } else if (row['input_date'] != null && row['output_date'] == null && row['date_received'] == null && row['reject'] == 0) {
       return "<i class='bx bx-recycle' style='color: #9ca3af'></i> <b>On Progress</b>"
      } else if (row['input_date'] != null && row['output_date'] != null && row['date_received'] == null && row['reject'] == 0) {
       return "<i class='bx bxs-hourglass' style='color: #9ca3af'></i> <b>Waiting for Received</b>"
      } else if (row['input_date'] != null && row['output_date'] != null && row['date_received'] != null && row['reject'] == 0) {
       return "<i class='bx bx-check-circle' style='color: #22c55e'></i> <b>Complete</b>"
      } else if (row['reject'] == 1) {
       return "<i class='bx bx-x-circle' style='color: #ef4444'></i> <b>Canceled</b>"
      } else {
       return ""
      }
     }
    },
    {
     'data': 'reject_remarks',
     'className': 'text-center px-2'
    },
    // {
    //   'className': 'text-center px-2',
    //   render: function(data, type, row) {
    //     if (row['input_date'] != null && row['output_date'] != null && row['date_received'] != null && row['reject'] == 0) {
    //       return "<i class='bx bx-check-circle' style='color: #22c55e'></i> <b>Complete</b>"
    //     } else if (row['input_date'] != null && row['output_date'] != null && row['date_received'] == null) {
    //       return "<i class='bx bxs-hourglass' style='color: #22c55e'></i> <b>Waiting for received</b>"
    //     } else {
    //       return "<i class='bx bx-recycle' style='color: #9ca3af'></i> <b>On Progress</b>"
    //     }
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



  $('#btn_filter').click(function() {
   let date_from = $('#date_from').val();
   let date_to = $('#date_to').val();

   if (date_from == "" && date_to == "") {
    $('#date_from').addClass('is-invalid');
    $('#validation_date_from').show();
    $('#date_to').addClass('is-invalid');
    $('#validation_date_to').show();
   } else if (date_from == "") {
    $('#date_from').addClass('is-invalid');
    $('#validation_date_from').show();

    $('#date_to').removeClass('is-invalid');
    $('#validation_date_to').hide();
   } else if (date_to == "") {
    $('#date_to').addClass('is-invalid');
    $('#validation_date_to').show();

    $('#date_from').removeClass('is-invalid');
    $('#validation_date_from').hide();
   } else {
    $('#date_from').removeClass('is-invalid');
    $('#validation_date_from').hide();

    $('#date_to').removeClass('is-invalid');
    $('#validation_date_to').hide();

    if (new Date(date_from) > new Date(date_to)) {
     Swal.fire(
      'Warning!',
      'Please check the date input.',
      'warning'
     );
    } else {
     // $('#btn_filter_date_range').empty();
     // $('#btn_filter_date_range').prop('disabled', true);
     // $('#btn_filter_date_range').append('<span class="spinner-border spinner-border-sm mr-1" style="margin-bottom: 1px;" role="status" aria-hidden="true"></span>Loading');

     reportRecutTable.clear().draw();

     reportRecutTable = $('#reportRecutTable').DataTable({
      // lengthChange: false,
      // buttons: ['copy', 'excel', 'pdf', 'print'],
      scrollX: true,
      destroy: true,
      orderCellsTop: true,
      initComplete: function() {
       let api = this.api();
       // For each column
       api.columns().eq(0).each(function(colIdx) {
        // Set the header cell to contain the input element
        let cell = $('.filter th').eq($(api.column(colIdx).header()).index());
        let title = $(cell).text();
        $(cell).html('<input type="text" class="form-control form-control-sm text-center" placeholder="' + title + '" />');
        // On every keypress in this input
        $('input', $('.filter th').eq($(api.column(colIdx).header()).index()))
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
       url: '<?= site_url('cutting/getReportRecutFilter'); ?>',
       type: 'GET',
       data: {
        'date_from': date_from,
        'date_to': date_to
       }
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
          return (row['defect_code'] < 10) ? "D-0" + row['defect_code'] : "D-" + row['defect_code']
         } else {
          return ""
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
        'data': 'date_received',
        'className': 'text-center px-2'
       },
       {
        'data': 'time_difference_cutting',
        'className': 'text-center px-2'
       },
       {
        'data': 'time_difference_sewing',
        'className': 'text-center px-2'
       },
       {
        'className': 'text-center px-2',
        render: function(data, type, row) {
         if (row['input_date'] == null && row['output_date'] == null && row['date_received'] == null && row['reject'] == 0) {
          return "<i class='bx bxs-hourglass' style='color: #9ca3af'></i> <b>Waiting for Cutting to be Received</b>"
         } else if (row['input_date'] != null && row['output_date'] == null && row['date_received'] == null && row['reject'] == 0) {
          return "<i class='bx bx-recycle' style='color: #9ca3af'></i> <b>On Progress</b>"
         } else if (row['input_date'] != null && row['output_date'] != null && row['date_received'] == null && row['reject'] == 0) {
          return "<i class='bx bxs-hourglass' style='color: #9ca3af'></i> <b>Waiting for Received</b>"
         } else if (row['input_date'] != null && row['output_date'] != null && row['date_received'] != null && row['reject'] == 0) {
          return "<i class='bx bx-check-circle' style='color: #22c55e'></i> <b>Complete</b>"
         } else if (row['reject'] == 1) {
          return "<i class='bx bx-x-circle' style='color: #ef4444'></i> <b>Canceled</b>"
         } else {
          return ""
         }
        }
       },
       {
        'data': 'reject_remarks',
        'className': 'text-center px-2'
       },
       // {
       //   'className': 'text-center px-2',
       //   render: function(data, type, row) {
       //     if (row['input_date'] != null && row['output_date'] != null && row['date_received'] != null && row['reject'] == 0) {
       //       return "<i class='bx bx-check-circle' style='color: #22c55e'></i> <b>Complete</b>"
       //     } else if (row['input_date'] != null && row['output_date'] != null && row['date_received'] == null) {
       //       return "<i class='bx bxs-hourglass' style='color: #22c55e'></i> <b>Waiting for received</b>"
       //     } else {
       //       return "<i class='bx bx-recycle' style='color: #9ca3af'></i> <b>On Progress</b>"
       //     }
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
    }

   }



  });

  $('#btn_reset').click(function() {
   $('#date_from').prop('disabled', false);
   $('#date_to').prop('disabled', false);

   // $('#btn_date_range').empty();
   // $('#btn_date_range').html('Filter');
   // $('#btn_date_range').prop('disabled', false);

   $('#date_from').removeClass('is-invalid');
   $('#validation_date_from').hide();

   $('#date_to').removeClass('is-invalid');
   $('#validation_date_to').hide();

   $('#date_from').val("");
   $('#date_to').val("");

   reportRecutTable.clear().draw();
   reportRecutTable = $('#reportRecutTable').DataTable({
    // lengthChange: false,
    // buttons: ['copy', 'excel', 'pdf', 'print'],
    scrollX: true,
    destroy: true,
    orderCellsTop: true,
    initComplete: function() {
     let api = this.api();
     // For each column
     api.columns().eq(0).each(function(colIdx) {
      // Set the header cell to contain the input element
      let cell = $('.filter th').eq($(api.column(colIdx).header()).index());
      let title = $(cell).text();
      $(cell).html('<input type="text" class="form-control form-control-sm text-center" placeholder="' + title + '" />');
      // On every keypress in this input
      $('input', $('.filter th').eq($(api.column(colIdx).header()).index()))
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
     url: '<?= site_url('cutting/getReportRecut'); ?>',
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
        return (row['defect_code'] < 10) ? "D-0" + row['defect_code'] : "D-" + row['defect_code']
       } else {
        return ""
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
      'data': 'date_received',
      'className': 'text-center px-2'
     },
     {
      'data': 'time_difference_cutting',
      'className': 'text-center px-2'
     },
     {
      'data': 'time_difference_sewing',
      'className': 'text-center px-2'
     },
     {
      'className': 'text-center px-2',
      render: function(data, type, row) {
       if (row['input_date'] == null && row['output_date'] == null && row['date_received'] == null && row['reject'] == 0) {
        return "<i class='bx bxs-hourglass' style='color: #9ca3af'></i> <b>Waiting for Cutting to be Received</b>"
       } else if (row['input_date'] != null && row['output_date'] == null && row['date_received'] == null && row['reject'] == 0) {
        return "<i class='bx bx-recycle' style='color: #9ca3af'></i> <b>On Progress</b>"
       } else if (row['input_date'] != null && row['output_date'] != null && row['date_received'] == null && row['reject'] == 0) {
        return "<i class='bx bxs-hourglass' style='color: #9ca3af'></i> <b>Waiting for Received</b>"
       } else if (row['input_date'] != null && row['output_date'] != null && row['date_received'] != null && row['reject'] == 0) {
        return "<i class='bx bx-check-circle' style='color: #22c55e'></i> <b>Complete</b>"
       } else if (row['reject'] == 1) {
        return "<i class='bx bx-x-circle' style='color: #ef4444'></i> <b>Canceled</b>"
       } else {
        return ""
       }
      }
     },
     {
      'data': 'reject_remarks',
      'className': 'text-center px-2'
     },
     // {
     //   'className': 'text-center px-2',
     //   render: function(data, type, row) {
     //     if (row['input_date'] != null && row['output_date'] != null && row['date_received'] != null && row['reject'] == 0) {
     //       return "<i class='bx bx-check-circle' style='color: #22c55e'></i> <b>Complete</b>"
     //     } else if (row['input_date'] != null && row['output_date'] != null && row['date_received'] == null) {
     //       return "<i class='bx bxs-hourglass' style='color: #22c55e'></i> <b>Waiting for received</b>"
     //     } else {
     //       return "<i class='bx bx-recycle' style='color: #9ca3af'></i> <b>On Progress</b>"
     //     }
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









 });
</script>