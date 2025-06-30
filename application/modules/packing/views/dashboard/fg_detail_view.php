<!--start page wrapper -->
<div class="page-wrapper">
    <div class="page-content">
        <div class="row">
            <div class="col-12 ">
                <div class="card rounded-4 w-100">
                    <div class="card-body">

                        <div class="ms-auto">
                            <div class="row">
                                <div class="col-md-6">
                                    <h6 class="mb-0 text-uppercase">Finish Good Show ALL</h6>
                                </div>

                            </div>
                        </div>
                        <hr />
                        <div class="card">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="tableFGDetailAll" class="table table-striped table-bordered" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Lokasi</th>
                                                <th>TGL IN</th>
                                                <th>TGL OUT</th>
                                                <th>PO</th>
                                                <th>ORC</th>
                                                <th>Style</th>
                                                <th>Color</th>
                                                <th>Size</th>
                                                <th>No. Karton</th>
                                                <th>Pcs</th>
                                                <th>Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            <?php foreach ($data as $d) : ?>
                                                <tr>
                                                    <td><?= $d->id_transfer_area; ?></td>
                                                    <td><?= $d->lokasi; ?></td>
                                                    <td><?= date('d-m-Y', strtotime($d->tgl_in)); ?></td>
                                                    <td><?= ($d->tgl_out == null ? '' : date('d-m-Y', strtotime($d->tgl_out))); ?></td>
                                                    <td><?= $d->po; ?></td>
                                                    <td><?= $d->orc; ?></td>
                                                    <td><?= $d->style; ?></td>
                                                    <td><?= $d->color; ?></td>
                                                    <td><?= $d->size; ?></td>
                                                    <td><?= $d->carton_no; ?></td>
                                                    <td><?= $d->qty_box; ?></td>
                                                    <td><?= $d->status; ?></td>
                                                </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>ID</th>
                                                <th>Lokasi</th>
                                                <th>TGL IN</th>
                                                <th>TGL OUT</th>
                                                <th>PO</th>
                                                <th>ORC</th>
                                                <th>Style</th>
                                                <th>Color</th>
                                                <th>Size</th>
                                                <th>Jml Karton</th>
                                                <th>Jml Qty</th>
                                                <th>Status</th>
                                            </tr>
                                        </tfoot>

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
    $(document).ready(function() {
        var tableFGDetailAll = $('#tableFGDetailAll').DataTable({
            dom: 'lBfrtip',
            lengthMenu: [
                [5, 10, 25, 50, 75, 100, -1],
                [5, 10, 25, 50, 75, 100, "all"]
            ],
            buttons: [
                'excel', 'print',
                {
                    text: 'Kembali',
                    action: function() {
                        history.back();
                    }
                }
            ],
            columnDefs: [{
                targets: [0],
                visible: false
            }],
            select: {
                style: 'single'
            }
        });


    })
</script>