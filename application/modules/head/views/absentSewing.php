<!--start page wrapper -->
<div class="page-wrapper">
    <div class="page-content">
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">HEAD</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Report Absent Sewing</li>
                    </ol>
                </nav>
            </div>
        </div>
        <h6 class="mb-0 text-uppercase">Absent Line</h6>
        <hr />
        <div class="row">
            <div class="col-12 ">
                <div class="card rounded-4 w-100">
                    <div class="card-body">
                        <div class="mx-3 my-3">

                            <table id="absentLine" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <td>NIK</td>
                                        <td>Line</td>
                                        <td>Name</td>
                                        <td>Position</td>
                                        <td>Opration</td>
                                        <td>Reason</td>
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

    </div><!--end row-->

</div>
</div>
<!--end page wrapper -->

<script>
    $(document).ready(function() {

        var absentTable = $('#absentLine').DataTable({
            processing: true,
            destroy: true,
            info: true,
            scrollX: true,
            searching: true,
            paging: true,
            fixedHeader: true,

            ajax: {
                url: '<?= site_url('head/ajax_get_absent'); ?>',
                type: 'POST',

            },
            language: {
                processing: '<i class="fa fa-spinner fa-spin fa-3x fa-fw"></i><br><div><p>Silahkan Menunggu...</p></div> ',
                emptyTable: 'Tidak ada data',
                lengthMenu: '_MENU_',
            },
            columns: [{
                    'data': 'NIK'
                },
                {
                    'data': 'ln'
                },
                {
                    'data': 'name'
                },
                {
                    'data': 'position'
                },
                {
                    'data': 'op_name',
                },
                {
                    'data': 'alasan'
                },


            ],
            lengthMenu: [
                [10, 25, 50, 100, -1],
                [10, 25, 50, 100, 'All'],
            ],
        });



    })
</script>