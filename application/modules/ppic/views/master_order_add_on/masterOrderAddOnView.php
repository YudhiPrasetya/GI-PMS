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
</style>


<!--start page wrapper -->
<div class="page-wrapper">
  <div class="page-content">

    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
      <div class="breadcrumb-title pe-3">PPIC</div>
      <div class="ps-3">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb mb-0 p-0">
            <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">Master Order (Add On)</li>
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
    <h6 class="mb-0 text-uppercase">Master Order (Add On)</h6>
    <hr />


    <div class="card">
      <div class="card-body">
        <div class="row my-3 mx-2">

          <!-- <div class="table-responsive"> -->
          <table id="masterOrderAddOnTable" class="table table-striped table-bordered table-sm nowrap" style="width:100%">
            <thead>
              <tr>
                <th>No</th>
                <th>Date Created</th>
                <th>Buyers</th>
                <th>PI</th>
                <th>PI</th>
                <th>Type</th>
                <th>Style</th>
                <th>ORC</th>
                <th>Color</th>
                <th>Qty</th>
                <th>Shipment Date</th>
              </tr>
            </thead>
          </table>
          <!-- </div> -->

          <div class="col mb-3">
            <button type="button" class="btn btn-primary btn-sm mt-2" id="btn_save_selected_row"><i class='bx bx-save' style="margin-top: -1.1em;"></i>Save Selected Row</button>
          </div>
        </div>
      </div>
    </div>


  </div>
</div>
<!--end page wrapper -->



