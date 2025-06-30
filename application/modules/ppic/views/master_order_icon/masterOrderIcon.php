<style>
    .select-info {
        margin-left: 10px;
    }

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
            <div class="breadcrumb-title pe-3">ORDER</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Master Order Icon</li>
                    </ol>
                </nav>
            </div>

        </div>
        <!--end breadcrumb-->
        <h6 class="mb-0 text-uppercase">Master Order Icon</h6>
        <hr />
        <div class="card">
            <div class="card-body">
                <div class="card-body">
                    <!-- <div class="mx-3 my-3"> -->
                    <div class="row">
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <select class="single_select" id="orc"></select>
                                </div>

                            </div>
                        </div>
                    </div>
                    <table id="tableToSewing" class="table table-bordered table-striped nowrap">
                        <thead>
                            <tr>
                                <th>Orc</th>
                                <th>Orc Date</th>
                                <th>Shipment Date</th>
                                <th>Customer Code</th>
                                <th>Customer Name</th>
                                <th>PO Customer</th>
                                <th>Consigne Code</th>
                                <th>Consigne Name</th>
                                <th>Site Code</th>
                                <th>Site Name</th>
                                <th>Orc Type</th>
                                <th>Currencies Code</th>
                                <th>Note</th>
                                <th>Style Code</th>
                                <th>Style Name</th>
                                <th>Color</th>
                                <th>Qty Order</th>
                                <th>UOM Code</th>
                                <th>FOB_price</th>
                                <th>CMT Price</th>
                                <th>Note2</th>
                                <th>Size</th>
                                <th>Quantity</th>
                                <th>Sales Order id</th>
                                <th>Patner Id</th>
                                <th>Receiver Patner Id</th>
                                <th>Site Patner Id</th>
                                <th>ORC Type Id</th>
                                <th>Currencies Id</th>
                                <th>Item Base Id</th>
                                <th>Item Id</th>
                                <th>Item Size Id</th>
                                <th>Item Cup Id</th>
                            </tr>
                        </thead>
                    </table>
                </div>
                <div class="card-footer">
                    <button type="button" class="btn btn-primary" id="btnSave"><i class="fadeIn animated bx bx-upload"></i> Create Order</button>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $('.single_select').select2({
        theme: 'bootstrap-5',
        width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style',
        // placeholder: $(this).data('placeholder'),
        // allowClear: Boolean($(this).data('allow-clear')),
        // dropdownParent: $('#modalAddbundle')
    });
