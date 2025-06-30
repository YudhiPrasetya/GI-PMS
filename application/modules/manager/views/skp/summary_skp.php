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
                        <li class="breadcrumb-item active" aria-current="page">Report SKP</li>
                    </ol>
                </nav>
            </div>
        </div>
        <h6 class="mb-0 text-uppercase">ALL SKP</h6>
        <hr />
        <div class="row">
            <div class="col-12 ">
                <div class="card rounded-4 w-100">
                    <div class="card-body">
                        <!-- <div class="mx-3 my-3"> -->
                        <table id="wipTable" class="table table-bordered table-striped" style="width: 100%">
                            <thead>
                                <tr>
                                    <td>ORC</td>
                                    <td>Style</td>
                                    <td>Color</td>
                                    <td>SKP In</td>
                                    <td>SKP Out</td>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                            <tfoot>

                            </tfoot>
                        </table>
                        <!-- </div> -->
                    </div>
                </div>
            </div>

        </div><!--end row-->

    </div>
</div>
<!--end page wrapper -->

<script>
    $(document).ready(function() {
        var table = $('#wipTable').DataTable({
            dom: 'Bfrtip',
            buttons: [
                'copy', 'csv', 'excel', 'pdf', 'print'
            ],


            ajax: {
                url: "<?= site_url('manager/all_skp'); ?>",
                type: "POST",

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
                    'data': 'style'
                },
                {
                    'data': 'color'
                },
                {
                    'data': 'qty_skp_in',
                },
                {
                    'data': 'qty_skp_out',
                },


            ],

        });
    });
</script>