<script>
  $(document).ready(function() {
    const sweet_loader = '<div class="sweet_loader"><svg viewBox="0 0 140 140" width="140" height="140"><g class="outline"><path d="m 70 28 a 1 1 0 0 0 0 84 a 1 1 0 0 0 0 -84" stroke="rgba(0,0,0,0.1)" stroke-width="4" fill="none" stroke-linecap="round" stroke-linejoin="round"></path></g><g class="circle"><path d="m 70 28 a 1 1 0 0 0 0 84 a 1 1 0 0 0 0 -84" stroke="#71BBFF" stroke-width="4" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-dashoffset="200" stroke-dasharray="300"></path></g></svg></div>';

    loaddata();

    function loaddata() {
      $("#btn_save_selected_row").prop('disabled', true);

      $.ajax({
        url: '<?= site_url('ppic/getorc_mysql'); ?>',
        type: 'POST',
        dataType: 'json',
        success: function(data) {

          const newArray = data.map(item => item.orc);
          var myJsonString = JSON.stringify(newArray);
          const orcx = myJsonString.replace(/\[/g, '').replace(/\]/g, '');
          const orc = orcx.replace(/"/g, "'");
          // console.log(orc);

          let masterOrderAddOnTable = $('#masterOrderAddOnTable').DataTable({
            // lengthChange: false,
            // buttons: ['copy', 'excel', 'pdf', 'print'],
            scrollX: true,
            destroy: true,
            select: {
              style: 'multi'
            },
            ajax: {
              url: '<?= site_url("ppic/getMasterOrderAddOn"); ?>',
              type: 'GET',
              dataType: 'JSON',
              data: {
                orc: orc
              },
            },
            columns: [{
                "data": null,
                "orderable": true,
                "searchable": false,
                'className': 'text-center px-4',
                // "width": "100px",
                "render": function(data, type, row, meta) {
                  return meta.row + meta.settings._iDisplayStart + 1;
                }
              },
              {
                'data': 'CreatedDate',
                'className': 'text-center px-3'
              },
              {
                'data': 'buyer',
                'className': 'text-center px-3'
              },
              {
                'data': 'Cust_PO',
                'className': 'text-center px-3'
              },
              {
                'data': 'pi_no',
                'className': 'text-center px-3'
              },
              {
                'data': 'Code',
                'className': 'text-center px-3'
              },
              {
                'data': 'style',
                'className': 'text-center px-3'
              },
              {
                'data': 'orc',
                'className': 'text-center px-3',
                'render': function(data, type, row, meta) {
                  return data.replace(/\s/g, '');
                }
              },
              {
                'data': 'Color_PO',
                'className': 'text-center px-3'
              },
              {
                'data': 'Total_Quantity',
                'className': 'text-center px-3'
              },
              {
                'data': 'shipment',
                'className': 'text-center px-3'
              },

            ],

          });

          //check row selected in table order
          masterOrderAddOnTable.on('select deselect', function() {
            let selectedRows = masterOrderAddOnTable.rows({
              selected: true
            }).count();

            if (selectedRows > 0) {
              $("#btn_save_selected_row").prop('disabled', false);
            } else {
              $("#btn_save_selected_row").prop('disabled', true);
            }
          });

          //button save function
          $('#btn_save_selected_row').click(function() {

            //get current date & time
            var dt = new Date();
            var time = dt.getFullYear() + "-" + (dt.getMonth() + 1) + "-" + dt.getDate() + "" + "-" + dt.getHours() + ":" + dt.getMinutes() + ":" + dt.getSeconds();

            //get row selected from table order
            let selRows = masterOrderAddOnTable.rows({
              selected: true
            }).data();

            //make array from selected row
            let items = []
            let items_addon = []
            $.each(selRows, function(x, item) {

              //get comm from orc

              ////get orc
              var id = item.orc;

              ////get last character
              var lastChar = id.substr(id.length - 1);

              ////get last second character
              var id2 = id.substr(id.length - 2);

              ////get '-' from last second character
              var secondChar = id2.substr(0, 1);

              ////checking if lastChar is a number
              if (lastChar >= '0' && lastChar <= '9') {
                ////checking if secondChart is a '-'
                if (secondChar == '-') {
                  ////if true, set comm value from lastChar
                  var comm = lastChar;
                } else {
                  ////if false, comm value = 1
                  var comm = '1';
                }
              } else {
                ////if false, comm value = 1
                var comm = '1';
              };

              //insert selected row to array
              items.push({
                "id_order": null,
                "tgl": time,
                "orc": item.orc.replace(/\s/g, ''),
                "comm": comm,
                "style": item.style,
                "style_sam": item.style,
                "buyer": item.buyer,
                "Jenis": item.Code,
                "so": item.Cust_PO,
                "color": item.Color_PO,
                "etd": item.shipment,
                "plan_export": item.shipment,
                "qty": item.Total_Quantity
              });

              items_addon.push({
                "orc": item.orc,
              });
            });

            // console.log(items);

            //import array into database
            $.ajax({
              type: "POST",
              url: "<?= site_url('ppic/postAppendSelected') ?>",
              dataType: "json",
              data: {
                'items': items
              },
              success: function(data) {

                //looping to get orc from array
                for (let index = 0; index < items.length; ++index) {

                  //saving orc
                  var element = items_addon[index].orc;
                  // console.log(element);

                  //get size and quantity based on orc
                  $.ajax({
                    url: '<?= site_url('ppic/getAll3'); ?>',
                    type: 'POST',
                    dataType: 'json',
                    data: {
                      'orc': element
                    },
                    success: function(datax) {
                      // console.log(datax);
                      let itemsx = []
                      $.each(datax.data, function(x, item) {
                        var str = item.orc.replace(/\s/g, '');
                        itemsx.push({
                          "orc": str,
                          "size": item.size,
                          "qty": item.qty
                        });
                      });
                      // import size and quantity to database
                      // console.log(itemsx)
                      $.ajax({
                        url: '<?= site_url('ppic/appendSelectedDetail'); ?>',
                        type: 'POST',
                        dataType: 'json',
                        data: {
                          'datax': itemsx
                        },
                        success: function() {
                          //all proccess was done, showing success
                          swal.fire({
                            icon: 'success',
                            title: 'Success!',
                            text: 'Data uploaded successfully!',
                            timer: 1000,
                            showCancelButton: false,
                            showConfirmButton: false
                          }).then(function() {
                            loaddata();
                          });
                        },
                        error: function(xhr) {

                          //showing error on import order detail
                          // console.log(xhr.responseText);
                        }
                      });
                    },
                  });
                };
              },
              error: function(xhr) {

                //showing error on import order
                // console.log(xhr.responseText);
              }
            });
          });
        },
      });
    }




  });
</script>