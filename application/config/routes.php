<?php
defined('BASEPATH') or exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'auth';
$route['404_override'] = 'error404';
$route['translate_uri_dashes'] = FALSE;

// PPIC
// =========================================================================================
$route['ppic/dashboard'] = 'ppic/dashboard';
$route['ppic/dashboard/(:any)'] = 'ppic/dashboard/$1';
$route['ppic/dashboard/(:any)/(:any)'] = 'ppic/dashboard/$1/$2';
$route['ppic/dashboard/(:any)/(:any)/(:any)'] = 'ppic/dashboard/$1/$2/$3';

$route['ppic/master_order'] = 'ppic/master_order';
$route['ppic/master_order/(:any)'] = 'ppic/master_order/$1';
$route['ppic/master_order/(:any)/(:any)'] = 'ppic/master_order/$1/$2';
$route['ppic/master_order/(:any)/(:any)/(:any)'] = 'ppic/master_order/$1/$2/$3';

$route['ppic/master_order_icon'] = 'ppic/master_order_icon';
$route['ppic/master_order_icon/(:any)'] = 'ppic/master_order_icon/$1';
$route['ppic/master_order_icon/(:any)/(:any)'] = 'ppic/master_order_icon/$1/$2';
$route['ppic/master_order_icon/(:any)/(:any)/(:any)'] = 'ppic/master_order_icon/$1/$2/$3';

$route['ppic/order_allocation'] = 'ppic/order_allocation';
$route['ppic/order_allocation/(:any)'] = 'ppic/order_allocation/$1';
$route['ppic/order_allocation/(:any)/(:any)'] = 'ppic/order_allocation/$1/$2';
$route['ppic/order_allocation/(:any)/(:any)/(:any)'] = 'ppic/order_allocation/$1/$2/$3';

$route['ppic/production_planning'] = 'ppic/production_planning';
$route['ppic/production_planning/(:any)'] = 'ppic/production_planning/$1';
$route['ppic/production_planning/(:any)/(:any)'] = 'ppic/production_planning/$1/$2';
$route['ppic/production_planning/(:any)/(:any)/(:any)'] = 'ppic/production_planning/$1/$2/$3';

$route['ppic/production_report'] = 'ppic/production_report';
$route['ppic/production_report/(:any)'] = 'ppic/production_report/$1';
$route['ppic/production_report/(:any)/(:any)'] = 'ppic/production_report/$1/$2';
$route['ppic/production_report/(:any)/(:any)/(:any)'] = 'ppic/production_report/$1/$2/$3';

$route['ppic/production_report_new'] = 'ppic/production_report_new';
$route['ppic/production_report_new/(:any)'] = 'ppic/production_report_new/$1';
$route['ppic/production_report_new/(:any)/(:any)'] = 'ppic/production_report_new/$1/$2';
$route['ppic/production_report_new/(:any)/(:any)/(:any)'] = 'ppic/production_report_new/$1/$2/$3';


// =========================================================================================





// Cutting
// =========================================================================================
$route['cutting/dashboard'] = 'cutting/dashboard';
$route['cutting/dashboard/(:any)'] = 'cutting/dashboard/$1';
$route['cutting/dashboard/(:any)/(:any)'] = 'cutting/dashboard/$1/$2';
$route['cutting/dashboard/(:any)/(:any)/(:any)'] = 'cutting/dashboard/$1/$2/$3';

$route['cutting/work_order'] = 'cutting/workOrder';
$route['cutting/work_order'] = 'cutting/workOrder/$1';
$route['cutting/work_order'] = 'cutting/workOrder/$1/$2';
$route['cutting/work_order'] = 'cutting/workOrder/$1/$2/$3';

$route['cutting/create_work_order'] = 'cutting/createWorkOrder';
$route['cutting/create_work_order'] = 'cutting/createWorkOrder/$1';
$route['cutting/create_work_order'] = 'cutting/createWorkOrder/$1/$2';
$route['cutting/create_work_order'] = 'cutting/createWorkOrder/$1/$2/$3';

$route['cutting/bundle_cutting'] = 'cutting/bundleCutting';
$route['cutting/bundle_cutting/(:any)'] = 'cutting/bundleCutting/$1';
$route['cutting/bundle_cutting/(:any)/(:any)'] = 'cutting/bundleCutting/$1/$2';
$route['cutting/bundle_cutting/(:any)/(:any)/(:any)'] = 'cutting/bundleCutting/$1/$2/$3';

