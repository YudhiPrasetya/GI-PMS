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
        <h6 class="mb-0 text-uppercase">Sewing By Size</h6>
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
                            <table id="tablePerSize" class="table table-bordered table-striped" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th>Tanggal</th>
                                        <th>Line</th>
                                        <th>ORC</th>
                                        <th>Color</th>
                                        <th>Size</th>
                                        <th>Qty</th>
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
    var table;
    $(document).ready(function() {

        dateSize();

        var table, date, datepicker;

        function dateSize() {
            date = $('#date').val();

            datepicker = {
                'tgl': date
            };

            table = $('#tablePerSize').DataTable({
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
                    url: "<?= site_url('manager/get_sewing_size'); ?>",
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
                        'data': 'tgl_ass'
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

                    }, {
                        'data': 'qt'
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