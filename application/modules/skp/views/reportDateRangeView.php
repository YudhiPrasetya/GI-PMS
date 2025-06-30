<style>
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

        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Juita</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Report By Date Range</li>
                    </ol>
                </nav>
            </div>
        </div>
        <!--end breadcrumb-->
        <h6 class="mb-0 text-uppercase">Report Juita</h6>
        <hr />

        <div class="card mb-5">
            <div class="card-body">
                <div class="row my-3 mx-2">
                    <div class="col-lg-12">

                        <div class="row">
                            <div class="col-lg-12 mb-3">
                                <label class="form-label">Select Date Range Bundle Created:</label>
                                <div class="row">
                                    <div class="col-lg-5">
                                        <input type="date" class="form-control" id="dateStart">
                                    </div>
                                    <div class="col-lg-5">
                                        <input type="date" class="form-control" id="dateEnd">
                                    </div>
                                    <div class="col-lg-2">
                                        <button class="btn btn-primary" id="btnSearch">Search</button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <!-- <div class="table-responsive"> -->
                                <table id="reportSewingTable" class="table table-striped table-bordered table-sm nowrap" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>ORC</th>
                                            <th>Color</th>
                                            <th>Bundle</th>
                                            <th>Bundle Created</th>
                                            <th>Juita In</th>
                                            <th>Juita Out</th>
                                            <th>Qty</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                </table>
                                <!-- </div> -->
                            </div>
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
        theme: 'bootstrap4',
        width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style',
    });
</script>
<script>
    $(document).ready(function() {
        const sweet_loader = '<div class="sweet_loader"><svg viewBox="0 0 140 140" width="140" height="140"><g class="outline"><path d="m 70 28 a 1 1 0 0 0 0 84 a 1 1 0 0 0 0 -84" stroke="rgba(0,0,0,0.1)" stroke-width="4" fill="none" stroke-linecap="round" stroke-linejoin="round"></path></g><g class="circle"><path d="m 70 28 a 1 1 0 0 0 0 84 a 1 1 0 0 0 0 -84" stroke="#71BBFF" stroke-width="4" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-dashoffset="200" stroke-dasharray="300"></path></g></svg></div>';

        // Main Table
        let reportSewingTable;
        reportSewingTable = $('#reportSewingTable').DataTable({});

        function initTable() {
            $('#reportSewingTable').DataTable().destroy();
            reportSewingTable = $('#reportSewingTable').DataTable({
                scrollX: true,
                destroy: true,
                dom: '<"dt-top"<"left-col"Bl><"right-col"f>>rt<"dt-bottom"<"left-col"i><"right-col"p>>',
                buttons: [{
                    extend: 'excel',
                    title: 'Juwita By Date',
                    className: 'mb-2',
                }],
                ajax: {
                    url: '<?= site_url('skp/get_reports'); ?>',
                    type: 'GET',
                    data: {
                        dateStart: $('#dateStart').val(),
                        dateEnd: $('#dateEnd').val()
                    }
                },
                columns: [{
                        'data': 'orc',
                        'className': 'text-center px-2'
                    },
                    {
                        'data': 'color',
                        'className': 'text-center px-2'
                    },
                    {
                        'data': 'no_bundle',
                        'className': 'text-center px-2'
                    },
                    {
                        'data': 'date_created',
                        'className': 'text-center px-2'
                    },
                    {
                        'data': 'input_skp',
                        'className': 'text-center px-2',
                        render: function(data, type, row) {
                            if (!data) {
                                return '-';
                            }
                            return data;
                        }
                    },
                    {
                        'data': 'output_juwita',
                        'className': 'text-center px-2',
                        render: function(data, type, row) {
                            if (!data) {
                                return '-';
                            }
                            return data;
                        }
                    },
                    {
                        'data': 'qty',
                        'className': 'text-center px-2'
                    },
                    {
                        'data': 'status',
                        'className': 'text-center px-2',
                        render: function(data, type, row) {
                            if (data == 'UNPROCESSED') {
                                return '<span class="badge text-bg-warning">' + data + '</span>';
                            } else if (data == 'WIP') {
                                return '<span class="badge text-bg-primary">' + data + '</span>';
                            } else if (data == 'DONE') {
                                return '<span class="badge text-bg-success">' + data + '</span>';
                            }
                        }
                    },
                ],

            });
        }

        $("#btnSearch").on('click', function() {
            initTable();
        });
    });
</script>