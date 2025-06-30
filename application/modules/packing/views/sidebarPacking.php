<div class="wrapper">
    <div class="sidebar-wrapper" data-simplebar="true">
        <div class="sidebar-header">
            <div>
                <img src="<?= base_url(); ?>/assets/images/logo-gi/icon.PNG" class="logo-icon" alt="logo icon">
            </div>
            <div>
                <h4 class="logo-text" style="font-size: 1.5em; color:#f97316"><b>GI-Production</b></h4>
            </div>
            <div class="toggle-icon ms-auto"><i class='bx bx-arrow-to-left'></i>
            </div>
        </div>
        <ul class="metismenu" id="menu">
            <li class="menu-label">Home</li>
            <li>
                <a href="<?= base_url('packing/dashboard'); ?>">
                    <div class="parent-icon"><i class='bx bxs-dashboard'></i>
                    </div>
                    <div class="menu-title">Dashboard</div>
                </a>
            </li>

            <li class="menu-label">Master</li>
            <li>
                <a href="<?= base_url('packing/master_order_packing'); ?>">
                    <div class="parent-icon"><i class='bx bx-book'></i>
                    </div>
                    <div class="menu-title">Master Order Packing</div>
                </a>
            </li>
            <li class="menu-label">Master Packing</li>
            <li>
                <a href="javascript:;" class="has-arrow">
                    <div class="parent-icon"><i class='bx bx-book'></i>
                    </div>
                    <div class="menu-title">Master Packing</div>
                </a>
                <ul>
                    <li> <a href="<?= base_url('packing/packing_member'); ?>"><i class='bx bx-user'></i>Packing Member</a><span class=""></span>
                    </li>
                    <li> <a href="<?= base_url('packing/capacity_box'); ?>"><i class='bx bxs-inbox'></i>Solid Packing Box Capacity </a>
                    </li>
                    <li> <a href="<?= base_url('packing/packing_master_line'); ?>"><i class='bx bx-file'></i>Master Packing Line</a>
                    </li>
                </ul>
            </li>


            <li class="menu-label">Entry Packing</li>
            <li>
                <a class="has-arrow" href="javascript:;">
                    <div class="parent-icon">
                        <i class='bx bx-book-add'></i>
                    </div>
                    <div class="menu-title">Entry Packing</div>
                </a>
                <ul>
                    <li> <a href="<?= base_url('packing/packing_solid'); ?>"><i class='bx bx-file'></i>Solid Packing</a>
                    </li>
                    <li> <a href="<?= base_url('packing/packing_solid_new'); ?>"><i class='bx bx-file'></i>Solid Packing <i>(New)</i></a>
                    </li>
                    <li> <a href="<?= base_url('packing/packing_mixed'); ?>"><i class='bx bx-file'></i>Mixed Size Packing</a>
                    </li>
                </ul>
            </li>

            <!-- <li class="menu-label">Entry Packing</li>
            <li>
                <a class="has-arrow" href="javascript:;">
                    <div class="parent-icon">
                        <i class='bx bx-book-add'></i>
                    </div>
                    <div class="menu-title">Entry Packing</div>
                </a>
                <ul>
                    <li> <a href="<?= base_url('packing/packing_solid'); ?>"><i class='bx bx-file'></i>Solid Packing</a>
                    </li>
                    <li> <a href="<?= base_url('packing/packing_mixed'); ?>"><i class='bx bx-file'></i>Mixed Size Packing</a>
                    </li>


                </ul>
            </li> -->

            <li class="menu-label">Packing Prosess</li>
            <li>
                <a class="has-arrow" href="javascript:;">
                    <div class="parent-icon"><i class='bx bx-package'></i>
                    </div>
                    <div class="menu-title">Packing Process</div>
                </a>
                <ul>
                    <li> <a href="<?= base_url('packing/output_packing'); ?>"><i class="lni lni-pointer-right"></i>Output Packing</a>
                    </li>
                </ul>
            </li>

            <li class="menu-label">Pre Shipment/Finish Good</li>
            <li>
                <a class="has-arrow" href="javascript:;">
                    <div class="parent-icon"><i class='bx bxs-ship'></i>
                    </div>
                    <div class="menu-title">Finish Good</div>
                </a>
                <ul>
                    <li> <a href="<?= base_url('packing/find_orc_position'); ?>"><i class="lni lni-pointer-right"></i>Find ORC Position</a>
                    </li>
                    <li> <a href="<?= base_url('packing/transfer_area_in'); ?>"><i class="lni lni-pointer-right"></i>In</a>
                    </li>
                    <li> <a href="<?= base_url('packing/transfer_area_out'); ?>"><i class="lni lni-pointer-right"></i>Out</a>
                    </li>
                    <li> <a href="<?= base_url('packing/output_packing_mixed'); ?>"><i class="lni lni-pointer-right"></i>Output Mixed Size</a>
                    </li>

                </ul>
            </li>

            <li class="menu-label">Report</li>
            <li>
                <a class="has-arrow" href="javascript:;">
                    <div class="parent-icon"><i class='bx bxs-report'></i>
                    </div>
                    <div class="menu-title">Packing Report</div>
                </a>
                <ul>
                    <li> <a href="<?= base_url('packing/report_daily_packing'); ?>"><i class='bx bxs-report'></i></i>Daily Packing Line</a>
                    </li>
                    <li> <a href="<?= base_url('packing/report_orc_packing'); ?>"><i class='bx bxs-report'></i></i>Packing ORC</a>
                    </li>
                    <li> <a href="<?= base_url('packing/report_daily_summary'); ?>"><i class="lni lni-files"></i>Daily Summary Packing</a>
                    </li>
                    <li> <a href="<?= base_url('packing/report_packing_hourly'); ?>"><i class="lni lni-files"></i>Packing Hourly</a>
                    </li>
                    <li> <a href="<?= base_url('packing/report_wip'); ?>"><i class="lni lni-files"></i>WIP Packing</a>
                    </li>
                    <li> <a href="<?= base_url('packing/report_fg_in'); ?>"><i class="lni lni-files"></i>Finish Good IN</a>
                    </li>
                    <li> <a href="<?= base_url('packing/report_fg_out'); ?>"><i class="lni lni-files"></i>Finish Good OUT</a>
                    </li>
                    <li> <a href="<?= base_url('packing/bundleRecord'); ?>"><i class='lni lni-files'></i>Bundle Record</a>
                    </li>
                </ul>
            </li>
        </ul>
        </li>

        </ul>
    </div>