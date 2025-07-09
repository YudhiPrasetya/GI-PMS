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
    /* text-align: center; */
    justify-content: center;
  }
</style>

<div class="page-wrapper">
 <div class="page-content">
  <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
   <div class="breadcrumb-title pe-3">Packing</div>
   <div class="ps-3">
    <nav aria-label="breadcrumb">
     <ol class="breadcrumb mb-0 p-0">
      <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
      </li>
      <li class="breadcrumb-item active" aria-current="page">Solid Packing Box Capacity</li>
     </ol>
    </nav>
   </div>
  </div>
  <h6 class="mb-0 text-uppercase">Solid Packing Box Capacity</h6>
  <hr />
  <div class="row">
   <div class="col-8">
    <div class="card">

     <div class="card-body">
      <div class="mx-3 my-3">

       <div class='form-group row mb-3'>
        <div class='col-md-6'>
         <button id='btnAddNew' class='btn btn-primary'><i class='bx bx-plus-circle'></i> Add New Capacities</button>
        </div>
       </div>

       <!-- <div class="table-responsive"> -->
       <table id="capacityTable" class="table table-striped table-bordered table-sm nowrap" style="width:100%">
        <thead>
         <th>No.</th>
         <th>Style</th>
         <th>Action</th>
        </thead>
       </table>
       <!-- </div> -->
      </div>
     </div>
    </div>
   </div>
  </div>
 </div>
</div>


<!-- Modal Details -->
<div class="modal fade" id="modalDetail" aria-hidden="true">
 <div class="modal-dialog modal-lg">
  <div class="modal-content">
   <div class="modal-header">
    <h5 class="modal-title">Size Box Capacity</h5>
    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
   </div>
   <div class="modal-body">
    <div class="row mx-3 my-3">
     <div class="col-md-12">

      <table id="showSizeCapacity" class="table table-striped">
       <thead>
        <tr>
         <th>Style</th>
         <th>Size</th>
         <th>Capacity (box)</th>
        </tr>
       </thead>
      </table>
     </div>
    </div>
   </div>
   <!-- <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        </div> -->
  </div>
 </div>
</div>

<!-- Modal Add -->
<div class="modal fade" id="modal_add_kapasitas_box" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Add New Capacity</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body" id="modal_add_kapasitas_box_body">
        <div class="row mx-3 my-3 justify-content-center">
          <div class="col-md-12">
            <div class="row g-3 align-items-center mb-3">
              <div class="col-lg-2">
                <label for="wo" class="col-form-label">Work Order</label>
              </div>
              <div class="col-lg-10">
                <select class="single_select" id="wo" name="wo"></select>
              </div>
            </div>
            <div class="row g-3 align-items-center mb-3">
              <div class="col-lg-2">
                <label for="style" class="col-form-label">Style</label>
              </div>
              <div class="col-lg-10">
                <input class="form-control" id="style" name="style" disabled />
              </div>
            </div>
            <div class="row g-3 align-items-center mb-3">
              <div class="col-lg-2">
                <label for="allCapacity" class="col-form-label">Set All Capacity</label>
              </div>
              <div class="col-lg-10">
                <div class="input-group">
                  <input type="number" name="allCapacity" id="allCapacity" class="form-control" disabled>
                  <button class="btn btn-warning" id="btnSetAllCapacity" disabled>Set</button>
                </div>
              </div>
            </div>
          </div>
          <div class="col-8">
            <table id="packingDetailTable" class="table table-bordered nowrap dt-responsive">
              <thead>
                <tr>
                  <th class="text-center">Size</th>
                  <th class="text-center">Box Capacity</th>
                </tr>
              </thead>
            </table>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <!-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> -->
        <button type="button" class="btn btn-primary" id="btnSave" disabled><i class="fadeIn animated bx bx-upload"></i> Save</button>
      </div>
    </div>
  </div>
</div>

<script>
 $('.single_select').select2({
  theme: 'bootstrap-5',
  width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style',
  dropdownParent: $('#modal_add_kapasitas_box_body')
 });
</script>


