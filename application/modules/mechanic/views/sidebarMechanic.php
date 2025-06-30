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
    <a href="<?= site_url('mechanic/dashboard'); ?>">
     <div class="parent-icon"><i class='bx bxs-dashboard'></i>
     </div>
     <div class="menu-title">Dashboard</div>
    </a>
   </li>
   <li class="menu-label">Data Master</li>
   <li>
    <a href="<?= site_url('mechanic/master_user'); ?>">
     <div class="parent-icon"><i class='bx bx-user'></i>
     </div>
     <div class="menu-title">Master User</div>
    </a>
   </li>
   <li class="menu-label">Mechanic Process</li>
   <li>
    <a href="<?= site_url('mechanic/machine_breakdown_monitoring'); ?>">
     <div class="parent-icon"><i class='bx bx-cog'></i>
     </div>
     <div class="menu-title">Machine Breakdown Monitoring</i></div>
    </a>
   </li>
   <!-- <li>
    <a href="< ?= site_url('mechanic/delayed_machine_settlement'); ?>">
     <div class="parent-icon"><i class='bx bxs-hourglass'></i>
     </div>
     <div class="menu-title">Delayed Machine Settlement</i></div>
    </a>
   </li> -->
   <li>
    <a href="<?= site_url('mechanic/clearing_machine_breakdown'); ?>">
     <div class="parent-icon"><i class='bx bx-check-circle'></i>
     </div>
     <div class="menu-title">Clearing Machine Breakdown</i></div>
    </a>
   </li>

  </ul>
  <!--end navigation-->
 </div>
 <!--end sidebar wrapper -->