$route['cutting/input_trimstore'] = 'cutting/inputCutting';
$route['cutting/input_trimstore/(:any)'] = 'cutting/inputCutting/$1';
$route['cutting/input_trimstore/(:any)/(:any)'] = 'cutting/inputCutting/$1/$2';
$route['cutting/input_trimstore/(:any)/(:any)/(:any)'] = 'cutting/inputCutting/$1/$2/$3';

$route['cutting/output_trimstore'] = 'cutting/outputCutting';
$route['cutting/output_trimstore/(:any)'] = 'cutting/outputCutting/$1';
$route['cutting/output_trimstore/(:any)/(:any)'] = 'cutting/outputCutting/$1/$2';
$route['cutting/output_trimstore/(:any)/(:any)/(:any)'] = 'cutting/outputCutting/$1/$2/$3';

$route['cutting/print_bundle_cutting'] = 'cutting/printBundleCutting';
$route['cutting/print_bundle_cutting/(:any)'] = 'cutting/printBundleCutting/$1';
$route['cutting/print_bundle_cutting/(:any)/(:any)'] = 'cutting/printBundleCutting/$1/$2';
$route['cutting/print_bundle_cutting/(:any)/(:any)/(:any)'] = 'cutting/printBundleCutting/$1/$2/$3';

$route['cutting/print_bundle_molding'] = 'cutting/printBundleMolding';
$route['cutting/print_bundle_molding/(:any)'] = 'cutting/printBundleMolding/$1';
$route['cutting/print_bundle_molding/(:any)/(:any)'] = 'cutting/printBundleMolding/$1/$2';
$route['cutting/print_bundle_molding/(:any)/(:any)/(:any)'] = 'cutting/printBundleMolding/$1/$2/$3';

$route['cutting/print_bundle_panty'] = 'cutting/printBundlePanty';
$route['cutting/print_bundle_panty/(:any)'] = 'cutting/printBundlePanty/$1';
$route['cutting/print_bundle_panty/(:any)/(:any)'] = 'cutting/printBundlePanty/$1/$2';
$route['cutting/print_bundle_panty/(:any)/(:any)/(:any)'] = 'cutting/printBundlePanty/$1/$2/$3';

$route['cutting/print_bundle_skp'] = 'cutting/printBundleSkp';
$route['cutting/print_bundle_skp/(:any)'] = 'cutting/printBundleSkp/$1';
$route['cutting/print_bundle_skp/(:any)/(:any)'] = 'cutting/printBundleSkp/$1/$2';
$route['cutting/print_bundle_skp/(:any)/(:any)/(:any)'] = 'cutting/printBundleSkp/$1/$2/$3';

$route['cutting/print_bundle_juwita'] = 'cutting/printBundleJuwita';
$route['cutting/print_bundle_juwita/(:any)'] = 'cutting/printBundleJuwita/$1';
$route['cutting/print_bundle_juwita/(:any)/(:any)'] = 'cutting/printBundleJuwita/$1/$2';
$route['cutting/print_bundle_juwita/(:any)/(:any)/(:any)'] = 'cutting/printBundleJuwita/$1/$2/$3';

$route['cutting/bundle_record'] = 'cutting/bundleRecord';
$route['cutting/bundle_record/(:any)'] = 'cutting/bundleRecord/$1';
$route['cutting/bundle_record/(:any)/(:any)'] = 'cutting/bundleRecord/$1/$2';
$route['cutting/bundle_record/(:any)/(:any)/(:any)'] = 'cutting/bundleRecord/$1/$2/$3';

$route['cutting/report_wip'] = 'cutting/reportWip';
$route['cutting/report_wip/(:any)'] = 'cutting/reportWip/$1';
$route['cutting/report_wip/(:any)/(:any)'] = 'cutting/reportWip/$1/$2';
$route['cutting/report_wip/(:any)/(:any)/(:any)'] = 'cutting/reportWip/$1/$2/$3';