<script>
  $(document).ready(function() {
    var mode = "";
    var rstWOLength = 0;
    var woID = "";
    var idWO = 0;
    var idOrderIcon = 0;

    var tableDetail = $('#packingDetailTable').DataTable({
      autoWidth: true,
      info: false,
      searching: false,
      paging: false,
      destroy: true,
      responsive: true,
      columns: [{
        'className': "text-center align-middle"
        },
        {
        'className': "text-center align-middle"
        },
      ],
      columnDefs: [
        {
          targets: [0,1], 
          sortable: false
        }
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
                value: `${item.id}-${item.id_master_order_icon_main}`,
                text: item.work_order
              }));
          });            
        });
    }
    
    loadWO();
    
    $('#wo').change(function(){
      woID = $(this).val();
      let arrWOID = woID.split("-");
      idWO = parseInt(arrWOID[0]);
      idOrderIcon = parseInt(arrWOID[1]);

      // fetch sizes on work_order_details based on work_order id
      $.when(fetchSizesOnWorkOrderDetails(idWO), fetchStyleOnMasterOrderIcon(idOrderIcon)).done(function(rstWO, rstOrderIcon){
        $('#style').val(rstOrderIcon.data[0].style_code);
        tableDetail.clear().draw();
        let y = -1;
        for(let x = 0; x < rstWO.data.length; x++){
          if(parseInt(rstWO.data[x].qty_size) > 0){
              let size = rstWO.data[x].size;
              y++;
              tableDetail.row.add([
                size,
                `<input type="number" class="form-control capacity col-2" id=capacity${y}>`
              ]).draw();
          }
        }
        // $('#btnOK').prop('disabled', false);
        $('#allCapacity').prop('disabled', false);
        $('#btnSetAllCapacity').prop('disabled', false);
        
      });
    });

    $('#btnSetAllCapacity').click(function(){
      let allCapacity = $('#allCapacity').val();
      $('#packingDetailTable .capacity').val(allCapacity);
      $('#btnSave').prop('disabled', false);
    });

    async function fetchStyleOnMasterOrderIcon(idIcon){
      try{
        const rst = await $.ajax({
          type: 'GET',
          url: '<?= site_url("packing/ajax_getStyleOnMasterOrderIcon"); ?>/' + idIcon,
          dataType: 'JSON'
        }); 
        return rst;
      }catch(error){
        console.error("Error fetching data:", error);
        throw error;        
      }
    }

    async function fetchSizesOnWorkOrderDetails(id){
      try{
        const result = await $.ajax({
          type: 'GET',
          url: '<?= site_url("packing/ajax_getSizesOnWorkOrderDetails"); ?>/' + id,
          dataType: 'JSON'
        });
        return result;
      }catch(error){
        console.error("Error fetching data:", error);
        throw error;        
      }
    }

    let capacityTable = $('#capacityTable').DataTable({
      // dom: '<"toolbar">lfrtip',
      // ordering: false,
      autoWidth: true,
      processing: true,
      destroy: true,
      info: true,
      searching: true,
      // paging: true,
      fixedHeader: true,

      ajax: {
        url: '<?= site_url('packing/ajax_get_kapasitas_karton_by_style_distinct'); ?>',
        type: 'GET',
        dataType: 'JSON'

      },
      language: {
        processing: '<i class="fa fa-spinner fa-spin fa-3x fa-fw"></i><br><div><p>Silahkan Menunggu...</p></div> ',
        emptyTable: 'Tidak ada data',
        lengthMenu: '_MENU_',
      },
      columns: [{
        "data": null,
        "className": "text-center align-middle",
        "orderable": true,
        "searchable": false,
        // "width": "100px",
        "render": function(data, type, row, meta) {
          return meta.row + meta.settings._iDisplayStart + 1;
        }
        },
        {
        'data': 'style',
        'className': "text-center px-2 align-middle"
        },
        {
        'className': 'text-center px-3 align-middle',
        render: function(data, type, row) {
          return "<button class='btn btn-sm btn-outline-primary shadow btnDetail' id='btnDetail'><i class='lni lni-pointer-right'></i>Detail</button> <button class='btn btn-sm btn-outline-warning shadow btnEdit' id='btnEdit'><i class='lni lni-pencil-alt'></i> Edit</button>"
        },
        },
        // {
        //     'className': 'text-center px-3 text-nowrap',
        //     render: function(data, type, row) {
        //         return "<button class='btn btn-sm btn-outline-success shadow btnAdd' id='btnAdd'><i class='lni lni-circle-plus'></i>Add</button>"
        //     },
        // },
        // {
        //     'className': 'text-center px-3 text-nowrap',
        //     render: function(data, type, row) {
        //         return "<button class='btn btn-sm btn-outline-warning shadow btnEdit' id='btnEdit'><i class='lni lni-pencil-alt'></i> Edit</button>"
        //     },
        // }

      ],
      // lengthMenu: [
      //     [10, 25, 50, 100, -1],
      //     [10, 25, 50, 100, 'All'],
      // ],
    });

    // var toolbar = "<div class='form-group row mb-3'>" +
    //     "<div class='col-md-6'>" +
    //     "<button id='btnAddNew' class='btn btn-primary btn-sm'><i class='lni lni-circle-plus'></i>Add New Capacities</button>" +
    //     "</div>" +
    //     "</div>";
    // $("div.toolbar").html(toolbar);

    $('#btnAddNew').click(function() {
      mode = "Add New";
      // $('#style').select2('val', '');
      // $('#style').focus();

      $('#modal_add_kapasitas_box').modal('show');
    });

    var style;

    $("#capacityTable tbody").on("click", "#btnDetail", function() {
      style = capacityTable.row($(this).parents('tr')).data().style;
      var showSizeCapacity = $('#showSizeCapacity').DataTable({
        autoWidth: false,
        // processing: true,
        // serverSide: true,
        destroy: true,
        info: false,
        searching: false,
        paging: false,
        fixedHeader: true,
        ajax: {
          url: '<?= site_url('packing/get_detail_capacity'); ?>',
          type: 'POST',
          data: {
            style: style,
          },
        },
        // language: {
        //     processing: '<i class="fa fa-spinner fa-spin fa-3x fa-fw"></i><br><div><p>Silahkan Menunggu...</p></div> ',
        //     emptyTable: 'Tidak ada data',
        //     lengthMenu: '_MENU_',
        // },
        columns: [
          {
            'data': 'style',
            'className': "text-center"
          },
          {
            'data': 'size',
            'className': "text-center"
          },
          {
            'data': 'kapasitas_karton',
            'className': "text-center"
          },
        ],
        // lengthMenu: [
        //     [10, 25, 50, 100, -1],
        //     [10, 25, 50, 100, 'All'],
        // ],
      });

      $("#modalDetail").modal('show');
    });

    $('#packingDetailTable tbody').on('click', '#btn_remove', function() {
      tableDetail.row($(this).parents('tr')).remove().draw();
    });

    $('#btnSave').click(function() {
      // if (mode == "Add New") {
      var dataTable = tableDetail.rows().data();

      // console.log('dataTable: ', dataTable);

      var arrDataTable = [];

      $.each(dataTable, function(i, itm) {
        let capacity = $(`#capacity${i}`).val();
        arrDataTable.push({
          'style': $('#style').val(),
          'size': itm[0],
          'kapasitas_karton': capacity
        });
      });

      $.ajax({
        type: 'POST',
        url: '<?php echo site_url("packing/ajax_save_kapasitas_karton"); ?>',
        data: {
        'kapasitasKarton': arrDataTable
        },
        dataType: 'json'
      }).done(function(affRow) {
        if (affRow > 0) {
          swal.fire({
            icon: 'success',
            title: 'Simpan Data Berhasil',
            html: '<h3 style="color: blue;"><strong>Simpan Data Kapasitas Box Berhasil.</strong></h3>',
            showConfirmButton: true,
          }).then(function() {
            $('#wo').val("");
            $('#style').val("");
            $('#allCapacity').val("");
            $('#allCapacity').prop('disabled', true);
            $('#btnAllCapacity').prop('disabled', true);
            $('#btnSave').prop('disabled', true);
            tableDetail.clear().draw();
            capacityTable.ajax.reload();
            $('#modal_add_kapasitas_box').modal('hide');
          });
        }
      });
    });

    // $('#capacityTable tbody').on('click', '#btnAdd', function() {
    //     var data = capacityTable.row($(this).parents('tr')).data().style;

    //     addBoxCapacity(data);
    // });

    // function addBoxCapacity(style) {
    //     mode = "Add Style Size"
    //     $('#style').select2('val', style);
    //     $('#modal_add_kapasitas_box').modal('show');

    // }
    // var style;
    $("#capacityTable tbody").on("click", "#btnEdit", function() {

      var styleVal = capacityTable.row($(this).parents('tr')).data().style;
      open('<?php echo site_url("packing/edit_kapasitas_karton/"); ?>' + styleVal, '_self');
      // console.log(styleVal);

      // $.ajax({
      //     type: 'POST',
      //     url: '< ?php echo site_url('packing/ajax_get_by_style'); ?>',
      //     data: {
      //         'styleVal': styleVal
      //     },
      //     dataType: 'json',
      // }).done(function(dt) {
      //     // console.log(dt);
      //     if (dt != null) {
      //         localStorage.removeItem('kapasitas_box');
      //         localStorage.setItem('kapasitas_box', JSON.stringify(dt));

      //     }
      // })

    });




  })
</script>