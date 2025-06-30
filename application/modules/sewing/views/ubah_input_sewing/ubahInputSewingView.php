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
      <div class="breadcrumb-title pe-3">Sewing</div>
      <div class="ps-3">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb mb-0 p-0">
            <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">Ubah Input Sewing</li>
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
    <h6 class="mb-0 text-uppercase">Ubah Input Sewing</h6>
    <hr />


    <div class="card">
      <div class="card-body">
        <div class="row my-3 mx-2">
          <div class="col-lg-12 mb-4">
            <div class="row">
              <div class="col-lg-6">
                <span class="btn btn-primary position-relative" style="cursor: context-menu;"> <i class='bx bx-group'></i> <span class="align-middle">Line : <?= ucwords(strtolower($this->session->userdata('username'))); ?></span>
                </span>
                <input type="hidden" value="<?= $this->session->userdata('username'); ?>">
              </div>
            </div>


            <div class="row mt-4">
              <label for="orcs" class="col-sm-2 col-form-label">Input ORC</label>
              <div class="col-sm-3">
                <input type="text" class="form-control" id="orcs" placeholder="e.g. G3-24C097B-1">

              </div>
              <div class="col-sm-1">
                <button type="button" class="btn btn-primary text-center" id="btnSearch"><i class='bx bx-search-alt-2 ms-1'></i></button>
              </div>
            </div>


            <!-- <div class="my-3">
            <button class="btn btn-secondary btn-sm me-1" id="btn_daily">Daily</button>
            <button class="btn btn-outline-secondary btn-sm" id="btn_30_days_ago">30 Days Ago</button>
          </div> -->
            <!-- <div class="table-responsive"> -->
            <div class="row mt-3">
              <div class="col-lg-12">
                <table id="ubahInputSewingTable" class="table table-striped table-bordered table-sm nowrap" style="width:100%">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Line</th>
                      <th>ORC</th>
                      <th>Style</th>
                      <th>Color</th>
                      <th>Size</th>
                      <th>No. Bundle</th>
                      <th>Qty</th>
                    </tr>
                  </thead>
                </table>
              </div>
            </div>
            <!-- </div> -->

            <div class="row mt-3">
              <div class="col-lg-12">
                <button type="button" class="btn btn-primary btn-sm me-1" id="btnSelectAll"><i class='bx bxs-select-multiple'></i>Select All</button>
                <button type="button" class="btn btn-secondary btn-sm" id="btnDeselectAll"><i class='bx bx-select-multiple'></i>Deselect All</button>
              </div>

            </div>



            <div class="row mt-4">
              <label for="inputPassword" class="col-sm-2 col-form-label">Move to</label>
              <div class="col-sm-3">
                <select id="lines" class="form-control select2_1" disabled></select>
              </div>
              <div class="col-sm-1">
                <button type="button" class="btn btn-primary text-center" id="btnUpdate" disabled>Update</button>
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

    const loadLine = () => {
      $('#lines').empty();
      $.ajax({
        url: " <?= site_url('sewing/ajax_get_all_line'); ?>",
        type: 'GET',
        dataType: 'JSON',
        beforeSend: function() {
          $("#lines").prepend($('<option></option>').html('Loading...'));
        },
      }).done(function(data) {
        $('#lines').empty();
        $('#lines').append($('<option>', {
          value: "",
          text: "- Select Line-"
        }));
        $.each(data, function(i, item) {
          $('#lines').append($('<option>', {
            value: item.name,
            text: item.name
          }));
        });
      });
    }

    loadLine();

    $('#orcs').focus();

    let ubahInputSewingTable = $('#ubahInputSewingTable').DataTable({
      // lengthChange: false,
      // buttons: ['copy', 'excel', 'pdf', 'print'],
      scrollX: true,
      destroy: true,
      select: {
        style: "multi"
      },
      columns: [{
          'className': 'text-center px-2'
        },
        {
          'className': 'text-center px-2'
        },
        {
          'className': 'text-center px-2'
        },
        {
          'className': 'text-center px-2'
        },
        {
          'className': 'text-center px-2'
        },
        {
          'className': 'text-center px-2'
        },
        {
          'className': 'text-center px-2'
        },
        {
          'className': 'text-center px-2'
        },
      ]
    });

    //check row selected in table order
    ubahInputSewingTable.on('select deselect', function() {
      let selectedRows = ubahInputSewingTable.rows({
        selected: true
      }).count();

      if (selectedRows > 0) {
        $("#lines").prop('disabled', false);
        $("#btnUpdate").prop('disabled', false);
      } else {
        $("#lines").prop('disabled', true);
        $("#btnUpdate").prop('disabled', true);
      }
    });


    $('#btnSearch').click(function() {
      var orc = $('#orcs').val();
      if (orc != null) {
        loadChangeSelectedOrc(orc);
      }
    });


    function loadChangeSelectedOrc(o) {
      $.ajax({
        type: 'GET',
        url: '<?php echo site_url("sewing/ajax_get_by_orc1"); ?>/' + o,
        dataType: 'json'
      }).done(function(dt) {
        // console.log('dt: ', dt);
        ubahInputSewingTable.clear().draw();
        if (dt.length > 0) {
          loadToTable(dt);
        } else {
          Swal.fire({
            icon: 'warning',
            title: 'Warning',
            text: 'ORC tidak ada',
            showConfirmButton: false,
            timer: 2000
          });
        }
        $('#orcs').val('');
        $('#orcs').focus();
      })
    }

    function loadToTable(data) {
      $.each(data, function(i, item) {
        // if ($('#userName').text() == item.line) {
        ubahInputSewingTable.row.add([
          item.id_input_sewing,
          item.line,
          item.orc,
          item.style,
          item.color,
          item.size,
          item.no_bundle,
          item.qty_pcs
        ]).draw();

        // }
      });
    }

    $('#btnSelectAll').click(function() {
      ubahInputSewingTable.rows({
        search: 'applied'
      }).select();
    });

    $('#btnDeselectAll').click(function() {
      ubahInputSewingTable.rows({
        search: 'applied'
      }).deselect();
    });

    $('#ubahInputSewingTable tbody').on('click', 'tr', function() {
      $(this).toggleClass('selected');
    });

    $('#btnUpdate').click(function() {
      var selRows = ubahInputSewingTable.rows({
        selected: true
      }).data();
      var selLine = $('#lines').val();
      // console.log('selRows length: ', selRows.length);

      if (selRows.length <= 0 || selLine == "0") {
        Swal.fire({
          icon: 'warning',
          title: 'Warning!',
          text: 'Silahkan pilih data yang akan dipindah terlebih dahulu!',
          showConfirmButton: true
        });

      } else {
        // console.log('selRows data: ', selRows);
        var arrData = [];
        $.each(selRows, function(x, itm) {
          arrData.push({
            'id_input_sewing': itm[0],
            'line': selLine
            // 'line': itm[1]
          });
        });
        // console.log('arrData: ', arrData);
        $.ajax({
          type: 'POST',
          url: '<?php echo site_url("sewing/ajax_update"); ?>',
          data: {
            'dataInputSewing': arrData
          },
          dataType: 'json'
        }).done(function(rv) {
          // console.log('rv: ', rv);
          if (rv > 0) {
            Swal.fire({
              icon: 'success',
              title: 'Berhasil',
              text: 'Data line tujuan berhasil diubah',
              showConfirmButton: false,
              timer: 2000
            });

            clearTable();
            loadChangeSelectedOrc($('#orcs').val());

            $("#lines").prop('disabled', true);
            $('#lines').val(null).trigger("change")
            $("#btnUpdate").prop('disabled', true);

            $('#orcs').focus();
          }
        })
      }

    });

    function clearTable() {
      ubahInputSewingTable.clear().draw();
    }










  });
</script>