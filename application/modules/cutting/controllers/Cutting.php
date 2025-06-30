<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Cutting extends MY_Controller
{



 public function __construct()
 {
  parent::__construct();


  if ((int)$this->session->userdata['role_gi_production'] !== 2 && (int)$this->session->userdata('role_gi_production') !== 1) {
   redirect('auth/not_allowed');
  }
  $this->load->library('curl'); // Load cURL library


  $this->load->model('CuttingModel');
 }

 // Dashboard
 // ==============================================================================
 public function dashboard()
 {
  $data['title'] = 'Dashboard | GI-Production';

  $role = $this->session->userdata('role_gi_production');

  $this->load->view('header', $data);
  if ($role == 1) {
   $this->load->view('admin/sidebarAdmin');
  } else {
   $this->load->view('cutting/sidebarCutting');
  }
  $this->load->view('navbar');
  $this->load->view('cutting/dashboard/dashboardView');
  $this->load->view('footer');
 }

 public function getTotalInputCutting()
 {
  $result = $this->CuttingModel->getDataTotalInputCutting();
  echo json_encode($result);
 }

 public function getTotalOutputCutting()
 {
  $result = $this->CuttingModel->getDataTotalOutputCutting();
  echo json_encode($result);
 }

 public function getInputCuttingChart()
 {
  $result = $this->CuttingModel->getDataInputCuttingChart();
  echo json_encode($result);
 }

 public function getOutputCuttingChart()
 {
  $result = $this->CuttingModel->getDataOutputCuttingChart();
  echo json_encode($result);
 }

 // ==============================================================================


 // Work Order
 // ==============================================================================
 public function workOrder()
 {
  $data['title'] = 'Work Order | GI-Production';

  $role = $this->session->userdata('role_gi_production');

  $this->load->view('header', $data);
  if ($role == 1) {
   $this->load->view('admin/sidebarAdmin');
  } else {
   $this->load->view('cutting/sidebarCutting');
  }
  $this->load->view('navbar');
  $this->load->view('cutting/create_work_order/create_work_order');
  $this->load->view('footer');
 }

 public function getWorkOrderMain()
 {
  $result['data'] = $this->CuttingModel->getDataWorkOrderMain();
  echo json_encode($result);
 }
 // ==============================================================================


 // Create Work Order
 // ==============================================================================
 public function createWorkOrder()
 {
  $data['title'] = 'Create Work Order | GI-Production';

  $role = $this->session->userdata('role_gi_production');

  $this->load->view('header', $data);
  if ($role == 1) {
   $this->load->view('admin/sidebarAdmin');
  } else {
   $this->load->view('cutting/sidebarCutting');
  }
  $this->load->view('navbar');
  $this->load->view('cutting/create_work_order/create_work_order_add');
  $this->load->view('footer');
 }

 public function getSalesOrder()
 {
  $result = $this->CuttingModel->getDataSalesOrder();
  echo json_encode($result);
 }

 public function getSalesOrderSize()
 {
  $id_order = $this->input->get('idOrder');

  $result['data'] = $this->CuttingModel->getDataSalesOrderSize($id_order);
  echo json_encode($result);
 }

 public function getSalesOrderSizeCreate()
 {
  $id_order = $this->input->get('sales_order');

  $result = $this->CuttingModel->getDataSalesOrderSize($id_order);
  echo json_encode($result);
 }


 public function postWorkOrder()
 {
  date_default_timezone_set("Asia/Jakarta");

  $rawData = file_get_contents("php://input");
  $jsonData = json_decode($rawData, true);

  $id_order = $jsonData['id_order'] ?? null;
  $orc = $jsonData['orc'] ?? null;
  $work_order = $jsonData['work_order'] ?? null;
  $size = $jsonData['size'] ?? [];
  $qty_size = $jsonData['qty_size'] ?? [];
  $allocation = $jsonData['allocation'] ?? null;
  $qty_allocation = $jsonData['qty_allocation'] ?? null;

  $work_order_parts = explode('-', $work_order);
  $work_order_code = end($work_order_parts);

  $data_main = [
   'id_master_order_icon_main' => $id_order ?? null,
   'orc' => $orc ?? null,
   'work_order' => $work_order ?? null,
   'work_order_code' => $work_order_code ?? null,
   'id_line' => $allocation ?? null,
   'qty_allocation' => $qty_allocation ?? null,
   'created_at' => date('Y-m-d H:i:s'),
  ];

  $id_work_order = $this->CuttingModel->postDataWorkOrderMain($data_main);

  foreach ($size as $index => $sizes) {
   $data_details = [
    'id_work_order' => $id_work_order,
    'size' => $sizes ?? null,
    'qty_size' => $qty_size[$index] ?? null
   ];

   $this->CuttingModel->postDataWorkOrderDetails($data_details);
  }

  echo json_encode(['status' => 'success', 'work_order_code' => $work_order_code]);
 }

 public function getWorkOrder()
 {
  $idOrder = $this->input->get('idOrder');

  $result['data'] = $this->CuttingModel->getDataWorkOrder($idOrder);
  echo json_encode($result);
 }

 public function getSizeDetails()
 {
  $id_work_order = $this->input->get('id_work_order');

  $result['data'] = $this->CuttingModel->getDataSizeDetails($id_work_order);
  echo json_encode($result);
 }

 public function getAllocation()
 {
  $result = $this->CuttingModel->getDataAllocation();
  echo json_encode($result);
 }

 public function getSalesOrderDetails()
 {
  $id_order = $this->input->get('sales_order');

  $result = $this->CuttingModel->getDataSalesOrderDetails($id_order);
  echo json_encode($result);
 }

 public function deleteWorkOrder()
 {
  date_default_timezone_set("Asia/Jakarta");

  $rawData = file_get_contents("php://input");
  $jsonData = json_decode($rawData, true);

  $id_work_order = $jsonData['id_work_order'] ?? null;
  $id_order = $jsonData['id_order'] ?? null;

  $this->CuttingModel->deleteDataWorkOrder($id_work_order);
  $this->CuttingModel->deleteDataWorkOrderDetails($id_work_order);

  $result = $this->CuttingModel->getDataWorkOrderCode($id_order);

  if ($result) {
   $work_order_code = $result[0]->work_order_code;
  } else {
   $work_order_code = null;
  }


  echo json_encode(['status' => 'success', 'work_order_code' => $work_order_code]);
 }

 // ==============================================================================



 public function bundleCutting()
 {
  $data['title'] = 'Create Bundle Barcode | GI-Production';

  $role = $this->session->userdata('role_gi_production');

  $this->load->view('header', $data);
  if ($role == 1) {
   $this->load->view('admin/sidebarAdmin');
  } else {
   $this->load->view('cutting/sidebarCutting');
  }
  $this->load->view('navbar');
  $this->load->view('cutting/create_bundle_barcode/create_bundle_barcode');
  // $this->load->view('cutting/bundleCutting');
  $this->load->view('footer');
 }
 // public function createWorkOrder()
 // {
 //  $data['title'] = 'Create Bundle Barcode | GI-Production';

 //  $role = $this->session->userdata('role_gi_production');

 //  $this->load->view('header', $data);
 //  if ($role == 1) {
 //   $this->load->view('admin/sidebarAdmin');
 //  } else {
 //   $this->load->view('cutting/sidebarCutting');
 //  }
 //  $this->load->view('navbar');
 //  $this->load->view('cutting/createWorkOrder');
 //  $this->load->view('footer');
 // }

 public function bundleCuttingIconsAdd()
 {
  $data['title'] = 'Create Bundle Barcode | GI-Production';

  $role = $this->session->userdata('role_gi_production');

  $this->load->view('header', $data);
  if ($role == 1) {
   $this->load->view('admin/sidebarAdmin');
  } else {
   $this->load->view('cutting/sidebarCutting');
  }
  $this->load->view('navbar');
  $this->load->view('cutting/create_bundle_barcode/create_bundle_barcode_add');
  // $this->load->view('cutting/bundleCuttingByIcon');
  $this->load->view('footer');
 }

 public function bundleCuttingIcons()
 {
  $data['title'] = 'Create Bundle Barcode | GI-Production';

  $role = $this->session->userdata('role_gi_production');

  $this->load->view('header', $data);
  if ($role == 1) {
   $this->load->view('admin/sidebarAdmin');
  } else {
   $this->load->view('cutting/sidebarCutting');
  }
  $this->load->view('navbar');
  $this->load->view('cutting/bundleIcon');
  $this->load->view('footer');
 }


 public function inputCutting()
 {
  $data['title'] = 'Scan Input Cutting | GI-Production';

  $role = $this->session->userdata('role_gi_production');

  $this->load->view('header', $data);
  if ($role == 1) {
   $this->load->view('admin/sidebarAdmin');
  } else {
   $this->load->view('cutting/sidebarCutting');
  }
  $this->load->view('navbar');
  $this->load->view('cutting/scan_barcode/scanInputCutting');
  $this->load->view('footer');
 }

 public function outputCutting()
 {
    $data['title'] = 'Scan Output Cutting | GI-Production';

    $role = $this->session->userdata('role_gi_production');

    $this->load->view('header', $data);
    if ($role == 1) {
    $this->load->view('admin/sidebarAdmin');
    } else {
    $this->load->view('cutting/sidebarCutting');
    }
    $this->load->view('navbar');
    $this->load->view('cutting/scan_barcode/scanOutputCutting');
    $this->load->view('footer');
 }

 public function addBundleCutting()
 {
  $data['title'] = 'Add Bundle Cutting | GI-Production';

  $role = $this->session->userdata('role_gi_production');

  $this->load->view('header', $data);
  if ($role == 1) {
   $this->load->view('admin/sidebarAdmin');
  } else {
   $this->load->view('cutting/sidebarCutting');
  }
  $this->load->view('navbar');
  $this->load->view('cutting/addBundleCutting');
  $this->load->view('footer');
 }

 public function printBundleCutting()
 {
  $data['title'] = 'Print Cutting Bundle | GI-Production';

  $role = $this->session->userdata('role_gi_production');

  $this->load->view('header_datatable_select', $data);
  if ($role == 1) {
   $this->load->view('admin/sidebarAdmin');
  } else {
   $this->load->view('cutting/sidebarCutting');
  }
  $this->load->view('navbar');
  $this->load->view('cutting/create_barcode/printBundleCutting');
  $this->load->view('footer');
 }

 // New Print Cutting V2
 // ====================================================================================
 public function print_bundle_cutting_v2()
 {
  $data['title'] = 'Print Cutting Bundle V2 | GI-Production';

  $role = $this->session->userdata('role_gi_production');

  $this->load->view('header_datatable_select', $data);
  if ($role == 1) {
   $this->load->view('admin/sidebarAdmin');
  } else {
   $this->load->view('cutting/sidebarCutting');
  }
  $this->load->view('navbar');
  $this->load->view('cutting/create_barcode/printBundleCuttingV2');
  $this->load->view('footer');
 }

 public function show_print_bundle_v2()
 {
  $data['title'] = 'Print Cutting Bundle V2 | GI-Production';

  $this->load->view('cutting/show_barcode/bundles_print_preview_v2');
 }
 // ====================================================================================

 public function printBundleMolding()
 {
  $data['title'] = 'Print Molding Bundle | GI-Production';

  $role = $this->session->userdata('role_gi_production');

  $this->load->view('header_datatable_select', $data);
  if ($role == 1) {
   $this->load->view('admin/sidebarAdmin');
  } else {
   $this->load->view('cutting/sidebarCutting');
  }
  $this->load->view('navbar');
  $this->load->view('cutting/create_barcode/printBundleMolding');
  $this->load->view('footer');
 }

 // New Print Molding V2
 // ====================================================================================
 public function print_bundle_molding_v2()
 {
  $data['title'] = 'Print Molding Bundle V2 | GI-Production';

  $role = $this->session->userdata('role_gi_production');

  $this->load->view('header_datatable_select', $data);
  if ($role == 1) {
   $this->load->view('admin/sidebarAdmin');
  } else {
   $this->load->view('cutting/sidebarCutting');
  }
  $this->load->view('navbar');
  $this->load->view('cutting/create_barcode/printBundleMoldingV2');
  $this->load->view('footer');
 }

 public function show_print_bundle_mold_v2()
 {
  $data['title'] = 'Print Molding Bundle V2 | GI-Production';

  $this->load->view('cutting/show_barcode/bundles_mold_print_preview_v2');
 }

 // ====================================================================================

 public function printBundlePanty()
 {
  $data['title'] = 'Print Panty Bundle | GI-Production';

  $role = $this->session->userdata('role_gi_production');

  $this->load->view('header_datatable_select', $data);
  if ($role == 1) {
   $this->load->view('admin/sidebarAdmin');
  } else {
   $this->load->view('cutting/sidebarCutting');
  }
  $this->load->view('navbar');
  $this->load->view('cutting/create_barcode/printBundlePanty');
  $this->load->view('footer');
 }

 public function show_print_bundle()
 {
  $data['title'] = 'Print Cutting Bundle | GI-Production';

  $this->load->view('header', $data);
  $this->load->view('cutting/show_barcode/bundles_print_preview');
  $this->load->view('footer_barcode');
 }

 public function show_print_bundle_mold()
 {
  $data['title'] = 'Print Molding Bundle | GI-Production';

  $this->load->view('header', $data);
  $this->load->view('cutting/show_barcode/bundles_mold_print_preview');
  $this->load->view('footer_barcode');
 }

 public function show_print_bundle_panty()
 {
  $data['title'] = 'Print Panty Bundle | GI-Production';

  $this->load->view('header', $data);
  $this->load->view('cutting/show_barcode/bundles_panty_print_preview');
  $this->load->view('footer_barcode');
 }
 public function show_print_bundle_juwita()
 {
  $data['title'] = 'Print Panty Bundle | GI-Production';

  $this->load->view('header', $data);
  $this->load->view('cutting/show_barcode/bundles_juwita_print_preview');
  $this->load->view('footer_barcode');
 }

 public function show_print_bundle_skp()
 {
  $data['title'] = 'Print Panty Bundle | GI-Production';

  $this->load->view('header', $data);
  $this->load->view('cutting/show_barcode/bundles_skp_print_preview');
  $this->load->view('footer_barcode');
 }

 public function bundleRecord()
 {
  $data['title'] = 'Bundle Record | GI-Production';

  $role = $this->session->userdata('role_gi_production');

  $this->load->view('header', $data);
  if ($role == 1) {
   $this->load->view('admin/sidebarAdmin');
  } else {
   $this->load->view('cutting/sidebarCutting');
  }
  $this->load->view('navbar');
  $this->load->view('cutting/report/bundle_record');
  $this->load->view('footer');
 }

 public function printBundleJuwita()
 {
  $data['title'] = 'Print Panty Bundle | GI-Production';

  $role = $this->session->userdata('role_gi_production');

  $this->load->view('header_datatable_select', $data);
  if ($role == 1) {
   $this->load->view('admin/sidebarAdmin');
  } else {
   $this->load->view('cutting/sidebarCutting');
  }
  $this->load->view('navbar');
  $this->load->view('cutting/create_barcode/printBundleJuwita');
  $this->load->view('footer');
 }

 public function printBundleSkp()
 {
  $data['title'] = 'Print Panty Bundle | GI-Production';

  $role = $this->session->userdata('role_gi_production');

  $this->load->view('header_datatable_select', $data);
  if ($role == 1) {
   $this->load->view('admin/sidebarAdmin');
  } else {
   $this->load->view('cutting/sidebarCutting');
  }
  $this->load->view('navbar');
  $this->load->view('cutting/create_barcode/printBundleSkp');
  $this->load->view('footer');
 }

 public function reportWip()
 {
  $data['title'] = 'WIP Cutting | GI-Production';

  $role = $this->session->userdata('role_gi_production');

  $this->load->view('header', $data);
  if ($role == 1) {
   $this->load->view('admin/sidebarAdmin');
  } else {
   $this->load->view('cutting/sidebarCutting');
  }
  $this->load->view('navbar');
  $this->load->view('cutting/report/wipSummary');
  $this->load->view('footer');
 }

 public function report_balance()
 {
  $data['title'] = 'Balance Cutting | GI-Production';

  $role = $this->session->userdata('role_gi_production');

  $this->load->view('header', $data);
  if ($role == 1) {
   $this->load->view('admin/sidebarAdmin');
  } else {
   $this->load->view('cutting/sidebarCutting');
  }
  $this->load->view('navbar');
  $this->load->view('cutting/report/balanceCutting');
  $this->load->view('footer');
 }

 public function reportCuttingtoday()
 {
  $data['title'] = 'Cutting Today | GI-Production';

  $role = $this->session->userdata('role_gi_production');

  $this->load->view('header', $data);
  if ($role == 1) {
   $this->load->view('admin/sidebarAdmin');
  } else {
   $this->load->view('cutting/sidebarCutting');
  }
  $this->load->view('navbar');
  $this->load->view('cutting/report/cuttingToday');
  $this->load->view('footer');
 }

 public function reportCuttingSummary()
 {
  $data['title'] = 'Summary Trimstore | GI-Production';

  $role = $this->session->userdata('role_gi_production');

  $this->load->view('header', $data);
  if ($role == 1) {
   $this->load->view('admin/sidebarAdmin');
  } else {
   $this->load->view('cutting/sidebarCutting');
  }
  $this->load->view('navbar');
  $this->load->view('cutting/report/trimstoreSummary');
  $this->load->view('footer');
 }

 function get_bundle()
 {
  $data['data'] = $this->CuttingModel->get_bundle();
  echo json_encode($data);
 }

 function get_detail_bundle()
 {

  $data['data'] = $this->CuttingModel->get_detail_bundle();
  $datas = json_encode($data);
  echo $datas;
 }

 function ajaxDeleteData()
 {
  $orc = $this->input->post('orc');

  $data = $this->CuttingModel->delete_by_orc($orc);
  echo json_encode($data);
 }

 public function get_orc()
 {
  $result = $this->CuttingModel->get_orc();
  // var_dump($result);
  echo json_encode($result);
 }

 public function get_orc_bundle_icon()
 {
  $result = $this->CuttingModel->get_orc_bundle_icon();
  echo json_encode($result);
 }

 public function get_orc_icon()
 {
  // API endpoint URL
//   $api_url = "http://icons.globalindointimates.id:8099/api?action=get_all_orc";
  $api_url = "http://192.168.92.250:8099/api?action=get_all_orc";

  // Get the API response
  $response = $this->curl->simple_get($api_url);

  // Decode the JSON response
  $data = json_decode($response, true);
  // Send response as JSON
  echo json_encode($data);
 }

 public function getByOrcIcon($orc)
 {
  // API endpoint URL
//   $api_url['data'] = "http://icons.globalindointimates.id:8099/api?action=get_orc&orc=$orc";
  $api_url['data'] = "http://192.168.92.250:8099/api?action=get_orc&orc=$orc";

  // Get the API response
  $response = $this->curl->simple_get($api_url);

  // Decode the JSON response
  $data = json_decode($response, true);
  // Send response as JSON
  echo json_encode($data);
 }


 public function get_all_orc()
 {
  $result = $this->CuttingModel->get_all_orc();
  echo json_encode($result);
 }

 public function get_size()
 {
  $result = $this->CuttingModel->get_size();
  echo json_encode($result);
 }

 public function get_size_icon($orc)
 {
  $result = $this->CuttingModel->get_size_icon($orc);
  echo json_encode($result);
 }

 public function ajax_get_by_size()
 {
  $data = $this->CuttingModel->get_by_size();

  echo json_encode($data);
 }

 public function ajax_get_by_size_icon()
 {
  $data = $this->CuttingModel->get_by_size_icon();

  echo json_encode($data);
 }
 public function getByOrc($orc)
 {
  $result = $this->CuttingModel->getByOrc($orc);

  echo json_encode($result);
 }

 public function getBundleByOrcIcon($orc)
 {
  $result['data1'] = $this->CuttingModel->getBundleByOrcIcon($orc);
//   $result['data2'] = $this->CuttingModel->get_count_cutting_detail_by_barcode($orc);

  echo json_encode($result);
 }

 public function ajaxGetCountCuttingDetailByBarcode($barcode){
  $result['data'] = $this->CuttingModel->getCountCuttingDetailByBarcode($barcode);

  echo json_encode($result);
 }

 function getDataInput()
 {
  $data['data'] = $this->CuttingModel->getScanInputCutting();
  echo json_encode($data);
 }

 function getOutputCutting()
 {
  $data['data'] = $this->CuttingModel->getDataOutputCutting();
  echo json_encode($data);
 }

 public function getUnscannedBarcode()
 {
  $rst['data'] = $this->CuttingModel->getDataUnscannedBarcode();
  echo json_encode($rst);
 }

 public function ajax_get_sam()
 {
  $rst = $this->CuttingModel->get_sam();
  echo json_encode($rst);
 }

 public function ajax_check_by_orc_size()
 {
  $rst = $this->CuttingModel->check_by_orc_size();
  echo json_encode($rst);
 }

 public function ajax_save_cutting()
 {
  $valBack = $this->CuttingModel->save();
  echo json_encode($valBack);
 }

 public function ajax_save_detail_cutting()
 {
  $rst = $this->CuttingModel->save_detail();
  echo json_encode($rst);
 }

 public function ajax_get_by_barcode($barcode)
 {
  $rst = $this->CuttingModel->check_by_barcode($barcode);

  if ($rst == null) {
   $result = $this->CuttingModel->get_by_barcode($barcode);
  } else {
   $result = 0;
  }

  echo json_encode($result);
 }

 public function ajax_save_input()
 {
  $rst = $this->CuttingModel->save_input();

  echo json_encode($rst);
 }

 public function ajax_get_all_line()
 {
  $rst = $this->CuttingModel->get_all_line();

  echo json_encode($rst);
 }

 public function ajax_check_barcode_output($barcode)
 {
  $rst = $this->CuttingModel->get_by_barcode_output($barcode);

  echo json_encode($rst);
 }

 public function ajax_get_sewing_sam()
 {
  $rst = $this->CuttingModel->get_sewing_sam();

  echo json_encode($rst);
 }
 public function ajax_save_sewing()
 {
  $rst = $this->CuttingModel->save_sewing();

  echo json_encode($rst);
 }

 public function ajax_comparing_inputcutting_inputsewing($orc)
 {
  $rst = $this->CuttingModel->comparing_inputcutting_inputsewing($orc);

  echo json_encode($rst);
 }
 public function ajax_check_by_barcode($bar)
 {
  $rst = $this->CuttingModel->check_by_barcode($bar);

  echo json_encode($rst);
 }

 public function ajax_get_bundles($orc)
 {
  $rst = $this->CuttingModel->get_by_orc($orc);

  echo json_encode($rst);
 }

 public function ajax_get_bundles_juwita($orc)
 {
  $rst = $this->CuttingModel->get_by_orc($orc);

  echo json_encode($rst);
 }

 public function ajax_get_mold_bundles($orc)
 {
  $rst['data'] = $this->CuttingModel->get_by_orc_mold($orc);

  echo json_encode($rst);
 }

 public function get_datas_report()
 {
  // $result['data'] = $this->CuttingModel->get_datas_orcs();
  $result['data'] = $this->CuttingModel->get_datas_orcs_v2();

  echo json_encode($result);
 }

 public function wip()
 {
  $result['data'] = $this->CuttingModel->wip();

  echo json_encode($result);
 }
 public function balance()
 {
  $result['data'] = $this->CuttingModel->balance();

  echo json_encode($result);
 }

 public function inputCuttingData()
 {
  $tglNow      = $_GET['tgl'];

  $result['data'] = $this->CuttingModel->input_cutting($tglNow);

  echo json_encode($result);
 }

 public function outputCuttingData()
 {
  $tglNow      = $_GET['tgl'];

  $result['data'] = $this->CuttingModel->output_cutting($tglNow);

  echo json_encode($result);
 }

 public function trimstore()
 {
  $result['data'] = $this->CuttingModel->trimstore();

  echo json_encode($result);
 }



 // Input Recut Cutting
 // ==================================================================================================
 public function input_recut_cutting()
 {
  $data['title'] = 'Input Recut Cutting | GI-Production';

  $role = $this->session->userdata('role_gi_production');

  $this->load->view('header_datatable_select', $data);
  if ($role == 1) {
   $this->load->view('admin/sidebarAdmin');
  } else {
   $this->load->view('cutting/sidebarCutting');
  }
  $this->load->view('navbar');
  $this->load->view('cutting/recut_process/input_recut/inputRecutView');
  $this->load->view('footer');
 }

 public function getInputRecut()
 {
  $result['data'] = $this->CuttingModel->getDataInputRecut();
  echo json_encode($result);
 }

 public function getInputRecutComplete()
 {
  $result['data'] = $this->CuttingModel->getDataInputRecutComplete();
  echo json_encode($result);
 }

 public function getRecutSewing()
 {
  $result['data'] = $this->CuttingModel->getDataRecutSewing();
  echo json_encode($result);
 }

 public function getRecutSewingRejected()
 {
  $result['data'] = $this->CuttingModel->getDataRecutSewingRejected();
  echo json_encode($result);
 }

 public function getUnscannedBarcodeRecutSewing()
 {
  $result = $this->CuttingModel->getDataUnscannedBarcodeRecutSewing();
  echo json_encode($result);
 }

 // public function getScanBarcodeValue()
 // {
 //     $barcode = $this->input->get('barcode');

 //     $result['data'] = $this->CuttingModel->getDataScanBarcodeValue($barcode);
 //     echo json_encode($result);
 // }

 public function getCheckBarcodeRecutCutting()
 {
  $barcode = $this->input->get('barcode');

  $result = $this->CuttingModel->getDataCheckBarcodeInputSewing($barcode);
  if ($result >= 1) {
   $result = $this->CuttingModel->getDataCheckBarcodeRecutSewing($barcode);
   if ($result >= 1) {
    $result = $this->CuttingModel->getDataCheckBarcodeInputRecutCuttingScanned($barcode);
    if ($result == 0) {
     $result = 402; // Sudah di scan semua
     echo json_encode($result);
    } else {
     $result = 200;
     echo json_encode($result); // Oke lanjut
    }
   } else {
    $result = 403; // barcode belum dibuat di recut sewing
    echo json_encode($result);
   }
  } else {
   $result = 404; // barcode tidak ada
   echo json_encode($result);
  }
 }

 // public function postInputRecutBySelected()
 // {
 //     date_default_timezone_set("Asia/Jakarta");

 //     $id_recut_sewing = $this->input->post('id_recut_sewing');

 //     $data = array(
 //         'id_recut_sewing' => $id_recut_sewing,
 //         'input_date' => date('Y-m-d H:i:s')
 //     );

 //     $this->CuttingModel->postDataInputRecutBySelected($data);
 //     echo json_encode($data);
 // }

 public function postInputRecutByBarcode()
 {
  date_default_timezone_set("Asia/Jakarta");

  $barcode = $this->input->post('barcode');

  $query = "SELECT
                        MAX(recut_sewing_main.id) as id 
                    FROM
                        recut_sewing_main
                        LEFT JOIN input_recut_cutting ON recut_sewing_main.id = input_recut_cutting.id_recut_sewing_main
                    WHERE
                        input_recut_cutting.input_date IS NULL 
                        AND recut_sewing_main.status_process = 1
                        AND recut_sewing_main.barcode = '$barcode'";
  $result = $this->db->query($query);
  $data  = $result->result_array();
  $id_recut_sewing_main = $data[0]['id'];

  $data = array(
   'id_recut_sewing_main' => $id_recut_sewing_main,
   'input_date' => date('Y-m-d H:i:s')
  );

  $this->CuttingModel->postDataInputRecutByBarcode($data);
  echo json_encode($data);
 }


 public function print_input_recut()
 {
  $data['title'] = 'Print Input Recut | GI-Production';

  // $this->load->view('header', $data);
  $this->load->view('cutting/recut_process/input_recut/inputRecutPrintView');
  // $this->load->view('footer_barcode');
 }


 public function updateRejectRecutRequestSewing()
 {
  date_default_timezone_set("Asia/Jakarta");

  $id_main = $this->input->post('id_main');
  $reject_remarks = $this->input->post('reject_remarks');

  $data = array(
   'status_process' => 0,
   'reject' => 1,
   'reject_date' => date('Y-m-d H:i:s'),
   'reject_remarks' => $reject_remarks
  );

  $this->CuttingModel->updateDataRejectRecutRequestSewing($id_main, $data);
  echo json_encode($data);
 }
 // ==================================================================================================

 // Output Recut Cutting
 // ==================================================================================================
 public function output_recut_cutting()
 {
  $data['title'] = 'Output Recut Cutting | GI-Production';

  $role = $this->session->userdata('role_gi_production');

  $this->load->view('header_datatable_select', $data);
  if ($role == 1) {
   $this->load->view('admin/sidebarAdmin');
  } else {
   $this->load->view('cutting/sidebarCutting');
  }
  $this->load->view('navbar');
  $this->load->view('cutting/recut_process/output_recut/outputRecutView');
  $this->load->view('footer');
 }

 public function getOutputRecut()
 {
  $result['data'] = $this->CuttingModel->getDataOutputRecut();
  echo json_encode($result);
 }

 public function getOutputRecutComplete()
 {
  $result['data'] = $this->CuttingModel->getDataOutputRecutComplete();
  echo json_encode($result);
 }

 public function getInputRecutWaitingList()
 {
  $result['data'] = $this->CuttingModel->getDataInputRecutWaitingList();
  echo json_encode($result);
 }

 public function getScanBarcodeValueOutputRecut()
 {
  $barcode = $this->input->get('barcode');

  $result['data'] = $this->CuttingModel->getScanDataBarcodeValueOutputRecut($barcode);
  echo json_encode($result);
 }

 public function getUnscannedBarcodeInputRecut()
 {
  $result = $this->CuttingModel->getDataUnscannedBarcodeInputRecut();
  echo json_encode($result);
 }

 public function getCheckBarcodeOutputRecutCutting()
 {
  $barcode = $this->input->get('barcode');

  $result = $this->CuttingModel->getDataCheckBarcodeInputSewing($barcode);
  if ($result >= 1) {
   $result = $this->CuttingModel->getDataCheckBarcodeInputRecutCutting($barcode);
   if ($result >= 1) {
    $result = $this->CuttingModel->getDataCheckBarcodeOutputRecutCuttingScanned($barcode);
    if ($result == 0) {
     $result = 402; // Sudah di scan semua
     echo json_encode($result);
    } else {
     echo json_encode($result); // Oke lanjut
    }
   } else {
    $result = 403; // barcode belum dibuat di input recut
    echo json_encode($result);
   }
  } else {
   $result = 404; // barcode tidak ada
   echo json_encode($result);
  }
 }

 // public function postOutputRecutBySelected()
 // {
 //     date_default_timezone_set("Asia/Jakarta");

 //     $id_recut_sewing = $this->input->post('id_recut_sewing');

 //     $data = array(
 //         'id_recut_sewing' => $id_recut_sewing,
 //         'output_date' => date('Y-m-d H:i:s')
 //     );

 //     $this->CuttingModel->postDataOutputRecutBySelected($data);
 //     echo json_encode($data);
 // }

 public function postOutputRecutByBarcode()
 {
  date_default_timezone_set("Asia/Jakarta");

  $barcode = $this->input->post('barcode');

  $query = "SELECT
                    recut_sewing_main.id 
                FROM
                    recut_sewing_main
                    LEFT JOIN output_recut_cutting ON recut_sewing_main.id = output_recut_cutting.id_recut_sewing_main 
                WHERE
                    output_recut_cutting.output_date IS NULL 
                    AND recut_sewing_main.status_process = 1
                    AND recut_sewing_main.barcode = '$barcode'";

  $result = $this->db->query($query);
  $data  = $result->result_array();
  $id_recut_sewing_main = $data[0]['id'];

  $data = array(
   'id_recut_sewing_main' => $id_recut_sewing_main,
   'output_date' => date('Y-m-d H:i:s')
  );

  $this->CuttingModel->postDataOutputRecutByBarcode($data);
  echo json_encode($data);
 }
 // ==================================================================================================


 // Report Recut Cutting
 // ==================================================================================================
 public function report_recut_cutting()
 {
  $data['title'] = 'Report Recut Cutting | GI-Production';

  $role = $this->session->userdata('role_gi_production');

  $this->load->view('header', $data);
  if ($role == 1) {
   $this->load->view('admin/sidebarAdmin');
  } else {
   $this->load->view('cutting/sidebarCutting');
  }
  $this->load->view('navbar');
  $this->load->view('cutting/report/report_recut/reportRecutView');
  $this->load->view('footer');
 }

 public function getReportRecut()
 {
  $result['data'] = $this->CuttingModel->getDataReportRecut();
  echo json_encode($result);
 }

 public function getReportRecutFilter()
 {
  $date_from = $this->input->get('date_from');
  $date_to = $this->input->get('date_to');

  $result['data'] = $this->CuttingModel->getDataReportRecutFilter($date_from, $date_to);
  echo json_encode($result);
 }


 // ==================================================================================================



 // ==================================================================================================

}
