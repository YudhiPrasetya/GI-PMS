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

   .dt-body-center{
      text-align: center;
   }
</style>

<div class="page-wrapper">
   <div class="page-content">
      <!-- page breadcrumb -->
       <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
         <div class="breadcrumb-title pe-3">Packing</div>
         <div class="ps-3">
            <nav aria-label="breadcrumb">
               <ol class="breadcrumb mb-0 p-0">
                  <li class="breadcrumb-item">
                     <a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                  </li>
                  <li class="breadcrumb-item active" aria-current="page">Master Order Packing</li>
               </ol>

            </nav>
         </div>
       </div>
       <!-- end of breadcrumb -->

       <!-- Content -->
      <h6 class="mb-0 text-uppercase">Master Order Packing</h6>
      <hr />

      <div class="card">
         <div class="card-body">
            <div class="row my-3 mx-2">
               <div class="col-lg-12">
                  <div class="accordion" id="acc">
                     <div class="accordion-item" style="border: 0px;">
                        <h2 class="accordion-header" id="headingOne">
                           <button class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                              <i class='bx bx-plus-circle'></i>Create New Order
                           </button>                           
                        </h2>
                        <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#acc">
                           <div class="accordion-body">

                              <ul class="nav nav-tabs nav-warning" role="tablist">
                                 <li class="nav-item" role="presentation">
                                       <a class="nav-link active" data-bs-toggle="tab" href="#byWO" role="tab" aria-selected="true">
                                          <div class="d-flex align-items-center">
                                             <div class="tab-icon"><i class='bx bx-pie-chart-alt font-18 me-1'></i>
                                             </div>
                                             <div class="tab-title">By Work Order</div>
                                          </div>
                                       </a>
                                 </li>
                                 <li class="nav-item" role="presentation">
                                       <a class="nav-link" data-bs-toggle="tab" href="#byORC" role="tab" aria-selected="false">
                                          <div class="d-flex align-items-center">
                                             <div class="tab-icon"><i class='bx bx-pie-chart-alt-2 font-18 me-1'></i>
                                             </div>
                                             <div class="tab-title">By ORC</div>
                                          </div>
                                       </a>
                                 </li>
                              </ul>

                              <div class="tab-content py-3 px-2">
                                 <div class="tab-pane fade show active" id="byWO" role="tabpanel">
                                    <div class="row">
                                       <div class="col-6">
   
                                          <div class="row mb-2">
                                             <label for="wo" class="col-sm-2 col-form-label">W O</label>
                                             <div class="col-sm-6">
                                                <select name="wo" id="wo" class="form-control form-control-sm select2"></select>
                                             </div>
                                          </div>

                                          <div class="row mb-2">
                                             <label for="orc" class="col-sm-2 col-form-label">ORC</label>
                                             <div class="col-sm-6">
                                                <input type="text" name="orc" id="orc" class="form-control form-control-sm" disabled>
                                             </div>
                                          </div>
   
                                          <div class="row mb-2">
                                             <label for="style" class="col-sm-2 col-form-label">Style</label>
                                             <div class="col-sm-6">
                                                <input type="text" name="style" id="style" class="form-control form-control-sm" disabled />
                                             </div>
                                          </div>
   
                                          <div class="row mb-2">
                                             <label for="color" class="col-sm-2 col-form-label">Color</label>
                                             <div class="col-sm-6">
                                                <input type="text" name="color" id="color" class="form-control form-control-sm" disabled />
                                             </div>
                                          </div>
   
                                          <div class="row mb-2">
                                             <label for="buyer" class="col-sm-2 col-form-label">Buyer</label>
                                             <div class="col-sm-6">
                                                <input type="text" name="buyer" id="buyer" class="form-control form-control-sm" disabled />
                                             </div>
                                          </div>
   
                                          <div class="row mb-2">
                                             <label for="nopo" class="col-sm-2 col-form-label">NO.PO</label>
                                             <div class="col-sm-6">
                                                <input type="text" name="nopo" id="nopo" class="form-control form-control-sm" disabled />
                                             </div>
                                          </div>

                                          <div class="row mb-2">
                                             <label for="qty" class="col-sm-2 col-form-label">QTY</label>
                                             <div class="col-sm-6">
                                                <input type="text" name="qty" id="qty" class="form-control form-control-sm" disabled />
                                             </div>
                                          </div>
                                       </div>

                                       <div class="col-6">
                                          <div class="row">
                                             <div class="card">
                                                <div class="card-body">
                                                   <!-- <button class="btn btn-info btn-sm mb-2" id="addAll" disabled>Add All</button> -->
                                                   <table class="table table-bordered table-striped table-hover table-sm nowrap display compact" id="tableBoxCapacity" cellspacing="0" width="100%">
                                                      <thead>
                                                         <tr>
                                                            <th class="text-center">Size</th>
                                                            <th class="text-center">Qty</th>
                                                            <th class="text-center">Box Capacity</th>
                                                            <th class="text-center">Total Box</th>
                                                         </tr>
                                                      </thead>
                                                   </table>
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="row justify-content-end">
                                       <button class="col-1 btn btn-success" id="btnSave" disabled>Save</button>
                                    </div>
                                    <hr>
                                    <table class="table table-bordered table-striped table-hover display" id="tableMasterOrderPacking" width="100%">
                                       <thead>
                                          <tr>
                                             <th></th>
                                             <th>ID</th>
                                             <th>Date</th>
                                             <th>ORC</th>
                                             <th>WO</th>
                                             <th>Style</th>
                                             <th>Color</th>
                                             <th>Buyer</th>
                                             <th>No.PO</th>
                                             <th>Qty Order</th>
                                          </tr>
                                       </thead>
                                    </table>
                                 </div>

                                 <div class="tab-pane fade" id="byORC" role="tabpanel">
                                    <!-- <div class="row my-3">
                                       <div class="col-lg-12">
                                          <button type="button" id="btnInputManual" class="btn btn-info text-end"><i class="fadeIn animated bx bx-user"></i> Input Manual</button>
                                       </div>
                                    </div>
                                    <div class="row">
                                       <div class="col-lg-6">
                                          <div class="row mb-3">
                                                <div class="col-lg-3">
                                                   <label for="barcodePackingPcs" class="col-form-label">Barcode</label>
                                                </div>
                                                <div class="col-lg-6">
                                                   <input type="text" id="barcodePackingPcs" class="form-control">
                                                </div>
                                          </div>
                                          <div class="row mb-3">
                                                <div class="col-lg-3">
                                                   <label for="orc" class="col-form-label">ORC</label>
                                                </div>
                                                <div class="col-lg-6">
                                                   <input type="text" id="orc" class="form-control" disabled>
                                                </div>
                                          </div>
                                          <div class="row mb-3">
                                                <div class="col-lg-3">
                                                   <label for="style" class="col-form-label">Style</label>
                                                </div>
                                                <div class="col-lg-6">
                                                   <input type="text" id="style" class="form-control" disabled>
                                                </div>
                                          </div>
                                          <div class="row mb-3">
                                                <div class="col-lg-3">
                                                   <label for="color" class="col-form-label">Color</label>
                                                </div>
                                                <div class="col-lg-6">
                                                   <input type="text" id="color" class="form-control" disabled>
                                                </div>
                                          </div>
                                       </div>
                                       <div class="col-lg-6">
                                          <div class="row mb-3">
                                                <div class="col-lg-3">
                                                   <label for="size" class="col-form-label">Size</label>
                                                </div>
                                                <div class="col-lg-6">
                                                   <input type="text" id="size" class="form-control" disabled>
                                                </div>
                                          </div>
                                          <div class="row mb-3">
                                                <div class="col-lg-3">
                                                   <label for="no_bundle" class="col-form-label">No. Bundle</label>
                                                </div>
                                                <div class="col-lg-6">
                                                   <input type="text" id="no_bundle" class="form-control" disabled>
                                                </div>
                                          </div>
                                          <div class="row mb-3">
                                                <div class="col-lg-3">
                                                   <label for="pcs" class="col-form-label">Qty Pcs</label>
                                                </div>
                                                <div class="col-lg-3">
                                                   <input type="number" id="pcs" class="form-control" disabled>
                                                </div>
                                          </div>
                                          <div class="row mb-3">
                                                <div class="col-lg-3">
                                                   <label for="new_pcs" class="col-form-label">Qty New Pcs</label>
                                                </div>
                                                <div class="col-lg-3">
                                                   <input type="number" id="new_pcs" class="form-control">
                                                </div>
                                          </div>
                                       </div>
                                    </div>

                                    <div class="row my-4">
                                       <div class="col-lg-6">
                                          <div class="row">
                                                <div class="col-lg-3"></div>
                                                <div class="col-lg-9">


                                                   <button type="button" id="btnUpdatePcsBox" class="btn btn-success" disabled><i class="fadeIn animated bx bx-upload"></i>&nbsp;Update</button>

                                                   <button type="button" id="btnCancelPcsBox" class="btn btn-warning"><i class="fadeIn animated bx bx-window-close"></i>&nbsp;Cancel</button>
                                                </div>
                                          </div>
                                       </div>


                                    </div>

                                    <hr>
                                    <table class="table table-bordered table-striped table-hover table-sm nowrap" id="tableInputTransferAreaPcsTemp">
                                       <thead>
                                          <tr>
                                             <th class="text-center">#</th>
                                             <th class="text-center">ORC</th>
                                             <th class="text-center">Style</th>
                                             <th class="text-center">Color</th>
                                             <th class="text-center">Size</th>
                                             <th class="text-center">No.Box</th>
                                             <th class="text-center">Pcs</th>
                                             <th class="text-center">Barcode</th>
                                             <th class="text-center">Lokasi</th>
                                          </tr>
                                       </thead>
                                       <tfoot>
                                          <tr>
                                             <th colspan="6" class="text-center">Total</th>
                                             <th class="text-center"></th>
                                             <th class="text-center"></th>
                                             <th class="text-center"></th>
                                          </tr>
                                       </tfoot>
                                    </table> -->
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