$route['cutting/report_cutting_today'] = 'cutting/reportCuttingtoday';
$route['cutting/report_cutting_today/(:any)'] = 'cutting/reportCuttingtoday/$1';
$route['cutting/report_cutting_today/(:any)/(:any)'] = 'cutting/reportCuttingtoday/$1/$2';
$route['cutting/report_cutting_today/(:any)/(:any)/(:any)'] = 'cutting/reportCuttingtoday/$1/$2/$3';

$route['cutting/report_cutting_summary'] = 'cutting/reportCuttingSummary';
$route['cutting/report_cutting_summary/(:any)'] = 'cutting/reportCuttingSummary/$1';
$route['cutting/report_cutting_summary/(:any)/(:any)'] = 'cutting/reportCuttingSummary/$1/$2';
$route['cutting/report_cutting_summary/(:any)/(:any)/(:any)'] = 'cutting/reportCuttingSummary/$1/$2/$3';

// =========================================================================================





// Molding
// =========================================================================================
$route['molding/dashboard'] = 'molding/dashboard';
$route['molding/dashboard/(:any)'] = 'molding/dashboard/$1';
$route['molding/dashboard/(:any)/(:any)'] = 'molding/dashboard/$1/$2';
$route['molding/dashboard/(:any)/(:any)/(:any)'] = 'molding/dashboard/$1/$2/$3';

$route['molding/input_molding'] = 'molding/input_molding';
$route['molding/input_molding/(:any)'] = 'molding/input_molding/$1';
$route['molding/input_molding/(:any)/(:any)'] = 'molding/input_molding/$1/$2';
$route['molding/input_molding/(:any)/(:any)/(:any)'] = 'molding/input_molding/$1/$2/$3';

$route['molding/output_molding'] = 'molding/output_molding';
$route['molding/output_molding/(:any)'] = 'molding/output_molding/$1';
$route['molding/output_molding/(:any)/(:any)'] = 'molding/output_molding/$1/$2';
$route['molding/output_molding/(:any)/(:any)/(:any)'] = 'molding/output_molding/$1/$2/$3';
// =========================================================================================



// Sewing
// =========================================================================================
$route['sewing/dashboard'] = 'sewing/dashboard';
$route['sewing/dashboard/(:any)'] = 'sewing/dashboard/$1';
$route['sewing/dashboard/(:any)/(:any)'] = 'sewing/dashboard/$1/$2';
$route['sewing/dashboard/(:any)/(:any)/(:any)'] = 'sewing/dashboard/$1/$2/$3';

$route['sewing/qc_endline'] = 'sewing/qc_endline';
$route['sewing/qc_endline/(:any)'] = 'sewing/qc_endline/$1';
$route['sewing/qc_endline/(:any)/(:any)'] = 'sewing/qc_endline/$1/$2';
$route['sewing/qc_endline/(:any)/(:any)/(:any)'] = 'sewing/qc_endline/$1/$2/$3';

$route['sewing/input_sewing'] = 'sewing/input_sewing';
$route['sewing/input_sewing/(:any)'] = 'sewing/input_sewing/$1';
$route['sewing/input_sewing/(:any)/(:any)'] = 'sewing/input_sewing/$1/$2';
$route['sewing/input_sewing/(:any)/(:any)/(:any)'] = 'sewing/input_sewing/$1/$2/$3';

$route['sewing/ubah_input_sewing'] = 'sewing/ubah_input_sewing';
$route['sewing/ubah_input_sewing/(:any)'] = 'sewing/ubah_input_sewing/$1';
$route['sewing/ubah_input_sewing/(:any)/(:any)'] = 'sewing/ubah_input_sewing/$1/$2';
$route['sewing/ubah_input_sewing/(:any)/(:any)/(:any)'] = 'sewing/ubah_input_sewing/$1/$2/$3';

$route['sewing/output_sewing'] = 'sewing/output_sewing';
$route['sewing/output_sewing/(:any)'] = 'sewing/output_sewing/$1';
$route['sewing/output_sewing/(:any)/(:any)'] = 'sewing/output_sewing/$1/$2';
$route['sewing/output_sewing/(:any)/(:any)/(:any)'] = 'sewing/output_sewing/$1/$2/$3';

$route['sewing/machine_breakdown'] = 'sewing/machine_breakdown';
$route['sewing/machine_breakdown/(:any)'] = 'sewing/machine_breakdown/$1';
$route['sewing/machine_breakdown/(:any)/(:any)'] = 'sewing/machine_breakdown/$1/$2';
$route['sewing/machine_breakdown/(:any)/(:any)/(:any)'] = 'sewing/machine_breakdown/$1/$2/$3';