</script>
<script>
    const sweet_loader = '<div class="sweet_loader"><svg viewBox="0 0 140 140" width="140" height="140"><g class="outline"><path d="m 70 28 a 1 1 0 0 0 0 84 a 1 1 0 0 0 0 -84" stroke="rgba(0,0,0,0.1)" stroke-width="4" fill="none" stroke-linecap="round" stroke-linejoin="round"></path></g><g class="circle"><path d="m 70 28 a 1 1 0 0 0 0 84 a 1 1 0 0 0 0 -84" stroke="#71BBFF" stroke-width="4" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-dashoffset="200" stroke-dasharray="300"></path></g></svg></div>';
    let array = [];
    var tableToSewing;
    $(document).ready(function() {
        const loadOrc = () => {
            $('#orc').empty();
            $.ajax({
                url: " <?= site_url('ppic/get_orc_icon'); ?>",
                type: 'GET',
                dataType: 'JSON',
                beforeSend: function() {
                    $("#orc").prepend($('<option></option>').html('Loading...'));
                },
            }).done(function(data) {
                // console.log('yuhu', data.data[0].orc);
                $('#orc').empty();
                $('#orc').append($('<option>', {
                    value: "",
                    text: "- Select ORC -"
                }));
                $.each(data.data, function(i, item) {
                    // console.log('slebew', item);
                    array.push(item);
                    $('#orc').append($('<option>', {
                        value: item.orc,
                        text: item.orc
                    }));
                });
            });
        }

        loadOrc();

        $('#orc').change(function() {
            var orc = $(this).val();
            tableToSewing = $('#tableToSewing').DataTable({
                processing: true,
                destroy: true,
                info: true,
                scrollX: true,
                searching: true,
                paging: true,
                fixedHeader: true,

                ajax: {
                    url: '<?= site_url('ppic/getByOrcIcon'); ?>',
                    type: 'GET',
                    data: {
                        'orc': orc
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        alert('An error occurred: ' + textStatus);
                    }
                },
                language: {
                    processing: '<i class="fa fa-spinner fa-spin fa-3x fa-fw"></i><br><div><p>Silahkan Menunggu...</p></div>',
                    emptyTable: 'Tidak ada data',
                    lengthMenu: '_MENU_',
                },
                columns: [{
                        'data': 'orc'
                    },
                    {
                        'data': 'orc_date'
                    },
                    {
                        'data': 'shippment_date'
                    },
                    {
                        'data': 'customer_code'
                    },
                    {
                        'data': 'customer_name'
                    },
                    {
                        'data': 'po_customer'
                    },
                    {
                        'data': 'consignee_code'
                    },
                    {
                        'data': 'consignee_name'
                    },
                    {
                        'data': 'site_code'
                    },
                    {
                        'data': 'site_name'
                    },
                    {
                        'data': 'orc_type'
                    },
                    {
                        'data': 'currencies_code'
                    },
                    {
                        'data': 'note'
                    },
                    {
                        'data': 'style_code'
                    },
                    {
                        'data': 'style_name'
                    },
                    {
                        'data': 'color'
                    },
                    {
                        'data': 'quantity_ordered'
                    },
                    {
                        'data': 'uom_code'
                    },
                    {
                        'data': 'fob_price'
                    },
                    {
                        'data': 'cmt_price'
                    },
                    {
                        'data': 'note2'
                    },
                    {
                        'data': 'size'
                    },
                    {
                        'data': 'quantity'
                    },
                    {
                        'data': 'sales_order_id'
                    },
                    {
                        'data': 'partner_id'
                    },
                    {
                        'data': 'receiver_partner_id'
                    },
                    {
                        'data': 'site_partner_id'
                    },
                    {
                        'data': 'orc_type_id'
                    },
                    {
                        'data': 'currencies_id'
                    },
                    {
                        'data': 'item_base_id'
                    },
                    {
                        'data': 'item_id'
                    },
                    {
                        'data': 'item_size_id'
                    },
                    {
                        'data': 'item_cup_id'
                    },

                ],
                lengthMenu: [
                    [10, 25, 50, 100, -1],
                    [10, 25, 50, 100, 'All'],
                ],
            });
        });


        $('#btnSave').click(function() {

            let orc = tableToSewing.column(0).data().toArray()[0];
            let orc_date = tableToSewing.column(1).data().toArray()[0];
            let shippment_date = tableToSewing.column(2).data().toArray()[0];
            let customer_code = tableToSewing.column(3).data().toArray()[0];
            let customer_name = tableToSewing.column(4).data().toArray()[0];
            let po_customer = tableToSewing.column(5).data().toArray()[0];
            let consignee_code = tableToSewing.column(6).data().toArray()[0];
            let consignee_name = tableToSewing.column(7).data().toArray()[0];
            let site_code = tableToSewing.column(8).data().toArray()[0];
            let site_name = tableToSewing.column(9).data().toArray()[0];
            let orc_type = tableToSewing.column(10).data().toArray()[0];
            let currencies_code = tableToSewing.column(11).data().toArray()[0];
            let note = tableToSewing.column(12).data().toArray()[0];
            let style_code = tableToSewing.column(13).data().toArray()[0];
            let style_name = tableToSewing.column(14).data().toArray()[0];
            let color = tableToSewing.column(15).data().toArray()[0];
            let quantity_ordered = tableToSewing.column(16).data().toArray()[0];
            let uom_code = tableToSewing.column(17).data().toArray()[0];
            let fob_price = tableToSewing.column(18).data().toArray()[0];
            let cmt_price = tableToSewing.column(19).data().toArray()[0];
            let note2 = tableToSewing.column(20).data().toArray()[0];
            let size = tableToSewing.column(21).data().toArray();
            let quantity = tableToSewing.column(22).data().toArray();
            let sales_order_id = tableToSewing.column(23).data().toArray()[0];
            let patner_id = tableToSewing.column(24).data().toArray()[0];
            let receiver_patner_id = tableToSewing.column(25).data().toArray()[0];
            let site_patner_id = tableToSewing.column(26).data().toArray()[0];
            let orc_type_id = tableToSewing.column(27).data().toArray()[0];
            let currencies_id = tableToSewing.column(28).data().toArray()[0];
            let item_base_id = tableToSewing.column(29).data().toArray()[0];
            let item_id = tableToSewing.column(30).data().toArray()[0];
            let item_size_id = tableToSewing.column(31).data().toArray()[0];
            let item_cup_id = tableToSewing.column(32).data().toArray()[0];


            $.post('<?= site_url("ppic/getCheckMasterIcon/"); ?>' + orc, function(data) {
                if (data > 0) {
                    swal.fire({
                        icon: 'warning',
                        title: 'Warning!',
                        text: 'ORC ini sudah di input',
                        showCancelButton: false,
                        showConfirmButton: true
                    });
                    tableToSewing.clear().draw();
                } else {
                    let table = $('#tableToSewing').DataTable();

                    var rowCount = table.rows().count();

                    if (rowCount === 0) {
                        swal.fire({
                            icon: 'warning',
                            title: 'Warning!',
                            text: 'Table is empty!.',
                            showCancelButton: false,
                            showConfirmButton: true
                        });
                        return;
                    }

                    swal.fire({
                        icon: 'warning',
                        title: 'Warning!',
                        html: "Make sure the data inputted is correct.<br>Are you sure?",
                        showCancelButton: true,
                        confirmButtonText: 'Yes',
                        cancelButtonText: 'No',
                    }).then(function(result) {
                        if (result.value) {
                            $.ajax({
                                type: "POST",
                                url: "<?= site_url('ppic/ajax_save_master_order_icon') ?>",
                                dataType: "JSON",
                                data: {
                                    'orc': orc,
                                    'orc_date': orc_date,
                                    'shippment_date': shippment_date,
                                    'customer_code': customer_code,
                                    'customer_name': customer_name,
                                    'po_customer': po_customer,
                                    'consignee_code': consignee_code,
                                    'consignee_name': consignee_name,
                                    'site_code': site_code,
                                    'site_name': site_name,
                                    'orc_type': orc_type,
                                    'currencies_code': currencies_code,
                                    'note': note,
                                    'style_code': style_code,
                                    'style_name': style_name,
                                    'color': color,
                                    'quantity_ordered': quantity_ordered,
                                    'uom_code': uom_code,
                                    'fob_price': fob_price,
                                    'cmt_price': cmt_price,
                                    'note2': note2,
                                    'size': size,
                                    'quantity': quantity,
                                    'sales_order_id': sales_order_id,
                                    'patner_id': patner_id,
                                    'receiver_patner_id': receiver_patner_id,
                                    'site_patner_id': site_patner_id,
                                    'orc_type_id': orc_type_id,
                                    'currencies_id': currencies_id,
                                    'item_base_id': item_base_id,
                                    'item_id': item_id,
                                    'item_size_id': item_size_id,
                                    'item_cup_id': item_cup_id,
                                },
                                beforeSend: function() {
                                    swal.fire({
                                        html: '<h5>Loading...</h5>',
                                        showConfirmButton: false,
                                        didOpen: function() {
                                            $('.swal2-html-container').prepend(sweet_loader);
                                        }
                                    });
                                },
                                error: function(data) {
                                    tableToSewing.clear().draw();

                                    swal.fire({
                                        icon: 'success',
                                        title: 'Success!',
                                        text: 'Data saved successfully.',
                                        showCancelButton: false,
                                        showConfirmButton: true
                                    // }).then(function() {
                                        // resetAll();
                                    });
                                },

                            });
                        }
                    });
                }
            });

        })
    })
</script>