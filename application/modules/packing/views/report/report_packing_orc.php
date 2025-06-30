<style>
    .dt-buttons {
        margin-bottom: 10px;
    }

    .dataTables_length {
        margin-bottom: -30px;
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
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Packing</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Packing ORC</li>
                    </ol>
                </nav>
            </div>
        </div>
        <h6 class="mb-0 text-uppercase">Packing ORC Report</h6>
        <hr />
        <div class="row">
            <div class="col-12 ">
                <div class="card rounded-4 w-100">
                    <div class="card-body">
                        <div class="mx-3 my-3">

                            <div class="row mb-4">
                                <div class="col-md-1">
                                    <label for="orc" class="col-form-label">ORC</label>
                                </div>
                                <div class="col-md-3">
                                    <select class="single_select" id="orc"></select>
                                </div>
                                <div class="col-md-3">
                                    <input type="button" name="filter" id="filter" value="Filter" class="btn btn-info">
                                </div>
                            </div>


                            <table id="tableOrc" class="table table-bordered table-striped table-sm nowrap" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th class="text-center">No.</th>
                                        <th class="text-center">Date</th>
                                        <th class="text-center">Line</th>
                                        <th class="text-center">ORC</th>
                                        <th class="text-center">color</th>
                                        <th class="text-center">Size</th>
                                        <th class="text-center">Qty Packing</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th colspan="6" class="text-center">Total</th>
                                        <th class="text-center">0 ( 0 )</th>

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
    $(document).ready(function() {
        load_orc();
        var table = $('#tableOrc').DataTable();

        function load_orc() {
            $('#orc').empty();
            $.ajax({
                url: "<?php echo site_url('packing/get_orc_report'); ?>",
                type: 'get',
                dataType: 'json',
            }).done(function(data) {
                $('#orc').empty();
                $('#orc').append($('<option>', {
                    value: "",
                    text: "- Select ORC -"
                }));
                // console.log('lineee: ', data);

                $.each(data, function(i, item) {
                    $('#orc').append($('<option>', {
                        value: item.orc,
                        text: item.orc
                    }));
                });
            });
        }


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
                    // lengthMenu: [
                    //     [10, 25, 50, 100, 200, 300, 400],
                    //     [10, 25, 50, 100, 200, 300, 400]
                    // ],
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
                            .column(6)
                            .data()
                            .reduce(function(a, b) {
                                return intVal(a) + intVal(b);
                            }, 0);

                        // Total over this page
                        pageTotal = api
                            .column(6, {
                                page: 'current'
                            })
                            .data()
                            .reduce(function(a, b) {
                                return intVal(a) + intVal(b);
                            }, 0);

                        // Update footer
                        $(api.column(6).footer()).html(
                            pageTotal + '( ' + total + ' )'
                        );
                    },


                    ajax: {
                        url: "<?php echo site_url('packing/get_daily_packing_orc'); ?>",
                        method: "POST",
                        data: {
                            'dataStr': dataStr
                        },
                        dataType: 'json',
                    },
                    columns: [{
                            "data": null,
                            "className": "text-center px-2 align-middle",
                            "orderable": true,
                            "searchable": true,
                            // "width": "100px",
                            "render": function(data, type, row, meta) {
                                return meta.row + meta.settings._iDisplayStart + 1;
                            }
                        },
                        {
                            'data': 'tgl',
                            'className': 'text-center px-2'
                        },
                        {
                            'data': 'line',
                            'className': 'text-center px-2'
                        },
                        {
                            'data': 'orc',
                            'className': 'text-center px-2'
                        },
                        {
                            'data': 'color',
                            'className': 'text-center px-2'
                        },
                        {
                            'data': 'size',
                            'className': 'text-center px-2'
                        },
                        {
                            'data': 'qty',
                            'className': 'text-center px-2'
                        },

                    ]
                });
            }

        );
        // }
    });
</script>