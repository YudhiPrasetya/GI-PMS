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
  <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
   <div class="breadcrumb-title pe-3">Cutting</div>
   <div class="ps-3">
    <nav aria-label="breadcrumb">
     <ol class="breadcrumb mb-0 p-0">
      <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
      </li>
      <li class="breadcrumb-item active" aria-current="page">Create Bundle Barcode</li>
      <li class="breadcrumb-item active" aria-current="page">Add Bundle Cutting</li>
     </ol>
    </nav>
   </div>
  </div>
  <h6 class="mb-0 text-uppercase">Create Data Bundle Cutting</h6>
  <hr />
  <div class="row">
   <div class="col-12 ">
    <div class="card rounded-4 w-100">
     <div class="card-body">

      <div class="p-4">
       <form class="row g-3 needs-validation" novalidate>
        <div class="col-md-4">
         <label for="validationCustom01" class="form-label">Work Order</label>
         <select class="single_select" id="orc"></select>
         <!-- <select class="single_select"></select> -->
        </div>
        <div class="col-md-4">
         <label for="buyer" class="form-label">Buyer</label>
         <input type="text" class="form-control" id="consignee_name" required disabled>
        </div>
        <div class="col-md-4">
         <label for="qty" class="form-label">Qty Order</label>
         <input type="text" class="form-control" id="quantity_ordered" required disabled>
        </div>
        <div class="col-md-4">
         <label for="style" class="form-label">Style Code</label>
         <input type="text" class="form-control" id="style_code" required disabled>
        </div>
        <!-- <div class="col-md-4">
                                    <label for="style" class="form-label">Style Name</label>
                                    <input type="text" class="form-control" id="style_names" required disabled>
                                </div>
                                <div class="col-md-4">
                                    <label for="comm" class="form-label">Com</label>
                                    <input type="text" class="form-control" id="orc_type_id" required disabled>
                                </div> -->
        <div class="col-md-4">
         <label for="boxes" class="form-label">Bundle Qty (Box)</label>
         <input type="text" class="form-control" id="boxes" required disabled>
        </div>
        <div class="col-md-4">
         <label for="color" class="form-label">Color</label>
         <input type="text" class="form-control" id="color" required disabled>
        </div>
        <div class="col-md-4">
         <label for="so" class="form-label">PO Number</label>
         <input type="text" class="form-control" id="po_customer" required disabled>
        </div>
        <div class="col-md-4">
          <label for="orcText" class="form-label">ORC</label>
          <input type="text" class="form-control" id="orcText" name="orcText" disabled>
        </div>
        <!-- <div class="col-md-4">
                                    <label for="prepare_on" class="form-label">Prepared On</label>
                                    <input type="text" class="form-control" id="orc_date" required disabled>
                                </div> -->
       </form>

       <button type="button" class="btn btn-primary mt-3" id="AddBundle" disabled>Create Bundle</button>
       <!-- <div class="table-responsive"> -->
       <div class="row mt-5">
        <table id="showBundleTable" class="table table-striped table-bordered table-sm " style="width:100% ">
         <thead>
          <th class="text-center">Size</th>
          <th class="text-center">Qty</th>
          <th class="text-center">Pcs Each Bundle</th>
          <th class="text-center">No. Bundle</th>
          <th class="text-center">Barcode</th>
         </thead>

        </table>
       </div>

       <!-- </div> -->

      </div>


     </div>
    </div>
   </div>


   <!-- Modal -->
   <div class="modal fade" id="modalBundle" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
     <div class="modal-content">
      <div class="modal-header">
       <h5 class="modal-title" id="bundle_title">Create Bundle</h5>
       <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="btn_close_modal"></button>
      </div>
      <div class="modal-body" id="modalBundle_body">
       <div class="mx-3">
        <div class="row align-items-center mb-0">
         <div class="col-lg-4">
          <label for="orc" class="col-form-label">ORC</label>
         </div>
         <div class="col-lg-6">
          <label id="orcText_modal" class="col-form-label"></label>
         </div>
         <div class="col-lg-4">
          <label for="wo" class="col-form-label">Work Order</label>
         </div>
         <div class="col-lg-6">
          <label id="orc_modal" class="col-form-label"></label>
         </div>
        </div>
        <div class="row align-items-center mb-0">
         <div class="col-lg-4">
          <label for="style_modal" class="col-form-label">Style</label>
         </div>
         <div class="col-lg-6">
          <label id="style_modal" class="col-form-label"></label>
         </div>
        </div>

        <div class="row align-items-center mb-0">
         <div class="col-lg-4">
          <label for="qty_order_modal" class="col-form-label">Qty Order</label>
         </div>
         <div class="col-lg-6">
          <label id="qty_order_modal" class="col-form-label"></label>
         </div>
        </div>


        <div class="row align-items-center mb-0">
         <div class="col-lg-4">
          <label for="size" class="col-form-label">Size</label>
         </div>
         <div class="col-lg-6">
          <select class="select2_modal" id="size"></select>
         </div>
        </div>
        <div class="row align-items-center mb-0">
         <div class="col-lg-4">
          <label for="qty_modal" class="col-form-label">Qty</label>
         </div>
         <div class="col-lg-4">
          <input type="number" id="qty_modal" class="form-control" placeholder="e.g 2000" min="0">
         </div>
        </div>
        <div class="row align-items-center mb-0">
         <div class="col-lg-4">
          <label for="pcs_each_bundle" class="col-form-label">Pcs Each Bundle</label>
         </div>
         <div class="col-lg-4">
          <input type="number" id="pcs_each_bundle" class="form-control" placeholder="e.g 18" min="0">
         </div>
        </div>
        <div class="row mb-1">
         <div class="col-lg-4">
          <label for="" class="col-form-label">Category</label>
         </div>
         <div class="col-lg-6 mt-2">
          <div class="form-check">
           <input class="form-check-input" type="checkbox" id="no_mold" name="no_mold">
           <label class="form-check-label" for="no_mold">Bra Without Mold</label>
          </div>
          <div class="form-check">
           <input class="form-check-input mold" type="checkbox" id="outer_mold" name="outer_mold">
           <label class="form-check-label" for="outer_mold">Outer Mold</label>
          </div>
          <div class="form-check">
           <input class="form-check-input mold" type="checkbox" id="mid_mold" name="mid_mold">
           <label class="form-check-label" for="mid_mold">Mid Cover Mold</label>
          </div>
          <div class="form-check">
           <input class="form-check-input mold" type="checkbox" id="linning_mold" name="linning_mold">
           <label class="form-check-label" for="linning_mold">Linning Mold</label>
          </div>
          <div class="form-check">
           <input class="form-check-input" type="checkbox" id="panty" name="panty">
           <label class="form-check-label" for="panty">Panty</label>
          </div>
          <div class="form-check">
           <input class="form-check-input outerwear" type="checkbox" id="juwita" name="juwita">
           <label class="form-check-label" for="juwita">Juwita</label>
          </div>
          <div class="form-check">
           <input class="form-check-input outerwear" type="checkbox" id="skp" name="skp">
           <label class="form-check-label" for="skp">SKP</label>
          </div>

         </div>
        </div>

       </div>
      </div>
      <div class="modal-footer">
       <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
       <button type="button" class="btn btn-primary" id="btnCreateBundle">Create Bundle</button>
      </div>
     </div>
    </div>
   </div>


  </div><!--end row-->

 </div>