$route['sewing/bundle_record'] = 'sewing/bundle_record';
$route['sewing/bundle_record/(:any)'] = 'sewing/bundle_record/$1';
$route['sewing/bundle_record/(:any)/(:any)'] = 'sewing/bundle_record/$1/$2';
$route['sewing/bundle_record/(:any)/(:any)/(:any)'] = 'sewing/bundle_record/$1/$2/$3';

$route['sewing/report_sewing'] = 'sewing/report_sewing';
$route['sewing/report_sewing/(:any)'] = 'sewing/report_sewing/$1';
$route['sewing/report_sewing/(:any)/(:any)'] = 'sewing/report_sewing/$1/$2';
$route['sewing/report_sewing/(:any)/(:any)/(:any)'] = 'sewing/report_sewing/$1/$2/$3';

// =========================================================================================


// Packing
// =========================================================================================
$route['packing/dashboard'] = 'packing/dashboard';
$route['packing/dashboard/(:any)'] = 'packing/dashboard/$1';
$route['packing/dashboard/(:any)/(:any)'] = 'packing/dashboard/$1/$2';
$route['packing/dashboard/(:any)/(:any)/(:any)'] = 'packing/dashboard/$1/$2/$3';

$route['packing/packing_member'] = 'packing/packing_member';
$route['packing/packing_member/(:any)'] = 'packing/packing_member/$1';
$route['packing/packing_member/(:any)/(:any)'] = 'packing/packing_member/$1/$2';
$route['packing/packing_member/(:any)/(:any)/(:any)'] = 'packing/packing_member/$1/$2/$3';

$route['packing/capacity_box'] = 'packing/capacity_box';
$route['packing/capacity_box/(:any)'] = 'packing/capacity_box/$1';
$route['packing/capacity_box/(:any)/(:any)'] = 'packing/capacity_box/$1/$2';
$route['packing/capacity_box/(:any)/(:any)/(:any)'] = 'packing/capacity_box/$1/$2/$3';

$route['packing/packing_solid'] = 'packing/packing_solid';
$route['packing/packing_solid/(:any)'] = 'packing/packing_solid/$1';
$route['packing/packing_solid/(:any)/(:any)'] = 'packing/packing_solid/$1/$2';
$route['packing/packing_solid/(:any)/(:any)/(:any)'] = 'packing/packing_solid/$1/$2/$3';

$route['packing/packing_mixed'] = 'packing/packing_mixed';
$route['packing/packing_mixed/(:any)'] = 'packing/packing_mixed/$1';
$route['packing/packing_mixed/(:any)/(:any)'] = 'packing/packing_mixed/$1/$2';
$route['packing/packing_mixed/(:any)/(:any)/(:any)'] = 'packing/packing_mixed/$1/$2/$3';

$route['packing/output_packing'] = 'packing/output_packing';
$route['packing/output_packing/(:any)'] = 'packing/output_packing/$1';
$route['packing/output_packing/(:any)/(:any)'] = 'packing/output_packing/$1/$2';
$route['packing/output_packing/(:any)/(:any)/(:any)'] = 'packing/output_packing/$1/$2/$3';

$route['packing/output_packing_mixed'] = 'packing/output_packing_mixed';
$route['packing/output_packing_mixed/(:any)'] = 'packing/output_packing_mixed/$1';
$route['packing/output_packing_mixed/(:any)/(:any)'] = 'packing/output_packing_mixed/$1/$2';
$route['packing/output_packing_mixed/(:any)/(:any)/(:any)'] = 'packing/output_packing_mixed/$1/$2/$3';

$route['packing/find_orc_position'] = 'packing/cekPosisiORC';
$route['packing/find_orc_position/(:any)'] = 'packing/cekPosisiORC/$1';
$route['packing/find_orc_position/(:any)/(:any)'] = 'packing/cekPosisiORC/$1/$2';
$route['packing/find_orc_position/(:any)/(:any)/(:any)'] = 'packing/cekPosisiORC/$1/$2/$3';

