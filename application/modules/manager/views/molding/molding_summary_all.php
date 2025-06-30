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
                                    <select class="single_select" id="orc"></select>
                                </div>
                            </div>
                            <table id="tableOrc" class="table table-bordered table-striped" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th style="width: 15%;">ORC</th>
                                        <th>Style</th>
                                        <th>Color</th>
                                        <th>Buyer</th>
                                        <th>ETD</th>
                                        <th>Qty Order</th>
                                        <th>Outer in</th>
                                        <th>Mid in</th>
                                        <th>Linning in</th>
                                        <th>Outer out</th>
                                        <th>Mid out</th>
                                        <th>Linning out</th>
                                        <th>Balance IN</th>
                                        <th>Balance Out</th>
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
    $('.single_select').select2({
        theme: 'bootstrap-5',
        width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style',

    });
</script>
<script>
    $(document).ready(function() {
        const sweet_loader = '<div class="sweet_loader"><svg viewBox="0 0 140 140" width="140" height="140"><g class="outline"><path d="m 70 28 a 1 1 0 0 0 0 84 a 1 1 0 0 0 0 -84" stroke="rgba(0,0,0,0.1)" stroke-width="4" fill="none" stroke-linecap="round" stroke-linejoin="round"></path></g><g class="circle"><path d="m 70 28 a 1 1 0 0 0 0 84 a 1 1 0 0 0 0 -84" stroke="#71BBFF" stroke-width="4" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-dashoffset="200" stroke-dasharray="300"></path></g></svg></div>';

        const loadOrc = () => {
            $('#orc').empty();
            $.ajax({
                url: " <?= site_url('manager/getORCCompareBarcode'); ?>",
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


        // Main Table
        let tableOrc = $('#tableOrc').DataTable({
            destroy: true
        });

        let orc;
        const loadTableOrc = () => {
            orc = $('#orc').val();

            tableOrc = $('#tableOrc').DataTable({
                // lengthChange: false,
                dom: 'Blfrtip',
                buttons: ['excel'],
                scrollX: true,
                destroy: true,
                ajax: {
                    url: '<?= site_url('manager/getAllSummary'); ?>',
                    type: 'GET',
                    data: {
                        'orc': orc
                    }
                },
                columns: [{
                        'data': 'orc',
                        'className': 'text-center px-2'
                    },
                    {
                        'data': 'style',
                        'className': 'text-center px-2'
                    },
                    {
                        'data': 'color',
                        'className': 'text-center px-2'
                    },
                    {
                        'data': 'buyer',
                        'className': 'text-center px-2'
                    },
                    {
                        'data': 'etd',
                        'className': 'text-center px-2'
                    },
                    {
                        'data': 'qty',
                        'className': 'text-center px-2'
                    },
                    {
                        'data': 'qtyin_outer',
                        'className': 'text-center px-2'
                    },
                    {
                        'data': 'qtyin_mid',
                        'className': 'text-center px-2'
                    },
                    {
                        'data': 'qtyin_linning',
                        'className': 'text-center px-2'
                    },
                    {
                        'data': 'out_outermold',
                        'className': 'text-center px-2'
                    },
                    {
                        'data': 'out_midmold',
                        'className': 'text-center px-2'
                    },
                    {
                        'data': 'out_linningmold',
                        'className': 'text-center px-2'
                    },
                    {
                        'data': 'balance_in',
                        'className': 'text-center px-2'
                    },
                    {
                        'data': 'balance_out',
                        'className': 'text-center px-2'
                    },

                ]
            });
        }

        // Load First
        loadTableOrc();


        // Select orc
        $('#orc').change(function() {
            orc = $(this).val();

            if (orc != "") {
                loadTableOrc();
            } else {
                tableOrc.clear().draw();
            }
        });
    })
</script>