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
        <h6 class="mb-0 text-uppercase">Downtime Analize Machine</h6>
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
                                            <h3 class="card-title">Downtime Analize</h3>
                                        </div>
                                        <div class="card-body">
                                            <table id="analiseTable" class="table table-bordered table-striped">
                                                <thead>
                                                    <tr>
                                                        <th class='bg-secondary'>Month</th>
                                                        <th class='bg-secondary'>Machine Type</th>
                                                        <th class='bg-secondary'>Serial Number</th>
                                                        <th class='bg-secondary'>Barcode Machine</th>
                                                        <th class='bg-secondary'>Sympton</th>
                                                        <th class='bg-secondary'>Total Break Machine</th>
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

        const loadMonth = () => {
            $('#month').empty();
            $.ajax({
                url: " <?= site_url('manager/get_month'); ?>",
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

                var dataStr = {
                    'month': month,
                };

                table = $('#analiseTable').DataTable({
                    autoWidth: false,
                    info: true,
                    searching: true,
                    paging: true,
                    destroy: true,
                    "scrollX": true,
                    dom: 'Blfrtip',
                    lengthMenu: [
                        [10, 25, 50, 100, 200, 300, 400],
                        [10, 25, 50, 100, 200, 300, 400]
                    ],
                    buttons: [
                        'excel', 'csv'
                    ],

                    ajax: {
                        url: "<?php echo site_url('manager/get_downtime_analize'); ?>",
                        method: "POST",
                        data: {
                            'dataStr': dataStr
                        },
                        dataType: 'json',
                    },
                    columns: [

                        {
                            'data': 'month'
                        },
                        {
                            'data': 'machine_type'
                        },
                        {
                            'data': 'machine_sn'
                        },
                        {
                            'data': 'barcode_machine'
                        },
                        {
                            'data': 'sympton'
                        },
                        {
                            'data': 'tot_machine'
                        },

                    ]
                });
            }

        );

    });
</script>