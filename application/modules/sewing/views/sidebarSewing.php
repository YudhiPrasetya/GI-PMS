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
   <!-- <li class="menu-label">Home</li>
   <li>
    <a href="<?= site_url('sewing/dashboard'); ?>">
     <div class="parent-icon"><i class='bx bxs-dashboard'></i>
     </div>
     <div class="menu-title">Dashboard</div>
    </a>
   </li> -->
   <!-- <li class="menu-label">QC Process</li>
   <li>
    <a href="<?= site_url('sewing/qc_endline'); ?>">
     <div class="parent-icon"><i class='bx bx-search-alt-2'></i>
     </div>
     <div class="menu-title">QC Endline</div>
    </a>
   </li> -->
   <li class="menu-label">Sewing Process</li>
   <!-- <li>
    <a href="<?= site_url('sewing/input_sewing'); ?>">
     <div class="parent-icon"><i class='bx bx-down-arrow-circle'></i>
     </div>
     <div class="menu-title">Input Sewing</i></div>
    </a>
   </li>
   <li>
    <a href="<?= site_url('sewing/ubah_input_sewing'); ?>">
     <div class="parent-icon"><i class='bx bx-edit-alt'></i>
     </div>
     <div class="menu-title">Ubah Input Sewing</i></div>
    </a>
   </li> -->
   <li>
    <a href="<?= site_url('sewing/output_sewing'); ?>">
     <div class="parent-icon"><i class='bx bx-up-arrow-circle'></i>
     </div>
     <div class="menu-title">Output Sewing</i></div>
    </a>
   </li>
   <li>
    <a href="<?= site_url('sewing/recut_sewing'); ?>">
     <div class="parent-icon"><i class='bx bx-recycle'></i>
     </div>
     <div class="menu-title">Recut Sewing</div><span class="badge text-bg-danger ms-2" id="count_received_recut_notif"></span>

    </a>
   </li>
   <li class="menu-label">Mechanic Process</li>
   <li>
    <a href="<?= site_url('sewing/machine_breakdown'); ?>">
     <div class="parent-icon"><i class='bx bx-cog'></i>
     </div>
     <div class="menu-title">Machines Breakdown</i></div>
    </a>
   </li>
   <li class="menu-label">Packing Process</li>
   <li>
    <a href="<?= site_url('sewing/output_packing'); ?>">
     <div class="parent-icon"><i class='bx bx-up-arrow-circle'></i>
     </div>
     <div class="menu-title">Output Packing</i></div>
    </a>
   </li>
   <li class="menu-label">Report</li>
   <li>
    <a href="<?= site_url('sewing/bundle_record_v2'); ?>">
     <div class="parent-icon"><i class='bx bx-clipboard'></i>
     </div>
     <div class="menu-title">Bundle Record <?= ucwords(strtolower($this->session->userdata('username'))); ?> <i>(New)</i></div>
    </a>
   </li>
   <li>
    <a href="<?= site_url('sewing/bundle_record'); ?>">
     <div class="parent-icon"><i class='bx bx-clipboard'></i>
     </div>
     <div class="menu-title">Bundle Record <?= ucwords(strtolower($this->session->userdata('username'))); ?> <i>(Old)</i></div>
    </a>
   </li>

   <li>
    <a href="<?= site_url('sewing/report_sewing'); ?>">
     <div class="parent-icon"><i class='bx bx-clipboard'></i>
     </div>
     <div class="menu-title">Report <?= ucwords(strtolower($this->session->userdata('username'))); ?></div>
    </a>
   </li>

  </ul>
  <!--end navigation-->
 </div>
 <!--end sidebar wrapper -->


 <script>
  const countUnreceivedRecutSewing = () => {
   $('#count_received_recut_notif').empty();
   $.ajax({
    url: '<?= site_url("sewing/getUnreceivedRecutSewing"); ?>',
    type: 'GET',
    dataType: 'JSON',
    // beforeSend: function() {
    //  $('#count_received_recut_notif').html('...');
    // },
    success: function(result) {
     if (result > 0) {
      $('#count_received_recut_notif').html(result);
     } else {
      $('#count_received_recut_notif').hide();
     }
    }
   });
  }


  countUnreceivedRecutSewing();
  // auto reload table 
  setInterval(refreshNotifSidebar, 30000);

  function refreshNotifSidebar() {
   countUnreceivedRecutSewing();
  }
 </script>