<!--start page wrapper -->
<div class="page-wrapper">
    <div class="page-content">
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Mechanic</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Report Mechenic</li>
                    </ol>
                </nav>
            </div>
        </div>
        <h6 class="mb-0 text-uppercase">KPI MECHANIC</h6>
        <hr />
        <div class="row">
            <div class="col-12 ">
                <div class="card rounded-4 w-100">
                    <div class="card-body">
                        <div class="mx-3 my-3">
                            <form class="row g-3 needs-validation" novalidate>
                                <div class="col-md-3">
                                    <select class="single_select" id="month"></select>
                                </div>
                                <div class="col-md-3">
                                    <input type="button" name="filter" id="filter" value="Filter" class="btn btn-success">
                                </div>
                            </form>
                            </p>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card ">
                                        <div class="card-header">
                                            <h3 class="card-title">KPI MECHANIC</h3>
                                        </div>
                                        <div class="card-body">
                                            <table id="kpiMechanic" class="table table-bordered table-striped">
                                                <thead>
                                                    <tr>
                                                        <th class='bg-secondary'>Mechanic Name</th>
                                                        <th class='bg-secondary'>Total Machine</th>
                                                        <th class='bg-secondary'>Total Respon</th>
                                                        <th class='bg-secondary'>Total Repair</th>
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
        </div>
    </div>
</div>

<script>
    $('.single_select').select2({
        theme: 'bootstrap-5',
        width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style',

    });
</script>
<script>
    var table;
    $(document).ready(function() {

        table = $('#kpiMechanic').DataTable({

            dom: 'Blfrtip',
            "paging": true,
            lengthMenu: [
                [100, 200, 300, 400],
                [100, 200, 300, 400]
            ],
            buttons: [
                'excel', 'csv'
            ],

        });

        const loadMonth = () => {
            $('#month').empty();
            $.ajax({
                url: " <?= site_url('manager/get_month_kpi'); ?>",
                type: 'GET',
                dataType: 'JSON',
                beforeSend: function() {
                    $("#month").prepend($('<option></option>').html('Loading...'));
                },
            }).done(function(data) {
                $('#month').empty();
                $('#month').append($('<option>', {
                    value: "",
                    text: "- Select Month -"
                }));
                $.each(data, function(i, item) {
                    $('#month').append($('<option>', {
                        value: item.month,
                        text: item.month
                    }));
                });
            });
        }
        loadMonth();

        $('#filter').on('click', function() {

                var month = $('#month').val();

                $.ajax({
                    url: '<?php echo site_url("manager/get_datas_kpi"); ?>/' +
                        month,
                    type: 'GET',
                    dataType: 'json',
                }).done(function(data) {
                    table.clear();
                    $.each(data, function(i, item) {
                        var hms = item.respon_duration;
                        var as = hms.split(':');
                        var respon = (+as[0]) * 60 + (+as[1]);

                        var hms = item.repair_duration;
                        var as = hms.split(':');
                        var repair = (+as[0]) * 60 + (+as[1]);
                        table.row.add([
                            item.Nama,
                            item.total,
                            respon,
                            repair,
                        ]).draw();
                    })
                })
            }

        );

    });
</script>