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
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-6">
                                        <!-- <input name="search_orc" class="form-control" id="search_orc" type="text"> -->
                                        <select id="search_orc" class="form-control select2_1" style="width: 100%;"></select>
                                    </div>
                                    <div class="col-md-4">
                                        <input type="button" name="filter" id="filter_orc" value="Filter" class="btn btn-success">
                                    </div>
                                </div>
                            </div>
                            <!-- <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-6">
                                        <input name="datefrom" class="form-control" id="datefrom" type="text">
                                    </div>
                                    <div class="col-md-4">
                                        <input type="button" name="filter" id="filter" value="Filter" class="btn btn-success">
                                    </div>
                                </div>
                            </div> -->
                        </div>
                        </br>
                        <table id="sumaryTable" class="table table-bordered table-hover table-striped table-sm nowrap">
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
                                    <th colspan="5" class="text-center bg-success">PACKING</th>
                                    <th colspan="4" class="text-center bg-info">FINISH GOOD</th>
                                </tr>
                                <tr>
                                    <th class='bg-warning'>IN TODAY</th>
                                    <th class='bg-warning'>IN CUM</th>
                                    <th class='bg-warning'>OUT TODAY </th>
                                    <th class='bg-warning'>CUM OUT</th>
                                    <th class='bg-warning'>WIP</th>
                                    <th class='bg-warning'>BALANCE </th>
                                    <th class='bg-danger'>IN TODAY</th>
                                    <th class='bg-danger'>IN SEWING</th>
                                    <th class='bg-danger'>OUT TODAY </th>
                                    <th class='bg-danger'>CUM OUT</th>
                                    <th class='bg-danger'>WIP</th>
                                    <th class='bg-danger'>BALANCE </th>
                                    <th class='bg-success'>IN PACKING</th>
                                    <th class='bg-success'>CUM OUT</th>
                                    <th class='bg-success'>WIP</th>
                                    <th class='bg-success'>BALANCE </th>
                                    <th class='bg-success'>TODAY </th>
                                    <th class='bg-info'>CUM FG IN</th>
                                    <th class='bg-info'>LOADING</th>
                                    <th class='bg-info'>STOCK</th>
                                    <th class='bg-info'>BALANCE </th>
                                </tr>
                            </thead>
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
    $('.select2_1').select2({
        theme: 'bootstrap-5',
        width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style',

    });
</script>
<script>
    $(document).ready(function() {
        let sumaryTable = $('#sumaryTable').DataTable({
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
            console.log(orc);

            sumaryTable = $('#sumaryTable').DataTable({
                autoWidth: true,
                info: true,
                searching: true,
                paging: true,
                scrollX: true,
                destroy: true,
                lengthMenu: [
                    [10, 25, 50, 100],
                    [10, 25, 50, 100]
                ],
                dom: 'Blfrtip',
                buttons: [{
                    extend: 'excel',
                }, ],
                ajax: {
                    url: '<?= site_url('manager/get_summary_prod'); ?>',
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
                        'data': 'style_sam'
                    },
                    {
                        'data': 'color'
                    },
                    {
                        'data': 'buyer'
                    },
                    {
                        'data': 'so'
                    },
                    {
                        'data': 'etd'
                    },
                    {
                        'data': 'plan_export'
                    },
                    {
                        'data': 'qty_order'
                    },
                    {
                        'className': 'text-center px-3 cutting',
                        'data': 'in_today'
                    },
                    {
                        'className': 'text-center px-3 cutting',
                        'data': 'trimstore_in'
                    },
                    {
                        'className': 'text-center px-3 cutting',
                        'data': 'cutting_in_today'
                    },

                    {
                        'className': 'text-center px-3 cutting',
                        'data': 'sewing_in'
                    },
                    {
                        'className': 'text-center px-3 cutting',
                        'data': 'wip_cut'
                    },
                    {
                        'className': 'text-center px-3 cutting',
                        'data': 'balance_trim'
                    },

                    {
                        'className': 'text-center px-3 sewing',
                        'data': 'sew_in_today'
                    },
                    {
                        'className': 'text-center px-3 sewing',
                        'data': 'sewing_in'
                    },
                    {
                        'className': 'text-center px-3 sewing',
                        'data': 'sew_today'
                    },

                    {
                        'className': 'text-center px-3 sewing',
                        'data': 'sewing_out'
                    },
                    {
                        'className': 'text-center px-3 sewing',
                        'data': 'wip_sew'
                    },
                    {
                        'className': 'text-center px-3 sewing',
                        'data': 'balance_sew'
                    },

                    {
                        'className': 'text-center px-3 pack',
                        'data': 'sewing_out'
                    },
                    {
                        'className': 'text-center px-3 pack',
                        'data': 'packing_in'
                    },
                    {
                        'className': 'text-center px-3 pack',
                        'data': 'wip'
                    },
                    {
                        'className': 'text-center px-3 pack',
                        'data': 'balance_pack'
                    },
                    {
                        'className': 'text-center px-3 pack',
                        'data': 'pack_today'
                    },
                    {
                        'className': 'text-center px-3 fg',
                        'data': 'input_fg'
                    },
                    {
                        'className': 'text-center px-3 fg',
                        'data': 'ouput_fg'
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
        })

        // let sumaryTable = $('#sumaryTable').DataTable({
        //     autoWidth: true,
        //     info: true,
        //     searching: true,
        //     paging: true,
        //     scrollX: true,
        //     destroy: true,
        //     lengthMenu: [
        //         [10, 25, 50, 100],
        //         [10, 25, 50, 100]
        //     ],
        //     dom: 'Blfrtip',
        //     buttons: [{
        //         extend: 'excel',
        //     }, ],

        // });


    });
</script>