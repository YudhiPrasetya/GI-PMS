<style>
    table.DTFC_Cloned tr {
        background-color: white;
        margin-bottom: 0;
    }

    div.DTFC_LeftHeadWrapper table,
    div.DTFC_RightHeadWrapper table {
        border-bottom: none !important;
        margin-bottom: 0 !important;
        background-color: white;
    }

    div.DTFC_LeftBodyWrapper table,
    div.DTFC_RightBodyWrapper table {
        border-top: none;
        margin: 0 !important;
    }

    div.DTFC_LeftBodyWrapper table thead .sorting:after,
    div.DTFC_LeftBodyWrapper table thead .sorting_asc:after,
    div.DTFC_LeftBodyWrapper table thead .sorting_desc:after,
    div.DTFC_LeftBodyWrapper table thead .sorting:after,
    div.DTFC_LeftBodyWrapper table thead .sorting_asc:after,
    div.DTFC_LeftBodyWrapper table thead .sorting_desc:after,
    div.DTFC_RightBodyWrapper table thead .sorting:after,
    div.DTFC_RightBodyWrapper table thead .sorting_asc:after,
    div.DTFC_RightBodyWrapper table thead .sorting_desc:after,
    div.DTFC_RightBodyWrapper table thead .sorting:after,
    div.DTFC_RightBodyWrapper table thead .sorting_asc:after,
    div.DTFC_RightBodyWrapper table thead .sorting_desc:after {
        display: none;
    }

    div.DTFC_LeftBodyWrapper table tbody tr:first-child th,
    div.DTFC_LeftBodyWrapper table tbody tr:first-child td,
    div.DTFC_RightBodyWrapper table tbody tr:first-child th,
    div.DTFC_RightBodyWrapper table tbody tr:first-child td {
        border-top: none;
    }

    div.DTFC_LeftFootWrapper table,
    div.DTFC_RightFootWrapper table {
        border-top: none;
        margin-top: 0 !important;
        background-color: white;
    }

    div.DTFC_Blocker {
        background-color: white;
    }
</style>
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
                        <li class="breadcrumb-item active" aria-current="page">PRODUCTION REPORT</li>
                    </ol>
                </nav>
            </div>
        </div>
        <h6 class="mb-0 text-uppercase">Globalindo Intimates - PRODUCTION REPORT</h6>
        <hr />
        <div class="row">
            <div class="col-12 ">
                <div class="card rounded-4 w-100">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12"></div>
                            <div class="col-12">
                                <table id="sumaryTable" class="table" style="width: 100%;">
                                    <thead>
                                        <tr>
                                            <th rowspan="2" class='align-middle bg-primary' align-middle>ORC</th>
                                            <th rowspan="2" class='align-middle bg-primary' align-middle>STYLE</th>
                                            <th rowspan="2" class='align-middle bg-primary' align-middle>COLOR</th>
                                            <th rowspan="2" class='align-middle bg-primary' align-middle>BUYER</th>
                                            <th rowspan="2" class='align-middle bg-primary' align-middle>PO</th>
                                            <th rowspan="2" class='align-middle bg-primary' align-middle>DDD</th>
                                            <th rowspan="2" class='align-middle bg-primary' align-middle>PLAN SHIP DATE</th>
                                            <th rowspan="2" class='align-middle bg-primary'>QTY ORDER</th>
                                            <th colspan="6" class="text-center bg-warning">CUTTING</th>
                                            <th colspan="6" class="text-center bg-danger">SEWING</th>
                                            <th colspan="6" class="text-center bg-success">PACKING</th>
                                            <th colspan="6" class="text-center bg-info">FINISH GOOD</th>
                                        </tr>
                                        <tr>
                                            <th class='bg-warning'>IN TODAY</th>
                                            <th class='bg-warning'>IN CUM</th>
                                            <th class='bg-warning'>OUT TODAY </th>
                                            <th class='bg-warning'>CUM OUT</th>
                                            <th class='bg-warning'>WIP</th>
                                            <th class='bg-warning'>BALANCE </th>
                                            <th class='bg-danger'>IN TODAY</th>
                                            <th class='bg-danger'>IN CUM</th>
                                            <th class='bg-danger'>OUT TODAY </th>
                                            <th class='bg-danger'>OUT CUM</th>
                                            <th class='bg-danger'>WIP</th>
                                            <th class='bg-danger'>BALANCE </th>
                                            <th class='bg-success'>IN TODAY</th>
                                            <th class='bg-success'>IN CUM</th>
                                            <th class='bg-success'>OUT TODAY</th>
                                            <th class='bg-success'>OUT CUM</th>
                                            <th class='bg-success'>WIP</th>
                                            <th class='bg-success'>BALANCE </th>
                                            <th class='bg-info'>IN TODAY </th>
                                            <th class='bg-info'>IN CUM</th>
                                            <th class='bg-info'>OUT TODAY</th>
                                            <th class='bg-info'>OUT CUM</th>
                                            <th class='bg-info'>WIP</th>
                                            <th class='bg-info'>BALANCE </th>
                                        </tr>
                                    </thead>
                                </table>
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
    $('.select2_1').select2({
        theme: 'bootstrap-5',
        width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style',

    });
