<!--start page wrapper -->
<div class="page-wrapper">
    <div class="page-content">
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">MANAGER</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Report Mechanic</li>
                    </ol>
                </nav>
            </div>
        </div>
        <h6 class="mb-0 text-uppercase">Daily Downtime</h6>
        <hr />
        <div class="row">
            <div class="col-12 ">
                <div class="card rounded-4 w-100">
                    <div class="card-body">
                        <div class="mx-3 my-3">
                            <div class="row mb-4">
                                <div class="col-md-1">
                                    <label class="col-form-label">Date Range</label>
                                </div>
                                <div class="col-md-3">
                                    <input name="from_date" class="form-control" id="from_date" type="date" value="<?php echo date("Y-m-d"); ?>">
                                </div>
                                <div class="col-md-1 text-center">
                                    <label class="col-form-label">to</label>
                                </div>
                                <div class="col-md-3">
                                    <input name="to_date" class="form-control" id="to_date" type="date" value="<?php echo date("Y-m-d"); ?>">
                                </div>
                                <div class="col-md-4">
                                    <button id="filter" value="Filter" class="btn btn-success">Filter </button>
                                </div>
                            </div>
                            <table id="dailyTable" class="table table-bordered table-striped" style="width: Auto; ">
                                <thead>
                                    <tr>
                                        <!-- <td class='bg-secondary'>Floor</td> -->
                                        <td class='bg-secondary' width=70px>Date</td>
                                        <td class='bg-secondary' width=100px>Line</td>
                                        <td class='bg-secondary'>Merk</td>
                                        <td class='bg-secondary'>Machine Type</td>
                                        <td class='bg-secondary'>Machine SN</td>

                                        <td class='bg-secondary' width=150px>Attended Mechanic</td>
                                        <td class='bg-secondary' width=110px>Symptom</td>
                                        <td class='bg-secondary'>Start Time</td>
                                        <td class='bg-secondary'>Respond Time</td>
                                        <td class='bg-secondary'>Finished Time</td>
                                        <td class='bg-secondary'>Respon Duration</td>
                                        <td class='bg-secondary'>Repair Duration</td>
                                        <td class='bg-secondary'>Delay Waiting</td>
                                        <td class='bg-secondary'>Delay Repairing </td>
                                        <td class='bg-secondary'>Respon Waiting</td>
                                        <td class='bg-secondary'>Respon Repairing</td>
                                        <td class='bg-secondary'>Total Duration</td>
                                        <td class='bg-secondary'>Remaks</td>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                                <tfoot>
                                    <!-- <tr>
										<th colspan="12" style="text-align:right">Total:</th>
										</tr> -->
                                </tfoot>
                            </table>
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


    $(document).ready(function() {
        var sumRespon;
        var sumRepair;

        table = $('#dailyTable').DataTable({
            "scrollX": true,
            dom: 'Blfrtip',
            "paging": true,
            lengthMenu: [
                [10, 50, 100, 200],
                [10, 50, 100, 200]
            ],
            buttons: [
                'excel', 'csv'
            ],

        });



        $('#filter').click(function() {
            // console.log('ok');
            sumRespon = 0;
            sumRepair = 0;

            var from_date = $('#from_date').val();
            var to_date = $('#to_date').val();
            var line = $('#line').val();

            var tgl1 = new Date($('#from_date').val());
            var tgl2 = new Date($('#to_date').val());

            var dataStr = {
                'from_date': from_date,
                'to_date': to_date,

            };

            if (from_date != '' && to_date != '') {
                if (tgl1 > tgl2) {
                    alert('Tanggal 1 tidak boleh lebih besar dari tanggal 2')
                } else {
                    // console.log(dataStr);
                    $.ajax({
                        url: '<?php echo site_url("manager/filter_daily_downtime"); ?>',
                        method: "GET",
                        data: {
                            'from_date': from_date,
                            'to_date': to_date
                        },
                        dataType: 'json',
                    }).done(function(data) {
                        console.log(data);
                        table.clear();

                        $.each(data, function(i, item) {

                            var hms = item.respon_duration;
                            var as = hms.split(':');
                            var respon = (+as[0]) * 60 + (+as[1]);

                            // sumRespon +=parseInt(respon);

                            var times = item.repair_duration;
                            var bs = times.split(':');
                            var repair = (+bs[0]) * 60 + (+bs[1]);

                            var day = item.date_waiting;
                            var waiting = (respon - (day * 555));

                            var day_repairing = item.date_repairing;
                            var repairing = (repair - (day_repairing * 555));

                            var total = [waiting + repairing];
                            sumRespon += parseInt(waiting);
                            sumRepair += parseInt(repairing);

                            var util = (sumRepair / (420 * 29)) * 100;
                            hasil = util.toFixed(2);


                            table.row.add([
                                // item.floor,
                                item.tgl_waiting,
                                item.line,
                                item.machine_brand,
                                item.machine_type,
                                item.machine_sn,

                                item.Nama,
                                item.sympton,
                                item.start_waiting,
                                item.start_repairing,
                                item.end_repairing,
                                respon,
                                repair,
                                item.date_waiting,
                                item.date_repairing,
                                waiting,
                                repairing,
                                total,
                                item.catatan
                            ]).draw();
                        })

                        // $('#respon').text('Total Respon Duration : ' + sumRespon+ " Menit")
                        // $('#repair').text('Total Repair Duration : ' + sumRepair + " Menit")
                        // $('#utilize').text('Utilize: ' + hasil+ " %")
                    })

                }
            }


        });

    })
</script>