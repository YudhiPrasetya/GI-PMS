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
      <div class="breadcrumb-title pe-3">Mechanic</div>
      <div class="ps-3">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb mb-0 p-0">
            <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">Delayed Machine Settlement</li>
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
    <h6 class="mb-0 text-uppercase">Delayed Machine Settlement</h6>
    <hr />


    <div class="card">
      <div class="card-body">
        <div class="row my-3 mx-2">
          <div class="col-lg-12">

            <div class="row">
              <div class="col-lg-12">
                <table id="delayedMachineSettlementTable" class="table table-striped table-bordered table-sm nowrap" style="width:100%">
                  <thead>
                    <tr>
                      <th class="text-center">No.</th>
                      <th class="text-center">Machine Type</th>
                      <th class="text-center">Brand</th>
                      <th class="text-center">Type</th>
                      <th class="text-center">Serial Number</th>
                      <th class="text-center">Shymptom</th>
                      <th class="text-center">Settlement Date</th>
                    </tr>
                  </thead>
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
    theme: 'bootstrap4',
    width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style',
    // placeholder: $(this).data('placeholder'),
    // allowClear: Boolean($(this).data('allow-clear')),
    // dropdownParent: $('#createNewOrderModal')
  });
</script>
<script>
  $(document).ready(function() {
    const sweet_loader = '<div class="sweet_loader"><svg viewBox="0 0 140 140" width="140" height="140"><g class="outline"><path d="m 70 28 a 1 1 0 0 0 0 84 a 1 1 0 0 0 0 -84" stroke="rgba(0,0,0,0.1)" stroke-width="4" fill="none" stroke-linecap="round" stroke-linejoin="round"></path></g><g class="circle"><path d="m 70 28 a 1 1 0 0 0 0 84 a 1 1 0 0 0 0 -84" stroke="#71BBFF" stroke-width="4" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-dashoffset="200" stroke-dasharray="300"></path></g></svg></div>';

    // Main Table
    let delayedMachineSettlementTable = $('#delayedMachineSettlementTable').DataTable({
      // lengthChange: false,
      // buttons: ['copy', 'excel', 'pdf', 'print'],
      scrollX: true,
      destroy: true,
      // ajax: {
      //   url: '<?= site_url('mechanic/getMasterUser'); ?>',
      //   type: 'GET'
      // },
      // columns: [{
      //     "data": null,
      //     "orderable": true,
      //     "searchable": true,
      //     'className': 'text-center px-4',
      //     // "width": "100px",
      //     "render": function(data, type, row, meta) {
      //       return meta.row + meta.settings._iDisplayStart + 1;
      //     }
      //   },
      //   {
      //     'data': 'NIK',
      //     'className': 'text-center px-2'
      //   },
      //   {
      //     'data': 'Nama',
      //     'className': 'text-center px-2'
      //   },
      //   {
      //     'data': 'user_name',
      //     'className': 'text-center px-2'
      //   },
      //   {
      //     'data': 'Bagian',
      //     'className': 'text-center px-2'
      //   },
      //   {
      //     'data': 'Shift',
      //     'className': 'text-center px-2'
      //   },
      //   {
      //     'data': 'active',
      //     'className': 'text-center px-2'
      //   },
      //   {
      //     'className': 'text-center px-2',
      //     render: function(data, type, row) {
      //       return "<span class='badge text-bg-primary text-white' id='btn_edit_modal' style='cursor: pointer;'>Set Activation</span> <span class='badge text-bg-info text-white' id='btn_edit_modal' style='cursor: pointer;'>Edit</span> <span class='badge text-bg-danger' id='btn_delete_modal' style='cursor: pointer;'>Delete</span>"

      //     }
      //   },
      // ],
    });



  });
</script>