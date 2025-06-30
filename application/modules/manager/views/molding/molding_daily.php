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
                        <li class="breadcrumb-item active" aria-current="page">Report Molding</li>
                    </ol>
                </nav>
            </div>
        </div>
        <h6 class="mb-0 text-uppercase">Daily Molding</h6>
        <hr />
        <div class="row">
            <div class="col-12 ">
                <div class="card rounded-4 w-100">
                    <div class="card-body">

                        <div class="mx-3 my-3">
                            <div class="row mb-4">

                                <div class="col-md-3">
                                    <input name="date" class="form-control" id="date" type="date" class="datepicker form-control" placeholder="From Date" value="<?php echo date("Y-m-d"); ?>">
                                </div>
                            </div>
                            <table id="tableOrc" class="table table-bordered table-striped" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th>Date</th>
                                        <th>Time</th>
                                        <th>Shift</th>
                                        <th>ORC</th>
                                        <th>Style</th>
                                        <th>color</th>
                                        <th>Size</th>
                                        <th>No Bundle</th>
                                        <th>Outermold Barcode</th>
                                        <th>Qty outer</th>
                                        <th>Midmild Barcode</th>
                                        <th>Qty Mid</th>
                                        <th>Linning barcode</th>
                                        <th>Qty Lining</th>
                                        <th>Qty Molding</th>
                                    </tr>
                                </thead>
                                <tfoot>

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

        dateSize();

        var table, date, datepicker;

        function dateSize() {
            date = $('#date').val();

            datepicker = {
                'tgl': date
            };

            table = $('#tableOrc').DataTable({
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

                ajax: {
                    url: "<?= site_url('manager/get_daily_molding'); ?>",
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
                        'data': 'wkt'
                    },
                    {
                        'data': 'shift'
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
                        'data': 'outermold_barcode'
                    },
                    {
                        'data': 'qty_outermold'
                    },
                    {
                        'data': 'midmold_barcode'
                    },
                    {
                        'data': 'qty_midmold'
                    },
                    {
                        'data': 'linningmold_barcode'
                    },
                    {
                        'data': 'qty_linningmold'
                    },
                    {
                        'data': 'qty_molding'
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
            dateSize();
        });


    });
</script>