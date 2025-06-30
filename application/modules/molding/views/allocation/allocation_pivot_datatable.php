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

            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Maachine Allocation</li>
                    </ol>
                </nav>
            </div>
        </div>
        <hr />
        <div class="card">
            <div class="card-body">
                <div class="ms-auto">
                    <div class="row mb-4">
                        <div class="col-md-12">
                            <a href="<?php echo base_url('molding/addAllocation'); ?>" type="button" class="btn btn-primary"><i class='bx bx-plus-circle'></i>Allocation</a>
                        </div>
                    </div>
                </div>
                <table id="example" class="table table-striped table-bordered table-sm nowrap" style="width:100%">
                    <thead>
                        <tr>
                            <th>Id Plan Allocation</th>
                            <th>Machine Molding</th>
                            <th>Operator Name</th>
                            <th>Line</th>
                            <th>Requirement</th>
                            <th>Date</th>
                            <th>Detail</th>
                        </tr>
                    </thead>
                </table>
            </div>

            <div class="modal fade" id="modal-detail-allocation" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-xl">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title text-center" id="detailOrcSum" style="font-weight: bold;"></h4>

                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">

                            <table id="tableDetail" class="table table-hover table-bordered table-striped table-sm nowrap" style="width: 100%;">
                                <thead>
                                    <tr>
                                        <th>Style</th>
                                        <th>Orc</th>
                                        <th>Color</th>
                                        <th>Component</th>
                                        <th>Target</th>
                                        <th>Kegel</th>
                                        <th>Size</th>
                                        <th>Qty</th>
                                        <th>Output</th>
                                        <th>Balance</th>
                                        <th>Cum Out</th>
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
    </div>

    <script>
        var table;
        $(document).ready(function() {

            var table, date, datepicker;

            allocation();

            function allocation() {

                table = $('#example').DataTable({
                    autoWidth: false,
                    processing: true,
                    destroy: true,
                    info: true,
                    searching: true,
                    paging: true,
                    fixedHeader: true,

                    ajax: {
                        url: '<?= site_url('molding/getAllocationMoldingDatatable'); ?>',
                        type: 'POST',

                    },
                    language: {
                        processing: '<i class="fa fa-spinner fa-spin fa-3x fa-fw"></i><br><div><p>Silahkan Menunggu...</p></div> ',
                        emptyTable: 'Tidak ada data',
                        lengthMenu: '_MENU_',
                    },
                    columns: [{
                            'data': 'id_plan_molding',
                            'className': 'text-center px-3'
                        },
                        {
                            'data': 'id_mesin_molding',
                            'className': 'text-center px-3'
                        },
                        {
                            'data': 'name',
                            'className': 'text-center px-3'
                        },
                        {
                            'data': 'line',
                            'className': 'text-center px-3'
                        },
                        {
                            'data': 'demands',
                            'className': 'text-center px-3'
                        },
                        {
                            'data': 'created_date',
                            'className': 'text-center px-3'
                        },
                        {
                            'className': 'text-center align-middle px-2',
                            render: function(data, type, row) {
                                return "<button type='button' class='btn btn-warning btn-sm btnDetail' id='btn-detail'>Detail</button>"
                            }
                        }

                    ],
                    lengthMenu: [
                        [50, 100, -1],
                        [50, 100, 'All'],
                    ],

                });

            }

            $('#example tbody').on('click', '#btn-detail', function() {
                id_plan_molding = table.row($(this).parents('tr')).data().id_plan_molding;
                console.log(id_plan_molding);

                let dt = $('#tableDetail').DataTable({
                    autoWidth: false,
                    processing: true,
                    destroy: true,
                    info: true,
                    searching: true,
                    stateSave: true,
                    paging: true,
                    fixedHeader: true,


                    ajax: {
                        url: '<?= site_url('molding/detail_allocation'); ?>',
                        type: 'POST',
                        data: {
                            id_plan_molding: id_plan_molding,
                        },
                    },
                    columns: [{
                            'data': 'style',
                            'className': 'text-center px-3'
                        },
                        {
                            'data': 'orc',
                            'className': 'text-center px-3'
                        },
                        {
                            'data': 'color',
                            'className': 'text-center px-3'
                        },
                        {
                            'data': 'component',
                            'className': 'text-center px-3'
                        },
                        {
                            'data': 'target',
                            'className': 'text-center px-3'
                        },
                        {
                            'data': 'kegel',
                            'className': 'text-center px-3'
                        },
                        {
                            'data': 'size',
                            'className': 'text-center px-3'
                        },
                        {
                            'data': 'qty',
                            'className': 'text-center px-3'
                        },
                        {
                            'data': 'output',
                            'className': 'text-center px-3'
                        },
                        {
                            'data': 'cum_out',
                            'className': 'text-center px-3'
                        },
                        {
                            'data': 'balance',
                            'className': 'text-center px-3'
                        },
                    ],

                });
                $('#modal-detail-allocation').modal("show");


            });
        });
    </script>