$route['packing/transfer_area_in'] = 'packing/transferAreaInput';
$route['packing/transfer_area_in/(:any)'] = 'packing/transferAreaInput/$1';
$route['packing/transfer_area_in/(:any)/(:any)'] = 'packing/transferAreaInput/$1/$2';
$route['packing/transfer_area_in/(:any)/(:any)/(:any)'] = 'packing/transferAreaInput/$1/$2/$3';

$route['packing/transfer_area_out'] = 'packing/transferAreaOutput';
$route['packing/transfer_area_out/(:any)'] = 'packing/transferAreaOutput/$1';
$route['packing/transfer_area_out/(:any)/(:any)'] = 'packing/transferAreaOutput/$1/$2';
$route['packing/transfer_area_out/(:any)/(:any)/(:any)'] = 'packing/transferAreaOutput/$1/$2/$3';

$route['packing/report'] = 'packing/report_daily_packing';
$route['packing/report/(:any)'] = 'packing/report_daily_packing/$1';
$route['packing/report/(:any)/(:any)'] = 'packing/report_daily_packing/$1/$2';
$route['packing/report/(:any)/(:any)/(:any)'] = 'packing/report_daily_packing/$1/$2/$3';

$route['packing/report'] = 'packing/report_orc_packing';
$route['packing/report/(:any)'] = 'packing/report_orc_packing/$1';
$route['packing/report/(:any)/(:any)'] = 'packing/report_orc_packing/$1/$2';
$route['packing/report/(:any)/(:any)/(:any)'] = 'packing/report_orc_packing/$1/$2/$3';
// =========================================================================================


// Mechanic
// =========================================================================================
$route['mechanic/dashboard'] = 'mechanic/dashboard';
$route['mechanic/dashboard/(:any)'] = 'mechanic/dashboard/$1';
$route['mechanic/dashboard/(:any)/(:any)'] = 'mechanic/dashboard/$1/$2';
$route['mechanic/dashboard/(:any)/(:any)/(:any)'] = 'mechanic/dashboard/$1/$2/$3';

$route['mechanic/master_user'] = 'mechanic/master_user';
$route['mechanic/master_user/(:any)'] = 'mechanic/master_user/$1';
$route['mechanic/master_user/(:any)/(:any)'] = 'mechanic/master_user/$1/$2';
$route['mechanic/master_user/(:any)/(:any)/(:any)'] = 'mechanic/master_user/$1/$2/$3';

$route['mechanic/machine_breakdown_monitoring'] = 'mechanic/machine_breakdown_monitoring';
$route['mechanic/machine_breakdown_monitoring/(:any)'] = 'mechanic/machine_breakdown_monitoring/$1';
$route['mechanic/machine_breakdown_monitoring/(:any)/(:any)'] = 'mechanic/machine_breakdown_monitoring/$1/$2';
$route['mechanic/machine_breakdown_monitoring/(:any)/(:any)/(:any)'] = 'mechanic/machine_breakdown_monitoring/$1/$2/$3';

$route['mechanic/delayed_machine_settlement'] = 'mechanic/delayed_machine_settlement';
$route['mechanic/delayed_machine_settlement/(:any)'] = 'mechanic/delayed_machine_settlement/$1';
$route['mechanic/delayed_machine_settlement/(:any)/(:any)'] = 'mechanic/delayed_machine_settlement/$1/$2';
$route['mechanic/delayed_machine_settlement/(:any)/(:any)/(:any)'] = 'mechanic/delayed_machine_settlement/$1/$2/$3';

$route['mechanic/clearing_machine_breakdown'] = 'mechanic/clearing_machine_breakdown';
$route['mechanic/clearing_machine_breakdown/(:any)'] = 'mechanic/clearing_machine_breakdown/$1';
$route['mechanic/clearing_machine_breakdown/(:any)/(:any)'] = 'mechanic/clearing_machine_breakdown/$1/$2';
$route['mechanic/clearing_machine_breakdown/(:any)/(:any)/(:any)'] = 'mechanic/clearing_machine_breakdown/$1/$2/$3';
// =========================================================================================



// IE
// =========================================================================================
$route['ie/dashboard'] = 'ie/dashboard';
$route['ie/dashboard/(:any)'] = 'ie/dashboard/$1';
$route['ie/dashboard/(:any)/(:any)'] = 'ie/dashboard/$1/$2';
$route['ie/dashboard/(:any)/(:any)/(:any)'] = 'ie/dashboard/$1/$2/$3';

