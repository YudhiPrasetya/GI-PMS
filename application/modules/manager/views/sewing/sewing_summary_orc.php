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
                        <li class="breadcrumb-item active" aria-current="page">Report Sewing</li>
                    </ol>
                </nav>
            </div>
        </div>
        <h6 class="mb-0 text-uppercase">Summary Sewing ORC</h6>
        <hr />
        <div class="row">
            <div class="col-12 ">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <!-- <input name="search_orc" class="form-control" id="search_orc" type="text"> -->
                                        <select id="search_orc" class="form-control select2_1" style="width: 100%;"></select>
                                    </div>
                                    <div class="col-md-4">
                                        <input type="button" name="filter" id="filter_orc" value="Filter" class="btn btn-success">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <table id="orcTable" class="table table-bordered table-striped nowrap">
                            <thead>
                                <tr>
                                    <th>Orc</th>
                                    <th>Style</th>
                                    <th>Color</th>
                                    <th>Buyer</th>
                                    <th>PO</th>
                                    <th>DDD</th>
                                    <th>Order</th>
                                    <th>Sewing In</th>
                                    <th>Sewing Out</th>
                                    <th>Bal Sewing</th>
                                    <th>WIP Sewing</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div><!--end row-->
        <div class="modal fade" id="modal-detail" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title text-center" id="detailOrc" style="font-weight: bold;">Detail ORC</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mx-2">
                            <table id="table2" class="table table-hover table-bordered table-sm table-striped">
                                <thead>
                                    <tr>
                                        <th>Date</th>
                                        <th>ORC</th>
                                        <th>Style</th>
                                        <th>Color</th>
                                        <th>Size</th>
                                        <th>No Bundle</th>
                                        <th>Qty</th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th colspan="7" style="text-align:right">Total:</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="modal-detail_out" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title text-center" id="detailOrc" style="font-weight: bold;">Detail ORC</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mx-2">
                            <table id="table3" class="table table-hover table-bordered table-sm table-striped">
                                <thead>
                                    <tr>
                                        <th>Date</th>
                                        <th>ORC</th>

                                        <th>Size</th>
                                        <th>No Bundle</th>
                                        <th>Qty</th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th colspan="5" style="text-align:right">Total:</th>
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
<!--end page wrapper -->
<script>
    $('.select2_1').select2({
        theme: 'bootstrap-5',
        width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style',

    });
