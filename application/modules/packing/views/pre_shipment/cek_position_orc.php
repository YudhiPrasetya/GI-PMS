<!--start page wrapper -->
<div class="page-wrapper">
    <div class="page-content">
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Packing</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Find ORC Position</li>
                    </ol>
                </nav>
            </div>
        </div>
        <h6 class="mb-0 text-uppercase">Find ORC Position</h6>
        <hr />
        <div class="row">
            <div class="col-12 ">
                <div class="card rounded-4 w-100">
                    <div class="card-body">
                        <div class="mx-3 my-3">

                            <!-- <div class="table-responsive"> -->
                            <table id="tableCekPosisiKarton" class="table table-striped table-bordered" style="width:100%">
                                <thead>
                                    <th>ORC</th>
                                    <th>PO</th>
                                    <th>Style</th>
                                    <th>Color</th>
                                    <th>Lokasi</th>
                                </thead>
                            </table>
                            <!-- </div> -->

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div><!--end row-->
</div>
<!--end page wrapper -->

<script>
    $(document).ready(function() {
        var table;
        var kode;
        var mode;
        var selectedRows = [];

        table = $('#tableCekPosisiKarton').DataTable({
            destroy: true,
            processing: true,
            order: [],
            destroy: true,

            ajax: {
                type: "GET",
                url: "<?php echo site_url('packing/get_cek_orc'); ?>"
            },
            columns: [{
                    "data": "orc",
                    'className': 'text-center px-2'
                },
                {
                    "data": "po",
                    'className': 'text-center px-2'
                },
                {
                    "data": "style",
                    'className': 'text-center px-2'
                },
                {
                    "data": "color",
                    'className': 'text-center px-2'
                },
                {
                    "data": "lokasi",
                    'className': 'text-center px-2'
                },
            ],
            // "lengthMenu": [
            //     [5, 10, 15, 20, 25, 75, 100],
            //     [5, 10, 15, 20, 25, 75, 100]
            // ],

            // columnDefs: [{
            //         "targets": [0],
            //         "visible": false
            //     },

            // ],
        });



    })
</script>