$route['ie/master_sam'] = 'ie/master_sam';
$route['ie/master_sam/(:any)'] = 'ie/master_sam/$1';
$route['ie/master_sam/(:any)/(:any)'] = 'ie/master_sam/$1/$2';
$route['ie/master_sam/(:any)/(:any)/(:any)'] = 'ie/master_sam/$1/$2/$3';

$route['ie/master_sam_new'] = 'ie/master_sam_new';
$route['ie/master_sam_new/(:any)'] = 'ie/master_sam_new/$1';
$route['ie/master_sam_new/(:any)/(:any)'] = 'ie/master_sam_new/$1/$2';
$route['ie/master_sam_new/(:any)/(:any)/(:any)'] = 'ie/master_sam_new/$1/$2/$3';

// =========================================================================================



// MANAGER
// =========================================================================================
$route['manager/dashboard'] = 'manager/dashboard';
$route['manager/dashboard/(:any)'] = 'manager/dashboard/$1';
$route['manager/dashboard/(:any)/(:any)'] = 'manager/dashboard/$1/$2';
$route['manager/dashboard/(:any)/(:any)/(:any)'] = 'manager/dashboard/$1/$2/$3';

$route['manager/cutting'] = 'manager/cuttingOrc';
$route['manager/cutting/(:any)'] = 'manager/cuttingOrc/$1';
$route['manager/cutting/(:any)/(:any)'] = 'manager/cuttingOrc/$1/$2';
$route['manager/cutting/(:any)/(:any)/(:any)'] = 'manager/cuttingOrc/$1/$2/$3';

$route['manager/cutting'] = 'manager/cuttingSummary';
$route['manager/cutting/(:any)'] = 'manager/cuttingSummary/$1';
$route['manager/cutting/(:any)/(:any)'] = 'manager/cuttingSummary/$1/$2';
$route['manager/cutting/(:any)/(:any)/(:any)'] = 'manager/cuttingSummary/$1/$2/$3';

$route['manager/cutting'] = 'manager/cuttingWip';
$route['manager/cutting/(:any)'] = 'manager/cuttingWip/$1';
$route['manager/cutting/(:any)/(:any)'] = 'manager/cuttingWip/$1/$2';
$route['manager/cutting/(:any)/(:any)/(:any)'] = 'manager/cuttingWip/$1/$2/$3';

$route['manager/cutting'] = 'manager/cuttingToday';
$route['manager/cutting/(:any)'] = 'manager/cuttingToday/$1';
$route['manager/cutting/(:any)/(:any)'] = 'manager/cuttingToday/$1/$2';
$route['manager/cutting/(:any)/(:any)/(:any)'] = 'manager/cuttingToday/$1/$2/$3';

$route['manager/cutting'] = 'manager/cuttingBySize';
$route['manager/cutting/(:any)'] = 'manager/cuttingBySize/$1';
$route['manager/cutting/(:any)/(:any)'] = 'manager/cuttingBySize/$1/$2';
$route['manager/cutting/(:any)/(:any)/(:any)'] = 'manager/cuttingBySize/$1/$2/$3';


$route['manager/molding'] = 'manager/moldingByDate';
$route['manager/molding/(:any)'] = 'manager/moldingByDate/$1';
$route['manager/molding/(:any)/(:any)'] = 'manager/moldingByDate/$1/$2';
$route['manager/molding/(:any)/(:any)/(:any)'] = 'manager/moldingByDate/$1/$2/$3';

$route['manager/molding'] = 'manager/moldingSummary';
$route['manager/molding/(:any)'] = 'manager/moldingSummary/$1';
$route['manager/molding/(:any)/(:any)'] = 'manager/moldingSummary/$1/$2';
$route['manager/molding/(:any)/(:any)/(:any)'] = 'manager/moldingSummary/$1/$2/$3';

$route['manager/molding'] = 'manager/moldingDaily';
$route['manager/molding/(:any)'] = 'manager/moldingDaily/$1';
$route['manager/molding/(:any)/(:any)'] = 'manager/moldingDaily/$1/$2';
$route['manager/molding/(:any)/(:any)/(:any)'] = 'manager/moldingDaily/$1/$2/$3';