</script>
<script>
    $(document).ready(function() {

        let orcTable = $('#orcTable').DataTable({
            autoWidth: true,
            info: true,
            searching: true,
            paging: true,
            scrollX: true,
            destroy: true,
        })
        const loadOrc = () => {
            $('#search_orc').empty();
            $.ajax({
                url: " <?php echo site_url('manager/getOrcSummary'); ?>",
                type: 'get',
                dataType: 'json',
                beforeSend: function() {
                    $("#search_orc").prepend($('<option></option>').html('Loading...'));
                },
            }).done(function(data) {
                $('#search_orc').empty();
                $('#search_orc').append($('<option>', {
                    value: "",
                    text: "- Select ORC Number -"
                }));
                $.each(data, function(i, item) {
                    $('#search_orc').append($('<option>', {
                        value: item.orc,
                        text: item.orc
                    }));
                });
            });
        }
        loadOrc();

        $('#filter_orc').click(function() {

            let orc = $('#search_orc').val();
            orcTable = $('#orcTable').DataTable({
                processing: true,
                destroy: true,
                info: true,
                scrollX: true,
                searching: true,
                paging: true,
                fixedHeader: true,

                ajax: {
                    url: '<?= site_url('manager/get_sewing_summary_orc'); ?>',
                    type: 'GET',
                    data: {
                        'orc': orc
                    },
                },
                language: {
                    processing: '<i class="fa fa-spinner fa-spin fa-3x fa-fw"></i><br><div><p>Silahkan Menunggu...</p></div> ',
                    emptyTable: 'Tidak ada data',
                    lengthMenu: '_MENU_',
                },
                columns: [{
                        'data': 'orc'
                    },
                    {
                        'data': 'style'
                    },
                    {
                        'data': 'color'
                    },
                    {
                        'data': 'buyer'
                    },
                    {
                        'data': 'so',
                    },
                    {
                        'data': 'etd'
                    },
                    {
                        'data': 'qty'
                    },
                    {
                        'data': 'sew_in'
                    },
                    {
                        'data': 'sew_out'
                    },
                    {
                        'data': 'balance'
                    },
                    {
                        'data': 'wip'
                    },
                    {
                        'className': 'text-center align-middle',
                        render: function(data, type, row) {
                            return "<button type='button' class='btn btn-danger btn-sm btnDetailIn'>In</button>&nbsp<button type='button' class='btn btn-danger btn-sm btnDetailOut'>Out</button>"
                        }
                    }

                ],
                lengthMenu: [
                    [10, 25, 50, 100, -1],
                    [10, 25, 50, 100, 'All'],
                ],
            });


            $('#orcTable').on('click', '.btnDetailIn', function() {
                var orc = orcTable.row($(this).parents('tr')).data().orc;

                let dt = $('#table2').DataTable({
                    autoWidth: false,
                    processing: true,
                    destroy: true,
                    info: true,
                    searching: true,
                    stateSave: true,
                    paging: true,
                    fixedHeader: true,
                    dom: 'Blfrtip',
                    buttons: [{
                        extend: 'excel',
                        title: 'Data Output Finish Good '
                    }],
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
                            +pageTotal + '( ' + total + ' Total)'
                        );
                    },
                    ajax: {
                        url: '<?= site_url('manager/get_detail_summaries_sewing_in'); ?>',
                        type: 'POST',
                        data: {
                            orc: orc,
                        },
                    },
                    columns: [{
                            'data': 'tgl'
                        },
                        {
                            'data': 'orc'
                        },
                        {
                            'data': 'style'
                        },
                        {
                            'data': 'color'
                        },
                        {
                            'data': 'size'
                        },
                        {
                            'data': 'no_bundle'
                        },
                        {
                            'data': 'qty_pcs'
                        },

                    ],

                });
                $('#modal-detail').modal("show");

            });

            $('#orcTable').on('click', '.btnDetailOut', function() {
                var orc = orcTable.row($(this).parents('tr')).data().orc;

                let dt = $('#table3').DataTable({
                    autoWidth: false,
                    processing: true,
                    destroy: true,
                    info: true,
                    searching: true,
                    stateSave: true,
                    paging: true,
                    fixedHeader: true,
                    dom: 'Blfrtip',
                    buttons: [{
                        extend: 'excel',
                        title: 'Data Output Finish Good '
                    }],
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
                            .column(4)
                            .data()
                            .reduce(function(a, b) {
                                return intVal(a) + intVal(b);
                            }, 0);

                        // Total over this page
                        pageTotal = api
                            .column(4, {
                                page: 'current'
                            })
                            .data()
                            .reduce(function(a, b) {
                                return intVal(a) + intVal(b);
                            }, 0);

                        // Update footer
                        $(api.column(4).footer()).html(
                            +pageTotal + '( ' + total + ' Total)'
                        );
                    },
                    ajax: {
                        url: '<?= site_url('manager/ajax_get_detail_summary'); ?>',
                        type: 'POST',
                        data: {
                            orc: orc,
                        },
                    },
                    columns: [{
                            'data': 'tgl_ass'
                        },
                        {
                            'data': 'orc'
                        },

                        {
                            'data': 'size'
                        },
                        {
                            'data': 'no_bundle'
                        },
                        {
                            'data': 'qty'
                        },

                    ],

                });
                $('#modal-detail_out').modal("show");

            });
        });





    })
</script>