<div class="wrapper">
    <div class="sidebar-wrapper" data-simplebar="true">
        <div class="sidebar-header">
            <div>
                <img src="<?= base_url(); ?>/assets/images/logo-gi/icon.PNG" class="logo-icon" alt="logo icon">
            </div>
            <div>
                <h4 class="logo-text" style="font-size: 1.5em; color:#f97316"><b>GI-PMS</b></h4>
            </div>
            <div class="toggle-icon ms-auto"><i class='bx bx-arrow-to-left'></i>
            </div>
        </div>
        <ul class="metismenu" id="menu">
            <li class="menu-label">Home</li>
            <li>
                <a href="<?= site_url('cutting/dashboard'); ?>">
                    <div class="parent-icon"><i class='bx bxs-dashboard'></i>
                    </div>
                    <div class="menu-title">Dashboard</div>
                </a>
            </li>
            <li class="menu-label">Cutting Process</li>
            <li>
                <a href="javascript:;" class="has-arrow">
                    <div class="parent-icon"><i class='bx bx-cut'></i>
                    </div>
                    <div class="menu-title">Cutting Process</div>
                </a>
                <ul>
                    <li> <a href="<?= base_url('cutting/work_order'); ?>"><i class='bx bx-plus-circle'></i></i>Create Work Order</a><span class=""></span>
                    </li>
                    <li> <a href="<?= base_url('cutting/bundle_cutting'); ?>"><i class='bx bx-plus-circle'></i></i>Create Bundle Barcode</a><span class=""></span>
                    </li>
                    <!-- <li> <a href="</?= base_url('cutting/bundleCuttingIcons'); ?>"><i class='bx bx-plus-circle'></i></i>Create Bundle Barcode By Icon</a><span class=""></span>
                    </li> -->
                    <li> <a href="<?= base_url('cutting/print_bundle_cutting_v2'); ?>"><i class="lni lni-printer"></i>Print Cutting Bundle</a>
                    </li>
                    <li> <a href="<?= base_url('cutting/print_bundle_molding_v2'); ?>"><i class="lni lni-printer"></i>Print Molding Bundle</a>
                    </li>
                    <li> <a href="<?= base_url('cutting/print_bundle_panty'); ?>"><i class="lni lni-printer"></i>Print Panty Bundle</a>
                    </li>
                    <li> <a href="<?= base_url('cutting/print_bundle_skp'); ?>"><i class="lni lni-printer"></i>Print SKP Bundle</a>
                    </li>
                    <li> <a href="<?= base_url('cutting/print_bundle_juwita'); ?>"><i class="lni lni-printer"></i>Print Juita Bundle</a>
                    </li>
                </ul>
            </li>

            <li class="menu-label">Trimstore Process</li>
            <li>
                <a href="javascript:;" class="has-arrow">
                    <div class="parent-icon"><i class='bx bx-store'></i></i>
                    </div>
                    <div class="menu-title">Trimstore Process</div>
                </a>
                <ul>
                    <li> <a href="<?= base_url('cutting/input_trimstore'); ?>"><i class='bx bx-scan'></i>Scan Input Trimstore</a>
                    </li>
                    <li> <a href="<?= base_url('cutting/output_trimstore'); ?>"><i class='bx bx-scan'></i>Scan Output Trimstore</a>
                    </li>
                </ul>
            </li>

            <li class="menu-label">Recut Process</li>
            <li>
                <a href="<?= site_url('cutting/input_recut_cutting'); ?>">
                    <div class="parent-icon"><i class='bx bx-recycle'></i>
                    </div>
                    <div class="menu-title">Input Recut</div>
                </a>
            </li>
            <li>
                <a href="<?= site_url('cutting/output_recut_cutting'); ?>">
                    <div class="parent-icon"><i class='bx bx-recycle'></i>
                    </div>
                    <div class="menu-title">Output Recut</div>
                </a>
            </li>
            <li>
                <a href="<?= site_url('cutting/report_recut_cutting'); ?>">
                    <div class="parent-icon"><i class='bx bx-file'></i>
                    </div>
                    <div class="menu-title">Report Recut</div>
                </a>
            </li>

            <li class="menu-label">REPORT</li>
            <li>
                <a class="has-arrow" href="javascript:;">
                    <div class="parent-icon"><i class='bx bx-file'></i>
                    </div>
                    <div class="menu-title">Cutting Report</div>
                </a>
                <ul>
                    <li> <a href="<?= base_url('cutting/bundle_record'); ?>"><i class='bx bx-file'></i>Bundle Record</a>
                    </li>
                    <li> <a href="<?= base_url('cutting/report_balance'); ?>"><i class='bx bx-file'></i>Balance Cutting</a>
                    </li>
                    <li> <a href="<?= base_url('cutting/report_wip'); ?>"><i class='bx bx-file'></i>Stock Trimstore</a>
                    </li>
                    <li> <a href="<?= base_url('cutting/report_cutting_today'); ?>"><i class='bx bx-file'></i>Cutting Today</a>
                    </li>
                    <li> <a href="<?= base_url('cutting/report_cutting_summary'); ?>"><i class='bx bx-file'></i>Summary Trimstore</a>
                    </li>
                </ul>
            </li>
        </ul>
        </li>

        </ul>
    </div>