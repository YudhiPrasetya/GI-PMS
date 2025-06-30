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
                <a href="<?php echo base_url('manager/dashboard'); ?>">
                    <div class="parent-icon"><i class='bx bxs-dashboard'></i>
                    </div>
                    <div class="menu-title">Dashboard</div>
                </a>

            </li>

            <li class="menu-label">CUTTING</li>
            <li>
                <a href="javascript:;" class="has-arrow">
                    <div class="parent-icon"><i class='fadeIn animated bx bx-cut text-warning'></i>
                    </div>
                    <div class="menu-title">Report Cutting</div>
                </a>
                <ul>
                    <li> <a href="<?php echo base_url('manager/cuttingOrc'); ?>"><i class='fadeIn animated bx bx-calendar text-warning'></i>Cutting By Date</a><span class=""></span>
                    </li>
                    <li> <a href="<?php echo base_url('manager/cuttingSummary'); ?>"><i class='fadeIn animated bx bx-book-bookmark text-warning'></i>Summary Per ORC </a>
                    </li>
                    <li> <a href="<?php echo base_url('manager/cuttingWip'); ?>"><i class='fadeIn animated bx bx-book-open text-warning'></i>Cutting WIP </a>
                    </li>
                    <li> <a href="<?php echo base_url('manager/cuttingBySize'); ?>"><i class='fadeIn animated bx bx-book-open text-warning'></i>Cutting By Size</a>
                    </li>
                    <li> <a href="<?php echo base_url('manager/cuttingToday'); ?>"><i class='fadeIn animated bx bx-calendar-check text-warning'></i>Cutting Today </a>
                    </li>
                    <li> <a href="<?php echo base_url('manager/cuttingIn'); ?>"><i class='fadeIn animated bx bx-calendar-check text-warning'></i>Cutting IN </a>
                    </li>

                </ul>
            </li>

            <li class="menu-label">MOLDING</li>
            <li>
                <a class="has-arrow" href="javascript:;">
                    <div class="parent-icon">
                        <i class='fadeIn animated bx bx-square-rounded text-primary'></i>
                    </div>
                    <div class="menu-title">Report Molding</div>
                </a>
                <ul>
                    <li> <a href="<?= base_url('manager/moldingByDate'); ?>"><i class='fadeIn animated bx bx-calendar text-primary'></i>Molding By Date</a>
                    </li>
                    <li> <a href="<?= base_url('manager/moldingDaily'); ?>"><i class='bx bx-file text-primary'></i>Daily Molding</a>
                    </li>
                    <li> <a href="<?= base_url('manager/molding_today'); ?>"><i class='bx bx-calendar-check text-primary'></i>Molding Today</a>
                    </li>
                    <li> <a href="<?= base_url('manager/allSummaryMolding'); ?>"><i class='bx bx-book-bookmark text-primary'></i>All Molding Summary</a>
                    </li>
                    <li> <a href="<?= base_url('manager/molding_in'); ?>"><i class='bx bx-book-bookmark text-primary'></i>All Molding In</a>
                    </li>
                    <li> <a href="<?= base_url('manager/molding_out'); ?>"><i class='bx bx-book-bookmark text-primary'></i>All Molding Out</a>
                    </li>

                </ul>
            </li>

            <li class="menu-label">SEWING</li>
            <li>
                <a class="has-arrow" href="javascript:;">
                    <div class="parent-icon"><i class='bx bxs-report text-danger'></i>
                    </div>
                    <div class="menu-title">Repot Sewing</div>
                </a>
                <ul>
                    <li> <a href="<?= base_url('manager/sewingDaily'); ?>"><i class="bx bx-calendar text-danger"></i>Sewing By Date</a>
                    </li>
                    <li> <a href="<?= base_url('manager/sewingSummaryOrc'); ?>"><i class="bx bx-book-bookmark text-danger"></i> Summary Orc</a>
                    </li>
                    <li> <a href="<?= base_url('manager/sewingBySize'); ?>"><i class="lni lni-pointer-right text-danger"></i>Sewing By Size</a>
                    </li>
                    <li> <a href="<?= base_url('manager/sewingSummaryLine'); ?>"><i class="lni lni-pointer-right text-danger"></i>Sewing Summary Line</a>
                    </li>
                    <li> <a href="<?= base_url('manager/sewingToday'); ?>"><i class="bx bx-calendar-check text-danger"></i>Sewing Today</a>
                    </li>

                </ul>
            </li>

            <li class="menu-label">PACKING</li>
            <li>
                <a class="has-arrow" href="javascript:;">
                    <div class="parent-icon"><i class='bx bx-package text-success'></i>
                    </div>
                    <div class="menu-title">Report Packing</div>
                </a>
                <ul>
                    <li> <a href="<?php echo base_url('manager/packingByDate'); ?>"><i class='lni lni-alarm-clock text-success'></i></i>Date Range Per Hours</a>
                    </li>
                    <li> <a href="<?php echo base_url('manager/packingSummary'); ?>"><i class="lni lni-files text-success"></i>Daily Summary Packing</a>
                    </li>
                    <li> <a href="<?php echo base_url('manager/packingDaily'); ?>"><i class="lni lni-files text-success"></i>Daily Input Packing</a>
                    </li>
                    <li> <a href="<?php echo base_url('manager/packingOrc'); ?>"><i class="lni lni-files text-success"></i>Packing By ORC</a>
                    </li>
                    <li> <a href="<?php echo base_url('manager/packingWip'); ?>"><i class="lni lni-files text-success"></i>WIP Packing</a>
                    </li>
                    <li> <a href="<?php echo base_url('manager/packingToday'); ?>"><i class="lni lni-files text-success"></i>Packing Today</a>
                    </li>

                </ul>
            </li>

            <li class="menu-label">FINISH GOOD</li>
            <li>
                <a class="has-arrow" href="javascript:;">
                    <div class="parent-icon"><i class='bx bxs-ship text-info'></i>
                    </div>
                    <div class="menu-title">Report Finish Good </div>
                </a>
                <ul>
                    <li> <a href="<?php echo base_url('manager/allFinishGood'); ?>"><i class="lni lni-files text-info"></i>All Finish Good</a>
                    </li>
                    <li> <a href="<?php echo base_url('manager/FinishGoodIn'); ?>"><i class="lni lni-files text-info"></i>Finish Good IN</a>
                    </li>
                    <li> <a href="<?php echo base_url('manager/FinishGoodOut'); ?>"><i class='lni lni-files text-info'></i>Finish Good Out</a>
                    </li>
                    <li> <a href="<?php echo base_url('manager/FinishGoodToday'); ?>"><i class='lni lni-files text-info'></i>Finish Good Today</a>
                    </li>
                </ul>
            </li>

            <li class="menu-label">SKP</li>
            <li>
                <a class="has-arrow" href="javascript:;">
                    <div class="parent-icon"><i class='fadeIn animated bx bx-shekel' style="color: #9d03fc;"></i>
                    </div>
                    <div class="menu-title">Report SKP </div>
                </a>
                <ul>
                    <li> <a href="<?php echo base_url('manager/SummarySkp'); ?>"><i class="lni lni-files" style="color: #9d03fc;"></i>All SKP</a>
                    </li>
                    <li> <a href="<?php echo base_url('manager/SkpIn'); ?>"><i class="lni lni-files" style="color: #9d03fc;"></i>SKP IN</a>
                    </li>
                    <li> <a href="<?php echo base_url('manager/SkpOut'); ?>"><i class='lni lni-files' style="color: #9d03fc;"></i>SKP Out</a>
                    </li>

                </ul>
            </li>
            <li class="menu-label">Juita</li>
            <li>
                <a class="has-arrow" href="javascript:;">
                    <div class="parent-icon"><i class='fadeIn animated bx bx-food-menu' style="color:#fc03c6;"></i>
                    </div>
                    <div class="menu-title">Report Juita </div>
                </a>
                <ul>
                    <li> <a href="<?php echo base_url('manager/SummaryJuita'); ?>"><i class="lni lni-files" style="color:#fc03c6;"></i>All Juita</a>
                    </li>
                    <li> <a href="<?php echo base_url('manager/JuitaIn'); ?>"><i class="lni lni-files" style="color:#fc03c6;"></i>Juita IN</a>
                    </li>
                    <li> <a href="<?php echo base_url('manager/JuitaOut'); ?>"><i class='lni lni-files' style="color:#fc03c6;"></i>Juita Out</a>
                    </li>

                </ul>
            </li>


            <!-- <li class="menu-label">Summary</li>
            <li>
                <a href="">
                    <div class="parent-icon"><i class='lni lni-calendar text-danger'></i>
                    </div>
                    <div class="menu-title">Production Report</div>
                </a>
            </li> -->

            <li class="menu-label">Manager</li>
            <li>
                <a class="has-arrow" href="javascript:;">
                    <div class="parent-icon"><i class='lni lni-calendar text-danger'></i>
                    </div>
                    <div class="menu-title">Summary Production</div>
                </a>
                <ul>
                    <li> <a href="<?= site_url('manager/summary_prod'); ?>"><i class="lni lni-files text-info"></i>Per ORC</a>
                    </li>
                    <li> <a href="<?= site_url('manager/summary_prod_global'); ?>"><i class="lni lni-files text-info"></i>Global ORC (Production)</a>
                    </li>
                </ul>
            </li>

            <li class="menu-label">Bundle Record</li>
            <li>
                <a href="<?= site_url('manager/bundle_record_v2'); ?>">
                    <div class="parent-icon"><i class='bx bx-clipboard text-warning'></i>
                    </div>
                    <div class="menu-title">Bundle Record (New)</div>
                </a>
            </li>
            <li>
                <a href="<?= site_url('manager/bundle_record'); ?>">
                    <div class="parent-icon"><i class='bx bx-clipboard text-warning'></i>
                    </div>
                    <div class="menu-title">Bundle Record (Old)</div>
                </a>
            </li>

            <li class="menu-label">Date Range Line Per Hours</li>
            <li>
                <a href="<?= site_url('manager/date_range_line_per_hours'); ?>">
                    <div class="parent-icon"><i class='bx bxs-time text-danger'></i>
                    </div>
                    <div class="menu-title">Date Range Line Per Hours</div>
                </a>
            </li>

            <li class="menu-label">Compare Barcode</li>
            <li>
                <a href="<?= site_url('manager/compare_barcode'); ?>">
                    <div class="parent-icon"><i class='bx bxs-barcode text-danger'></i>
                    </div>
                    <div class="menu-title">Compare Barcode</div>
                </a>
            </li>

            <li class="menu-label">MECHANIC</li>
            <li>
                <a class="has-arrow" href="javascript:;">
                    <div class="parent-icon"><i class='lni lni-cogs'></i>
                    </div>
                    <div class="menu-title">Report Mechanic</div>
                </a>
                <ul>
                    <li> <a href="<?= base_url('manager/downtime'); ?>"><i class="lni lni-pointer-right"></i>Downtime</a>
                    </li>

                    <li> <a href="<?php echo base_url('manager/dailyDowntime'); ?>"><i class="lni lni-pointer-right"></i>Daily Downtime</a>
                    </li>
                    <li> <a href="<?php echo base_url('manager/dailyDowntimeMachineType'); ?>"><i class="lni lni-pointer-right"></i>Downtime Machine Daily</a>
                    </li>
                    <li> <a href="<?php echo base_url('manager/downtimeAnalize'); ?>"><i class="lni lni-pointer-right"></i>Downtime Machine Analize</a>
                    </li>
                    <li> <a href="<?php echo base_url('manager/kpiMechanic'); ?>"><i class="lni lni-pointer-right"></i>KPI Mechanic</a>

                    </li>
                </ul>
            </li>
        </ul>
    </div>