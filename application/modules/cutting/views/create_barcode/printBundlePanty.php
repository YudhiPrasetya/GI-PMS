<style>
    .select-info {
        margin-left: 10px;
    }
</style>

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
                        <li class="breadcrumb-item active" aria-current="page">Print Panty Bundle</li>
                    </ol>
                </nav>
            </div>
        </div>
        <h6 class="mb-0 text-uppercase">Print Panty Bundle</h6>
        <hr />
        <div class="row">
            <div class="col-12 ">
                <div class="card rounded-4 w-100">
                    <div class="card-body">

                        <div class="input-group mb-3">
                            <input type="text" id="orc" class="form-control" placeholder="Input work order" aria-label="Input work order" aria-describedby="button-addon2">
                            <button class="btn btn-gradient-warning" type="button" id="btnSearch">Search</button>
                        </div>
                        </p>
                        <div>
                            <button type="button" class="btn btn-gradient-info" id="btnSelectAll">Select All</button>
                            <button type="button" class="btn btn-gradient-primary" id="btnDeselectAll">Deselect All</button>
                        </div>
                        </p>
                        <!-- <div class="table-responsive"> -->
                        <table id="orcMoldTable" class="table table-striped table-bordered table-sm nowrap" style="width:100%">
                            <thead>
                                <th class="text-center">ORC</th>
                                <th class="text-center">Size</th>
                                <th class="text-center">No. Bundle</th>
                                <th class="text-center">Qty</th>

                            </thead>

                        </table>
                        <!-- </div> -->


                        <div class="row mt-3">
                            <div class="col-md-6">

                            </div>
                            <div class="col-md-6 text-end">
                                <button type="button" id="btnPrintSelected" class="btn btn-gradient-warning"><i class="lni lni-printer"></i> Print Selected</button>
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
    $(document).ready(function() {
        var table;

        table = $('#orcMoldTable').DataTable();

        $('#btnSelectAll').prop('disabled', true);
        $('#btnDeselectAll').prop('disabled', true);
        $('#btnPrintSelected').prop('disabled', true);

        $('#btnSearch').click(function() {
            let strOrc = $('#orc').val();
            if (strOrc == "") {
                Swal.fire({
                    icon: 'warning',
                    title: 'Please input an ORC first',
                    showConfirmButton: false,
                    timer: 1750
                });
            } else {
                showDetail(strOrc);
            }
        });

        $('#orcTable tbody').on('click', 'tr', function() {
            $(this).toggleClass('selected');
        });

        function showDetail(o) {
            // $('#orcTable').show();

            table = $('#orcMoldTable').DataTable({
                processing: true,
                order: [],
                destroy: true,
                select: {
                    "style": "multi"
                },
                ajax: {
                    url: "<?php echo site_url('cutting/ajax_get_bundles'); ?>/" + o,
                    type: "POST",
                    dataType: "json",
                    dataSrc: ""
                },
                columns: [{
                        "data": "orc",
                        "className": "text-center px-2"
                    },
                    {
                        "data": "size",
                        "className": "text-center px-2"
                    },
                    {
                        "data": "no_bundle",
                        "className": "text-center px-2"
                    },
                    {
                        "data": "qty_pcs",
                        "className": "text-center px-2"
                    },
                ],
            });
            $('#btnSelectAll').prop('disabled', false);
        }

        table.on('select deselect', function() {
            let selectedRows = table.rows({
                selected: true
            }).count();

            if (selectedRows > 0) {
                $("#btnPrintSelected").prop('disabled', false);
            } else {
                $("#btnPrintSelected").prop('disabled', true);
            }
        });

        $('#btnPrintSelected').click(function() {
            var selRows = table.rows({
                selected: true
            }).data();

            console.log('selRows: ', selRows);
            // localStorage.clear();
            localStorage.removeItem('selectedPantyRows');

            localStorage.setItem("selectedPantyRows", JSON.stringify(selRows));


            window.open("<?php echo site_url('cutting/show_print_bundle_panty'); ?>");
        });

        $('#btnSelectAll').click(function() {
            table.rows({
                search: 'applied'
            }).select();
            $('#btnDeselectAll').prop('disabled', false);
        });

        $('#btnDeselectAll').click(function() {
            table.rows({
                search: 'applied'
            }).deselect();

        });
    });
</script>