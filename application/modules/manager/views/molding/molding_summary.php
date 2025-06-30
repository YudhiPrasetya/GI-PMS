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
                        <li class="breadcrumb-item active" aria-current="page">Report Molding</li>
                    </ol>
                </nav>
            </div>
        </div>
        <h6 class="mb-0 text-uppercase">Molding By ORC</h6>
        <hr />
        <div class="row">
            <div class="col-12 ">
                <div class="card rounded-4 w-100">
                    <div class="card-body">
                        <div class="mx-3 my-3">

                            <form class="row g-3 needs-validation" novalidate>
                                <div class="col-md-4">
                                    <label for="validationCustom01" class="form-label">ORC</label>
                                    <select class="single_select" id="orc"></select>
                                </div>
                                <div class="col-md-4">
                                    <label for="style" class="form-label">STYLE</label>
                                    <input type="text" class="form-control" id="style" required disabled>
                                </div>
                                <div class="col-md-4">
                                    <label for="color" class="form-label">COLOR</label>
                                    <input type="text" class="form-control" id="color" required disabled>
                                </div>
                                <div class="col-md-4">
                                    <label for="qty" class="form-label">QTY ORDER</label>
                                    <input type="text" class="form-control" id="qty_in" required disabled>
                                </div>
                                <div class="col-md-4">
                                    <label for="buyer" class="form-label">DDD</label>
                                    <input type="text" class="form-control" id="ddd" required disabled>
                                </div>
                                <div class="col-md-4">
                                    <label for="comm" class="form-label">PLAN SHIP DATE</label>
                                    <input type="text" class="form-control" id="plan" required disabled>
                                </div>

                            </form>
                            </p>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card ">
                                        <div class="card-header">
                                            <h3 class="card-title">Detail Status Qty</h3>
                                        </div>
                                        <div class="card-body">
                                            <table id="tableDepartment" class="table table-border table-striped">
                                                <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Cutting</th>
                                                        <th>Molding</th>
                                                        <th>Sewing</th>
                                                        <th>Packing</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                </tbody>
                                                <tfoot>
                                                </tfoot>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <h3 class="card-title">Molding Detail Status</h3>
                                        </div>
                                        <div class="card-body">
                                            <table id="tableOrcMolding" class="table table-border table-striped" width="100%">
                                                <thead>
                                                    <tr>
                                                        <th>DAY</th>
                                                        <th>DATE</th>
                                                        <th>SIZE</th>
                                                        <th>MOLDING QTY (pcs)</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                </tbody>
                                                <tfoot>
                                                    <tr>
                                                        <th colspan="4" style="text-align:right">Total:</th>
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
                url: " <?= site_url('manager/get_all_orc_molding'); ?>",
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

        table = $('#tableOrcMolding').DataTable({
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
                    .column(3)
                    .data()
                    .reduce(function(a, b) {
                        return intVal(a) + intVal(b);
                    }, 0);

                // Total over this page
                pageTotal = api
                    .column(3, {
                        page: 'current'
                    })
                    .data()
                    .reduce(function(a, b) {
                        return intVal(a) + intVal(b);
                    }, 0);

                // Update footer
                $(api.column(3).footer()).html(
                    +pageTotal + '( ' + total + ' Total)'
                );
            }
        });
        table2 = $("#tableDepartment").DataTable();


        $('#orc').change(function() {
            orc = $(this).val()
            console.log(orc);
            $.when(
                $.ajax({
                    url: '<?php echo site_url("manager/get_detail_molding"); ?>/' +
                        orc,
                    type: 'GET',
                    dataType: 'json',
                }).done(function(data) {

                    table2.clear();
                    $.each(data, function(i, item) {
                        table2.row.add([
                            "Input",
                            item.in_cutting,
                            item.in_molding,
                            item.in_sewing,
                            item.in_packing,
                        ]).draw();
                        table2.row.add([
                            "Output",
                            item.in_sewing,
                            item.qty_mold,
                            item.qty_sewing_out,
                            item.qty_packing,
                        ]).draw();
                        table2.row.add([
                            "Qty Balance",
                            item.balance_order_ex,
                            item.balance_mold,
                            item.balance_order_sewing,
                            item.bal_packing,
                        ]).draw();
                        table2.row.add([
                            "Wip",
                            item.wip_cut,
                            item.wip_molding,
                            item.wip_sewing,
                            item.wip_pac,
                        ]).draw();

                    })

                }),
                $.ajax({
                    url: '<?php echo site_url("manager/get_detail_molding2"); ?>/' +
                        orc,
                    type: 'GET',
                    dataType: 'json',
                    success: function(data) {
                        $('#style').val(data[0].style);
                        $('#color').val(data[0].color);
                        $('#qty_in').val(data[0].qty);
                        $('#ddd').val(data[0].etd);
                        $('#plan').val(data[0].plan_export);
                        table.clear();

                        $.each(data, function(i, item) {
                            table.row.add([
                                item.day,
                                item.tgl,
                                item.size,
                                item.qty_mold,
                            ]).draw();

                        })


                    }

                }),

            )


        });

    });
</script>