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
                <a href="<?= site_url('adm/dashboard'); ?>">
                    <div class="parent-icon"><i class='bx bxs-dashboard'></i>
                    </div>
                    <div class="menu-title">Dashboard</div>
                </a>

            </li>

            <li class="menu-label">Admin Sewing</li>
            <li>
                <a href="javascript:;" class="has-arrow">
                    <div class="parent-icon"><i class='bx bx-cut'></i>
                    </div>
                    <div class="menu-title">Admin Sewing</div>
                </a>
                <ul>
                    <!-- <li> <a href="</?= base_url('adm/bundlesViews'); ?>"><i class='bx bx-plus-circle'></i></i>Man Power Today</a><span class=""></span>
                    </li> -->
                    <li> <a href="<?= base_url('adm/bundlesViews'); ?>"><i class="lni lni-printer"></i>Bundle Record</a>
                    </li>
                </ul>
            </li>
        </ul>
        </li>

        </ul>
    </div>