$route['manager/sewing'] = 'manager/sewingDaily';
$route['manager/sewing/(:any)'] = 'manager/sewingDaily/$1';
$route['manager/sewing/(:any)/(:any)'] = 'manager/sewingDaily/$1/$2';
$route['manager/sewing/(:any)/(:any)/(:any)'] = 'manager/sewingDaily/$1/$2/$3';

$route['manager/sewing'] = 'manager/sewingSummaryOrc';
$route['manager/sewing/(:any)'] = 'manager/sewingSummaryOrc/$1';
$route['manager/sewing/(:any)/(:any)'] = 'manager/sewingSummaryOrc/$1/$2';
$route['manager/sewing/(:any)/(:any)/(:any)'] = 'manager/sewingSummaryOrc/$1/$2/$3';

$route['manager/sewing'] = 'manager/sewingBySize';
$route['manager/sewing/(:any)'] = 'manager/sewingBySize/$1';
$route['manager/sewing/(:any)/(:any)'] = 'manager/sewingBySize/$1/$2';
$route['manager/sewing/(:any)/(:any)/(:any)'] = 'manager/sewingBySize/$1/$2/$3';

$route['manager/sewing'] = 'manager/sewingSummaryLine';
$route['manager/sewing/(:any)'] = 'manager/sewingSummaryLine/$1';
$route['manager/sewing/(:any)/(:any)'] = 'manager/sewingSummaryLine/$1/$2';
$route['manager/sewing/(:any)/(:any)/(:any)'] = 'manager/sewingSummaryLine/$1/$2/$3';

$route['manager/sewing'] = 'manager/sewingToday';
$route['manager/sewing/(:any)'] = 'manager/sewingToday/$1';
$route['manager/sewing/(:any)/(:any)'] = 'manager/sewingToday/$1/$2';
$route['manager/sewing/(:any)/(:any)/(:any)'] = 'manager/sewingToday/$1/$2/$3';


$route['manager/packing'] = 'manager/packingByDate';
$route['manager/packing/(:any)'] = 'manager/packingByDate/$1';
$route['manager/packing/(:any)/(:any)'] = 'manager/packingByDate/$1/$2';
$route['manager/packing/(:any)/(:any)/(:any)'] = 'manager/packingByDate/$1/$2/$3';

$route['manager/packing'] = 'manager/packingSummary';
$route['manager/packing/(:any)'] = 'manager/packingSummary/$1';
$route['manager/packing/(:any)/(:any)'] = 'manager/packingSummary/$1/$2';
$route['manager/packing/(:any)/(:any)/(:any)'] = 'manager/packingSummary/$1/$2/$3';

$route['manager/packing'] = 'manager/packingOrc';
$route['manager/packing/(:any)'] = 'manager/packingOrc/$1';
$route['manager/packing/(:any)/(:any)'] = 'manager/packingOrc/$1/$2';
$route['manager/packing/(:any)/(:any)/(:any)'] = 'manager/packingOrc/$1/$2/$3';

$route['manager/packing'] = 'manager/packingWip';
$route['manager/packing/(:any)'] = 'manager/packingWip/$1';
$route['manager/packing/(:any)/(:any)'] = 'manager/packingWip/$1/$2';
$route['manager/packing/(:any)/(:any)/(:any)'] = 'manager/packingWip/$1/$2/$3';

$route['manager/fg'] = 'manager/allFinishGood';
$route['manager/fg/(:any)'] = 'manager/allFinishGood/$1';
$route['manager/fg/(:any)/(:any)'] = 'manager/allFinishGood/$1/$2';
$route['manager/fg/(:any)/(:any)/(:any)'] = 'manager/allFinishGood/$1/$2/$3';

$route['manager/fg'] = 'manager/FinishGoodIn';
$route['manager/fg/(:any)'] = 'manager/FinishGoodIn/$1';
$route['manager/fg/(:any)/(:any)'] = 'manager/FinishGoodIn/$1/$2';
$route['manager/fg/(:any)/(:any)/(:any)'] = 'manager/FinishGoodIn/$1/$2/$3';

$route['manager/fg'] = 'manager/FinishGoodOut';
$route['manager/fg/(:any)'] = 'manager/FinishGoodOut/$1';
$route['manager/fg/(:any)/(:any)'] = 'manager/FinishGoodOut/$1/$2';
$route['manager/fg/(:any)/(:any)/(:any)'] = 'manager/FinishGoodOut/$1/$2/$3';

