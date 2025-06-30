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
      <li class="breadcrumb-item active" aria-current="page">Bundle Records <?= ucwords(strtolower($this->session->userdata['username'])); ?></li>
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
  <h6 class="mb-0 text-uppercase">Bundle Record <?= $this->session->userdata('username'); ?></h6>
  <hr />


  <div class="card">
   <div class="card-body">
    <div class="row my-3 mx-2">
     <div class="col-lg-12">
      <div class="row">
       <div class="col-lg-6">
        <div class="row g-3 align-items-center mb-3">
         <div class="col-lg-3">
          <label for="orc" class="col-form-label">ORC <sup style="color: red;">*</sup></label>
         </div>
         <div class="col-lg-6">
          <select id="orc" class="form-control select2_1" style="width: 100%;"></select>
         </div>
         <div class="col-lg-2">
          <button class="btn btn-outline-secondary" id="btn_reset">Reset</button>
         </div>
        </div>
        <div class="row g-3 align-items-center mb-3">
         <div class="col-lg-3">
          <label for="buyer" class="col-form-label">Buyer</label>
         </div>
         <div class="col-lg-7">
          <label id="buyer" class="col-form-label">: -</label>
         </div>
        </div>
        <div class="row g-3 align-items-center mb-3">
         <div class="col-lg-3">
          <label for="qty_order" class="col-form-label">Qty Order</label>
         </div>
         <div class="col-lg-7">
          <label id="qty_order" class="col-form-label">: -</label>
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
          <label for="color" class="col-form-label">Color</label>
         </div>
         <div class="col-lg-7">
          <label id="color" class="col-form-label">: -</label>
         </div>
        </div>
       </div>
       <div class="col-lg-6">
        <div class="row g-3 align-items-center mb-3" style="margin-top: 35px;">
         <div class="col-lg-3">
          <label for="com" class="col-form-label">Com</label>
         </div>
         <div class="col-lg-7">
          <label id="com" class="col-form-label">: -</label>
         </div>
        </div>
        <div class="row g-3 align-items-center mb-3">
         <div class="col-lg-3">
          <label for="prepared_on" class="col-form-label">Prepared On</label>
         </div>
         <div class="col-lg-2">
          <label id="prepared_on" class="col-form-label">: -</label>
         </div>
        </div>
        <div class="row g-3 align-items-center mb-3">
         <div class="col-lg-3">
          <label for="po_numb" class="col-form-label">PO Numb.</label>
         </div>
         <div class="col-lg-2">
          <label id="po_numb" class="col-form-label">: -</label>
         </div>
        </div>
       </div>
      </div>
     </div>

     <!-- <div class="row mb-3 mt-4">
            <div class="col-lg-12">
              <button class="btn btn-info me-2 " id="btn_daily">Daily</button>
              <button class="btn btn-outline-info me-2" id="btn_monthly">Monthly</button>
              <button class="btn btn-outline-info" id="btn_show_all">Show All</button>
            </div>
          </div> -->

     <h4 class="mt-3" style="display: none;">All Bundle Records</h4>

     <div class="row mt-3" id="bundle_record_header">

      <div class="col-lg-4 mb-4">
       <table class="table table-striped table-bordered table-sm nowrap" style="margin-bottom: -3px;">
        <thead>
         <tr style="background-color: #e5e7eb;">
          <th class="text-center" colspan="2">-</th>
         </tr>
         <tr>
          <th class="text-center">Size</th>
          <th class="text-center">-</th>
         </tr>
         <tr>
          <th class="text-center">Qty</th>
          <th class="text-center">-</th>
         </tr>
        </thead>
       </table>

       <table id="bundleRecordTable" class="table table-striped table-bordered table-sm nowrap" style="width:100%">
        <thead>
         <tr>
          <th class="text-center">No. Bundle</th>
          <th class="text-center">Qty Pcs</th>
          <th class="text-center">Qty Out</th>
          <th class="text-center">Balance</th>
          <th class="text-center">Last Scan Date</th>
         </tr>
        </thead>
        <tfoot>
         <tr>
          <th class="text-center">Total</th>
          <th></th>
          <th></th>
          <th></th>
          <th></th>
         </tr>
        </tfoot>
       </table>

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

  // Load ORC
  const loadOrc = () => {
   $('#orc').empty();
   $.ajax({
    url: " <?= site_url('manager/get_orc'); ?>",
    type: 'GET',
    dataType: 'JSON',
    beforeSend: function() {
     $("#orc").prepend($('<option></option>').html('Loading...'));
    },
   }).done(function(data) {
    $('#orc').empty();
    $('#orc').append($('<option>', {
     value: "",
     text: "- Select ORC -"
    }));
    $.each(data, function(i, item) {
     $('#orc').append($('<option>', {
      value: item.orc,
      text: item.orc
     }));
    });
   });
  }

  loadOrc();

  let bundleRecordTable = $('#bundleRecordTable').DataTable({
   lengthChange: false,
   info: false,
   searching: false,
   bPaginate: false,
   scrollX: true,
   destroy: true
  });

  const resetAll = () => {
   $("#orc").val(null).trigger('change');

   $('#style').html(': -');
   $('#color').html(': -');
   $('#buyer').html(': -');
   $('#com').html(': -');
   $('#order').html(': -');
   $('#po_numb').html(': -');
   $('#bundle').html(': -');
   $('#qty_order').html(': -');
   $('#prepare').html(': -');

   $('#bundle_record_header').empty();

   const htmlContent = `
        <div class="col-lg-4 mb-4">
         <table class="table table-striped table-bordered table-sm nowrap" style="margin-bottom: -3px;">
           <thead>
            <tr style="background-color: #e5e7eb;">
             <th class="text-center" colspan="2">-</th>
            </tr>
            <tr>
             <th class="text-center">Size</th>
             <th class="text-center">-</th>
            </tr>
            <tr>
             <th class="text-center">Qty</th>
             <th class="text-center">-</th>
            </tr>
           </thead>
          </table>

          <table id="bundleRecordTable" class="table table-striped table-bordered table-sm nowrap" style="width:100%">
           <thead>
            <tr>
             <th class="text-center">No. Bundle</th>
             <th class="text-center">Qty Pcs</th>
             <th class="text-center">Qty Out</th>
             <th class="text-center">Balance</th>
             <th class="text-center">Last Scan Date</th>
            </tr>
           </thead>
           <tfoot>
            <tr>
             <th class="text-center">Total</th>
             <th></th>
             <th></th>
             <th></th>
             <th></th>
            </tr>
           </tfoot>
          </table>

         </div>
       `;

   $('#bundle_record_header').append(htmlContent);

   bundleRecordTable = $('#bundleRecordTable').DataTable({
    lengthChange: false,
    info: false,
    searching: false,
    bPaginate: false,
    scrollX: true,
    destroy: true
   });
  }



  $('#orc').change(function() {
   let orc = $(this).val();
   $('#bundle_record_header').empty();

   if (orc != "") {
    // Get data details
    $.ajax({
     url: " <?= site_url('manager/getDetails'); ?>",
     type: 'GET',
     dataType: 'JSON',
     data: {
      'orc': orc
     },
     beforeSend: function() {
      $("#style_sam_modal").prepend($('<option></option>').html('Loading...'));
      $('#style').html(': Loading...');
      $('#color').html(': Loading...');
      $('#buyer').html(': Loading...');
      $('#com').html(': Loading...');
      $('#order').html(': Loading...');
      $('#po_numb').html(': Loading...');
      $('#bundle').html(': Loading...');
      $('#qty_order').html(': Loading...');
      $('#prepare').html(': Loading...');
     },
    }).done(function(data) {
     let style = data[0].style;
     let color = data[0].color;
     let buyer = data[0].buyer;
     let comm = data[0].comm;
     let order = data[0].order;
     let po_numb = data[0].so;
     let bundle = data[0].no_bundle;
     let qty_order = data[0].qty_order;
     let prepare = data[0].date_created;

     $('#style').html(': ' + data[0].style);
     $('#color').html(': ' + data[0].color);
     $('#buyer').html(': ' + data[0].buyer);
     $('#com').html(': ' + data[0].comm);
     $('#order').html(': ' + data[0].order);
     $('#po_numb').html(': ' + data[0].so);
     $('#bundle').html(': ' + data[0].no_bundle);
     $('#qty_order').html(': ' + data[0].qty_order);
     $('#prepare').html(': ' + data[0].date_created);
    });

    $.ajax({
     url: " <?= site_url('manager/getSizeAndQty'); ?>",
     type: 'GET',
     dataType: 'JSON',
     data: {
      'orc': orc
     },
    }).done(function(data) {

     data.forEach(function(item, index) {
      // Load header bundle record
      const htmlContent = `
        <div class="col-lg-4 mb-4">
         <table class="table table-striped table-bordered table-sm nowrap" style="margin-bottom: -3px;">
           <thead>
            <tr style="background-color: #e5e7eb;">
             <th class="text-center" colspan="2">${item.orc}</th>
            </tr>
            <tr>
             <th class="text-center">Size</th>
             <th class="text-center">${item.size}</th>
            </tr>
            <tr>
             <th class="text-center">Qty</th>
             <th class="text-center">${item.qty_pcs}</th>
            </tr>
           </thead>
          </table>

          <table id="bundleRecordTable_${index}" class="table table-striped table-bordered table-sm nowrap" style="width:100%">
           <thead>
            <tr>
             <th class="text-center">No. Bundle</th>
             <th class="text-center">Qty Pcs</th>
             <th class="text-center">Qty Out</th>
             <th class="text-center">Balance</th>
             <th class="text-center">Last Scan Date</th>
            </tr>
           </thead>
           <tfoot>
            <tr>
             <th>Total</th>
             <th></th>
             <th></th>
             <th></th>
             <th></th>
            </tr>
           </tfoot>
          </table>

         </div>
       `;



      $('#bundle_record_header').append(htmlContent);

      $('#bundleRecordTable_' + index).DataTable({
       lengthChange: false,
       info: false,
       searching: false,
       bPaginate: false,
       scrollX: true,
       destroy: true,
       ajax: {
        url: '<?= site_url('manager/getBundleRecord'); ?>',
        type: 'GET',
        data: {
         'orc': item.orc,
         'size': item.size
        }
       },
       columns: [{
         'data': 'no_bundle',
         'className': 'text-center px-2'
        },
        {
         'data': 'qty_pcs',
         'className': 'text-center px-2'
        },
        {
         'data': 'qty_out',
         'className': 'text-center px-2'
        },
        {
         'data': 'balance',
         'className': 'text-center px-2'
        },
        {
         'data': 'date_scan',
         'className': 'text-center px-2'
        },
       ],

       fnRowCallback: function(nRow, aData, iDisplayIndex, iDisplayIndexFull) {

        if (aData['balance'] > 0) {
         $('td', nRow).css('background-color', '#fecaca');
        }

       },

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

       },
      });


     });


    });




    // });
   } else {
    // resetAll();
   }



  });





  $('#btn_reset').click(function() {
   resetAll();
  });




 });
</script>