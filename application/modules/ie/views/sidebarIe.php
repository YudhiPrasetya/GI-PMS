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
                <a href="<?= site_url('ie/dashboard'); ?>">
                    <div class="parent-icon"><i class='bx bxs-dashboard'></i>
                    </div>
                    <div class="menu-title">Dashboard</div>
                </a>
            </li>
            <li class="menu-label">Data Master</li>
            <!-- <li>
                <a href="<?= site_url('ie/master_sam'); ?>">
                    <div class="parent-icon"><i class='bx bx-book-alt'></i>
                    </div>
                    <div class="menu-title">Master SAM</div>
                </a>
            </li>
            <li>
                <a href="<?= site_url('ie/master_sam_old'); ?>">
                    <div class="parent-icon"><i class='bx bx-book-alt'></i>
                    </div>
                    <div class="menu-title">Master SAM <i>(OLD)</i></div>
                </a>
            </li> -->
            <li>
                <a href="<?= site_url('ie/master_sam_new'); ?>">
                    <div class="parent-icon"><i class='bx bx-book-alt'></i>
                    </div>
                    <div class="menu-title">
                        Master SAM
                        <!-- <i>(New)</i> -->
                    </div>
                </a>
            </li>


        </ul>
        <!--end navigation-->
    </div>
    <!--end sidebar wrapper -->