</div>
<!--end page wrapper -->
<script>
 $('.single_select').select2({
  theme: 'bootstrap-5',
  width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style',
  // placeholder: $(this).data('placeholder'),
  // allowClear: Boolean($(this).data('allow-clear')),
  // dropdownParent: $('#modalAddbundle')
 });

 $('.select2_modal').select2({
  theme: 'bootstrap-5',
  width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style',
  // placeholder: $(this).data('placeholder'),
  // allowClear: Boolean($(this).data('allow-clear')),
  dropdownParent: $('#modalBundle_body')
 });
</script>

<script>
 var totalQtyModal = 0;
 var size;
 var qty;
 var idx = 0;
 var boxCount = 0;
 var dataTable;
 var outerMoldChecked;
 var midMoldChecked;
 var linningMoldChecked;
 var pantyChecked;
 var juwitaChecked;
 var skpChecked;
 var noMoldChecked;
 var bundlingTable;
 var cuttingSam;
 var stock;
//  var idx;
 var idWorkOrderMain;
 var boxesBefore=0;


 const sweet_loader = '<div class="sweet_loader"><svg viewBox="0 0 140 140" width="140" height="140"><g class="outline"><path d="m 70 28 a 1 1 0 0 0 0 84 a 1 1 0 0 0 0 -84" stroke="rgba(0,0,0,0.1)" stroke-width="4" fill="none" stroke-linecap="round" stroke-linejoin="round"></path></g><g class="circle"><path d="m 70 28 a 1 1 0 0 0 0 84 a 1 1 0 0 0 0 -84" stroke="#71BBFF" stroke-width="4" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-dashoffset="200" stroke-dasharray="300"></path></g></svg></div>';

 $(document).ready(function() {

  bundlingTable = $('#showBundleTable').DataTable({
   columns: [{
     'className': "text-center px-2"
    },
    {
     'className': "text-center px-2"
    },
    {
     'className': "text-center px-2"
    },
    {
     'className': "text-center px-2"
    },
    {
     'className': "text-center px-2"
    },

   ],
  });
  const loadOrc = () => {
   $('#orc').empty();
   $.ajax({
    url: " <?= site_url('cutting/get_orc_bundle_icon'); ?>",
    type: 'GET',
    dataType: 'JSON',
    beforeSend: function() {
     $("#orc").prepend($('<option></option>').html('Loading...'));
    },
   }).done(function(data) {
    $('#orc').empty();
    $('#orc').append($('<option>', {
     value: "",
    //  text: "- Select ORC -"
     text: "- Select Work Order -"
    }));
    $.each(data, function(i, item) {
     $('#orc').append($('<option>', {
      // value: item.orc,
      value: item.id_master_order_icon_main,
      text: item.orc
     }));
    });
   });
  }

  loadOrc();

  $('#orc').change(function() {
  //  var orc = $(this).val();
   var orc = $('#orc option:selected').text();
   idWorkOrderMain = $(this).val();
   // alert(orc);
   $.ajax({
    url: '<?php echo site_url("cutting/getBundleByOrcIcon"); ?>/' + orc,
    type: 'GET',
    dataType: 'json'
   }).done(function(dt) {
    $('#style_code').val(dt.data1[0].style_code);

    var color = dt.data1[0].color;
    $('#color').val(dt.data1[0].color);

    if (color.includes("BLACK")) {
     colorGroup = "Black";
    } else if (color.includes("WHITE")) {
     colorGroup = "White";
    } else {
     colorGroup = "color";
    }


    $('#po_customer').val(dt.data1[0].po_customer);

    $('#orcText').val(dt.data1[0].orc);

    $('#consignee_name').val(dt.data1[0].consignee_name);

    var todayDate = new Date();
    var nowYear = todayDate.getFullYear();
    var nowMonth = todayDate.getMonth() + 1;
    var nowDay = todayDate.getDate();

    var strDateNow = nowYear.toString() + "-" + (nowMonth < 10 ? "0" + nowMonth.toString() : nowMonth.toString()) + "-" + (nowDay < 10 ? "0" + nowDay.toString() : nowDay.toString());

    $('#quantity_ordered').val(dt.data1[0].quantity_ordered);
    quantity_ordered = dt.data1[0].quantity_ordered;

    $('#boxes').val("0");

    $('#AddBundle').prop('disabled', false);
    bundlingTable.clear().draw();
   })


  });


  $('#AddBundle').click(function() {
  //  let orc = $('#orc').val();
   let orc = $('#orc option:selected').text();

   idx = 0;

   $('#pcs_each_bundle').val("");
   $('#btnCreateBundle').prop('disabled', false);

   totalQtyModal = 0;
   stock = $('#quantity_ordered').val() - totalQtyModal;


   if (orc == "") {
    Swal.fire({
     icon: "warning",
     title: "Warning!",
     text: "Please select an orc",
     showConfirmButton: false,
     timer: 1750
    });
   } else {
    $("#modalBundle").modal('show');
    var style = $('#style_code').val();
    var ord = $('#quantity_ordered').val();
    var or = ord.split('.');
    var order = or[0];
    let orcText = $('#orcText').val();
    $('#orcText_modal').html(': ' + orcText);
    $('#orc_modal').html(': ' + orc);
    $('#style_modal').html(': ' + style);
    $('#qty_order_modal').html(': ' + order);
    $('#size').empty();
    loadSize();

   }

  })

  const loadSize = () => {
   $('#size').empty();
  //  let orc = $('#orc').val();
   let orc = $('#orc option:selected').text();
   $.ajax({
    url: " <?= site_url('cutting/get_size_icon'); ?>/" + orc,
    type: 'GET',
    dataType: 'JSON',
    beforeSend: function() {
     $("#size").prepend($('<option></option>').html('Loading...'));
    },
   }).done(function(data) {
    $('#size').empty();
    $('#size').append($('<option>', {
     value: "",
     text: "- Select size -"
    }));
    $.each(data, function(i, item) {
      console.log('item: ', item);
      if(parseInt(item.qty_size) > 0){
        $('#size').append($('<option>', {
         value: item.size,
         text: item.size
        }));
      }
    });
   });
  }

  $('#size').change(function() {

  //  let orc = $('#orc').val();
   let size = $(this).val();
   console.log(`size: ${size}`);
   if(size != null){
     let orc = $('#orc option:selected').text();
    //  size = $(this).val();
     var dataSize = {
      'orc': orc,
      'size': size
     };
     $.ajax({
      url: '<?php echo site_url("cutting/ajax_get_by_size_icon"); ?>',
      type: "POST",
      data: {
       'dataSize': dataSize,
      },
      dataType: "json",
     }).done(function(dt) {
      console.log('kl', dt);
      if (dt != null) {
       $('#qty_modal').val(dt[0].quantity);
       getSAM(dt);
      }
     });
    
   }

  });

  function getSAM(d) {
   sizeGroup = d[0].group;
   console.log('abc', sizeGroup);
   var style = $('#style_code').val();
   // console.log('uhuystyle', style);
   var dataForSAM = {
    'style': style,
    'color': colorGroup,
    'grup_size': sizeGroup
   };

   // console.log('dataForSAM: ', dataForSAM);

   $.ajax({
    url: "<?php echo site_url('cutting/ajax_get_sam'); ?>",
    type: "POST",
    data: {
     'dataForSAM': dataForSAM
    },
    dataType: "json",
   }).done(function(retVal) {
    console.log('retVal: ', retVal);
    if (retVal != null) {
     cuttingSam = retVal.sam_cutting ?? 0.00;
    }else{
      cuttingSam = 0.00;
    }
   })
  }

  $('#no_mold').click(function() {
   let no_mold = $('#no_mold').is(':checked');

   if (no_mold == true) {
    $('#no_mold').prop('disabled', false);
    $('#outer_mold').prop('disabled', true);
    $('#mid_mold').prop('disabled', true);
    $('#linning_mold').prop('disabled', true);
    $('#panty').prop('disabled', true);
    $("#juwita").prop("disabled", true);
    $("#skp").prop("disabled", true);
   } else {
    $('#no_mold').prop('disabled', false);
    $('#outer_mold').prop('disabled', false);
    $('#mid_mold').prop('disabled', false);
    $('#linning_mold').prop('disabled', false);
    $('#panty').prop('disabled', false);
    $("#juwita").prop("disabled", false);
    $("#skp").prop("disabled", false);
   }
  });

  $('.mold').click(function() {
   let outer_mold = $('#outer_mold').is(':checked');
   let mid_mold = $('#mid_mold').is(':checked');
   let linning_mold = $('#linning_mold').is(':checked');

   if (outer_mold == true || mid_mold == true || linning_mold == true) {
    $('#no_mold').prop('disabled', true);
    $('#outer_mold').prop('disabled', false);
    $('#mid_mold').prop('disabled', false);
    $('#linning_mold').prop('disabled', false);
    $('#panty').prop('disabled', true);
    $("#juwita").prop("disabled", true);
    $("#skp").prop("disabled", true);
   } else if (outer_mold == false && mid_mold == false && linning_mold == false) {
    $('#no_mold').prop('disabled', false);
    $('#outer_mold').prop('disabled', false);
    $('#mid_mold').prop('disabled', false);
    $('#linning_mold').prop('disabled', false);
    $('#panty').prop('disabled', false);
    $("#juwita").prop("disabled", false);
    $("#skp").prop("disabled", false);
   }
  });

  $('#panty').click(function() {
   let panty = $('#panty').is(':checked');

   if (panty == true) {
    $('#no_mold').prop('disabled', true);
    $('#outer_mold').prop('disabled', true);
    $('#mid_mold').prop('disabled', true);
    $('#linning_mold').prop('disabled', true);
    $('#panty').prop('disabled', false);
    $("#juwita").prop("disabled", true);
    $("#skp").prop("disabled", true);
   } else {
    $('#no_mold').prop('disabled', false);
    $('#outer_mold').prop('disabled', false);
    $('#mid_mold').prop('disabled', false);
    $('#linning_mold').prop('disabled', false);
    $('#panty').prop('disabled', false);
    $("#juwita").prop("disabled", false);
    $("#skp").prop("disabled", false);
   }
  });

  $('.outerwear').click(function() {
   let juwita = $('#juwita').is(':checked');
   let skp = $('#skp').is(':checked');

   if (juwita == true || skp == true) {
    $('#no_mold').prop('disabled', true);
    $('#outer_mold').prop('disabled', true);
    $('#mid_mold').prop('disabled', true);
    $('#linning_mold').prop('disabled', true);
    $('#panty').prop('disabled', true);
    $("#juwita").prop("disabled", false);
    $("#skp").prop("disabled", false);
   } else if (juwita == false && skp == false) {
    $('#no_mold').prop('disabled', false);
    $('#outer_mold').prop('disabled', false);
    $('#mid_mold').prop('disabled', false);
    $('#linning_mold').prop('disabled', false);
    $('#panty').prop('disabled', false);
    $("#juwita").prop("disabled", false);
    $("#skp").prop("disabled", false);
   }
  });


  $('#btnCreateBundle').click(function() {
   let qty_start_order = $('#quantity_ordered').val();
   let size = $('#size').val();
   let qty_modal = $('#qty_modal').val();
   let pcs_each_bundle = $('#pcs_each_bundle').val();

   let no_mold = $('#no_mold').prop('checked');
   let outer_mold = $('#outer_mold').prop('checked');
   let mid_mold = $('#mid_mold').prop('checked');
   let linning_mold = $('#linning_mold').prop('checked');
   let panty = $('#panty').prop('checked');
   let juwita = $('#juwita').prop('checked');
   let skp = $('#skp').prop('checked');

   // console.log(qty_modal)
   // console.log(pcs_each_bundle)

   if (size == '' || qty_modal == '' || pcs_each_bundle == '') {
    Swal.fire({
     icon: "warning",
     title: "Warning!",
     text: "There are forms that have not been filled.",
     showConfirmButton: false,
     timer: 1750
    });
   } else if (no_mold == false && outer_mold == false && mid_mold == false && linning_mold == false && panty == false && juwita == false && skp == false) {
    Swal.fire({
     icon: "warning",
     title: "Warning!",
     text: "Please select category.",
     showConfirmButton: false,
     timer: 1750
    });
   } else {

    totalQtyModal += parseInt($('#qty_modal').val());
    stock = qty_start_order - totalQtyModal;

    // console.log(totalQtyModal);
    // console.log(stock);

    $('#qty_modal').on('input', function() {
     let qty_start_order = $('#quantity_ordered').val();
     var value = $(this).val();

     if ((value !== '') && (value.indexOf('.') === -1)) {
      $(this).val(Math.max(Math.min(value, stock), 0));
     }
    });


    $('#stock_qty_order_modal').html(': ' + stock);

    swal.fire({
     html: '<h5>Loading...</h5>',
     showConfirmButton: false,
     didOpen: function() {
      $('.swal2-html-container').prepend(sweet_loader);
     }
    });

    createBundle();

    if (stock <= 0) {
     $('#btnCreateBundle').prop('disabled', true)
    }

   }

  });

  $('#modal_add_bundle').on('hidden.bs.modal', function(e) {
   $(this)
    .find('input,select')
    .val('')
    .end()
    .find('input[type=checkbox], input[type=radio]')
    .prop('checked', '')
    .end();
  });

  function createBundle() {
  //  let orc = $('#orc').val();
    var orc = $('#orc option:selected').text();
    var orcText = $('#orcText').val();
    var selectedSize = $('#size').val();

  //  var dataString = {
  //   'orc': orc,
  //   'size': selectedSize
  //  };

    $.ajax({
      type: 'GET',
      url: '<?= site_url("cutting/ajaxGetCountCuttingDetailByBarcode"); ?>/' + orc,
      dataType: 'json'
    }).done(function(num){
      
      var pcs_each_bundle = parseInt($('#pcs_each_bundle').val());

      var qty = parseInt($('#qty_modal').val());

      var box = Math.floor(qty / pcs_each_bundle);

      var zero = "0";

      var bundleArr = [];

      var strIdx;

      var bundleNo;

      boxesBefore = num.data;

      var totalBox = boxesBefore + box;

      for (let x = boxesBefore + 1; x <= totalBox; x++) {
        idx = x;
        strIdx = idx.toString();
        bundleNo = zero.repeat(4 - strIdx.length) + strIdx + "(" + pcs_each_bundle.toString() + ")";
        // bundleNo = zero.repeat(4 - x.length) + strIdx + "(" + pcs_each_bundle.toString() + ")";

        bundleArr.push({
          'size': selectedSize,
          // 'size': selectedSize[0].text,
          'qty': qty,
          'qty_pcs': pcs_each_bundle,
          'no': bundleNo,
          'barcode': orc + "-" + zero.repeat(4 - strIdx.length) + strIdx //+ "-" + pcs_each_bundle.toString()
        });
      }
      var sisa = Math.round(qty % pcs_each_bundle);

      if (sisa > 0) {
        idx++;
        strIdx = idx.toString();
        bundleNo = zero.repeat(4 - strIdx.length) + idx.toString() + "(" + sisa.toString() + ")";
        bundleArr.push({
        'size': selectedSize,
        // 'size': selectedSize[0].text,
        'qty': qty,
        'qty_pcs': sisa,
        'no': bundleNo,
        'barcode': orc + "-" + zero.repeat(4 - strIdx.length) + strIdx //+ "-" + sisa.toString()
        });
      }

      boxCount += bundleArr.length;
      $('#boxes').val(boxCount);
      $.each(bundleArr, function(i, item) {
        bundlingTable.row.add([
        item.size,
        item.qty,
        item.qty_pcs,
        item.no,
        item.barcode
        ]).draw();
      });

      style = $('#style_code').val();
      var color = $('#color').val();
      var buyer = $('#consignee_name').val();
      // var comm = $('#comm').val();
      var so = $('#po_customer').val();
      var qty = $('#quantity_ordered').val();
      var boxes = $('#boxes').val();
      // var prepare_on = $('#prepare_on').val();
      outerMoldChecked = $('#outer_mold').is(':checked');
      midMoldChecked = $('#mid_mold').is(':checked');
      linningMoldChecked = $('#linning_mold').is(':checked');
      pantyChecked = $('#panty').is(':checked');
      noMoldChecked = $('#no_mold').is(':checked');
      juwitaChecked = $('#juwita').is(':checked');
      skpChecked = $('#skp').is(':checked');

      var dataStrCutting = {
        'id_master_order_icon_main': idWorkOrderMain,
        'orc': orcText,
        'style': style,
        'color': color,
        'grup_color': colorGroup,
        'buyer': buyer,
        // 'comm': comm,
        'so': so,
        'qty': qty,
        'boxes': boxes,
        'work_order': orc
        // 'prepare_on': prepare_on
      }
      $.ajax({
        type: 'POST',
        url: '<?php echo site_url("cutting/ajax_save_cutting"); ?>',
        data: {
        'dataStrCutting': dataStrCutting
        },
        dataType: 'json'
      }).done(function(data) {
        if (data > 0) {
          idCutting = data;
          saveDetail(idCutting, bundleArr, outerMoldChecked, midMoldChecked, linningMoldChecked, pantyChecked, noMoldChecked, juwitaChecked, skpChecked);
        }
      });

    });
  }

  function saveDetail(idCut, dtTable, outer, mid, linning, panty, noMold, juwita, skp) {

   var dataCuttingDetail;

   var arrDataCuttingDetail = [];

   $.each(dtTable, function(i, item) {
    // console.log(item);

    if (noMold == true) {
     dataCuttingDetail = {
      'id_cutting': idCut,
      'size': item.size,
      'grup_size': sizeGroup,
      'cutting_sam': cuttingSam,
      'qty': item.qty,
      'qty_pcs': item.qty_pcs,
      'sam_result': cuttingSam * item.qty_pcs,
      'no_bundle': item.no,
      'kode_barcode': item.barcode,
      'outermold_barcode': "",
      'midmold_barcode': "",
      'linningmold_barcode': "",
      'panty_barcode': "",
      'juwita_barcode': "",
      'skp_barcode': ""
     };
    } else if (outer == true || mid == true || linning == true) {
     dataCuttingDetail = {
      'id_cutting': idCut,
      'size': item.size,
      'grup_size': sizeGroup,
      'cutting_sam': cuttingSam,
      'qty': item.qty,
      'qty_pcs': item.qty_pcs,
      'sam_result': cuttingSam * item.qty_pcs,
      'no_bundle': item.no,
      'kode_barcode': item.barcode,
      'outermold_barcode': (outer == true ? "O" + item.barcode : ""),
      'midmold_barcode': (mid == true ? "M" + item.barcode : ""),
      'linningmold_barcode': (linning == true ? "L" + item.barcode : ""),
      'panty_barcode': "",
      'juwita_barcode': "",
      'skp_barcode': ""
     };
    } else if (panty == true) {
     dataCuttingDetail = {
      'id_cutting': idCut,
      'size': item.size,
      'grup_size': sizeGroup,
      'cutting_sam': cuttingSam,
      'qty': item.qty,
      'qty_pcs': item.qty_pcs,
      'sam_result': cuttingSam * item.qty_pcs,
      'no_bundle': item.no,
      'kode_barcode': item.barcode,
      'outermold_barcode': "",
      'midmold_barcode': "",
      'linningmold_barcode': "",
      'panty_barcode': item.barcode,
      'juwita_barcode': "",
      'skp_barcode': ""
     };
    } else if (juwita == true || skp == true) {
     dataCuttingDetail = {
      'id_cutting': idCut,
      'size': item.size,
      'grup_size': sizeGroup,
      'cutting_sam': cuttingSam,
      'qty': item.qty,
      'qty_pcs': item.qty_pcs,
      'sam_result': cuttingSam * item.qty_pcs,
      'no_bundle': item.no,
      'kode_barcode': item.barcode,
      'outermold_barcode': "",
      'midmold_barcode': "",
      'linningmold_barcode': "",
      'panty_barcode': "",
      'juwita_barcode': (juwita == true ? "J" + item.barcode : ""),
      'skp_barcode': (skp == true ? "S" + item.barcode : "")
     };
    }
    arrDataCuttingDetail.push(dataCuttingDetail);


   });
  //  console.table('arrDataCuttingDetail: ', arrDataCuttingDetail);
   $.ajax({
    type: 'POST',
    url: '<?php echo site_url("cutting/ajax_save_detail_cutting"); ?>',
    data: {
     'dataCuttingDetail': arrDataCuttingDetail
    },
    dataType: 'json',

   }).done(function(rst) {
      // console.log(rst);
      if (rst == "OK") {
      Swal.fire({
        icon: 'success',
        title: 'Success',
        text: 'Bundle created successfully.',
        showConfirmButton: false,
        timer: 1500
      });

      //  $('#size').val(null).trigger('change');
      $('#size option:selected').remove();
      $('#qty_modal').val("");
      $('#size').focus();
    }
   });
  }


 });
</script>