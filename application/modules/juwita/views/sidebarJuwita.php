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
                <a href="<?php echo base_url('juwita/dashboard'); ?>">
                    <div class="parent-icon"><i class='bx bxs-dashboard'></i>
                    </div>
                    <div class="menu-title">Dashboard</div>
                </a>

            </li>

            <li class="menu-label">Menu</li>
            <li>
                <a href="javascript:;" class="has-arrow">
                    <div class="parent-icon"><i class='bx bx-edit'></i>
                    </div>
                    <div class="menu-title">Transaction</div>
                </a>
                <ul>
                    <li> <a href="<?= base_url('juwita/input_juwita'); ?>"><i class='bx bx-plus-circle'></i></i>Input Juita</a><span class=""></span>
                    </li>
                    <li> <a href="<?= base_url('juwita/output_juwita'); ?>"><i class="lni lni-printer"></i>Output Juita</a>
                    </li>
                </ul>
            </li>

            <li class="menu-label">Report</li>
            <li>
                <a href="javascript:;" class="has-arrow">
                    <div class="parent-icon"><i class='bx bx-file'></i>
                    </div>
                    <div class="menu-title">Juwita Report</div>
                </a>
                <ul>
                    <li> <a href="<?= base_url('juwita/report'); ?>"><i class='bx bx-plus-circle'></i></i>Date Range</a><span class=""></span>
                    </li>
                </ul>
            </li>
        </ul>
    </div>