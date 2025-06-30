<!--start page wrapper -->
<div class="page-wrapper">
    <div class="page-content">
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">HEAD</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Report Deffect Sewing</li>
                    </ol>
                </nav>
            </div>
        </div>
        <h6 class="mb-0 text-uppercase">Summary Deffect Sewing</h6>
        <hr />
        <div class="row">
            <div class="col-12 ">
                <div class="card">
                    <div class="card-body">
                        <div class="mx-3 my-3">
                            <div class="row mb-4">
                                <div class="col-md-3">
                                    <input name="date" class="form-control" id="date" type="date" class="datepicker form-control" placeholder="From Date" value="<?php echo date("Y-m-d"); ?>">
                                </div>
                            </div>
                            <table id="deffectTable" class="table table-bordered table-striped ">
                                <thead>
                                    <tr>
                                        <th>Date</th>
                                        <th>Line</th>
                                        <th>Orc</th>
                                        <th>Dcode</th>
                                        <th>Deffect</th>
                                        <th>Qty Deffect</th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
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

        </div><!--end row-->

    </div>
</div>
<!--end page wrapper -->

<script>
    var table;
    $(document).ready(function() {

        dateDefect();

        var table, date, datepicker;

        function dateDefect() {
            date = $('#date').val();
            const lineNames = '<?= $this->session->userdata('username'); ?>';

            datepicker = {
                'tgl': date,
                'line': lineNames
            };


            table = $('#deffectTable').DataTable({
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
                    title: 'Data Output Sewing '
                }, ],
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
                    url: "<?= site_url('head/get_defect'); ?>",
                    type: "POST",
                    data: {
                        'data': datepicker
                    },
                },
                language: {
                    processing: '<i class="fa fa-spinner fa-spin fa-3x fa-fw"></i><br><div><p>Silahkan Menunggu...</p></div> ',
                    emptyTable: 'Tidak ada data',
                    lengthMenu: '_MENU_',
                },
                columns: [{
                        'data': 'tgl'
                    },
                    {
                        'data': 'line'
                    },
                    {
                        'data': 'orc'
                    },
                    {
                        'data': 'DCode'
                    },
                    {
                        'data': 'Defect'

                    }, {
                        'data': 'qty_defect'
                    },
                ],
                lengthMenu: [
                    [50, 100, -1],
                    [50, 100, 'All'],
                ],
                order: [
                    [0, 'ASC'],
                ]
            });

        }

        $('#date').on('change', function() {
            dateDefect();
        });


    });
</script>