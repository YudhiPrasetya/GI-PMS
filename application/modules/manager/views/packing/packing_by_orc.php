<!--start page wrapper -->
<div class="page-wrapper">
    <div class="page-content">
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Molding</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Report Packing</li>
                    </ol>
                </nav>
            </div>
        </div>
        <h6 class="mb-0 text-uppercase">Packing By ORC</h6>
        <hr />
        <div class="row">
            <div class="col-12 ">
                <div class="card rounded-4 w-100">
                    <div class="card-body">
                        <div class="mx-3 my-3">
                            <form class="row g-3 needs-validation" novalidate>
                                <div class="col-md-3">
                                    <select class="single_select" id="orc"></select>
                                </div>
                                <div class="col-md-3">
                                    <input type="button" name="filter" id="filter" value="Filter" class="btn btn-success">
                                </div>
                            </form>
                            </p>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card ">
                                        <!-- <div class="card-header">
                                            <h3 class="card-title">Packing By Orc</h3>
                                        </div> -->
                                        <div class="card-body">
                                            <table id="tableOrc" class="table table-bordered table-striped" cellspacing="0" width="100%">
                                                <thead>
                                                    <tr>
                                                        <th>Date</th>
                                                        <th>Line</th>
                                                        <th>ORC</th>
                                                        <th>color</th>
                                                        <th>Size</th>
                                                        <th>Qty Packing</th>
                                                    </tr>
                                                </thead>
                                                <tfoot>
                                                    <tr>
                                                        <th colspan="6" style="text-align:right">Total:</th>
                                                    </tr>
                                                </tfoot>
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

        const loadOrc = () => {
            $('#orc').empty();
            $.ajax({
                url: " <?= site_url('manager/get_all_orc_packing'); ?>",
                type: 'GET',
                dataType: 'JSON',
                beforeSend: function() {
                    $("#orc").prepend($('<option></option>').html('Loading...'));
                },
            }).done(function(data) {
                $('#orc').empty();
                $('#orc').append($('<option>', {
                    value: "",
                    text: "- Select ORC -"
                }));
                $.each(data, function(i, item) {
                    $('#orc').append($('<option>', {
                        value: item.orc,
                        text: item.orc
                    }));
                });
            });
        }
        loadOrc();

        $('#filter').on('click', function() {

                var orc = $('#orc').val();

                var dataStr = {
                    'orc': orc,
                };

                table = $('#tableOrc').DataTable({
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
                    "footerCallback": function(row, data, start, end, display) {
                        var api = this.api(),
                            data;

                        // Remove the formatting to get integer data for summation
                        var intVal = function(i) {
                            return typeof i === 'string' ?
                                i.replace(/[\$,]/g, '') * 1 :
                                typeof i === 'number' ?
                                i : 0;
                        };

                        // Total over all pages
                        total = api
                            .column(5)
                            .data()
                            .reduce(function(a, b) {
                                return intVal(a) + intVal(b);
                            }, 0);

                        // Total over this page
                        pageTotal = api
                            .column(5, {
                                page: 'current'
                            })
                            .data()
                            .reduce(function(a, b) {
                                return intVal(a) + intVal(b);
                            }, 0);

                        // Update footer
                        $(api.column(5).footer()).html(
                            +pageTotal + '( ' + total + ' Total)'
                        );
                    },


                    ajax: {
                        url: "<?php echo site_url('manager/get_daily_packing_orc'); ?>",
                        method: "POST",
                        data: {
                            'dataStr': dataStr
                        },
                        dataType: 'json',
                    },
                    columns: [

                        {
                            'data': 'tgl'
                        },
                        {
                            'data': 'line'
                        },
                        {
                            'data': 'orc'
                        },
                        {
                            'data': 'color'
                        },
                        {
                            'data': 'size'
                        },
                        {
                            'data': 'qty'
                        },

                    ]
                });
            }

        );

    });
</script>