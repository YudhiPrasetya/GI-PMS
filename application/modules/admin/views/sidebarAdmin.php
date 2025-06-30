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
    <a href="<?= site_url('admin/dashboard'); ?>">
     <div class="parent-icon"><i class='bx bxs-dashboard'></i>
     </div>
     <div class="menu-title">Dashboard</div>
    </a>
   </li>

   <li class="menu-label">Menu</li>
   <li>
    <a class="has-arrow" href="javascript:;">
     <div class="parent-icon"><i class='bx bx-book-alt'></i>
     </div>
     <div class="menu-title">Master</div>
    </a>
    <ul>
     <li>
      <a href="<?= site_url('admin/master_quote'); ?>">
       <div class="parent-icon"><i class='bx bx-book-alt'></i>
       </div>
       <div class="menu-title">Master Quote</div>
      </a>
     </li>
     <li>
      <a href="<?= site_url('admin/master_user'); ?>">
       <div class="parent-icon"><i class='bx bxs-user-detail'></i>
       </div>
       <div class="menu-title">Master User</div>
      </a>
     </li>
     <li>
      <a href="<?= site_url('admin/master_line'); ?>">
       <div class="parent-icon"><i class='bx bx-spreadsheet'></i>
       </div>
       <div class="menu-title">Master Line</div>
      </a>
     </li>
     <li>
      <a href="<?= site_url('admin/master_head'); ?>">
       <div class="parent-icon"><i class='bx bx-group'></i>
       </div>
       <div class="menu-title">Master Head</div>
      </a>
     </li>
     <li>
      <a href="<?= site_url('admin/master_spv'); ?>">
       <div class="parent-icon"><i class='bx bx-street-view'></i>
       </div>
       <div class="menu-title">Master Spv</div>
      </a>
     </li>
     <li>
      <a href="<?= site_url('admin/master_size'); ?>">
       <div class="parent-icon"><i class='bx bx-ruler'></i>
       </div>
       <div class="menu-title">Master Size</div>
      </a>
     </li>
     <li>
      <a href="<?= site_url('admin/Master_factory'); ?>">
       <div class="parent-icon"><i class='bx bxs-factory'></i>
       </div>
       <div class="menu-title">Master Factory</div>
      </a>
     </li>
    </ul>
   </li>



   <!-- PPIC -->
   <li>
    <a class="has-arrow" href="javascript:;">
     <div class="parent-icon"><i class='bx bx-bar-chart-alt-2'></i>
     </div>
     <div class="menu-title">PPIC</div>
    </a>
    <ul>
     <li class="menu-label ms-2">Home</li>
     <li>
      <a href="<?= site_url('ppic/dashboard'); ?>">
       <div class="parent-icon"><i class='bx bxs-dashboard'></i>
       </div>
       <div class="menu-title">Dashboard</div>
      </a>
     </li>
     <li class="menu-label ms-2">PPIC Process</li>
     <li>
      <a href="<?= site_url('ppic/master_order'); ?>">
       <div class="parent-icon"><i class='bx bx-book-alt'></i>
       </div>
       <div class="menu-title">Master Order</div>
      </a>
     </li>
     <li>
      <a href="<?= site_url('ppic/master_order_add_on'); ?>">
       <div class="parent-icon"><i class='bx bx-book-alt'></i>
       </div>
       <div class="menu-title">Master Order <i>(Add On)</i></div>
      </a>
     </li>
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
      <a href="<?= site_url('ppic/production_report'); ?>">
       <div class="parent-icon"><i class='bx bx-bar-chart-alt-2'></i>
       </div>
       <div class="menu-title">Production Report</i></div>
      </a>
     </li>
     <li>
      <a href="<?= site_url('ppic/production_report_new'); ?>">
       <div class="parent-icon"><i class='bx bx-bar-chart-alt-2'></i>
       </div>
       <div class="menu-title">Production Report <sup><i>(New)</i></sup></div>
      </a>
     </li>
    </ul>
   </li>

   <!-- Cutting -->
   <li>
    <a class="has-arrow" href="javascript:;">
     <div class="parent-icon"><i class='bx bx-cut'></i>
     </div>
     <div class="menu-title">Cutting</div>
    </a>
    <ul>
     <li class="menu-label ms-2">Home</li>
     <li>
      <a href="<?= site_url('cutting/dashboard'); ?>">
       <div class="parent-icon"><i class='bx bxs-dashboard'></i>
       </div>
       <div class="menu-title">Dashboard</div>
      </a>

     </li>

     <li class="menu-label ms-2">Cutting Process</li>
     <li>
      <a href="javascript:;" class="has-arrow">
       <div class="parent-icon"><i class='bx bx-cut'></i>
       </div>
       <div class="menu-title">Cutting Process</div>
      </a>
      <ul>
       <li> <a href="<?= base_url('cutting/bundle_cutting'); ?>"><i class='bx bx-plus-circle'></i></i>Create Bundle Barcode</a><span class=""></span>
       </li>
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

     <li class="menu-label ms-2">Trimstore Process</li>
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

     <li class="menu-label ms-2">Recut Process</li>
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


     <li class="menu-label ms-2">REPORT</li>
     <li>
      <a class="has-arrow" href="javascript:;">
       <div class="parent-icon"><i class='bx bx-file'></i>
       </div>
       <div class="menu-title">Cutting Report</div>
      </a>
      <ul>
       <li> <a href="<?= base_url('cutting/bundle_record'); ?>"><i class='bx bx-file'></i>Bundle Record</a>
       </li>
       <li> <a href="<?= base_url('cutting/report_wip'); ?>"><i class='bx bx-file'></i>WIP Cutting</a>
       </li>
       <li> <a href="<?= base_url('cutting/report_cutting_today'); ?>"><i class='bx bx-file'></i>Cutting Today</a>
       </li>
       <li> <a href="<?= base_url('cutting/report_cutting_summary'); ?>"><i class='bx bx-file'></i>Summary Trimstore</a>
       </li>
      </ul>
     </li>
    </ul>
   </li>

   <!-- Molding -->
   <li>
    <a class="has-arrow" href="javascript:;">
     <div class="parent-icon"><i class="bx bx-square-rounded"></i>
     </div>
     <div class="menu-title">Molding</div>
    </a>
    <ul>
     <li class="menu-label ms-2">Home</li>
     <li>
      <a href="<?= site_url('molding/dashboard'); ?>">
       <div class="parent-icon"><i class='bx bxs-dashboard'></i>
       </div>
       <div class="menu-title">Dashboard</div>
      </a>
     </li>
     <li class="menu-label ms-2">Master Molding</li>
     <li>
      <a href="<?= site_url('molding/masterKegel'); ?>">
       <div class="parent-icon"><i class='bx bx-down-arrow-circle'></i>
       </div>
       <div class="menu-title">Master Kegel</div>
      </a>
     </li>

     <li class="menu-label ms-2">Molding Process</li>
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
     <li class="menu-label ms-2">Molding Allocation</li>
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
   </li>

   <!-- IE -->
   <li>
    <a class="has-arrow" href="javascript:;">
     <div class="parent-icon"><i class="bx bx-menu"></i>
     </div>
     <div class="menu-title">IE</div>
    </a>
    <ul>
     <li class="menu-label ms-2">Home</li>
     <li>
      <a href="<?= site_url('ie/dashboard'); ?>">
       <div class="parent-icon"><i class='bx bxs-dashboard'></i>
       </div>
       <div class="menu-title">Dashboard</div>
      </a>
     </li>
     <li class="menu-label ms-2">Data Master</li>
     <li>
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
     </li>
     <li>
      <a href="<?= site_url('ie/master_sam_new'); ?>">
       <div class="parent-icon"><i class='bx bx-book-alt'></i>
       </div>
       <div class="menu-title">Master SAM <i>(New)</i></div>
      </a>
     </li>
    </ul>
   </li>

   <!-- Sewing -->
   <li>
    <a class="has-arrow" href="javascript:;">
     <div class="parent-icon"><i class='bx bxs-report'></i>
     </div>
     <div class="menu-title">Sewing</div>
    </a>
    <ul>
     <li class="menu-label ms-2">QC Process</li>
     <li>
      <a href="<?= site_url('sewing/qc_endline'); ?>">
       <div class="parent-icon"><i class='bx bx-search-alt-2'></i>
       </div>
       <div class="menu-title">QC Endline</div>
      </a>
     </li>
     <li class="menu-label ms-2">Sewing Process</li>
     <li>
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
     </li>
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
     <li class="menu-label ms-2">Mechanic Process</li>
     <li>
      <a href="<?= site_url('sewing/machine_breakdown'); ?>">
       <div class="parent-icon"><i class='bx bx-cog'></i>
       </div>
       <div class="menu-title">Machines Breakdown</i></div>
      </a>
     </li>
     <li class="menu-label ms-2">Packing Process</li>
     <li>
      <a href="<?= site_url('sewing/output_packing'); ?>">
       <div class="parent-icon"><i class='bx bx-up-arrow-circle'></i>
       </div>
       <div class="menu-title">Output Packing</i></div>
      </a>
     </li>
     <li class="menu-label ms-2">Report</li>
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
   </li>

   <!-- Mechanic -->
   <li>
    <a class="has-arrow" href="javascript:;">
     <div class="parent-icon">
      <i class='lni lni-cogs'></i>
     </div>
     <div class="menu-title">Mechanic</div>
    </a>
    <ul>
     <li>
      <a href="<?= site_url('mechanic/dashboard'); ?>">
       <div class="parent-icon"><i class='bx bxs-dashboard'></i>
       </div>
       <div class="menu-title">Dashboard</div>
      </a>
     </li>
     <li class="menu-label ms-2">Data Master</li>
     <li>
      <a href="<?= site_url('mechanic/master_user'); ?>">
       <div class="parent-icon"><i class='bx bx-user'></i>
       </div>
       <div class="menu-title">Master User</div>
      </a>
     </li>
     <li class="menu-label ms-2">Mechanic Process</li>
     <li>
      <a href="<?= site_url('mechanic/machine_breakdown_monitoring'); ?>">
       <div class="parent-icon"><i class='bx bx-cog'></i>
       </div>
       <div class="menu-title">Machine Breakdown Monitoring</i></div>
      </a>
     </li>
     <li>
      <a href="<?= site_url('mechanic/clearing_machine_breakdown'); ?>">
       <div class="parent-icon"><i class='bx bx-check-circle'></i>
       </div>
       <div class="menu-title">Clearing Machine Breakdown</i></div>
      </a>
     </li>
    </ul>
   </li>

   <!-- Packing -->
   <li>
    <a class="has-arrow" href="javascript:;">
     <div class="parent-icon"><i class='bx bx-package'></i>
     </div>
     <div class="menu-title">Packing</div>
    </a>
    <ul>
     <li class="menu-label ms-2">Home</li>
     <li>
      <a href="<?= base_url('packing/dashboard'); ?>">
       <div class="parent-icon"><i class='bx bxs-dashboard'></i>
       </div>
       <div class="menu-title">Dashboard</div>
      </a>

     </li>

     <li class="menu-label ms-2">Master</li>
     <li>
      <a href="javascript:;" class="has-arrow">
       <div class="parent-icon"><i class='bx bx-book'></i>
       </div>
       <div class="menu-title">Master Packing</div>
      </a>
      <ul>
       <li> <a href="<?= base_url('packing/packing_member'); ?>"><i class='bx bx-user'></i>Packing Member</a><span class=""></span>
       </li>
       <li> <a href="<?= base_url('packing/capacity_box'); ?>"><i class='bx bxs-inbox'></i>Solid Packing Box Capacity </a>
       </li>

      </ul>
     </li>

     <li class="menu-label ms-2">Entry Packing</li>
     <li>
      <a class="has-arrow" href="javascript:;">
       <div class="parent-icon">
        <i class='bx bx-book-add'></i>
       </div>
       <div class="menu-title">Entry Packing</div>
      </a>
      <ul>
       <li> <a href="<?= base_url('packing/packing_solid'); ?>"><i class='bx bx-file'></i>Solid Packing</a>
       </li>
       <li> <a href="<?= base_url('packing/packing_mixed'); ?>"><i class='bx bx-file'></i>Mixed Size Packing</a>
       </li>

      </ul>
     </li>

     <li class="menu-label ms-2">Packing Prosess</li>
     <li>
      <a class="has-arrow" href="javascript:;">
       <div class="parent-icon"><i class='bx bx-package'></i>
       </div>
       <div class="menu-title">Packing Process</div>
      </a>
      <ul>
       <li> <a href="<?= base_url('packing/output_packing'); ?>"><i class="lni lni-pointer-right"></i>Output Packing</a>
       </li>
      </ul>
     </li>

     <li class="menu-label ms-2">Pre Shipment/Finish Good</li>
     <li>
      <a class="has-arrow" href="javascript:;">
       <div class="parent-icon"><i class='bx bxs-ship'></i>
       </div>
       <div class="menu-title">Finish Good</div>
      </a>
      <ul>
       <li> <a href="<?= base_url('packing/find_orc_position'); ?>"><i class="lni lni-pointer-right"></i>Find ORC Position</a>
       </li>
       <li> <a href="<?= base_url('packing/transfer_area_in'); ?>"><i class="lni lni-pointer-right"></i>In</a>
       </li>
       <li> <a href="<?= base_url('packing/transfer_area_out'); ?>"><i class="lni lni-pointer-right"></i>Out</a>
       </li>
       <li> <a href="<?= base_url('packing/output_packing_mixed'); ?>"><i class="lni lni-pointer-right"></i>Output Mixed Size</a>
       </li>

      </ul>
     </li>

     <li class="menu-label ms-2">Report</li>
     <li>
      <a class="has-arrow" href="javascript:;">
       <div class="parent-icon"><i class='bx bxs-report'></i>
       </div>
       <div class="menu-title">Packing Report</div>
      </a>
      <ul>
       <li> <a href="<?= base_url('packing/report_daily_packing'); ?>"><i class='bx bxs-report'></i></i>Daily Packing Line</a>
       </li>
       <li> <a href="<?= base_url('packing/report_orc_packing'); ?>"><i class='bx bxs-report'></i></i>Packing ORC</a>
       </li>
       <li> <a href="<?= base_url('packing/report_daily_summary'); ?>"><i class="lni lni-files"></i>Daily Summary Packing</a>
       </li>
       <li> <a href="<?= base_url('packing/report_packing_hourly'); ?>"><i class="lni lni-files"></i>Packing Hourly</a>
       </li>
       <li> <a href="<?= base_url('packing/report_wip'); ?>"><i class="lni lni-files"></i>WIP Packing</a>
       </li>
       <li> <a href="<?= base_url('packing/report_fg_in'); ?>"><i class="lni lni-files"></i>Finish Good IN</a>
       </li>
       <li> <a href="<?= base_url('packing/report_fg_out'); ?>"><i class="lni lni-files"></i>Finish Good OUT</a>
       </li>
       <li> <a href="<?= base_url('packing/bundleRecord'); ?>"><i class='lni lni-files'></i>Bundle Record</a>
       </li>
      </ul>
     </li>
    </ul>
   </li>

  </ul>
  <!--end navigation-->
 </div>
 <!--end sidebar wrapper -->