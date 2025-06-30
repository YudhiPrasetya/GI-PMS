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
        <h6 class="mb-0 text-uppercase">Downtime</h6>
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
                                <div class="col-md-2">
                                    <!-- <input name="line" class="form-control" id="line" type="text"> -->
                                    <select class="single_select" id="line"></select>
                                </div>
                                <div class="col-md-3">
                                    <input name="datefrom" class="form-control" id="datefrom" type="date" value="<?php echo date("Y-m-d"); ?>">
                                </div>
                                <div class="col-md-1 text-center">
                                    <label class="col-form-label">to</label>
                                </div>
                                <div class="col-md-3">
                                    <input name="dateto" class="form-control" id="dateto" type="date" value="<?php echo date("Y-m-d"); ?>">
                                </div>
                                <div class="col-md-2">
                                    <input type="button" name="filter" id="filter" value="Filter" class="btn btn-success">
                                </div>
                            </div>
                            <table id="sumaryTable" class="table table-bordered table-striped" style="width: Auto; ">
                                <thead>
                                    <tr>
                                        <td class='bg-secondary' width=100px>Line</td>
                                        <td class='bg-secondary'>Merk</td>
                                        <td class='bg-secondary'>Barcode</td>
                                        <td class='bg-secondary'>Machine SN</td>
                                        <td class='bg-secondary' width=70px>Date</td>
                                        <td class='bg-secondary' width=150px>Attended Mechanic</td>
                                        <td class='bg-secondary' width=110px>Symptom</td>
                                        <td class='bg-secondary'>Start Time</td>
                                        <td class='bg-secondary'>Respond Time</td>
                                        <td class='bg-secondary'>Finished Time</td>
                                        <td class='bg-secondary'>Respon Duration</td>
                                        <td class='bg-secondary'>Repair Duration</td>
                                        <td class='bg-secondary'>Total Duration</td>
                                    </tr>
                                </thead>
                                <tbody>

                                </tbody>
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
    $('.single_select').select2({
        theme: 'bootstrap-5',
        width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style',

    });
</script>
<script>
    var table;
    $(document).ready(function() {
        const loadLine = () => {
            $('#line').empty();
            $.ajax({
                url: " <?= site_url('manager/get_all_line'); ?>",
                type: 'GET',
                dataType: 'JSON',
                beforeSend: function() {
                    $("#line").prepend($('<option></option>').html('Loading...'));
                },
            }).done(function(data) {
                $('#line').empty();
                $('#line').append($('<option>', {
                    value: "",
                    text: "- Select Line -"
                }));
                $.each(data, function(i, item) {
                    $('#line').append($('<option>', {
                        value: item.name,
                        text: item.name
                    }));
                });
            });
        }
        loadLine();
        table = $('#sumaryTable').DataTable({
            // "scrollY": 200,
            "scrollX": true,
            dom: 'Blfrtip',
            lengthMenu: [
                [10, 25, 50, 100, 200, 300, 400],
                [10, 25, 50, 100, 200, 300, 400]
            ],
            buttons: [
                'excel', 'csv'
            ],

        });


        $('#filter').on('click', function() {
            var datefrom = $('#datefrom').val();
            var dateto = $('#dateto').val();
            var line = $('#line').val();

            // datasheet = {
            //     'datefrom': datefrom,
            //     'dateto': dateto,
            //     'line': line,
            // };
            // console.log(datasheet);
            if (datefrom != '' && dateto != '' && line != '') {
                if (datefrom > dateto) {
                    alert('Tanggal 1 tidak boleh lebih besar dari tanggal 2')
                } else {
                    $.ajax({
                        url: "<?php echo site_url('manager/filter_machine'); ?>",
                        method: "POST",
                        data: {
                            'datefrom': datefrom,
                            'dateto': dateto,
                            'line': line,
                        },
                        dataType: 'json',
                    }).done(function(data) {

                        if (data.length > 0) {
                            table.clear();
                            $('#sumaryTable').css('display', '');
                            $.each(data, function(i, item) {
                                var hms = item.respon_duration;
                                var a = hms.split(':');
                                console.log('hms', hms);
                                var respon = (+a[0]) * 60 + (+a[1]);
                                console.log('respon', respon);

                                var times = item.repair_duration;
                                var b = times.split(':');
                                var repair = (+b[0]) * 60 + (+b[1]);

                                var total = respon + repair

                                table.row.add([
                                    item.line,
                                    item.machine_brand,
                                    item.barcode_machine,
                                    item.machine_sn,
                                    item.tgl_waiting,
                                    item.Nama,
                                    item.sympton,
                                    item.start_waiting,
                                    item.start_repairing,
                                    item.end_repairing,
                                    respon,
                                    repair,
                                    total,
                                ]).draw();
                            });
                        } else {
                            alert("Please Select Date");
                        }
                    });
                }
            }
        });
    })
</script>