$route['manager/bundle_record'] = 'manager/bundle_record';
$route['manager/bundle_record/(:any)'] = 'manager/bundle_record/$1';
$route['manager/bundle_record/(:any)/(:any)'] = 'manager/bundle_record/$1/$2';
$route['manager/bundle_record/(:any)/(:any)/(:any)'] = 'manager/bundle_record/$1/$2/$3';

$route['manager/date_range_line_per_hours'] = 'manager/date_range_line_per_hours';
$route['manager/date_range_line_per_hours/(:any)'] = 'manager/date_range_line_per_hours/$1';
$route['manager/date_range_line_per_hours/(:any)/(:any)'] = 'manager/date_range_line_per_hours/$1/$2';
$route['manager/date_range_line_per_hours/(:any)/(:any)/(:any)'] = 'manager/date_range_line_per_hours/$1/$2/$3';

$route['manager/compare_barcode'] = 'manager/compare_barcode';
$route['manager/compare_barcode/(:any)'] = 'manager/compare_barcode/$1';
$route['manager/compare_barcode/(:any)/(:any)'] = 'manager/compare_barcode/$1/$2';
$route['manager/compare_barcode/(:any)/(:any)/(:any)'] = 'manager/compare_barcode/$1/$2/$3';
// =========================================================================================

// Juwita
// =========================================================================================
$route['juwita/dashboard'] = 'juwita/dashboard';
$route['juwita/dashboard/(:any)'] = 'juwita/dashboard/$1';
$route['juwita/dashboard/(:any)/(:any)'] = 'juwita/dashboard/$1/$2';
$route['juwita/dashboard/(:any)/(:any)/(:any)'] = 'juwita/dashboard/$1/$2/$3';

$route['juwita/input_juwita'] = 'juwita/input_juwita';
$route['juwita/input_juwita/(:any)'] = 'juwita/input_juwita/$1';
$route['juwita/input_juwita/(:any)/(:any)'] = 'juwita/input_juwita/$1/$2';
$route['juwita/input_juwita/(:any)/(:any)/(:any)'] = 'juwita/input_juwita/$1/$2/$3';

$route['juwita/output_juwita'] = 'juwita/output_juwita';
$route['juwita/output_juwita/(:any)'] = 'juwita/output_juwita/$1';
$route['juwita/output_juwita/(:any)/(:any)'] = 'juwita/output_juwita/$1/$2';
$route['juwita/output_juwita/(:any)/(:any)/(:any)'] = 'juwita/output_juwita/$1/$2/$3';

$route['juwita/report'] = 'juwita/report';
$route['juwita/report/(:any)'] = 'juwita/report/$1';
$route['juwita/report/(:any)/(:any)'] = 'juwita/report/$1/$2';
$route['juwita/report/(:any)/(:any)/(:any)'] = 'juwita/report/$1/$2/$3';

// Outerwear
// =========================================================================================
$route['outerwear/second_dashboard'] = 'outerwear/second_dashboard';
$route['outerwear/second_dashboard/(:any)'] = 'outerwear/second_dashboard/$1';
$route['outerwear/second_dashboard/(:any)/(:any)'] = 'outerwear/second_dashboard/$1/$2';
$route['outerwear/second_dashboard/(:any)/(:any)/(:any)'] = 'outerwear/second_dashboard/$1/$2/$3';

// Head
// =========================================================================================
// $route['head/dashboard'] = 'head/dashboard';
// $route['head/dashboard/(:any)'] = 'head/dashboard/$1';
// $route['head/dashboard/(:any)/(:any)'] = 'head/dashboard/$1/$2';
// $route['head/dashboard/(:any)/(:any)/(:any)'] = 'head/dashboard/$1/$2/$3';

// Adm
// =========================================================================================
// $route['adm/dashboard'] = 'adm/dashboard';
// $route['adm/dashboard/(:any)'] = 'adm/dashboard/$1';
// $route['adm/dashboard/(:any)/(:any)'] = 'adm/dashboard/$1/$2';
// $route['adm/dashboard/(:any)/(:any)/(:any)'] = 'adm/dashboard/$1/$2/$3';
