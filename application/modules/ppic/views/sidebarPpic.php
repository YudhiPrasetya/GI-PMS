<!--wrapper-->
<div class="wrapper">
    <!--sidebar wrapper -->
    <div class="sidebar-wrapper" data-simplebar="true">
        <div class="sidebar-header">
            <div>
                <img src="<?= base_url(); ?>/assets/images/logo-gi/icon.PNG" class="logo-icon" alt="logo icon">
            </div>
            <div>
                <h4 class="logo-text" style="font-size: 1.5em; color:#f97316"><b>GI-Production</b></h4>
            </div>
            <div class="toggle-icon ms-auto"><i class='bx bx-arrow-to-left'></i>
                <!-- <div class="toggle-icon ms-auto"><i style="color: grey;" class='bx bx-menu'></i> -->
            </div>
        </div>
        <!--navigation-->
        <ul class="metismenu" id="menu">
            <li class="menu-label">Home</li>
            <li>
                <a href="<?= site_url('ppic/dashboard'); ?>">
                    <div class="parent-icon"><i class='bx bxs-dashboard'></i>
                    </div>
                    <div class="menu-title">Dashboard</div>
                </a>
            </li>
            <li class="menu-label">PPIC Process</li>
            <li>
                <a href="<?= site_url('ppic/master_order'); ?>">
                    <div class="parent-icon"><i class='bx bx-book-alt'></i>
                    </div>
                    <div class="menu-title">Master Order</div>
                </a>
            </li>
            <li>
                <a href="<?= site_url('ppic/master_order_icon'); ?>">
                    <div class="parent-icon"><i class='bx bx-book-alt'></i>
                    </div>
                    <div class="menu-title">Master Order <i>(Icon)</i></div>
                </a>
            </li>
            <!-- <li>
                <a href="</?= site_url('ppic/master_order_add_on'); ?>">
                    <div class="parent-icon"><i class='bx bx-book-alt'></i>
                    </div>
                    <div class="menu-title">Master Order <i>(Add On)</i></div>
                </a>
            </li> -->
            <li>
                <a href="<?= site_url('ppic/order_allocation'); ?>">
                    <div class="parent-icon"><i class='bx bx-shopping-bag'></i>
                    </div>
                    <div class="menu-title">Order Allocation</i></div>
                </a>
            </li>
            <li>
                <a href="<?= site_url('ppic/production_planning'); ?>">
                    <div class="parent-icon"><i class='bx bx-clipboard'></i>
                    </div>
                    <div class="menu-title">Production Planning</i></div>
                </a>
            </li>
            <li>
                <a href="<?= site_url('ppic/summary_prod_global'); ?>">
                    <div class="parent-icon"><i class='bx bx-bar-chart-alt-2'></i>
                    </div>
                    <div class="menu-title">Production Summary (Global ORC)</i></div>
                </a>
            </li>
            <!-- <li>
                <a href="<?= site_url('ppic/production_report_new'); ?>">
                    <div class="parent-icon"><i class='bx bx-bar-chart-alt-2'></i>
                    </div>
                    <div class="menu-title">Production Report <sup><i>(New)</i></sup></div>
                </a>
            </li> -->




        </ul>
        <!--end navigation-->
    </div>
    <!--end sidebar wrapper -->