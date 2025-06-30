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

<link href="<?= base_url('assets/plugins/tipped/css/tipped.css'); ?>" rel="stylesheet">

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
            <li class="breadcrumb-item active" aria-current="page">Machine Breakdown Monitoring</li>
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
    <h6 class="mb-0 text-uppercase">Machine Breakdown Monitoring</h6>
    <hr />


    <div class="card">
      <div class="card-body">
        <div class="row my-3 mx-2">
          <div class="col-lg-12">

            <div class="row">
              <div class="col-lg-12">
                <div id="firstCol">
                  <div class="row">

                    <!-- <div class="col">
                      <div class="card rounded-4 bg-texture-wave-a">
                        <div class="card-body">
                          <div class="d-flex align-items-center justify-content-between">
                            <div class="">
                              <h4 class="mb-0 text-white">OVERLOCK</h4>
                              <p class="mb-0 text-white">MALIOBORO</p>
                            </div>
                            <div class="fs-2 text-white">
                              <i class='bx bxs-hourglass'></i>
                            </div>
                          </div>
                          <div class="">
                            <small class="mb-0 text-white">00:09:37</small>
                          </div>
                          <div class="">
                            <small class="mb-0 text-white">Repaired by : Waiting for mechanic..</small>
                          </div>
                        </div>
                      </div>
                    </div> -->

                  </div>
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
  <script src="<?= base_url('assets/plugins/easytimer/easytimer.min.js'); ?>"></script>
  <script src="<?= base_url('assets/plugins/tipped/js/tipped.min.js'); ?>"></script>
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

      var firstFloorColOld = [];
      var firstFloorColNew;
      var firstColTimer = [];

      var data1stFloorOld = "";
      var data1stFloorNew = "";
      var data1stFloorLength;

      window.setTimeout(function() {
        window.location.reload();
      }, 900000);

      show1stFloorData();

      function show1stFloorData() {
        $.ajax({
          type: 'GET',
          url: '<?php echo site_url("mechanic/ajax_get_1stfloor_data"); ?>',
          cache: false,
          dataType: 'json'
        }).done(function(data) {
          // console.log(data);
          // firstFloorColOld = [];
          data1stFloorOld = "";
          $.each(data, function(i, item) {
            //add to firstFloorColOld array
            firstFloorColOld.push({
              'id_machine_breakdown': item.id_machine_breakdown,
              'machine_brand': item.machine_brand,
              'line': item.line,
              'tgl': item.tgl,
              'machine_type': item.machine_type,
              'machine_sn': item.machine_sn,
              'floor': item.floor,
              'sympton': item.sympton,
              'status': item.status,
              'inisial': item.inisial,
              'duration': item.duration
            });

            //tampilkan
            data1stFloorOld +=
              `<div class="col-lg-4">
                <div  id='tip` + item.id_machine_breakdown.toString() + `'>
                  <div  id='firstFloor` + item.id_machine_breakdown.toString() + `'>
                    <div class="` + (item.status == "Waiting..." ? "card rounded-4 bg-texture-wave-a" : "card rounded-4 bg-texture-wave-b") + `">
                      <div class="card-body">
                        <div class="d-flex align-items-center justify-content-between">
                          <div class="">
                            <h5 class="mb-0 text-white">` + item.machine_type + `</h5>
                            <p class="mb-0 text-white">` + item.line + `</p>
                          </div>
                          <div class="fs-2 text-white me-2">
                          ` + (item.status == "Waiting..." ? "<i class='bx bxs-hourglass'></i>" : "<i class='bx bx-cog'></i>") + `
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-sm-8">
                          ` + (item.status == "Waiting..." ? "<small class='mb-0 text-white'>Waiting for mechanic..</small>" : "<small class='mb-0 text-white'>Repaired by : " + item.inisial + "</small>") + `
                          </div>
                          <div class="col-sm-4 text-end">
                            <small class="mb-0 text-white" id="` + item.id_machine_breakdown + `"></small>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>`


            // var firstColTimer = new easytimer.Timer();
            firstColTimer[item.id_machine_breakdown] = new easytimer.Timer();

            firstColTimer[item.id_machine_breakdown].start({
              precision: 'seconds',
              startValues: {
                hours: parseInt(item.duration.substr(0, 2)),
                minutes: parseInt(item.duration.substr(3, 2)),
                seconds: parseInt(item.duration.substr(6, 2)),
              }
            });
            firstColTimer[item.id_machine_breakdown].addEventListener('secondsUpdated', function(e) {
              $("#" + item.id_machine_breakdown.toString()).html(firstColTimer[item.id_machine_breakdown].getTimeValues().toString());
            });

          });
          $("<div class='row' id='firstFloor'>" + data1stFloorOld + "</div>").appendTo($('#firstCol'));
          createToolTip1();
          // Tipped.create("#tip", "Some tooltip text");


        });
      }

      setInterval(fetch1stFloorData, 10000);



      function fetch1stFloorData() {
        $.ajax({
          type: 'GET',
          url: '<?= site_url("mechanic/ajax_get_1stfloor_data"); ?>',
          cache: false,
          dataType: 'json'
        }).done(function(data) {
          firstFloorColNew = [];
          data1stFloorOld = "";
          $.each(data, function(i, item) {
            //add to firstFloorColOld array
            firstFloorColNew.push({
              'id_machine_breakdown': item.id_machine_breakdown,
              'line': item.line,
              'tgl': item.tgl,
              'machine_brand': item.machine_brand,
              'machine_type': item.machine_type,
              'machine_sn': item.machine_sn,
              'floor': item.floor,
              'sympton': item.sympton,
              'status': item.status,
              'inisial': item.inisial,
              'duration': item.duration
            });
          });

          comparing1stFloorData()
        });
      }

      function comparer(otherArray) {
        return function(current) {
          return otherArray.filter(function(other) {
            return other.id_machine_breakdown == current.id_machine_breakdown
          }).length == 0;
        }
      }

      function comparing1stFloorData() {

        if (firstFloorColOld.length < firstFloorColNew.length) {
          // console.log('1')
          var onlyInNew = firstFloorColNew.filter(comparer(firstFloorColOld));
          var onlyInOld = firstFloorColOld.filter(comparer(firstFloorColNew));
          var result = onlyInNew.concat(onlyInOld);

          //add to firstFloorColOld array
          firstFloorColOld.push({
            'id_machine_breakdown': result[0].id_machine_breakdown,
            'line': result[0].line,
            'tgl': result[0].tgl,
            'machine_type': result[0].machine_type,
            'machine_brand': result[0].machine_brand,
            'machine_sn': result[0].machine_sn,
            'floor': result[0].floor,
            'sympton': result[0].sympton,
            'status': result[0].status,
            'inisial': result[0].inisial,
            'duration': result[0].duration
          });

          //add the machine breakdown
          var data1stFloorAdd = "";
          data1stFloorAdd +=
            `<div class="col-lg-4">
                <div  id='tip` + result[0].id_machine_breakdown.toString() + `'>
                  <div  id='firstFloor` + result[0].id_machine_breakdown.toString() + `'>
                    <div class="` + (result[0].status == "Waiting..." ? "card rounded-4 bg-texture-wave-a" : "card rounded-4 bg-texture-wave-b") + `">
                      <div class="card-body">
                        <div class="d-flex align-items-center justify-content-between">
                          <div class="">
                            <h5 class="mb-0 text-white">` + result[0].machine_type + `</h5>
                            <p class="mb-0 text-white">` + result[0].line + `</p>
                          </div>
                          <div class="fs-2 text-white me-2">
                          ` + (result[0].status == "Waiting..." ? "<i class='bx bxs-hourglass'></i>" : "<i class='bx bx-cog'></i>") + `
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-sm-8">
                          ` + (result[0].status == "Waiting..." ? "<small class='mb-0 text-white'>Waiting for mechanic..</small>" : "<small class='mb-0 text-white'>Repaired by : " + result[0].inisial + "</small>") + `
                          </div>
                          <div class="col-sm-4 text-end">
                            <small class="mb-0 text-white" id="` + result[0].id_machine_breakdown + `"></small>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>`

          // var firstColTimerNew = new easytimer.Timer();
          firstColTimer[result[0].id_machine_breakdown] = new easytimer.Timer();
          firstColTimer[result[0].id_machine_breakdown].start({
            precision: 'seconds',
            startValues: {
              hours: parseInt(result[0].duration.substr(0, 2)),
              minutes: parseInt(result[0].duration.substr(3, 2)),
              seconds: parseInt(result[0].duration.substr(6, 2)),
            }
          });
          firstColTimer[result[0].id_machine_breakdown].addEventListener('secondsUpdated', function(e) {
            $("#" + result[0].id_machine_breakdown.toString()).html(firstColTimer[result[0].id_machine_breakdown].getTimeValues().toString());
          });
          $(data1stFloorAdd).appendTo($('#firstFloor'));

          //add new tool tip for new breakdown
          createToolTip1New(result);


        } else if (firstFloorColOld.length == firstFloorColNew.length) {
          // console.log('2')
          var data1stFloorChange = "";
          $.each(firstFloorColNew, function(i, itemNew) {
            $.each(firstFloorColOld, function(x, itemOld) {
              if (itemNew.status != itemOld.status && itemNew.id_machine_breakdown == itemOld.id_machine_breakdown) {
                // $('#firstFloor' + itemOld.id_machine_breakdown.toString()).removeClass('bg-danger').addClass('bg-warning').empty();
                $('#firstFloor' + itemOld.id_machine_breakdown.toString()).empty();
                itemOld.status = "Repairing...";
                itemOld.inisial = itemNew.inisial;
                itemOld.duration = itemNew.duration;
                data1stFloorChange +=
                  `<div class="` + (itemOld.status == "Waiting..." ? "card rounded-4 bg-texture-wave-a" : "card rounded-4 bg-texture-wave-b") + `">
                    <div class="card-body">
                      <div class="d-flex align-items-center justify-content-between">
                        <div class="">
                          <h5 class="mb-0 text-white">` + itemOld.machine_type + `</h5>
                          <p class="mb-0 text-white">` + itemOld.line + `</p>
                        </div>
                        <div class="fs-2 text-white me-2">
                        ` + (itemOld.status == "Waiting..." ? "<i class='bx bxs-hourglass'></i>" : "<i class='bx bx-cog'></i>") + `
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-sm-8">
                        ` + (itemOld.status == "Waiting..." ? "<small class='mb-0 text-white'>Waiting for mechanic..</small>" : "<small class='mb-0 text-white'>Repaired by : " + itemOld.inisial + "</small>") + `
                        </div>
                        <div class="col-sm-4 text-end">
                          <small class="mb-0 text-white" id="` + itemOld.id_machine_breakdown + `"></small>
                        </div>
                      </div>
                    </div>
                  </div>`
                firstColTimer[itemOld.id_machine_breakdown] = '';

                firstColTimer[itemOld.id_machine_breakdown] = new easytimer.Timer();
                firstColTimer[itemOld.id_machine_breakdown].start({
                  precision: 'seconds',
                  startValues: {
                    hours: parseInt(itemOld.duration.substr(0, 2)),
                    minutes: parseInt(itemOld.duration.substr(3, 2)),
                    seconds: parseInt(itemOld.duration.substr(6, 2)),
                  }
                });
                firstColTimer[itemOld.id_machine_breakdown].addEventListener('secondsUpdated', function(e) {
                  $("#" + itemOld.id_machine_breakdown.toString()).html(firstColTimer[itemOld.id_machine_breakdown].getTimeValues().toString());
                });

                $('#firstFloor' + itemOld.id_machine_breakdown.toString()).append(data1stFloorChange);
                //change tooltip
                changeTooltip1(itemOld);
              }
            });
          });

        } else if (firstFloorColOld.length > firstFloorColNew.length) {
          // console.log('3')
          let onlyInOld = firstFloorColOld.filter(comparer(firstFloorColNew));
          // console.log('onlyInOld: ', onlyInOld);

          firstFloorColOld = $.grep(firstFloorColOld, function(element, index) {
            return element.id_machine_breakdown == onlyInOld[0].id_machine_breakdown;
          }, true);

          $('#firstFloor' + onlyInOld[0].id_machine_breakdown).remove();
          // $('#tip' + onlyInOld[0].id_machine_breakdown).remove();
        }
      }





      // Tooltip
      function createToolTip1() {
        $.each(firstFloorColOld, function(x, itm) {
          // console.log('firstFloorColOld itm: ', itm.sympton);

          "<span id='span" + itm.id_machine_breakdown.toString() + "'></span>"
          Tipped.create('#tip' + itm.id_machine_breakdown.toString(), $(
            "<span class=''>Merk : <b>" + itm.machine_brand + "</b></span><br>" +
            "<span class=''>Type : <b>" + itm.machine_type + "</b></span><br>" +
            "<span class=''>S N : <b>" + itm.machine_sn + "</b></span><br>" +
            "<span class=''>Symptom : <b>" + itm.sympton + "</b></span><br>" +
            "<span class=''>Line : <b>" + itm.line + "</b></span><br>" +
            "<span class=''>" + (itm.inisial == null ? "Status: <b>Waiting for mechanic...</b>" : "Repaired by : <b>" + itm.inisial) + "</b></span>"
          ), {
            skin: (itm.status == "Waiting..." ? 'red' : 'green'),
            fadeIn: 300,
            size: 'large',
            behavior: 'mouse',
            onShow: function(content, element) {
              $(element).addClass('highlight');
            },
            afterHide: function(content, element) {
              $(element).removeClass('highlight');
            }
          });
        });
      }

      function createToolTip1New(r) {
        // console.log('r: ', r);
        "<span id='span" + r[0].id_machine_breakdown.toString() + "'></span>"
        Tipped.create('#tip' + r[0].id_machine_breakdown.toString(), $(
          "<span class=''>Merk : <b>" + r[0].machine_brand + "</b></span><br>" +
          "<span class=''>Type : <b>" + r[0].machine_type + "</b></span><br>" +
          "<span class=''>S N : <b>" + r[0].machine_sn + "</b></span><br>" +
          "<span class=''>Sympton : <b>" + r[0].sympton + "</b></span><br>" +
          "<span class=''>Line : <b>" + r[0].line + "</b></span><br>" +
          "<span class=''>Status : <b>Waiting for mechanic...</b></span><br>"
        ), {
          skin: 'red',
          fadeIn: 300,
          size: 'large',
          behavior: 'mouse',
          onShow: function(content, element) {
            $(element).addClass('highlight');
          },
          afterHide: function(content, element) {
            $(element).removeClass('highlight');
          }
        });
      }

      function changeTooltip1(itmO) {
        Tipped.remove('#tip' + itmO.id_machine_breakdown.toString());

        "<span id='span" + itmO.id_machine_breakdown.toString() + "'></span>"
        Tipped.create('#tip' + itmO.id_machine_breakdown.toString(), $(
          "<span class=''>Merk : <b>" + itmO.machine_brand + "</b></span><br>" +
          "<span class=''>Type : <b>" + itmO.machine_type + "</b></span><br>" +
          "<span class=''>S N : <b>" + itmO.machine_sn + "</b></span><br>" +
          "<span class=''>Sympton : <b>" + itmO.sympton + "</b></span><br>" +
          "<span class=''>Line : <b>" + itmO.line + "</b></span><br>" +
          "<span class=''>Mechanic : <b>" + itmO.inisial + "</b></span><br>"
        ), {
          skin: 'green',
          fadeIn: 300,
          size: 'large',
          behavior: 'mouse',
          onShow: function(content, element) {
            $(element).addClass('highlight');
          },
          afterHide: function(content, element) {
            $(element).removeClass('highlight');
          }
        });

      }


    });
  </script>