<script>
   $('.select2').select2({
   theme: 'bootstrap-5',
   width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style',
   // placeholder: $(this).data('placeholder'),
   // allowClear: Boolean($(this).data('allow-clear')),
   // dropdownParent: $('#createNewOrderModal_body')
   });

   var wo = '';
   var style = '';
   var qty = 0;
   var idMasterOrderIconMain = 0;

   $(document).ready(function(){
      const sweet_loader = '<div class="sweet_loader"><svg viewBox="0 0 140 140" width="140" height="140"><g class="outline"><path d="m 70 28 a 1 1 0 0 0 0 84 a 1 1 0 0 0 0 -84" stroke="rgba(0,0,0,0.1)" stroke-width="4" fill="none" stroke-linecap="round" stroke-linejoin="round"></path></g><g class="circle"><path d="m 70 28 a 1 1 0 0 0 0 84 a 1 1 0 0 0 0 -84" stroke="#71BBFF" stroke-width="4" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-dashoffset="200" stroke-dasharray="300"></path></g></svg></div>';

      var tableMasterOrderPacking = $('#tableMasterOrderPacking').DataTable({
         ajax: '<?= site_url("packing/getMasterOrderPacking"); ?>',
         columns: [
            {
               className: 'dt-control',
               orderable: false,
               data: null,
               defaultContent: '',
            },
            {
               visible: false,
               data: 'id'
            },
            { data: 'created_date' },
            { data: 'orc' },
            { data: 'wo' },
            { data: 'style' },
            { data: 'color' },
            { data: 'buyer' },
            { data: 'no_po' },
            { data: 'qty_order' },
         ],
         columnDefs: [
            {
               targets: 2,
               render: function(data, type, row){
                  let dateSplit = data.split("-");

                  return `${dateSplit[2].split(" ")[0]}-${dateSplit[1]}-${dateSplit[0]}`;
               }
            }
         ]
      });

      $('#tableMasterOrderPacking tbody').on('click', 'td.dt-control', function(){
         let tr = $(this).closest('tr');
         let row = tableMasterOrderPacking.row(tr);

         if(row.child.isShown()){
            row.child.hide();
         }else{
            // row.child(format(row.data())).show();
            console.log('row.data()', row.data());
            var selectedRow = row.data();
            $.when(fetchMasterOrderPackingDetailById(selectedRow.id)).done(function(rst){
               console.log('rst: ', rst);
               row.child(format(rst)).show();
            });
         }
      });

      async function fetchMasterOrderPackingDetailById(id){
         try{
            const data = await $.ajax({
               type: 'GET',
               url: '<?= site_url("packing/ajax_getMasterOrderPackingDetailById"); ?>/' + id,
               dataType: 'JSON',
            });
            return data;
         }catch(error){
            console.error("Error fetching data:", error);
            throw error;
         }         
      }

      function format(rst){
         let HTMLRow = '';
         for(let x=0; x < rst.data.length; x++){
            HTMLRow += '<tr>' +
                        '<td>' + rst.data[x].size + '</td>' +
                        '<td>' + rst.data[x].qty + '</td>' +
                        '<td>' + rst.data[x].carton_capacity + '</td>' +
                        '<td>' + Math.ceil(parseInt(rst.data[x].qty) / parseInt(rst.data[x].carton_capacity)) + '</td>' +
                        '<td>' + (rst.data[x].qty == 0 || rst.data[x].carton_capacity == 0 ? '<button class="btn btn-sm btn-success">Add</button>' : "") +
                      '</tr>'
         };
         return (
               '<div class="row">' +
                  '<div class="col-6">'+
                     '<table id="tableMasterOrderPacking_detail" class="table table-striped table-bordered" width="50%" >' + 
                        '<thead>' + 
                           '<tr>' + 
                              '<th>Size</th>' +
                              '<th>Qty</th>' +
                              '<th>Kapasitas Karton</th>' +
                              '<th>Total Karton</th>' +
                              '<th>Action</th>'+
                           '</tr>' +
                        '</thead>' +
                        '<tbody>' +
                           HTMLRow +
                        '</tbodt>' +
                     '</table>'+
                  '</div>'+
               '</div>'
         );
      }

      var tableBoxCapacity = $('#tableBoxCapacity').DataTable({
         destroy: true,
         responsive: true,
         searching: false,
         paging: false,
         info: false,
         columns: [
            {className: "dt-body-center"},
            {className: "dt-body-center"},
            {className: "dt-body-center"},
            {className: "dt-body-center"},
         ]
      });

      const loadWO = () => {
         $('#wo').empty();

         $.ajax({
            type: 'GET',
            url: '<?= site_url("packing/ajax_getWorkOrders"); ?>',
            dataType: 'JSON',
            beforeSend: function() {
               $("#wo").prepend($('<option></option>').html('Loading...'));
            },            
         }).done(function(result){
            $('#wo').empty();
            $('#wo').append($('<option>', {
               value: "",
               text: "- Select Work Order -"
            }));
            $.each(result.data, function(i, item) {
               $('#wo').append($('<option>', {
                  value: item.id_master_order_icon_main,
                  text: item.work_order
               }));
            });            
         });
      }
      loadWO();

      async function fetchWODetailsByWO(w){
         try{
            const data = await $.ajax({
               type: 'GET',
               url: '<?= site_url("packing/ajax_getWODetailsByWO"); ?>/' + wo,
               dataType: 'JSON'               
            });
            return data;
         }catch(error){
            console.error("Error fetching data:", error);
            throw error;
         }
      }

      async function fetchKapasitasKarton(st, size){
         try{
            const dt = await $.ajax({
               type: 'GET',
               url: '<?= site_url("packing/ajax_getKapasitasKarton"); ?>',
               data: {
                  style: st,
                  size: size
               },
               dataType: 'JSON'
            });
            
            return dt;
         }catch(error){
            console.error("Error fetching data:", error);
            throw error;
         }
      }

      function clearControls(){
         $('#orc').val('');
         $('#color').val('');
         $('#buyer').val('');
         $('#style').val('');
         $('#nopo').val('');
         $('#qty').val('');         
      }

      $('#wo').change(function(){
         clearControls();
         // tableBoxCapacity.clear().draw();
                  
         idMasterOrderIconMain = parseInt($(this).val());
         console.log('idMasterOrderIconMain: ', idMasterOrderIconMain);

         let selectedOption = $('#wo').select2('data');
         wo = selectedOption[0].text;
         if(wo !=""){
            $.when(fetchWODetailsByWO(wo)).done(function(rst1){
               $('#orc').val(rst1.data[0].orc);
               $('#color').val(rst1.data[0].color);
               $('#buyer').val(rst1.data[0].consignee_name);
               $('#style').val(rst1.data[0].style_code);
               $('#nopo').val(rst1.data[0].po_customer);
               $('#qty').val(rst1.data[0].quantity_ordered);

               style = $('#style').val();
               qty = parseInt($('#qty').val());

               tableBoxCapacity.clear().draw();
               arrKapasitasKarton = [];
               
               $.each(rst1.data, function(i, item){
                  $.when(fetchKapasitasKarton(style, item.size)).done(function(rst2){
                     if(parseInt(item.qty_size) > 0){
                        let kapasitasKarton = parseInt(rst2.data[0].kapasitas_karton);
                        let qtySize = parseInt(item.qty_size);
                        let totalBox = Math.ceil(qtySize/kapasitasKarton);
                        tableBoxCapacity.row.add([
                           item.size,
                           item.qty_size,
                           rst2.data[0].kapasitas_karton,
                           //item.qty_size != "0" ? '<span class="badge bg-success" style="cursor:pointer;">Add</span>' : ""
                           totalBox
   
                        ]).draw();
                     }
                  });
               });
            });
            $('#btnSave').prop('disabled', false);
            // setTimeout(function(){
            //    let boxCapacityRowsCount = tableBoxCapacity.data().count();
            //    if(boxCapacityRowsCount <= 0){
            //       // $('#addAll').prop('disabled', true);
            //       $('#btnSave').prop('disabled', true);
            //       swal.fire({
            //          icon: 'warning',
            //          title: 'Summary Warning',
            //          html: 'Semua style dan size untuk work order ' + wo + ' belum dibuatkan kapasitas karton/box nya!!',
            //          showConfirmButton: true
            //       });
            //    }else{
            //       // $('#addAll').prop('disabled', false);
            //       $('#btnSave').prop('disabled', false);
            //       let arrNoBoxCapacity = [];
            //       tableBoxCapacity.rows().eq(0).each(function(idx){
            //          let row = tableBoxCapacity.row(idx);
            //          let data = row.data();
            //          // console.log('data: ', data);
            //          if(data[3] == ""){
            //             let objNoBoxCapacity = {
            //                "style": style,
            //                "size": data[0],
            //             };
            //             arrNoBoxCapacity.push(objNoBoxCapacity);
            //          }
            //       });
            //       if(arrNoBoxCapacity.length > 0){
            //          swal.fire({
            //             icon: 'warning',
            //             title: 'Summary Warning',
            //             html: 'Ada style dan size untuk work order ' + wo + ' yang belum dibuatkan kapasitas karton/box nya!!',
            //             showConfirmButton: true
            //          });                     
            //       }
            //    }

            // }, 500);
         }
      });

      // $('#tableBoxCapacity tbody').on('click', 'span', function(){
      //    let selectedData = tableBoxCapacity.row($(this).parents('tr')).data();
      //    // let selectedData = tableBoxCapacity.row((this).data());
      //    console.log('selectedData: ', selectedData);
      // });

      $('#btnSave').click(function(){
         let dataMain = {
            id_master_order_icon_main: idMasterOrderIconMain,
            wo: wo,
            orc: $('#orc').val(),
            base_orc: "-",
            style: $('#style').val(),
            color: $('#color').val(),
            buyer: $('#buyer').val(),
            no_po: $('#nopo').val(),
            qty_order: parseInt($('#qty').val())
         }

         let dataDetails = [];
         tableBoxCapacity.rows().every(function(){
            let data = this.data();
            // if(data[1] != "0"){
            let objData = {
               'size': data[0],
               'carton_capacity': parseInt(data[2]),
               'qty': parseInt(data[1])
            }
            dataDetails.push(objData);
            // }
         });

         $.when(saveMasterPacking(dataMain, dataDetails)).done(function(result){
            if(result.length > 0){
               swal.fire({
                  icon: 'success',
                  title: 'Konfirmasi',
                  html: 'Simpan data berhasil!',
                  showConfirmButton: true                  
               }).then(function(){
                  clearControls();
                  tableBoxCapacity.clear().draw();
               })
            }
         });
      });

      async function saveMasterPacking(dtMain, dtDetails){
         try{
            const response = await $.ajax({
               type: 'POST',
               url: '<?= site_url("packing/ajax_PostMasterOrderPacking"); ?>',
               data: {
                  dataMain: dtMain,
                  dataDetail: dtDetails
               },
               dataType: 'JSON'
            });
            return response;
         }catch(error){
            console.error("Error saving data...", error);
         }
      }

      // $('#addAll').click(function(){

      // });

   });
</script>