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
            </div>
        </div>
        <!--navigation-->
        <ul class="metismenu" id="menu">
            <li class="menu-label">Home</li>
            <li>
                <a href="<?= site_url('molding/dashboard'); ?>">
                    <div class="parent-icon"><i class='bx bxs-dashboard'></i>
                    </div>
                    <div class="menu-title">Dashboard</div>
                </a>
            </li>
            <li class="menu-label">Master Molding</li>
            <li>
                <a href="<?= site_url('molding/masterKegel'); ?>">
                    <div class="parent-icon"><i class='bx bx-down-arrow-circle'></i>
                    </div>
                    <div class="menu-title">Master Kegel</div>
                </a>
            </li>

            <li class="menu-label">Molding Process</li>
            <li>
                <a href="<?= site_url('molding/input_molding'); ?>">
                    <div class="parent-icon"><i class='bx bx-down-arrow-circle'></i>
                    </div>
                    <div class="menu-title">Input Molding</div>
                </a>
            </li>
            <li>
                <a href="<?= site_url('molding/output_molding'); ?>">
                    <div class="parent-icon"><i class='bx bx-up-arrow-circle'></i>
                    </div>
                    <div class="menu-title">Output Molding</div>
                </a>
            </li>
            <li class="menu-label">Molding Allocation</li>
            <li>
                <a href="<?= site_url('molding/allocation_datatable'); ?>">
                    <div class="parent-icon"><i class='bx bx-up-arrow-circle'></i>
                    </div>
                    <div class="menu-title">Machine Allocation datatable</div>
                </a>
            </li>
            <li>
                <a href="<?= site_url('molding/allocation'); ?>">
                    <div class="parent-icon"><i class='bx bx-up-arrow-circle'></i>
                    </div>
                    <div class="menu-title">Machine Allocation WebDataRocks(try)</div>
                </a>
            </li>
        </ul>
    </div>