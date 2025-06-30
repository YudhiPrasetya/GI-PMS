<!--start page wrapper -->
<div class="page-wrapper">
    <div class="page-content">
        <div class="row row-cols-1 row-cols-lg-4">
            <div class="col">
                <a href="input_trimstore">
                    <div class="card rounded-4 bg-gradient-rainbow bubble position-relative overflow-hidden" style="cursor: pointer;">
                        <div class="card-body">
                            <div class="d-flex align-items-center justify-content-between mb-0">
                                <div class="">
                                    <h5 class="mb-0 text-white" id="total_input_cutting">123123 pcs</h5>
                                    <h6 class="mb-0 text-white" id="total_input_cutting">90 box</h6>
                                    <p class="mb-0 text-white">Total Finish Good</p>
                                </div>
                                <div class="fs-1 text-white">
                                    <i class='bx bx-down-arrow-circle'></i>
                                </div>
                            </div>
                            <small class="mb-0 text-white year">2020</small>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col">
                <a href="output_trimstore">
                    <div class="card rounded-4 bg-gradient-burning bubble position-relative overflow-hidden" style="cursor: pointer;">
                        <div class="card-body">
                            <div class="d-flex align-items-center justify-content-between mb-0">
                                <div class="">
                                    <h5 class="mb-0 text-white" id="total_input_cutting">123123 pcs</h5>
                                    <h6 class="mb-0 text-white" id="total_input_cutting">90 box</h6>
                                    <p class="mb-0 text-white">Total Finish Good</p>
                                </div>
                                <div class="fs-1 text-white">
                                    <i class='bx bx-up-arrow-circle'></i>
                                </div>
                            </div>
                            <small class="mb-0 text-white year">2020</small>
                        </div>
                    </div>
                </a>
            </div>
            <!-- <div class="col">
                    <div class="card rounded-4 bg-gradient-moonlit bubble position-relative overflow-hidden" id="btn_total_shipped" style="cursor: pointer;">
                    <div class="card-body">
                        <div class="d-flex align-items-center justify-content-between mb-0">
                        <div class="">
                            <h4 class="mb-0 text-white" id="total_shipped"></h4>
                            <p class="mb-0 text-white">Total Shipped</p>
                        </div>
                        <div class="fs-1 text-white">
                            <i class='bx bxs-ship'></i>
                        </div>
                        </div>
                        <small class="mb-0 text-white year"></small>
                    </div>
                    </div>
                </div> -->
            <!-- <div class="col">
                    <div class="card rounded-4 bg-gradient-cosmic bubble position-relative overflow-hidden">
                    <div class="card-body">
                        <div class="d-flex align-items-center justify-content-between mb-0">
                        <div class="">
                            <h4 class="mb-0 text-white">22%</h4>
                            <p class="mb-0 text-white">Total Growth</p>
                        </div>
                        <div class="fs-1 text-white">
                            <i class='bx bx-line-chart-down'></i>
                        </div>
                        </div>
                        <small class="mb-0 text-white">+2.6% Since Last Week</small>
                    </div>
                    </div>
                </div> -->
        </div><!--end row-->





        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex align-items-center mb-3">
                        <div>
                            <h6 class="mb-0"><i class="lni lni-bar-chart"></i> Recap Finish Good Result</h6>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="card rounded-4 bg-gradient-rainbow bubble position-relative overflow-hidden">
                                <div class="card-body">
                                    <div class="d-flex align-items-center justify-content-between mb-0">
                                        <div class="">
                                            <h4 class="mb-0 text-white" id="countCartonsAll">0</h4>
                                            <h4 class="mb-0 text-white" id="sumPCSAll">0</h4>
                                        </div>
                                        <div class="fs-1 text-white">
                                            <i class="lni lni-dropbox"></i>
                                        </div>
                                    </div>
                                    <h4>Total</h4>
                                </div>
                                <div class="card-footer">
                                    <a href="<?= site_url('packing/ajax_all_filter_by_line'); ?>" class="small-box-footer text-white">
                                        Show Detail
                                        <i class="fa fa-arrow-circle-right"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card rounded-4 bg-gradient-burning bubble position-relative overflow-hidden">
                                <div class="card-body">
                                    <div class="d-flex align-items-center justify-content-between mb-0">
                                        <div class="">
                                            <h4 class="mb-0 text-white" id="countCartonsOut">0</h4>
                                            <h4 class="mb-0 text-white" id="sumPCSOut">0</h4>
                                        </div>
                                        <div class="fs-1 text-white">
                                            <i class="lni lni-dropbox"></i>
                                        </div>
                                    </div>
                                    <h4>Out</h4>
                                </div>
                                <div class="card-footer">
                                    <a href="<?= site_url('packing/ajax_out_filter_by_line'); ?>" class="small-box-footer text-white">
                                        Show Detail
                                        <i class="fa fa-arrow-circle-right"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card rounded-4 bg-gradient-moonlit bubble position-relative overflow-hidden">
                                <div class="card-body">
                                    <div class="d-flex align-items-center justify-content-between mb-0">
                                        <div class="">
                                            <h4 class="mb-0 text-white" id="countCartonsStock">0</h4>
                                            <h4 class="mb-0 text-white" id="sumPCSStock">0</h4>
                                        </div>
                                        <div class="fs-1 text-white">
                                            <i class="lni lni-dropbox"></i>
                                        </div>
                                    </div>
                                    <h4 class="mb-0 text-white">STOCK</h4>
                                </div>
                                <div class="card-footer">
                                    <a href="<?= site_url('packing/ajax_in_filter_by_line'); ?>" class="small-box-footer text-white">
                                        Show Detail
                                        <i class="fa fa-arrow-circle-right"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12 col-lg-12 d-flex">
                <div class="card rounded-4 w-100">
                    <div class="card-body">
                        <div class="d-flex align-items-center mb-3">
                            <div>
                                <h6 class="mb-0"><i class="lni lni-bar-chart"></i> Finish Good Line Capacity</h6>
                            </div>
                        </div>
                        <div id="showCapacityLine">
                            <table class="table" id="tableCapacityLine">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>ID</th>
                                        <th></th>
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
<script>
    $(document).ready(function() {
        var startDate, endDate;

        const getFGResults = () => {
            $.ajax({
                type: "GET",
                url: '<?= site_url("packing/ajax_get_fg_results"); ?>',
                dataType: 'json'
            }).done(function(data) {
                $('#countCartonsAll').html(parseInt(data.count_cartons_all.count_cartons_all).toLocaleString('id-ID') + " <span class='small'>cartons</span>");
                $('#sumPCSAll').html(parseInt(data.sum_pcs_all.sum_pcs_all).toLocaleString('id-ID') + " <span class='small'>pcs</span>");

                $('#countCartonsOut').html(parseInt(data.count_cartons_out.count_cartons_out).toLocaleString('id-ID') + " <span class='small'>cartons</span>");
                $('#sumPCSOut').html(parseInt(data.sum_pcs_out.sum_pcs_out).toLocaleString('id-ID') + " <span class='small'>pcs</span>");

                $('#countCartonsStock').html(parseInt(data.count_cartons_in.count_cartons_in).toLocaleString('id-ID') + " <span class='small'>cartons</span>");
                $('#sumPCSStock').html(parseInt(data.sum_pcs_in.sum_pcs_in).toLocaleString('id-ID') + " <span class='small'>pcs</span>");
            })
        }
        getFGResults();

        var tableCapacityLine = $('#tableCapacityLine').DataTable({
            lengthMenu: [
                [5, 10, 25, 50, 75, 100, -1],
                [5, 10, 25, 50, 75, 100, "all"]
            ],
            columnDefs: [{
                targets: [0],
                visible: false
            }]
        });

        var getAllLines = $.ajax({
            type: 'GET',
            url: '<?= site_url("packing/ajax_get_all_lines"); ?>',
            dataType: 'json'
        });

        var getCountStatusIn = $.ajax({
            type: 'GET',
            url: '<?= site_url("packing/ajax_get_count_status_in"); ?>',
            dataType: 'json'
        });

        $.when(getAllLines, getCountStatusIn).done(function(allLinesRst, countStatusInRst) {
            allLinesRst[0].splice(allLinesRst[0].length - 2, 2);
            allLinesRst[0].every(lines => {
                let falseCount = 0;
                countStatusInRst[0].every(statusIn => {
                    if (lines.line == statusIn.lokasi) {
                        lines['count_status_in'] = statusIn.jmlKarton;
                        return false;
                    } else {
                        falseCount++;
                    }
                    // console.log(falseCount);
                    return true;
                });
                if (falseCount == countStatusInRst[0].length) {
                    lines['count_status_in'] = '0';
                    falseCount = 0;
                    return true
                }
                return true;
            });

            // console.log('allLinesRst[0]: ', allLinesRst[0]);

            $.each(allLinesRst[0], function(i, item) {
                var width = (item.count_status_in == '0' ? 0 : (parseInt(item.count_status_in) / parseInt(item.max_box_capacity)) * 100);

                var available = 0;
                if (item.count_status_in == '0') {
                    available = 100;
                } else if (parseInt(item.count_status_in) < parseInt(item.max_box_capacity)) {
                    available = 100 - ((parseInt(item.count_status_in) / parseInt(item.max_box_capacity)) * 100);
                }
                // let available = (item.count_status_in == '0' ? 100 : 100 - ((item.count_status_in / item.max_box_capacity) * 100));


                var pcsAvailable = parseInt(item.max_box_capacity) - parseInt(item.count_status_in);
                tableCapacityLine.row.add([
                    item.id_line,
                    item.line + `<div class="progress" id=${item.id_line} style="max-width: 100%; height: 30px">
							<div class="progress-bar bg-danger progress-bar-striped" role="progressbar" style="width: ${Math.round(width)}%">
								<a href="<?= site_url("packing/ajax_show_detail_fg_by_lokasi_in"); ?>/${item.line}">${Math.round(width)}% (${item.count_status_in}) </a>
							</div>
							<div class="progress-bar bg-success" role="progressbar" style="width: ${Math.round(available)}%">${Math.round(available)}% (${pcsAvailable})</div>
						</div>`
                ]).draw();
            });

            var emptyLines = allLinesRst[0].filter(el => el.count_status_in == '0');
            console.log('emptyLines: ', emptyLines);

        });

    })
</script>