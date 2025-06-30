<style>
 .select-info {
  margin-left: 10px;
 }
</style>

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
      <li class="breadcrumb-item active" aria-current="page">Print Cutting Bundle</li>
     </ol>
    </nav>
   </div>
  </div>
  <h6 class="mb-0 text-uppercase">Print Cutting Bundle</h6>
  <hr />
  <div class="row">
   <div class="col-12 ">
    <div class="card rounded-4 w-100">
     <div class="card-body">
      <div class="mx-3 my-3">

       <div class="row g-3 align-items-center mb-4">
        <div class="col-lg-4">
         <div class="input-group">
          <input type="text" id="orc" class="form-control" placeholder="Input Work Order" aria-label="Input ORC" aria-describedby="button-addon2">
          <button class="btn btn-gradient-info" type="button" id="btnSearch">Search</button>
         </div>
        </div>
        <div class="col-lg-2">
         <button class="btn btn-outline-secondary" id="btn_reset">Reset</button>
        </div>
       </div>

       <div>
        <button type="button" class="btn btn-sm btn-primary" id="btnSelectAll">Select All</button>
        <button type="button" class="btn btn-sm btn-secondary" id="btnDeselectAll">Deselect All</button>
       </div>
       </p>
       <!-- <div class="table-responsive"> -->
       <table id="orcTable" class="table table-striped table-bordered table-sm nowrap" style="width:100%">
        <thead>
         <th class="text-center">No.</th>
         <th class="text-center">ORC</th>
         <th class="text-center">Work Order</th>
         <th class="text-center">Size</th>
         <th class="text-center">No. Bundle</th>
         <th class="text-center">Qty</th>

        </thead>
       </table>
       <!-- </div> -->


       <div class="row mt-3">
        <div class="col-md-6">
         <label>Part : </label>
         &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
         <label>
          <input class="form-check-input" type="checkbox" id="checkCP" name="checkCP">
         </label>
         <label for="checkCP">Center Panel</label>

         &nbsp;&nbsp;
         <label>
          <input class="form-check-input" type="checkbox" id="checkBW" name="checkBW">
         </label>
         <label for="checkBW">Back Wings</label>

         &nbsp;&nbsp;
         <label>
          <input class="form-check-input" type="checkbox" id="checkCU" name="checkCU">
         </label>
         <label for="checkCU">Cups</label>

         &nbsp;&nbsp;
         <label>
          <input class="form-check-input" type="checkbox" id="checkASS" name="checkASS">
         </label>
         <label for="checkASS">Assembly</label>
        </div>
        <div class="col-md-6 text-end">
         <button type="button" id="btnPrintSelected" class="btn btn-primary"><i class='bx bx-printer'></i> Print Selected</button>
        </div>
       </div>

      </div>


     </div>
    </div>

   </div><!--end row-->

  </div>
 </div>
 <!--end page wrapper -->

 <script>
  var table;
  var cp;
  var bw;
  var cu;
  var ass;
  $(document).ready(function() {
   $('#btnSelectAll').prop('disabled', true);
   $('#btnDeselectAll').prop('disabled', true);
   $('#btnPrintSelected').prop('disabled', true);

   table = $('#orcTable').DataTable();

   $('#orc').focus();

   $('#btnSearch').click(function() {
    let strOrc = $('#orc').val();
    if (strOrc == "") {
     Swal.fire({
      icon: 'warning',
      title: 'Warning!',
      html: 'Please input ORC.',
      showConfirmButton: false,
      timer: 1750
     });
    } else {
     showDetail(strOrc);
    }
   });

   $('#btn_reset').click(function() {
    $('#orc').val('');

    setTimeout(function() {
     $('#orc').focus();
    }, 200);

    $('#orc').prop('disabled', false);
    table.clear().draw();

    $('#btnSelectAll').prop('disabled', true);
    $('#btnDeselectAll').prop('disabled', true);

    $("#btnPrintSelected").prop('disabled', true);
   });


   $('#orcTable tbody').on('click', 'tr', function() {
    $(this).toggleClass('selected');
   });

   function showDetail(o) {
    // $('#orcTable').show();

    table = $('#orcTable').DataTable({
     processing: true,
     order: [],
     destroy: true,
     select: {
      style: "multi"
     },
     ajax: {
      url: "<?php echo site_url('cutting/ajax_get_bundles'); ?>/" + o,
      type: "POST",
      dataType: "json",
      dataSrc: ""
     },
     columns: [{
       "data": null,
       "orderable": true,
       "searchable": true,
       'className': 'text-center px-4 align-middle',
       "width": "100px",
       "render": function(data, type, row, meta) {
        return meta.row + meta.settings._iDisplayStart + 1;
       }
      },
      {
       "data": "orc",
       "className": "text-center px-2"
      },
      {
       "data": "work_order",
       "className": "text-center px-2"
      },
      {
       "data": "size",
       "className": "text-center px-2"
      },
      {
       "data": "no_bundle",
       "className": "text-center px-2"
      },
      {
       "data": "qty_pcs",
       "className": "text-center px-2"
      },
     ],
    });

    $('#btnSelectAll').prop('disabled', false);
    $('#btnDeselectAll').prop('disabled', false);
    $('#checkCP').attr('checked', false);
    $('#checkBW').attr('checked', false);
    $('#checkCU').attr('checked', true);
    $('#checkASS').attr('checked', true);

    $('#orc').prop('disabled', true);


   }

   table.on('select deselect', function() {
    let selectedRows = table.rows({
     selected: true
    }).count();

    if (selectedRows > 0) {
     $("#btnPrintSelected").prop('disabled', false);
    } else {
     $("#btnPrintSelected").prop('disabled', true);
    }
   });

   $('#btnPrintSelected').click(function() {
    if ($('#checkCP').is(':checked') == false && $('#checkBW').is(':checked') == false &&
     $('#checkCU').is(':checked') == false && $('#checkASS').is(':checked') == false) {
     Swal.fire({
      icon: 'warning',
      title: 'Warning!',
      html: 'Silahkan pilih "Part" terlebih dahulu.',
      showConfirmButton: false,
      timer: 1750
     });
    } else {
     var selRows = table.rows({
      selected: true
     }).data();

     var arrSelectedRows = []
     $.each(selRows, function(x, item) {
      arrSelectedRows.push({
       "id_cutting": item.id_cutting,
       "orc": item.orc,
       "work_order": item.work_order,
       "style": item.style,
       "color": item.color,
       "buyer": item.buyer,
       "comm": item.comm,
       "so": item.so,
       "qty": item.qty,
       "boxes": item.boxes,
       "prepare_on": item.prepare_on,
       "id_cutting_detail": item.id_cutting_detail,
       "size": item.size,
       "qty_detail": item.qty_detail,
       "no_bundle": item.no_bundle,
       "kode_barcode": item.kode_barcode,
       "cutting_date": item.cutting_date,
       "printed_date": item.printed_date,
       "qty_pcs": item.qty_pcs,
       "packed": item.packed,
       "panty_barcode": item.panty_barcode,
       "cp": ($('#checkCP').is(':checked') == true ? "cp_" : ""),
       "bw": ($('#checkBW').is(':checked') == true ? "bw_" : ""),
       "cu": ($('#checkCU').is(':checked') == true ? "cu_" : ""),
       "as": ($('#checkASS').is(':checked') == true ? "as_" : "")
      });
     });

     localStorage.removeItem('selectedRows');

     localStorage.setItem("selectedRows", JSON.stringify(arrSelectedRows));

     window.open("<?= site_url('cutting/show_print_bundle_v2'); ?>");
    }

   });

   $('#btnSelectAll').click(function() {
    table.rows({
     search: 'applied'
    }).select();

    $('#btnDeselectAll').prop('disabled', false);

   });

   $('#btnDeselectAll').click(function() {
    table.rows({
     search: 'applied'
    }).deselect();

   });




  })
 </script>