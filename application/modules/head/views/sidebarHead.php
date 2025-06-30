<div class="wrapper">
    <div class="sidebar-wrapper" data-simplebar="true">
        <div class="sidebar-header">
            <div>
                <img src="<?= base_url(); ?>/assets/images/logo-gi/logogi.PNG" class="logo-icon" alt="logo icon">
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
                <a href="<?php echo base_url('head/dashboard'); ?>">
                    <div class="parent-icon"><i class='bx bxs-dashboard'></i>
                    </div>
                    <div class="menu-title">Dashboard</div>
                </a>

            </li>

            <li class="menu-label">SEWING</li>
            <li>
                <a class="has-arrow" href="javascript:;">
                    <div class="parent-icon"><i class='bx bxs-report text-danger'></i>
                    </div>
                    <div class="menu-title">Repot Sewing</div>
                </a>
                <ul>
                    <li> <a href="<?= base_url('head/AbsentSewingLine'); ?>"><i class="bx bx-calendar text-danger"></i>Absent Sewing Line</a>
                    </li>
                    <li> <a href="<?= base_url('head/SummaryOrc'); ?>"><i class="bx bx-book-bookmark text-danger"></i> Summary Orc</a>
                    </li>
                    <li> <a href="<?= base_url('head/DeffectSewing'); ?>"><i class="lni lni-pointer-right text-danger"></i>Deffect Sewing</a>
                    </li>
                    <li> <a href="<?= base_url('head/DateRAngeHour'); ?>"><i class="bx bx-calendar text-danger"></i>Date Range Hourly</a>
                    </li>
                    <li> <a href="<?= base_url('head/BreakdownMachine'); ?>"><i class="bx bx-cog text-danger"></i>Machine Breakdown</a>
                    </li>
                    <!-- <li> <a href="</?= base_url('head/sewingSummaryLine'); ?>"><i class="lni lni-pointer-right text-danger"></i>Sewing Summary Line</a>
                    </li>
                    <li> <a href="</?= base_url('head/sewingToday'); ?>"><i class="bx bx-calendar-check text-danger"></i>Sewing Today</a>
                    </li> -->

                </ul>
            </li>

        </ul>
    </div>