</script>
<script>
    $(document).ready(function() {
        let sumaryTable = $('#sumaryTable').DataTable({
            scrollX: true,
            scrollY: 400,
            dom: 'Blfrtip',
            buttons: [{
                extend: 'excel',
            }, ],
            ajax: {
                url: '<?= site_url('ppic/get_summary_prod_global'); ?>',
                type: 'GET',
            },
            language: {
                processing: '<i class="fa fa-spinner fa-spin fa-3x fa-fw"></i><br><div><p>Silahkan Menunggu...</p></div> ',
                emptyTable: 'Tidak ada data',
                lengthMenu: '_MENU_',
            },
            fixedColumns: {
                left: 1,
                right: 2
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
                    'data': 'po'
                },
                {
                    'data': 'etd'
                },
                {
                    'data': 'plan_export'
                },
                {
                    'data': 'order_qty'
                },
                {
                    'className': 'text-center px-3 cutting',
                    'data': 'in_cutting_today'
                },
                {
                    'className': 'text-center px-3 cutting',
                    'data': 'in_cutting'
                },
                {
                    'className': 'text-center px-3 cutting',
                    'data': 'out_cutting_today'
                },

                {
                    'className': 'text-center px-3 cutting',
                    'data': 'out_cutting'
                },
                {
                    'className': 'text-center px-3 cutting',
                    'data': 'wip_cutting'
                },
                {
                    'className': 'text-center px-3 cutting',
                    'data': 'balance_cutting'
                },

                {
                    'className': 'text-center px-3 sewing',
                    'data': 'in_sewing_today'
                },
                {
                    'className': 'text-center px-3 sewing',
                    'data': 'in_sewing'
                },
                {
                    'className': 'text-center px-3 sewing',
                    'data': 'out_sewing_today'
                },

                {
                    'className': 'text-center px-3 sewing',
                    'data': 'out_sewing'
                },
                {
                    'className': 'text-center px-3 sewing',
                    'data': 'wip_sewing'
                },
                {
                    'className': 'text-center px-3 sewing',
                    'data': 'balance_sewing'
                },
                {
                    'className': 'text-center px-3 pack',
                    'data': 'out_sewing_today'
                },
                {
                    'className': 'text-center px-3 pack',
                    'data': 'out_sewing'
                },
                {
                    'className': 'text-center px-3 pack',
                    'data': 'in_packing_today'
                },
                {
                    'className': 'text-center px-3 pack',
                    'data': 'in_packing'
                },
                {
                    'className': 'text-center px-3 pack',
                    'data': 'wip_packing'
                },
                {
                    'className': 'text-center px-3 pack',
                    'data': 'balance_packing'
                },
                {
                    'className': 'text-center px-3 fg',
                    'data': 'in_fg_today'
                },
                {
                    'className': 'text-center px-3 fg',
                    'data': 'in_fg'
                },
                {
                    'className': 'text-center px-3 fg',
                    'data': 'out_fg_today'
                },
                {
                    'className': 'text-center px-3 fg',
                    'data': 'out_fg'
                },
                {
                    'className': 'text-center px-3 fg',
                    'data': 'wip_fg'
                },
                {
                    'className': 'text-center px-3 fg',
                    'data': 'balance_fg'
                },

            ],
            "fnRowCallback": function(nRow, aData, iDisplayIndex, iDisplayIndexFull) {

                if (aData['balance_trim'] == 0) {
                    $('.cutting', nRow).css('background-color', '#fef08a');
                }
                console.log(aData['balance_trim']);

                if (aData['balance_sew'] == 0) {
                    $('.sewing', nRow).css('background-color', '#fca5a5');
                }

                if (aData['balance_pack'] == 0) {
                    $('.pack', nRow).css('background-color', '#4ade80');
                }

                if (aData['balance_fg'] == 0) {
                    $('.fg', nRow).css('background-color', '#7dd3fc');
                }
            }

        });
    });
</script>