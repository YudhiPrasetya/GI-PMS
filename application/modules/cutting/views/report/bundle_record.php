<!--start page wrapper -->
<div class="page-wrapper">
    <div class="page-content">
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Cutting</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Bundle Record</li>
                    </ol>
                </nav>
            </div>
        </div>
        <h6 class="mb-0 text-uppercase">Bundle Record Report</h6>
        <hr />
        <div class="row">
            <div class="col-12 ">
                <div class="card rounded-4 w-100">
                    <div class="card-body">
                        <div class="mx-3 my-3">

                            <!-- <div class="p-4 border rounded"> -->
                            <form class="row g-3 needs-validation" novalidate>
                                <div class="col-md-4">
                                    <label for="validationCustom01" class="form-label">ORC</label>
                                    <select class="single_select" id="orc"></select>
                                </div>
                                <div class="col-md-4">
                                    <label for="buyer" class="form-label">BUYER</label>
                                    <input type="text" class="form-control" id="buyer" required disabled>
                                </div>
                                <div class="col-md-4">
                                    <label for="qty" class="form-label">QTY ORDER</label>
                                    <input type="text" class="form-control" id="qty" required disabled>
                                </div>
                                <div class="col-md-4">
                                    <label for="style" class="form-label">STYLE</label>
                                    <input type="text" class="form-control" id="style" required disabled>
                                </div>
                                <!-- <div class="col-md-4">
                                    <label for="comm" class="form-label">COMM</label>
                                    <input type="text" class="form-control" id="comm" required disabled>
                                </div> -->
                                <div class="col-md-4">
                                    <label for="color" class="form-label">COLOR</label>
                                    <input type="text" class="form-control" id="color" required disabled>
                                </div>
                                <div class="col-md-4">
                                    <label for="so" class="form-label">PO CUSTOMER</label>
                                    <input type="text" class="form-control" id="so" required disabled>
                                </div>
                            </form>
                            </p>
                            <!-- <div class="table-responsive"> -->
                            <table id="showBundleTable" class="table table-striped table-bordered table-sm nowrap" style="width:100% ">
                                <thead>
                                    <th class="text-center">Size</th>
                                    <th class="text-center">No Bundle</th>
                                    <th class="text-center">Barcode</th>
                                    <th class="text-center">Scan Trimstore</th>
                                </thead>
                            </table>
                            <!-- </div> -->
                            <!-- </div> -->

                        </div>

                    </div>
                </div>
            </div>
        </div>

        <h4 class="mt-3">Bundle Records By Size</h4>
        <hr />

        <div class="row">
            <div class="col-12">
                <div class="card rounded-4 w-100">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12 d-flex justify-content-center gap-3">
                                <div class="d-flex gap-1">
                                    <span class="badge bg-light" style="width: 20px; height: 20px; display: inline-block !important; border: 1px solid black"></span>
                                    <p>No Progress</p>
                                </div>

                                <div class="d-flex gap-1">
                                    <span class="badge bg-success" style="width: 20px; height: 20px; display: inline-block !important"></span>
                                    <p>Finish</p>
                                </div>

                                <div class="d-flex gap-1">
                                    <span class="badge bg-danger" style="width: 20px; height: 20px; display: inline-block !important"></span>
                                    <p>WIP</p>
                                </div>
                            </div>
                        </div>
                        <div class="row" id="bundleRecordView">
                            <div class="col-12">
                                <p class="text-center">No Data Available</p>
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
    $(document).ready(function() {
        var table = $('#showBundleTable').DataTable()

        const loadOrc = () => {
            $('#orc').empty();
            $.ajax({
                url: " <?= site_url('cutting/get_all_orc'); ?>",
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

        let style, color, po_numb, buyer, comm, qty_order, prepare;

        $('#orc').change(function() {
            var orc = $(this).val();
            orcs = {
                'orc': orc
            };
            $.ajax({
                url: '<?php echo site_url("cutting/getByOrc"); ?>/' + orc,
                type: 'GET',
                dataType: 'json'
            }).done(function(dt) {
                style = dt[0].style_code;
                color = dt[0].color;
                po_numb = dt[0].po_customer;
                buyer = dt[0].customer_name;
                qty_order = dt[0].quantity_ordered;
                // comm = dt[0].comm;
                prepare = dt[0].prepare_on;

                $('#style').val(dt[0].style_code);
                $('#color').val(dt[0].color);
                $('#so').val(dt[0].po_customer);
                $('#buyer').val(dt[0].customer_name);
                $('#qty').val(dt[0].quantity_ordered);
                // $('#comm').val(dt[0].comm);

            });
            table = $('#showBundleTable').DataTable({
                // autoWidth: false,
                processing: true,
                destroy: true,
                info: true,
                searching: true,
                // stateSave: true,
                paging: true,
                fixedHeader: true,
                // dom: 'Blfrtip',
                buttons: [{
                    extend: 'excel',
                    title: 'Data Bundle ' + orcs
                }, ],
                ajax: {
                    url: '<?= site_url('cutting/get_datas_report'); ?>',
                    type: 'POST',
                    data: {
                        'data': orcs
                    },
                },
                language: {
                    processing: '<i class="fa fa-spinner fa-spin fa-3x fa-fw"></i><br><div><p>Silahkan Menunggu...</p></div> ',
                    emptyTable: 'Tidak ada data',
                    lengthMenu: '_MENU_',
                },
                columns: [{
                        'data': 'size',
                        'className': "text-center px-2"
                    },
                    {
                        'data': 'no_bundle',
                        'className': "text-center px-2"
                    },
                    {
                        'data': 'kode_barcode',
                        'className': "text-center px-2"
                    },
                    {
                        'className': 'text-center px-2',
                        render: function(data, type, row) {
                            if (row['barcode_trimstore'] == null) {
                                return "<i class='bx bx-time-five' style='color: #ef4444'></i>"

                            } else if (row['barcode_trimstore'] != null) {
                                return row['barcode_trimstore']
                            } else {
                                return "<span></span>"
                            }
                        }
                    },
                ],
                initComplete: function() {
                    $("#bundleRecordView").empty();

                    let bsColumnDefault = 12;
                    let maxDividerOfColumn = 4;
                    let maxDividerOfColumnLeft = 0;

                    let orcDetails = table.rows().data().toArray();
                    let groupOfSize = [];
                    let groupOfSizeWithTotal = [];
                    let column = '';
                    let row = '';
                    let multiplier = 0;

                    orcDetails.forEach(function(item, index) {
                        let regexedSize = item.size.replace(/[()]/g, '');
                        if (!groupOfSize.includes(regexedSize)) {
                            groupOfSize.push(regexedSize);
                            groupOfSizeWithTotal.push({
                                size: regexedSize,
                                total: parseInt(item.qty_input_cutting)
                            });
                        } else {
                            groupOfSizeWithTotal.forEach(function(item2, index2) {
                                if (item2.size == regexedSize) {
                                    groupOfSizeWithTotal[index2].total += parseInt(item.qty_input_cutting);
                                }
                            });
                        }
                    });

                    let lengthOfGroupOfSize = groupOfSize.length;
                    let bsColumn = bsColumnDefault % lengthOfGroupOfSize;
                    let bsColumnDivision = bsColumnDefault / lengthOfGroupOfSize;
                    let sortedgroupOfSize = groupOfSize.slice().sort((a, b) => a - b);

                    if (bsColumn == 0) {
                        for (let i = 0; i < sortedgroupOfSize.length; i++) {
                            if ((bsColumnDefault / sortedgroupOfSize.length) > 3) {
                                column += `
                                    <div class="mt-3 col-12 col-lg-${bsColumnDefault / sortedgroupOfSize.length}">
                                        <table class="table table-bordered" style="width: 100%" id="tableHead${sortedgroupOfSize[i]}">
                                            <tr class="bg-info" style="border-radius: 10px;">
                                            <th>Size</th>
                                            <th colspan="3" class="text-center">
                                                ${sortedgroupOfSize[i]}
                                            </th>
                                            </tr>
                                            <tr>
                                            <th>Qty.</th>
                                            <th colspan="3" class="text-center" id="total${sortedgroupOfSize[i]}">0</th>
                                            </tr>
                                        </table>
                                        <table class="table table-hover nowrap" style="width: 100%" id="table${sortedgroupOfSize[i]}">
                                        <thead class="text-center">
                                            <tr>
                                                <th>No.</th>
                                                <th>In Cutting</th>
                                                <th>In Sewing</th>
                                                <th>Date</th>
                                            </tr>
                                        </thead>
                                        <tbody id="columnSize${sortedgroupOfSize[i]}">
                                        </tbody>
                                        </table>
                                    </div>
                                `;
                            } else {
                                column += `
                                    <div class="mt-3 col-12 col-lg-3">
                                        <table class="table table-bordered" style="width: 100%" id="tableHead${sortedgroupOfSize[i]}">
                                            <tr class="bg-info" style="border-radius: 10px;">
                                            <th>Size</th>
                                            <th colspan="3" class="text-center">
                                                ${sortedgroupOfSize[i]}
                                            </th>
                                            </tr>
                                            <tr>
                                            <th>Qty.</th>
                                            <th colspan="3" class="text-center" id="total${sortedgroupOfSize[i]}">0</th>
                                            </tr>
                                        </table>
                                        <table class="table table-hover nowrap" style="width: 100%" id="table${sortedgroupOfSize[i]}">
                                        <thead class="text-center">
                                            <tr>
                                                <th>No.</th>
                                                <th>In Cutting</th>
                                                <th>In Sewing</th>
                                                <th>Date</th>
                                            </tr>
                                        </thead>
                                        <tbody id="columnSize${sortedgroupOfSize[i]}">
                                        </tbody>
                                        </table>
                                    </div>
                                `;
                            }

                        }
                    } else {
                        while (maxDividerOfColumn < lengthOfGroupOfSize) {
                            maxDividerOfColumn += 4;
                            maxDividerOfColumnLeft = maxDividerOfColumn - 4;
                        }

                        for (let i = 0; i < sortedgroupOfSize.length; i++) {
                            if (i >= maxDividerOfColumnLeft) {
                                column += `
                                    <div class="mt-3 col-12 col-lg-${(bsColumnDefault / (sortedgroupOfSize.length - maxDividerOfColumnLeft))}">
                                    <table class="table table-bordered" style="width: 100%" id="tableHead${sortedgroupOfSize[i]}">
                                        <tr class="bg-info" style="border-radius: 10px;">
                                        <th>Size</th>
                                        <th colspan="3" class="text-center">
                                            ${sortedgroupOfSize[i]}
                                        </th>
                                        </tr>
                                        <tr>
                                        <th>Qty.</th>
                                        <th colspan="3" class="text-center" id="total${sortedgroupOfSize[i]}">0</th>
                                        </tr>
                                    </table>

                                    <table class="table table-hover nowrap" style="width: 100%" id="table${sortedgroupOfSize[i]}">
                                    <thead class="text-center">
                                        <tr>
                                            <th>No.</th>
                                            <th>In Cutting</th>
                                            <th>In Sewing</th>
                                            <th>Date</th>
                                        </tr>
                                    </thead>
                                    <tbody id="columnSize${sortedgroupOfSize[i]}">
                                    </tbody>
                                    </table>
                                    </div>
                                `;
                            } else {
                                column += `
                                    <div class="mt-3 col-12 col-lg-3">
                                    <table class="table table-bordered" style="width: 100%" id="tableHead${sortedgroupOfSize[i]}">
                                        <tr class="bg-info" style="border-radius: 10px;">
                                        <th>Size</th>
                                        <th colspan="3" class="text-center">
                                            ${sortedgroupOfSize[i]}
                                        </th>
                                        </tr>
                                        <tr>
                                        <th>Qty.</th>
                                        <th colspan="3" class="text-center" id="total${sortedgroupOfSize[i]}">0</th>
                                        </tr>
                                    </table>

                                    <table class="table table-hover nowrap" style="width: 100%" id="table${sortedgroupOfSize[i]}">
                                    <thead class="text-center">
                                        <tr>
                                            <th>No.</th>
                                            <th>In Cutting</th>
                                            <th>In Sewing</th>
                                            <th>Date</th>
                                        </tr>
                                    </thead>
                                    <tbody id="columnSize${sortedgroupOfSize[i]}">
                                    </tbody>
                                    </table>
                                    </div>
                                `;
                            }
                        }
                    }

                    $("#bundleRecordView").append(column);

                    orcDetails.forEach(function(item, index) {
                        let regexedSize = item.size.replace(/[()]/g, '');
                        row = `
                            <tr style="cursor: pointer; ${(item.qty_input_cutting == 0 ? '' : (item.qty_input_cutting < item.qty_input_sewing ? 'background-color: #d9534f' : 'background-color: #5cb85c'))}">
                                <td>
                                    <div class="d-flex">
                                    <p class="noBundle" style="margin-top: 5px !important;">${item.no_bundle}</p>
                                    <p class="kodeBarcode" style="display: none;">${item.kode_barcode}</p>
                                    <p class="sizeBundle" style="display: none;">${item.size}</p>
                                    &nbsp;
                                    <button class="btn btn-sm radius-30 btn-outline-primary barcodeBtn" title="Show barcode bundle" style="width: 30px !important; height: 30px !important;">
                                        <i class="bx bx-search-alt-2" style="margin-right: 0px !important; font-size: 1rem; !important"></i>
                                    </button>
                                    </div>
                                </td>
                                <td>${item.qty_input_cutting}</td>
                                <td>${item.qty_input_sewing}</td>
                                <td>${item.date_created}</td>
                            </tr>
                        `;

                        $("#columnSize" + regexedSize).append(row);
                    });

                    sortedgroupOfSize.forEach(function(item, index) {
                        $("#table" + item).DataTable({
                            scrollX: true,
                            scrollY: 300,
                            paging: false,
                            info: false,
                            responsive: true
                        });

                        $("#total" + item).html(groupOfSizeWithTotal[index].total);
                    });

                    $(".dataTables_filter").each(function(index, item) {
                        item.parentElement.classList = "col-12 col-lg-12";
                    });

                    $(".barcodeBtn").on("click", function() {
                        let arrSelectedRows = [];
                        let orc = $("#orc").val();

                        let noBundle = $(this).parent().find(".noBundle").text();
                        let kodeBarcode = $(this).parent().find(".kodeBarcode").text();
                        let sizeBundle = $(this).parent().find(".sizeBundle").text();

                        arrSelectedRows.push({
                            "orc": orc,
                            "style": style,
                            "color": color,
                            "buyer": buyer,
                            "comm": comm,
                            "so": po_numb,
                            "qty": qty_order,
                            // "boxes": item.boxes,
                            "prepare_on": prepare,
                            "size": sizeBundle,
                            "no_bundle": noBundle,
                            "kode_barcode": kodeBarcode,
                            "cp": "",
                            "bw": "",
                            "cu": "",
                            "as": "as_"
                        });

                        localStorage.removeItem('selectedRows');
                        localStorage.setItem("selectedRows", JSON.stringify(arrSelectedRows));

                        window.open("<?php echo site_url('cutting/show_print_bundle'); ?>");
                    });
                }
                // lengthMenu: [
                //     [50, 100, -1],
                //     [50, 100, 'All'],
                // ],
            });
        });
    })
</script>